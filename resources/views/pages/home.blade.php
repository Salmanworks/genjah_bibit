@extends('layouts.main')

@section('title', setting('store_name', 'Plant Power') . ' - ' . setting('store_tagline', 'Pusat Bibit Tanaman Berkualitas'))

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Elegant gradient background -->
    <div class="absolute inset-0" style="background: linear-gradient(135deg, #F4F1EA 0%, #EBE6DC 50%, #E8EDE8 100%);"></div>
    
    <!-- Subtle pattern overlay -->
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%232B3A28" fill-opacity="0.4"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    
    <!-- Soft decorative circles -->
    <div class="absolute top-20 right-20 w-96 h-96 rounded-full opacity-10" style="background: radial-gradient(circle, #6B8269 0%, transparent 70%);"></div>
    <div class="absolute bottom-20 left-10 w-64 h-64 rounded-full opacity-10" style="background: radial-gradient(circle, #D48C70 0%, transparent 70%);"></div>
    
    <!-- CSS Animations -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hero-badge {
            animation: fadeInUp 0.6s ease-out 0.1s forwards;
            opacity: 0;
        }
        
        .hero-title {
            animation: fadeInUp 0.8s ease-out 0.2s forwards;
            opacity: 0;
        }
        
        .hero-subtext {
            animation: fadeInUp 0.8s ease-out 0.3s forwards;
            opacity: 0;
        }
        
        .hero-buttons {
            animation: fadeInUp 0.8s ease-out 0.4s forwards;
            opacity: 0;
        }
        
        .hero-features {
            animation: fadeInUp 0.8s ease-out 0.5s forwards;
            opacity: 0;
        }
        
        .hero-image {
            animation: fadeInUp 1s ease-out 0.3s forwards;
            opacity: 0;
        }
    </style>
    
    <!-- Content -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 pt-40">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <!-- Badge -->
                <div class="hero-badge inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/60 backdrop-blur-sm border border-emerald-200/50 shadow-sm">
                    <span class="w-2 h-2 rounded-full" style="background-color: #D48C70;"></span>
                    <span class="text-sm font-medium" style="color: #2B3A28;">Bibit Berkualitas Premium</span>
                </div>
                
                <!-- Title -->
                <h1 class="hero-title text-3xl md:text-4xl lg:text-5xl font-bold leading-tight" style="color: #2B3A28;">
                    Pusat Bibit<br>
                    <span style="color: #6B8269;">Tanaman</span> <span style="color: #D48C70;">Berkualitas</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="hero-subtext text-base md:text-lg max-w-lg leading-relaxed" style="color: rgba(43, 58, 40, 0.7);">
                    Temukan bibit tanaman terbaik untuk kebun impian Anda. Sehat, unggul, dan siap tanam. Konsultasi gratis via WhatsApp.
                </p>
                
                <!-- CTA Buttons -->
                <div class="hero-buttons flex flex-wrap gap-4 pt-2">
                    <a href="{{ whatsapp_link() }}" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 rounded-full font-semibold text-sm transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5" style="background-color: #2B3A28; color: #F4F1EA;">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                        </svg>
                        Pesan via WhatsApp
                    </a>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full font-semibold text-sm border-2 transition-all duration-300 hover:bg-white/50" style="border-color: #6B8269; color: #2B3A28;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        Lihat Katalog
                    </a>
                </div>
                
                <!-- Features -->
                <div class="hero-features flex flex-wrap gap-6 pt-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(107, 130, 105, 0.15);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #6B8269;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium" style="color: #2B3A28;">Bibit Unggul</p>
                            <p class="text-xs" style="color: rgba(43, 58, 40, 0.5);">Berkualitas Tinggi</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(107, 130, 105, 0.15);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #6B8269;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium" style="color: #2B3A28;">Pengiriman Aman</p>
                            <p class="text-xs" style="color: rgba(43, 58, 40, 0.5);">Dan Cepat</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: rgba(107, 130, 105, 0.15);">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #6B8269;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium" style="color: #2B3A28;">Konsultasi Gratis</p>
                            <p class="text-xs" style="color: rgba(43, 58, 40, 0.5);">Via WhatsApp</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Hero Image -->
            <div class="hero-image hidden lg:block relative">
                <div class="relative">
                    <img src="/images/tanm-bg.png" 
                         alt="Premium Plant" 
                         class="w-full max-w-md mx-auto rounded-3xl shadow-2xl">
                    <!-- Floating Cards -->
                    <div class="absolute -left-8 top-1/4 bg-white/80 backdrop-blur-sm p-4 rounded-2xl shadow-xl animate-float" style="animation-delay: 0.5s;">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background-color: #D48C70;">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #F4F1EA;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-bold" style="color: #2B3A28;">500+</p>
                                <p class="text-xs" style="color: rgba(43, 58, 40, 0.6);">Produk</p>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -right-4 bottom-1/4 bg-white/80 backdrop-blur-sm p-4 rounded-2xl shadow-xl animate-float" style="animation-delay: 0.8s;">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center" style="background-color: #6B8269;">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #F4F1EA;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-lg font-bold" style="color: #2B3A28;">1000+</p>
                                <p class="text-xs" style="color: rgba(43, 58, 40, 0.6);">Pelanggan Puas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Bestseller Products Section -->
