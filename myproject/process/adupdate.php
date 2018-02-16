<?php
session_start();
include_once 'dbh.php';

if(isset($_POST['update'])) {
    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
    $confpwd = mysqli_real_escape_string($conn,$_POST['confpwd']);
    $newpwd = mysqli_real_escape_string($conn,$_POST['newpwd']);
    if(isset($_SESSION['a_id'])) {
      $Adid = mysqli_real_escape_string($conn,$_SESSION['a_id']);
      $sql = "SELECT * FROM tbl_admin;";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $adpwd = $row['ad_pwd'];
        }
      }
    }

    if(empty($uid) || empty($confpwd) || empty($newpwd)) {
        header("Location: ../pages/index.php?update=empty");
        exit();
      }
      else{
        $sqlUp = "UPDATE tbl_admin SET ad_uid=?,ad_pwd=? WHERE id=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sqlUp)) {
          header("Location: ../pages/index.php?update=sql");
          exit();
        } else {
         $adpwdCheck = password_verify($confpwd,$adpwd);
         if($adpwdCheck == false) {
           header("Location: ../pages/index.php?update=password");
           exit();
         } elseif($adpwdCheck == true) {
           $newhashpwd = password_hash($newpwd,PASSWORD_DEFAULT);
           mysqli_stmt_bind_param($stmt,'ssi',$uid,$newhashpwd,$Adid);
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
