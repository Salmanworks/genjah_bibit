 @extends('layouts.main')

@section('title', 'Blog - ' . setting('store_name', 'Plant Power'))

@section('content')

{{-- PAGE BANNER — Blog --}}
<div data-dark-hero class="relative overflow-hidden" style="background: linear-gradient(135deg, #2d4a2c 0%, #3d5c38 50%, #4a6b45 100%); padding-top: 80px;">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle, rgba(197,232,122,0.4) 1px, transparent 1px); background-size: 40px 40px; animation: patternMove 20s linear infinite;"></div>
    </div>
    
    <!-- Decorative Blobs -->
    <div class="absolute top-20 right-10 w-72 h-72 bg-lime-400/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-96 h-96 bg-emerald-400/10 rounded-full blur-3xl"></div>
    
    <!-- Border Accents -->
    <div class="absolute pointer-events-none" style="left: 0; top: 0; bottom: 0; width: 4px; background: linear-gradient(to bottom, rgba(197,232,122,0.8) 0%, rgba(197,232,122,0.2) 50%, transparent 100%);"></div>
    <div class="absolute top-0 left-0 right-0" style="height: 3px; background: linear-gradient(90deg, rgba(197,232,122,0.8) 0%, rgba(197,232,122,0.3) 50%, transparent 100%);"></div>

    <div class="relative max-w-7xl mx-auto px-8 sm:px-10 lg:px-14" style="padding-top: 48px; padding-bottom: 56px;">
        
        <!-- Breadcrumb dengan style baru -->
        <nav class="flex items-center gap-2 mb-10">
            <a href="{{ route('home') }}" class="group flex items-center gap-2 px-4 py-2 rounded-full bg-white/5 hover:bg-white/10 backdrop-blur-sm border border-white/10 transition-all">
                <svg class="w-3.5 h-3.5 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                <span style="font-size: 11px; color: rgba(255,255,255,0.7); font-weight: 600; letter-spacing: 0.05em;">Beranda</span>
            </a>
            <svg class="w-4 h-4 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="px-4 py-2 rounded-full bg-lime-400/20 backdrop-blur-sm border border-lime-400/30" style="font-size: 11px; color: #c5e87a; font-weight: 700; letter-spacing: 0.05em;">Blog & Artikel</span>
        </nav>

        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div>
                <!-- Label dengan icon -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-lime-400/20 backdrop-blur-sm border border-lime-400/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <span style="font-size: 12px; font-weight: 800; letter-spacing: 0.2em; color: #c5e87a; text-transform: uppercase;">Inspirasi Hijau</span>
                </div>
                
                <!-- Title dengan gradient -->
                <h1 class="mb-6" style="font-size: clamp(2.8rem, 5.5vw, 4.5rem); font-weight: 900; line-height: 1; letter-spacing: -0.04em;">
                    <span class="block text-white mb-2">Jelajahi</span>
                    <span class="block bg-gradient-to-r from-lime-300 via-lime-400 to-emerald-300 bg-clip-text text-transparent">Dunia Tanaman</span>
                </h1>
                
                <!-- Divider -->
                <div class="w-24 h-1 bg-gradient-to-r from-lime-400 to-transparent rounded-full mb-6"></div>
                
                <!-- Description -->
                <p style="font-size: 1rem; color: rgba(255,255,255,0.7); line-height: 1.8; margin: 0; max-width: 480px; font-weight: 500;">
                    Temukan tips berkebun, panduan perawatan tanaman, dan inspirasi untuk menciptakan taman impian Anda. Dari pemula hingga ahli, semua ada di sini.
                </p>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="p-4 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10">
                        <div class="text-3xl font-black text-lime-400 mb-1">{{ $blogs->total() ?? '0' }}</div>
                        <div class="text-[10px] font-bold text-white/50 uppercase tracking-wider">Artikel</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10">
                        <div class="text-3xl font-black text-lime-400 mb-1">{{ $blogs->count() }}</div>
                        <div class="text-[10px] font-bold text-white/50 uppercase tracking-wider">Kategori</div>
                    </div>
                    <div class="p-4 rounded-2xl bg-white/5 backdrop-blur-sm border border-white/10">
                        <div class="text-3xl font-black text-lime-400 mb-1">∞</div>
                        <div class="text-[10px] font-bold text-white/50 uppercase tracking-wider">Inspirasi</div>
                    </div>
                </div>
            </div>

            <!-- Right Illustration -->
            <div class="hidden lg:block relative">
                <!-- Decorative Card Stack -->
                <div class="relative">
                    <!-- Card 3 (Back) -->
                    <div class="absolute top-8 right-8 w-64 h-80 rounded-3xl bg-white/5 backdrop-blur-sm border border-white/10 transform rotate-6"></div>
                    <!-- Card 2 (Middle) -->
                    <div class="absolute top-4 right-4 w-64 h-80 rounded-3xl bg-white/5 backdrop-blur-sm border border-white/10 transform rotate-3"></div>
                    <!-- Card 1 (Front) -->
                    <div class="relative w-64 h-80 rounded-3xl bg-gradient-to-br from-lime-400/20 to-emerald-400/20 backdrop-blur-sm border border-lime-400/30 p-6 flex flex-col justify-between overflow-hidden">
                        <!-- Icon -->
                        <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-sm flex items-center justify-center">
                            <svg class="w-8 h-8 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                        <!-- Text -->
                        <div>
                            <div class="text-5xl font-black text-white mb-2">Tips</div>
                            <div class="text-sm text-white/70 font-medium">Berkebun & Merawat Tanaman</div>
                        </div>
                        <!-- Decorative Pattern -->
                        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-lime-400/10 rounded-full blur-2xl"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Wave Transition -->
    <div style="line-height: 0; display: block; margin-top: 12px;">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block; width: 100%; height: 80px;" preserveAspectRatio="none">
            <path d="M0,80 L0,40 C360,80 720,0 1080,40 C1440,80 1440,80 1440,80 Z" fill="#f4f1ea"/>
            <path d="M0,80 L0,50 C360,70 720,30 1080,50 C1440,70 1440,80 1440,80 Z" fill="#f4f1ea" opacity="0.5"/>
        </svg>
    </div>
