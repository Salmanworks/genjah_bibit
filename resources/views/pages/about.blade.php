@extends('layouts.main')

@section('title', 'Tentang Kami - ' . setting('store_name', 'Plant Power'))

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
                <span class="text-xs font-semibold text-white/90 tracking-wider uppercase">Mengenal Kami</span>
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 tracking-tight" style="color: #F4F1EA;">
                Tentang <span style="color: #D48C70;">Kami</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed mb-8" style="color: rgba(244, 241, 234, 0.8);">
                Komitmen kami dalam menyediakan bibit tanaman berkualitas untuk masa depan hijau Indonesia
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

<!-- About Content -->
<section class="relative py-24 bg-white">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-8">
                <div>
                    <h2 class="text-4xl md:text-5xl font-black text-emerald-950 mb-6 leading-tight">
                        Dedikasi Untuk <br/> <span class="text-lime-500">Kebun Impian Anda</span>
                    </h2>
                    <div class="w-20 h-2 bg-lime-500 rounded-full mb-8"></div>
                </div>
                
                <div class="space-y-6 text-lg text-emerald-900/70 leading-relaxed font-medium">
                    <p>
                        Genjah Rumah Bibit adalah pusat bibit tanaman berkualitas yang berdiri sejak tahun 2020. Kami lahir dari kecintaan terhadap alam dan keinginan untuk membantu masyarakat memiliki sumber pangan mandiri.
                    </p>
                    <p>
                        Dengan pengalaman lebih dari 4 tahun, kami telah melayani ribuan pelanggan di seluruh Indonesia. Setiap bibit yang kami jual telah melalui seleksi ketat dan perawatan optimal oleh tim ahli kami.
                    </p>
                </div>
                
                <!-- Stats Grid -->
                <div class="grid grid-cols-3 gap-6 pt-6">
                    <div class="p-6 bg-emerald-900 text-center shadow-xl shadow-emerald-900/20 transform hover:-translate-y-2 transition-transform" style="border-radius: 40px;">
                        <p class="text-3xl md:text-4xl font-black text-lime-400 mb-1">500+</p>
                        <p class="text-[10px] text-white/60 uppercase tracking-widest font-bold">Produk</p>
                    </div>
                    <div class="p-6 bg-emerald-900 text-center shadow-xl shadow-emerald-900/20 transform hover:-translate-y-2 transition-transform" style="border-radius: 40px;">
                        <p class="text-3xl md:text-4xl font-black text-lime-400 mb-1">10k+</p>
                        <p class="text-[10px] text-white/60 uppercase tracking-widest font-bold">Pelanggan</p>
                    </div>
                    <div class="p-6 bg-emerald-900 text-center shadow-xl shadow-emerald-900/20 transform hover:-translate-y-2 transition-transform" style="border-radius: 40px;">
                        <p class="text-3xl md:text-4xl font-black text-lime-400 mb-1">4+</p>
                        <p class="text-[10px] text-white/60 uppercase tracking-widest font-bold">Tahun</p>
                    </div>
                </div>
            </div>
            
            <div class="relative group">
                <!-- Main Image Container -->
                <div class="aspect-[4/5] overflow-hidden shadow-2xl relative z-10 border-8 border-white" style="border-radius: 60px;">
                    <img src="https://images.unsplash.com/photo-1466692476868-0e96c3e6a5ce?w=800&q=80" 
                         alt="Our Garden" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/20 to-transparent"></div>
                </div>
                
                <!-- Decorative Oval -->
                <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-lime-400/20 rounded-full blur-3xl -z-0"></div>
                
                <!-- Floating Info Card -->
                <div class="absolute -bottom-8 -left-8 bg-white p-8 shadow-2xl z-20 border border-emerald-500/10" style="border-radius: 40px;">
                    <div class="flex items-center gap-5">
                        <div class="w-16 h-16 rounded-full bg-lime-500 flex items-center justify-center shadow-lg shadow-lime-500/40">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xl font-black text-emerald-950">Bibit Bergaransi</p>
                            <p class="text-sm text-emerald-900/60 font-bold">100% Kehidupan Terjamin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission -->
