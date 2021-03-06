<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>视频信息管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav col-sm-7">
        <li><a href="index.php">首页</a></li>
        <?php 
          include_once('./system/dbConn.php');
          connect();
          $sql="select * from videotype";
          $result=mysql_query($sql);
          while($row=mysql_fetch_assoc($result)) { 
        ?>
            <li>
            <a href="list.php?tid=<?php echo $row["tid"]; ?>"><?php echo $row["typename"]; ?></a>
            </li>

          <?php  
          }
          ?>
      </ul>

      <form class="navbar-form navbar-left" role="search" action="search.html">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
      <?php 
      session_start();
      if (isset($_SESSION["username"]) ) {//用户登录
       ?>
     <li><a href="#" data-toggle="modal" data-target="#login">欢迎 <?php echo $_SESSION["username"]; ?>访问本系统 </a></li>
     <li><a href="logout.php" >注销</a></li>
      <li><a href=" " >个人中心</a></li>
      <?php 
      } 
      else {//用户未登录
        ?>
          <li><a href="#" data-toggle="modal" data-target="#login">登录</a></li>
          <li><a href="#" data-toggle="modal" data-target="#reg">注册</a></li>
      <?php 
          }
      ?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- /.navbar -->
<!-- /注册模态框 -->
 <div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">请填写注册信息</h4>
      </div>
      <div class="modal-body">



      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="doUserReg.php">
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
        <label  class="col-md-2 control-label">性别</label>
        <div class="col-md-6">
        <label class="radio-inline">
        <input type="radio"  id="inlineRadio1" value="0" name="gender"> 男
      </label>
      <label class="radio-inline">
          <input type="radio"  id="inlineRadio2" value="1" name="gender"> 女
      </label>
      </div>
      </div>

      <div class="form-group">
        <label  class="col-md-2 control-label">生日</label>
        <div class="col-md-6">
          <input type="date" class="form-control" placeholder="生日" name="birthdate">
          </div>
        </div>

        <div class="form-group">
        <label  class="col-md-2 control-label">头像</label>
          <div class="col-md-6">
            <input type="file"  placeholder="头像" name="pic">
          </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-md-2 control-label">电子邮箱</label>
          <div class="col-md-6">
            <input type="email" class="form-control" id="inputEmail3" placeholder="电子邮箱" name="email">
          </div>
      </div>
   
    <div class="form-group">
      <div class="col-sm-offset-2  col-sm-10">
          <input type="submit" class="btn btn-default" value="注册" >
          <input type="reset" class="btn btn-default" value="重置" >
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
<!-- /注册模态框结束 -->
<!-- /登录模态框开始 -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">用户登录</h4>
      </div>
      <div class="modal-body">

        
    <form class="form-horizontal" method="post"  action="doUserLogin.php">
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
          <input type="submit" class="btn btn-default" value="登陆" >
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
<!-- /登录模态框结束 -->
