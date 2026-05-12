<?php
/**
 * Sync semua gambar dari storage ke public/storage
 */

$source = __DIR__ . '/storage/app/public/products';
$dest = __DIR__ . '/public/storage/products';

echo "=== Sync Images from Storage to Public ===\n\n";

// Cek source
if (!is_dir($source)) {
    echo "ERROR: Source folder tidak ada: {$source}\n";
    exit(1);
}

// Hapus folder tujuan jika ada
if (is_dir($dest)) {
    echo "1. Menghapus folder tujuan lama...\n";
    $files = glob($dest . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    rmdir($dest);
    echo "   ✓ Folder tujuan dihapus\n\n";
}

// Buat folder tujuan
echo "2. Membuat folder tujuan...\n";
mkdir($dest, 0755, true);
echo "   ✓ Folder dibuat: {$dest}\n\n";

// Copy semua files
echo "3. Mengcopy gambar...\n";
$files = glob($source . '/*');
$copied = 0;
$failed = 0;

foreach ($files as $file) {
    if (is_file($file)) {
        $filename = basename($file);
        $target = $dest . '/' . $filename;
        if (copy($file, $target)) {
            $copied++;
            echo "   ✓ {$filename}\n";
        } else {
            $failed++;
            echo "   ✗ Gagal copy: {$filename}\n";
        }
    }
}

echo "\n=== Hasil ===\n";
echo "Berhasil: {$copied} file\n";
echo "Gagal: {$failed} file\n";

// Clear cache
echo "\n4. Clear cache...\n";
passthru('php artisan cache:clear 2>&1');
passthru('php artisan view:clear 2>&1');

echo "\n=== SELESAI ===\n";
echo "Silakan refresh halaman admin panel.\n";
