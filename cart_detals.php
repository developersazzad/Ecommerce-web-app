<?php
require_once("header.php");
require_once("add_to_cart_function.php");
if(isset($_SESSION['cart'])){
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
                    <th class="product-quantity">Quantity</th>

                    <th class="product-subtotal">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <?php
               $cart=$_SESSION['cart'] ;
                foreach (	$cart as $key => $value) {
                $sql_p="SELECT * FROM `product` WHERE id='$key'";
                $run_p_sql=mysqli_query($con,$sql_p);

                $get_proudect=get_product($con,'',$key);
                while( $get_proudect=mysqli_fetch_assoc($run_p_sql)){
                  $key=$key;
                  $pname=$get_proudect['name'];
                  $pprice=$get_proudect['price'];
                  $pqty=$value['qty'];
                  $pimages=$get_proudect['images'];
                  $pmrp=$get_proudect['mrp'];
                  $product_id=$get_proudect['id'];

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

                    <td class="product-quantity">
                      <input type="number" id="<?php echo $key?>qty" value="<?php echo $pqty ?>" />
                      <input type="button" class="btn btn-primary" value="update" onclick="manage_cart('<?php echo $key?>','update')" />
                    </td>
                    <td class="product-subtotal"><?php echo
                                        $pprice*$pqty ?></td>
                    <td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $product_id?>','remove')"><i class="icon-trash icons"></i></a>

                    </td>
                  </tr>
                </tbody>
                <?php
              }
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
                    <a href="cheak_out.php">checkout</a>
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
  <!-- End Banner Area -->
</div>
<!-- Body main wrapper end -->
<?php require_once("footer.php");

}else{
?>
<script type="text/javascript">
window.location.href="index.php";
</script>
  <?php
};
?>
