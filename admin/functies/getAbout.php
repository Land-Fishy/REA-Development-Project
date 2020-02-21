<?php
function getAbout($db){
    $query = 'SELECT id, text FROM `about`';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
