<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Cek Produk ID 36 ===\n\n";
$product = App\Models\Product::find(36);
if ($product) {
    echo "ID: {$product->id}\n";
    echo "Nama: {$product->name}\n";
    echo "Slug: {$product->slug}\n";
    echo "Kategori ID: {$product->category_id}\n";
    echo "Harga: {$product->price}\n";
    echo "Stok: {$product->stock}\n";
    echo "Main Image: {$product->main_image}\n";
    echo "Gallery Images: " . json_encode($product->gallery_images) . "\n";
    echo "Is Active: " . ($product->is_active ? 'Yes' : 'No') . "\n";
    echo "Created At: {$product->created_at}\n";
} else {
    echo "Produk ID 36 tidak ditemukan\n";
}
