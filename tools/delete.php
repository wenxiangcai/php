<!--
        model模块
    代入数据库删除文章
-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" type="text/css" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<!--未授权访问检测-->
<?php 

if($_COOKIE['admin']!=md5('Doggy574dAd'))
{
	header("Location:./admin.php");
}
if(isset($_GET['name']))
{
	$name=$_GET['name'];
	$conn=mysqli_connect('127.0.0.1','root','');
	mysqli_query($conn,'use test');
	mysqli_query($conn,'set names utf8');
	$sql='delete from artifact where name="'.$_GET['name'].'"';
	mysqli_query($conn,$sql) or die("数据库请求错误");
	if(mysqli_affected_rows($conn)>=1)
	{
		echo '<a href="./content_manage.php"><p align=center>删除成功，如果你的浏览器没有跳转成功，点击这里</p></a>';
    echo  '<script>setTimeout(function(){window.location.href="./content_manage.php";},1000)</script>';
	}
	else
	{
		echo '<a href="./content_manage.php"><p align=center>对不起，删除失败，，如果你的浏览器没有跳转成功，点击这里</p></a>';
    echo  '<script>setTimeout(function(){window.location.href="./content_manage.php";},1000)</script>';
	}
}




 ?>

</body>
</html>