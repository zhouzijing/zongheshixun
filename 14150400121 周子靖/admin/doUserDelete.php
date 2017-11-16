<?php
  require_once('tpl/header.php');
?>
<?php 
//接收userList.php页面传来的参数uid。连接数据库，写sql语句删除users表中的指定用户
	$uid=$_GET["uid"];//接收参数
	 //数据库连接
    
    connect();
//先删除头像文件
    $sql0="select * from users where uid=$uid";
    $result0=mysql_query($sql0);
    $row0=mysql_fetch_assoc($result0);
    $filename="../images/".$row0["pic"];
    unlink($filename);


//删除users表中的用户信息
$sql="delete from users where uid=$uid";
$result=mysql_query($sql);
if ($result) {
    echo "删除成功，3秒后返回用户列表";
    header("refresh:3;url='userList.php'");
}else{
	echo "用户删除失败，3秒后回到用户列表列";
	header("refresh:3;url='userList.php'");
}

	 ?>
   


<?php
  require_once('tpl/footer.php');
?>