<?php

$ip = '62.173.154.3';
$username = file_get_contents('login.txt'); $username = trim($username);
//echo $username ."\n";
$password = file_get_contents('password.txt'); $password = trim($password);
//echo $password . "\n";
$manager = 'billmgr';
$format = 'json';

// $url = //"http://{$ip}/{$manager}?out={$format}&func=auth&username={$username}&password={$password}";
//        "https://{$ip}:1500/{$manager}?out={$format}&func=auth&username={$username}&password={$password}";
// echo $url . "\n";

//-----------------------------------------------------------Вариант с php curl-------------------------------------------------------//



//авторизация

// $ch = curl_init($url);

// curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

// $output = curl_exec($ch);
// if($output === FALSE) {    
//     curl_error($ch) . "\n";
// } else {
//     $output = json_decode($output, true);
//     $session_id = $output['doc']['auth']['$id'];
//     echo "session id = " . $session_id . "\n";
// }

// curl_close($ch);
//авторизация

//запрос списка
$func = "dedic.order";
        //"dedic";
$url = "https://{$ip}:1500/{$manager}?authinfo={$username}:{$password}&out={$format}&func={$func}";
echo $url . "\n\n";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

$output = curl_exec($ch);
if($output === FALSE) {    
    curl_error($ch) . "\n";
} else {
    $output = json_decode($output, true);
    foreach($output['doc']['list'][0]['elem'] as $tarif) {
        $tarif_desc = $tarif['desc']['$'];
        $tarif_id = $tarif['pricelist']['$'];
        $tarif_price = $tarif['price']['$'];
        echo "{$tarif_desc}\t\t{$tarif_id}\t\t{$tarif_price}\n";
    }
}

curl_close($ch);
//запрос списка



//-----------------------------------------------------------Вариант с php curl-------------------------------------------------------//






//-------------------------------------------------Вариант с fopen или file_get_contents----------------------------------------------//




// $context = stream_context_create
//          (array
//           (
//               'http' => array
//               (
//                   'method' => 'GET',
//                   'header' => 'Content-Type: application/xml',
//                   //'content' => $encryptedEncodedData,
//                   'verify_peer'      => false,
//                   'verify_peer_name' => false,
//                   'verify_host'      => false
//               ), 
//           )
//          );


// $result = file_get_contents($url, FALSE, $context);


// $fh = fopen($url, "r", FALSE, $context);
// while( $data = fread( $fh, 4096 ) ){
//   $result .= $data;
// }
// fclose( $fh );

// После этого переменная $result содержит XML документ со списком WWW доменов,
// либо сообщение об ошибке

// $doc = new DOMDocument();
// if( $doc -> loadXML( $result ) ){
//     $root = $doc->documentElement;
//     foreach ( $root->childNodes as $elem ){
//         foreach ($elem->childNodes as $node){
//             if( $node->tagName == "name" ){
//                 echo $node->nodeValue;
//                 echo "\n";
//             }
//         }
//     }
// }

//-------------------------------------------------Вариант с fopen или file_get_contents----------------------------------------------//
