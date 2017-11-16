<?php
  require_once('tpl/header.php');
?>
<?php 
    connect();
  
    //sql
    $key=$_POST["search"];
    $sql="select * from videos where videoname like '%{$key}%'";
    $result=mysql_query($sql);

   
   

     ?>


    <form class="form-inline" action="userSearch.php" method="post">
  <div class="form-group">
    <label for="exampleInputName2">姓名</label>
    <input type="text" class="form-control" placeholder="username" name="search">
  </div>
  <button type="submit" class="btn btn-default">搜索</button>
</form>



	<table border="1" style="text-align:center" class="table table-hover">
	
		<tr>
			<th>视屏编号</th>
			<th>视屏名称</th>
			<th>视频类别</th>
			<th>视频海报</th>
			<th>添加时间</th>
			<th>操作</th>
		</tr>
		<?php 
        while ( $row=mysql_fetch_assoc($result)) {//循环取得结果集中的每一条记录存储到关联数组中
 
		 ?>
		<tr>
			<td><?php echo $row["vid"]; ?></td>
			<td><?php echo $row["videoname"]; ?></td>
			<td><?php echo $row["tid"]; ?></td>
			
            
            <td><img src="../posters/<?php echo $row['pic']; ?>" width="80" height="80" alt=""></td>

			<td><?php echo $row["uploaddate"]; ?></td>
			<td>
				<a href="videoEdit.php?vid=<?php echo $row["vid"]; ?>">修改</a>|
				<a href="dovideoDelete.php?vid=<?php echo $row["vid"]; ?>"onclick="return confirm('确认要删除此用户吗?')">删除</a>
			</td>
		</tr>
		
<?php } ?>

	</table>

   


<?php
  require_once('tpl/footer.php');
?>