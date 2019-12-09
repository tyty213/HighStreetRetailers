<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>High Street Retailers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="..\model\css\main.css">
	
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php
    	date_default_timezone_set('Europe/London');
    	include '../controller/comments.php';
    	include '../controller/articles.php';
    ?>

 </head>
<body>
	<nav class="navbar navbar-expand-md">
	  <a class="navbar-brand" href="../index.php"><img src="img\abertay.png" width="75" height="100" alt="Logo"></a>
	  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="main-navigation">
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a class="nav-link" href="../index.php">Home</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="weeklywriteup.php">Write Ups</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="news.php">Top News</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="rss.php">RSS</a>
		  </li>
		</ul>
		<div>
			<?php

			if(isset($_SESSION['userId'])){

				echo '<form action="../controller/logout.php" method="post">
					<button type="submit" name ="logout-submit"> Logout </button>
				</form> ';

			}else{

				echo '<form action="../controller/login.php" method="post">
					<input type="text" name="mailuid" placeholder="Username/Email">
					<input type="password" name="pwd" placeholder="password">
					<button type="submit" name ="login-submit"> Login </button>
				</form>

				<a href="signup.php"> Sign Up!</a>';
			}

			?>

		</div>
	  </div>
	</nav>
	</body>