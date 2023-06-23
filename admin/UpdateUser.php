<div class="head-title">
				<?php 
					include 'koneksi.php';
					$id= $_GET['id'];
					$query = "SELECT * FROM users where id=$id";
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
							<a class="active" href="#">Users</a>
						</li>
                        <li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Update User</a>
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
						<h3>Update User</h3>
                        <button class="save-btn">
                            <span class="icon">
                                <i id="text"><ion-icon name="rocket"></ion-icon></i>
                            </span>
                            <span class="text">submit</span>
                        </button>
                       
						
					</div>
					<form id="formUser" action="simpanUser.php" method="POST">
					<table cellpadding="0" align="center" >
                        <thead>
                            <tr>
								<th>Name</th>
								<th>Username</th>
                                <th>Email</th>
								<th>Role</th>
								
							</tr>
							
							<?php while ($row = mysqli_fetch_assoc($result)) {?>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                                    <img src="img/people.png">
                                    <p><input class="input" type="text" name="nama" value="<?php echo $row['nama'];?>"></p>
                                </td>
                                <td><input class="input" type="text" name="username" value="<?php echo $row['username'];?>"></td>
                                <td><input class="input" type="text" name="email" value="email"></td>
                                <td><?php echo $row['role'];?></td>
                                
							</tr>
                        </tbody>
                    </table>
                    </form>
                    <?php }?>
                    
                    <script>
                            save_btn = document.querySelector(".save-btn");
                            save_btn.onclick = function() {
                                this.innerHTML = "<div class='loader'></div>";
                                setTimeout(() => {
                                    $.post( "simpanUser.php", $(formUser).serialize()).done(function(data) {
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
