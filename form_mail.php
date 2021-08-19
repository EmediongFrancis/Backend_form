<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './vendor/autoload.php';

$mail = new PHPMailer();

    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->SMTPAuth   = true; // SMTP authentication
    $mail->Host       = "smtp.gmail.com"; // SMTP server
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587; // SMTP Port
    $mail->Username   = "emediongfrancis@gmail.com"; // SMTP account username
    $mail->Password   = "tapadawaldma123987";        // SMTP account password

    $mail->SetFrom('kennyekandem@gmail.com', 'Kenneth Ekandem'); // FROM

    $mail->AddAddress('emediongfrancis@gmail.com', 'emediong francis'); // recipient email

    $mail->Subject    = "First SMTP Message"; // email subject
    $mail->Body       = "Hi! \n\n This is my first e-mail sent through Google SMTP using PHPMailer.";

    if(!$mail->Send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }
