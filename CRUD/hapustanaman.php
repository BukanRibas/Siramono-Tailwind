<?php
include_once("koneksi.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tb_tanaman WHERE id_tanaman=$id";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Gagal menghapus tanaman: " . mysqli_error($conn);
    }
}
