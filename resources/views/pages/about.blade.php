@extends('layouts.main')

@section('title', 'Tentang Kami - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- PAGE BANNER — Tentang --}}
<div data-dark-hero class="relative overflow-hidden" style="background: #3d5c38; padding-top: 80px;">
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

<!-- About Content -->
<section class="relative" style="background:#f4f1ea; padding-top:64px; padding-bottom:72px;">
    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-14">
        <div class="grid lg:grid-cols-2 gap-14 items-center">

            {{-- LEFT: Text --}}
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <span style="display:inline-block; width:28px; height:2px; background:#5a7058;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#5a7058; text-transform:uppercase;">Tentang Kami</span>
                </div>

                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:1.05; letter-spacing:-0.03em; color:#1a2419; margin:0 0 6px 0;">Dedikasi Untuk</h2>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:1.05; letter-spacing:-0.03em; color:#3d5c38; margin:0 0 20px 0;">Kebun Impian Anda</h2>
                <div style="width:48px; height:3px; background:linear-gradient(90deg, #5a7058, rgba(90,112,88,0.2)); border-radius:2px; margin-bottom:24px;"></div>

                <div style="display:flex; flex-direction:column; gap:14px; margin-bottom:32px;">
                    <p style="font-size:0.9375rem; color:rgba(26,36,25,0.65); line-height:1.8; margin:0;">
                        Genjah Rumah Bibit adalah pusat bibit tanaman berkualitas yang berdiri sejak tahun 2020. Kami lahir dari kecintaan terhadap alam dan keinginan untuk membantu masyarakat memiliki sumber pangan mandiri.
                    </p>
                    <p style="font-size:0.9375rem; color:rgba(26,36,25,0.65); line-height:1.8; margin:0;">
                        Dengan pengalaman lebih dari 4 tahun, kami telah melayani ribuan pelanggan di seluruh Indonesia. Setiap bibit yang kami jual telah melalui seleksi ketat dan perawatan optimal oleh tim ahli kami.
                    </p>
                </div>

                {{-- Stats row --}}
                <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:12px;">
                    @foreach([['500+','Produk'],['10K+','Pelanggan'],['4+','Tahun']] as $stat)
                    <div style="padding:18px 12px; background:#3d5c38; border-radius:10px; text-align:center;">
                        <div style="font-size:1.6rem; font-weight:900; color:#c5e87a; line-height:1; letter-spacing:-0.04em;">{{ $stat[0] }}</div>
                        <div style="font-size:9px; font-weight:700; color:rgba(255,255,255,0.5); margin-top:5px; letter-spacing:0.12em; text-transform:uppercase;">{{ $stat[1] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- RIGHT: Image frame --}}
            <div class="relative">

                {{-- Main image frame --}}
                <div style="position:relative; border-radius:12px; overflow:hidden; border:1px solid rgba(26,36,25,0.1);">

                    {{-- Gambar toko — ganti src dengan foto toko Anda --}}
                    <img src="{{ asset('images/nature1.png') }}"
                         alt="Toko Genjah Rumah Bibit"
                         style="width:100%; aspect-ratio:4/3; object-fit:cover; display:block;">

                    {{-- Overlay gradient bottom --}}
                    <div style="position:absolute; bottom:0; left:0; right:0; height:40%; background:linear-gradient(to top, rgba(26,36,25,0.5), transparent); pointer-events:none;"></div>

                    {{-- Badge overlay bottom-left --}}
                    <div style="position:absolute; bottom:16px; left:16px; display:flex; align-items:center; gap:10px; padding:10px 14px; background:rgba(255,255,255,0.95); border-radius:8px; border:1px solid rgba(26,36,25,0.08);">
                        <div style="width:32px; height:32px; border-radius:6px; background:#3d5c38; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="#c5e87a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <div style="font-size:12px; font-weight:800; color:#1a2419; line-height:1.2;">Bibit Bergaransi</div>
                            <div style="font-size:10px; color:rgba(26,36,25,0.5); font-weight:500;">100% Kehidupan Terjamin</div>
                        </div>
                    </div>

                    {{-- Year badge top-right --}}
                    <div style="position:absolute; top:16px; right:16px; padding:6px 12px; background:#3d5c38; border-radius:6px;">
                        <div style="font-size:10px; font-weight:800; color:#c5e87a; letter-spacing:0.1em; text-transform:uppercase;">Sejak 2020</div>
                    </div>
                </div>

                {{-- Decorative corner accent --}}
                <div style="position:absolute; bottom:-8px; right:-8px; width:80px; height:80px; border-right:3px solid rgba(90,112,88,0.3); border-bottom:3px solid rgba(90,112,88,0.3); border-radius:0 0 12px 0; pointer-events:none;"></div>
                <div style="position:absolute; top:-8px; left:-8px; width:80px; height:80px; border-left:3px solid rgba(90,112,88,0.3); border-top:3px solid rgba(90,112,88,0.3); border-radius:12px 0 0 0; pointer-events:none;"></div>

                {{-- Caption --}}
                <p style="font-size:11px; color:rgba(26,36,25,0.35); text-align:center; margin-top:10px; font-style:italic; letter-spacing:0.04em;">
                    Toko Genjah Rumah Bibit — Mlonggo, Jepara
                </p>

            </div>

        </div>
    </div>
</section>

{{-- Sejarah Toko — sunting array $milestones di bawah --}}
<style>
    @keyframes history-fade-up {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes timeline-grow {
        from { transform: scaleY(0); }
        to { transform: scaleY(1); }
    }
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 0 0 rgba(197, 232, 122, 0.4); }
        50% { box-shadow: 0 0 0 12px rgba(197, 232, 122, 0); }
    }
    .history-milestone {
        animation: history-fade-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) backwards;
    }
    .history-milestone:nth-child(1) { animation-delay: 0.15s; }
    .history-milestone:nth-child(2) { animation-delay: 0.3s; }
    .history-milestone:nth-child(3) { animation-delay: 0.45s; }
    .history-milestone:nth-child(4) { animation-delay: 0.6s; }
    .history-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }
    .history-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 32px 80px -24px rgba(61, 92, 56, 0.35);
    }
    .history-card::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 1rem;
        padding: 2px;
        background: linear-gradient(135deg, rgba(197, 232, 122, 0.3), rgba(61, 92, 56, 0.1));
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
        opacity: 0;
        transition: opacity 0.4s;
    }
    .history-card:hover::before {
        opacity: 1;
    }
    .timeline-line {
        animation: timeline-grow 1.2s cubic-bezier(0.16, 1, 0.3, 1) backwards;
        animation-delay: 0.3s;
        transform-origin: top;
    }
    .timeline-dot {
        animation: pulse-glow 2s ease-in-out infinite;
    }
    .stat-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .stat-card:hover {
        transform: translateY(-4px) scale(1.05);
    }
