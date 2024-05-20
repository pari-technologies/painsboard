<?php

$merchantCode = "M36290";
$key = "0mtPxOuTGd";


function debug_to_console( $data ) {
  $output = $data;
  if ( is_array( $output ) )
      $output = implode( ',', $output);

  //echo "<script>console.log( 'PAYMENT_RESPONSE_BACKEND " . $output . "' );</script>";
}

$merchantcode = $_REQUEST["MerchantCode"];

$paymentid = $_REQUEST["PaymentId"];

$refno = $_REQUEST["RefNo"];

$amount = $_REQUEST["Amount"];

$ecurrency = $_REQUEST["Currency"];

$remark= $_REQUEST["Remark"];

$transid= $_REQUEST["TransId"];

$authcode= $_REQUEST["AuthCode"];

$estatus= $_REQUEST["Status"];

$errdesc=$_REQUEST["ErrDesc"];

$signature=$_REQUEST["Signature"];

$ccname=$_REQUEST["CCName"];

$ccno=$_REQUEST["CCNo"];

$s_bankname=$_REQUEST["S_bankname"];

$s_country=$_REQUEST["S_country"];


// echo 'Hello, World!';

// function iPay88_signature($source)
// {
// 	return hash('sha256', $source);
// }


if ($estatus == 1) {
// COMPARE Return Signature with Generated Response Signature
// update order to PAID
echo 'RECEIVEOK';
//debug_to_console("Update to DB: success");

// die();

}
else {
// update order to FAIL
echo "Payment fail.";
//debug_to_console("Update to DB: failed");
}

?>
