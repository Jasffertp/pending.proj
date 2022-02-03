<?php
	if(!isset($_POST['submit'])){
		header('Location: ../index.php');
		exit();
	}else{
		session_start();
		include 'dbh.p.php';
		
		
		
		$mail = $_POST['email'];
		$pass = $_POST['pswd'];
		
		$sql = "select * from users where email = ?";
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../login.php?error=connection_error");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "s", $mail);
			mysqli_stmt_execute($stmt);
			
			$result = mysqli_stmt_get_result($stmt);
			
			if($row = mysqli_fetch_assoc($result)){
				
				if($pass != $row['password']){
					header('Location: ../login.php?error=password');
					exit();
				}else{
					
					session_start();
					$_SESSION['userId'] = $row['id'];
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['lname'] = $row['lname'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['role'] = $row['role'];
					
					header("location: ../index.php?loginsuccessful&email=".$_SESSION['email']."&role=".$_SESSION['role']."&site=Dashboard");
				}
			}else{
				header('location: ../login.php?error=userdoesnotexist');
				exit();
			}
		}
	}
	
