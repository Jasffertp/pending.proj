<?php
session_start();
include 'dbh.p.php';

if(isset($_POST['submit']))
{
	$temperature= $_POST['temperature'];

	$query = "INSERT INTO `equipment_readings_aircon`(`temperature`) VALUES (?)";
	$query_run = mysqli_query($con, $query);
	
	if($temperature > 20){ 
		echo "Abnormal temperature detected.";
	}else {
		echo "Normal temperature";
	}

}

	
	
?> 