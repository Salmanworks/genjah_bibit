@extends('layouts.auth-simple')

@section('title', 'Daftar')

@section('content')
<div class="glass-card rounded-3xl p-8 shadow-2xl">
    <!-- Logo -->
    <div class="text-center mb-8">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-lime-500 to-emerald-600 flex items-center justify-center mx-auto mb-4 shadow-lg shadow-lime-500/30">
            <svg class="w-8 h-8 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-white">Buat Akun</h2>
        <p class="text-emerald-300/70 mt-2">Daftar untuk mulai berbelanja</p>
    </div>

    <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-sm text-emerald-300/70 mb-2">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="w-full px-4 py-3 rounded-xl input-field text-white placeholder-white/30 focus:outline-none"
                   placeholder="Nama lengkap Anda">
            @error('name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <label class="block text-sm text-emerald-300/70 mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full px-4 py-3 rounded-xl input-field text-white placeholder-white/30 focus:outline-none"
                   placeholder="nama@email.com">
            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm text-emerald-300/70 mb-2">Password</label>
            <input type="password" name="password" required
                   class="w-full px-4 py-3 rounded-xl input-field text-white placeholder-white/30 focus:outline-none"
                   placeholder="••••••••">
            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-sm text-emerald-300/70 mb-2">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required
                   class="w-full px-4 py-3 rounded-xl input-field text-white placeholder-white/30 focus:outline-none"
                   placeholder="••••••••">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3.5 btn-primary rounded-xl font-semibold text-emerald-950 shadow-lg shadow-lime-500/25 mt-2">
            Daftar
        </button>
    </form>

    <!-- Login Link -->
    <p class="mt-6 text-center text-sm text-emerald-300/70">
        Sudah punya akun? 
        <a href="{{ route('login') }}" class="text-lime-400 hover:text-lime-300 font-medium transition-colors">
            Masuk sekarang
        </a>
    </p>

    <!-- Back to Home -->
    <p class="mt-4 text-center">
        <a href="{{ route('home') }}" class="text-sm text-emerald-300/50 hover:text-white transition-colors">
            ← Kembali ke beranda
        </a>
    </p>
</div>
@endsection
