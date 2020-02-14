<?php
include './db.php';
include './functies/functies.php';

$current = $_GET['page'] ?? 'home';

echo makeMenu($db, $current,  "navbar-nav mr-auto mt-2 mt-lg-0");

