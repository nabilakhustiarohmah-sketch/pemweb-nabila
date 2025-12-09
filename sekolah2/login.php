<?php
session_start();
include'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil data user berdasarkan email
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    // Cek apakah email ditemukan
    if ($data) {

        // Verifikasi password
        if (password_verify($password, $data['password'])) {

            // Simpan sesi user
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['username'];

        if (isset($_SESSION['user_id'])){
            header("Location: index.php");
        }  

        } else {
            $error = "Password salah!";
        }

    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Akun</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Login</h2>

    <?php if (!empty($error)) { ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php } ?>

    <?php if (!empty($success)) { ?>
        <p style="color:green;"><?php echo $success; ?></p>
    <?php } ?>

<form method="POST">

    <div class ="inputBox">
        <input type="text" name="username" placeholder="username" required>
    </div>

    <div class ="inputBox">
        <input type="text" name="password" placeholder="password" required>
    </div>

    <button type="submit" name="login">Login</button>
</form>

<p>Belum punya akun? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
