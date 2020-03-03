<?php
include 'include/db.php';
include 'include/functies/functies.php';
include 'include/bookid.php';
?>
<!doctype html>
<html>
  <head>
    <?php require_once 'include/meta.php';?>
  </head>
  <body>
    <div class="container">
    <?php require_once 'include/header.php';?>
    <main>
      <div class="content">
        <h1 class="title">lewis wolfe</h1>
        <div class="row">
         <div class="about-me">
		 <?php
			$about = getAbout($db);
			echo $about['text'];
		 ?>
         </div>
         <img src="images/lewis-wolfe.jpg" alt="Lewis Wolfe">
       </div>
    </div>
    </main>
      <?php require_once 'include/footer.php';?>
    </div>
  </body>
</html>
