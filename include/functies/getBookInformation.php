<?php

function getBookInformation($db, $limit = 10){
    $limit = is_int($limit) ? $limit : 10;

    $query = 'SELECT * FROM `books` ORDER BY release_date ASC LIMIT '.$limit;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}