</div>

<style>
@keyframes patternMove {
    0% { transform: translateY(0); }
    100% { transform: translateY(40px); }
}
</style>

<!-- Featured Post -->
@if($featuredBlog)
<section class="relative py-16">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Decorative Glow Effect -->
        <div class="absolute -inset-4 bg-gradient-to-r from-lime-400 via-emerald-400 to-lime-400 rounded-[56px] opacity-20 blur-3xl"></div>
        
        <article class="group relative">
            <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="block relative overflow-hidden shadow-2xl hover:shadow-3xl border-4 border-white hover:border-lime-100 transition-all duration-700" style="border-radius: 56px;">
                <!-- Image Container dengan gradient background -->
                <div class="relative overflow-hidden" style="aspect-ratio: 21/9;">
                    @if($featuredBlog->featured_image)
                        <!-- Multi-layer Gradient Background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-900 via-emerald-800 to-emerald-950"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/80 via-transparent to-emerald-900/40"></div>
                        
                        <!-- Decorative Pattern -->
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle, rgba(255,255,255,0.3) 1px, transparent 1px); background-size: 30px 30px;"></div>
                        
                        <!-- Image dengan efek 3D -->
                        <img src="{{ asset('storage/' . $featuredBlog->featured_image) }}" 
                             alt="{{ $featuredBlog->title }}" 
                             class="relative w-full h-full object-contain p-12 transition-all duration-1000 group-hover:scale-110 group-hover:rotate-1 drop-shadow-2xl mix-blend-lighten opacity-95">
                        
                        <!-- Decorative Light Rays -->
                        <div class="absolute top-0 left-1/4 w-1 h-full bg-gradient-to-b from-lime-400/30 via-transparent to-transparent transform -skew-x-12"></div>
                        <div class="absolute top-0 right-1/3 w-1 h-full bg-gradient-to-b from-emerald-400/20 via-transparent to-transparent transform skew-x-12"></div>
                    @else
                        <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=1200&q=80" 
                             alt="{{ $featuredBlog->title }}" 
                             class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                    @endif
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/60 to-transparent"></div>
                    
                    <!-- Decorative Corner Accents -->
                    <div class="absolute top-0 left-0 w-32 h-32 bg-gradient-to-br from-lime-400/20 to-transparent rounded-br-[56px]"></div>
                    <div class="absolute bottom-0 right-0 w-40 h-40 bg-gradient-to-tl from-lime-400/20 to-transparent rounded-tl-[56px]"></div>
                </div>
                
                <!-- Content Overlay dengan glassmorphism -->
                <div class="absolute bottom-0 left-0 right-0 p-10 md:p-14">
                    <!-- Badge dengan efek neon -->
                    <div class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-lime-500 text-emerald-950 text-xs font-black uppercase tracking-widest mb-6 shadow-2xl shadow-lime-500/50 border-2 border-lime-400 group-hover:scale-105 transition-transform">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        Artikel Pilihan
                    </div>
                    
                    <!-- Title dengan text shadow -->
                    <h2 class="text-4xl md:text-6xl font-black text-white mb-5 group-hover:text-lime-300 transition-colors leading-tight drop-shadow-2xl">
                        {{ $featuredBlog->title }}
                    </h2>
                    
                    <!-- Excerpt dengan backdrop blur -->
                    <p class="text-white/90 max-w-3xl line-clamp-2 mb-8 text-lg md:text-xl font-semibold backdrop-blur-sm bg-emerald-950/20 inline-block px-4 py-2 rounded-2xl">
                        {{ $featuredBlog->excerpt }}
                    </p>
                    
                    <!-- Meta Info dengan pills design -->
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-sm font-bold">
                            <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/></svg>
                            {{ $featuredBlog->category }}
                        </span>
                        <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-sm font-bold">
                            <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                            {{ $featuredBlog->reading_time }} Menit
                        </span>
                        <span class="flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white text-sm font-bold">
                            <svg class="w-4 h-4 text-lime-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                            {{ $featuredBlog->published_at->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </a>
        </article>
    </div>
