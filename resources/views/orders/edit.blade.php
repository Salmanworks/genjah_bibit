@php $product = $order->product; @endphp
@extends('layouts.main')

@section('title', 'Ubah Pesanan #' . $order->id . ' - ' . setting('store_name', 'Genjah Rumah Bibit'))

@section('content')
<section class="relative pt-32 pb-8">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex flex-wrap items-center gap-2 text-sm text-emerald-900/60 mb-4">
            <a href="{{ route('home') }}" class="hover:text-emerald-950 transition-colors">Beranda</a>
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('orders.index') }}" class="hover:text-emerald-950 transition-colors">Pesanan</a>
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-emerald-950 font-medium">Ubah #{{ $order->id }}</span>
        </nav>
        <h1 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-2">Ubah data pesanan</h1>
        <p class="text-emerald-900/70">Total akan dihitung ulang dari <strong>harga produk terkini</strong> saat Anda menyimpan.</p>
    </div>
</section>

<section class="relative pb-28 sm:pb-32">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($order->quantity > $product->stock)
            <div class="mb-6 p-4 rounded-xl border border-amber-300 bg-amber-50 text-amber-950 text-sm">
                Stok saat ini ({{ $product->stock }} unit) lebih kecil dari jumlah pesanan Anda ({{ $order->quantity }}). Kurangi jumlah agar sesuai stok, atau batalkan pesanan.
            </div>
        @endif

        <div class="grid lg:grid-cols-2 gap-8 lg:items-start">
            <div class="glass-card rounded-2xl overflow-hidden border border-emerald-900/10 p-6 space-y-4">
                <p class="text-xs font-bold uppercase tracking-wider text-emerald-900/50">Produk (tidak dapat diganti di sini)</p>
                <div class="flex gap-4 items-start">
                    <div class="shrink-0 w-24 h-24 sm:w-28 sm:h-28 rounded-xl overflow-hidden bg-stone-100 ring-1 ring-stone-200">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-full object-cover" width="112" height="112">
                    </div>
                    <div class="min-w-0">
                        <h2 class="text-lg font-bold text-emerald-950 leading-snug">{{ $product->name }}</h2>
                        <p class="text-sm text-emerald-900/70 mt-1 line-clamp-2">{{ $product->short_description }}</p>
                        <p class="text-sm text-emerald-900/60 mt-2">Harga terkini: <span class="font-bold text-emerald-800">{{ format_price($product->price) }}</span> / unit</p>
                        <p class="text-sm text-emerald-900/60">Stok: <span class="font-semibold text-emerald-950">{{ $product->stock }} unit</span></p>
                    </div>
                </div>
                <a href="{{ route('orders.index') }}" class="inline-block text-sm font-semibold text-emerald-800 hover:text-emerald-950 underline">← Kembali ke daftar pesanan</a>
            </div>

            <div class="glass-card rounded-2xl p-6 lg:p-8 border border-emerald-900/10 min-w-0">
                <h3 class="text-xl font-bold text-neutral-900 mb-6">Data pemesanan</h3>

                <form action="{{ route('orders.update', $order) }}" method="POST" class="space-y-6 pb-2">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="quantity" class="block text-sm font-semibold text-neutral-800 mb-2">Jumlah</label>
                        <div class="flex items-center gap-3">
                            <button type="button" onclick="decrementQty()" class="w-10 h-10 rounded-lg bg-white border border-neutral-300 text-neutral-900 hover:bg-stone-50 flex items-center justify-center" aria-label="Kurangi">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                            </button>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->quantity) }}" min="1" max="{{ max(1, (int) $product->stock) }}"
                                   class="w-20 px-3 py-2 bg-white border border-neutral-300 rounded-lg text-center text-neutral-900 font-semibold focus:outline-none focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-700"
                                   onchange="calculateTotal()">
                            <button type="button" onclick="incrementQty()" class="w-10 h-10 rounded-lg bg-white border border-neutral-300 text-neutral-900 hover:bg-stone-50 flex items-center justify-center" aria-label="Tambah">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </button>
                        </div>
                        @error('quantity')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="p-4 rounded-xl bg-green-50 border border-green-200/90 shadow-sm">
                        <div class="flex items-center justify-between gap-4">
                            <span class="text-neutral-900 font-semibold">Total (preview)</span>
                            <span class="text-2xl font-bold text-green-800 tabular-nums" id="totalPrice">{{ format_price($product->price * old('quantity', $order->quantity)) }}</span>
                        </div>
                        <p class="text-xs text-neutral-600 mt-2">Angka di atas memakai harga toko saat ini × jumlah.</p>
                    </div>

                    <div>
                        <label for="order-phone" class="block text-sm font-semibold text-neutral-800 mb-2">Nomor WhatsApp</label>
                        <input type="text" name="phone" id="order-phone" value="{{ old('phone', $order->phone) }}" required
                               class="w-full px-4 py-3 bg-white border border-neutral-300 rounded-xl text-neutral-900 placeholder:text-neutral-500 focus:outline-none focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-700"
                               placeholder="08…">
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="shipping_address" class="block text-sm font-semibold text-neutral-800 mb-2">Alamat pengiriman</label>
                        <textarea name="shipping_address" id="shipping_address" rows="3" required
                                  class="w-full px-4 py-3 bg-white border border-neutral-300 rounded-xl text-neutral-900 placeholder:text-neutral-500 focus:outline-none focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-700 resize-y min-h-[5.5rem]">{{ old('shipping_address', $order->shipping_address) }}</textarea>
                        @error('shipping_address')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="order-notes" class="block text-sm font-semibold text-neutral-800 mb-2">Catatan (opsional)</label>
                        <textarea name="notes" id="order-notes" rows="2"
                                  class="w-full px-4 py-3 bg-white border border-neutral-300 rounded-xl text-neutral-900 placeholder:text-neutral-500 focus:outline-none focus:ring-2 focus:ring-emerald-600/40 focus:border-emerald-700 resize-y min-h-[4.5rem]">{{ old('notes', $order->notes) }}</textarea>
                        @error('notes')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('orders.index') }}" class="flex-1 px-6 py-3 rounded-xl border-2 border-stone-400 bg-white text-neutral-900 font-semibold text-center hover:bg-stone-100">Batal</a>
                        <button type="submit" class="flex-1 px-6 py-3 btn-lime rounded-xl font-semibold shadow-md">Simpan perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    const unitPrice = {{ (float) $product->price }};
    const stock = {{ (int) $product->stock }};

    function incrementQty() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value, 10) < stock) {
            input.value = parseInt(input.value, 10) + 1;
            calculateTotal();
        }
    }
    function decrementQty() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value, 10) > 1) {
            input.value = parseInt(input.value, 10) - 1;
            calculateTotal();
        }
    }
    function calculateTotal() {
        let qty = parseInt(document.getElementById('quantity').value, 10);
        if (isNaN(qty) || qty < 1) qty = 1;
        if (qty > stock) qty = stock;
        document.getElementById('quantity').value = qty;
        const total = unitPrice * qty;
        document.getElementById('totalPrice').textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
</script>
@endsection
