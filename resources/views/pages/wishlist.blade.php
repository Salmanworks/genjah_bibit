@extends('layouts.main')

@section('title', 'Wishlist - ' . setting('store_name', 'Genjah Rumah Bibit'))

@section('content')
<!-- Hero Header dengan Background Pattern -->
<section class="relative pt-32 pb-16" style="background: linear-gradient(135deg, #f4f1ea 0%, #e8e4d8 100%);">
    <!-- Dot Grid Pattern -->
    <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle, #3d5c38 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <!-- Radial Glows -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-pink-400/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-lime-400/10 rounded-full blur-3xl"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-2xl bg-pink-500 flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl md:text-4xl font-black text-emerald-950 tracking-tight">Wishlist Saya</h1>
                <p class="text-sm text-emerald-950/60 font-medium">Produk favorit yang Anda simpan untuk dibeli nanti</p>
            </div>
        </div>
        
        @if($wishlists->count() > 0)
        <div class="mt-6 flex items-center gap-4">
            <div class="px-4 py-2 bg-white/80 backdrop-blur-sm rounded-full border border-emerald-950/10">
                <p class="text-sm font-bold text-emerald-950">
                    <span class="text-pink-500">{{ $wishlists->count() }}</span> Produk Tersimpan
                </p>
            </div>
        </div>
        @endif
    </div>
    
    <!-- Wave Transition -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
            <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="#f4f1ea"/>
        </svg>
    </div>
</section>

<!-- Wishlist Content -->
<section class="relative py-12" style="background: #f4f1ea;">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($wishlists->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @foreach($wishlists as $item)
            @include('partials.product-card', ['product' => $item->product])
            @endforeach
        </div>
        
        <div class="text-center pt-8 border-t border-emerald-950/10">
            <button onclick="clearWishlist()" class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white text-red-600 font-bold text-sm hover:bg-red-50 transition-all duration-300 border border-red-200 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Hapus Semua Wishlist
            </button>
        </div>
        @else
        <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-emerald-950/5">
            <div class="w-24 h-24 rounded-full bg-gradient-to-br from-pink-100 to-red-100 flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-black text-emerald-950 mb-2">Wishlist Kosong</h3>
            <p class="text-emerald-950/60 mb-8 font-medium">Anda belum menyimpan produk apapun. Yuk jelajahi produk favorit!</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-emerald-900 text-white font-bold rounded-full hover:bg-lime-500 hover:text-emerald-950 transition-all duration-300 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Jelajahi Produk
            </a>
        </div>
        @endif
    </div>
</section>

<script>
function clearWishlist() {
    if (confirm('Apakah Anda yakin ingin menghapus semua wishlist?')) {
        // Get all wishlist items
        const wishlistItems = document.querySelectorAll('[data-wishlist-id]');
        
        wishlistItems.forEach(item => {
            const productId = item.getAttribute('data-wishlist-id');
            // Remove from wishlist
            toggleWishlist(productId);
        });
        
        // Reload page after a short delay
        setTimeout(() => {
            window.location.reload();
        }, 500);
    }
}
</script>
@endsection
