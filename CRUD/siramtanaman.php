<?php
include_once("koneksi.php");

if (isset($_GET['id'])) {
  $id_tanaman = $_GET['id'];

  // Update status penyiraman di database
  $query = "UPDATE tb_tanaman SET status_penyiraman='Sudah Disiram' WHERE id_tanaman='$id_tanaman'";
  $hasil = mysqli_query($conn, $query);

  if ($hasil) {
    echo "<script>alert('Tanaman telah disiram!'); window.location='indexcreateurut.php';</script>";
  } else {
    echo "<script>alert('Gagal menyiram tanaman.'); window.location='indexcreateurut.php';</script>";
  }
} else {
  echo "<script>alert('ID tanaman tidak ditemukan.'); window.location='indexcreateurut.php';</script>";
}
