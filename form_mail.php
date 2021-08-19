<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'emediongfrancis@gmail.com';                     //SMTP username
$mail->Password   = 'tapadawaldma123987';                               //SMTP password
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$content = "Name: " + $name + " Message: " + $message;
$to = "emediongfrancis@gmail.com";
$subject = "Contact Form";

//Recipients
$mail->setFrom($email, $name);
$mail->addAddress($to, 'Emediong Francis');

//Content
// $mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = $content;

if(!$mail->Send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
  } else {
    echo 'Message has been sent.';
  }
