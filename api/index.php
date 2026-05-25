<?php

// 1. Bangun "kamar" penyimpanan sementara di dalam RAM Vercel (/tmp)
$storagePath = '/tmp/storage';
$directories = [
    $storagePath . '/app/public',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/views',
    $storagePath . '/framework/sessions',
    $storagePath . '/logs',
    $storagePath . '/bootstrap/cache',
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true); // Buat folder jika belum ada
    }
}

// 2. Mulai panggil mesin bawaan Laravel
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Trik Utama: Paksa Laravel pindah rumah ke folder RAM yang baru kita buat!
$app->useStoragePath($storagePath);
$app->useBootstrapPath($storagePath . '/bootstrap');

// 4. Eksekusi permintaan web 
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();
$kernel->terminate($request, $response);