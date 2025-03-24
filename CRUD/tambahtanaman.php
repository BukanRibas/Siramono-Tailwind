<?php
include_once("koneksi.php");

// Ambil kode tanaman terakhir
$query = "SELECT kode_tanaman FROM tb_tanaman ORDER BY id_tanaman DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error saat mengambil kode tanaman terakhir: " . mysqli_error($conn));
}

$data = mysqli_fetch_array($result);

if ($data) {
    $lastNumber = (int)substr($data['kode_tanaman'], -3);
    $newNumber = $lastNumber + 1;
} else {
    $newNumber = 1;
}

$kode_tanaman = "T" . str_pad($newNumber, 3, "0", STR_PAD_LEFT);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Tanaman</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="alert alert-success text-center">
        <h2>DATA KOLEKSI TANAMAN SIRAMONO</h2>
    </div>
    <div class="container">
        <h1>Tambah Koleksi Tanaman</h1>
        <form method="post" action="prosestambahtanaman.php">
            <div class="form-group">
                <label for="kode_tanaman">Kode Tanaman</label>
                <input type="text" name="kode_tanaman" class="form-control" value="<?= $kode_tanaman ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_tanaman">Nama Tanaman</label>
                <input type="text" name="nama_tanaman" class="form-control" placeholder="Nama Tanaman" required>
            </div>
            <div class="form-group">
                <label for="jenis_tanaman">Jenis Tanaman</label>
                <select name="jenis_tanaman" class="form-control" required>
                    <option value="Tanaman Hias Daun">Tanaman Hias Daun</option>
                    <option value="Tanaman Hias Bunga">Tanaman Hias Bunga</option>
                    <option value="Tanaman Hias Gantung">Tanaman Hias Gantung</option>
                    <option value="Tanaman Hias Air">Tanaman Hias Air</option>
                    <option value="Tanaman Hias Sukulen dan Kaktus">Tanaman Hias Sukulen dan Kaktus</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status_penyiraman">Status Penyiraman</label>
                <select name="status_penyiraman" class="form-control" required>
                    <option value="Otomatis">Otomatis</option>
                    <option value="Manual">Manual</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_tanam">Tanggal Tanam</label>
                <input type="date" name="tanggal_tanam" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>