<?php

include '../dbh.php';
require 'controller.php';

if (isset($_POST['total'])) {
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $name= mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $select = mysqli_real_escape_string($conn,$_POST['selection']);


    if (empty($quantity)) {
            header("Location: ../../pages/total.php?total=empty");
            exit();
        } else {
            $sql = "INSERT INTO tbl_total(get_code,pro_transac,pro_quantity,pro_class,pro_total,pro_total_vat,created_at) VALUES(?,?,?,?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
              header("Location: ../../pages/total.php?total=sql");
              exit();
            } else {
                $transac = strtoupper(Controller::shuffling());
                $sqlCheck = "SELECT * FROM tbl_total WHERE pro_transac='$transac';";
                $resultCheck = mysqli_query($conn,$sql);
                if(!mysqli_num_rows($resultCheck) < 1) {
                  $transac = strtoupper(Controller::shuffling());
                }
                if($stock < $quantity) {
                  header("Location: ../../pages/total.php?total=limitedstock");
                  exit();
                } else {
                $newstock = $stock - $quantity;
                $sqlStock = "UPDATE tbl_inventory SET pro_stock='$newstock' WHERE pro_code='$code';";
                mysqli_query($conn,$sqlStock);
                $sqlVat = "SELECT * FROM tbl_vat;";
                $result = mysqli_query($conn, $sqlVat);
                if ($row = mysqli_fetch_assoc($result)) {
                    $vat = $row['pro_vat'];
                    $senior = $row['pro_senior'];
                    $discount = $row['pro_discount'];
                }
                $total = $price * $quantity;
                $total_vat = $total * $vat;


                if($select=='None') {
                  $finaltotal = $total + $total_vat;
                } elseif($select=='Senior') {
                  $taxtotal = number_format(($total + $total_vat),2);
                  $seniortotal = number_format($taxtotal * $senior,2);
                  $finaltotal = number_format($taxtotal - $seniortotal,2);
                } elseif($select=='Discount') {
                  $total_dis = $price * $discount;
                  $total = number_format((($price - $total_dis) * $quantity),2);
                  $finaltotal = number_format($total + ($total * $vat),2);
                }
                $time = Controller::currtime();
                mysqli_stmt_bind_param($stmt,'ssisdds',$code,$transac,$quantity,$select,$total,$finaltotal,$time);
                mysqli_stmt_execute($stmt);
                header("Location: ../../pages/total.php?total=success&code=$code&transac=$transac&finaltotal=$finaltotal&vat=$total_vat&senior=$seniortotal&discount=$total_dis");;
                $enduri = "?total=success&code=$code&transac=$transac&finaltotal=$finaltotal&vat=$total_vat&senior=$seniortotal&discount=$total_dis";
                $sqluri = "UPDATE tbl_uri SET uri='$enduri' WHERE id=1;";
                mysqli_query($conn,$sqluri);
                exit();
                }

            }
        }

  } else {
    header("Location: ../../pages/total.php");
}


/*
