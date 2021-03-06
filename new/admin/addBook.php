<?php
require_once '../include/db.php';
require_once './functies/getGenre.php';
require_once './functies/getBookInformation.php';
include './functies/sessionStart.php';
include './functies/slugger.php';
include './functies/unsetRedirect.php';

$dir = '../images/books/';
$error = '';
if(isset($_POST['upload']) && !empty($_FILES['image'])){
		$bestand = $_FILES['image'];
		if(substr($bestand['type'], 0, 5) == 'image'){
        $slugged = slugger($_POST['title']);
        
				move_uploaded_file($bestand['tmp_name'], $dir.$bestand['name']);
				$stmt = $db->prepare("INSERT INTO books (image, title, release_date, description, asin, genre, slug) VALUES (?, ?, ?, ?, ?, ?, ?)");
				$stmt->bindParam(1, $bestand['name'], PDO::PARAM_STR);
				$stmt->bindParam(2, $_POST['title'], PDO::PARAM_STR);
				$stmt->bindParam(3, $_POST['date'], PDO::PARAM_STR);
				$stmt->bindParam(4, $_POST['desc'], PDO::PARAM_STR);
				$stmt->bindParam(5, $_POST['asin'], PDO::PARAM_STR);
				$stmt->bindParam(6, $_POST['genre'], PDO::PARAM_INT);
        $stmt->bindParam(7, $slugged);
				$stmt->execute();
				header("location: overview.php");
		}else{
				$error = '<p>The posted file was not an image.</p>';
		}
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
		<div class="addBook">
			<h1>Add a book</h1>
			<form method="post" enctype="multipart/form-data">
				<label for="title">Title</label>
				<input type="text" name="title" id="title">
				<label for="image">Cover</label>
				<input type="file" name="image" id="image">
				<label for="date">Release</label>
				<input type="date" name="date" id="date">
				<label for="desc">Description</label>
				<textarea name="desc" id="desc"></textarea>
				<label for="asin">ASIN code</label>
				<input type="text" name="asin" id="asin">
				<label for="genre">Genre</label>
				<select name="genre" id="genre">
					<?php
					foreach(getGenre($db) as $key=>$value){
							echo '<option value='.$value['id'].'">'.$value['genre'].'</option>';
					}
					?>
				</select>
				<input type="submit" name="upload" value="submit" id="upload">
			</form>
			<?php
			echo $error;
			?>
			<a href="overview.php"><i class="fa fa-arrow-left"></i> Back to overview</a>
		</div>
	</body>
</html>
