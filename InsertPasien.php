<?php
  include 'koneksi.php';
    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(kode) as kodeTerbesar FROM pasien");
    $data = mysqli_fetch_array($query);
    $kodeID = $data['kodeTerbesar'];
    
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
        $urutan = (int) substr($kodeID, 3, 3);
    
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
    
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "RM";
    $ID = $huruf . sprintf("%03s", $urutan);

    $nama = $_POST['nama'];
    $NIK = $_POST['nik'];
    $tgl = $_POST['tgl'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $gender = $_POST['gender'];
    $pekerjaan = $_POST['pekerjaan'];
    $alergi = $_POST['alergi'];


    $query = "SELECT * FROM pasien WHERE NIK = '$NIK'";
    $result = mysqli_query($koneksi, $query);
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        // Lanjutkan proses jika ID ada
        header("Location:Dashboard.php?action=3");
        // ...
      } else {
        // Lakukan tindakan jika ID tidak ada
        $sql = "INSERT INTO `pasien`(`kode`, `nama`, `NIK`, `TglLahir`, `alamat`, `Nop`, `JenisKelamin`, `pekerjaan`, `Alergi`) VALUES ('$ID','$nama','$NIK','$tgl','$alamat','$nohp','$gender','$pekerjaan','$alergi')";
        $query = mysqli_query($koneksi, $sql);
        if (!$query) {
            header("Location:Dashboard.php?action=2");
        }else {
            header("Location: Dashboard.php?action=1");
        }
        // ...
      }

    mysqli_close($koneksi);

     
      
?>