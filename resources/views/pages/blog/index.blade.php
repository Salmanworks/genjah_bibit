@extends('layouts.main')

@section('title', 'Blog - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12">
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Blog & Artikel</h1>
        <p class="text-white max-w-2xl mx-auto">Tips, panduan, dan informasi seputar perawatan tanaman untuk kebun impian Anda</p>
    </div>
</section>

<!-- Featured Post -->
@if($featuredBlog)
<section class="relative py-8">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="group block relative rounded-3xl overflow-hidden aspect-[21/9] glass-card">
            <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1200&q=80" 
                 alt="{{ $featuredBlog->title }}" 
                 class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/60 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-10">
                <span class="inline-block px-4 py-1 rounded-full bg-lime-500 text-emerald-950 text-sm font-medium mb-4">Featured</span>
                <h2 class="text-2xl md:text-4xl font-bold text-white mb-3 group-hover:text-lime-400 transition-colors">{{ $featuredBlog->title }}</h2>
                <p class="text-emerald-200/80 max-w-2xl line-clamp-2 mb-4">{{ $featuredBlog->excerpt }}</p>
                <div class="flex items-center gap-4 text-sm text-emerald-300/70">
                    <span>{{ $featuredBlog->category }}</span>
                    <span>|</span>
                    <span>{{ $featuredBlog->reading_time }} menit baca</span>
                    <span>|</span>
                    <span>{{ $featuredBlog->published_at->format('d M Y') }}</span>
                </div>
            </div>
        </a>
    </div>
</section>
@endif

<!-- Blog Grid -->
<section class="relative py-12">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group glass-card rounded-2xl overflow-hidden card-hover">
                <div class="aspect-video overflow-hidden">
                    <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=600&q=80" 
                         alt="{{ $blog->title }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="px-3 py-1 rounded-full bg-lime-500/20 text-lime-400 text-xs">{{ $blog->category }}</span>
                        <span class="text-xs text-emerald-300/50">{{ $blog->reading_time }} menit baca</span>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2 line-clamp-2 group-hover:text-lime-400 transition-colors">{{ $blog->title }}</h3>
                    <p class="text-sm text-emerald-200/70 line-clamp-2 mb-3">{{ $blog->excerpt }}</p>
                    <div class="flex items-center justify-between text-xs text-emerald-300/50">
                        <span>{{ $blog->published_at->format('d M Y') }}</span>
                        <span>{{ $blog->view_count }} views</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-12">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>
@endsection
