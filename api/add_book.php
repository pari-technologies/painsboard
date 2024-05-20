<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

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
               if( move_uploaded_file($file_tmp, '../org/assets/preview_img/'.$file_name_preview_img));
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

    $i_title = $_POST["title"];
    $i_description = $_POST["description"];
    $i_book_link = $_POST["book_link"];
    $i_org_id = $_POST["org_id"];
    
     // Attempt select query execution
                    $sql = "INSERT INTO org_books (org_id,title,description,book_link,preview_img) "
                         . "VALUES ('".$i_org_id."','".$i_title."','".$i_description."','".$i_book_link."','".$file_name_preview_img."')";
                    
                    if ($link->query($sql) === TRUE) {
                            header("Location: ../organization_books.php?id=$i_org_id");
                            // Free result set
                      } else {
                        // echo mysqli_error($link);
                            header("Location: ../organization_books.php?id=$i_org_id");
                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

