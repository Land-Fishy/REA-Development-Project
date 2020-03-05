<?php

function makeBookFigures($db, $bookids){
    $html = '';

    foreach($bookids as $id){
        $book = bookinf($db, $id);
        $html .= '<figure>';
        $html .= '<a href="book/'.$book['slug'].'"><img src="'.makeBookImgLink($book['image']).'" alt="book cover of '.$book['title'].'">';
        $html .= '<figcaption>'.$book['title'].'</figcaption></a>';
        $html .= '</figure>';
    }

    return $html;
}

function bookinf($db, $id){
    $stmt = $db->prepare('SELECT image, title, slug FROM books WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
