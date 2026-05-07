@extends('layouts.main')

@section('title', 'Kontak - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12">
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Hubungi Kami</h1>
        <p class="text-white max-w-2xl mx-auto">Kami siap membantu Anda. Hubungi kami melalui WhatsApp, email, atau kunjungi langsung ke lokasi kami.</p>
    </div>
</section>

<!-- Contact Info -->
<section class="relative py-12">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <!-- WhatsApp -->
            <a href="{{ whatsapp_link() }}" target="_blank" class="group glass-card p-8 rounded-2xl card-hover text-center">
                <div class="w-16 h-16 rounded-2xl bg-green-500/20 flex items-center justify-center mx-auto mb-4 group-hover:bg-green-500 transition-all">
                    <svg class="w-8 h-8 text-green-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">WhatsApp</h3>
                <p class="text-emerald-200/70 text-sm mb-3">Respon cepat 24/7</p>
                <span class="text-lime-400 font-medium">{{ setting('phone', '0889-5045-078') }}</span>
            </a>
            
            <!-- Email -->
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ setting('email', 'genjahrumahbibit@gmail.com') }}" target="_blank" class="group glass-card p-8 rounded-2xl card-hover text-center">
                <div class="w-16 h-16 rounded-2xl bg-blue-500/20 flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-500 transition-all">
                    <svg class="w-8 h-8 text-blue-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Email</h3>
                <p class="text-emerald-200/70 text-sm mb-3">Kirim pertanyaan Anda</p>
                <span class="text-lime-400 font-medium">{{ setting('email', 'genjahrumahbibit@gmail.com') }}</span>
            </a>
            
            <!-- Location -->
            <a href="https://www.google.com/maps/search/?api=1&query=DK+tlingsing,RT+09+RW+02+Jambu+Timur+Kecamatan+Mlonggo,Kabupaten+Jepara+provinsi+jawa+tengah+KODE+pos+59452" target="_blank" class="group glass-card p-8 rounded-2xl card-hover text-center">
                <div class="w-16 h-16 rounded-2xl bg-red-500/20 flex items-center justify-center mx-auto mb-4 group-hover:bg-red-500 transition-all">
                    <svg class="w-8 h-8 text-red-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-white mb-2">Lokasi</h3>
                <p class="text-emerald-200/70 text-sm mb-3">Kunjungi kami</p>
                <span class="text-lime-400 font-medium text-sm group-hover:text-white transition-colors">Mlonggo, Jepara, Jateng</span>
            </a>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Contact Form -->
            <div class="glass-card p-8 rounded-2xl">
                <h3 class="text-xl font-bold text-white mb-6">Kirim Pesan</h3>
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-emerald-300/70 mb-2">Nama Lengkap</label>
                            <input type="text" name="name" required
                                   class="w-full px-4 py-3 bg-white/10 border border-emerald-500/30 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-400 transition-colors">
                        </div>
                        <div>
                            <label class="block text-sm text-emerald-300/70 mb-2">Email</label>
                            <input type="email" name="email" required
                                   class="w-full px-4 py-3 bg-white/10 border border-emerald-500/30 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-400 transition-colors">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-emerald-300/70 mb-2">Nomor WhatsApp</label>
                        <input type="tel" name="phone"
                               class="w-full px-4 py-3 bg-white/10 border border-emerald-500/30 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-400 transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm text-emerald-300/70 mb-2">Subjek</label>
                        <input type="text" name="subject" required
                               class="w-full px-4 py-3 bg-white/10 border border-emerald-500/30 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-400 transition-colors">
                    </div>
                    <div>
                        <label class="block text-sm text-emerald-300/70 mb-2">Pesan</label>
                        <textarea name="message" rows="4" required
                                  class="w-full px-4 py-3 bg-white/10 border border-emerald-500/30 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-400 transition-colors resize-none"></textarea>
                    </div>
                    <button type="submit" class="w-full py-4 btn-lime rounded-xl text-lg font-medium">
                        Kirim Pesan
                    </button>
                </form>
            </div>
            
            <!-- Map -->
            <div class="glass-card p-2 rounded-2xl">
                <div class="aspect-square rounded-xl overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.123456789!2d110.723456!3d-6.573456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70c5e8abcdef12%3A0x123456789abcdef0!2sGenjah%20Rumah%20Bibit%2C%20DK%20Tlingsing%2C%20Jambu%20Timur%2C%20Kec.%20Mlonggo%2C%20Kabupaten%20Jepara%2C%20Jawa%20Tengah%2059452!5e0!3m2!1sid!2sid!4v1600000000000!5m2!1sid!2sid"
                        width="100%"
                        height="100%"
                        style="border:0; filter: grayscale(20%) hue-rotate(120deg) brightness(0.8);"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-white mb-2">Alamat Lengkap</h4>
                    <p class="text-emerald-200/70 text-sm">DK tlingsing,RT 09 RW 02 Jambu Timur Kecamatan Mlonggo,Kabupaten Jepara provinsi jawa tengah KODE pos 59452</p>
                    <p class="text-emerald-200/70 text-sm mt-2">{{ setting('operating_hours', 'Senin - Sabtu: 08.00 - 17.00 WIB') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-16">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1920&q=80" 
             alt="CTA Background" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-emerald-950/95 via-emerald-900/90 to-emerald-950/95"></div>
    </div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Butuh Bantuan Memilih Bibit?</h2>
        <p class="text-emerald-200/80 mb-8">Tim ahli kami siap membantu Anda menemukan bibit terbaik sesuai kebutuhan</p>
        <a href="{{ whatsapp_link('Halo Plant Power, saya butuh rekomendasi bibit tanaman') }}" target="_blank" class="inline-flex items-center gap-3 px-8 py-4 btn-lime rounded-full text-lg">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
            </svg>
            Konsultasi Gratis via WhatsApp
        </a>
    </div>
</section>
@endsection
