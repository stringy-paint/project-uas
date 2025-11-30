<?php
session_start();
require 'functions/function.php';
require 'koneksi.php';

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
             </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi ePub</title>

    <link rel="stylesheet" href="styles/style-login-register.css">
</head>

<body>

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

                <h2 style="margin-bottom: 8px; color: #111827;">Buat Akun Baru</h2>
                <p class="welcome-text">Bergabunglah dengan ribuan pembaca lainnya.</p>

                <form action="" method="post">
                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="fannwrld" autocomplete="off" required>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required>
                    </div>

                    <div class="input-group">
                        <label for="confirm-password">Konfirmasi Password</label>
                        <input type="password" name="password2" id="confirm-password" placeholder="••••••••" required>
                    </div>

                    <button type="submit" name="register" class="btn-primary">Daftar Sekarang</button>
                </form>

                <div class="bottom-link">
                    Sudah punya akun? <a href="login.php">Masuk di sini</a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script-login-register.js"></script>
</body>

</html>