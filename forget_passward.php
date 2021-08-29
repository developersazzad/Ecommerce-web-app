<?php require_once("header.php");

?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
  <div class="ht__bradcaump__wrap">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="bradcaump__inner">
            <nav class="bradcaump-inner">
              <a class="breadcrumb-item" href="index.html">Home</a>
              <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
              <span class="breadcrumb-item active">Login</span>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="checkout__inner">
          <?php
          if(isset($_SESSION['USER_LOGIN'])){
            ?>
            <h1 class="text-center text-dark p-2 ">You are Alrady logedIn
              <p><br> thanks...</p>
            </h1>
          <?php } ?>

          <?php
          if(!isset($_SESSION['USER_LOGIN'])){
            ?>
           <div class="accordion-list">
            <div class="accordion">
              <div class="accordion__body">
                <div class="accordion__body__form">
                  <div class="row">
                    <div class="col-md-12 login_show">
                      <div class="checkout-method__login">
                        <form method="post">
                          <h5 class="checkout-method__title">Login</h5>
                          <div class="single-input">
                            <label for="user-email">Email Address</label>
                            <input type="email" name="email_forget" id="user_email" required>
                          </div>
                          <span id="error_email_msg"></span>

                          <span id="error_password_msg"></span>
                          <p class="require">* Required fields</p>
                          <div class="dark-btn">
                           <input type="submit" name="login_submit_forget" value="submit">
                          </div>
                        </form>
                      </div>
                        <?php
                          //login php code//
                          if(isset($_REQUEST['login_submit_forget'])){
                           $email=get_safe_value($con,$_REQUEST['email_forget']);
                           $sql_check_user=mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$email'");
                           $cheak_sql=mysqli_num_rows($sql_check_user);
                           if($cheak_sql>0){
                             $data_fetch=mysqli_fetch_assoc($sql_check_user);
                             $password=$data_fetch['password'];

                             require 'PHPMailerAutoload.php';
                             require 'credential.php';
                             $mail = new PHPMailer;
                             $mail->isSMTP();    //smtp
                             $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                             $mail->SMTPAuth = true;       // Enable SMTP authentication
                             $mail->Username = EMAIL;     // SMTP username
                             $mail->Password = PASS;               // SMTP password
                             $mail->SMTPSecure = 'tls';      // Enable TLS encryption, `ssl` also accepted
                             $mail->Port = 587;         // TCP port to connect
                             $mail->setFrom(EMAIL, 'sazzad hossain');
                             $mail->addAddress($email);     // Add a recipient
                             $mail->addReplyTo(EMAIL);
                             $mail->isHTML(true);                // Set email format to HTML
                             $mail->Subject ="Your real password:";
                             $mail->Body  = "<div style='border:2px solid red;font-size:24px;font-family:oswald;color:green;'>This is your This your password:- $password <br> Thanks for visiting Our site.<br><b>SAZZAD HOSSAIN</b></div>";

                             if(!$mail->send()) {
                                 echo 'Message could not be sent.';
                                 echo 'Mailer Error: ' . $mail->ErrorInfo;
                             }else{
                                    echo"<P style='color:green'>check your email and get password and login.</P>";
                                  ?>
                                  <script>
                                    setInterval(function(){
                                      window.location.href='login_res.php';
                                    },1000);
                                  </script>
                                  <?php
                             }

                           }else{
                             echo"<P style='color:red'>your information is rong pleace enter right information...!</P>";
                           }
                          }
                          ?>
                        </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- cart-main-area end -->
<?php require_once("footer.php");?>
