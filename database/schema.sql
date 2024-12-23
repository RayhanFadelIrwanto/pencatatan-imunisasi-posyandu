CREATE DATABASE IF NOT EXISTS imunisasi;

USE imunisasi;

-- Tabel untuk data imunisasi
CREATE TABLE IF NOT EXISTS imunisasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_anak VARCHAR(100) NOT NULL,
    usia INT NOT NULL,
    jenis_imunisasi VARCHAR(50) NOT NULL,
    status_imunisasi BOOLEAN NOT NULL,
    ip_address VARCHAR(45) NOT NULL,
    browser VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel untuk data pengguna
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
