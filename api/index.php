<?php
// Paksa PHP menampilkan semua error tingkat dewa
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Coba jalankan Laravel
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    // Jika meledak, tangkap dan print ke layar!
    echo "<h1>🚨 Sistem Mengalami Crash!</h1>";
    echo "<pre style='background:#1e1e1e; color:#00ff00; padding:20px; border-radius:5px;'>";
    echo "Pesan Error : " . $e->getMessage() . "\n\n";
    echo "Lokasi File : " . $e->getFile() . " (Baris " . $e->getLine() . ")\n\n";
    echo "Jejak Sistem:\n" . $e->getTraceAsString();
    echo "</pre>";
}