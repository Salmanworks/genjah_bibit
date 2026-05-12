@extends('layouts.main')

@section('title', 'Pesan Bibit - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-8">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex flex-wrap items-center gap-2 text-sm text-emerald-900/60 mb-4">
            <a href="{{ route('home') }}" class="hover:text-emerald-950 transition-colors">Beranda</a>
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('products.index') }}" class="hover:text-emerald-950 transition-colors">Produk</a>
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('products.show', $product) }}" class="hover:text-emerald-950 transition-colors">{{ $product->name }}</a>
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-emerald-950 font-medium">Pesan</span>
        </nav>

        <h1 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-2">Form Pemesanan</h1>
        <p class="text-emerald-900/70">Lengkapi data pemesanan Anda</p>
    </div>
</section>

<!-- Order Form: extra bottom padding so tombol & form tidak tertutup WA floating / viewport pendek -->
<section class="relative pb-28 sm:pb-32">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-8 lg:items-start">
            <!-- Product Info -->
            <div class="space-y-6 min-w-0">
                <div class="glass-card rounded-2xl overflow-hidden border border-emerald-900/10">
                    <div class="w-full aspect-[4/3] max-h-56 sm:max-h-64 overflow-hidden bg-emerald-100/80">
                        <img src="{{ $product->image_url }}"
                             alt="{{ $product->name }}"
                             width="800"
                             height="600"
                             class="w-full h-full object-cover object-center block">
                    </div>
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-emerald-950 mb-2">{{ $product->name }}</h2>
                        <p class="text-emerald-900/70 text-sm mb-4 line-clamp-2">{{ $product->short_description }}</p>
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-sm text-emerald-900/60">Harga per unit</p>
                                <p class="text-2xl font-bold text-emerald-800">{{ format_price($product->price) }}</p>
                            </div>
                            <div class="text-right shrink-0">
                                <p class="text-sm text-emerald-900/60">Stok</p>
                                <p class="text-emerald-950 font-medium">{{ $product->stock }} unit</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="glass-card p-4 rounded-xl text-center border border-emerald-900/10">
                        <svg class="w-8 h-8 text-emerald-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <p class="text-sm font-medium text-emerald-950">Bibit Berkualitas</p>
                    </div>
                    <div class="glass-card p-4 rounded-xl text-center border border-emerald-900/10">
                        <svg class="w-8 h-8 text-emerald-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm font-medium text-emerald-950">Pengiriman Cepat</p>
                    </div>
                </div>

                <a href="{{ route('products.index') }}"
                   class="block w-full text-center px-4 py-3 rounded-xl border-2 border-stone-400 bg-white text-neutral-900 font-semibold shadow-sm hover:bg-stone-100 hover:border-stone-500 transition-colors">
                    Ganti produk lain
                </a>
            </div>

            <!-- Order Form -->
            <div class="glass-card rounded-2xl p-6 lg:p-8 border border-emerald-900/10 min-w-0 overflow-visible">
                <h3 class="text-xl font-bold text-neutral-900 mb-6">Data Pemesanan</h3>

                <form action="{{ route('orders.store') }}" method="POST" class="space-y-6 pb-2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <!-- Quantity -->
                    <div>
                        <label for="quantity" class="block text-sm font-semibold text-neutral-800 mb-2">Jumlah Pesanan</label>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="decrementQty()"
                                    class="w-10 h-10 rounded-lg bg-white border border-neutral-300 text-neutral-900 hover:bg-emerald-50 hover:border-emerald-700/40 transition-all flex items-center justify-center"
                                    aria-label="Kurangi jumlah">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/>
                                </svg>
                            </button>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}"
                                   class="w-20 px-3 py-2 bg-white border border-neutral-300 rounded-lg text-center text-neutral-900 font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-700"
                                   onchange="calculateTotal()">
                            <button type="button" onclick="incrementQty()"
                                    class="w-10 h-10 rounded-lg bg-white border border-neutral-300 text-neutral-900 hover:bg-emerald-50 hover:border-emerald-700/40 transition-all flex items-center justify-center"
                                    aria-label="Tambah jumlah">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                            </button>
                        </div>
                        @error('quantity')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Total Price (hindari kelas bg-emerald-900/* — di main.blade substring bg-emerald-900 memaksa latar hijau gelap) -->
                    <div class="p-4 rounded-xl bg-green-50 border border-green-200/90 shadow-sm">
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-neutral-900 font-semibold">Total Harga</span>
                            <span class="text-2xl font-bold text-green-800 tabular-nums" id="totalPrice">{{ format_price($product->price) }}</span>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="order-phone" class="block text-sm font-semibold text-neutral-800 mb-2">Nomor WhatsApp</label>
                        <input type="text" name="phone" id="order-phone" value="{{ old('phone', Auth::user()->phone ?? '') }}" required
                               class="w-full px-4 py-3 bg-white border border-neutral-300 rounded-xl text-neutral-900 placeholder:text-neutral-500 focus:outline-none focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-700 transition-colors"
                               placeholder="Contoh: 08123456789">
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Shipping Address -->
                    <div>
                        <label for="shipping_address" class="block text-sm font-semibold text-neutral-800 mb-2">Alamat Pengiriman</label>
                        <textarea name="shipping_address" id="shipping_address" rows="3" required
                                  class="w-full px-4 py-3 bg-white border border-neutral-300 rounded-xl text-neutral-900 placeholder:text-neutral-500 focus:outline-none focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-700 transition-colors resize-y min-h-[5.5rem]"
                                  placeholder="Masukkan alamat lengkap pengiriman">{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="order-notes" class="block text-sm font-semibold text-neutral-800 mb-2">Catatan (Opsional)</label>
                        <textarea name="notes" id="order-notes" rows="2"
                                  class="w-full px-4 py-3 bg-white border border-neutral-300 rounded-xl text-neutral-900 placeholder:text-neutral-500 focus:outline-none focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-700 transition-colors resize-y min-h-[4.5rem]"
                                  placeholder="Catatan tambahan untuk pesanan">{{ old('notes') }}</textarea>
                    </div>

                    <!-- Submit -->
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <a href="{{ route('products.show', $product) }}"
                           class="flex-1 px-6 py-3 rounded-xl border-2 border-stone-400 bg-white text-neutral-900 font-semibold shadow-sm hover:bg-stone-100 hover:border-stone-500 transition-all text-center">
                            Kembali ke detail
                        </a>
                        <button type="submit"
                                class="flex-1 px-6 py-3 btn-lime rounded-xl font-semibold shadow-md">
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
