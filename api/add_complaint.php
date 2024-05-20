<?php
error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";
require_once "complaints_send.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
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

            if($file_size > 5097152)
            {
                $errors[]= 'File size must be under 5MB';

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
                // foreach($errors as $error)
                // {
                //     echo $error , '<br/>'; 
                // }
            }
           //  print_r($errors);

        }
        else{
            $file_name = "";
        }
 
    $i_title = $_POST["title"];
    $i_category = $_POST["category"];
    $i_keyword1 = $_POST["keyword1"];
    $i_keyword2 = $_POST["keyword2"];
    $i_keyword3 = $_POST["keyword3"];
    $i_message = $_POST["message"];
    $i_solution = $_POST["solution"];
    $i_org_id = $_POST["org_id"];
    $i_user_id = $_POST["user_id"];

//     $new_message = str_replace(array(':', '-', '/', '*'), '', $i_message);
if(empty($errors))
{
     // Attempt select query execution
                    $sql = "INSERT INTO complaints (user_id,org_id,title,message,category,status,keyword1,keyword2,keyword3,solution,upload_files) "
                         . "VALUES ('".$i_user_id."','".$i_org_id."','".$i_title."','".urlencode($i_message)."','".$i_category."','New','".$i_keyword1."','".$i_keyword2."','".$i_keyword3."','".urlencode($i_solution)."','".$file_name."')";
                    
                         
                    if ($link->query($sql) === TRUE) {
                        $sql2 = "SELECT * FROM organization where id = '".$i_org_id."'";
                                            if($result2 = mysqli_query($link, $sql2)){
                                                if(mysqli_num_rows($result2) > 0){
                                                    while($row2 = mysqli_fetch_assoc($result2)){
                                                        complaintSend($row2['org_email'],$i_title);
                                                        } 
                                                } 
                                                
                                            } 
                           
                            header("Location: ../org/profile.php?id=".$i_user_id."&org_id=".$i_org_id."");
                            // Free result set
                      } else {
                            // echo mysqli_error($link);
                            header("Location: ../org/contact.php?id=$i_org_id");

                      }
 
                    // Close connection
                    mysqli_close($link);
}
else{
    foreach($errors as $error)
                {
                    //echo $error , '<br/>'; 
                    echo "<script>";
                    echo "alert('".$error."');";
                    echo "window.history.back();"; // redirect with javascript, after page loads
                    echo "</script>";
                }
}
}



?>

