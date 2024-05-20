<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $i_id = $_GET["id"];    
 
    
    //  Attempt select query execution
                    $sql = "DELETE FROM admin_blog where id = '".$i_id."'";
                    
                         
                    if ($link->query($sql) === TRUE) {
                            header("Location: ../blogs.php");
                            // Free result set
                      } else {
                        //     echo mysqli_error($link);
                            header("Location: ../blogs.php");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

