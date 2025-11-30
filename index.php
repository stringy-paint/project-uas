<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda ePub</title>
    <link rel="stylesheet" href="styles/style-home.css">
</head>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="brand-logo">
                <svg class="book-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.99 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z" />
                </svg>
                <span>ePub</span>
            </div>

            <div class="nav-menu">
                <a href="#" class="active">Beranda</a>
                <a href="#">Koleksi Saya</a>

                <button id="theme-toggle" class="btn-theme">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>

                <div class="user-profile">
                    <img src="https://ui-avatars.com/api/?name=User+Name&background=1e3a8a&color=fff" alt="User">
                    <span>Halo, <?= htmlspecialchars($_SESSION["username"]); ?></span>
                </div>
                <a href="logout.php" class="btn-logout">Keluar</a>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content">
            <h1>Temukan Jendela Dunia Berikutnya</h1>
            <p>Akses ribuan buku elektronik dari berbagai genre, kapan saja dan di mana saja.</p>
            <div class="search-bar">
                <input type="text" placeholder="Cari judul buku atau penulis...">
                <button>Cari</button>
            </div>
        </div>
    </header>

    <main class="main-content">
        <h2 class="section-title">Rekomendasi Minggu Ini</h2>

        <div class="book-grid">
            <div class="book-card">
                <div class="book-cover">
                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&q=80&w=800" alt="Cover Buku">
                </div>
                <div class="book-info">
                    <h3 class="book-title">Milk and Honey</h3>
                    <p class="book-author">Rupi Kaur</p>
                    <button class="btn-read">Baca Sekarang</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?auto=format&fit=crop&q=80&w=800" alt="Cover Buku">
                </div>
                <div class="book-info">
                    <h3 class="book-title">The Psychology of Money</h3>
                    <p class="book-author">Morgan Housel</p>
                    <button class="btn-read">Baca Sekarang</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&q=80&w=800" alt="Cover Buku">
                </div>
                <div class="book-info">
                    <h3 class="book-title">Atomic Habits</h3>
                    <p class="book-author">James Clear</p>
                    <button class="btn-read">Baca Sekarang</button>
                </div>
            </div>

            <div class="book-card">
                <div class="book-cover">
                    <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?auto=format&fit=crop&q=80&w=800" alt="Cover Buku">
                </div>
                <div class="book-info">
                    <h3 class="book-title">Design of Everyday Things</h3>
                    <p class="book-author">Don Norman</p>
                    <button class="btn-read">Baca Sekarang</button>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; 2025 ePub Digital Library. All rights reserved.</p>
    </footer>

    <script src="js/script-index.js"></script>
</body>

</html>