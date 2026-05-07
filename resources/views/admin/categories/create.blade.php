@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.categories.index') }}" class="text-emerald-600 hover:text-emerald-800 text-sm flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Daftar Kategori
        </a>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.categories._form')
    </form>
@endsection
