<?php
/*
   067.cz articles to pocket
   (c) 2014 Daniel Duris, dusoft@staznosti.sk
   uses Pocket OAuth library: https://github.com/jshawl/pocket-oauth-php
*/

require('simple_html_dom.php');
require_once('config.php');

//$cookies = tempnam('/tmp','cookie');
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
//curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);
curl_setopt($ch, CURLOPT_COOKIE, "nette-browser=".$nettebrowser.";PHPSESSID=".$PHPSESSID);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

// open 067.cz and get form token
/*
$html=file_get_html("https://067.cz");
$token=$html->getElementById("frmsignInForm-_token_")->getAttribute('value');

// log in to 067.cz
$username="";
$password="";
curl_setopt($ch, CURLOPT_URL, "https://067.cz/?do=signIn-signInForm-submit");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=".$username."&password=".$password."&send=Sign%20in&_token_=".$token);
$content=curl_exec($ch);

curl_setopt($ch, CURLOPT_URL, "https://067.cz/");
curl_setopt($ch, CURLOPT_POST, 0);
$content=curl_exec($ch);
print_r($content);
*/

$html=file_get_html("https://067.cz/archiv.html");
foreach($html->find('a[href*=archiv\/]') as $link)
   {
   $urls[]=$serverurl."?url=".urlencode($link->href);
   }

foreach ($urls as $articleurl)
   {


   $url = 'https://getpocket.com/v3/add';
   $data = array(
         'consumer_key' => $consumer_key,
         'access_token' => $access_token,
         'url' => $articleurl
   );
   $options = array(
         'http' => array(
                  'method'  => 'POST',
                  'content' => http_build_query($data)
         )
   );
   $context  = stream_context_create($options);
   $result = file_get_contents($url, false, $context);
   echo 'added ',$articleurl,'<br />'; flush(); ob_flush();
   }
?>