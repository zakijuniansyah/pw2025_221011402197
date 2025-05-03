<?php 
require "function.php";
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $_GET[id]");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <h3>Detail Mahasiswa</h3>.
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <li><?= $mhs["nim"]; ?></li>
        <li><?= $mhs["nama"]; ?></li>
        <li><?= $mhs["email"]; ?></li>
        <li><?= $mhs["jurusan"]; ?></li>
        <li><a href="">Ubah</a> | <a href="">Hapus</a></li>
        <li><a href="latihan2.php">Kembali Kehalaman Daftar Mahasiswa</a></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>