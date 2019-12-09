<?php
	
	include '../controller/comments.php';


	$cid = $_POST['cid'];
	$uid = $_POST['uid'];
	$date = $_POST['date'];
	$message = $_POST['message'];

	echo "	<form method='POST' action='".editComments($conn)."'>
				<hr />
				<input type='hidden' name='cid' value='".$cid."'>
				<input type='hidden' name='uid' value='".$uid."'>
				<input type='hidden' name='date' value='".$date."'>
				<textarea name='message'>".$message."</textarea>
				<br />
				<button type='submit' name='edit-form'>Edit</button>
				<hr />
			</form>";
	echo '<link rel="stylesheet" type="text/css" href="..\model\css\main.css">';