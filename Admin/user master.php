<?php
require_once('header.php');
if(isset($_SESSION["Admin_name"]) && $_SESSION["Admin_password"]){
if(isset($_REQUEST["type"]) && ($_REQUEST["type"])!=''){
  $type=mysqli_real_escape_string($con,$_REQUEST["type"]);
  if($type=='stats'){
    $opration=mysqli_real_escape_string($con,$_REQUEST['opration']);
    //deletee//
    if($opration=='delete'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $sql_delete="DELETE FROM `user_master` WHERE id='$id'";
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>password</th>
                    <th>Date</th>
                    <th class="text-center">Stats</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $cat_sql="SELECT * FROM `user_master` WHERE 1";
                  $run_cat_sql=mysqli_query($con,$cat_sql);
              while($mydata=mysqli_fetch_assoc($run_cat_sql)){
                $id=$mydata['id'];
                $name=$mydata['name'];
                $email=$mydata['email'];
                $mobil=$mydata['password'];
                $password=$mydata['mobile'];
                $added_on=$mydata['add_on'];
                ?>
                  <tr>
                    <td class="serial">1.</td>
                    <td> <span class="product"><?php echo $name ?></span></td>
                    <td> <span class="name catagoris"><?php echo $email; ?></span> </td>
                    <td> <span class="product"><?php echo $mobil ?></span></td>
                    <td> <span class="product"><?php echo $password ?></span></td>
                    <td> <span class="name catagoris"><?php echo $added_on; ?></span> </td>
                    <td>
                      <span class=""><?php
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
<?php require_once('footer.php');}?>
