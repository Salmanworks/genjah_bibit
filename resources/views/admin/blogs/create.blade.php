@extends('layouts.admin')

@section('title', 'Tambah Blog')

@section('content')
<!-- Header -->
<section class="relative mb-8">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.blogs.index') }}" class="p-3 bg-white/5 hover:bg-white/10 text-white rounded-xl transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Tambah Blog</h1>
            <p class="text-emerald-100/40 text-sm">Buat blog atau artikel baru</p>
        </div>
    </div>
</section>

<!-- Form -->
<section class="relative">
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="admin-card p-8 rounded-2xl space-y-6">
            <h2 class="text-xl font-bold text-white mb-6">Informasi Blog</h2>
            
            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Judul Blog <span class="text-red-400">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Masukkan judul blog..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Category -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Kategori</label>
                <input type="text" name="category" value="{{ old('category') }}" placeholder="Contoh: Tips Berkebun, Panduan Perawatan" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all @error('category') border-red-500 @enderror">
                @error('category')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Featured Image -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Gambar Utama</label>
                <div class="flex flex-col gap-4">
                    <div id="imagePreview" class="w-full max-w-2xl aspect-video rounded-2xl bg-white/5 border-2 border-dashed border-white/20 flex items-center justify-center overflow-hidden">
                        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <input type="file" name="featured_image" id="imageInput" accept="image/*" class="hidden">
                        <label for="imageInput" class="inline-block px-6 py-3 bg-white/10 hover:bg-white/20 text-white rounded-xl font-semibold cursor-pointer transition-all">
                            Pilih Gambar
                        </label>
                        <p class="text-xs text-white/40 mt-2">Format: JPG, PNG. Maksimal 2MB. Rekomendasi: 1200x630px</p>
                        @error('featured_image')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Excerpt -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Ringkasan <span class="text-red-400">*</span></label>
                <textarea name="excerpt" rows="3" required placeholder="Tulis ringkasan singkat blog (akan muncul di preview)..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all resize-none @error('excerpt') border-red-500 @enderror">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Content -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Konten Blog <span class="text-red-400">*</span></label>
                <textarea name="content" rows="15" required placeholder="Tulis konten blog lengkap di sini..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all resize-none @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                <p class="text-xs text-white/40 mt-2">Anda bisa menggunakan HTML untuk formatting</p>
                @error('content')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Tags -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Tags</label>
                <input type="text" name="tags" value="{{ old('tags') }}" placeholder="Contoh: bibit, tanaman, berkebun (pisahkan dengan koma)" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all @error('tags') border-red-500 @enderror">
                <p class="text-xs text-white/40 mt-2">Pisahkan setiap tag dengan koma</p>
                @error('tags')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Published Date -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Tanggal Publish</label>
                <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all @error('published_at') border-red-500 @enderror">
                <p class="text-xs text-white/40 mt-2">Kosongkan untuk menggunakan waktu sekarang</p>
                @error('published_at')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Status Checkboxes -->
            <div class="space-y-3">
                <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }} class="w-5 h-5 rounded bg-white/5 border-2 border-white/20 text-lime-500 focus:ring-2 focus:ring-lime-500 focus:ring-offset-0 transition-all">
                    <span class="text-sm font-bold text-white group-hover:text-lime-400 transition-colors">Publish blog ini</span>
                </label>
                
                <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="w-5 h-5 rounded bg-white/5 border-2 border-white/20 text-lime-500 focus:ring-2 focus:ring-lime-500 focus:ring-offset-0 transition-all">
                    <span class="text-sm font-bold text-white group-hover:text-lime-400 transition-colors">Jadikan blog featured</span>
                </label>
            </div>
        </div>
        
        <!-- Actions -->
        <div class="flex gap-4">
            <button type="submit" class="px-8 py-4 bg-lime-500 hover:bg-lime-400 text-emerald-950 rounded-xl font-bold transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Blog
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="px-8 py-4 bg-white/5 hover:bg-white/10 text-white rounded-xl font-bold transition-all">
                Batal
            </a>
        </div>
    </form>
</section>

<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
