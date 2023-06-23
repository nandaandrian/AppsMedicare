<div class="head-title">
					<?php
						include 'koneksi.php';

						$query = "SELECT * FROM Pasien";
						$result = mysqli_query($koneksi, $query);
						
					?>
				<div class="left">
					<h1>Data Pasien</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Pasien</a>
						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
					
				</a>
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Record Pasien</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<script src="jquery-3.7.0.min.js"></script>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>NAMA</th>
								<th>NIK</th>
								<th>Jenis Kelamin</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_assoc($result)) {?>
							<tr>
								<td><p><?php echo $row['kode']; ?></p></td>
								<td><?php echo $row['nama']; ?></td>
								<td><?php echo $row['NIK']; ?></td>
								<td><?php echo $row['JenisKelamin']; ?></td>
								<td><a href="javascript:void();" onclick="hapus('<?php echo $row['id']?>')"><span class="status pending"><i class='bx bxs-trash'></i></span></a>
									<a href="javascript:void();" onclick="update('<?php echo $row['id']?>')"><span class="status completed"><i class='bx bx-edit'></i></span></a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				
				</div>
			</div>