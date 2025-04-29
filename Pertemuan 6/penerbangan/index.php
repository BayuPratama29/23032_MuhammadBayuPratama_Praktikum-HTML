<?php
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

ksort($asal);
ksort($tujuan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Penerbangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Pendaftaran Rute Penerbangan</h4>
        </div>
        <div class="card-body">
            <form action="proses.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Maskapai</label>
                    <input type="text" name="maskapai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bandara Asal</label>
                    <select name="asal" class="form-select" required>
                        <?php foreach($asal as $nama => $pajak): ?>
                            <option value="<?= $nama ?>"><?= $nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bandara Tujuan</label>
                    <select name="tujuan" class="form-select" required>
                        <?php foreach($tujuan as $nama => $pajak): ?>
                            <option value="<?= $nama ?>"><?= $nama ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Tiket</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Kirim</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>