<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ setting('meta_description', 'Plant Power - Pusat Bibit Tanaman Berkualitas') }}">
    <meta name="keywords" content="{{ setting('meta_keywords', 'bibit tanaman, bibit buah, bibit durian, bibit alpukat') }}">
    
    <title>@yield('title', setting('store_name', 'Plant Power'))</title>
    
    @vite(['resources/css/app.css', 'resources/css/plant-theme.css', 'resources/js/app.js'])
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --broken-white: #F4F1EA;
            --sand-beige: #EBE6DC;
            --sage-dark: #2B3A28;    /* Almost black-green for text */
            --sage-main: #6B8269;    /* Main green */
            --sage-light: #94A692;   /* Muted green for subtitles */
            --accent-warm: #D48C70;  /* Terracotta */
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--broken-white) !important;
            color: var(--sage-dark) !important;
        }
        
        /* Background Overrides */
        .bg-forest-950, .bg-emerald-950, .bg-emerald-900\/50, .bg-emerald-800\/20 { 
            background-color: var(--sand-beige) !important; 
        }
        .bg-forest-900, .bg-emerald-900, .bg-emerald-800 { 
            background-color: var(--sage-main) !important; 
        }
        .bg-lime-500, .bg-green-500, .from-green-500, .to-green-600 { 
            background-color: var(--sage-main) !important; 
            background-image: none !important; /* Remove bright gradients */
        }
        .bg-lime-500\/20 {
            background-color: rgba(107, 130, 105, 0.15) !important;
        }
        
        /* Text Color Overrides */
        /* Mute neon greens for readability on light background, catching opacity variants */
        [class*="text-emerald-100"], [class*="text-emerald-200"], [class*="text-emerald-300"], [class*="text-emerald-400"] { 
            color: var(--sage-light) !important; 
        }
        [class*="text-lime-400"], [class*="text-lime-500"] { 
            color: var(--sage-main) !important; 
        }
        [class*="text-emerald-950"], [class*="text-emerald-900"] { 
            color: var(--sage-dark) !important; 
        }
        [class*="text-yellow-400"], [class*="text-yellow-500"] {
            color: var(--accent-warm) !important;
        }

        /* Border Overrides */
        .border-emerald-500\/30, .border-lime-500\/30, .border-white\/10 { 
            border-color: rgba(43, 58, 40, 0.1) !important; 
        }
        
        /* Fix Gradient Text Bug (Giant Rectangle) */
        .gradient-text {
            color: var(--sage-dark) !important;
            background: none !important;
            -webkit-text-fill-color: initial !important;
            text-shadow: none !important;
        }

        /* Remove Dark Gradients */
        .from-emerald-950, .via-emerald-900, .to-emerald-950, .to-emerald-900 { 
            --tw-gradient-from: transparent !important;
            --tw-gradient-stops: transparent !important;
            --tw-gradient-to: transparent !important;
            background: none !important;
        }
        .bg-gradient-to-b, .bg-gradient-to-t, .bg-gradient-to-r {
            background: none !important;
        }
        
        /* Glassmorphism Overrides */
        .glass, .glass-card, .glass-dark, .glass-light {
            background: rgba(235, 230, 220, 0.7) !important; /* sand-beige */
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6) !important;
            box-shadow: 0 10px 30px rgba(43, 58, 40, 0.05) !important;
            color: var(--sage-dark);
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(43, 58, 40, 0.08), 0 0 20px rgba(107, 130, 105, 0.05) !important;
        }
        
        /* Button Styles */
        .btn-lime {
            background: var(--sage-main) !important;
            color: #FFFFFF !important;
            font-weight: 600;
            border: none !important;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(107, 130, 105, 0.3) !important;
        }
        
        .btn-lime:hover {
            background: var(--sage-dark) !important;
            color: #FFFFFF !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(107, 130, 105, 0.4) !important;
        }
        
        .btn-outline {
            background: transparent !important;
            border: 1px solid var(--sage-main) !important;
            color: var(--sage-main) !important;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: rgba(107, 130, 105, 0.1) !important;
            color: var(--sage-dark) !important;
        }
        
        /* Sections & Backgrounds */
        .section-overlay {
            background: none !important;
        }
        
        .hero-glow, .hero-soft-light, .hero-darken {
            background: none !important;
            pointer-events: none;
        }
        
        .bg-nature {
            background-image: none !important;
            background-color: var(--broken-white) !important;
        }
        
        /* Article Content Styling */
        .article-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--sage-dark) !important;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }
        
        .article-content p, .article-content ul li, .article-content ol li {
            color: var(--sage-dark) !important;
        }
        
        .article-content strong {
            color: var(--sage-dark) !important;
            font-weight: 700;
        }
        
        .bg-nature-overlay, .section-transparent {
            background: transparent !important;
        }
        
        /* Navbar specific */
        .nav-blur, .nav-glass {
            background: rgba(244, 241, 234, 0.95) !important;
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(107, 130, 105, 0.1) !important;
            box-shadow: 0 4px 20px rgba(43, 58, 40, 0.03) !important;
        }
        
        .nav-link {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--sage-dark) !important;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--sage-main) !important;
            background: rgba(107, 130, 105, 0.1) !important;
        }
        
        /* Select dropdown styling */
        select option {
            background: var(--broken-white) !important;
            color: var(--sage-dark) !important;
            padding: 8px 12px;
        }
        
        select option:hover,
        select option:focus,
        select option:checked {
            background: rgba(107, 130, 105, 0.1) !important;
            color: var(--sage-dark) !important;
        }
        
        /* Drop shadow overrides */
        .drop-shadow-2xl, .drop-shadow-lg, .drop-shadow-md {
            filter: drop-shadow(0 4px 6px rgba(43, 58, 40, 0.08)) !important;
        }
    </style>
