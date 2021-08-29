
<?php require_once("header.php");
if(isset($_REQUEST['type'])){
   $type=get_safe_value($con,$_REQUEST['type']);
  if($type=='cancel'){
   $delete_id=get_safe_value($con,$_REQUEST['id']);
   $delete_sql=mysqli_query($con,"DELETE FROM `order_detals` WHERE id='$delete_id'");
  }
}
?>
<!-- Body main wrapper start -->
  <div class="body__overlay"></div>
  <!-- Start Offset Wrapper -->
  <div class="offset__wrapper">
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
                <span class="breadcrumb-item active">Wishlist</span>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Bradcaump area -->
  <!-- wishlist-area start -->
  <div class="wishlist-area ptb--100 bg__white">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="wishlist-content">
            <form action="#">
              <div class="wishlist-table table-responsive">
                <table>
                  <thead>
                    <tr>
                      <th class="product-remove"><span class="nobr">Order-Name</span></th>
                      <th class="product-thumbnail">Image</th>
                      <th class="product-name"><span class="nobr">Price</span></th>
                      <th class="product-name"><span class="nobr">Order-id</span></th>
                     <th class="product-name"><span class="nobr">Quantity</span></th>
                      <th class="product-price"><span class="nobr"> Order-stauts </span></th>
                      <th class="product-stock-stauts"><span class="nobr"> pament-Status </span></th>
                      <th class="product-stock-stauts"><span class="nobr"> pament-Method </span></th>
                      <th class="product-add-to-cart"><span class="nobr">Date</span></th>
                      <th class="product-add-to-cart"><span class="nobr"> Manage</span></th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   //order detals//
                   $user_email=$_SESSION['USER_EMAIL'];
                   $user_id_callect=mysqli_query($con,"SELECT `id`, `name`, `password`, `mobile`, `add_on` FROM `user_master` WHERE email='$user_email'");
                   $user_id_callect_cheak=mysqli_fetch_assoc($user_id_callect);
                   $user_id_callect_yes=$user_id_callect_cheak['id'];
                   //callect complete//
                   $order_sql="SELECT order_detals .*,product.images from order_detals inner JOIN product on `order_detals`.`proudecta_id`=product.id and `order_detals`.`user_id`='$user_id_callect_yes'";

                   $run_order_sql=mysqli_query($con,$order_sql);
                   while($my_order_data=mysqli_fetch_assoc($run_order_sql)){ ?>
                     <tr>
                       <td class="product-name"><?php echo $my_order_data['proudect_name']?></a></td>
                       <td class="product-thumbnail"><img src="media/img/<?php echo $my_order_data['images'] ?>" alt="images" /></a></td>
                       <td class="product-name"><?php echo $my_order_data['price']?></a></td>
                       <td class="product-
                        order-id"><span class="amount"><?php echo         $my_order_data['id']?></span></td>
                       <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $my_order_data['qty']?></span></td>
                       <td class="product"><?php echo $my_order_data['order_stats']?></a></td>
                       <td class="product"><?php echo   $my_order_data['pament_stats']?></td>
                       <td class="product"><?php echo $my_order_data['pament_mathod']?></td>
                       <td class="product"><?php echo $my_order_data['added_on']?></td>
                       <td class="product"><a href="?type=cancel&id=<?php echo $my_order_data['id']?>">Remove</a></td>
                     </tr>
                  <?php }
                   ?>

                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="10">
                        <div class="wishlist-share">
                          <h4 class="wishlist-share-title">Share on:</h4>
                          <div class="social-icon">
                            <ul>
                              <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                              <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                              <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                              <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                              <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                            </ul>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- wishlist-area end -->
  <?php require_once("footer.php");?>
