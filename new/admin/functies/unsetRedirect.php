<?php

if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
