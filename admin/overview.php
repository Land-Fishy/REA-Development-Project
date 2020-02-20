<?php
include '../include/db.php';
include '../include/functies/functies.php';
include '../include/functies/sessionStart.php';
include '../include/functies/logout.php';
include '../include/functies/unsetRedirect.php';

function overviewmaker($data){
    $html = '';
    foreach($data as $v){
        $html .= '<section class="book">';
        if(file_exists('../images/books/'.$v['image'])) {
            $html .= '<img src="'.makeBookImgLink($v['image']).'">';
        }
        $html .= '<div>';
        $html .= '<p>'.$v['asin'].'</p>';
        $html .= '<p>release date: '.$v['release_date'].'</p>';
        $html .= '<p>title: '.$v['title'].'</p>';
        $html .= '<p>'.$v['description'].'</p>';       
        $html .= '<form action="editBook.php"><input type="hidden" name="book" value="'.$v['id'].'"'.'><input type="submit" value="Edit this book"></form>';
        $html .= '</div>';
        $html .= '<form method="post" id="remove"><legend>Delete</legend><label for="confirm">Are you sure?<input type="checkbox" name="confirm" id="confirm" required></label><input type="hidden" name="bookid" id="bookid" value="'.$v['id'].'"><input type="submit" name="submit" id="submit" value="delete"></form></section>';
		
		
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
    <style>
		.book img{
			height:400px;
			margin:10px;
		}
		.book{
			border-bottom:black solid 1px;
			background-color:gray;
			display:flex;
			position: relative;
		}
		#remove{
			position: absolute;
			right: 10px;
			display:flex;
			flex-direction: column;
		}
		legend{
			font-size: 20px;
		}
    </style>
      
  </head>
  <body>
	<?php include '../include/logoutForm.php'; ?>
	<a href="addBook.php">Add a book</a>
	<a href="editAbout.php">Edit about text</a>
    <h1>All books</h1>
    <?php echo overviewmaker($books) ?>   
  </body>
</html>
