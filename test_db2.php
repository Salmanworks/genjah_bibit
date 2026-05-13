<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=genjah_bibit', 'root', '123456');

echo "=== STRUKTUR TABEL products ===\n";
$cols = $pdo->query('DESCRIBE products')->fetchAll(PDO::FETCH_ASSOC);
foreach($cols as $c) {
    echo sprintf("  %-20s %-20s %s\n", $c['Field'], $c['Type'], $c['Null']=='YES' ? 'NULLABLE' : 'NOT NULL');
}

echo "\n=== JUMLAH DATA products ===\n";
$count = $pdo->query('SELECT COUNT(*) FROM products')->fetchColumn();
echo "  Total: $count produk\n";

echo "\n=== TABEL sessions ===\n";
$sessCount = $pdo->query('SELECT COUNT(*) FROM sessions')->fetchColumn();
echo "  Total sessions: $sessCount\n";

echo "\n=== TABEL categories ===\n";
$cats = $pdo->query('SELECT id, name FROM categories LIMIT 10')->fetchAll(PDO::FETCH_ASSOC);
if (empty($cats)) {
    echo "  PERHATIAN: Tidak ada kategori! Tambah produk akan GAGAL validasi (category_id required)\n";
} else {
    foreach($cats as $c) echo "  [{$c['id']}] {$c['name']}\n";
}
