<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::active()->with(['category', 'tags']);
        
        // Filter by category
        if ($request->has('category')) {
            $categorySlugs = is_array($request->category) ? $request->category : [$request->category];
            $query->whereHas('category', function ($q) use ($categorySlugs) {
                $q->whereIn('slug', $categorySlugs);
            });
        }
        
        // Filter by subcategory
        if ($request->has('subcategory')) {
            $query->whereHas('subcategory', function ($q) use ($request) {
                $q->where('slug', $request->subcategory);
            });
        }
        
        // Filter by tag
        if ($request->has('tag')) {
            $tagSlugs = is_array($request->tag) ? $request->tag : [$request->tag];
            $query->whereHas('tags', function ($q) use ($tagSlugs) {
                $q->whereIn('slug', $tagSlugs);
            });
        }
        
        // Filter by price
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        
        // Filter by stock
        if ($request->has('in_stock')) {
            $query->inStock();
        }
        
        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }
        
        // Sorting
        switch ($request->get('sort', 'latest')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'bestseller':
                $query->orderBy('sold_count', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->latest();
        }
        
        $products = $query->paginate(12)->withQueryString();
        $categories = Category::active()->ordered()->get();
        $tags = Tag::all();
        
        return view('pages.products.index', compact('products', 'categories', 'tags'));
    }
    
    public function show($slug)
    {
        $product = Product::active()
            ->where('slug', $slug)
            ->with(['category', 'subcategory', 'tags'])
            ->firstOrFail();
        
        // Increment view count
        $product->increment('view_count');
        
        // Related products
        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with(['category', 'tags'])
            ->take(4)
            ->get();
        
        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}
