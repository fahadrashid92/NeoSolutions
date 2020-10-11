<?php 
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');

header('Access-Control-Allow-Headers: X-Requested-With');
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent=" Neo Solutions \n Contact Us Form: \n From: $name \n Email: $email \n Message: $message";
$recipient = "giftmywish@gmail.com";
$subject = $_POST['subject'];
$mailheader = "From: $email \r\n";

mail($recipient, $subject, $formcontent, $mailheader) or die("Error");
echo "Your message has been sent. Thank you!";
?>