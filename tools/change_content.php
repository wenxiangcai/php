<!--
        view模块
        更改文章
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
if(isset($_GET['name']))
{
    $conn=mysqli_connect('127.0.0.1','root','');
    mysqli_query($conn,'use test');
    mysqli_query($conn,'set names utf8');  
    $sql='select * from artifact where name="'.addslashes($_GET['name']).'"';
    $query=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query))//循环输出
    {
?>
<!--表单模块-->
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span>更改内容</strong></div>
  <div class="body-content">
  <form method="post" class="form-x" action="./check_change.php">
      <div class="form-group">
        <div class="label">
          <label>文章名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" value=<?php echo $row['name'];?> />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>文章链接：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="url" value=<?php echo $row['url'];?> />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>文章介绍：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="intro" value=<?php echo $row['intro'];?> />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>文章种类：</label>
        </div>
        <div class="field">
          <select class="form-control" name="type">
            <option >web</option>
            <option>hash</option>
            <option>提权</option>
            <option>内网</option>
            <option>字典</option>
            <option>ctf</option>
            </select>
        </div>
    <input type="hidden" name="id" value=<?php echo $row['id'];?>>

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php

}

}
?>
</body>
</html>