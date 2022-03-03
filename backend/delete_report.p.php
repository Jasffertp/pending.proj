<?php
	include 'dbh.p.php';
	
	$sql = "DELETE FROM `reports` WHERE report_id = ".$_GET['id']."";
	$stmt = mysqli_stmt_init($conn);
	
	mysqli_query($conn, $sql);
	
	$sql = "DELETE FROM dates WHERE report_issue_id = ".$_GET['id']." AND date_identity = 'report' and date_type = 'created'";
	
	mysqli_query($conn, $sql);
	
	header("Location: ../technician_reports.php?site=Issue%20Reports&page=1&dele=true");
	exit();
?>