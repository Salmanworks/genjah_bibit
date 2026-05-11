@extends('layouts.admin')

@section('title', 'Edit Testimoni')

@section('content')
<!-- Header -->
<section class="relative mb-8">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.testimonials.index') }}" class="p-3 bg-white/5 hover:bg-white/10 text-white rounded-xl transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Testimoni</h1>
            <p class="text-emerald-100/40 text-sm">Edit testimoni dari {{ $testimonial->name }}</p>
        </div>
    </div>
</section>

<!-- Form -->
<section class="relative">
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="admin-card p-8 rounded-2xl space-y-6">
            <h2 class="text-xl font-bold text-white mb-6">Informasi Testimoni</h2>
            
            <!-- Name -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Nama Customer <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Location -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Lokasi <span class="text-red-400">*</span></label>
                <input type="text" name="location" value="{{ old('location', $testimonial->location) }}" required placeholder="Contoh: Jakarta, Indonesia" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all @error('location') border-red-500 @enderror">
                @error('location')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Avatar -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Foto Avatar</label>
                <div class="flex items-start gap-4">
                    <div id="avatarPreview" class="w-24 h-24 rounded-2xl bg-white/5 border-2 border-dashed border-white/20 flex items-center justify-center overflow-hidden">
                        @if($testimonial->avatar)
                            <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                        @else
                            <svg class="w-10 h-10 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <input type="file" name="avatar" id="avatarInput" accept="image/*" class="hidden">
                        <label for="avatarInput" class="inline-block px-6 py-3 bg-white/10 hover:bg-white/20 text-white rounded-xl font-semibold cursor-pointer transition-all">
                            Ganti Foto
                        </label>
                        <p class="text-xs text-white/40 mt-2">Format: JPG, PNG. Maksimal 2MB</p>
                        @if($testimonial->avatar)
                            <p class="text-xs text-lime-400 mt-1">Foto saat ini: {{ basename($testimonial->avatar) }}</p>
                        @endif
                        @error('avatar')
                            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Rating -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Rating <span class="text-red-400">*</span></label>
                <div class="flex gap-2">
                    @for($i = 1; $i <= 5; $i++)
                    <label class="cursor-pointer">
                        <input type="radio" name="rating" value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'checked' : '' }} required class="hidden peer">
                        <div class="w-12 h-12 rounded-xl bg-white/5 border-2 border-white/10 flex items-center justify-center text-white/30 peer-checked:bg-lime-500/20 peer-checked:border-lime-500 peer-checked:text-lime-400 transition-all hover:border-white/30">
                            <span class="font-bold">{{ $i }}</span>
                        </div>
                    </label>
                    @endfor
                </div>
                @error('rating')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Content -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Isi Testimoni <span class="text-red-400">*</span></label>
                <textarea name="content" rows="5" required placeholder="Tulis testimoni customer di sini..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all resize-none @error('content') border-red-500 @enderror">{{ old('content', $testimonial->content) }}</textarea>
                @error('content')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Product Purchased -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Produk yang Dibeli</label>
                <input type="text" name="product_purchased" value="{{ old('product_purchased', $testimonial->product_purchased) }}" placeholder="Contoh: Bibit Mangga Harum Manis" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all @error('product_purchased') border-red-500 @enderror">
                @error('product_purchased')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Sort Order -->
            <div>
                <label class="block text-sm font-bold text-white mb-2">Urutan Tampil</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" min="0" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all @error('sort_order') border-red-500 @enderror">
                <p class="text-xs text-white/40 mt-2">Semakin kecil angka, semakin atas posisinya</p>
                @error('sort_order')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Status -->
            <div>
                <label class="flex items-center gap-3 cursor-pointer group">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }} class="w-5 h-5 rounded bg-white/5 border-2 border-white/20 text-lime-500 focus:ring-2 focus:ring-lime-500 focus:ring-offset-0 transition-all">
                    <span class="text-sm font-bold text-white group-hover:text-lime-400 transition-colors">Aktifkan testimoni ini</span>
                </label>
            </div>
        </div>
        
        <!-- Actions -->
        <div class="flex gap-4">
            <button type="submit" class="px-8 py-4 bg-lime-500 hover:bg-lime-400 text-emerald-950 rounded-xl font-bold transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Update Testimoni
            </button>
            <a href="{{ route('admin.testimonials.index') }}" class="px-8 py-4 bg-white/5 hover:bg-white/10 text-white rounded-xl font-bold transition-all">
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
