<?php
require 'function.php';

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query(koneksi(), "select * from user where username = '$username' and password = '$password' ");

$cek = mysqli_num_rows($sql);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($sql);

    if ($data['level'] == "admin") {
        $_SESSION['user'] = $data['username'];
        $_SESSION['level'] = "admin";
        header("location:admin/index.php");
    } else if ($data['level'] == "user") {
        $_SESSION['user'] = $data['username'];
        $_SESSION['level'] = "user";
        header("location:user/index.php");
    } else {
        header("location:login.php?alert=gagal");
    }
}
