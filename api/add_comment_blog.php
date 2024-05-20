<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_org_id = $_POST["org_id"];
    $i_c_id = $_POST["c_id"];
    $i_message = $_POST["message"];
    
     // Attempt select query execution
                    $sql = "INSERT INTO blog_comment (user_id,blog_id,message) "
                         . "VALUES ('".$i_org_id."','".$i_c_id."','".urlencode($i_message)."')";
                    
                    if ($link->query($sql) === TRUE) {
                            header("Location: ../blogs_entry.php?id=$i_c_id");
                            // Free result set
                      } else {
                        // echo mysqli_error($link);
                        eader("Location: ../blogs_entry.php?id=$i_c_id");
                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

