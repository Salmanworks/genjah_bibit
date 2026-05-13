@extends('layouts.main')

@section('title', 'Pesanan Saya - ' . setting('store_name', 'Genjah Rumah Bibit'))

@section('content')
<style>
    /* Halaman pesanan: paksa ukuran gambar & warna teks (menangkal CSS global / cache view) */
    .orders-index-scope .order-thumb {
        width: 8.75rem;
        height: 8.75rem;
        max-width: min(8.75rem, 42vw);
        max-height: min(8.75rem, 42vw);
        overflow: hidden;
        border-radius: 0.75rem;
        flex-shrink: 0;
        background: #f4f4f5;
        border: 1px solid #e4e4e7;
    }
    .orders-index-scope .order-thumb img {
        width: 100% !important;
        height: 100% !important;
        max-width: 100% !important;
        max-height: 100% !important;
        object-fit: cover !important;
        object-position: center !important;
        display: block !important;
    }
    .orders-index-scope .order-card-title {
        color: #18181b !important;
    }
    .orders-index-scope .order-card-body,
    .orders-index-scope .order-card-body dd {
        color: #18181b !important;
    }
    .orders-index-scope .order-card-label {
        color: #52525c !important;
    }
    .orders-index-scope .order-price-total {
        color: #166534 !important;
    }
</style>

<div class="orders-index-scope">
<section class="relative pt-32 pb-8" style="background: linear-gradient(135deg, #f4f1ea 0%, #e8e4d8 100%);">
    <div class="absolute inset-0 opacity-25 pointer-events-none" style="background-image: radial-gradient(circle, #3d5c38 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0" style="background:#5A7058;">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl md:text-4xl font-black tracking-tight order-card-title">Pesanan Saya</h1>
                <p class="text-sm font-medium order-card-label">Riwayat dan detail pemesanan Anda</p>
            </div>
        </div>
    </div>
</section>

