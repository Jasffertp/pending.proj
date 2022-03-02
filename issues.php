<head>
	<title>Issues</title>
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
					<a class="dropdown-item" 
					<?php
					if(!isset($_GET['floor'])){
						echo 'active';
					}else if($_GET['floor'] == '1st Floor'){
						echo 'active';
					}
					?>
					href="#">1st Floor</a>

					<a class="dropdown-item"
					<?php
					if(!isset($_GET['floor'])){
						echo 'active';
					}else if($_GET['floor'] == '2nd Floor'){
						echo 'active';
					}
					?>
					href="#">2nd Floor</a>

					<a class="dropdown-item"
					<?php
					if(!isset($_GET['floor'])){
						echo 'active';
					}else if($_GET['floor'] == '3rd Floor'){
						echo 'active';
					}
					?> 
					href="#">3rd Floor</a>

					<a class="dropdown-item"
					<?php
					if(!isset($_GET['floor'])){
						echo 'active';
					}else if($_GET['floor'] == '4th Floor'){
						echo 'active';
					}
					?> href="#">4th Floor</a>

					<a class="dropdown-item"
					<?php
					if(!isset($_GET['floor'])){
						echo 'active';
					}else if($_GET['floor'] == '5th Floor'){
						echo 'active';
					}
					?> 
					href="#">5th Floor</a>
				  </div>
				</div>
			</div>
			<div class="col p-2">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Report Status
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" <?php
					if(isset($_GET['status'])){
						if($_GET['status'] == '1'){
							echo 'active';
						}
					}
				?> href="issues.php?site=Issues&page=1&status=1">Resolved</a>
					
					<a class="dropdown-item" 
					<?php
					if(!isset($_GET['status'])){
						echo 'active';
					}else if($_GET['status'] == '0'){
						echo 'active';
					}
				?> href="issues.php?site=Issues&page=1&status=0">Not resolved</a>

				  </div>
				</div>
			</div>
			<div class="col p-2">
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					For repair
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Yes</a>
					<a class="dropdown-item" href="#">No</a>
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
			  " href="issues.php?site=Issues&page=1&time=day">Daily</a>
			  <a type="button" class="btn btn-info <?php
					if(isset($_GET['time'])){
						if($_GET['time'] == 'week'){
							echo 'active';
						}
					}
				?>" href="issues.php?site=Issues&page=1&time=week">This Week</a>
			  <a type="button" class="btn btn-info <?php
					if(isset($_GET['time'])){
						if($_GET['time'] == 'month'){
							echo 'active';
						}
					}
				?>" href="issues.php?site=Issues&page=1&time=month">This Month</a>
				
				<a type="button" class="btn btn-info <?php
					if(isset($_GET['time'])){
						if($_GET['time'] == 'year'){
							echo 'active';
						}
					}
				?>" href="issues.php?site=Issues&page=1&time=year">This year</a>
			</div>
			</div>
			<div class="col p-2">
				<form class="form-inline" method="POST">
					<input class="form-control mr-sm-2 w-100" type="text" placeholder="Search" name="search">
					<input type="submit" name="submit">
				</form>
			</div>
			
			
			
			
		</div>
	</div>
	
	<table class="table rounded-3 shadow-lg table-hover mb-5">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col">Issue</th>
		  <th scope="col">Equipment</th>
		  <th scope="col">Status</th>
		  <th scope="col">Date Created</th>
		  <th scope="col">Date Due</th>
		  <th scope="col">Date submitted</th>
		  <th scope="col">Assigned to</th>
		</tr>
	  </thead>
	  <tbody>
	  
		<?php
			include 'backend/get_reports.p.php';
		?>
		<?php
			include 'backend/search.php';s 
		?>
	  </tbody>
	</table>
	
	<?php
		include 'backend/table_pagination_reports.p.php';
	?>
	
</div>