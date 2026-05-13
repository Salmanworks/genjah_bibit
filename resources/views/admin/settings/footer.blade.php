@extends('layouts.admin')

@section('title', 'Edit Footer')

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
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Edit Footer</h1>
            <p class="text-emerald-100/40 text-sm">Kelola informasi footer website</p>
        </div>
    </div>
</section>

<!-- Form -->
<section class="relative">
    <form action="{{ route('admin.settings.footer.update') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- About Section -->
        <div class="admin-card p-8 rounded-2xl space-y-6">
            <h2 class="text-xl font-bold text-white mb-6">Tentang Kami (Footer)</h2>
            
            <div>
                <label class="block text-sm font-bold text-white mb-2">Deskripsi Singkat</label>
                <textarea name="footer_about" rows="4" placeholder="Deskripsi singkat tentang toko yang akan muncul di footer..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all resize-none">{{ old('footer_about', $settings['footer_about'] ?? '') }}</textarea>
                <p class="text-xs text-white/40 mt-2">Maksimal 200 karakter</p>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-white mb-2">Copyright Text</label>
                <input type="text" name="footer_copyright" value="{{ old('footer_copyright', $settings['footer_copyright'] ?? '© 2024 Genjah Rumah Bibit. All rights reserved.') }}" placeholder="© 2024 Genjah Rumah Bibit. All rights reserved." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="admin-card p-8 rounded-2xl space-y-6">
            <h2 class="text-xl font-bold text-white mb-6">Informasi Kontak</h2>
            
            <div>
                <label class="block text-sm font-bold text-white mb-2">Alamat Lengkap</label>
                <textarea name="footer_address" rows="3" placeholder="Alamat lengkap toko..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all resize-none">{{ old('footer_address', $settings['footer_address'] ?? '') }}</textarea>
            </div>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Email</label>
                    <input type="email" name="footer_email" value="{{ old('footer_email', $settings['footer_email'] ?? '') }}" placeholder="email@example.com" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Telepon</label>
                    <input type="text" name="footer_phone" value="{{ old('footer_phone', $settings['footer_phone'] ?? '') }}" placeholder="0812-3456-7890" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-white mb-2">WhatsApp</label>
                <input type="text" name="footer_whatsapp" value="{{ old('footer_whatsapp', $settings['footer_whatsapp'] ?? '') }}" placeholder="628123456789" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
                <p class="text-xs text-white/40 mt-2">Format: 628123456789 (tanpa +, tanpa spasi)</p>
            </div>
        </div>
        
        <!-- Social Media -->
        <div class="admin-card p-8 rounded-2xl space-y-6">
            <h2 class="text-xl font-bold text-white mb-6">Media Sosial</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Instagram URL</label>
                    <input type="url" name="footer_instagram" value="{{ old('footer_instagram', $settings['footer_instagram'] ?? '') }}" placeholder="https://instagram.com/username" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-white mb-2">Facebook URL</label>
                    <input type="url" name="footer_facebook" value="{{ old('footer_facebook', $settings['footer_facebook'] ?? '') }}" placeholder="https://facebook.com/page" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-white mb-2">TikTok URL</label>
                    <input type="url" name="footer_tiktok" value="{{ old('footer_tiktok', $settings['footer_tiktok'] ?? '') }}" placeholder="https://tiktok.com/@username" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-white mb-2">YouTube URL</label>
                    <input type="url" name="footer_youtube" value="{{ old('footer_youtube', $settings['footer_youtube'] ?? '') }}" placeholder="https://youtube.com/channel" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500 focus:bg-white/10 transition-all">
                </div>
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
