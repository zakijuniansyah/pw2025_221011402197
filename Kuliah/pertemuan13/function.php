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

    // menghapus data
    function hapus($id) {
        global $koneksi;
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    // mengubah data 
    function ubah($data) {
        global $koneksi;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $query = "UPDATE mahasiswa SET
                    nama = '$nama',
                    nim = '$nim',
                    email = '$email',
                    jurusan = '$jurusan'
                  WHERE id = $id";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    // mencari data
    function cari($keyword) {
        $query = "SELECT * FROM mahasiswa WHERE
                    nama LIKE '%$keyword%' OR
                    nim LIKE '%$keyword%' OR
                    email LIKE '%$keyword%' OR
                    jurusan LIKE '%$keyword%'
                ";
        return query($query);
    }

    // login
    function login($data) {
        global $koneksi;
        $username = htmlspecialchars($data["username"]);
        $password = htmlspecialchars($data["password"]);

        // cek username
        $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

        // cek username
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {

                // set session
                // $_SESSION["login"] = true;
                header("Location: latihan3.php");
                exit;
            } else {
                echo "<script>alert('Username atau Password salah!');</script>";
            }
        } else {
            echo "<script>alert('Username atau Password salah!');</script>";
        }
        return mysqli_affected_rows($koneksi);
    }

    // registrasi
    function registrasi($data) {
        global $koneksi;
        $username = htmlspecialchars($data["username"]);
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

        // cek username sudah ada
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('Username sudah terdaftar!');</script>";
            return false;
        }

        // cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>alert('Konfirmasi password tidak sesuai!');</script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$username', '$password')");

        return mysqli_affected_rows($koneksi);
    }
?>