</style>
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #f9f7f4 0%, #f2ede6 50%, #ebe5da 100%);">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 pointer-events-none opacity-30" style="background-image: radial-gradient(circle at 2px 2px, rgba(61,92,56,0.06) 1.5px, transparent 0); background-size: 32px 32px;"></div>
    <div class="absolute right-0 top-24 hidden xl:block pointer-events-none select-none" style="font-size: clamp(8rem, 16vw, 14rem); font-weight: 900; line-height: 1; color: rgba(61,92,56,0.025); letter-spacing: -0.05em;">SEJARAH</div>
    
    <!-- Gradient Orbs -->
    <div class="absolute top-20 left-10 w-96 h-96 rounded-full opacity-10 blur-3xl" style="background: radial-gradient(circle, #c5e87a 0%, transparent 70%);"></div>
    <div class="absolute bottom-20 right-10 w-80 h-80 rounded-full opacity-10 blur-3xl" style="background: radial-gradient(circle, #3d5c38 0%, transparent 70%);"></div>

    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-16" style="padding-top: 96px; padding-bottom: 96px;">
        <div class="grid lg:grid-cols-12 gap-16 lg:gap-16 xl:gap-24 items-start">

            {{-- Kiri: judul + lead + stat ringkas --}}
            <div class="lg:col-span-5 lg:sticky lg:top-28">
                <!-- Badge -->
                <div class="inline-flex items-center gap-3 mb-6 px-4 py-2 rounded-full" style="background: linear-gradient(135deg, rgba(197, 232, 122, 0.15), rgba(61, 92, 56, 0.08)); border: 1px solid rgba(61, 92, 56, 0.15);">
                    <span style="display: inline-block; width: 8px; height: 8px; background: #3d5c38; border-radius: 50%; animation: pulse-glow 2s ease-in-out infinite;"></span>
                    <span style="font-size: 11px; font-weight: 800; letter-spacing: 0.25em; color: #3d5c38; text-transform: uppercase;">Perjalanan Kami</span>
                </div>
                
                <!-- Heading -->
                <h2 style="font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 900; line-height: 1.05; letter-spacing: -0.04em; color: #1a2419; margin: 0 0 16px 0;">
                    Sejarah<br>
                    <span style="background: linear-gradient(135deg, #3d5c38 0%, #5a7058 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Toko Kami</span>
                </h2>
                
                <!-- Decorative Line -->
                <div style="width: 72px; height: 4px; background: linear-gradient(90deg, #5a7058, rgba(197, 232, 122, 0.4)); border-radius: 4px; margin: 24px 0 32px;"></div>
                
                <!-- Description -->
                <p style="font-size: 1.1rem; color: rgba(26, 36, 25, 0.7); line-height: 1.9; margin: 0 0 40px 0; max-width: 480px; font-weight: 400;">
                    Dari langkah kecil di Mlonggo hingga layanan ke seluruh Indonesia — setiap fase membentuk komitmen kami pada <strong style="color: #3d5c38; font-weight: 600;">bibit sehat</strong> dan hubungan jangka panjang dengan pelanggan.
                </p>

                <!-- Stats Grid -->
                <div class="grid grid-cols-3 gap-4 max-w-lg mb-8">
                    <div class="stat-card text-center rounded-2xl px-4 py-6" style="background: linear-gradient(135deg, #3d5c38 0%, #2d4428 100%); border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 12px 32px -16px rgba(61, 92, 56, 0.4);">
                        <div style="font-size: 2rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.03em;">4+</div>
                        <div style="font-size: 9px; font-weight: 700; color: rgba(255, 255, 255, 0.65); margin-top: 10px; letter-spacing: 0.15em; text-transform: uppercase;">Tahun</div>
                    </div>
                    <div class="stat-card text-center rounded-2xl px-4 py-6" style="background: #ffffff; border: 2px solid rgba(61, 92, 56, 0.12); box-shadow: 0 12px 32px -16px rgba(26, 36, 25, 0.15);">
                        <div style="font-size: 2rem; font-weight: 900; color: #3d5c38; line-height: 1; letter-spacing: -0.03em;">10K+</div>
                        <div style="font-size: 9px; font-weight: 700; color: rgba(26, 36, 25, 0.55); margin-top: 10px; letter-spacing: 0.15em; text-transform: uppercase;">Pelanggan</div>
                    </div>
                    <div class="stat-card text-center rounded-2xl px-4 py-6" style="background: #ffffff; border: 2px solid rgba(61, 92, 56, 0.12); box-shadow: 0 12px 32px -16px rgba(26, 36, 25, 0.15);">
                        <div style="font-size: 2rem; font-weight: 900; color: #3d5c38; line-height: 1; letter-spacing: -0.03em;">100%</div>
                        <div style="font-size: 9px; font-weight: 700; color: rgba(26, 36, 25, 0.55); margin-top: 10px; letter-spacing: 0.15em; text-transform: uppercase;">Fokus</div>
                    </div>
                </div>

                <!-- Quote -->
                <blockquote class="hidden sm:block pl-6 border-l-4 rounded-lg" style="border-color: #c5e87a; background: linear-gradient(135deg, rgba(197, 232, 122, 0.08), rgba(61, 92, 56, 0.03)); padding: 20px 24px; box-shadow: 0 4px 16px -8px rgba(61, 92, 56, 0.1);">
                    <svg class="w-8 h-8 mb-3 opacity-20" style="color: #3d5c38;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                    <p style="font-size: 1rem; font-style: italic; color: rgba(26, 36, 25, 0.7); line-height: 1.85; margin: 0; font-weight: 500;">
                        "{{ setting('store_name', 'Genjah Rumah Bibit') }} — tumbuh bersama petani dan pecinta tanaman Indonesia."
                    </p>
                </blockquote>
            </div>

            {{-- Kanan: timeline --}}
            <div class="lg:col-span-7 relative">
                <!-- Timeline Line -->
                <div class="timeline-line absolute left-[28px] top-8 bottom-8 w-[3px] rounded-full hidden sm:block" style="background: linear-gradient(180deg, #5a7058 0%, rgba(90, 112, 88, 0.6) 50%, rgba(90, 112, 88, 0.2) 100%);"></div>

                @php
                    $milestones = [
                        [
                            'year' => '2020',
                            'title' => 'Awal Berdiri',
                            'body' => 'Toko dimulai dari skala rumahan di Mlonggo, Jepara, fokus pada bibit sayuran dan buah pilihan untuk tetangga dan petani kecil sekitar.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>',
                            'color' => '#c5e87a',
                        ],
                        [
                            'year' => '2021–22',
                            'title' => 'Memperluas Jaringan',
                            'body' => 'Permintaan dari luar kota naik; kami memperketat standar kualitas, kemasan, dan konsultasi agar bibit sampai segar dan terlacak.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>',
                            'color' => '#8bc34a',
                        ],
                        [
                            'year' => '2023',
                            'title' => 'Go Digital',
                            'body' => 'Katalog dan pemesanan daring memudahkan pelanggan di berbagai wilayah mengakses bibit unggulan tanpa mengorbankan layanan personal.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>',
                            'color' => '#5a7058',
                        ],
                        [
                            'year' => 'Sekarang',
                            'title' => 'Terus Berinovasi',
                            'body' => 'Variasi bibit terus ditambah, layanan diperhalus, dan komitmen tetap sama: bibit sehat, terpercaya, dan mendampingi kebun Anda berkembang.',
                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>',
                            'color' => '#3d5c38',
                        ],
                    ];
                @endphp

                <div class="flex flex-col gap-0 sm:pl-4">
                    @foreach($milestones as $i => $m)
                    <div class="history-milestone relative sm:pl-20 pb-16 last:pb-0">
                        <!-- Timeline Dot -->
                        <div class="timeline-dot hidden sm:flex absolute left-0 top-[24px] z-10 h-14 w-14 items-center justify-center rounded-full border-[3px] shadow-xl" style="background: linear-gradient(145deg, #ffffff, #f9f7f4); border-color: {{ $m['color'] }};">
                            <svg class="h-6 w-6 shrink-0" style="color: {{ $m['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">{!! $m['icon'] !!}</svg>
                        </div>
                        
                        <!-- Card -->
                        <div class="history-card relative overflow-hidden rounded-2xl border-2 bg-white p-7 sm:p-8" style="border-color: rgba(26, 36, 25, 0.1); box-shadow: 0 20px 60px -28px rgba(26, 36, 25, 0.2);">
                            <!-- Decorative Corner -->
                            <div class="absolute right-0 top-0 h-32 w-32 rounded-bl-[100%] opacity-[0.05]" style="background: {{ $m['color'] }};"></div>
                            
                            <!-- Year Badge & Mobile Icon -->
                            <div class="relative flex flex-wrap items-center justify-between gap-4 gap-y-3 mb-5">
                                <span class="inline-flex items-center rounded-full px-5 py-2 text-xs font-extrabold tracking-widest shadow-md" style="background: linear-gradient(135deg, #1a2419, #2d4428); color: {{ $m['color'] }}; letter-spacing: 0.16em;">{{ $m['year'] }}</span>
                                <span class="sm:hidden inline-flex h-12 w-12 items-center justify-center rounded-full border-3 shrink-0 shadow-lg" style="border-color: {{ $m['color'] }}; background: #ffffff;">
                                    <svg class="h-5 w-5" style="color: {{ $m['color'] }};" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $m['icon'] !!}</svg>
                                </span>
                            </div>
                            
                            <!-- Title -->
                            <h3 class="mt-2 text-2xl font-black tracking-tight sm:text-3xl" style="color: #1a2419; letter-spacing: -0.02em;">{{ $m['title'] }}</h3>
                            
                            <!-- Description -->
                            <p class="mt-4 text-base leading-relaxed" style="color: rgba(26, 36, 25, 0.72); font-weight: 400; line-height: 1.85;">{{ $m['body'] }}</p>
                            
                            <!-- Accent Line -->
                            <div class="mt-5 h-1 w-16 rounded-full" style="background: linear-gradient(90deg, {{ $m['color'] }}, transparent);"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision Mission -->
