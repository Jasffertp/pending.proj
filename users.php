<head>
	<title>Users</title>
</head>

<?php
	session_start();
	include 'header.php';
?>
<div class= "container py-4 overflow-hidden">
	<table class="table rounded-3 shadow table-hover mb-5">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col">Username</th>
		  <th scope="col">Email</th>
		  <th scope="col">Role</th>
		  <th scope="col">Change role</th>
		</tr>
	  </thead>
	  <tbody>
	  
		<?php
			include 'backend/get_users.p.php';
		?>
	  </tbody>
	</table>
	
	<?php
		include 'backend/user_pagination.p.php';
	?>
</div>

