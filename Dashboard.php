<?php
    include 'koneksi.php';
    session_start();
    if(empty($_SESSION['id']) || $_SESSION['name'] == ''){
        header("Location: index.php?action=3");
        die();
    }
    $id = $_SESSION['id'];
    $nama = $_SESSION['name'];
    $user = $_SESSION['user'];
    $status = "Process";
    $sql2 = "INSERT INTO loginLogs SET kode ='$id',nama ='$nama',StatusLogs ='$status'";
    $logsql = mysqli_query($koneksi,$sql2);
    $sql3 = "INSERT INTO activity SET userid ='$id',username ='$user';";
    $activity = mysqli_query($koneksi,$sql3);
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/dashboard-css.css" rel="stylesheet" type="text/css"/>
    <title>web registrasi pasien</title>
</head>

<body>
    <?php
    if(isset($_GET['action'])){
        if($_GET['action'] == "1"){ ?>
        <script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Inserted Successfully',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    <?php
        }
    if($_GET['action'] == "2"){ ?>
        <script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Data not Inserted',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        <?php
    }
    if($_GET['action'] == "3"){ ?>
        <script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Data already exists',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        <?php
    }
    if($_GET['action'] == "4"){ ?>
        <script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Data is not exists, please register now',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
        <?php
    }

    }

?>
    <header>
        <h2 class="logo">Hi, <?php echo $_SESSION['name']?> </h2>
        <nav class="navigation">
            <a href="#">Profile</a>
            <button class="btnLogin-popup">Pasien</button>
            <script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
            <button class="btnLogout-popup" onclick="Flogout()">Logout</button>
            <script>
            function Flogout(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to logged out !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "Logout.php";
                    }
                    })
            }
            </script>
        </nav>
    </header>

    <div class="wrapper">
        <span class="icon-close"> 
            <ion-icon class="link-close" name="close"></ion-icon>
        </span>
        <div class="form-box login">
            <h2>Pasien</h2>
            <form id="myForm" action="DataPasien.php" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="pencil"></ion-icon></span>
                    <input type="text" name="ID" id="id">
                    <label>ID</label>
                </div>
                <div class="input-box" >
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="NIK" id="nik">
                    <label>NIK</label>
                </div>
                <input class="hidden" type="submit" value="Kirim">
            </form>
                <button class="btn" onclick="generate()">
                    <span id="name">Process</span>
                    <img id="icon" src="loader.gif" class="hidden"width="40px"/>
                </button>
                
                <div id="modal" class="hidden">
                    <div class="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#22c55e" width="18px" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                        <span>Data has been processed</span>
                    </div>
                </div>
                <div class="login-register">
                    <p>Belum pernah daftar? <a href="#" class="register-link">Daftar</a></p>
                </div>
        </div>

        <div class="form-box register">
            <style>
                /* Mengatur tampilan dasar input select */
				select {
					appearance: none;
                    margin-left: 130px;
					padding: 10px;
					font-size: 12.5pt;
                    text-align-last: center;
                    color: white;
					border: 0px solid #ccc;
					border-radius: 4px;
					background-color: transparent;
					width: 50%;

				}

				/* Mengatur tampilan saat input select aktif */
				select:focus {
					outline: none;
					border-color: #5b9dd9;
					box-shadow: 0 0 5px #5b9dd9;
				}

				/* Mengatur tampilan panah dropdown */
				select::-ms-expand {
					display: none;
				}

				/* Mengatur tampilan pilihan saat dropdown dibuka */
				select option {
					background-color: #f7f7f7;
					color: #333;
				}

				/* Mengatur tampilan saat pilihan dihover */
				select option:hover {
					background-color: #5b9dd9;
					color: #fff;
					}


			</style>
            </style>
            <h2>Daftar Pasien</h2>
            <form action="InsertPasien.php" method="POST">
                <div class="scrol">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <input type="text" name="nama" required>
                        <label>Nama</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="pencil"></ion-icon></span>
                        <input type="text" name="nik" required>
                        <label>NIK</label>
                    </div>
                    <div class="input-box">
                        <input type="date" name="tgl" required>
                        <label>Tanggal Lahir</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="map-outline"></ion-icon></span>
                        <input type="text" name="alamat" required>
                        <label>Alamat</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                        <input type="text" name="nohp" required>
                        <label>No Handphone</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="male-female-outline"></ion-icon></span>
                        <input type="hidden" name="gender" required>
                        <label>Jenis Kelamin</label>
                        <select name="gender" required>
                            <option value="">-- select --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
                        <input type="text" name="pekerjaan" required>
                        <label>Pekerjaan</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="medkit-outline"></ion-icon></span>
                        <input type="text" name="alergi" required>
                        <label>Alergi</label>
                    </div>
                </div>
                &nbsp;
                <button type="submit" class="btn">Daftar</button>
                <div class="login-register">
                    <p>Sudah pernah daftar ? <a href="#" class="login-link">Check</a></p>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="Js/scr.js" charset="utf-8"></script>
    <script type="text/javascript" src="Js/loader.js" charset="utf-8"></script>
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

