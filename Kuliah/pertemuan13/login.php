<?php 
    // session_start();

    // // cek apakah user sudah login
    // if(isset($_SESSION["login"])) {
    //     header("Location: latihan3.php");
    //     exit;
    // }

    // koneksi ke database
    require 'function.php';

    // cek apakah tombol login sudah ditekan
    if(isset($_POST["login"])){
        if(login($_POST)) {
            header("Location: latihan3.php");
            exit;
        } else {
            $error = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>Form Login</h3>

    <?php if(isset($error)): ?>
        <p style="color: red; font-style: italic;">Username / Password salah</p>
    <?php endif; ?>

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
        <button type="submit" name="login">Login</button>
        <br><br>
        <button type="submit"><a href="registrasi.php" style="text-decoration: none; color:black">Registrasi</a></button>
    </form>
</body>
</html>