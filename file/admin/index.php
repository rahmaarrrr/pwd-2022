<?php
require 'koneksi.php';
?>

<?php 
require 'function.php';
$mahasiswa = query ("SELECT * FROM MAHASISWA");
//event button cari
if(isset($_POST['cari'])){
    $mahasiswa = cari ($_POST['key']);
}
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
//history pencarian tidak ada: autocomplete ="off"
        <form action = "" method="post">
            <input type="text" name="key" placeholder="Isi Keyword" autocomplete="off">
            <button type ="submit" name="cari">Cari</button>
        </form>

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

           <!-- cek jika data tidak ditemukan --> 
        <?php if (empty ($mahasiswa)): ?>
            <tr>
                <td colspan="6">
                   <p>Data tidak ditemukan!</p> 
                </td>
            </tr>
            <<?php endif; ?>

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