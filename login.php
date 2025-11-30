<?php
session_start();
require 'koneksi.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username 
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60 * 60 * 24);
                setcookie('key', hash('sha256', $row['username']), time() + 60 * 60 * 24);
            }

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ePub</title>
    <link rel="stylesheet" href="styles/style-login-register.css">
</head>

<body>

    <?php if (isset($error)) : ?>
        <script>
            alert('username atau password salah');
        </script>
    <?php endif; ?>

    <div class="login-container">
        <div class="left-panel">
            <div class="quote-box-wrapper" id="quote-wrapper">
                <p class="quote-text">"<span id="quote-content">Memuat kutipan...</span>"</p>
                <p class="quote-author">— <span id="quote-author">...</span></p>
            </div>
        </div>

        <div class="right-panel">
            <div class="form-wrapper">
                <div class="brand-logo">
                    <svg class="book-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.99 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                    </svg>
                    <span>ePub</span>
                </div>

                <h2 style="margin-bottom: 8px; color: #111827;">Selamat Datang Kembali</h2>
                <p class="welcome-text">Silakan masukkan detail akun Anda untuk mulai membaca.</p>

                <form action="" method="post">
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="fannwrld" autocomplete="off" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                    </div>

                    <div class="actions">
                        <label class="remember-me">
                            <input type="checkbox" name="remember"> Ingat saya
                        </label>
                        <a href="#" class="forgot-pass">Lupa password?</a>
                    </div>

                    <button type="submit" class="btn-login" name="login">Masuk</button>
                </form>

                <div class="signup-link">
                    Belum punya akun? <a href="register.php">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script-login-register.js"></script>
</body>

</html>