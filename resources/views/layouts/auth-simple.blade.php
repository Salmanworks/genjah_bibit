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
            background: #f4f1ea;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Background decorations matching website */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(61,92,56,0.04) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
            z-index: 0;
        }

        body::after {
            content: '';
            position: fixed;
            top: 10%;
            right: 8%;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(197,232,122,0.12) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .page-overlay {
            position: fixed;
            bottom: 10%;
            left: 5%;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(61,92,56,0.08) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 10;
            padding: 40px 36px;
            text-align: center;
            border: 1px solid rgba(61,92,56,0.08);
        }

        .auth-input {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 1.5px solid rgba(26,36,25,0.12);
            background: #f4f1ea;
            color: #1A2419;
            font-weight: 600;
            font-size: 0.875rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .auth-input:focus {
            border-color: #3d5c38;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(61,92,56,0.08);
        }

        .auth-btn {
            width: 100%;
            padding: 13px 20px;
            border-radius: 10px;
            background: #3d5c38;
            color: #ffffff;
            font-weight: 800;
            font-size: 0.875rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 8px;
            letter-spacing: 0.04em;
        }

        .auth-btn:hover {
            background: #2d4428;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(61,92,56,0.3);
        }

        .google-btn {
            width: 100%;
            padding: 13px 20px;
            border-radius: 10px;
            background: #ffffff;
            color: #1A2419;
            font-weight: 700;
            font-size: 0.875rem;
            border: 1.5px solid rgba(26,36,25,0.12);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
        }

        .google-btn:hover {
            border-color: #3d5c38;
            background: #f4f1ea;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(26,36,25,0.1);
        }

        .divider span {
            padding: 0 12px;
            font-size: 11px;
            font-weight: 700;
            color: rgba(26,36,25,0.4);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .logo-small {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            margin: 0 auto 20px;
            display: block;
            object-fit: cover;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            border: 3px solid #f4f1ea;
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
        .password-toggle:hover { color: #3d5c38; }
    </style>
</head>
<body>
    <div class="page-overlay"></div>

    <div class="auth-card">
        <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="logo-small">
        
        <h3 style="font-size:1.5rem; font-weight:900; color:#1a2419; letter-spacing:-0.02em; margin-bottom:6px;">@yield('heading')</h3>
        <p style="font-size:0.8125rem; font-weight:600; color:rgba(26,36,25,0.5); margin-bottom:28px;">@yield('subheading')</p>

        @yield('content')

        <div style="margin-top:28px; padding-top:20px; border-top:1px solid rgba(26,36,25,0.08);">
            <a href="{{ route('home') }}" style="font-size:12px; font-weight:700; color:rgba(26,36,25,0.4); text-decoration:none; display:inline-flex; align-items:center; gap:6px; letter-spacing:0.04em; transition:color 0.2s;">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Ke Beranda
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
