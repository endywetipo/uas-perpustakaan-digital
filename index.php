<?php
require 'includes/config.php';
require 'includes/functions.php';

checkLogin();

$buku = query("SELECT b.*, k.nama_kategori FROM buku b JOIN kategori k ON b.kategori_id = k.id");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Perpustakaan Digital</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="logo"><strong>PerpusDigital</strong></div>
        <div class="menu">
            <span>Halo, <?= $_SESSION['nama']; ?> (<?= $_SESSION['role']; ?>)</span>
            <a href="index.php">Home</a>
            <?php if ($_SESSION['role'] === 'admin') : ?>
                <a href="admin_buku.php">Kelola Buku</a>
            <?php endif; ?>
            <a href="peminjaman.php">Pinjaman Saya</a>
            <a href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h1>Katalog Buku</h1>
        <div class="book-grid">
            <?php foreach ($buku as $row) : ?>
                <div class="book-card">
                    <span class="badge"><?= $row['nama_kategori']; ?></span>
                    <h3><?= $row['judul']; ?></h3>
                    <p>Penulis: <?= $row['penulis']; ?></p>
                    <p>Stok: <?= $row['stok']; ?></p>
                    <a href="pinjam_proses.php?id=<?= $row['id']; ?>" class="btn btn-primary" style="margin-top: 10px;" onclick="return confirm('Pinjam buku ini?')">Pinjam Buku</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
