<?php
function getJsonldData($db, $ids){
    foreach($ids as $id){
        $stmt = $db->prepare('SELECT name FROM characters WHERE books_id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $chars = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt = $db->prepare('SELECT title as name, description, g.genre as genre, author FROM books b JOIN genres g on b.genre = g.id WHERE b.id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        if(count($chars) > 0){
            foreach($chars as $k => $v){
                $name[] = $v['name'];
            };
            $result['character'] = $name;
        }
        
        
        $c = !empty($result);
        
        $returner[] = $result;
    }

    return $returner;
};

function makeJsonld($db, $books){
    $datas = getJsonldData($db, $books);
    $json = '<script type="application/ld+json">';
    $json .= (count($datas) > 1) ? '[' : '';
    foreach($datas as $k => $data){
        $data['@context'] = 'https://schema.org/';
        $data['@type'] = 'book';
        $data['author'] = ['@type' => 'person', 'name' => $data['author']];
        $data['genre'] = ['jan', 'kaas'];
        
        $json .= json_encode($data).PHP_EOL;
        
        if(($k + 1) != (count($datas)) and count($datas) > 0){
            $json .= ',';
        }
    }
    $json .= (count($datas) > 1) ? ']' : '';
    return $json.'</script>';
}
