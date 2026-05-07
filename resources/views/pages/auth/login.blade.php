@extends('layouts.auth-simple')

@section('title', 'Masuk')

@section('content')
    <!-- Session Status -->
    @if(session('status'))
        <div class="mb-6 p-4 rounded-xl bg-lime-500/10 border border-lime-500/30">
            <p class="text-lime-400 text-sm text-center">{{ session('status') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="block text-sm text-emerald-200 mb-2 font-medium">Email</label>
            <div class="relative">
                <svg class="w-5 h-5 absolute left-3 top-3.5 text-emerald-400/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                </svg>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full pl-10 pr-4 py-3 rounded-xl input-field text-white placeholder-white/40 focus:outline-none"
                       placeholder="Masukkan email Anda">
            </div>
            @error('email')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm text-emerald-200 mb-2 font-medium">Password</label>
            <div class="relative">
                <svg class="w-5 h-5 absolute left-3 top-3.5 text-emerald-400/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <input type="password" name="password" required
                       class="w-full pl-10 pr-4 py-3 rounded-xl input-field text-white placeholder-white/40 focus:outline-none"
                       placeholder="Masukkan password Anda">
            </div>
            @error('password')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Admin Access -->
        <div class="flex items-center gap-3 p-3 rounded-lg bg-emerald-800/30 border border-emerald-500/30">
            <input type="checkbox" name="admin_access" id="admin_access" {{ old('admin_access') ? 'checked' : '' }}
                   class="w-4 h-4 rounded border-emerald-500/50 bg-emerald-950/50 text-lime-500 focus:ring-lime-500/20 cursor-pointer">
            <label for="admin_access" class="text-sm text-emerald-200 cursor-pointer flex items-center gap-2">
                <svg class="w-4 h-4 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Masuk sebagai Admin
            </label>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-emerald-500/30 bg-emerald-950/50 text-lime-500 focus:ring-lime-500/20">
                <label for="remember" class="text-sm text-emerald-300/70">Ingat saya</label>
            </div>
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-lime-400 hover:text-lime-300 transition-colors">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full py-3.5 btn-primary rounded-xl font-semibold text-emerald-950 shadow-lg shadow-lime-500/25 flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
            </svg>
            Masuk
        </button>
    </form>

    <!-- Register Link -->
    @if(Route::has('register'))
        <div class="mt-6 pt-4 border-t border-emerald-500/20">
            <p class="text-center text-sm text-emerald-300/70">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-lime-400 hover:text-lime-300 font-medium transition-colors">
                    Daftar sekarang
                </a>
            </p>
        </div>
    @endif

    <!-- Back to Home -->
    <div class="mt-4 text-center">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm text-emerald-300/50 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke beranda
        </a>
    </div>
@endsection
