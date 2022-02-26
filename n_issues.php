<?php
	if(!isset($_SESSION['role'])){
		session_start();
	}
	if(isset($_GET['page'])){
		$min = 10 * ($_GET['page'] - 1);
	}else{
		$min = 0;
	}
	include 'backend/dbh.p.php';
	include 'header.php';
	
	$sql_i = "SELECT * FROM `issue` WHERE day(date_created) = day(now()) OR assigned_to is null ORDER BY date_created DESC LIMIT ".$min.",10";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql_i)){
		echo 'error connecting to database';
	}else{
		$results = mysqli_query($conn, $sql_i);
	
?>

<div class="container-fluid py-4 overflow-hidden">
	<table class="table rounded-3 shadow-lg table-hover mb-5">
		<thead class="thead-dark">
				<tr>
					<th scope="col">Issue</th>
					<th scope="col">Equipment</th>
					<th scope="col">Asset</th>
					<th scope="col">Date Created</th>
					<th scope="col">Assign to</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($results->num_rows > 0){
						while($row = mysqli_fetch_array($results)){
							?>
								<tr role="button" data-href="machines.php?page=1&site=Equipment%20Information&e_id=<?php echo $row['equipment_id']?>&t=issues">
									<td><?php echo $row['issue'];?></td>
									<td><?php

									$sql_e = "SELECT equipment_name,asset FROM `equipment` WHERE equipment_id = ".$row['machine_id']."";
									
									$results_e = mysqli_query($conn, $sql_e);
									$row_e = mysqli_fetch_array($results_e);
									
									echo $row_e['equipment_name'];
									
									?></td>
									<td><?php echo $row_e['asset'];?></td>
									<td><?php echo $row['date_created'];?></td>
									<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo $row['issue_id'];?>">
									  <i class="fas fa-paper-plane"></i> Assign to employee
									</button></td>
								</tr>
								<div class="modal fade" id="<?php echo $row['issue_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><?php echo $row['issue'];?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<form action="backend/assign_new_issue.p.php" method="POST">
							<div class="form-group">
								<input type="text" class="form-control" name="i_id" value = "<?php echo $row_issue['issue_id'];?>" hidden>
							</div> 
							
							<div class="form-group">
								<label for="typeOfForm">Assign To</label>
								  <select class="form-control" name="assignedTo" required>
									  <option value="">--</option>
										<?php
										include 'backend/get_technicians.p.php';
										?>
								  </select>
							</div>
							<div class="form-group">
								<label for="formGroupExampleInput2">Due date & time</label>
								<input type="datetime-local" class="form-control" name="dueDate" required>
							</div> 
							
							
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
							<button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-check"></i> Finish</button>
						</form>
					  </div>
					</div>
				  </div>
				</div>
							<?php
						}
					}else{
						echo ' there are no results';
					}
				?>
			</tbody>
	</table>
	
	
	
</div>

<?php

	$sql = "SELECT count(*) as total FROM `issue` WHERE day(date_created) = day(now()) OR assigned_to is null ORDER BY date_created DESC";
	
	
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo 'error connecting to the database';
	}else{
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		
		$pages = ceil($row['total']/10);?>
		<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				  <li class="page-item"><a class="page-link" href="<?php
					if(($_GET['page']-1) == 0){
						echo '#';
					}else{
						$new_page = $_GET['page'] - 1;
						echo 'n_issues.php?site=New%20Unassigned%20Issues&page='.$new_page.'';
					}
				  ?>">Previous</a></li>
		<?php
		
		for($i = 1; $i <= $pages; $i++){
			?>
			
					
					<li  <?php 
						if(isset($_GET['page'])){
							if($_GET['page'] == $i){
							echo 'class="page-item active"';}
						}else{
							if( 1 == $i){
							echo 'class="page-item active"';}
						}
					?>><a class="page-link" href="n_issues.php?site=New%20Unassigned%20Issues&page=<?php echo $i;?>"><?php echo $i;
					?></a></li>
					
			  
			  <?php
		}
		?>
			<li class="page-item"><a class="page-link" href="<?php
					if(($_GET['page']+1) > $pages){
						echo '#';
					}else{
						$new_page = $_GET['page'] + 1;
						echo 'n_issues.php?site=New%20Unassigned%20Issues&page='.$new_page.'';
					}
				  ?>">Next</a></li>
				  </ul>
			  </nav>
		<?php
		}
	}
?>