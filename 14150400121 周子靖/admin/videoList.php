<?php
  require_once('tpl/header.php');
?>

<?php 
    connect();
  
    //sql
    $sql="select * from videos";
    if(isset($_GET["key"])){
      $key=trim($_GET["key"]);
      $sql=$sql." where videoname like '%{$key}%";
    }
    $result=mysql_query($sql);//结果集

    $totalrows=mysql_num_rows($result);
     ?>


    <form class="form-inline" action="videoSearch.php" method="post">
  <div class="form-group">
    <label for="exampleInputName2">视频名称</label>
    <input type="text" class="form-control" placeholder="videoname" name="search">
  </div>
  <button type="submit" class="btn btn-default">搜索</button>
</form>

  <table border="1">
    <tr>
      <th>视频编号</th>
      <th>视频名称</th>
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
      <td><?php 
      $tid=$row["tid"];
      $sqlt="select * from videotype where tid=$tid";
      $result1=mysql_query($sqlt);
      $row1=mysql_fetch_assoc($result1);
      echo $row1["typename"];
      ?></td>    
      <td><img src="../posters/<?php echo $row['pic']; ?>" width="80" height="80" alt="" title="<?php echo $row["intro"]; ?>" class="img-rounded"></td>
      <td><?php echo $row["uploaddate"]; ?></td>
      <td>
        <a href="videoEdit.php?vid=<?php echo $row["vid"]; ?>">修改</a>|
        <a href="doVideoDelete.php?vid=<?php echo $row["vid"]; ?>"onclick="return confirm('确认要删除此用户吗?')">删除</a>
      </td>
    </tr>
    
<?php } ?>

  </table>


<?php
  require_once('tpl/footer.php');
?>