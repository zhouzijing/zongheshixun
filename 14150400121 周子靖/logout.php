<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员注销</title>
</head>
<body>

</body>
</html>
<?php 
		session_start();
		session_destroy();//清空会话空间，清空所有已存出记录
		//header("location:index.php");//立即返回,后面是页面
		header("location:".$_SERVER['HTTP_REFERER']);//连接到当前页面的前一页面的地址
 ?>