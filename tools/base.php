<!DOCTYPE html>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
<title>收集的一些东西</title>
<link rel="stylesheet" type="text/css" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" />
<!--导入jquery模块-->
<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.min.js"></script>
</head>
<body>

<!--导航栏-->
<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">
 　<div class="navbar-header">
    <a class="navbar-brand" href="/tools/index.php">收集的东西</a>
   </div>
      <ul class="nav navbar-nav">
<!--导航栏核心-->
<?php 
$conn=mysqli_connect('127.0.0.1','root','');//数据库连接
mysqli_select_db($conn,"test");//选择数据库
$hash='select count(*) from artifact where type="hash"';
$tiquan='select count(*) from artifact where type="提权"';
$dict='select count(*) from artifact where type="字典"';
$inlan='select count(*) from artifact where type="内网"';
$web='select count(*) from artifact where type="web"';
$ctf='select count(*) from artifact where type="ctf"';
$arr = array();
array_push($arr,$hash,$tiquan,$dict,$inlan,$web,$ctf);//搜索语句放入数组
foreach ($arr as $key => $value) {

    $query=mysqli_query($conn,$value);//执行sql语句
    while($row = mysqli_fetch_array($query))
  {
  $re=preg_match('/type="(.*)"/',$value,$match);//匹配type
  $active='active';
  echo '<li><a href="/tools/index.php?type='.$match[1].'">'.$match[1].'['.$row[0].']'.'</a></li>';//打印输出
  }
}
?>
</ul>

<!--搜索模块-->
 <form class="navbar-form navbar-left" rol="search"  method="GET"  action="search.php">
 <div class="form-group">
  <input type="text" class="form-control" placeholder="请输入关键词" name="keyword"/>
 </div>
 <button type="submit" class="btn btn-default" id="button">搜索</button>
 </form>
</div>
</nav>

<!--表单模块-->
<div class="artifact">
<table class="table table-hover table-bordered">
   <thead>
     <tr>
       <th>简介</th><th>用途</th><th>种类</th>
     </tr>
   </thead>
   <tbody>
