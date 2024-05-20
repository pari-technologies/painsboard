<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_title = $_POST["title"];
    $i_content = $_POST["content"];
    $i_org_id = $_POST["org_id"];
    
     // Attempt select query execution
                    $sql = "INSERT INTO org_statement  (org_id,title,content) "
                         . "VALUES ('".$i_org_id."','".$i_title."','".urlencode($i_content)."')";
                    
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

