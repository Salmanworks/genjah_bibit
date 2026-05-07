<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('format_price')) {
    function format_price(float $price): string
    {
        return 'Rp ' . number_format($price, 0, ',', '.');
    }
}

if (!function_exists('whatsapp_link')) {
    function whatsapp_link(string $message = ''): string
    {
        $phone = setting('whatsapp_number', '6281234567890');
        
        // Bersihkan nomor dari karakter non-digit
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Ubah awalan 0 menjadi 62
        if (strpos($phone, '0') === 0) {
            $phone = '62' . substr($phone, 1);
        }
        
        $defaultMessage = setting('whatsapp_message', 'Halo Genjah Rumah Bibit, saya ingin bertanya tentang bibit tanaman.');
        $message = $message ?: $defaultMessage;
        
        // Gunakan format api.whatsapp.com untuk kompatibilitas lebih baik
        return "https://api.whatsapp.com/send?phone={$phone}&text=" . urlencode($message);
    }
}
