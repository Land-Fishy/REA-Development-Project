<?php

function listAmazonBooks($db, $limit = 10){
    $books = getBookInformation($db, $limit);
    $html = '';
    foreach($books as $v){
        $html .= makePreviewAmazonLink($v['amazon_code']);
    }
    return $html;
}


