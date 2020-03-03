<?php
function getBookMeta($db, $id){
    $query = 'SELECT * FROM books';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}
function getPageMeta($db, $id){
    $query = 'SELECT * FROM meta';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}