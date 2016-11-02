<!--
       view模块
    添加文章功能选项
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
?>
<!--表单模块-->
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 添加内容</strong></div>
  <div class="body-content">
  <form method="post" class="form-x" action="./check_add.php">
      <div class="form-group">
        <div class="label">
          <label>文章名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="name" value="" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>文章链接：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="url" value="" />
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>文章介绍：</label>
        </div>
        <div class="field">
          <input type="text" class="input" name="intro" value="" />
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>文章种类：</label>
        </div>
        <div class="field">
          <select class="form-control" name="type">
            <option>web</option>
            <option>hash</option>
            <option>提权</option>
            <option>内网</option>
            <option>字典</option>
            <option>ctf</option>
            </select>
        </div>
      </div>

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
</body>
</html>