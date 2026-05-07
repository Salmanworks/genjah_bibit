@extends('layouts.main')

@section('title', 'Blog - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Header -->
<section class="relative pt-32 pb-12 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-900/10 border border-emerald-900/10 mb-8">
            <span class="w-2 h-2 rounded-full bg-lime-500 animate-pulse"></span>
            <span class="text-xs font-medium text-emerald-900 tracking-wider uppercase">Inspirasi Hijau</span>
        </div>
        
        <div class="max-w-[95%] mx-auto mt-4">
            <div class="w-full px-8 md:px-20 py-16 md:py-24 bg-white/90 backdrop-blur-xl border border-emerald-900/5 shadow-2xl flex flex-col items-center justify-center text-center" 
                 style="border-radius: 9999px;">
                <h1 class="font-black text-emerald-950 mb-6 drop-shadow-sm tracking-tighter leading-none uppercase"
                    style="font-size: clamp(2.5rem, 10vw, 7.5rem);">
                    Blog & <span class="text-lime-400">Artikel</span>
                </h1>
                <p class="text-xl md:text-2xl text-emerald-900/70 max-w-3xl mx-auto font-light leading-relaxed">
                    Tips, panduan, dan informasi seputar perawatan tanaman untuk kebun impian Anda.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Post -->
@if($featuredBlog)
<section class="relative py-12">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="group block relative overflow-hidden aspect-[21/9] shadow-2xl border-4 border-white" style="border-radius: 60px;">
            <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1200&q=80" 
                 alt="{{ $featuredBlog->title }}" 
                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
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
                    <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=600&q=80" 
                         alt="{{ $blog->title }}" 
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
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
