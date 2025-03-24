<?php
include_once("./CRUD/koneksi.php"); // Koneksi ke database

$query = "SELECT jenis_tanaman, COUNT(*) as jumlah FROM tb_tanaman GROUP BY jenis_tanaman";
$result = mysqli_query($conn, $query);

$data = [
  'jenis_tanaman' => [],
  'jumlah_tanaman' => []
];

while ($row = mysqli_fetch_assoc($result)) {
  $data['jenis_tanaman'][] = $row['jenis_tanaman'];
  $data['jumlah_tanaman'][] = $row['jumlah'];
}

header('Content-Type: application/json');
echo json_encode($data);
