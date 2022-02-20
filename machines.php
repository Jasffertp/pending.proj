<?php
	session_start();
	include 'header.php';
	
	$sql_equipment = "SELECT * FROM `equipment` WHERE equipment_id = ".$_GET['e_id']."";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql_equipment)){
		echo 'error connecting to the database';
	}else{
		$result_equipment = mysqli_query($conn, $sql_equipment);
		$row_equipment = mysqli_fetch_assoc($result_equipment);
		
		$sql_location = "SELECT * FROM `location` WHERE location_id = ".$row_equipment['location_id']."";
		
		if(!mysqli_stmt_prepare($stmt, $sql_location)){
			echo 'error connecting to database location';
		}else{
			
			$result_loc = mysqli_query($conn, $sql_location);
			$row_loc = mysqli_fetch_assoc($result_loc);
			?>
			<div class="container-fluid py-4 overflow-hidden">
	<header class="d-flex align-items-center pb-3  border-bottom border-dark">
	<p class="d-flex align-items-center text-dark text-decoration-none  fw-b">
	  <span class="fs-3 fw-bold"><?php echo $row_equipment['equipment_name']?></span>
	</p>
	</header>
	<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="equip_img/equipment_placeholder.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <p class="text-uppercase h5"><b>asset: </b> <small class="lead"><?php echo $row_equipment['asset'];?></small></p>
		<p class="text-uppercase h5"><b>Number of repairs: </b> <small class="lead"><?php echo $row_equipment['num_of_repairs'];?></small></p>
		<p class="text-uppercase h5"><b>brand: </b> <small class="lead"><?php echo $row_equipment['brand'];?></small></p>
		<p class="text-uppercase h5"><b>machine description: </b> <small class="lead"><?php echo $row_equipment['machine_description'];?></small></p>
		<p class="text-uppercase h5"><b>floor: </b> <small class="lead"><?php echo $row_loc['floor'];?></small></p>
		<p class="text-uppercase h5"><b>room number: </b> <small class="lead"><?php echo $row_loc['room_number'];?></small></p>
		<p class="text-uppercase h5"><b>Model number: </b> <small class="lead"><?php echo $row_equipment['model_no'];?></small></p>
		<p class="text-uppercase h5"><b>Serial number: </b> <small class="lead"><?php echo $row_equipment['serial_no'];?></small></p>
		<p class="text-uppercase h5"><b>date of purchase: </b> <small class="lead"><?php echo $row_equipment['date_of_purchase'];?></small></p>
		
		<?php 
			if(!is_null($row_equipment['asset'])){
				?>
				<p class="text-uppercase h5"><b>Date last used: </b> <small class="lead"><?php echo $row_equipment['date_last_used'];?></small></p>
				<?php
			}

		?>	
		
		<p class="text-uppercase h5"><b>condition: </b> <small class="lead"><?php echo $row_equipment['condition'];?></small></p>
		<p class="text-uppercase h5"><b>is operating: </b> <small class="lead"><?php 
		if($row_equipment['operating']){
			echo 'Operational';
		}else{
			echo 'Not Operational';
		}
		?></small></p>
      </div>
    </div>
  </div>
			<?php
		}
	}
?>
	
	<a href="assign_new_task.php?site=Assign%20new%20task&asset=<?php echo $row_equipment['asset'];?>&machine=<?php echo $row_equipment['equipment_name']?>&e_id=<?php echo $row_equipment['equipment_id'];?>&room=<?php echo $row_loc['room_number'];?>" type="button" class="btn btn-primary btn-lg">
		Assign task for this equipment
	</a>
	
	<a href="assign_issue.php?site=Report%20Issue&asset=<?php echo $row_equipment['asset'];?>&machine=<?php echo $row_equipment['equipment_name']?>&e_id=<?php echo $row_equipment['equipment_id'];?>&room=<?php echo $row_loc['room_number'];?>" type="button" class="btn btn-danger btn-lg m-2">
		Report an issue of this equipment
	</a>
	
	<table class="table rounded-3 shadow-lg table-hover mb-5">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col">Task</th>
		  <th scope="col">Report status</th>
		  <th scope="col">Date created</th>
		  <th scope="col">Date due</th>
		  <th scope="col">Date submitted</th>
		  <th scope="col">For repair/with issues</th>
		  <th scope="col">Assigned to</th>
		</tr>
	  </thead>
	  <tbody>
	  
		<?php
			include 'backend/get_reports_equip.p.php';
		?>
	  </tbody>
	</table>
	<?php
		include 'backend/indiv_equip_pagination.p.php';
	?>

</div>