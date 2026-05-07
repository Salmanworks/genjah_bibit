@extends('layouts.auth-simple')

@section('title', 'Daftar')
@section('heading', 'Daftar')
@section('subheading', 'Buat Akun Baru')

@section('content')

    <form method="POST" action="{{ route('register.store') }}" class="space-y-3">
        @csrf
        
        <input type="text" name="name" value="{{ old('name') }}" required autofocus
               class="auth-input" placeholder="Nama Lengkap">
        @error('name') <p class="text-red-500 text-[9px] font-bold mt-1">{{ $message }}</p> @enderror

        <input type="email" name="email" value="{{ old('email') }}" required
               class="auth-input" placeholder="Email">
        @error('email') <p class="text-red-500 text-[9px] font-bold mt-1">{{ $message }}</p> @enderror

        <div class="password-container">
            <input type="password" name="password" id="password" required
                   class="auth-input" placeholder="Password">
            <button type="button" class="password-toggle" onclick="togglePassword('password', 'toggle-icon-1')" id="toggle-icon-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </button>
        </div>

        <div class="password-container">
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="auth-input" placeholder="Ulangi Password">
            <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', 'toggle-icon-2')" id="toggle-icon-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </button>
        </div>

        <button type="submit" class="auth-btn">DAFTAR SEKARANG</button>
    </form>

    <div class="mt-6 pt-4 border-t border-emerald-950/5 text-center">
        <p class="text-[10px] text-emerald-950/40 font-bold uppercase tracking-tight">
            Sudah ada akun?
            <a href="{{ route('login') }}" class="text-emerald-950 font-black ml-1 hover:text-emerald-500">MASUK →</a>
        </p>
    </div>

@endsection