</section>
@endif

<!-- Blog Grid -->
<section class="relative py-16 bg-gradient-to-b from-white via-emerald-50/30 to-white">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
            <article class="group relative">
                <!-- Decorative Background Glow -->
                <div class="absolute -inset-1 bg-gradient-to-r from-lime-400 to-emerald-400 rounded-[36px] opacity-0 group-hover:opacity-20 blur-xl transition-all duration-500"></div>
                
                <!-- Main Card -->
                <a href="{{ route('blog.show', $blog->slug) }}" class="relative block bg-white overflow-hidden shadow-lg hover:shadow-2xl border border-emerald-100 hover:border-lime-300 transition-all duration-500 flex flex-col" style="border-radius: 36px;">
                    
                    <!-- Image Container dengan aspect ratio 5:4 (lebih besar) -->
                    <div class="relative overflow-hidden" style="aspect-ratio: 5/4;">
                        <!-- Gradient Background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50 via-lime-50 to-emerald-100"></div>
                        
                        <!-- Decorative Pattern -->
                        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #059669 1px, transparent 1px); background-size: 20px 20px;"></div>
                        
                        <!-- Image -->
                        @if($blog->featured_image)
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                 alt="{{ $blog->title }}" 
                                 class="relative w-full h-full object-contain p-6 transition-all duration-700 group-hover:scale-110 group-hover:rotate-1 drop-shadow-xl">
                        @else
                            <img src="https://images.unsplash.com/photo-{{ $loop->iteration % 5 == 1 ? '1416879595882-3373a0480b5b' : ($loop->iteration % 5 == 2 ? '1463936575229-25b11c7e5345' : ($loop->iteration % 5 == 3 ? '1501004318641-b39ac6497518' : ($loop->iteration % 5 == 4 ? '1518531933807-3b8360c5a59a' : '1459411552884-841db9b3cc2a'))) }}?w=600&q=80" 
                                 alt="{{ $blog->title }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @endif
                        
                        <!-- Category Badge dengan efek glassmorphism -->
                        <div class="absolute top-5 left-5">
                            <span class="px-4 py-2 rounded-full bg-white/90 backdrop-blur-md text-emerald-900 text-[10px] font-black uppercase tracking-widest shadow-lg border border-emerald-200/50">
                                {{ $blog->category }}
                            </span>
                        </div>
                        
                        <!-- Decorative Corner -->
                        <div class="absolute bottom-0 right-0 w-24 h-24 bg-gradient-to-tl from-lime-400/20 to-transparent rounded-tl-[36px]"></div>
                    </div>
                    
                    <!-- Content dengan padding lebih besar -->
                    <div class="p-7 flex-1 flex flex-col bg-gradient-to-b from-white to-emerald-50/20">
                        <!-- Meta Info dengan icon lebih menarik -->
                        <div class="flex items-center gap-4 mb-4 text-[10px] text-emerald-700/60 font-bold uppercase tracking-wider">
                            <span class="flex items-center gap-1.5 bg-emerald-50 px-2.5 py-1 rounded-full">
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $blog->reading_time }} Min
                            </span>
                            <span class="flex items-center gap-1.5 bg-lime-50 px-2.5 py-1 rounded-full text-lime-700">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                {{ $blog->published_at->format('d M') }}
                            </span>
                        </div>
                        
                        <!-- Title dengan gradient hover -->
                        <h3 class="text-xl font-black text-emerald-950 mb-3 line-clamp-2 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-emerald-600 group-hover:to-lime-600 transition-all duration-300 leading-tight">
                            {{ $blog->title }}
                        </h3>
                        
                        <!-- Excerpt -->
                        <p class="text-sm text-emerald-800/70 font-medium line-clamp-2 mb-5 leading-relaxed">
                            {{ $blog->excerpt }}
                        </p>
                        
                        <!-- Footer dengan design lebih menarik -->
                        <div class="mt-auto pt-5 border-t border-emerald-100 flex items-center justify-between">
                            <span class="text-[11px] font-black text-emerald-900 uppercase tracking-widest flex items-center gap-2 group-hover:gap-3 transition-all">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 text-lime-500 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                            <span class="flex items-center gap-1.5 text-[10px] text-emerald-600/50 font-bold">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                {{ $blog->view_count }}
                            </span>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-20">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
    </div>
</section>
@endsection
