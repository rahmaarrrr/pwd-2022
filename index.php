<?php
require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Mahasiswa</title>
    </head>
    <body>
        <h1>List Data Mahasiswa</h1>
        
        <a href="insert.php">Tambah Data</a>
        <br><br>
        <table class="table table-hover" border="1">
            <!-- baris header -->
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $i = 1;
            $query = mysqli_query($konek, "select * from mahasiswa");
            while ($row = mysqli_fetch_array($query)) {
                ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img src="<?php echo 'file/'.$row['foto']; ?>" style="width: 200px; height: auto;"></td>
                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['prodi']; ?></td>
                <td>
                    <a href="update.php?nim=<?php echo $row['nim']; ?>">Ubah</a> &nbsp;&nbsp; <a href="">Hapus</a>
                </td>
            </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    </body>
</html>