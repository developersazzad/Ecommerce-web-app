<?php
require_once("header.php");
?>

<div class="content pb-0">
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h2 class="box-title">catagoris</h2>
            <a class="bg-success p-1 text-white text-center" href="manage_catagoris.php?stats=yes">add catagoris</a>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th class="serial">serial</th>
                    <th>Images</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>price</th>
                     <th>qty</th>
                    <th>Date</th>
                    <th>Stats</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              if(isset($_SESSION["USER_ID_ADMIN_LOGIN"])){
                 $user_id=$_SESSION["USER_ID_ADMIN_LOGIN"];
                  $cat_sql="SELECT order_detals .*,product.images from order_detals inner JOIN product on `order_detals`.`proudecta_id`=product.id and `order_detals`.`user_id`='$user_id'";
                  $run_cat_sql=mysqli_query($con,$cat_sql);
              while($mydata=mysqli_fetch_assoc($run_cat_sql)){
                $images=$mydata['images'];
                $proudect_name=$mydata['proudect_name'];
                $user_address=$mydata['address'];
                $user_city=$mydata['city'];
                $qty=$mydata['qty'];
                $price=$mydata['price'];
                $user_pmt_stats=$mydata['pament_stats'];

                $user_order_stats=$mydata['order_stats'];

                $user_order_date=$mydata['added_on'];

                $Colect_user_mobile_nomber=mysqli_fetch_assoc(mysqli_query($con,"SELECT `id`, `name`, `email`, `password`, `mobile` FROM `user_master` WHERE id='$user_id'"));
                $user_mobile_number=$Colect_user_mobile_nomber['mobile'];
                ?>
                  <tr>
                    <td class="serial">1.</td>
                    <td> <img src="../media/img/<?php echo $images?>"class="product"></td>
                    <td> <span class="product"><?php echo $user_address ?>
                      <br> <?php echo $user_city ?>
                    </span></td>
                    <td> <span class="product"><?php echo $user_mobile_number ?></span></td>
                    <td> <span class="product"><?php echo $price ?></span></td>
                     <td> <span class="product"><?php echo $qty ?></span></td>
                    <td class="text-center "> <span class="product text-center"><?php echo $user_order_date ?></span></td>

                    <td>
                      <span class=""><?php
                      echo"<a style=font-family:oswald; class='btn ml-1 btn-danger text-center' href='?type=stats&opration=delete&id=".$user_id."'>Delete</a>";
                      echo"<a style=font-family:oswald; class='btn ml-1 btn-success text-center' href='?type=stats&opration=open&id=".$user_id."'>open</a>";
                      ?></span>
                    </td>
                  </tr>
                  <?php
                }};
                ?>
                </tbody>
              </table>
              <div class="order_stats">
                <form method="post">
                  <h4 class="text-left">Order Stats :</h4>
                  <select  name="order_stats_select" class="p-2" id="">
                    <option value="pandding">pandding</option>
                    <option value="Delevery start">Delevery start</option>
                    <option  value="take corir">take corir</option>
                    <option value="delevery success">delevery success</option>
                    <option value="cancel">cancel</option>
                  </select>
                  <input type="submit" value="Save" name="submit_btn_new" class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<?php require_once("footer.php");
if(isset($_REQUEST["submit_btn_new"])){

  $get_order_stats=get_safe_value($con,$_REQUEST["order_stats_select"]);
  $submit_sql=mysqli_query($con,"UPDATE `order` SET `order_stats`='$get_order_stats' WHERE user_id='$user_id'");

  $submit_sql_detals=mysqli_query($con,"UPDATE `order_detals` SET `order_stats`='$get_order_stats' WHERE user_id='$user_id'");
 ?>
<script type="text/javascript">
window.location.href="order master.php";

</script>
 <?php
}
?>
