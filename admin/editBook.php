<?php
require_once '../include/db.php';
require_once './functies/getGenre.php';
require_once './functies/getBookInformation.php';
include './functies/sessionStart.php';
include './functies/slugger.php';
include './functies/unsetRedirect.php';

$mcharacters = [];
foreach($_POST as $k => $v){
    if(preg_match('/mcharacter\d+/', $k)){
        if(strlen($v) > 0)
            $mcharacters[] = $v;
    }
}

$deletecharacters = [];
foreach($_POST as $k => $v){
    if(preg_match('/d(\d+)/', $k, $sup)){
        $deletecharacters[] = $sup[1];
    }
}


$echaracters = [];
foreach($_POST as $k => $v){
    if(preg_match('/echaracter(\d+)/', $k, $sup)){
        $echaracters[$sup[1]] = $v;
    }
}

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
    $success = '';
    $dir = '../images/books/';
    if(isset($_POST['upload']) && !empty($_FILES['image'])){
        $bestand = $_FILES['image'];
        $bookid = $book['id'];
        $slugged = slugger($_POST['title']);
        move_uploaded_file($bestand['tmp_name'], $dir.$bestand['name']);
        $stmt = $db->prepare("UPDATE books SET image=?, title=?, release_date=?, description=?, asin=?, genre=?, slug=? WHERE id = $bookid");
        $bestand['name'] = empty($bestand['name']) ? $book['image'] : $bestand['name'];
        $stmt->bindParam(1, $bestand['name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['title'], PDO::PARAM_STR);
        $stmt->bindParam(3, $_POST['date'], PDO::PARAM_STR);
        $stmt->bindParam(4, $_POST['desc'], PDO::PARAM_STR);
        $stmt->bindParam(5, $_POST['asin'], PDO::PARAM_STR);
        $stmt->bindParam(6, $_POST['genre'], PDO::PARAM_INT);
        $stmt->bindParam(7, $slugged);
        $stmt->execute();


        if(count($deletecharacters) > 0){
            foreach($deletecharacters as $v){
                $stmt = $db->prepare("DELETE FROM `characters` WHERE `characters`.`id` = :id");
                $stmt->bindParam(':id', $v);
                $stmt->execute();
            }
        }

        if(count($echaracters) > 0){
            foreach($echaracters as $k => $v){
                $stmt = $db->prepare("UPDATE characters SET name = :name WHERE id = :id");
                $stmt->bindParam(':name', $v);
                $stmt->bindParam(':id', $k);
                $stmt->execute();
            }
        }
        
        if(count($mcharacters) > 0){
            foreach($mcharacters as $v){
                $stmt = $db->prepare("INSERT INTO characters (id, books_id, name) VALUES(NULL, :id, :name)");
                $stmt->bindParam(':id', $_GET['book']);
                $stmt->bindParam(':name', $v);
                $stmt->execute();
            }
        }
        
        header("Refresh:0");
        $success = '<p>Book edited.</p>';
    }
    $db = null;
    $stmt = null;
}catch(PDOException $e){
    echo '<p>Oeps! Er is iets foutgegaan!</p>';
    print_r($e);
    file_put_contents('PDOErrors.txt', $e->getMessage()."\n", FILE_APPEND);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit book</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>  
  </head>
  <body>
		<div class="editBook">
			<?= $success;?>
			<h1></h1>
			<form method="post" enctype="multipart/form-data">
				<div class="editDiv">
					<div>
						<label for="image">Cover</label>
						<img src="../images/books/<?= $book['image'];?>" alt="<?= $book['title'];?>" id="cover">
						<input type="file" name="image" id="image">
					</div>
					<div>
						<label for="title">Title</label>
						<input type="text" name="title" id="title" value="<?= $book['title'];?>">
						<label for="date">Release</label>
						<input type="date" name="date" id="date" value="<?= $book['release_date'];?>">
						<label for="desc">Description</label>
						<textarea name="desc" id="desc"><?= $book['description'];?></textarea>
						<label for="asin">Amazon link</label>
						<input type="text" name="asin" id="asin" value="<?= $book['asin'];?>">
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
					</div>
        </div>
        <div id="addcharacter" style="display:flex;flex-direction: column">
          <?php
          if($book['character'] ?? false){
              foreach($book['character'] as $k => $v){
                  echo '<span><label for="c'.$k.'">character name</label><input type="text" name="echaracter'.$k.'" id="c'.$k.'" value="'.$v.'"> delete > <input name="d'.$k.'" type="checkbox"> </span>';
              }
          }
          ?>
          <button type="button" id="butt">add character</button>
        </div>
			  <input type="submit" name="upload" value="submit" id="upload">
			</form>
			<a href="overview.php"><i class="fa fa-arrow-left"></i> Back to overview</a>
		</div>
  </body>
  <script>
   document.getElementById("butt").addEventListener('click', () => {
       let container = document.getElementById("addcharacter");
       let n = document.getElementsByClassName('ch').length;

       
       let span = document.createElement("span");
       span.setAttribute("class", "ch");
       
       let label = document.createElement("label");
       label.innerHTML = "New character name:";

       let text = document.createElement("input");
       text.setAttribute("type", "text");
       text.setAttribute("name", "mcharacter" + (++n));

       
       span.appendChild(label);
       span.appendChild(text);
       
       container.appendChild(span);
   }
   );
  </script>
</html>
