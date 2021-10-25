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

    $mail->AddAddress('emediongfrancis@gmail.com'); // recipient email

    $mail->Subject    = ("$email ($subject)"); // email subject
    $mail->Body       = $message;

    if(!$mail->Send()) {

      echo 'Message was not sent, please try again.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent successfully.';

      $autoRespond = new PHPMailer();

      $autoRespond->IsSMTP();
      $autoRespond->CharSet    = 'UTF-8';
      $autoRespond->SMTPDebug  = 0;
      $autoRespond->SMTPAuth   = true;
      $autoRespond->SMTPSecure = "tls";
      $autoRespond->Port       = 587;
      $autoRespond->Username   = "emediongfrancis@gmail.com";
      $autoRespond->Password   = "wytzpavfcmfzefyb";
      $autoRespond->Host       = "smtp.gmail.com";
   
      $autoRespond->setFrom('emediongfrancis@gmail.com', 'Emediong Francis');
      $autoRespond->addAddress($email);
      $autoRespond->Subject = "Autorepsonse: Your submission has been received."; 
      $autoRespond->Body = "Your submission has been received. You will be contacted shortly.";
   
      $autoRespond->Send(); 
    }
  }

?>