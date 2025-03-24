<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanamanku</title>
</head>

<body>

    <h2>Tanamanku - Manajemen Penyiraman</h2>

    <nav>
        <a href="?page=index">Lihat Data</a> |
        <a href="?page=tambah">Tambah Tanaman</a> |
        <a href="?page=ubah&id=1">Ubah Tanaman</a>
    </nav>

    <div>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == "index") {
                include("CRUD/index.php");
            } elseif ($page == "tambah") {
                include("CRUD/tambahtanaman.php");
            } elseif ($page == "ubah" && isset($_GET['id'])) {
                include("CRUD/ubahtanaman.php");
            } else {
                echo "Halaman tidak ditemukan.";
            }
        } else {
            echo "<p>Silakan pilih menu di atas.</p>";
        }
        ?>
    </div>

</body>

</html>