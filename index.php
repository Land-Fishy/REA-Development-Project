<?php
include 'include/db.php';
include 'include/functies/functies.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--<script src="script/scroll.js"></script>-->
    <title>Document</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="header-top">
        <h1>Lewis Wolfe</h1>
      </div>
      <?php require_once 'include/nav.php';?>
    	<header>
    		<?php require_once 'include/header.php'; ?>
    	</header>
    	<main>
        <div class="col-md-2"></div>
            <div class="container-fluid col-md-8">
              <div class="row justify-content-center">
                <figure class="col-md-4">
                <img src="images/newbook.jpg">
                <figcaption>A Monster Escapes</figcaption>
                </figure>
                <figure class="col-md-4">
                <img src="images/newbook.jpg">
                <figcaption>A Monster Escapes</figcaption>
              </figure>
              <figure class="col-md-4">
                <img src="images/newbook.jpg">
                <figcaption>A Monster Escapes</figcaption>
              </figure>
                <figure class="col-md-4">
                <img src="images/newbook.jpg">
                <figcaption>A Monster Escapes</figcaption>
                </figure>
              </div>
            </div>
          <div class="col-md-2"></div>
    	</main>
    		<?php require_once 'include/footer.php';
    		?>
    </div>
  </body>
</html>
