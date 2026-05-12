<?php
/**
 * Setup product images untuk admin panel
 * Copy placeholder images ke storage
 */

$sourceImage = __DIR__ . '/public/images/nature1.png';
$storageDir = __DIR__ . '/storage/app/public/products';
$publicDir = __DIR__ . '/public/storage/products';

echo "=== Setup Product Images ===\n\n";

// Cek source image
if (!file_exists($sourceImage)) {
    echo "ERROR: Source image tidak ada: {$sourceImage}\n";
    exit(1);
}

// Buat folder storage
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
    echo "✓ Folder storage dibuat\n";
}

// Buat folder public
if (!is_dir($publicDir)) {
    mkdir($publicDir, 0755, true);
    echo "✓ Folder public dibuat\n";
}

// Get all products from database
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$products = App\Models\Product::all();

echo "\nMencopy gambar untuk {$products->count()} produk...\n\n";

foreach ($products as $product) {
    if ($product->main_image) {
        $filename = basename($product->main_image);
        $storagePath = $storageDir . '/' . $filename;
        $publicPath = $publicDir . '/' . $filename;

        // Copy ke storage
        if (!file_exists($storagePath)) {
            copy($sourceImage, $storagePath);
            echo "✓ Storage: {$filename}\n";
        }

        // Copy ke public
        if (!file_exists($publicPath)) {
            copy($sourceImage, $publicPath);
            echo "✓ Public: {$filename}\n";
        }
    }

    // Copy gallery images
    if ($product->gallery_images) {
        foreach ($product->gallery_images as $galleryImage) {
            $filename = basename($galleryImage);
            $storagePath = $storageDir . '/' . $filename;
            $publicPath = $publicDir . '/' . $filename;

            if (!file_exists($storagePath)) {
                copy($sourceImage, $storagePath);
                echo "✓ Storage: {$filename}\n";
            }

            if (!file_exists($publicPath)) {
                copy($sourceImage, $publicPath);
                echo "✓ Public: {$filename}\n";
            }
        }
    }
}

echo "\n=== SELESAI ===\n";
echo "Silakan refresh halaman admin panel.\n";
