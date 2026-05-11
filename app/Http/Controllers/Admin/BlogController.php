<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('author');
        
        // Search
        if ($request->search) {
            $query->where('title', 'like', "%{$request->search}%")
                  ->orWhere('category', 'like', "%{$request->search}%");
        }
        
        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('is_published', $request->status);
        }
        
        // Filter by featured
        if ($request->has('featured') && $request->featured !== '') {
            $query->where('is_featured', $request->featured);
        }
        
        $blogs = $query->latest()->paginate(10);
        
        return view('admin.blogs.index', compact('blogs'));
    }
    
    public function create()
    {
        return view('admin.blogs.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);
        
        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_id'] = Auth::id();
        $validated['is_published'] = $request->has('is_published');
        $validated['is_featured'] = $request->has('is_featured');
        
        // Upload featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }
        
        // Convert tags string to array
        if (isset($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }
        
        // Set published_at if published
        if ($validated['is_published'] && !isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }
        
        Blog::create($validated);
        
        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog berhasil ditambahkan!');
    }
    
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }
    
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);
        
        // Update slug if title changed
        if ($validated['title'] !== $blog->title) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        
        $validated['is_published'] = $request->has('is_published');
        $validated['is_featured'] = $request->has('is_featured');
        
        // Upload featured image
        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }
        
        // Convert tags string to array
        if (isset($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }
        
        // Set published_at if published and not set
        if ($validated['is_published'] && !$blog->published_at && !isset($validated['published_at'])) {
            $validated['published_at'] = now();
        }
        
        $blog->update($validated);
        
        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog berhasil diupdate!');
    }
    
    public function destroy(Blog $blog)
    {
        // Delete images
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }
        
        if ($blog->gallery_images) {
            foreach ($blog->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $blog->delete();
        
        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog berhasil dihapus!');
    }
}
