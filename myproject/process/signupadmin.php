<?php

include_once 'dbh.php';

if(isset($_POST['submitAdmin'])) {
  $uid = mysqli_real_escape_string($conn,$_POST['uid']);
  $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
  $credential = mysqli_real_escape_string($conn,$_POST['credential']);
  $sql = "INSERT INTO tbl_admin(ad_uid,ad_pwd,ad_credential) VALUES(?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../pages/index.php?admin=sql");
      exit();
  } else {
    $pwdhash = password_hash($pwd,PASSWORD_DEFAULT);
    $credentialhash = password_hash($credential,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,'sss',$uid,$pwdhash,$credentialhash);
    mysqli_stmt_execute($stmt);
    header("Location: ../pages/index.php?admin=success");
    exit();
  }
} else {
header("Location: ../pages/index.php");
}
