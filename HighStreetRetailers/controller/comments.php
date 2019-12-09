<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	require '../model/dbconnection.php';

	function setComments($conn){

		if(isset($_POST['comment-submit'])){
			$uid = $_POST['uid'];
			$date = $_POST['date'];
			$cat = $_POST['retailer'];
			$message = $_POST['message'];

			$sql = "INSERT INTO comments (uid, date, cat, message) VALUES('$uid', '$date', '$cat', '$message')";
			$result = $conn->query($sql);

			echo "<meta http-equiv='refresh' content='0'>";
		}
	}

	function getComments($conn){

		$cat = $_SESSION['retailer'];
		$sql = "SELECT * FROM comments WHERE cat = '$cat' ORDER BY date desc ";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()){

			$id = $row['uid'];
			$sql2 = "SELECT * FROM users WHERE idUsers='$id'";
			$result2 = $conn->query($sql2);

			if($row2 = $result2->fetch_assoc()){
				
				echo "<div class='comment-box'><h1>";
					echo $row2['uidUsers']."</h1><h2> ";
					echo $row['date']."</h2><br /><p>";
					echo nl2br($row['message']);
				echo "</p>";

				if(isset($_SESSION['userId'])){
					if($_SESSION['userId'] == $row2['idUsers']){

				echo "	<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
							<input type='hidden' name='cid' value='".$row['cid']."'>
							<button type='submit' name='comment-delete'>Delete</button>
						</form>

						<form class='edit-form' method='POST' action='editcomment.php'>
							<input type='hidden' name='cid' value='".$row['cid']."'>
							<input type='hidden' name='uid' value='".$row['uid']."'>
							<input type='hidden' name='date' value='".$row['date']."'>
							<input type='hidden' name='message' value='".$row['message']."'>
							<button>Edit</button>
						</form>";
					}
				}
				echo "</div>";
			}
		}
	}

	function editComments($conn){

		if(isset($_POST['edit-form'])){
			$cid = $_POST['cid'];
			$uid = $_POST['uid'];
			$date = $_POST['date'];
			$message = $_POST['message'];

			$sql = "UPDATE comments SET message = '$message' WHERE cid ='$cid'";
			$result = $conn->query($sql);

			header("Location: asda.php", true);

			
		}
	}

	function deleteComments($conn){

		if(isset($_POST['comment-delete'])){
			$cid = $_POST['cid'];

			$sql = "DELETE FROM comments WHERE cid ='$cid'";
			$result = $conn->query($sql);
			echo "<meta http-equiv='refresh' content='0'>";

			
		}
	}









