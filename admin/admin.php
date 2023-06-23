<?php
	include 'koneksi.php';
    session_start();
    if(empty($_SESSION['id']) || $_SESSION['name'] == ''){
        echo "<script>window.location.href = '/Appweb/index.php?action=3';</script>";
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
	$query = "SELECT COUNT(id) AS total FROM Users where role = 'user'";
	$result = mysqli_query($koneksi, $query);
	$row = mysqli_fetch_assoc($result);
	// Ambil jumlah baris dari hasil query
	$totalRows = $row['total'];

	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		// Redirect ke halaman indeks.html setelah halaman ini selesai dimuat
		window.onload = function() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				// Mengambil konten halaman yang dimuat
				var content = document.getElementById("allContent");
				content.innerHTML = this.responseText;
			}
			};
			
			// Menentukan URL halaman yang akan dimuat berdasarkan argumen yang diberikan
			var url;
			url = "home.php";
			// Melakukan permintaan HTTP untuk memuat halaman
			xhttp.open("GET", url, true);
			xhttp.send();
		};
  	</script>
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	
	<!-- Fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq570941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- My CSS -->
	<!-- My CSS -->
	<style>
               
                .input {
                    width: 300px;
                    height: 100%;
                    border: none;
                    outline: none;
                    padding: 10px;
                    font-size: 1em;
                    background: none;
                }
				.inputP {
					width: 90%;
					height: 100%;
					border: none;
					outline: 1px solid white;
					padding: 10px;
					margin-right: 30px;
					
					text-indent: 5px;
  					font-size: 12.6pt;
					border-radius: 8px;
					background: white;
					border: solid 1.5px #D3D3D3;
					-webkit-transition: 1s; /* Safari */
					transition: 1s;
				}
				.inputP[type=text]:hover{
					box-shadow: 0 0 5pt 0.5pt #D3D3D3;
				}
				.inputP[type=text]:focus {
					box-shadow: 0 0 5pt 2pt #D3D3D3;
					outline-width: 0px;
				}
                .save-btn {
                    padding: 10px 24px;
                    background: var(--blue);
                    border: none;
                    outline: none;
                    color: #fff;
                    font-weight: 500;
                    display: flex;
                    cursor: pointer;
                    transition: .3s ease;
                    border-radius: 4px;
					box-shadow: 0 8px 5px -5px rgba(0, 0, 0, 0.2); 
                    font-size: 16px;
					transition: 0.2s;
                }
				.loader {
					pointer-events: none;
					width: 20px;
					height: 20px;
					border-radius: 50%;
					border: 3px solid transparent;
					border-top-color: #fff;
					animation: an1 1s ease infinite;
				}
				#text {
					margin-right: 10px;
				}
				.ion-icon {
				--ionicon-stroke-width: 16px;
				font-size: 20px;
				

				}
				@keyframes an1 {
					0% {
						transform: rotate(0turn);
					}
					100% {
						transform: rotate(1turn);
					}
				}
                
            </style>
	<link rel="stylesheet" href="style.css">
	<style>
		.swal2-popup {
			
			font-family: 'Poppins', sans-serif;
		}
	</style>
	
	<title>AdminHub</title>
</head>
<body>
<script type="text/javascript" src="Sweetalert/dist/sweetalert2.all.min.js"></script>
	<!-- SIDEBAR -->
	
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminMedicare</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="javascript:void()" class="klik_menu" id="home" onclick="loadHome()">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="javascript:void()" class="klik_menu" id="pasien" onclick="loadPasien()">
					<i class='bx bxs-group' ></i>
					<span class="text">Pasien</span>
				</a>
			</li>
			<li>
				<a href="javascript:void()" class="klik_menu" id="Pegawai" onclick="loadPegawai()">
					<i class='bx bxs-user' ></i>
					<span class="text">Users</span>
				</a>
			</li>
			
			<li>
				<a href="javascript:void()" onclick="loadAdd()">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">About</span>
				</a>
			</li>
			<li>
				<a href="javascript:void()" onclick="logout()" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main id="allContent">
			

		</main>

		<script>
			// Fungsi untuk memperbarui data secara periodik
			function updateData() {
				$.get("recents.php", function(data) {
					$("#live-data").html(data);
					setTimeout(updateData, 1000);
				});
			}
			function updateLive() {
				$.get("datalive.php", function(data) {
					$("#datalive").html(data);
					setTimeout(updateLive, 1000);
				});
			}
			
			// Memanggil fungsi updateData() saat halaman dimuat
			$(document).ready(function() {
				updateData();
				
			});
			$(document).ready(function() {
				updateLive();
				
			});
			function loadHome() {
			$.get("home.php", function(data) {
				$("#allContent").html(data);
				
			});
			}
			function loadPasien() {
			$.get("pasien.php", function(data) {
				$("#allContent").html(data);
			});
			}
			function loadPegawai() {
			$.get("pegawai.php", function(data) {
				$("#allContent").html(data);
			});
			}
			function loadAdd() {
			$.get("Add.php", function(data) {
				$("#allContent").html(data);
			});
			}
			function update(id) {
			$.get("UpdatePasien.php",{id:id}, function(data) {
				$("#allContent").html(data);
			});
			}
			function updateP(id) {
			$.get("UpdateUser.php",{id:id}, function(data) {
				$("#allContent").html(data);
			});
			}
			function logout() {
				Swal.fire({
						title: 'Are you sure?',
						text: "You want to logout",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes !'
						}).then((result) => {
						if (result.isConfirmed) {
							Swal.fire(
							'logout!',
							'logout is successfully.',
							'success'
							);
							window.location.href = "/Logout.php";

						}
						})
			}
			
			function hapus(id) {
					Swal.fire({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, delete it!'
						}).then((result) => {
						if (result.isConfirmed) {
							Swal.fire(
							'Deleted!',
							'Data pasien has been deleted.',
							'success'
							);
							$.get("hapus.php",{id:id}, function(data) {
								loadPasien();
							});
						}
						})
					
				}  
			function hapusP(id) {
					Swal.fire({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, delete it!'
						}).then((result) => {
						if (result.isConfirmed) {
							Swal.fire(
							'Deleted!',
							'Data user has been deleted.',
							'success'
							);
							$.get("hapusUser.php",{id:id}, function(data) {
								loadPegawai();
							});
						}
						})
					
				}  
		</script>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
	
	<script type="text/javascript" src="loader.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	

</body>
</html>