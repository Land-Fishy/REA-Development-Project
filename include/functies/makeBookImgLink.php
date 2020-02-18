<?php

function makeBookImgLink($img){
    if($_SERVER['HTTP_HOST'] == 'rea.loc'){
        return 'http://rea.loc/REA-Development-Project/images/books/'.$img;
    }else{
        return 'http://localhost/rea-development-Project/images/books/'.$img;
    }
}
