<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_cat_name = $_POST["cat_name"];
    $i_org_id = $_POST["org_id"];
    
     // Attempt select query execution
                    $sql = "INSERT INTO user_type  (org_id,name) "
                         . "VALUES ('".$i_org_id."','".$i_cat_name."')";
                    
                    if ($link->query($sql) === TRUE) {
                            header("Location: ../organization_participant_category.php?id=$i_org_id");
                            // Free result set
                      } else {
                        // echo mysqli_error($link);
                            header("Location: ../organization_participant_category.php?id=$i_org_id");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

