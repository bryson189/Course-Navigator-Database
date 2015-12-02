<!-- This code was adapted from http://www.9lessons.info/2013/11/php-email-verification-script.html -->

<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "stephen.b.yao@gmail.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "stephen.b.yao@gmail.com";  // SMTP  username
$mail->Password   = "stephenyao69";  // SMTP password
$mail->SetFrom($from, 'Course Navigator');
$mail->AddReplyTo($from,'From Name');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
