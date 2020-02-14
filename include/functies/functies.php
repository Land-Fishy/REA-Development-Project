<?php
$dir = realpath(dirname(__FILE__));
$scan = array_diff(scandir($dir), array('..', '.', 'functies.php'));

foreach($scan as $v){
    if(substr($v, -3) == 'php'){
        include $v;
    }
}
