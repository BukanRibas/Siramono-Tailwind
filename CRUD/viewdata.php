<?php
include_once("koneksi.php");

$query = "SELECT * FROM tb_tanaman";
$hasil = mysqli_query($conn, $query);

if (mysqli_num_rows($hasil) > 0) {
	while ($data = mysqli_fetch_array($hasil)) {
		echo "Nama Tanaman: " . $data['nama_tanaman'] . "<br/>";
		echo "Jenis: " . $data['jenis'] . "<br/>";
		echo "Usia: " . $data['usia'] . " bulan<br/>";
		echo "Lokasi: " . $data['lokasi'] . "<br/>";
		echo "<hr/>";
	}
} else {
	echo "Tidak ada data tanaman.";
}
