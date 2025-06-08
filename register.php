<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Laporin</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/png" href="assets/logoweb.png" />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: var(--white);
      min-height: 100vh;
      overflow-x: hidden;
      overflow-y: auto;
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
  </style>
</head>
<body>

<nav class="navbar">
<div class="navbar-logo">
      <a href="index.php">
      <img src="assets/logo.jpg" alt="Logo Laporin" />
      </a>
    </div>
</nav>

<main class="container">
  <div class="right">
    <form class="form" action="register.php" method="post">
      <h1 class="form-title">Sign Up</h1>

      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
      </div>

      <div class="form-group">
        <label for="username">Nama Pengguna</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat" required>
      </div>

      <div class="form-group">
        <label for="nomor">Nomor HP</label>
        <input type="text" id="nomor" name="nomor" placeholder="Masukkan nomor HP" required>
      </div>

      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
      </div>

      <select name="level" id="level" required hidden>
        <option value="user">User</option>
      </select>

      <button type="submit" name="submit" class="btn btn-primary">Daftar</button>

      <div class="form-footer">
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
      </div>

      <?php
      if (isset($_POST['submit'])) {
          $nama = $_POST['nama'];
          $username = $_POST['username'];
          $alamat = $_POST['alamat'];
          $nomor = $_POST['nomor'];
          $password = $_POST['password'];
          $level = $_POST['level'];

          include_once("koneksi.php");

          $result = mysqli_query($mysqli, "INSERT INTO user(nama,username,alamat,nomor,password,level)
          VALUES ('$nama','$username','$alamat','$nomor','$password','$level')");

          header("location:login.php");
      }
      ?>
    </form>
  </div>

  <div class="left">
    <img src="assets/bg.jpg" alt="Background" class="bg-img" />
  </div>
</main>

</body>
</html>
