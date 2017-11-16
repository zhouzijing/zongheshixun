<html>
<head>
	<meta charset="UTF-8">
	<title>用户注册处理页面</title>
</head>
<body>
	<h1>用户注册处理页面跳转成功</h1>
	<?php 
   

  
 //数据库连接
    require("./system/dbConn.php");
    connect();
       $username=$_POST["username"];
       $password=$_POST["password"];
       $gender=$_POST["gender"];
       $birthdate=$_POST["birthdate"];
       $pic=$_POST["pic"];
       $email=$_POST["email"];
       //echo "您的用户名是：".$username."<br>";
       //echo "您的密码是：".$password."<br>";
       //if($gender==0)
			//echo "您的性别是：男<br>";
		//else
			//echo "您的性别是：女<br>";
		//echo "您的生日是：".$birthdate."<br>";
		//echo "您的头像是：".$pic."<br>";
		//echo "您的邮箱是：".$email."<br>";
		//var_dump($_POST);
		//文件上传
		//文件上传错误判定
        
        //判定用户名重名
        $sql0="select * from users where uname='$username'";
        $result0=mysql_query($sql0);//查询到的结果集
        $num0=mysql_num_rows($result0);//返回结果集中的记录行数
        if ($num0!=0) {
        	echo "用户名已被注册,请重新填写!!!";
        	header("refresh:3;url='userReg.html'");
        	exit;
        }else{


		if ($_FILES["pic"]["error"]>0) {
          switch ($_FILES["pic"]["error"]) {
          	case '1':
          		echo "文件尺寸超出了配置文件中设定的最大值"."<br>";
          		break;
          	case '3':
          	    echo "部分文件上传"."<br>";
          	    break;
          	case '4':
          	    echo "没有上传";
          	    break;
          	default:
          		echo "未知错误";
          }
		}

		//var_dump($_FILES);
		//文件类型的判定
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
		$filepath="./images/";
        if(move_uploaded_file($_FILES["pic"]["tmp_name"],$filepath.$newname));
         echo "图片已上传<br>";

    //编写SQL
         $sql="insert into users values (null,'$username',md5('$password'),$gender,'$birthdate','$newname','$email')";

         $result=mysql_query($sql);//执行sql
         if ($result) {
         	echo "注册成功!!!";
         	//header("refresh:3;url='userReg.html'");//页面跳转
         }else{
         	echo "注册失败!!!";

         }

     }//end of 重名的else


	 ?>
</body>
</html>