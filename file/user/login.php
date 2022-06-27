<?php 
require 'function.php';
session_start();
$user = $_POST[username];
$pass = md5($_POST['password']);

$query = mysqli_query (koneksi(),"SELECT * FROM user WHERE username = $user,
AND password = '$pass'");
$result = mysqli_query ($query) ;

if ($result>0){
    $data = mysqli_fetch_assoc($query);

    //cek level user (admin/user)
    if($data ['level'] == 'admin'){
        $_SESSION['user'] = $data['username'];
        $_SESSION['level'] = 'admin';

        //tentukan halaman yg diakses admin
    header ("Location: admin/index.php");

    }else if ($data['level'] == 'user'){
        $_SESSION['user'] = $data['username'];
        $_SESSION['level'] = 'user';
    }

  

}
?>