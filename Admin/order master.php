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
                    <th>Usr-id</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Pmt-Method</th>
                    <th>Total pr</th>
                    <th>Pmt-Stats</th>
                    <th>Order-Stats</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Stats</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //delete//
                  if(isset($_REQUEST["type"]) && ($_REQUEST["type"])!=''){
                    $type=mysqli_real_escape_string($con,$_REQUEST["type"]);
                    if($type=='stats'){
                      $opration=mysqli_real_escape_string($con,$_REQUEST['opration']);
                  if($opration=='delete'){
                    $id=mysqli_real_escape_string($con,$_REQUEST['id']);
                    $sql_delete="DELETE FROM `order` WHERE user_id='$id'";
                    $run_update_sql=mysqli_query($con,$sql_delete);
                  }
                }
              }
                  $user_mobile_number='';
                  $cat_sql="SELECT `id`, `user_id`, `proudect_id`, `address`, `city`, `post_code`, `pament_method`, `total_price`, `pament_stats`, `order_stats`, `add_on` FROM `order` WHERE 1";
                  $run_cat_sql=mysqli_query($con,$cat_sql);
              while($mydata=mysqli_fetch_assoc($run_cat_sql)){
                $user_id=$mydata['user_id'];
                $user_address=$mydata['address'];
                $user_city=$mydata['city'];
                $user_post_code=$mydata['post_code'];
                $user_pmnt_method=$mydata['pament_method'];
                $user_total_price=$mydata['total_price'];

                $user_pmt_stats=$mydata['pament_stats'];
                $user_order_stats=$mydata['order_stats'];
                $user_order_date=$mydata['add_on'];

                $Colect_user_mobile_nomber=mysqli_fetch_assoc(mysqli_query($con,"SELECT `id`, `name`, `email`, `password`, `mobile` FROM `user_master` WHERE id='$user_id'"));
                $user_mobile_number=$Colect_user_mobile_nomber['mobile'];
                ?>
                  <tr>
                    <td class="serial">1.</td>
                    <td> <span class="product"><?php echo $user_id ?></span></td>
                    <td> <span class="product"><?php echo $user_address ?>
                      <br> <?php echo $user_city ?>
                    </span></td>
                    <td> <span class="product"><?php echo $user_mobile_number ?></span></td>
                    <td> <span class="product"><?php echo $user_pmnt_method ?></span></td>
                    <td> <span class="product"><?php echo $user_total_price ?></span></td>
                    <td> <span class="product"><?php echo $user_pmt_stats ?></span></td>
                    <td> <span class="product"><?php echo $user_order_stats ?></span></td>
                    <td class="text-center "> <span class="product text-center"><?php echo $user_order_date ?></span></td>

                    <td>
                      <span class="product mx-2 "><?php
                      echo"<a style=font-family:oswald; class='btn ml-1 btn-danger text-center btn-sm' href='?type=stats&opration=delete&id=".$user_id."'>Delete</a>";
                      echo"<a style=font-family:oswald; class='btn ml-1 btn-success text-center btn-sm' href='?type=stats&opration=open&id=".$user_id."'>open</a>";
                      ?></span>
                    </td>
                  </tr>
                  <?php
                };
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<?php require_once("footer.php");

//delete//
if(isset($_REQUEST["type"]) && ($_REQUEST["type"])!=''){
  $type=mysqli_real_escape_string($con,$_REQUEST["type"]);
  if($type=='stats'){
    $opration=mysqli_real_escape_string($con,$_REQUEST['opration']);
if($opration=='delete'){
  $id=mysqli_real_escape_string($con,$_REQUEST['id']);
  $sql_delete="DELETE FROM `order` WHERE user_id='$id'";
  $run_update_sql=mysqli_query($con,$sql_delete);
}
//open//
if($opration=='open'){
  $user_id_modify=get_safe_value($con,$user_id);
$_SESSION["USER_ID_ADMIN_LOGIN"]=$user_id_modify;
?>
<script type="text/javascript">
window.location.href="order_detals_admin_core.php";

</script>
<?php
}
}
}

?>
