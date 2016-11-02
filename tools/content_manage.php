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
 ?>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <!--表单模块-->
    <div class="artifact">
	<table class="table table-hover table-bordered">
   	<thead>
     	<tr>
       	<th>简介</th><th>用途</th><th>种类</th><th>操作</th>
     	</tr>
   	</thead>
   	<tbody>
<!--获得所有文章-->
<?php 
//连接数据库
$conn=mysqli_connect('127.0.0.1','root','');
mysqli_query($conn,'use test');
mysqli_query($conn,'set names utf8');

$str1='';//找到type值
if(!isset($_GET['type']))
{
  $str1='';//没传则赋值为空
}
else{
  $str1= " where type='".addslashes($_GET['type'])."'";//赋值给where子句
}
$perNumber=7; //每页显示的记录数
if(isset($_GET['page'])){
$page=$_GET['page']; //获得当前的页面值
}
$count=mysqli_query($conn,"select count(*) from artifact".$str1); //获得记录总数
$rs=mysqli_fetch_array($count); 
$totalNumber=$rs[0];
$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
if (!isset($page)) {
 $page=1;
} //如果没有值,则赋值1
$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录
$query=mysqli_query($conn,"select * from artifact".$str1." limit $startCount,$perNumber");//执行sql语句

while($row = mysqli_fetch_array($query))//循环输出
  {
  echo '<tr><center><td>';
  echo $row['name'].'</td><td>'.$row['intro'].'</td><td>'.$row['type'].'</td>';
  echo '<td><center><a class="btn btn-success" href=./change_content.php?name='.$row['name'].'>更改</a><a class="btn btn-danger" href=./delete.php?name='.$row['name'].'>删除</a></button></center></td>';

  echo '</tr>';
  }
  ?>
   </tbody> 
</table>

<!--翻页模块-->
<ul class="pager">
<?php
if (isset($page) and $page!=1) { //页数不等于1
?>
<li><a href="/tools/content_manage.php?page=<?php echo $page - 1;?><?php if(isset($_GET['type'])){echo "&type=".$_GET['type'];}?>">上一页</a></li></a> <!--显示上一页-->
<?php
}
for ($i=1;$i<=$totalPage;$i++) {  //循环显示出页面
?>
<li><a href="/tools/content_manage.php?page=<?php echo $i;?><?php if(isset($_GET['type'])){echo "&type=".$_GET['type'];}?>"><?php echo $i ;?></a></li>
<?php
}
if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
?>
<li><a href="/tools/content_manage.php?page=<?php echo $page + 1;?><?php if(isset($_GET['type'])){echo "&type=".$_GET['type'];}?>">下一页</a></li>
</ul>
<?php
} 
?>
</div>

</body>
</html>