<?php
require('simple_html_dom.php');

function subs($id)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "www.youtube.com/@$id");
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    $domResult = new simple_html_dom();
    $domResult->load($result);

    return $domResult->find('yt-formatted-string[id="subscriber-count"]')->plaintext;
}
