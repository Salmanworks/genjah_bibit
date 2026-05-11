@extends('layouts.main')

@section('title', 'Kontak - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- PAGE BANNER â€” Kontak --}}
<div data-dark-hero class="relative overflow-hidden" style="background: #3d5c38; padding-top: 80px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="absolute pointer-events-none hidden lg:block select-none" style="right: -20px; top: 50%; transform: translateY(-50%); font-size: 16rem; font-weight: 900; line-height: 1; color: rgba(255,255,255,0.03); letter-spacing: -0.06em;">KONTAK</div>
    <div class="absolute pointer-events-none" style="left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 40%, transparent 100%);"></div>
    <div class="absolute top-0 left-0 right-0" style="height: 2px; background: linear-gradient(90deg, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.2) 40%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top: 36px; padding-bottom: 44px;">
        <nav class="flex items-center gap-2 mb-8">
            <a href="{{ route('home') }}" style="font-size: 11px; color: rgba(255,255,255,0.35); text-decoration: none; font-weight: 500; letter-spacing: 0.04em; text-transform: uppercase;">Beranda</a>
            <span style="color: rgba(255,255,255,0.2); font-size: 11px; margin: 0 2px;">/</span>
            <span style="font-size: 11px; color: #c5e87a; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase;">Kontak</span>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-stretch gap-0">
            <div class="flex-1 min-w-0 lg:pr-16 lg:border-r" style="border-color: rgba(255,255,255,0.1);">
                <div class="flex items-center gap-3 mb-5">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size: 10px; font-weight: 800; letter-spacing: 0.25em; color: #c5e87a; text-transform: uppercase;">Hubungi Kami</span>
                </div>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #ffffff; margin: 0 0 6px 0;">Kontak</h1>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #c5e87a; margin: 0 0 20px 0;">Kami</h1>
                <div style="width: 100%; height: 1px; background: rgba(255,255,255,0.1); margin-bottom: 20px;"></div>
                <p style="font-size: 0.875rem; color: rgba(255,255,255,0.38); line-height: 1.7; margin: 0; max-width: 380px; font-style: italic;">
                    "Kami siap membantu Anda memilih bibit tanaman terbaik untuk kebun impian Anda."
                </p>
            </div>

            <div class="hidden lg:flex flex-col justify-center gap-0 flex-shrink-0" style="width: 260px; padding-left: 48px;">
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <div style="font-size: 1.1rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.02em;">{{ setting('phone', '0889-5045-078') }}</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">WhatsApp</div>
                </div>
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <div style="font-size: 0.85rem; font-weight: 700; color: #c5e87a; line-height: 1.3; word-break: break-all;">{{ setting('email', 'genjahrumahbibit@gmail.com') }}</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Email</div>
                </div>
                <div style="padding: 20px 0;">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <div style="font-size: 1.1rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.02em;">08.00 â€“ 17.00</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Jam Operasional WIB</div>
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

<!-- Info Cards -->
<section style="background:#f4f1ea; padding-top:8px; padding-bottom:40px;">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-14">
        <div class="grid md:grid-cols-3 gap-4">
            <a href="{{ whatsapp_link() }}" target="_blank" style="text-decoration:none; display:block;">
                <div style="padding:24px 22px; background:#ffffff; border:1px solid rgba(26,36,25,0.08); border-radius:10px; display:flex; align-items:flex-start; gap:14px;">
                    <div style="width:42px; height:42px; border-radius:8px; background:#3d5c38; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="19" height="19" fill="#c5e87a" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                    </div>
                    <div>
                        <div style="font-size:10px; font-weight:800; letter-spacing:0.15em; color:rgba(26,36,25,0.4); text-transform:uppercase; margin-bottom:3px;">WhatsApp</div>
                        <div style="font-size:0.9375rem; font-weight:800; color:#1a2419; margin-bottom:2px;">{{ setting('phone', '0889-5045-078') }}</div>
                        <div style="font-size:11px; color:rgba(26,36,25,0.4);">Respon cepat setiap hari</div>
                    </div>
                </div>
            </a>
            <a href="mailto:{{ setting('email', 'genjahrumahbibit@gmail.com') }}" style="text-decoration:none; display:block;">
                <div style="padding:24px 22px; background:#ffffff; border:1px solid rgba(26,36,25,0.08); border-radius:10px; display:flex; align-items:flex-start; gap:14px;">
                    <div style="width:42px; height:42px; border-radius:8px; background:#3d5c38; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <svg width="19" height="19" fill="none" stroke="#c5e87a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div style="min-width:0;">
                        <div style="font-size:10px; font-weight:800; letter-spacing:0.15em; color:rgba(26,36,25,0.4); text-transform:uppercase; margin-bottom:3px;">Email</div>
                        <div style="font-size:0.875rem; font-weight:800; color:#1a2419; margin-bottom:2px; word-break:break-all;">{{ setting('email', 'genjahrumahbibit@gmail.com') }}</div>
                        <div style="font-size:11px; color:rgba(26,36,25,0.4);">Kirim pertanyaan kapan saja</div>
                    </div>
                </div>
            </a>
            <div style="padding:24px 22px; background:#ffffff; border:1px solid rgba(26,36,25,0.08); border-radius:10px; display:flex; align-items:flex-start; gap:14px;">
                <div style="width:42px; height:42px; border-radius:8px; background:#3d5c38; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <svg width="19" height="19" fill="none" stroke="#c5e87a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <div style="font-size:10px; font-weight:800; letter-spacing:0.15em; color:rgba(26,36,25,0.4); text-transform:uppercase; margin-bottom:3px;">Lokasi</div>
                    <div style="font-size:0.9375rem; font-weight:800; color:#1a2419; margin-bottom:4px;">Mlonggo, Jepara, Jateng</div>
                    <div style="display:inline-flex; align-items:center; gap:5px;">
                        <span style="width:6px; height:6px; border-radius:50%; background:#3d5c38; display:inline-block;"></span>
                        <span style="font-size:11px; color:#3d5c38; font-weight:600;">Buka 08.00-17.00 WIB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Form + Map -->
<section style="background:#f4f1ea; padding-bottom:0;">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-14">
        <div class="grid lg:grid-cols-2 gap-5 items-start">
            <div style="background:#ffffff; border:1px solid rgba(26,36,25,0.08); border-radius:12px; padding:32px 28px;">
                <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">
                    <span style="display:inline-block; width:22px; height:2px; background:#5a7058;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.2em; color:#5a7058; text-transform:uppercase;">Kirim Pesan</span>
                </div>
                <h3 style="font-size:1.3rem; font-weight:900; color:#1a2419; letter-spacing:-0.03em; margin:0 0 22px 0;">Ada yang ingin <span style="color:#3d5c38;">ditanyakan?</span></h3>
                <form action="#" method="POST">
                    @csrf
                    <div style="display:flex; flex-direction:column; gap:13px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                            <div>
                                <label style="display:block; font-size:10px; font-weight:700; letter-spacing:0.1em; color:rgba(26,36,25,0.5); text-transform:uppercase; margin-bottom:5px;">Nama</label>
                                <input type="text" name="name" required placeholder="Nama lengkap" style="width:100%; padding:9px 12px; background:#f4f1ea; border:1px solid rgba(26,36,25,0.1); border-radius:6px; font-size:0.875rem; color:#1a2419; outline:none; box-sizing:border-box; font-family:inherit;">
                            </div>
                            <div>
                                <label style="display:block; font-size:10px; font-weight:700; letter-spacing:0.1em; color:rgba(26,36,25,0.5); text-transform:uppercase; margin-bottom:5px;">Email</label>
                                <input type="email" name="email" required placeholder="email@anda.com" style="width:100%; padding:9px 12px; background:#f4f1ea; border:1px solid rgba(26,36,25,0.1); border-radius:6px; font-size:0.875rem; color:#1a2419; outline:none; box-sizing:border-box; font-family:inherit;">
                            </div>
                        </div>
                        <div>
                            <label style="display:block; font-size:10px; font-weight:700; letter-spacing:0.1em; color:rgba(26,36,25,0.5); text-transform:uppercase; margin-bottom:5px;">Subjek</label>
                            <input type="text" name="subject" required placeholder="Topik pesan Anda" style="width:100%; padding:9px 12px; background:#f4f1ea; border:1px solid rgba(26,36,25,0.1); border-radius:6px; font-size:0.875rem; color:#1a2419; outline:none; box-sizing:border-box; font-family:inherit;">
                        </div>
                        <div>
                            <label style="display:block; font-size:10px; font-weight:700; letter-spacing:0.1em; color:rgba(26,36,25,0.5); text-transform:uppercase; margin-bottom:5px;">Pesan</label>
                            <textarea name="message" rows="5" required placeholder="Tulis pesan Anda di sini..." style="width:100%; padding:9px 12px; background:#f4f1ea; border:1px solid rgba(26,36,25,0.1); border-radius:6px; font-size:0.875rem; color:#1a2419; outline:none; resize:none; box-sizing:border-box; font-family:inherit;"></textarea>
                        </div>
                        <div style="display:flex; gap:8px; padding-top:2px;">
                            <button type="submit" style="flex:1; padding:11px 16px; background:#3d5c38; color:#ffffff; font-size:12px; font-weight:700; letter-spacing:0.08em; border:none; border-radius:6px; cursor:pointer; text-transform:uppercase; font-family:inherit;">Kirim Pesan</button>
                            <a href="{{ whatsapp_link() }}" target="_blank" style="display:flex; align-items:center; gap:6px; padding:11px 14px; background:#c5e87a; color:#1a2e18; font-size:12px; font-weight:700; border-radius:6px; text-decoration:none; white-space:nowrap;">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div style="display:flex; flex-direction:column; gap:10px;">
                {{-- Map Container with Modern Frame --}}
                <div style="position:relative; background:#ffffff; border:1px solid rgba(26,36,25,0.08); border-radius:12px; padding:12px; box-shadow:0 4px 12px rgba(0,0,0,0.04);">
                    {{-- 
                        LOKASI: Genjah Rumah Bibit
                        Alamat: DK Tlingsing, RT 09 RW 02, Jambu Timur, Kec. Mlonggo, Kab. Jepara
                        Pin otomatis langsung muncul di koordinat lokasi
                        Zoom: 19 (maximum zoom - sangat dekat)
                        
                        CARA UPDATE PIN (jika lokasi berubah):
                        1. Buka maps.google.com
                        2. Cari "Genjah Rumah Bibit" atau klik kanan di lokasi > "What's here?"
                        3. Klik Share > Embed a map
                        4. Copy src URL dan paste di bawah
                    --}}
                    <div style="position:relative; border-radius:8px; overflow:hidden; height:380px;">
                        <iframe src="https://www.google.com/maps?q=Genjah+Rumah+Bibit,+DK+Tlingsing,+RT+09+RW+02,+Jambu+Timur,+Mlonggo,+Jepara&output=embed&z=19" 
                                width="100%" 
                                height="100%" 
                                style="border:0; display:block;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        
                        {{-- Overlay Badge --}}
                        <div style="position:absolute; top:16px; left:16px; background:rgba(255,255,255,0.95); backdrop-filter:blur(8px); padding:10px 16px; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.1); border:1px solid rgba(26,36,25,0.08);">
                            <div style="display:flex; align-items:center; gap:10px;">
                                <div style="width:36px; height:36px; border-radius:8px; background:#3d5c38; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                    <svg width="18" height="18" fill="none" stroke="#c5e87a" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div style="font-size:13px; font-weight:800; color:#1a2419; line-height:1.2; margin-bottom:2px;">Genjah Rumah Bibit</div>
                                    <div style="font-size:10px; color:rgba(26,36,25,0.5); font-weight:600;">Mlonggo, Jepara</div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Status Badge --}}
                        <div style="position:absolute; top:16px; right:16px; background:rgba(61,92,56,0.95); backdrop-filter:blur(8px); padding:8px 14px; border-radius:8px; box-shadow:0 4px 12px rgba(0,0,0,0.15); border:1px solid rgba(197,232,122,0.2);">
                            <div style="display:flex; align-items:center; gap:6px;">
                                <span style="width:8px; height:8px; border-radius:50%; background:#c5e87a; animation:pulse 2s cubic-bezier(0.4,0,0.6,1) infinite;"></span>
                                <span style="font-size:11px; font-weight:800; color:#c5e87a; letter-spacing:0.04em;">BUKA HARI INI</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Address Card with Enhanced Design --}}
                <div style="background:#ffffff; border:1px solid rgba(26,36,25,0.08); border-radius:12px; padding:24px; box-shadow:0 4px 12px rgba(0,0,0,0.04);">
                    <div style="display:grid; grid-template-columns:1fr auto; gap:20px; margin-bottom:18px;">
                        <div>
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                                <svg width="14" height="14" fill="none" stroke="#3d5c38" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <div style="font-size:10px; font-weight:800; letter-spacing:0.12em; color:rgba(26,36,25,0.4); text-transform:uppercase;">Alamat Lengkap</div>
                            </div>
                            <p style="font-size:0.9375rem; color:#1a2419; line-height:1.7; margin:0; font-weight:600;">DK Tlingsing, RT 09 RW 02, Jambu Timur,<br>Kec. Mlonggo, Kab. Jepara, Jawa Tengah 59452</p>
                        </div>
                        <div style="text-align:right; flex-shrink:0;">
                            <div style="display:flex; align-items:center; justify-content:flex-end; gap:8px; margin-bottom:8px;">
                                <svg width="14" height="14" fill="none" stroke="#3d5c38" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div style="font-size:10px; font-weight:800; letter-spacing:0.12em; color:rgba(26,36,25,0.4); text-transform:uppercase;">Jam Buka</div>
                            </div>
                            <div style="font-size:1.125rem; font-weight:900; color:#3d5c38; line-height:1.2;">08.00 - 17.00</div>
                            <div style="font-size:11px; color:rgba(26,36,25,0.5); margin-top:3px; font-weight:600;">Senin - Minggu</div>
                        </div>
                    </div>
                    
                    <div style="height:1px; background:linear-gradient(to right, rgba(26,36,25,0.1) 0%, rgba(26,36,25,0.05) 50%, rgba(26,36,25,0.1) 100%); margin-bottom:16px;"></div>
                    
                    <div style="display:flex; align-items:center; justify-content:space-between; gap:12px; flex-wrap:wrap;">
                        <a href="https://maps.google.com/maps?q=Genjah+Rumah+Bibit,+DK+Tlingsing,+Jambu+Timur,+Mlonggo,+Jepara" target="_blank" 
                           style="display:inline-flex; align-items:center; gap:8px; padding:10px 18px; background:#3d5c38; color:#ffffff; font-size:12px; font-weight:800; border-radius:8px; text-decoration:none; letter-spacing:0.04em;">
                            <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Buka di Google Maps
                        </a>
                        <a href="{{ whatsapp_link('Halo, saya ingin bertanya tentang lokasi toko') }}" target="_blank"
                           style="display:inline-flex; align-items:center; gap:8px; padding:10px 18px; background:#c5e87a; color:#1a2419; font-size:12px; font-weight:800; border-radius:8px; text-decoration:none; letter-spacing:0.04em;">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                            </svg>
                            Tanya Lokasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Bottom -->
