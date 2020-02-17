<?php

include '../include/db.php';
include '../include/functies/functies.php';



function overviewmaker($data){
    $html = '';
    foreach($data as $v){
        $html .= '<section class="book">';
        $html .= '<img src="http://'.makeBookImgLink($v['image']).'">';
        $html .= '<div>';
        $html .= '<p>'.$v['asin'].'</p>';
        $html .= '<p>release date: '.$v['release_date'].'</p>';
        $html .= '<p>title: '.$v['title'].'</p>';
        $html .= '<p>'.$v['description'].'</p>';       
        $html .= '<form><input type="hidden" name="id" value="'.$v['id'].'"'.'><input type="submit" value="Edit this book"></form>';
        $html .= '<div>';
        $html .= '</section>';
    }
    return $html;
}






$books = getBookInformation($db);

//print_r($books);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <style>
     .book img{
         height:400px;
         margin:10px;
     }
     .book{
         border-bottom:black solid 1px;
         background-color:gray;
             display:flex;
         }
         
    </style>
      
  </head>
  <body>
    <h1>All books</h1>
    <?php echo overviewmaker($books) ?>   
  </body>
</html>
