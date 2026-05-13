@extends('layouts.main')

@section('title', 'Blog - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- PAGE BANNER --}}
<div data-dark-hero class="relative overflow-hidden" style="background: #3d5c38; padding-top: 80px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="absolute pointer-events-none" style="left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 40%, transparent 100%);"></div>
    <div class="absolute top-0 left-0 right-0" style="height: 2px; background: linear-gradient(90deg, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.2) 40%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top: 36px; padding-bottom: 44px;">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 mb-8">
            <a href="{{ route('home') }}" style="font-size: 11px; color: rgba(255,255,255,0.35); text-decoration: none; font-weight: 500; letter-spacing: 0.04em; text-transform: uppercase;">Beranda</a>
            <span style="color: rgba(255,255,255,0.2); font-size: 11px; margin: 0 2px;">/</span>
            <span style="font-size: 11px; color: #c5e87a; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase;">Blog</span>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-stretch gap-0">
            <div class="flex-1 min-w-0 lg:pr-16 lg:border-r" style="border-color: rgba(255,255,255,0.1);">
                <div class="flex items-center gap-3 mb-5">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size: 10px; font-weight: 800; letter-spacing: 0.25em; color: #c5e87a; text-transform: uppercase;">Inspirasi & Edukasi</span>
                </div>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #ffffff; margin: 0 0 6px 0;">Blog</h1>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #c5e87a; margin: 0 0 20px 0;">Kami</h1>
                <div style="width: 100%; height: 1px; background: rgba(255,255,255,0.1); margin-bottom: 20px;"></div>
                <p style="font-size: 0.875rem; color: rgba(255,255,255,0.38); line-height: 1.7; margin: 0; max-width: 380px; font-style: italic;">
                    "Panduan lengkap berkebun, tips perawatan tanaman, dan inspirasi untuk menciptakan oasis hijau Anda sendiri."
                </p>
            </div>

            <div class="hidden lg:flex flex-col justify-center gap-0 flex-shrink-0" style="width: 260px; padding-left: 48px;">
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        <div style="font-size: 1.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.02em;">{{ $blogs->total() ?? '0' }}</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Total Artikel</div>
                </div>
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        <div style="font-size: 1.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.02em;">10+</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Kategori</div>
                </div>
                <div style="padding: 20px 0;">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        <div style="font-size: 1.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.02em;">∞</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Inspirasi</div>
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

{{-- FEATURED ARTICLE --}}
@if($featuredBlog)
<section style="background:#f4f1ea; padding-top:8px; padding-bottom:40px;">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-14">
        {{-- Section Header --}}
        <div class="flex items-center gap-3 mb-8">
            <span style="display:inline-block; width:28px; height:2px; background:#5a7058;"></span>
            <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#5a7058; text-transform:uppercase;">Artikel Pilihan</span>
        </div>

        {{-- Featured Card --}}
        <a href="{{ route('blog.show', $featuredBlog->slug) }}" style="text-decoration:none; display:block;">
            <div style="background:#ffffff; border:1px solid rgba(26,36,25,0.08); border-radius:12px; overflow:hidden; display:grid; grid-template-columns:1fr; gap:0;">
                @media (min-width: 1024px) {
                    <style>
                        .featured-grid { grid-template-columns: 1fr 1fr !important; }
                    </style>
                }
                <div class="featured-grid" style="display:grid; grid-template-columns:1fr; gap:0;">
                    {{-- Image Side --}}
                    <div style="position:relative; aspect-ratio:5/4; overflow:hidden; background:#ffffff;">
                        <div style="position:absolute; inset:0; background:linear-gradient(135deg, #f0fdf4 0%, #ecfccb 100%);"></div>
                        <div style="position:absolute; inset:0; opacity:0.05; background-image:radial-gradient(circle, #059669 1.5px, transparent 1.5px); background-size:24px 24px;"></div>
                        @if($featuredBlog->featured_image)
                            <img src="{{ asset('storage/' . $featuredBlog->featured_image) }}" 
                                 alt="{{ $featuredBlog->title }}" 
                                 style="position:relative; width:100%; height:100%; object-fit:cover; display:block;">
                        @else
                            <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=800&q=80" 
                                 alt="{{ $featuredBlog->title }}" 
                                 style="width:100%; height:100%; object-fit:cover; display:block;">
                        @endif
                        <div style="position:absolute; top:20px; left:20px;">
                            <span style="display:inline-block; padding:6px 12px; background:rgba(255,255,255,0.95); backdrop-filter:blur(8px); border-radius:6px; font-size:10px; font-weight:800; color:#1a2419; letter-spacing:0.08em; text-transform:uppercase; border:1px solid rgba(26,36,25,0.1);">
                                {{ $featuredBlog->category }}
                            </span>
                        </div>
                    </div>

                    {{-- Content Side --}}
                    <div style="padding:48px 40px; display:flex; flex-direction:column; justify-content:center;">
                        <div style="display:flex; align-items:center; gap:12px; margin-bottom:20px; flex-wrap:wrap;">
                            <span style="display:flex; align-items:center; gap:6px; padding:8px 14px; background:#f0fdf4; border-radius:8px; font-size:12px; font-weight:700; color:#166534;">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                                {{ $featuredBlog->reading_time }} Menit
                            </span>
                            <span style="display:flex; align-items:center; gap:6px; padding:8px 14px; background:#ecfccb; border-radius:8px; font-size:12px; font-weight:700; color:#3f6212;">
                                <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                {{ $featuredBlog->published_at->format('d M Y') }}
                            </span>
                        </div>

                        <h3 style="font-size:clamp(1.5rem, 3vw, 2.25rem); font-weight:900; color:#1a2419; margin:0 0 16px 0; line-height:1.2; letter-spacing:-0.02em;">
                            {{ $featuredBlog->title }}
                        </h3>

                        <p style="font-size:0.9375rem; color:rgba(26,36,25,0.65); line-height:1.7; margin:0 0 24px 0;">
                            {{ $featuredBlog->excerpt }}
                        </p>

                        <div style="display:inline-flex; align-items:center; gap:8px; padding:12px 20px; background:#3d5c38; color:#ffffff; font-size:12px; font-weight:800; border-radius:8px; letter-spacing:0.04em; text-transform:uppercase; width:fit-content;">
                            Baca Artikel
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
@endif

