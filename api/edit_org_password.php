<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $i_org_id = $_POST["org_id"];
    $i_current_password = $_POST["current_password"];
    $i_new_password = $_POST["new_password"];
    $i_re_password = $_POST["re_password"];
    

    $sql = "SELECT * from organization where id = '".$i_org_id."'";
    if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_array($result)){

              $password = $row['password'];
              if($i_current_password != $password){
                echo "<script>";
                echo "alert('Current password is incorrect');";
                echo "window.history.back();"; // redirect with javascript, after page loads
                echo "</script>";
              }

              else if($i_new_password != $i_re_password ){
                echo "<script>";
                echo "alert('New password and reconfirm password is not the same');";
                echo "window.history.back();"; // redirect with javascript, after page loads
                echo "</script>";
              }

              else if(($i_current_password == $password) && ($i_new_password == $i_re_password) ){
              // Attempt select query execution
              $sql2 = "UPDATE organization set password = '".$i_new_password."' where id = '".$i_org_id."'";
                            
                              if ($link->query($sql2) === TRUE) {
                                $_SESSION["org_id"] = "";
                                echo "<script>";
                                echo "alert('Password changes success. Please login again with new password');";
                                echo "window.location = ' ../signin.php'"; // redirect with javascript, after page loads
                                echo "</script>";
                           
                                      // Free result set
                                } else {
                                  // echo mysqli_error($link);
                                  echo "<script>";
                                  echo "alert('An error has occured');";
                                  echo "window.history.back();"; // redirect with javascript, after page loads
                                  echo "</script>";
                                 

                                }

                              // Close connection
                              mysqli_close($link);
              }
                 
              }                
      }                
  } 
    
    
}



?>

