@extends('layouts.main')

@section('title', 'Blog - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header Section -->
<section class="relative pt-32 pb-12 md:pt-40 md:pb-16 overflow-hidden">
    <!-- Elegant gradient background using theme colors -->
    <div class="absolute inset-0" style="background: linear-gradient(135deg, #2B3A28 0%, #6B8269 50%, #4A5D48 100%);"></div>
    <!-- Subtle pattern overlay -->
    <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/15 backdrop-blur-sm border border-white/30 mb-6">
                <span class="w-2 h-2 rounded-full" style="background-color: #D48C70;"></span>
                <span class="text-xs font-semibold text-white/90 tracking-wider uppercase">Inspirasi Hijau</span>
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight" style="color: #F4F1EA;">
                Blog & <span style="color: #D48C70;">Artikel</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed mb-8" style="color: rgba(244, 241, 234, 0.8);">
                Tips, panduan, dan informasi seputar perawatan tanaman untuk kebun impian Anda
            </p>
            
            <!-- Decorative line -->
            <div class="flex items-center justify-center gap-4">
                <div class="h-px w-20" style="background: linear-gradient(to right, transparent, rgba(244, 241, 234, 0.4));"></div>
                <svg class="w-5 h-5" style="color: rgba(244, 241, 234, 0.5);" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <div class="h-px w-20" style="background: linear-gradient(to left, transparent, rgba(244, 241, 234, 0.4));"></div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Post -->
@if($featuredBlog)
<section class="relative py-12">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="group block relative overflow-hidden aspect-[21/9] shadow-2xl border-4 border-white" style="border-radius: 60px;">
            <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1200&q=80" 
                 alt="{{ $featuredBlog->title }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/40 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12">
                <span class="inline-block px-5 py-2 rounded-full bg-lime-500 text-emerald-950 text-xs font-black uppercase tracking-widest mb-6 shadow-lg shadow-lime-500/20">Sorotan</span>
                <h2 class="text-3xl md:text-5xl font-black text-white mb-4 group-hover:text-lime-400 transition-colors leading-tight">{{ $featuredBlog->title }}</h2>
                <p class="text-white/80 max-w-2xl line-clamp-2 mb-6 text-lg font-medium">{{ $featuredBlog->excerpt }}</p>
                <div class="flex flex-wrap items-center gap-6 text-sm text-white/60 font-bold uppercase tracking-wider">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/></svg>
                        {{ $featuredBlog->category }}
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                        {{ $featuredBlog->reading_time }} Menit Baca
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                        {{ $featuredBlog->published_at->format('d M Y') }}
                    </span>
                </div>
            </div>
        </a>
    </div>
</section>
@endif

<!-- Blog Grid -->
<section class="relative py-12 bg-white">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group bg-white overflow-hidden shadow-2xl border border-emerald-500/5 hover:border-lime-500/30 transition-all card-hover flex flex-col" style="border-radius: 45px;">
                <div class="aspect-video overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=600&q=80" 
                         alt="{{ $blog->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 rounded-full bg-emerald-950/80 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest shadow-lg">{{ $blog->category }}</span>
                    </div>
                </div>
                <div class="p-8 flex-1 flex flex-col">
                    <div class="flex items-center gap-4 mb-4 text-[10px] text-emerald-900/40 font-black uppercase tracking-widest">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $blog->reading_time }} Menit
                        </span>
                        <span>•</span>
                        <span>{{ $blog->published_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-xl font-black text-emerald-950 mb-4 line-clamp-2 group-hover:text-lime-500 transition-colors leading-tight">{{ $blog->title }}</h3>
                    <p class="text-sm text-emerald-900/60 font-medium line-clamp-2 mb-6 leading-relaxed">{{ $blog->excerpt }}</p>
                    <div class="mt-auto pt-6 border-t border-emerald-900/5 flex items-center justify-between">
                        <span class="text-[10px] font-black text-emerald-950 uppercase tracking-widest flex items-center gap-2">
                            Baca Artikel
                            <svg class="w-4 h-4 text-lime-500 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                        <span class="text-[10px] text-emerald-900/20 font-bold italic">{{ $blog->view_count }} views</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-20">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>
@endsection
