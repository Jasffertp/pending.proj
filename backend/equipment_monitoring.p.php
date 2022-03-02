<?php
	include 'dbh.p.php';

	//getting specific equipment record for asset
	$sql_equipment = "SELECT * FROM `equipment` WHERE equipment_id = ".$_GET['e_id']."";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql_equipment)){
		echo 'error connecting to the database equipment';
	}else{
		$result_equipment = mysqli_query($conn, $sql_equipment);
		$row_equipment = mysqli_fetch_assoc($result_equipment);
	}
	
	//getting specific equipment monitoring range for asset
	$sql_monitor = "SELECT * FROM `equipment_monitoring` WHERE asset = ".$row_equipment['asset']."";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql_monitor)){
		echo 'error connecting to database equipment monitoring';
	}else{
		$result_monitor = mysqli_query($conn, $sql_monitor);
		$row_monitor = mysqli_fetch_assoc($result_monitoer);
	}

	// checking if equipment_monitoring file is working
	echo $row_monitor['min'];
?>