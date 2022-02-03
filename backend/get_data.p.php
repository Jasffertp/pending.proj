<?php
	session_start();
	include 'dbh.p.php';
	
	$sql = "SELECT * from issue";
	$stmt = mysqli_stmt_init($conn);
	$count = 0;
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo 'error connecting to server';
	}else{
		$result = mysqli_query($conn, $sql);
		
		if($result->num_rows > 0){
			while($row= mysqli_fetch_array($result)){
				$count = $count + 1;
				echo $row['report_id']." ".$row['col1_machine']." ".$row['cole_desc']." ".$row['col3_status']."<br>";
			}
			
			echo  '<br>total results: '.$count;
		}else{
			echo 'there are no results available';
		}
	}
?>