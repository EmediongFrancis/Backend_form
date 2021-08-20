<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['name']) && isset($_POST['email'])){

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$content="From: $name \n Message: $message";
$recipient = "emediongfrancis@gmail.com";
$subject = "Contact Form";
$header = "From: $email \r\n";


//Load Composer's autoloader
require './vendor/autoload.php';

$mail = new PHPMailer;

    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth   = true; // SMTP authentication
    $mail->Host       = "smtp.gmail.com"; // SMTP server
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587; // SMTP Port
    $mail->Username   = "emediongfrancis@gmail.com"; // SMTP account username
    $mail->Password   = "wytzpavfcmfzefyb";        // SMTP account password


    $mail->isHTML(true);
    $mail->SetFrom($email, $name); // FROM

    $mail->AddAddress($email); // recipient email

    $mail->Subject    = ("$email ($subject)"); // email subject
    $mail->Body       = $message;

    if(!$mail->Send()) {
      echo 'Message was not sent, please try again.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent successfully.';
    }
  }

?>