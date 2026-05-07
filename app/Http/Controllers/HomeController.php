<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->ordered()->get();
        
        $bestsellers = Product::active()
            ->bestsellers()
            ->with(['category', 'tags'])
            ->take(8)
            ->get();
        
        $testimonials = Testimonial::active()
            ->ordered()
            ->take(6)
            ->get();
        
        $blogs = Blog::published()
            ->featured()
            ->latest()
            ->take(3)
            ->get();
        
        $features = [
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                'title' => 'Bibit Berkualitas',
                'description' => 'Kami menyediakan bibit unggul dengan kualitas terbaik.',
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>',
                'title' => 'Pengiriman Aman',
                'description' => 'Pengiriman cepat dan aman sampai ke tangan Anda.',
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>',
                'title' => 'Konsultasi Gratis',
                'description' => 'Tim kami siap membantu kebutuhan tanaman Anda.',
            ],
            [
                'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                'title' => 'Garansi Bibit',
                'description' => 'Jaminan bibit sehat dan berkualitas.',
            ],
        ];
        
        return view('pages.home', compact(
            'categories',
            'bestsellers',
            'testimonials',
            'blogs',
            'features'
        ));
    }
}
