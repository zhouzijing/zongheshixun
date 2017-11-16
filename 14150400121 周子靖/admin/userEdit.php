<?php
  require_once('tpl/header.php');
?>


<?php 

    //页面访问权限判定
    session_start();
    //判定session中有没有管理员用的用户名信息，如果不存在就跳转到登录页
    if (!isset($_SESSION["adminname"])) {
    	header("location:index.php?msg=您没有权限，请登录后访问");

    }

//连接数据库，接收userList页面传来的uid参数，根据uid去数据库的users表中取得当前修改用户的旧的信息，把信息显示在下面的额表单里面

$uid=$_GET["uid"];//取得uid
 //数据库连接
    
    connect();
    $sql="select * from users where uid=$uid";
    $result=mysql_query($sql);
    $row=mysql_fetch_assoc($result);


 ?>
	<form action="doUserUpdate.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="uid" value="<?php echo $row["uid"]; ?>"></input>
		<table border="1">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" value="<?php echo $row["uname"]; ?>" readonly></td>
			</tr>
			<tr>
				<td>性别</td>
				<td><input type="radio" name="gender" value="0" <?php if ($row["gender"]=0){echo "checked";} ?>>男
				<input type="radio" name="gender" value="1" <?php if ($row["gender"]=1){echo "checked";} ?>>女</td>
			</tr>
			<tr>
				<td>生日</td>
				<td><input type="date" name="birthdate" value="<?php echo $row["birthdate"]; ?>"></td>
			</tr>
			<tr>
				<td>头像</td>
				<td><input type="file" name="pic">原头像:<img src="../images/<?php echo $row["pic"]; ?>" width="80" height="80"></td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td><input type="email" name="email" value="<?php echo $row["email"]; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="更新"></td>
			</tr>
		</table>
	</form>
<?php
  require_once('tpl/footer.php');
?>