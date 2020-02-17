<?php

function makePreviewAmazonLink($asin){
    return '<iframe type="text/html" width="336" height="550" frameborder="0" allowfullscreen style="max-width:100%" src="https://read.amazon.com/kp/card?preview=inline&asin='.$asin.'" ></iframe>';
}
