<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "=== Cek Koneksi Database ===\n\n";

// Cek default connection
$defaultConnection = config('database.default');
echo "Default Connection: {$defaultConnection}\n\n";

// Cek konfigurasi koneksi
if ($defaultConnection === 'mysql') {
    echo "MySQL Configuration:\n";
    echo "Host: " . config('database.connections.mysql.host') . "\n";
    echo "Database: " . config('database.connections.mysql.database') . "\n";
    echo "Username: " . config('database.connections.mysql.username') . "\n";
} elseif ($defaultConnection === 'sqlite') {
    echo "SQLite Configuration:\n";
    echo "Database: " . config('database.connections.sqlite.database') . "\n";
    echo "File exists: " . (file_exists(config('database.connections.sqlite.database')) ? 'Yes' : 'No') . "\n";
}

// Cek jumlah produk
$productCount = App\Models\Product::count();
echo "\nJumlah Produk di Database: {$productCount}\n";

// Cek produk terbaru
$latestProduct = App\Models\Product::latest()->first();
if ($latestProduct) {
    echo "\nProduk Terbaru:\n";
    echo "ID: {$latestProduct->id}\n";
    echo "Nama: {$latestProduct->name}\n";
    echo "Created At: {$latestProduct->created_at}\n";
}
