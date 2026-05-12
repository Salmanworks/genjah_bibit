<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=genjah_bibit', 'root', '123456');
    echo "SUKSES: Terhubung ke database 'genjah_bibit'\n";
    
    // Check tables
    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
    echo "Tables: " . implode(', ', $tables) . "\n";
    
} catch(PDOException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    
    // Try without database name
    try {
        $pdo2 = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '123456');
        echo "Bisa konek ke MySQL tapi bukan ke database genjah_bibit\n";
        $dbs = $pdo2->query("SHOW DATABASES")->fetchAll(PDO::FETCH_COLUMN);
        echo "Available databases: " . implode(', ', $dbs) . "\n";
    } catch(PDOException $e2) {
        echo "Gagal konek ke MySQL sama sekali: " . $e2->getMessage() . "\n";
    }
}
