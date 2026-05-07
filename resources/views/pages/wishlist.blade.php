@extends('layouts.main')

@section('title', 'Wishlist - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/80 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Wishlist</h1>
        <p class="text-emerald-200/70">Produk yang Anda simpan untuk dibeli nanti</p>
    </div>
</section>

<!-- Wishlist Content -->
<section class="relative py-12">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/60 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($wishlists->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($wishlists as $item)
            @include('partials.product-card', ['product' => $item->product])
            @endforeach
        </div>
        
        <div class="mt-8 text-center">
            <button onclick="clearWishlist()" class="px-6 py-3 btn-outline rounded-full text-sm">
                Hapus Semua Wishlist
            </button>
        </div>
        @else
        <div class="text-center py-16 glass-card rounded-2xl">
            <div class="w-20 h-20 rounded-full bg-emerald-800/50 flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-2">Wishlist Kosong</h3>
            <p class="text-emerald-200/70 mb-6">Anda belum menyimpan produk apapun</p>
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 px-6 py-3 btn-lime rounded-full">
                Jelajahi Produk
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        @endif
    </div>
</section>

<script>
function clearWishlist() {
    if (confirm('Apakah Anda yakin ingin menghapus semua wishlist?')) {
        // Implementation untuk clear wishlist
        console.log('Clear wishlist');
    }
}
</script>
@endsection
