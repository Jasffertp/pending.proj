<?php
	if(!isset($_SESSION['role'])){
		session_start();
	}
	include 'header.php';
?>

<div class="container-fluid py-4">
	<table class="table rounded-3 shadow-lg table-hover mb-5">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col">Issue</th>
		  <th scope="col">Equipment</th>
		  <th scope="col">Date Created</th>
		  <th scope="col">Assigned to</th>
		</tr>
	  </thead>
	  <tbody>
	  
		<?php
			include 'backend/assign_unassigned_issues.p.php';
		?>
	  </tbody>
	</table>
	<?php
			include 'backend/unassigned_issues_pagination.p.php';
		?>
</div>