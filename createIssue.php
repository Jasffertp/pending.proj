<?php
	session_start();
	include 'header.php';
?>

<head>
	<title>Create issue log</title>
</head>
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
					<form action="get_issue.p.php" method="post">
						<div class="form-group">
						<label>Type of Machine</label>
              			<select class="form-control" name="typeOfMachine" id="typeOfMachine">
              				<option value="none">--</option>
                    		<option value="aircon">HVAC</option>
                    		<option value="genset">GENERATOR SETS</option>
                    		<option value="electrical">ELECTRICAL</option>
              			</select>
            			</div>
            			
						<div class="form-group">
							<label for="formGroupExampleInput2">Machine</label>
							<input type="text" class="form-control" id="machine" name="machine"placeholder="Select Machine" disabled>
							<select class="form-control" name="airconForm" id="airconForm">
							  <option value="">--</option>
							  <option value="Aircon 201-A">Aircon 201-A</option>
							  <option value="Aircon 201-B">Aircon 201-B</option>
							  <option value="Aircon 201-C">Aircon 201-C</option>
							  <option value="Aircon 202-A">Aircon 202-A</option>
							  <option value="Aircon 202-B">Aircon 202-B</option>
							  <option value="Aircon 203-A">Aircon 203-A</option>
							  <option value="Aircon 203-B">Aircon 203-B</option>
							  <option value="Aircon 204-A">Aircon 204-A</option>
							  <option value="Aircon 204-B">Aircon 204-B</option>
							  <option value="Aircon 205-A">Aircon 205-A</option>
							  <option value="Aircon 205-B">Aircon 205-B</option>
							  <option value="Aircon 206-A">Aircon 206-A</option>
							  <option value="Aircon 206-B">Aircon 206-B</option>
							  <option value="Aircon 209-C">Aircon 209-C </option>
							  <option value="Aircon 608-A">Aircon 608-A</option>
							  <option value="Aircon 700-A">Aircon 700-A</option>
							  <option value="Aircon 802">Aircon 802 </option>
							  <option value="Aircon 904-B">Aircon 904-B</option>
							</select>
							<select class="form-control" name="gensetForm" id="gensetForm">
								<option value="">--</option>
								<option value="Generator Set I">Generator Set I </option>
								<option value="Generator Set II">Generator Set II</option>
							</select>
						</div>

						<div class="form-group">
							<label>Issue</label>
							<input type="text" class="form-control" name="issue" placeholder="What is the issue?">
						</div>

						<div class="form-group">
							<label>Other remarks</label>
							<textarea class="form-control" name="remarks" placeholder="Place remarks here"></textarea> 
						</div>
						<button class="btn btn-primary mb-2" type="submit" name="submit">Submit</button>
					</form>
				</div>
    </div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">		
	$("#typeOfMachine").change(function() {
			if ($(this).val() == "genset") {
				$('#machine').hide();
				$('#gensetForm').show();
				$('#airconForm').hide();
			}else if ($(this).val() == "aircon") {
				$('#machine').hide();
				$('#gensetForm').hide();
				$('#airconForm').show();
			}else {
				$('#machine').show();
				$('#gensetForm').hide();
				$('#airconForm').hide();
			}
		});
		$("#typeOfMachine").trigger("change");
	</script>
	</div>