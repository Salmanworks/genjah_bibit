@extends('layouts.admin')

@section('title', 'Manage Blog & Artikel')

@section('content')
<!-- Header -->
<section class="relative py-8">
    <div class="relative flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Manage Blog & Artikel</h1>
            <p class="text-emerald-100/40 text-sm">Kelola konten blog dan artikel</p>
        </div>
        <a href="{{ route('admin.blogs.create') }}" class="px-6 py-3 bg-lime-500 text-emerald-950 rounded-full font-bold hover:bg-lime-400 transition-all flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Blog
        </a>
    </div>
</section>

<!-- Filters -->
<section class="relative mb-6">
    <form method="GET" class="admin-card p-6 rounded-2xl">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul/kategori..." class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-white/30 focus:outline-none focus:border-lime-500">
            </div>
            <div>
                <select name="status" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white focus:outline-none focus:border-lime-500">
                    <option value="">Semua Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Published</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div>
                <select name="featured" class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white focus:outline-none focus:border-lime-500">
                    <option value="">Semua Featured</option>
                    <option value="1" {{ request('featured') === '1' ? 'selected' : '' }}>Featured</option>
                    <option value="0" {{ request('featured') === '0' ? 'selected' : '' }}>Not Featured</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-3 bg-lime-500 text-emerald-950 rounded-xl font-bold hover:bg-lime-400 transition-all">Filter</button>
                <a href="{{ route('admin.blogs.index') }}" class="px-4 py-3 bg-white/10 text-white rounded-xl font-bold hover:bg-white/20 transition-all">Reset</a>
            </div>
        </div>
    </form>
</section>

<!-- Success Message -->
@if(session('success'))
<div class="mb-6 admin-card p-4 rounded-2xl border-l-4 border-lime-500">
    <p class="text-lime-400 font-semibold">{{ session('success') }}</p>
</div>
@endif

<!-- Blogs List -->
<section class="relative">
    @if($blogs->count() > 0)
    <div class="space-y-4">
        @foreach($blogs as $blog)
        <div class="admin-card p-6 rounded-2xl hover:bg-white/10 transition-all">
            <div class="flex items-start gap-6">
                <!-- Featured Image -->
                <div class="w-32 h-32 rounded-2xl overflow-hidden bg-emerald-800/50 flex-shrink-0">
                    @if($blog->featured_image)
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div class="flex-1">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-white mb-1">{{ $blog->title }}</h3>
                            <div class="flex items-center gap-3 text-xs text-emerald-300/50">
                                <span>{{ $blog->author->name ?? 'Admin' }}</span>
                                <span>•</span>
                                <span>{{ $blog->created_at->format('d M Y') }}</span>
                                @if($blog->category)
                                <span>•</span>
                                <span class="px-2 py-1 bg-white/5 rounded-lg">{{ $blog->category }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($blog->is_featured)
                            <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-xs font-bold flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                Featured
                            </span>
                            @endif
                            @if($blog->is_published)
                            <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-bold">Published</span>
                            @else
                            <span class="px-3 py-1 bg-gray-500/20 text-gray-400 rounded-full text-xs font-bold">Draft</span>
                            @endif
                        </div>
                    </div>
                    
                    <p class="text-emerald-200/70 mb-3 text-sm">{{ Str::limit($blog->excerpt, 120) }}</p>
                    
                    @if($blog->tags && count($blog->tags) > 0)
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach(array_slice($blog->tags, 0, 3) as $tag)
                        <span class="px-2 py-1 bg-white/5 text-emerald-300/70 rounded-lg text-xs">{{ $tag }}</span>
                        @endforeach
                        @if(count($blog->tags) > 3)
                        <span class="px-2 py-1 text-emerald-300/50 text-xs">+{{ count($blog->tags) - 3 }} lagi</span>
                        @endif
                    </div>
                    @endif
                    
                    <div class="flex items-center gap-4 text-xs text-emerald-300/50 mb-4">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <span>{{ $blog->view_count ?? 0 }} views</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $blog->reading_time ?? 1 }} min read</span>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex gap-3">
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-lg text-sm font-semibold transition-all">
                            Edit
                        </a>
                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus blog ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500/20 hover:bg-red-500/30 text-red-400 rounded-lg text-sm font-semibold transition-all">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="mt-6">
        {{ $blogs->links('vendor.pagination.custom') }}
    </div>
    @else
    <div class="admin-card p-12 rounded-2xl text-center">
        <div class="w-20 h-20 rounded-full bg-emerald-800/50 flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Blog</h3>
        <p class="text-emerald-200/70 mb-6">Mulai tambahkan blog dan artikel</p>
        <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-lime-500 text-emerald-950 font-bold rounded-xl hover:bg-lime-400 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Blog
        </a>
    </div>
    @endif
</section>
@endsection
