<?php
  require_once('tpl/header.php');
?>
<?php 
connect();

$cid=$_GET["cid"];//接收参数
  
$sql="delete from comments where cid=$cid";
$result=mysql_query($sql);
if ($result) {
	echo "留言息删除成功，3秒后返回列表页";
	header("refresh:3;url='commentList.php");
}else{
	echo "留言信息删除失败";
}
 ?>

   


<?php
  require_once('tpl/footer.php');
?>