<?php
function pr($arr){
  echo"<pre>";
  print_r($arr);
  die();
};
function prx($arr){
  echo"<pre>";
  print_r($arr);
  die();
};
function get_safe_value($con,$str){
  if($str!=''){
    trim($str);
    return mysqli_real_escape_string($con,$str);
  };
};

function get_proudect_qty_count($con,$pid){
  $sql="SELECT sum(order_detals.qty) as qty from order_detals where order_detals.proudecta_id='$pid' and order_detals.order_stats!='cancel'";
  $run_sql=mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($run_sql);
  return $row['qty'];
}
?>
