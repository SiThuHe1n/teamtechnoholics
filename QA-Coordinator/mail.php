<?php 
   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if(isset($_POST['Email']))
{
	$email=$_POST['Email'];




//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

try {
    //Server settings
                    //Enable verbose debug output
                                          //Send using SMTP
	$mail->SMTPDebug  = 1;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "tls";
    $mail->Host       = 'tls://smtp.gmail.com';                     //Set the SMTP server to send through
                                  //Enable SMTP authentication
    $mail->Username   = 'unitechbyteamtechnoholic@gmail.com';                     //SMTP username
    $mail->Password   = 'sithu2022';                               //SMTP password
            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('unitechbyteamtechnoholic@gmail.com');
    //Add a recipient
    $mail->addAddress($email);               //Name is optional
 
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Dont Forget to submit idea';
    $mail->Body    = '  ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
header("Location: Qac.php?category=ALL&search=");
}
 ?>