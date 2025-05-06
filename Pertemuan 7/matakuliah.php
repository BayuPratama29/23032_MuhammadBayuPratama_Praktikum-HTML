<?php
include 'db.php';

// Tambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $kodemk = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $sks = $_POST['jumlah_sks'];

    $stmt = $conn->prepare("INSERT INTO matakuliah (kodemk, nama, jumlah_sks) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $kodemk, $nama, $sks);
    $stmt->execute();
    $stmt->close();
    header("Location: matakuliah.php");
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $kodemk = $_GET['hapus'];
    $conn->query("DELETE FROM matakuliah WHERE kodemk='$kodemk'");
    header("Location: matakuliah.php");
    exit;
}

$result = $conn->query("SELECT * FROM matakuliah");
?>
<!DOCTYPE html>
<html>
<head><title>Data Mata Kuliah</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Data Mata Kuliah</h1>
<a href="index.php">← Kembali</a>
<table>
    <tr><th>Kode MK</th><th>Nama</th><th>SKS</th><th>Aksi</th></tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['kodemk'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jumlah_sks'] ?></td>
        <td><a href="?hapus=<?= $row['kodemk'] ?>" onclick="return confirm('Hapus?')">Hapus</a></td>
    </tr>
    <?php } ?>
</table>

<h2>Tambah Mata Kuliah</h2>
<form method="POST">
    <input name="kodemk" placeholder="Kode MK" required><br>
    <input name="nama" placeholder="Nama Mata Kuliah" required><br>
    <input type="number" name="jumlah_sks" placeholder="Jumlah SKS" required><br>
    <button name="tambah">Simpan</button>
</form>
</body>
</html>
