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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        body {
            background-image: url('/images/hero-bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .glass-card {
            background: rgba(6, 78, 59, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(52, 211, 153, 0.3);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(52, 211, 153, 0.3);
            transition: all 0.3s ease;
            color: white;
        }
        
        .input-field:focus {
            border-color: rgba(163, 230, 53, 0.8);
            box-shadow: 0 0 0 3px rgba(163, 230, 53, 0.2);
            background: rgba(255, 255, 255, 0.15);
        }
        
        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #a3e635 0%, #22c55e 100%);
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(163, 230, 53, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(163, 230, 53, 0.4);
        }
        
        .text-shadow {
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 relative">
    <!-- Gradient Overlay -->
    <div class="fixed inset-0 bg-gradient-to-br from-emerald-900/90 via-emerald-800/85 to-black/90 -z-10"></div>
    
    <!-- Content -->
    <div class="w-full max-w-md">
        <div class="glass-card rounded-2xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 rounded-xl overflow-hidden mx-auto mb-4 shadow-lg ring-2 ring-emerald-400/30">
                    <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="w-full h-full object-cover">
                </div>
                <h1 class="text-2xl font-bold text-white text-shadow">{{ setting('store_name', 'Genjah Rumah Bibit') }}</h1>
                <p class="text-emerald-200/80 text-sm mt-1">{{ setting('store_tagline', 'Pusat Bibit Tanaman Berkualitas') }}</p>
            </div>
            
            @yield('content')
        </div>
    </div>
</body>
</html>
