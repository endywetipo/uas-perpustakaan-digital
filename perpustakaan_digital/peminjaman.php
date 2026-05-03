<?php
require 'includes/config.php';
require 'includes/functions.php';

checkLogin();

$user_id = $_SESSION['user_id'];
$query = "SELECT p.*, b.judul FROM peminjaman p JOIN buku b ON p.buku_id = b.id WHERE p.user_id = $user_id";
$pinjaman = query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pinjaman Saya - Perpustakaan Digital</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="logo"><strong>PerpusDigital</strong></div>
        <div class="menu">
            <a href="index.php">Home</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h1>Riwayat Peminjaman Saya</h1>
        <table>
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pinjaman)) : ?>
                    <tr><td colspan="3" style="text-align:center;">Belum ada buku yang dipinjam.</td></tr>
                <?php else : ?>
                    <?php foreach($pinjaman as $p): ?>
                    <tr>
                        <td><?= $p['judul']; ?></td>
                        <td><?= $p['tanggal_pinjam']; ?></td>
                        <td><span class="badge"><?= $p['status']; ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
