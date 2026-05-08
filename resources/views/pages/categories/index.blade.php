@extends('layouts.main')

@section('title', 'Kategori - ' . setting('store_name', 'Plant Power'))

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
                <span class="text-xs font-semibold text-white/90 tracking-wider uppercase">Semua Kategori</span>
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight" style="color: #F4F1EA;">
                Kategori <span style="color: #D48C70;">Produk</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed mb-8" style="color: rgba(244, 241, 234, 0.8);">
                Jelajahi berbagai pilihan kategori bibit tanaman berkualitas untuk kebun impian Anda
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

<!-- Categories Grid -->
<section class="relative py-12">
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="group relative overflow-hidden rounded-2xl aspect-[4/3] card-hover border border-emerald-900/10">
                <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 6 == 1 ? '1459411552884-841db9b3cc2a' : ($loop->iteration % 6 == 2 ? '1466692476868-0e96c3e6a5ce' : ($loop->iteration % 6 == 3 ? '1518531933807-3b8360c5a59a' : ($loop->iteration % 6 == 4 ? '1477554193778-1894d0b3dd95' : ($loop->iteration % 6 == 5 ? '1501004318641-b39ac6497518' : '1416879595882-3373a0480b5b')))) }}?w=600&q=80" 
                     alt="{{ $category->name }}" 
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 opacity-80 mix-blend-overlay">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent z-0"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 z-10">
                    <h3 class="text-xl font-bold text-white mb-2 transition-colors drop-shadow-md">{{ $category->name }}</h3>
                    <p class="text-sm text-white/90 mb-3 line-clamp-2 drop-shadow-md">{{ $category->description }}</p>
                    <div class="flex items-center gap-2 text-white font-medium text-sm drop-shadow-md">
                        <span>{{ $category->products_count }} Produk</span>
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
