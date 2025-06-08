<?php
session_start();
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Cast ke int untuk keamanan

    // Ambil data gambar dulu
    $get = mysqli_query($mysqli, "SELECT gambar FROM berita WHERE id = $id");
    if (mysqli_num_rows($get) > 0) {
        $data = mysqli_fetch_assoc($get);
        $gambar = $data['gambar'];

        // Hapus file gambar jika ada
        $path = "../uploads/" . $gambar;
        if (!empty($gambar) && file_exists($path)) {
            unlink($path);
        }

        // Hapus data di DB
        $delete = mysqli_query($mysqli, "DELETE FROM berita WHERE id = $id");
        if ($delete) {
            $_SESSION['message'] = " Berita berhasil dihapus!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = " Gagal menghapus berita: " . mysqli_error($mysqli);
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "❌ Berita dengan ID tersebut tidak ditemukan.";
        $_SESSION['message_type'] = "error";
    }
} else {
    $_SESSION['message'] = "❌ ID berita tidak ditemukan!";
    $_SESSION['message_type'] = "error";
}

// Redirect kembali ke halaman tabelberita.php
header("Location: tabelberita.php");
exit;
?>
