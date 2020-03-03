<?php
require_once '../include/db.php';
include './functies/sessionStart.php';
include './functies/unsetRedirect.php';

$error = '';

try{
	if(isset($_POST['upload']) && !empty($_POST['genre'])){
		$stmt = $db->prepare("INSERT INTO genres (genre) VALUES (?)");
		$stmt->bindParam(1, $_POST['genre'], PDO::PARAM_STR);
		$stmt->execute();
		header("location: overview.php");
	} 
} catch(PDOException $e){
	$error = 'Er is iets mis gegaan!';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Add Genre</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>
  </head>
  <body>
		<div class="addBook">
			<h1>Add Genre</h1>
			<form method="post" enctype="multipart/form-data">				
				<label for="genre">Genre</label>
				<input  name="genre" id="text" required>
				<input type="submit" name="upload" value="submit" id="upload">
			</form>
			<?php
			echo $error;
			?>
			<a href="overview.php"><i class="fa fa-arrow-left"></i> Back to overview</a>
		</div>
	</body>
</html>























?>