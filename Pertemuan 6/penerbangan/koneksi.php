<?php
$koneksi = new mysqli("localhost", "root", "", "penerbangan");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>