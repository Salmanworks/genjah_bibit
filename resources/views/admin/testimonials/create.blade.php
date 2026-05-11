@extends('layouts.admin')

@section('title', 'Tambah Testimoni')

@section('content')
<!-- Header -->
<section class="relative mb-8">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.testimonials.index') }}" class="admin-icon-btn">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="admin-page-title">Tambah Testimoni</h1>
            <p class="admin-page-subtitle">Tambahkan testimoni customer baru</p>
        </div>
    </div>
</section>

<!-- Form -->
<section class="relative">
    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="glass-card p-8 rounded-2xl space-y-6">
            <h2 class="text-xl font-bold text-[#1f2b21] mb-6">Informasi Testimoni</h2>
            
            <!-- Name -->
            <div>
                <label class="block text-sm font-bold text-[#1f2b21] mb-2">Nama Customer <span class="text-red-600">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required class="admin-input w-full @error('name') !border-red-500 @enderror">
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Location -->
            <div>
                <label class="block text-sm font-bold text-[#1f2b21] mb-2">Lokasi <span class="text-red-600">*</span></label>
                <input type="text" name="location" value="{{ old('location') }}" required placeholder="Contoh: Jakarta, Indonesia" class="admin-input w-full @error('location') !border-red-500 @enderror">
                @error('location')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Avatar -->
            <div>
                <label class="block text-sm font-bold text-[#1f2b21] mb-2">Foto Avatar</label>
                <div class="flex items-start gap-4">
                    <div id="avatarPreview" class="w-24 h-24 rounded-2xl bg-[#5b765f]/10 border-2 border-dashed border-[#5b765f]/30 flex items-center justify-center overflow-hidden">
                        <svg class="w-10 h-10 text-[#5b765f]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <input type="file" name="avatar" id="avatarInput" accept="image/*" class="hidden">
                        <label for="avatarInput" class="inline-block px-6 py-3 bg-[#5b765f]/10 hover:bg-[#5b765f]/20 text-[#5b765f] rounded-xl font-semibold cursor-pointer transition-all border border-[#5b765f]/20">
                            Pilih Foto
                        </label>
                        <p class="text-xs text-[#5f6e61] mt-2">Format: JPG, PNG. Maksimal 2MB</p>
                        @error('avatar')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Rating -->
            <div>
                <label class="block text-sm font-bold text-[#1f2b21] mb-2">Rating <span class="text-red-600">*</span></label>
                <div class="flex gap-2">
                    @for($i = 1; $i <= 5; $i++)
                    <label class="cursor-pointer">
                        <input type="radio" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required class="hidden peer">
                        <div class="w-12 h-12 rounded-xl bg-white border-2 border-[#5b765f]/20 flex items-center justify-center text-[#5f6e61] peer-checked:bg-[#95b06f]/20 peer-checked:border-[#95b06f] peer-checked:text-[#5b765f] transition-all hover:border-[#5b765f]/40">
                            <span class="font-bold">{{ $i }}</span>
                        </div>
                    </label>
                    @endfor
                </div>
                @error('rating')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Content -->
            <div>
                <label class="block text-sm font-bold text-[#1f2b21] mb-2">Isi Testimoni <span class="text-red-600">*</span></label>
                <textarea name="content" rows="5" required placeholder="Tulis testimoni customer di sini..." class="admin-input w-full resize-none @error('content') !border-red-500 @enderror">{{ old('content') }}</textarea>
                @error('content')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Product Purchased -->
            <div>
                <label class="block text-sm font-bold text-[#1f2b21] mb-2">Produk yang Dibeli</label>
                <input type="text" name="product_purchased" value="{{ old('product_purchased') }}" placeholder="Contoh: Bibit Mangga Harum Manis" class="admin-input w-full @error('product_purchased') !border-red-500 @enderror">
                @error('product_purchased')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Sort Order -->
            <div>
                <label class="block text-sm font-bold text-[#1f2b21] mb-2">Urutan Tampil</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" class="admin-input w-full @error('sort_order') !border-red-500 @enderror">
                <p class="text-xs text-[#5f6e61] mt-2">Semakin kecil angka, semakin atas posisinya</p>
                @error('sort_order')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Status -->
            <div>
                <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="w-5 h-5 rounded bg-white border-2 border-[#5b765f]/30 text-[#5b765f] focus:ring-2 focus:ring-[#5b765f]/30 transition-all">
                    <span class="text-sm font-bold text-[#1f2b21] group-hover:text-[#5b765f] transition-colors">Aktifkan testimoni ini</span>
                </label>
            </div>
        </div>
        
        <!-- Actions -->
        <div class="flex gap-4">
            <button type="submit" class="btn-premium px-8 py-4 rounded-xl flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Simpan Testimoni
            </button>
            <a href="{{ route('admin.testimonials.index') }}" class="px-8 py-4 bg-white hover:bg-[#f4f2ec] text-[#3b5340] rounded-xl font-bold transition-all border border-[#5b765f]/20">
                Batal
            </a>
        </div>
    </form>
</section>

<script>
document.getElementById('avatarInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatarPreview').innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
        }
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
