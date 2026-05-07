@extends('layouts.main')

@section('title', 'Tentang Kami - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Tentang Kami</h1>
        <p class="text-white max-w-2xl mx-auto">Mengenal lebih dekat Genjah Rumah Bibit dan komitmen kami dalam menyediakan bibit tanaman berkualitas</p>
    </div>
</section>

<!-- About Content -->
<section class="relative py-16">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <h2 class="text-2xl md:text-3xl font-bold text-white">Genjah Rumah Bibit</h2>
                <p class="text-emerald-200/80 leading-relaxed">
                    Genjah Rumah Bibit adalah pusat bibit tanaman berkualitas yang berdiri sejak tahun 2020. Kami berkomitmen untuk menyediakan bibit tanaman unggulan dengan kualitas terbaik untuk kebun impian Anda.
                </p>
                <p class="text-emerald-200/80 leading-relaxed">
                    Dengan pengalaman lebih dari 4 tahun, kami telah melayani ribuan pelanggan di seluruh Indonesia. Setiap bibit yang kami jual telah melalui seleksi ketat dan perawatan optimal untuk memastikan kesehatan dan kualitasnya.
                </p>
                <p class="text-emerald-200/80 leading-relaxed">
                    Kami percaya bahwa setiap orang dapat memiliki kebun impian mereka. Oleh karena itu, kami menyediakan layanan konsultasi gratis untuk membantu Anda memilih bibit yang paling sesuai dengan kondisi tanah dan iklim di lokasi Anda.
                </p>
                
                <div class="grid grid-cols-3 gap-4 pt-4">
                    <div class="text-center p-4 glass-card rounded-xl">
                        <p class="text-2xl md:text-3xl font-bold gradient-text">500+</p>
                        <p class="text-xs text-emerald-300/70">Produk</p>
                    </div>
                    <div class="text-center p-4 glass-card rounded-xl">
                        <p class="text-2xl md:text-3xl font-bold gradient-text">1000+</p>
                        <p class="text-xs text-emerald-300/70">Pelanggan</p>
                    </div>
                    <div class="text-center p-4 glass-card rounded-xl">
                        <p class="text-2xl md:text-3xl font-bold gradient-text">4+</p>
                        <p class="text-xs text-emerald-300/70">Tahun Pengalaman</p>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="aspect-square rounded-3xl overflow-hidden glass-card">
                    <img src="https://images.unsplash.com/photo-1466692476868-0e96c3e6a5ce?w=800&q=80" 
                         alt="Our Garden" 
                         class="w-full h-full object-cover">
                </div>
                <div class="absolute -bottom-6 -left-6 glass-card p-6 rounded-2xl">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-full bg-lime-500 flex items-center justify-center">
                            <svg class="w-7 h-7 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-white">Bibit Bergaransi</p>
                            <p class="text-sm text-emerald-300/70">100% Kehidupan Terjamin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission -->
<section class="relative py-16">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/40 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8">
            <div class="glass-card p-8 rounded-2xl">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-lime-500/20 to-emerald-500/20 flex items-center justify-center mb-6 border border-lime-500/30">
                    <svg class="w-7 h-7 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Visi</h3>
                <p class="text-emerald-200/80 leading-relaxed">
                    Menjadi pusat bibit tanaman terpercaya dan terdepan di Indonesia yang menyediakan produk berkualitas tinggi dengan layanan pelanggan terbaik.
                </p>
            </div>
            
            <div class="glass-card p-8 rounded-2xl">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-lime-500/20 to-emerald-500/20 flex items-center justify-center mb-6 border border-lime-500/30">
                    <svg class="w-7 h-7 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Misi</h3>
                <ul class="space-y-3 text-emerald-200/80">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-lime-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Menyediakan bibit tanaman unggulan dengan kualitas terbaik
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-lime-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Memberikan layanan konsultasi profesional dan gratis
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-lime-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Memastikan kepuasan pelanggan dengan garansi kehidupan bibit
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-lime-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Melakukan pengiriman yang aman dan tepat waktu
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="relative py-16">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/60 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Keunggulan Kami</h2>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>', 'title' => 'Bibit Berkualitas', 'desc' => 'Semua bibit melalui seleksi ketat dan perawatan optimal'],
                ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>', 'title' => 'Harga Kompetitif', 'desc' => 'Harga terbaik untuk kualitas premium yang kami tawarkan'],
                ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>', 'title' => 'Garansi Kehidupan', 'desc' => 'Jaminan 100% bibit hidup dan sehat saat sampai tujuan'],
                ['icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>', 'title' => 'Konsultasi Gratis', 'desc' => 'Tim ahli siap membantu 24/7 via WhatsApp'],
            ] as $feature)
            <div class="glass-card p-6 rounded-2xl text-center card-hover">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-lime-500/20 to-emerald-500/20 flex items-center justify-center mx-auto mb-4 border border-lime-500/30 text-lime-400">
                    {!! $feature['icon'] !!}
                </div>
                <h3 class="font-semibold text-white mb-2">{{ $feature['title'] }}</h3>
                <p class="text-sm text-emerald-200/70">{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
