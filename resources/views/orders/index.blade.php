@extends('layouts.main')

@section('title', 'Pesanan Saya - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12">
    <div class="absolute inset-0 bg-white/10 backdrop-blur-sm"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Pesanan Saya</h1>
        <p class="text-emerald-200/70">Kelola dan pantau status pemesanan Anda</p>
    </div>
</section>

<!-- Orders List -->
<section class="relative py-12">
    <div class="absolute inset-0 bg-white/5 backdrop-blur-[2px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 glass-card p-4 rounded-xl border-l-4 border-lime-500 bg-lime-500/10">
                <p class="text-lime-400">{{ session('success') }}</p>
            </div>
        @endif

        @if($orders->count() > 0)
            <div class="space-y-4">
                @foreach($orders as $order)
                <div class="glass-card rounded-2xl p-6">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <!-- Product Image -->
                        <div class="w-full lg:w-32 h-32 flex-shrink-0">
                            <img src="{{ asset('storage/' . $order->product->main_image) }}" 
                                 alt="{{ $order->product->name }}" 
                                 class="w-full h-full object-cover rounded-xl">
                        </div>
                        
                        <!-- Order Info -->
                        <div class="flex-1">
                            <div class="flex flex-wrap items-start justify-between gap-4 mb-3">
                                <div>
                                    <h3 class="text-lg font-bold text-white mb-1">{{ $order->product->name }}</h3>
                                    <p class="text-sm text-emerald-300/50">Order #{{ $order->id }} • {{ $order->created_at->format('d M Y') }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-sm font-medium 
                                    @if($order->status === 'pending') bg-yellow-500/20 text-yellow-400
                                    @elseif($order->status === 'processing') bg-blue-500/20 text-blue-400
                                    @elseif($order->status === 'shipped') bg-purple-500/20 text-purple-400
                                    @elseif($order->status === 'delivered') bg-green-500/20 text-green-400
                                    @else bg-red-500/20 text-red-400 @endif">
                                    {{ $order->status_label }}
                                </span>
                            </div>
                            
                            <div class="grid sm:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <p class="text-xs text-emerald-300/50">Jumlah</p>
                                    <p class="text-white">{{ $order->quantity }} unit</p>
                                </div>
                                <div>
                                    <p class="text-xs text-emerald-300/50">Total Harga</p>
                                    <p class="text-lime-400 font-semibold">{{ format_price($order->total_price) }}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-emerald-300/50">Pengiriman</p>
                                    <p class="text-white truncate">{{ $order->shipping_address }}</p>
                                </div>
                            </div>
                            
                            <div class="flex flex-wrap gap-3">
                                <a href="{{ route('orders.show', $order) }}" 
                                   class="px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 text-white text-sm transition-all">
                                    Detail Pesanan
                                </a>
                                @if($order->status === 'pending')
                                    <form action="{{ route('orders.cancel', $order) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="px-4 py-2 rounded-lg bg-red-500/20 hover:bg-red-500/30 text-red-400 text-sm transition-all"
                                                onclick="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                            Batalkan
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-8">
                {{ $orders->links('vendor.pagination.custom') }}
            </div>
        @else
            <div class="text-center py-16 glass-card rounded-2xl">
                <div class="w-20 h-20 rounded-full bg-emerald-800/50 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Pesanan</h3>
                <p class="text-emerald-200/70 mb-6">Anda belum membuat pesanan apapun</p>
                <a href="{{ route('products.index') }}" 
                   class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-lime-500 to-emerald-500 text-emerald-950 font-semibold rounded-xl transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    Belanja Sekarang
                </a>
            </div>
        @endif
    </div>
</section>
@endsection
