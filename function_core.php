<?php
function pr($arr){
  echo"<pre>";
  print_r($arr);
  die();
}
function prx($arr){
  echo"<pre>";
  print_r($arr);
  die();
}

function get_safe_value($con,$str){
  if($str!=''){
    trim($str);
    return mysqli_real_escape_string($con,$str);
  };
};

function get_product($con,$cat_id='',$proudect_id='',$search='',$sort_sql='',$best='',$limit=''){
$sql="SELECT product.*,categorizes.categorizes from product,categorizes where product.stats=1 ";
  if($cat_id!=''){
   $sql.=" and product.categorizes_id=$cat_id ";
 }
 if($search!=''){
 $sql.=" and (`product`.`name` LIKE '%$search%' or product.desc LIKE '%$search%') ";
}
$sql.=" and product.categorizes_id=categorizes.id ";

 if($proudect_id!=''){
   $sql.=" and product.id=$proudect_id ";
 }

  if($best!=''){
    $sql.=" and product.best_seller=$best ";
  }
 if($sort_sql!=''){
 $sql.=$sort_sql;
 }else{
    $sql.=" order by product.id desc";
 }
 if($limit!=''){
  $sql.=" limit $limit ";
 }
  $run_sql=mysqli_query($con,$sql);
  $data=array();
  while($row=mysqli_fetch_assoc($run_sql)){
    $data[]=$row;
  };
    return $data;
};


function get_proudect_qty_count($con,$pid){
  $sql="SELECT sum(order_detals.qty) as qty from order_detals where order_detals.proudecta_id='$pid' and order_detals.order_stats!='cancel'";
  $run_sql=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($run_sql);
  return $row['qty'];
}

function get_qty_in_proudect($con,$pid){
  $sql="SELECT `id` , `qty` FROM `product` WHERE id='$pid'";
  $run_sql=mysqli_query($con,$sql);
  $row_qty = mysqli_fetch_assoc($run_sql);
  return $row_qty['qty'];
}
?>
