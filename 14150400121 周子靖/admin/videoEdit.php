<?php
  require_once('tpl/header.php');
?>
<?php
$vid=$_GET["vid"]; 
connect();
$sql="select * from videos where vid=$vid";
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);

 ?>
 <h3>请填写新视频信息：</h3>
<form class="form-horizontal" method="post" enctype="multipart/form-data" action="doVideoUpdate.php">
<input type="hidden" name="vid" value=" <?php echo $row["vid"]; ?>">
  <div class="form-group">
    <label for="inputname3" class="col-sm-2 control-label">视频名称</label>
    <div class="col-sm-6">
      <input type="test" class="form-control" id="inputname3" name="videoname" placeholder="视频名称" value="<?php echo $row["videoname"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">视频类型</label>
    <div class="col-sm-6">
      <select class="form-control" name="type">
      <?php 
      $sql1="select * from videotype";
      $result1=mysql_query($sql1);
      while ($row1=mysql_fetch_assoc($result1)) {
      ?>
          <option value= "<?php echo $row1["tid"];?>" <?php if($row["tid"]==$row1["tid"]) { echo "selected"; }?>><?php echo $row1["typename"];?></option>

      <?php
      }
       ?>
     
      
<lect>
    </div>
  </div>
  
  <div class="form-group">
    <label  class="col-sm-2 control-label">视频海报</label>
    <div class="col-sm-6">
      <input type="file" name="pic"  placeholder="pic">
      原海报图片：<img src="../posters/<?php echo $row["pic"]; ?>" width=80,height=80,alt="" class="img-circle">
    </div>
  </div>

  <div class="form-group">
    <label  class="col-sm-2 control-label">视频简介</label>
    <div class="col-sm-6">
      <textarea class="form-control" rows="3" name="intro"> <?php echo $row["intro"]; ?></textarea>
    </div>
  </div>
  
   <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">下载地址</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="inputEmail3" name="address" placeholder="下载地址" value=" <?php echo $row["address"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-6">
      <input type="submit" class="btn btn-default" value="更新"></input>
    </div>
  </div>
</form>


<?php
  require_once('tpl/footer.php');
?>