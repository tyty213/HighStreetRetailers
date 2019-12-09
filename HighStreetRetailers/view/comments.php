<?php

	if(isset($_SESSION['userId'])){
		echo "	<form method='POST' action='".setComments($conn)."'>
					<hr />
					<input type='hidden' name='uid' value='".$_SESSION['userId']."'>
					<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
					<input type='hidden' name='retailer' value='".$_SESSION['retailer']."'>
					<textarea name='message'></textarea>
					<br />
					<button type='submit' name='comment-submit'>Send Comment</button>
					<hr />
				</form>";
			}else{

				echo "<textarea name='message' readonly> You need to be logged in to comment!</textarea>";

			}
		
		getComments($conn);
?>