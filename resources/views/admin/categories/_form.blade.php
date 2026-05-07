<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 space-y-8">
        <div class="glass-card rounded-3xl p-8 animate-fade-up">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Informasi Kategori
            </h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold text-emerald-100/30 uppercase tracking-widest mb-2">Nama Kategori *</label>
                    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" required class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="E.g. Tanaman Buah">
                    @error('name') <p class="text-red-400 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold text-emerald-100/30 uppercase tracking-widest mb-2">Deskripsi Singkat</label>
                    <textarea name="description" rows="4" class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="Jelaskan jenis tanaman dalam kategori ini...">{{ old('description', $category->description ?? '') }}</textarea>
                    @error('description') <p class="text-red-400 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.1s">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Visual & Identitas
            </h3>
            <div class="space-y-8">
                <div>
                    <label class="block text-xs font-bold text-emerald-100/30 uppercase tracking-widest mb-2">Ikon (Emoji / SVG)</label>
                    <input type="text" name="icon" value="{{ old('icon', $category->icon ?? '') }}" placeholder="E.g. 🪴 atau <svg>..." class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
                <div>
                    <label class="block text-xs font-bold text-emerald-100/30 uppercase tracking-widest mb-4">Gambar Sampul (Banner)</label>
                    <div class="flex items-center gap-6">
                        @if(isset($category) && $category->image)
                            <div class="w-32 h-20 rounded-2xl overflow-hidden border border-white/5 shadow-xl flex-shrink-0">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Current" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" name="image" accept="image/*" class="admin-input w-full px-6 py-3 rounded-2xl file:mr-4 file:py-1 file:px-3 file:rounded-xl file:border-0 file:bg-emerald-500/10 file:text-emerald-400 file:font-bold file:text-xs">
                        </div>
                    </div>
                    @error('image') <p class="text-red-400 text-xs mt-2 font-medium">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-8">
        <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.2s">
            <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Konfigurasi
            </h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-xs font-bold text-emerald-100/30 uppercase tracking-widest mb-2">Urutan Tampil</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order ?? 0) }}" min="0" class="admin-input w-full px-6 py-3 rounded-2xl">
                </div>
                <label class="flex items-center group cursor-pointer">
                    <div class="relative">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-white/10 rounded-full peer-checked:bg-emerald-500 transition-colors border border-white/5"></div>
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform peer-checked:translate-x-5"></div>
                    </div>
                    <span class="ml-4 text-sm font-bold text-emerald-100/40 group-hover:text-emerald-400 transition-colors">Aktif di Website</span>
                </label>
            </div>
        </div>

        <button type="submit" class="btn-premium w-full py-4 rounded-3xl font-bold flex items-center justify-center gap-2 text-lg shadow-2xl shadow-emerald-500/20">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
            {{ isset($category) ? 'Update Kategori' : 'Simpan Kategori' }}
        </button>
    </div>
</div>
