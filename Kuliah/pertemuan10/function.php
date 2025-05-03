<?php 
    // koneksi ke database
    $koneksi = mysqli_connect("Localhost", "root", "", "zaki");

    function query($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // menambahkan data
    function tambah($data) {
        global $koneksi;
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$email', '$jurusan')";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
?>