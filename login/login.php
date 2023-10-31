<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
$user = new User;

// function showAlertAndRedirect($message, $redirectUrl) {
//     echo "<script type='text/javascript'> window.location='$redirectUrl';</script>";
//     exit(); // Đảm bảo rằng mã chạy không tiếp tục sau khi chuyển hướng
// }

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $getRoleId = $user->getRoleId($username);

    if ($user->checkLogin($username, $password)) {
        $_SESSION['user'] = $username;
        foreach ($getRoleId as $value) {          
            if ($value['role_id'] == 1) {
                $_SESSION['permision'] = 1;
                header('location:../admin');
            }
            if ($value['role_id'] == 2) {
                $_SESSION['permision'] = 2;
                header('location:../index.php');
            }
        }
    } else {
        // showAlertAndRedirect("Đăng nhập không thành công", "notification4.php");
        $_SESSION['error'] = "Đăng nhập không thành công!<br>Vui lòng nhập lại";
        header("location: index.php");
        exit();
    }
}
?>