<section class="relative py-20">
    <div class="absolute inset-0 section-overlay pointer-events-none"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-2">Produk Terlaris</h2>
                <p class="text-emerald-900/60">Bibit pilihan terbaik yang paling banyak diminati</p>
            </div>
            <a href="{{ route('products.index', ['sort' => 'bestseller']) }}" class="hidden md:flex items-center gap-2 text-lime-400 hover:text-lime-300 transition-colors">
                Lihat Semua Produk
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($bestsellers->take(9) as $product)
            @include('partials.product-card', ['product' => $product])
            @endforeach
        </div>
        
        <div class="mt-8 text-center md:hidden">
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 px-6 py-3 btn-outline rounded-full">
                Lihat Semua Produk
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="relative py-20 bg-emerald-900">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Mengapa Memilih Kami?</h2>
            <p class="text-white/70 max-w-2xl mx-auto">Kami berkomitmen memberikan bibit terbaik dan pelayanan terbaik untuk Anda</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($features as $feature)
            <div class="glass-card p-8 rounded-[40px] card-hover text-center border-white/10 shadow-xl">
                <div class="w-16 h-16 rounded-[24px] bg-white/10 flex items-center justify-center mx-auto mb-5 border border-white/20">
                    <span class="text-lime-400">
                        {!! $feature['icon'] !!}
                    </span>
                </div>
                <h3 class="text-lg font-bold text-white mb-3">{{ $feature['title'] }}</h3>
                <p class="text-sm text-white/60 leading-relaxed">{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="relative py-20 bg-emerald-900">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Testimoni Pelanggan</h2>
            <p class="text-white/70">Kepuasan pelanggan adalah prioritas kami</p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="glass-card p-8 rounded-[40px] card-hover border-white/10 shadow-xl">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center text-white font-bold text-xl border border-white/20">
                        {{ substr($testimonial->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-white">{{ $testimonial->name }}</h4>
                        <p class="text-xs text-white/50 tracking-wide">{{ $testimonial->location }}</p>
                    </div>
                </div>
                <div class="flex gap-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-white/10' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <p class="text-base text-white/80 italic leading-relaxed">"{{ $testimonial->content }}"</p>
                @if($testimonial->product_purchased)
                <p class="mt-4 inline-block px-3 py-1 rounded-full bg-white/5 text-[10px] text-lime-400 font-bold border border-white/5">Dibeli: {{ $testimonial->product_purchased }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-20">
    <div class="absolute inset-0 section-overlay pointer-events-none"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-4">Bingung Pilih Bibit Tanaman?</h2>
        <p class="text-xl text-emerald-950 mb-2">Konsultasi Gratis via WhatsApp</p>
        <p class="text-emerald-950 mb-8">Tim kami siap membantu Anda memilih bibit terbaik sesuai kebutuhan Anda</p>
        
        <a href="{{ whatsapp_link('Halo Plant Power, saya butuh rekomendasi bibit tanaman') }}" target="_blank" class="inline-flex items-center gap-3 px-10 py-5 btn-lime rounded-full text-lg">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
            </svg>
            Konsultasi Sekarang
        </a>
    </div>
</section>

<!-- Featured Blog Section -->
<section class="relative py-20">
    <div class="absolute inset-0 section-overlay pointer-events-none"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-2">Artikel Terbaru</h2>
                <p class="text-emerald-200/70">Tips dan panduan perawatan tanaman</p>
            </div>
            <a href="{{ route('blog.index') }}" class="hidden md:flex items-center gap-2 text-lime-400 hover:text-lime-300 transition-colors">
                Lihat Semua Artikel
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group glass-card rounded-2xl overflow-hidden card-hover">
                <div class="aspect-video overflow-hidden">
                    <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=600&q=80" 
                         alt="{{ $blog->title }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="px-3 py-1 rounded-full bg-lime-500/20 text-lime-400 text-xs">{{ $blog->category }}</span>
                        <span class="text-xs text-emerald-300/50">{{ $blog->reading_time }} menit baca</span>
                    </div>
                    <h3 class="text-lg font-semibold text-emerald-950 mb-2 line-clamp-2 group-hover:text-lime-400 transition-colors">{{ $blog->title }}</h3>
                    <p class="text-sm text-emerald-200/70 line-clamp-2">{{ $blog->excerpt }}</p>
                </div>
            </a>
            @endforeach
        </div>
        
        <div class="mt-8 text-center md:hidden">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 px-6 py-3 btn-outline rounded-full">
                Lihat Semua Artikel
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection
