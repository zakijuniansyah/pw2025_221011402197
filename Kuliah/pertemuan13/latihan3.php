<?php 
// session_start();
// // cek apakah user sudah login
// if(!isset($_SESSION["login"])) {
//     header("Location: login.php");
//     exit;
// }

require "function.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" placeholder="Masukkan keyword pencarian..." autocomplete="off" autofocus class="keyword">
        <button type="submit" name="cari" class="tombol-cari">Cari!</button>
    </form>
    <br>

    <div class="container">
    <table border="1" cellpadding="10" cellspasing="0">
        <tr>
            <th>#</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>

        <?php if (empty($mahasiswa)) : ?>
            <tr>
                <td colspan="4">
                    <p style="color: red; font-style: italic;">Data mahasiswa tidak ditemukan!</p>
                </td>
            </tr>
        <?php endif; ?>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $mhs["nim"]; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td>
                <a href="detail.php?id=<?= $mhs["id"]; ?>">Lihat Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <br>
    <script src="js/script.js"></script>
</body>
</html>