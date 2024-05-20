<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

      
    $i_org_id = $_POST["org_id"];
    $i_id = $_POST["id"];
    $i_title = $_POST["title"];
    $i_content = $_POST["content"];
    
     // Attempt select query execution
     $sql = "UPDATE org_statement set title = '".$i_title."',content = '".urlencode($i_content)."' where id = '".$i_id."'";
                   
                    if ($link->query($sql) === TRUE) {
                            header("Location: ../organization_statement.php?id=$i_org_id");
                            // Free result set
                      } else {
                        // echo mysqli_error($link);
                        header("Location: ../organization_statement.php?id=$i_org_id");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

