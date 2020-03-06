<?php

function getLatest($db){
    $query = 'SELECT * FROM `books` ORDER BY release_date DESC LIMIT 1';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
