<?php
function makeMenu($db, $pagename, $class =  "navbar-nav mr-auto mt-2 mt-lg-0"){
    $menu = getMenu($db);
    $html = '<ul'.($class ? ' class="'.$class.'">' : '>');
    
    foreach($menu as $v){
        if($v['item'] == $pagename){
            $html .= '<li class="nav-item active">';
            $html .= '<a class="nav-link" href="'.(makeLink($v['slug'])).'">'.$v['item'].'<span class="sr-only">(current)</span></a>';
        }else{
            $html .= '<li class="nav-item">';
            $html .= '<a class="nav-link" href="'.(makeLink($v['slug'])).'">'.$v['item'].'</a>';
        }
        $html .= '</li>';
        //        $html .= '<li><a href="'.(makeLink($v['slug'])).'">'.$v['item'].'</a></li>';
    }
    $html .= '</ul>';
    return $html;
}

// reference
//     <li class="nav-item active">
//       <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
//     </li>
//     <li class="nav-item">
//       <a class="nav-link" href="#">Link</a>
//     </li>
//     <li class="nav-item">
//       <a class="nav-link disabled" href="#">Disabled</a>
//     </li>


