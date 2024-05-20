<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_title = $_POST["title"];
    $i_content = $_POST["content"];
    
    //  Attempt select query execution
                    $sql = "INSERT INTO admin_article (title,content) "
                         . "VALUES ('".$i_title."','".urlencode($i_content)."')";
                    
                         
                    if ($link->query($sql) === TRUE) {
                            header("Location: ../articles.php");
                            // Free result set
                      } else {
                        //     echo mysqli_error($link);
                            header("Location: ../article_add.php");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

