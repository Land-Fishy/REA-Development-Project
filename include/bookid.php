<?php
if(true){
    $stmt = $db->prepare('SELECT title, id, slug FROM books ORDER BY release_date DESC;');
    $stmt->execute();
    $ids = $stmt->fetchall(PDO::FETCH_ASSOC);

    foreach($ids as $id){
        $bookids[] = $id['id'];
    }
}

