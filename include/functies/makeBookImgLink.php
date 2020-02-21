<?php

function makeBookImgLink($img){

    if('rea' == substr($_SERVER['HTTP_HOST'], 0, 3)){
        return 'http://'.$_SERVER['HTTP_HOST'].'/REA-Development-Project/images/books/'.$img;      
    }else{
        return 'http://localhost/WolfeAlpha/images/books/'.$img;
    }
}
