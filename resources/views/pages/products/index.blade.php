@extends('layouts.main')

@section('title', 'Katalog Produk - ' . setting('store_name', 'Genjah Rumah Bibit'))

@section('content')

{{-- PAGE BANNER — Katalog Produk --}}
<div data-dark-hero class="relative overflow-hidden" style="background: #3d5c38; padding-top: 80px;">

    {{-- Background: halftone dot grid --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Large decorative number watermark --}}
    <div class="absolute pointer-events-none select-none hidden lg:block" style="right: -20px; top: 50%; transform: translateY(-50%); font-size: 18rem; font-weight: 900; line-height: 1; color: rgba(255,255,255,0.03); letter-spacing: -0.06em; user-select: none;">
        BIBIT
    </div>

    {{-- Vertical accent line left — subtle --}}
    <div class="absolute pointer-events-none" style="left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 40%, transparent 100%);"></div>

    {{-- Top accent bar --}}
    <div class="absolute top-0 left-0 right-0" style="height: 2px; background: linear-gradient(90deg, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.2) 40%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top: 36px; padding-bottom: 44px;">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 mb-8">
            <a href="{{ route('home') }}" style="font-size: 11px; color: rgba(255,255,255,0.35); text-decoration: none; font-weight: 500; letter-spacing: 0.04em; text-transform: uppercase;">Beranda</a>
            <span style="color: rgba(255,255,255,0.2); font-size: 11px; margin: 0 2px;">/</span>
            <span style="font-size: 11px; color: #c5e87a; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase;">Katalog Produk</span>
        </nav>

        {{-- Main grid --}}
        <div class="flex flex-col lg:flex-row lg:items-stretch gap-0">

            {{-- ── LEFT BLOCK ── --}}
            <div class="flex-1 min-w-0 lg:pr-16 lg:border-r" style="border-color: rgba(255,255,255,0.1);">

                {{-- Section label --}}
                <div class="flex items-center gap-3 mb-5">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size: 10px; font-weight: 800; letter-spacing: 0.25em; color: #c5e87a; text-transform: uppercase;">Koleksi Lengkap</span>
                </div>

                {{-- Title --}}
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #ffffff; margin: 0 0 6px 0;">
                    Katalog
                </h1>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #c5e87a; margin: 0 0 20px 0;">
                    Produk
                </h1>

                {{-- Horizontal rule --}}
                <div style="width: 100%; height: 1px; background: rgba(255,255,255,0.1); margin-bottom: 20px;"></div>

                {{-- Category chips — flat, no blur --}}
                <div class="flex flex-wrap gap-2 mb-6">
                    @php
                        $cats = [
                            [
                                'label' => 'Sayuran',
                                'icon'  => '<svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 0c0 5.52-4 10-10 10M12 2c0 5.52 4 10 10 10"/></svg>',
                            ],
                            [
                                'label' => 'Buah & Bibit',
                                'icon'  => '<svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v4M8 7l4 4 4-4"/></svg>',
                            ],
                            [
                                'label' => 'Tanaman Hias',
                                'icon'  => '<svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12m0 0C12 7 7 4 3 6c4 0 7 3 9 6zm0 0c0-5 5-8 9-6-4 0-7 3-9 6z"/></svg>',
                            ],
                            [
                                'label' => 'Perkebunan',
                                'icon'  => '<svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21h18M9 21V9l3-6 3 6v12M9 12h6"/></svg>',
                            ],
                            [
                                'label' => 'Tanaman Rambat',
                                'icon'  => '<svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22c0-6-4-10-9-10M12 22c0-6 4-10 9-10M12 22V8m0-6v6"/></svg>',
                            ],
                            [
                                'label' => 'Tanaman Kayu',
                                'icon'  => '<svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12M12 12L5 6m7 6l7-6M5 6C5 3.5 8 2 12 2s7 1.5 7 4"/></svg>',
                            ],
                        ];
                    @endphp
                    @foreach($cats as $cat)
                    <span style="display:inline-flex; align-items:center; gap:6px; font-size:11px; font-weight:600; padding:5px 11px; background:rgba(0,0,0,0.2); border:1px solid rgba(255,255,255,0.12); border-radius:4px; color:rgba(255,255,255,0.65); white-space:nowrap; letter-spacing:0.02em;">
                        <span style="color:rgba(197,232,122,0.7); display:flex; align-items:center;">{!! $cat['icon'] !!}</span>{{ $cat['label'] }}
                    </span>
                    @endforeach
                </div>

                {{-- Tagline --}}
                <p style="font-size: 0.875rem; color: rgba(255,255,255,0.38); line-height: 1.7; margin: 0; max-width: 380px; font-style: italic;">
                    "Bibit unggul pilihan petani profesional — segar, bersertifikat, siap tanam."
                </p>

            </div>

            {{-- ── RIGHT BLOCK: Stats ── --}}
            <div class="hidden lg:flex flex-col justify-center gap-0 flex-shrink-0" style="width: 260px; padding-left: 48px;">

                {{-- Stat row 1 --}}
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22V12m0 0C12 7 7 4 3 6c4 0 7 3 9 6zm0 0c0-5 5-8 9-6-4 0-7 3-9 6z"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">500+</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Varietas Produk</div>
                </div>

                {{-- Stat row 2 --}}
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">6</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Kategori Tanaman</div>
                </div>

                {{-- Stat row 3 --}}
                <div style="padding: 20px 0;">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                        <div style="display:flex; align-items:baseline; gap:4px;">
                            <span style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">4.9</span>
                        </div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Rating Pelanggan</div>
                </div>

            </div>

        </div>

    </div>

    {{-- Bottom: wave transition to page background --}}
    <div style="line-height: 0; display: block; margin-top: 8px;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block; width: 100%; height: 60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#f4f1ea"/>
        </svg>
    </div>

