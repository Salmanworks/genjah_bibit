<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'products' => Product::active()->count(),
            'categories' => Category::active()->count(),
            'blogs' => Blog::published()->count(),
            'orders' => 0, // Placeholder for orders
        ];
        
        $recentOrders = collect([]); // Placeholder
        
        $popularProducts = Product::active()
            ->orderBy('sold_count', 'desc')
            ->take(4)
            ->get();
        
        return view('admin.dashboard', compact('stats', 'recentOrders', 'popularProducts'));
    }
}
