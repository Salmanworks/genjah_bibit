# 🎨 IMPLEMENTASI VIEWS ADMIN - TESTIMONI & BLOG

## ✅ STATUS IMPLEMENTASI

- [x] Controllers sudah dibuat dan diimplementasi
- [x] Routes sudah ditambahkan
- [x] Sidebar menu sudah ditambahkan
- [x] Folder views sudah dibuat
- [ ] Views perlu dibuat (6 files)

---

## 📁 FILES YANG PERLU DIBUAT

### Testimonials:
1. `resources/views/admin/testimonials/index.blade.php`
2. `resources/views/admin/testimonials/create.blade.php`
3. `resources/views/admin/testimonials/edit.blade.php`

### Blogs:
4. `resources/views/admin/blogs/index.blade.php`
5. `resources/views/admin/blogs/create.blade.php`
6. `resources/views/admin/blogs/edit.blade.php`

---

## 🎨 DESIGN SYSTEM

### Colors:
- **Primary:** Emerald 900 (#1a2e1a)
- **Accent:** Lime 500 (#c5e87a)
- **Success:** Green 500
- **Danger:** Red 500
- **Warning:** Yellow 500
- **Info:** Blue 500

### Typography:
- **Heading:** Font Black (900)
- **Subheading:** Font Bold (700)
- **Body:** Font Semibold (600)
- **Label:** Font Medium (500)

### Spacing:
- **Card Padding:** 24px (p-6)
- **Section Gap:** 24px (gap-6)
- **Border Radius:** 16px (rounded-2xl)

---

## 💻 CODE UNTUK VIEWS

### 1. Testimonials Index (`resources/views/admin/testimonials/index.blade.php`)

```blade
@extends('layouts.main')

@section('title', 'Manage Testimoni - Admin')

@section('content')
<!-- Header -->
<section class="relative py-8">
    <div class="relative flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-extrabold text-white tracking-tight">Manage Testimoni</h1>
            <p class="text-emerald-100/40 text-sm">Kelola testimoni customer</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="px-6 py-3 bg-lime-500 text-emerald-950 rounded-full font-bold hover:bg-lime-400 transition-all flex items-center gap-2">
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
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/lokasi..." class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:outline-none focus:border-lime-500">
            </div>
            <div>
                <select name="rating" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:border-lime-500">
                    <option value="">Semua Rating</option>
                    <option value="5" {{ request('rating') == 5 ? 'selected' : '' }}>5 Bintang</option>
                    <option value="4" {{ request('rating') == 4 ? 'selected' : '' }}>4 Bintang</option>
                    <option value="3" {{ request('rating') == 3 ? 'selected' : '' }}>3 Bintang</option>
                    <option value="2" {{ request('rating') == 2 ? 'selected' : '' }}>2 Bintang</option>
                    <option value="1" {{ request('rating') == 1 ? 'selected' : '' }}>1 Bintang</option>
                </select>
            </div>
            <div>
                <select name="status" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white focus:outline-none focus:border-lime-500">
                    <option value="">Semua Status</option>
                    <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-3 bg-lime-500 text-emerald-950 rounded-xl font-bold hover:bg-lime-400 transition-all">Filter</button>
                <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-3 bg-white/10 text-white rounded-xl font-bold hover:bg-white/20 transition-all">Reset</a>
            </div>
        </div>
    </form>
</section>

<!-- Success Message -->
@if(session('success'))
<div class="mb-6 glass-card p-4 rounded-2xl border-l-4 border-lime-500">
    <p class="text-lime-400 font-semibold">{{ session('success') }}</p>
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
                <div class="w-20 h-20 rounded-2xl overflow-hidden bg-emerald-800/50 flex-shrink-0">
                    @if($testimonial->avatar)
                    <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-2xl font-bold text-lime-400">
                        {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                    </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div class="flex-1">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <h3 class="text-lg font-bold text-white">{{ $testimonial->name }}</h3>
                            <p class="text-sm text-emerald-300/50">{{ $testimonial->location }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($testimonial->is_active)
                            <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-bold">Active</span>
                            @else
                            <span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-bold">Inactive</span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Rating -->
                    <div class="flex items-center gap-1 mb-3">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial->rating)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @else
                            <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            @endif
                        @endfor
                        <span class="text-sm text-white ml-2">{{ $testimonial->rating }}/5</span>
                    </div>
                    
                    <p class="text-emerald-200/70 mb-3">{{ Str::limit($testimonial->content, 150) }}</p>
                    
                    @if($testimonial->product_purchased)
                    <p class="text-xs text-emerald-300/50 mb-4">Produk: {{ $testimonial->product_purchased }}</p>
                    @endif
                    
                    <!-- Actions -->
                    <div class="flex gap-3">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-lg text-sm font-semibold transition-all">
                            Edit
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
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
        {{ $testimonials->links('vendor.pagination.custom') }}
    </div>
    @else
    <div class="glass-card p-12 rounded-2xl text-center">
        <div class="w-20 h-20 rounded-full bg-emerald-800/50 flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-white mb-2">Belum Ada Testimoni</h3>
        <p class="text-emerald-200/70 mb-6">Mulai tambahkan testimoni customer</p>
        <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-lime-500 text-emerald-950 font-bold rounded-xl hover:bg-lime-400 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Testimoni
        </a>
    </div>
    @endif
</section>
@endsection
```

---

## 🚀 CARA IMPLEMENTASI

### Step 1: Buat File Views
Buat 6 file berikut dan copy code dari dokumentasi ini:

1. `resources/views/admin/testimonials/index.blade.php` ✅ (code di atas)
2. `resources/views/admin/testimonials/create.blade.php` (lihat section berikutnya)
3. `resources/views/admin/testimonials/edit.blade.php` (lihat section berikutnya)
4. `resources/views/admin/blogs/index.blade.php` (lihat section berikutnya)
5. `resources/views/admin/blogs/create.blade.php` (lihat section berikutnya)
6. `resources/views/admin/blogs/edit.blade.php` (lihat section berikutnya)

### Step 2: Test
1. Login sebagai admin
2. Klik menu "Testimoni" di sidebar
3. Halaman index akan muncul dengan UI yang aesthetic

### Step 3: Storage Link
Jalankan command ini untuk upload images:
```bash
php artisan storage:link
```

---

## 📝 NOTES

- UI menggunakan glass-card effect (backdrop-blur)
- Color scheme: Emerald & Lime
- Responsive design
- Smooth transitions
- Icon dari Heroicons

**Saya akan lanjutkan dengan code untuk create, edit, dan blogs views di response berikutnya!**
