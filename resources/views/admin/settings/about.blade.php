@extends('layouts.admin')

@section('title', 'Edit Tentang Kami')

@section('content')
<!-- Header -->
<section class="relative mb-8">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.settings.index') }}" class="p-3 bg-white/5 hover:bg-white/10 text-white rounded-xl transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Tentang Kami</h1>
            <p class="text-emerald-100/40 text-sm">Kelola informasi halaman Tentang Kami</p>
        </div>
    </div>
</section>

<!-- Form -->
<section class="relative">
    <form action="{{ route('admin.settings.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="admin-card p-8 rounded-2xl space-y-6">
            <h2 class="text-xl font-bold text-white mb-6">Konten Utama</h2>
            
            <div>
                <label class="block text-sm font-bold text-white mb-2">Judul (Title)</label>
                <input type="text" name="about_title" value="{{ old('about_title', $settings['about_title'] ?? 'Tentang Kami') }}" placeholder="Contoh: Tentang Kami" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
            </div>

            <div>
                <label class="block text-sm font-bold text-white mb-2">Subjudul (Subtitle)</label>
                <input type="text" name="about_subtitle" value="{{ old('about_subtitle', $settings['about_subtitle'] ?? 'Dedikasi Untuk Kebun Impian Anda') }}" placeholder="Contoh: Dedikasi Untuk Kebun Impian Anda" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-white mb-2">Deskripsi Utama</label>
                <textarea name="about_description" rows="6" placeholder="Ceritakan tentang sejarah, visi, atau misi toko..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all resize-none">{{ old('about_description', $settings['about_description'] ?? '') }}</textarea>
                <p class="text-xs text-white/40 mt-2">Gunakan deskripsi ini untuk menceritakan latar belakang berdirinya Genjah Rumah Bibit.</p>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-white mb-2">Kutipan (Quote)</label>
                <textarea name="about_quote" rows="3" placeholder="Kutipan inspiratif atau moto toko..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all resize-none">{{ old('about_quote', $settings['about_quote'] ?? 'Genjah Rumah Bibit — tumbuh bersama petani dan pecinta tanaman Indonesia.') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-bold text-white mb-2">Gambar Tentang Kami</label>
                @if(!empty($settings['about_image']))
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $settings['about_image']) }}" alt="Gambar Tentang Kami" class="w-48 h-auto rounded-lg border border-white/10 object-cover">
                    </div>
                @endif
                <input type="file" name="about_image" accept="image/*" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
                <p class="text-xs text-white/40 mt-2">Format: JPG, PNG, WEBP. Maks 2MB. Kosongkan jika tidak ingin mengganti gambar.</p>
                @error('about_image')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <!-- Actions -->
        <div class="flex gap-4">
            <button type="submit" class="px-8 py-4 bg-lime-500 hover:bg-lime-400 text-emerald-950 rounded-xl font-bold transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.settings.index') }}" class="px-8 py-4 bg-white/5 hover:bg-white/10 text-white rounded-xl font-bold transition-all">
                Batal
            </a>
        </div>
    </form>
</section>
@endsection
