<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_video_id = $_POST["video_id"];
    $i_title = $_POST["title"];
    $i_description = $_POST["description"];
    
    //  Attempt select query execution
                    $sql = "UPDATE admin_video set title = '".$i_title."', description = '".$i_description."' where id = '".$i_video_id."' ";
                     
                    if ($link->query($sql) === TRUE) {

                      if($_FILES['preview_img']['name'] != "")
                    //    if(isset($_FILES['event_banner']))
                            {
                                $errors=array();
                                //$allowed_ext= array('jpg','jpeg','png','gif');
                                $file_name_preview_img =$_FILES['preview_img']['name'];
                            //   $file_name =$_FILES['image']['tmp_name'];
                                $file_ext = strtolower( end(explode('.',$file_name_preview_img)));


                                $file_size=$_FILES['preview_img']['size'];
                                $file_tmp= $_FILES['preview_img']['tmp_name'];
                                //echo $file_tmp;echo "<br>";

                                $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                                $data = file_get_contents($file_tmp);
                                $base64 = base64_encode($data);
                                //echo "Base64 is ".$base64;


                                // if(in_array($file_ext,$allowed_ext) === false)
                                // {
                                //     $errors[]='Extension not allowed';
                                // }

                                if($file_size > 5097152)
                                {
                                    $errors[]= 'File size must be under 5mb';

                                }
                                if(empty($errors))
                                {
                                  if( move_uploaded_file($file_tmp, '../assets/preview_img/'.$file_name_preview_img));
                                  {
                                    // echo 'img uploaded';
                                  }
                                  
                                }
                                else
                                {
                                    foreach($errors as $error)
                                    {
                                        echo $error , '<br/>'; 
                                    }
                                }
                                // print_r($errors);

                            }
                            else{
                                $file_name_preview_img = "";
                            }

                            if($_FILES['video_file']['name'] != "")
                            //    if(isset($_FILES['event_banner']))
                                    {
                                        $errors=array();
                                        //$allowed_ext= array('jpg','jpeg','png','gif');
                                        $file_name_video =$_FILES['video_file']['name'];
                                    //   $file_name =$_FILES['image']['tmp_name'];
                                        $file_ext = strtolower( end(explode('.',$file_name_video)));
                            
                            
                                        $file_size=$_FILES['video_file']['size'];
                                        $file_tmp= $_FILES['video_file']['tmp_name'];
                                        //echo $file_tmp;echo "<br>";
                            
                                        $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                                        $data = file_get_contents($file_tmp);
                                        $base64 = base64_encode($data);
                                        //echo "Base64 is ".$base64;
                            
                            
                                        // if(in_array($file_ext,$allowed_ext) === false)
                                        // {
                                        //     $errors[]='Extension not allowed';
                                        // }
                            
                                        if($file_size > 5097152)
                                        {
                                            $errors[]= 'File size must be under 5mb';
                            
                                        }
                                        if(empty($errors))
                                        {
                                          if( move_uploaded_file($file_tmp, '../assets/videos/'.$file_name_video));
                                          {
                                            // echo 'File uploaded';
                                          }
                                          
                                        }
                                        else
                                        {
                                            foreach($errors as $error)
                                            {
                                                echo $error , '<br/>'; 
                                            }
                                        }
                                        // print_r($errors);
                            
                                    }
                                    else{
                                        $file_name_video = "";
                                    }

                        if($file_name_preview_img == "" &&  $file_name_video == ""){
                          header("Location: ../videos.php");
                        }
                        else{
                          if($file_name_preview_img != "" ){
                            $sql2 = "UPDATE admin_video set preview_img = '".$file_name_preview_img."' where id = '".$i_video_id."' ";
                     
                              if ($link->query($sql2) === TRUE) {
                              }
                          }

                          if($file_name_video != "" ){
                            $sql3 = "UPDATE admin_video set video_source = '".$file_name_video."' where id = '".$i_video_id."' ";
                     
                              if ($link->query($sql3) === TRUE) {
                              }
                          }

                          header("Location: ../videos.php");
                        }
                      
                        //header("Location: ../video.php");
                            // Free result set
                      } else {
                        //     echo mysqli_error($link);
                        header("Location: ../videos.php");

                      }
 
                    
}



?>

