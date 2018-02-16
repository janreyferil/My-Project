<?php

include_once '../dbh.php';

if (isset($_POST['updates'])) {
    $code = mysqli_real_escape_string($conn, $_POST['ucode']);
    $name = mysqli_real_escape_string($conn, $_POST['uname']);
    $price = mysqli_real_escape_string($conn, $_POST['uprice']);

    $sql = "UPDATE tbl_inventory SET pro_code=?,pro_name=?,pro_price=? WHERE pro_code=? OR pro_name=? OR pro_price=?;";
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssdssd', $code, $name, $price, $code, $name, $price);
        mysqli_stmt_execute($stmt);
    }
    #mysqli_query($conn,$sql);
    header("Location: ../../pages/inventory.php?update=success");
    exit();
} else {
    header("Location: ../../pages/inventory.php");
}
