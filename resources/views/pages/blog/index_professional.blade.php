@extends('layouts.main')

@section('title', 'Blog - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- PROFESSIONAL HERO SECTION --}}
<section class="relative overflow-hidden bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800" style="padding-top: 100px; min-height: 70vh;">
    {{-- Animated Mesh Gradient Background --}}
    <div class="absolute inset-0 opacity-30">
        <div class="absolute inset-0" style="background: 
            radial-gradient(circle at 20% 50%, rgba(197,232,122,0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(16,185,129,0.3) 0%, transparent 50%),
            radial-gradient(circle at 40% 20%, rgba(132,204,22,0.2) 0%, transparent 50%);
            animation: meshMove 15s ease-in-out infinite alternate;">
        </div>
    </div>
    
    {{-- Floating Particles --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute w-2 h-2 bg-lime-400/30 rounded-full" style="top: 20%; left: 10%; animation: float 6s ease-in-out infinite;"></div>
        <div class="absolute w-3 h-3 bg-emerald-400/20 rounded-full" style="top: 60%; left: 80%; animation: float 8s ease-in-out infinite 1s;"></div>
        <div class="absolute w-2 h-2 bg-lime-300/25 rounded-full" style="top: 40%; right: 15%; animation: float 7s ease-in-out infinite 2s;"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-20">
        <div class="max-w-4xl mx-auto text-center">
            {{-- Breadcrumb --}}
            <nav class="flex items-center justify-center gap-3 mb-12">
                <a href="{{ route('home') }}" class="group flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-white/5 hover:bg-white/10 backdrop-blur-xl border border-white/10 hover:border-lime-400/30 transition-all duration-300">
                    <svg class="w-4 h-4 text-lime-400 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                    <span class="text-sm text-white/80 font-semibold">Home</span>
                </a>
                <svg class="w-5 h-5 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="px-5 py-2.5 rounded-2xl bg-lime-400/20 backdrop-blur-xl border border-lime-400/40 text-sm text-lime-300 font-bold">Blog</span>
            </nav>

            {{-- Main Title --}}
            <div class="mb-8">
                <div class="inline-flex items-center gap-3 px-6 py-3 rounded-full bg-lime-400/10 backdrop-blur-xl border border-lime-400/20 mb-8">
                    <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span class="text-sm font-bold text-lime-300 uppercase tracking-wider">Inspirasi & Edukasi</span>
                </div>
                
                <h1 class="text-6xl md:text-7xl lg:text-8xl font-black mb-6 leading-none">
                    <span class="block text-white mb-3">Explore</span>
                    <span class="block bg-gradient-to-r from-lime-300 via-lime-400 to-emerald-300 bg-clip-text text-transparent">Green World</span>
                </h1>
                
                <p class="text-xl text-white/70 max-w-2xl mx-auto font-medium leading-relaxed">
                    Panduan lengkap berkebun, tips perawatan tanaman, dan inspirasi untuk menciptakan oasis hijau Anda sendiri
                </p>
            </div>

            {{-- Stats Bar --}}
            <div class="flex flex-wrap items-center justify-center gap-8 mt-12">
                <div class="text-center">
                    <div class="text-5xl font-black text-lime-400 mb-2">{{ $blogs->total() ?? '0' }}</div>
                    <div class="text-sm text-white/60 font-semibold uppercase tracking-wider">Artikel</div>
                </div>
                <div class="w-px h-12 bg-white/10"></div>
                <div class="text-center">
                    <div class="text-5xl font-black text-lime-400 mb-2">10+</div>
                    <div class="text-sm text-white/60 font-semibold uppercase tracking-wider">Kategori</div>
                </div>
                <div class="w-px h-12 bg-white/10"></div>
                <div class="text-center">
                    <div class="text-5xl font-black text-lime-400 mb-2">∞</div>
                    <div class="text-sm text-white/60 font-semibold uppercase tracking-wider">Inspirasi</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Wave Divider --}}
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-24" preserveAspectRatio="none">
            <path d="M0,120 L0,60 C360,100 720,20 1080,60 C1440,100 1440,120 1440,120 Z" fill="#f4f1ea"/>
            <path d="M0,120 L0,70 C360,90 720,50 1080,70 C1440,90 1440,120 1440,120 Z" fill="#f4f1ea" opacity="0.5"/>
        </svg>
    </div>
</section>

<style>
@keyframes meshMove {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(50px, 30px) scale(1.1); }
}
@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
    50% { transform: translateY(-30px) rotate(180deg); opacity: 0.6; }
}
</style>

