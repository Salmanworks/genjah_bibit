<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ setting('store_name', 'Genjah Rumah Bibit') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-fix.css') }}">
    @fluxAppearance
</head>
<body class="min-h-screen admin-body">
    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 hidden transition-opacity duration-300"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-72 admin-sidebar flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out border-r border-white/5">
        <div class="p-6 border-b border-lime-800 flex-shrink-0">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl overflow-hidden shadow-lg border border-white/10">
                    <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
                <div>
                    <h1 class="text-lg font-bold text-white leading-tight">Admin Panel</h1>
                    <p class="text-[10px] font-black uppercase tracking-widest text-lime-400/60">{{ setting('store_name', 'Genjah') }}</p>
                </div>
            </a>
        </div>
        
        <nav class="p-4 space-y-2 flex-1 overflow-y-auto" style="max-height: calc(100vh - 180px); scrollbar-width: thin; scrollbar-color: rgba(255, 255, 255, 0.3) transparent;">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                <span class="font-semibold text-base">Dashboard</span>
            </a>
            
            <a href="{{ route('admin.products.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.products.*') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <span class="font-semibold text-base">Produk</span>
            </a>
            
            <a href="{{ route('admin.categories.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.categories.*') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                <span class="font-semibold text-base">Kategori</span>
            </a>
            
            <a href="{{ route('admin.orders.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.orders.*') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                <span class="font-semibold text-base">Pesanan</span>
            </a>
            
            <a href="{{ route('admin.users.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.users.*') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <span class="font-semibold text-base">Pengguna</span>
            </a>
            
            <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.testimonials.*') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
                <span class="font-semibold text-base">Testimoni</span>
            </a>
            
            <a href="{{ route('admin.blogs.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.blogs.*') && !request()->routeIs('admin.blogs.create') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <span class="font-semibold text-base">Blog & Artikel</span>
            </a>
            
            <!-- Quick Link: Artikel Baru -->
            <a href="{{ route('admin.blogs.create') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.blogs.create') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span class="font-semibold text-base">Artikel Baru</span>
            </a>
            
            <!-- Edit Footer -->
            <a href="{{ route('admin.settings.footer') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.settings.footer') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                </svg>
                <span class="font-semibold text-base">Edit Footer</span>
            </a>
            
            <a href="{{ route('admin.settings.index') }}" class="sidebar-link flex items-center gap-4 px-5 py-3 rounded-2xl {{ request()->routeIs('admin.settings.*') ? 'active' : 'text-lime-100/60 hover:bg-white/5 hover:text-white' }}">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="font-semibold text-base">Pengaturan</span>
            </a>
        </nav>
        
        <div class="p-6 border-t border-lime-800 flex-shrink-0">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-lime-100 hover:bg-white/5 transition-all group">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="font-bold text-xs uppercase tracking-widest">Ke Website</span>
            </a>
        </div>
    </aside>
    
    <!-- Main Wrapper -->
    <div class="admin-main-wrapper min-h-screen flex flex-col">
        <!-- Header (Sticky) -->
        <header class="admin-header sticky top-0 z-30 py-4 px-4 lg:px-10 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button id="sidebarToggle" class="lg:hidden p-2 text-lime-400 hover:bg-white/5 rounded-xl transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div>
                    <h2 class="text-lg lg:text-xl font-bold text-white tracking-tight">@yield('title', 'Dashboard')</h2>
                    <p class="text-[10px] text-lime-100/40 font-medium hidden sm:block">Administrator: {{ auth()->user()?->name ?? 'Admin' }}</p>
                </div>
            </div>
            
            <div class="flex items-center gap-6 lg:gap-12">
                <div class="flex items-center gap-4 pr-6 border-r border-white/10">
                    <div class="w-11 h-11 rounded-2xl bg-lime-500/10 border border-lime-500/20 flex items-center justify-center text-lime-400 font-bold text-sm shadow-inner">
                        {{ substr(auth()->user()?->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="hidden md:block">
                        <p class="text-sm font-bold text-white leading-none mb-1.5">{{ auth()->user()?->name ?? 'Admin' }}</p>
                        <p class="text-[10px] font-black text-lime-500/60 uppercase tracking-widest">Super Admin</p>
                    </div>
                </div>
                
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="group p-3 text-white/20 hover:text-red-400 transition-all" title="Keluar">
                        <svg class="w-7 h-7 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </header>
        
        <!-- Content -->
        <main class="admin-content flex-1 p-6 lg:px-10 lg:py-10 xl:px-14">
            <div class="max-w-[1240px] mx-auto space-y-10 lg:space-y-12">
                @if(session('success'))
                    <div class="mb-8 admin-alert admin-alert-success animate-fade-up">
                        <svg class="w-5 h-5 text-lime-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="font-bold text-sm">{{ session('success') }}</span>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-8 admin-alert admin-alert-error animate-fade-up">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="font-bold text-sm">{{ session('error') }}</span>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>
        
        <!-- Footer -->
        <footer class="admin-footer mt-auto py-8 px-10">
            <p class="text-center text-[10px] font-bold uppercase tracking-[0.2em] text-white">
                &copy; {{ date('Y') }} {{ setting('store_name', 'Genjah Rumah Bibit') }} &bull; Digital Horticulture Dashboard
            </p>
        </footer>
    </div>
    
    @fluxScripts
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const sidebarToggle = document.getElementById('sidebarToggle');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden'); // Lock background scroll when mobile menu open
            }

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }

            if (overlay) {
                overlay.addEventListener('click', toggleSidebar);
            }
        });
    </script>
</body>
</html>
