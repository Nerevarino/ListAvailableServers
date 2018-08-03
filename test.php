<?php

$ip = '62.173.154.3';
$username = file_get_contents('login.txt');
$password = file_get_contents('password.txt');
$manager = 'billmgr';

$url = //"https://$ip:1500/$manager?out=xml&func=auth&username=$username&password=$password";
       //"https://ru.wikipedia.org/wiki/CURL"; 
     "https://yandex.ru";
     echo $url . "\n";
$ch = curl_init($url);

$fp = fopen("$manager response.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);
?>
