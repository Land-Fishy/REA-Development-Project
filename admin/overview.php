<?php
include '../include/db.php';
include './functies/functies.php';
include './functies/sessionStart.php';
include './functies/logout.php';
include './functies/unsetRedirect.php';

function overviewmaker($data){
    $html = '';
    foreach($data as $v){
        $html .= '<section class="book">';
        if(file_exists('../images/books/'.$v['image'])) {
            $html .= '<figure><img src="'.makeBookImgLink($v['image']).'"></figure>';
        }
        $html .= '<div class="info"><div class="middle">';
        $html .= '<p>'.$v['asin'].'</p>';
        $html .= '<p><span>Release date: </span><span>'.$v['release_date'].'</span></p>';
        $html .= '<p><span>Title: </span><span>'.$v['title'].'</span></p>';
        $html .= '<p class="description"><span>Description: </span><span>'.$v['description'].'</span></p>';
        $html .= '</div>';
        $html .= '
			<div class="right">
				<form method="post" id="remove">
				<p>Delete</p>
				<div>
					<label for="confirm">Are you sure?</label>
					<input type="checkbox" name="confirm" id="confirm" required>
				</div>
					<input type="hidden" name="bookid" id="bookid" value="'.$v['id'].'">
					<input type="submit" name="submit" id="submit" value="delete">
				</form>';
		$html .= '
				<form action="editBook.php">
				<input type="hidden" name="book" value="'.$v['id'].'"'.'>
				<input type="submit" value="Edit this book">
				</form>
			</div></div>';	
		$html .= '</section>';
		
		
		
    }
    return $html;
}

$books = getBookInformation($db);

if(isset($_POST['submit']) && isset($_POST['confirm'])){
	$id = $_POST['bookid'];
	$success = '<p>Book deleted.</p>';
	$stmt = $db->prepare("DELETE FROM books WHERE id = $id");
	$stmt->execute();
	header("Refresh:0");
}

//print_r($_POST);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>      
  </head>
  <body>
	<div class="container">
		<div class="buttons">
			<?php include '../include/logoutForm.php'; ?>
			<a href="addBook.php">Add a book</a>
			<a href="editAbout.php">Edit about text</a>
		</div>
		<h1>All books</h1>
		<?php echo overviewmaker($books) ?>
	</div>
  </body>
</html>
