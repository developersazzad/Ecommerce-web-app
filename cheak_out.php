<?php require_once('header.php');
//retype pament mathod information//
$pament_stats='';
$order_stats='';
$pament_stats='';
$order_stats='';
if(isset($_REQUEST['button_submit'])){
  $strit_addriss=get_safe_value($con,$_REQUEST['strit_addr']);
  $city=get_safe_value($con,$_REQUEST['city']);
  $shouse_no=get_safe_value($con,$_REQUEST['house_no']);
  $post_code=get_safe_value($con,$_REQUEST['zip_code']);
  $pament_method=get_safe_value($con,$_REQUEST['pament_mathod_selected']);
  if($pament_method='cod'){
    $pament_stats="success";
    $order_stats="pandding";
  }
  if($pament_method=='payou'){
     $pament_stats="pandding";
      $order_stats="success";
  }
  //catch proudect detals in proudect sql//
  $cart=$_SESSION['cart'] ;
  $total_price_w=0;
   foreach (	$cart as $key => $value) {
    $get_proudect=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE id='$key'"));
    $pname=$get_proudect['name'];
     $pprice=$get_proudect['price'];
     $pqty=$value['qty'];
     $pimages=$get_proudect['images'];
     $pmrp=$get_proudect['mrp'];
     $product_id=$get_proudect['id'];
     $total_price_w=$total_price_w+($pqty*$pprice);
}
//catch user id when submit data//
if(isset($_SESSION['USER_LOGIN'])){
  $usr_email= $_SESSION['USER_EMAIL'];
  $row_sql_user=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$usr_email'"));
  $user_id=$row_sql_user['id'];

}
  $sql_pament="INSERT INTO `order`( `user_id`, `proudect_id`, `address`, `city`, `post_code`, `pament_method`, `total_price`, `pament_stats`, `order_stats`) VALUES ('$user_id','$product_id','$strit_addriss','$city','$post_code','$pament_method','$total_price_w','$pament_stats','$order_stats')";
  $pament_sql_run=mysqli_query($con,$sql_pament);

//=================order detals sql==========================//
 $order_id=mysqli_insert_id($con);
 foreach (	$cart as $key => $value) {
  $get_proudect=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `product` WHERE id='$key'"));
  $pname=$get_proudect['name'];
   $pprice=$get_proudect['price'];
   $pqty=$value['qty'];
   $pimages=$get_proudect['images'];
   $pmrp=$get_proudect['mrp'];
   $product_id=$get_proudect['id'];
   $total_price_w=$total_price_w+($pqty*$pprice);

   $proudect_detals_sql=mysqli_query($con,"INSERT INTO `order_detals`( `proudect_name`, `pament_mathod`, `pament_stats`, `order_stats`, `address`, `city`, `order_id`, `proudecta_id`, `qty`, `price`,`user_id`) VALUES ('$pname','$pament_method','$pament_stats','$order_stats','$strit_addriss','$city','$order_id','$product_id','$pqty','$pprice','$user_id')");
}
unset( $_SESSION['cart']);
?>
<script>
window.location.href='thank_you.php';
</script>
<?php


}

