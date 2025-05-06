
-- Membuat database
CREATE DATABASE kuliah;
USE kuliah;

-- Tabel mahasiswa
CREATE TABLE mahasiswa (
    npm CHAR(13) PRIMARY KEY,
    nama VARCHAR(50),
    jurusan ENUM('Teknik Informatika', 'Sistem Operasi'),
    alamat TEXT
);

-- Tabel matakuliah
CREATE TABLE matakuliah (
    kodemk CHAR(6) PRIMARY KEY,
    nama VARCHAR(50),
    jumlah_sks INT(3)
);

-- Tabel krs
CREATE TABLE krs (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_npm CHAR(13),
    matakuliah_kodemk CHAR(6),
    FOREIGN KEY (mahasiswa_npm) REFERENCES mahasiswa(npm),
    FOREIGN KEY (matakuliah_kodemk) REFERENCES matakuliah(kodemk)
);
