<?php require_once("header.php");
$user_email=$_SESSION['USER_EMAIL'];
$sql_fetch_data=mysqli_fetch_assoc(mysqli_query($con,"SELECT  `name`, `email`, `password`, `mobile`, `add_on` FROM `user_master` WHERE email='$user_email'"));
$name_user=$sql_fetch_data['name'];
$email_user=$sql_fetch_data['email'];
$password_user=$sql_fetch_data['password'];
$mobile_user=$sql_fetch_data['mobile'];
$password_user_user=$sql_fetch_data['password'];
$msg='';

if(isset($_POST['login_submit_name'])){
  $name=get_safe_value($con,$_POST["update_name"]);
  $password=get_safe_value($con,$_POST["update_name_password_fild"]);
  if($password==$password_user_user){
    $update_sql_name=mysqli_query($con,"UPDATE `user_master` SET `name`='$name' WHERE email='$user_email'");
  }else{
    $msg="pleace enter carrect passwored...!";
  }
}

if(isset($_POST['login_submit_password'])){
  $new_password=get_safe_value($con,$_POST["update_pass_new"]);
  $password=get_safe_value($con,$_POST["update_password_real"]);
  if($password==$password_user_user){
    $update_sql_name=mysqli_query($con,"UPDATE `user_master` SET `password`='$new_password' WHERE email='$user_email'");
  }else{
    $msg="pleace enter carrect valid passwored...!";
  }
}

if(isset($_POST['login_submit_mobile'])){
  $new_mobile=get_safe_value($con,$_POST["update_mobile"]);
  $password=get_safe_value($con,$_POST["update_pass_mobile_check"]);
  if($password==$password_user_user){
    $update_sql_name=mysqli_query($con,"UPDATE `user_master` SET `mobile`='$new_mobile' WHERE email='$user_email'");
  }else{
    $msg="pleace enter carrect passwored...!";
  }
}
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
  <div class="ht__bradcaump__wrap">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="bradcaump__inner">
            <nav class="bradcaump-inner">
              <a class="breadcrumb-item" href="index.html">Profile</a>
              <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
              <span class="breadcrumb-item active"><?php echo $name_user?></span>
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
      <div class="col-md-6">
        <div class="checkout__inner">
          <?php
          if(isset($_SESSION['USER_LOGIN'])){
            ?>
           <div class="accordion-list">
            <div class="accordion">
              <div class="accordion__body">
                <div class="accordion__body__form">
                  <div class="row">
                    <div class="col-md-12  login_show">
                      <div class="checkout-method__login">
                         <h4 class="checkout text-uppercase">Profile</h4><br>
                         <h2 class="user_name">Name: <?php echo $name_user?>.</h2>
                         <h2 class="user_email">Email: <?php echo $email_user?>.</h2>
                         <h2 class="user_mobile">Mobile No: <?php echo $mobile_user?>.</h2>

                        <form method="post" class="input-grop">

                          <div class="single-input name_edit_box">
                            <div class="input-group-prepend">
                              <label class="input-group-text">Your name</label>
                            </div>
                            <input type="text" class="form-control" name="update_name" id="update_name" value="<?php echo $name_user?>" required>
                          </div>

                          <div class="single-input name_edit_box">
                            <div class="input-group-prepend">
                              <label class="input-group-text">password</label>
                            </div>
                            <input type="text" class="" placeholder="" name="update_name_password_fild" id="update_name" required>
                          </div>
                          <span id="error_name_msg"></span>
                          <div class="dark-btn name_edit_box" >
                           <input type="submit"class="" name="login_submit_name" value="submit">
                          </div>
                        </form>


                        <!--change password---->
                        <form method="post" class="">

                          <div class="single-input name_edit_box_pass">
                            <div class="input-group-prepend">
                              <label class="input-group-text">valid password</label>
                            </div>
                            <input type="text" class="" name="update_password_real"placeholder="" id="update_Pass" required>
                          </div>
                          <div class="single-input name_edit_box_pass">
                            <div class="input-group-prepend">
                              <label class="input-group-text">new password</label>
                            </div>
                            <input type="text" class="" placeholder="" name="update_pass_new" id="update_name" required>
                          </div>
                          <span id="error_name_msg"></span>
                          <div class="dark-btn name_edit_box_pass" >
                           <input type="submit" class="" name="login_submit_password" value="submit">
                          </div>
                        </form>
                        <!--mobile change----->
                        <form method="post" class="">
                          <div class="single-input name_edit_box_mobile">
                            <div class="input-group-prepend">
                              <label class="input-group-text">New mobile:</label>
                            </div>
                            <input type="text" class="" name="update_mobile" value="<?php echo $mobile_user?>" placeholder="" id="update_mobile" required>
                          </div>
                          <div class="single-input name_edit_box_mobile">
                            <div class="input-group-prepend">
                              <label class="input-group-text"> password</label>
                            </div>
                            <input type="text" class="" placeholder="" name="update_pass_mobile_check" id="password_mobile" required>
                          </div>
                          <span id="error_name_msg"></span>
                          <div class="dark-btn name_edit_box_mobile">
                           <input type="submit" class="" name="login_submit_mobile" value="submit">
                          </div>
                        </form>
                        <br>
                        <span style="color:red;"><?php echo $msg?></span>
                        <br>
                        <h2>Need for:</h2>
                        <ul class="btn_list">
                          <li> <a href="javascript:void(0)" class="click_to_show_edit_name">change name.</a></li>
                          <li> <a href="javascript:void(0)" class="click_to_show_edit_password">change password.</a></li>
                          <li> <a href="javascript:void(0)" class="click_to_show_edit_mobile">change mobile.</a></li>
                        </ul>
                      </div>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php


      }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- cart-main-area end -->
<?php require_once("footer.php");?>
