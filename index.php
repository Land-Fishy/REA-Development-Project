<?php
include 'include/db.php';
include 'include/functies/functies.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>
	<link rel="stylesheet" type="text/css" href="css/botbar.css" important>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="script/botbar.js"></script>
    <title>Lewis Wolfe</title>
  </head>
  <body>
    <div class="container" id="index">
		<?php require_once 'include/header.php';?>
		<main>
			<figure>
				<a href="#">
					<img src="images/books/newbook.jpg">
					<figcaption>a monster escapes</figcaption>
				</a>
			</figure>
			<figure>
			  <img src="images/books/newbook.jpg">
			  <figcaption>a monster escapes</figcaption>
			</figure>
			<figure>
				<img src="images/books/newbook.jpg">
				<figcaption>a monster escapes</figcaption>
			</figure>
			<figure>
				<img src="images/books/newbook.jpg">
				<figcaption>a monster escapes		</figcaption>
			</figure>
		</main>
		<?php require_once 'include/notification.php';?>
		<?php require_once 'include/footer.php';?>
    </div>
  </body>
</html>
