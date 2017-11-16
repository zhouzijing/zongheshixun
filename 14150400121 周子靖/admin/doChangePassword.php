<?php
  require_once('tpl/header.php');
?>
<?php 
connect();
$password1=$_POST["password1"];
$password2=$_POST["password2"];
$username=$_SESSION['username'];
$url=$_POST["url"];


if ($password1==$password2) {
	$sql="update users set password=md5('$password1') where uname='$username'";
	$result=mysql_query($sql);
	if ($result) {
		          echo "密码修改成功,马上返回···";
		         header("refresh:2;url=$url");
 
		          //返回到上一页
	             }else{echo "密码修改失败,马上返回···"; 
               header("refresh:2;url=$url");

                      }
                            }else{echo "两次输入密码不一样！！！马上返回···"; 
                     header("refresh:2;url=$url");

                                 }

 ?>


<?php
  require_once('tpl/footer.php');
?>