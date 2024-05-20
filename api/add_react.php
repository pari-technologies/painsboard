<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";
require_once "thank_you_user.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
 
    $i_c_id = $_GET["c_id"];
    $i_id = $_GET["id"];
    $i_react = $_GET["react"];
    
                  // Attempt select query execution
                  $sql = "SELECT * from complaints_stats where complaint_id = '".$i_c_id."' and user_id = '".$i_id."' and reaction = '".$i_react."'";
                  //echo $sql_k1;
                  if($result = mysqli_query($link, $sql)){
                      if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)){
                            $sql2 = "DELETE FROM complaints_stats where id = '".$row['id']."' ";
                            if ($link->query($sql2) === TRUE) {

                              $sql3 = "SELECT count(id) as react_count, reaction from complaints_stats where complaint_id = '".$i_c_id."' GROUP BY reaction";
                              //echo $sql3;
                              if($result3 = mysqli_query($link, $sql3)){
                                if(mysqli_num_rows($result3) > 0){
                                  while($row3 = mysqli_fetch_assoc($result3)){
                                    $result_return[] = $row3;
                                    }
                                    
                                    $myJSON = json_encode($result_return);
    
                                    echo $myJSON;
                                 
                                  // $myObj->result = 1;
                                  // $myObj->data = "Thank you for taking interest to attend the event.";
    
                                 

                                }
                              }

                            }
                          }
                      }

                      else{
                        $sql2 = "INSERT INTO complaints_stats (complaint_id,user_id, reaction) values ('".$i_c_id."','".$i_id."','".$i_react."')";
                            if ($link->query($sql2) === TRUE) {

                              $sql3 = "SELECT count(id) as react_count, reaction from complaints_stats where complaint_id = '".$i_c_id."' GROUP BY reaction";
                              //echo $sql3;
                              if($result3 = mysqli_query($link, $sql3)){
                                if(mysqli_num_rows($result3) > 0){
                                  while($row3 = mysqli_fetch_assoc($result3)){

                                    $result_return[] = $row3;                                   
                                  }
                                  $myJSON = json_encode($result_return);
    
                                  echo $myJSON;
                                  // $myObj->result = 1;
                                  // $myObj->data = "Thank you for taking interest to attend the event.";
    

                                }
                              }

                            }
                      }

                      $sql_update = "UPDATE complaints set update_date = '".date('Y-m-d')."' where id = '".$i_c_id."'";
                      if ($link->query($sql_update) === TRUE) {

                      }
                  }
 
                    // Close connection
                    mysqli_close($link);
}



?>

