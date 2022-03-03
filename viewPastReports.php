<?php
session_start();
include 'backend/dbh.p.php';
include 'header.php';

//getting specific reports record
$sql_report = "SELECT * FROM `reports` WHERE report_id = ".$_GET['r']."";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_report)){
	echo 'error connecting to the database report';
}else{
	$result_report = mysqli_query($conn, $sql_report);
	$row_report = mysqli_fetch_assoc($result_report);
}

//getting specific equipment record
$sql_equipment = "SELECT * FROM `equipment` WHERE equipment_id = ".$_GET['e']."";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_equipment)){
	echo 'error connecting to the database equipment';
}else{
	$result_equipment = mysqli_query($conn, $sql_equipment);
	$row_equipment = mysqli_fetch_assoc($result_equipment);
}
if ('HVAC' == $row_equipment['asset']) {
	include 'viewPastReportHVAC.php';
}else {
	include 'viewPastReportGenSet.php';
}
?>