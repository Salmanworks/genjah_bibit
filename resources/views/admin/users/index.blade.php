@extends('layouts.admin')

@section('title', 'Kelola Pengguna')

@section('content')
    <div class="admin-page-header animate-fade-up">
        <div>
            <h3 class="admin-page-title">Manajemen Pengguna</h3>
            <p class="admin-page-subtitle">Total {{ $users->total() }} pengguna dalam sistem</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="glass-card admin-filter-panel rounded-3xl mb-8 animate-fade-up" style="animation-delay: 0.1s">
        <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." class="admin-input w-full px-6 py-3 rounded-2xl focus:ring-2 focus:ring-lime-500">
            </div>
            <select name="role" class="admin-input px-6 py-3 rounded-2xl min-w-[150px]">
                <option value="">Semua Role</option>
                <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>Pelanggan</option>
            </select>
            <button type="submit" class="admin-action-btn">Filter</button>
            @if(request()->hasAny(['search', 'role']))
                <a href="{{ route('admin.users.index') }}" class="admin-action-btn admin-reset-btn">Reset</a>
            @endif
        </form>
    </div>

    <!-- Users Table -->
    <div class="glass-card admin-table-shell rounded-3xl overflow-hidden animate-fade-up" style="animation-delay: 0.2s">
        <div class="overflow-x-auto">
            <table class="w-full admin-table">
                <thead>
                    <tr class="text-left text-[10px] font-bold uppercase tracking-widest text-lime-100/30 border-b border-white/5">
                        <th class="px-8 py-5">Pengguna</th>
                        <th class="px-8 py-5">Email</th>
                        <th class="px-8 py-5">Role</th>
                        <th class="px-8 py-5">Terdaftar</th>
                        <th class="px-8 py-5 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @forelse($users as $user)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-lime-500/10 border border-lime-500/20 flex items-center justify-center text-lime-400 font-bold text-sm">
                                        {{ $user->initials() }}
                                    </div>
                                    <div class="font-bold text-white">{{ $user->name }}</div>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-lime-100/60">{{ $user->email }}</td>
                            <td class="px-8 py-5">
                                @if($user->is_admin)
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-purple-500/10 text-purple-400 border border-purple-500/20">Admin</span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest bg-white/5 text-lime-100/30 border border-white/5">Pelanggan</span>
                                @endif
                            </td>
                            <td class="px-8 py-5 text-lime-100/40 font-medium">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex items-center justify-end gap-3">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="admin-icon-btn text-blue-300 hover:bg-blue-500 hover:text-white hover:border-blue-400/40" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    @if(auth()->id() !== $user->id)
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="admin-icon-btn text-red-300 hover:bg-red-500 hover:text-white hover:border-red-400/40" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="w-20 h-20 rounded-full bg-lime-500/5 flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-lime-500/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <p class="text-lime-100/30 font-medium">Belum ada pengguna terdaftar</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            <div class="admin-pagination-shell">
                {{ $users->withQueryString()->links() }}
            </div>
        @endif
    </div>
@endsection
