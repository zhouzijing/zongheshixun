<?php
  require_once('tpl/header.php');
?>
<?php 

connect();
$typename=$_POST["typename"];
$sql="insert into videotype values (null,'$typename')";
$result=mysql_query($sql);
if($result){
	echo "视频类型添加成功，3秒返回添加页可以继续添加";
	header("refresh:3;url='typeAdd.php'");
}else{
	echo "视频添加失败";
}
 ?>



<?php
  require_once('tpl/footer.php');
?>