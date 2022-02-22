<?php

session_start();
include 'dbh.p.php';
include '../header.php';

//getting specific reports record
$sql_report = "SELECT * FROM `reports` WHERE report_id = ".$_GET['task']."";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_report)){
	echo 'error connecting to the database';
}else{
	$result_report = mysqli_query($conn, $sql_report);
	$row_report = mysqli_fetch_assoc($result_report);
}

//getting specific equipment record
$sql_equipment = "SELECT * FROM `equipment` WHERE equipment_id = ".$_GET['e']."";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_equipment)){
	echo 'error connecting to the database';
}else{
	$result_equipment = mysqli_query($conn, $sql_equipment);
	$row_equipment = mysqli_fetch_assoc($result_equipment);
}

//getting the location of specific equipment
$sql_location = "SELECT * FROM `location` WHERE location_id = ".$row_equipment['location_id']."";
	
if(!mysqli_stmt_prepare($stmt, $sql_location)){
	echo 'error connecting to database location';
}else{	
	$result_loc = mysqli_query($conn, $sql_location);
	$row_loc = mysqli_fetch_assoc($result_loc);
}
?>

<head>
	<title>Create Status Report</title>
</head>

<div class="main_content" style="padding:3%;">
    <div class="info">

		<!-- assigned task info -->
		<span class="form-group" style="float:right;">
		<a href="#">
		<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#equipmentModal">About Equipment</button>
		</a>
		</span>

		<!-- assigned task info -->
		<p><small class="lead"><b>Task: </b> <?php echo $row_report['task']; ?> </small></p>
		<p><small class="lead"><b>Due Date: </b> <?php echo $row_report['task_due']; ?> </small></p>
		
		<!-- form submission based on asset -->
		<?php
		if('HVAC' == $row_equipment['asset']) { ?>
			<form action="get_status_report_hvac.p.php" method="post">
				<div class="row">
	              <div class="col-4">
	                <label for="volt">Voltage</label>
	                <input type="number" class="form-control w-100" name="volt" id="volt">
	              </div>
				  <div class="col-4">
	                <label for="pressure">Pressure</label>
	                <input type="number" class="form-control w-100" name="pressure" id="pressure">
	              </div>
				  <div class="col-4">
	                <label for="temp">Temperature</label>
	                <input type="number" class="form-control w-100" name="temp" id="temp">
	              </div>
	            </div> 
		<?php }else { ?>
			<form action="get_status_report_genset.p.php" method="post">
			<div class="row">
				  <label for="Voltage">Voltage</label>
	              <div class="col-4">
	                <input type="number" class="form-control w-100" name="v1" id="voltage_line_1" placeholder="Line 1">
	              </div>
				  <div class="col-4">
				  <input type="number" class="form-control w-100" name="v2" id="voltage_line_2" placeholder="Line 2">
	              </div>
				  <div class="col-4">
				  <input type="number" class="form-control w-100" name="v3" id="voltage_line_3" placeholder="Line 3">
	              </div>
	            </div>
				<br>
				<div class="row">
				  <label for="Current">Current</label>
	              <div class="col-4">
	                <input type="number" class="form-control w-100" name="c1" id="current_line_1" placeholder="Line 1">
	              </div>
				  <div class="col-4">
				  <input type="number" class="form-control w-100" name="c2" id="current_line_2" placeholder="Line 2">
	              </div>
				  <div class="col-4">
				  <input type="number" class="form-control w-100" name="c3" id="current_line_3" placeholder="Line 3">
	              </div>
	            </div>
				<br>
				<div class="row">
	              <div class="col-4">
				    <label for="frequency">Frequency</label>
	                <input type="number" class="form-control w-100" name="frequency" id="frequency" placeholder="hz">
	              </div>
				  <div class="col-4">
				    <label for="battery_voltage">Battery Voltage</label>
	                <input type="number" class="form-control w-100" name="battery_voltage" id="battery_voltage" placeholder="V">
	              </div>
				  <div class="col-4">
				  <label for="running_hours">Running Hours</label>
				  <input type="number" class="form-control w-100" name="running_hours" id="running_hours" placeholder="h">
	              </div>
	            </div>
				<br>
				<div class="row">
	              <div class="col-6">
				    <label for="oil_pressure">Oil Prssure</label>
	                <input type="number" class="form-control w-100" name="oil_pressure" id="oil_pressure" placeholder="psi">
	              </div>
				  <div class="col-6">
				  <label for="oil_temperature">Oil Temperature</label>
				  <input type="number" class="form-control w-100" name="oil_temperature" id="oil_temperature" placeholder="F">
	              </div>
	            </div>
				<br>
				<div class="row">
				  <div class="col-6">
				    <label for="rotation">Frequency of Rotation</label>
	                <input type="number" class="form-control w-100" name="rotation" id="rotation" placeholder="rpm">
	              </div>
	              <div class="col-6">
				    <label for="fuel_level">Fuel Level</label>
	                <input type="number" class="form-control w-100" name="fuel_level" id="fuel_level" placeholder="L">
	              </div>
	            </div>
				<br>
				<div class="row">
					<div class="col-12">
				  	<input type="checkbox" name="abnormal_sound" id="abnormal_sound"/>
					<label>Any abnormal sounds?</label>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
				  	<input type="checkbox" name="gas_leak" id="gas_leak"/>
					<label>Gas leak?</label>
					</div>
				</div>
			</div> 
		<?php } ?>
		<br>
		<!-- additional report remarks -->
		<div class="form-group">
			<input type="checkbox" id="repair"/>
				<label for="temp">Issue/For repair</label><br>
				<textarea class="form-control" id="repair_remarks" name="repair_remarks" rows="3"></textarea>
			</div>
            <div class="form-group">
              	<label for="comments">Other remarks</label>
              	<textarea class="form-control" id="comments" name="other_remarks" rows="3"></textarea>
            </div>
		
		<button class="btn btn-primary mb-2" type="submit" name="submit">Submit</button>
		</form>
		
		<!-- Modal -->
			<div class="modal fade" id="equipmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  				<div class="modal-dialog modal-dialog-centered" role="document">
    				<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Equipment info</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
      					<div class="modal-body">
				  			<p><b>Name: </b> <?php echo $row_equipment['equipment_name'];?></p>
				  			<p><b>Asset: </b> <?php echo $row_equipment['asset'];?></p>
							<p><b>Floor: </b> <?php echo $row_loc['floor'];?></p>
							<?php 
								if($row_loc['room_number'] == null) { ?>
									<b>Room number: </b>N/A</p>
								<?php }else { ?>
								<p><b>Room number: </b><?php echo $row_loc['room_number'];?></p> 
							<?php }; ?>
							<p><b>Room classification: </b><?php echo $row_loc['room_classification'];?></p>
      					</div>
    				</div>
  				</div>
			</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">
		function issueFunction(){
			var field1 = document.getElementById("repair_remarks");
			if (document.getElementById("repair").checked) {
				field1.style.display = "table-row";
			}else{
				field1.style.display = "none";
			}
		}		
	</script>
</div>