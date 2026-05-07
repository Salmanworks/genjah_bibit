<div class="admin-product-layout grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
    <div class="admin-product-main lg:col-span-8 space-y-6">
        <div class="glass-card rounded-3xl p-6 lg:p-8 animate-fade-up">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Informasi Utama
            </h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Nama Bibit Tanaman *</label>
                    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="E.g. Jambu Kristal Super">
                    @error('name') <p class="text-red-400 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Nama Ilmiah (Latin)</label>
                    <input type="text" name="scientific_name" value="{{ old('scientific_name', $product->scientific_name ?? '') }}" class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="E.g. Psidium guajava">
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Deskripsi Lengkap *</label>
                    <textarea name="description" rows="5" required class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="Jelaskan keunggulan bibit ini...">{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description') <p class="text-red-400 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Instruksi Perawatan</label>
                    <textarea name="care_instructions" rows="3" class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="Cara penyiraman, pemupukan, dll...">{{ old('care_instructions', $product->care_instructions ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 lg:p-8 animate-fade-up" style="animation-delay: 0.1s">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Harga & Ketersediaan
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Harga Jual (Rp) *</label>
                    <input type="number" name="price" value="{{ old('price', $product->price ?? '') }}" required min="0" class="admin-input w-full px-6 py-3 rounded-2xl">
                    @error('price') <p class="text-red-400 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Harga Coreti (Rp)</label>
                    <input type="number" name="original_price" value="{{ old('original_price', $product->original_price ?? '') }}" min="0" class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Stok Tersedia *</label>
                    <input type="number" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" required min="0" class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 lg:p-8 animate-fade-up" style="animation-delay: 0.2s">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                Spesifikasi Bibit
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Tinggi Tanaman</label>
                    <input type="text" name="size" value="{{ old('size', $product->size ?? '') }}" placeholder="E.g. 40 - 60 cm" class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Berat Pengiriman</label>
                    <input type="text" name="weight" value="{{ old('weight', $product->weight ?? '') }}" placeholder="E.g. 1 kg" class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Ukuran Pot / Polybag</label>
                    <input type="text" name="pot_size" value="{{ old('pot_size', $product->pot_size ?? '') }}" placeholder="E.g. Pot 25" class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Umur Bibit (Bulan)</label>
                    <input type="number" name="age_months" value="{{ old('age_months', $product->age_months ?? '') }}" min="0" class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Asal Bibit / Daerah</label>
                    <input type="text" name="origin" value="{{ old('origin', $product->origin ?? '') }}" placeholder="E.g. Perbanyakan Okulasi / Kediri" class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 lg:p-8 animate-fade-up" style="animation-delay: 0.3s">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Media Visual
            </h3>
            <div class="space-y-8">
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-4">Gambar Utama {{ isset($product) ? '' : '*' }}</label>
                    <div class="flex items-center gap-6">
                        @if(isset($product) && $product->main_image)
                            <div class="w-24 h-24 rounded-2xl overflow-hidden border border-white/5 shadow-xl flex-shrink-0">
                                <img src="{{ asset('storage/' . $product->main_image) }}" alt="Current" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" name="main_image" accept="image/*" {{ isset($product) ? '' : 'required' }} class="admin-input w-full px-6 py-3 rounded-2xl file:mr-4 file:py-1 file:px-3 file:rounded-xl file:border-0 file:bg-lime-500/10 file:text-lime-400 file:font-bold file:text-xs">
                            <p class="text-[10px] text-lime-100/20 mt-2 uppercase font-bold tracking-widest italic">Format: JPG, PNG, WEBP. Maks: 2MB</p>
                        </div>
                    </div>
                    @error('main_image') <p class="text-red-400 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-4">Galeri Produk (Multiple)</label>
                    @if(isset($product) && $product->gallery_images)
                        <div class="grid grid-cols-4 md:grid-cols-6 gap-4 mb-6">
                            @foreach($product->gallery_images as $img)
                                <div class="relative aspect-square rounded-2xl overflow-hidden border border-white/5 bg-white/5 group">
                                    <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="gallery_images[]" accept="image/*" multiple class="admin-input w-full px-6 py-3 rounded-2xl file:mr-4 file:py-1 file:px-3 file:rounded-xl file:border-0 file:bg-lime-500/10 file:text-lime-400 file:font-bold file:text-xs">
                    <p class="text-[10px] text-lime-100/20 mt-2 uppercase font-bold tracking-widest">Tips: Pilih beberapa gambar sekaligus untuk memperkaya katalog.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-product-side lg:col-span-4 space-y-6">
        <div class="glass-card rounded-3xl p-6 lg:p-8 animate-fade-up" style="animation-delay: 0.4s">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                Klasifikasi
            </h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Kategori Utama *</label>
                    <select name="category_id" required class="admin-input w-full px-6 py-3 rounded-2xl">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="text-red-400 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Subkategori (Opsional)</label>
                    <select name="subcategory_id" class="admin-input w-full px-6 py-3 rounded-2xl">
                        <option value="">Tanpa Subkategori</option>
                        @foreach($subcategories as $sub)
                            <option value="{{ $sub->id }}" {{ old('subcategory_id', $product->subcategory_id ?? '') == $sub->id ? 'selected' : '' }}>{{ $sub->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6 lg:p-8 animate-fade-up" style="animation-delay: 0.5s">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Opsi & Status
            </h3>
            <div class="space-y-4">
                <label class="flex items-center group cursor-pointer">
                    <div class="relative">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 rounded-full peer-checked:bg-lime-500 transition-colors border border-white/5"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5"></div>
                    </div>
                    <span class="ml-4 text-sm font-bold text-lime-100/40 group-hover:text-lime-400 transition-colors">Tampilkan di Website</span>
                </label>
                <label class="flex items-center group cursor-pointer">
                    <div class="relative">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 rounded-full peer-checked:bg-blue-500 transition-colors border border-white/5"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5"></div>
                    </div>
                    <span class="ml-4 text-sm font-bold text-lime-100/40 group-hover:text-blue-400 transition-colors">Produk Unggulan</span>
                </label>
                <label class="flex items-center group cursor-pointer">
                    <div class="relative">
                        <input type="hidden" name="is_bestseller" value="0">
                        <input type="checkbox" name="is_bestseller" value="1" {{ old('is_bestseller', $product->is_bestseller ?? false) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 rounded-full peer-checked:bg-amber-500 transition-colors border border-white/5"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5"></div>
                    </div>
                    <span class="ml-4 text-sm font-bold text-lime-100/40 group-hover:text-amber-400 transition-colors">Bestseller</span>
                </label>
                <label class="flex items-center group cursor-pointer">
                    <div class="relative">
                        <input type="hidden" name="is_new_arrival" value="0">
                        <input type="checkbox" name="is_new_arrival" value="1" {{ old('is_new_arrival', $product->is_new_arrival ?? false) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 rounded-full peer-checked:bg-purple-500 transition-colors border border-white/5"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5"></div>
                    </div>
                    <span class="ml-4 text-sm font-bold text-lime-100/40 group-hover:text-purple-400 transition-colors">Produk Baru</span>
                </label>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-4 lg:p-5 animate-fade-up" style="animation-delay: 0.6s">
            <button type="submit" class="btn-premium w-full py-4 rounded-2xl font-bold flex items-center justify-center gap-2 text-base lg:text-lg shadow-2xl shadow-lime-500/20 transition-transform active:scale-95">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
            {{ isset($product) ? 'Perbarui Katalog' : 'Simpan Koleksi' }}
            </button>
        </div>
    </div>
</div>
