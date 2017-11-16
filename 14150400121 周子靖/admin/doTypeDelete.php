<?php
  require_once('tpl/header.php');
?>
<?php 
connect();
$tid=$_GET["tid"];
$sql="delete from videotype where tid=$tid";
$result=mysql_query($sql);
if ($result) {
	echo "视频类型删除成功，3秒后返回列表页";
	header("refresh:3;url='typeList.php");
}else{
	echo "视频删除失败";
}
 ?>

   


<?php
  require_once('tpl/footer.php');
?>