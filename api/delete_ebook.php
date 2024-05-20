<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
  $i_cat_id = $_GET["id"];    
  $i_org_id = $_GET["org_id"];
  
   // Attempt select query execution
                      $sql = "DELETE FROM org_ebooks where id = '".$i_cat_id."'";
                      
                      if ($link->query($sql) === TRUE) {
                         
                            header("Location: ../organization_ebooks.php?id=$i_org_id");
                              // Free result set
                              mysqli_free_result($result);
                        } else {
                            header("Location: ../organization_ebooks.php?id=$i_org_id");
                              // Free result set
                              mysqli_free_result($result);
                        }
   
                      // Close connection
                      mysqli_close($link);
  }



?>

