<?php
function getMeta($db, $id){
	if(basename($_SERVER['PHP_SELF']) == 'book.php'){
		$query = 'SELECT * FROM books WHERE id = "$id"';
		$result = 'het is book';
	}else{
		$query = 'SELECT * FROM meta WHERE id= "$id"';
		$result = 'het is niet book';
	}
    $stmt = $db->prepare($query);
    $stmt->execute();
    //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}
