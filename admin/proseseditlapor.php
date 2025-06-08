<?php
session_start();
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $id       = $_POST['id'];
    $keluhan  = $_POST['keluhan'];
    $penyebab = $_POST['penyebab'];
    $lokasi   = $_POST['lokasi'];
    $lo       = $_POST['lo'];
    $la       = $_POST['la'];

    $query = "UPDATE laporan SET 
                keluhan='$keluhan', 
                penyebab='$penyebab', 
                lokasi='$lokasi', 
                lo='$lo', 
                la='$la' 
            WHERE id=$id";

    if (mysqli_query($mysqli, $query)) {
        $_SESSION['message'] = "Laporan berhasil diperbarui!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal memperbarui laporan: " . mysqli_error($mysqli);
        $_SESSION['message_type'] = "error";
    }

    header("Location: tabellapor.php");
    exit;
}
?>