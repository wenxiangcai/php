<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>  
    <link rel="stylesheet" type="text/css" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
<!--更改验证码-->
<script type="text/javascript">
    function changing(){
    document.getElementById('code').src="captcha.php?"+Math.random();
} 
</script>
<style type="text/css">
    .alert{
        margin-bottom: 0px;
    }

</style>
</head>

<!--主体-->
<body>
<div class="bg" ></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">           
            </div>         
        <!--表单登陆-->
            <form action="check_login.php" method="post">
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>管理登陆</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="username" placeholder="登录账号" data-validate="required:请填写账号" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="password" placeholder="登录密码" data-validate="required:请填写密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input input-big" name="validatecode" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />

        <!--验证码模块,需要自己更改-->
                           <img src="captcha.php" id="code" class="passcode" style="height:43px;cursor:pointer;" onclick="changing()">                        
                        </div>
                    </div> 
                    <?php 
                        include('check_login.php');
                        if(isset($_GET['validatecode']))
                        {
                            $error_msg="验证码错误";
                        }
                        if(isset($_GET['error']))
                        {
                            $error_msg="用户名或密码错误";
                        }
                        if(isset($error_msg))
                        {
                        echo '<div class="alert alert-danger alert-dismissable" id="alert" role="alert">';
                        echo '<button class="close" type="button" data-dismiss="alert"></button>'.$error_msg;
                        echo '</div>'; 
                        }
                         ?>     
                </div>

                <div style="padding:30px;"><input type="submit" class="button button-block bg-main text-big input-big" value="登录"></div>
            </div>
            </form>  
            
        </div>
    </div>
</div>

</body>
</html>