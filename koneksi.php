<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "medicare";
$koneksi = mysqli_connect($host,$user,$pass,$database);

//Check koneksi
if (!$koneksi){
    die("Connection failed");
}

if (mysqli_connect_errno()){
    echo "koneksi database error : ".mysqli_connect_errno();
}
 