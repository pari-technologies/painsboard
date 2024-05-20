<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_user_id = $_POST["user_id"];
    $i_org_id = $_POST["org_id"];
    $i_user_name = $_POST["user_name"];
    $i_email = $_POST["email"];
    $i_phone_no = $_POST["phone_no"];
    
     // Attempt select query execution
     $sql = "UPDATE users set username =  '".$i_user_name."', name = '".$i_user_name."', email = '".$i_email."', phone_no = '".$i_phone_no."' where id = '".$i_user_id."'";
                    
                    if ($link->query($sql) === TRUE) {
                            header("Location: ../org/profile_detail.php?id=$i_org_id");
                            // Free result set
                      } else {
                        // echo mysqli_error($link);
                         header("Location: ../org/profile_detail.php?id=$i_org_id");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

