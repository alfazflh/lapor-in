<?php
session_start();
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Ambil data foto dulu
    $query = mysqli_query($mysqli, "SELECT foto FROM laporan WHERE id = $id");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $foto = $data['foto'];
        $path = "../uploads/" . $foto;

        // Hapus file jika ada
        if (!empty($foto) && file_exists($path)) {
            if (!unlink($path)) {
                $_SESSION['message'] = "⚠️ Gagal menghapus file foto.";
                $_SESSION['message_type'] = "warning";
                header("Location: tabellapor.php");
                exit;
            }
        }

        // Hapus data dari database
        $delete = mysqli_query($mysqli, "DELETE FROM laporan WHERE id = $id");
        if ($delete) {
            $_SESSION['message'] = " Data laporan berhasil dihapus!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = " Gagal menghapus data laporan: " . mysqli_error($mysqli);
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "❌ Data laporan dengan ID tersebut tidak ditemukan.";
        $_SESSION['message_type'] = "error";
    }
} else {
    $_SESSION['message'] = "❌ ID laporan tidak ditemukan!";
    $_SESSION['message_type'] = "error";
}

// Redirect ke halaman tabellapor.php
header("Location: tabellapor.php");
exit;
?>
