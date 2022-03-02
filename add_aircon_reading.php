<?php
	session_start();
	include 'header.php';
?>

<head>
	<title>Assign new task</title>

</head>
<?php 
    if(isset($_GET['status']) && $_GET['status'] == 'submitted')
    {
    	?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> Reading report submitted
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
	}
?>
	<div class="container-fluid py-4">
        <div class="info">
					<form action="backend/aircon_reading.p.php" method="post">					

						<div class="form-group">
							<label>Temperature</label>
							<input type="number" class="form-control" id="temperature" name="temperature" placeholder="Temperature">
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