@extends('layouts.main')

@section('title', $blog->title . ' - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- ── PAGE BANNER ── --}}
<div data-dark-hero class="relative overflow-hidden" style="background:#3d5c38; padding-top:80px;">
    <div class="absolute inset-0 pointer-events-none" style="background-image:radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size:24px 24px;"></div>
    <div class="absolute pointer-events-none" style="left:0; top:0; bottom:0; width:3px; background:linear-gradient(to bottom, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.08) 40%, transparent 100%);"></div>
    <div class="absolute top-0 left-0 right-0" style="height:2px; background:linear-gradient(90deg, rgba(197,232,122,0.5) 0%, rgba(197,232,122,0.2) 40%, transparent 100%);"></div>

    <div class="relative max-w-4xl mx-auto px-6 sm:px-8 lg:px-12" style="padding-top:28px; padding-bottom:40px;">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 mb-6 flex-wrap">
            <a href="{{ route('home') }}" style="font-size:11px; color:rgba(255,255,255,0.35); text-decoration:none; font-weight:500; letter-spacing:0.04em; text-transform:uppercase;">Beranda</a>
            <span style="color:rgba(255,255,255,0.2); font-size:11px;">/</span>
            <a href="{{ route('blog.index') }}" style="font-size:11px; color:rgba(255,255,255,0.35); text-decoration:none; font-weight:500; letter-spacing:0.04em; text-transform:uppercase;">Blog</a>
            <span style="color:rgba(255,255,255,0.2); font-size:11px;">/</span>
            <span style="font-size:11px; color:#c5e87a; font-weight:700; letter-spacing:0.04em; text-transform:uppercase; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:200px;">{{ $blog->title }}</span>
        </nav>

        {{-- Meta row --}}
        <div class="flex flex-wrap items-center gap-3 mb-5">
            <span style="font-size:10px; font-weight:700; padding:3px 10px; background:rgba(197,232,122,0.12); border:1px solid rgba(197,232,122,0.25); border-radius:4px; color:#c5e87a; letter-spacing:0.1em; text-transform:uppercase;">{{ $blog->category }}</span>
            <span style="font-size:11px; color:rgba(255,255,255,0.35); font-weight:500;">{{ $blog->reading_time }} menit baca</span>
            <span style="color:rgba(255,255,255,0.15); font-size:11px;">·</span>
            <span style="font-size:11px; color:rgba(255,255,255,0.35); font-weight:500;">{{ $blog->published_at->format('d M Y') }}</span>
            <span style="color:rgba(255,255,255,0.15); font-size:11px;">·</span>
            <span style="font-size:11px; color:rgba(255,255,255,0.35); font-weight:500;">{{ $blog->view_count }} views</span>
        </div>

        {{-- Title --}}
        <h1 style="font-size:clamp(1.5rem, 3.5vw, 2.25rem); font-weight:900; line-height:1.15; letter-spacing:-0.03em; color:#ffffff; margin:0;">
            {{ $blog->title }}
        </h1>

    </div>

    {{-- Wave out --}}
    <div style="line-height:0; display:block; margin-top:8px;">
        <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" style="display:block; width:100%; height:48px;" preserveAspectRatio="none">
            <path d="M0,48 L0,24 C360,48 1080,0 1440,24 L1440,48 Z" fill="#f4f1ea"/>
        </svg>
    </div>
</div>

{{-- ── MAIN CONTENT ── --}}
<div style="background:#f4f1ea; padding-bottom:64px;">
    <div class="max-w-4xl mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Featured image --}}
        <div style="margin-top:-8px; margin-bottom:36px; border-radius:10px; overflow:hidden; border:1px solid rgba(26,36,25,0.08);">
            <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1200&q=80"
                 alt="{{ $blog->title }}"
                 style="width:100%; aspect-ratio:16/7; object-fit:cover; display:block;">
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
                    <div style="aspect-ratio:16/9; overflow:hidden;">
                        <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 3 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 3 == 2 ? '1463936575229-25b11c7e5345' : '1501004318641-b39ac6497518') }}?w=400&q=80"
                             alt="{{ $related->title }}"
                             style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease; display:block;"
                             class="group-hover:scale-105">
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
