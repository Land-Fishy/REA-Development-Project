<nav>
    <i class="fas fa-bars"></i>
  <ul>
    <li><a href="home">home</a></li>
    <li><a>books</a>
      <?php 
      echo '<ul class="dropdown">';
      foreach($ids as $l){
          echo '<li><a href="book/'.$l['slug'].'">'.$l['title'].'</a></li>';
      }
      echo '</ul></li>';
      ?>
      <li><a href="about-me">about me</a></li>
      <li><a href="contact">contact</a></li>
  </ul>
</nav>
