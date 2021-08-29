<?php
require_once("cannection.php");
require_once("add_to_cart_function.php");
require_once("function_core.php");
$qty=get_safe_value($con,$_POST['qty']);
$p_id=get_safe_value($con,$_POST['p_id']);
$type=get_safe_value($con,$_POST['type']);
//check cart add  or no//
$get_proudect_qty_count=get_proudect_qty_count($con,$p_id);
$proudect_qty=get_qty_in_proudect($con,$p_id);
$pandding_qty=$proudect_qty-$get_proudect_qty_count;
if($qty>$pandding_qty){
  echo 5558000;//not ableable//
  die();
}
//most vvi cannection string//
$obj=new add_to_cart();
if($type=="add"){
  $obj->addProduct($p_id,$qty);
}
if($type=="update"){
  $obj->updateProduct($p_id,$qty);
}
if($type=="remove"){
  $obj->removeProduct($p_id);
}
echo $obj->totalProduct();

?>
