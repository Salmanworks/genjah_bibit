@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
    <div class="mb-6 animate-fade-up">
        <a href="{{ route('admin.products.index') }}" class="admin-back-link">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Produk
        </a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.products._form')
    </form>
@endsection
