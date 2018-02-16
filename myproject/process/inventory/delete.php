<?php

include_once '../dbh.php';

if(isset($_POST['delete'])) {
  $code = mysqli_real_escape_string($conn, $_POST['code']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);

  $sql = "DELETE FROM tbl_inventory WHERE pro_code='$code' OR pro_name='$name' OR pro_price='$price';";
  mysqli_query($conn,$sql);
  
  header("Location: ../../pages/inventory.php?delete=success");
  exit();
} else {
  header("Location: ../../pages/inventory.php");
}
