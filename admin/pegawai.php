<div class="head-title">
					<?php
						include 'koneksi.php';

						$query = "SELECT * FROM users";
						$result = mysqli_query($koneksi, $query);
						
					?>
				<div class="left">
					<h1>Data Users</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Users</a>
						</li>
					</ul>
				</div>
				
			</div>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Record Users</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
					
						<thead>
							<tr>
								<th>Name</th>
								<th>Username</th>
								<th>Role</th>
								<th width="200px">Status</th>
							</tr>
						</thead>
						<tbody>
						
						<?php while ($row = mysqli_fetch_assoc($result)) {?>
							<tr>
								<td>
                                    <img src="img/people.png">
                                    <p><?php echo $row['nama'];?></p>
                                </td>
								<td><?php echo $row['username'];?></td>
								<td><?php echo $row['role'];?></td>
								<td><a href="javascript:void();" onclick="hapusP('<?php echo $row['id']?>')"><span class="status pending"><i class='bx bxs-trash'></i></span></a>
									<a href="javascript:void();" onclick="updateP('<?php echo $row['id']?>')"><span class="status completed"><i class='bx bx-edit'></i></span></a>
									</td>
							</tr>
							</form>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>