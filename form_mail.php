<?php 

echo $_POST;

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$content="From: $name \n Message: $message";
$to = "emediongfrancis@gmail.com";
$subject = "Contact Form";
$header = "From: $email \r\n";
 if ($_POST['submit']) {
        if (mail ($to, $subject, $content, $header)) {
            echo '<p>Your message has been sent successfully!</p>';
        } else {
            echo '<p>Something went wrong, please go back and try again!</p>';
        }
    }
?>