{{-- BLOG GRID --}}
<section style="background:#f4f1ea; padding-top:20px; padding-bottom:64px;">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-14">
        {{-- Section Header --}}
        <div class="flex items-center gap-3 mb-8">
            <span style="display:inline-block; width:28px; height:2px; background:#5a7058;"></span>
            <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#5a7058; text-transform:uppercase;">Semua Artikel</span>
        </div>

        {{-- Articles Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group block" style="text-decoration:none;">
                <div style="border-radius:12px; overflow:hidden; background:#ffffff; border:1px solid rgba(26,36,25,0.08); transition:all 0.3s ease;">
                    {{-- Image --}}
                    <div style="position:relative; aspect-ratio:5/4; overflow:hidden; background:#ffffff;">
                        <div style="position:absolute; inset:0; background:linear-gradient(135deg, #f0fdf4 0%, #ecfccb 100%);"></div>
                        <div style="position:absolute; inset:0; opacity:0.05; background-image:radial-gradient(circle, #059669 1.5px, transparent 1.5px); background-size:24px 24px;"></div>
                        
                        @if($blog->featured_image)
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                 alt="{{ $blog->title }}" 
                                 style="position:relative; width:100%; height:100%; object-fit:cover; display:block; transition:transform 0.4s ease;"
                                 class="group-hover:scale-105">
                        @else
                            <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=600&q=80" 
                                 alt="{{ $blog->title }}" 
                                 style="width:100%; height:100%; object-fit:cover; display:block; transition:transform 0.4s ease;"
                                 class="group-hover:scale-105">
                        @endif
                        
                        <div style="position:absolute; top:20px; left:20px;">
                            <span style="display:inline-block; padding:6px 12px; background:rgba(255,255,255,0.95); backdrop-filter:blur(8px); border-radius:6px; font-size:10px; font-weight:800; color:#1a2419; letter-spacing:0.08em; text-transform:uppercase; border:1px solid rgba(26,36,25,0.1);">
                                {{ $blog->category }}
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div style="padding:24px;">
                        <div style="display:flex; align-items:center; gap:10px; margin-bottom:12px; flex-wrap:wrap;">
                            <span style="display:flex; align-items:center; gap:5px; padding:5px 10px; background:#f0fdf4; border-radius:6px; font-size:11px; font-weight:700; color:#166534;">
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $blog->reading_time }} Min
                            </span>
                            <span style="display:flex; align-items:center; gap:5px; padding:5px 10px; background:#ecfccb; border-radius:6px; font-size:11px; font-weight:700; color:#3f6212;">
                                <svg width="12" height="12" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                {{ $blog->published_at->format('d M') }}
                            </span>
                        </div>

                        <h3 style="font-size:1.125rem; font-weight:800; color:#1a2419; margin:0 0 10px 0; line-height:1.3; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                            {{ $blog->title }}
                        </h3>

                        <p style="font-size:0.8125rem; color:rgba(26,36,25,0.6); line-height:1.6; margin:0 0 16px 0; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
                            {{ $blog->excerpt }}
                        </p>

                        <div style="display:flex; align-items:center; justify-content:space-between; padding-top:16px; border-top:1px solid rgba(26,36,25,0.08);">
                            <span style="font-size:11px; font-weight:800; color:#3d5c38; letter-spacing:0.06em; text-transform:uppercase; display:flex; align-items:center; gap:6px;">
                                Baca Artikel
                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="transition:transform 0.3s ease;" class="group-hover:translate-x-1"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                            <span style="display:flex; align-items:center; gap:5px; font-size:11px; color:rgba(26,36,25,0.4); font-weight:700;">
                                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                {{ $blog->view_count }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-16">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>

@endsection
