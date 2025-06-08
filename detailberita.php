<?php
session_start();
include 'koneksi.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: berita.php");
    exit;
}

$id = intval($_GET['id']);

$query = mysqli_prepare($mysqli, "SELECT judul, isi, tanggal, penulis, gambar FROM berita WHERE id = ?");
mysqli_stmt_bind_param($query, "i", $id);
mysqli_stmt_execute($query);
$result = mysqli_stmt_get_result($query);

if (mysqli_num_rows($result) == 0) {
    echo "Berita tidak ditemukan.";
    exit;
}

$berita = mysqli_fetch_assoc($result);
$judul = htmlspecialchars($berita['judul']);
$isi = nl2br(htmlspecialchars($berita['isi']));
$tanggal = date('d M Y', strtotime($berita['tanggal']));
$penulis = htmlspecialchars($berita['penulis']);
$gambar = $berita['gambar'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $judul ?> - Lapor-in Berita</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/png" href="assets/logoweb.png" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: #D9FFBF;
      min-height: 100vh;
      overflow-x: hidden;
      overflow-y: auto;
      font-family: 'Plus Jakarta Sans', sans-serif;
      margin: 0;
      padding: 0;
    }

    .navbar {
      position: sticky;
      top: 0;
      z-index: 1000;
      background-color: var(--white);
      padding: 1rem 2rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .right {
      padding: 2rem;
      background-color: var(--form-bg);
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-top: 4rem;
    }

    .back-button {
      display: flex;
      align-items: center;
      font-size: 15px;
      margin: 2rem auto 1rem auto;
      max-width: 1080px;
      color: #333;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease-in-out;
    }

    .back-button::before {
      content: '←';
      margin-right: 8px;
      font-size: 18px;
    }

    .back-button:hover {
      transform: translateX(-4px);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      background-color: #e6f4e6;
      border-radius: 6px;
      padding: 4px 8px;
    }

    .content {
      background-color: #ffffff;
      padding: 2rem;
      border-radius: 20px;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
      margin: 0 auto 4rem auto;
      max-width: 1100px;

      opacity: 0;
      transform: translateY(20px);
      animation: fadeInUp 0.5s forwards;
      transition: all 0.3s ease-in-out;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .content h1 {
      font-size: 30px;
      font-weight: 700;
      margin-bottom: 0.5rem;
      color: #111;
    }

    .content small {
      color: #666;
      font-size: 14px;
      display: block;
      margin-bottom: 1.5rem;
    }

    .content img {
      border-radius: 12px;
      width: 100%;
      height: auto;
      margin: 20px 0;
    }

    .content article {
      font-size: 16.5px;
      color: #333;
      line-height: 1.8;
      margin-top: 20px;
    }

    .content .back-link {
      display: inline-block;
      margin-top: 2.5rem;
      font-size: 14px;
      color: #2e7d32;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .content .back-link:hover {
      text-decoration: underline;
      color: #1b5e20;
    }

    @media (max-width: 768px) {
      .content {
        padding: 1.5rem;
        max-width: 95%;
      }

      .back-button {
        max-width: 95%;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
  <div class="navbar-logo">
      <a href="index.php">
      <img src="assets/logo.jpg" alt="Logo Laporin" />
      </a>
    </div>
    <div class="hamburger" onclick="toggleMenu()">
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>
    <ul class="navbar-links">
      <li><a href="index.php" class="nav-link">Beranda</a></li>
      <li><a href="tambahlapor.php" class="nav-link">Laporkan</a></li>
      <li><a href="berita.php" class="nav-link active">Berita</a></li>
      <?php if (isset($_SESSION['username'])): ?>
        <li><a href="logout.php" class="btn-logout">Logout</a></li>
      <?php else: ?>
        <li><a href="login.php" class="btn-login">Log in</a></li>
        <li><a href="register.php" class="btn-signup">Sign up</a></li>
      <?php endif; ?>
    </ul>
    <div class="navbar-auth">
      <?php if (isset($_SESSION['username'])): ?>
        <span class="user-welcome">Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
        <a href="logout.php" class="btn-logout">Logout</a>
      <?php else: ?>
        <a href="login.php" class="btn-login">Log in</a>
        <a href="register.php" class="btn-signup">Sign up</a>
      <?php endif; ?>
    </div>
  </nav>

  <a href="berita.php" class="back-button">Kembali</a>
  <main class="content">
    <h1><?= $judul ?></h1>
    <small><?= $tanggal ?> , <?= $penulis ?></small>
    <?php if (!empty($gambar) && file_exists("uploads/" . $gambar)): ?>
      <div>
        <img src="uploads/<?= htmlspecialchars($gambar) ?>" alt="Gambar <?= $judul ?>">
      </div>
    <?php endif; ?>
    <article><?= $isi ?></article>
    <p><a href="berita.php" class="back-link">&larr; Kembali ke Berita</a></p>
  </main>

  <footer class="footer">
    <div class="footer-left">
      <span>© 2025 Lapor-in</span>
    </div>
    <div class="footer-center">
      <div class="footer-logo-title">
        <img src="assets/logo-2.png" alt="Logo Laporin" class="footer-logo" />
        <h2 class="footer-title">Lapor-in</h2>
      </div>
      <div class="footer-right">
        <div class="footer-section">
          <h3>Kontak Kami</h3>
          <ul>
            <li><a href="https://wa.me/6285733530629"><img src="assets/wa.svg" alt="WA">Whatsapp</a></li>
            <li><a href="https://www.instagram.com/morgen08.official/"><img src="assets/ig.svg" alt="IG">Instagram</a></li>
            <li><a href="https://tiktok.com/@pemuda.kartar08"><img src="assets/tt.svg" alt="TT">Tiktok</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Lapor-in</h3>
          <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tambahlapor.php">Laporkan</a></li>
            <li><a href="berita.php">Berita</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