</div>

{{-- PRODUCTS SECTION --}}
<section id="produk-list" class="relative" style="padding-top: 0; padding-bottom: 48px;">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Filter Bar - Enhanced UI -->
        <div class="mb-8 pt-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <!-- Category Tabs -->
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('products.index') }}" 
                       class="group relative px-6 py-3 rounded-xl text-sm font-bold transition-all duration-300 {{ !request('category') ? 'bg-gradient-to-r from-lime-400 to-lime-500 text-emerald-950 shadow-lg shadow-lime-500/30' : 'bg-white text-emerald-900 hover:bg-emerald-50 border border-emerald-900/10' }}">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Semua
                        </span>
                        @if(!request('category'))
                        <span class="absolute inset-0 rounded-xl bg-gradient-to-r from-lime-400 to-lime-500 opacity-0 group-hover:opacity-100 blur-xl transition-opacity duration-300"></span>
                        @endif
                    </a>
                    
                    @foreach($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" 
                       class="group relative px-6 py-3 rounded-xl text-sm font-bold transition-all duration-300 {{ (request('category') == $category->slug) ? 'bg-gradient-to-r from-lime-400 to-lime-500 text-emerald-950 shadow-lg shadow-lime-500/30' : 'bg-white text-emerald-900 hover:bg-emerald-50 border border-emerald-900/10' }}">
                        <span class="relative z-10">{{ $category->name }}</span>
                        @if(request('category') == $category->slug)
                        <span class="absolute inset-0 rounded-xl bg-gradient-to-r from-lime-400 to-lime-500 opacity-0 group-hover:opacity-100 blur-xl transition-opacity duration-300"></span>
                        <span class="absolute bottom-1 left-1/2 transform -translate-x-1/2 w-1.5 h-1.5 bg-emerald-950 rounded-full animate-pulse"></span>
                        @endif
                    </a>
                    @endforeach
                </div>
                
                <!-- Sort Dropdown -->
                <form action="{{ route('products.index') }}" method="GET" class="flex-shrink-0">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="relative">
                        <select name="sort" 
                                onchange="this.form.submit()" 
                                class="appearance-none bg-white pl-5 pr-10 py-3 rounded-xl text-sm font-bold text-emerald-900 border border-emerald-900/10 outline-none focus:ring-2 focus:ring-lime-500/50 focus:border-lime-500 transition-all cursor-pointer shadow-sm hover:shadow-md hover:border-lime-500/30 min-w-[200px]">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                            <option value="bestseller" {{ request('sort') == 'bestseller' ? 'selected' : '' }}>Terlaris</option>
                        </select>
                        <!-- Dropdown Arrow -->
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <svg class="w-4 h-4 text-emerald-900/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                @include('partials.product-card', ['product' => $product])
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $products->links('vendor.pagination.custom') }}
        </div>
        @else
        <div class="text-center py-20 glass-card rounded-2xl">
            <div class="w-20 h-20 mx-auto bg-emerald-800/20 rounded-full flex items-center justify-center mb-4">
                <span class="text-4xl">🌱</span>
            </div>
            <h3 class="text-2xl font-bold text-emerald-950 mb-2">Produk Tidak Ditemukan</h3>
            <p class="text-emerald-950/70 mb-6">Maaf, tidak ada produk yang sesuai dengan kriteria pencarian Anda.</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 px-6 py-3 btn-outline rounded-full text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Semua Produk
            </a>
        </div>
        @endif

    </div>
</section>
@endsection
