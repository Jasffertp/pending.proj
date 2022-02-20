<?php
	include 'dbh.p.php';
	
	if(isset($_GET['page'])){
		$min = 10 * ($_GET['page'] - 1);
	}else{
		$min = 0;
	}
	
	if($_GET['site'] == "Reports"){
		$sql = "SELECT report_id, reports.machine_id, reports.task, reports.date_created, reports.task_due, reports.date_submitted, reports.assigned_user, reports.report_status, equipment.equipment_id, equipment.equipment_name, equipment.location_id, location.location_id, location.floor,location.room_number, users.users_id, users.username 
		FROM `reports`, `users`,`location`,`equipment` 
		WHERE users.users_id = ".$_SESSION['userId']." AND reports.assigned_user = ".$_SESSION['userId']." AND equipment.equipment_id = reports.machine_id AND equipment.location_id = location.location_id AND reports.report_status = 'done'
		ORDER BY reports.date_created DESC 
		LIMIT ".$min.", 10";
	}else if($_GET['site'] == "Issue Reports"){
		$sql = "SELECT issue.issue_id, issue.machine_id, issue.issue, issue.issue_status, issue.assigned_to, issue.date_created, issue.date_due, issue.date_issue_resolved, equipment.equipment_id, equipment.equipment_name, equipment.location_id, location.location_id, location.floor,location.room_number, users.users_id, users.username 
		FROM `issue`, `users`,`location`,`equipment` 
		WHERE users.users_id = 6 AND issue.submitted_by = 6 AND equipment.equipment_id = issue.machine_id AND equipment.location_id = location.location_id
		ORDER BY issue.date_created DESC 
		LIMIT ".$min.", 10";
	}
	
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo 'error connecting the database';
	}else{
		$result = mysqli_query($conn, $sql);
		
		if($_GET['site'] == "Reports"){
			if($result->num_rows > 0){
				while($row = mysqli_fetch_array($result)){
					?>
					<tr role="button" data-href="index.php?page=1&site=Tasks">
						<td><?php echo $row['task'];?></td>
						<td><?php echo $row['equipment_name'];?></td>
						<td><?php echo $row['floor'];?></td>
						<td><?php echo $row['room_number'];?></td>
						<td><?php echo $row['date_created'];?></td>
						<td><?php echo $row['task_due'];?></td>
						<td><?php echo $row['date_submitted'];?></td>
						<td><?php echo 'Resolved';?></td>
						<td><?php echo 'Modify';?></td>
					</tr>
				<?php
				}
			}else{
			?>
				<tr>
					<td colspan="7" class="text-center"> There are no reports submitted by you yet.</td>
				</tr>
			<?php
			}
		}else if($_GET['site'] == "Issue Reports"){
			if($result->num_rows > 0){
				while($row = mysqli_fetch_array($result)){
					?>
					<tr role="button" data-href="index.php?page=1&site=Tasks">
						<td><?php echo $row['issue'];?></td>
						<td><?php echo $row['equipment_name'];?></td>
						<td><?php echo $row['floor'];?></td>
						<td><?php echo $row['room_number'];?></td>
						<td><?php echo $row['date_created'];?></td>
						<td><?php echo $row['issue_status'];?></td>
						<td><?php echo 'Modify';?></td>
					</tr>
				<?php
				}
			}else{
			?>
				<tr>
					<td colspan="7" class="text-center"> There are no issues submitted by you yet.</td>
				</tr>
			<?php
			}
		}
	}
?>