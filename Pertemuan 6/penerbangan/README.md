# Aplikasi Pendaftaran Rute Penerbangan (PHP + MySQL)

Aplikasi ini dibuat untuk mencatat data penerbangan seperti nama maskapai, bandara asal dan tujuan, harga tiket, serta menghitung pajak dan total harga secara otomatis.

## 📦 Fitur

- Form input maskapai & rute penerbangan  
- Hitung pajak dinamis berdasarkan bandara  
- Simpan data ke database MySQL  
- Tampilkan riwayat penerbangan  
- Edit & hapus data  
- Antarmuka dengan Bootstrap (responsive)  

## 🛠️ Cara Menjalankan (menggunakan XAMPP)

### 1. Ekstrak dan Pindahkan Folder  
Ekstrak `penerbangan_app_lengkap.zip`, lalu pindahkan folder hasil ekstraksi ke:
C:\xampp\htdocs\penerbangan

### 2. Jalankan XAMPP  
Buka **XAMPP Control Panel**, lalu aktifkan:  
- Apache  
- MySQL  

### 3. Import Database  
1. Buka browser dan kunjungi [http://localhost/phpmyadmin](http://localhost/phpmyadmin)  
2. Klik tab **Import**  
3. Pilih file `penerbangan.sql`  
4. Klik **Go**  

### 4. Jalankan Aplikasi  
Akses melalui browser:  
http://localhost/penerbangan/index.php
Untuk melihat riwayat data:  
http://localhost/penerbangan/riwayat.php

## 🧱 Struktur File

- `index.php`     : Form input penerbangan  
- `proses.php`    : Proses input & simpan ke database  
- `riwayat.php`   : Tampilkan seluruh data rute  
- `edit.php`      : Edit data rute  
- `hapus.php`     : Hapus data  
- `koneksi.php`   : File koneksi ke MySQL  
- `penerbangan.sql`: File SQL untuk import database  
- `README.md`     : Dokumentasi panduan ini  

## 🤝 Lisensi  
Proyek ini untuk keperluan pembelajaran mata kuliah PBW (Pemrograman Berbasis Web) – Universitas Singaperbangsa Karawang.  
