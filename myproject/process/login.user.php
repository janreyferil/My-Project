<?php

session_start();

include_once 'dbh.php';

if (isset($_POST['loginUser'])) {
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($uid) || empty($pwd)) {
        header("Location: ../pages/index.php?user=empty");
        exit();
    } else {
        $sql = "SELECT * FROM tbl_users WHERE uid=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/index.php?user=sql");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, 's', $uid);
            $r = mysqli_stmt_execute($stmt);
            if (!$r) {
                header("Location: ../pages/index.php?user=execute");
                exit();
            } else {
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) < 1) {
                    header("Location: ../pages/index.php?user=username");
                    exit();
                } else {
                    if ($row = mysqli_fetch_assoc($result)) {
                        $hashpwdCheck = password_verify($pwd, $row['pwd']);
                        if ($hashpwdCheck == false) {
                            header("Location: ../pages/index.php?user=password");
                            exit();
                        } elseif ($hashpwdCheck == true) {
                          $_SESSION['u_id'] = $row['id'];
                          $_SESSION['u_uid'] = $row['uid'];
                          $_SESSION['u_pwd'] = $row['pwd'];
                          header("Location: ../pages/user.php?user=success");
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
