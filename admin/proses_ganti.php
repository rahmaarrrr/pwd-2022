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
        
        // hapus file yang lama
        $q_lama = mysqli_query($konek, "select foto from mahasiswa where nim = '".$_POST['nim']."';");
        $foto_lama = mysqli_fetch_array($q_lama)['foto'];
        
        if(strlen($foto_lama) > 0){
            if(file_exists('file/'.$foto_lama)){
                unlink('foto/'.$foto_lama);
            }
        }
        
        move_uploaded_file($file_tmp, 'file/' . $nama);
        $query = mysqli_query($konek, "update mahasiswa set nama = '".$_POST['nama']."', prodi = '".$_POST['prodi']."', foto = '".$nama."' where nim = '".$_POST['nim']."';");
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
