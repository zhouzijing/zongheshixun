<?php
require_once('tpl/head.php');//页头
include_once('./system/dbConn.php');
?>
<?php 
connect();
$tid=$_GET["tid"];
$sql1="select * from videos where tid=$tid"; //取当前栏目下的所有视频
$result1=mysql_query($sql1);

$sql3="select * from videos where tid=$tid order by hittimes desc limit 4";//去点击量最多的四个
$result3=mysql_query($sql3);
 ?>

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row">


                <div class="col-xs-12 col-lg-12 mlist">
                    <h2><?php 
                    $sql2="select * from videotype where tid=$tid";
                    $result2=mysql_query($sql2);
                    $row2=mysql_fetch_assoc($result2);
                    echo $row2["typename"];
                     ?>专栏</h2>
                    <ul class="list-inline row text-center">
                    <?php 
while ($row1=mysql_fetch_assoc($result1)) {
   ?>
                        <li class="col-xs-6 col-lg-3">
                            <img src="./posters/<?php echo $row1["pic"] ?>" class="responsive img-thumbnail"/>

                            <p><a href="show.php?vid=<?php echo $row1["vid"] ?>"><?php echo $row1["videoname"]; ?></a>
                            </p>
                        </li>
   <?php
}
                     ?>
                        
                    </ul>
                    <nav class="text-center">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>


                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group text-center" >
                <h2 style="color:white;"><?php 
                    $sql2="select * from videotype where tid=$tid";
                    $result2=mysql_query($sql2);
                    $row2=mysql_fetch_assoc($result2);
                    echo $row2["typename"];
                 ?>排行</h2>
                <ul class="list-inline row text-center">
                <?php 
                    while ($row3=mysql_fetch_assoc($result3)) {

                ?>
                        <li class="col-xs-12 col-lg-6">
                        <img src="./posters/<?php echo $row3["pic"]; ?>" class="responsive img-thumbnail"/>

                        <p><a href="show.php?vid=<?php echo $row3["vid"] ?>"><?php echo $row3["videoname"]; ?></a>
                        </p>
                    </li> 
                <?php 
                    }
                ?>

                </ul>
            </div>

        </div>
        <!--/.sidebar-offcanvas-->
    </div>
    <!--/row-->

    

</div>
<!--/.container-->
<?php
require_once('tpl/foot.php');
?>