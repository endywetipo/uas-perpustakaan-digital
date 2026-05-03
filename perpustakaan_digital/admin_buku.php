<?php
require 'includes/config.php';
require 'includes/functions.php';

checkLogin();
checkAdmin();

$buku = query("SELECT b.*, k.nama_kategori FROM buku b LEFT JOIN kategori k ON b.kategori_id = k.id");
$kategori = query("SELECT * FROM kategori");

if (isset($_POST['tambah'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
    $kategori_id = $_POST['kategori_id'];
    $stok = $_POST['stok'];

    $sql = "INSERT INTO buku (judul, penulis, kategori_id, stok) VALUES ('$judul', '$penulis', '$kategori_id', '$stok')";
    mysqli_query($conn, $sql);
    header("Location: admin_buku.php");
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
    header("Location: admin_buku.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Buku - Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="logo"><strong>PerpusDigital Admin</strong></div>
        <div class="menu">
            <a href="index.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h2>Tambah Buku Baru</h2>
        <form action="" method="post" style="margin-bottom: 30px;">
            <div class="form-group">
                <input type="text" name="judul" placeholder="Judul Buku" required>
            </div>
            <div class="form-group">
                <input type="text" name="penulis" placeholder="Penulis" required>
            </div>
            <div class="form-group">
                <select name="kategori_id" required style="width:100%; padding:0.8rem; border:1px solid #ddd;">
                    <?php foreach($kategori as $k): ?>
                        <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="number" name="stok" placeholder="Stok" required>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Tambah Buku</button>
        </form>

        <hr>

        <h2>Daftar Buku</h2>
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($buku as $b): ?>
                <tr>
                    <td><?= $b['judul']; ?></td>
                    <td><?= $b['penulis']; ?></td>
                    <td><?= $b['nama_kategori']; ?></td>
                    <td><?= $b['stok']; ?></td>
                    <td>
                        <a href="?hapus=<?= $b['id']; ?>" style="color:red;" onclick="return confirm('Hapus buku ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
