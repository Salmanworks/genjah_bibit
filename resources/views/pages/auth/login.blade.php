@extends('layouts.auth-simple')

@section('title', 'Masuk')
@section('heading', 'Selamat Datang')
@section('subheading', 'Masuk ke akun Anda untuk melanjutkan')

@section('content')

    {{-- Session Status --}}
    @if(session('status'))
        <div class="mb-6 px-5 py-4 rounded-2xl bg-lime-50 border border-lime-200">
            <p class="text-lime-700 text-sm font-semibold">{{ session('status') }}</p>
        </div>
    @endif

    {{-- Error Alert --}}
    @if($errors->any())
        <div class="mb-6 px-5 py-4 rounded-2xl bg-red-50 border border-red-100">
            <p class="text-red-600 text-sm font-semibold">{{ $errors->first() }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
        @csrf

        {{-- Email --}}
        <div>
            <label class="block text-xs font-black text-emerald-950/40 uppercase tracking-widest mb-2 ml-2">Email</label>
            <div class="relative">
                <svg class="w-4.5 h-4.5 absolute left-5 top-1/2 -translate-y-1/2 text-emerald-950/20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="auth-input"
                       placeholder="nama@email.com">
            </div>
        </div>

        {{-- Password --}}
        <div>
            <label class="block text-xs font-black text-emerald-950/40 uppercase tracking-widest mb-2 ml-2">Password</label>
            <div class="relative">
                <svg class="absolute left-5 top-1/2 -translate-y-1/2 text-emerald-950/20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <input type="password" name="password" required
                       class="auth-input"
                       placeholder="Masukkan password">
            </div>
        </div>

        {{-- Admin Access --}}
        <div class="flex items-center gap-3 px-5 py-3.5 rounded-full bg-emerald-950/5 border border-emerald-950/10">
            <input type="checkbox" name="admin_access" id="admin_access" {{ old('admin_access') ? 'checked' : '' }}
                   class="w-4 h-4 rounded-full border-emerald-300 text-emerald-950 focus:ring-emerald-950/20 cursor-pointer accent-emerald-950">
            <label for="admin_access" class="text-sm text-emerald-950/60 cursor-pointer font-semibold flex items-center gap-2">
                <svg class="text-emerald-950/40" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:15px;height:15px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Masuk sebagai Admin
            </label>
        </div>

        {{-- Remember & Forgot --}}
        <div class="flex items-center justify-between px-2">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-emerald-300 accent-emerald-950 cursor-pointer">
                <label for="remember" class="text-sm text-emerald-950/40 font-medium cursor-pointer">Ingat saya</label>
            </div>
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-emerald-950/40 hover:text-emerald-950 font-bold transition-colors">
                    Lupa password?
                </a>
            @endif
        </div>

        {{-- Submit --}}
        <div class="pt-2">
            <button type="submit" class="auth-btn">
                Masuk Sekarang
            </button>
        </div>
    </form>

    {{-- Register Link --}}
    @if(Route::has('register'))
        <div class="mt-8 pt-6 border-t border-emerald-950/5 text-center">
            <p class="text-sm text-emerald-950/40 font-medium">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-emerald-950 font-black hover:text-lime-600 transition-colors ml-1">
                    Daftar Gratis →
                </a>
            </p>
        </div>
    @endif

@endsection
