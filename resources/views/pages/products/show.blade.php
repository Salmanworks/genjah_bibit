@extends('layouts.main')

@section('title', $product->name . ' - ' . setting('store_name', 'Plant Power'))

@section('content')
<!-- Breadcrumb -->
<section class="relative pt-32 pb-4">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center gap-2 text-sm text-emerald-900/60">
            <a href="{{ route('home') }}" class="hover:text-emerald-950 transition-colors">Beranda</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('products.index') }}" class="hover:text-emerald-950 transition-colors">Produk</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-emerald-950 font-medium">{{ $product->name }}</span>
        </nav>
    </div>
</section>

<!-- Product Detail -->
<section class="relative py-12 bg-emerald-900 shadow-inner">
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Image Gallery -->
            <div class="space-y-4">
                <div class="aspect-square rounded-2xl overflow-hidden bg-white/5 border border-white/10 backdrop-blur-sm shadow-xl">
                    <img id="main-image" src="{{ $product->image_url ?? 'https://images.unsplash.com/photo-1614594975525-e45190c55d0b?w=800&q=80' }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-cover">
                </div>
                <div class="grid grid-cols-4 gap-3">
                    <button onclick="changeImage('https://images.unsplash.com/photo-1614594975525-e45190c55d0b?w=400&q=80')" class="aspect-square rounded-xl overflow-hidden border-2 border-lime-400 bg-white/5 shadow-md">
                        <img src="https://images.unsplash.com/photo-1614594975525-e45190c55d0b?w=200&q=80" class="w-full h-full object-cover">
                    </button>
                    <button onclick="changeImage('https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=400&q=80')" class="aspect-square rounded-xl overflow-hidden border-2 border-transparent hover:border-white/50 bg-white/5 shadow-md transition-colors">
                        <img src="https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=200&q=80" class="w-full h-full object-cover">
                    </button>
                    <button onclick="changeImage('https://images.unsplash.com/photo-1466692476868-0e96c3e6a5ce?w=400&q=80')" class="aspect-square rounded-xl overflow-hidden border-2 border-transparent hover:border-white/50 bg-white/5 shadow-md transition-colors">
                        <img src="https://images.unsplash.com/photo-1466692476868-0e96c3e6a5ce?w=200&q=80" class="w-full h-full object-cover">
                    </button>
                    <button onclick="changeImage('https://images.unsplash.com/photo-1501004318641-b39ac6497518?w=400&q=80')" class="aspect-square rounded-xl overflow-hidden border-2 border-transparent hover:border-white/50 bg-white/5 shadow-md transition-colors">
                        <img src="https://images.unsplash.com/photo-1501004318641-b39ac6497518?w=200&q=80" class="w-full h-full object-cover">
                    </button>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="space-y-6">
                <!-- Tags -->
                <div class="flex flex-wrap gap-2">
                    @foreach($product->tags as $tag)
                    <span class="px-3 py-1 rounded-full bg-white/10 text-white text-sm border border-white/20">{{ $tag->name }}</span>
                    @endforeach
                </div>
                
                <!-- Title -->
                <div>
                    <p class="text-white/60 text-sm mb-1">{{ $product->category->name }} {{ $product->subcategory ? '/ ' . $product->subcategory->name : '' }}</p>
                    <h1 class="text-3xl md:text-4xl font-bold text-white drop-shadow-md">{{ $product->name }}</h1>
                    @if($product->scientific_name)
                    <p class="text-white/50 italic mt-1">{{ $product->scientific_name }}</p>
                    @endif
                </div>
                
                <!-- Rating -->
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-1">
                        @for($i = 1; $i <= 5; $i++)
                        <svg class="w-5 h-5 {{ $i <= floor($product->rating) ? 'text-yellow-400' : 'text-white/20' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        @endfor
                        <span class="text-white font-bold ml-1">{{ $product->rating }}</span>
                    </div>
                    <span class="text-white/60">({{ $product->review_count }} ulasan)</span>
                    <span class="text-white/20">|</span>
                    <span class="text-white font-medium">Terjual {{ $product->sold_count }}+</span>
                </div>
                
                <!-- Price -->
                <div class="p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 shadow-xl">
                    <div class="flex items-baseline gap-3">
                        <span class="text-3xl md:text-4xl font-bold text-white">{{ $product->formatted_price }}</span>
                        @if($product->original_price)
                        <span class="text-xl text-white/40 line-through">{{ format_price($product->original_price) }}</span>
                        <span class="px-3 py-1 rounded-lg bg-red-500/20 text-red-400 text-sm font-bold">-{{ $product->discount_percentage }}%</span>
                        @endif
                    </div>
                    @if($product->stock > 0)
                    <p class="text-lime-400 text-sm mt-2 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Stok tersedia ({{ $product->stock }} unit)
                    </p>
                    @else
                    <p class="text-red-400 text-sm mt-2 font-medium">Stok habis</p>
                    @endif
                </div>
                
                <!-- Specs -->
                <div class="grid grid-cols-2 gap-4">
                    @if($product->size)
                    <div class="p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 shadow-sm">
                        <p class="text-xs text-white/40 mb-1">Ukuran</p>
                        <p class="text-white font-bold">{{ $product->size }}</p>
                    </div>
                    @endif
                    @if($product->age_months)
                    <div class="p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 shadow-sm">
                        <p class="text-xs text-white/40 mb-1">Umur</p>
                        <p class="text-white font-bold">{{ $product->age_months }} bulan</p>
                    </div>
                    @endif
                    @if($product->origin)
                    <div class="p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 shadow-sm">
                        <p class="text-xs text-white/40 mb-1">Asal</p>
                        <p class="text-white font-bold">{{ $product->origin }}</p>
                    </div>
                    @endif
                    @if($product->pot_size)
                    <div class="p-4 bg-white/5 backdrop-blur-sm rounded-xl border border-white/10 shadow-sm">
                        <p class="text-xs text-white/40 mb-1">Ukuran Pot</p>
                        <p class="text-white font-bold">{{ $product->pot_size }}</p>
                    </div>
                    @endif
                </div>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col gap-3">
                    @auth
                    <a href="{{ route('orders.create', $product) }}" class="flex items-center justify-center gap-3 px-8 py-4 bg-white text-emerald-900 hover:bg-lime-50 font-bold rounded-xl text-lg shadow-xl transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Pesan Sekarang
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="flex items-center justify-center gap-3 px-8 py-4 bg-white text-emerald-900 hover:bg-lime-50 font-bold rounded-xl text-lg shadow-xl transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Login untuk Pesan
                    </a>
                    @endauth
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ $product->whatsapp_link }}" target="_blank" class="flex-1 flex items-center justify-center gap-2 px-6 py-3 border-2 border-white/30 hover:border-white text-white font-bold rounded-xl transition-all bg-white/10 backdrop-blur-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                            </svg>
                            WhatsApp
                        </a>
                        <button onclick="toggleWishlist({{ $product->id }})" class="flex-1 px-6 py-3 border-2 border-white/30 hover:border-white text-white font-bold rounded-xl flex items-center justify-center gap-2 bg-white/5 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            Simpan
                        </button>
                    </div>
                </div>
                
                <!-- Additional Info -->
                <div class="flex items-center gap-6 text-sm text-white/70 font-medium">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        Garansi Bibit Berkehidupan
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Pengemasan Aman
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Description Tabs -->
        <div class="mt-16">
            <div class="flex gap-8 border-b border-white/10 mb-8">
                <button onclick="showTab('description')" id="tab-description" class="pb-4 text-white border-b-2 border-white font-bold tracking-wide">Deskripsi</button>
                <button onclick="showTab('care')" id="tab-care" class="pb-4 text-white/50 hover:text-white transition-colors font-medium">Perawatan</button>
                <button onclick="showTab('reviews')" id="tab-reviews" class="pb-4 text-white/50 hover:text-white transition-colors font-medium">Ulasan ({{ $product->review_count }})</button>
            </div>
            
            <div id="content-description" class="space-y-4">
                <div class="prose prose-invert max-w-none text-white/90 leading-relaxed">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>
            
            <div id="content-care" class="hidden space-y-4">
                <div class="prose prose-invert max-w-none text-white/90 leading-relaxed">
                    {!! nl2br(e($product->care_instructions ?? 'Panduan perawatan akan segera ditambahkan.')) !!}
                </div>
            </div>
            
            <div id="content-reviews" class="hidden">
                <p class="text-white/60 italic">Belum ada ulasan untuk produk ini.</p>
            </div>
        </div>
        
        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="mt-20">
            <h2 class="text-2xl font-bold text-white mb-8 border-l-4 border-lime-400 pl-4">Produk Serupa</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                @include('partials.product-card', ['product' => $relatedProduct])
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<script>
function changeImage(src) {
    document.getElementById('main-image').src = src;
}

function showTab(tabName) {
    // Hide all content
    document.querySelectorAll('[id^="content-"]').forEach(el => el.classList.add('hidden'));
    document.getElementById('content-' + tabName).classList.remove('hidden');
    
    // Update tab styles
    document.querySelectorAll('[id^="tab-"]').forEach(el => {
        el.classList.remove('text-white', 'border-b-2', 'border-white', 'font-bold');
        el.classList.add('text-white/50', 'font-medium');
    });
    document.getElementById('tab-' + tabName).classList.remove('text-white/50', 'font-medium');
    document.getElementById('tab-' + tabName).classList.add('text-white', 'border-b-2', 'border-white', 'font-bold');
}
</script>
@endsection
