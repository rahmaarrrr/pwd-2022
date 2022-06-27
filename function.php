<?php
function koneksi()
{
    $con = mysqli_connect('localhost', 'root', '', 'akademik');
    if (!$con) {
        die("Koneksi gagal!" . mysqli_connect_error());
    }
    return $con;
}
