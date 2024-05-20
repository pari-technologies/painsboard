<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $i_title = $_POST["title"];
    $i_c_id = $_POST["c_id"];
    $i_category = $_POST["category"];
    $i_keyword1 = $_POST["keyword1"];
    $i_keyword2 = $_POST["keyword2"];
    $i_keyword3 = $_POST["keyword3"];
    $i_message = $_POST["message"];
    $i_solution = $_POST["solution"];
    $i_org_id = $_POST["org_id"];
    $i_user_id = $_POST["user_id"];

    if($_FILES['customFile']['name'] != "")
//    if(isset($_FILES['event_banner']))
        {
            $errors=array();
            // $allowed_ext= array('jpg','jpeg','png','gif');
            $file_name =$_FILES['customFile']['name'];
         //   $file_name =$_FILES['image']['tmp_name'];
            $file_ext = strtolower( end(explode('.',$file_name)));


            $file_size=$_FILES['customFile']['size'];
            $file_tmp= $_FILES['customFile']['tmp_name'];
            //echo $file_tmp;echo "<br>";

            $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
            $data = file_get_contents($file_tmp);
            $base64 = base64_encode($data);
            //echo "Base64 is ".$base64;


            // if(in_array($file_ext,$allowed_ext) === false)
            // {
            //     $errors[]='Extension not allowed';
            // }

            if($file_size > 2097152)
            {
                $errors[]= 'File size must be under 2mb';

            }
            if(empty($errors))
            {
               if(move_uploaded_file($file_tmp, '../attachments/'.$file_name));
               {
            //     echo 'File uploaded';
               }
              
            }
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
            $file_name = "";
        }
    
     // Attempt select query execution

        if($file_name == ""){
                  $sql = "UPDATE complaints set title = '".$i_title."', message = '".urlencode($i_message)."', category = '".$i_category."', keyword1 = '".$i_keyword1."',
                  keyword2 = '".$i_keyword2."', keyword3 = '".$i_keyword3."', solution = '".urlencode($i_solution)."' where id = '".$i_c_id."'";
                    
                    if ($link->query($sql) === TRUE) {
                              header("Location: ../org/profile.php?id=$i_user_id&org_id=$i_org_id");
                            // Free result set
                      } else {
                            // echo mysqli_error($link);
                            header("Location: ../org/profile_detail_complaint.php?id=$i_user_id&org_id=$i_org_id");

                      }
 
                    // Close connection
                    mysqli_close($link);
                  }

        else{
          $sql = "UPDATE complaints set title = '".$i_title."', message = '".urlencode($i_message)."', category = '".$i_category."', keyword1 = '".$i_keyword1."',
          keyword2 = '".$i_keyword2."', keyword3 = '".$i_keyword3."', solution = '".urlencode($i_solution)."', upload_files = '".$file_name."' where id = '".$i_c_id."'";
            
            if ($link->query($sql) === TRUE) {
                      header("Location: ../org/profile.php?id=$i_user_id&org_id=$i_org_id");
                    // Free result set
              } else {
                    // echo mysqli_error($link);
                    header("Location: ../org/profile_detail_complaint.php?id=$i_user_id&org_id=$i_org_id");

              }

            // Close connection
            mysqli_close($link);
        }
}



?>

