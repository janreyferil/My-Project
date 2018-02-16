<?php

include_once '../dbh.php';

if(isset($_POST['add'])) {
  $code = mysqli_real_escape_string($conn, $_POST['code']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $stock = mysqli_real_escape_string($conn, $_POST['stock']);
  $addstock = mysqli_real_escape_string($conn, $_POST['stocker']);

  if(empty($addstock)) {
    $addstock = 0;
  }
  $newstock = $stock + $addstock;
  $sql = "UPDATE tbl_inventory SET pro_stock=? WHERE pro_code=? OR pro_name=? OR pro_price=?;";
  $stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, 'issd', $newstock, $code, $name, $price);
      mysqli_stmt_execute($stmt);
  }
  #mysqli_query($conn,$sql);
  header("Location: ../../pages/inventory.php?stock=add");
  exit();
} elseif(isset($_POST['remove'])) {
  $code = mysqli_real_escape_string($conn, $_POST['code']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $stock = mysqli_real_escape_string($conn, $_POST['stock']);
  $removestock = mysqli_real_escape_string($conn, $_POST['stocker']);

  if(empty($removestock)) {
    $removestock = 0;

  }
  if($removestock > $stock) {
    $newstock = $stock;
    header("Location: ../../pages/inventory.php?stock=remove");
    exit();
  } else {
    $newstock = $stock - $removestock;
  }
  $sql = "UPDATE tbl_inventory SET pro_stock=? WHERE pro_code=? OR pro_name=? OR pro_price=?;";
  $stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($stmt, $sql)) {
      mysqli_stmt_bind_param($stmt, 'issd', $newstock, $code, $name, $price);
      mysqli_stmt_execute($stmt);
  }
  #mysqli_query($conn,$sql);
  header("Location: ../../pages/inventory.php?stock=remove");
  exit();
} else {
  header("Location: ../../pages/inventory.php");
  exit();
}

 ?>
