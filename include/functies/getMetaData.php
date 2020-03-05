<?php
function getMeta($db, $id){
	if(boek){
		$query = 'SELECT * FROM books WHERE id = $id';
	}else{
		$query = 'SELECT * FROM meta WHERE id= $id';
	}
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}
