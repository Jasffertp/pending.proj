<?php
	if(!isset($_SESSION['role'])){
		session_start();
	}
	include 'header.php';
?>

<div class="container-fluid py-4 overflow-hidden">
	<?php
	if($_GET['site'] == "Reports"){
		?>
		<a href="assign_issue.php" type="button" class="btn btn-danger btn-lg my-2">Report an equipment issue</a>
		<table class="table rounded-3 shadow-lg table-hover mb-5">
			<thead class="thead-dark">
				<tr>
				<th scope="col">Tasks</th>
				<th scope="col">Equipment</th>
				<th scope="col">Floor</th>
				<th scope="col">Room</th>
				<th scope="col">Date created</th>
				<th scope="col">Due date</th>
				<th scope="col">Date submitted</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include 'backend/get_reports_issues.p.php';
				?>
			</tbody>
		</table>
		<?php
			include 'backend/reports_issues_pagination.p.php';
		?>
		<?php
	}else if($_GET['site'] == "Issue Reports"){
		?>
		<a href="assign_issue.php" type="button" class="btn btn-danger btn-lg my-2">Report an equipment issue</a>
		<table class="table rounded-3 shadow-lg table-hover mb-5">
			<thead class="thead-dark">
				<tr>
				<th scope="col">Issues</th>
				<th scope="col">Equipment</th>
				<th scope="col">Floor</th>
				<th scope="col">Room</th>
				<th scope="col">Date created</th>
				<th scope="col">Status</th>
				<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include 'backend/get_reports_issues.p.php';
				?>
			</tbody>
		</table>
		<?php
			include 'backend/reports_issues_pagination.p.php';
		?>
		<?php
	}
	?>
	
</div>