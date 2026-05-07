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
        $defaultMessage = setting('whatsapp_message', 'Halo, saya ingin bertanya tentang bibit tanaman.');
        $message = $message ?: $defaultMessage;
        return "https://wa.me/{$phone}?text=" . urlencode($message);
    }
}
