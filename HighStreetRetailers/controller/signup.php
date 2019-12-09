<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['signup-submit'])){

	require '../model/dbconnection.php';

	$username = $_POST['uid'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$passwordcheck = $_POST['pwd-check'];

	if(empty($username) || empty($email) || empty($password) || empty($passwordcheck)){

		header("Location: ../view/signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();

	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){

		header("Location: ../view/signup.php?error=invalidmailuid");
		exit();

	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

		header("Location: ../view/signup.php?error=invalidmail&uid=".$username);
		exit();

	}
	elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){

		header("Location: ../view/signup.php?error=invaliduid&mail=".$email);
		exit();

	}
	elseif($password !== $passwordcheck){

		header("Location: ../view/signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();

	}
	else{

		$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			
			header("Location: ../view/signup.php?error=sqlerror");
			exit();

		}else{

			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);

			if($resultCheck > 0){
				header("Location: ../view/signup.php?error=usertook&mail=".$email);
				exit();

			} else{

				$sql = "INSERT INTO users (uidUsers, emailUsers, pwd) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmt, $sql)){
			
					header("Location: ../view/signup.php?error=sqlerror");
					exit();

				}else{

					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);

					header("Location: ../index.php?signup=success");

					exit();

				}		

			}

		}

	}

	mysql_stmt_close($stmt);
	mysqli_close($conn);
}

else{

	header("Location: ../view/signup.php");
	exit();

}