<section class="relative py-32 bg-emerald-50">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Visi -->
            <div class="bg-white p-12 shadow-2xl border border-emerald-100 hover:scale-[1.02] transition-transform group" style="border-radius: 60px;">
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-20 h-20 bg-emerald-900 flex items-center justify-center border border-lime-500/30 group-hover:bg-lime-500 transition-colors" style="border-radius: 28px;">
                        <svg class="w-10 h-10 text-white group-hover:text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-4xl font-black text-emerald-950 uppercase tracking-tight">Visi</h3>
                </div>
                <div class="relative p-8 bg-emerald-50 rounded-[40px] border-l-8 border-lime-500">
                    <p class="text-2xl text-emerald-900 leading-relaxed font-bold italic">
                        "Menjadi pusat bibit tanaman terpercaya dan terdepan di Indonesia yang menyediakan produk berkualitas tinggi dengan layanan pelanggan terbaik."
                    </p>
                </div>
            </div>
            
            <!-- Misi -->
            <div class="bg-white p-12 shadow-2xl border border-emerald-100 hover:scale-[1.02] transition-transform group" style="border-radius: 60px;">
                <div class="flex items-center gap-6 mb-8">
                    <div class="w-20 h-20 bg-emerald-900 flex items-center justify-center border border-lime-500/30 group-hover:bg-lime-500 transition-colors" style="border-radius: 28px;">
                        <svg class="w-10 h-10 text-white group-hover:text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-4xl font-black text-emerald-950 uppercase tracking-tight">Misi</h3>
                </div>
                <ul class="space-y-4">
                    @foreach([
                        'Menyediakan bibit tanaman unggulan dengan kualitas terbaik',
                        'Memberikan layanan konsultasi profesional dan gratis',
                        'Memastikan kepuasan pelanggan dengan garansi penuh',
                        'Melakukan pengiriman yang aman dan tepat waktu'
                    ] as $misi)
                    <li class="flex items-center gap-4 p-4 bg-emerald-50 text-emerald-950 font-bold rounded-full border border-emerald-100 transform hover:translate-x-2 transition-transform">
                        <div class="w-8 h-8 rounded-full bg-lime-500 flex-shrink-0 flex items-center justify-center shadow-sm">
                            <svg class="w-5 h-5 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        {{ $misi }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="relative py-32 bg-white">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-black text-emerald-950 mb-4">Nilai Utama Kami</h2>
            <div class="w-20 h-2 bg-lime-500 rounded-full mx-auto"></div>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Kualitas Tinggi', 'desc' => 'Seleksi bibit super ketat.'],
                ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Harga Jujur', 'desc' => 'Terbaik untuk kualitasnya.'],
                ['icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Garansi Hidup', 'desc' => '100% Jaminan bibit segar.'],
                ['icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'title' => 'Expert Help', 'desc' => 'Konsultasi gratis 24/7.'],
            ] as $v)
            <div class="bg-white p-10 text-center shadow-2xl border border-emerald-500/5 hover:border-lime-500/30 transition-all card-hover group" style="border-radius: 45px;">
                <div class="w-16 h-16 bg-emerald-900 flex items-center justify-center mx-auto mb-6 group-hover:bg-lime-500 transition-colors shadow-lg shadow-emerald-900/20 group-hover:shadow-lime-500/20" style="border-radius: 22px;">
                    <svg class="w-8 h-8 text-white group-hover:text-emerald-950 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $v['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-xl font-black text-emerald-950 mb-3">{{ $v['title'] }}</h3>
                <p class="text-sm text-emerald-900/60 font-medium leading-relaxed">{{ $v['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="relative py-20 overflow-hidden">
    <!-- Elegant gradient background -->
    <div class="absolute inset-0" style="background: linear-gradient(135deg, #2B3A28 0%, #4A5D48 50%, #6B8269 100%);"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/15 backdrop-blur-sm border border-white/30 mb-6">
            <span class="w-2 h-2 rounded-full" style="background-color: #D48C70;"></span>
            <span class="text-xs font-semibold text-white/90 tracking-wider uppercase">Ayo Mulai</span>
        </div>
        
        <!-- Title -->
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4 tracking-tight" style="color: #F4F1EA;">
            Mulai <span style="color: #D48C70;">Berkebun</span> Hari Ini?
        </h2>
        
        <!-- Subtitle -->
        <p class="text-lg md:text-xl max-w-2xl mx-auto font-light leading-relaxed mb-10" style="color: rgba(244, 241, 234, 0.8);">
            Kami siap membantu Anda memilih bibit terbaik untuk kebun impian Anda
        </p>
        
        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('products.index') }}" class="px-8 py-4 rounded-full font-semibold text-sm transition-all duration-300 shadow-lg hover:shadow-xl" style="background-color: #D48C70; color: #F4F1EA;">
                Lihat Katalog
            </a>
            <a href="{{ setting('whatsapp_number') }}" target="_blank" class="px-8 py-4 rounded-full font-semibold text-sm border-2 transition-all duration-300 hover:bg-white/10" style="border-color: rgba(244, 241, 234, 0.4); color: #F4F1EA;">
                Konsultasi Gratis
            </a>
        </div>
    </div>
</section>
@endsection
