<head>
	<title>Reports</title>
	<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
	<script type="text/javascript" src="Scripts/jquery-2.1.1.min.js"></script>
</head>
<?php
	session_start();
	include 'header.php';
?>

<div class="container-fluid py-4 overflow-hidden">
	<div class="container-fluid">
		<div class="row">
			<div class="col p-2">
				<div class="btn-group">
				  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Floor
				  </button>
				  <div class="dropdown-menu">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Separated link</a>
				  </div>
				</div>
			</div>
			<div class="col p-2">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Report Status
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" 
					<?php
					if(!isset($_GET['status'])){
						echo 'active';
					}else if($_GET['status'] == 'done'){
						echo 'active';
					}
				?> href="reports.php?site=Reports&page=1&status=done">Done</a>
					
					<a class="dropdown-item" 
					<?php
					if(!isset($_GET['status'])){
						echo 'active';
					}else if($_GET['status'] == 'unresolved'){
						echo 'active';
					}
				?> href="reports.php?site=Reports&page=1&status=unresolved">Unresolved</a>

				  </div>
				</div>
			</div>
			<div class="col p-2">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					For repair
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
				  </div>
				</div>
			</div>
			<div class="col p-2">
				<div class="btn-group btn-group" role="group">
			  <a type="button" class="btn btn-info 
				<?php
					if(!isset($_GET['time'])){
						echo 'active';
					}else if($_GET['time'] == 'day'){
						echo 'active';
					}
				?>
			  " href="reports.php?site=Reports&page=1&time=day">Daily</a>
			  <a type="button" class="btn btn-info <?php
					if(isset($_GET['time'])){
						if($_GET['time'] == 'week'){
							echo 'active';
						}
					}
				?>" href="reports.php?site=Reports&page=1&time=week">This Week</a>
			  <a type="button" class="btn btn-info <?php
					if(isset($_GET['time'])){
						if($_GET['time'] == 'month'){
							echo 'active';
						}
					}
				?>" href="reports.php?site=Reports&page=1&time=month">This Month</a>
				
				<a type="button" class="btn btn-info <?php
					if(isset($_GET['time'])){
						if($_GET['time'] == 'year'){
							echo 'active';
						}
					}
				?>" href="reports.php?site=Reports&page=1&time=year">This year</a>
			</div>
			</div>
			<div class="col p-2">
				<form class="form-inline">
					<input class="form-control mr-sm-2 w-100" type="search" placeholder="Search" aria-label="Search">
				</form>
			</div>
			
			
			
			
			
		</div>
	</div>
	
	<table class="table rounded-3 shadow-lg table-hover mb-5">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col"><a class="nav-link text-light" href="reports.php?site=Reports&time=<?php
			if(isset($_GET['time'])){
				echo $_GET['time'];
			}else{
				echo 'day';
			}
		  ?>&page=1&order=task&by=<?php
			if(isset($_GET['by'])){
				if($_GET['by'] == 'asc'){
					echo 'desc';
				}else{
					echo 'asc';
				}
			}else{
				echo 'asc';
			}
		  ?>">Task</a></th>
		  <th scope="col"><a class="nav-link text-light" href="reports.php?site=Reports&time=<?php
			if(isset($_GET['time'])){
				echo $_GET['time'];
			}else{
				echo 'day';
			}
		  ?>&page=1&order=equipment_name&by=<?php
			if(isset($_GET['by'])){
				if($_GET['by'] == 'asc'){
					echo 'desc';
				}else{
					echo 'asc';
				}
			}else{
				echo 'asc';
			}
		  ?>">Equipment</a></th>
		  <th scope="col"><a class="nav-link text-light" href="reports.php?site=Reports&time=<?php
			if(isset($_GET['time'])){
				echo $_GET['time'];
			}else{
				echo 'day';
			}
		  ?>&page=1&order=floor&by=<?php
			if(isset($_GET['by'])){
				if($_GET['by'] == 'asc'){
					echo 'desc';
				}else{
					echo 'asc';
				}
			}else{
				echo 'asc';
			}
		  ?>">Floor</a></th>
		  <th scope="col"><a class="nav-link text-light" href="reports.php?site=Reports&time=<?php
			if(isset($_GET['time'])){
				echo $_GET['time'];
			}else{
				echo 'day';
			}
		  ?>&page=1&order=room_number&by=<?php
			if(isset($_GET['by'])){
				if($_GET['by'] == 'asc'){
					echo 'desc';
				}else{
					echo 'asc';
				}
			}else{
				echo 'asc';
			}
		  ?>">Room Number</a></th>
		  <th scope="col"><a class="nav-link text-light" href="reports.php?site=Reports&time=<?php
			if(isset($_GET['time'])){
				echo $_GET['time'];
			}else{
				echo 'day';
			}
		  ?>&page=1&order=report_status&by=<?php
			if(isset($_GET['by'])){
				if($_GET['by'] == 'asc'){
					echo 'desc';
				}else{
					echo 'asc';
				}
			}else{
				echo 'asc';
			}
		  ?>">Report status</a></th>
		  <th scope="col"><a class="nav-link text-light" href="reports.php?site=Reports&time=<?php
			if(isset($_GET['time'])){
				echo $_GET['time'];
			}else{
				echo 'day';
			}
		  ?>&page=1&order=date_submitted&by=<?php
			if(isset($_GET['by'])){
				if($_GET['by'] == 'asc'){
					echo 'desc';
				}else{
					echo 'asc';
				}
			}else{
				echo 'asc';
			}
		  ?>">Date submitted</a></th>
		  <th scope="col"><a class="nav-link text-light" href="reports.php?site=Reports&time=<?php
			if(isset($_GET['time'])){
				echo $_GET['time'];
			}else{
				echo 'day';
			}
		  ?>&page=1&order=for_repair&by=<?php
			if(isset($_GET['by'])){
				if($_GET['by'] == 'asc'){
					echo 'desc';
				}else{
					echo 'asc';
				}
			}else{
				echo 'asc';
			}
		  ?>">For repair</a></th>
		  <th scope="col"><a class="nav-link text-light" href="reports.php?site=Reports&time=<?php
			if(isset($_GET['time'])){
				echo $_GET['time'];
			}else{
				echo 'day';
			}
		  ?>&page=1&order=username&by=<?php
			if(isset($_GET['by'])){
				if($_GET['by'] == 'asc'){
					echo 'desc';
				}else{
					echo 'asc';
				}
			}else{
				echo 'asc';
			}
		  ?>">Assigned to</a></th>
		</tr>
	  </thead>
	  <tbody>
	  
		<?php
			include 'backend/get_reports.p.php';
		?>
		<?php
			include 'backend/dropdown_filter_status.p.php' 
		?>
	  </tbody>
	</table>
	
	<?php
		include 'backend/table_pagination_reports.p.php';
	?>
	
</div>

