<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $input_username = $_POST["email"];
  $input_password = $_POST["password"];

   // Attempt select query execution
                      $sql = "SELECT *,DATEDIFF(sub_end_date,CURRENT_DATE) as day_to_exp,organization.id as org_id FROM organization left join subscription on organization.id = subscription.org_id where org_email = '".$input_username."' and password = '".$input_password."' and sub_status = 1";
                     
                      if($result = mysqli_query($link, $sql)){
                          if(mysqli_num_rows($result) > 0){
                            while( $row = mysqli_fetch_assoc($result)){
                              $new_array[] = $row; // Inside while loop
                          }

                          if($new_array[0]['day_to_exp']>=0){
                            $_SESSION["org_id"] = $new_array[0]['org_id'];
                            // echo $sql;
                            //header("Location: ../organization_profile.php");
                              // Free result set

                              echo "<script>";
                              //echo "alert('Welcome!');";
                              echo "window.location = ' ../organization_profile.php?id=".$new_array[0]['org_id']."';"; // redirect with javascript, after page loads
                              echo "</script>";
                            }
                              else{
                                echo "<script>";
                                echo "alert('Your subscription has ended. Please contact Painsboard to continue using our service.');";
                                echo "window.history.back();"; // redirect with javascript, after page loads
                                echo "</script>";
                              }
                          } 
                          else{
                            echo "<script>";
                            echo "alert('Wrong email or password');";
                            echo "window.history.back();"; // redirect with javascript, after page loads
                            echo "</script>";
                          }
                      } else{
                          echo "Oops! Something went wrong. Please try again later.";
                      }
   
                      // Close connection
                      mysqli_close($link);
  }
  
  ?>

