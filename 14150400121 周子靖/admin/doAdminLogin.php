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
    
    require("../system/dbConn.php");
    connect();
//接收表单
    $adminname=@$_POST["adminname"];
    $password=@$_POST["password"];
//sql语句
    $sql="select * from admins where adminname='$adminname' and password=md5('$password')";
    $result=mysql_query($sql);//获取结果集
    $num=mysql_num_rows($result);//获取结果集中的条数
    if ($num==1) {
        session_start();//启动session
        $_SESSION["adminname"]=$adminname;//session中存储了管理员的名字
    	echo "登录成功，3秒后跳转到欢迎界面";
    	header("refresh:3;url='blank.php'");
    }else{
    	echo "登录失败，3秒后跳转到登录界面";
    	header("refresh:3;url='index.html'");
    }
	?>
</body>
</html>