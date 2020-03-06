<?php
	if(basename($_SERVER['PHP_SELF']) != 'book.php'){
		if($_SERVER['REQUEST_URI'] == '/about-me'){
			$meta = getMeta($db, 2);
		}elseif($_SERVER['REQUEST_URI'] == '/contact'){
			$meta = getMeta($db, 3);
		}else{
			$meta = getMeta($db, 1);
		}
	}
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lewis Wolfe<?php 
	if(basename($_SERVER['PHP_SELF']) != 'book.php'){
		echo ' - '.$meta['name'];
	}else{
		echo ' - '.$book['title'];
	}?>
</title>
<meta name="description" content="<?php 
	if(basename($_SERVER['PHP_SELF']) != 'book.php'){
		echo $meta['description'];
	}else{
		echo $book['description'];
	}?>">
<link rel="icon" type="image/png" sizes="32x32" href="images/fav.png">
<link rel="canonical" href="<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">
<base href="http://<?= $_SERVER['HTTP_HOST'].'/new/';?>" target="_self">
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" important>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script/botbar.js"></script>
<meta name="theme-color" content="rgb(10,9,13)">
<meta property="og:title" content="Lewis Wolfe<?php 
	if(basename($_SERVER['PHP_SELF']) != 'book.php'){
		echo ' - '.$meta['name'];
	}else{
		echo ' - '.$book['title'];
	}?>">
<meta property="og:type" content="website">
<meta property="og:description" content="<?php 
	if(basename($_SERVER['PHP_SELF']) != 'book.php'){
		echo $meta['description'];
	}else{
		echo $book['description'];
	}?>">
<meta property="og:url" content="<?php echo 'http://lewiswolfe.com'.$_SERVER['REQUEST_URI'];?>">
<meta property="og:image" content="<?php 
	if(basename($_SERVER['PHP_SELF']) != 'book.php'){
		echo 'images/lewis-wolfe.jpg';
	}else{
		echo 'images/books/'.$book['image'];
	}?>">
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us3.list-manage.com","uuid":"9aa14dc4a67399e4bdcf46cc3","lid":"0ed79b29fe","uniqueMethods":true}) })</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118897202-3"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-118897202-3');
</script>