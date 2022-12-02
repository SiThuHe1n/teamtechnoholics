<?php 
include 'connect.php';
   ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Yangon");
$datetime = date("Y-m-d H:i:s");
$userID=$_POST['userID'];
$ideaID=$_POST['ideaID'];
$checked=$_POST['checked'];
 $postemail='';
 $username='0';
  $que3="SELECT * FROM users WHERE userID='$userID'";

                    $resu3 = mysqli_query($Connect, $que3);
                    if (mysqli_num_rows($resu3) > 0) {
                        $arr3 = mysqli_fetch_array($resu3);
                        $username=$arr3['userName'];
                      }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

if (isset($_POST['Cmtdata'])){

 $postemail='';
 $que="SELECT * FROM ideas WHERE ideaID='$ideaID'";

                    $resu = mysqli_query($Connect, $que);
                    if (mysqli_num_rows($resu) > 0) {
                        $arr1 = mysqli_fetch_array($resu);
                        $postusID=$arr1['userID'];
                        $postEmail="SELECT * FROM users WHERE userID='$postusID'";
                         $resu1 = mysqli_query($Connect, $postEmail);
                    if (mysqli_num_rows($resu1) > 0) {
                        $arr2 = mysqli_fetch_array($resu1);
                        $postemail=$arr2['userEmail'];

                      }
                    }


	$Cmtdata=$_POST['Cmtdata'];
	$query="INSERT INTO comments (commentContent,commentTime,userID,ideaID,ischeck) Values ('$Cmtdata','$datetime','$userID','$ideaID','$checked')";
	if (mysqli_query($Connect, $query)) {



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
    $mail->addAddress($postemail);               //Name is optional
 
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Idea Notification';
    $mail->Body    = $username.'commented to your Idea at '. $datetime . '... Comment :  <b>'.$Cmtdata.'</b>' ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

} else {
  echo "Error: " . $query . "<br>" . mysqli_error($Connect);
}
}
 ?>