{{-- FEATURED ARTICLE --}}
@if($featuredBlog)
<section class="relative py-20 bg-gradient-to-b from-[#f4f1ea] to-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-lime-400/10 border border-lime-400/20 mb-4">
                <svg class="w-4 h-4 text-lime-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span class="text-sm font-bold text-emerald-900 uppercase tracking-wider">Featured Article</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-emerald-950">Artikel Pilihan</h2>
        </div>

        {{-- Featured Card --}}
        <article class="group relative">
            <div class="absolute -inset-4 bg-gradient-to-r from-lime-400 via-emerald-400 to-lime-400 rounded-[48px] opacity-0 group-hover:opacity-20 blur-2xl transition-all duration-700"></div>
            
            <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="relative block">
                <div class="relative overflow-hidden rounded-[48px] bg-white shadow-2xl hover:shadow-3xl border-2 border-emerald-100 hover:border-lime-300 transition-all duration-700">
                    <div class="grid lg:grid-cols-2 gap-0">
                        {{-- Image Side --}}
                        <div class="relative overflow-hidden" style="min-height: 500px;">
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-100 via-lime-50 to-emerald-50"></div>
                            @if($featuredBlog->featured_image)
                                <img src="{{ asset('storage/' . $featuredBlog->featured_image) }}" 
                                     alt="{{ $featuredBlog->title }}" 
                                     class="relative w-full h-full object-contain p-12 transition-all duration-1000 group-hover:scale-110 group-hover:rotate-2 drop-shadow-2xl">
                            @else
                                <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=800&q=80" 
                                     alt="{{ $featuredBlog->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                            @endif
                            <div class="absolute top-8 left-8">
                                <span class="px-5 py-2.5 rounded-full bg-white/95 backdrop-blur-xl text-emerald-900 text-xs font-black uppercase tracking-widest shadow-xl border-2 border-emerald-200">
                                    {{ $featuredBlog->category }}
                                </span>
                            </div>
                        </div>

                        {{-- Content Side --}}
                        <div class="p-12 lg:p-16 flex flex-col justify-center bg-gradient-to-br from-white to-emerald-50/30">
                            <div class="flex items-center gap-4 mb-6">
                                <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm font-bold">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                                    {{ $featuredBlog->reading_time }} Min
                                </span>
                                <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-lime-100 text-lime-700 text-sm font-bold">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                    {{ $featuredBlog->published_at->format('d M Y') }}
                                </span>
                            </div>

                            <h3 class="text-4xl lg:text-5xl font-black text-emerald-950 mb-6 leading-tight group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-emerald-600 group-hover:to-lime-600 transition-all duration-300">
                                {{ $featuredBlog->title }}
                            </h3>

                            <p class="text-lg text-emerald-800/80 font-medium mb-8 leading-relaxed line-clamp-3">
                                {{ $featuredBlog->excerpt }}
                            </p>

                            <div class="flex items-center gap-4">
                                <span class="inline-flex items-center gap-3 px-6 py-3 rounded-2xl bg-gradient-to-r from-emerald-600 to-lime-600 text-white font-bold text-sm uppercase tracking-wider group-hover:shadow-xl group-hover:scale-105 transition-all duration-300">
                                    Baca Artikel
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </article>
    </div>
</section>
@endif

{{-- BLOG GRID --}}
<section class="relative py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-emerald-950 mb-4">Semua Artikel</h2>
            <p class="text-lg text-emerald-800/70 max-w-2xl mx-auto">
                Jelajahi koleksi lengkap artikel kami tentang berkebun dan perawatan tanaman
            </p>
        </div>

        {{-- Articles Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($blogs as $blog)
            <article class="group relative">
                <div class="absolute -inset-2 bg-gradient-to-r from-lime-400 to-emerald-400 rounded-[40px] opacity-0 group-hover:opacity-15 blur-xl transition-all duration-500"></div>
                
                <a href="{{ route('blog.show', $blog->slug) }}" class="relative block">
                    <div class="relative overflow-hidden rounded-[40px] bg-white shadow-xl hover:shadow-2xl border border-emerald-100 hover:border-lime-300 transition-all duration-500">
                        {{-- Image --}}
                        <div class="relative overflow-hidden" style="aspect-ratio: 4/3;">
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-lime-50 to-emerald-100"></div>
                            <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #059669 1.5px, transparent 1.5px); background-size: 24px 24px;"></div>
                            
                            @if($blog->featured_image)
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                     alt="{{ $blog->title }}" 
                                     class="relative w-full h-full object-contain p-8 transition-all duration-700 group-hover:scale-110 group-hover:rotate-1 drop-shadow-xl">
                            @else
                                <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=600&q=80" 
                                     alt="{{ $blog->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @endif
                            
                            <div class="absolute top-6 left-6">
                                <span class="px-4 py-2 rounded-full bg-white/95 backdrop-blur-xl text-emerald-900 text-xs font-black uppercase tracking-widest shadow-lg border border-emerald-200/50">
                                    {{ $blog->category }}
                                </span>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="p-8 bg-gradient-to-b from-white to-emerald-50/20">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $blog->reading_time }} Min
                                </span>
                                <span class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-lime-50 text-lime-700 text-xs font-bold">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                    {{ $blog->published_at->format('d M') }}
                                </span>
                            </div>

                            <h3 class="text-2xl font-black text-emerald-950 mb-3 line-clamp-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-emerald-600 group-hover:to-lime-600 transition-all duration-300 leading-tight">
                                {{ $blog->title }}
                            </h3>

                            <p class="text-sm text-emerald-800/70 font-medium line-clamp-2 mb-6 leading-relaxed">
                                {{ $blog->excerpt }}
                            </p>

                            <div class="flex items-center justify-between pt-6 border-t border-emerald-100">
                                <span class="text-xs font-black text-emerald-900 uppercase tracking-widest flex items-center gap-2 group-hover:gap-3 transition-all">
                                    Baca Artikel
                                    <svg class="w-4 h-4 text-lime-600 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </span>
                                <span class="flex items-center gap-1.5 text-xs text-emerald-600/60 font-bold">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    {{ $blog->view_count }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-20">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>

@endsection
