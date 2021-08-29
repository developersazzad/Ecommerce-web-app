<?php
/*==========resister codee================*/
require_once("cannection.php");
 $name=$_REQUEST['name'];
 $email=$_REQUEST['email'];
 $password=$_REQUEST['pass'];
 $mobile=$_REQUEST['mobile'];
 $cheak_sql_res=mysqli_num_rows(mysqli_query($con,"SELECT * FROM `user_master` WHERE email='$email'"));
 if($cheak_sql_res==''){
   $res_sql="INSERT INTO `user_master`( `name`, `email`, `password`, `mobile`) VALUES ('$name','$email','$password','$mobile')";
   $run_res_sql=mysqli_query($con,$res_sql);
   if($run_res_sql==true){
     echo 34343434;
     unset($_SESSION['USER_ID_AT_A_TIME']);
   }else{
     echo "not rester";
   }
 }else{
    echo"already";
 }
?>
