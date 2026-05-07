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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background-image: url('/images/nature1.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .page-overlay {
            position: fixed;
            inset: 0;
            background: rgba(6, 78, 59, 0.95);
            z-index: 1;
        }

        .auth-card {
            width: 100%;
            max-width: 320px;
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 10;
            padding: 32px 24px;
            text-align: center;
        }

        .auth-input {
            width: 100%;
            padding: 10px 16px;
            border-radius: 10px;
            border: 1.5px solid #eee;
            background: #fdfdfd;
            color: #1A2419;
            font-weight: 600;
            font-size: 0.8rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .auth-input:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .auth-btn {
            width: 100%;
            padding: 11px 20px;
            border-radius: 10px;
            background: #1A2419;
            color: #ffffff;
            font-weight: 800;
            font-size: 0.85rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 8px;
        }

        .auth-btn:hover {
            background: #84cc16;
            color: #1A2419;
        }

        .logo-small {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            margin: 0 auto 16px;
            display: block;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        /* Password Toggle Styles */
        .password-container {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #ccc;
            transition: color 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            background: none;
            border: none;
            padding: 0;
        }
        .password-toggle:hover { color: #1A2419; }
    </style>
</head>
<body>
    <div class="page-overlay"></div>

    <div class="auth-card">
        <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="logo-small">
        
        <h3 class="text-lg font-black text-emerald-950 tracking-tight mb-1">@yield('heading')</h3>
        <p class="text-[10px] font-bold text-emerald-900/40 uppercase tracking-widest mb-6">@yield('subheading')</p>

        @yield('content')

        <div class="mt-8">
            <a href="{{ route('home') }}" class="text-[9px] font-black text-emerald-950/30 hover:text-emerald-950 uppercase tracking-widest flex items-center justify-center gap-1">
                ← Ke Beranda
            </a>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>';
            } else {
                input.type = 'password';
                icon.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>';
            }
        }
    </script>
</body>
</html>
