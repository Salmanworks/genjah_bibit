<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $products = $query->latest()->paginate(15);
        $categories = Category::ordered()->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::ordered()->get();
        $subcategories = Subcategory::active()->get();
        return view('admin.products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'scientific_name' => 'nullable|string|max:255',
            'description' => 'required|string',
            'care_instructions' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'size' => 'nullable|string|max:100',
            'weight' => 'nullable|string|max:100',
            'pot_size' => 'nullable|string|max:100',
            'age_months' => 'nullable|integer|min:0',
            'origin' => 'nullable|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'is_bestseller' => 'nullable|boolean',
            'is_new_arrival' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        // Handle unique slug
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Product::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count++;
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('products/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_bestseller'] = $request->boolean('is_bestseller');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');
        $validated['is_active'] = $request->boolean('is_active', true);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $categories = Category::ordered()->get();
        $subcategories = Subcategory::active()->get();
        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'scientific_name' => 'nullable|string|max:255',
            'description' => 'required|string',
            'care_instructions' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'size' => 'nullable|string|max:100',
            'weight' => 'nullable|string|max:100',
            'pot_size' => 'nullable|string|max:100',
            'age_months' => 'nullable|integer|min:0',
            'origin' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'is_bestseller' => 'nullable|boolean',
            'is_new_arrival' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        // Update slug only if name changed
        if ($product->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
            $originalSlug = $validated['slug'];
            $count = 1;
            while (Product::where('slug', $validated['slug'])->where('id', '!=', $product->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count++;
            }
        }

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            // Delete old image
            if ($product->main_image && Storage::disk('public')->exists($product->main_image)) {
                Storage::disk('public')->delete($product->main_image);
            }
            $validated['main_image'] = $request->file('main_image')->store('products', 'public');
        }

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            // Delete old gallery images
            if ($product->gallery_images) {
                foreach ($product->gallery_images as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('products/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_bestseller'] = $request->boolean('is_bestseller');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');
        $validated['is_active'] = $request->boolean('is_active', true);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Delete images
        if ($product->main_image && Storage::disk('public')->exists($product->main_image)) {
            Storage::disk('public')->delete($product->main_image);
        }
        if ($product->gallery_images) {
            foreach ($product->gallery_images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
