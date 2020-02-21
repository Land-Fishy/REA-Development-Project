<?php

function makeLatest($db){
    $latest = getLatest($db);
    $html ='';
    $html .= '<div class="latest">';
    $html .= '<img src="'.makeBookImgLink($latest['image']).'">';
    $html .= '</div>';
    $html .= '<div class="latest-text">';
    $html .= '<h1>Wolfe\'s latest</h1>';
    $html .= '<h2>'.$latest['title'].'</h2>';
    $html .= '<div class="latest-box">';
    $html .= '<p>'.$latest['description'].'</p>';
    $html .= '</div>';
    $html .= '<a href="'.makeAmazonLink($latest['asin']).'">get on amazon now!</a>';
    $html .= '</div>';
    return $html;
}

