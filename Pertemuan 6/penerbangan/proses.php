<?php
include 'koneksi.php';

$asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

$maskapai = $_POST['maskapai'];
$asalBandara = $_POST['asal'];
$tujuanBandara = $_POST['tujuan'];
$hargaTiket = $_POST['harga'];
$tanggal = date("Y-m-d");
$nomor = rand(10000,99999);

$pajakAsal = $asal[$asalBandara];
$pajakTujuan = $tujuan[$tujuanBandara];
$totalPajak = $pajakAsal + $pajakTujuan;
$totalHarga = $hargaTiket + $totalPajak;

$stmt = $koneksi->prepare("INSERT INTO rute (nomor, tanggal, maskapai, asal, tujuan, harga, pajak, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssii", $nomor, $tanggal, $maskapai, $asalBandara, $tujuanBandara, $hargaTiket, $totalPajak, $totalHarga);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Data Penerbangan</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Nomor</th><td><?= $nomor ?></td></tr>
                <tr><th>Tanggal</th><td><?= $tanggal ?></td></tr>
                <tr><th>Nama Maskapai</th><td><?= $maskapai ?></td></tr>
                <tr><th>Asal</th><td><?= $asalBandara ?></td></tr>
                <tr><th>Tujuan</th><td><?= $tujuanBandara ?></td></tr>
                <tr><th>Harga Tiket</th><td>Rp <?= number_format($hargaTiket, 0, ',', '.') ?></td></tr>
                <tr><th>Pajak</th><td>Rp <?= number_format($totalPajak, 0, ',', '.') ?></td></tr>
                <tr class="table-success"><th>Total Harga</th><td><strong>Rp <?= number_format($totalHarga, 0, ',', '.') ?></strong></td></tr>
            </table>
            <a href="riwayat.php" class="btn btn-primary">Lihat Riwayat</a>
        </div>
    </div>
</div>
</body>
</html>