<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Informasi Toko
            ['key' => 'store_name', 'value' => 'Genjah Rumah Bibit', 'type' => 'string', 'group' => 'general'],
            ['key' => 'store_tagline', 'value' => 'Pusat Bibit Tanaman Berkualitas', 'type' => 'string', 'group' => 'general'],
            ['key' => 'store_description', 'value' => 'Genjah Rumah Bibit adalah pusat bibit tanaman berkualitas terbaik untuk kebun impian Anda. Sehat, unggul, dan siap tanam.', 'type' => 'string', 'group' => 'general'],
            
            // Kontak
            ['key' => 'whatsapp_number', 'value' => '08895045078', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'whatsapp_message', 'value' => 'Halo Genjah Rumah Bibit Power, saya ingin bertanya tentang bibit tanaman.', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'email', 'value' => 'genjahrumahbibit@gmail.com', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'phone', 'value' => '0889-5045-078', 'type' => 'string', 'group' => 'contact'],
            
            // Alamat
            ['key' => 'address', 'value' => 'Jl. Raya Kebun No. 123, Desa Sejahtera, Kec. Makmur, Kab. Subur', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'city', 'value' => 'Surabaya', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'province', 'value' => 'Jawa Timur', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'postal_code', 'value' => '60123', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'google_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5!2d112.7!3d-7.3!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMTgnMDAuMCJTIDExMsKwNDInMDAuMCJF!5e0!3m2!1sen!2sid!4v1600000000000!5m2!1sen!2sid', 'type' => 'string', 'group' => 'contact'],
            
            // Media Sosial
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/plantpower', 'type' => 'string', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/plantpower', 'type' => 'string', 'group' => 'social'],
            ['key' => 'tiktok_url', 'value' => 'https://tiktok.com/@plantpower', 'type' => 'string', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com/plantpower', 'type' => 'string', 'group' => 'social'],
            
            // SEO
            ['key' => 'meta_title', 'value' => 'Plant Power - Pusat Bibit Tanaman Berkualitas', 'type' => 'string', 'group' => 'seo'],
            ['key' => 'meta_description', 'value' => 'Temukan bibit tanaman terbaik untuk kebun impian Anda. Sehat, unggul, dan siap tanam. Pesan sekarang via WhatsApp!', 'type' => 'string', 'group' => 'seo'],
            ['key' => 'meta_keywords', 'value' => 'bibit tanaman, bibit buah, bibit durian, bibit alpukat, bibit mangga, bibit jeruk, tanaman hias', 'type' => 'string', 'group' => 'seo'],
            
            // Jam Operasional
            ['key' => 'operating_hours', 'value' => 'Senin - Sabtu: 08.00 - 17.00 WIB', 'type' => 'string', 'group' => 'general'],
            
            // Fitur
            ['key' => 'enable_wishlist', 'value' => '1', 'type' => 'boolean', 'group' => 'features'],
            ['key' => 'enable_reviews', 'value' => '1', 'type' => 'boolean', 'group' => 'features'],
            ['key' => 'enable_chat', 'value' => '1', 'type' => 'boolean', 'group' => 'features'],
        ];

        foreach ($settings as $setting) {
            Setting::set($setting['key'], $setting['value'], $setting['type'], $setting['group']);
        }
    }
}
