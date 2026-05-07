@extends('layouts.admin')

@section('title', 'Kelola Pesanan')

@section('content')
    <div class="flex justify-between items-center mb-8 animate-fade-up">
        <div>
            <h3 class="text-2xl font-extrabold text-white tracking-tight">Pesanan Pelanggan</h3>
            <p class="text-sm text-lime-100/40">Total {{ $orders->total() }} pesanan masuk dikelola</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="glass-card rounded-3xl p-6 mb-8 animate-fade-up" style="animation-delay: 0.1s">
        <form method="GET" action="{{ route('admin.orders.index') }}" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari pelanggan atau produk..." class="admin-input w-full px-6 py-3 rounded-2xl focus:ring-2 focus:ring-lime-500">
            </div>
            <select name="status" class="admin-input px-6 py-3 rounded-2xl min-w-[150px]">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Diproses</option>
                <option value="shipped" {{ request('status') === 'shipped' ? 'selected' : '' }}>Dikirim</option>
                <option value="delivered" {{ request('status') === 'delivered' ? 'selected' : '' }}>Diterima</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
            <button type="submit" class="px-8 py-3 bg-lime-500/10 text-lime-400 font-bold rounded-2xl hover:bg-lime-500 hover:text-lime-950 transition-all border border-lime-500/20">Filter</button>
            @if(request()->hasAny(['search', 'status']))
                <a href="{{ route('admin.orders.index') }}" class="px-8 py-3 bg-white/5 text-white font-bold rounded-2xl hover:bg-white/10 transition-all border border-white/5">Reset</a>
            @endif
        </form>
    </div>

    <!-- Orders Table -->
    <div class="glass-card rounded-3xl overflow-hidden animate-fade-up" style="animation-delay: 0.2s">
        <div class="overflow-x-auto">
            <table class="w-full admin-table">
                <thead>
                    <tr class="text-left text-[10px] font-bold uppercase tracking-widest text-lime-100/30 border-b border-white/5">
                        <th class="px-8 py-5">ID & Tanggal</th>
                        <th class="px-8 py-5">Pelanggan</th>
                        <th class="px-8 py-5">Produk</th>
                        <th class="px-8 py-5">Total</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($orders as $order)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-8 py-5">
                                <div class="font-bold text-lime-400">#ORD-{{ $order->id }}</div>
                                <div class="text-[10px] text-lime-100/30 font-medium uppercase tracking-tighter">{{ $order->created_at->format('d M Y, H:i') }}</div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="font-bold text-white">{{ $order->user?->name ?? 'Guest' }}</div>
                                <div class="text-xs text-lime-100/40">{{ $order->phone }}</div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="font-medium text-lime-100/80">{{ $order->product?->name ?? 'Produk dihapus' }}</div>
                                <div class="text-[10px] text-lime-100/30 uppercase font-bold tracking-widest">Qty: {{ $order->quantity }}</div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="font-bold text-white">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-{{ $order->status_color }}-500/10 text-{{ $order->status_color }}-400 border border-{{ $order->status_color }}-500/20">
                                    {{ $order->status_label }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex justify-end">
                                    <a href="{{ route('admin.orders.show', $order) }}" class="w-10 h-10 rounded-xl bg-lime-500/10 flex items-center justify-center text-lime-400 hover:bg-lime-500 hover:text-lime-950 transition-all border border-lime-500/20" title="Detail">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-20 text-center">
                                <div class="w-20 h-20 rounded-full bg-lime-500/5 flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-lime-500/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                </div>
                                <p class="text-lime-100/30 font-medium">Belum ada pesanan masuk</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($orders->hasPages())
            <div class="px-8 py-6 border-t border-white/5 bg-white/5">
                {{ $orders->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
