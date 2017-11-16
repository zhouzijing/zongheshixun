<?php
  require_once('tpl/header.php');
?>
<?php 

connect();//调用函数
$vname=$_POST["videoname"];
$type=$_POST["type"];
$intro=$_POST["intro"];
$address=$_POST["address"];

$sql1="select * from videotype where tid='$type'";
$result1=mysql_query($sql1);
$row=mysql_fetch_assoc($result1);
$tid=$row["tid"];

session_start();
$adminname=$_SESSION["adminname"];

if ($_FILES["pic"]["error"]>0) {
		switch ($_FILES["pic"]["error"]) {
			case '1':echo "文件尺寸超出配置文件设定的最大值"."<br>";break;
			case '3':echo "部分文件上传"."<br>";break;
			case '4':echo "没有文件上传"."<br>";break;
			default:echo "未知错误";break;
		}
	}
	//var_dump($_FILES);//二维数组

	//文件类型判定
	$allowtype=array("jpg","jpeg","png","bmp","gif","ico","JPG","JPEG","BMP");
	$arr=explode("."/*以什么为依据分割*/, $_FILES["pic"]["name"]/*分割谁*/);
	$suffix=$arr[count($arr)-1];//文件最后一个点
	if (!in_array($suffix,$allowtype)/*是否在数组里*/) {
		echo "上传文件不是图片类型"."<br>";
		exit;//程序提前结束
	}


	//文件拷贝
	//文件重命名
	$newname=date("YmdHis").rand(100,999).".".$suffix;//时间默认为别的时区，到PHP.ini中搜索timezong更改为PRC
	$filepath="../posters/";
	if (move_uploaded_file($_FILES["pic"]["tmp_name"]/*从哪拷贝*/, $filepath.$newname/*拷贝到哪*/)) {
		echo "海报已上传"."<br>";
	}


$sql="insert into videos values(null,'$vname','$tid','$newname','$intro',now(),'$adminname',0,0,'$address')";
$result=mysql_query($sql);
if ($result) {
	echo "视频信息添加成功，三秒后返回列表。";
	header("refresh:3;url='videoAdd.php'");
}
else{
	echo "视频信息添加失败";
}
 

 ?>
   


<?php
  require_once('tpl/footer.php');
?>