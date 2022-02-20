<?php
session_start();
$con = mysqli_connect("localhost","root","","pending_project");

if(isset($_POST['submit']))
{
	if($typeOfMachine == "aircon") { 
		$typeOfMachine = $_POST['typeOfMachine'];
        $airconFloor=$_POST['airconFloor'];
        $roomNumber=$_POST['roomNumber'];
        $roomClassification=$_POST['roomClassification'];
        $fcuNumber=$_POST['fcuNumber'];
        $airconDesc=$_POST['airconDesc'];
        $airconBrand=$_POST['airconBrand'];
        $hpIndoor=$_POST['hpIndoor'];
        $hpOutdoor=$_POST['hpOutdoor'];
        $dateInstalled=$_POST['dateInstalled'];
        $airconStatus=$_POST['airconStatus'];
        $remarks=$_POST['remarks'];
        $airconHistory=$_POST['airconHistory'];
        $dateClean=$_POST['dateClean'];
        $indoorDate=$_POST['indoorDate'];
        $outdoorDate=$_POST['outdoorDate'];
        $filterDate=$_POST['filterDate'];

    $query = "INSERT INTO newequipmentaircon (typeOfMachine,airconFloor,roomNumber,roomClassification,fcuNumber,airconDesc,airconBrand,hpIndoor,hpOutdoor,dateInstalled,airconStatus,remarks,airconHistory,dateClean,indoorDate,outdoorDate,filterDate) VALUES ('$typeOfMachine','$airconFloor','$roomNumber','$roomClassification','$fcuNumber','$airconDesc','$airconBrand','$hpIndoor','$hpOutdoor','$dateInstalled','$airconStatus','$remarks','$airconHistory','$dateClean','$indoorDate','$outdoorDate','$filterDate')";
    }

    else if($typeOfMachine == "genset"){
		$typeOfMachine = $_POST['typeOfMachine'];
        $gensetFloor=$_POST['gensetFloor'];
        $voltage=$_POST['voltage'];
        $current=$_POST['current'];
        $frequency=$_POST['frequency'];
        $batteryVoltage=$_POST['batteryVoltage'];
        $runningHours=$_POST['runningHours'];
        $oilPressure=$_POST['oilPressure'];
        $oilTemp=$_POST['oilTemp'];
        $freqOfRot=$_POST['freqOfRot'];
        $fuelLevel=$_POST['fuelLevel'];
        $dateInstalled=$_POST['dateInstalled'];
        $gensetStatus=$_POST['gensetStatus'];
        $gensetHistory=$_POST['gensetHistory'];

    $query = "INSERT INTO newequipmentgenset (typeOfMachine,gensetFloor,voltage,current,frequency,batteryVoltage,runningHours,oilPressure,oilTemp,freqOfRot,fuelLevel,dateInstalled,gensetStatus,gensetHistory) VALUES ('$typeOfMachine','$gensetFloor','$voltage','$current','$frequency','$batteryVoltage','$runningHours','$oilPressure','$oilTemp','$freqOfRot','$fuelLevel','$dateInstalled','$gensetStatus','$gensetHistory')";
	}

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['status'] = "Equipment added Succesfully";
        header("Location: assignNewTask.php?site=Assign new task");
    }
    else
    {
        $_SESSION['status'] = "Equipment not added";
        header("Location: assignNewTask.php?site=Assign new task");
    }
}
?>