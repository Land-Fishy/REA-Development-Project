<?php
include 'include/db.php';
include 'include/functies/functies.php';
include 'include/bookid.php';

print_r($_GET);

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
          </div>
        </div>
        <ul>
          <?php foreach($book as $k => $v){
              if(in_array($k,['id','image'])) continue;
              echo '<li>'.$k.' - '.$v.'</li>';
          } ?>
        </ul>
      </main>
      <?php require_once 'include/footer.php';?>
    </div>
  </body>
</html>
