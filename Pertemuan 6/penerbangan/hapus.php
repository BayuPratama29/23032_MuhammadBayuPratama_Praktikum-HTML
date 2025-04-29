<?php
include 'koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM rute WHERE id=$id");
header("Location: riwayat.php");
?>