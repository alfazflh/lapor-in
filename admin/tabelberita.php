<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Admin - Data Berita</title>
  <link rel="icon" type="image/png" href="../assets/logoweb.png" />
  <link rel="stylesheet" href="styleadmin.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    body {
      display: flex;
      min-height: 100vh;
      background: #f1f3f6;
      font-family: sans-serif;
    }
    .sidebar {
      width: 220px;
      background-color: #7DB855;
      color: white;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 15px;
      position: fixed;
      height: 100vh;
    }
    .sidebar h2 {
      font-size: 22px;
      margin-bottom: 20px;
      cursor: pointer;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      padding: 10px;
      border-radius: 6px;
    }
    .sidebar a:hover {
      background-color: rgba(255,255,255,0.1);
    }
    .profile-box {
      display: flex;
      align-items: center;
      gap: 10px;
      background-color: rgba(255,255,255,0.1);
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    .profile-box .avatar {
      font-size: 32px;
    }
    .profile-info {
      font-size: 14px;
      line-height: 1.2;
    }
    .main-content {
      margin-left: 240px;
      padding: 30px;
      flex-grow: 1;
    }
    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      overflow-x: auto;
    }
    .card h1 {
      margin-bottom: 20px;
      color: #7DB855;
      font-size: 24px;
    }
    .table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }
    .table th, .table td {
      padding: 10px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }
    .thumb {
      width: 100px;
      height: auto;
      border-radius: 6px;
      object-fit: cover;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }
    .btn-update, .btn-hapus {
      padding: 6px 12px;
      border-radius: 5px;
      font-size: 13px;
      color: white;
      text-decoration: none;
    }
    .btn-update {
      background-color: #7DB855;
    }
    .btn-update:hover {
      background-color: #699f48;
    }
    .btn-hapus {
      background-color: #DC3545;
    }

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }
      .sidebar {
        position: relative;
        width: 100%;
        height: auto;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 10px;
        gap: 10px;
      }
      .sidebar h2 {
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
      }
      .profile-box {
        display: none;
      }
      .main-content {
        margin-left: 0;
        padding: 20px 10px;
      }
      .table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }
      .sidebar a {
        flex: 1 1 45%;
        text-align: center;
        padding: 8px;
        font-size: 14px;
      }
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h2 onclick="location.reload()"><i class="fa fa-database"></i> lapor-in</h2>
  <div class="profile-box">
    <div class="avatar"><i class="fa fa-user-circle"></i></div>
    <div class="profile-info">
      <strong><?= $_SESSION['username']; ?></strong><br>
      <small><?= ucfirst($_SESSION['level']); ?></small>
    </div>
  </div>
  <a href="index.php"><i class="fa fa-users"></i> Tabel User</a>
  <a href="tabellapor.php"><i class="fa fa-file-alt"></i> Tabel Laporan</a>
  <a href="tabelberita.php"><i class="fa fa-newspaper"></i> Tabel Berita</a>
  <a href="tambahberita.php"><i class="fa fa-plus-circle"></i> Tambah Berita</a>
  <a href="../index.php"><i class="fa fa-home-alt"></i> User Page</a>
  <a href="../logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main-content">
  <?php if (isset($_SESSION['message'])): ?>
    <div class="alert <?= $_SESSION['message_type'] ?>">
        <?= $_SESSION['message'] ?>
    </div>
    <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
  <?php endif; ?>

  <div class="card">
    <h1>Data Berita</h1>
    <?php if (isset($_SESSION['alert_success'])): ?>
      <div class="alert success" style="margin: 20px auto; text-align:center;">
          <?= $_SESSION['alert_success']; unset($_SESSION['alert_success']); ?>
      </div>
    <?php endif; ?>
    <table class="table">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Judul</th>
          <th>Isi</th>
          <th>Tanggal</th>
          <th>Penulis</th>
          <th>Gambar</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include '../koneksi.php';
        $query_mysql = mysqli_query($mysqli, "SELECT * FROM berita") or die(mysqli_error($mysqli));
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysql)) {
        ?>
        <tr>
          <td><?= $nomor++; ?></td>
          <td><?= htmlspecialchars($data['judul']); ?></td>
          <td><?= htmlspecialchars($data['isi']); ?></td>
          <td><?= htmlspecialchars($data['tanggal']); ?></td>
          <td><?= htmlspecialchars($data['penulis']); ?></td>
          <td>
            <?php if (!empty($data['gambar']) && file_exists("../uploads/" . $data['gambar'])): ?>
              <img src="../uploads/<?= $data['gambar']; ?>" class="thumb" alt="Gambar Berita">
            <?php else: ?>
              <span style="color:red;">Tidak ada gambar</span>
            <?php endif; ?>
          </td>
          <td><a href="editberita.php?id=<?= $data['id']; ?>" class="btn-update">Edit</a></td>
          <td><a href="hapusberita.php?id=<?= $data['id']; ?>" class="btn-hapus">Delete</a></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll(".btn-hapus").forEach(button => {
      button.addEventListener("click", function(e) {
        e.preventDefault();
        const href = this.getAttribute("href");

        Swal.fire({
          title: 'Yakin hapus berita ini?',
          text: "Data yang dihapus tidak bisa dikembalikan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#DC3545',
          cancelButtonColor: '#7DB855',
          confirmButtonText: 'Hapus',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = href;
          }
        });
      });
    });
  });
</script>

</body>
</html>
