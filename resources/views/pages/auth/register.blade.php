@extends('layouts.auth-simple')

@section('title', 'Daftar')
@section('heading', 'Gabung Sekarang')
@section('subheading', 'Mulai perjalanan berkebun Anda bersama kami')

@section('content')

    <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block text-xs font-black text-emerald-950/40 uppercase tracking-widest mb-2 ml-2">Nama Lengkap</label>
            <div class="relative">
                <svg class="w-4.5 h-4.5 absolute left-5 top-1/2 -translate-y-1/2 text-emerald-950/20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="auth-input"
                       placeholder="Nama lengkap Anda">
            </div>
            @error('name')
                <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-xs font-black text-emerald-950/40 uppercase tracking-widest mb-2 ml-2">Email</label>
            <div class="relative">
                <svg class="w-4.5 h-4.5 absolute left-5 top-1/2 -translate-y-1/2 text-emerald-950/20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="auth-input"
                       placeholder="nama@email.com">
            </div>
            @error('email')
                <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p>
            @enderror
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
                       placeholder="••••••••">
            </div>
            @error('password')
                <p class="text-red-500 text-[10px] mt-1 ml-2 font-bold">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirm Password --}}
        <div>
            <label class="block text-xs font-black text-emerald-950/40 uppercase tracking-widest mb-2 ml-2">Konfirmasi Password</label>
            <div class="relative">
                <svg class="absolute left-5 top-1/2 -translate-y-1/2 text-emerald-950/20" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:18px;height:18px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <input type="password" name="password_confirmation" required
                       class="auth-input"
                       placeholder="Ulangi password">
            </div>
        </div>

        {{-- Submit --}}
        <div class="pt-4">
            <button type="submit" class="auth-btn">
                Daftar Akun
            </button>
        </div>
    </form>

    {{-- Login Link --}}
    <div class="mt-8 pt-6 border-t border-emerald-950/5 text-center">
        <p class="text-sm text-emerald-950/40 font-medium">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-emerald-950 font-black hover:text-lime-600 transition-colors ml-1">
                Masuk Sekarang →
            </a>
        </p>
    </div>

@endsection
