<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_name = $_POST["name"];
    $i_email = $_POST["email"];
    $i_phone = $_POST["phone"];
    $i_message = $_POST["message"];
    

    //   $to = "helmi.hasman@gmail.com";
      $subject = "PainsBoard - Contact Us";

      $message = '
      <html>
      <head>
      <title>PainsBoard - Contact Us</title>
      </head>
      <body>
      <div class="contact_info">
                        <div class="row contact_fill">
                            <div class="col-lg-4 form-group">
                                <h6>Full Name</h6>
                                <label>'.$i_name.'</label>
                            </div>
                            <div class="col-lg-4 form-group">
                                <h6>Email</h6>
                                <label>'.$i_email.'</label>
                            </div>
                            <div class="col-lg-4 form-group">
                                <h6>Phone no</h6>
                                <label>'.$i_phone.'</label>
                            </div>
                            <div class="col-lg-12 form-group">
                                <h6>Message</h6>
                                <label>'.$i_message.'</label>
                            </div>
                        </div>
                    
                </div>
            </div>
      </body>
      </html>
      ';

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
    $mail->FromName =  "Sender Name";
    // $mail->SMTPDebug = 1;
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "mail.painsboard.com";
    $mail->Port = 465; // or 587
    
    //Authentication
    $mail->Username = "info@painsboard.com";
    $mail->Password = "V;qa)PUbwo4n";

    
    $mail->addAddress("info@painsboard.com", $i_name);
    
    
    $mail->isHTML(true);
    
    $mail->Subject = $subject;
    $mail->Body = $message ;
    //$mail->AltBody = "This is the plain text version of the email content";
    
    try {
        $mail->send();
        //echo "Message has been sent successfully";
        echo "<script>";
      echo "alert('Thank you for writing to us!');";
      echo "window.location = ' ../index.php'"; // redirect with javascript, after page loads
      echo "</script>";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }

}

?>

