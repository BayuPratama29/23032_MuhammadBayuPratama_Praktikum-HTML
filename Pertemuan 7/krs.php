<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];

    $stmt = $conn->prepare("INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES (?, ?)");
    $stmt->bind_param("ss", $npm, $kodemk);
    $stmt->execute();
    $stmt->close();
    header("Location: krs.php");
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM krs WHERE id=$id");
    header("Location: krs.php");
    exit;
}

$krs = $conn->query("SELECT krs.id, mahasiswa.nama AS mahasiswa, matakuliah.nama AS matakuliah 
                     FROM krs 
                     JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm 
                     JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk");

$mhs = $conn->query("SELECT npm, nama FROM mahasiswa");
$mk = $conn->query("SELECT kodemk, nama FROM matakuliah");
?>
<!DOCTYPE html>
<html>
<head><title>Data KRS</title><link rel="stylesheet" href="style.css"></head>
<body>
<h1>Data KRS</h1>
<a href="index.php">← Kembali</a>
<table>
    <tr><th>Nama Mahasiswa</th><th>Mata Kuliah</th><th>Aksi</th></tr>
    <?php while ($row = $krs->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['mahasiswa'] ?></td>
        <td><?= $row['matakuliah'] ?></td>
        <td><a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a></td>
    </tr>
    <?php } ?>
</table>

<h2>Tambah KRS</h2>
<form method="POST">
    <select name="mahasiswa_npm">
        <?php while ($row = $mhs->fetch_assoc()) { ?>
            <option value="<?= $row['npm'] ?>"><?= $row['nama'] ?> (<?= $row['npm'] ?>)</option>
        <?php } ?>
    </select><br>
    <select name="matakuliah_kodemk">
        <?php while ($row = $mk->fetch_assoc()) { ?>
            <option value="<?= $row['kodemk'] ?>"><?= $row['nama'] ?> (<?= $row['kodemk'] ?>)</option>
        <?php } ?>
    </select><br>
    <button name="tambah">Simpan</button>
</form>
</body>
</html>