<section class="relative py-10 pb-28 sm:pb-32" style="background: #f4f1ea;">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl border border-zinc-200 bg-zinc-50 text-zinc-900">
                <p class="text-sm font-semibold">{{ session('success') }}</p>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 p-4 rounded-2xl border border-red-200 bg-red-50 text-red-900">
                <p class="text-sm font-semibold">{{ session('error') }}</p>
            </div>
        @endif

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                    @php
                        $p = $order->product;
                        $unitStored = $order->quantity > 0 ? $order->total_price / $order->quantity : 0;
                    @endphp
                    <article class="rounded-2xl border border-zinc-200 bg-white shadow-sm hover:shadow-md transition-shadow">
                        <div class="p-5 sm:p-6 order-card-body">
                            {{-- Mobile: detail dulu; desktop: gambar kiri, detail kanan --}}
                            <div class="flex flex-col-reverse gap-5 sm:flex-row sm:items-start">
                                <div class="flex flex-1 min-w-0 flex-col gap-4">
                                    <div class="flex flex-wrap items-start justify-between gap-3">
                                        <div class="min-w-0">
                                            <h3 class="text-lg sm:text-xl font-bold leading-snug order-card-title">{{ $p->name }}</h3>
                                            <p class="text-xs font-medium mt-1 order-card-label">Order #{{ $order->id }} · {{ $order->created_at->format('d M Y, H:i') }}</p>
                                        </div>
                                        <span class="shrink-0 px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide border
                                            @if($order->status === 'pending') bg-amber-50 text-amber-900 border-amber-200
                                            @elseif($order->status === 'processing') bg-sky-50 text-sky-900 border-sky-200
                                            @elseif($order->status === 'shipped') bg-violet-50 text-violet-900 border-violet-200
                                            @elseif($order->status === 'delivered') bg-emerald-50 text-emerald-900 border-emerald-200
                                            @else bg-red-50 text-red-900 border-red-200 @endif">
                                            {{ $order->status_label }}
                                        </span>
                                    </div>

                                    <dl class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 text-sm">
                                        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-3">
                                            <dt class="order-card-label font-semibold text-xs uppercase tracking-wide mb-1">Jumlah</dt>
                                            <dd class="font-bold">{{ $order->quantity }} unit</dd>
                                        </div>
                                        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-3">
                                            <dt class="order-card-label font-semibold text-xs uppercase tracking-wide mb-1">Harga satuan (sekarang)</dt>
                                            <dd class="font-bold">{{ format_price($p->price) }}</dd>
                                        </div>
                                        <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-3 sm:col-span-2 lg:col-span-1">
                                            <dt class="font-semibold text-xs uppercase tracking-wide mb-1" style="color:#3f3f46;">Total pesanan (tersimpan)</dt>
                                            <dd class="text-lg font-black tabular-nums order-price-total">{{ format_price($order->total_price) }}</dd>
                                            @if(round((float) $p->price, 2) !== round((float) $unitStored, 2))
                                                <p class="text-xs mt-1" style="color:#92400e;">Harga produk berubah. <a href="{{ route('orders.edit', $order) }}" class="font-semibold underline">Ubah &amp; sinkronkan</a>.</p>
                                            @endif
                                        </div>
                                        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-3 sm:col-span-2">
                                            <dt class="order-card-label font-semibold text-xs uppercase tracking-wide mb-1">WhatsApp</dt>
                                            <dd class="font-medium break-all">{{ $order->phone }}</dd>
                                        </div>
                                        <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-3 sm:col-span-2 lg:col-span-3">
                                            <dt class="order-card-label font-semibold text-xs uppercase tracking-wide mb-1">Alamat pengiriman</dt>
                                            <dd class="leading-relaxed">{{ $order->shipping_address }}</dd>
                                        </div>
                                        @if($order->notes)
                                            <div class="rounded-xl border border-zinc-200 bg-zinc-50 p-3 sm:col-span-2 lg:col-span-3">
                                                <dt class="order-card-label font-semibold text-xs uppercase tracking-wide mb-1">Catatan</dt>
                                                <dd class="leading-relaxed">{{ $order->notes }}</dd>
                                            </div>
                                        @endif
                                    </dl>

                                    <div class="flex flex-wrap gap-2 pt-1">
                                        <a href="{{ route('orders.show', $order) }}"
                                           class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold text-white transition-opacity hover:opacity-90"
                                           style="background:#5A7058;">
                                            Detail
                                        </a>
                                        @if($order->status === 'pending')
                                            <a href="{{ route('orders.edit', $order) }}"
                                               class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl border-2 border-zinc-400 bg-white text-sm font-bold text-zinc-900 hover:bg-zinc-50">
                                                Ubah data
                                            </a>
                                            <form action="{{ route('orders.cancel', $order) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl border border-red-200 bg-red-50 text-sm font-bold text-red-800 hover:bg-red-100"
                                                        onclick="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                                    Batalkan
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                <div class="order-thumb mx-auto sm:mx-0 sm:mt-0">
                                    <img src="{{ $p->image_url }}"
                                         alt="{{ $p->name }}"
                                         width="140"
                                         height="140"
                                         loading="lazy">
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $orders->links('vendor.pagination.custom') }}
            </div>
        @else
            <div class="rounded-2xl border border-zinc-200 bg-white py-20 text-center shadow-sm">
                <div class="mx-auto mb-5 flex h-20 w-20 items-center justify-center rounded-full bg-zinc-100">
                    <svg class="h-10 w-10" style="color:#5A7058;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
                <h3 class="mb-2 text-xl font-bold order-card-title">Belum ada pesanan</h3>
                <p class="order-card-label mx-auto mb-8 max-w-md">Mulai belanja dan pesanan Anda akan muncul di halaman ini.</p>
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center gap-2 rounded-xl px-8 py-3.5 font-bold text-white hover:opacity-90"
                   style="background:#5A7058;">
                    Belanja sekarang
                </a>
            </div>
        @endif
    </div>
</section>
</div>
@endsection
