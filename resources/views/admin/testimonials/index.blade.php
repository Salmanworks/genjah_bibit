@extends('layouts.admin')

@section('title', 'Manage Testimoni')

@section('content')
<!-- Header -->
<section class="relative py-8">
    <div class="relative flex justify-between items-center mb-6">
        <div>
            <h1 class="admin-page-title">Manage Testimoni</h1>
            <p class="admin-page-subtitle">Kelola testimoni customer</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="px-6 py-3 bg-gradient-to-r from-[#5b765f] to-[#6f8f73] text-white rounded-full font-bold hover:shadow-lg transition-all flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Testimoni
        </a>
    </div>
</section>

<!-- Filters -->
<section class="relative mb-6">
    <form method="GET" class="glass-card p-6 rounded-2xl">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/lokasi..." class="admin-input w-full px-4 py-3">
            </div>
            <div>
                <select name="rating" class="admin-input w-full px-4 py-3">
                    <option value="">Semua Rating</option>
                    <option value="5" {{ request('rating') == 5 ? 'selected' : '' }}>5 Bintang</option>
                    <option value="4" {{ request('rating') == 4 ? 'selected' : '' }}>4 Bintang</option>
                    <option value="3" {{ request('rating') == 3 ? 'selected' : '' }}>3 Bintang</option>
                    <option value="2" {{ request('rating') == 2 ? 'selected' : '' }}>2 Bintang</option>
                    <option value="1" {{ request('rating') == 1 ? 'selected' : '' }}>1 Bintang</option>
                </select>
            </div>
            <div>
                <select name="status" class="admin-input w-full px-4 py-3">
                    <option value="">Semua Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="admin-action-btn flex-1">Filter</button>
                <a href="{{ route('admin.testimonials.index') }}" class="admin-reset-btn px-4 py-3 rounded-xl font-bold">Reset</a>
            </div>
        </div>
    </form>
</section>

<!-- Success Message -->
@if(session('success'))
<div class="mb-6 admin-alert admin-alert-success">
    <svg class="w-5 h-5 text-[#6f8f73]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <span class="font-bold text-sm">{{ session('success') }}</span>
</div>
@endif

<!-- Testimonials List -->
<section class="relative">
    @if($testimonials->count() > 0)
    <div class="space-y-4">
        @foreach($testimonials as $testimonial)
        <div class="glass-card p-6 rounded-2xl hover:bg-white/10 transition-all">
            <div class="flex items-start gap-6">
                <!-- Avatar -->
                <div class="w-20 h-20 rounded-2xl overflow-hidden bg-[#5b765f]/10 border border-[#5b765f]/20 flex-shrink-0">
                    @if($testimonial->avatar)
                    <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-2xl font-bold text-[#5b765f]">
                        {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                    </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div class="flex-1">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <h3 class="text-lg font-bold text-[#1f2b21]">{{ $testimonial->name }}</h3>
                            <p class="text-sm text-[#5f6e61]">{{ $testimonial->location }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($testimonial->is_active)
                            <span class="status-badge bg-green-100 text-green-700 border-green-200">Active</span>
                            @else
                            <span class="status-badge bg-red-100 text-red-700 border-red-200">Inactive</span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Rating -->
                    <div class="flex items-center gap-1 mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial->rating)
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @else
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endif
                        @endfor
                        <span class="text-sm text-[#1f2b21] ml-2 font-semibold">{{ $testimonial->rating }}/5</span>
                    </div>
                    
                    <p class="text-[#3b5340] mb-3">{{ Str::limit($testimonial->content, 150) }}</p>
                    
                    @if($testimonial->product_purchased)
                    <p class="text-xs text-[#5f6e61] mb-4">Produk: {{ $testimonial->product_purchased }}</p>
                    @endif
                    
                    <!-- Actions -->
                    <div class="flex gap-3">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="px-4 py-2 bg-[#5b765f]/10 hover:bg-[#5b765f]/20 text-[#5b765f] rounded-lg text-sm font-semibold transition-all border border-[#5b765f]/20">
                            Edit
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-sm font-semibold transition-all border border-red-200">
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
        {{ $testimonials->links('vendor.pagination.custom') }}
    </div>
    @else
    <div class="glass-card p-12 rounded-2xl text-center">
        <div class="w-20 h-20 rounded-full bg-[#5b765f]/10 flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-[#5b765f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-[#1f2b21] mb-2">Belum Ada Testimoni</h3>
        <p class="text-[#5f6e61] mb-6">Mulai tambahkan testimoni customer</p>
        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-[#5b765f] to-[#6f8f73] text-white font-bold rounded-xl hover:shadow-lg transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Testimoni
        </a>
    </div>
    @endif
</section>
@endsection
