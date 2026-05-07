<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Andi Setiawan',
                'location' => 'Bandung',
                'content' => 'Bibit durian yang saya beli sangat bagus dan sehat. Pengiriman cepat dan aman. Recommended!',
                'rating' => 5.0,
                'product_purchased' => 'Bibit Durian Musang King',
            ],
            [
                'name' => 'Sri Nurhaliza',
                'location' => 'Yogyakarta',
                'content' => 'Bibit mangga Miyazaki nya mantap, sudah berbuah 1 tahun setelah tanam. Terima kasih Plant Power!',
                'rating' => 5.0,
                'product_purchased' => 'Bibit Mangga Miyazaki',
            ],
            [
                'name' => 'Budi Santoso',
                'location' => 'Malang',
                'content' => 'Alpukat aligator nya kualitas premium. Pelayanan ramah dan konsultasi sangat membantu.',
                'rating' => 4.5,
                'product_purchased' => 'Bibit Alpukat Aligator',
            ],
            [
                'name' => 'Dewi Kusuma',
                'location' => 'Surabaya',
                'content' => 'Pesanan lengkap, packing rapi dengan bubble wrap. Bibit kelengkeng New Crystal sudah tumbuh subur.',
                'rating' => 5.0,
                'product_purchased' => 'Bibit Kelengkeng New Crystal',
            ],
            [
                'name' => 'Agus Wijaya',
                'location' => 'Jakarta',
                'content' => 'Sudah 3x order di sini, kualitas bibit konsisten bagus. Harga juga terjangkau untuk kualitas premium.',
                'rating' => 5.0,
                'product_purchased' => 'Bibit Jeruk Lemon',
            ],
            [
                'name' => 'Maya Indah',
                'location' => 'Semarang',
                'content' => 'Konsultasi gratis nya sangat membantu! Dibantu pilih bibit yang cocok untuk tanah saya. Terima kasih!',
                'rating' => 5.0,
                'product_purchased' => 'Bibit Kopi Arabika Gayo',
            ],
        ];

        foreach ($testimonials as $index => $testimonial) {
            $testimonial['avatar'] = 'testimonials/avatar-' . ($index + 1) . '.jpg';
            $testimonial['sort_order'] = $index;
            Testimonial::create($testimonial);
        }
    }
}
