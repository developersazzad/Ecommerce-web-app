<?php
require_once("cannection.php");
require_once("add_to_cart_function.php");
require_once("function_core.php");
$pid=get_safe_value($con,$_POST['pid']);
$type=get_safe_value($con,$_POST['type']);

$sql_query_wishlist='';
//callect user id//

if(isset($_SESSION['USER_LOGIN'])){
  $user_email=$_SESSION['USER_EMAIL'];
  $cheak_user_id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$user_email'"));
  $user_id=$cheak_user_id['id'];

 $cheak_already_exisest_proudect=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `wish_list` WHERE proudect_id='$pid' and user_id='$user_id' "));

 if($cheak_already_exisest_proudect>0){
   //2== user already apc_exists===========//
 }else{
   $insert_sql=mysqli_query($con,"INSERT INTO `wish_list`(`proudect_id`, `user_id`) VALUES ('$pid','$user_id')");
 }

}else{
  //user not login //
  $_SESSION['WISHLIST_PROUDECT_ID']=$pid;
  echo $result_res=5898989;
}
//wishlist add sql//
if(isset($_SESSION['USER_LOGIN'])){
$user_email=$_SESSION['USER_EMAIL'];
$cheak_user_id=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$user_email'"));
$user_id=$cheak_user_id['id'];
$sql_query_wishlist=mysqli_num_rows(mysqli_query($con,"select product.id, product.name,product.price,product.images,product.mrp from product,wish_list WHERE `wish_list`.`proudect_id`= product.id and `wish_list`.`user_id`='$user_id' "));
echo $sql_query_wishlist;
$_SESSION['WISHLIST_COUNT']=$sql_query_wishlist;
}

//most vvi cannection string//
