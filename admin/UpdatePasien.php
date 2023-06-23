<div class="head-title">
				<?php 
					include 'koneksi.php';
					$id= $_GET['id'];
					$query = "SELECT * FROM Pasien where id=$id";
					$result = mysqli_query($koneksi, $query);
					?>
				<div class="left">
					<h1>Update Data</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Pasien</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Update Pasien</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
            
			<div class="table-data">
            <script src="jquery-3.7.0.min.js"></script>
				<div class="order">
					<div class="head">
						<h3>Update Pasien</h3>
                        <button class="save-btn">
                            <span class="icon">
                                <i id="text"><ion-icon name="rocket"></ion-icon></i>
                            </span>
                            <span class="text">submit</span>
                        </button>
                       
						
					</div>
					<form id="form" action="simpan.php" method="POST">
					<table cellpadding="0" align="center" >
                        <thead>
                            <tr>
                                <th width="30px"></th>
                                <th width="120px"></th>
                                <th width="30px"></th>
                                <th width="100px"></th>
                            </tr>
							
							<?php while ($row = mysqli_fetch_assoc($result)) {?>
                        </thead>
                        <tr>
                            <td>ID </td>
                            <td>: <input class="input" name="kode" readonly value="<?php echo $row['kode'];?>"></td>
                        </tr>
                        <tr>
                            <td>Nama </td>
                            <td>: <input class="input" type="text" name="nama" value="<?php echo $row['nama'];?>"></td>
                        </tr>
                        <tr>
                            <td>NIK </td>
                            <td>: <input class="input" type="text" name="NIK" value="<?php echo $row['NIK'];?>"></td>
                            <td>Jenis Kelamin</td>
                            <td>: <input class="input" type="text" name="Jkelamin" value="<?php echo $row['JenisKelamin'];?>"></td>
                            
                        </tr>
                        <tr>
                            
                            <td>Tempat Lahir </td>
                            <td>: <input class="input" type="text"></td>
                            <td>No HP </td>
                            <td>: <input class="input" type="text" name="Nop" value="<?php echo $row['Nop'];?>"></td>
                            
                        </tr>
                        <tr>
                            <td>Tanggal Lahir </td>
                            <td>: <input class="input" type="text" name="TglLahir" value="<?php echo $row['TglLahir'];?>"></td>
                            <td>Pekerjaan </td>
                            <td>: <input class="input" type="text" name="pekerjaan" value="<?php echo $row['pekerjaan'];?>"></td>
                            
                        </tr>
                        <tr>
                            <td>Alamat </td>
                            <td>: <input class="input" type="text" name="alamat" value="<?php echo $row['alamat'];?>"></td>
                            
                        </tr>
                        <tr>
                            <td rowspan="3">Alergi </td>
                            <td>: <input class="input" type="text" name="alergi" ></td>
                            
                        </tr>
                        <tr>
                            <td><button type="submit" name="kirim">kirim</button></td>
                        </tr>
                    </table>
                    </form>
                    <?php }?>
                    
                    <script>
                            save_btn = document.querySelector(".save-btn");
                            save_btn.onclick = function() {
                                this.innerHTML = "<div class='loader'></div>";
                                setTimeout(() => {
                                    $.post( "simpan.php", $(form).serialize()).done(function(data) {
                                       alert(data);
                                    });
                                    this.innerHTML = "<span id='text'>Done </span> <i><ion-icon class='ion-icon' name='cloud-done'></ion-icon></i>";
                                    this.style="background: var(--blue); color: white; pointer-events: none";
                                    
                                }, 2000);
                                
                            }
                        </script>
                        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

					
				</div>
			</div>
