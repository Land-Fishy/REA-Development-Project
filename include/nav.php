<nav>
	<i class="fas fa-bars"></i>
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
</nav>
