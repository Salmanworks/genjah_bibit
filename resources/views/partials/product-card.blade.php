<div class="glass-card rounded-[40px] overflow-hidden card-hover group relative flex flex-col h-full border-white/10 shadow-xl">
    <!-- Full Card Clickable Link -->
    <a href="{{ route('products.show', $product->slug) }}" class="absolute inset-0 z-10"></a>

    <!-- Image -->
    <div class="relative aspect-square overflow-hidden mx-3 mt-3 rounded-[32px]">
        <img src="{{ asset('storage/' . $product->main_image) }}" 
             alt="{{ $product->name }}" 
             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        
        <!-- Tags -->
        <div class="absolute top-3 left-3 flex flex-wrap gap-2 z-20 pointer-events-none">
            @foreach($product->tags->take(2) as $tag)
            <span class="px-3 py-1 rounded-full bg-white/90 backdrop-blur-sm text-[10px] font-bold text-emerald-900 border border-emerald-900/10 uppercase tracking-wider shadow-sm">
                {{ $tag->name }}
            </span>
            @endforeach
        </div>
        
        <!-- Wishlist Button -->
        <button onclick="toggleWishlist({{ $product->id }})" class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/50 backdrop-blur-sm flex items-center justify-center text-emerald-950 hover:bg-emerald-950 hover:text-white transition-all duration-300 z-20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
        </button>
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-transparent to-transparent opacity-60 pointer-events-none"></div>
    </div>
    
    <!-- Content -->
    <div class="p-5 flex flex-col flex-1">
        <!-- Category -->
        <p class="text-xs text-emerald-950/70 mb-1 font-medium">{{ $product->category->name }}</p>
        
        <!-- Name -->
        <h3 class="font-bold text-emerald-950 mb-2 line-clamp-2 group-hover:text-lime-500 transition-colors">
            {{ $product->name }}
        </h3>
        
        <!-- Rating -->
        <div class="flex items-center gap-2 mb-3 mt-auto">
            <div class="flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-emerald-900/5 border border-emerald-900/5">
                <svg class="w-3.5 h-3.5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span class="text-xs font-bold text-emerald-950">{{ $product->rating }}</span>
            </div>
            <span class="text-[11px] text-emerald-950/60 font-medium">Terjual {{ $product->sold_count }}+</span>
        </div>
        
        <!-- Price -->
        <div class="mb-5">
            <p class="text-xl font-extrabold text-emerald-950 leading-none mb-1">{{ $product->formatted_price }}</p>
            @if($product->original_price)
            <p class="text-sm text-emerald-950/40 line-through">{{ format_price($product->original_price) }}</p>
            @endif
        </div>
        
        <!-- CTA Button -->
        <a href="{{ $product->whatsapp_link }}" target="_blank" class="relative z-20 flex items-center justify-center gap-2 w-full py-3 bg-lime-500 hover:bg-lime-400 text-white font-bold rounded-full transition-all duration-300 shadow-lg shadow-lime-500/20">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
            </svg>
            <span>Pesan</span>
        </a>
    </div>
</div>

<script>
function toggleWishlist(productId) {
    // Implementation for wishlist toggle
    console.log('Toggle wishlist for product:', productId);
    event.stopPropagation();
}
</script>
