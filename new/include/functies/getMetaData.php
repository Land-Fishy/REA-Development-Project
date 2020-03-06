<?php
function getMeta($db, $id){
	$query = "SELECT * FROM meta WHERE id = '$id'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result;
}
