<head>
	<title>Create Issue Report</title>
</head>
<?php
	session_start();
	include 'header.php';
?>

<?php 
    if(isset($_GET['status']) && $_GET['status'] == 'submitted')
    {
    	?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> Issue submitted succesfully
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
	}
?>
	<div class="container-fluid py-4">
        <div class="info">
					<form action="backend/create_issue.p.php" method="post">
						<h2>Machine Details</h2>
						<hr class="rounded">
						<?php
						
							if(isset($_GET['asset']) && isset($_GET['machine']) && isset($_GET['e_id']) && isset($_GET['room'])){
								?>
									<div class="form-group">
									<label>Type of Machine</label>
									<select class="form-control" name="typeOfMachine" id="typeOfMachine" readonly>
										<option value="<?php echo $_GET['asset'];?>" selected><?php echo $_GET['asset'];?></option>
									</select>
									</div>

									<div class="form-group">
										<label for="formGroupExampleInput2">Machine</label>
										<input type="text" class="form-control" id="machine" name="machine"placeholder="Select Machine" disabled>
										<select class="form-control" name="airconForm" id="HVAC" readonly>
											<option value="<?php echo $_GET['e_id'];?>" selected><?php echo $_GET['machine'], " ", $_GET['room'];?></option>
										</select>
										<select class="form-control" name="gensetForm" id="Genset" readonly>
											<option value="<?php echo $_GET['e_id'];?>" selected><?php echo $_GET['machine'], " ", $_GET['room'];?></option>
										</select>
									</div>
								<?php
							}else{
								?>
								<div class="form-group">
								<label>Type of Machine</label>
								<select class="form-control" name="typeOfMachine" id="typeOfMachine">
									<option value="none">--</option>
									<?php
										include 'backend/get_asset.p.php';
									?>
								</select>
								</div>

								<div class="form-group">
									<label for="formGroupExampleInput2">Machine</label>
									<input type="text" class="form-control" id="machine" name="machine"placeholder="Select Machine" disabled>
									<select class="form-control" name="airconForm" id="HVAC">
									  <option value="">--</option>
										<?php
											include 'backend/get_hvac.p.php';
										?>
									</select>
									<select class="form-control" name="gensetForm" id="Genset">
										<option value="">--</option>
										<?php
											include 'backend/get_genset.p.php';
										?>
									</select>
								</div>
								<?php
							}
						?>
						<br>
						<h2>Issue Details</h2>
						<hr class="rounded">
						<div class="form-group">
							<label>Issue</label>
							<input type="text" class="form-control" name="issue" placeholder="What is the issue?" required>
						</div>

						<div class="form-group">
							<label>Issue Description</label>
							<textarea class="form-control" name="issue_desc" placeholder="Place remarks here"></textarea> 
						</div>
						
						<?php
							if($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Head'){
								?>
								<div class="form-group">
									<label for="typeOfForm">Assign To</label>
									  <select class="form-control" name="assignedTo" required>
										  <option value="">--</option>
											<?php
											include 'backend/get_admin.p.php';
											?>
									  </select>
								</div>
								<div class="form-group">
									<label for="formGroupExampleInput2">Due date & time</label>
									<input type="datetime-local" class="form-control" name="dueDate" required>
								</div> 
								<?php
							}
						?>
						
						
						<button class="btn btn-primary mb-2" type="submit" name="submit">Submit</button>
					</form>
				</div>
    </div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">		
	$("#typeOfMachine").change(function() {
			if ($(this).val() == "Genset") {
				$('#machine').hide();
				$('#Genset').show();
				$('#HVAC').hide();
			}else if ($(this).val() == "HVAC") {
				$('#machine').hide();
				$('#Genset').hide();
				$('#HVAC').show();
			}else {
				$('#machine').show();
				$('#Genset').hide();
				$('#HVAC').hide();
			}
		});
		$("#typeOfMachine").trigger("change");
	</script>
	</div> 