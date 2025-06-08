<?php
session_start();
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $id       = $_POST['id'];
    $nama     = $_POST['nama'];
    $username = $_POST['username'];
    $alamat   = $_POST['alamat'];
    $nomor    = $_POST['nomor'];
    $password = $_POST['password'];
    $level    = $_POST['level'];

    $query = "UPDATE user SET 
                nama='$nama', 
                username='$username', 
                alamat='$alamat', 
                nomor='$nomor', 
                password='$password', 
                level='$level' 
            WHERE id=$id";

    if (mysqli_query($mysqli, $query)) {
        $_SESSION['message'] = "User berhasil diperbarui!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal memperbarui user: " . mysqli_error($mysqli);
        $_SESSION['message_type'] = "error";
    }

    header("Location: index.php");
    exit;
}
?>
