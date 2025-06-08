<?php
session_start();
include 'koneksi.php';

function ringkas_berita($text, $max_char = 240) {
    $text = strip_tags($text);
    if (strlen($text) > $max_char) {
        $text = substr($text, 0, $max_char) . '...';
    }
    return $text;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lapor-in - Berita</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/png" href="assets/logoweb.png" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet" />
  <script>
    function toggleMenu() {
      document.querySelector('.navbar-links').classList.toggle('active');
    }
    window.onload = function () {
      const currentLocation = location.href;
      const menuItem = document.querySelectorAll('.nav-link');
      menuItem.forEach(item => {
        if (item.href === currentLocation) {
          item.classList.add('active');
        }
      });
    };
  </script>
  <style>
    :root {
      --white: #ffffff;
      --form-bg: #f7f9f4;
      --border-color: #ddd;
      --text-muted: #777;
    }
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

    main.content {
  max-width: 1350px;
  margin: 3rem auto;
  background-color: var(--white);
  padding: 2.5rem 3rem;
  border-radius: 12px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
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


    h1 {
      font-size: 2rem;
      margin-bottom: 2rem;
      color: #000000;
      font-weight: 700;
    }

    .berita-list {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .berita-item {
      background-color: var(--white);
      padding: 1.5rem;
      border-radius: 12px;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 1.5rem;
      border: 1px solid var(--border-color);
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
    }

    .berita-item-content {
      flex: 1;
    }

    .berita-item h2 {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .berita-item h2 a {
      color: #7db855;
      text-decoration: none;
    }

    .berita-item h2 a:hover {
      text-decoration: underline;
    }

    .berita-item p {
      font-size: 17px;
      line-height: 1.7;
      color: #333;
    }

    .berita-item a {
      color: #7db855;
      font-size: 17px;
      font-weight: 600;
      text-decoration: none;
    }

    .berita-item a:hover {
      text-decoration: underline;
    }

    .berita-item small {
      color: var(--text-muted);
      font-size: 0.875rem;
      display: block;
      margin-bottom: 10px;
    }

    .berita-item img {
      width: 140px;
      height: 100px;
      object-fit: cover;
      border-radius: 10px;
    }

    @media (max-width: 768px) {
      .berita-item {
        flex-direction: column;
        align-items: flex-start;
      }

      .berita-item img {
        width: 100%;
        height: auto;
      }

      main.content {
        padding: 1.5rem 2rem;
        margin: 2rem 1rem;
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

  <main class="content">
    <h1>Berita Terbaru</h1>
    <div class="berita-list">
      <?php
      $query = mysqli_query($mysqli, "SELECT id, judul, isi, tanggal, penulis, gambar FROM berita ORDER BY tanggal DESC");
      if (mysqli_num_rows($query) == 0) {
        echo "<p>Belum ada berita terbaru.</p>";
      } else {
        while ($row = mysqli_fetch_assoc($query)) {
          $ringkasan = ringkas_berita($row['isi']);
          $judul = htmlspecialchars($row['judul']);
          $id = $row['id'];
          $tanggal = date('d M Y', strtotime($row['tanggal']));
          $penulis = htmlspecialchars($row['penulis']);
          $gambar = $row['gambar'];
          ?>
<article class="berita-item">
  <div class="berita-item-content">
    <h2><a href="detailberita.php?id=<?= $id ?>"><?= $judul ?></a></h2>
    <small><?= $penulis ?> , <?= $tanggal ?></small>
    <p><?= $ringkasan ?></p>
    <a href="detailberita.php?id=<?= $id ?>">Baca Selengkapnya →</a>
  </div>
  <?php if (!empty($gambar) && file_exists("uploads/" . $gambar)): ?>
    <img src="uploads/<?= htmlspecialchars($gambar) ?>" alt="Gambar <?= $judul ?>">
  <?php endif; ?>
</article>

          <hr />
        <?php
        }
      }
      ?>
    </div>
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
            <li><a href="https://wa.me/"><img src="assets/wa.svg" alt="WA">Whatsapp</a></li>
            <li><a href="https://www.instagram.com/morgen08.official/"><img src="assets/ig.svg" alt="IG">Instagram</a></li>
            <li><a href="https://tiktok.com/"><img src="assets/tt.svg" alt="TT">Tiktok</a></li>
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
