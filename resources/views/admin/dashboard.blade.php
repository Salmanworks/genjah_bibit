@extends('layouts.main')

@section('title', 'Admin Dashboard - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Admin Header -->
<section class="relative pt-28 pb-8">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/90 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-white">Admin Dashboard</h1>
                <p class="text-emerald-200/70">Kelola produk, pesanan, dan konten website</p>
            </div>
            <a href="{{ route('home') }}" class="px-4 py-2 btn-outline rounded-lg text-sm">
                Kembali ke Website
            </a>
        </div>
    </div>
</section>

<!-- Stats Cards -->
<section class="relative py-6">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/50 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-lime-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <span class="text-xs text-emerald-300/50">Total</span>
                </div>
                <p class="text-2xl font-bold text-white">{{ $stats['products'] ?? 0 }}</p>
                <p class="text-sm text-emerald-200/70">Produk</p>
            </div>
            
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <span class="text-xs text-emerald-300/50">Total</span>
                </div>
                <p class="text-2xl font-bold text-white">{{ $stats['categories'] ?? 0 }}</p>
                <p class="text-sm text-emerald-200/70">Kategori</p>
            </div>
            
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                    </div>
                    <span class="text-xs text-emerald-300/50">Total</span>
                </div>
                <p class="text-2xl font-bold text-white">{{ $stats['blogs'] ?? 0 }}</p>
                <p class="text-sm text-emerald-200/70">Artikel</p>
            </div>
            
            <div class="glass-card p-6 rounded-2xl">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-500/20 flex items-center justify-center">
                        <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <span class="text-xs text-emerald-300/50">Total</span>
                </div>
                <p class="text-2xl font-bold text-white">{{ $stats['orders'] ?? 0 }}</p>
                <p class="text-sm text-emerald-200/70">Pesanan</p>
            </div>
        </div>
    </div>
</section>

<!-- Quick Actions -->
<section class="relative py-6">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/30 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold text-white mb-6">Menu Cepat</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="#" class="glass-card p-6 rounded-2xl text-center card-hover group">
                <div class="w-14 h-14 rounded-xl bg-lime-500/20 flex items-center justify-center mx-auto mb-3 group-hover:bg-lime-500 transition-all">
                    <svg class="w-7 h-7 text-lime-400 group-hover:text-emerald-950 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <h3 class="font-medium text-white">Tambah Produk</h3>
            </a>
            
            <a href="#" class="glass-card p-6 rounded-2xl text-center card-hover group">
                <div class="w-14 h-14 rounded-xl bg-blue-500/20 flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-500 transition-all">
                    <svg class="w-7 h-7 text-blue-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h3 class="font-medium text-white">Tambah Artikel</h3>
            </a>
            
            <a href="#" class="glass-card p-6 rounded-2xl text-center card-hover group">
                <div class="w-14 h-14 rounded-xl bg-purple-500/20 flex items-center justify-center mx-auto mb-3 group-hover:bg-purple-500 transition-all">
                    <svg class="w-7 h-7 text-purple-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="font-medium text-white">Data Pelanggan</h3>
            </a>
            
            <a href="#" class="glass-card p-6 rounded-2xl text-center card-hover group">
                <div class="w-14 h-14 rounded-xl bg-orange-500/20 flex items-center justify-center mx-auto mb-3 group-hover:bg-orange-500 transition-all">
                    <svg class="w-7 h-7 text-orange-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="font-medium text-white">Pengaturan</h3>
            </a>
        </div>
    </div>
</section>

<!-- Recent Orders -->
<section class="relative py-6">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/40 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold text-white mb-6">Pesanan WhatsApp Terbaru</h2>
        
        <div class="glass-card rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-emerald-500/20">
                            <th class="text-left px-6 py-4 text-sm font-medium text-emerald-300">Produk</th>
                            <th class="text-left px-6 py-4 text-sm font-medium text-emerald-300">Pelanggan</th>
                            <th class="text-left px-6 py-4 text-sm font-medium text-emerald-300">Tanggal</th>
                            <th class="text-left px-6 py-4 text-sm font-medium text-emerald-300">Status</th>
                            <th class="text-left px-6 py-4 text-sm font-medium text-emerald-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders ?? [] as $order)
                        <tr class="border-b border-emerald-500/10 hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-emerald-800/50 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <span class="text-white">{{ $order->product_name ?? 'Bibit Tanaman' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-emerald-200/80">{{ $order->customer_name ?? 'Pelanggan' }}</td>
                            <td class="px-6 py-4 text-emerald-200/80">{{ $order->created_at ?? now()->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">
                                    {{ $order->status ?? 'Pending' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-lime-400 hover:text-lime-300 text-sm">Detail</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="w-16 h-16 rounded-full bg-emerald-800/50 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <p class="text-emerald-200/70">Belum ada pesanan</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Popular Products -->
<section class="relative py-6 pb-12">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/30 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold text-white mb-6">Produk Populer</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($popularProducts ?? [] as $product)
            <div class="glass-card rounded-xl overflow-hidden card-hover">
                <div class="aspect-square bg-emerald-800/30 flex items-center justify-center">
                    <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="p-4">
                    <h4 class="font-medium text-white text-sm truncate">{{ $product->name ?? 'Produk ' . $loop->iteration }}</h4>
                    <p class="text-lime-400 text-sm">{{ $product->formatted_price ?? 'Rp 0' }}</p>
                    <p class="text-xs text-emerald-300/50">Terjual {{ $product->sold_count ?? 0 }}</p>
                </div>
            </div>
            @endforeach
            
            @if(empty($popularProducts))
            @for($i = 1; $i <= 4; $i++)
            <div class="glass-card rounded-xl overflow-hidden card-hover">
                <div class="aspect-square bg-emerald-800/30 flex items-center justify-center">
                    <svg class="w-12 h-12 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="p-4">
                    <h4 class="font-medium text-white text-sm">Produk Contoh {{ $i }}</h4>
                    <p class="text-lime-400 text-sm">Rp {{ number_format(rand(25000, 150000), 0, ',', '.') }}</p>
                    <p class="text-xs text-emerald-300/50">Terjual {{ rand(50, 500) }}</p>
                </div>
            </div>
            @endfor
            @endif
        </div>
    </div>
</section>
@endsection
