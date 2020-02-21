<?php
include 'include/db.php';
include 'include/functies/functies.php';

if(true){
    $stmt = $db->prepare('SELECT title, id FROM books ORDER BY release_date DESC;');
    $stmt->execute();
    $ids = $stmt->fetchall(PDO::FETCH_ASSOC);

    foreach($ids as $id){
        $bookids[] = $id['id'];
    }
}

?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lewis Wolfe</title>
    
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>
<<<<<<< HEAD
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <?php echo makeJsonld($db, $bookids); ?>
  </head>
  <body>
    <div class="container" id="index">
		  <?php require_once 'include/header.php';?>
		  <main>
        <?php echo makeBookFigures($db, $bookids); ?>
		  </main>
		  <?php require_once 'include/footer.php';?>
=======
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
>>>>>>> 3e4bd13af8a59e2abe2f81bdd71767b213f0d1ba
    </div>
  </body>
</html>
