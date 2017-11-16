<?php
  require_once('tpl/header.php');
?>
<?php 
connect();
$tid=$_POST["tid"];
$typename=$_POST["typename"];
$sql="update videotype set typename='$typename' where tid=$tid";
$result=mysql_query($sql);
if ($result) {
	echo "视频类型修改成功，3秒后返回列表页";
	header("refresh:3;url='typeList.php");
}else{
	echo "视频修改失败";
}
 ?>
   


<?php
  require_once('tpl/footer.php');
?>