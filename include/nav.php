<?php
$stmt = $db->prepare('SELECT * FROM menu');
$stmt->execute();
$menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<nav>
	<i class="fas fa-bars"></i>
  <ul>
    <?php
    foreach($menu as $item){
        if($item['type'] == 1){
            echo '<li><a href="'.$item['slug'].'">'.$item['item'].'</a></li>';
        }else{
            echo '<li><a href="#">'.$item['item'].'</a>';
            echo '<ul class="dropdown">';
            foreach($ids as $l){
                echo '<li><a href="book.php?book='.$l['slug'].'">'.$l['title'].'</a></li>';
            }
            echo '</ul></li>';
        }
    }
    ?>
  </ul>
</nav>
