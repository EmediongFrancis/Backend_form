<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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

    echo $_POST;

      $name = $_POST['name'];
      $email = $_POST['email'];
      $message = $_POST['message'];
      $content="From: $name \n Message: $message";
      $recipient = "emediongfrancis@gmail.com";
      $subject = "Contact Form";
      $header = "From: $email \r\n";
      mail($recipient, $subject, $content, $header) or die("Message not sent, please try again later.");
      echo "Mail received. Thank You!";

    // $mail->SetFrom('$email', '$name'); // FROM

    $mail->AddAddress('emediongfrancis@gmail.com', 'Emediong Francis'); // recipient email

    $mail->Subject    = "From: $name \n"; // email subject
    $mail->Body       = "$message";

    // if(!$mail->Send()) {
      // echo 'Message was not sent, please try again.';
      // echo 'Mailer error: ' . $mail->ErrorInfo;
    // } else {
      // echo 'Message has been sent successfully.';
    // }

    ?>
