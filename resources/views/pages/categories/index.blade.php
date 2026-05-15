@extends('layouts.main')

@section('title', 'Kategori - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- PAGE BANNER — Kategori --}}
<div data-dark-hero class="relative overflow-hidden" style="background: #3d5c38; padding-top: 80px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="absolute pointer-events-none hidden lg:block select-none" style="right: -20px; top: 50%; transform: translateY(-50%); font-size: 16rem; font-weight: 900; line-height: 1; color: rgba(255,255,255,0.03); letter-spacing: -0.06em;">KATEGORI</div>
    <div class="absolute pointer-events-none" style="left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 40%, transparent 100%);"></div>
    <div class="absolute top-0 left-0 right-0" style="height: 2px; background: linear-gradient(90deg, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.2) 40%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top: 36px; padding-bottom: 44px;">
        <nav class="flex items-center gap-2 mb-8">
            <a href="{{ route('home') }}" style="font-size: 11px; color: rgba(255,255,255,0.35); text-decoration: none; font-weight: 500; letter-spacing: 0.04em; text-transform: uppercase;">Beranda</a>
            <span style="color: rgba(255,255,255,0.2); font-size: 11px; margin: 0 2px;">/</span>
            <span style="font-size: 11px; color: #c5e87a; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase;">Kategori</span>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-stretch gap-0">
            <div class="flex-1 min-w-0 lg:pr-16 lg:border-r" style="border-color: rgba(255,255,255,0.1);">
                <div class="flex items-center gap-3 mb-5">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size: 10px; font-weight: 800; letter-spacing: 0.25em; color: #c5e87a; text-transform: uppercase;">Semua Kategori</span>
                </div>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #ffffff; margin: 0 0 6px 0;">Jelajahi</h1>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #c5e87a; margin: 0 0 20px 0;">Kategori</h1>
                <div style="width: 100%; height: 1px; background: rgba(255,255,255,0.1); margin-bottom: 20px;"></div>
                <p style="font-size: 0.875rem; color: rgba(255,255,255,0.38); line-height: 1.7; margin: 0; max-width: 380px; font-style: italic;">
                    "Jelajahi berbagai pilihan kategori bibit tanaman berkualitas untuk kebun impian Anda."
                </p>
            </div>

            <div class="hidden lg:flex flex-col justify-center gap-0 flex-shrink-0" style="width: 260px; padding-left: 48px;">
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">{{ $categories->count() }}</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Total Kategori</div>
                </div>
                <div style="padding: 20px 0;">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12m0 0C12 7 7 4 3 6c4 0 7 3 9 6zm0 0c0-5 5-8 9-6-4 0-7 3-9 6z"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">500+</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Varietas Bibit</div>
                </div>
            </div>
        </div>
    </div>

    <div style="line-height: 0; display: block; margin-top: 8px;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block; width: 100%; height: 60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#f4f1ea"/>
        </svg>
    </div>
</div>

<!-- Categories Grid -->
<section class="relative py-12">
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="group relative overflow-hidden rounded-2xl aspect-[4/3] card-hover border border-emerald-900/10">
                <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://images.unsplash.com/photo-' . ($loop->iteration % 6 == 1 ? '1459411552884-841db9b3cc2a' : ($loop->iteration % 6 == 2 ? '1466692476868-0e96c3e6a5ce' : ($loop->iteration % 6 == 3 ? '1518531933807-3b8360c5a59a' : ($loop->iteration % 6 == 4 ? '1477554193778-1894d0b3dd95' : ($loop->iteration % 6 == 5 ? '1501004318641-b39ac6497518' : '1416879595882-3373a0480b5b'))))) }}?w=600&q=80" 
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
