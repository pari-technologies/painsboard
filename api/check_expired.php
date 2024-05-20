<?php
// error_reporting(E_ERROR | E_PARSE);
//echo "in login php";
// Include config file
require_once "../config/config.php";
require_once "expired_org.php";
    
    //3 weeks
    $sql = "SELECT DATEDIFF(sub_end_date,CURRENT_DATE) as day_to_exp,sub_end_date, org_id, sub_type, org_name, contact_person, org_email from subscription left join organization on subscription.org_id = organization.id where DATEDIFF(sub_end_date,CURRENT_DATE) = 21 and sub_status = 1";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                expiredOrg($row['org_email'],$row['contact_person'],$row['org_name'],$row['sub_type'],$row['sub_end_date'],"3 weeks");

            }
        }
      
    }


    //7 Days
    $sql2 = "SELECT DATEDIFF(sub_end_date,CURRENT_DATE) as day_to_exp,sub_end_date, org_id, sub_type, org_name, contact_person, org_email from subscription left join organization on subscription.org_id = organization.id where DATEDIFF(sub_end_date,CURRENT_DATE) = 7 and sub_status = 1";
    if($result2 = mysqli_query($link, $sql2)){
        if(mysqli_num_rows($result2) > 0){
            while($row2 = mysqli_fetch_assoc($result2)){
                expiredOrg($row2['org_email'],$row2['contact_person'],$row2['org_name'],$row2['sub_type'],$row2['sub_end_date'],"7 days");

            }
        }
      
    }


    //3 Days
    $sql3 = "SELECT DATEDIFF(sub_end_date,CURRENT_DATE) as day_to_exp,sub_end_date, org_id, sub_type, org_name, contact_person, org_email from subscription left join organization on subscription.org_id = organization.id where DATEDIFF(sub_end_date,CURRENT_DATE) = 3 and sub_status = 1";
    if($result3 = mysqli_query($link, $sql3)){
        if(mysqli_num_rows($result3) > 0){
            while($row3 = mysqli_fetch_assoc($result3)){
                expiredOrg($row3['org_email'],$row3['contact_person'],$row3['org_name'],$row3['sub_type'],$row3['sub_end_date'],"3 days");

            }
        }
      
    }
    // Close connection
    mysqli_close($link);




?>

