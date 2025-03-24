<?php
include_once("koneksi.php");
$query = "SELECT * FROM tb_tanaman ORDER BY tanggal_tanam DESC";
$hasil = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Tanaman - Siramono</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    <div class="alert alert-success text-center">
      <h2>DAFTAR TANAMAN SIRAMONO (TERURUT BERDASARKAN TANGGAL)</h2>
    </div>
    <a href="tambahtanaman.php" class="btn btn-primary mb-3">Tambah Tanaman</a>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Nama Tanaman</th>
          <th>Jenis Tanaman</th>
          <th>Tanggal Tanam</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($data = mysqli_fetch_array($hasil)) : ?>
          <tr>
            <td><?= $data['id_tanaman']; ?></td>
            <td><?= $data['nama_tanaman']; ?></td>
            <td><?= $data['jenis']; ?></td>
            <td><?= $data['tanggal_tanam']; ?></td>
            <td>
              <a href="ubahtanaman.php?id=<?= $data['id_tanaman']; ?>" class="btn btn-warning btn-sm">Ubah</a>
              <a href="hapustanaman.php?id=<?= $data['id_tanaman']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>

</html>