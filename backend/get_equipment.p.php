<?php

	include 'dbh.p.php';
	$sql = "SELECT equipment_id, equipment_name, asset, equipment.location_id, location.floor, location.location_id,location.room_number, date_of_purchase, equipment.condition, equipment.operating FROM `equipment`, `location` WHERE location.location_id = equipment.location_id AND operating";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo 'error connecting to the database';
	}else{
		echo 'connection secured';
	}
?>