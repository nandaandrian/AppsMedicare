<?php
    include 'koneksi.php';

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $NIK = $_POST['NIK'];   
    //$TempatLahir = $_POST['tempatLahir'];
    $NoHp = $_POST['Nop'];
    $TglLahir = $_POST['TglLahir'];
    $Jkelamin = $_POST['Jkelamin'];
    $Pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];
    $Alergi = $_POST['alergi'];

    $sql = "UPDATE pasien SET nama ='$nama',NIK='$NIK',TglLahir='$TglLahir',alamat='$alamat',Nop='$NoHp',JenisKelamin='$Jkelamin',pekerjaan='$Pekerjaan',Alergi='$Alergi' WHERE kode='$kode'";
	$result = mysqli_query($koneksi, $sql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows > 0) {
       echo "success";
    }else {
       echo "error";
    }
    $conn->close();

    

 ?>