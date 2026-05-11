@extends('layouts.main')

@section('title', setting('store_name', 'Plant Power') . ' - ' . setting('store_tagline', 'Pusat Bibit Tanaman Berkualitas'))

@section('content')
<!-- ═══════════════════════════════════════════
     HERO SECTION — SPLIT DESIGN
═══════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="min-height:100vh; display:flex; align-items:center; background:linear-gradient(135deg, #f4f1ea 0%, #e8e4d8 100%);" data-dark-hero="false">
    
    {{-- Decorative elements --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(61,92,56,0.04) 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    {{-- Accent shapes --}}
    <div class="absolute pointer-events-none" style="top:15%; right:10%; width:400px; height:400px; border-radius:50%; background:radial-gradient(circle, rgba(197,232,122,0.15) 0%, transparent 70%);"></div>
    <div class="absolute pointer-events-none" style="bottom:10%; left:8%; width:350px; height:350px; border-radius:50%; background:radial-gradient(circle, rgba(61,92,56,0.08) 0%, transparent 70%);"></div>
    
    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-20 lg:py-32 w-full">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            
            {{-- Left: Content --}}
            <div style="max-width:600px;">
                
                {{-- Badge --}}
                <div style="display:inline-flex; align-items:center; gap:8px; padding:8px 18px; background:#ffffff; border:1px solid rgba(61,92,56,0.12); border-radius:50px; margin-bottom:28px;">
                    <span style="width:8px; height:8px; border-radius:50%; background:#c5e87a; animation:pulse 2s cubic-bezier(0.4,0,0.6,1) infinite;"></span>
                    <span style="font-size:12px; font-weight:700; color:#3d5c38; letter-spacing:0.04em;">Bibit Berkualitas Premium</span>
                </div>
                
                {{-- Title --}}
                <h1 style="font-size:clamp(2.75rem, 5.5vw, 5rem); font-weight:900; line-height:0.9; letter-spacing:-0.05em; margin:0 0 28px 0;">
                    <span style="color:#1a2419;">Pusat Bibit</span><br>
                    <span style="color:#3d5c38;">Tanaman</span> <span style="color:#c5e87a; text-shadow:2px 2px 0 rgba(61,92,56,0.2);">Berkualitas</span>
                </h1>
                
                {{-- Subtitle --}}
                <p style="font-size:1.0625rem; color:rgba(26,36,25,0.6); line-height:1.75; margin:0 0 36px 0; max-width:520px;">
                    Temukan bibit tanaman terbaik untuk kebun impian Anda. Sehat, unggul, dan siap tanam. Konsultasi gratis via WhatsApp.
                </p>
                
                {{-- CTA Buttons --}}
                <div style="display:flex; flex-wrap:wrap; gap:12px; margin-bottom:40px;">
                    <a href="{{ whatsapp_link() }}" target="_blank" 
                       style="display:inline-flex; align-items:center; gap:10px; padding:16px 32px; background:#3d5c38; color:#ffffff; font-size:15px; font-weight:700; border-radius:50px; text-decoration:none; transition:all 0.3s ease; border:2px solid #3d5c38;">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                        </svg>
                        Pesan via WhatsApp
                    </a>
                    <a href="{{ route('products.index') }}" 
                       style="display:inline-flex; align-items:center; gap:10px; padding:16px 32px; background:#ffffff; color:#3d5c38; font-size:15px; font-weight:700; border-radius:50px; text-decoration:none; transition:all 0.3s ease; border:2px solid #3d5c38;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        Lihat Katalog
                    </a>
                </div>
                
                {{-- Feature Pills --}}
                <div style="display:flex; flex-wrap:wrap; gap:10px;">
                    <div style="display:flex; align-items:center; gap:10px; padding:12px 18px; background:#ffffff; border:1px solid rgba(61,92,56,0.1); border-radius:12px;">
                        <div style="width:36px; height:36px; border-radius:8px; background:rgba(197,232,122,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="18" height="18" fill="none" stroke="#3d5c38" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:13px; font-weight:700; color:#1a2419; margin:0; line-height:1.2;">Bibit Unggul</p>
                            <p style="font-size:11px; color:rgba(26,36,25,0.45); margin:0; line-height:1.2;">Berkualitas Tinggi</p>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:10px; padding:12px 18px; background:#ffffff; border:1px solid rgba(61,92,56,0.1); border-radius:12px;">
                        <div style="width:36px; height:36px; border-radius:8px; background:rgba(197,232,122,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="18" height="18" fill="none" stroke="#3d5c38" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:13px; font-weight:700; color:#1a2419; margin:0; line-height:1.2;">Pengiriman Aman</p>
                            <p style="font-size:11px; color:rgba(26,36,25,0.45); margin:0; line-height:1.2;">Dan Cepat</p>
                        </div>
                    </div>
                    <div style="display:flex; align-items:center; gap:10px; padding:12px 18px; background:#ffffff; border:1px solid rgba(61,92,56,0.1); border-radius:12px;">
                        <div style="width:36px; height:36px; border-radius:8px; background:rgba(197,232,122,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="18" height="18" fill="none" stroke="#3d5c38" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <div>
                            <p style="font-size:13px; font-weight:700; color:#1a2419; margin:0; line-height:1.2;">Konsultasi Gratis</p>
                            <p style="font-size:11px; color:rgba(26,36,25,0.45); margin:0; line-height:1.2;">Via WhatsApp</p>
                        </div>
                    </div>
                </div>
                
            </div>
            
            {{-- Right: Hero Image - Redesigned --}}
            <div class="hidden lg:block relative">
                <div class="relative" style="animation:float 6s ease-in-out infinite;">
                    
                    {{-- Main Image with Modern Frame --}}
                    <div style="position:relative;">
                        {{-- Background shape --}}
                        <div style="position:absolute; inset:-20px; background:linear-gradient(135deg, #3d5c38 0%, #5a7058 100%); border-radius:30px; transform:rotate(3deg); opacity:0.08;"></div>
                        
                        {{-- Image container --}}
                        <div style="position:relative; border-radius:24px; overflow:hidden; box-shadow:0 30px 70px rgba(0,0,0,0.15); border:4px solid #ffffff;">
                            <img src="/images/tanm-bg.png" 
                                 alt="Premium Plant" 
                                 style="width:100%; max-width:520px; display:block;">
                        </div>
                        
                        {{-- Decorative corner elements --}}
                        <div style="position:absolute; top:-16px; left:-16px; width:100px; height:100px; border:4px solid #c5e87a; border-radius:20px; border-right:none; border-bottom:none;"></div>
                        <div style="position:absolute; bottom:-16px; right:-16px; width:100px; height:100px; border:4px solid #3d5c38; border-radius:20px; border-left:none; border-top:none;"></div>
                    </div>
                    
                    {{-- Stats Cards - Redesigned --}}
                    <div style="position:absolute; left:-30px; top:15%; padding:20px 24px; background:#ffffff; border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.12); animation:float 4s ease-in-out infinite; animation-delay:0.5s; border:2px solid #f4f1ea;">
                        <div style="display:flex; align-items:center; gap:16px;">
                            <div style="width:52px; height:52px; border-radius:14px; background:#c5e87a; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <svg width="26" height="26" fill="none" stroke="#1a2419" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div>
                                <p style="font-size:1.75rem; font-weight:900; color:#1a2419; margin:0; line-height:1;">500+</p>
                                <p style="font-size:11px; color:rgba(26,36,25,0.5); margin:0; font-weight:700; letter-spacing:0.06em; text-transform:uppercase;">Produk</p>
                            </div>
                        </div>
                    </div>
                    
                    <div style="position:absolute; right:-25px; bottom:20%; padding:20px 24px; background:#3d5c38; border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,0.15); animation:float 5s ease-in-out infinite; animation-delay:1s; border:2px solid rgba(197,232,122,0.3);">
                        <div style="display:flex; align-items:center; gap:16px;">
                            <div style="width:52px; height:52px; border-radius:14px; background:rgba(197,232,122,0.2); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                <svg width="26" height="26" fill="none" stroke="#c5e87a" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p style="font-size:1.75rem; font-weight:900; color:#ffffff; margin:0; line-height:1;">1000+</p>
                                <p style="font-size:11px; color:rgba(255,255,255,0.6); margin:0; font-weight:700; letter-spacing:0.06em; text-transform:uppercase;">Pelanggan</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    
    {{-- Bottom wave transition --}}
    <div style="position:absolute; bottom:0; left:0; right:0; line-height:0;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#ffffff"/>
        </svg>
    </div>
    
</section>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}
@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}
</style>



