<?php

require_once('header.php');
if(isset($_SESSION["Admin_name"]) && $_SESSION["Admin_password"]){
//asiane value//
$type='';
$stats='';
$cat_data_catgoris='';
$catgoris_name='';
$catgoris_name_tow='';
$msg='';
$cat_data_catgoris_id='';
if(isset($_REQUEST['stats'])){
$stats=get_safe_value($con,$_REQUEST['stats']);
if($stats=='yes'){
  if(isset($_REQUEST['submit'])){
   $sub_catgoris_name=get_safe_value($con,$_REQUEST['sub_cat_name']);
   $catgoris_name=get_safe_value($con,$_REQUEST['select_catagoris']);
   $cheak_sql="SELECT * FROM `sub_catagoris` WHERE name='$catgoris_name'";
   $res=mysqli_query($con,$cheak_sql);
   $cheak=mysqli_num_rows($res);
   if($cheak>0){
     $msg="your catagoris alrady exist !.";
   }else{
     $stats="1";
    $add_cat="INSERT INTO `sub_catagoris`( `name`,`catagoris_id`,`stats`) VALUES ('$sub_catgoris_name','$catgoris_name','$stats')";
     $run_cat_sql=mysqli_query($con,$add_cat);
     header("location:sub_catagoris.php");
   }

  }
}
}


//cat data//

if(isset($_REQUEST['type']) && ($_REQUEST['type'])!=''){
  $type=mysqli_real_escape_string($con,$_REQUEST['type']);
  if($type=="stats"){
    $opration=mysqli_real_escape_string($con,$_REQUEST['opration']);
    if($opration=='edit'){
      $id=mysqli_real_escape_string($con,$_REQUEST['id']);
      $catch_value="SELECT `sub_catagoris`.name,`sub_catagoris`.catagoris_id,`sub_catagoris`.`stats`, `sub_catagoris`.proudect_id,`categorizes`.`categorizes` from sub_catagoris inner join categorizes on categorizes.id=sub_catagoris.catagoris_id and `sub_catagoris`.`id`='$id'";
      $run_catch_sql=mysqli_query($con,$catch_value);
       $cat_data=mysqli_fetch_assoc($run_catch_sql);
       $cat_data_catgoris=$cat_data['name'];
      $cat_data_catgoris_id=$cat_data['catagoris_id'];
      if(isset($_REQUEST['submit'])){
      $catgoris_name_tow=get_safe_value($con,$_REQUEST['sub_cat_name']);
      $catgoris_id=get_safe_value($con,$_REQUEST['select_catagoris']);
      $edit_update_sql="UPDATE `sub_catagoris` SET `name`='$catgoris_name_tow',catagoris_id='$catgoris_id' WHERE id='$id' ";
      $run_edit_sql=mysqli_query($con,$edit_update_sql);
     if($edit_update_sql==true){
       header("location:sub_catagoris.php");
     }
    }
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
            <h2 class="box-title"><?php

              if($type=="stats"){
                echo"Edit ";
              }
              if($stats=='yes'){
                  echo"Add ";
              }
            ?>catagoris</h2>
          </div>
          <div class="card-body--">
            <div class="table-stats order-table ov-h">
              <table class="table ">
                <thead>
                  <tr>
                    <th class="serial">serial</th>
                    <th>catagoris name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><form class="form text-center" method="post">
                      <select class="p-2 w-100 mb-1 form-control" name="select_catagoris" id="">
                      <?php
                      $sql="SELECT * FROM `categorizes` WHERE 1";
                      $run_sql_loop=mysqli_query($con,$sql);
                      ?>
                      <option value="">Select catagoris</option>
                      <?php
                      while($sql_data=mysqli_fetch_assoc($run_sql_loop)){
                      $catagoris_value=$sql_data['categorizes'];
                      $cat_sql_id=$sql_data['id'];
                       if($cat_data_catgoris_id==$cat_sql_id){
                         ?>
                         <option selected value="<?php echo $cat_sql_id;?>"><?php echo $catagoris_value?></option>
                         <?php
                       }else{ ?>
                       <option  value="<?php echo $sql_data['id'];?>"><?php echo $catagoris_value?></option>
                       <?php
                       }
                       ?>

                      <?php }?>
                      </select>
                      <input class="p-2 form-control" type="text" name="sub_cat_name" value="<?php echo $cat_data_catgoris ?>" placeholder="type catagoris name">

                      <input style=font-family:oswald; class=" btn-success btn px-2 mt-2 text-center" type="submit" value="submit" name="submit">
                    </form></td>
                  </tr>
                </tbody>
              </table>
              <div class="bg-warning p-2 text-center"><?php echo $msg?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<?php require_once('footer.php');}?>
