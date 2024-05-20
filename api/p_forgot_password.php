<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//echo "in login php";
// Include config file
require_once "../config/config.php";

require_once "../config/config.php";
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $input_username = $_POST["email"];
  $input_org_id = $_POST["org_id"];

   // Attempt select query execution
                      $sql = "SELECT * FROM users where email = '".$input_username."' and org_id = '".$input_org_id."'";
                     
                      if($result = mysqli_query($link, $sql)){
                          if(mysqli_num_rows($result) > 0){
                            while( $row = mysqli_fetch_assoc($result)){
                              $new_array[] = $row; // Inside while loop
                          }

                              $subject = "PainsBoard - Reset Participant Password";

                              $message = '<html><body>';
                              $message .= '<h3>Hello!</h3>';
                              $message .= '<p>Please click this <a href="https://painsboard.com/org/reset_password.php?id='.$new_array[0]['id'].'&cid='.$new_array[0]['org_id'].'&token='.generateRandomString().'" style="color: blue;">link</a> to reset your password.</p>';
                              $message .= '</body></html>';

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
                              $mail->addAddress($input_username );
                              
                              
                              $mail->isHTML(true);
                              
                              $mail->Subject = $subject;
                              $mail->Body = $message ;
                              //$mail->AltBody = "This is the plain text version of the email content";
                              
                              try {
                                  $mail->send();

                                   // Free result set
                                  echo "<script>";
                                  echo "alert('Please check your email to reset password.');";
                                  echo "window.location = ' ../index.php';"; // redirect with javascript, after page loads
                                  echo "</script>";
                                 
                              } catch (Exception $e) {
                                  echo "Mailer Error: " . $mail->ErrorInfo;
                              }
                          } 
                          else{
                            echo "<script>";
                            echo "alert('Unregistered email. Please sign up with us to use our services');";
                            echo "window.history.back();"; // redirect with javascript, after page loads
                            echo "</script>";
                          }
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
   
                      // Close connection
                      mysqli_close($link);
  }

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
  
  ?>

