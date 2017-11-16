<?php
  require_once('tpl/header.php');
?>
<?php 
//接受所有表单元素的值。连接数据库。如果换头像需要重新上传，如果没有选择新头像，不需要上传操作。sql语句也要相应变化。

	 //数据库连接
   
    connect();
//接收表单元素
    $uid=$_POST["uid"];
    $username=$_POST["username"];
    $gender=$_POST["gender"];
    $birthdate=$_POST["birthdate"];
    $email=$_POST["email"];
//文件上传

		if ($_FILES["pic"]["error"]>0) {
          switch ($_FILES["pic"]["error"]) {
          	case '1':
          		echo "文件尺寸超出了配置文件中设定的最大值"."<br>";
          		break;
          	case '3':
          	    echo "部分文件上传"."<br>";
          	    break;
          	case '4':
          	    echo "没有选择新头像,";
          	    $sql="update users set uname='$username',gender=$gender,birthdate='$birthdate',email='$email' where uid=$uid";
          	    break;
          	default:
          		echo "未知错误";
          }
      
		}else{
		$allowtype=array("jpg","jpeg","png","bmp","gif","ico","JPG","JPEG","BMP");
		$arr=explode(".", $_FILES["pic"]["name"]);
		$suffix=$arr[count($arr)-1];
		if (!in_array($suffix,$allowtype)) {
			echo "上传的文件类型不是图片类型"."<br>";
			exit;
			//die("上传的文件不是图片类型")；
		}
		//文件拷贝
		//文件重命名
		
		$newname=date("YmdHis").rand(100,999).".".$suffix;
		$filepath="../images/";
        if(move_uploaded_file($_FILES["pic"]["tmp_name"],$filepath.$newname));
         {echo "图片已上传<br>";

         //图片删除
    $sql0="select * from users where uid=$uid";
    $result0=mysql_query($sql0);
    $row0=mysql_fetch_assoc($result0);
    $filename="../images/".$row0["pic"];
    unlink($filename);
     }

//编写选择新头像后的sql语句
        $sql="update users set uname='$username',gender=$gender,birthdate='$birthdate',email='$email',pic='$newname' where uid=$uid";
}


//执行sql
$result=mysql_query($sql);
if ($result) {
	echo "用户信息更新成功，3秒后跳转回用户列表列";
	header("refresh:3;url='userList.php'");
}else{
	echo "用户信息更新失败，3秒后跳转回用户列表列";
	header("refresh:3;url='userList.php'");
}

	 ?>

<?php
  require_once('tpl/footer.php');
?>