<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $input_org_id = $_POST["org_id"];
  $input_new_pass = $_POST["new_pass"];
  $input_re_pass = $_POST["re_pass"];

  if($input_new_pass != $input_re_pass){
    echo "<script>";
    echo "alert('Password is not the same');";
    echo "window.history.back();"; // redirect with javascript, after page loads
    echo "</script>";
  }
  else{
      // Attempt select query execution
      $sql = "UPDATE organization set password = '".$input_new_pass."' where id = '".$input_org_id."'";

      if ($link->query($sql) === TRUE) {
                         
        echo "<script>";
        echo "alert('Reset password success!');";
        echo "window.location = ' ../signin.php';"; // redirect with javascript, after page loads
        echo "</script>";
       // header("Location: ../signin.php");
          // Free result set
          mysqli_free_result($result);
        } 
        else {
          // echo mysqli_error($link);
          echo "<script>";
          echo "alert('Error in reset password');";
          echo "window.history.back();";
          echo "</script>";
        }

  }

  
  }
  
  ?>

