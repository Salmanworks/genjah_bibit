@extends('layouts.main')

@section('title', 'Katalog Produk - ' . setting('store_name', 'Genjah Rumah Bibit'))

@section('content')
<!-- Header Section -->
<section class="relative pb-16" style="padding-top: 150px;">
    <!-- Darker gradient overlay to ensure text is highly readable -->
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/95 via-emerald-900/90 to-emerald-950/95 backdrop-blur-md"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-lime-500/30 bg-emerald-900/50 mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-lime-400 animate-pulse"></span>
            <span class="text-xs font-medium text-lime-400 tracking-wider uppercase">Koleksi Lengkap</span>
        </div>
        
        <div class="max-w-[95%] mx-auto mt-4">
            <div class="w-full px-8 md:px-20 py-16 md:py-24 bg-emerald-900/90 backdrop-blur-xl border border-white/10 shadow-2xl flex flex-col items-center justify-center text-center" 
                 style="border-radius: 9999px;">
                <h1 class="font-black text-white mb-6 drop-shadow-2xl tracking-tighter leading-none uppercase"
                    style="font-size: clamp(3rem, 12vw, 8.5rem);">
                    Katalog <span class="text-lime-400">Produk</span>
                </h1>
                <p class="text-xl md:text-2xl text-white/80 max-w-3xl mx-auto font-light leading-relaxed">
                    Pilihan bibit unggul dan berkualitas premium untuk hasil panen terbaik Anda.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="relative py-8">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Bar -->
        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('products.index') }}" class="px-4 py-2 rounded-full text-sm font-medium {{ !request('category') ? 'bg-lime-500 text-emerald-950' : 'glass-card text-emerald-950 hover:bg-emerald-800/10' }} transition-colors">
                    Semua
                </a>
                @foreach($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="px-4 py-2 rounded-full text-sm font-medium {{ (request('category') == $category->slug) ? 'bg-lime-500 text-emerald-950' : 'glass-card text-emerald-950 hover:bg-emerald-800/10' }} transition-colors">
                    {{ $category->name }}
                </a>
                @endforeach
            </div>
            
            <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <select name="sort" onchange="this.form.submit()" class="glass-card px-6 py-2.5 rounded-full text-sm font-bold text-emerald-900 border border-emerald-900/10 outline-none focus:ring-2 focus:ring-lime-500/30 focus:border-lime-500 transition-all cursor-pointer shadow-sm">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                    <option value="bestseller" {{ request('sort') == 'bestseller' ? 'selected' : '' }}>Terlaris</option>
                </select>
            </form>
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
