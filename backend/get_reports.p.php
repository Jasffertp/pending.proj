
<?php
	include 'dbh.p.php';
	if(isset($_GET['page'])){
		$min = 10 * ($_GET['page'] - 1);
	}
	
	if($_GET['site'] == "Reports"){
		if(!isset($_GET['time'])){
			
			$sql_dates = "SELECT report_id, task, machine_id, task_due, date_submitted, report_status, for_repair, assigned_user, dates.date_identity,dates.date_type, dates.report_issue_id, date_time, equipment.equipment_name, equipment.equipment_id, location.location_id, location.floor, location.room_number, reports.report_status, users.username, users.users_id
			FROM `dates`,`reports`, `equipment`, `location`, `users` 
			WHERE day(date_time) = day(now()) AND date_identity = 'report' AND date_type = 'created' AND dates.report_issue_id = reports.report_id AND reports.machine_id = equipment.equipment_id AND location.location_id = equipment.location_id  AND YEAR(date_time) = year(now()) AND users.users_id = assigned_user
	ORDER BY `dates`.`date_time` DESC LIMIT ".$min.",10";
	
		}else{
			
			$sql_dates = "SELECT report_id, task, machine_id, task_due, date_submitted, report_status, for_repair, assigned_user, dates.date_identity,dates.date_type, dates.report_issue_id, date_time, equipment.equipment_name, equipment.equipment_id, location.location_id, location.floor, location.room_number, reports.report_status, users.username, users.users_id
			FROM `dates`,`reports`, `equipment`, `location`, `users`  
			WHERE ".$_GET['time']."(date_time) = ".$_GET['time']."(now()) AND date_identity = 'report' AND date_type = 'created' AND dates.report_issue_id = reports.report_id AND reports.machine_id = equipment.equipment_id AND location.location_id = equipment.location_id  AND YEAR(date_time) = year(now()) AND users.users_id = assigned_user
	ORDER BY `dates`.`date_time` DESC LIMIT ".$min.",10";
	
		}
	}else if($_GET['site'] == "Issues"){
		
		if(!isset($_GET['time'])){
			$sql_dates = "SELECT issue_id, machine_id, issue, issue_status, date_due, date_created, date_issue_resolved, assigned_to, equipment.equipment_id, equipment.equipment_name, users.users_id, users.username, dates.date_time, dates.report_issue_id, dates.date_identity FROM `issue`, `equipment`, `users`, `dates` WHERE day(dates.date_time) = day(now()) AND year(date_time) = year(now()) AND issue.machine_id = equipment.equipment_id AND assigned_to = users.users_id ORDER by date_created DESC LIMIT ".$min.",10";
		}else{
			$sql_dates = "SELECT issue_id, machine_id, issue, issue_status, date_due, date_created, date_issue_resolved, assigned_to, equipment.equipment_id, equipment.equipment_name, users.users_id, users.username, dates.date_time, dates.report_issue_id, dates.date_identity FROM `issue`, `equipment`, `users`, `dates` WHERE ".$_GET['time']."(dates.date_time) = ".$_GET['time']."(now()) AND year(date_time) = year(now()) AND dates.report_issue_id = issue.issue_id AND date_identity = 'issue' AND issue.machine_id = equipment.equipment_id AND assigned_to = users.users_id ORDER by date_created DESC LIMIT ".$min.",10";
		}
		
		
	}
	
	
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$sql_dates)){
		echo 'error connecting to database';
	}else{
		$results_dates = mysqli_query($conn, $sql_dates);
		
		if($results_dates->num_rows > 0){
			while($row_dates = mysqli_fetch_array($results_dates)){
				if($_GET['site'] == "Reports"){
				?>
				<tr role="button" data-href="index.php?page=1&site=Dashboard">
				  <td><?php echo $row_dates['task'];?></td>
				  <td><?php echo $row_dates['equipment_name'];?></td>
				  <td><?php echo $row_dates['floor'];?></td>
				  <td><?php echo $row_dates['room_number'];?></td>
				  <td><?php echo $row_dates['report_status'];?></td>
				  <?php if(!$row_dates['date_submitted']){
					  echo '<td>--</td>';
				  }else{
					  ?><td><?php echo $row_dates['date_submitted'];?></td><?php
				  }?>
				  <?php if(is_null($row_dates['for_repair'])){
					  echo '<td>--</td>';
				  }else{
					  ?><td><?php 
						if($row_dates['for_repair'] == 1){
							echo 'Yes';
						}else{
							echo 'No';
						}
					  ?></td><?php
				  }?>
				  <td><?php echo $row_dates['username'];?></td>
				</tr>
				<br>
			<?php
				}else if($_GET['site'] == "Issues"){
					?>
				<tr role="button" data-href="index.php?page=1&site=Dashboard">
				  <td><?php echo $row_dates['issue'];?></td>
				  <td><?php echo $row_dates['equipment_name'];?></td>
				  <td><?php echo $row_dates['date_created'];?></td>
				  <?php if(is_null($row_dates['issue_status'])){
					  echo '<td>--</td>';
				  }else{
					  ?><td><?php 
						if($row_dates['issue_status'] == 1){
							echo 'Resolved';
						}else{
							echo 'Not resolved';
						}
					  ?></td><?php
				  }?>
				  <td><?php echo $row_dates['date_due'];?></td>
				  <?php if(!$row_dates['date_issue_resolved']){
					  echo '<td>--</td>';
				  }else{
					  ?><td><?php echo $row_dates['date_issue_resolved'];?></td><?php
				  }?>
				 
				  <td><?php echo $row_dates['username'];?></td>
				  <td><a href="createIssue.php?site=Create issue log" class="btn btn-success" role="button" aria-pressed="true">Create issue log</a></td>
				</tr>
				<br>
			<?php
				}
			}
			
		}else{
			?>
				<tr>
					<td colspan="7" class="text-center"> There are no issue reports</td>
				</tr>
			<?php
		}
	}
	
	
?>