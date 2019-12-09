<main role="main" class="container">
		<br /><br />
	<?php
		getNewestArticle($conn);
	?>
		
		<br /><br />
		<span class="recent-articles">Recent Articles </span>
		<hr />
	<?php
		getArticles($conn);
	?> 