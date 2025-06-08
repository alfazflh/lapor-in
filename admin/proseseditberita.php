<?php
session_start();
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $id       = $_POST['id'];
    $judul    = $_POST['judul'];
    $isi      = $_POST['isi'];
    $tanggal  = $_POST['tanggal'];
    $penulis  = $_POST['penulis'];

    $query      = mysqli_query($mysqli, "SELECT gambar FROM berita WHERE id = $id");
    $data       = mysqli_fetch_assoc($query);
    $gambarLama = $data['gambar'];

    $gambarBaru = $_FILES['gambar']['name'];
    $tmp        = $_FILES['gambar']['tmp_name'];
    $folder     = "../uploads/";

    if (!empty($gambarBaru)) {
        if (!empty($gambarLama) && file_exists($folder . $gambarLama)) {
            unlink($folder . $gambarLama);
        }

        $path = $folder . basename($gambarBaru);
        if (!move_uploaded_file($tmp, $path)) {
            $_SESSION['message'] = "Gagal mengupload gambar baru.";
            $_SESSION['message_type'] = "error";
            header("Location: tabelberita.php");
            exit;
        }

        $gambarFinal = $gambarBaru;
    } else {
        $gambarFinal = $gambarLama;
    }

    $queryUpdate = "UPDATE berita SET 
        judul   = '$judul',
        isi     = '$isi',
        tanggal = '$tanggal',
        penulis = '$penulis',
        gambar  = '$gambarFinal'
        WHERE id = $id";

    if (mysqli_query($mysqli, $queryUpdate)) {
        $_SESSION['message'] = "Berita berhasil diperbarui!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal memperbarui berita: " . mysqli_error($mysqli);
        $_SESSION['message_type'] = "error";
    }

    // Redirect ke tabel berita biar notif muncul di atas tabel
    header("Location: tabelberita.php");
    exit;
}
?>
