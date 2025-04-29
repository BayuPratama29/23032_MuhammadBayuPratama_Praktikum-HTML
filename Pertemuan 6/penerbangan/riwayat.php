<?php
include 'koneksi.php';
$data = $koneksi->query("SELECT * FROM rute ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Riwayat Penerbangan</h3>
    <a href="index.php" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Maskapai</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Harga</th>
                <th>Pajak</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $no => $row): ?>
            <tr>
                <td><?= $no+1 ?></td>
                <td><?= $row['maskapai'] ?></td>
                <td><?= $row['asal'] ?></td>
                <td><?= $row['tujuan'] ?></td>
                <td><?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?= number_format($row['pajak'], 0, ',', '.') ?></td>
                <td><?= number_format($row['total'], 0, ',', '.') ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>