<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Edit Data Mahasiswa</h2>
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $d['nama']; ?>"><br>
        NIM: <input type="text" name="nim" value="<?php echo $d['nim']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</div>
</body>
</html>