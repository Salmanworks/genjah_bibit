<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::published()
            ->latest('published_at')
            ->paginate(9);
        
        $featuredBlog = Blog::published()
            ->featured()
            ->latest()
            ->first();
        
        return view('pages.blog.index', compact('blogs', 'featuredBlog'));
    }
    
    public function show($slug)
    {
        $blog = Blog::published()
            ->where('slug', $slug)
            ->firstOrFail();
        
        // Increment view count
        $blog->increment('view_count');
        
        // Related blogs
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->where(function ($query) use ($blog) {
                $query->where('category', $blog->category)
                      ->orWhere(function ($q) use ($blog) {
                          if ($blog->tags) {
                              foreach ($blog->tags as $tag) {
                                  $q->orWhereJsonContains('tags', $tag);
                              }
                          }
                      });
            })
            ->latest()
            ->take(3)
            ->get();
        
        return view('pages.blog.show', compact('blog', 'relatedBlogs'));
    }
}
