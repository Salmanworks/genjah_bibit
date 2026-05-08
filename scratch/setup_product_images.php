<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

// List of product names from seeder
$products = [
    'bibit-durian-musang-king',
    'bibit-durian-bawor',
    'bibit-durian-duri-hitam',
    'bibit-alpukat-aligator',
    'bibit-alpukat-red-vietnam',
    'bibit-alpukat-mikel',
    'bibit-mangga-miyazaki',
    'bibit-mangga-harum-manis',
    'bibit-mangga-red-emperor',
    'bibit-jeruk-lemon',
    'bibit-jeruk-dekopon',
    'bibit-jeruk-keprok',
    'bibit-kelengkeng-new-crystal',
    'bibit-kelengkeng-itoh',
    'bibit-pucuk-merah-premium',
    'bibit-ketapang-kencana',
    'bibit-tabebuya-pink',
    'bibit-kopi-arabika-gayo',
    'bibit-kopi-robusta',
    'bibit-kelapa-genjah-entog',
    'bibit-kelapa-kopyor',
    'bibit-sawo-manila',
    'bibit-sawo-jumbo',
    'bibit-jeruk-bali',
    'bibit-jeruk-pamelo-merah',
    'bibit-jambu-kristal',
    'bibit-jambu-merah-deli',
    'bibit-jati-emas',
    'bibit-mahoni',
    'bibit-sengon-laut',
    'bibit-lombok-besar',
    'bibit-terong-ungu',
    'bibit-tomat-cherry',
];

// Use one of the existing nature images as placeholder for all products
$sourceImage = public_path('images/nature1.png');

echo "Copying images to storage...\n";

foreach ($products as $product) {
    // Copy main image
    $mainImagePath = storage_path('app/public/products/' . $product . '.jpg');
    if (!File::exists($mainImagePath)) {
        File::copy($sourceImage, $mainImagePath);
        echo "✓ Copied main image for: {$product}\n";
    }

    // Copy gallery images
    for ($i = 1; $i <= 2; $i++) {
        $galleryImagePath = storage_path('app/public/products/' . $product . '-' . $i . '.jpg');
        if (!File::exists($galleryImagePath)) {
            File::copy($sourceImage, $galleryImagePath);
            echo "✓ Copied gallery image {$i} for: {$product}\n";
        }
    }
}

echo "\n✓ All images copied successfully!\n";
echo "Next steps:\n";
echo "1. Run: php artisan storage:link\n";
echo "2. Run: php artisan db:seed --class=ProductSeeder\n";
