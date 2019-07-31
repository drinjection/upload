<?php

session_start();

/*
 Coded By Wahib jaaba <3 
Greetz to all noobs how read the source code HAHAHAHAH and who Thing
Priv8 Mailer
 */
function genRanStr($length = 8)
{
    $charset = "AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn123456789";
    $charactersLength = strlen($charset);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $charset[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function normalize($input)
{
    $message = urlencode($input);
    $message = ereg_replace("%5C%22", "%22", $message);
    return urldecode($message);
}

if (isset($_POST['from'])) {
    $from = $_POST["from"];
    $fromName = $_POST["fromName"];
    $subject = $_POST["subject"];
    $email = $_POST["email"];
    if (!isset($_SESSION['letter'])) {
        $_SESSION['letter'] = $_POST["letter"];
    }
    $letter = $_POST["letter"];
    $headers = "From: $fromName <$from>\r\nReply-To: $fromName\r\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "X-Mailer: Microsoft Office Outlook, Build 17.551210\n";

    $count = 1;
    $email = normalize($email);
    $mails = explode("\n", $email);
    foreach ($mails as $mail) {

        if (mail($mail, $subject, $letter, $headers))
            echo "<font color=green>* Status: $count <b>" . $mail . "</b> <font color=green>SENT....!</font><br>";
        else
            echo "<font color=red>* Status: $count <b>" . $mail . "</b> <font color=red>Not SENT</font><br>";
        $count++;
    }

}
$me="misterspy@hotmail.fr"; //Hhhhhhhhhhhhhhh Is just for fun someone think is not clean will surprise mfk <3 <3 LooooooL :p SO IF U WANT TO CONTACT ME IS HERE : 7682109382b67119748660376d0eeb4a 
function getWhitePressExtract()
{
    $listOfFeeds = array("http://www.lapresse.ca/rss/277.xml", "http://rss.nytimes.com/services/xml/rss/nyt/InternationalHome.xml", "http://feeds.bbci.co.uk/news/world/rss.xml", "http://feeds.skynews.com/sky-news/rss/home/rss.xml", "http://feeds.bbci.co.uk/news/rss.xml", "http://feeds.bbci.co.uk/news/technology/rss.xml", "http://www.tmz.com/category/movies/rss.xml", "http://www.tmz.com/category/celebrity-justice/rss.xml", "http://rss.cnn.com/rss/edition_americas.rss");
    $rssLink = $listOfFeeds[array_rand($listOfFeeds)];
    $FeedXml = simplexml_load_file($rssLink);
    $random = array_rand($FeedXml->xpath("channel/item"));
    echo "<font color=\"white\">" . strip_tags($FeedXml->channel->item[$random]->description) . "</font>";
}


?>

<html>
<head>
<title>

Coded By UTS Team Wahib Mr Spy  Souheyl</title>
</head>
<body bgcolor="#e6e6e6">
<center>
<pre><font color="#28FE14"/>
<center>======================================================</center>				  
  _    _ _______ _____   _______                   
 | |  | |__   __/ ____| |__   __|                  
 | |  | |  | | | (___      | | ___  __ _ _ __ ___  
 | |  | |  | |  \___ \     | |/ _ \/ _` | '_ ` _ \ 
 | |__| |  | |  ____) |    | |  __/ (_| | | | | | |
  \____/   |_| |_____/     |_|\___|\__,_|_| |_| |_|
                                        Wahib {Ja3baa}
			         Mr Spy
				  Souheyl
				  Greetz : No One
<center>======================================================</center>				  
</pre>
<br>
<form action="" method="post">
<header><title>UTS Mass MAil3r</title></header>
<center>
    <body>
	<script>

	</script>
	
<style>
.myButton {
	background-color:#44c767;
	-moz-border-radius:23px;
	-webkit-border-radius:23px;
	border-radius:23px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	padding:5px 23px;
	text-decoration:none;
	text-shadow:0px -2px 15px #2f6627;
}
.myButton:hover {
	background-color:#5cbf2a;
}
.myButton:active {
	position:relative;
	top:1px;
}

body{
font-family: "courier new";
background-color: #2E0854	;
font-size:80%;
color: #28FE14;
background-image: url("data:image/gif;base64,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");
}

#phpinfo{
border: 1px solid #28FE14;
position:fixed;
padding:2px;
top:1px;
right:1px;
font-size:12px;
}
#copyright{
border: 1px solid #2E0854;
position:fixed;
bottom:1px;
left:1px;
padding:2px;
}
.auto-style6 {
	text-align: center;
}
.auto-style2 {
	text-align: center;
}

#phpinfo0{
border: 1px solid #FFFFFF;
position:fixed;
padding:2px;
top:1px;
right:1px;
background-color: #2E0854;
font-size:12px;
}


</style>
    <form method="post" action="#" name="form" id="form">
        <table>
            <tr>
                <td>
                    <label for="from">From : </label>
                    <input type="text" name="from" id="from" placeholder="Originating email"
                    value="<?php echo genRanStr() . "nethost@sservices.c0m"; ?>" size="35">
                </td>
                <td>
                    <label for="fromName"> From name  :  </label>
                    <input type="text" name="fromName" id="fromName" size="19" value="NoReply">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="subject">Subjct</label>
                    <input name="subject" type="text" id="subject" placeholder="Subject" value="<?php
                 $datetime = date("d/m/Y h:i:s");
				 echo "Update Account Information ";
 echo $datetime;
 ?>
" size="35">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="letter">Letter</label>
                    <textarea name="letter" cols="36" rows="20"
                              id="letter"><?php getWhitePressExtract(); ?></textarea>
                </td>
                <td>
                    <label for="email">Mailing list</label>
                    <textarea cols="20" rows="20" name="email" id="email"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2"><br>
				<br>
                   <center> 
				   <input name="taz" class="myButton" type="submit" value="&#x02605;
 Spam Now &#x02605;
" name="submit" id="submit">
				   <style>
				   <!--  Sorry i f u Found any erreur -->
				   <!-- this code is bulshit -->
				   </style>
                </td>
            </tr>
        </table>
    </form>
</center>
</body><font color="#000000"/>
&copy;	2016 For UTS Team
</html>
