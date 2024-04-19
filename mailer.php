<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->SMTPAuth= true;
$mail->Host = 'smtp.gmail.com';  
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
$mail->Username = 'ratanlalverma1996@gmail.com'; 
$mail->Password = 'yfqr dvqa opdn yoct'; 
$mail->SMTPSecure = 'tls';         
$mail->Port = 587;

$mail->isHTML(true);
return $mail;