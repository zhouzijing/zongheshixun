<?php
  require_once('tpl/header.php');
?>
 <?php
 connect(); 
 //当前页号
 if (!isset($_GET["page"])) {
  $page=1;
 }else{
  $page=$_GET["page"];
 }
$sql="select * from comments";
$result=mysql_query($sql);
//记录总数
 $totalrows=mysql_num_rows($result);//总数
$rowsperpage=5;//每页显示的数量
//共分了多少页
if ($totalrows%$rowsperpage==0) {
  $totalpages=$totalrows/$rowsperpage;
}else{
  $totalpages=ceil($totalrows/$rowsperpage);
}
$start=($page-1)*$rowsperpage;//每页起始记录编号
$sql2=$sql." limit $start,$rowsperpage";
$result2=mysql_query($sql2);//每页结果集
 ?>
<table class="table table-striped">
<caption>留言共 <?php echo $totalrows; ?>条</caption>
    <tr>
        <td>编号</td>
        <td>视频名称</td>
        <td>留言内容</td>
        <td>留言时间</td>
        <td>留言人</td>
        <td>操作</td>
    </tr>
    <?php 
        while ($row2=mysql_fetch_assoc($result2)) {//循环取得结果集中的每一条记录存储到关联数组中
 
     ?>
    <tr>
      <td><?php echo $row2["cid"]; ?></td>
       <td><?php 
        $vid=$row2["vid"];
      $sql1="select * from videos where vid=$vid";
      $result1=mysql_query($sql1);
      $row1=mysql_fetch_assoc($result1);
      echo $row1["videoname"]; ?></td>
        <td><?php echo $row2["content"]; ?></td>
        <td><?php echo $row2["cdate"]; ?></td>
        <td><?php 
        $uid=$row2["uid"];
        $sql4="select uname from users where uid=$uid";
        $result4=mysql_query($sql4);
        $row4=mysql_fetch_assoc($result4);
        echo $row4["uname"];?></td>

        <td><a href="doCommentDelete.php?cid=<?php echo $row2["cid"]; ?>"onclick="return confirm('确认要删除此留言吗?')">删除</a>
      </td>
    </tr>
    
<?php } ?>
</table> 

<h3 align="center">
<?php 
echo "共有".$totalrows."条记录，共分了".$totalpages."页"."&nbsp;";
//首页，上页的实现
if ($page==1) {
  echo "首页"."&nbsp;";
}else{
echo "<a href=?page=1>首页</a>"."&nbsp;";
}

if ($page==1) {
  echo "上一页"."&nbsp;";
}else{
echo "<a href=?page=".($page-1).">上一页</a>"."&nbsp;";
}
//第i页的超链接
for ($i=1; $i<=$totalpages ; $i++) { 
echo "<a href=?page=$i>第{$i}页</a>";
}

//尾页，下页的实现
if ($page==$totalpages) {
  echo "下一页"."&nbsp;";
}else{
echo "<a href=?page=".($page+1).">下一页</a>"."&nbsp;";
if ($page==$totalpages) {
  echo "尾页"."&nbsp;";
}else{
echo "<a href=?page=$totalpages>尾页</a>"."&nbsp;";
}


}
 ?>
</h3>

<?php
  require_once('tpl/footer.php');
?>