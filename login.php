<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Laporin</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/png" href="assets/logoweb.png" />
  <style>
    .right {
      padding: 2rem;
      background-color: var(--form-bg);
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding-top: 4rem;
    }

    .form {
      width: 100%;
      max-width: 400px;
    }

    @media screen and (max-width: 768px) {
      .right {
        padding-top: 2rem;
      }
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet" />
</head>
<body>

<?php
if (isset($_SESSION['alert'])) {
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            toast: true,
            position: 'top',
            icon: 'warning',
            title: '" . $_SESSION['alert'] . "',
            showConfirmButton: false,
            timer: 4000,
            timerProgressBar: true,
            background: '#d4f5e1',
            color: '#1b5e20',
            iconColor: '#2e7d32'            
        });
    });
    </script>";
    unset($_SESSION['alert']);
}
?>

<nav class="navbar">
<div class="navbar-logo">
      <a href="index.php">
      <img src="assets/logo.jpg" alt="Logo Laporin" />
      </a>
    </div>
</nav>

<main class="container">
  <div class="right">
    <form class="form" action="koneksilogin.php" method="post">
      <h1 class="form-title">Login</h1>

      <div class="form-group">
        <label for="username">Nama Pengguna</label>
        <input type="text" id="username" name="Username" placeholder="Masukkan nama pengguna" required>
      </div>

      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" id="password" name="Password" placeholder="Masukkan kata sandi" required>
      </div>

      <button type="submit" class="btn btn-primary">Masuk</button>

      <div class="form-footer">
        <p>Belum punya akun? <a href="register.php">Sign in</a></p>
      </div>
    </form>
  </div>

  <div class="left">
    <img src="assets/bg.jpg" alt="Background" class="bg-img" />
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
