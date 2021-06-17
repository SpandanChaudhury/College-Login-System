<?php
session_start();
$code = $_REQUEST['otp'];
$otp = $_SESSION['otp'];
if($code != $otp){
    $_SESSION['otp_error'] = "Sorry, the OTP entered didnt match.";
    header("Location: send_otp.php");
}
else{
    header("Location: change_password_otp.html");
}
?>