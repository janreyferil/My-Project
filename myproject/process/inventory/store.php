<?php

include_once '../dbh.php';

if (isset($_POST['add'])) {
  require 'controller.php';
    $code = mysqli_real_escape_string($conn,$_POST['code']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $stock = mysqli_real_escape_string($conn,$_POST['stock']);
if(Controller::validate($code,$name,$price,$stock)) {
  exit();
}
$sql ="INSERT INTO tbl_inventory(pro_code,pro_name,pro_price,pro_stock) VALUES(?,?,?,?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
  header("Location: ../../pages/inventory.php?inv=sql");
  exit();
} else {
  $sqlExist = "SELECT * FROM tbl_inventory WHERE pro_code='$code';";
  $resultExist = mysqli_query($conn,$sqlExist);
  if(mysqli_num_rows($resultExist) < 1) {
    $fcode = strtoupper($code);
    $fname = ucwords($name);
    $fprice = number_format(round($price,2), 2);
    mysqli_stmt_bind_param($stmt,'ssdi',$fcode,$fname,$fprice,$stock);
    mysqli_stmt_execute($stmt);
    header("Location: ../../pages/inventory.php?inv=success");
    exit();
  } else {
    header("Location: ../../pages/inventory.php?inv=alreadytaken");
    exit();
  }
}
} else {
    header("Location: ../../pages/inventory.php");
}
