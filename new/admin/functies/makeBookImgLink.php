<?php

function makeBookImgLink($img){
    if($_SERVER['HTTP_HOST'] == 'rea.loc'){
        return 'http://rea.loc/REA-Development-Project/images/books/'.$img;
    }else{
        return '../images/books/'.$img;
    }
}
