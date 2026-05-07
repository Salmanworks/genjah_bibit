@extends('layouts.main')

@section('title', 'Detail Pesanan #' . $order->id . ' - ' . setting('store_name', 'Plant Power'))

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
            <a href="{{ route('orders.index') }}" class="hover:text-white transition-colors">Pesanan</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">Order #{{ $order->id }}</span>
        </nav>
        
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h1 class="text-3xl md:text-4xl font-bold text-white">Detail Pesanan</h1>
            <span class="px-4 py-2 rounded-full text-sm font-medium 
                @if($order->status === 'pending') bg-yellow-500/20 text-yellow-400
                @elseif($order->status === 'processing') bg-blue-500/20 text-blue-400
                @elseif($order->status === 'shipped') bg-purple-500/20 text-purple-400
                @elseif($order->status === 'delivered') bg-green-500/20 text-green-400
                @else bg-red-500/20 text-red-400 @endif">
                {{ $order->status_label }}
            </span>
        </div>
    </div>
</section>

<!-- Order Detail -->
<section class="relative py-12">
    <div class="absolute inset-0 bg-white/5 backdrop-blur-[2px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 glass-card p-4 rounded-xl border-l-4 border-lime-500 bg-lime-500/10">
                <p class="text-lime-400">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 glass-card p-4 rounded-xl border-l-4 border-red-500 bg-red-500/10">
                <p class="text-red-400">{{ session('error') }}</p>
            </div>
        @endif

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Product Info -->
            <div class="lg:col-span-2 space-y-6">
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">Informasi Produk</h3>
                    
                    <div class="flex gap-4 mb-4">
                        <img src="{{ asset('storage/' . $order->product->main_image) }}" 
                             alt="{{ $order->product->name }}" 
                             class="w-24 h-24 object-cover rounded-xl">
                        <div>
                            <h4 class="font-semibold text-white mb-1">{{ $order->product->name }}</h4>
                            <p class="text-sm text-emerald-300/70 line-clamp-2">{{ $order->product->short_description }}</p>
                            <a href="{{ route('products.show', $order->product) }}" 
                               class="text-sm text-lime-400 hover:text-lime-300 mt-2 inline-block">
                                Lihat Produk →
                            </a>
                        </div>
                    </div>
                    
                    <div class="border-t border-white/10 pt-4 mt-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-emerald-300/50">Harga Satuan</p>
                                <p class="text-white">{{ format_price($order->product->price) }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-emerald-300/50">Jumlah</p>
                                <p class="text-white">{{ $order->quantity }} unit</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Info -->
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">Informasi Pengiriman</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-emerald-300/50 mb-1">Alamat Pengiriman</p>
                            <p class="text-white">{{ $order->shipping_address }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-emerald-300/50 mb-1">Nomor WhatsApp</p>
                            <p class="text-white">{{ $order->phone }}</p>
                        </div>
                        @if($order->notes)
                        <div>
                            <p class="text-sm text-emerald-300/50 mb-1">Catatan</p>
                            <p class="text-white">{{ $order->notes }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="space-y-6">
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">Ringkasan Pesanan</h3>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-emerald-300/70">Subtotal</span>
                            <span class="text-white">{{ format_price($order->total_price) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-emerald-300/70">Biaya Pengiriman</span>
                            <span class="text-lime-400">Gratis</span>
                        </div>
                    </div>
                    
                    <div class="border-t border-white/10 pt-4">
                        <div class="flex justify-between">
                            <span class="text-emerald-200">Total</span>
                            <span class="text-2xl font-bold text-lime-400">{{ format_price($order->total_price) }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="glass-card rounded-2xl p-6">
                    <h3 class="text-lg font-bold text-white mb-4">Status Pesanan</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm
                                @if(in_array($order->status, ['pending', 'processing', 'shipped', 'delivered'])) bg-lime-500 text-emerald-950 @else bg-white/10 text-white/50 @endif">
                                1
                            </div>
                            <div>
                                <p class="text-sm font-medium text-white">Pesanan Dibuat</p>
                                <p class="text-xs text-emerald-300/50">{{ $order->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm
                                @if(in_array($order->status, ['processing', 'shipped', 'delivered'])) bg-lime-500 text-emerald-950 @elseif($order->status === 'cancelled') bg-red-500/20 text-red-400 @else bg-white/10 text-white/50 @endif">
                                2
                            </div>
                            <div>
                                <p class="text-sm font-medium @if(in_array($order->status, ['processing', 'shipped', 'delivered'])) text-white @elseif($order->status === 'cancelled') text-red-400 @else text-white/50 @endif">
                                    Diproses
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm
                                @if(in_array($order->status, ['shipped', 'delivered'])) bg-lime-500 text-emerald-950 @elseif($order->status === 'cancelled') bg-red-500/20 text-red-400 @else bg-white/10 text-white/50 @endif">
                                3
                            </div>
                            <div>
                                <p class="text-sm font-medium @if(in_array($order->status, ['shipped', 'delivered'])) text-white @elseif($order->status === 'cancelled') text-red-400 @else text-white/50 @endif">
                                    Dikirim
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm
                                @if($order->status === 'delivered') bg-lime-500 text-emerald-950 @elseif($order->status === 'cancelled') bg-red-500/20 text-red-400 @else bg-white/10 text-white/50 @endif">
                                4
                            </div>
                            <div>
                                <p class="text-sm font-medium @if($order->status === 'delivered') text-white @elseif($order->status === 'cancelled') text-red-400 @else text-white/50 @endif">
                                    Selesai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Actions -->
                <div class="space-y-3">
                    @if($order->status === 'pending')
                        <form action="{{ route('orders.cancel', $order) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" 
                                    class="w-full px-4 py-3 bg-red-500/20 hover:bg-red-500/30 text-red-400 rounded-xl transition-all"
                                    onclick="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                Batalkan Pesanan
                            </button>
                        </form>
                    @endif
                    
                    <a href="{{ whatsapp_link('Halo, saya ingin menanyakan tentang pesanan #' . $order->id) }}" 
                       target="_blank"
                       class="w-full px-4 py-3 bg-green-500/20 hover:bg-green-500/30 text-green-400 rounded-xl transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                        </svg>
                        Hubungi Admin
                    </a>
                    
                    <a href="{{ route('orders.index') }}" 
                       class="w-full px-4 py-3 rounded-xl border border-white/20 text-white hover:bg-white/10 transition-all text-center block">
                        Kembali ke Daftar Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
