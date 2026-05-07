@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-zinc-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Produk</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total_products'] }}</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white dark:bg-zinc-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Kategori</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total_categories'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white dark:bg-zinc-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Pesanan</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total_orders'] }}</p>
                </div>
                <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white dark:bg-zinc-800 rounded-xl p-6 shadow-sm border border-gray-200 dark:border-zinc-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Pengguna</p>
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['total_users'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Orders -->
    <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-gray-200 dark:border-zinc-700 mb-8">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-zinc-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Pesanan Terbaru</h3>
        </div>
        <div class="p-6">
            @if($stats['recent_orders']->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-sm text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-zinc-700">
                                <th class="pb-3">ID</th>
                                <th class="pb-3">Customer</th>
                                <th class="pb-3">Total</th>
                                <th class="pb-3">Status</th>
                                <th class="pb-3">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($stats['recent_orders'] as $order)
                                <tr class="border-b border-gray-100 dark:border-zinc-700">
                                    <td class="py-3 text-gray-800 dark:text-white">#{{ $order->id }}</td>
                                    <td class="py-3 text-gray-800 dark:text-white">{{ $order->user?->name ?? 'Guest' }}</td>
                                    <td class="py-3 text-gray-800 dark:text-white">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td class="py-3">
                                        <span class="px-2 py-1 rounded-full text-xs {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 text-gray-600 dark:text-gray-400">{{ $order->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">Belum ada pesanan</p>
            @endif
        </div>
    </div>
    
    <!-- Low Stock Products -->
    <div class="bg-white dark:bg-zinc-800 rounded-xl shadow-sm border border-gray-200 dark:border-zinc-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-zinc-700">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Stok Menipis</h3>
        </div>
        <div class="p-6">
            @if($stats['low_stock_products']->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-sm text-gray-600 dark:text-gray-400 border-b border-gray-200 dark:border-zinc-700">
                                <th class="pb-3">Produk</th>
                                <th class="pb-3">Stok</th>
                                <th class="pb-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($stats['low_stock_products'] as $product)
                                <tr class="border-b border-gray-100 dark:border-zinc-700">
                                    <td class="py-3 text-gray-800 dark:text-white">{{ $product->name }}</td>
                                    <td class="py-3">
                                        <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-800">
                                            {{ $product->stock }} tersisa
                                        </span>
                                    </td>
                                    <td class="py-3">
                                        <a href="#" class="text-emerald-600 hover:text-emerald-800">Restock</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">Semua stok aman</p>
            @endif
        </div>
    </div>
@endsection
