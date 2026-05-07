@extends('layouts.main')

@section('title', 'Pesan Bibit - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12">
    <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-sm text-emerald-300/70 mb-4">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('products.index') }}" class="hover:text-white transition-colors">Produk</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('products.show', $product) }}" class="hover:text-white transition-colors">{{ $product->name }}</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">Pesan</span>
        </nav>
        
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Form Pemesanan</h1>
        <p class="text-emerald-200/70">Lengkapi data pemesanan Anda</p>
    </div>
</section>

<!-- Order Form -->
<section class="relative py-12">
    <div class="absolute inset-0 bg-white/5 backdrop-blur-[2px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Product Info -->
            <div class="space-y-6">
                <div class="glass-card rounded-2xl overflow-hidden">
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ asset('storage/' . $product->main_image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-white mb-2">{{ $product->name }}</h2>
                        <p class="text-emerald-200/70 text-sm mb-4 line-clamp-2">{{ $product->short_description }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-emerald-300/50">Harga per unit</p>
                                <p class="text-2xl font-bold text-lime-400">{{ format_price($product->price) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-emerald-300/50">Stok</p>
                                <p class="text-white font-medium">{{ $product->stock }} unit</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Features -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="glass-card p-4 rounded-xl text-center">
                        <svg class="w-8 h-8 text-lime-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <p class="text-sm text-white">Bibit Berkualitas</p>
                    </div>
                    <div class="glass-card p-4 rounded-xl text-center">
                        <svg class="w-8 h-8 text-lime-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm text-white">Pengiriman Cepat</p>
                    </div>
                </div>
            </div>
            
            <!-- Order Form -->
            <div class="glass-card rounded-2xl p-6 lg:p-8">
                <h3 class="text-xl font-bold text-white mb-6">Data Pemesanan</h3>
                
                <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    
                    <!-- Quantity -->
                    <div>
                        <label class="block text-sm text-emerald-300/70 mb-2">Jumlah Pesanan</label>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="decrementQty()" 
                                    class="w-10 h-10 rounded-lg bg-white/10 hover:bg-lime-500/20 text-white hover:text-lime-400 transition-all flex items-center justify-center border border-white/10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                </svg>
                            </button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" 
                                   class="w-20 px-3 py-2 bg-white/10 border border-white/20 rounded-lg text-center text-white focus:outline-none focus:border-lime-400"
                                   onchange="calculateTotal()">
                            <button type="button" onclick="incrementQty()" 
                                    class="w-10 h-10 rounded-lg bg-white/10 hover:bg-lime-500/20 text-white hover:text-lime-400 transition-all flex items-center justify-center border border-white/10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </button>
                        </div>
                        @error('quantity')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Total Price -->
                    <div class="glass-card p-4 rounded-xl bg-lime-500/10 border-lime-500/30">
                        <div class="flex items-center justify-between">
                            <span class="text-emerald-200">Total Harga</span>
                            <span class="text-2xl font-bold text-lime-400" id="totalPrice">{{ format_price($product->price) }}</span>
                        </div>
                    </div>
                    
                    <!-- Phone -->
                    <div>
                        <label class="block text-sm text-emerald-300/70 mb-2">Nomor WhatsApp</label>
                        <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}" required
                               class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-400 transition-colors"
                               placeholder="Contoh: 08123456789">
                        @error('phone')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Shipping Address -->
                    <div>
                        <label class="block text-sm text-emerald-300/70 mb-2">Alamat Pengiriman</label>
                        <textarea name="shipping_address" rows="3" required
                                  class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-400 transition-colors resize-none"
                                  placeholder="Masukkan alamat lengkap pengiriman">{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Notes -->
                    <div>
                        <label class="block text-sm text-emerald-300/70 mb-2">Catatan (Opsional)</label>
                        <textarea name="notes" rows="2"
                                  class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-400 transition-colors resize-none"
                                  placeholder="Catatan tambahan untuk pesanan">{{ old('notes') }}</textarea>
                    </div>
                    
                    <!-- Submit -->
                    <div class="flex gap-4">
                        <a href="{{ route('products.show', $product) }}" 
                           class="flex-1 px-6 py-3 rounded-xl border border-white/20 text-white hover:bg-white/10 transition-all text-center">
                            Kembali
                        </a>
                        <button type="submit" 
                                class="flex-1 px-6 py-3 bg-gradient-to-r from-lime-500 to-emerald-500 hover:from-lime-400 hover:to-emerald-400 text-emerald-950 font-semibold rounded-xl transition-all shadow-lg shadow-lime-500/25">
                            Buat Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    const price = {{ $product->price }};
    const stock = {{ $product->stock }};
    
    function incrementQty() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) < stock) {
            input.value = parseInt(input.value) + 1;
            calculateTotal();
        }
    }
    
    function decrementQty() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            calculateTotal();
        }
    }
    
    function calculateTotal() {
        const qty = document.getElementById('quantity').value;
        const total = price * qty;
        document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
</script>
@endsection
