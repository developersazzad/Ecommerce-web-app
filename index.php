<?php require_once("header.php")?>
    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">
      <!-- Start Cart Panel -->
      <div class="shopping__cart">
        <div class="shopping__cart__inner">
          <div class="offsetmenu__close__btn">
            <a href="#"><i class="zmdi zmdi-close"></i></a>
          </div>
          <div class="shp__cart__wrap">
            <div class="shp__single__product">
              <div class="shp__pro__thumb">
                <a href="#">
                  <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                </a>
              </div>
              <div class="shp__pro__details">
                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                <span class="quantity">QTY: 1</span>
                <span class="shp__price">$105.00</span>
              </div>
              <div class="remove__btn">
                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
              </div>
            </div>
            <div class="shp__single__product">
              <div class="shp__pro__thumb">
                <a href="#">
                  <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                </a>
              </div>
              <div class="shp__pro__details">
                <h2><a href="product-details.html">Brone Candle</a></h2>
                <span class="quantity">QTY: 1</span>
                <span class="shp__price">$25.00</span>
              </div>
              <div class="remove__btn">
                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
              </div>
            </div>
          </div>
          <ul class="shoping__total">
            <li class="subtotal">Subtotal:</li>
            <li class="total__price">$130.00</li>
          </ul>
          <ul class="shopping__btn">
            <li><a href="cart.html">View Cart</a></li>
            <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
          </ul>
        </div>
      </div>
      <!-- End Cart Panel -->
    </div>
    <!-- End Offset Wrapper -->
    <!-- Start Slider Area -->
    <div class="slider__container slider--one bg__cat--3">
      <div class="slide__container slider__activation__wrap owl-carousel">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
          <div class="container">
            <div class="row align-items__center">
              <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                <div class="slide">
                  <div class="slider__inner">
                    <h2>collection 2018</h2>
                    <h1>NICE CHAIR</h1>
                    <div class="cr__btn">
                      <a href="cart.html">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                <div class="slide__thumb">
                  <img src="media/img/IMG_173984.jpg" alt="slider images">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
          <div class="container">
            <div class="row align-items__center">
              <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                <div class="slide">
                  <div class="slider__inner">
                    <h2>collection 2018</h2>
                    <h1>SAZZAD</h1>
                    <div class="cr__btn">
                      <a href="cart.html">Shop Now</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                <div class="slide__thumb">
                  <img  src="media/img/IMG_173984.jpg" alt="slider images">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Single Slide -->
      </div>
    </div>
    <!-- Start Slider Area -->
    <!-- Start Category Area -->
    <section class="htc__category__area ptb--100">
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
              $get_proudect=get_product($con,'','','','','',12);
              foreach($get_proudect as $proudect){?>
              <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                <div class="category">
                  <div class="ht__cat__thumb">
                    <a href="proudect_detals.php?id=<?php echo $proudect['id'] ?>">
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
    <!-- End Category Area -->
    <!-- Start Product Area -->
    <section class="ftr__product__area ptb--100">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="section__title--2 text-center">
              <h2 class="title__line">Best Seller</h2>
              <p>But I must explain to you how all this mistaken idea</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="product__wrap clearfix">
            <!-- Start Single Category -->
            <?php
            $get_proudect=get_product($con,'','','','','1',8);
            foreach($get_proudect as $proudect){ ?>

            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
              <div class="category">
                <div class="ht__cat__thumb">
                  <a href="proudect_detals.php?id=<?php echo $proudect['id'] ?>">
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
<?php } ?>
            <!-- End Single Category -->
          </div>
        </div>
      </div>
    </section>
    <!-- End Product Area -->
 <?php require_once("footer.php");?>
