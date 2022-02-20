
<head>
	<title>Add new equipment</title>
</head>
<?php
	session_start();
	include 'header.php';
?>
<?php 
    if(isset($_SESSION['status']))
    {
    	?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
    	unset($_SESSION['status']);
	}
?>
	<div class="main_content">
        <div class="info">
					<form action="get_newEquipment.p.php" class="p-3" method="post">
			            <div class="form-group">
			              <label>Type of Machine</label>
			              <select class="form-control" name="typeOfMachine" id="typeOfMachine">
              				<option value="none">--</option>
                    		<option value="aircon">HVAC</option>
                    		<option value="genset">GENERATOR SETS</option>
                    		<option value="electrical">ELECTRICAL</option>
			              </select>
			            </div>
			            <!--GENSET FORM-->
			            <div class="form-group" id="gensetForm">
								<div class="form-group">
								  <label for="floor">Floor</label>
								  <select class="form-control" id="floor" name="gensetFloor">
										<option value="">--</option>
										<option value="1">Basement 1</option>
										<option value="2">Basement 2</option>
								  </select>
								</div>
								<div class="row">
								  <div class="col-6">
									<label for="roomNumber">Room Number</label>
									<input type="text" class="form-control w-100" id="roomNumber" placeholder="--" disabled>
								  </div>
								  <div class="col-6">
									<label for="roomClassification">Room Classification</label>
									<input type="text" class="form-control w-100" id="roomClassification" placeholder="--" disabled>
								  </div>
								</div>
								<br>
								<p>PARAMETERS</p>
								<div class="row">
								  <div class="col-4">
									<label for="voltage">Voltage</label>
									<input type="number" class="form-control w-100" id="voltage" name="voltage">
								  </div>
								  <div class="col-4">
									<label for="current">Current</label>
									<input type="number" class="form-control w-100" id="current" name="current">
								  </div>
								  <div class="col-4">
									<label for="frequency">Frequency</label>
									<input type="number" class="form-control w-100" id="frequency" name="frequency">
								  </div>
								</div>
								<br>
								<div class="row">
								  <div class="col-6">
									<label for="batteryVoltage">Battery Voltage</label>
									<input type="number" class="form-control w-100" id="batteryVoltage" name="batteryVoltage">
								  </div>
								  <div class="col-6">
									<label for="runningHours">Running Hours</label>
									<input type="number" class="form-control w-100" id="runningHours" name="runningHours">
								  </div>
								</div>
								<br>
								<div class="row">
									<div class="col-6">
									  <label for="oilPressure">Oil Pressure</label>
									  <input type="number" class="form-control w-100" id="oilPressure" name="oilPressure">
									</div>
									<div class="col-6">
									  <label for="oilTemp">Oil Temperature</label>
									  <input type="number" class="form-control w-100" id="oilTemp" name="oilTemp">
									</div>
								  </div>
								  <br>
								  <div class="row">
									<div class="col-6">
									  <label for="freqOfRot">Frequency of Rotation</label>
									  <input type="number" class="form-control w-100" id="freqOfRot" name="freqOfRot">
									</div>
									<div class="col-6">
									  <label for="fuelLevel">Fuel Level</label>
									  <input type="number" class="form-control w-100" id="fuelLevel" name="fuelLevel">
									</div>
								  </div>
								  <br>
								<div class="row">
								  <div class="col-6">
									<label for="dateInstalled">Date Installed</label>
									<input type="date" class="form-control w-100" id="dateInstalled" name="dateInstalled">
								  </div>
								  <div class="col-6">
									<label for="gensetStatus">Status</label>
									  <select class="form-control" id="gensetStatus" name="gensetStatus">
											<option value="">--</option>
											<option value="1">Old</option>
											<option value="2">New</option>
									  </select>
								  </div>
								</div>
								<br>
								<div class="form-group">
									<label for="gensetHistory">History</label>
									<input type="text" name="gensetHistory" class="form-control">
								</div>
							</div> 
			            <!--AIRCON FORM-->
			            <div class="form-group" id="airconForm">
				            <div class="form-group">
				              <label for="airconFloor">Floor</label>
				              <select class="form-control" id="airconFloor" name="airconFloor">
				                    <option value="">--</option>
				                    <option value="ground floor">Ground Floor</option>
				                    <option value="2nd Floor">2nd Floor</option>
				                    <option value="3rd Floor">3rd Floor</option>
				                    <option value="4th Floor">4th Floor</option>
				                    <option value="5th Floor">5th Floor</option>
				                    <option value="6th Floor">6th Floor</option>
				                    <option value="7th Floo">7th Floor</option>
				                    <option value="8th Floor">8th Floor</option>
				                    <option value="9th Floor">9th Floor</option>
				                    <option value="10th Floor">10th Floor</option>
				                    <option value="11th Floor">11th Floor</option>
				                    <option value="12th Floor">12th Floor</option>
				              </select>
				            </div>
				            <div class="row">
				              <div class="col-6">
				                <label for="roomNumber">Room Number</label>
				                <input type="text" class="form-control w-100" id="roomNumber" name="roomNumber">
				              </div>
				              <div class="col-6">
				                <label for="roomClassification">Room Classification</label>
				                <input type="text" class="form-control w-100" id="roomClassification" name="roomClassification">
				              </div>
				            </div>
				            <br>
				            <div class="row">
				              <div class="col-4">
				                <label for="fcuNumber">FCU No.</label>
				                <input type="number" class="form-control w-100" id="fcuNumber" name="fcuNumber">
				              </div>
				              <div class="col-4">
				                <label for="airconDesc">Description</label>
					              <select class="form-control" id="airconDesc" name="airconDesc">
					                    <option value="">--</option>
					                    <option value="1 is to 1">1 is to 1</option>
					                    <option value="2 in 1">2 in 1</option>
					                    <option value="3 in 1">3 in 1</option>
										<option value="Centralized">Centralized</option>
					              </select>
				              </div>
				              <div class="col-4">
				                <label for="airconBrand">Brand</label>
				                <input type="text" class="form-control w-100" id="airconBrand" name="airconBrand">
				              </div>
				            </div>
				            <br>
				            <div class="row">
				              <div class="col-6">
				                <label for="hpIndoor">Horse Power (HP) - INDOOR</label>
				                <input type="number" class="form-control w-100" id="hpIndoor" name="hpIndoor">
				              </div>
				              <div class="col-6">
				                <label for="hpOutdoor">Horse Power (HP) - OUTDOOR</label>
				                <input type="number" class="form-control w-100" id="hpOutdoor" name="hpOutdoor">
				              </div>
				            </div>
				            <br>
				            <div class="row">
				              <div class="col-4">
				                <label for="dateInstalled">Date Installed</label>
				                <input type="date" class="form-control w-100" id="dateInstalled" name="dateInstalled">
				              </div>
				              <div class="col-4">
				                <label for="airconStatus">Status</label>
					              <select class="form-control" id="airconStatus" name="airconStatus">
					                    <option value="">--</option>
					                    <option value="Old">Old</option>
					                    <option value="New">New</option>
					              </select>
				              </div>
				              <div class="col-4">
				                <label for="remarks">Remarks</label>
					              <select class="form-control" id="remarks" name="remarks">
					                    <option value="">--</option>
					                    <option value="Casset Type">Casset Type</option>
					                    <option value="Celling suspended">Celling suspended</option>
					                    <option value="Ceiling suspended Inverter">Ceiling suspended Inverter</option>
					                    <option value="all Mounted split">Wall Mounted split</option>
					                    <option value="Wall Mounted Multi split">Wall Mounted Multi split</option>
					                    <option value="Floor Standing">Floor Standing</option>
					                    <option value="Centralized">Centralized</option>
					              </select>
				              </div>
				            </div>
				            <br>
				            <div class="row">
				              <div class="col-6">
				                <label for="airconHistory">History</label>
				                <input type="text" class="form-control w-100" id="airconHistory" name="airconHistory">
				              </div>
				              <div class="col-6">
				                <label for="dateClean">Date Clean</label>
				                <input type="date" class="form-control w-100" id="dateClean" name="dateClean">
				              </div>
				            </div>
				            <br>
				            <p>PREVENTIVE MAINTENANCE</p>
				            <div class="row">
				              <div class="col-4">
				                <label for="indoorDate">Indoor/Date</label>
				                <input type="date" class="form-control w-100" id="indoorDate" name="indoorDate">
				              </div>
				              <div class="col-4">
				                <label for="outdoorDate">Outdoor/Date</label>
				                <input type="date" class="form-control w-100" id="outdoorDate" name="outdoorDate">
				              </div>
				              <div class="col-4">
				                <label for="filterDate">Filter/Date</label>
				                <input type="date" class="form-control w-100" id="filterDate" name="filterDate">
				              </div>
				            </div>
			            </div>

			            <!-- <div class="form-group">
			              <label for="comments">Comments/Questions</label>
			              <textarea class="form-control" id="comments" rows="3" placeholder="Type your comments or questions here"></textarea>
			            </div> -->
			            <button type="submit" class="btn btn-primary">Submit</button>
			          </form>
				</div>
    </div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">		
		$("#typeOfMachine").change(function() {
			if ($(this).val() == "genset") {
				$('#gensetForm').show();
				$('#airconForm').hide();
			}else if ($(this).val() == "aircon") {
				$('#gensetForm').hide();
				$('#airconForm').show();
			}else {
				$('#gensetForm').hide();
				$('#airconForm').hide();
			}
		});
		$("#typeOfMachine").trigger("change");
	</script>
	</div>