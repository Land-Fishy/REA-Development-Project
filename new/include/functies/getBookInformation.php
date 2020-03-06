<?php

function getBookInformation($db, $limit = 10){
    $limit = is_int($limit) ? $limit : 10;

    $query = 'SELECT * FROM `books` ORDER BY release_date ASC LIMIT '.$limit;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}
function getBookInformationId($db, $id){
    $query = 'SELECT * FROM `books` WHERE id = '.$id;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $result;
}

