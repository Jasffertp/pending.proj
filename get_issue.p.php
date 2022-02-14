<?php
session_start();
$con = mysqli_connect("localhost","root","","pending_project");

if(isset($_POST['submit']))
{
	$typeOfMachine = $_POST['typeOfMachine'];
	if($typeOfMachine == "aircon") { 
		$machine=$_POST['airconForm'];
	}else if($typeOfMachine == "genset"){
		$machine=$_POST['gensetForm'];
	}
	$issue = $_POST['issue'];
	$remarks = $_POST['remarks'];

    $query = "INSERT INTO createissues (typeOfMachine,machine,issue,remarks) VALUES ('$typeOfMachine','$machine','$issue','$remarks')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "issue submitted Succesfully";
        header("Location: createIssue.php?site=Create issue log");
    }
    else
    {
        $_SESSION['status'] = "issue not submitted";
        header("Location: createIssue.php?site=Create issue log");
    }
}
?>