<?php
	if(!isset($_SESSION['role'])){
		session_start();
	}
	include 'header.php';
?>

<div class="container-fluid py-4 overflow-hidden">
	<a href="assign_issue.php" type="button" class="btn btn-danger btn-lg my-2">Report an equipment issue</a>
	<table class="table rounded-3 shadow-lg table-hover mb-5">
		<thead class="thead-dark">
			<tr>
			<?php
				if($_SESSION['role'] == "Admin" || $_SESSION['role'] == "Head"){
					?>
						<th scope="col">Issues</th>
					<?php
				}else{
					?>
						<th scope="col">Tasks</th>
					<?php
				}
			?>
			<th scope="col">Equipment</th>
			<th scope="col">Floor</th>
			<th scope="col">Room</th>
			<th scope="col">Date created</th>
			<th scope="col">Due date</th>
			<th scope="col">Date submitted</th>
			<th scope="col">Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'backend/get_tasks_issues.p.php';
			?>
		</tbody>
	</table>
	<?php
		include 'backend/tasks_issues_pagination.p.php';
	?>
</div>