<?php
	$dir = 'images/books';
	if(isset($_POST['upload']) && !empty($_FILES['image'])){
		$bestand = $_FILES['image'];
		move_uploaded_file($bestand['tmp_name'], $dir);
	}
?>