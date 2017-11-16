<?php
  require_once('tpl/header.php');
?>
<?php 
   
    
//接收表单元素
    $vid=$_POST["vid"];
    $videoname=$_POST["videoname"];
    $type=$_POST["type"];
    $intro=$_POST["intro"];
    $address=$_POST["address"];

    connect();
//文件上传

    if ($_FILES["pic"]["error"]>0) {
          switch ($_FILES["pic"]["error"]) {
            case '1':
              echo "文件尺寸超出了配置文件中设定的最大值"."<br>";
              break;
            case '3':
                echo "部分文件上传"."<br>";
                break;
            case '4':
                echo "没有选择新头像,";
                $sql="update videos set videoname='$videoname',tid=$type,intro='$intro',address='$address',uploaddate=now() where vid=$vid";
                break;
            default:
              echo "未知错误";
          }
      
    }else{
    $allowtype=array("jpg","jpeg","png","bmp","gif","ico","JPG","JPEG","BMP");
    $arr=explode(".", $_FILES["pic"]["name"]);
    $suffix=$arr[count($arr)-1];
    if (!in_array($suffix,$allowtype)) {
      echo "上传的文件类型不是图片类型"."<br>";
      exit;
      //die("上传的文件不是图片类型")；
    }
    //文件拷贝
    //文件重命名
    
    $newname=date("YmdHis").rand(100,999).".".$suffix;
    $filepath="../posters/";
        if(move_uploaded_file($_FILES["pic"]["tmp_name"],$filepath.$newname));
         {echo "图片已上传<br>";

         //图片删除
    $sql0="select * from videos where vid=$vid";
    $result0=mysql_query($sql0);
    $row0=mysql_fetch_assoc($result0);
    $filename="../posters/".$row0["pic"];
    unlink($filename);
     }

//编写选择新头像后的sql语句
        $sql="update videos set videoname='$videoname',tid=$type,intro='$intro',uploaddate=now(),address='$address',pic='$newname' where vid=$vid";
}


//执行sql
$result=mysql_query($sql);
if ($result) {
  echo "视频信息更新成功，3秒后跳转回视频信息列表列";
  header("refresh:3;url='videoList.php'");
}else{
  echo "视频信息更新失败";
  
}

   ?>

   


<?php
  require_once('tpl/footer.php');
?>