<?php
function clean($string) {$bad = array("content-type","bcc:","to:","cc:","href");return str_replace($bad, "", $string);}?>
      <head>
        <meta charset="UTF-8"><meta name="author" content="Agus Setya R"><meta name="application-name" content="Mailer"><meta name="description" content="Send mail with this tools, be anonymous and send massive mail in one time."><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
        html{background-color:#000000}.credit{color: #FFFFFF;font-family: monospace;font-size: 15px;position:absolute;;left:50%;bottom:0;transform:translate(-50%,0%);-ms-transform:translate(-50%,0%)}html {margin: 10px auto;color: #FFFFFF;}h1 {font-size: 50px;text-align: center;margin: 0px auto;font-family: monospace;font-weight: lighter;}.mailer[type=text]{background: #FFFFFF;padding: 7px;margin: 5px auto;margin-left: 30px;border: 0;border-bottom: 1px solid #000000;color: #000000;width: 250px;height: 50px;font-family: monospace;font-size: 20px;}.btn {border-style: none;color: #FFFFFF;width: 90%;height: 50px;background-color: transparent;text-decoration: none;font-family: monospace;font-size: 20px;position:absolute;left:50%;transform:translate(-50%,0%);-ms-transform:translate(-50%,0%)}.btn:hover {cursor: default;text-decoration: none;background-color: #FFFFFF;color: #000000;}table {margin-left: 30px;font-size: 20px;}textarea {color: #000000;background: whitesmoke;padding: 5px;resize: none;border: 1px solid #000000;width: 550px;height: 250px;outline: none;font-family: monospace;font-size: 18px;}
        </style>
      </head>
      <body>
        <div>
          <h1>Mailer v0.1</h1>
          <table width="95%" align="center">
            <form class="mailer" method="post" enctype="multipart/form-data">
              <tr><td><pre>Subject   : <input type="text" name="subject" required></td></tr>
              <tr><td><pre>Name      : <input type="text" name="from_name" required></td></tr>
              <tr><td><pre>Email     : <input type="text" name="from_email" required></td></tr><br>
              <!-- <tr><td><pre>CC        : <input type="text" name="cc" placeholder="email@mail.ltd" required></td></tr><br> -->
              <tr><td><pre>Mail List : <br><textarea placeholder="reciepent@domain.ltd" name="mailist" required></textarea></td>
              <td><pre>Letter  : <br><textarea placeholder="HTML Script" name="letter" required></textarea></td></tr>
              <tr><td><input type="submit" class="btn" name="send" value="SEND"></td></tr>
            </form>
          </table>
        </div>
      </body>
      <?php
      $subject = htmlspecialchars(trim(clean($_POST['subject'])));
      $name = htmlspecialchars(trim(clean($_POST['form_name'])));
      $mail = htmlspecialchars(trim(clean($_POST['from_email'])));
      // $cc = htmlspecialchars(trim($_POST['cc']));
      $mailist = explode("\r\n", htmlspecialchars(clean($_POST['mailist'])));
      $letter = $_POST['letter'];
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: '.$name.'<'.$mail.'>' . "\r\n";
      $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
      if (isset($_POST['send'])) { echo "<pre style='padding-left: 30px; font-size: 15px;'>"; foreach ($mailist as $mail) { if (!preg_match($email_exp, $mail)) { echo "Email <b>$mail</b> not valid.<br>"; } else { echo "Sending to <b>$mail</b> -> ";if (@mail($mail, $subject, $letter, $headers)) { echo "<font color=#00FF00>SUCCESS</font><br>";}else { echo "<font color=#ff0000>FAILED</font><br>"; }} } echo "</pre>";}
