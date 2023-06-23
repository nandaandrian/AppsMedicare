<ul class="box-info">
				<li>
					<i class='bx bx-user' ></i>
					<span class="text">
					<?php
						include 'koneksi.php';

						$query = "SELECT COUNT(id) AS total FROM users where role = 'user'";
						$result = mysqli_query($koneksi, $query);
						$row = mysqli_fetch_assoc($result);
						// Ambil jumlah baris dari hasil query
						$totalRows = $row['total'];
						?>
						<h3><?php echo $totalRows;?></h3>

						<p>Pegawai</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<?php 
						$query = "SELECT COUNT(id) AS total FROM pasien";
						$result = mysqli_query($koneksi, $query);
						$row = mysqli_fetch_assoc($result);
						// Ambil jumlah baris dari hasil query
						$totalRows = $row['total'];
						?>
						<h3><?php echo $totalRows;?></h3>
						<p>Pasien</p>
					</span>
				</li>
				<li>
					<i class='bx bx-history' ></i>
					<span class="text">
					<?php 
						$query = "SELECT COUNT(id) AS jumlah FROM loginLogs GROUP BY StatusLogs='Process'";
						$result = mysqli_query($koneksi, $query);
						$row = mysqli_fetch_assoc($result);
						// Ambil jumlah baris dari hasil query
						$totalRows = $row['jumlah'];
						?>
						<h3><?php 
                        if(!empty($row['jumlah'])){
                            echo $totalRows;
                        }else {
                            
                            echo "0";
                        }
                       
                        ?></h3>
						<p>Total Recents</p>
					</span>
				</li>
			</ul>