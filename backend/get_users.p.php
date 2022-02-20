<?php 
	include 'dbh.p.php';
	
	$min = $_GET['page'] - 1;
	
	$sql = "SELECT * FROM `users` WHERE role != 'Head' ORDER BY username LIMIT ".$min.", 10";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo 'error connecting to database';
	}else{
		$result = mysqli_query($conn, $sql);
		if($result->num_rows > 0){
			while($row = mysqli_fetch_assoc($result)){
			?>
				<tr role="button">
				  <td><?php echo $row['username'];?></td>
				  <td><?php echo $row['email'];?></td>
				  <td><?php echo $row['role'];?></td>
				  <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					  Change role
					</button></td>
				</tr>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Changing user role</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						Are you sure you want to change the user's role?
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<a href ="backend/update_user.p.php?userid=<?php echo $row['users_id'];?>&role=<?php echo $row['role'];?>" role="button" class="btn btn-primary">Change Role</a></td>
					  </div>
					</div>
				  </div>
				</div>
				
				
			<?php	
			}
			
		}else{
			echo '<tr>
					<td colspan="7" class="text-center"> There are no issue reports</td>
				</tr>';
		}
		
		
	}
?>

	