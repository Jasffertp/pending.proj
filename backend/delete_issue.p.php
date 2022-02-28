<?php
	include 'dbh.p.php';
	
	$sql = "DELETE FROM `issue` WHERE issue_id = ".$_GET['id']."";
	$stmt = mysqli_stmt_init($conn);
	
	echo mysqli_query($conn, $sql);
	
	header("Location: ../technician_reports.php?site=Issue%20Reports&page=1&del=true");
	exit();
?>