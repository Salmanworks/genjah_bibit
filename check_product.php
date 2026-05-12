<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Cek Produk Terbaru ===\n\n";
$products = App\Models\Product::latest()->take(5)->get(['id', 'name', 'main_image']);
foreach ($products as $p) {
    echo "ID: {$p->id}\n";
    echo "Nama: {$p->name}\n";
    echo "Main Image: {$p->main_image}\n";
    echo "---\n";
}
