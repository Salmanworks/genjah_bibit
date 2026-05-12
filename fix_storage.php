<?php
/**
 * Script untuk memperbaiki storage link di Windows
 * Bisa dijalankan dengan: php fix_storage.php
 */

echo "=== Memperbaiki Storage Link ===\n\n";

$publicStorage = __DIR__ . '/public/storage';
$appStorage = __DIR__ . '/storage/app/public';

// Hapus storage link lama jika ada
if (is_dir($publicStorage) || is_link($publicStorage)) {
    echo "1. Menghapus storage link lama...\n";
    if (is_link($publicStorage)) {
        unlink($publicStorage);
    } else {
        // Hapus isi folder
        $files = glob($publicStorage . '/*');
        foreach ($files as $file) {
            if (is_dir($file)) {
                $subFiles = glob($file . '/*');
                foreach ($subFiles as $subFile) {
                    unlink($subFile);
                }
                rmdir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($publicStorage);
    }
    echo "   ✓ Storage link lama dihapus\n\n";
}

// Coba buat symlink
if (function_exists('symlink')) {
    echo "2. Mencoba membuat symbolic link...\n";
    if (@symlink($appStorage, $publicStorage)) {
        echo "   ✓ Symbolic link berhasil dibuat!\n\n";
    } else {
        echo "   ✗ Gagal membuat symlink (butuh admin privilege)\n";
        echo "   → Menggunakan alternatif: Copy files...\n\n";
        
        // Alternatif: Buat folder dan copy files
        if (!is_dir($publicStorage)) {
            mkdir($publicStorage, 0755, true);
        }
        
        $productsSource = $appStorage . '/products';
        $productsTarget = $publicStorage . '/products';
        
        if (is_dir($productsSource)) {
            if (!is_dir($productsTarget)) {
                mkdir($productsTarget, 0755, true);
            }
            
            $files = glob($productsSource . '/*');
            $copied = 0;
            foreach ($files as $file) {
                if (is_file($file)) {
                    $filename = basename($file);
                    copy($file, $productsTarget . '/' . $filename);
                    $copied++;
                }
            }
            echo "   ✓ Berhasil copy {$copied} file ke public/storage/products/\n\n";
        }
    }
} else {
    echo "2. Symlink tidak tersedia, menggunakan copy files...\n";
    
    if (!is_dir($publicStorage)) {
        mkdir($publicStorage, 0755, true);
    }
    
    $productsSource = $appStorage . '/products';
    $productsTarget = $publicStorage . '/products';
    
    if (is_dir($productsSource)) {
        if (!is_dir($productsTarget)) {
            mkdir($productsTarget, 0755, true);
        }
        
        $files = glob($productsSource . '/*');
        $copied = 0;
        foreach ($files as $file) {
            if (is_file($file)) {
                $filename = basename($file);
                copy($file, $productsTarget . '/' . $filename);
                $copied++;
            }
        }
        echo "   ✓ Berhasil copy {$copied} file\n\n";
    }
}

// Clear cache
echo "3. Clear cache Laravel...\n";
passthru('php artisan cache:clear 2>&1');
passthru('php artisan config:clear 2>&1');
passthru('php artisan view:clear 2>&1');
echo "   ✓ Cache cleared\n\n";

// Verifikasi
echo "4. Verifikasi...\n";
if (is_dir($publicStorage . '/products')) {
    $files = glob($publicStorage . '/products/*');
    $count = count($files);
    echo "   ✓ public/storage/products/ ditemukan dengan {$count} files\n";
} else {
    echo "   ✗ public/storage/products/ tidak ditemukan\n";
}

echo "\n=== SELESAI ===\n";
echo "Silakan refresh halaman admin panel.\n";
