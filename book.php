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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lewis Wolfe</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <?php if($json){ echo makeJsonld($db, [$book['id']]);}?>
  </head>
  <body>
    <div class="container">
<<<<<<< HEAD
    <?php require_once 'include/header.php';?>
    <main>
      <div class="content">
        <h1 class="title">a monster escapes</h1>
        <div class="row">
          <iframe type="text/html" width="504" height="825" frameborder="0" allowfullscreen style="max-width:100%" src="https://read.amazon.com/kp/card?asin=B07WPKY3H1&preview=inline&linkCode=kpe&ref_=cm_sw_r_kb_dp_-sYtEb2YBFR85&hideShare=true" ></iframe>
            <table>
              <tr>
                <th>a monster escapes</th>
              </tr>
              <tr>
                <td colspan="2" class="right">Author:</td>
                <td>Lewis Wolfe</td>
              </tr>
              <tr>
                <td colspan="2" class="right">Title:</td>
                <td>A Monster Escapes</td>
              </tr>
              <tr>
                <td colspan="2" class="right">Release Date:</td>
                <td>August 23, 2019</td>
              </tr>
              <tr>
                <td colspan="2" class="right">Genre:</td>
                <td>Horror</td>
              </tr>
              <tr>
                <td colspan="2" class="right">Description:</td>
                <td>A dark force plagues the town of Brettville, Alabama, clawing at its victims and sending them into states of delusion, fear and paranoia. It looks for guilt and grief, trauma that smells and tastes so very sweet. While feeding on these painful memories, it lures its victims into a trap of endless waking nightmares.

                Ex-marine Caleb Epps takes on the job of bodyguard for the strange investigator, Jane Elring. Together they travel to Brettville to unravel the mystery that holds the town in its suffocating grip. Soon Caleb finds himself caught up in a battle of wits between this strange, dark force and his new employer.

                An employer that perhaps can't be trusted. As time goes on old questions make room for new ones. Why are the people that know Jane Elring afraid of her? What secrets lie hidden beneath the calm of her angelic face? And how does Caleb fit into the plans her sharp eyes suggest she has for him?

                Monsters come in all shapes and sizes. Sometimes they're human.</td>
              </tr>
              <tr>
                <td colspan="2" class="right">Language:</td>
                <td>English</td>
              </tr>
            </table>
=======
      <?php require_once 'include/header.php';?>
      <main>
        <div class="content">
          <h1 class="title"><?php echo $book['title'];  ?></h1>
          <div class="row">
            <iframe type="text/html" width="504" height="825" frameborder="0" allowfullscreen style="max-width:100%" src="https://read.amazon.com/kp/card?asin=<?php echo $book['asin']; ?>preview=inline&linkCode=kpe&ref_=cm_sw_r_kb_dp_-sYtEb2YBFR85&hideShare=true" ></iframe>
          </div>
>>>>>>> refs/remotes/origin/master
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
