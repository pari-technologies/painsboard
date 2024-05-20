<?php
error_reporting(E_ERROR | E_PARSE);
session_start();
//echo "in login php";
// Include config file
require_once "../config/config.php";
require_once "thank_you_org.php";
require_once "register_org_notification.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if($_FILES['org_logo']['name'] != "")
//    if(isset($_FILES['event_banner']))
        {
            $errors=array();
            $allowed_ext= array('jpg','jpeg','png','gif');
            $file_name =$_FILES['org_logo']['name'];
         //   $file_name =$_FILES['image']['tmp_name'];
            $file_ext = strtolower( end(explode('.',$file_name)));


            $file_size=$_FILES['org_logo']['size'];
            $file_tmp= $_FILES['org_logo']['tmp_name'];
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

      
 
    $i_org_name = $_POST["org_name"];
    $i_org_reg_no = $_POST["org_reg_no"];
    $i_org_email = $_POST["org_email"];
    $i_contact_person = $_POST["contact_person"];
    $i_password = $_POST["password"];
    $i_org_social = $_POST["org_social"];
    $i_contact_person_email = $_POST["contact_person_email"];
    $i_contact_person_phone = $_POST["contact_person_phone"];

    // echo $i_contact_person_phone;
    
     // Attempt select query execution
                    $sql = "INSERT INTO organization (org_name,org_reg_number,org_email,contact_person,password,username,org_social,contact_person_email,contact_person_phone,org_logo,status) "
                         . "VALUES ('".$i_org_name."','".$i_org_reg_no."','".$i_org_email."','".$i_contact_person."','".$i_password."','".$i_org_email."','".$i_org_social."','".$i_contact_person_email."','".$i_contact_person_phone."','".$base64."','1')";
                    
                    if ($link->query($sql) === TRUE) {

                        $last_org_id = mysqli_insert_id($link);
                        $end_date = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 30 day"));

                        $sql2 = "INSERT INTO subscription (org_id,sub_type,sub_end_date,sub_status) "
                        . "VALUES ('".$last_org_id."','30-Days FREE Trial','".$end_date."','1')";
                        if ($link->query($sql2) === TRUE) {
                        }
                            thankYouOrg($i_org_email);
                            thankYouNotification($i_org_name);
                            echo "<script>";
                            echo "alert('Thank you for your kind interest and registration. Please check your email on instructions on how to gain the most from our PainBoard.com. Thanks.');";
                            echo "window.location = ' ../signin.php'"; // redirect with javascript, after page loads
                            echo "</script>";

                            // header("Location: ../signin.php");
                            // Free result set
                      } else {
                        // echo mysqli_error($link);
                            header("Location: ../signup.php");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

