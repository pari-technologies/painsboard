<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $i_id = $_GET["id"];    
 
    
    //  Attempt select query execution
                    $sql = "DELETE FROM admin_video where id = '".$i_id."'";
                    
                         
                    if ($link->query($sql) === TRUE) {
                      header("Location: ../videos.php");
                            // Free result set
                      } else {
                        //     echo mysqli_error($link);
                        header("Location: ../videos.php");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

