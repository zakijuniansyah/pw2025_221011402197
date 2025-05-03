<?php 
    // koneksi ke database
    $koneksi = mysqli_connect("Localhost", "root", "", "zaki");
    // query isi tabel mahasiswa
    $result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    $mahasiswa = $rows;
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
    <table border="1" cellpadding="10" cellspasing="0">
        <tr>
            <th>#</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $mhs["nim"]; ?></td>
            <td><?= $mhs["nama"]; ?></td>
            <td><?= $mhs["email"]; ?></td>
            <td><?= $mhs["jurusan"]; ?></td>
            <td>
                <a href="">Ubah</a> |
                <a href="">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>