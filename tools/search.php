
<?php  
include('base.php');
$keyword=$_GET['keyword'];//获取输入框的内容  
if(!isset($_GET))
{
	header('Location:http://127.0.0.1/tools/test2.php');//无keyword进行跳转
}
$conn=mysqli_connect('127.0.0.1','root','');//数据库连接
mysqli_select_db($conn,"test");//选择数据库
$str = 'where name like "%'.addslashes($keyword).'%"';//搜索语句

$arr=array();
$perNumber=13; //每页显示的记录数
if(isset($_GET['page'])){
$page=$_GET['page']; //获得当前的页面值
}
$count=mysqli_query($conn,"select count(*) from artifact ".$str); //获得记录总数
$rs=mysqli_fetch_array($count); 
$totalNumber=$rs[0];
$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
if (!isset($page)) {
 $page=1;
} //如果没有值,则赋值1
$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录
$querystring = "select * from artifact ".$str." limit $startCount,$perNumber";//执行查询
$query=mysqli_query($conn,$querystring) or die('Not Found');//执行sql语句

while($row = mysqli_fetch_array($query))//循环输出
  {
  echo '<tr>';
  echo '<td><a href='.$row['url'].' target="_blank">'.$row['name'].'</td></a><td>'.$row['intro'].'</td><td>'.$row['type'].'</td>';//结果输出
  echo '<tr/>';
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
<li><a href="/tools/index.php?page=<?php echo $page + 1;?>if(isset($_GET['type'])){echo "&type=".$_GET['type'];}?>">下一页</a></li>
</ul>
<?php
} 
?>
</body>
</html>
