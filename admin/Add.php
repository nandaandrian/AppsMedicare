<div class="head-title">
					<?php
						include 'koneksi.php';

						$query = "SELECT * FROM users where role = 'user'";
						$result = mysqli_query($koneksi, $query);
						
					?>
				<div class="left">
					<h1>Add Account</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">New Account</a>
						</li>
					</ul>
				</div>
				
			</div>
			<style>
				/* Mengatur tampilan dasar input select */
				select {
					appearance: none;
					padding: 10px;
					font-size: 12.5pt;
					border: 2px solid #ccc;
					border-radius: 4px;
					background-color: #f7f7f7;
					width: 100px;
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

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Add Account</h3>
						<button class="save-btn">
                            <span class="icon">
                                <i id="text"><ion-icon name="rocket"></ion-icon></i>
                            </span>
                            <span class="text">submit</span>
                        </button>
					</div>
					<form id="form" method="POST">
					<table>
					
						<thead>
							<tr>
								<th width="80px">Role</th>
								<th width="200px">Name</th>
								<th width="200px">Username</th>
								<th width="200px">Password</th>
								<th width="200px">Email</th>
								
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td>
								<select name="role" id="role">
									<option value="Admin">Admin</option>
									<option value="user">User</option>
								</select>
                                </td>
								<td><input class="inputP" type="text" name="nama"></td>
								<td><input class="inputP" type="text" name="username"></td>
								<td><input class="inputP" type="text" name="password"></td>
								<td><input class="inputP" type="text" name="email"></td>
								
								
							</tr>
							
							<script>
                            save_btn = document.querySelector(".save-btn");
                            save_btn.onclick = function() {
                                this.innerHTML = "<div class='loader'></div>";
                                setTimeout(() => {
                                    $.post( "simpanAdd.php", $(form).serialize()).done(function(data) {
                                       alert(data);
                                    });
                                    this.innerHTML = "<span id='text'>Done </span> <i><ion-icon class='ion-icon' name='cloud-done'></ion-icon></i>";
                                    this.style="background: var(--blue); color: white; pointer-events: none";
                                    
                                }, 2000);
                                
                            }
							</script>
						</tbody>
					</table>
					</form>
				</div>
			</div>