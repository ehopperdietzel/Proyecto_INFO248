<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

function sendmail($to,$nameto,$subject,$message,$altmess)
{

  $headers = "MIME-Version: 1.0"."\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8"."\r\n";
  $headers .= 'From: "Apunta al Éxito" <noreply@apuntaalexito.cl>'."\r\n";
  $headers .= 'Cc: "'.$nameto.'" '.$to."\r\n";

  return mail( $to, $subject, $message, $headers );

  /*
  $from  = "noreply@apuntaalexito.cl";
  $mail = new PHPMailer();
  $mail->CharSet = 'UTF-8';
  $mail->isSMTP();
  $mail->SMTPAuth   = true;
  $mail->Host       = "apuntaalexito.cl";
  $mail->Port       = 465;
  $mail->Username   = $from;
  $mail->Password   = "apuntaalexitovaldivia";
  $mail->SMTPSecure = "ssl";
  $mail->setFrom($from,"Apunta al Éxito");
  $mail->addCC($from,"Apunta al Éxito");
  $mail->Subject  = $subject;
  $mail->AltBody  = $altmess;
  $mail->Body = $message;
  $mail->IsHTML(true);
  $mail->addAddress($to, $nameto);
  return $mail->send();
  */
}

 ?>
