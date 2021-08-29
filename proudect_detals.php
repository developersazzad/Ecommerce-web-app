<?php
require_once('header.php');
require_once('function_core.php');
$select_qty='';
?>
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
              <a class="breadcrumb-item" href="product-grid.html">Products</a>
              <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
              <span class="breadcrumb-item active">ean shirt</span>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
  <!-- Start Product Details Top -->

  <div class="htc__product__details__top">
    <?php
    if(isset($_REQUEST['id'])){
      $proudect_id=$_REQUEST['id'];
    }
    $get_proudect=get_product($con,'',$proudect_id,'','');
    foreach($get_proudect as $proudect_single){
      ?>
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
          <div class="htc__product__details__tab__content">
            <!-- Start Product Big Images -->
            <div class="product__big__images">
              <div class="portfolio-full-image tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                  <img src="media/img/<?php echo $proudect_single['images']?>" alt="full-image">
                </div>
              </div>
            </div>
            <!-- End Product Big Images -->
          </div>
        </div>
        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
          <div class="ht__product__dtl">
            <h2><?php echo $proudect_single['name'] ?></h2>
            <ul class="pro__prize">
              <li class="old__prize">$<?php echo $proudect_single['mrp'] ?></li>
              <li>$<?php echo $proudect_single['price'] ?></li>
            </ul>

            <div class="ht__pro__desc">
              <div class="sin__desc">
                <?php
                $id_p=$proudect_single['id'];
                $qty_order_detals=$proudect_single['qty'];
              $proudectSouldQtyByProudectId=get_proudect_qty_count($con,$id_p);
              //know to how qty have in stock//
              $proudect_qty=get_qty_in_proudect($con,$id_p);
              //koto qty aca database//
               $pandding_qty=$proudect_qty-$proudectSouldQtyByProudectId;
               $cart="yes";
               if($qty_order_detals>$proudectSouldQtyByProudectId){
                  $stock="In stock";

               }else{
                 $stock="Not in stock";
                 $cart="no";
               }
                 ?>
                <p><span>Availability: <?php echo $stock ;?></span>
                </p>
              </div>
              <div class="sin__desc align--left">
                <p>Cataqoris : <span><?php echo $proudect_single['categorizes'];?></span></p>
                <?php if($cart!="no"){
                  ?>
                <ul class="pro__cat__list">
                  Qty:
                  <select name="qty_select" id="qty">
                  <?php
                  for($i=1;$i<=$pandding_qty;$i++){
                    echo"<option value='$pandding_qty'>$i</option>";
                  }
                  ?>

                  </select>
                </ul>
                <?php
              }?>
              <?php if($cart!="no"){
                ?>
                <ul class="pro__cat__list">
                  <div class="cr__btn btn_cart">
                     <li><a class="fr__btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $proudect_single['id']?>','add')">Add to cart</a></li>
                  </div>
                </ul>
              <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php }?>
  </div>
</div>
<!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <!-- Start List And Grid View -->
      <ul class="pro__details__tab" role="tablist">
        <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab"><?php echo $proudect_single['stort_desc'];?></a></li>
      </ul>
      <!-- End List And Grid View -->
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="ht__pro__details__content">
        <!-- Start Single Content -->
        <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
          <div class="pro__tab__content__inner">
            <p><?php echo $proudect_single['desc'];?>
          </div>
        </div>
        <!-- End Single Content -->

      </div>
    </div>
  </div>
</div>
</section>
<!-- End Product Description -->
<!-- Start Product Area -->
<section class="htc__product__area--2 pb--100 product-details-res">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="section__title--2 text-center">
          <h2 class="title__line">New Arrivals</h2>
          <p>But I must explain to you how all this mistaken idea</p>
        </div>
      </div>
    </div>
    <div class="htc__product__container">
      <div class="row">
        <div class="product__list clearfix mt--30">
          <!-- Start Single Category -->
          <?php
          $get_proudect=get_product($con,'','','','','',4);
          foreach($get_proudect as $proudect){?>
          <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
            <div class="category">
              <div class="ht__cat__thumb">
                <a  href="proudect_detals.php?id=<?php echo $proudect['id'] ?>">
                  <img src="media/img/<?php echo $proudect['images'];
                  ?>" alt="product images">
                </a>
              </div>
              <div class="fr__hover__info">
                <ul class="product__action">
                  <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $proudect['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
                     <input type="hidden" id="qty" value="1">
                  <li><a  href="javascript:void(0)" onclick="add_to_wistall('<?php echo $proudect['id']?>','add')"><i class="icon-heart icons"></i></a></li>
                </ul>
              </div>
              <div class="fr__product__inner">
                <h4><a href="proudect_detals.php?id=<?php echo $proudect['id'] ?>"><?php echo $proudect['name'];
                ?></a></h4>
                <ul class="fr__pro__prize">
                  <li class="old__prize"><?php echo $proudect['mrp'];
                  ?></li>
                  <li><?php echo $proudect['price'];
                  ?></li>
                </ul>
              </div>
            </div>
          </div>
          <?php
        };
          ?>
          <!-- End Single Category -->
        </div>
      </div>
    </div>
  </div>

</section>
<!-- Start Category Area -->

<!-- End Category Area -->
<?php require_once('footer.php');?>
<!-- End Product Area -->
