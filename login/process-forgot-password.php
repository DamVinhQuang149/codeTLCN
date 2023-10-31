<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";


if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
    $user = new User;
    $userDetails = $user->getUserByEmail($email);

    if ($userDetails) {
        // Tạo mã đặt lại mật khẩu (bạn có thể sử dụng một hàm ngẫu nhiên hoặc mã hóa dữ liệu nếu cần)
        $resetPW = substr(md5(rand(0,999999)), 0, 8);

        // Lưu mã đặt lại mật khẩu và thời gian hết hạn vào cơ sở dữ liệu
        $expirationTime = time() + (24 * 60 * 60); // Thời gian hết hạn: 24 giờ
        $user->updateResetPW($email, $resetPW);
        // // Gửi email
        try {
            sendNewPassWord($email, $resetPW);
            $_SESSION['success'] = "Link đặt lại mật khẩu đã được gửi đến email của bạn. Vui lòng kiểm tra hộp thư đến của bạn.";
        } catch (Exception $e) {
            $_SESSION['error'] = "Gửi email không thành công. Lỗi: " . $e->getMessage();
        }
    } else {
        // Email không tồn tại
        $_SESSION['error'] = "Email không tồn tại trong hệ thống.";
    }

    header("location: forgot-password.php");
    exit();
}
?>
<?php
function sendNewPassWord($email, $resetPW)
{
    require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require "PHPMailer-master/src/Exception.php";

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->CharSet = "utf-8";
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'capplevip123@gmail.com'; // Thay đổi thành địa chỉ email của bạn
    $mail->Password = 'yxlzdzycandczycz'; // Thay đổi thành mật khẩu của bạn
    $mail->SMTPSecure = 'tls'; // Sửa từ ssl thành tls
    $mail->Port = 587; // Sửa cổng kết nối thành 587

    $mail->setFrom('capplevip123@gmail.com', 'Quản trị viên website Capple');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Thư gửi lại mật khẩu';
    $noidungthu = "<p>Bạn nhận được thư này, do bạn hoặc ai đó yêu cầu mật khẩu mới từ website Capple...</p>
                    Mật khẩu mới của bạn là: {$resetPW}
    ";
    $mail->smtpConnect( array(
        "tls" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    ));
    $mail->Body = $noidungthu;

    $mail->send();
}
?>