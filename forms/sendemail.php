<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$name=$_POST['name']; // Get Name value from HTML Form
$email=$_POST['email'];  // Get Email Value
$message=$_POST['message'];
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = gethostbyname('smtp.gmail.com');  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "giftmywish@gmail.com";                 // SMTP username
    $mail->Password = "Mel@1386";                           // SMTP password
    $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
    'ssl' => array(
       'verify_peer' => false,
       'verify_peer_name' => false,
       'allow_self_signed' => true
       )
    );
    //Recipients
    $mail->setFrom('giftmywish@gmail.com');
    $mail->addAddress('giftmywish@gmail.com');     // Add a recipient


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Enquiry from Website submitted';
    $mail->Body    = "<html>
    <body>
        <table style='width:600px;'>
            <tbody>
                <tr>
                    <td style='width:150px'><strong>Name: </strong></td>
                    <td style='width:400px'>$name</td>
                </tr>
                <tr>
                    <td style='width:150px'><strong>Email ID: </strong></td>
                    <td style='width:400px'>$email</td>
                </tr>
                <tr>
                    <td style='width:150px'><strong>Message: </strong></td>
                    <td style='width:400px'>$message</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>
