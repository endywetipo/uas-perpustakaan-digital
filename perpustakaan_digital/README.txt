PETUNJUK INSTALASI - SISTEM MANAJEMEN PERPUSTAKAAN DIGITAL

Program ini dibuat untuk memenuhi tugas UAS Pemrograman Web.
Teknologi: HTML, PHP, CSS, JavaScript, MySQL (MariaDB).

Langkah-langkah Instalasi:
1. Ekstrak file ZIP ke dalam folder server lokal Anda (misalnya htdocs untuk XAMPP).
2. Buka phpMyAdmin (http://localhost/phpmyadmin).
3. Buat database baru dengan nama 'perpustakaan'.
4. Import file 'database.sql' ke dalam database 'perpustakaan' tersebut.
5. Akses program melalui browser di: http://localhost/perpustakaan_digital/login.php

Data Login Default:
Admin:
- Username: admin
- Password: admin123

User:
- Username: user1
- Password: user123

Fitur Utama:
- Login Multi-user (Admin & User)
- Katalog Buku dengan filter kategori
- Manajemen Buku oleh Admin (Tambah & Hapus)
- Sistem Peminjaman Buku Otomatis (Mengurangi stok)
- Riwayat Peminjaman User
- Desain Responsive menggunakan CSS murni
