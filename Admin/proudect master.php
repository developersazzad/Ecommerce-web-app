<?php
require_once('header.php');
if(isset($_SESSION["Admin_name"]) && $_SESSION["Admin_password"]){
if(isset($_REQUEST["type"]) && ($_REQUEST["type"])!=''){
  $type=mysqli_real_escape_string($con,$_REQUEST["type"]);
  if($type=='stats'){
    $opration=mysqli_real_escape_string($con,$_REQUEST['opration']);
    if($opration=='active'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $stats='1';
      $sql_update="UPDATE `product` SET `stats`='$stats' WHERE id='$id'";
      $run_update_sql=mysqli_query($con,$sql_update);
    }
    //deactive//
    if($opration=='deactive'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $stats='0';
      $sql_update="UPDATE `product` SET `stats`='$stats' WHERE id='$id'";
      $run_update_sql=mysqli_query($con,$sql_update);
    }
    //best_seller add===============//
    if($opration=='best_yes'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $best_seller_opt='1';
      $sql_update="UPDATE `product` SET `best_seller`='$best_seller_opt' WHERE id='$id'";
      $run_update_sql=mysqli_query($con,$sql_update);
    }
    if($opration=='best_no'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $best_seller_opt='0';
      $sql_update="UPDATE `product` SET `best_seller`='$best_seller_opt' WHERE id='$id'";
      $run_update_sql=mysqli_query($con,$sql_update);
    }
    //deletee//
    if($opration=='delete'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $sql_delete="DELETE FROM `product` WHERE id='$id'";
      $run_update_sql=mysqli_query($con,$sql_delete);
    }
  }
}
?>
<div class="content pb-0">
  <div class="orders">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h2 class="box-title">Proudect</h2>
            <a class="bg-success p-1 text-white text-center" href="manage_proudect.php?stats=yes">add proudect</a>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th class="serial">serial</th>
                    <th>id</th>
                    <th>catagoris</th>
                    <th>sub_cat</th>

                    <th>name</th>
                     <th>images</th>
                     <th>qty</th>
                    <th>Mrp</th>
                    <th>Price</th>
                    <th>s-desc</th>
                    <th class="text-center">stats</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
              $prouct_sql="SELECT product.`id`, product.`categorizes_id`,product.`name`,product.`subcatagoris_id`,product.`mrp`,product.`price`,product.`qty`,product.`images`,product.`stort_desc`,product.`best_seller`,product.`desc`, product.`metadesc_keyword`,product.`meta_title`,product.`meta_desc`, product.`stats`,`categorizes`.`categorizes` FROM `product` INNER JOIN categorizes on `product`.`categorizes_id`=`categorizes`.`id` ";
              $run_proudect_sql=mysqli_query($con,$prouct_sql);
              while($mydata=mysqli_fetch_assoc($run_proudect_sql)){
                $proudect_id=$mydata['id'];
                $catagoris_id=$mydata['categorizes_id'];
                $proudect_name=$mydata['name'];
                $proudect_mrp=$mydata['mrp'];
                $proudect_price=$mydata['price'];
                $proudect_qty=$mydata['qty'];
                $proudect_images=$mydata['images'];
                $sort_desc=$mydata['stort_desc'];
                $proudect_desc=$mydata['desc'];
                $proudect_database_key=$mydata['metadesc_keyword'];
                $meta_title=$mydata['meta_title'];
                $meta_desc=$mydata['meta_desc'];
                $catagoris=$mydata['categorizes'];
                $proudect_stats=$mydata['stats'];
                $best_seller=$mydata['best_seller'];
                $sub_catagoris=$mydata['subcatagoris_id'];

                //============qty pandding=============//
                  $proudectSouldQtyByProudectId=get_proudect_qty_count($con,$proudect_id);
                  $pandding_qty=$proudect_qty-$proudectSouldQtyByProudectId;
                ?>
                  <tr>
                    <td class="serial">1.</td>
                    <td> <span class="product"><?php echo $proudect_id ?></span></td>
                    <td> <span class="product"><?php echo $catagoris ?></span></td>
                    <td> <span class="product"><?php    $sub_cat_sql=mysqli_query($con,"SELECT * FROM `sub_catagoris` WHERE id='$sub_catagoris'");
                    while($data_sub_cat=mysqli_fetch_assoc($sub_cat_sql)){
                      echo $data_sub_cat['name'];
                    }

                        ?></span></td>
                    <td> <span class="product"><?php echo $proudect_name ?></span></td>
                    <td> <span class="product"><img src="../media/img/<?php echo $proudect_images ?>" alt="images"></span></td>
                     <td> <span class="product"><?php echo $proudect_qty ?> <br>pannding qty: <?php echo $pandding_qty?> </span></td>
                    <td> <span class="product"><?php echo $proudect_mrp ?></span></td>
                    <td> <span class="product"><?php echo $proudect_price ?></span></td>
                     <td> <span class="product"><?php echo $sort_desc ?></span></td>
                     <td> <span class="d-inline"><?php
                     if($best_seller=='1'){
                       echo"<a style=font-family:oswald;margin-right:3px; class='btn btn-success text-center' href='?type=stats&opration=best_no&id=".$proudect_id."'>Best Yes</a>";
                     }
                     if($best_seller=='0'){
                       echo"<a style=font-family:oswald;margin-right:3px; class='btn btn-secondary text-center' href='?type=stats&opration=best_yes&id=".$proudect_id."'>Best No</a>";
                     }

                      if($proudect_stats=='1'){
                        echo"<a style=font-family:oswald; class='btn btn-success text-center' href='?type=stats&opration=deactive&id=".$proudect_id."'>Active</a>";
                      }
                      if($proudect_stats=='0'){
                        echo"<a style=font-family:oswald; class='btn btn-secondary text-center' href='?type=stats&opration=active&id=".$proudect_id."'>Deactive</a>";
                      };
                      echo"<a style=font-family:oswald; class='btn ml-1 btn-primary text-center' href='manage_proudect.php?type=stats&opration=edit&id=".$proudect_id."'>edit</a>";

                      echo"<a style=font-family:oswald; class='btn ml-1 btn-danger text-center' href='?type=stats&opration=delete&id=".$proudect_id."'>Delete</a>";
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
<?php require_once('footer.php');}?>
