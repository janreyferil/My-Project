<?php

include_once '../dbh.php';

if(isset($_POST['paid'])) {
    $sqlUri = "SELECT * FROM tbl_uri WHERE id=1;";
    $result = mysqli_query($conn,$sqlUri);
    if($row = mysqli_fetch_assoc($result)) {
      $uri = $row['uri'];
    }
    $gettransac = mysqli_real_escape_string($conn,$_POST['transac_code']);
    $finaltotal = number_format(mysqli_real_escape_string($conn,$_POST['final_total']),2);
    $payment = number_format(mysqli_real_escape_string($conn,$_POST['payment_cus']),2);

    if($payment < $finaltotal) {
      header("Location: ../../pages/total.php$uri&payment=failed");
      exit();
    } elseif($payment > $finaltotal) {
      $balance = number_format($payment - $finaltotal,2);
    } elseif($payment == $finaltotal) {
      $balance = 0;
    }
    $sql = "INSERT INTO tbl_transac(get_transac,pro_payment,pro_balance) VALUES('$gettransac','$payment','$balance');";
    mysqli_query($conn,$sql);
    header("Location: ../../pages/total.php$uri&balance=$balance&paiding=$payment&payment=success");
    exit();
} else {
    header("Location: ../../pages/total.php");
}

 ?>
