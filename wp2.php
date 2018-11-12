 <?php




 $head = '
<html>
<head>
</script>
<title>--==[[AHT-TEAM]]==--</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<STYLE>
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
BODY {
	SCROLLBAR-FACE-COLOR: Black; SCROLLBAR-HIGHLIGHT-color: #FFF; SCROLLBAR-SHADOW-color: #FFF; SCROLLBAR-3DLIGHT-color: #FFF; SCROLLBAR-ARROW-COLOR: Black; SCROLLBAR-TRACK-color: #FFF; SCROLLBAR-DARKSHADOW-color: #FFF
margin: 1px;
color: Red;
background-color: Black;
}
.main {
margin			: -287px 0px 0px -490px;
BORDER: dashed 1px #333;
BORDER-COLOR: #333333;
}
.tt {
background-color: Black;
}

A:link {
	COLOR: White; TEXT-DECORATION: none
}
A:visited {
	COLOR: White; TEXT-DECORATION: none
}
A:hover {
	color: Red; TEXT-DECORATION: none
}
A:active {
	color: Red; TEXT-DECORATION: none
}
</STYLE>
<script language=\'javascript\'>
function hide_div(id)
{
  document.getElementById(id).style.display = \'none\';
  document.cookie=id+\'=0;\';
}
function show_div(id)
{
  document.getElementById(id).style.display = \'block\';
  document.cookie=id+\'=1;\';
}
function change_divst(id)
{
  if (document.getElementById(id).style.display == \'none\')
    show_div(id);
  else
    hide_div(id);
}
</script>'; ?>
<html>
	<head>
		<?php 
		echo $head ;
		echo '

<table width="100%" cellspacing="0" cellpadding="0" class="tb1" >

			

       <td width="100%" align=center valign="top" rowspan="1">
           <font color=#ff9933 size=5 face="comic sans ms"><b><font color=white size=5 face="comic sans ms">--==[[</font> <font color=#ff9933 size=5 face="comic sans ms">Mr.Wirus (BEST FRIEND)</font><font color=white size=5 face="comic sans ms">]]==--</font><font color=white size=5 face="comic sans ms"><b><br> --==[[<font color=#ff9933 size=5 face="comic sans ms">AUTO SHELL</font><font color=white size=5 face="comic sans ms"> FINDER By </font><font color=green size=5 face="comic sans ms"><b>AHT - CREW </font><font color=white size=5 face="comic sans ms">]]==--</font> <div class="hedr"> 

        <td height="10" align="left" class="td1"></td></tr><tr><td 
        width="100%" align="center" valign="top" rowspan="1"><font 
        color="red" face="comic sans ms"size="1"><b> 
        <font color=#ff9933> 
        ####################################################</font><font color=white>#####################################################</font><font color=green>####################################################</font><br><font color=white>-==[[Greetz to]]==--</font><br> AHT - CREW<br>

<font color=white>--==[[Dedicated to]]==--</font>
<br># DR.Injection #<br><font color=white>--==[[Interface Desgined By]]==--</font><br><font color=red>Dr.Injection</font><br><font color=#ff9933> 
        ####################################################</font><font color=white>#####################################################</font><font color=green>####################################################</font>
						
           </table>
        
</table>
'; 
?>

</head><h3 style="text-align:center"><div align=center>
<table><tr><td><font color=white size=3 face="comic sans ms">Welcome Bhai ji :) .. Auto shell finder welcomes you _/\_ </font></td></tr></table></b><font color=white size=4 face="comic sans ms">Bhai ji ...please put / at the end of website urls that you are providing :P </font><br>
<table width=65%><tr><td align=center><font color=white size=3 face="comic sans ms">websites url</font></td><td align=center><font color=white size=3 face="comic sans ms">possible shell link</font></td></tr></table>
<form method="post">
<textarea rows=10 cols=50 name=link></textarea>
<textarea rows=10 cols=50 name=sh><?php echo "/wp-content/uploads/2018/05/";?></textarea><br>
<input type="submit"  name="sm" value="bhaiyu...lets start ^_^" >
</form>

<?php
set_time_limit(0);
error_reporting(0);
 function file_exists_remote($url) {
 $curl = curl_init($url);
 curl_setopt($curl, CURLOPT_NOBODY, true);
 $result = curl_exec($curl);
 $ret = false;
 if ($result !== false) {
  $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ($statusCode == 200) {
   $ret = true;
  }
 }
 curl_close($curl);
 return $ret;
}
?>
<?php
$webl=$_POST['link'];
$shelll=$_POST['sh'];
if (isset($_POST["sm"])) {

$webs=explode("\n",$webl);
$shells=explode("\n",$shelll);

foreach ($webs as $web) {
$sweb = trim($web);
$te1 = ereg_replace("(https?)://", "", $sweb);
	$te = ereg_replace("www.", "", $te1);
	$finalweb="http://".$te;
	
	echo " <font size=3 color=white face='comic sans ms' >processing ".$finalweb." ...</font>";
foreach ($shells as $shell ) {
$finalshell = trim($shell);

$sl=$finalweb.$finalshell;
$exist = file_exists_remote($sl);
if($exist) {
 echo "<div align=center><table width=70%><tr><td align=center><font size=3 color=white face='comic sans ms' ><a href=".$sl."><font size=3 color=red face='comic sans ms' > $sl </a> </font></font> </td></tr></table>";
}
}

}
}
?> 

