@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
    <div class="admin-page-header animate-fade-up">
        <div>
            <h3 class="admin-page-title">Kategori Tanaman</h3>
            <p class="admin-page-subtitle">Total {{ $categories->count() }} kategori tersedia</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn-premium px-8 py-3 rounded-2xl flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Kategori Baru
        </a>
    </div>

    <!-- Categories Table -->
    <div class="glass-card admin-table-shell rounded-3xl overflow-hidden animate-fade-up" style="animation-delay: 0.1s">
        <div class="overflow-x-auto">
            <table class="w-full admin-table">
                <thead>
                    <tr class="text-left text-[10px] font-bold uppercase tracking-widest text-lime-100/30 border-b border-white/5">
                        <th class="px-8 py-5">Kategori</th>
                        <th class="px-8 py-5 text-center">Produk</th>
                        <th class="px-8 py-5 text-center">Urutan</th>
                        <th class="px-8 py-5 text-center">Status</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($categories as $category)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl overflow-hidden bg-white/5 border border-white/5 flex items-center justify-center">
                                        @if($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                                        @elseif($category->icon)
                                            <span class="text-2xl">{{ $category->icon }}</span>
                                        @else
                                            <svg class="w-6 h-6 text-lime-100/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="font-bold text-white text-base">{{ $category->name }}</div>
                                        <div class="text-xs text-lime-100/30">{{ Str::limit($category->description, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-center font-medium text-lime-100/60">
                                {{ $category->products_count ?? $category->products()->count() }} Produk
                            </td>
                            <td class="px-8 py-5 text-center font-bold text-white">
                                {{ $category->sort_order }}
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex justify-center">
                                    @if($category->is_active)
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
                                </div>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="admin-icon-btn text-blue-300 hover:bg-blue-500 hover:text-white hover:border-blue-400/40" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="w-20 h-20 rounded-full bg-lime-500/5 flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-lime-500/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <p class="text-lime-100/30 font-medium">Belum ada kategori yang ditambahkan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
