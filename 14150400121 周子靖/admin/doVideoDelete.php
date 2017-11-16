<?php
  require_once('tpl/header.php');
?>
<?php 
connect();
$vid=$_GET["vid"];//接收参数
//先删除头像文件
    $sql0="select * from videos where vid=$vid";
    $result0=mysql_query($sql0);
    $row0=mysql_fetch_assoc($result0);
    $filename="../posters/".$row0["pic"];
    unlink($filename);
    
$sql="delete from videos where vid=$vid";
$result=mysql_query($sql);
if ($result) {
	echo "视频信息删除成功，3秒后返回列表页";
	header("refresh:3;url='videoList.php");
}else{
	echo "视频信息删除失败";
}
 ?>

   


<?php
  require_once('tpl/footer.php');
?>