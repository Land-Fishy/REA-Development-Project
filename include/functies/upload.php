<?php
	require_once 'getGenre.php';
	$dir = 'images/books/';
	$error = '';
		if(isset($_POST['upload']) && !empty($_FILES['image'])){
			$bestand = $_FILES['image'];
			$een = 1;
			if(substr($bestand['type'], 0, 5) == 'image'){
				move_uploaded_file($bestand['tmp_name'], $dir.$bestand['name']);
				$stmt = $db->prepare("INSERT INTO books (image, title, release_date, description, amazon_code, pagecount, genre, subgenre) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
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
			}else{
				$error = '<p>The posted file was not an image.</p>';
			}
		}
?>
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
			<label for="page">Pagecount</label>
			<input type="number" name="page" id="page">
			<label for="genre">Genre</label>
			<select name="genre" id="genre">
				<?php
					foreach(getGenre($db) as $key=>$value){
						echo '<option value='.$value['id'].'">'.$value['genre'].'</option>';
					}
				?>
			</select>
			<label for="sub">Subgenre</label>
			<select name="sub" id="sub">
				<option value="">None</option>
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