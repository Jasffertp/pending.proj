<?php
session_start();
include 'dbh.p.php';

if(isset($_POST['submit']))
{
	$temperature= $_POST['temperature'];
	$stmt = mysqli_stmt_init($conn);

	$query = "INSERT INTO `equipment_readings_aircon`(`temperature`) VALUES (?)";
	
	if($temperature > 20){ 
		echo "Abnormal temperature detected.";
	}else {
		echo "Normal temperature";
	}

}

	
	
?> 