?>
<!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->
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
              <span class="breadcrumb-item active">checkout</span>
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
          <div class="accordion-list">
            <div class="accordion">
             <?php
             $hide_this="accordion__title";
             if(!isset($_SESSION['USER_LOGIN'])){
               $hide_this="accordian_hide";
               ?>
              <div class="accordion__title">
                Checkout Method
              </div>
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
                        <?php
                          //login php code//
                          if(isset($_REQUEST['login_submit'])){
                           $email=get_safe_value($con,$_REQUEST['email']);
                           $password=get_safe_value($con,$_REQUEST['password']);
                           $cheak_sql=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$email' and password='$password'"));
                           if($cheak_sql>0){
                             $_SESSION['USER_LOGIN']='YES';
                             $_SESSION['USER_EMAIL']=$email;
                             echo"congratulation...";

                           }else{
                             echo"<P style='color:red'>your information is rong pleace enter right information...!</P>";
                           }
                          }
                          /*==========resister codee================*/
                          if(isset($_REQUEST['Register_submit'])){
                           $name=$_REQUEST['name'];
                           $email=$_REQUEST['email'];
                           $password=$_REQUEST['password'];
                           $mobile=$_REQUEST['mobile'];
                           $cheak_sql_res=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$email'"));
                           if($cheak_sql_res==''){
                             $res_sql="INSERT INTO `user_master`( `name`, `email`, `password`, `mobile`) VALUES ('$name','$email','$password','$mobile')";
                             $run_res_sql=mysqli_query($con,$res_sql);
                           }else{
                             echo"<p style='color:red'> You are already reister account pleace login...</p>";
                           }
                         };
                          ?>
                        <p class="text-left text-danger click_btn" href="javascript:void(0)">Resister Now</p>
                      </div>
                    </div>
                    <div class="col-md-12 resister_hide">
                      <div class="checkout-method__login">
                        <form action="#">
                          <h5 class="checkout-method__title">Register</h5>
                          <div class="single-input">
                            <label for="user-email">Name</label>
                            <input type="text" name="name" id="user_name">
                          </div>
                          <div class="single-input">
                            <label for="user-email">Email Address</label>
                            <input type="email" name="email" id="user_email">
                          </div>

                          <div class="single-input">
                            <label for="user-pass" >Password</label>
                            <input type="password" name="password" id="user_pass">
                          </div>
                          <div class="single-input">
                            <label for="user-pass" >Mobile</label>
                            <input type="text" name="mobile" id="user_pass">
                          </div>
                          <div class="dark-btn">
                           <input type="submit" name="Register_submit" value="Register">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            };
              ?>
              <div class="<?php echo $hide_this?>">
                Address Information
              </div>
              <form  method="post">
                <div class="accordion__body ">
                <div class="bilinfo">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="single-input">
                          <input type="text" name="strit_addr" placeholder="Street Address">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="single-input">
                          <input type="text" name="house_no" placeholder="Apartment/Block/House (optional)">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="single-input">
                          <input type="text" name="city" placeholder="City/State">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="single-input">
                          <input type="text" name="zip_code" placeholder="Post code/ zip">
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div class="<?php echo $hide_this ?>">
                payment information
              </div>
              <div class="accordion__body">
                <div class="paymentinfo">
                  <div class="single-method">
                   <i class="zmdi zmdi-long-arrow-right "> COD <input type="radio" name="pament_mathod_selected" value="cod"></i>
                  </div>
                  <div class="single-method">
                  <i class="zmdi zmdi-long-arrow-right "> PaYou <input type="radio" name="pament_mathod_selected" value="payou"></i>
                  </div>
                  <input type="submit" name="button_submit" class="btn btn-success btn-bg" value="Save">
                </div>
              </div>
               </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="order-details">
          <h5 class="order-details__title">Your Order</h5>
          <?php

            $cart=$_SESSION['cart'] ;
            $total_price=0;
            foreach (	$cart as $key => $value) {
            $sql_p="SELECT * FROM `product` WHERE id='$key'";
            $run_p_sql=mysqli_query($con,$sql_p);

            $get_proudect=get_product($con,'',$key);

            while( $get_proudect=mysqli_fetch_assoc($run_p_sql)){
              $key=$key;
              $pname=$get_proudect['name'];
              $pprice=$get_proudect['price'];
              $pqty=$value['qty'];                        $pimages=$get_proudect['images'];
              $pmrp=$get_proudect['mrp'];
              $product_id=$get_proudect['id'];
              $total_price=$total_price+($pprice*$pqty);
              ?>

          <div class="order-details__item">
            <div class="single-item">
              <div class="single-item__thumb">
                <img src="media/img/<?php echo $pimages?>" alt="ordered item">
              </div>
              <div class="single-item__content">
                <a href="#"><?php echo $pname ?></a>
                <span class="price"><?php echo $pprice ?></span>
              </div>
              <div class="single-item__remove">
                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $product_id?>','remove')"><i class="zmdi zmdi-delete"></i></a>
              </div>
            </div>
          </div>
          <div class="order-details__count">
           quantity: <?php echo $pqty ?>
          </div>
            <?php }}?>
          <div class="ordre-details__total">
            <h5>Order total</h5>
            <span class="price"><?php echo $total_price?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- cart-main-area end -->
<!-- Start Footer Area -->

<?php require_once('footer.php');?>
