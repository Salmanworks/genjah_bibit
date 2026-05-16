@extends('layouts.main')

@section('title', 'Tentang Kami - ' . setting('store_name', 'Plant Power'))

@section('content')

<!-- PAGE BANNER -->
<div class="relative overflow-hidden" style="background: #3d5c38; padding-top: 80px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="absolute pointer-events-none hidden lg:block select-none" style="right: -20px; top: 50%; transform: translateY(-50%); font-size: 16rem; font-weight: 900; line-height: 1; color: rgba(255,255,255,0.03); letter-spacing: -0.06em;">TENTANG</div>
    <div class="absolute pointer-events-none" style="left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 40%, transparent 100%);"></div>
    <div class="absolute top-0 left-0 right-0" style="height: 2px; background: linear-gradient(90deg, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.2) 40%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top: 36px; padding-bottom: 44px;">
        <nav class="flex items-center gap-2 mb-8">
            <a href="{{ route('home') }}" style="font-size: 11px; color: rgba(255,255,255,0.35); text-decoration: none; font-weight: 500; letter-spacing: 0.04em; text-transform: uppercase;">Beranda</a>
            <span style="color: rgba(255,255,255,0.2); font-size: 11px; margin: 0 2px;">/</span>
            <span style="font-size: 11px; color: #c5e87a; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase;">Tentang Kami</span>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-stretch gap-0">
            <div class="flex-1 min-w-0 lg:pr-16 lg:border-r" style="border-color: rgba(255,255,255,0.1);">
                <div class="flex items-center gap-3 mb-5">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size: 10px; font-weight: 800; letter-spacing: 0.25em; color: #c5e87a; text-transform: uppercase;">Mengenal Kami</span>
                </div>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #ffffff; margin: 0 0 6px 0;">Tentang</h1>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #c5e87a; margin: 0 0 20px 0;">Kami</h1>
                <div style="width: 100%; height: 1px; background: rgba(255,255,255,0.1); margin-bottom: 20px;"></div>
                <p style="font-size: 0.875rem; color: rgba(255,255,255,0.38); line-height: 1.7; margin: 0; max-width: 380px; font-style: italic;">
                    "Komitmen kami dalam menyediakan bibit tanaman berkualitas untuk masa depan hijau Indonesia."
                </p>
            </div>

            <div class="hidden lg:flex flex-col justify-center gap-0 flex-shrink-0" style="width: 260px; padding-left: 48px;">
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">4+</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Tahun Berdiri</div>
                </div>
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">10K+</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Pelanggan Puas</div>
                </div>
                <div style="padding: 20px 0;">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">100%</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Garansi Kualitas</div>
                </div>
            </div>
        </div>
    </div>

    <div style="line-height: 0; display: block; margin-top: 8px;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block; width: 100%; height: 60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#f4f1ea"/>
        </svg>
    </div>
</div>

