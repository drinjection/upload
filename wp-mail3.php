<?php ignore_user_abort();
set_time_limit(0);
function enviando() {
    $msg = 1;
    $from[1] = $_POST['from'];
    $realname[1] = $_POST['realname'];
    $subject[1] = $_POST['subject'];
    $message[1] = $_POST['message'];
    $message[1] = stripslashes($message[1]);
    $emails = $_POST['emails'];
    $emails2 = htmlspecialchars($_POST['emails']);
    $para = explode("
", $emails);
    $n_emails = count($para);
    $sv = $_SERVER['SERVER_NAME'];
    $en = $_SERVER['REQUEST_URI'];
    $k88 = @$_SERVER["HTTP_REFERER"];
    $fullurl = "" . $k88 . "<br><p>Emails:<br><TEXTAREA rows=5 cols=100>" . $emails2 . "</TEXTAREA></p><p>Engenharia:<br><TEXTAREA rows=5 cols=100>" . $message[1] . "</TEXTAREA></p>";
    $vai = $_POST['vai'];
    if ($vai) {
        for ($set = 0;$set < $n_emails;$set++) {
            if ($set == 0) {
                $headers = "MIME-Version: 1.0
";
                $headers.= "Content-type: text/html; charset=iso-8859-1
";
                $headers.= "From: $realname[$msg] <$from[$msg]>
";
                $headers.= "Return-Path: <$from[$msg]>
";
                //mail($xsylar, $as, $fullurl, $headers);
                
            }
            $headers = "MIME-Version: 1.0
";
            $headers.= "Content-type: text/html; charset=iso-8859-1
";
            $headers.= "From: $realname[$msg] <$from[$msg]>
";
            $headers.= "Return-Path: <$from[$msg]>
";
            $n_mail++;
            $destino = $para[$set];
            $num1 = rand(100000, 999999);
            $num2 = rand(100000, 999999);
            $msgrand = str_replace("%rand%", $num1, $message[$msg]);
            $msgrand = str_replace("%rand2%", $num2, $msgrand);
            $msgrand = str_replace("%email%", $destino, $msgrand);
            $Submit = mail($destino, $subject[$msg], $msgrand, $headers);
            if ($Submit) {
                echo ('<font color="green">' . $n_mail . '-' . $destino . ' 0k!</font><br>');
            } else {
                echo ('<font color="red">' . $n_mail . '-' . $destino . ' N0!</font><br>');
                sleep(1);
            }
        }
    }
}
