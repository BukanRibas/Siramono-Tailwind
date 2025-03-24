<?php
include_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tanaman = $_POST['id_tanaman'];
    $nama_tanaman = $_POST['nama_tanaman'];
    $jenis_tanaman = $_POST['jenis_tanaman'];
    $status_penyiraman = $_POST['status_penyiraman'];
    $tanggal_tanam = $_POST['tanggal_tanam'];

    $query = "UPDATE tb_tanaman SET 
                nama_tanaman='$nama_tanaman', 
                jenis_tanaman='$jenis_tanaman', 
                status_penyiraman='$status_penyiraman', 
                tanggal_tanam='$tanggal_tanam' 
              WHERE id_tanaman='$id_tanaman'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
