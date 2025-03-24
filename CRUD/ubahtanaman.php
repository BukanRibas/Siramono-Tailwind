<?php
include_once("koneksi.php");

if (!isset($_GET['id'])) {
    die("ID tanaman tidak ditemukan!");
}

$id = $_GET['id'];
$query = "SELECT * FROM tb_tanaman WHERE id_tanaman = '$id'";
$result = mysqli_query($conn, $query);

$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Tanaman tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ubah Tanaman</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="alert alert-warning text-center">
        <h2>UBAH DATA TANAMAN SIRAMONO</h2>
    </div>
    <div class="container">
        <h1>Ubah Data Tanaman</h1>
        <form method="post" action="prosesubahtanaman.php">
            <input type="hidden" name="id_tanaman" value="<?= $data['id_tanaman'] ?>">
            <div class="form-group">
                <label for="kode_tanaman">Kode Tanaman</label>
                <input type="text" name="kode_tanaman" class="form-control" value="<?= $data['kode_tanaman'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_tanaman">Nama Tanaman</label>
                <input type="text" name="nama_tanaman" class="form-control" value="<?= $data['nama_tanaman'] ?>" required>
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
                    <option value="Otomatis" <?= $data['status_penyiraman'] == 'Otomatis' ? 'selected' : '' ?>>Otomatis</option>
                    <option value="Manual" <?= $data['status_penyiraman'] == 'Manual' ? 'selected' : '' ?>>Manual</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_tanam">Tanggal Tanam</label>
                <input type="date" name="tanggal_tanam" class="form-control" value="<?= $data['tanggal_tanam'] ?>" required>
            </div>
            <button type="submit" class="btn btn-warning">Ubah</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>