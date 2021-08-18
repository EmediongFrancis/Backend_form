<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$content="From: $name \n Message: $message";
$recipient = "emediongfrancis@gmail.com";
$subject = "Contact Form";
$header = "From: $email \r\n";
mail($recipient, $subject, $content, $header) or die("Message not sent, please try again later.");
echo "Mail received. Thank You!";

?>
