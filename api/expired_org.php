<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

function expiredOrg($email_to, $owner_name, $company_name,$plan_name, $exp_date, $exp_duration) {
 
   
    //   $to = "helmi.hasman@gmail.com";
      $subject = "Your PainsBoard Subscription is Expiring on (".$exp_date.")";

      $message = "<!doctype html>
      <html>
      <body>
          <div>
              <div >
                  <div>
                  
                      <div>
                          <div >
                              <p>Dear Mr/Mrs ".$owner_name." of Organization ".$company_name."</p>
                              <p>This is a soft reminder that your organization's subscription in PainsBoard.com as listed below is scheduled to expire soon:</p>
                              <p>Plan -- Expiry Date -- Description <br>
                                  ------------------------------------------ <br>
                                  ".$plan_name." - ".$exp_date." - Expires in ".$exp_duration."
                              </p>
                              
                              <p>
                                  Please be aware that once your subscription expires, your access to PainsBoard.com will be blocked. Please renew it now to avoid interruption in services.
                              </p>
      
                              <p>
                                  To view your dashboard and to renew your subscription, you can login here: <a href='https://painsboard.com/signin.php'>click here</a>
                              </p>
      
                              <p>
                                  If you have any questions, please reply to this email.
                              </p>
                              <p>
                                  Thank you for using our PainsBoard.com services.
                              </p>
                              <p>
                                  PainsBoard.com
                              </p>
                              
                          </div>
                      </div>
                      
                  </div>
              </div>
            
          </div>
      </body>
      
      </html>";

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

