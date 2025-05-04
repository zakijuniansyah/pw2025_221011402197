<?php 
// koneksi ke database
require "function.php";

// cek apakah id sudah ada
if(!isset($_GET["id"])){
    header("Location: latihan3.php");
    exit;
}

// ambil id dari url
$id = $_GET["id"];

if(hapus($id) > 0) {
    echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'latihan3.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'latihan3.php';
        </script>
    ";
}
?>