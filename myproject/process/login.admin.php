<?php

session_start();

include_once 'dbh.php';

if (isset($_POST['loginAdmin'])) {
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($uid) || empty($pwd)) {
        header("Location: ../pages/index.php?admin=empty");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_admin WHERE ad_uid=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/index.php?admin=sql");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $uid);
            $r = mysqli_stmt_execute($stmt);
            if (!$r) {
                header("Location: ../pages/index.php?admin=execute");
                exit();
            } else {
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) < 1) {
                    header("Location: ../pages/index.php?admin=username");
                    exit();
                } else {
                    if ($row = mysqli_fetch_assoc($result)) {
                        $hashpwdCheck = password_verify($pwd, $row['ad_pwd']);
                        if ($hashpwdCheck == false) {
                            header("Location: ../pages/index.php?admin=password");
                            exit();
                        } elseif ($hashpwdCheck == true) {
                          $_SESSION['a_id'] = $row['id'];
                          $_SESSION['a_uid'] = $row['ad_uid'];
                          $_SESSION['a_pwd'] = $row['ad_pwd'];
                          header("Location: ../pages/admin.php?admin=success");
                          exit();
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../pages/index.php");
}
