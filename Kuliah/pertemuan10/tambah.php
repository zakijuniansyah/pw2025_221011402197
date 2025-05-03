<?php 
// koneksi ke database
require "function.php";
// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo "<script>
                alert('Data Berhasil Ditambahkan!');
                document.location.href = 'latihan3.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan!');
                document.location.href = 'tambah.php';
              </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>From Tambah Data Mahasiswa</h3>
    <form action="" method="post">
        <label>
            Nama :
            <input type="text" name="nama" autofocus>
        </label>
        <br><br>
        <label>
            NIM :
            <input type="text" name="nim">
        </label>
        <br><br>
        <label>
            Email :
            <input type="text" name="email">
        </label>
        <br><br>
        <label>
            Jurusan :
            <input type="text" name="jurusan">
        </label>
        <br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>