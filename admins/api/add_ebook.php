<?php
error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../../config/config.php";
// print_r($_POST);

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


        if($_FILES['ebook_file']['name'] != "")
        //    if(isset($_FILES['event_banner']))
                {
                    $errors=array();
                    //$allowed_ext= array('jpg','jpeg','png','gif');
                    $file_name_ebook =$_FILES['ebook_file']['name'];
                 //   $file_name =$_FILES['image']['tmp_name'];
                    $file_ext = strtolower( end(explode('.',$file_name_ebook)));
        
        
                    $file_size=$_FILES['ebook_file']['size'];
                    $file_tmp= $_FILES['ebook_file']['tmp_name'];
                    //echo $file_tmp;echo "<br>";
        
                    $type = pathinfo($file_tmp, PATHINFO_EXTENSION);
                    $data = file_get_contents($file_tmp);
                    $base64 = base64_encode($data);
                    //echo "Base64 is ".$base64;
        
        
                    // if(in_array($file_ext,$allowed_ext) === false)
                    // {
                    //     $errors[]='Extension not allowed';
                    // }
        
                    // if($file_size > 5097152)
                    // {
                    //     $errors[]= 'File size must be under 5mb';
        
                    // }
                    if(empty($errors))
                    {
                       if( move_uploaded_file($file_tmp, '../assets/ebooks/'.$file_name_ebook));
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
                    $file_name_ebook = "";
                }
        
                // echo "imh preview - ".$file_name_preview_img;
                // echo "<br>";
                // echo "vide file - ".$file_name_video;

                $i_title = $_POST["title"];
                $i_description = $_POST["description"];
                
                if(empty($errors)){
//     // Attempt select query execution
                    $sql = "INSERT INTO admin_ebook (title,description,ebook_source,preview_img) "
                    . "VALUES ('".$i_title."','".$i_description."','".$file_name_ebook."','".$file_name_preview_img."')";

                        //  echo $sql;
                    
                        if ($link->query($sql) === TRUE) {
                            header("Location: ../ebooks.php");
                            // Free result set
                      } else {
                            // echo mysqli_error($link);
                            header("Location: ../ebook_add.php");

                      }
 
                    // Close connection
                    mysqli_close($link);
                }
                else{
                    foreach($errors as $error)
                    {
                        echo $error , '<br/>'; 
                    }
                }
}



?>

