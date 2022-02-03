<?php
	session_start();
	if(!isset($_SESSION['role'])){
		header("Location: login.php?invalidaccess");
		exit();
	}else if ($_SESSION['role'] == "head"){
		include 'header.php';
		
		include 'dashboard.php';
	}else if($_SESSION['role'] == "admin"){
		include 'header.php';
		include 'dashboard.php';
	}else if($_SESSION['role'] == "technician"){
		include 'header.php';
		echo 'you are the '.$_SESSION['role'].' user';
	}
	
	
	echo '
		
	';
?>