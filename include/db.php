<?php

try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=lewiswolfe;charset=utf8;', 'root','');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage().'<br>';
    file_put_contents('connectionErrors.txt', $e->getMessage()."\n", FILE_APPEND);
}
