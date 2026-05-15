@extends('layouts.main')

@section('title', $category->name . ' - ' . setting('store_name', 'Plant Power'))

@section('body-class', 'category-page')

@section('content')
@php
    $heroStyle = $category->image
        ? 'background-image: linear-gradient(rgba(244,241,234,0.92), rgba(244,241,234,0.92)), url(' . asset('storage/' . $category->image) . '); background-size: cover; background-position: center;'
        : 'background: #F4F1EA;';
@endphp
<section class="relative pt-28 pb-12 overflow-hidden" style="{{ $heroStyle }}">
    <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(circle, #5A7058 1px, transparent 1px); background-size: 24px 24px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex flex-wrap items-center gap-2 text-sm mb-8">
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

        <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_320px] items-start">
            <div>
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold uppercase tracking-[0.18em] mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                    Kategori
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-4">{{ $category->name }}</h1>
                <p class="max-w-2xl text-gray-600 text-lg leading-relaxed">{{ $category->description }}</p>
            </div>

            <div class="grid gap-4">
                <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6">
                    <p class="text-sm text-gray-500">Total Produk</p>
                    <p class="mt-3 text-3xl font-bold text-gray-900">{{ $products->total() }}</p>
                </div>
                <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6">
                    <p class="text-sm text-gray-500">Subkategori</p>
                    <p class="mt-3 text-3xl font-bold text-gray-900">{{ $category->subcategories->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@if($category->subcategories->count() > 0)
<section class="py-8 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl border border-gray-200 bg-white shadow-sm p-6 md:p-8 flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-50 text-emerald-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-900">Subkategori</p>
                    <p class="text-sm text-gray-500">Pilih varian tanaman terkait</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-3">
                @foreach($category->subcategories as $subcategory)
                <a href="{{ route('products.index', ['subcategory' => $subcategory->slug]) }}" class="inline-flex items-center justify-center rounded-full border border-gray-200 bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-700 transition-all duration-300 hover:border-emerald-300 hover:bg-emerald-600 hover:text-white">
                    {{ $subcategory->name }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<section class="py-12 bg-[#F4F1EA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">
            <p class="text-gray-600">Menampilkan <span class="font-semibold text-gray-900">{{ $products->total() }}</span> produk</p>
            <form action="{{ route('categories.show', $category->slug) }}" method="GET" class="w-full md:w-auto">
                <div class="relative w-full md:w-[220px]">
                    <select name="sort" onchange="this.form.submit()" class="w-full appearance-none rounded-xl border border-emerald-900/10 bg-white px-5 py-3 text-sm font-bold text-emerald-900 outline-none transition-all duration-200 focus:border-lime-500 focus:ring-2 focus:ring-lime-500/30 hover:shadow-sm">
                        <option value="latest" {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Rendah - Tinggi</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi - Rendah</option>
                        <option value="bestseller" {{ request('sort') == 'bestseller' ? 'selected' : '' }}>Terlaris</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center">
                        <svg class="h-4 w-4 text-emerald-900/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
            </form>
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
            <div class="mx-auto mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-emerald-800/50">
                <svg class="h-10 w-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-emerald-950 mb-2">Belum ada produk</h3>
            <p class="text-emerald-950/70">Produk dalam kategori ini akan segera tersedia</p>
        </div>
        @endif
    </div>
</section>
@endsection
