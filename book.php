<?php
include 'include/db.php';
include 'include/functies/functies.php';
include 'include/bookid.php';

if($_GET['book'] ?? false){
    $stmt = $db->prepare('SELECT b.id, b.author, b.image, b.title, b.release_date, g.genre, b.description, b.asin, b.language FROM books b JOIN genres g on b.genre = g.id WHERE b.slug = :slug');
    $stmt->bindParam(':slug',$_GET['book']);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
    $json = true;
}else{
    $book = false;
    $json = false;
}
?>

<!doctype html>
<html>
  <head>
    <?php require_once 'include/meta.php';?>
    <?php if($json){ echo makeJsonld($db, [$book['id']]);}?>
  </head>
  <body>
    <div class="container">
      <?php require_once 'include/header.php';?>
      <main>
        <div class="content">
          <h1 class="title"><?php echo $book['title'];  ?></h1>
          <div class="row">
            <iframe type="text/html" width="504" height="825" frameborder="0" allowfullscreen style="max-width:100%" src="https://read.amazon.com/kp/card?asin=<?php echo $book['asin']; ?>&preview=inline&linkCode=kpe&ref_=cm_sw_r_kb_dp_-sYtEb2YBFR85&hideShare=true" ></iframe>
            <table>
	          <?php 
				 echo '<tr><td class="first">Author:</td><td class="second"> '.$book['author'].'</td></tr>';
				 echo '<tr><td class="first">Title:</td><td class="second"> '.$book['title'].'</td></tr>';
				 echo '<tr><td class="first">Release Date:</td><td class="second"> '.$book['release_date'].'</td></tr>';
				 echo '<tr><td class="first">Genre:</td><td class="second"> '.$book['genre'].'</td></tr>';
				 echo '<tr><td class="first">Description:</td><td class="second"> '.$book['description'].'</td></tr>';
				 echo '<tr><td class="first">Asin:</td><td class="second"> '.$book['asin'].'</td></tr>';
				 echo '<tr><td class="first">Language:</td><td class="second"> '.$book['language'].'</td></tr>';
				 ?>
        	</table>
          </div>
        </div>
      </main>
      <?php require_once 'include/footer.php';?>
    </div>
  </body>
</html>
