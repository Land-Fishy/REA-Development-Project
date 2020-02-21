<?php


if(!isset($_SESSION["loggedin"]) and preg_match('/admin/', realpath('.'))){
    header("location: login.php");
    exit;
}
