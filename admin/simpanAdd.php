<?php
    include 'koneksi.php';

    $kode = $_POST['id'];
    $role = $_POST['role'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = MD5($_POST['password']); 
    $  
    //$TempatLahir = $_POST['tempatLahir'];
    $_POST['email'];
   
   $sql = "INSERT INTO `users`(`role`, `nama`, `username`, `password`) VALUES ('$role','$nama','$username','$password')";
	$result = mysqli_query($koneksi, $sql);
   $numRows = mysqli_num_rows($result);
    
    if($numRows > 0) {
       echo "success";
    }else {
       echo "error";
    }
    $koneksi->close();

    

 ?>