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
            'store_name' => $request->input('store_name', 'Genjah Rumah Bibit'),
            'store_tagline' => $request->input('store_tagline', ''),
            'store_description' => $request->input('store_description', ''),
            'store_email' => $request->input('store_email', ''),
            'store_phone' => $request->input('store_phone', ''),
            'whatsapp_number' => $request->input('whatsapp_number', ''),
            'whatsapp_message' => $request->input('whatsapp_message', ''),
            'store_address' => $request->input('store_address', ''),
            'store_city' => $request->input('store_city', ''),
            'store_province' => $request->input('store_province', ''),
            'instagram_url' => $request->input('instagram_url', ''),
            'facebook_url' => $request->input('facebook_url', ''),
            'tiktok_url' => $request->input('tiktok_url', ''),
            'youtube_url' => $request->input('youtube_url', ''),
            'shipping_info' => $request->input('shipping_info', ''),
            'return_policy' => $request->input('return_policy', ''),
        ];

        foreach ($settingsData as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan!');
    }
}
