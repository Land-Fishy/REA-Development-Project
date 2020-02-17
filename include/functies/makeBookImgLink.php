<?php

function makeBookImgLink($img){
    if($_SERVER['HTTP_HOST'] == 'rea.loc'){
        return 'rea.loc/REA-Development-Project/images/books/'.$img;
    }else{
        return 'localhost/rea-development-Project/images/books/'.$img;
    }
}
