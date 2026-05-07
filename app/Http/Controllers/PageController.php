<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }
    
    public function contact()
    {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Format message for WhatsApp
        $whatsappMessage = "Halo Admin Genjah Rumah Bibit," . PHP_EOL . PHP_EOL;
        $whatsappMessage .= "Ada pesan baru dari website:" . PHP_EOL . PHP_EOL;
        $whatsappMessage .= "*Nama:* {$validated['name']}" . PHP_EOL;
        $whatsappMessage .= "*Email:* {$validated['email']}" . PHP_EOL;
        $whatsappMessage .= "*Subjek:* {$validated['subject']}" . PHP_EOL;
        $whatsappMessage .= "*Pesan:*" . PHP_EOL . $validated['message'];

        // Convert to international format (62xxxxxxxxxxx)
        $whatsappNumber = setting('whatsapp_number', '08895045078');
        $whatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber); // Remove non-numeric
        if (substr($whatsappNumber, 0, 1) === '0') {
            $whatsappNumber = '62' . substr($whatsappNumber, 1); // Replace leading 0 with 62
        }
        $whatsappUrl = "https://wa.me/{$whatsappNumber}?text=" . rawurlencode($whatsappMessage);

        return redirect()->away($whatsappUrl);
    }

    public function wishlist()
    {
        // Get wishlist items for current user or session
        $wishlists = collect([]); // Placeholder, implement based on your wishlist logic
        
        return view('pages.wishlist', compact('wishlists'));
    }
}
