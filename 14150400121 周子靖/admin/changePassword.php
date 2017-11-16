<?php
  require_once('tpl/header.php');
  connect();
  $url=$_SERVER['HTTP_REFERER'];
?>


<!-- /修改密码模态框开始 -->
<div   tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span><tton>
        <h4 class="modal-title" id="myModalLabel">修改用户密码</h4>
      </div>
      <div class="modal-body">

<form class="form-horizontal" method="post"  action="./doChangePassword.php">

  <div class="form-group">
  
    <label for="inputname3" class="col-sm-3 control-label">用户名</label>
    <div class="col-sm-6">
      
      <input type="text" class="form-control" id="inputname3" name="username" placeholder="<?php echo @$_SESSION["username"]; ?>" readonly>
    </div>
    <input type="hidden" name="url" value="<?php echo $url; ?>">
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">新密码</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="inputPassword3" name="password1" placeholder="新密码">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">确认新密码</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="inputPassword3" name="password2" placeholder="密码">
    </div>
  </div>

  
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <input type="submit" class="btn btn-default" value="确认修改"></input>
      
    </div>
  </div>
</form>
</div>

      
    </div>
  </div>
</div>  
<!-- /修改密码模态框结束 -->




<?php
  require_once('tpl/footer.php');
?>