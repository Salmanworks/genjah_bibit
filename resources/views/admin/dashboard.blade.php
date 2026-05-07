@extends('layouts.main')

@section('title', 'Admin Dashboard - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Admin Header -->
<section class="relative py-8">
    <div class="relative flex justify-between items-center">
        <div class="animate-fade-up">
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Dashboard Overview</h1>
            <p class="text-emerald-100/40 text-sm">Statistik dan aktivitas terbaru di Genjah Rumah Bibit</p>
        </div>
        <a href="{{ route('home') }}" class="px-6 py-2 border border-white/10 rounded-full text-sm text-white hover:bg-white/5 transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            Lihat Website
        </a>
    </div>
</section>

<!-- Stats Cards -->
<section class="relative mb-8 animate-fade-up" style="animation-delay: 0.1s">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="glass-card p-6 rounded-3xl relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl group-hover:bg-emerald-500/20 transition-all"></div>
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-100/30">Produk</span>
            </div>
            <p class="text-4xl font-black text-white leading-none mb-1">{{ $stats['products'] ?? 0 }}</p>
            <p class="text-xs text-emerald-100/40">Total Koleksi Bibit</p>
        </div>
        
        <div class="glass-card p-6 rounded-3xl relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition-all"></div>
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-blue-500/20 flex items-center justify-center text-blue-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-100/30">Kategori</span>
            </div>
            <p class="text-4xl font-black text-white leading-none mb-1">{{ $stats['categories'] ?? 0 }}</p>
            <p class="text-xs text-emerald-100/40">Kelompok Tanaman</p>
        </div>
        
        <div class="glass-card p-6 rounded-3xl relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-orange-500/10 rounded-full blur-2xl group-hover:bg-orange-500/20 transition-all"></div>
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-orange-500/20 flex items-center justify-center text-orange-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-100/30">Pesanan</span>
            </div>
            <p class="text-4xl font-black text-white leading-none mb-1">{{ $stats['orders'] ?? 0 }}</p>
            <p class="text-xs text-emerald-100/40">Pesanan WhatsApp</p>
        </div>
        
        <div class="glass-card p-6 rounded-3xl relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition-all"></div>
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-2xl bg-purple-500/20 flex items-center justify-center text-purple-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-100/30">Pengguna</span>
            </div>
            <p class="text-4xl font-black text-white leading-none mb-1">{{ $stats['users'] ?? 0 }}</p>
            <p class="text-xs text-emerald-100/40">Pelanggan Terdaftar</p>
        </div>
    </div>
</section>

<!-- Quick Actions -->
<section class="relative mb-8 animate-fade-up" style="animation-delay: 0.2s">
    <h2 class="text-lg font-bold text-white mb-6 tracking-tight">Menu Cepat</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <a href="{{ route('admin.products.create') }}" class="glass-card p-8 rounded-3xl text-center card-hover group">
            <div class="w-16 h-16 rounded-2xl bg-emerald-500/10 flex items-center justify-center mx-auto mb-4 group-hover:bg-emerald-500 transition-all duration-500">
                <svg class="w-8 h-8 text-emerald-400 group-hover:text-emerald-950 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </div>
            <h3 class="font-bold text-white text-sm">Tambah Produk</h3>
        </a>
        
        <a href="{{ route('admin.categories.create') }}" class="glass-card p-8 rounded-3xl text-center card-hover group">
            <div class="w-16 h-16 rounded-2xl bg-blue-500/10 flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-500 transition-all duration-500">
                <svg class="w-8 h-8 text-blue-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            </div>
            <h3 class="font-bold text-white text-sm">Tambah Kategori</h3>
        </a>
        
        <a href="{{ route('admin.users.index') }}" class="glass-card p-8 rounded-3xl text-center card-hover group">
            <div class="w-16 h-16 rounded-2xl bg-purple-500/10 flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-500 transition-all duration-500">
                <svg class="w-8 h-8 text-purple-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <h3 class="font-bold text-white text-sm">Data Pelanggan</h3>
        </a>
        
        <a href="{{ route('admin.settings.index') }}" class="glass-card p-8 rounded-3xl text-center card-hover group">
            <div class="w-16 h-16 rounded-2xl bg-orange-500/10 flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all duration-500">
                <svg class="w-8 h-8 text-orange-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                </svg>
            </div>
            <h3 class="font-bold text-white text-sm">Pengaturan</h3>
        </a>
    </div>
</section>

<!-- Recent Orders -->
<section class="relative mb-8 animate-fade-up" style="animation-delay: 0.3s">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-white tracking-tight">Pesanan WhatsApp Terbaru</h2>
        <a href="{{ route('admin.orders.index') }}" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 transition-colors uppercase tracking-widest">Lihat Semua</a>
    </div>
    
    <div class="glass-card rounded-3xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full admin-table">
                <thead>
                    <tr class="text-left text-[10px] font-bold uppercase tracking-widest text-emerald-100/30 border-b border-white/5">
                        <th class="px-8 py-5">Produk</th>
                        <th class="px-8 py-5">Pelanggan</th>
                        <th class="px-8 py-5">Tanggal</th>
                        <th class="px-8 py-5 text-center">Status</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($recentOrders ?? [] as $order)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 flex items-center justify-center border border-white/5">
                                    <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <span class="font-bold text-white">{{ $order->product?->name ?? 'Bibit Tanaman' }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5">
                            <div class="text-white font-medium">{{ $order->user?->name ?? 'Guest' }}</div>
                            <div class="text-xs text-emerald-100/30">{{ $order->phone ?? '08xxx' }}</div>
                        </td>
                        <td class="px-8 py-5 text-emerald-100/40">{{ $order->created_at->format('d M, H:i') }}</td>
                        <td class="px-8 py-5">
                            <div class="flex justify-center">
                                <span class="px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-{{ $order->status_color ?? 'yellow' }}-500/10 text-{{ $order->status_color ?? 'yellow' }}-400 border border-{{ $order->status_color ?? 'yellow' }}-500/20">
                                    {{ $order->status_label ?? 'Pending' }}
                                </span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-right">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-emerald-400 hover:text-emerald-300 font-bold text-xs">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-20 text-center">
                            <div class="w-20 h-20 rounded-full bg-emerald-500/5 flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-emerald-500/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                            </div>
                            <p class="text-emerald-100/30 font-medium">Belum ada pesanan masuk hari ini</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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
