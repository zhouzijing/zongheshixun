<html>
<head>
	<meta charset="UTF-8">
	<title>处理管理员登录页</title>
</head>
<body>
	<h1>页面跳转成功</h1>
	<?php 
    //链接数据库，接收表单数据，写sql语句和数据库比对判定登陆成功还是失败，成功则跳转到欢迎界面，失败就重新回到登陆页
//连接数据库
    
    require('./system/dbConn.php');
    connect();
//接收表单
    $username=@$_POST["username"];
    $password=@$_POST["password"];
//sql语句
    $sql="select * from users where uname='$username' and password=md5('$password')";
    $result=mysql_query($sql);//获取结果集
    $num=mysql_num_rows($result);//获取结果集中的条数
    if ($num==1) {
        session_start();//启动session
        $_SESSION["username"]=$username;//session中存储了注册用户的名字
        if (isset($_POST["vid"])) {
        //留言登录链接
            $vid=$_POST["vid"];
            echo "登陆成功，3秒后返回详情页";
            header("refresh:3;url='show.php?vid=$vid'");
        }else{
            echo "登录成功，3秒后跳转到首页";
            header("refresh:3;url='index.php'");
        }
    	
    }else{
        if (isset($_POST["vid"])) {
        //留言登录链接
            $vid=$_POST["vid"];
            echo "登陆失败，3秒后返回详情页";
            header("refresh:3;url='show.php?vid=$vid'");
        }else{
            echo "登录失败，3秒后跳转到首页";
            header("refresh:3;url='index.php'");
        }
    }
	?>
</body>
</html>