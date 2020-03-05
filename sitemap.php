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
    <div class="container" id="index">
		  <?php require_once 'include/header.php';?>
		  <main>
        <ul class="sitemap">
          <li><a href="home">home</a></li>
          <li>
            <a href="books">books</a>
            <ul>
              <?php
              foreach($ids as $v){
                  echo '<li><a href="book/'.$v['slug'].'">'.$v['title'].'</a></li>';
              }
              ?>
            </ul>
          </li>
          <li><a href="about-me">about me</a></li>
          <li><a href="contact">contact</a></li>
        </ul>
		  </main>
		  <?php require_once 'include/footer.php';?>
    </div>
  </body>
</html>
