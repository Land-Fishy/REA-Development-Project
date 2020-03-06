<?php
require_once '../include/db.php';
include './functies/sessionStart.php';
include './functies/unsetRedirect.php';


try{
    $success = '';
    if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$stmt = $db->prepare("SELECT id, name, description FROM meta WHERE id = $id");
        $stmt->execute();
		$content = $stmt->fetch(PDO::FETCH_ASSOC);
    }
	 if(isset($_POST['edit'])){
		$id = $_POST['meta'];
        $stmt = $db->prepare("UPDATE meta SET name=?, description=? WHERE id = $id");
        $stmt->bindParam(1, $_POST['name'], PDO::PARAM_STR);
        $stmt->bindParam(2, $_POST['desc'], PDO::PARAM_STR);
        $stmt->execute();
        header("Refresh:0");
        $success = '<p>Meta edited.</p>';
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
    <title>Edit meta</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>  
  </head>
  <body>
		<div class="editBook">
			<?= $success;?>
			<h1>Edit meta</h1>
			<?php
				if(!isset($_GET['edit'])){
			?>
			<h2>Select page</h2>
			<a href="?edit=1">Home</a>
			<a href="?edit=2">About me</a>
			<a href="?edit=3">Contact</a>
			<?php
				}else{
			?>
			<form method="post">
				<div class="editDiv">
					<div>
						<label for="name">Name</label>
						<input type="text" name="name" id="name" value="<?= $content['name'];?>">
						<label for="desc">Description</label>
						<textarea name="desc" id="desc"><?= $content['description'];?></textarea>
						<input type="hidden" name="meta" id="meta" value="<?= $content['id'];?>">
					</div>
				</div>
			  <input type="submit" name="edit" value="Edit" id="edit">
			</form>
			<?php
				}
			?>
			<a href="overview.php"><i class="fa fa-arrow-left"></i> Back to overview</a>
		</div>
  </body>
</html>
