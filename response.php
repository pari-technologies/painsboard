<?php

require_once 'config/IPay88.class.php';
require_once "config/config.php";

$ipay88 = new IPay88('M36290');

$response = $ipay88->getResponse();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>iPay88 - Response</title>
  <style>
.imgcenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

table.center {
  margin-left: auto; 
  margin-right: auto;
}
</style>
</head>

<body>
  <!-- <h1>iPay88 payment gateway</h1> -->

  <?php if ($response['status']): ?>
    <img src="img/logo_painsboard/check.png" class="imgcenter">
    <h2 style="text-align:center">Your transaction was successful.</h2>
    <?php
    $sql = "UPDATE transaction set trans_status = '1' where trans_ref_no = '".$response['data']['RefNo']."'";
   
    if ($link->query($sql) === TRUE) {
     
      
      $sql2 = "UPDATE subscription set sub_status = '1' where trans_ref_no = '".$response['data']['RefNo']."'";
      
    
        if ($link->query($sql2) === TRUE) {
         
                
          } 
            
      } else {
           

      }
    ?>
  <?php else: ?>
    <img src="img/logo_painsboard/cancel.png" class="imgcenter">
    <h2 style="text-align:center">Your transaction failed.</h2>
    <?php
     $sql = "UPDATE transaction set trans_status = '0' where trans_ref_no = '".$response['data']['RefNo']."'";
    
          
     if ($link->query($sql) === TRUE) {
       

         $sql2 = "UPDATE subscription set sub_status = '0' where trans_ref_no = '".$response['data']['RefNo']."'";
         
           if ($link->query($sql2) === TRUE) {
             
                   
             } 
             
       } else {
            

       }
    ?>
   
  <?php endif; ?>
  <a href="index.php" style="color:blue;text-align:center" class="imgcenter">Go to Home</a>

  <table class="center">
    <tr>
      <td>Remark</td>
      <td><?php echo $response['data']['Remark']?></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><?php echo $response['data']['Amount']?></td>
    </tr>
    <tr>
      <td>Reference Number  &nbsp;&nbsp;&nbsp; </td>
      <td><?php echo $response['data']['RefNo']?></td>
    </tr>
    <tr>
      <td>Transaction ID   </td>
      <td><?php echo $response['data']['TransId']?></td>
    </tr>
    <!-- <?php if ($response): ?>
      <?php foreach ($response['data'] as $key => $val): ?>
        <tr>
          <td><?php echo $key; ?></td>
          <td><?php echo $val; ?></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="2">No response or transaction failed.</td>
      </tr>
    <?php endif; ?> -->
  </table>
  
</body>

</html>