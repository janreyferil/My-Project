<?php
session_start();
include_once 'dbh.php';

if(isset($_POST['update'])) {
    $confcredential = mysqli_real_escape_string($conn,$_POST['confcredential']);
    $newcredential = mysqli_real_escape_string($conn,$_POST['newcredential']);
    if(isset($_SESSION['a_id'])) {
      $Adid = mysqli_real_escape_string($conn,$_SESSION['a_id']);
      $sql = "SELECT * FROM tbl_admin;";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $adcredential= $row['ad_credential'];
        }
      }
    }
    if(empty($confcredential) || empty($newcredential)) {
        header("Location: ../pages/index.php?update=empty");
        exit();
      }
      else{
        $sqlUp = "UPDATE tbl_admin SET ad_credential=? WHERE id=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sqlUp)) {
          header("Location: ../pages/index.php?update=sql");
          exit();
        } else {
         $adcredentialCheck = password_verify($confcredential,$adcredential);
         if($adcredentialCheck == false) {
           header("Location: ../pages/index.php?update=password");
           exit();
         } elseif($adcredentialCheck == true) {
           $newhashcredential = password_hash($newcredential,PASSWORD_DEFAULT);
           mysqli_stmt_bind_param($stmt,'si',$newhashcredential,$Adid);
           mysqli_stmt_execute($stmt);
           header("Location: ../pages/index.php?update=success");
           exit();
         }
     }
    }
} else {
  header("Location: ../pages/index.php");
  exit();
}