<section class="relative overflow-hidden" style="background:#3d5c38;">
    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,0 L0,30 C240,0 480,60 720,30 C960,0 1200,60 1440,30 L1440,0 Z" fill="#f4f1ea"/>
        </svg>
    </div>
    <div class="absolute inset-0 pointer-events-none" style="background-image:radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size:24px 24px;"></div>
    <div class="absolute pointer-events-none" style="left:0; top:0; bottom:0; width:3px; background:linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, transparent 100%);"></div>
    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top:52px; padding-bottom:60px;">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-10">
            <div class="flex-1">
                <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#c5e87a; text-transform:uppercase;">Butuh Bantuan?</span>
                </div>
                <h2 style="font-size:clamp(1.6rem, 3vw, 2.5rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#ffffff; margin:0 0 6px 0;">Tim Ahli Kami</h2>
                <h2 style="font-size:clamp(1.6rem, 3vw, 2.5rem); font-weight:900; line-height:0.95; letter-spacing:-0.03em; color:#c5e87a; margin:0 0 16px 0;">Siap Membantu</h2>
                <p style="font-size:0.875rem; color:rgba(255,255,255,0.45); line-height:1.7; max-width:380px; margin:0;">Dapatkan rekomendasi bibit terbaik sesuai kebutuhan Anda secara gratis via WhatsApp.</p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ whatsapp_link() }}" target="_blank" style="display:flex; align-items:center; gap:10px; padding:15px 26px; background:#c5e87a; color:#1a2e18; font-size:14px; font-weight:800; letter-spacing:0.04em; border-radius:8px; text-decoration:none;">
                    <svg width="17" height="17" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                    Konsultasi via WhatsApp
                </a>
            </div>
        </div>
    </div>
    <div style="line-height:0; display:block;">
        <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:60px;" preserveAspectRatio="none">
            <path d="M0,60 L0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 Z" fill="#f4f1ea"/>
        </svg>
    </div>
</section>
@endsection
