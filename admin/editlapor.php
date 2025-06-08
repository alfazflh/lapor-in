<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

include '../koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: tabellapor.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($mysqli, "SELECT * FROM laporan WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Laporan tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Edit Laporan</title>
    <link rel="stylesheet" href="styleadmin.css" />
    <link rel="icon" type="image/png" href="../assets/logoweb.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
    .btn-update, .btn-hapus {
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 13px;
        color: white;
        text-decoration: none;
    }
    .btn-update {
        background-color: #7db855;
    }
    .btn-hapus {
        background-color: #dc3545;
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

    .form-card {
    background: #fff;
    padding: 25px 30px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    max-width: 700px;
    margin: auto;
}

.form-card h3 {
    margin-bottom: 20px;
    color: #7DB855;
}

.form-card label {
    font-weight: bold;
    margin-top: 10px;
    display: block;
}

.form-card input[type="text"],
.form-card input[type="password"],
.form-card textarea,
.form-card select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 15px;
    box-sizing: border-box;
}

.form-card textarea {
    resize: vertical;
}

.form-card input[type="submit"] {
    background-color: #7DB855;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 15px;
    font-weight: bold;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.form-card input[type="submit"]:hover {
    background-color: #69a747;
}
  </style>
  
</head>
<body>

<div class="sidebar">
    <h2><i class="fa fa-database"></i> lapor-in</h2>

    <div class="profile-box">
        <div class="avatar"><i class="fa fa-user-circle"></i></div>
        <div class="profile-info">
            <strong><?= htmlspecialchars($_SESSION['username']); ?></strong><br>
            <small><?= ucfirst(htmlspecialchars($_SESSION['level'])); ?></small>
        </div>
    </div>

    <a href="index.php"><i class="fa fa-users"></i> Tabel User</a>
    <a href="tabellapor.php" class="active"><i class="fa fa-file-alt"></i> Tabel Laporan</a>
    <a href="tabelberita.php"><i class="fa fa-newspaper"></i> Tabel Berita</a>
    <a href="../index.php"><i class="fa fa-home-alt"></i> User Page</a>
    <a href="../logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main-content">
    <div class="form-card">
        <h3>Edit Laporan</h3>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="notif <?= $_SESSION['message_type']; ?>">
                <?= htmlspecialchars($_SESSION['message']); ?>
            </div>
            <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
        <?php endif; ?>

        <form method="POST" action="proseseditlapor.php" novalidate>
            <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']); ?>">

            <label for="keluhan">Keluhan:</label>
            <textarea id="keluhan" name="keluhan" rows="3" required><?= htmlspecialchars($data['keluhan']); ?></textarea>

            <label for="penyebab">Penyebab:</label>
            <input type="text" id="penyebab" name="penyebab" value="<?= htmlspecialchars($data['penyebab']); ?>" required>

            <label for="lokasi">Lokasi:</label>
            <input type="text" id="lokasi" name="lokasi" value="<?= htmlspecialchars($data['lokasi']); ?>" required>

            <label for="lo">Longitude:</label>
            <input type="text" id="lo" name="lo" value="<?= htmlspecialchars($data['lo']); ?>" required pattern="^-?\d+(\.\d+)?$" title="Masukkan angka longitude yang valid">

            <label for="la">Latitude:</label>
            <input type="text" id="la" name="la" value="<?= htmlspecialchars($data['la']); ?>" required pattern="^-?\d+(\.\d+)?$" title="Masukkan angka latitude yang valid">

            <input type="submit" name="simpan" value="Simpan Perubahan">
        </form>
    </div>
</div>

</body>
</html>
