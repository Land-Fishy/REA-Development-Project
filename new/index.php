<?php
include 'include/db.php';
include 'include/functies/functies.php';
include 'include/bookid.php';
?>
<!doctype html>
<html>
  <head>
	  <?php require_once 'include/meta.php';?>
    <?php echo makeJsonld($db, $bookids); ?>
  </head>
  <body>
    <div class="container" id="index">
		  <?php require_once 'include/header.php';?>
		  <main>
        <?php echo makeBookFigures($db, $bookids); ?>
		  </main>
		  <?php require_once 'include/footer.php';?>
    </div>
  </body>
</html>
