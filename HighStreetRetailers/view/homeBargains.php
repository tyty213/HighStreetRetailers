<?php
	require 'header.php';
?>
	
	<h1>Home Bargains</h1>
	<main role="main" class="container">

		<?php
			$_SESSION['retailer'] = "Home Bargains";
			require 'articles.php';
			require 'comments.php';
		?>
	</main>
</body>

<footer>
	<h6> Tylor Graham - 1901195</h6>
</footer>
</html>