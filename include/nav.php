<?php
$stmt = $db->prepare('SELECT * FROM menu');
$stmt->execute();
$menu = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<nav>
	<i class="fas fa-bars"></i>
  <ul>
    <li><a href="">home</a></li>
    <li><a href="">boeken</a>
      <?php 
      echo '<ul class="dropdown">';
      foreach($ids as $l){
          echo '<li><a href="book.php?book='.$l['slug'].'">'.$l['title'].'</a></li>';
      }
      echo '</ul></li>';
      ?>
      <li><a href="">about me</a></li>
      <li><a href="">contact</a></li>
  </ul>
</nav>
