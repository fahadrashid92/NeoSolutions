<?php 
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');

header('Access-Control-Allow-Headers: X-Requested-With');
$email = $_POST['email'];
$formcontent=" Neo Solutions \n Newsletter Subscription Form: \n Email: $email";
$recipient = "giftmywish@gmail.com";
$subject = "Newsletter Subscription";
$mailheader = "From: $email \r\n";

mail($recipient, $subject, $formcontent, $mailheader) or die("Error");
echo "Your message has been sent. Thank you!";
?>