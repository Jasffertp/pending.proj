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
				  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Action
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
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<a class="dropdown-item" href="#">Something else here</a>
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
				<form class="form-inline">
					<input class="form-control mr-sm-2 w-100" type="search" placeholder="Search" aria-label="Search">
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
	  </tbody>
	</table>
	
	<?php
		include 'backend/table_pagination_reports.p.php';
	?>
	
</div>