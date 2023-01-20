<form action="" method="post">
  <button type="submit" name="submit">kirim</button>
</form>
<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

if (isset($_POST['submit'])) {
  smtp_mail('imannurzaman39@gmail.com', 'token', 'apapun', 'Admin Laundry', '');
}
function smtp_mail($to, $subject, $message, $from_name, $from)
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

  $mail->Subject = $subject;
  $mail->Body    = $message;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    echo 'Message has been sent';
  }
}
?>