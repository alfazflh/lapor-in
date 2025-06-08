<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['level'] !== 'admin') {
    $_SESSION['message'] = "Anda harus login sebagai admin untuk mengakses halaman ini.";
    $_SESSION['message_type'] = "error";
    header("Location: ../login.php");
    exit;
}

$error = "";

if (isset($_POST['submit'])) {
    $judul   = $_POST['judul'];
    $isi     = $_POST['isi'];
    $tanggal = $_POST['tanggal'];
    $penulis = $_POST['penulis'];

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];
    $folderUpload = "../uploads/";

    if (!is_dir($folderUpload)) {
        mkdir($folderUpload, 0755, true);
    }

    $path = $folderUpload . basename($gambar);
    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO berita (judul, isi, tanggal, penulis, gambar)
        VALUES ('$judul', '$isi', '$tanggal', '$penulis', '$gambar')";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            $_SESSION['alert_success'] = "Berita berhasil ditambahkan!";
            header("Location: tabelberita.php");
            exit;
        } else {
            $error = "Gagal menyimpan ke database: " . mysqli_error($mysqli);
        }
    } else {
        $error = "Gagal upload gambar.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="icon" type="image/png" href="../assets/logoweb.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            background: #f1f3f6;
        }
        .main-content {
            margin-left: 240px;
            padding: 30px;
            flex-grow: 1;
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
        .form-card input[type="date"],
        .form-card textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
        }
        .form-card input[type="submit"] {
            background-color: #7DB855;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 15px;
        }
        .form-card input[type="submit"]:hover {
            background-color: #689f4a;
        }
        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-weight: 600;
        }
        .alert.error { background-color: #f8d7da; color: #721c24; }

        #drop-area {
            border: 2px dashed #aaa;
            padding: 25px;
            text-align: center;
            border-radius: 8px;
            background-color: #fafafa;
            color: #555;
            font-size: 15px;
            margin-top: 5px;
            transition: border-color 0.3s;
        }
        #drop-area:hover {
            border-color: #7DB855;
        }
        #drop-area i {
            font-size: 28px;
            color: #7DB855;
            margin-bottom: 8px;
        }
        #drop-area p {
            margin: 0;
            font-weight: 500;
            color: #333;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2><i class="fa fa-database"></i> Laporin</h2>
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
    <a href="../index.php"><i class="fa fa-home-alt"></i> User Page</a>
    <a href="../logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
</div>

<div class="main-content">
    <div class="form-card">
        <h3>Tambah Berita</h3>

        <?php if ($error): ?>
            <div class="alert error"><?= $error ?></div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <label>Judul Berita:</label>
            <input type="text" name="judul" required>

            <label>Isi Berita:</label>
            <textarea name="isi" rows="5" required></textarea>

            <label>Tanggal:</label>
            <input type="date" name="tanggal" required>

            <label>Penulis:</label>
            <input type="text" name="penulis" required>

            <label>Upload Gambar:</label>
            <div id="drop-area">
                <i class="fa fa-upload"></i>
                <p>Drag & drop gambar di sini atau klik untuk memilih</p>
                <input type="file" name="gambar" id="fileElem" accept="image/*" style="display:none;" required>
            </div>

            <input type="submit" name="submit" value="Tambah Berita">
        </form>
    </div>
</div>

<script>
    const dropArea = document.getElementById("drop-area");
    const fileInput = document.getElementById("fileElem");

    dropArea.addEventListener("click", () => fileInput.click());

    dropArea.addEventListener("dragover", e => {
        e.preventDefault();
        dropArea.style.borderColor = "#7DB855";
    });

    dropArea.addEventListener("dragleave", () => {
        dropArea.style.borderColor = "#aaa";
    });

    dropArea.addEventListener("drop", e => {
        e.preventDefault();
        dropArea.style.borderColor = "#aaa";
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            dropArea.querySelector("p").innerText = files[0].name;
        }
    });
</script>

</body>
</html>
