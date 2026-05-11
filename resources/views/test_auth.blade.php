<!DOCTYPE html>
<html>
<head>
    <title>Test Auth</title>
    <style>
        body { font-family: monospace; padding: 20px; background: #1a1a1a; color: #fff; }
        .box { background: #2a2a2a; padding: 20px; margin: 10px 0; border-radius: 8px; }
        .success { color: #4ade80; }
        .error { color: #f87171; }
    </style>
</head>
<body>
    <h1>🔍 Test Authentication</h1>
    
    <div class="box">
        <h2>Auth Status:</h2>
        @auth
            <p class="success">✅ User is logged in</p>
            <p>User ID: {{ auth()->id() }}</p>
            <p>Name: {{ auth()->user()->name }}</p>
            <p>Email: {{ auth()->user()->email }}</p>
            <p>Is Admin (raw): {{ var_export(auth()->user()->is_admin, true) }}</p>
            <p>Is Admin (type): {{ gettype(auth()->user()->is_admin) }}</p>
            <p>Is Admin (boolean): {{ auth()->user()->is_admin ? 'YES ✅' : 'NO ❌' }}</p>
            <p>Is Admin (== 1): {{ auth()->user()->is_admin == 1 ? 'YES ✅' : 'NO ❌' }}</p>
            <p>Is Admin (=== true): {{ auth()->user()->is_admin === true ? 'YES ✅' : 'NO ❌' }}</p>
        @else
            <p class="error">❌ User is NOT logged in</p>
        @endauth
    </div>
    
    <div class="box">
        <h2>Button Admin Test:</h2>
        @auth
            @if(auth()->user()->is_admin == 1 || auth()->user()->is_admin === true)
                <p class="success">✅ BUTTON ADMIN AKAN MUNCUL</p>
            @else
                <p class="error">❌ BUTTON ADMIN TIDAK AKAN MUNCUL</p>
            @endif
        @else
            <p class="error">❌ Not logged in</p>
        @endauth
    </div>
    
    <div class="box">
        <h2>Actions:</h2>
        <p><a href="{{ route('home') }}" style="color: #4ade80;">← Back to Home</a></p>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background: #f87171; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Logout</button>
            </form>
        @else
            <p><a href="{{ route('login') }}" style="color: #4ade80;">Login →</a></p>
        @endauth
    </div>
</body>
</html>
