<?php
include 'SMTP.php';
include 'PHPMailer.php';

$mail = new PHPMailer();

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.mandrillapp.com";    // SMTP server example
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "hungnguyenxuan118@gmail.com";            // SMTP account username example
$mail->Password   = "hK2Sm70yVCkoVZLl3PEDUQ";            // SMTP account password example

// Content
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'Test Email';
$mail->Body    = 'Thử gửi email xem sao';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->addAddress('hungnguyenxuan118@gmail.com', '');

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
?>