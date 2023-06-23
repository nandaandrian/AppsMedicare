<?php  
    session_start();
    if(empty($_SESSION['id']) || $_SESSION['name'] == ''){
        header("Location: index.php?action=3");
        die();
    }
    include 'koneksi.php';

    $ID = $_POST['ID'];
    $NIK = $_POST['NIK'];
       
    if (!empty($ID) OR !empty($NIK)){
        $query = mysqli_query($koneksi, "SELECT * FROM pasien where kode = '$ID' or NIK = '$NIK'");
        $result = mysqli_num_rows($query);
        
        if ($result > 0) {
            $data = mysqli_fetch_array($query);
            
            $ID = $data['kode'];
            $nama = $data['nama'];
            $NIK = $data['NIK'];
            $TglLahir = $data['TglLahir'];
            $alamat = $data['alamat'];
            $Nop = $data['Nop'];
            $Jkelamin = $data['JenisKelamin'];
            $Pekerjaan = $data['pekerjaan'];
            $Alergi = $data['Alergi'];
        }else {
            header("location: Dashboard.php?action=4");
        }
        

    }else{
        header("location: Dashboard.php?action=4");
    }
   
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/datapasien-css.css" rel="stylesheet" type="text/css"/>

    <title>web registrasi pasien</title>
    
</head>
<body>
    <header>
        <span class="icon-back"> 
            <a href="Dashboard.php"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
        </span>
        <h2 class="judul">Data Rekam Medis Pasien</h2>
        <span></span>
    </header>
    
    <div class="wrapper">
           
            <table cellpadding="0" align="center" >
                <thead>
                    <tr>
                        <th width="30px"></th>
                        <th width="120px"></th>
                        <th width="30px"></th>
                        <th width="100px"></th>
                    </tr>
                </thead>
                <tr>
                    <td>ID </td>
                    <td>: <?php echo $ID ?></td>
                </tr>
                <tr>
                    <td>Nama </td>
                    <td colspan="3">: <?php echo $nama ?></td>
                </tr>
                <tr>
                    <td>NIK </td>
                    <td class="td">: <?php echo $NIK ?></td>
                    <td>Alamat </td>
                    <td class="td">: <?php echo $alamat ?></td>
                    
                </tr>
                <tr>
                    
                    <td>Tempat Lahir </td>
                    <td class="td">: <?php echo $alamat ?></td>
                    <td>No HP </td>
                    <td class="td">: <?php echo $Nop ?></td>
                    
                </tr>
                <tr>
                    <td>Tanggal Lahir </td>
                    <td class="td">: <?php echo $TglLahir ?> </td>
                    <td>Pekerjaan </td>
                    <td class="td">: <?php echo $Pekerjaan ?> </td>
                    
                </tr>
                <tr>
                    <td>Alamat </td>
                    <td colspan="3">: <?php echo $alamat ?></td>
                    
                </tr>
                <tr>
                    <td rowspan="3">Alergi </td>
                    <td colspan="3" rowspan="3">: <?php echo $Alergi ?> </td>
                    
                </tr>
                <tr></tr>
            </table>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>