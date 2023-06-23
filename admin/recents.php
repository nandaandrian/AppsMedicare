<?php
include 'koneksi.php';
$query = "SELECT * FROM loginLogs ORDER BY datelogs DESC";
$hasil = mysqli_query($koneksi, $query);
 while ($log = mysqli_fetch_assoc($hasil)) {?>
							<tr>
								<td>
									<img src="img/people.png">
									<p><?php echo $log['nama'];?></p>
								</td>
								<td><?php echo $log['datelogs'];?></td>
								<td>
									<?php
									if($log['StatusLogs'] == 'Completed') {
											echo "<span class='status completed'>completed</span>";
										}elseif($log['StatusLogs'] == 'Process') {
											echo "<span class='status process'>Process</span>";
										}
									?>
									
								</td>
							</tr>
						<?php }?>