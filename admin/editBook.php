<?php
require_once '../include/db.php';
require_once '../include/functies/getGenre.php';
require_once '../include/functies/getBookInformation.php';


try{
    if(isset($_GET['book'])){
        $id = $_GET['book'];
        $book = getBookInformationId($db, $id);
    }else{
        $book = false;
    }
    if(!$book){
        $stmt = $db->prepare("SELECT id FROM books LIMIT 1");
        $stmt->execute();
        $f = $stmt->fetch(PDO::FETCH_ASSOC);
        $book = getBookInformationId($db,  $f['id']);
        
    }
    
    $genre = getGenre($db);

    $dir = '../images/books/';
    if(isset($_POST['upload']) && !empty($_FILES['image'])){
        $bestand = $_FILES['image'];
        $bookid = $book['id'];
        move_uploaded_file($bestand['tmp_name'], $dir.$bestand['name']);
        $stmt = $db->prepare("UPDATE books SET image=?, title=?, release_date=?, description=?, asin=?, pagecount=?, genre=?, subgenre=? WHERE id = $bookid");
        $bestand['name'] = empty($bestand['name']) ? $book['image'] : $bestand['name'];
        $stmt->bindParam(1, $bestand['name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['title'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['date'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['desc'], PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['asin'], PDO::PARAM_STR);
        $stmt->bindParam(6, $_POST['page'], PDO::PARAM_INT);
        $stmt->bindParam(7, $_POST['genre'], PDO::PARAM_INT);
        $_POST['sub'] = empty($_POST['sub']) ? NULL : $_POST['sub'];
        $stmt->bindParam(8, $_POST['sub'], PDO::PARAM_INT);
        $stmt->execute();
    }
    $db = null;
    $stmt = null;
}catch(PDOException $e){
    echo '<p>Oeps! Er is iets foutgegaan!</p>';
    file_put_contents('PDOErrors.txt', $e->getMessage()."\n", FILE_APPEND);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit book</title>
    <style>
     form{
         display: flex;
         flex-direction: column;
     }
     #cover{
         height: auto;
         width: 200px;
     }
    </style>
  </head>
  <body>
    <form method="post" enctype="multipart/form-data">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="<?= $book['title'];?>">
      <label for="image">Cover</label>
      <img src="../images/books/<?= $book['image'];?>" alt="<?= $book['title'];?>" id="cover">
      <input type="file" name="image" id="image">
      <label for="date">Release</label>
      <input type="date" name="date" id="date" value="<?= $book['release_date'];?>">
      <label for="desc">Description</label>
      <textarea name="desc" id="desc"><?= $book['description'];?></textarea>
      <label for="asin">Amazon link</label>
      <input type="text" name="asin" id="asin" value="<?= $book['asin'];?>">
      <label for="page">Pagecount</label>
      <input type="number" name="page" id="page" value="<?= $book['pagecount'];?>">
      <label for="genre">Genre</label>
      <select name="genre" id="genre">
        <?php
        foreach($genre as $key=>$value){
            if($value['id'] == $book['genre']){
                echo '<option value='.$value['id'].'" selected>'.$value['genre'].'</option>';
            }else{
                echo '<option value='.$value['id'].'">'.$value['genre'].'</option>';
            }
        }
        ?>
      </select>
      <label for="sub">Subgenre</label>
      <select name="sub" id="sub">
        <option value="">None</option>
        <?php
        foreach($genre as $key=>$value){
            if($value['id'] == $book['subgenre']){
                echo '<option value='.$value['id'].'" selected>'.$value['genre'].'</option>';
            }else{
                echo '<option value='.$value['id'].'">'.$value['genre'].'</option>';
            }
        }
        ?>
      </select>
      <input type="submit" name="upload" value="submit" id="upload">
    </form>
  </body>
</html>
