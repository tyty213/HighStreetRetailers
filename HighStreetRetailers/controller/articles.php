<?php

function getNewestArticle($conn){

		$retailer = $_SESSION['retailer'];
		$sql = "SELECT * FROM articles WHERE cat = '$retailer' ORDER BY articleID desc LIMIT 1";
		$result = $conn->query($sql) or die($conn->error);
		while($row = $result->fetch_assoc()){

			$id = $row['articleID'];
			$title = $row['title'];
			$cat = $row['cat'];
			$date = $row['date'];
			$author = $row['author'];
			$logo = $row['logo'];
			$article = $row['article'];

			echo '<div class="row">
			<div class=col-md-8>
				<img src="'.$logo.'" width="100%" alt="Article Pic">
			</div>
			<div class=col-md-4>
				<br />
				<span class="main-article-category">'.$cat.'</span>
				<br />
				<span class="main-article-title">'.$title.'</span>
				<br />
				<span>By <span class="author-name">'.$author.'</span></span>
			</div>
		</div>';
			
		}
	}

function getArticles($conn){

		$retailer = $_SESSION['retailer'];
		$sql = "SELECT * FROM articles WHERE articleID != (SELECT MAX(articleID) FROM articles WHERE cat = '$retailer') AND cat = '$retailer'";
		$result = $conn->query($sql) or die($conn->error);
		while($row = $result->fetch_assoc()){

			$id = $row['articleID'];
			$title = $row['title'];
			$cat = $row['cat'];
			$date = $row['date'];
			$author = $row['author'];
			$logo = $row['logo'];
			$article = $row['article'];

			echo '<div class="row">

					<div class="col-md-4">
						<img src="'.$logo.'" width="100%" alt="Article Pic">
					</div>
					<div class="col-md-8">
						<br />
						<span class="sub-article-date">'.$date.'</span>
						<br />
						<span class="sub-article-title">'.$title.'</span>
						<br />
						<span class="sub-article-author">By <span class="author-name">'.$author.'</span></span>
						<br />
						<span class="sub-article-category">'.$cat.'</span>
					</div>
				</div>
				<hr />';
			
		}
	}