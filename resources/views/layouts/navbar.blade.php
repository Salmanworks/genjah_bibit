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
                    @if(auth()->user()->is_admin == 1 || auth()->user()->is_admin === true)
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">
                        Dashboard
                    </a>
                    @endif
                @endauth
            </div>
            
            <!-- Right Side -->
            <div class="flex items-center gap-4">
                <!-- Search -->
                <button onclick="toggleSearch()" class="p-2.5 rounded-full bg-emerald-900 text-white hover:bg-lime-500 shadow-sm transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
                
                <!-- Language Translate -->
                <div class="relative language-dropdown">
                    <button onclick="toggleLanguageMenu()" class="p-2.5 rounded-full bg-emerald-900 text-white hover:bg-lime-500 shadow-sm transition-all duration-300 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                    </button>
                    
                    <!-- Language Dropdown Menu -->
                    <div id="language-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-emerald-950/10 overflow-hidden z-50">
                        <div class="p-2">
                            <button onclick="translatePage('id')" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-50 transition-colors group">
                                <span class="text-xl">🇮🇩</span>
                                <span class="text-sm font-semibold text-emerald-950">Indonesia</span>
                            </button>
                            <button onclick="translatePage('en')" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-50 transition-colors group">
                                <span class="text-xl">🇬🇧</span>
                                <span class="text-sm font-semibold text-emerald-950">English</span>
                            </button>
                            <button onclick="translatePage('zh-CN')" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-50 transition-colors group">
                                <span class="text-xl">🇨🇳</span>
                                <span class="text-sm font-semibold text-emerald-950">中文</span>
                            </button>
                            <button onclick="translatePage('ja')" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-50 transition-colors group">
                                <span class="text-xl">🇯🇵</span>
                                <span class="text-sm font-semibold text-emerald-950">日本語</span>
                            </button>
                            <button onclick="translatePage('ko')" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-50 transition-colors group">
                                <span class="text-xl">🇰🇷</span>
                                <span class="text-sm font-semibold text-emerald-950">한국어</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                @auth
                <!-- Admin Link - Hanya untuk user dengan is_admin = true -->
                {{-- Debug: User ID = {{ auth()->id() }}, Is Admin = {{ auth()->user()->is_admin ? 'YES' : 'NO' }} --}}
                @if(auth()->user()->is_admin == 1 || auth()->user()->is_admin === true)
                <a href="{{ route('admin.dashboard') }}" class="hidden md:flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-950/5 hover:bg-emerald-500/20 text-emerald-950 hover:text-emerald-800 text-sm font-medium transition-all duration-300 border border-emerald-950/10 hover:border-emerald-400/30">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Admin</span>
                </a>
                @endif
                
                <!-- WhatsApp CTA dengan auto-fill data user -->
                @php
                    $waNumber = setting('whatsapp_number', '6281234567890');
                    $waMessage = "Halo, saya " . auth()->user()->name . " (" . auth()->user()->email . "). Saya ingin bertanya tentang produk bibit tanaman.";
                    $waLink = "https://wa.me/{$waNumber}?text=" . urlencode($waMessage);
                @endphp
                <a href="{{ $waLink }}" target="_blank" class="hidden md:flex items-center gap-2 px-6 py-2.5 btn-lime rounded-full text-sm">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884"/>
                    </svg>
                    <span>Pesan</span>
                </a>
                
                <!-- Profile Icon dengan Dropdown -->
                <div class="relative profile-dropdown">
                    <button onclick="toggleProfileMenu()" class="p-2.5 rounded-full bg-emerald-900 text-white hover:bg-lime-500 hover:text-emerald-950 shadow-sm transition-all duration-300 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div id="profile-menu" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-xl border border-emerald-950/10 overflow-hidden z-50">
                        <div class="p-4 bg-gradient-to-br from-emerald-50 to-lime-50 border-b border-emerald-950/10">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-full bg-emerald-900 text-white flex items-center justify-center font-bold text-lg">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-emerald-950 truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-emerald-950/60 truncate">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-2">
                            <a href="{{ route('orders.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-emerald-50 transition-colors group">
                                <svg class="w-5 h-5 text-emerald-900/60 group-hover:text-emerald-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                <span class="text-sm font-semibold text-emerald-950">Pesanan Saya</span>
                            </a>
                            
                            <div class="my-2 border-t border-emerald-950/10"></div>
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-red-50 transition-colors group">
                                    <svg class="w-5 h-5 text-red-600/60 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    <span class="text-sm font-semibold text-red-600">Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <!-- Guest: Sign In & Sign Up CTAs -->
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full text-sm font-bold text-emerald-950 border border-emerald-950/20 hover:bg-emerald-950/5 transition-all duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-full text-sm font-bold bg-emerald-950 text-white hover:bg-lime-500 hover:text-emerald-950 transition-all duration-300 shadow-lg shadow-emerald-950/20">
                        Daftar
                    </a>
                </div>
                @endauth
                
                <!-- Mobile Menu Button -->
                <button onclick="toggleMobileMenu()" class="lg:hidden p-2.5 rounded-full bg-emerald-900 text-white hover:bg-lime-500 shadow-sm transition-all duration-300">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Search Overlay (Inline on Page) -->
    <div id="search-overlay" class="hidden fixed top-20 left-0 right-0 z-40 bg-white shadow-xl border-b-2 border-emerald-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="max-w-2xl mx-auto">
                <!-- Search Header -->
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-sm font-semibold text-emerald-900">Cari Bibit</h3>
                    <button onclick="closeSearch()" class="p-1.5 rounded-full hover:bg-emerald-100 transition-colors">
                        <svg class="w-4 h-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Search Input -->
                <div class="relative mb-3">
                    <input type="text" 
                           id="search-input"
                           placeholder="Mau cari bibit apa hari ini?" 
                           autocomplete="off"
                           class="w-full px-4 py-2.5 pr-12 bg-emerald-50 border-2 border-emerald-300 rounded-xl text-emerald-900 text-sm font-medium placeholder-emerald-500 focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-all">
                    <button type="button" class="absolute right-1.5 top-1/2 -translate-y-1/2 w-9 h-9 rounded-lg bg-emerald-700 hover:bg-emerald-600 text-white flex items-center justify-center pointer-events-none transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>

                <!-- Search Results -->
                <div id="search-results" class="hidden mb-3">
                    <div class="flex items-center justify-between mb-2 px-1">
                        <span class="text-xs font-semibold text-emerald-900">Hasil Pencarian</span>
                        <span id="result-count" class="text-xs text-emerald-700"></span>
                    </div>
                    <div id="results-container" class="space-y-1.5 max-h-80 overflow-y-auto">
                        <!-- Results will be inserted here -->
                    </div>
                </div>

                <!-- Loading State -->
                <div id="search-loading" class="hidden text-center py-6">
                    <div class="inline-block animate-spin rounded-full h-6 w-6 border-3 border-emerald-300 border-t-emerald-700"></div>
                    <p class="text-xs text-emerald-700 mt-2 font-medium">Mencari...</p>
                </div>

                <!-- Empty State -->
                <div id="search-empty" class="hidden text-center py-6">
                    <svg class="w-12 h-12 mx-auto text-emerald-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs font-medium text-emerald-700">Tidak ada hasil ditemukan</p>
                </div>

                <!-- Popular Searches -->
                <div id="popular-searches" class="space-y-2">
                    <span class="text-[10px] font-semibold text-emerald-700 uppercase tracking-wide block px-1">Populer:</span>
                    <div class="flex flex-wrap gap-1.5">
                        <button onclick="quickSearch('durian')" class="px-3 py-1.5 rounded-lg bg-emerald-100 border border-emerald-300 text-emerald-800 font-medium text-xs hover:bg-emerald-700 hover:text-white hover:border-emerald-700 transition-all">Durian</button>
                        <button onclick="quickSearch('alpukat')" class="px-3 py-1.5 rounded-lg bg-emerald-100 border border-emerald-300 text-emerald-800 font-medium text-xs hover:bg-emerald-700 hover:text-white hover:border-emerald-700 transition-all">Alpukat</button>
                        <button onclick="quickSearch('mangga')" class="px-3 py-1.5 rounded-lg bg-emerald-100 border border-emerald-300 text-emerald-800 font-medium text-xs hover:bg-emerald-700 hover:text-white hover:border-emerald-700 transition-all">Mangga</button>
                        <button onclick="quickSearch('jeruk')" class="px-3 py-1.5 rounded-lg bg-emerald-100 border border-emerald-300 text-emerald-800 font-medium text-xs hover:bg-emerald-700 hover:text-white hover:border-emerald-700 transition-all">Jeruk</button>
                    </div>
                </div>
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
                
                @auth
                <a href="{{ whatsapp_link() }}" target="_blank" class="mt-4 px-8 py-3 btn-lime rounded-full text-lg">
                    Pesan via WhatsApp
                </a>
                @else
                <!-- Guest Auth Buttons for Mobile -->
                <div class="flex flex-col items-center gap-3 mt-4 w-full px-12">
                    <a href="{{ route('login') }}" class="w-full text-center px-8 py-3.5 rounded-full text-base font-bold text-emerald-950 border-2 border-emerald-950/20 hover:bg-emerald-950/5 transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="w-full text-center px-8 py-3.5 rounded-full text-base font-bold bg-emerald-950 text-white hover:bg-lime-500 hover:text-emerald-950 transition-all shadow-xl shadow-emerald-950/20">
                        Daftar Sekarang
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const navbarBg = document.getElementById('navbar-bg');

    // Check if current page has a dark hero section
    const hasDarkHero = document.querySelector('[data-dark-hero]') !== null;

    function updateNavbar() {
        const scrolled = window.scrollY > 50;

        if (scrolled) {
            // Scrolled: show light background, dark text
            navbarBg.classList.remove('opacity-0');
            navbarBg.classList.add('opacity-100', 'nav-glass');
            navbar.classList.remove('navbar-on-dark');
        } else if (hasDarkHero) {
            // At top on dark hero: show semi-dark background, light text
            navbarBg.classList.remove('opacity-0');
            navbarBg.classList.add('opacity-100');
            navbarBg.classList.remove('nav-glass');
            navbar.classList.add('navbar-on-dark');
        } else {
            // At top on light page: fully transparent
            navbarBg.classList.add('opacity-0');
            navbarBg.classList.remove('opacity-100', 'nav-glass');
            navbar.classList.remove('navbar-on-dark');
        }
    }

    // Run on load
    updateNavbar();
    
    window.addEventListener('scroll', updateNavbar);
    
    // Search toggle - show/hide inline overlay
    function toggleSearch() {
        const overlay = document.getElementById('search-overlay');
        const searchInput = document.getElementById('search-input');
        
        overlay.classList.toggle('hidden');
        
        if (!overlay.classList.contains('hidden')) {
            searchInput.focus();
            // Reset search state
            document.getElementById('search-results').classList.add('hidden');
            document.getElementById('search-loading').classList.add('hidden');
            document.getElementById('search-empty').classList.add('hidden');
            document.getElementById('popular-searches').classList.remove('hidden');
            searchInput.value = '';
        }
    }
    
    // Close search overlay
    function closeSearch() {
        document.getElementById('search-overlay').classList.add('hidden');
    }
    
    // Search functionality with AJAX
    let searchTimeout;
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const searchLoading = document.getElementById('search-loading');
    const searchEmpty = document.getElementById('search-empty');
    const popularSearches = document.getElementById('popular-searches');
    const resultsContainer = document.getElementById('results-container');
    const resultCount = document.getElementById('result-count');

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value.trim();
            
            // Clear previous timeout
            clearTimeout(searchTimeout);
            
            // Hide all states
            searchResults.classList.add('hidden');
            searchLoading.classList.add('hidden');
            searchEmpty.classList.add('hidden');
            popularSearches.classList.remove('hidden');
            
            // If query is empty or too short, show popular searches
            if (query.length < 2) {
                return;
            }
            
            // Show loading
            searchLoading.classList.remove('hidden');
            popularSearches.classList.add('hidden');
            
            // Debounce search
            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });
        
        // Handle Enter key
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = e.target.value.trim();
                if (query.length >= 2) {
                    performSearch(query);
                }
            }
        });
    }
    
    function performSearch(query) {
        fetch(`/api/search?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                searchLoading.classList.add('hidden');
                
                if (data.success && data.products.length > 0) {
                    // Show results
                    searchResults.classList.remove('hidden');
                    searchEmpty.classList.add('hidden');
                    popularSearches.classList.add('hidden');
                    
                    // Update count
                    resultCount.textContent = `${data.count} produk ditemukan`;
                    
                    // Render results
                    resultsContainer.innerHTML = data.products.map(product => `
                        <a href="${product.url}" class="flex items-center gap-3 p-2.5 rounded-lg bg-white hover:bg-emerald-50 transition-colors group border-2 border-emerald-200 hover:border-emerald-400">
                            <div class="w-12 h-12 rounded-lg overflow-hidden bg-emerald-100 flex-shrink-0 border-2 border-emerald-300">
                                <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-emerald-900 text-xs truncate group-hover:text-emerald-700 transition-colors">${product.name}</h4>
                                <p class="text-[10px] text-emerald-700 truncate">${product.category}</p>
                                <p class="text-xs font-bold text-emerald-800 mt-0.5">${product.formatted_price}</p>
                            </div>
                            <div class="flex-shrink-0">
                                ${product.in_stock 
                                    ? '<span class="text-[10px] font-semibold text-emerald-700 bg-emerald-100 px-2 py-1 rounded-full border border-emerald-300">Tersedia</span>' 
                                    : '<span class="text-[10px] font-semibold text-red-700 bg-red-100 px-2 py-1 rounded-full border border-red-300">Habis</span>'
                                }
                            </div>
                        </a>
                    `).join('');
                } else {
                    // Show empty state
                    searchResults.classList.add('hidden');
                    searchEmpty.classList.remove('hidden');
                    popularSearches.classList.add('hidden');
                }
            })
            .catch(error => {
                console.error('Search error:', error);
                searchLoading.classList.add('hidden');
                searchEmpty.classList.remove('hidden');
                popularSearches.classList.add('hidden');
            });
    }
    
    // Quick search function
    function quickSearch(term) {
        const searchInput = document.getElementById('search-input');
        if (searchInput) {
            searchInput.value = term;
            searchInput.focus();
            performSearch(term);
        }
    }
    
    // Mobile menu toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }
    
    // Profile menu toggle
    function toggleProfileMenu() {
        const menu = document.getElementById('profile-menu');
        menu.classList.toggle('hidden');
    }
    
    // Language menu toggle
    function toggleLanguageMenu() {
        const menu = document.getElementById('language-menu');
        menu.classList.toggle('hidden');
    }
    
    // Translate page function using Google Translate
    function translatePage(lang) {
        // Close the language menu
        document.getElementById('language-menu').classList.add('hidden');
        
        // If Indonesian (original language), reload page
        if (lang === 'id') {
            // Remove Google Translate cookie and reload
            document.cookie = 'googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            window.location.reload();
            return;
        }
        
        // Set Google Translate cookie
        document.cookie = `googtrans=/id/${lang}; path=/`;
        
        // Check if Google Translate is already loaded
        if (typeof google !== 'undefined' && google.translate) {
            // Trigger translation
            const select = document.querySelector('.goog-te-combo');
            if (select) {
                select.value = lang;
                select.dispatchEvent(new Event('change'));
            }
        } else {
            // Load Google Translate script
            const script = document.createElement('script');
            script.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
            document.body.appendChild(script);
            
            // Initialize Google Translate
            window.googleTranslateElementInit = function() {
                new google.translate.TranslateElement({
                    pageLanguage: 'id',
                    includedLanguages: 'en,zh-CN,ja,ko',
                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                    autoDisplay: false
                }, 'google_translate_element');
                
                // Auto-select language after initialization
                setTimeout(() => {
                    const select = document.querySelector('.goog-te-combo');
                    if (select) {
                        select.value = lang;
                        select.dispatchEvent(new Event('change'));
                    }
                }, 500);
            };
        }
    }
    
    // Close profile and language menu when clicking outside
    document.addEventListener('click', function(e) {
        const profileDropdown = document.querySelector('.profile-dropdown');
        const profileMenu = document.getElementById('profile-menu');
        const languageDropdown = document.querySelector('.language-dropdown');
        const languageMenu = document.getElementById('language-menu');
        
        if (profileDropdown && !profileDropdown.contains(e.target)) {
            profileMenu?.classList.add('hidden');
        }
        
        if (languageDropdown && !languageDropdown.contains(e.target)) {
            languageMenu?.classList.add('hidden');
        }
    });
    
    // ESC key to close search, profile menu, and language menu
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.getElementById('search-overlay').classList.add('hidden');
            document.getElementById('mobile-menu').classList.add('hidden');
            document.getElementById('profile-menu')?.classList.add('hidden');
            document.getElementById('language-menu')?.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
</script>

<!-- Hidden Google Translate Element -->
<div id="google_translate_element" style="display:none;"></div>

<!-- Hide Google Translate Banner -->
<style>
.goog-te-banner-frame.skiptranslate {
    display: none !important;
}
body {
    top: 0px !important;
}
.goog-te-gadget {
    display: none !important;
}
</style>
