<?php
include 'db.php';

// Tambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $stmt = $conn->prepare("INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $npm, $nama, $jurusan, $alamat);
    $stmt->execute();
    $stmt->close();
    header("Location: mahasiswa.php");
    exit;
}

// Hapus data
if (isset($_GET['hapus'])) {
    $npm = $_GET['hapus'];
    $conn->query("DELETE FROM mahasiswa WHERE npm='$npm'");
    header("Location: mahasiswa.php");
    exit;
}

$result = $conn->query("SELECT * FROM mahasiswa");
?>
<!DOCTYPE html>
<html>
<head><title>Data Mahasiswa</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Data Mahasiswa</h1>
<a href="index.php">← Kembali</a>
<table>
    <tr><th>NPM</th><th>Nama</th><th>Jurusan</th><th>Alamat</th><th>Aksi</th></tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['npm'] ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['jurusan'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><a href="?hapus=<?= $row['npm'] ?>" onclick="return confirm('Hapus?')">Hapus</a></td>
    </tr>
    <?php } ?>
</table>

<h2>Tambah Mahasiswa</h2>
<form method="POST">
    <input name="npm" placeholder="NPM" required><br>
    <input name="nama" placeholder="Nama" required><br>
    <select name="jurusan">
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Operasi">Sistem Operasi</option>
    </select><br>
    <textarea name="alamat" placeholder="Alamat"></textarea><br>
    <button name="tambah">Simpan</button>
</form>
</body>
</html>
