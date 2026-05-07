@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
    <div class="admin-page-header animate-fade-up">
        <div>
            <h3 class="admin-page-title">Katalog Produk</h3>
            <p class="admin-page-subtitle">Total {{ $products->total() }} bibit tanaman tersedia</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn-premium px-8 py-3 rounded-2xl flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Produk Baru
        </a>
    </div>

    <!-- Filters -->
    <div class="glass-card admin-filter-panel rounded-3xl mb-8 animate-fade-up" style="animation-delay: 0.1s">
        <form method="GET" action="{{ route('admin.products.index') }}" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..." class="admin-input w-full px-6 py-3 rounded-2xl focus:ring-2 focus:ring-lime-500">
            </div>
            <select name="category" class="admin-input px-6 py-3 rounded-2xl min-w-[150px]">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <select name="status" class="admin-input px-6 py-3 rounded-2xl min-w-[150px]">
                <option value="">Semua Status</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
            </select>
            <button type="submit" class="admin-action-btn">Filter</button>
            @if(request()->hasAny(['search', 'category', 'status']))
                <a href="{{ route('admin.products.index') }}" class="admin-action-btn admin-reset-btn">Reset</a>
            @endif
        </form>
    </div>

    <!-- Products Table -->
    <div class="glass-card admin-table-shell rounded-3xl overflow-hidden animate-fade-up" style="animation-delay: 0.2s">
        <div class="overflow-x-auto">
            <table class="w-full admin-table">
                <thead>
                    <tr class="text-left text-[10px] font-bold uppercase tracking-widest text-lime-100/30 border-b border-white/5">
                        <th class="px-8 py-5">Produk</th>
                        <th class="px-8 py-5">Kategori</th>
                        <th class="px-8 py-5">Harga</th>
                        <th class="px-8 py-5">Stok</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($products as $product)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl overflow-hidden bg-white/5 border border-white/5">
                                        @if($product->main_image)
                                            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-lime-100/20">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-white text-base">{{ $product->name }}</div>
                                        <div class="text-xs text-lime-100/30">{{ Str::limit($product->scientific_name, 30) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-4 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-lime-500/10 text-lime-400 border border-lime-500/20">
                                    {{ $product->category?->name ?? '-' }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="font-bold text-white">{{ $product->formatted_price }}</div>
                                @if($product->original_price && $product->original_price > $product->price)
                                    <div class="text-xs text-red-400/50 line-through">Rp {{ number_format($product->original_price, 0, ',', '.') }}</div>
                                @endif
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold {{ $product->stock <= 5 ? 'bg-red-500/10 text-red-400' : ($product->stock <= 20 ? 'bg-yellow-500/10 text-yellow-400' : 'bg-lime-500/10 text-lime-400') }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                @if($product->is_active)
                                    <span class="flex items-center gap-2 text-lime-400 font-bold text-xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-lime-400 animate-pulse"></span>
                                        Aktif
                                    </span>
                                @else
                                    <span class="flex items-center gap-2 text-red-400/50 font-bold text-xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-400/50"></span>
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="admin-icon-btn text-blue-300 hover:bg-blue-500 hover:text-white hover:border-blue-400/40" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-icon-btn text-red-300 hover:bg-red-500 hover:text-white hover:border-red-400/40" title="Hapus">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-8 py-20 text-center">
                                <div class="w-20 h-20 rounded-full bg-lime-500/5 flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-lime-500/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <p class="text-lime-100/30 font-medium">Belum ada produk yang ditambahkan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($products->hasPages())
            <div class="admin-pagination-shell">
                {{ $products->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
