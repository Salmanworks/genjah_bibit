<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-500">
    <!-- Glass Background Layer -->
    <div id="navbar-bg" class="absolute inset-0 transition-all duration-500 opacity-0 -z-10"></div>
    <!-- Content Layer -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl overflow-hidden shadow-lg group-hover:shadow-lime-500/30 transition-all duration-300">
                    <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-emerald-950">{{ setting('store_name', 'Genjah Rumah Bibit') }}</h1>
                    <p class="text-xs text-emerald-950/70">{{ setting('store_tagline', 'Pusat Bibit Tanaman Berkualitas') }}</p>
                </div>
            </a>
            
            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-1 bg-emerald-950/5 backdrop-blur-xl rounded-full px-2 py-2 border border-emerald-950/10">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('products.index') }}" class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                    Produk
                </a>
                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    Kategori
                </a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                    Tentang
                </a>
                <a href="{{ route('blog.index') }}" class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}">
                    Blog
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Kontak
                </a>
                @auth
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                    Dashboard
                </a>
                @endauth
            </div>
            
            <!-- Right Side -->
            <div class="flex items-center gap-4">
                <!-- Search -->
                <button onclick="toggleSearch()" class="p-2.5 rounded-full bg-emerald-950/5 hover:bg-lime-500/20 text-emerald-950 hover:text-emerald-800 transition-all duration-300 border border-emerald-950/10 hover:border-lime-400/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
                
                <!-- Wishlist -->
                <a href="{{ route('wishlist') }}" class="p-2.5 rounded-full bg-emerald-950/5 hover:bg-pink-500/20 text-emerald-950 hover:text-pink-600 transition-all duration-300 border border-emerald-950/10 hover:border-pink-400/30 relative group">
                    <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span id="wishlist-count" class="absolute -top-1 -right-1 w-4 h-4 bg-gradient-to-br from-pink-400 to-pink-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center hidden shadow-lg shadow-pink-500/30">0</span>
                </a>
                
                @auth
                <!-- Admin Link -->
                <a href="{{ route('admin.dashboard') }}" class="hidden md:flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-950/5 hover:bg-emerald-500/20 text-emerald-950 hover:text-emerald-800 text-sm font-medium transition-all duration-300 border border-emerald-950/10 hover:border-emerald-400/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Admin</span>
                </a>
                @endauth
                
                <!-- WhatsApp CTA -->
                <a href="{{ whatsapp_link() }}" target="_blank" class="hidden md:flex items-center gap-2 px-6 py-2.5 btn-lime rounded-full text-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                    </svg>
                    <span>Pesan</span>
                </a>
                
                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden p-2 text-emerald-950">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Search Modal -->
    <div id="search-modal" class="fixed inset-0 z-[100] hidden">
        <div class="absolute inset-0 bg-white/80 backdrop-blur-xl transition-opacity" onclick="toggleSearch()"></div>
        <div class="relative flex items-start justify-center pt-32 p-4">
            <div class="w-full max-w-2xl animate-in slide-in-from-top-4 duration-300">
                <form action="{{ route('products.index') }}" method="GET" class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-lime-500 via-emerald-500 to-lime-500 rounded-2xl blur opacity-20 group-hover:opacity-30 transition duration-500"></div>
                    <div class="relative">
                        <input type="text" name="search" placeholder="Cari bibit durian, alpukat, mangga..." 
                               class="w-full px-6 py-5 pr-14 bg-white/90 border border-emerald-900/10 rounded-2xl text-emerald-950 placeholder-emerald-950/40 focus:outline-none focus:border-lime-500/50 focus:ring-1 focus:ring-lime-500/20 text-lg shadow-2xl">
                        <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 p-3 rounded-xl bg-lime-500/10 text-lime-400 hover:bg-lime-500 hover:text-emerald-950 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </div>
                </form>
                <!-- Quick Search Tags -->
                <div class="mt-6 flex flex-wrap gap-2 justify-center">
                    <span class="text-emerald-950/60 text-sm">Pencarian populer:</span>
                    <button onclick="quickSearch('durian')" class="px-3 py-1 rounded-full bg-emerald-950/5 hover:bg-lime-500/20 text-emerald-950/80 hover:text-emerald-950 text-sm transition-all border border-emerald-950/10 hover:border-lime-500/30">Durian</button>
                    <button onclick="quickSearch('alpukat')" class="px-3 py-1 rounded-full bg-emerald-950/5 hover:bg-lime-500/20 text-emerald-950/80 hover:text-emerald-950 text-sm transition-all border border-emerald-950/10 hover:border-lime-500/30">Alpukat</button>
                    <button onclick="quickSearch('mangga')" class="px-3 py-1 rounded-full bg-emerald-950/5 hover:bg-lime-500/20 text-emerald-950/80 hover:text-emerald-950 text-sm transition-all border border-emerald-950/10 hover:border-lime-500/30">Mangga</button>
                    <button onclick="quickSearch('jeruk')" class="px-3 py-1 rounded-full bg-emerald-950/5 hover:bg-lime-500/20 text-emerald-950/80 hover:text-emerald-950 text-sm transition-all border border-emerald-950/10 hover:border-lime-500/30">Jeruk</button>
                </div>
                <p class="mt-6 text-center text-emerald-950/50 text-xs tracking-wide">Tekan <kbd class="px-2 py-1 bg-emerald-950/10 rounded text-emerald-950/70">ESC</kbd> untuk menutup</p>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden fixed inset-0 z-40 hidden">
        <div class="absolute inset-0 bg-white/95 backdrop-blur-xl">
            <div class="flex flex-col items-center justify-center h-full gap-6">
                <a href="{{ route('home') }}" class="text-2xl font-medium text-emerald-950 hover:text-emerald-800 transition-colors">Beranda</a>
                <a href="{{ route('products.index') }}" class="text-2xl font-medium text-emerald-950 hover:text-emerald-800 transition-colors">Produk</a>
                <a href="{{ route('categories.index') }}" class="text-2xl font-medium text-emerald-950 hover:text-emerald-800 transition-colors">Kategori</a>
                <a href="{{ route('about') }}" class="text-2xl font-medium text-emerald-950 hover:text-emerald-800 transition-colors">Tentang Kami</a>
                <a href="{{ route('blog.index') }}" class="text-2xl font-medium text-emerald-950 hover:text-emerald-800 transition-colors">Blog</a>
                <a href="{{ route('contact') }}" class="text-2xl font-medium text-emerald-950 hover:text-emerald-800 transition-colors">Kontak</a>
                <a href="{{ whatsapp_link() }}" target="_blank" class="mt-4 px-8 py-3 btn-lime rounded-full text-lg">
                    Pesan via WhatsApp
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const navbarBg = document.getElementById('navbar-bg');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbarBg.classList.remove('opacity-0');
            navbarBg.classList.add('opacity-100', 'nav-glass');
        } else {
            navbarBg.classList.add('opacity-0');
            navbarBg.classList.remove('opacity-100', 'nav-glass');
        }
    });
    
    // Quick search function
    function quickSearch(term) {
        const input = document.querySelector('#search-modal input[name="search"]');
        input.value = term;
        input.closest('form').submit();
    }
    
    // Search toggle
    function toggleSearch() {
        const modal = document.getElementById('search-modal');
        modal.classList.toggle('hidden');
        if (!modal.classList.contains('hidden')) {
            modal.querySelector('input').focus();
        }
    }
    
    // Mobile menu toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }
    
    // ESC key to close search
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.getElementById('search-modal').classList.add('hidden');
            document.getElementById('mobile-menu').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
</script>