<!-- ═══════════════════════════════════════════
     BESTSELLER PRODUCTS
═══════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background:#ffffff; padding-top:80px; padding-bottom:80px;">
    
    {{-- Decorative elements --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(61,92,56,0.02) 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        
        {{-- Section Header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span style="display:inline-block; width:28px; height:2px; background:#3d5c38;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#5a7058; text-transform:uppercase;">Pilihan Terbaik</span>
                </div>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#1a2419; margin:0 0 8px 0;">Produk Terlaris</h2>
                <p style="font-size:0.9375rem; color:rgba(26,36,25,0.5); line-height:1.6; margin:0; max-width:480px;">
                    Bibit pilihan terbaik yang paling banyak diminati pelanggan kami
                </p>
            </div>
            <a href="{{ route('products.index', ['sort' => 'bestseller']) }}" 
               class="hidden md:inline-flex items-center gap-8px; padding:14px 28px; background:#3d5c38; color:#ffffff; font-size:14px; font-weight:700; border-radius:50px; text-decoration:none; transition:all 0.3s ease; white-space:nowrap;"
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; background:#3d5c38; color:#ffffff; font-size:14px; font-weight:700; border-radius:50px; text-decoration:none; transition:all 0.3s ease; white-space:nowrap;">
                Lihat Semua Produk
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        
        {{-- Products Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($bestsellers->take(8) as $product)
            @include('partials.product-card', ['product' => $product])
            @endforeach
        </div>
        
        {{-- Mobile CTA --}}
        <div class="mt-10 text-center md:hidden">
            <a href="{{ route('products.index') }}" 
               style="display:inline-flex; align-items:center; gap:8px; padding:14px 28px; background:#3d5c38; color:#ffffff; font-size:14px; font-weight:700; border-radius:50px; text-decoration:none;">
                Lihat Semua Produk
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        
    </div>
</section>

<!-- ═══════════════════════════════════════════
     WHY CHOOSE US
═══════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #3d5c38;">

    {{-- Top wave in --}}
    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,0 L0,30 C240,0 480,60 720,30 C960,0 1200,60 1440,30 L1440,0 Z" fill="#f4f1ea"/>
        </svg>
    </div>

    {{-- Dot grid --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 24px 24px;"></div>

    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-12" style="padding-top: 56px; padding-bottom: 72px;">

        {{-- Section header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#c5e87a; text-transform:uppercase;">Keunggulan Kami</span>
                </div>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#ffffff; margin:0 0 6px 0;">Mengapa Memilih</h2>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#c5e87a; margin:0;">Kami?</h2>
            </div>
            <p style="font-size:0.875rem; color:rgba(255,255,255,0.4); max-width:320px; line-height:1.7; margin:0;">
                Kami berkomitmen memberikan bibit terbaik dan pelayanan terbaik untuk Anda.
            </p>
        </div>

        {{-- Feature cards --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($features as $i => $feature)
            <div style="padding:28px 24px; background:rgba(0,0,0,0.18); border:1px solid rgba(255,255,255,0.1); border-radius:12px; position:relative; overflow:hidden;">
                {{-- Number watermark --}}
                <div style="position:absolute; top:-10px; right:12px; font-size:5rem; font-weight:900; color:rgba(255,255,255,0.03); line-height:1; user-select:none;">{{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                {{-- Icon --}}
                <div style="width:44px; height:44px; border-radius:8px; background:rgba(197,232,122,0.12); border:1px solid rgba(197,232,122,0.2); display:flex; align-items:center; justify-content:center; margin-bottom:20px; color:#c5e87a;">
                    {!! $feature['icon'] !!}
                </div>
                {{-- Divider --}}
                <div style="width:32px; height:2px; background:#c5e87a; border-radius:2px; margin-bottom:14px; opacity:0.6;"></div>
                <h3 style="font-size:0.9375rem; font-weight:800; color:#ffffff; margin:0 0 8px 0; letter-spacing:-0.01em;">{{ $feature['title'] }}</h3>
                <p style="font-size:0.8125rem; color:rgba(255,255,255,0.45); line-height:1.65; margin:0;">{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>

    </div>

    {{-- Bottom wave out --}}
    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#f4f1ea"/>
        </svg>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     TESTIMONIALS
═══════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background:#f4f1ea; padding-top:16px; padding-bottom:80px;">

    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Section header --}}
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span style="display:inline-block; width:28px; height:2px; background:#5a7058;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#5a7058; text-transform:uppercase;">Kata Mereka</span>
                </div>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#1a2419; margin:0 0 6px 0;">Testimoni</h2>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#5a7058; margin:0;">Pelanggan</h2>
            </div>
            <p style="font-size:0.875rem; color:rgba(26,36,25,0.45); max-width:300px; line-height:1.7; margin:0;">
                Kepuasan pelanggan adalah prioritas utama kami di setiap langkah.
            </p>
        </div>

        {{-- Testimonial grid --}}
        <div class="grid md:grid-cols-3 gap-5">
            @foreach($testimonials as $testimonial)
            <div style="padding:28px; background:#ffffff; border:1px solid rgba(26,36,25,0.07); border-radius:12px; display:flex; flex-direction:column; gap:16px;">

                {{-- Stars --}}
                <div style="display:flex; gap:3px;">
                    @for($i = 1; $i <= 5; $i++)
                    <svg width="14" height="14" viewBox="0 0 20 20" style="fill:{{ $i <= $testimonial->rating ? '#f59e0b' : '#e5e7eb' }};">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>

                {{-- Quote --}}
                <p style="font-size:0.875rem; color:rgba(26,36,25,0.7); line-height:1.75; margin:0; font-style:italic; flex:1;">
                    "{{ $testimonial->content }}"
                </p>

                {{-- Divider --}}
                <div style="height:1px; background:rgba(26,36,25,0.07);"></div>

                {{-- Author --}}
                <div style="display:flex; align-items:center; justify-content:space-between; gap:12px;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <div style="width:36px; height:36px; border-radius:50%; background:#3d5c38; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:800; color:#c5e87a; flex-shrink:0;">
                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                        </div>
                        <div>
                            <div style="font-size:13px; font-weight:700; color:#1a2419; line-height:1.2;">{{ $testimonial->name }}</div>
                            <div style="font-size:11px; color:rgba(26,36,25,0.4); margin-top:1px;">{{ $testimonial->location }}</div>
                        </div>
                    </div>
                    @if($testimonial->product_purchased)
                    <span style="font-size:10px; font-weight:700; padding:3px 8px; background:rgba(61,92,56,0.08); border:1px solid rgba(61,92,56,0.15); border-radius:4px; color:#3d5c38; white-space:nowrap; letter-spacing:0.02em;">
                        {{ $testimonial->product_purchased }}
                    </span>
                    @endif
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ═══════════════════════════════════════════
     CTA — KONSULTASI
═══════════════════════════════════════════ -->
<section class="relative overflow-hidden" style="background: #3d5c38;">

    {{-- Top wave in --}}
    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,0 L0,30 C240,0 480,60 720,30 C960,0 1200,60 1440,30 L1440,0 Z" fill="#f4f1ea"/>
        </svg>
    </div>

    {{-- Dot grid --}}
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 24px 24px;"></div>
    {{-- Left accent --}}
    <div class="absolute pointer-events-none" style="left:0; top:0; bottom:0; width:3px; background:linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 50%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top:52px; padding-bottom:60px;">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-10">

            {{-- Left: text --}}
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-5">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#c5e87a; text-transform:uppercase;">Gratis Konsultasi</span>
                </div>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#ffffff; margin:0 0 6px 0;">Bingung Pilih</h2>
                <h2 style="font-size:clamp(1.8rem, 3.5vw, 2.75rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#c5e87a; margin:0 0 20px 0;">Bibit Tanaman?</h2>
                <p style="font-size:0.9rem; color:rgba(255,255,255,0.45); line-height:1.7; max-width:400px; margin:0;">
                    Tim ahli kami siap membantu Anda memilih bibit terbaik sesuai kebutuhan — langsung via WhatsApp, cepat dan gratis.
                </p>
            </div>

            {{-- Right: action --}}
            <div class="flex flex-col gap-3 flex-shrink-0" style="min-width:260px;">
                <a href="{{ whatsapp_link('Halo Genjah Rumah Bibit, saya butuh rekomendasi bibit tanaman') }}" target="_blank"
                   style="display:flex; align-items:center; justify-content:space-between; gap:12px; padding:18px 24px; background:#c5e87a; color:#1a2e18; font-size:14px; font-weight:800; letter-spacing:0.04em; border-radius:8px; text-decoration:none;">
                    <span>Konsultasi via WhatsApp</span>
                    <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                </a>
                <div class="flex items-center gap-2" style="padding-left:4px;">
                    <svg width="13" height="13" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span style="font-size:11px; color:rgba(255,255,255,0.3); font-weight:500;">Respon cepat · Senin–Minggu 08.00–17.00 WIB</span>
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

<!-- ═══════════════════════════════════════════
     ARTIKEL TERBARU
═══════════════════════════════════════════ -->
<section class="relative" style="background:#f4f1ea; padding-top:16px; padding-bottom:72px;">
    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Section header — compact --}}
        <div class="flex items-center justify-between gap-4 mb-8">
            <div class="flex items-center gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span style="display:inline-block; width:20px; height:2px; background:#5a7058;"></span>
                        <span style="font-size:10px; font-weight:800; letter-spacing:0.2em; color:#5a7058; text-transform:uppercase;">Dari Blog Kami</span>
                    </div>
                    <h2 style="font-size:1.5rem; font-weight:900; line-height:1; letter-spacing:-0.03em; color:#1a2419; margin:0;">
                        Artikel <span style="color:#5a7058;">Terbaru</span>
                    </h2>
                </div>
            </div>
            <a href="{{ route('blog.index') }}" style="display:inline-flex; align-items:center; gap:6px; font-size:12px; font-weight:700; color:#3d5c38; text-decoration:none; letter-spacing:0.04em; white-space:nowrap; flex-shrink:0;">
                Lihat Semua
                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        {{-- 3-column uniform grid — scalable for new articles --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($blogs as $i => $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group block" style="text-decoration:none;">
                <div style="border-radius:10px; overflow:hidden; background:#ffffff; border:1px solid rgba(26,36,25,0.07); height:100%; display:flex; flex-direction:column;">

                    {{-- Image — fixed height, not aspect-ratio based --}}
                    <div style="height:160px; overflow:hidden; flex-shrink:0;">
                        @php
                            $photos = ['1416879595882-3373a0480b5b','1463936575229-25b11c7e5345','1501004318641-b39ac6497518','1518531933807-3b8360c5a59a','1459411552884-841db9b3cc2a'];
                        @endphp
                        <img src="https://images.unsplash.com/photo-{{ $photos[$loop->index % count($photos)] }}?w=500&q=75"
                             alt="{{ $blog->title }}"
                             style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease; display:block;"
                             class="group-hover:scale-105">
                    </div>

                    {{-- Content --}}
                    <div style="padding:14px 16px 16px; flex:1; display:flex; flex-direction:column; gap:6px;">

                        {{-- Meta --}}
                        <div style="display:flex; align-items:center; gap:8px;">
                            <span style="font-size:9px; font-weight:700; padding:2px 7px; background:rgba(61,92,56,0.08); border:1px solid rgba(61,92,56,0.12); border-radius:3px; color:#3d5c38; letter-spacing:0.08em; text-transform:uppercase;">{{ $blog->category }}</span>
                            <span style="font-size:10px; color:rgba(26,36,25,0.35); font-weight:500;">{{ $blog->reading_time }} mnt</span>
                        </div>

                        {{-- Title --}}
                        <h3 style="font-size:0.875rem; font-weight:700; color:#1a2419; line-height:1.4; margin:0; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; flex:1;">
                            {{ $blog->title }}
                        </h3>

                        {{-- Excerpt — only on first card --}}
                        @if($loop->first)
                        <p style="font-size:0.8125rem; color:rgba(26,36,25,0.45); line-height:1.6; margin:0; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                            {{ $blog->excerpt }}
                        </p>
                        @endif

                        {{-- Read more --}}
                        <div style="display:flex; align-items:center; gap:4px; margin-top:4px;">
                            <span style="font-size:11px; font-weight:700; color:#3d5c38; letter-spacing:0.04em;">Baca artikel</span>
                            <svg width="12" height="12" fill="none" stroke="#3d5c38" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>

                    </div>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>
@endsection
