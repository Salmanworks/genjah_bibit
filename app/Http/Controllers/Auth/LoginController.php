<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function create()
    {
        return view('pages.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        // Redirect berdasarkan checkbox admin_access DAN status is_admin user
        if ($request->has('admin_access') && Auth::user()->is_admin) {
            // User adalah admin DAN centang checkbox admin
            return redirect()->intended(route('admin.dashboard'));
        }

        // Default redirect ke home (untuk customer biasa atau admin yang tidak centang checkbox)
        return redirect()->intended(route('home'));
    }

    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->redirect();
    }

    /**
     * Handle Google OAuth callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->stateless()
                ->user();
            
            // Find or create user
            $user = User::where('email', $googleUser->getEmail())->first();
            
            if (!$user) {
                // Create new user (NOT admin by default)
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(Str::random(24)), // Random password
                    'email_verified_at' => now(), // Auto-verify email for Google users
                    'google_id' => $googleUser->getId(),
                    'is_admin' => false, // Explicitly set as non-admin
                ]);
            } else {
                // Update google_id if not set
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->getId()]);
                }
            }
            
            // Login the user (always redirect to home, not admin)
            Auth::login($user, true);
            
            return redirect()->route('home');
            
        } catch (\Exception $e) {
            // Log error for debugging
            \Log::error('Google OAuth Error: ' . $e->getMessage());
            
            return redirect()->route('login')->withErrors([
                'email' => 'Gagal masuk dengan Google: ' . $e->getMessage()
            ]);
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
