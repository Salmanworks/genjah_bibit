<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::active()
            ->ordered()
            ->withCount(['products' => function ($query) {
                $query->active();
            }])
            ->get();
        
        return view('pages.categories.index', compact('categories'));
    }
    
    public function show($slug, Request $request)
    {
        $category = Category::active()
            ->where('slug', $slug)
            ->with(['subcategories' => function ($query) {
                $query->active();
            }])
            ->firstOrFail();
        
        $query = $category->products()
            ->active()
            ->with(['category', 'tags']);
        
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
            default:
                $query->latest();
        }
        
        $products = $query->paginate(12)->withQueryString();
        
        return view('pages.categories.show', compact('category', 'products'));
    }
}
