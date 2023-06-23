<?php 
    include 'koneksi.php';
    $id= $_GET['id'];
	$query = "DELETE FROM users where id=$id";
	$result = mysqli_query($koneksi, $query);
?>