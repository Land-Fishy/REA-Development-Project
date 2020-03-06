<?php
	include '../include/db.php';
	include './functies/functies.php';
	include './functies/sessionStart.php';
	include './functies/unsetRedirect.php';
	
	$about = getAbout($db);
	try{
    if(isset($_POST['submit'])){
        $stmt = $db->prepare("UPDATE about SET text=? WHERE id = 1");
        $stmt->bindParam(1, $_POST['text'], PDO::PARAM_STR); 
        $stmt->execute();
		header("Refresh:0");
		$success = '<p>About text edited.</p>';
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>
	<body>
		<div class="about">
			<h1>Edit About me text</h1>
			<form method="post">
				<textarea name="text" id="text"><?= $about['text'];?></textarea>
				<input type="submit" name="submit" id="submit" value="submit">
			</form>
			<a href="overview.php"><i class="fa fa-arrow-left"></i> Back to overview</a>
		</div>
	</body>
</html>