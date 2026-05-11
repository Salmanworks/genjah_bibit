@extends('layouts.main')

@section('title', $category->name . ' - ' . setting('store_name', 'Plant Power'))

@section('body-class', 'category-page')

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12" style="background: linear-gradient(135deg, #F4F1EA 0%, #EBE6DC 100%);">
    <!-- Decorative Pattern -->
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #5A7058 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm mb-6">
            <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Beranda</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">Kategori</a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900 font-semibold">{{ $category->name }}</span>
        </nav>
        
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">
            <div class="lg:w-2/3">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ $category->name }}</h1>
                <p class="text-gray-600 text-lg max-w-xl">{{ $category->description }}</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="lg:w-1/3 flex flex-col sm:flex-row lg:flex-col gap-4">
                <div class="bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl px-6 py-4 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total Produk</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $products->total() }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl px-6 py-4 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Subkategori</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $category->subcategories->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subcategories -->
@if($category->subcategories->count() > 0)
<section class="relative py-8" style="background: #ffffff;">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row lg:items-center gap-6">
            <div class="lg:w-1/4">
                <h2 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                    Subkategori
                </h2>
            </div>
            <div class="lg:w-3/4 flex flex-wrap gap-3">
                @foreach($category->subcategories as $subcategory)
                <a href="{{ route('products.index', ['subcategory' => $subcategory->slug]) }}" 
                   class="px-5 py-2.5 rounded-full bg-gray-100 border border-gray-200 text-sm text-gray-700 font-medium hover:bg-green-600 hover:text-white hover:border-green-600 hover:scale-105 transition-all duration-300 shadow-sm">
                    {{ $subcategory->name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- Products -->
<section class="relative py-12" style="background: #F4F1EA;">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-8">
            <p class="text-gray-600">Menampilkan <span class="text-gray-900 font-semibold">{{ $products->total() }}</span> produk</p>
            
            <select name="sort" onchange="window.location.href='?sort=' + this.value"
                    class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-green-500 focus:ring-2 focus:ring-green-200">
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
