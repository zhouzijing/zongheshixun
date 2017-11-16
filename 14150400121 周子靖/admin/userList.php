<?php
  require_once('tpl/header.php');
?>

<?php 
    connect();
  
    //sql
    $sql="select * from users";
    $result=mysql_query($sql);

    //统计用户数
    $totalrows=mysql_num_rows($result);
   

     ?>


    <form class="form-inline" action="userSearch.php" method="post">
  <div class="form-group">
    <label for="exampleInputName2">姓名</label>
    <input type="text" class="form-control" placeholder="username" name="search">
  </div>
  <button type="submit" class="btn btn-default">搜索</button>
</form>



	<table border="1">
	<caption>注册用户共 <?php echo $totalrows; ?>人</caption>
		<tr>
			<th>用户编号</th>
			<th>用户名</th>
			<th>性别</th>
			<th>生日</th>
			<th>头像</th>
			<th>邮箱</th>
			<th>操作</th>
		</tr>
		<?php 
        while ( $row=mysql_fetch_assoc($result)) {//循环取得结果集中的每一条记录存储到关联数组中
 
		 ?>
		<tr>
			<td><?php echo $row["uid"]; ?></td>
			<td><?php echo $row["uname"]; ?></td>
			<td><?php if ($row['gender']==1) {
        	echo "女";
             }else{
            echo "男";
             } ?></td>
			<td><?php echo $row["birthdate"]; ?></td>
            
            <td><img src="../images/<?php echo $row['pic']; ?>" width="80" height="80" alt=""></td>

			<td><?php echo $row["email"]; ?></td>
			<td>
				<a href="userEdit.php?uid=<?php echo $row["uid"]; ?>">修改</a>|
				<a href="doUserDelete.php?uid=<?php echo $row["uid"]; ?>"onclick="return confirm('确认要删除此用户吗?')">删除</a>
			</td>
		</tr>
		
<?php } ?>

	</table>


<?php
  require_once('tpl/footer.php');
?>