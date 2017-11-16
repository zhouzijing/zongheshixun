<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
session_start();
require('./system/dbConn.php');
connect();
//接收表单元素的数据
$vid=$_POST["vid"];
$content=$_POST["content"];  //取得留言内容
//通过username取得uid
$username=$_SESSION["username"];
$sql="select * from users where uname='$username'";
$result=mysql_query($sql);//执行数据库
$row=mysql_fetch_assoc($result);//取结果集
$uid=$row["uid"];
$sql="insert into comments values (null,'$content',now(),$uid,$vid)";
$result=mysql_query($sql);
if($result){
	echo "留言添加成功，3秒后返回";
	header("refresh:3;url='show.php?vid=$vid'");
}else{
	echo "留言添加失败";
}
	 ?>
</body>
</html>