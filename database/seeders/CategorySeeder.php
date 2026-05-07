<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sayuran',
                'slug' => 'sayuran',
                'description' => 'Berbagai jenis bibit sayuran berkualitas',
                'icon' => 'leaf',
                'subcategories' => [
                    ['name' => 'Lombok', 'slug' => 'lombok'],
                    ['name' => 'Terong', 'slug' => 'terong'],
                    ['name' => 'Tomat', 'slug' => 'tomat'],
                ],
            ],
            [
                'name' => 'Buah & Bibit Buah',
                'slug' => 'buah-bibit-buah',
                'description' => 'Koleksi lengkap bibit buah unggul',
                'icon' => 'apple',
                'subcategories' => [
                    ['name' => 'Pepaya', 'slug' => 'pepaya'],
                    ['name' => 'Alpukat', 'slug' => 'alpukat'],
                    ['name' => 'Jeruk', 'slug' => 'jeruk'],
                    ['name' => 'Sawo', 'slug' => 'sawo'],
                    ['name' => 'Durian', 'slug' => 'durian'],
                    ['name' => 'Mangga', 'slug' => 'mangga'],
                    ['name' => 'Kelengkeng', 'slug' => 'kelengkeng'],
                    ['name' => 'Nangka', 'slug' => 'nangka'],
                    ['name' => 'Kedondong', 'slug' => 'kedondong'],
                    ['name' => 'Juwet', 'slug' => 'juwet'],
                    ['name' => 'Jambu', 'slug' => 'jambu'],
                    ['name' => 'Rambutan', 'slug' => 'rambutan'],
                    ['name' => 'Srikaya & Lainnya', 'slug' => 'srikaya-lainnya'],
                    ['name' => 'Pisang', 'slug' => 'pisang'],
                ],
            ],
            [
                'name' => 'Tanaman Perkebunan',
                'slug' => 'tanaman-perkebunan',
                'description' => 'Bibit tanaman perkebunan komersial',
                'icon' => 'coffee',
                'subcategories' => [
                    ['name' => 'Kopi', 'slug' => 'kopi'],
                    ['name' => 'Kelapa', 'slug' => 'kelapa'],
                    ['name' => 'Petai', 'slug' => 'petai'],
                    ['name' => 'Kacang Amazon', 'slug' => 'kacang-amazon'],
                ],
            ],
            [
                'name' => 'Tanaman Hias & Bunga',
                'slug' => 'tanaman-hias-bunga',
                'description' => 'Tanaman hias premium untuk keindahan rumah Anda',
                'icon' => 'flower',
                'subcategories' => [
                    ['name' => 'Pucuk Merah', 'slug' => 'pucuk-merah'],
                    ['name' => 'Ketapang Kencana', 'slug' => 'ketapang-kencana'],
                    ['name' => 'Tabebuya', 'slug' => 'tabebuya'],
                    ['name' => 'Kenanga', 'slug' => 'kenanga'],
                    ['name' => 'Bunga Kantil', 'slug' => 'bunga-kantil'],
                    ['name' => 'Bidara Arab', 'slug' => 'bidara-arab'],
                    ['name' => 'Palem Merah', 'slug' => 'palem-merah'],
                ],
            ],
            [
                'name' => 'Tanaman Rambat',
                'slug' => 'tanaman-rambat',
                'description' => 'Bibit tanaman merambat',
                'icon' => 'grape',
                'subcategories' => [
                    ['name' => 'Anggur Pohon Rambat', 'slug' => 'anggur-pohon-rambat'],
                ],
            ],
            [
                'name' => 'Tanaman Kayu',
                'slug' => 'tanaman-kayu',
                'description' => 'Bibit kayu untuk investasi masa depan',
                'icon' => 'tree',
                'subcategories' => [
                    ['name' => 'Sengon Laut', 'slug' => 'sengon-laut'],
                    ['name' => 'Balsa', 'slug' => 'balsa'],
                    ['name' => 'Jati Emas', 'slug' => 'jati-emas'],
                    ['name' => 'Mahoni', 'slug' => 'mahoni'],
                ],
            ],
        ];

        foreach ($categories as $index => $categoryData) {
            $subcategories = $categoryData['subcategories'] ?? [];
            unset($categoryData['subcategories']);
            
            $categoryData['sort_order'] = $index;
            $categoryData['product_count'] = count($subcategories) * 3 + rand(10, 50);
            
            $category = Category::create($categoryData);
            
            foreach ($subcategories as $subIndex => $subcategoryData) {
                $subcategoryData['category_id'] = $category->id;
                $subcategoryData['sort_order'] = $subIndex;
                Subcategory::create($subcategoryData);
            }
        }
    }
}
