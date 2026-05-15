<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        $products   = $query->latest()->paginate(15);
        $categories = Category::ordered()->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories    = Category::ordered()->get();
        $subcategories = Subcategory::active()->get();

        return view('admin.products.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        try {
            \Log::info('Product Store - Request received', [
                'name'          => $request->name,
                'category_id'   => $request->category_id,
                'has_main_image' => $request->hasFile('main_image'),
                'has_gallery'   => $request->hasFile('gallery_images'),
            ]);

            $validated = $request->validate([
                'name'             => 'required|string|max:255',
                'category_id'      => 'required|exists:categories,id',
                'subcategory_id'   => 'nullable|exists:subcategories,id',
                'scientific_name'  => 'nullable|string|max:255',
                'description'      => 'required|string',
                'care_instructions' => 'nullable|string',
                'price'            => 'required|numeric|min:0',
                'original_price'   => 'nullable|numeric|min:0',
                'stock'            => 'required|integer|min:0',
                'size'             => 'nullable|string|max:100',
                'weight'           => 'nullable|string|max:100',
                'pot_size'         => 'nullable|string|max:100',
                'age_months'       => 'nullable|integer|min:0',
                'origin'           => 'nullable|string|max:255',
                'main_image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                'is_featured'      => 'nullable|boolean',
                'is_bestseller'    => 'nullable|boolean',
                'is_new_arrival'   => 'nullable|boolean',
                'is_active'        => 'nullable|boolean',
            ]);

            \Log::info('Product Store - Validation passed');

            $validated['slug'] = Str::slug($validated['name']);

            $originalSlug = $validated['slug'];
            $count        = 1;
            while (Product::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count++;
            }

            if ($request->hasFile('main_image')) {
                $validated['main_image'] = $request->file('main_image')->store('products', 'public');
                \Log::info('Product Store - Main image uploaded', ['path' => $validated['main_image']]);
                $this->copyImageToPublic($validated['main_image']);
            }

            if ($request->hasFile('gallery_images')) {
                $galleryImages = [];
                foreach ($request->file('gallery_images') as $image) {
                    $galleryPath     = $image->store('products', 'public');
                    $galleryImages[] = $galleryPath;
                    $this->copyImageToPublic($galleryPath);
                }
                $validated['gallery_images'] = $galleryImages;
                \Log::info('Product Store - Gallery images uploaded', ['count' => count($galleryImages)]);
            }

            $validated['is_featured']   = $request->boolean('is_featured');
            $validated['is_bestseller'] = $request->boolean('is_bestseller');
            $validated['is_new_arrival'] = $request->boolean('is_new_arrival');
            $validated['is_active']     = $request->boolean('is_active', true);

            $product = Product::create($validated);
            \Log::info('Product Store - Product created', ['id' => $product->id, 'name' => $product->name]);

            return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Product Store - Validation failed', ['errors' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Product Store - Exception', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->with('error', 'Gagal menambahkan produk: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Product $product)
    {
        $categories    = Category::ordered()->get();
        $subcategories = Subcategory::active()->get();

        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'category_id'      => 'required|exists:categories,id',
            'subcategory_id'   => 'nullable|exists:subcategories,id',
            'scientific_name'  => 'nullable|string|max:255',
            'description'      => 'required|string',
            'care_instructions' => 'nullable|string',
            'price'            => 'required|numeric|min:0',
            'original_price'   => 'nullable|numeric|min:0',
            'stock'            => 'required|integer|min:0',
            'size'             => 'nullable|string|max:100',
            'weight'           => 'nullable|string|max:100',
            'pot_size'         => 'nullable|string|max:100',
            'age_months'       => 'nullable|integer|min:0',
            'origin'           => 'nullable|string|max:255',
            'main_image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured'      => 'nullable|boolean',
            'is_bestseller'    => 'nullable|boolean',
            'is_new_arrival'   => 'nullable|boolean',
            'is_active'        => 'nullable|boolean',
        ]);

        if ($product->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
            $originalSlug      = $validated['slug'];
            $count             = 1;
            while (Product::where('slug', $validated['slug'])->where('id', '!=', $product->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count++;
            }
        }

        if ($request->hasFile('main_image')) {
            if ($product->main_image && Storage::disk('public')->exists($product->main_image)) {
                Storage::disk('public')->delete($product->main_image);
                $this->deleteImageFromPublic($product->main_image);
            }
            $validated['main_image'] = $request->file('main_image')->store('products', 'public');
            $this->copyImageToPublic($validated['main_image']);
        }

        if ($request->hasFile('gallery_images')) {
            if ($product->gallery_images) {
                foreach ($product->gallery_images as $oldImage) {
                    if (Storage::disk('public')->exists($oldImage)) {
                        Storage::disk('public')->delete($oldImage);
                        $this->deleteImageFromPublic($oldImage);
                    }
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryPath     = $image->store('products', 'public');
                $galleryImages[] = $galleryPath;
                $this->copyImageToPublic($galleryPath);
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $validated['is_featured']    = $request->boolean('is_featured');
        $validated['is_bestseller']  = $request->boolean('is_bestseller');
        $validated['is_new_arrival'] = $request->boolean('is_new_arrival');
        $validated['is_active']      = $request->boolean('is_active', true);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->main_image && Storage::disk('public')->exists($product->main_image)) {
            Storage::disk('public')->delete($product->main_image);
            $this->deleteImageFromPublic($product->main_image);
        }

        if ($product->gallery_images) {
            foreach ($product->gallery_images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                    $this->deleteImageFromPublic($image);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }

    private function copyImageToPublic($imagePath)
    {
        $source = storage_path('app/public/' . $imagePath);
        $dest   = public_path('storage/' . $imagePath);

        if (file_exists($source)) {
            $destDir = dirname($dest);
            if (!is_dir($destDir)) {
                mkdir($destDir, 0755, true);
            }
            copy($source, $dest);
        }
    }

    private function deleteImageFromPublic($imagePath)
    {
        $publicPath = public_path('storage/' . $imagePath);
        if (file_exists($publicPath)) {
            unlink($publicPath);
        }
    }
}
