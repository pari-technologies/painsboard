<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

      
    $i_org_id = $_POST["org_id"];
    $i_org_name = $_POST["org_name"];
    $i_org_reg_no = $_POST["org_reg_no"];
    $i_org_email = $_POST["org_email"];
    $i_contact_person = $_POST["contact_person"];
    $i_org_social = $_POST["org_social"];
    $i_contact_person_email = $_POST["contact_person_email"];
    $i_contact_person_phone = $_POST["contact_person_phone"];
    
     // Attempt select query execution
     $sql = "UPDATE organization set org_name = '".$i_org_name."',org_reg_number = '".$i_org_reg_no."', org_email = '".$i_org_email."', contact_person ='".$i_contact_person."',
     username = '".$i_org_email."', org_social = '".$i_org_social."', contact_person_email = '".$i_contact_person_email."', contact_person_phone= '".$i_contact_person_phone."' where id = '".$i_org_id."'";
                   
                    if ($link->query($sql) === TRUE) {
                            header("Location: ../organization_detail.php?id=$i_org_id");
                            // Free result set
                      } else {
                        // echo mysqli_error($link);
                        header("Location: ../organization_detail.php?id=$i_org_id");

                      }
 
                    // Close connection
                    mysqli_close($link);
}



?>

