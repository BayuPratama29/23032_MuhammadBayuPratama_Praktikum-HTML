CREATE DATABASE IF NOT EXISTS penerbangan;
USE penerbangan;

CREATE TABLE IF NOT EXISTS rute (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomor VARCHAR(20),
    tanggal DATE,
    maskapai VARCHAR(100),
    asal VARCHAR(100),
    tujuan VARCHAR(100),
    harga INT,
    pajak INT,
    total INT
);