<section class="relative overflow-hidden" style="background:#3d5c38;">

    {{-- Top wave in --}}
    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,0 L0,30 C240,0 480,60 720,30 C960,0 1200,60 1440,30 L1440,0 Z" fill="#f4f1ea"/>
        </svg>
    </div>

    {{-- Dot grid --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image:radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size:24px 24px;"></div>
    {{-- Left accent --}}
    <div class="absolute pointer-events-none" style="left:0; top:0; bottom:0; width:3px; background:linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 50%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top:56px; padding-bottom:64px;">

        {{-- Section label --}}
        <div class="flex items-center gap-3 mb-10">
            <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
            <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#c5e87a; text-transform:uppercase;">Arah & Tujuan</span>
        </div>

        {{-- Two columns --}}
        <div class="grid lg:grid-cols-2 gap-6">

            {{-- VISI --}}
            <div style="background:rgba(0,0,0,0.18); border:1px solid rgba(255,255,255,0.1); border-radius:12px; padding:36px 40px; position:relative; overflow:hidden;">
                {{-- Watermark --}}
                <div style="position:absolute; bottom:-16px; right:16px; font-size:7rem; font-weight:900; color:rgba(255,255,255,0.03); line-height:1; user-select:none; letter-spacing:-0.06em;">VISI</div>

                {{-- Header --}}
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:28px;">
                    <div style="width:40px; height:40px; border-radius:8px; background:rgba(197,232,122,0.12); border:1px solid rgba(197,232,122,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="18" height="18" fill="none" stroke="#c5e87a" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-size:10px; font-weight:800; letter-spacing:0.2em; color:rgba(197,232,122,0.6); text-transform:uppercase; margin-bottom:2px;">01</div>
                        <h3 style="font-size:1.5rem; font-weight:900; color:#ffffff; letter-spacing:-0.03em; line-height:1; margin:0;">Visi</h3>
                    </div>
                </div>

                {{-- Divider --}}
                <div style="width:100%; height:1px; background:rgba(255,255,255,0.08); margin-bottom:24px;"></div>

                {{-- Quote --}}
                <div style="border-left:3px solid #c5e87a; padding-left:20px;">
                    <p style="font-size:1rem; color:rgba(255,255,255,0.75); line-height:1.8; margin:0; font-style:italic;">
                        "Menjadi pusat bibit tanaman terpercaya dan terdepan di Indonesia yang menyediakan produk berkualitas tinggi dengan layanan pelanggan terbaik."
                    </p>
                </div>
            </div>

            {{-- MISI --}}
            <div style="background:rgba(197,232,122,0.06); border:1px solid rgba(197,232,122,0.15); border-radius:12px; padding:36px 40px; position:relative; overflow:hidden;">
                {{-- Watermark --}}
                <div style="position:absolute; bottom:-16px; right:16px; font-size:7rem; font-weight:900; color:rgba(197,232,122,0.04); line-height:1; user-select:none; letter-spacing:-0.06em;">MISI</div>

                {{-- Header --}}
                <div style="display:flex; align-items:center; gap:14px; margin-bottom:28px;">
                    <div style="width:40px; height:40px; border-radius:8px; background:rgba(197,232,122,0.12); border:1px solid rgba(197,232,122,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="18" height="18" fill="none" stroke="#c5e87a" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </div>
                    <div>
                        <div style="font-size:10px; font-weight:800; letter-spacing:0.2em; color:rgba(197,232,122,0.6); text-transform:uppercase; margin-bottom:2px;">02</div>
                        <h3 style="font-size:1.5rem; font-weight:900; color:#ffffff; letter-spacing:-0.03em; line-height:1; margin:0;">Misi</h3>
                    </div>
                </div>

                {{-- Divider --}}
                <div style="width:100%; height:1px; background:rgba(255,255,255,0.08); margin-bottom:24px;"></div>

                {{-- Mission list --}}
                <div style="display:flex; flex-direction:column; gap:12px;">
                    @foreach([
                        ['num'=>'01', 'text'=>'Menyediakan bibit tanaman unggulan dengan kualitas terbaik'],
                        ['num'=>'02', 'text'=>'Memberikan layanan konsultasi profesional dan gratis'],
                        ['num'=>'03', 'text'=>'Memastikan kepuasan pelanggan dengan garansi penuh'],
                        ['num'=>'04', 'text'=>'Melakukan pengiriman yang aman dan tepat waktu'],
                    ] as $item)
                    <div style="display:flex; align-items:flex-start; gap:14px; padding:14px 16px; background:rgba(0,0,0,0.15); border-radius:8px; border:1px solid rgba(255,255,255,0.06);">
                        <span style="font-size:10px; font-weight:800; color:rgba(197,232,122,0.5); letter-spacing:0.1em; flex-shrink:0; margin-top:2px;">{{ $item['num'] }}</span>
                        <span style="font-size:0.875rem; color:rgba(255,255,255,0.7); line-height:1.55; font-weight:500;">{{ $item['text'] }}</span>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>

    {{-- Bottom wave out --}}
    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#f4f1ea"/>
        </svg>
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
<section class="relative overflow-hidden" style="background: #3d5c38; margin-top: 0;">

    {{-- Top wave transition from page background --}}
    <div style="line-height:0; display:block; margin-bottom:-2px;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,0 L0,30 C240,0 480,60 720,30 C960,0 1200,60 1440,30 L1440,0 Z" fill="#f4f1ea"/>
        </svg>
    </div>

    {{-- Dot grid --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 24px 24px;"></div>

    {{-- Watermark --}}
    <div class="absolute pointer-events-none select-none hidden lg:block" style="right:-30px; top:50%; transform:translateY(-50%); font-size:14rem; font-weight:900; line-height:1; color:rgba(255,255,255,0.03); letter-spacing:-0.06em;">START</div>

    {{-- Left accent bar --}}
    <div class="absolute pointer-events-none" style="left:0; top:0; bottom:0; width:3px; background:linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 50%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top:64px; padding-bottom:72px;">
        <div class="flex flex-col lg:flex-row lg:items-center gap-12 lg:gap-20">

            {{-- LEFT: Text --}}
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-6">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#c5e87a; text-transform:uppercase;">Mulai Sekarang</span>
                </div>

                <h2 style="font-size:clamp(2.2rem, 4.5vw, 3.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.04em; color:#ffffff; margin:0 0 8px 0;">
                    Mulai
                </h2>
                <h2 style="font-size:clamp(2.2rem, 4.5vw, 3.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.04em; color:#c5e87a; margin:0 0 24px 0;">
                    Berkebun Hari Ini?
                </h2>

                <div style="width:56px; height:3px; background:linear-gradient(90deg, #c5e87a, rgba(197,232,122,0.2)); border-radius:2px; margin-bottom:24px;"></div>

                <p style="font-size:0.9375rem; color:rgba(255,255,255,0.5); line-height:1.75; max-width:420px; margin:0;">
                    Kami siap membantu Anda memilih bibit terbaik untuk kebun impian Anda — konsultasi gratis, pengiriman aman ke seluruh Indonesia.
                </p>
            </div>

            {{-- RIGHT: Action block --}}
            <div class="flex-shrink-0 flex flex-col gap-4" style="min-width:260px;">

                <a href="{{ route('products.index') }}"
                   style="display:flex; align-items:center; justify-content:space-between; gap:12px; padding:18px 24px; background:#c5e87a; color:#1a2e18; font-size:14px; font-weight:800; letter-spacing:0.04em; border-radius:8px; text-decoration:none; transition:all 0.2s;">
                    <span>Lihat Katalog Produk</span>
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>

                <a href="{{ whatsapp_link() }}" target="_blank"
                   style="display:flex; align-items:center; justify-content:space-between; gap:12px; padding:18px 24px; background:transparent; color:rgba(255,255,255,0.75); font-size:14px; font-weight:700; letter-spacing:0.04em; border:1px solid rgba(255,255,255,0.18); border-radius:8px; text-decoration:none; transition:all 0.2s;">
                    <span>Konsultasi via WhatsApp</span>
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                </a>

                {{-- Trust note --}}
                <div class="flex items-center gap-2 mt-1" style="padding-left:4px;">
                    <svg width="13" height="13" fill="none" stroke="rgba(197,232,122,0.6)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span style="font-size:11px; color:rgba(255,255,255,0.3); font-weight:500;">Garansi kualitas · Pengiriman aman · Gratis konsultasi</span>
                </div>

            </div>
        </div>
    </div>

    {{-- Bottom wave transition to footer --}}
    <div style="line-height:0; display:block; margin-top:-2px;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#f4f1ea"/>
        </svg>
    </div>

</section>
@endsection
