<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

function complaintReply($email_to) {
 
   
    //   $to = "helmi.hasman@gmail.com";
      $subject = "PainsBoard - Your complaint has been responded by the organization!";

      $message = "You have received a reply for a complaint you made at <a href='https://painsboard.com/'>Painsboard.com</a>";

    //   // Always set content-type when sending HTML email
    //   $headers = "MIME-Version: 1.0" . "\r\n";
    //   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //   // More headers
    //   $headers .= 'From: <info@painsboard.com>' . "\r\n";

    //   mail($to,$subject,$message,$headers);

    //   echo "<script>";
    //   echo "alert('Thank you for writing to us!');";
    //   echo "window.location = ' ../index.php'"; // redirect with javascript, after page loads
    //   echo "</script>";

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->From = "info@painsboard.com";
    $mail->FromName =  "Painsboard";
    // $mail->SMTPDebug = 1;
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "mail.painsboard.com";
    $mail->Port = 465; // or 587
    
    //Authentication
    $mail->Username = "info@painsboard.com";
    $mail->Password = "V;qa)PUbwo4n";

    
    // $mail->addAddress("info@painsboard.com", $i_name);
    $mail->addAddress($email_to);
    
    
    $mail->isHTML(true);
    
    $mail->Subject = $subject;
    $mail->Body = $message ;
    //$mail->AltBody = "This is the plain text version of the email content";
    
    try {
        $mail->send();
        // echo "Message has been sent successfully";

    //     echo "<script>";
    //   echo "alert('Thank you for writing to us!');";
    //   echo "window.location = ' ../index.php'"; // redirect with javascript, after page loads
    //   echo "</script>";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

?>

