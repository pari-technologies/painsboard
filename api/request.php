<?php

require_once '../config/IPay88.class.php';
require_once "../config/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $i_org_id = $_POST["org_id"];
    $i_email = $_POST["email"];
    $i_phone_no = $_POST["phone_no"];
    $i_org_name = $_POST["org_name"];
    $i_payment_method = $_POST["payment_method"];
    $i_amount = $_POST["amount"];
    $i_plan = $_POST["plan"];

    $remarks = $i_plan." plan payment for ".$i_org_name;
    $prod_desc = $i_plan." plan";
    $ref_no = "PB".rand();

    $ipay88 = new IPay88('M36290');

    $ipay88->setMerchantKey('0mtPxOuTGd');

    $ipay88->setField('PaymentId', (int)$i_payment_method);
    $ipay88->setField('RefNo', $ref_no);
    $ipay88->setField('Amount', $i_amount);
    $ipay88->setField('Currency', 'myr');
    $ipay88->setField('ProdDesc', $prod_desc);
    $ipay88->setField('UserName', $i_org_name);
    $ipay88->setField('UserEmail', $i_email);
    $ipay88->setField('UserContact', $i_phone_no);
    $ipay88->setField('Remark', $remarks);
    $ipay88->setField('Lang', 'utf-8');
    $ipay88->setField('ResponseURL', 'https://painsboard.com/response.php');
    $ipay88->setField('BackendURL', 'https://painsboard.com/api/response.php');
    // $ipay88->setField('ResponseURL', 'localhost/painsboard/response.php');

    $ipay88->generateSignature();

    $ipay88_fields = $ipay88->getFields();

    $sql = "INSERT INTO transaction (trans_ref_no,trans_org_id,trans_plan_name,trans_status) "
                         . "VALUES ('".$ref_no."','".$i_org_id."','".$i_plan."','-1')";
                    // echo $sql;
                    if ($link->query($sql) === TRUE) {
                         // echo " success insert 1";
                      } else {
                       // echo "x success insert 1";

                      }
  
  $end_date = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 364 day"));

  $sql2 = "INSERT INTO subscription (org_id,sub_type,sub_end_date,sub_status,trans_ref_no) "
                      . "VALUES ('".$i_org_id."','".$i_plan."','".$end_date."','-1','".$ref_no."')";
                 // echo $sql;
                 if ($link->query($sql2) === TRUE) {
                      // echo " success insert 2";
                   } else {
                     //echo "x success insert 2";

                   }
 

    //echo $ipay88->requery(array('MerchantCode' => /*YOUR_MERCHANT_CODE*/, 'RefNo' => 'IPAY0000000001', 'Amount' => '1.00'));

    ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>iPay88 - Test - Request</title>
    </head>

    <body>
    <h1 style="text-align:center">Redirecting to payment gateway...</h1> 
      <!-- <h1>iPay88 payment gateway</h1> -->

      <?php if (!empty($ipay88_fields)): ?>
        <form action="<?php echo Ipay88::$epayment_url; ?>" method="post" id="payment_send" style="display:none">
          <table>
            <?php foreach ($ipay88_fields as $key => $val): ?>
              <tr>
                <td><label><?php echo $key; ?></label></td>
                <td><input type="text" name="<?php echo $key; ?>" value="<?php echo $val; ?>" /></td>
              </tr>
            <?php endforeach; ?>
            <tr>
              <td colspan="2"><input type="submit" value="Submit" name="Submit" /></td>
            </tr>
          </table>
        </form>
      <?php endif; ?>
      <script type="text/javascript">
        document.getElementById('payment_send').submit(); // SUBMIT FORM
      </script> 
    </body>

    </html>

<?php

        }
// $ipay88 = new IPay88('M36290', '0mtPxOuTGd');
// $response = $ipay88->getResponse();
?>




