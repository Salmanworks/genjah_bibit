<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Cek Produk dengan Gambar Pepaya ===\n\n";
$products = App\Models\Product::where('main_image', 'like', '%pepaya%')->get(['id', 'name', 'main_image']);
if ($products->count() > 0) {
    foreach ($products as $p) {
        echo "ID: {$p->id}\n";
        echo "Nama: {$p->name}\n";
        echo "Main Image: {$p->main_image}\n";
        echo "---\n";
    }
} else {
    echo "Tidak ada produk dengan gambar pepaya\n";
}

echo "\n=== Semua Produk ===\n";
$all = App\Models\Product::all(['id', 'name', 'main_image']);
foreach ($all as $p) {
    echo "{$p->id} - {$p->name} - {$p->main_image}\n";
}
