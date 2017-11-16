<?php
  require_once('tpl/header.php');
?>
<h3>请填写视频名称</h3>
<form class="form-inline" method="post" action="doTypeAdd.php">
  <div class="form-group">
    <label for="exampleInputName2">视频类型名称</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="视频类型名称" name="typename">
  </div>
  
  <input type="submit" value="添加" class="btn btn-default">
</form>

<?php
  require_once('tpl/footer.php');
?>