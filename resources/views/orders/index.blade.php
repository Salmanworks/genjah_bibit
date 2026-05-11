@extends('layouts.main')

@section('title', 'Pesanan Saya - ' . setting('store_name', 'Genjah Rumah Bibit'))

@section('content')
<!-- Hero Header dengan Background Pattern -->
<section class="relative pt-32 pb-16" style="background: linear-gradient(135deg, #f4f1ea 0%, #e8e4d8 100%);">
    <!-- Dot Grid Pattern -->
    <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle, #3d5c38 1px, transparent 1px); background-size: 24px 24px;"></div>
    
    <!-- Radial Glows -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-lime-400/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-900 flex items-center justify-center">
                <svg class="w-6 h-6 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <div>
                <h1 class="text-3xl md:text-4xl font-black text-emerald-950 tracking-tight">Pesanan Saya</h1>
                <p class="text-sm text-emerald-950/60 font-medium">Kelola dan pantau status pemesanan Anda</p>
            </div>
        </div>
    </div>
    
    <!-- Wave Transition -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
            <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="#f4f1ea"/>
        </svg>
    </div>
</section>

<!-- Orders List -->
<section class="relative py-12" style="background: #f4f1ea;">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-lime-500/10 border border-lime-500/20">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-lime-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm font-semibold text-lime-900">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                <div class="bg-white rounded-3xl shadow-sm border border-emerald-950/5 overflow-hidden hover:shadow-md transition-all duration-300">
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row gap-6">
                            <!-- Product Image -->
                            <div class="w-full lg:w-40 h-40 flex-shrink-0">
                                <div class="relative w-full h-full rounded-2xl overflow-hidden bg-emerald-50">
                                    <img src="{{ asset('storage/' . $order->product->main_image) }}" 
                                         alt="{{ $order->product->name }}" 
                                         class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/20 to-transparent"></div>
                                </div>
                            </div>
                            
                            <!-- Order Info -->
                            <div class="flex-1">
                                <div class="flex flex-wrap items-start justify-between gap-4 mb-4">
                                    <div>
                                        <h3 class="text-xl font-black text-emerald-950 mb-1">{{ $order->product->name }}</h3>
                                        <p class="text-xs text-emerald-950/40 font-semibold uppercase tracking-wider">Order #{{ $order->id }} • {{ $order->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                    <span class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider
                                        @if($order->status === 'pending') bg-yellow-100 text-yellow-700 border border-yellow-200
                                        @elseif($order->status === 'processing') bg-blue-100 text-blue-700 border border-blue-200
                                        @elseif($order->status === 'shipped') bg-purple-100 text-purple-700 border border-purple-200
                                        @elseif($order->status === 'delivered') bg-green-100 text-green-700 border border-green-200
                                        @else bg-red-100 text-red-700 border border-red-200 @endif">
                                        {{ $order->status_label }}
                                    </span>
                                </div>
                                
                                <div class="grid sm:grid-cols-3 gap-4 mb-6 p-4 bg-emerald-50/50 rounded-2xl">
                                    <div>
                                        <p class="text-xs text-emerald-950/40 font-bold uppercase tracking-wider mb-1">Jumlah</p>
                                        <p class="text-emerald-950 font-bold">{{ $order->quantity }} unit</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-emerald-950/40 font-bold uppercase tracking-wider mb-1">Total Harga</p>
                                        <p class="text-lime-600 font-black text-lg">{{ format_price($order->total_price) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-emerald-950/40 font-bold uppercase tracking-wider mb-1">Pengiriman</p>
                                        <p class="text-emerald-950 font-semibold text-sm truncate">{{ Str::limit($order->shipping_address, 30) }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex flex-wrap gap-3">
                                    <a href="{{ route('orders.show', $order) }}" 
                                       class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-emerald-900 text-white font-bold text-sm hover:bg-lime-500 hover:text-emerald-950 transition-all duration-300 shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Detail Pesanan
                                    </a>
                                    @if($order->status === 'pending')
                                        <form action="{{ route('orders.cancel', $order) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-red-50 text-red-600 font-bold text-sm hover:bg-red-100 transition-all duration-300 border border-red-200"
                                                    onclick="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                                Batalkan
                                            </button>
                                        </form>
                                    @endif
                                </div>
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
            <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-emerald-950/5">
                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-emerald-100 to-lime-100 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-emerald-950 mb-2">Belum Ada Pesanan</h3>
                <p class="text-emerald-950/60 mb-8 font-medium">Anda belum membuat pesanan apapun. Yuk mulai belanja!</p>
                <a href="{{ route('products.index') }}" 
                   class="inline-flex items-center gap-2 px-8 py-4 bg-emerald-900 text-white font-bold rounded-full hover:bg-lime-500 hover:text-emerald-950 transition-all duration-300 shadow-lg">
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
