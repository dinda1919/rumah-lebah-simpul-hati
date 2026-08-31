<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/auth.php';
requireLogin();

// Hitung statistik sederhana
$produkCnt = $pdo->query('SELECT COUNT(*) FROM produk')->fetchColumn();
$testiCnt = $pdo->query('SELECT COUNT(*) FROM testimoni')->fetchColumn();
$pesanCnt = $pdo->query('SELECT COUNT(*) FROM kontak_masuk WHERE dibaca = 0')->fetchColumn();

echo "<!DOCTYPE html>\n<html lang='id'>\n<head>\n<title>Dashboard Admin - Rumah Lebah</title>\n<link rel='stylesheet' href='assets/bootstrap.min.css'>\n<style>body{padding-top:60px;}</style>\n</head>\n<body>\n<nav class='navbar navbar-expand-lg navbar-dark bg-dark fixed-top'>\n<div class='container'>\n<a class='navbar-brand' href='dashboard.php'>Admin</a>\n<div class='collapse navbar-collapse'>\n<ul class='navbar-nav me-auto'>\n<li class='nav-item'><a class='nav-link' href='produk.php'>Produk</a></li>\n<li class='nav-item'><a class='nav-link' href='testimoni.php'>Testimoni</a></li>\n<li class='nav-item'><a class='nav-link' href='faq.php'>FAQ</a></li>\n<li class='nav-item'><a class='nav-link' href='pengaturan.php'>Pengaturan</a></li>\n<li class='nav-item'><a class='nav-link' href='pesan.php'>Pesan Masuk (<span class="badge bg-danger">' . $pesanCnt . '</span>)</a></li>\n</ul>\n<a class='nav-link text-white' href='logout.php'>Logout ('.htmlspecialchars($_SESSION['admin_name']).')</a>\n</div>\n</div>\n</nav>\n<div class='container'>\n<h1 class='mt-4'>Dashboard</h1>\n<div class='row'>\n<div class='col-md-4'><div class='card text-white bg-primary mb-3'><div class='card-body'><h5 class='card-title'>Produk</h5><p class='card-text'>'.$produkCnt.' item</p></div></div></div>\n<div class='col-md-4'><div class='card text-white bg-success mb-3'><div class='card-body'><h5 class='card-title'>Testimoni</h5><p class='card-text'>'.$testiCnt.' item</p></div></div></div>\n<div class='col-md-4'><div class='card text-white bg-danger mb-3'><div class='card-body'><h5 class='card-title'>Pesan Baru</h5><p class='card-text'>'.$pesanCnt.' belum dibaca</p></div></div></div>\n</div>\n</div>\n<script src='assets/bootstrap.bundle.min.js'></script>\n</body>\n</html>";
<?php