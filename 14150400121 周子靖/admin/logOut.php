<html>
<head>
	<meta charset="UTF-8">
	<title>管理员注销</title>
</head>
<body>
<?php 
//页面访问权限判定
    session_start();
    //判定session中有没有管理员用的用户名信息，如果不存在就跳转到登录页
    if (!isset($_SESSION["adminname"])) {
    	header("location:index.php?msg=您没有权限，请登录后访问");}
 ?>
</body>
</html>
<?php 
session_start();
session_destroy();//清空会话空间，清空所有已存储的session数据
header("location:index.php");

 ?>