</head>
<body class="min-h-screen bg-nature">
    
    <!-- Dark Overlay -->
    <div class="fixed inset-0 bg-nature-overlay -z-10"></div>
    
    <!-- Navbar -->
    @include('layouts.navbar')
    
    <!-- Main Content -->
    <main class="relative z-10">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('layouts.footer')
    
    <!-- WhatsApp Floating Button -->
    <a href="{{ whatsapp_link() }}" 
       target="_blank"
       class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:scale-110 flex items-center gap-2">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
        <span class="hidden md:inline font-medium">Chat Admin</span>
    </a>
    
    @stack('scripts')
    
    <script>
        // Dynamic Background Color on Scroll
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            // Limit calculation so we don't go out of bounds
            const maxScroll = Math.max(1, document.body.scrollHeight - window.innerHeight); 
            const scrollProgress = Math.min(1, Math.max(0, scrollY / maxScroll));

            // Start: Broken White #F4F1EA (rgb: 244, 241, 234)
            // Mid: Sand Beige #EBE6DC (rgb: 235, 230, 220)
            // End: Earthy Muted Green #E0E5E0 (rgb: 224, 229, 224)

            let r, g, b;
            if (scrollProgress < 0.5) {
                // Transition from Broken White to Sand Beige
                const p = scrollProgress / 0.5;
                r = Math.round(244 - p * (244 - 235));
                g = Math.round(241 - p * (241 - 230));
                b = Math.round(234 - p * (234 - 220));
            } else {
                // Transition from Sand Beige to Earthy Muted Green
                const p = (scrollProgress - 0.5) / 0.5;
                r = Math.round(235 - p * (235 - 224));
                g = Math.round(230 - p * (230 - 229));
                b = Math.round(220 - p * (220 - 224));
            }
            
            // Override body background dynamically
            document.body.style.setProperty('background-color', `rgb(${r}, ${g}, ${b})`, 'important');
        });
    </script>
</body>
</html>
