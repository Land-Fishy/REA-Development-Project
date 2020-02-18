<?php
	if(isset($_POST['logout'])){
		session_unset();
		header('location: login.php');
	}
