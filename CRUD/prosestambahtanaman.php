<?php
include_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_tanaman = mysqli_real_escape_string($conn, $_POST['nama_tanaman']);
    $jenis_tanaman = mysqli_real_escape_string($conn, $_POST['jenis_tanaman']);
    $tanggal_tanam = mysqli_real_escape_string($conn, $_POST['tanggal_tanam']);
    $status_penyiraman = mysqli_real_escape_string($conn, $_POST['status_penyiraman']);

    // Generate kode tanaman otomatis
    $queryKode = "SELECT kode_tanaman FROM tb_tanaman ORDER BY id_tanaman DESC LIMIT 1";
    $resultKode = mysqli_query($conn, $queryKode);

    if (!$resultKode) {
        die("Error saat mengambil kode tanaman terakhir: " . mysqli_error($conn));
    }

    $dataKode = mysqli_fetch_array($resultKode);
    if ($dataKode) {
        $lastNumber = (int)substr($dataKode['kode_tanaman'], -3);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    $kode_tanaman = "T" . str_pad($newNumber, 3, "0", STR_PAD_LEFT);

    // Query untuk memasukkan data ke database
    $query = "INSERT INTO tb_tanaman (nama_tanaman, jenis_tanaman, tanggal_tanam, status_penyiraman, kode_tanaman) 
              VALUES ('$nama_tanaman', '$jenis_tanaman', '$tanggal_tanam', '$status_penyiraman', '$kode_tanaman')";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menambahkan tanaman: " . mysqli_error($conn);
    }
}
