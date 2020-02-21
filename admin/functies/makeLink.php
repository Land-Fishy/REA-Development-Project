<?php


// MOET IK ANDERS DOEN
// SORRY, SORRY -> ALS HIJ NIET WERKT VERTEL HET AAN -> COOLE CAT ARON
function makeLink($linkify){
    if($_SERVER['REMOTE_ADDR'] == 'localhost'){
        return 'http://localhost/'.$linkify;
    }else{
        return 'http://rea.loc/'.$linkify;
    }
}
