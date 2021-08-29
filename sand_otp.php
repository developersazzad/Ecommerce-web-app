<?php
require_once('cannection.php');
require_once('function_core.php');
$type=get_safe_value($con,$_POST['type']);
if($type=='email'){
  $email=get_safe_value($con,$_POST['email']);
  $_SESSION['USER_LOGIN_OTP_EMAIL_ID']=$email;
    $otp=rand(1111,9999);
    //insert oyp in database//
    $otp_insert_sql=mysqli_query($con,"INSERT INTO `login_res_otp`(`user_email`, `otp`) VALUES ('$email','$otp')");
    $collect_user_id=mysqli_fetch_assoc(mysqli_query($con,"SELECT `id`, `user_email` FROM `login_res_otp` WHERE otp='$otp'"));
    $at_a_time_otp=$collect_user_id['id'];
    $_SESSION['USER_ID_AT_A_TIME']=$at_a_time_otp;
    $user_id=$collect_user_id['id'];
    require 'PHPMailerAutoload.php';
    require 'credential.php';
    $mail = new PHPMailer;
    // $mail->SMTPDebug = 4;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect
    $mail->setFrom(EMAIL, 'sazzad hossain');
    $mail->addAddress($email);     // Add a recipient
    $mail->addReplyTo(EMAIL);
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject ="One time password:";
    $mail->Body  = "<div style='border:2px solid red;font-size:24px;font-family:oswald;color:green;'>This is your one time password (OTP) $otp <br> Thanks for visiting Our site.<br><b>SAZZAD HOSSAIN</b></div>";

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 202020;//massage sant seccuss full;
    }

};
//verify otp//
if($type=='verify'){
$otp=get_safe_value($con,$_POST['otp']);
$email=$_SESSION['USER_LOGIN_OTP_EMAIL_ID'];
$user_id=$_SESSION['USER_ID_AT_A_TIME'];
$sql_opt=mysqli_query($con,"SELECT `id`, `user_email`, `otp`, `date` FROM `login_res_otp` WHERE user_email='$email' and id='$user_id'");
$sql=mysqli_fetch_assoc($sql_opt);
$sql_otp=$sql['otp'];
if($otp==$sql_otp){
  unset($_SESSION['USER_LOGIN_OTP_EMAIL_ID']);
  echo 99999;//check otp is right//
}else{
  echo 9191919;//rong your otp;
}

}

// $sql_check=mysqli_query($con,"SELECT `id`, `name`, `email`, `password`, `mobile` FROM `user_master` WHERE email='$email'");
// $check_user_sql=mysqli_num_rows($sql_check);
// if($check_user_sql>0){
//   $collect_user_id=mysqli_fetch_assoc($sql_check);
//   $user_id=$collect_user_id['id'];
// }else{
//   echo 9999;//not find your email//
// }
?>
