<?php
  require_once('tpl/header.php');
?>
<h3>请填写视频名称</h3>
<?php 
connect();
$tid=$_GET["tid"];
$sql="select * from videotype where tid=$tid";
$result=mysql_query($sql);//结果集
$row=mysql_fetch_assoc($result);//关联数组
 ?>
 
<form class="form-inline" method="post" action="doTypeUpdate.php" method="post">
<input type="hidden" name="tid" value="<?php echo $row["tid"]; ?>"><!-- 隐藏元素 -->
  <div class="form-group">
    <label for="exampleInputName2">视频类型名称</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="视频类型名称" name="typename" value="<?php echo $row["typename"]; ?>">
  </div>
  
  <input type="submit" value="更新" class="btn btn-default">
</form>

   


<?php
  require_once('tpl/footer.php');