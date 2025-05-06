<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$nim = $_POST['nim'];
mysqli_query($koneksi, "INSERT INTO mahasiswa(nama, nim) VALUES('$nama','$nim')");
header("location:index.php");
?>