<!-- ABOUT CONTENT -->
<section class="relative" style="background:#f4f1ea; padding-top:64px; padding-bottom:72px;">
    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-14">
        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <div>
                <div class="flex items-center gap-3 mb-6">
                    <span style="display:inline-block; width:28px; height:2px; background:#5a7058;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#5a7058; text-transform:uppercase;">Tentang Kami</span>
                </div>

                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:1.05; letter-spacing:-0.03em; color:#1a2419; margin:0 0 6px 0;">{{ setting('about_title', 'Tentang Kami') }}</h2>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:1.05; letter-spacing:-0.03em; color:#3d5c38; margin:0 0 20px 0;">{{ setting('about_subtitle', 'Dedikasi Untuk Kebun Impian Anda') }}</h2>
                <div style="width:48px; height:3px; background:linear-gradient(90deg, #5a7058, rgba(90,112,88,0.2)); border-radius:2px; margin-bottom:24px;"></div>

                <div style="display:flex; flex-direction:column; gap:14px; margin-bottom:32px;">
                    <p style="font-size:0.9375rem; color:rgba(26,36,25,0.65); line-height:1.8; margin:0; white-space: pre-line;">
                        {{ setting('about_description', 'Genjah Rumah Bibit adalah pusat bibit tanaman berkualitas yang berdiri sejak tahun 2020. Kami lahir dari kecintaan terhadap alam dan keinginan untuk membantu masyarakat memiliki sumber pangan mandiri.

Dengan pengalaman lebih dari 4 tahun, kami telah melayani ribuan pelanggan di seluruh Indonesia. Setiap bibit yang kami jual telah melalui seleksi ketat dan perawatan optimal oleh tim ahli kami.') }}
                    </p>
                </div>

                <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:12px;">
                    @foreach([['500+','Produk'],['10K+','Pelanggan'],['4+','Tahun']] as $stat)
                    <div style="padding:18px 12px; background:#3d5c38; border-radius:10px; text-align:center; transition: all 0.3s ease; box-shadow: 0 8px 24px -12px rgba(61,92,56,0.3);">
                        <div style="font-size:1.6rem; font-weight:900; color:#c5e87a; line-height:1; letter-spacing:-0.04em;">{{ $stat[0] }}</div>
                        <div style="font-size:9px; font-weight:700; color:rgba(255,255,255,0.5); margin-top:5px; letter-spacing:0.12em; text-transform:uppercase;">{{ $stat[1] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="relative">
                <div style="position:relative; border-radius:12px; overflow:hidden; border:1px solid rgba(26,36,25,0.1); box-shadow: 0 16px 48px -24px rgba(26,36,25,0.2);">
                    @php
                        $aboutImageUrl = setting('about_image') ? asset('storage/' . setting('about_image')) : asset('images/nature1.png');
                    @endphp
                    <img src="{{ $aboutImageUrl }}" alt="Toko Genjah Rumah Bibit" style="width:100%; aspect-ratio:4/3; object-fit:cover; display:block;">
                    <div style="position:absolute; bottom:0; left:0; right:0; height:40%; background:linear-gradient(to top, rgba(26,36,25,0.5), transparent); pointer-events:none;"></div>

                    <div style="position:absolute; bottom:16px; left:16px; display:flex; align-items:center; gap:10px; padding:10px 14px; background:rgba(255,255,255,0.95); border-radius:8px; border:1px solid rgba(26,36,25,0.08); box-shadow: 0 8px 24px -12px rgba(26,36,25,0.2);">
                        <div style="width:32px; height:32px; border-radius:6px; background:#3d5c38; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="#c5e87a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <div style="font-size:12px; font-weight:800; color:#1a2419; line-height:1.2;">Bibit Bergaransi</div>
                            <div style="font-size:10px; color:rgba(26,36,25,0.5); font-weight:500;">100% Kehidupan Terjamin</div>
                        </div>
                    </div>

                    <div style="position:absolute; top:16px; right:16px; padding:6px 12px; background:#3d5c38; border-radius:6px; box-shadow: 0 8px 24px -12px rgba(61,92,56,0.3);">
                        <div style="font-size:10px; font-weight:800; color:#c5e87a; letter-spacing:0.1em; text-transform:uppercase;">Sejak 2020</div>
                    </div>
                </div>

                <div style="position:absolute; bottom:-8px; right:-8px; width:80px; height:80px; border-right:3px solid rgba(90,112,88,0.3); border-bottom:3px solid rgba(90,112,88,0.3); border-radius:0 0 12px 0; pointer-events:none;"></div>
                <div style="position:absolute; top:-8px; left:-8px; width:80px; height:80px; border-left:3px solid rgba(90,112,88,0.3); border-top:3px solid rgba(90,112,88,0.3); border-radius:12px 0 0 0; pointer-events:none;"></div>

                <p style="font-size:11px; color:rgba(26,36,25,0.35); text-align:center; margin-top:10px; font-style:italic; letter-spacing:0.04em;">
                    Toko Genjah Rumah Bibit — Mlonggo, Jepara
                </p>
            </div>

        </div>
    </div>
</section>

<!-- SEJARAH TOKO - TOTAL REDESIGN: HORIZONTAL SCROLL TIMELINE -->
<section class="relative z-10" style="background: #3d5c38; padding: 96px 0 120px; overflow: hidden;">
    <!-- Background Elements -->
    <div class="absolute inset-0 pointer-events-none opacity-20 z-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(197,232,122,0.15) 1.5px, transparent 0); background-size: 40px 40px;"></div>
    
    <!-- Animated Gradient Orbs -->
    <div class="absolute top-20 left-10 w-96 h-96 rounded-full opacity-10 blur-3xl" style="background: radial-gradient(circle, #c5e87a 0%, transparent 70%); animation: float 20s ease-in-out infinite;"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 rounded-full opacity-10 blur-3xl" style="background: radial-gradient(circle, #8bc34a 0%, transparent 70%); animation: float 25s ease-in-out infinite reverse;"></div>

    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-16 z-10">
        
        <!-- Header Section -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-3 mb-6 px-5 py-2.5 rounded-full" style="background: rgba(197, 232, 122, 0.15); border: 2px solid rgba(197, 232, 122, 0.3); backdrop-filter: blur(10px);">
                <span style="display: inline-block; width: 10px; height: 10px; background: #c5e87a; border-radius: 50%; animation: pulse 2s ease-in-out infinite;"></span>
                <span style="font-size: 11px; font-weight: 800; letter-spacing: 0.25em; color: #c5e87a; text-transform: uppercase;">Perjalanan Kami</span>
            </div>

            <h2 style="font-size: clamp(3rem, 6vw, 5rem); font-weight: 900; line-height: 1; letter-spacing: -0.04em; color: #ffffff; margin: 0 0 20px 0; text-shadow: 0 4px 20px rgba(0,0,0,0.3);">
                Sejarah <span style="color: #c5e87a;">Toko Kami</span>
            </h2>

            <p style="font-size: 1.125rem; color: rgba(255, 255, 255, 0.7); line-height: 1.8; margin: 0 auto; max-width: 600px; font-weight: 400;">
                Dari langkah kecil di Mlonggo hingga layanan ke seluruh Indonesia
            </p>

            <!-- Stats Row -->
            <div class="flex flex-wrap justify-center gap-8 mt-12">
                <div class="text-center">
                    <div style="font-size: 3rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.03em;">4+</div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255, 255, 255, 0.5); margin-top: 8px; letter-spacing: 0.15em; text-transform: uppercase;">Tahun Berdiri</div>
                </div>
                <div class="text-center">
                    <div style="font-size: 3rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.03em;">10K+</div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255, 255, 255, 0.5); margin-top: 8px; letter-spacing: 0.15em; text-transform: uppercase;">Pelanggan Puas</div>
                </div>
                <div class="text-center">
                    <div style="font-size: 3rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.03em;">100%</div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255, 255, 255, 0.5); margin-top: 8px; letter-spacing: 0.15em; text-transform: uppercase;">Fokus Kualitas</div>
                </div>
            </div>
        </div>

        @php
            $milestones = [
                [
                    'year' => '2020',
                    'title' => 'Awal Berdiri',
                    'body' => 'Toko dimulai dari skala rumahan di Mlonggo, Jepara, fokus pada bibit sayuran dan buah pilihan untuk tetangga dan petani kecil sekitar.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>',
                    'color' => '#c5e87a',
                    'bgGradient' => 'linear-gradient(135deg, rgba(197,232,122,0.15) 0%, rgba(197,232,122,0.05) 100%)',
                ],
                [
                    'year' => '2021–22',
                    'title' => 'Memperluas Jaringan',
                    'body' => 'Permintaan dari luar kota naik; kami memperketat standar kualitas, kemasan, dan konsultasi agar bibit sampai segar dan terlacak.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>',
                    'color' => '#8bc34a',
                    'bgGradient' => 'linear-gradient(135deg, rgba(139,195,74,0.15) 0%, rgba(139,195,74,0.05) 100%)',
                ],
                [
                    'year' => '2023',
                    'title' => 'Go Digital',
                    'body' => 'Katalog dan pemesanan daring memudahkan pelanggan di berbagai wilayah mengakses bibit unggulan tanpa mengorbankan layanan personal.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>',
                    'color' => '#5a7058',
                    'bgGradient' => 'linear-gradient(135deg, rgba(90,112,88,0.15) 0%, rgba(90,112,88,0.05) 100%)',
                ],
                [
                    'year' => 'Sekarang',
                    'title' => 'Terus Berinovasi',
                    'body' => 'Variasi bibit terus ditambah, layanan diperhalus, dan komitmen tetap sama: bibit sehat, terpercaya, dan mendampingi kebun Anda berkembang.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>',
                    'color' => '#3d5c38',
                    'bgGradient' => 'linear-gradient(135deg, rgba(61,92,56,0.25) 0%, rgba(61,92,56,0.08) 100%)',
                ],
            ];
        @endphp

        <!-- Horizontal Timeline -->
        <div class="relative mt-16">
            <!-- Timeline Line (Horizontal) -->
            <div class="hidden lg:block absolute top-[120px] left-0 right-0 h-1 rounded-full" style="background: linear-gradient(90deg, rgba(197,232,122,0.3) 0%, rgba(197,232,122,0.6) 50%, rgba(197,232,122,0.3) 100%);"></div>

            <!-- Timeline Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-6">
                @foreach($milestones as $index => $m)
                <div class="timeline-card-modern relative" style="animation: fadeInUp 0.8s ease-out {{ $index * 0.15 }}s backwards;">
                    
                    <!-- Connection Dot (on timeline line) -->
                    <div class="hidden lg:flex absolute left-1/2 top-[120px] -translate-x-1/2 z-20 w-16 h-16 items-center justify-center rounded-full border-4 shadow-2xl" style="background: #3d5c38; border-color: {{ $m['color'] }};">
                        <svg class="w-7 h-7" style="color: {{ $m['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $m['icon'] !!}</svg>
                    </div>

                    <!-- Card Content -->
                    <div class="relative rounded-2xl p-8 h-full" style="background: {{ $m['bgGradient'] }}; border: 2px solid {{ $m['color'] }}40; backdrop-filter: blur(10px); box-shadow: 0 20px 60px -20px rgba(0,0,0,0.4); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                        
                        <!-- Decorative Corner Glow -->
                        <div class="absolute top-0 right-0 w-32 h-32 rounded-bl-full opacity-20 blur-2xl pointer-events-none" style="background: {{ $m['color'] }};"></div>
                        
                        <!-- Year Badge -->
                        <div class="relative inline-flex items-center gap-2 px-4 py-2 rounded-full mb-6" style="background: rgba(0,0,0,0.3); border: 1px solid {{ $m['color'] }}60;">
                            <span style="font-size: 14px; font-weight: 900; color: {{ $m['color'] }}; letter-spacing: 0.1em;">{{ $m['year'] }}</span>
                        </div>

                        <!-- Mobile Icon -->
                        <div class="lg:hidden flex w-14 h-14 items-center justify-center rounded-full mb-5 border-3 shadow-lg" style="border-color: {{ $m['color'] }}; background: rgba(0,0,0,0.2);">
                            <svg class="w-6 h-6" style="color: {{ $m['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $m['icon'] !!}</svg>
                        </div>

                        <!-- Title -->
                        <h3 class="text-2xl font-black mb-4" style="color: #ffffff; letter-spacing: -0.02em; line-height: 1.2;">{{ $m['title'] }}</h3>

                        <!-- Divider -->
                        <div class="w-12 h-1 rounded-full mb-5" style="background: {{ $m['color'] }};"></div>

                        <!-- Description -->
                        <p class="text-sm leading-relaxed" style="color: rgba(255, 255, 255, 0.75); font-weight: 400; line-height: 1.7;">{{ $m['body'] }}</p>

                        <!-- Number Badge -->
                        <div class="absolute bottom-6 right-6 w-12 h-12 flex items-center justify-center rounded-full" style="background: rgba(0,0,0,0.3); border: 2px solid {{ $m['color'] }}40;">
                            <span style="font-size: 18px; font-weight: 900; color: {{ $m['color'] }};">{{ $index + 1 }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quote Section -->
        <div class="mt-20 text-center">
            <div class="inline-block max-w-3xl px-8 py-10 rounded-2xl relative" style="background: rgba(0,0,0,0.2); border: 2px solid rgba(197,232,122,0.2); backdrop-filter: blur(10px);">
                <svg class="w-12 h-12 mx-auto mb-5 opacity-30" style="color: #c5e87a;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                </svg>
                <p style="font-size: 1.5rem; font-style: italic; color: rgba(255, 255, 255, 0.9); line-height: 1.8; margin: 0; font-weight: 500;">
                    "{{ setting('about_quote', 'Genjah Rumah Bibit — tumbuh bersama petani dan pecinta tanaman Indonesia.') }}"
                </p>
            </div>
        </div>

    </div>
</section>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
        transform: scale(1);
    }
    50% {
        opacity: 0.6;
        transform: scale(1.2);
    }
}

@keyframes float {
    0%, 100% {
        transform: translate(0, 0);
    }
    50% {
        transform: translate(30px, -30px);
    }
}

.timeline-card-modern:hover > div {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 30px 80px -20px rgba(0,0,0,0.6);
}
</style>


<!-- VISION & MISSION -->
<section class="relative overflow-hidden" style="background:#3d5c38;">
    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,0 L0,30 C240,0 480,60 720,30 C960,0 1200,60 1440,30 L1440,0 Z" fill="#f4f1ea"/>
        </svg>
    </div>

    <div class="absolute inset-0 pointer-events-none" style="background-image:radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size:24px 24px;"></div>
    <div class="absolute pointer-events-none" style="left:0; top:0; bottom:0; width:3px; background:linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 50%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top:56px; padding-bottom:64px;">
        <div class="flex items-center gap-3 mb-10">
            <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
            <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#c5e87a; text-transform:uppercase;">Arah & Tujuan</span>
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div style="background:rgba(0,0,0,0.18); border:1px solid rgba(255,255,255,0.1); border-radius:12px; padding:36px 40px; position:relative; overflow:hidden; transition: all 0.3s ease;">
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:28px;">
                    <div style="width:40px; height:40px; border-radius:8px; background:rgba(197,232,122,0.12); border:1px solid rgba(197,232,122,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="18" height="18" fill="none" stroke="#c5e87a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <div>
                        <div style="font-size:10px; font-weight:800; letter-spacing:0.2em; color:rgba(197,232,122,0.6); text-transform:uppercase; margin-bottom:2px;">01</div>
                        <h3 style="font-size:1.5rem; font-weight:900; color:#ffffff; letter-spacing:-0.03em; line-height:1; margin:0;">Visi</h3>
                    </div>
                </div>
                <div style="width:100%; height:1px; background:rgba(255,255,255,0.08); margin-bottom:24px;"></div>
                <div style="border-left:3px solid #c5e87a; padding-left:20px;">
                    <p style="font-size:1rem; color:rgba(255,255,255,0.75); line-height:1.8; margin:0; font-style:italic;">
                        "Menjadi pusat bibit tanaman terpercaya dan terdepan di Indonesia yang menyediakan produk berkualitas tinggi dengan layanan pelanggan terbaik."
                    </p>
                </div>
            </div>

            <div style="background:rgba(197,232,122,0.06); border:1px solid rgba(197,232,122,0.15); border-radius:12px; padding:36px 40px; position:relative; overflow:hidden; transition: all 0.3s ease;">
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:28px;">
                    <div style="width:40px; height:40px; border-radius:8px; background:rgba(197,232,122,0.12); border:1px solid rgba(197,232,122,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="18" height="18" fill="none" stroke="#c5e87a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                    <div>
                        <div style="font-size:10px; font-weight:800; letter-spacing:0.2em; color:rgba(197,232,122,0.6); text-transform:uppercase; margin-bottom:2px;">02</div>
                        <h3 style="font-size:1.5rem; font-weight:900; color:#ffffff; letter-spacing:-0.03em; line-height:1; margin:0;">Misi</h3>
                    </div>
                </div>
                <div style="width:100%; height:1px; background:rgba(255,255,255,0.08); margin-bottom:24px;"></div>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    @foreach([
                        ['num'=>'01', 'text'=>'Menyediakan bibit tanaman unggulan dengan kualitas terbaik'],
                        ['num'=>'02', 'text'=>'Memberikan layanan konsultasi profesional dan gratis'],
                        ['num'=>'03', 'text'=>'Memastikan kepuasan pelanggan dengan garansi penuh'],
                        ['num'=>'04', 'text'=>'Melakukan pengiriman yang aman dan tepat waktu'],
                    ] as $item)
                    <div style="display:flex; align-items:flex-start; gap:14px; padding:14px 16px; background:rgba(0,0,0,0.15); border-radius:8px; border:1px solid rgba(255,255,255,0.06); transition: all 0.3s ease;">
                        <span style="font-size:10px; font-weight:800; color:rgba(197,232,122,0.5); letter-spacing:0.1em; flex-shrink:0; margin-top:2px;">{{ $item['num'] }}</span>
                        <span style="font-size:0.875rem; color:rgba(255,255,255,0.7); line-height:1.55; font-weight:500;">{{ $item['text'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#f4f1ea"/>
        </svg>
    </div>
</section>

<!-- VALUES -->
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
            <div class="bg-white p-10 text-center shadow-xl border border-emerald-500/10 hover:border-lime-500/30 hover:shadow-2xl transition-all rounded-3xl">
                <div class="w-16 h-16 bg-emerald-900 flex items-center justify-center mx-auto mb-6 group hover:bg-lime-500 transition-colors shadow-lg shadow-emerald-900/20 hover:shadow-lime-500/20" style="border-radius: 22px;">
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

@endsection
