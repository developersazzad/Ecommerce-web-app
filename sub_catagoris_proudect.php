<?php require_once("header.php");

if(isset($_REQUEST["catagoris"])){
  $catagoris=$_REQUEST["catagoris"];
   $sub_cat_id=$_REQUEST["sub_cat"];
   $sql_value="SELECT * FROM `product` WHERE categorizes_id='$catagoris' AND subcatagoris_id='$sub_cat_id'";
   $sql=mysqli_query($con,$sql_value);

  }
?>
<div class="body__overlay"></div>
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
                          <span class="breadcrumb-item active">Products</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
              <!-- Start Product View -->
                    <div class="row">
                    <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                <!-- Start Single Product -->
                                <?php
                                while($cat_proudect=mysqli_fetch_assoc($sql)){
                                 $proudect_id=$cat_proudect['id'];
                                  // code...
                                  ?>
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="proudect_detals.php?id=<?php echo $proudect_id?>">
                                                <img src="media/img/<?php echo $cat_proudect['images']?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                          <ul class="product__action">
                                            <li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $cat_proudect['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
                                               <input type="hidden" id="qty" value="1">
                                            <li><a  href="javascript:void(0)" onclick="add_to_wistall('<?php echo $cat_proudect['id']?>','add')"><i class="icon-heart icons"></i></a></li>
                                          </ul>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="proudect_detals.php?id=<?php echo $proudect_id?>"><?php echo $cat_proudect['name'] ?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <li class="old__prize"><?php echo $cat_proudect['mrp'] ?></li>
                                                <li><?php echo $cat_proudect['price'] ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <?php

                              }?> <!-- End Single Product -->
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</section>
<!-- End Product Grid -->
<?php require_once("footer.php");?>
