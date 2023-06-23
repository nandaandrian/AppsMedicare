<?php
    include 'koneksi.php';

    echo $kode = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];   
    //$TempatLahir = $_POST['tempatLahir'];
    $_POST['email'];
   
    $sql = "UPDATE users SET nama='$nama',username='$username' WHERE id='$kode'";
	$result = mysqli_query($koneksi, $sql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows > 0) {
       echo "success";
    }else {
       echo "error";
    }
    $conn->close();

    

 ?>