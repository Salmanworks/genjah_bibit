 @extends('layouts.main')

@section('title', 'Blog - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- PAGE BANNER — Blog --}}
<div data-dark-hero class="relative overflow-hidden" style="background: #3d5c38; padding-top: 80px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image: radial-gradient(circle, rgba(255,255,255,0.06) 1px, transparent 1px); background-size: 24px 24px;"></div>
    <div class="absolute pointer-events-none hidden lg:block select-none" style="right: -20px; top: 50%; transform: translateY(-50%); font-size: 16rem; font-weight: 900; line-height: 1; color: rgba(255,255,255,0.03); letter-spacing: -0.06em;">BLOG</div>
    <div class="absolute pointer-events-none" style="left: 0; top: 0; bottom: 0; width: 3px; background: linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 40%, transparent 100%);"></div>
    <div class="absolute top-0 left-0 right-0" style="height: 2px; background: linear-gradient(90deg, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.2) 40%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top: 36px; padding-bottom: 44px;">
        <nav class="flex items-center gap-2 mb-8">
            <a href="{{ route('home') }}" style="font-size: 11px; color: rgba(255,255,255,0.35); text-decoration: none; font-weight: 500; letter-spacing: 0.04em; text-transform: uppercase;">Beranda</a>
            <span style="color: rgba(255,255,255,0.2); font-size: 11px; margin: 0 2px;">/</span>
            <span style="font-size: 11px; color: #c5e87a; font-weight: 700; letter-spacing: 0.04em; text-transform: uppercase;">Blog & Artikel</span>
        </nav>

        <div class="flex flex-col lg:flex-row lg:items-stretch gap-0">
            <div class="flex-1 min-w-0 lg:pr-16 lg:border-r" style="border-color: rgba(255,255,255,0.1);">
                <div class="flex items-center gap-3 mb-5">
                    <span style="display:inline-block; width:28px; height:2px; background:#c5e87a;"></span>
                    <span style="font-size: 10px; font-weight: 800; letter-spacing: 0.25em; color: #c5e87a; text-transform: uppercase;">Inspirasi Hijau</span>
                </div>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #ffffff; margin: 0 0 6px 0;">Blog &</h1>
                <h1 style="font-size: clamp(2.6rem, 5vw, 4.2rem); font-weight: 900; line-height: 0.92; letter-spacing: -0.04em; color: #c5e87a; margin: 0 0 20px 0;">Artikel</h1>
                <div style="width: 100%; height: 1px; background: rgba(255,255,255,0.1); margin-bottom: 20px;"></div>
                <p style="font-size: 0.875rem; color: rgba(255,255,255,0.38); line-height: 1.7; margin: 0; max-width: 380px; font-style: italic;">
                    "Tips, panduan, dan informasi seputar perawatan tanaman untuk kebun impian Anda."
                </p>
            </div>

            <div class="hidden lg:flex flex-col justify-center gap-0 flex-shrink-0" style="width: 260px; padding-left: 48px;">
                <div style="padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">{{ $blogs->total() ?? '0' }}</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Total Artikel</div>
                </div>
                <div style="padding: 20px 0;">
                    <div class="flex items-center gap-3 mb-2">
                        <svg width="16" height="16" fill="none" stroke="rgba(197,232,122,0.5)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        <div style="font-size: 2.5rem; font-weight: 900; color: #c5e87a; line-height: 1; letter-spacing: -0.05em;">Tips</div>
                    </div>
                    <div style="font-size: 11px; font-weight: 700; color: rgba(255,255,255,0.4); letter-spacing: 0.12em; text-transform: uppercase;">Berkebun & Merawat</div>
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

<!-- Featured Post -->
@if($featuredBlog)
<section class="relative py-12">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="group block relative overflow-hidden aspect-[21/9] shadow-2xl border-4 border-white" style="border-radius: 60px;">
            @if($featuredBlog->featured_image)
                <img src="{{ asset('storage/' . $featuredBlog->featured_image) }}" 
                     alt="{{ $featuredBlog->title }}" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            @else
                <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1200&q=80" 
                     alt="{{ $featuredBlog->title }}" 
                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/40 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12">
                <span class="inline-block px-5 py-2 rounded-full bg-lime-500 text-emerald-950 text-xs font-black uppercase tracking-widest mb-6 shadow-lg shadow-lime-500/20">Sorotan</span>
                <h2 class="text-3xl md:text-5xl font-black text-white mb-4 group-hover:text-lime-400 transition-colors leading-tight">{{ $featuredBlog->title }}</h2>
                <p class="text-white/80 max-w-2xl line-clamp-2 mb-6 text-lg font-medium">{{ $featuredBlog->excerpt }}</p>
                <div class="flex flex-wrap items-center gap-6 text-sm text-white/60 font-bold uppercase tracking-wider">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/></svg>
                        {{ $featuredBlog->category }}
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                        {{ $featuredBlog->reading_time }} Menit Baca
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                        {{ $featuredBlog->published_at->format('d M Y') }}
                    </span>
                </div>
            </div>
        </a>
    </div>
</section>
@endif

<!-- Blog Grid -->
<section class="relative py-12 bg-white">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($blogs as $blog)
            <a href="{{ route('blog.show', $blog->slug) }}" class="group bg-white overflow-hidden shadow-2xl border border-emerald-500/5 hover:border-lime-500/30 transition-all card-hover flex flex-col" style="border-radius: 45px;">
                <div class="aspect-video overflow-hidden relative">
                    @if($blog->featured_image)
                        <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                             alt="{{ $blog->title }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=600&q=80" 
                             alt="{{ $blog->title }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @endif
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1.5 rounded-full bg-emerald-950/80 backdrop-blur-md text-white text-[10px] font-black uppercase tracking-widest shadow-lg">{{ $blog->category }}</span>
                    </div>
                </div>
                <div class="p-8 flex-1 flex flex-col">
                    <div class="flex items-center gap-4 mb-4 text-[10px] text-emerald-900/40 font-black uppercase tracking-widest">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $blog->reading_time }} Menit
                        </span>
                        <span>•</span>
                        <span>{{ $blog->published_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="text-xl font-black text-emerald-950 mb-4 line-clamp-2 group-hover:text-lime-500 transition-colors leading-tight">{{ $blog->title }}</h3>
                    <p class="text-sm text-emerald-900/60 font-medium line-clamp-2 mb-6 leading-relaxed">{{ $blog->excerpt }}</p>
                    <div class="mt-auto pt-6 border-t border-emerald-900/5 flex items-center justify-between">
                        <span class="text-[10px] font-black text-emerald-950 uppercase tracking-widest flex items-center gap-2">
                            Baca Artikel
                            <svg class="w-4 h-4 text-lime-500 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                        <span class="text-[10px] text-emerald-900/20 font-bold italic">{{ $blog->view_count }} views</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-20">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>
@endsection
