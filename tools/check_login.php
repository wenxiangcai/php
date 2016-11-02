<!--
        model模块
     校验登录功能选项
-->
<?php 
session_start();
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['validatecode']))
{
$username = addslashes($_POST['username']);//获得用户名
$pass = md5($_POST['password']); //获得密码
$validatecode = $_POST['validatecode'];//获得验证码  

	$conn=mysqli_connect('127.0.0.1','root','');//数据库连接
	mysqli_select_db($conn,"test");//选择数据库
	//验证码校验
	if(md5($validatecode) != $_SESSION['validatecode'])
	{	
		header("Location:./admin.php?validatecode=error");
	}
	else{
		//用户名密码校验
		$str = "select name,passhash from admin where name='".$username."' and passhash='".$pass."'";
		$query = mysqli_query($conn,$str) or die('Not Found');
		//校验成功
		if($result = mysqli_fetch_array($query)){
			setcookie('admin',md5('Doggy574dAd'));

			header("Location:./manage.php");
		}
		else {
			header("Location:./captcha.php?+Math.random()");
			header("Location:./admin.php?error=error");
		}
		//校验失败
	}
}
?>