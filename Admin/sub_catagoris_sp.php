<?php
require_once('cannection.php');
$catagoris_id=$_POST['cat_id'];
 $_sub_cat_id=$_SESSION["SUB_CAT_ID"];

if($_sub_cat_id>0){
  $sql=mysqli_query($con,"SELECT `id`, `name`, `catagoris_id`, `proudect_id`, `data`, `stats` FROM `sub_catagoris` WHERE catagoris_id='$catagoris_id'");
  if(mysqli_num_rows($sql)>0){
    $html='';
    while($data=mysqli_fetch_assoc($sql)){
      $sub_cat_id=$_SESSION["SUB_CAT_ID"];
      $sub_cat_id_sal=$data['id'];
      if($sub_cat_id==$sub_cat_id_sal){
         $html.="<option selected value=".$data['id'].">".$data['name']."</option>";
      }else{
         $html.="<option value=".$data['id'].">".$data['name']."</option>";
      }
    }
      echo $html;
      unset($_SESSION["SUB_CAT_ID"]);
      die();
   }else{
        echo"<option value=''>data not found</option>";
      }//very complecated code//
  }else{
  $sql=mysqli_query($con,"SELECT `id`, `name`, `catagoris_id`, `proudect_id`, `data`, `stats` FROM `sub_catagoris` WHERE catagoris_id='$catagoris_id'");
  if(mysqli_num_rows($sql)>0){
    $html='';
    while($data=mysqli_fetch_assoc($sql)){
     $html.="<option value=".$data['id'].">".$data['name']."</option>";
    }
    echo $html;
  }else{
    echo"<option value=''>data not found</option>";
  }
}
?>
