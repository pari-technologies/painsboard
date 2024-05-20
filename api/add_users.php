<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file

require_once "../config/config.php";
require_once "thank_you_user.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_user_name = $_POST["user_name"];
    $i_user_type = $_POST["category"];
    $i_org_id = $_POST["org_id"];
    $i_email = $_POST["email"];
    $i_password = $_POST["password"];
    $i_phone_no = $_POST["phone_no"];
    
     // Attempt select query execution
                    $sql = "INSERT INTO users (username,name,user_type,password,org_id,email,phone_no) "
                         . "VALUES ('".$i_user_name."','".$i_user_name."','".$i_user_type."','".$i_password."','".$i_org_id."','".$i_email."','".$i_phone_no."')";
                    if ($link->query($sql) === TRUE) {
                            thankYouUser($i_email);
                            echo "<script>";
                            echo "alert('Thank you for your kind interest and registration. Please check your email on instructions on how to gain the most from our PainBoard.com. Thanks.');";
                            echo "window.location = ' ../org/signin.php?id=$i_org_id'"; // redirect with javascript, after page loads
                            echo "</script>";
                            //header("Location: ../org/signin.php?id=$i_org_id");
                            // Free result set
                      } else {
                        // echo mysqli_error($link);
                            header("Location: ../org/signup.php?id=$i_org_id'");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

