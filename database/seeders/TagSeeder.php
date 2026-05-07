<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Cepat Berbuah', 'slug' => 'cepat-berbuah', 'color' => 'green'],
            ['name' => 'Bibit Unggul', 'slug' => 'bibit-unggul', 'color' => 'emerald'],
            ['name' => 'Cocok Dataran Rendah', 'slug' => 'cocok-dataran-rendah', 'color' => 'teal'],
            ['name' => 'Tanaman Langka', 'slug' => 'tanaman-langka', 'color' => 'purple'],
            ['name' => 'Unggulan', 'slug' => 'unggulan', 'color' => 'yellow'],
            ['name' => 'Best Seller', 'slug' => 'best-seller', 'color' => 'orange'],
            ['name' => 'New Arrival', 'slug' => 'new-arrival', 'color' => 'blue'],
            ['name' => 'Organic', 'slug' => 'organic', 'color' => 'lime'],
            ['name' => 'Premium', 'slug' => 'premium', 'color' => 'amber'],
            ['name' => 'Harga Spesial', 'slug' => 'harga-spesial', 'color' => 'red'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}
