<?php
	include 'dbh.p.php';
	if(isset($_GET['page'])){
		$min = 10 * ($_GET['page'] - 1);
	}
	
	if($_GET['site'] == "Reports"){
		if(isset($_POST['submit'])){
			$search = mysqli_real_escape_string($conn, $_POST['search']);
			$sql_search = "SELECT report_id, task, machine_id, task_due, date_submitted, report_status, for_repair, assigned_user, dates.date_identity,dates.date_type, dates.report_issue_id, date_time, equipment.equipment_name, equipment.equipment_id, location.location_id, location.floor, location.room_number, reports.report_status, users.username, users.users_id
			FROM `dates`,`reports`, `equipment`, `location`, `users`
			WHERE equipment.equipment_name LIKE '%$search%' OR reports.report_status LIKE '%$search%' OR users.username LIKE '%$search%'  OR task LIKE '%$search%' ";
		}
	}else if($_GET['site'] == "Issues"){
		
		if(isset($_POST['submit'])){
			$search = mysqli_real_escape_string($conn, $_POST['search']);
			$sql_search = "SELECT issue_id, machine_id, issue, issue_status, date_due, date_created, date_issue_resolved, assigned_to, equipment.equipment_id, equipment.equipment_name, users.users_id, users.username, dates.date_time, dates.report_issue_id, dates.date_identity FROM `issue`, `equipment`, `users`, `dates`
			WHERE equipment.equipment_name LIKE '%$search%' OR users.username LIKE '%$search%' OR issue_status LIKE '%$search%' OR issue.issue LIKE '%$search%'";
		}
		
	}
	
	
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$sql_search)){
		echo 'Error connecting to database';
	}else{
		$results_search = mysqli_query($conn, $sql_search);
		
		if($results_search->num_rows > 0){
			while($row_search = mysqli_fetch_array($results_search)){
				if($_GET['site'] == "Reports"){
				?>
				<tr role="button" data-href="index.php?page=1&site=Dashboard">
				  <td><?php echo $row_search['task'];?></td>
				  <td><?php echo $row_search['equipment_name'];?></td>
				  <td><?php echo $row_search['floor'];?></td>
				  <td><?php echo $row_search['room_number'];?></td>
				  <td><?php echo $row_search['report_status'];?></td>
				  <?php if(!$row_search['date_submitted']){
					  echo '<td>--</td>';
				  }else{
					  ?><td><?php echo $row_search['date_submitted'];?></td><?php
				  }?>
				  <?php if(is_null($row_search['for_repair'])){
					  echo '<td>--</td>';
				  }else{
					  ?><td><?php 
						if($row_search['for_repair'] == 1){
							echo 'Yes';
						}else{
							echo 'No';
						}
					  ?></td><?php
				  }?>
				  <td><?php echo $row_search['username'];?></td>
				</tr>
			<?php
				}else if($_GET['site'] == "Issues"){
					?>
				<tr role="button" data-href="index.php?page=1&site=Dashboard">
				  <td><?php echo $row_search['issue'];?></td>
				  <td><?php echo $row_search['equipment_name'];?></td>
				  <td><?php echo $row_search['date_created'];?></td>
				  <?php if(is_null($row_search['issue_status'])){
					  echo '<td>--</td>';
				  }else{
					  ?><td><?php 
						if($row_search['issue_status'] == 1){
							echo 'Resolved';
						}else{
							echo 'Not resolved';
						}
					  ?></td><?php
				  }?>
				  <td><?php echo $row_search['date_due'];?></td>
				  <?php if(!$row_search['date_issue_resolved']){
					  echo '<td>--</td>';
				  }else{
					  ?><td><?php echo $row_search['date_issue_resolved'];?></td><?php
				  }?>
				 
				 <?php
					if(is_null($row_search['username'])){
						?>
						 <td><a href="createIssue.php?site=Create issue log" class="btn btn-success" role="button" aria-pressed="true">Create issue log</a></td>
						<?php
					}else{
						?>
						<td><?php echo $row_search['username'];?></td>
						<?php
					}
				 ?>
				  
				</tr>
			<?php
				}
			}
			
		}else{
			?>
				<tr>
					<td colspan="7" class="text-center"> There are no reports</td>
				</tr>
			<?php
		}
	}
	
	
?>