@extends('layouts.main')

@section('title', 'Detail Pesanan #' . $order->id . ' - ' . setting('store_name', 'Genjah Rumah Bibit'))

@section('content')
@php $p = $order->product; @endphp
<style>
    .order-show-scope .order-show-thumb {
        width: 7.5rem;
        height: 7.5rem;
        max-width: min(7.5rem, 36vw);
        max-height: min(7.5rem, 36vw);
        overflow: hidden;
        border-radius: 0.75rem;
        flex-shrink: 0;
        background: #f4f4f5;
        border: 1px solid #e4e4e7;
    }
    .order-show-scope .order-show-thumb img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        object-position: center !important;
        display: block !important;
    }
</style>

<div class="order-show-scope">
    <section class="relative pt-32 pb-8" style="background: linear-gradient(135deg, #f4f1ea 0%, #e8e4d8 100%);">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex flex-wrap items-center gap-2 text-sm text-zinc-600 mb-4">
                <a href="{{ route('home') }}" class="hover:text-zinc-900 font-medium">Beranda</a>
                <svg class="w-4 h-4 shrink-0 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('orders.index') }}" class="hover:text-zinc-900 font-medium">Pesanan</a>
                <svg class="w-4 h-4 shrink-0 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-zinc-900 font-semibold">#{{ $order->id }}</span>
            </nav>
            <div class="flex flex-wrap items-center justify-between gap-4">
                <h1 class="text-3xl md:text-4xl font-bold text-zinc-900">Detail Pesanan</h1>
                <span class="px-4 py-2 rounded-full text-sm font-bold border
                    @if($order->status === 'pending') bg-amber-50 text-amber-900 border-amber-200
                    @elseif($order->status === 'processing') bg-sky-50 text-sky-900 border-sky-200
                    @elseif($order->status === 'shipped') bg-violet-50 text-violet-900 border-violet-200
                    @elseif($order->status === 'delivered') bg-emerald-50 text-emerald-900 border-emerald-200
                    @else bg-red-50 text-red-900 border-red-200 @endif">
                    {{ $order->status_label }}
                </span>
            </div>
        </div>
    </section>

    <section class="relative py-10 pb-28 sm:pb-32" style="background: #f4f1ea;">
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-xl border border-zinc-200 bg-zinc-50 p-4 text-zinc-900">
                    <p class="text-sm font-semibold">{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-900">
                    <p class="text-sm font-semibold">{{ session('error') }}</p>
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-3">
                <div class="space-y-6 lg:col-span-2">
                    {{-- Produk: gambar kecil + teks jelas --}}
                    <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-bold text-zinc-900 mb-4">Informasi Produk</h2>
                        <div class="flex flex-col-reverse gap-4 sm:flex-row sm:items-start">
                            <div class="min-w-0 flex-1 space-y-3">
                                <h3 class="text-xl font-bold text-zinc-900 leading-snug">{{ $p->name }}</h3>
                                @if($p->short_description)
                                    <p class="text-sm text-zinc-600 leading-relaxed line-clamp-3">{{ $p->short_description }}</p>
                                @endif
                                <a href="{{ route('products.show', $p->slug) }}" class="inline-flex text-sm font-semibold hover:underline" style="color:#3d5c38;">Lihat halaman produk →</a>
                                <div class="grid grid-cols-2 gap-4 border-t border-zinc-200 pt-4">
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500 mb-1">Harga satuan (sekarang)</p>
                                        <p class="text-base font-bold text-zinc-900">{{ format_price($p->price) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500 mb-1">Jumlah pesanan</p>
                                        <p class="text-base font-bold text-zinc-900">{{ $order->quantity }} unit</p>
                                    </div>
                                </div>
                            </div>
                            <div class="order-show-thumb mx-auto sm:mx-0 sm:shrink-0">
                                <img src="{{ $p->image_url }}" alt="{{ $p->name }}" width="120" height="120" loading="lazy">
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-bold text-zinc-900 mb-4">Informasi Pengiriman</h2>
                        <div class="space-y-4 text-sm">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500 mb-1">Alamat pengiriman</p>
                                <p class="text-zinc-900 leading-relaxed whitespace-pre-line">{{ $order->shipping_address }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500 mb-1">Nomor WhatsApp</p>
                                <p class="text-zinc-900 font-medium">{{ $order->phone }}</p>
                            </div>
                            @if($order->notes)
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500 mb-1">Catatan</p>
                                    <p class="text-zinc-900 leading-relaxed whitespace-pre-line">{{ $order->notes }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-bold text-zinc-900 mb-4">Ringkasan Pesanan</h2>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between gap-4">
                                <span class="text-zinc-600">Subtotal</span>
                                <span class="font-semibold text-zinc-900 tabular-nums">{{ format_price($order->total_price) }}</span>
                            </div>
                            <div class="flex justify-between gap-4">
                                <span class="text-zinc-600">Biaya pengiriman</span>
                                <span class="font-semibold" style="color:#166534;">Gratis</span>
                            </div>
                        </div>
                        <div class="mt-4 border-t border-zinc-200 pt-4 flex justify-between items-baseline gap-4">
                            <span class="font-bold text-zinc-900">Total</span>
                            <span class="text-2xl font-black tabular-nums" style="color:#166534;">{{ format_price($order->total_price) }}</span>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
                        <h2 class="text-lg font-bold text-zinc-900 mb-4">Status pesanan</h2>
                        <ol class="space-y-4">
                            <li class="flex gap-3">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-xs font-bold
                                    {{ in_array($order->status, ['pending', 'processing', 'shipped', 'delivered']) ? 'bg-emerald-600 text-white' : 'bg-zinc-200 text-zinc-500' }}">1</span>
                                <div>
                                    <p class="text-sm font-semibold text-zinc-900">Pesanan dibuat</p>
                                    <p class="text-xs text-zinc-500">{{ $order->created_at->format('d M Y H:i') }}</p>
                                </div>
                            </li>
                            <li class="flex gap-3">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-xs font-bold
                                    {{ in_array($order->status, ['processing', 'shipped', 'delivered']) ? 'bg-emerald-600 text-white' : ($order->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-zinc-200 text-zinc-500') }}">2</span>
                                <div>
                                    <p class="text-sm font-semibold {{ $order->status === 'cancelled' ? 'text-red-700' : 'text-zinc-900' }}">Diproses</p>
                                </div>
                            </li>
                            <li class="flex gap-3">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-xs font-bold
                                    {{ in_array($order->status, ['shipped', 'delivered']) ? 'bg-emerald-600 text-white' : ($order->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-zinc-200 text-zinc-500') }}">3</span>
                                <div>
                                    <p class="text-sm font-semibold {{ $order->status === 'cancelled' ? 'text-red-700' : 'text-zinc-900' }}">Dikirim</p>
                                </div>
                            </li>
                            <li class="flex gap-3">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-xs font-bold
                                    {{ $order->status === 'delivered' ? 'bg-emerald-600 text-white' : ($order->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-zinc-200 text-zinc-500') }}">4</span>
                                <div>
                                    <p class="text-sm font-semibold {{ $order->status === 'cancelled' ? 'text-red-700' : 'text-zinc-900' }}">Selesai</p>
                                </div>
                            </li>
                        </ol>
                    </div>

                    <div class="space-y-3">
                        @if($order->status === 'pending')
                            <a href="{{ route('orders.edit', $order) }}"
                               class="block w-full rounded-xl border-2 border-zinc-400 bg-white px-4 py-3 text-center text-sm font-bold text-zinc-900 hover:bg-zinc-50">
                                Ubah data pesanan
                            </a>
                            <form action="{{ route('orders.cancel', $order) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="w-full rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-bold text-red-800 hover:bg-red-100"
                                        onclick="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                    Batalkan pesanan
                                </button>
                            </form>
                        @endif

                        <a href="{{ whatsapp_link('Halo, saya ingin menanyakan tentang pesanan #' . $order->id) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="flex w-full items-center justify-center gap-2 rounded-xl px-4 py-3 text-sm font-bold text-white hover:opacity-90"
                           style="background:#25D366;">
                            <svg class="h-5 w-5 shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                            Hubungi admin
                        </a>

                        <a href="{{ route('orders.index') }}"
                           class="block w-full rounded-xl border-2 border-zinc-300 bg-white px-4 py-3 text-center text-sm font-bold text-zinc-900 hover:bg-zinc-50">
                            Kembali ke daftar pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
