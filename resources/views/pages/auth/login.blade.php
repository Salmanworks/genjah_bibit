@extends('layouts.auth-simple')

@section('title', 'Masuk')
@section('heading', 'Masuk')
@section('subheading', 'Selamat Datang Kembali')

@section('content')

    @if($errors->any())
        <div class="mb-4 text-red-600 text-[10px] font-bold leading-tight">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}" class="space-y-3">
        @csrf
        <input type="email" name="email" value="{{ old('email') }}" required autofocus
               class="auth-input" placeholder="Email">
        
        <div class="password-container">
            <input type="password" name="password" id="password" required
                   class="auth-input" placeholder="Password">
            <button type="button" class="password-toggle" onclick="togglePassword('password', 'toggle-icon')" id="toggle-icon">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
            </button>
        </div>

        <div class="flex flex-col gap-2 pt-1 text-left">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="checkbox" name="admin_access" class="w-3.5 h-3.5 rounded accent-emerald-950">
                <span class="text-[10px] text-emerald-950/60 font-bold">Admin Panel</span>
            </label>
            <div class="flex justify-between items-center">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="w-3.5 h-3.5 rounded accent-emerald-950">
                    <span class="text-[10px] text-emerald-950/40 font-bold">Ingat saya</span>
                </label>
                <a href="#" class="text-[9px] text-emerald-950/30 font-black uppercase tracking-tighter">Lupa?</a>
            </div>
        </div>

        <button type="submit" class="auth-btn">MASUK SEKARANG</button>
    </form>

    <div class="mt-6 pt-4 border-t border-emerald-950/5">
        <p class="text-[10px] text-emerald-950/40 font-bold">
            Belum ada akun?
            <a href="{{ route('register') }}" class="text-emerald-950 font-black ml-1 hover:text-emerald-500">DAFTAR →</a>
        </p>
    </div>

@endsection
