<?php
  require_once('tpl/header.php');
?>
<?php 
connect();
$sql="select * from videotype";
$result=mysql_query($sql);
 ?>
  <table class="table table-hover">
  	<tr>
  		<th>编号</th>
  		<th>视频类型名称</th>
  		<th>操作</th>
  	</tr>
  	<?php 
while ($row=mysql_fetch_assoc($result)) {
  	 ?>
  	 <tr>
  	 	<td><?php echo $row["tid"]; ?></td>
  	 	<td><?php echo $row["typename"]; ?></td>
  	 	<td>
  	 		<a href="typeEdit.php?tid=<?php echo $row["tid"]; ?>">修改</a> | <a href="doTypeDelete.php?tid=<?php echo $row["tid"]; ?>"onclick="return confirm('确认要删除此用户吗?')">删除</a>
  	 	</td>
  	 </tr>
  	 <?php 
}
  	  ?>
  </table>


<?php
  require_once('tpl/footer.php');
?>