<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$email=$_POST['email'];  // Get Email Value
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
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
    $mail->setFrom('fahad@giftmywishes.com');
    $mail->addAddress('fahad@giftmywishes.com');     // Add a recipient


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Newsletter subscription from NeoSolutions submitted';
    $mail->Body    = "<html>
    <body>
        <table style='width:600px;'>
            <tbody>
                <tr>
                    <td style='width:150px'><strong>Email ID: </strong></td>
                    <td style='width:400px'>$email</td>
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
