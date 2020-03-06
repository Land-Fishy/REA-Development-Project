<?php

function makePreviewAmazonLink($asin){
   return '<iframe type="text/html" width="336" height="550" frameborder="0" allowfullscreen style="max-width:100%" src="https://read.amazon.com/kp/card?asin='.$asin.'&preview=inline&linkCode=kpe&ref_=cm_sw_r_kb_dp_4eHyEbB2TQDRF&hideShare=true" ></iframe>';
}
