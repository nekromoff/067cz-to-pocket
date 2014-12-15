<?php
/*
   067.cz articles to pocket
   (c) 2014 Daniel Duris, dusoft@staznosti.sk
*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIE, "nette-browser=".$nettebrowser.";PHPSESSID=".$PHPSESSID);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

curl_setopt($ch, CURLOPT_URL, "https://067.cz/".urldecode($_GET["url"]));
curl_setopt($ch, CURLOPT_POST, 0);
$content=curl_exec($ch);
print_r($content);

?>