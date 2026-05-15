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
                    "{{ setting('store_name', 'Genjah Rumah Bibit') }} — tumbuh bersama petani dan pecinta tanaman Indonesia."
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
