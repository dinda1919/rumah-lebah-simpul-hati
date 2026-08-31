<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'rumahlebah_db');
define('DB_USER', 'rumahlebah');
define('DB_PASS', 'rumahlebah_qwerty');

define('BASE_URL', '/');
define('UPLOAD_DIR', __DIR__ . '/../uploads/');
define('MAX_UPLOAD_SIZE', 2 * 1024 * 1024);
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'webp', 'gif']);

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    die("Koneksi database gagal. Pastikan database sudah dibuat.");
}
