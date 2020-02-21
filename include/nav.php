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
            echo '<li><a href="#">'.$item['item'].'</a></li>';
        }else{
            echo '<li><a href="#">'.$item['item'].'</a>';
            echo '<ul class="dropdown">';
            foreach($ids as $l){
                echo '<li><a>'.$l['title'].'</a></li>';
            }
            echo '</ul></li>';
        }
    }
    ?>
  </ul>
  <!--
       <ul>
		   <li><a href="#" class="active">home</a></li>
		   <li><a href="#">books</a>
			 <ul class="dropdown">
       <?php
       foreach($ids as $l){
       echo '<li><a>'.$l['title'].'</a></li>';
       }
       ?>
			 </ul>
		   </li>
		   <li><a href="#">about me</a></li>
		   <li><a href="#">contact</a></li>
	     </ul>
  -->
</nav>
