<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

function smtp_mail($to, $subject, $message, $from_name)
{
  $mail = new PHPMailer;

  // $mail->SMTPDebug = true;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'laundrybeautiful.my.id;103.131.50.95;pingit.jogjahost.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'adminlaundry@laundrybeatiful.my.id';                 // SMTP username
  $mail->Password = 'laundrybeatiful04';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->setFrom('adminlaundry@laundrybeatiful.my.id', $from_name);
  $mail->addAddress($to);               // Name is optional

  $mail->isHTML();
  $mail->Subject = $subject;
  $mail->Body    = $message;

  if (!$mail->send()) {
    return false;
  } else {
    return true;
  }
}
