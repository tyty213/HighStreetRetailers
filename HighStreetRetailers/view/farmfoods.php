<?php
	require 'header.php';
?>
	<h1>Farmfoods</h1>
	<main role="main" class="container">

		<?php
			$_SESSION['retailer'] = "Farmfoods";
			require 'articles.php';
			require 'comments.php';
		?>
	</main>s
</body>

<footer>
	<h6> Tylor Graham - 1901195</h6>
</footer>
</html>