@extends('layouts.admin')

@section('title', 'Edit Pengguna: ' . $user->name)

@section('content')
    <div class="mb-6 animate-fade-up">
        <a href="{{ route('admin.users.index') }}" class="admin-back-link">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Pengguna
        </a>
    </div>

    <div class="max-w-2xl">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="glass-card rounded-3xl border border-white/10 overflow-hidden">
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="admin-input w-full px-4 py-3 rounded-2xl">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="admin-input w-full px-4 py-3 rounded-2xl">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Password Baru (opsional)</label>
                        <input type="password" name="password" class="admin-input w-full px-4 py-3 rounded-2xl">
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="hidden" name="is_admin" value="0">
                            <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }} {{ auth()->id() === $user->id ? 'disabled' : '' }} class="w-4 h-4 rounded border-lime-400/30 text-lime-500 focus:ring-lime-400">
                            <span class="text-sm text-lime-100/80">Jadikan Administrator</span>
                        </label>
                        @if(auth()->id() === $user->id)
                            <p class="text-xs text-lime-100/40 mt-1">Anda tidak dapat mengubah role Anda sendiri.</p>
                        @endif
                    </div>
                </div>

                <div class="admin-pagination-shell flex justify-end">
                    <button type="submit" class="btn-premium px-6 py-2.5 rounded-xl font-semibold">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
