<?php

session_start();
include 'backend/dbh.p.php';
include 'header.php';
include 'backend/get_status_report_genset.p.php';

//getting specific reports record
$sql_report = "SELECT * FROM `reports` WHERE report_id = ".$_GET['r_id']."";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_report)){
	echo 'error connecting to the database report';
}else{
	$result_report = mysqli_query($conn, $sql_report);
	$row_report = mysqli_fetch_assoc($result_report);
}

//getting specific equipment record
$sql_equipment = "SELECT * FROM `equipment` WHERE equipment_id = ".$_GET['e_id']."";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_equipment)){
	echo 'error connecting to the database equipment';
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

//getting the readings of specific record
$sql_readings = "SELECT * FROM `equipment_readings_genset` WHERE report_id = ".$row_report['report_id']."";
	
if(!mysqli_stmt_prepare($stmt, $sql_readings)){
	echo 'error connecting to database equipment_readings_genset';
}else{	
	$result_genset = mysqli_query($conn, $sql_readings);
	$row_genset = mysqli_fetch_assoc($result_genset);
}

//getting the username of specific record
$sql_user = "SELECT * FROM `users` WHERE users_id = ".$row_genset['assigned_to']."";
	
if(!mysqli_stmt_prepare($stmt, $sql_user)){
	echo 'error connecting to database users';
}else{	
	$result_user = mysqli_query($conn, $sql_user);
	$row_user = mysqli_fetch_assoc($result_user);
}

//set checkbox values
$for_repair = $row_genset['for_repair'];
$abnormal_sound = $row_genset['abnormal_sound'];
$gas_leak = $row_genset['gas_leak'];

?>

<head>
	<style>
		.main_content{
			padding: 3%;
		}
		.section_headers {
			text-align: center;
		}
		input[type="number"]:disabled, input[type="text"]:disabled, textarea:disabled {
  			background: #e5e5e5;
			border: none;
			color: #000;
		}
	</style>
	<title>View Status Report</title>
</head>

<div class= "main_content">
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
    	<strong>Yes!</strong> Report submitted succesfully 
    	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
		
		<!-- assigned task info -->
		<span class="form-group" style="float:right;">
		<a href="#">
		<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#equipmentModal">About Equipment</button>
		</a>
		</span>

		<!-- assigned task info -->
		<p><small class="lead"><b>Task: </b> <?php echo $row_report['task']; ?> </small></p>
		<p><small class="lead"><b>Due Date: </b> <?php echo $row_report['task_due']; ?> </small></p>
		
		<!-- equipment readings -->
		<div class="row">
				  <label for="Voltage">Voltage</label>
	              <div class="col-4">
	                <input type="number" class="form-control w-100" name="v1" id="voltage_line_1" placeholder="Line 1: <?php echo $row_genset['voltage_line_1'] ?> V" disabled>
	              </div>
				  <div class="col-4">
				  <input type="number" class="form-control w-100" name="v2" id="voltage_line_2" placeholder="Line 2: <?php echo $row_genset['voltage_line_2'] ?> V" disabled>
	              </div>
				  <div class="col-4">
				  <input type="number" class="form-control w-100" name="v3" id="voltage_line_3" placeholder="Line 3: <?php echo $row_genset['voltage_line_3'] ?> V" disabled>
	              </div>
	            </div>
				<br>
				<div class="row">
				  <label for="Current">Current</label>
	              <div class="col-4">
	                <input type="number" class="form-control w-100" name="c1" id="current_line_1" placeholder="Line 1: <?php echo $row_genset['current_line_1'] ?> A" disabled>
	              </div>
				  <div class="col-4">
				  <input type="number" class="form-control w-100" name="c2" id="current_line_2" placeholder="Line 2: <?php echo $row_genset['current_line_2'] ?> A" disabled>
	              </div>
				  <div class="col-4">
				  <input type="number" class="form-control w-100" name="c3" id="current_line_3" placeholder="Line 3: <?php echo $row_genset['current_line_3'] ?> A" disabled>
	              </div>
	            </div>
				<br>
				<div class="row">
	              <div class="col-4">
				    <label for="frequency">Frequency</label>
	                <input type="number" class="form-control w-100" name="frequency" id="frequency" placeholder="<?php echo $row_genset['frequency'] ?> hz" disabled>
	              </div>
				  <div class="col-4">
				    <label for="battery_voltage">Battery Voltage</label>
	                <input type="number" class="form-control w-100" name="battery_voltage" id="battery_voltage" placeholder="<?php echo $row_genset['battery_voltage'] ?> V" disabled>
	              </div>
				  <div class="col-4">
				  <label for="running_hours">Running Hours</label>
				  <input type="number" class="form-control w-100" name="running_hours" id="running_hours" placeholder=" <?php echo $row_genset['running_hours'] ?> h" disabled>
	              </div>
	            </div>
				<br>
				<div class="row">
	              <div class="col-6">
				    <label for="oil_pressure">Oil Pressure</label>
	                <input type="number" class="form-control w-100" name="oil_pressure" id="oil_pressure" placeholder="<?php echo $row_genset['oil_pressure'] ?> psi" disabled>
	              </div>
				  <div class="col-6">
				  <label for="oil_temperature">Oil Temperature</label>
				  <input type="number" class="form-control w-100" name="oil_temperature" id="oil_temperature" placeholder="<?php echo $row_genset['oil_temperature'] ?> F" disabled>
	              </div>
	            </div>
				<br>
				<div class="row">
				  <div class="col-6">
				    <label for="rotation">Frequency of Rotation</label>
	                <input type="number" class="form-control w-100" name="rotation" id="rotation" placeholder="<?php echo $row_genset['rotation'] ?> rpm" disabled>
	              </div>
	              <div class="col-6">
				    <label for="fuel_level">Fuel Level</label>
	                <input type="number" class="form-control w-100" name="fuel_level" id="fuel_level" placeholder="<?php echo $row_genset['fuel_level'] ?> L" disabled>
	              </div>
	            </div>
				<br>
				<div class="row">
					<div class="col-12">
				  	<input type="checkbox" name="abnormal_sound" id="abnormal_sound"
					<?php if ($abnormal_sound == 1) { ?>
        			checked
    				<?php }?> disabled/>
					<label>Any abnormal sounds?</label>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
				  	<input type="checkbox" name="gas_leak" id="gas_leak"
					<?php if ($gas_leak == 1) { ?>
        			checked
    				<?php }?> disabled/>
					<label>Gas leak?</label>
					</div>
				</div>
				<br>

		<!-- additional report remarks -->
		<div class="form-group">
			<input type="checkbox" id="for_repair" name="for_repair" 
			<?php if ($for_repair == 1) { ?>
        		checked
    		<?php }?> disabled/>
			<label for="temp">Issue/For repair</label><br>
			<textarea class="form-control" id="repair_remarks" name="repair_remarks" rows="3" placeholder="<?php echo $row_genset['repair_remarks'] ?>" disabled></textarea>
		</div>
        <div class="form-group">
            <label for="comments">Other remarks</label>
            <textarea class="form-control" id="comments" name="other_remarks" rows="3" placeholder="<?php echo $row_genset['other_remarks'] ?>" disabled></textarea>
        </div>

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
	<p><small class="lead">Submitted by: <b><?php echo $row_user['username']; ?>, <?php echo $row_user['role']; ?> </b></small></p>
	<p><small class="lead">Date Submitted: <b> <?php echo $row_genset['time_submitted']; ?> </b></small></p>
	<a href="tasks.php">
		<button type="submit" class="btn btn-primary">Back to Tasks page</button>
	</a>
</div>
</div>