@extends('layouts.main')

@section('title', 'Tentang Kami - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-900/10 border border-emerald-900/10 mb-8">
            <span class="w-2 h-2 rounded-full bg-lime-500 animate-pulse"></span>
            <span class="text-xs font-medium text-emerald-900 tracking-wider uppercase">Mengenal Kami</span>
        </div>
        
        <div class="max-w-[95%] mx-auto mt-4">
            <div class="w-full px-8 md:px-20 py-16 md:py-24 bg-white/90 backdrop-blur-xl border border-emerald-900/5 shadow-2xl flex flex-col items-center justify-center text-center" 
                 style="border-radius: 9999px;">
                <h1 class="font-black text-emerald-950 mb-6 drop-shadow-sm tracking-tighter leading-none uppercase"
                    style="font-size: clamp(2.5rem, 10vw, 7.5rem);">
                    Tentang <span class="text-lime-400">Kami</span>
                </h1>
                <p class="text-xl md:text-2xl text-emerald-900/70 max-w-3xl mx-auto font-light leading-relaxed">
                    Komitmen kami dalam menyediakan bibit tanaman berkualitas untuk masa depan hijau Indonesia.
                </p>
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
<section class="relative py-24">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-[95%] mx-auto">
            <div class="w-full px-8 md:px-20 py-20 md:py-32 bg-white border border-emerald-900/10 shadow-2xl flex flex-col items-center justify-center text-center" 
                 style="border-radius: 9999px;">
                <h2 class="font-black text-emerald-950 mb-6 drop-shadow-sm tracking-tighter leading-none uppercase"
                    style="font-size: clamp(2rem, 8vw, 6rem);">
                    Mulai <span class="text-lime-500">Berkebun</span> <br/> Hari Ini?
                </h2>
                <p class="text-xl md:text-2xl text-emerald-900/70 max-w-3xl mx-auto font-light leading-relaxed mb-12">
                    Kami siap membantu Anda memilih bibit terbaik untuk kebun impian Anda.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    <a href="{{ route('products.index') }}" class="px-12 py-5 bg-emerald-950 text-white font-black rounded-full hover:bg-emerald-900 transition-all shadow-xl shadow-emerald-950/20 text-xl">
                        Lihat Katalog
                    </a>
                    <a href="{{ setting('whatsapp_number') }}" target="_blank" class="px-12 py-5 border-2 border-emerald-900/20 text-emerald-900 font-black rounded-full hover:bg-emerald-50 transition-all text-xl">
                        Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
