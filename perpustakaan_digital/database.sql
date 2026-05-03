CREATE DATABASE IF NOT EXISTS perpustakaan;
USE perpustakaan;

-- Tabel Users
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel Kategori
CREATE TABLE IF NOT EXISTS kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL
);

-- Tabel Buku
CREATE TABLE IF NOT EXISTS buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kategori_id INT,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100),
    tahun_terbit YEAR,
    stok INT DEFAULT 0,
    gambar VARCHAR(255),
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE SET NULL
);

-- Tabel Peminjaman
CREATE TABLE IF NOT EXISTS peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    buku_id INT,
    tanggal_pinjam DATE NOT NULL,
    tanggal_kembali DATE,
    status ENUM('dipinjam', 'dikembalikan') DEFAULT 'dipinjam',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (buku_id) REFERENCES buku(id) ON DELETE CASCADE
);

-- Data Awal
INSERT INTO users (username, password, nama_lengkap, role) VALUES 
('admin', 'admin123', 'Administrator Perpustakaan', 'admin'),
('user1', 'user123', 'Budi Santoso', 'user');

INSERT INTO kategori (nama_kategori) VALUES ('Teknologi'), ('Sastra'), ('Sains'), ('Sejarah');

INSERT INTO buku (kategori_id, judul, penulis, penerbit, tahun_terbit, stok) VALUES 
(1, 'Pemrograman Web Dasar', 'Andi', 'Informatika', 2023, 10),
(1, 'Belajar PHP Tanpa Framework', 'Budi', 'Erlangga', 2022, 5),
(2, 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005, 8);
