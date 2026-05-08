@extends('layouts.main')

@section('title', 'Katalog Produk - ' . setting('store_name', 'Genjah Rumah Bibit'))

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
                <span class="text-xs font-semibold text-white/90 tracking-wider uppercase">Koleksi Lengkap</span>
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight" style="color: #F4F1EA;">
                Katalog <span style="color: #D48C70;">Produk</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed mb-8" style="color: rgba(244, 241, 234, 0.8);">
                Pilihan bibit unggul dan berkualitas premium untuk hasil panen terbaik Anda
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
