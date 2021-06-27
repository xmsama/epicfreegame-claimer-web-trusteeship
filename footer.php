<div class="footer">
            <div class="float-right">
              <?php 
              $freestr="";
              include "api/conn.php";
              $sql="select * from free";
              $result = $mysqli->query($sql);

              while($row = $result->fetch_assoc()){
               $freestr=$freestr."《".$row['title']."》 ";
            }
              ?>
            </div>
            <div>
            <marquee style='color:red;font-size:15px' scrollamount=15 behavior=alternate direction=left align=middle>🔔本次免费游戏：<?php echo $freestr ?>🔔系统每两小时领取一次游戏 请注意添加账号的时间</marquee>
            </div>
        </div>