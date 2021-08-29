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
                            <input type="email" name="email" id="user_email" required>
                          </div>
                          <span id="error_email_msg"></span>
                          <div class="single-input">
                            <label for="user-pass">Password</label>
                            <input type="password" name="password" id="user_pass" required>
                          </div>
                          <span id="error_password_msg"></span>
                          <p class="require">* Required fields</p>
                          <div class="dark-btn">
                           <input type="submit" name="login_submit" value="LogIn">
                          </div>
                        </form>
                       <p class="forget_pass_p"><a class="text-left text-danger forget_passward" href="forget_passward.php">forget password..!</a></p>
                      </div>
                        <?php
                          //login php code//
                          if(isset($_REQUEST['login_submit'])){

                           $email=get_safe_value($con,$_REQUEST['email']);
                           //colllect user id//
                            $collect_user_id=mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `user_master` WHERE email='$email'"));
                            $uder_id_logind_success=$collect_user_id['id'];
                            $_SESSION['USER_ID_LOGIND']=$uder_id_logind_success;

                           $password=get_safe_value($con,$_REQUEST['password']);
                           $cheak_sql=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$email' and password='$password'"));
                          //Wishlist data add//
                          $pid=$_SESSION['WISHLIST_PROUDECT_ID'];
                          $insert_sql=mysqli_query($con,"INSERT INTO `wish_list`(`proudect_id`, `user_id`) VALUES ('$pid','$uder_id_logind_success')");
                          $_SESSION['WISHLIST_COUNT']=1;
                          unset($_SESSION['WISHLIST_PROUDECT_ID']);
                           if($cheak_sql>0){
                             $_SESSION['USER_LOGIN']='YES';
                             $_SESSION['USER_EMAIL']=$email;
                             $sql_user_id_call=mysqli_fetch_assoc(mysqli_query($con,"SELECT `id` FROM `user_master` WHERE email='$email'"));
                             $user_id_user=$sql_user_id_call['id'];
                             $_SESSION['USER_ID']=$user_id_user;
                             echo"congratulation...";
                         ?>
                         <script>
                           window.location.href=window.location.href;
                         </script>
                         <?php

                           }else{
                             echo"<P style='color:red'>your information is rong pleace enter right information...!</P>";
                           }
                         };
                          ?>
                        <p class="text-left text-danger click_btn" href="javascript:void(0)">Resister Now</p>
                      </div>

                    </div>
                    <div class="col-md-12 resister_hide">
                      <div class="checkout-method__login resister_div">
                        <form method="post">
                          <h2 class="checkout-method__title">Register</h2 >
                          <div class="single-input">
                            <label for="user-email">Name</label>
                            <input placeholder="Your name" type="text" name="name" id="user_name" required>
                            <br>
                            <span style="" id="user_name_blank" class="text-danger"></span>
                          </div>

                          <div class="single-input">
                            <label for="user-email">Email Address</label>
                            <br>
                            <span class="emaile_box">
                              <input id="user_email_res" type="email" class="email_res user_email_res_one" placeholder="Email Addess given" style="width:40%" name="email" required>

                               <button type="button" onclick="email_sand_otp('sazzad')" class="btn btn-success   button_eml" name="button">Sand OTP</button>
                            </span>

                            <span class="otp_box">
                              <input type="email" placeholder="verify otp" style="width:40%" name="otp" id="user_otp" class="user_otp_fild">
                               <button type="button" onclick="verify_otp('hossain')"
                               class="btn btn-danger  button_otp" name="button">verify OTP</button>
                            </span>
                            <br>
                            <span style="" id="user_email_error" class="user_email_error text-danger"></span>
                              <span style="" class=" text-success email_verify_result text-bold "></span>
                          </div>

                          <div class="single-input">
                            <label for="user-pass" >Password</label>
                            <input id="user_pass_res" placeholder="password" type="password" name="password" >
                            <br>
                            <span style="" id="user_password_blank" class=" text-danger"></span>
                          </div>
                          <div class="single-input">
                            <label>Mobile</label>
                            <input id="user_mobile" placeholder="Mobile" type="text" name="mobile" >
                            <br>
                            <span style="" id="user_mobile_blank" class=" text-danger"></span>
                          </div>
                          <div class="dark-btn">

                           <button type="button" class="btn btn-primary btn_hero_res" onclick="resister_now('value')" name="Register_submit" disabled>resister</button>
                          </div>
                        </form>
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
