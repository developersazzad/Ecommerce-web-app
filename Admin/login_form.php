<!doctype html>
<html>
<head>
<title>login form </title>

<link rel="stylesheet" href="">

<style>
body{
	margin:0;
	padding:0;
	font-family:sans-serif;
	background:#34495e;
}
.box{
	width:400px;
	padding:40px;
	position:absolute;
	top:50%;
	left:50%;
	background:#191919;
	transform:translate(-50%,-50%);
	text-align:center;


}
h2{
	color:white;
	text-align:center;
	text-transform:uppercase;
}
.box input[type="text"],.box input[type="password"],.box input[type="file"]{
	border:0;
	display:block;
	background:none;
	margin:2px auto;
	border:2px solid green;
	text-align:center;
	padding:15px 10px;
	margin-top:10px;
	outline:none;
	color:white;
	border-radius:24px;
	transition:0.5s;
	align-items:center;
}
.box input[type="text"]:focus,.box input[type="password"]:focus,.box input[type="file"]:focus{
	transition:.25s;
width:280px;
color:#2ecc71;
align-items:center;
}
.box input[type="submit"]{
	border:0;
	display:block;
	background:none;
	margin:2px auto;
	border:2px solid green;
	text-align:center;
	padding:10px 5px;
	outline:none;
	color:white;
	width:100px;
	margin-top:20px;
	font-family:arial black;
	border-radius:24px;
	transition:0.5s;
	align-items:center;
}
.box input[type="submit"]:hover{
	background:green;
}
body {
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(45deg, #12120e00, #00000094),url(back.jpg);
    background-size: cover;
    background-position: center top;
    font-family: consolas;
}
a{
	position:relative;
	display:inline-block;
	padding:15px 30px;
	text-transform:uppercase;
	font-size:24px;
	color:#2196f3;
	letter-spacing:5px;
	overflow:hidden;
	text-decoration:none;
	transition:0.2s;

}
a:hover{
	color:#255784;
	background:#2196f3;
	box-shadow:0 0 10px #2196f3,0 0 40px #2196f3,0 0 80px #2196f3;
	transition-delay:1s;
}
a span{
	position:absolute;
	display:block;
}

a span:nth-child(1){
	top:0;
	left:-100%;
	width:100%;
	height:2px;
	background:linear-gradient(90deg,transparent,#2196f3)

}
a:hover span:nth-child(1){
	left:100%;
	transition:1s;

}

a span:nth-child(3){
	bottom:0;
	right:-100%;
	width:100%;
	height:2px;
	background:linear-gradient(270deg,transparent,#2196f3)

}
a:hover span:nth-child(3){
	right:100%;
	transition:1s;
	transition-delay:0.5s
}

a span:nth-child(2){
	top:-100%;
	right:0;
	width:2px;
	height:100%;
	background:linear-gradient(180deg,transparent,#2196f3)

}
a:hover span:nth-child(2){
	top:100%;
	transition:1s;
	transition-delay:0.25s
}
a span:nth-child(4){
	bottom:-100%;
	left:0;
	width:2px;
	height:100%;
	background:linear-gradient(360deg,transparent,#2196f3)

}
a:hover span:nth-child(4){
	bottom:100%;
	transition:1s;
	transition-delay:0.75s
}
.error_massage{
	color:red;
	font-family: monospace;
	font-size:17px;
}
</style>
</head>

<?php
require_once("function.php");
require_once("cannection.php");
$user_name="sazzad";
$password="sazzad00";
$error_msg="";
if(isset($_REQUEST["btn_login"])){
	$admin_name=get_safe_value($con,$_REQUEST['admin_name']);
	$admin_password=get_safe_value($con,$_REQUEST['admin_pwd']);
	if($user_name==$admin_name && $password==$admin_password){
		$_SESSION["Admin_name"]=$admin_name;
		$_SESSION["Admin_password"]=$admin_password;
		header("location:index.php");
	}else{
		$error_msg="your user name or password wrong...!";
	}

}
?>
<body>
<form class="box" enctype="multipart/from-data" method="post">
<h2>LOG IN</h2>
</br>
<input type="text" name="admin_name" placeholder="username"/>
</br>
<input type="password" name="admin_pwd" placeholder="password"/>
</br>
</br>
<input type="submit" name="btn_login" value="LogIn">
<br>
<div class="error_massage"><?php echo $error_msg;?></div>
</form>

</body>
</html>
