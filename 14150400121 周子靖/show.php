<?php
require_once('tpl/head.php');//页头
include_once('./system/dbConn.php');
?>
<?php 
connect();
$vid=$_GET["vid"];

$sql="select * from videos where vid=$vid";//信息栏
$result=mysql_query($sql);
$row=mysql_fetch_assoc($result);

//更新点击量
$hit=$row["hittimes"];
$sql1="update videos set hittimes=$hit+1 where vid=$vid";
mysql_query($sql1);

$tid=$row["tid"];//取得专栏名称
$sql2="select * from videotype where tid=$tid";
$result2=mysql_query($sql2);
$row2=mysql_fetch_assoc($result2);
 ?>

<!-- /视频详情页的登录模态框开始 -->
<div class="modal fade" id="login1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">用户登录1</h4>
      </div>
      <div class="modal-body">

        
    <form class="form-horizontal" method="post"  action="doUserLogin.php">
    <input type="hidden" name="vid" value="<?php echo $vid; ?>">
      <div class="form-group">
        <label for="inputname3" class="col-md-2 control-label">用户名</label>
          <div class="col-md-6">
            <input type="text" class="form-control" id="inputname3" placeholder="用户名" name="username">
          </div>
      </div>

      <div class="form-group">
        <label for="inputPassword3" class="col-md-2 control-label">密码</label>
          <div class="col-md-6">
            <input type="密码" class="form-control" id="inputPassword3" placeholder="密码" name="password">
          </div>
      </div>

     
    <div class="form-group">
      <div class="col-sm-offset-2  col-sm-10">
          <input type="submit" class="btn btn-default" value="登录" >
      </div>
    </div>
  </form>





      </div>
      <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="location.replace('index.php')" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>  
<!-- /详情页的登录模态框结束 -->

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-12">


            <div class="row box">
                <div class="col-lg-4 text-center">
                   <video width="100%" height="345px" controls="controls" poster="./posters/<?php echo $row["pic"]; ?>">
                        <source src="<?php echo $row["address"]; ?>" type="video/mp4">
                        </source>
                    </video>
                    
                    <p><?php echo $row["videoname"]; ?></p>

                </div><!--放视频海报和标题-->
                <div class="col-lg-8 text-center">

<table class="table table-hover">
    <tr><!--行-->
        <td>所属专栏</td><!--列-->
        <td><?php echo $row2["typename"]; ?></td>
    </tr>
    <tr>
        <td>上传时间</td>
        <td><?php echo $row["uploaddate"]; ?></td>
    </tr>
    <tr>
        <td>点击次数</td>
        <td><?php echo $row["hittimes"]; ?></td>
    </tr>
    <tr>
        <td>上传人</td>
        <td><?php echo $row["uploadadmin"]; ?></td>
    </tr>
    <tr>
        <td>下载次数</td>
        <td><?php echo $row["downtimes"]; ?></td>
    </tr>
    <tr>
        <td>有事找站长</td>
        <td><a href="mailto:1905596358@qq.com">意见箱</a></td>
    </tr>
</table>
                </div><!--表格显示视频详细信息-->


            </div>
            <!--/row-->
            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">内容简介

                    </h2>

                 <?php echo $row["intro"]; ?>
                </div>
            </div>  <!--/row-->

            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">留言列表

                    </h2>
<?php 
$sql3="select * from comments where vid=$vid";
$result3=mysql_query($sql3);
 ?>
<table class="table table-striped">
    <tr>
        <td>编号</td>
        <td>留言内容</td>
        <td>留言时间</td>
        <td>留言人</td>
    </tr>
    <?php 
while ($row3=mysql_fetch_assoc($result3)) {
    ?>
    <tr>
        <td><?php echo $row3["cid"]; ?></td>
        <td><?php echo $row3["content"]; ?></td>
        <td><?php echo $row3["cdate"]; ?></td>
        <td><?php $uid=$row3["uid"];
        $sql4="select uname from users where uid=$uid";
        $result4=mysql_query($sql4);
        $row4=mysql_fetch_assoc($result4);
        echo $row4["uname"];?></td>
    </tr>
    <?php
}
     ?>
</table>
                </div>
            </div>  <!--/row-->

<div class="row box">

<?php 
if (isset($_SESSION["username"])) {
?>
 <div class="col-lg-12">
                    <h2 class="intro-text text-center">留言版 </h2>


<form class="form-horizontal" method="post" action="doCommentAdd.php">
<input type="hidden" name="vid" value="<?php echo $vid; ?>">
   <div class="form-group">
        <div class="col-md-12">
          <textarea class="form-control" rows="3" name="content"></textarea>
          </div>
   </div>
   <div class="form-group">
      <div class="col-md-12">
          <input type="submit" class="btn btn-default" value="发表" >
      </div>
    </div>
</form> 
 </div>
<?php  
}else{

?> 
<div class="col-md-12">
<h2>请<a href="#" data-toggle="modal" data-target="#login1">登录</a>后留言</h2>
</div>
<?php
 }
 ?>
            </div>  <!--/row-->

        </div>
        <!--/.col-xs-12.col-sm-12-->

       
    </div>
    <!--/row-->

    

</div>
<!--/.container-->
<?php
require_once('tpl/foot.php');
include_once('./system/dbConn.php');
?>
