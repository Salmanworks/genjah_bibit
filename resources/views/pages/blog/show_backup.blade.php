@extends('layouts.main')

@section('title', $blog->title . ' - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- PROFESSIONAL HERO SECTION --}}
<section class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800" style="padding-top: 100px; padding-bottom: 60px;">
    {{-- Animated Mesh Gradient Background --}}
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background: 
            radial-gradient(circle at 20% 50%, rgba(197,232,122,0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(16,185,129,0.3) 0%, transparent 50%);
            animation: meshMove 15s ease-in-out infinite alternate;">
        </div>
    </div>

    <div class="relative max-w-5xl mx-auto px-6 sm:px-8 lg:px-12">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-3 mb-10">
            <a href="{{ route('home') }}" class="group flex items-center gap-2 px-4 py-2 rounded-2xl bg-white/5 hover:bg-white/10 backdrop-blur-xl border border-white/10 hover:border-lime-400/30 transition-all duration-300">
                <svg class="w-4 h-4 text-lime-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                <span class="text-sm text-white/80 font-semibold">Home</span>
            </a>
            <svg class="w-5 h-5 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('blog.index') }}" class="px-4 py-2 rounded-2xl bg-white/5 hover:bg-white/10 backdrop-blur-xl border border-white/10 hover:border-lime-400/30 transition-all duration-300 text-sm text-white/80 font-semibold">Blog</a>
            <svg class="w-5 h-5 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="px-4 py-2 rounded-2xl bg-lime-400/20 backdrop-blur-xl border border-lime-400/40 text-sm text-lime-300 font-bold truncate max-w-xs">{{ Str::limit($blog->title, 30) }}</span>
        </nav>

        {{-- Meta Info --}}
        <div class="flex flex-wrap items-center gap-4 mb-8">
            <span class="flex items-center gap-2 px-5 py-2.5 rounded-full bg-lime-400/20 backdrop-blur-xl border border-lime-400/40 text-sm text-lime-300 font-bold">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/></svg>
                {{ $blog->category }}
            </span>
            <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 text-sm text-white/80 font-semibold">
                <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                {{ $blog->reading_time }} Min
            </span>
            <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 text-sm text-white/80 font-semibold">
                <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                {{ $blog->published_at->format('d M Y') }}
            </span>
            <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-xl border border-white/20 text-sm text-white/80 font-semibold">
                <svg class="w-4 h-4 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                {{ $blog->view_count }} views
            </span>
        </div>

        {{-- Title --}}
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white leading-tight mb-6">
            {{ $blog->title }}
        </h1>

        {{-- Excerpt --}}
        @if($blog->excerpt)
        <p class="text-xl text-white/70 font-medium leading-relaxed max-w-3xl">
            {{ $blog->excerpt }}
        </p>
        @endif
    </div>

    {{-- Wave Divider --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-20" preserveAspectRatio="none">
            <path d="M0,80 L0,40 C360,70 720,10 1080,40 C1440,70 1440,80 1440,80 Z" fill="#ffffff"/>
            <path d="M0,80 L0,50 C360,65 720,35 1080,50 C1440,65 1440,80 1440,80 Z" fill="#ffffff" opacity="0.5"/>
        </svg>
    </div>
</section>

<style>
@keyframes meshMove {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(30px, 20px) scale(1.05); }
}
</style>

{{-- ── MAIN CONTENT ── --}}
<div style="background:#f4f1ea; padding-bottom:64px;">
    <div class="max-w-4xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Featured image --}}
        <div style="margin-top:-8px; margin-bottom:36px; border-radius:10px; overflow:hidden; border:1px solid rgba(26,36,25,0.08); background:#ffffff;">
            @if($blog->featured_image)
                <img src="{{ asset('storage/' . $blog->featured_image) }}"
                     alt="{{ $blog->title }}"
                     style="width:100%; aspect-ratio:16/7; object-fit:contain; display:block;">
            @else
                <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1200&q=80"
                     alt="{{ $blog->title }}"
                     style="width:100%; aspect-ratio:16/7; object-fit:cover; display:block;">
            @endif
        </div>

        {{-- Two-column layout: article + sidebar --}}
        <div class="flex flex-col lg:flex-row gap-10 lg:gap-14 items-start">

            {{-- ── ARTICLE BODY ── --}}
            <article style="flex:1; min-width:0;">

                {{-- Article content --}}
                <div class="article-content" style="font-size:0.9375rem; line-height:1.8; color:rgba(26,36,25,0.75);">
                    {!! $blog->content !!}
                </div>

                {{-- Tags --}}
                @if($blog->tags)
                <div style="margin-top:32px; padding-top:24px; border-top:1px solid rgba(26,36,25,0.08);">
                    <div style="font-size:10px; font-weight:800; letter-spacing:0.2em; color:rgba(26,36,25,0.35); text-transform:uppercase; margin-bottom:10px;">Tags</div>
                    <div class="flex flex-wrap gap-2">
                        @foreach($blog->tags as $tag)
                        <span style="font-size:11px; font-weight:600; padding:4px 10px; background:#ffffff; border:1px solid rgba(26,36,25,0.1); border-radius:4px; color:rgba(26,36,25,0.55); letter-spacing:0.04em;">#{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Share --}}
                <div style="margin-top:28px; padding-top:24px; border-top:1px solid rgba(26,36,25,0.08); display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                    <span style="font-size:11px; font-weight:700; letter-spacing:0.1em; color:rgba(26,36,25,0.4); text-transform:uppercase;">Bagikan</span>
                    <div style="display:flex; gap:8px;">
                        <button onclick="shareToSocial('facebook')" style="width:34px; height:34px; border-radius:6px; background:#1877f2; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center;">
                            <svg width="16" height="16" fill="#ffffff" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </button>
                        <button onclick="shareToSocial('twitter')" style="width:34px; height:34px; border-radius:6px; background:#1da1f2; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center;">
                            <svg width="16" height="16" fill="#ffffff" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </button>
                        <button onclick="shareToSocial('whatsapp')" style="width:34px; height:34px; border-radius:6px; background:#25d366; border:none; cursor:pointer; display:flex; align-items:center; justify-content:center;">
                            <svg width="16" height="16" fill="#ffffff" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                        </button>
                    </div>
                </div>

            </article>

            {{-- ── SIDEBAR ── --}}
            <aside class="hidden lg:block flex-shrink-0" style="width:220px; position:sticky; top:100px;">

                {{-- Back to blog --}}
                <a href="{{ route('blog.index') }}" style="display:flex; align-items:center; gap:8px; font-size:12px; font-weight:700; color:#3d5c38; text-decoration:none; letter-spacing:0.04em; margin-bottom:24px; padding-bottom:16px; border-bottom:1px solid rgba(26,36,25,0.1);">
                    <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                    Kembali ke Blog
                </a>

                {{-- Article info --}}
                <div style="margin-bottom:24px; padding-bottom:20px; border-bottom:1px solid rgba(26,36,25,0.08);">
                    <div style="font-size:10px; font-weight:800; letter-spacing:0.2em; color:rgba(26,36,25,0.35); text-transform:uppercase; margin-bottom:12px;">Info Artikel</div>
                    <div class="flex flex-col gap-3">
                        <div style="display:flex; align-items:center; gap:8px;">
                            <svg width="13" height="13" fill="none" stroke="rgba(61,92,56,0.6)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span style="font-size:12px; color:rgba(26,36,25,0.55);">{{ $blog->published_at->format('d M Y') }}</span>
                        </div>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <svg width="13" height="13" fill="none" stroke="rgba(61,92,56,0.6)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span style="font-size:12px; color:rgba(26,36,25,0.55);">{{ $blog->reading_time }} menit baca</span>
                        </div>
                        <div style="display:flex; align-items:center; gap:8px;">
                            <svg width="13" height="13" fill="none" stroke="rgba(61,92,56,0.6)" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <span style="font-size:12px; color:rgba(26,36,25,0.55);">{{ $blog->view_count }} views</span>
                        </div>
                    </div>
                </div>

                {{-- CTA sidebar --}}
                <div style="padding:16px; background:#3d5c38; border-radius:8px;">
                    <div style="font-size:11px; font-weight:800; color:#c5e87a; letter-spacing:0.1em; text-transform:uppercase; margin-bottom:8px;">Butuh Bibit?</div>
                    <p style="font-size:11px; color:rgba(255,255,255,0.55); line-height:1.6; margin:0 0 12px 0;">Konsultasi gratis dengan tim ahli kami via WhatsApp.</p>
                    <a href="{{ whatsapp_link() }}" target="_blank" style="display:flex; align-items:center; justify-content:center; gap:6px; padding:9px 12px; background:#c5e87a; color:#1a2e18; font-size:11px; font-weight:800; border-radius:5px; text-decoration:none; letter-spacing:0.04em;">
                        <svg width="13" height="13" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                        Chat Sekarang
                    </a>
                </div>

            </aside>

        </div>
    </div>
</div>

{{-- ── RELATED ARTICLES ── --}}
@if($relatedBlogs->count() > 0)
<section style="background:#f4f1ea; padding-bottom:64px;">
    <div class="max-w-4xl mx-auto px-6 sm:px-8 lg:px-12">

        <div style="height:1px; background:rgba(26,36,25,0.08); margin-bottom:36px;"></div>

        <div class="flex items-center gap-3 mb-8">
            <span style="display:inline-block; width:28px; height:2px; background:#5a7058;"></span>
            <span style="font-size:10px; font-weight:800; letter-spacing:0.25em; color:#5a7058; text-transform:uppercase;">Artikel Terkait</span>
        </div>

        <div class="grid md:grid-cols-3 gap-5">
            @foreach($relatedBlogs as $related)
            <a href="{{ route('blog.show', $related->slug) }}" class="group block" style="text-decoration:none;">
                <div style="border-radius:10px; overflow:hidden; background:#ffffff; border:1px solid rgba(26,36,25,0.07);">
                    <div style="aspect-ratio:16/9; overflow:hidden; background:#ffffff;">
                        @if($related->featured_image)
                            <img src="{{ asset('storage/' . $related->featured_image) }}"
                                 alt="{{ $related->title }}"
                                 style="width:100%; height:100%; object-fit:contain; transition:transform 0.4s ease; display:block;"
                                 class="group-hover:scale-105">
                        @else
                            <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 3 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 3 == 2 ? '1463936575229-25b11c7e5345' : '1501004318641-b39ac6497518') }}?w=400&q=80"
                                 alt="{{ $related->title }}"
                                 style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease; display:block;"
                                 class="group-hover:scale-105">
                        @endif
                    </div>
                    <div style="padding:14px 16px;">
                        <div style="font-size:10px; font-weight:700; color:#3d5c38; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:6px;">{{ $related->category }}</div>
                        <h3 style="font-size:0.875rem; font-weight:700; color:#1a2419; line-height:1.4; margin:0; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">{{ $related->title }}</h3>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</section>
@endif

<script>
function shareToSocial(platform) {
    const url = encodeURIComponent(window.location.href);
    const title = encodeURIComponent(document.title);
    let shareUrl = '';
    switch(platform) {
        case 'facebook': shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`; break;
        case 'twitter':  shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`; break;
        case 'whatsapp': shareUrl = `https://wa.me/?text=${title}%20${url}`; break;
    }
    window.open(shareUrl, '_blank', 'width=600,height=400');
}
</script>
@endsection
