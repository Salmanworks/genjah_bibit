<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Login' }} - {{ setting('store_name', 'Genjah Rumah Bibit') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background-color: #F4F1EA;
            min-height: 100vh;
        }

        /* Left panel decorative blobs */
        .blob-1 { background: radial-gradient(circle, rgba(163, 230, 53, 0.35) 0%, transparent 70%); }
        .blob-2 { background: radial-gradient(circle, rgba(52, 211, 153, 0.25) 0%, transparent 70%); }

        /* Organic input styling */
        .auth-input {
            width: 100%;
            padding: 14px 20px 14px 48px;
            border-radius: 999px;
            border: 2px solid rgba(26, 36, 25, 0.08);
            background: white;
            color: #1A2419;
            font-weight: 600;
            font-size: 0.9rem;
            outline: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(26, 36, 25, 0.04);
        }

        .auth-input:focus {
            border-color: #5A7058;
            box-shadow: 0 0 0 4px rgba(90, 112, 88, 0.1), 0 2px 8px rgba(26, 36, 25, 0.04);
        }

        .auth-input::placeholder {
            color: rgba(26, 36, 25, 0.25);
            font-weight: 400;
        }

        .auth-btn {
            width: 100%;
            padding: 15px 20px;
            border-radius: 999px;
            background: #1A2419;
            color: white;
            font-weight: 800;
            font-size: 0.9rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 24px rgba(26, 36, 25, 0.2);
        }

        .auth-btn:hover {
            background: #84cc16;
            color: #1A2419;
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(26, 36, 25, 0.15);
        }

        .left-panel {
            background: #1A2419;
        }

        /* Illustration leaf decorations */
        .leaf-deco {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            pointer-events: none;
        }
    </style>
</head>
<body class="min-h-screen flex">

    <!-- LEFT PANEL: Decorative Brand Side -->
    <div class="left-panel hidden lg:flex lg:w-1/2 relative overflow-hidden flex-col items-center justify-center p-16 text-white">
        <!-- Glowing blobs -->
        <div class="leaf-deco blob-1 w-96 h-96 top-[-10%] left-[-10%] opacity-60"></div>
        <div class="leaf-deco blob-2 w-80 h-80 bottom-[-5%] right-[-5%] opacity-50"></div>
        <div class="leaf-deco blob-1 w-64 h-64 bottom-[20%] left-[10%] opacity-30"></div>

        <!-- Brand Content -->
        <div class="relative z-10 text-center">
            <div class="w-24 h-24 rounded-[28px] overflow-hidden mx-auto mb-8 shadow-2xl ring-4 ring-white/10">
                <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
            </div>

            <h1 class="text-4xl font-black text-white tracking-tight leading-tight mb-4">
                Genjah<br><span class="text-lime-400">Rumah Bibit</span>
            </h1>
            <p class="text-white/50 font-medium text-base max-w-xs leading-relaxed">
                Pusat bibit tanaman unggul bersertifikat untuk kebun impian Anda.
            </p>

            <!-- Feature Badges -->
            <div class="mt-12 space-y-3">
                @foreach([['🌱', 'Bibit Premium Bersertifikat'], ['📦', 'Pengiriman Aman ke Seluruh Indonesia'], ['💬', 'Konsultasi Gratis via WhatsApp']] as $feat)
                <div class="flex items-center gap-3 px-5 py-3 rounded-full bg-white/5 border border-white/10 text-left">
                    <span class="text-lg">{{ $feat[0] }}</span>
                    <span class="text-sm text-white/70 font-medium">{{ $feat[1] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- RIGHT PANEL: Auth Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 relative">
        <!-- Mobile Logo (only on small screens) -->
        <div class="absolute top-6 left-6 flex items-center gap-3 lg:hidden">
            <div class="w-9 h-9 rounded-xl overflow-hidden shadow">
                <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
            </div>
            <span class="text-sm font-black text-emerald-950">Genjah Rumah Bibit</span>
        </div>

        <div class="w-full max-w-sm">
            <!-- Heading -->
            <div class="mb-10">
                <h2 class="text-3xl font-black text-emerald-950 tracking-tight mb-2">@yield('heading', 'Selamat Datang')</h2>
                <p class="text-emerald-900/40 font-medium text-sm">@yield('subheading', 'Masuk ke akun Anda')</p>
            </div>

            @yield('content')

            <!-- Back to home -->
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs text-emerald-900/30 hover:text-emerald-950 transition-colors font-bold uppercase tracking-widest">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

</body>
</html>
