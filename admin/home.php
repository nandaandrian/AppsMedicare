<div class="head-title" >
<?php
	include 'koneksi.php';
	$query = "SELECT * FROM loginLogs ORDER BY datelogs DESC";
	$hasil = mysqli_query($koneksi, $query);
?>
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
</div>
			<div id="datalive">
			
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Logs</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							
							<tr>
								<th>User</th>
								<th>Date </th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody id="live-data">
						
						</tbody>
					</table>
					<script src="jquery-3.7.0.min.js"></script>
					<script>
						
					</script>
				</div>
			</div>
		</div>