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
        <li><a href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a> | <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a></li>
        <li><a href="latihan3.php">Kembali Kehalaman Daftar Mahasiswa</a></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>