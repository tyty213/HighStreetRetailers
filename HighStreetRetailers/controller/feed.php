<?php

	require '../model/dbconnection.php';

	$sql = "SELECT articleID, title, cat, date, author FROM articles ORDER BY articleID desc LIMIT 5";
	$result = $conn->query($sql) or die($conn->error);


if($conn->affected_rows >= 1){

	echo '<?xml version="1.0" encoding="UTF-8"?>
			<rss version="2.0">
				<channel> 
					<title>High Street Retailers</title>
						<description>RSS Feed</description>
						<link>http://itstyl.org</link>';
		while($row = $result->fetch_assoc()){
			
				echo '	<item>
							<title>'.$row['title'].'</title>
							<description>'.$row['author'].'</description>
							<link>http://itstyl.org/view/'.$row['cat'].'</link>
							<category>'.$row['cat'].'</category>
						</item>';
				}
			
		echo '	</channel>
			</rss>';
		header('Content-Type: application/xml; charset=utf-8');

}else{
	echo'<h1>No articles found!</h1>';
}
