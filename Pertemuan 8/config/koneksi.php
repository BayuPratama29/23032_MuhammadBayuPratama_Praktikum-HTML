<?php
$koneksi = new mysqli("localhost", "root", "", "my_blog");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
