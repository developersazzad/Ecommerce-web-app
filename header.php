<?php
require_once("cannection.php");
require_once("function_core.php");
require_once("add_to_cart_function.php");

$obj=new add_to_cart();
$total_proudect_cart=$obj->totalProduct();
$cat_sql="SELECT * FROM `categorizes` ORDER BY `categorizes`.`categorizes` ASC ";
$run_cat_sql=mysqli_query($con,$cat_sql);
$cat_data=array();
while($cat_row=mysqli_fetch_assoc($run_cat_sql)){
  $cat_data[]=$cat_row;
};
//wishlist sql and etc sql and other parameter========//

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Asbab - eCommerce HTML5 Templatee</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">


  <!-- All css files are included here. -->
  <!-- Bootstrap fremwork main css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Owl Carousel min css -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <!-- This core.css file contents all plugings css file. -->
  <link rel="stylesheet" href="css/core.css">
  <!-- Theme shortcodes/elements style -->
  <link rel="stylesheet" href="css/shortcode/shortcodes.css">
  <!-- Theme main style -->
  <link rel="stylesheet" href="style.css">
  <!-- Responsive css -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- User style -->
   <link rel="stylesheet" href="css/bootstrap.min1.css">
  <link rel="stylesheet" href="css/custom.css">


  <!-- Modernizr JS -->
  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
  <!-- Body main wrapper start -->
  <div class="wrapper">
    <!-- Start Header Style -->
    <header id="htc__header" class="htc__header__area header--one">
      <!-- Start Mainmenu Area -->
      <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
          <div class="row">
            <div class="menumenu__container clearfix">
              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                <div class="logo">
                  <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                </div>
              </div>
              <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                <nav class="main__menu__nav hidden-xs hidden-sm">
                  <ul class="main__menu">
                    <li class="drop"><a href="index.php">Home</a></li>
                    <li class="drop"><a href="#">Catagoris</a>
                      <ul class="dropdown mega_dropdown">
                        <!-- Start Single Mega MEnu -->
                        <li>
                          <a class="mega__title" href="javascript:void(0)">catagoris Pages</a>

                          <?php
                          foreach ($cat_data as $catagoris) {
                            $catagoris_id=$catagoris['id'];
                          ?>
                          <ul class="mega__item">
                            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $catagoris['categorizes']?>
                                <div class="dropdown-menu custom_padding_dropdown" aria- labelledby="navbarDropdown">
                                  <a class="dropdown-item catagoris_main_box" href="Catagoris.php?id=<?php echo $catagoris_id ?>"><?php echo $catagoris['categorizes']?> All product </a>
                                  <?php
                                  $sql=mysqli_query($con,"SELECT `id`, `name`, `catagoris_id`, `proudect_id`, `data`, `stats` FROM `sub_catagoris` WHERE catagoris_id='$catagoris_id'");
                                  while($data=mysqli_fetch_assoc($sql)){
                                    $cat_id_sub=$data['id'];
                                    ?>
                                      <a class="dropdown-item" value="<?php echo $cat_id_sub?>" href="sub_catagoris_proudect.php?catagoris=<?php echo $catagoris_id?>&sub_cat=<?php echo $cat_id_sub?>"><?php echo $data['name']?></a>
                                      <?php
                                  }
                                  ?>


                                </div>
                            </li>
                          </ul>
                          <?php
                          }
                          ?>
                        </li>
                        <!-- End Single Mega MEnu -->
                      </ul>
                    </li>
                    <li class="drop"><a href="#">Product</a>
                      <ul class="dropdown">
                        <li><a href="product-grid.html">Product Grid</a></li>
                        <li><a href="product-details.html">Product Details</a></li>
                      </ul>
                    </li>
                    <li class="drop"><a href="#">Pages</a>
                      <ul class="dropdown">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                        <li><a href="cart.html">Cart page</a></li>
                        <li><a href="checkout.html">checkout</a></li>
                        <li><a href="contact.html">contact</a></li>
                        <li><a href="product-grid.html">product grid</a></li>
                        <li><a href="product-details.html">product details</a></li>
                        <li><a href="wishlist.html">wishlist</a></li>
                      </ul>
                    </li>
                    <li><a href="contact.html">contact</a></li>
                  </ul>
                </nav>

                <div class="mobile-menu clearfix visible-xs visible-sm">
                  <nav id="mobile_dropdown">
                    <ul>
                      <li><a href="index.html">Home</a></li>
                      <li><a href="blog.html">blog</a></li>
                      <li><a href="#">pages</a>
                        <ul>
                          <li><a href="blog.html">Blog</a></li>
                          <li><a href="blog-details.html">Blog Details</a></li>
                          <li><a href="cart.html">Cart page</a></li>
                          <li><a href="checkout.html">checkout</a></li>
                          <li><a href="contact.html">contact</a></li>
                          <li><a href="product-grid.html">product grid</a></li>
                          <li><a href="product-details.html">product details</a></li>
                          <li><a href="wishlist.html">wishlist</a></li>
                        </ul>
                      </li>
                      <li><a href="contact.html">contact</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                <div class="header__right">
                  <div class="header__search search search__open">
                    <a href="#"><i class="icon-magnifier icons"></i></a>
                  </div>
                  <?php
                  if(isset( $_SESSION['USER_EMAIL'])){
                    $this_class_add='header__account_loged_in';
                  };
                  ?>
                  <div class="header__account <?php echo $this_class_add?>">
                    <a href="login_res.php"><i class="icon-user icons">
                    </i></a>
                    <p class="hover_cantunt">
                      <a class="hover_a" href="log_out.php">Log Out</a>
                      <script>
                        function unset_this(){
                          window.location.href= window.location.href;
                        }
                      </script>
                      <br>
                      <a class="hover_a" href="edit_profile.php">Edit profile</a>
                      <br>
                      <a href="order_detals.php">My Order</a>
                    </p>
                  </div>
                  <!---heart wishlist--->
                  <div class="htc__shopping__cart htc__shopping__cart_hert">
                    <a class="cart__menu" href="wishlist_detals.php"><i class="icon-heart icons"></i></a>
                    <a href="wishlist_detals.php"><span class="htc__wishlist">
                      <?php if(isset($_SESSION['USER_LOGIN'])){
                        echo $_SESSION['WISHLIST_COUNT'];
                      }else{
                        echo '0';
                      } ;?>
                    </span></a>
                  </div>
                       <!---heart cart--->
                  <div class="htc__shopping__cart ">
                    <a class="cart__menu" href="cart_detals.php"><i class="icon-handbag icons"></i></a>
                    <a href="cart_detals.php"><span class="htc__qua "><?php
                    echo $total_proudect_cart;
                    ?></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mobile-menu-area"></div>
        </div>
      </div>
      <!-- End Mainmenu Area -->
    </header>
    <!-- End Header Area -->
    <!-- Start Search Popap -->
    <div class="search__area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="search__inner">
              <form action="search__area.php" method="get">
                <input placeholder="Search here... " type="text" name="search_opt">
                <button type="submit" name="submit_btn_search"></button>
              </form>
              <div class="search__close__btn">
                <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Search Popap -->
