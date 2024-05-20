<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_org_id = $_POST["org_id"];
    $i_c_id = $_POST["c_id"];
    $i_user_id = $_POST["user_id"];
    $i_message = $_POST["message"];
    
     // Attempt select query execution
                    $sql = "INSERT INTO complaints_comments  (user_id,complaint_id,message) "
                         . "VALUES ('".$i_user_id."','".$i_c_id."','".urlencode($i_message)."')";
                    
                    if ($link->query($sql) === TRUE) {
                        $sql_update = "UPDATE complaints set update_date = '".date('Y-m-d')."' where id = '".$i_c_id."'";
                          if ($link->query($sql_update) === TRUE) {
                            header("Location: ../org/complaints.php?id=$i_org_id&c_id=$i_c_id");
                          }
                            
                            // Free result set
                      } else {
                        echo mysqli_error($link);
                            // header("Location: ../org/complaints.php?id=$i_org_id&c_id=$i_c_id");
                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

