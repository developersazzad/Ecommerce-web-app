<?php
require_once("header.php");
require_once("add_to_cart_function.php");
$user_email= $_SESSION['USER_EMAIL'];

//callect user id//
$cheak_user_id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$user_email'"));
$user_id=$cheak_user_id['id'];

$sql_query_wishlist=mysqli_query($con,"select product.id, product.name,product.price,product.images,product.mrp from product,wish_list WHERE `wish_list`.`proudect_id`= product.id and `wish_list`.`user_id`='$user_id' ");
//delete sql wishlist=========================//
if(isset($_REQUEST['id'])){
  $type=mysqli_real_escape_string($con,$_REQUEST['id']);
    $delet_id=$_REQUEST['id'];
    $delete_sql=mysqli_query($con,"DELETE FROM `wish_list` WHERE proudect_id='$delet_id' and user_id='$user_id'");

    if(isset($_SESSION['USER_LOGIN'])){
    $user_email=$_SESSION['USER_EMAIL'];
    $cheak_user_id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$user_email'"));
    $user_id=$cheak_user_id['id'];
    $sql_query_wishlist=mysqli_num_rows(mysqli_query($con,"select product.id, product.name,product.price,product.images,product.mrp from product,wish_list WHERE `wish_list`.`proudect_id`= product.id and `wish_list`.`user_id`='$user_id' "));
    echo $sql_query_wishlist;
    $_SESSION['WISHLIST_COUNT']=$sql_query_wishlist;
    }

    ?>
<script type="text/javascript">
window.location.href="wishlist_detals.php";
</script>
    <?php

}
?>
<div class="wrapper">
  <div class="body__overlay"></div>
  <!-- Start Offset Wrapper -->
  <div class="offset__wrapper">
  </div>
  <!-- End Offset Wrapper -->
  <!-- cart-main-area start -->
  <div class="cart-main-area ptb--100 bg__white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <form action="#">
            <div class="table-content table-responsive">

              <table>

                <thead>
                  <tr>
                    <th class="product-thumbnail">Images</th>
                    <th class="product-name">Name</th>
                    <th class="product-price">Price</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <?php

                while( $get_proudect=mysqli_fetch_assoc($sql_query_wishlist)){
                  $pname=$get_proudect['name'];
                  $pprice=$get_proudect['price'];
                  $pimages=$get_proudect['images'];
                  $pmrp=$get_proudect['mrp'];
                  $proudect_id=$get_proudect['id'];
                  ?>
                <tbody>
                  <tr>
                    <td class="product-thumbnail"><a href="#"><img src="media/img/<?php echo $pimages ?>" alt="product img" /></a></td>
                    <td class="product-name"><a href="#"><?php echo $pname ?></a>
                      <ul class="pro__prize">
                        <li class="old__prize"><?php echo $pmrp ?></li>
                      </ul>
                    </td>
                    <td class="product-price"><span class="amount"><?php echo $pprice;
                    ?></span></td>
                    <td class="product-remove"><a href="?id=<?php echo $proudect_id ?>"><i class="icon-trash icons"></i></a>

                    </td>
                  </tr>
                </tbody>
                <?php
              }
               ?>
              </table>

            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="buttons-cart--inner">
                  <div class="buttons-cart">
                    <a href="#">Continue Shopping</a>
                  </div>
                  <div class="buttons-cart checkout--btn">
                    <a href="cheak_out_wistall.php">checkout</a>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- cart-main-area end -->
</div>
<!-- Body main wrapper end -->
<?php require_once("footer.php");
?>
