@extends('layouts.main')

@section('title', $category->name . ' - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12 bg-emerald-900/90">
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-sm text-emerald-300/70 mb-6">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('categories.index') }}" class="hover:text-white transition-colors">Kategori</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white font-medium">{{ $category->name }}</span>
        </nav>
        
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
            <div class="lg:w-2/3">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)]">{{ $category->name }}</h1>
                <p class="text-emerald-50 text-lg max-w-xl drop-shadow-[0_2px_8px_rgba(0,0,0,0.8)]">{{ $category->description }}</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="lg:w-1/3 flex flex-col sm:flex-row lg:flex-col gap-4">
                <div class="bg-white/10 backdrop-blur-md border border-emerald-400/40 rounded-full px-5 py-2.5 shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-emerald-500/30 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-emerald-100">Total Produk</span>
                            <span class="text-lg font-bold text-white">{{ $products->total() }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/10 backdrop-blur-md border border-emerald-400/40 rounded-full px-5 py-2.5 shadow-lg">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-emerald-500/30 flex items-center justify-center">
                            <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-emerald-100">Subkategori</span>
                            <span class="text-lg font-bold text-white">{{ $category->subcategories->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subcategories -->
@if($category->subcategories->count() > 0)
<section class="relative py-8 bg-emerald-900/90">
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-center gap-6">
            <div class="lg:w-1/4">
                <h2 class="text-xl font-semibold text-white drop-shadow-md flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                    Subkategori
                </h2>
            </div>
            <div class="lg:w-3/4 flex flex-wrap gap-3">
                @foreach($category->subcategories as $subcategory)
                <a href="{{ route('products.index', ['subcategory' => $subcategory->slug]) }}" class="px-5 py-2.5 rounded-full bg-white/10 backdrop-blur-md border border-emerald-400/40 text-sm text-white font-medium shadow-lg hover:bg-emerald-500/20 hover:border-emerald-300/60 hover:scale-105 transition-all duration-300">
                    {{ $subcategory->name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- Products -->
<section class="relative py-12 bg-emerald-900/90">
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <p class="text-emerald-200/70">Menampilkan <span class="text-white font-medium">{{ $products->total() }}</span> produk</p>
            
            <select name="sort" onchange="window.location.href='?sort=' + this.value"
                    class="px-4 py-2 bg-white/10 border border-emerald-500/30 rounded-lg text-sm text-white focus:outline-none focus:border-lime-400">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Rendah - Tinggi</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi - Rendah</option>
                <option value="bestseller" {{ request('sort') == 'bestseller' ? 'selected' : '' }}>Terlaris</option>
            </select>
        </div>
        
        @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            @include('partials.product-card', ['product' => $product])
            @endforeach
        </div>
        
        <div class="mt-8">
            {{ $products->links('vendor.pagination.custom') }}
        </div>
        @else
        <div class="text-center py-16 glass-card rounded-2xl">
            <div class="w-20 h-20 rounded-full bg-emerald-800/50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-2">Belum ada produk</h3>
            <p class="text-emerald-200/70">Produk dalam kategori ini akan segera tersedia</p>
        </div>
        @endif
    </div>
</section>
@endsection
