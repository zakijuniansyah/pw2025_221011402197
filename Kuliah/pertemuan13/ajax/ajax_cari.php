<?php 
require '../function.php';

$keyword = $_GET["keyword"];
$mahasiswa = cari($keyword);
?>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>#</th>
        <th>NIM</th>
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
