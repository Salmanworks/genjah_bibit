@extends('layouts.main')

@section('title', $blog->title . ' - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-8">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/80 to-emerald-950"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-sm text-emerald-300/70 mb-6">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Blog</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">{{ $blog->title }}</span>
        </nav>
        
        <div class="flex items-center gap-3 mb-4">
            <span class="px-3 py-1 rounded-full bg-lime-500/20 text-lime-400 text-sm">{{ $blog->category }}</span>
            <span class="text-emerald-300/50 text-sm">{{ $blog->reading_time }} menit baca</span>
        </div>
        
        <h1 class="text-2xl md:text-4xl font-bold text-white mb-4">{{ $blog->title }}</h1>
        
        <div class="flex items-center gap-4 text-sm text-emerald-300/70">
            <span>{{ $blog->published_at->format('d M Y') }}</span>
            <span>|</span>
            <span>{{ $blog->view_count }} views</span>
        </div>
    </div>
</section>

<!-- Featured Image -->
<section class="relative pb-8">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 to-emerald-900/60"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="aspect-video rounded-2xl overflow-hidden glass-card">
            <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1200&q=80" 
                 alt="{{ $blog->title }}" 
                 class="w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- Content -->
<section class="relative py-8">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-900/60 via-emerald-950/90 to-emerald-950"></div>
    
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="article-content max-w-none">
            {!! $blog->content !!}
        </article>
        
        <!-- Tags -->
        @if($blog->tags)
        <div class="mt-8 pt-8 border-t border-emerald-500/20">
            <div class="flex flex-wrap gap-2">
                @foreach($blog->tags as $tag)
                <span class="px-3 py-1 rounded-full bg-white/10 text-emerald-300 text-sm">#{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- Share -->
        <div class="mt-8 flex items-center gap-4">
            <span class="text-emerald-300/70">Bagikan:</span>
            <div class="flex gap-2">
                <button onclick="shareToSocial('facebook')" class="w-10 h-10 rounded-full bg-blue-600/20 text-blue-400 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </button>
                <button onclick="shareToSocial('twitter')" class="w-10 h-10 rounded-full bg-sky-500/20 text-sky-400 flex items-center justify-center hover:bg-sky-500 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </button>
                <button onclick="shareToSocial('whatsapp')" class="w-10 h-10 rounded-full bg-green-500/20 text-green-400 flex items-center justify-center hover:bg-green-500 hover:text-white transition-all">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Related Articles -->
@if($relatedBlogs->count() > 0)
<section class="relative py-12">
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950 via-emerald-900/40 to-emerald-950"></div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-white mb-8">Artikel Terkait</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($relatedBlogs as $related)
            <a href="{{ route('blog.show', $related->slug) }}" class="group glass-card rounded-2xl overflow-hidden card-hover">
                <div class="aspect-video overflow-hidden">
                    <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=400&q=80" 
                         alt="{{ $related->title }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="p-5">
                    <h3 class="font-semibold text-white line-clamp-2 group-hover:text-lime-400 transition-colors">{{ $related->title }}</h3>
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
        case 'facebook':
            shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
            break;
        case 'twitter':
            shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${title}`;
            break;
        case 'whatsapp':
            shareUrl = `https://wa.me/?text=${title}%20${url}`;
            break;
    }
    
    window.open(shareUrl, '_blank', 'width=600,height=400');
}
</script>
@endsection
