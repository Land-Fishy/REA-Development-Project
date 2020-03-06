<?php

function slugger($string){
    $string = preg_replace('/[^a-zA-Z0-9]{1,}/', '-', $string);
    $slugged = strtolower($string);
    return $slugged;
}
