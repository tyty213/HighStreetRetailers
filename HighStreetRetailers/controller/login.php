<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['login-submit'])){

	require '../model/dbconnection.php';

	$mailUid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if(empty($mailUid) || empty($password)){
		
		header("Location: ../index.php?error=emptyfields");
		exit();

	}else{

		$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
		
		header("Location: ../index.php?error=sqlerror");
		exit();


		}else{

			mysqli_stmt_bind_param($stmt, "ss", $mailUid, $mailUid);
			mysqli_stmt_execute($stmt);
			$results = mysqli_stmt_get_result($stmt);

			if($row = mysqli_fetch_assoc($results)){

				$pwdCheck = password_verify($password, $row['pwd']);
				if($pwdCheck == false){

					header("Location: ../index.php?error=incorrectdetails");
					exit();

				}elseif ($pwdCheck == true) {
					
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUid'] = $row['uidUsers'];
					
					header("Location: ../index.php?login=success");
					exit();

				}else{

					header("Location: ../index.php?error=incorrectdetails");
					exit();

				}
			}else{
				header("Location: ../index.php?error=nouser");
				exit();

			}
		}

	}

}else{

	header("Location: ../index.php");
	exit();

}