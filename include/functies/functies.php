<?php
$scan = array_diff(scandir('.'), array('..', '.', 'functies.php'));

foreach($scan as $v){
    if(substr($v, -3) == 'php'){
        include $v;
    }
}
