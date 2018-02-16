<?php

// I forget to use superglobal session instead of spitting a data from fetch_assoc :(

session_start();
include_once 'dbh.php';

if(isset($_POST['update'])) {
    $uid = mysqli_real_escape_string($conn,$_POST['uid']);
    $confpwd = mysqli_real_escape_string($conn,$_POST['confpwd']);
    $newpwd = mysqli_real_escape_string($conn,$_POST['newpwd']);
    if(isset($_SESSION['u_id'])) {
      $Usid = mysqli_real_escape_string($conn,$_SESSION['u_id']);
      $sql = "SELECT * FROM tbl_users WHERE id=?;";
      #$result = mysqli_query($conn,$sql);
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: ../pages/index.php?u_update=sql");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt,'i',$Usid);
        $r = mysqli_stmt_execute($stmt);
        if(!$r) {
          header("Location: ../pages/index.php?u_update=execute");
          exit();
        } else {
          $result = mysqli_stmt_get_result($stmt);
          if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $userpwd = $row['pwd'];
            }
          }
        }
      }
    }
    if(empty($uid) || empty($confpwd) || empty($newpwd)) {
        header("Location: ../pages/index.php?u_update=empty");
        exit();
      }
      else{
        $sqlUp = "UPDATE tbl_users SET uid=?,pwd=? WHERE id=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sqlUp)) {
          header("Location: ../pages/index.php?u_update=sql");
          exit();
        } else {
         $userpwdCheck = password_verify($confpwd,$userpwd);
         if($userpwdCheck == false) {
           header("Location: ../pages/index.php?u_update=password");
           exit();
         } elseif($userpwdCheck == true) {
           $newhashpwd = password_hash($newpwd,PASSWORD_DEFAULT);
           mysqli_stmt_bind_param($stmt,'ssi',$uid,$newhashpwd,$Usid);
           mysqli_stmt_execute($stmt);
           session_start();
           session_unset();
           session_destroy();
           header("Location: ../pages/index.php?u_user=success");
           exit();
         }
     }
    }
} else {
  header("Location: ../pages/index.php");
  exit();
}
