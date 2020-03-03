<?php
require_once '../include/db.php';
require_once './functies/getGenre.php';
include './functies/sessionStart.php';
include './functies/slugger.php';
include './functies/unsetRedirect.php';


$genre = getGenre($db);

if(isset($_POST['upload']) && !empty($_POST['genre'])){
	
	$id = $_POST['genre'];
	$stmt = $db->prepare("UPDATE genres SET genre=? WHERE id = $id");
	$stmt->bindParam(1, $_POST['newgenre'], PDO::PARAM_STR);	
	$stmt->execute();
	header("Refresh:0");
}	



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit Genres</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>  
  </head>
  <body>
		<div class="editBook">
			<??>
			<h1>Edit Genres</h1>
			<form method="post" enctype="multipart/form-data">
				<div class="editDiv">
					<div>
						
					</div>
					<div>
						
						<label for="genre">Genre</label>
						<select name="genre" id="genre">
						<?php
						foreach($genre as $key=>$value){
							
								echo '<option value="'.$value['id'].'">'.$value['genre'].'</option>';
							
							
						}
						?>
					  </select>
					  <input name="newgenre" id="desc">
					</div>
				</div>
			  <input type="submit" name="upload" value="submit" id="upload">
			</form>
			<a href="overview.php"><i class="fa fa-arrow-left"></i> Back to overview</a>
		</div>
  </body>
</html>