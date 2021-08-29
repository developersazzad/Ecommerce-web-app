
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
      $sql_update="UPDATE `categorizes` SET`stats`='$stats' WHERE id='$id'";
      $run_update_sql=mysqli_query($con,$sql_update);
    }
    //deactive//
    if($opration=='deactive'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $stats='0';
      $sql_update="UPDATE `categorizes` SET`stats`='$stats' WHERE id='$id'";
      $run_update_sql=mysqli_query($con,$sql_update);
    }
    //deletee//
    if($opration=='delete'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $sql_delete="DELETE FROM `categorizes` WHERE id='$id'";
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
            <h2 class="box-title">catagoris</h2>
            <a class="bg-success p-1 text-white text-center" href="manage_catagoris.php?stats=yes">add catagoris</a>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th class="serial">serial</th>
                    <th>ID</th>
                    <th>catagoris</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                $cat_sql="select * from categorizes where 1";
                $run_cat_sql=mysqli_query($con,$cat_sql);
                while($mydata=mysqli_fetch_assoc($run_cat_sql)){
                $catgoris=$mydata['categorizes'];
                $id=$mydata['id'];
                $stats=$mydata['stats'];
                ?>
                  <tr>
                    <td class="serial">1.</td>
                    <td> <span class="product"><?php echo $id ?></span></td>
                    <td> <span class="name catagoris"><?php echo $catgoris; ?></span> </td>
                    <td>
                      <span class=""><?php
                      if($stats=='1'){
                        echo"<a style=font-family:oswald; class='btn btn-success text-center' href='?type=stats&opration=deactive&id=".$id."'>Active</a>";
                      }
                      if($stats=='0'){
                        echo"<a style=font-family:oswald; class='btn btn-secondary text-center' href='?type=stats&opration=active&id=".$id."'>Deactive</a>";
                      };
                      echo"<a style=font-family:oswald; class='btn ml-1 btn-primary text-center' href='manage_catagoris.php?type=stats&opration=edit&id=".$id."'>edit</a>";

                      echo"<a style=font-family:oswald; class='btn ml-1 btn-danger text-center' href='?type=stats&opration=delete&id=".$id."'>Delete</a>";
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
<?php require_once('footer.php');
}
?>
