@extends('layouts.admin')

@section('title', 'Pengaturan Toko')

@section('content')
    <div class="flex justify-between items-center mb-8 animate-fade-up">
        <div>
            <h3 class="text-2xl font-extrabold text-white tracking-tight">Pengaturan Toko</h3>
            <p class="text-sm text-lime-100/40">Konfigurasi identitas dan integrasi Genjah Rumah Bibit</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- General Info -->
                <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.1s">
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Informasi Identitas
                    </h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Nama Toko</label>
                            <input type="text" name="store_name" value="{{ $settings['store_name'] ?? 'Genjah Rumah Bibit' }}" class="admin-input w-full px-6 py-3 rounded-2xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Tagline Slogan</label>
                            <input type="text" name="store_tagline" value="{{ $settings['store_tagline'] ?? '' }}" class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="E.g. Pusat Bibit Unggul & Berkualitas">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Deskripsi Toko</label>
                            <textarea name="store_description" rows="3" class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="Ceritakan sedikit tentang toko Anda...">{{ $settings['store_description'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.2s">
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Kontak & Lokasi
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Email Bisnis</label>
                            <input type="email" name="store_email" value="{{ $settings['store_email'] ?? '' }}" class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="admin@genjah.com">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">WhatsApp Number</label>
                            <div class="relative">
                                <span class="absolute left-6 top-1/2 -translate-y-1/2 text-lime-400 font-bold">+</span>
                                <input type="text" name="whatsapp_number" value="{{ $settings['whatsapp_number'] ?? '' }}" class="admin-input w-full pl-10 pr-6 py-3 rounded-2xl" placeholder="628123456789">
                            </div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Alamat Fisik</label>
                            <textarea name="store_address" rows="2" class="admin-input w-full px-6 py-3 rounded-2xl" placeholder="Jl. Raya Bibit No. 123...">{{ $settings['store_address'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Message -->
                <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.3s">
                    <h3 class="text-lg font-bold text-white mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                        Integrasi Checkout
                    </h3>
                    <p class="text-xs text-lime-100/30 mb-6">Gunakan tag: <code class="text-lime-400 bg-lime-400/10 px-1 rounded">[product_name]</code>, <code class="text-lime-400 bg-lime-400/10 px-1 rounded">[quantity]</code>, <code class="text-lime-400 bg-lime-400/10 px-1 rounded">[address]</code></p>
                    <textarea name="whatsapp_message" rows="4" class="admin-input w-full px-6 py-3 rounded-2xl">{{ $settings['whatsapp_message'] ?? "Halo Genjah Rumah Bibit, saya ingin memesan [product_name] sebanyak [quantity]. Berikut detail alamat saya: [address]" }}</textarea>
                </div>
            </div>

            <!-- Social Media & Save -->
            <div class="space-y-8">
                <div class="glass-card rounded-3xl p-8 animate-fade-up" style="animation-delay: 0.4s">
                    <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.828a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        Media Sosial
                    </h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Instagram</label>
                            <input type="text" name="instagram_url" value="{{ $settings['instagram_url'] ?? '' }}" placeholder="https://instagram.com/..." class="admin-input w-full px-6 py-3 rounded-2xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">Facebook</label>
                            <input type="text" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}" placeholder="https://facebook.com/..." class="admin-input w-full px-6 py-3 rounded-2xl">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-lime-100/30 uppercase tracking-widest mb-2">TikTok</label>
                            <input type="text" name="tiktok_url" value="{{ $settings['tiktok_url'] ?? '' }}" placeholder="https://tiktok.com/@..." class="admin-input w-full px-6 py-3 rounded-2xl">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-premium w-full py-4 rounded-3xl font-bold flex items-center justify-center gap-2 text-lg shadow-2xl shadow-lime-500/20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
@endsection
