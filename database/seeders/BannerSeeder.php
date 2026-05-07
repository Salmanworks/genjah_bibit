<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Bibit Durian Musang King',
                'subtitle' => 'Diskon 20% - Stok Terbatas!',
                'image' => 'banners/durian-promo.jpg',
                'button_text' => 'Pesan Sekarang',
                'button_link' => '/produk?kategori=durian',
                'position' => 'promo',
                'sort_order' => 1,
            ],
            [
                'title' => 'Koleksi Alpukat Premium',
                'subtitle' => 'Varietas Aligator, Red Vietnam, dan Mikel',
                'image' => 'banners/alpukat-promo.jpg',
                'button_text' => 'Lihat Koleksi',
                'button_link' => '/produk?kategori=alpukat',
                'position' => 'promo',
                'sort_order' => 2,
            ],
            [
                'title' => 'Gratis Konsultasi',
                'subtitle' => 'Tim ahli kami siap membantu pilih bibit terbaik',
                'image' => 'banners/konsultasi.jpg',
                'button_text' => 'Chat WhatsApp',
                'button_link' => 'https://wa.me/6281234567890',
                'position' => 'promo',
                'sort_order' => 3,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
