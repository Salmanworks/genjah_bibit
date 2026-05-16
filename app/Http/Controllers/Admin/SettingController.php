<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settingsData = [
            'store_name'        => $request->input('store_name', 'Genjah Rumah Bibit'),
            'store_tagline'     => $request->input('store_tagline', ''),
            'store_description' => $request->input('store_description', ''),
            'store_email'       => $request->input('store_email', ''),
            'store_phone'       => $request->input('store_phone', ''),
            'whatsapp_number'   => $request->input('whatsapp_number', ''),
            'whatsapp_message'  => $request->input('whatsapp_message', ''),
            'store_address'     => $request->input('store_address', ''),
            'store_city'        => $request->input('store_city', ''),
            'store_province'    => $request->input('store_province', ''),
            'instagram_url'     => $request->input('instagram_url', ''),
            'facebook_url'      => $request->input('facebook_url', ''),
            'tiktok_url'        => $request->input('tiktok_url', ''),
            'youtube_url'       => $request->input('youtube_url', ''),
            'shipping_info'     => $request->input('shipping_info', ''),
            'return_policy'     => $request->input('return_policy', ''),
        ];

        foreach ($settingsData as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan!');
    }

    public function footer()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('admin.settings.footer', compact('settings'));
    }

    public function updateFooter(Request $request)
    {
        $footerSettings = [
            'footer_about'     => $request->input('footer_about', ''),
            'footer_copyright' => $request->input('footer_copyright', ''),
            'footer_address'   => $request->input('footer_address', ''),
            'footer_email'     => $request->input('footer_email', ''),
            'footer_phone'     => $request->input('footer_phone', ''),
            'footer_whatsapp'  => $request->input('footer_whatsapp', ''),
            'footer_instagram' => $request->input('footer_instagram', ''),
            'footer_facebook'  => $request->input('footer_facebook', ''),
            'footer_tiktok'    => $request->input('footer_tiktok', ''),
            'footer_youtube'   => $request->input('footer_youtube', ''),
        ];

        foreach ($footerSettings as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.footer')->with('success', 'Footer berhasil diperbarui!');
    }

    public function about()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('admin.settings.about', compact('settings'));
    }

    public function updateAbout(Request $request)
    {
        $request->validate([
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $aboutSettings = [
            'about_title'       => $request->input('about_title', 'Tentang Kami'),
            'about_subtitle'    => $request->input('about_subtitle', 'Dedikasi Untuk Kebun Impian Anda'),
            'about_description' => $request->input('about_description', ''),
            'about_quote'       => $request->input('about_quote', ''),
        ];

        if ($request->hasFile('about_image')) {
            $imagePath = $request->file('about_image')->store('settings', 'public');
            $aboutSettings['about_image'] = $imagePath;
        }

        foreach ($aboutSettings as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.about')->with('success', 'Tentang Kami berhasil diperbarui!');
    }
}
