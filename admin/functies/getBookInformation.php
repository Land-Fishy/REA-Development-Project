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

    $stmt = $db->prepare('SELECT id, name FROM characters WHERE books_id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $chars = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(count($chars) > 0){
        foreach($chars as $k => $v){
            $name[$v['id']] = $v['name'];
        };
        $result['character'] = $name;
    }
           
    return $result;
}

