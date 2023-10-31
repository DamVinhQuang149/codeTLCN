<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
$user = new User;

// function showAlertAndRedirect($message, $redirectUrl) {
//     error_log("Showing alert: $message");
//     echo "<script type='text/javascript'> window.location='$redirectUrl';</script>";
//     exit();
// }

// Hàm kiểm tra số điện thoại có đúng định dạng không
function isValidPhone($phone) {
    // Sử dụng biểu thức chính quy để kiểm tra
    $pattern = "/^[0-9]{10}$/"; // Đây là một ví dụ, bạn có thể điều chỉnh biểu thức chính quy theo định dạng số điện thoại mong muốn
    
    return preg_match($pattern, $phone);
}

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $getAllUsername = $user->getAllUsername();

    foreach ($getAllUsername as $value) {
        if ($value['username'] == $username) {
            // showAlertAndRedirect("Tên đăng nhập đã tồn tại", "notification1.php");
            $_SESSION['error'] = "Tên đăng nhập đã tồn tại!<br> Vui lòng kiểm tra và nhập lại";
        }
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // showAlertAndRedirect("Email không hợp lệ", "notification5.php");
        $_SESSION['error'] = "Email không hợp lệ!<br> Vui lòng kiểm tra và nhập lại";
    }
    elseif ($password != $passwordAgain) {
        // showAlertAndRedirect("Mật khẩu không khớp", "notification3.php");
        $_SESSION['error'] = "Mật khẩu không khớp!<br> Vui lòng kiểm tra và nhập lại";
    }
    // Kiểm tra số điện thoại hợp lệ
    elseif (!isValidPhone($phone)) {
        // showAlertAndRedirect("Số điện thoại không hợp lệ", "notification6.php");
        $_SESSION['error'] = "Số điện thoại không hợp lệ!<br> Vui lòng kiểm tra và nhập lại";
    }

    else {
        $user->register($first_name, $last_name, $username, $password, $email, $phone, $passwordAgain);
        // showAlertAndRedirect("Đăng ký thành công", "notification2.php");
        $_SESSION['success'] = "Đăng ký thành công";
    }
    header("location: signUp.php");
    exit();
}
?>
