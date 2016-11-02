<!--
        model模块
    代入数据库更改文章
-->
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" type="text/css" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<!--防止未授权访问-->
<?php
if(!isset($_COOKIE['admin']))
{
  //跳转admin.php验证
  header("Location:./admin.php");
}
else{
    $conn=mysqli_connect('127.0.0.1','root','');
    mysqli_query($conn,'use test');
    mysqli_query($conn,'set names utf8');
    $sql='update artifact set name="'.$_POST['name'].'",intro="'.$_POST['intro'].'",url="'.$_POST['url'].'",type="'.$_POST['type'].'" where id="'.$_POST['id'].'"';
    mysqli_query($conn,$sql) or die("数据库查询出错");
    if(mysqli_affected_rows($conn)==1)
    {
    echo '<a href="./add_content.php"><p align=center>更改成功，如果你的浏览器没有跳转成功，点击这里</p></a>';
    echo  '<script>setTimeout(function(){window.location.href="./content_manage.php";},1000)</script>';
    }
else
    {
    echo '<a href="./add_content.php"><p align=center>更改失败，如果你的浏览器没有跳转成功，点击这里返回</p></a>';
     echo  '<script>setTimeout(function(){window.location.href="./content_manage.php";},1000)</script>';
    }
}
    
?>