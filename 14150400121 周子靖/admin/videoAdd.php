<?php
  require_once('tpl/header.php');
?>
<?php 
connect();
$sql="select * from videotype";
$result=mysql_query($sql);
 ?>

 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="dovideoAdd.php">
      <div class="form-group">
        <label for="inputname3" class="col-md-2 control-label">视频名称</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="inputname3" placeholder="视频名称" name="videoname">
          </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-md-2 control-label">视频类型</label>
          <div class="col-md-6">
            <select class="form-control" name="type">
  				<?php 
  					while ($row=mysql_fetch_assoc($result)) {

  				?>

  				<option value=" <?php echo $row["tid"]; ?> "><?php echo $row["typename"]; ?></option>
  				<?php 
  					}
				?>

			</select>
          </div>
      </div>

		<div class="form-group">
        <label  class="col-md-2 control-label">视频海报</label>
          <div class="col-md-6">
            <input type="file"  placeholder="视频海报" name="pic">
          </div>
      </div>

      <div class="form-group">
        <label  class="col-md-2 control-label">视频简介</label>
        <div class="col-md-6">
          <textarea class="form-control" rows="5" name="intro"></textarea>
          </div>
        </div>

        

      <div class="form-group">
        <label for="inputEmail3" class="col-md-2 control-label">下载地址</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="inputEmail3" placeholder="下载地址" name="address">
          </div>
      </div>
   
    <div class="form-group">
      <div class="col-sm-offset-2  col-sm-10">
          <input type="submit" class="btn btn-default" value="添加" >
          <input type="reset" class="btn btn-default" value="重置" >
      </div>
    </div>
  </form>

   


<?php
  require_once('tpl/footer.php');
?>