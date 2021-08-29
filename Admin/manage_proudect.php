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
$p_name='';
$p_mrp='';
$p_price='';
$p_srt_desc='';
$p_desc='';
$p_qty='';
$p_data_key='';
$p_meta_title='';
$p_meta_desc='';
$sub_catagoris='';
$sub_catagoris_id='';
if(isset($_REQUEST['stats'])){
$stats=get_safe_value($con,$_REQUEST['stats']);
if($stats=='yes'){
  if(isset($_REQUEST['submit'])){
   $P_name=get_safe_value($con,$_REQUEST['P_name']);
   $p_mrp=get_safe_value($con,$_REQUEST['p_mrp']);
   $p_price=get_safe_value($con,$_REQUEST['p_price']);
   $p_srt_desc=get_safe_value($con,$_REQUEST['p_srt_desc']);
   $p_desc=get_safe_value($con,$_REQUEST['p_desc']);
   $p_database_key=get_safe_value($con,$_REQUEST['p_database_key']);
   $p_meta_title=get_safe_value($con,$_REQUEST['p_meta_title']);
   $p_meta_desc=get_safe_value($con,$_REQUEST['p_meta_desc']);
   $p_qty=get_safe_value($con,$_REQUEST['p_qty']);
   $p_catagorize=get_safe_value($con,$_REQUEST['select_catagoris']);
   $sub_catagoris=get_safe_value($con,$_REQUEST['select__sub_catagoris']);
      //move uplode//
   $p_images_pic=$_FILES["image_proudect"];
   $p_images=$_FILES['image_proudect']['name'];
   $p_images_tmp=$_FILES['image_proudect']['tmp_name'];
   $location="../media/img/";
   $images_uniqid=rand(111111,999999);
   move_uploaded_file($p_images_tmp,$location."$images_uniqid.jpg");
   $cheak_sql="SELECT * FROM `product` WHERE name='$P_name'";
   $res=mysqli_query($con,$cheak_sql);
   $cheak=mysqli_num_rows($res);
   if($cheak>0){
     $msg="your catagoris alrady exist !.";
   }else{
     $stats="1";
    $add_cat="INSERT INTO `product`(`categorizes_id`,subcatagoris_id,`name`, `mrp`, `price`, `images`, `stort_desc`, `desc`,`qty`, `metadesc_keyword`, `meta_title`, `meta_desc`, `stats`) VALUES ('$p_catagorize','$sub_catagoris','$P_name','$p_mrp','$p_price','$images_uniqid.jpg','$p_srt_desc','$p_desc','$p_qty','$p_database_key','$p_meta_title','$p_meta_desc','$stats')";
     $run_cat_sql=mysqli_query($con,$add_cat);
     header("location:proudect master.php");

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
      $product_value="SELECT * FROM `product` WHERE id='$id'";
      $run_product_sql=mysqli_query($con,$product_value);
      $proudect_data=mysqli_fetch_assoc($run_product_sql);
      $p_catagoris_id=$proudect_data['categorizes_id'] ;
      $p_name=$proudect_data['name'] ;
      $p_mrp=$proudect_data['mrp'] ;
      $p_price=$proudect_data['price'] ;
      $p_srt_desc=$proudect_data['stort_desc'] ;
      $p_desc=$proudect_data['desc'] ;
      $p_qty=$proudect_data['qty'] ;
      $p_data_key=$proudect_data['metadesc_keyword'];
      $p_meta_title=$proudect_data['meta_title'] ;
      $p_meta_desc=$proudect_data['meta_desc'];
      $sub_catagoris_id=$proudect_data['subcatagoris_id'];

      //sql update//
      if(isset($_REQUEST['submit'])){
        $P_name=get_safe_value($con,$_REQUEST['P_name']);
        $p_mrp=get_safe_value($con,$_REQUEST['p_mrp']);
        $p_price=get_safe_value($con,$_REQUEST['p_price']);
        $p_srt_desc=get_safe_value($con,$_REQUEST['p_srt_desc']);
        $p_desc=get_safe_value($con,$_REQUEST['p_desc']);
        $p_database_key=get_safe_value($con,$_REQUEST['p_database_key']);
        $p_meta_title=get_safe_value($con,$_REQUEST['p_meta_title']);
        $p_meta_desc=get_safe_value($con,$_REQUEST['p_meta_desc']);
        $p_qty=get_safe_value($con,$_REQUEST['p_qty']);
        $p_catagorize=get_safe_value($con,$_REQUEST['select_catagoris']);
        $sub_catagoris=get_safe_value($con,$_REQUEST['select__sub_catagoris']);
        if($_FILES['image_proudect']['name']!=''){
          //move uplode//
          $p_images_pic=$_FILES["image_proudect"];
          $p_images=$_FILES['image_proudect']['name'];
          $p_images_tmp=$_FILES['image_proudect']['tmp_name'];
          $location="../media/img/";
          $images_uniqid=rand(111111,999999);
          move_uploaded_file($p_images_tmp,$location."$images_uniqid.jpg");
          $edit_update_sql="UPDATE `product` SET `categorizes_id`='$p_catagorize',subcatagoris_id='$sub_catagoris',`name`='$P_name',`mrp`='$p_mrp',`price`='$p_price',`qty`='$p_qty',`images`='$images_uniqid.jpg',`stort_desc`='$p_srt_desc',`desc`='$p_desc',`metadesc_keyword`='$p_database_key',`meta_title`='$p_meta_title',`meta_desc`='$p_meta_desc',`stats`='1' WHERE id='$id'";
         $run_edit_sql=mysqli_query($con,$edit_update_sql);
         header("location:proudect master.php");
       }else{
         $edit_update_sql="UPDATE `product` SET `categorizes_id`='$p_catagorize',subcatagoris_id='$sub_catagoris',`name`='$P_name',`mrp`='$p_mrp',`price`='$p_price',`qty`='$p_qty',`stort_desc`='$p_srt_desc',`desc`='$p_desc',`metadesc_keyword`='$p_database_key',`meta_title`='$p_meta_title',`meta_desc`='$p_meta_desc',`stats`='1' WHERE id='$id'";
        $run_edit_sql=mysqli_query($con,$edit_update_sql);
        header("location:proudect master.php");
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
                echo"update ";
              }
              if($stats=='yes'){
                  echo"Add ";
              }
            ?>proudect</h2>
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
                    <td>
                      <form enctype="multipart/form-data" class="form text-center" method="post">
                      <input class="p-2 mb-1 form-control" type="name" name="P_name" value="<?php echo $p_name ?>" placeholder="type proudect name">
                      <select id="catagpris_id" class="catagoris_id_class form-control p-2 w-100 mb-1" name="select_catagoris" onchange="get_catagoris()" >
                      <?php
                      $sql="SELECT * FROM `categorizes` WHERE 1";
                      $run_sql_loop=mysqli_query($con,$sql);
                      ?>
                      <option value="">Select catagoris</option>
                      <?php
                      while($sql_data=mysqli_fetch_assoc($run_sql_loop)){
                      $catagoris_value=$sql_data['categorizes'];
                      $cat_sql_id=$sql_data['id'];

                       if($p_catagoris_id==$cat_sql_id){
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
                      <select class="form-control np-2 w-100 mb-1" name="select__sub_catagoris" id="sub_catagoris_sp">
                      <option value="" required>Select sub catagoris</option>
                      </select>

                      <input class="p-2 mb-1 form-control" type="file" name="image_proudect">
                      <input class="p-2 mb-1 form-control" type="text" name="p_mrp" value="<?php echo $p_mrp ?>" placeholder="type Mrp">
                      <input class="p-2 mb-1 form-control" type="text" name="p_price" value="<?php echo $p_price ?>" placeholder="type Real price">
                      <input class="p-2 mb-1 form-control" type="text" name="p_srt_desc" value="<?php echo $p_srt_desc ?>" placeholder="type sort description">
                      <input class="p-2 mb-1 form-control" type="text" name="p_desc" id="desc" value="<?php echo $p_desc ?>" placeholder="type description">
                      <input class="p-2 mb-1 form-control" type="text" name="p_database_key" value="<?php echo $p_data_key ?>" placeholder="type database key ">
                      <input class="p-2 mb-1 form-control" type="text" name="p_meta_title" value="<?php echo $p_meta_title ?>" placeholder="type meta title">
                      <input class="p-2 mb-1 form-control" type="text" name="p_meta_desc" value="<?php echo $p_meta_desc ?>" placeholder="type meta description">
                      <input class="p-2 mb-1 form-control" type="text" name="p_qty" value="<?php echo $p_qty?>" placeholder="type qty">
                      <input style=font-family:oswald; class=" btn-success btn px-2 mt-2 text-center" type="submit" value="submit" name="submit">

                    </form></td>
                  </tr>
                </tbody>
              </table>
              <div class="bg-warning p-2 text-center"><?php echo $msg?></div>
            </div>
          </div>
        </div>
        <?php if(isset($_REQUEST['id'])){
         $_SESSION["SUB_CAT_ID"]=$sub_catagoris_id;
       }?>
        <script>
        //sand sub catagoris//
         function get_catagoris(){
           var cat_id = jQuery('#catagpris_id').val();
           jQuery.ajax({
             url:'sub_catagoris_sp.php',
             type:'post',
             data:'cat_id='+cat_id,
             success:function(result){
               jQuery('#sub_catagoris_sp').html(result)
             }
           })
         }
        </script>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<?php require_once('footer.php');
$sub_catagoris_id='';
if(isset($_REQUEST['id'])){ ?>
  <script>
      get_catagoris(id="<?php echo $sub_catagoris_id?>");
  </script>
  <?php
};
};?>
