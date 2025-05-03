<?php 
// koneksi ke database
require "function.php";

// cek apakah id ada di url
if(!isset($_GET["id"])){
    header("Location: latihan3.php");
    exit;
}

// ambil id dari url
$id = $_GET["id"];

$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo "<script>
                alert('Data Berhasil Diubah!');
                document.location.href = 'latihan3.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Diubah!');
                document.location.href = 'ubah.php';
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
    <h3>From Ubah Data Mahasiswa</h3>
    <form action="" method="post">
        <input type="" name="id" value="<?= $mahasiswa["id"]; ?>" hidden>
        <label>
            Nama :
            <input type="text" name="nama" autofocus value="<?= $mahasiswa["nama"]; ?>">
        </label>
        <br><br>
        <label>
            Nim :
            <input type="text" name="nim" value="<?= $mahasiswa["nim"]; ?>">
        </label>
        <br><br>
        <label>
            Email :
            <input type="text" name="email" value="<?= $mahasiswa["email"]; ?>">
        </label>
        <br><br>
        <label>
            Jurusan :
            <input type="text" name="jurusan" value="<?= $mahasiswa["jurusan"]; ?>">
        </label>
        <br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>