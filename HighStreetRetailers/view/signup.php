<?php
	require 'header.php';
?>
	<script src="https://www.google.com/recaptcha/api.js?render=6LcZ9sUUAAAAAIB_8eWpzg2Jn6AEWzhKYXgGHVn_"></script>
	<h1> Sign Up</h1>
		  
		
		<?php 
				if (isset($_GET['error'])) {
				
					if($_GET['error'] == "emptyfields" ){
						echo '<p class=signuperror"> Fill in all fields!</p>';
					}elseif ($_GET['error'] == "invalidmailuid" ) {
						echo '<p class=signuperror"> Invalid email and username!</p>';
					}elseif ($_GET['error'] == "invalidmail" ) {
						echo '<p class=signuperror"> Invalid email!</p>';
					}elseif ($_GET['error'] == "invaliduid" ) {
						echo '<p class=signuperror"> Invalid username!</p>';
					}elseif ($_GET['error'] == "passwordcheck" ) {
						echo '<p class=signuperror"> Passwords dont match!</p>';
					}elseif ($_GET['error'] == "usertook" ) {
						echo '<p class=signuperror"> Email is already being used!</p>';
					}
				}elseif (isset($_GET['signup'])) {
					if($_GET['signup'] == "success"){

						echo '<p class=signupsuccess"> Sign up success, now log in!</p>';

					}
				}
		?>
			
		<main>

			<form action="../controller/signup.php" method="post">
				<input type="text" name="uid" placeholder="Username">
				<input type="text" name="email" placeholder="Email">
				<input type="password" name="pwd" placeholder="Password">
				<input type="password" name="pwd-check" placeholder="Password Check">
				<button type="submit" name="signup-submit"> Submit</button>
			</form>
			<script>
				grecaptcha.ready(function() {
    			grecaptcha.execute('6LcZ9sUUAAAAAIB_8eWpzg2Jn6AEWzhKYXgGHVn_', {action: 'homepage'}).then(function(token) {
      			 	 document.getElementById('g-recaptcha-response').value=token;
    				});
				});
			</script>

		</main>

</body>

<footer>
	<h6> Tylor Graham - 1901195</h6>
</footer>
</html>
