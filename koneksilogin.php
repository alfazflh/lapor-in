<?php
session_start();
include 'koneksi.php';

$username = $_POST['Username'];
$password = $_POST['Password'];

$login = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username' AND password='$password'");

if ($login) {
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        $_SESSION['id_user'] = $data['id'];
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        if ($data['level'] == "admin") {
            header("Location: admin/index.php");
        } else if ($data['level'] == "user") {
            header("Location: index.php");
        } 
    } else {
        header("Location: login.php?pesan=gagal");
    }
} else {
    echo "Error: " . mysqli_error($mysqli);
}
