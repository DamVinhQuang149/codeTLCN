<link rel="stylesheet" type="text/css" href="styles.css">
<?php
require "../config.php";
require "../models/db.php";
require "../models/user.php";

$user = new User;
if (isset($_POST['submit'])) {
    $username = $_GET['username'];
    $passwordold = $_POST['passwordold'];
    $passwordnew = $_POST['passwordnew'];
    $passwordAgain = $_POST['passwordAgain'];
    if ($user->checkLogin($username, $passwordold)){
        if ($passwordnew == $passwordAgain) {
            $user->changePassword($passwordnew, $username);
            header('location:notificationPWT.php');
        } else {
            header('location:notificationPWF.php?username=' . $username);
        }
    }
    else 
    {
        header('location:notificationPWFO.php?username=' . $username);
    }
}
