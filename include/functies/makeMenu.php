<?php

function makeMenu($db){
    $query = 'SELECT item, slug, type FROM menu WHERE active = 0;';
    $query = 'SELECT item, slug, type FROM menu';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
