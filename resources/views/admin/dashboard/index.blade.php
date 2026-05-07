@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="glass-card rounded-3xl p-8 animate-fade-up">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold text-emerald-100/30 uppercase tracking-widest mb-1">Total Produk</p>
                    <p class="text-3xl font-black text-white">{{ $stats['total_products'] }}</p>
                </div>
                <div class="w-14 h-14 bg-lime-500/10 rounded-2xl flex items-center justify-center text-lime-400 border border-lime-500/20 shadow-lg shadow-lime-500/5">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold text-emerald-100/30 uppercase tracking-widest mb-1">Kategori</p>
                    <p class="text-3xl font-black text-white">{{ $stats['total_categories'] }}</p>
                </div>
                <div class="w-14 h-14 bg-blue-500/10 rounded-2xl flex items-center justify-center text-blue-400 border border-blue-500/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold text-emerald-100/30 uppercase tracking-widest mb-1">Pesanan</p>
                    <p class="text-3xl font-black text-white">{{ $stats['total_orders'] }}</p>
                </div>
                <div class="w-14 h-14 bg-orange-500/10 rounded-2xl flex items-center justify-center text-orange-400 border border-orange-500/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold text-emerald-100/30 uppercase tracking-widest mb-1">Pelanggan</p>
                    <p class="text-3xl font-black text-white">{{ $stats['total_users'] }}</p>
                </div>
                <div class="w-14 h-14 bg-purple-500/10 rounded-2xl flex items-center justify-center text-purple-400 border border-purple-500/20">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Orders -->
        <div class="glass-card rounded-3xl overflow-hidden animate-fade-up" style="animation-delay: 0.4s">
            <div class="px-8 py-6 border-b border-white/5 flex items-center justify-between">
                <h3 class="font-bold text-white tracking-tight">Pesanan Terbaru</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold text-lime-400 hover:text-lime-300 transition-colors uppercase tracking-widest">Lihat Semua</a>
            </div>
            <div class="p-0">
                @if($stats['recent_orders']->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full admin-table">
                            <thead>
                                <tr class="text-left text-[10px] font-bold uppercase tracking-widest text-emerald-100/20 border-b border-white/5">
                                    <th class="px-8 py-4">Invoice</th>
                                    <th class="px-8 py-4">Pelanggan</th>
                                    <th class="px-8 py-4">Total</th>
                                    <th class="px-8 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach($stats['recent_orders'] as $order)
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="px-8 py-4 font-bold text-white">#{{ $order->id }}</td>
                                        <td class="px-8 py-4 text-emerald-100/60">{{ $order->user?->name ?? 'Guest' }}</td>
                                        <td class="px-8 py-4 font-bold text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                        <td class="px-8 py-4">
                                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-{{ $order->status_color }}-500/10 text-{{ $order->status_color }}-400 border border-{{ $order->status_color }}-500/20">
                                                {{ $order->status_label }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="px-8 py-12 text-center text-emerald-100/20">Belum ada pesanan masuk.</div>
                @endif
            </div>
        </div>
        
        <!-- Low Stock Products -->
        <div class="glass-card rounded-3xl overflow-hidden animate-fade-up" style="animation-delay: 0.5s">
            <div class="px-8 py-6 border-b border-white/5 flex items-center justify-between">
                <h3 class="font-bold text-white tracking-tight">Pantauan Stok</h3>
                <span class="px-3 py-1 bg-red-500/10 text-red-400 text-[10px] font-bold rounded-full border border-red-500/20">Stok Menipis</span>
            </div>
            <div class="p-0">
                @if($stats['low_stock_products']->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full admin-table">
                            <thead>
                                <tr class="text-left text-[10px] font-bold uppercase tracking-widest text-emerald-100/20 border-b border-white/5">
                                    <th class="px-8 py-4">Produk</th>
                                    <th class="px-8 py-4">Tersisa</th>
                                    <th class="px-8 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs">
                                @foreach($stats['low_stock_products'] as $product)
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="px-8 py-4">
                                            <div class="font-bold text-white">{{ $product->name }}</div>
                                            <div class="text-[10px] text-emerald-100/20">{{ $product->category?->name }}</div>
                                        </td>
                                        <td class="px-8 py-4">
                                            <span class="text-red-400 font-black text-sm">{{ $product->stock }}</span>
                                            <span class="text-[10px] text-red-400/40 uppercase font-bold ml-1">Pcs</span>
                                        </td>
                                        <td class="px-8 py-4 text-right">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center gap-1 text-lime-400 hover:text-lime-300 font-bold transition-colors">
                                                Update
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="px-8 py-12 text-center text-emerald-100/20">Semua stok produk aman.</div>
                @endif
            </div>
        </div>
    </div>
@endsection
