<?php 
    // koneksi ke database
    require 'function.php';

    // cek apakah tombol registrasi sudah ditekan
    if(isset($_POST["registrasi"])){
        // cek apakah registrasi berhasil
        if(registrasi($_POST) > 0) {
            echo "<script>
                    alert('User baru berhasil ditambahkan!');
                    document.location.href = 'login.php';
                  </script>";
        } else {
            echo "<script>
                    alert('User baru gagal ditambahkan!');
                  </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <h3>Form Registrasi</h3>

    <form action="" method="post">
        <label>
            Username
            <input type="text" name="username" required autofocus autocomplete="off">
        </label>
        <br><br>
        <label>
            Password
            <input type="password" name="password" required autocomplete="off">
        </label>
        <br><br>
        <label>
            Konfirmasi Password
            <input type="text" name="password2" required autocomplete="off">
        </label>
        <br><br>
        <button type="submit" name="registrasi">Registrasi</button>
    </form>
</body>
</html>