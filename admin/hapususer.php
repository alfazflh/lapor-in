<?php
session_start();
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $hapus = mysqli_query($mysqli, "DELETE FROM user WHERE id = $id");

    if ($hapus) {
        $_SESSION['message'] = " User berhasil dihapus!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = " Gagal menghapus user: " . mysqli_error($mysqli);
        $_SESSION['message_type'] = "error";
    }
} else {
    $_SESSION['message'] = "❌ ID user tidak ditemukan!";
    $_SESSION['message_type'] = "error";
}

header("Location: index.php");
exit();
?>
