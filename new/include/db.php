<?php
try {$db = new PDO('mysql:host=localhost;dbname=jhdflvhq_lewiswolfe;charset=utf8;', 'jhdflvhq_lewiswolfe','**J7F0om1o6EVc');$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}catch(PDOException $e){echo $e->getMessage().'<br>';file_put_contents('connectionErrors.txt', $e->getMessage()."\n", FILE_APPEND);
}