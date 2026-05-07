@extends('layouts.main')

@section('title', 'Kategori - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pb-16" style="padding-top: 150px;">
    <!-- Darker gradient overlay to ensure text is highly readable -->
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/95 via-emerald-900/90 to-emerald-950/95 backdrop-blur-md"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-lime-500/30 bg-emerald-900/50 mb-5">
            <span class="w-1.5 h-1.5 rounded-full bg-lime-400 animate-pulse"></span>
            <span class="text-xs font-medium text-lime-400 tracking-wider uppercase">Semua Kategori</span>
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-emerald-950 mb-4 drop-shadow-2xl tracking-tight">
            Kategori <span class="text-lime-400">Produk</span>
        </h1>
        <p class="text-base md:text-lg text-emerald-100/80 max-w-xl mx-auto font-light">
            Jelajahi berbagai pilihan kategori bibit tanaman berkualitas untuk kebun impian Anda.
        </p>
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
