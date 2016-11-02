
<?php 
include('base.php');
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
$perNumber=13; //每页显示的记录数
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
  echo '<tr><td>';
  echo '<a href='.$row['url'].' target="_blank">'.$row['name'].'</td></a><td>'.$row['intro'].'</td><td>'.$row['type'].'</td>';
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
<li><a href="/tools/index.php?page=<?php echo $page - 1;?><?php if(isset($_GET['type'])){echo "&type=".$_GET['type'];}?>">上一页</a></li></a> <!--显示上一页-->
<?php
}
for ($i=1;$i<=$totalPage;$i++) {  //循环显示出页面
?>
<li><a href="/tools/index.php?page=<?php echo $i;?><?php if(isset($_GET['type'])){echo "&type=".$_GET['type'];}?>"><?php echo $i ;?></a></li>
<?php
}
if ($page<$totalPage) { //如果page小于总页数,显示下一页链接
?>
<li><a href="/tools/index.php?page=<?php echo $page + 1;?><?php if(isset($_GET['type'])){echo "&type=".$_GET['type'];}?>">下一页</a></li>
</ul>
<?php
} 
?>
</body>
</html>