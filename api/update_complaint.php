<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";
require_once "complaints_reply.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_complaint_id = $_POST["complaint_id"];
    $i_org_id = $_POST["org_id"];
    $i_reply = $_POST["reply"];
    $i_status = $_POST["status"];
    $i_user_id = $_POST["user_id"];
    
     // Attempt select query execution
                    $sql = "UPDATE complaints set reply = '".$i_reply."', status = '".$i_status."' where id = '".$i_complaint_id."'";

                    
                    if ($link->query($sql) === TRUE) {
                      $sql2 = "SELECT * FROM users where id = '".$i_user_id."'";
                                            if($result2 = mysqli_query($link, $sql2)){
                                                if(mysqli_num_rows($result2) > 0){
                                                    while($row2 = mysqli_fetch_assoc($result2)){
                                                      complaintReply($row2['email']);
                                                        } 
                                                } 
                                                
                                            } 
                            header("Location: ../organization_profile.php?id=$i_org_id");
                            // Free result set
                      } else {
                        echo mysqli_error($link);
                            header("Location: ../organization_profile.php?id=$i_org_id");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

