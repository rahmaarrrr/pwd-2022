<?php

include 'koneksi.php';

$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
$nama = $_FILES['file']['name'];
$x = explode('.', $nama);
$ekstensi = strtolower(end($x));
$ukuran = $_FILES['file']['size'];
$file_tmp = $_FILES['file']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 1044070) {
        move_uploaded_file($file_tmp, 'file/' . $nama);
        $query = mysqli_query($konek, "insert into mahasiswa values ('".$_POST['nim']."','"
                .$_POST['nama']."','".$_POST['prodi']."','".$nama."');");
        if ($query) {
            echo '<script type="text/javascript">
                    alert("Data tersimpan");
                    window.location.href = "index.php";
                </script>';
        } else {
            echo '<script type="text/javascript">
                    alert("Data gagal tersimpan");
                    window.location.href = "index.php";
                </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("Ukuran file terlalu besar");
            window.location.href = "index.php";
        </script>';
    }
} else {
    echo '<script type="text/javascript">
            alert("Eks file tidak diperbolehkan");
            window.location.href = "index.php";
        </script>';
}
