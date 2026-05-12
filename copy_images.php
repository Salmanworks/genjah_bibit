<?php
// Copy images dari storage ke public untuk development
$source = __DIR__ . '/storage/app/public/products';
$dest = __DIR__ . '/public/storage/products';

// Buat folder tujuan
if (!is_dir($dest)) {
    mkdir($dest, 0755, true);
    echo "Folder dibuat: {$dest}\n";
}

// Copy semua files
$files = glob($source . '/*');
$count = 0;
foreach ($files as $file) {
    if (is_file($file)) {
        $target = $dest . '/' . basename($file);
        if (!file_exists($target)) {
            copy($file, $target);
            $count++;
        }
    }
}

echo "Berhasil copy {$count} gambar!\n";
echo "Silakan refresh halaman admin.\n";
