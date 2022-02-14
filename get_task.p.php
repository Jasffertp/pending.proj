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
	$taskDesc = $_POST['taskDesc'];
	$assignedTo = $_POST['assignedTo'];
	$dueDate = $_POST['dueDate'];

    $query = "INSERT INTO tasks (typeOfMachine,machine,taskDesc,assignedTo,dueDate) VALUES ('$typeOfMachine','$machine','$taskDesc','$assignedTo', '$dueDate')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Task assigned Succesfully";
        header("Location: assignNewTask.php?site=Assign new task");
    }
    else
    {
        $_SESSION['status'] = "Task not assigned";
        header("Location: assignNewTask.php?site=Assign new task");
    }
}
?>