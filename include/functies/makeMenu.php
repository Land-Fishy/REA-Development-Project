<?php
function makeMenu($db, $class = false){
    $menu = getMenu($db);

    $html = '<ul'.($class ? ' class="'.$class.'">' : '>');
    foreach($menu as $v){
        $html .= '<li><a href="'.(makeLink($v['slug'])).'">'.$v['item'].'</a></li>';
    }
    $html .= '<ul>';
    return $html;
}


