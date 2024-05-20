<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $i_id = $_GET["id"];    
 
  
    $sql = "UPDATE subscription set sub_status = '-1' where org_id = '".$i_id."' ";
                     
        if ($link->query($sql) === TRUE) {
            //header("Location: ../articles.php");
                // Free result set
                $end_date = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));

                $sql2 = "INSERT INTO subscription (org_id,sub_type,sub_end_date,sub_status,trans_ref_no) "
                                    . "VALUES ('".$i_id."','Free 1 Year','".$end_date."','1','')";
                               // echo $sql;
                               if ($link->query($sql2) === TRUE) {
                                    header("Location: ../organizations.php");
                                 } else {
                                   
                                    header("Location: ../organizations.php");
                                 }

            } else {
            //     echo mysqli_error($link);
            //header("Location: ../articles.php");

            }

        // Close connection
        mysqli_close($link);
}



?>

