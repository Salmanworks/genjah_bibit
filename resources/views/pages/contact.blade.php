@extends('layouts.main')

@section('title', 'Kontak - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header Section -->
<section class="relative pt-32 pb-12 md:pt-40 md:pb-16 overflow-hidden">
    <!-- Elegant gradient background using theme colors -->
    <div class="absolute inset-0" style="background: linear-gradient(135deg, #2B3A28 0%, #6B8269 50%, #4A5D48 100%);"></div>
    <!-- Subtle pattern overlay -->
    <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/15 backdrop-blur-sm border border-white/30 mb-6">
                <span class="w-2 h-2 rounded-full" style="background-color: #D48C70;"></span>
                <span class="text-xs font-semibold text-white/90 tracking-wider uppercase">Hubungi Kami</span>
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight" style="color: #F4F1EA;">
                Kontak <span style="color: #D48C70;">Kami</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed mb-8" style="color: rgba(244, 241, 234, 0.8);">
                Kami siap membantu Anda memilih bibit tanaman terbaik untuk kebun impian Anda
            </p>
            
            <!-- Decorative line -->
            <div class="flex items-center justify-center gap-4">
                <div class="h-px w-20" style="background: linear-gradient(to right, transparent, rgba(244, 241, 234, 0.4));"></div>
                <svg class="w-5 h-5" style="color: rgba(244, 241, 234, 0.5);" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <div class="h-px w-20" style="background: linear-gradient(to left, transparent, rgba(244, 241, 234, 0.4));"></div>
            </div>
        </div>
    </div>
</section>

<!-- Section 1: Info Cards -->
<section class="relative py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-10">
            <!-- WhatsApp -->
            <a href="{{ whatsapp_link() }}" target="_blank" class="group bg-white p-10 shadow-2xl border border-emerald-500/5 hover:border-lime-500/30 transition-all card-hover text-center" style="border-radius: 50px;">
                <div class="w-20 h-20 bg-emerald-900 flex items-center justify-center mx-auto mb-6 group-hover:bg-lime-500 transition-colors shadow-lg shadow-emerald-900/20 group-hover:shadow-lime-500/20" style="border-radius: 24px;">
                    <svg class="w-10 h-10 text-white group-hover:text-emerald-950 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-emerald-950 mb-3 uppercase tracking-tight">WhatsApp</h3>
                <p class="text-emerald-900/50 font-bold mb-4 uppercase text-xs tracking-widest">Respon Cepat 24/7</p>
                <span class="text-xl font-black text-lime-500 tracking-tighter">{{ setting('phone', '0889-5045-078') }}</span>
            </a>
            
            <!-- Email -->
            <a href="mailto:{{ setting('email', 'genjah@bibit.com') }}" class="group bg-white p-10 shadow-2xl border border-emerald-500/5 hover:border-lime-500/30 transition-all card-hover text-center" style="border-radius: 50px;">
                <div class="w-20 h-20 bg-emerald-900 flex items-center justify-center mx-auto mb-6 group-hover:bg-lime-500 transition-colors shadow-lg shadow-emerald-900/20 group-hover:shadow-lime-500/20" style="border-radius: 24px;">
                    <svg class="w-10 h-10 text-white group-hover:text-emerald-950 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-emerald-950 mb-3 uppercase tracking-tight">Email</h3>
                <p class="text-emerald-900/50 font-bold mb-4 uppercase text-xs tracking-widest">Kirim Pertanyaan</p>
                <span class="text-lg font-black text-lime-500 tracking-tighter break-all">{{ setting('email', 'genjahrumahbibit@gmail.com') }}</span>
            </a>
            
            <!-- Location -->
            <a href="https://maps.google.com" target="_blank" class="group bg-white p-10 shadow-2xl border border-emerald-500/5 hover:border-lime-500/30 transition-all card-hover text-center" style="border-radius: 50px;">
                <div class="w-20 h-20 bg-emerald-900 flex items-center justify-center mx-auto mb-6 group-hover:bg-lime-500 transition-colors shadow-lg shadow-emerald-900/20 group-hover:shadow-lime-500/20" style="border-radius: 24px;">
                    <svg class="w-10 h-10 text-white group-hover:text-emerald-950 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-emerald-950 mb-3 uppercase tracking-tight">Lokasi</h3>
                <p class="text-emerald-900/50 font-bold mb-4 uppercase text-xs tracking-widest">Kunjungi Kami</p>
                <span class="text-sm font-black text-lime-500 tracking-tighter uppercase">Mlonggo, Jepara, Jateng</span>
            </a>
        </div>
    </div>
</section>

<!-- Section 2: Side-by-Side Form & Map (FIXED SPACING) -->
<section class="relative py-32 bg-white mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-20 items-start">
            <!-- Form Card -->
            <div class="bg-white p-10 shadow-2xl border border-emerald-500/5" style="border-radius: 60px;">
                <h3 class="text-3xl font-black text-emerald-950 mb-8 uppercase tracking-tight">Kirim <span class="text-lime-500">Pesan</span></h3>
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-emerald-950 uppercase tracking-widest ml-6">Nama Lengkap</label>
                            <input type="text" name="name" required class="w-full px-6 py-4 bg-emerald-50 border border-emerald-100 rounded-full text-emerald-950 font-bold placeholder-emerald-900/30 focus:outline-none focus:ring-4 focus:ring-lime-500/10 focus:border-lime-500 transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-emerald-950 uppercase tracking-widest ml-6">Email</label>
                            <input type="email" name="email" required class="w-full px-6 py-4 bg-emerald-50 border border-emerald-100 rounded-full text-emerald-950 font-bold placeholder-emerald-900/30 focus:outline-none focus:ring-4 focus:ring-lime-500/10 focus:border-lime-500 transition-all">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-emerald-950 uppercase tracking-widest ml-6">Subjek Pesan</label>
                        <input type="text" name="subject" required class="w-full px-6 py-4 bg-emerald-50 border border-emerald-100 rounded-full text-emerald-950 font-bold placeholder-emerald-900/30 focus:outline-none focus:ring-4 focus:ring-lime-500/10 focus:border-lime-500 transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-emerald-950 uppercase tracking-widest ml-6">Isi Pesan</label>
                        <textarea name="message" rows="4" required class="w-full px-8 py-6 bg-emerald-50 border border-emerald-100 rounded-[40px] text-emerald-950 font-bold placeholder-emerald-900/30 focus:outline-none focus:ring-4 focus:ring-lime-500/10 focus:border-lime-500 transition-all resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full py-5 bg-emerald-950 text-white font-black rounded-full hover:bg-emerald-900 transition-all shadow-xl shadow-emerald-950/20 text-xl uppercase tracking-widest">
                        Kirim Sekarang
                    </button>
                </form>
            </div>

            <!-- Map Card -->
            <div class="bg-white p-6 shadow-2xl border border-emerald-500/5 relative overflow-hidden" style="border-radius: 60px;">
                <div class="aspect-square overflow-hidden mb-8 shadow-inner" style="border-radius: 40px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.123456789!2d110.723456!3d-6.573456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c5e8abcdef12%3A0x123456789abcdef0!2sGenjah%20Rumah%20Bibit%2C%20DK%20Tlingsing%2C%20Jambu%20Timur%2C%20Kec.%20Mlonggo%2C%20Kabupaten%20Jepara%2C%20Jawa%20Tengah%2059452!5e0!3m2!1sid!2sid!4v1600000000000!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
                <div class="px-6 pb-6 text-center lg:text-left">
                    <h4 class="text-3xl font-black text-emerald-950 mb-4 uppercase tracking-tight">Alamat <span class="text-lime-500">Kami</span></h4>
                    <p class="text-xl text-emerald-900 font-black leading-relaxed mb-8">
                        DK tlingsing, RT 09 RW 02 Jambu Timur, Kecamatan Mlonggo, Kabupaten Jepara, Jawa Tengah 59452
                    </p>
                    <div class="flex items-center justify-center lg:justify-start gap-4 text-emerald-950 font-black uppercase text-sm tracking-widest bg-lime-500 px-8 py-4 rounded-full w-fit shadow-lg shadow-lime-500/20 mx-auto lg:mx-0">
                        <span class="w-3 h-3 rounded-full bg-white animate-pulse"></span>
                        Buka: 08:00 - 17:00 WIB
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: CTA -->
<section class="relative py-20 overflow-hidden">
    <!-- Elegant gradient background -->
    <div class="absolute inset-0" style="background: linear-gradient(135deg, #2B3A28 0%, #4A5D48 50%, #6B8269 100%);"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/15 backdrop-blur-sm border border-white/30 mb-6">
            <span class="w-2 h-2 rounded-full" style="background-color: #D48C70;"></span>
            <span class="text-xs font-semibold text-white/90 tracking-wider uppercase">Butuh Bantuan?</span>
        </div>
        
        <!-- Title -->
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 tracking-tight" style="color: #F4F1EA;">
            Konsultasi <span style="color: #D48C70;">Gratis</span>
        </h2>
        
        <!-- Subtitle -->
        <p class="text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed mb-10" style="color: rgba(244, 241, 234, 0.8);">
            Tim ahli kami siap memberikan rekomendasi bibit terbaik secara gratis via WhatsApp
        </p>
        
        <!-- Button -->
        <a href="{{ whatsapp_link() }}" target="_blank" class="inline-flex items-center gap-3 px-8 py-4 rounded-full font-semibold text-sm transition-all duration-300 shadow-lg hover:shadow-xl" style="background-color: #D48C70; color: #F4F1EA;">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
            Konsultasi Sekarang
        </a>
    </div>
</section>
@endsection
