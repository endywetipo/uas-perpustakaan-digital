<?php
require 'includes/config.php';
require 'includes/functions.php';

checkLogin();

if (isset($_GET['id'])) {
    $buku_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $tgl_pinjam = date('Y-m-d');

    // Cek stok
    $buku = query("SELECT stok FROM buku WHERE id = $buku_id")[0];
    
    if ($buku['stok'] > 0) {
        // Kurangi stok
        mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id = $buku_id");
        
        // Catat peminjaman
        mysqli_query($conn, "INSERT INTO peminjaman (user_id, buku_id, tanggal_pinjam, status) VALUES ($user_id, $buku_id, '$tgl_pinjam', 'dipinjam')");
        
        echo "<script>alert('Buku berhasil dipinjam!'); window.location='peminjaman.php';</script>";
    } else {
        echo "<script>alert('Maaf, stok buku habis!'); window.location='index.php';</script>";
    }
}
?>
