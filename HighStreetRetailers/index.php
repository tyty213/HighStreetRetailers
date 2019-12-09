<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>High Street Retailers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="model\css\main.css">
	
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </head>
<body>
	<nav class="navbar navbar-expand-md">
	  <a class="navbar-brand" href="#"><img src="view\img\abertay.png" width="75" height="100" alt="Logo"></a>
	  <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="main-navigation">
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a class="nav-link" href="index.php">Home</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="view\weeklywriteup.php">Write Ups</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="view\news.php">Top News</a>
		  <li class="nav-item">
			<a class="nav-link" href="view\rss.php">RSS</a>
		  </li>
		  </li>
		</ul>
		<div>

			<?php

			if(isset($_SESSION['userId'])){

				echo '<form action="controller/logout.php" method="post">
					<button type="submit" name ="logout-submit"> Logout </button>
				</form> ';

			}else{

				echo '<form action="controller/login.php" method="post">
					<input type="text" name="mailuid" placeholder="Username/Email">
					<input type="password" name="pwd" placeholder="password">
					<button type="submit" name ="login-submit"> Login </button>
				</form>

				<a href="view/signup.php"> Sign Up!</a>';

			}

			?>
			

			

		</div>
	  </div>
	</nav>
		
	<h1> Homepage</h1>
	<div class="row" style="padding: 5pt; margin: 0;" >

    <?php
    //opening the for loop
	
	include 'model/dbconnection.php';
	
      for ($i=1; $i < 13; $i++) {

        $name = $conn->query("SELECT name FROM retailers WHERE retailID = '$i'")->fetch_object()->name;
        $moto = $conn->query("SELECT moto FROM retailers WHERE retailID = '$i'")->fetch_object()->moto;
        $logo = $conn->query("SELECT logo FROM retailers WHERE retailID = '$i'")->fetch_object()->logo;
    ?>

	  <div class="col-sm-12 col-md-4 col-lg-3" style="padding: 10pt;">
      <div class="card text-center" style="width: 15rem;">
		<img class="card-img-top" data-src="holder.js/100px180/" alt="<?php echo $logo;?>" src="<?php echo $logo; ?>" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
        <div class="card-body" >
          <h5 class="card-title"><?php echo $name; ?></h4>
          <p class="card-text"><?php echo $moto;?></p>
		  <a href="view/<?php echo lcfirst($name) ?>.php" class="btn btn-primary">More info..</a>
        </div>
      </div>
    </div>

  <?php
    //closing the for loop
    }
  ?>

  </div>
		  
</body>

<footer>
	<h6> Tylor Graham - 1901195</h6>
</footer>
</html>