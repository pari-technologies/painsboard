<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_blog_id = $_POST["blog_id"];
    $i_title = $_POST["title"];
    $i_content = $_POST["content"];
    
    //  Attempt select query execution
                    $sql = "UPDATE admin_article set title = '".$i_title."', content = '".urlencode($i_content)."' where id = '".$i_blog_id."' ";
                     
                    if ($link->query($sql) === TRUE) {
                        header("Location: ../articles.php");
                            // Free result set
                      } else {
                        //     echo mysqli_error($link);
                        header("Location: ../articles.php");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

