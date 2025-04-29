<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM rute WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maskapai = $_POST['maskapai'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $harga = $_POST['harga'];

    $asalList = ["Soekarno Hatta" => 65000, "Husein Sastranegara" => 50000, "Abdul Rachman Saleh" => 40000, "Juanda" => 30000];
    $tujuanList = ["Ngurah Rai" => 85000, "Hasanuddin" => 70000, "Inanwatan" => 90000, "Sultan Iskandar Muda" => 60000];

    $pajak = $asalList[$asal] + $tujuanList[$tujuan];
    $total = $harga + $pajak;

    $koneksi->query("UPDATE rute SET maskapai='$maskapai', asal='$asal', tujuan='$tujuan', harga='$harga', pajak='$pajak', total='$total' WHERE id=$id");
    header("Location: riwayat.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Rute</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3>Edit Rute</h3>
    <form method="POST">
        <div class="mb-3">
            <label>Maskapai</label>
            <input type="text" name="maskapai" class="form-control" value="<?= $data['maskapai'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Asal</label>
            <select name="asal" class="form-select">
                <?php foreach (["Soekarno Hatta", "Husein Sastranegara", "Abdul Rachman Saleh", "Juanda"] as $val): ?>
                    <option value="<?= $val ?>" <?= $val == $data['asal'] ? 'selected' : '' ?>><?= $val ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Tujuan</label>
            <select name="tujuan" class="form-select">
                <?php foreach (["Ngurah Rai", "Hasanuddin", "Inanwatan", "Sultan Iskandar Muda"] as $val): ?>
                    <option value="<?= $val ?>" <?= $val == $data['tujuan'] ? 'selected' : '' ?>><?= $val ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Harga Tiket</label>
            <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>" required>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a href="riwayat.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>