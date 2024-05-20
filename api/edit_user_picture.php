<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if($_FILES['picture']['name'] != "")
//    if(isset($_FILES['event_banner']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','gif');
            $file_name =$_FILES['picture']['name'];
         //   $file_name =$_FILES['image']['tmp_name'];
            $file_ext = strtolower( end(explode('.',$file_name)));


            $file_size=$_FILES['picture']['size'];
            $file_tmp= $_FILES['picture']['tmp_name'];
            //echo $file_tmp;echo "<br>";

            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data = file_get_contents($file_tmp);
            $base64 = base64_encode($data);
            //echo "Base64 is ".$base64;


            if(in_array($file_ext,$allowed_ext) === false)
            {
                $errors[]='Extension not allowed';
            }

            if($file_size > 2097152)
            {
                $errors[]= 'File size must be under 2mb';

            }
//            if(empty($errors))
//            {
//               if( move_uploaded_file($file_tmp, 'images/'.$file_name));
//               {
//                echo 'File uploaded';
//               }
//            }
            else
            {
                foreach($errors as $error)
                {
                    echo $error , '<br/>'; 
                }
            }
           //  print_r($errors);

        }
        else{
            $base64 = "";
        }

      
 
    $i_user_id = $_POST["user_id"];
    $i_org_id = $_POST["org_id"];
    
    
     // Attempt select query execution
                $sql = "UPDATE users set picture = '".$base64."' where id = '".$i_user_id."'";
                    
                    if ($link->query($sql) === TRUE) {
                         header("Location: ../org/profile_picture.php?id=$i_org_id");
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



?>

