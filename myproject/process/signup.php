<?php

include_once 'dbh.php';

if (isset($_POST['submitSignup'])) {
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $credential = mysqli_real_escape_string($conn, $_POST['credential']);
    if (empty($uid) || empty($pwd)) {
        header("Location: ../pages/index.php?signup=empty");
        exit();
    } else {
        $sql = "INSERT INTO tbl_users(uid,pwd) VALUES(?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../pages/index.php?signup=sql");
            exit();
        } else {
            $sqlAdmin = "SELECT * FROM tbl_admin;";
            $stmtAdmin = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmtAdmin, $sqlAdmin)) {
                header("Location: ../pages/index.php?signup=sql");
                exit();
            } else {
                $r = mysqli_stmt_execute($stmtAdmin);
                if (!$r) {
                    header("Location: ../pages/index.php?signup=execute");
                    exit();
                } else {
                    $result = mysqli_stmt_get_result($stmtAdmin);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $admincredential = $row['ad_credential'];
                        }
                        $hashcredentialCheck = password_verify($credential, $admincredential);
                        if ($hashcredentialCheck == false) {
                            header("Location: ../pages/index.php?signup=credential_fail");
                            exit();
                        } else {
                            $pwdhash = password_hash($pwd, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, 'ss', $uid, $pwdhash);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../pages/index.php?signup=success");
                            exit();
                        }
                        header("Location: ../pages/index.php?signup=success");
                        exit();
                    } else {
                        header("Location: ../pages/index.php?signup=credential");
                        exit();
                    }
                }
            }
        }
    }
} else {
    header("Location: ../pages/index.php");
}
