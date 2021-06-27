<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> 白嫖EPIC | 主页</title>
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<?php
// session_start();
// if($_SESSION['email']=="")
// {
//     Header("HTTP/1.1 303 See Other"); 

//     Header("Location: login.html"); 
    
//     exit; 
// }
//  ?>

<body onkeydown="keyLogin()">
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
    <?php include "link.php"?>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
         
        <?php  include "header.php" ?>
        <?php 
        $sql="select count(*) from user";
        $result = $mysqli->query($sql);
        while($row = $result->fetch_assoc()){
            $count=$row['count(*)'];
        }
        $sql="select count(*) from history";
        $result = $mysqli->query($sql);
        while($row = $result->fetch_assoc()){
            $gamecount=$row['count(*)'];
        }
        $sql="select gameid from history group by gameid having count(1) >1";
        $result = $mysqli->query($sql);
        $ec=$result->num_rows;
        $gamelist=$ec;
        ?>
        </nav>
        </div>
            <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                
                                <h5>总账户数</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id='all'><?php echo $count?></h1>
                             
                                <div class="stat-percent font-bold text-navy">个</div>
                                <small>&nbsp;</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                               
                                <h5>总领取的游戏共计</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id='ym'><?php echo $gamecount ?></h1>
                                <div class="stat-percent font-bold text-navy">个</div>
                                <small>&nbsp;</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                              
                                <h5>共领取了游戏</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins" id='wm'><?php echo $gamelist ?></h1>
                                <div class="stat-percent font-bold text-navy">个</div>
                                <small>&nbsp;</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                               
                                <h5>当前时间</h5>
                            </div>
                            <div class="ibox-content">
                                <b><h1 id="nowtime" class="no-margins" style='color:green'></h1></b>
                                <div class="stat-percent font-bold text-navy" id="next">下次领取：¿秒</div>
                                <small>&nbsp;</small>
                                
                            </div>
                        </div>
                 </div>        
            </div>
  
            <div class="ibox">
                    <div class="ibox-title">
                        <h5>详细记录查询</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        
                            
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                <div class="ibox-content collapse">
            输入完整账号查询所有领取历史(回车):<input type='text' id='email' class='form-control'>
        </div>
       
        <?php 
          function func_substr_replace($str, $replacement = "*", $start = 4, $length = 9)

          {
          $len = mb_strlen($str,"utf-8");
          
          if ($len > intval($start+$length)) {
          $str1 = mb_substr($str,0,$start,"utf-8");
          
          $str2 = mb_substr($str,intval($start+$length),NULL,"utf-8");
          
          } else {
          $str1 = mb_substr($str,0,1,"utf-8");
          
          $str2 = mb_substr($str,$len-1,1,"utf-8");
          
          $length = $len - 2;
          
          }

          $new_str = $str1;

          for ($i = 0; $i < $length; $i++) {
          $new_str .= $replacement;
          
          }

          $new_str .= $str2;

          return $new_str;

          }?>






        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>账号一览(不自动刷新)</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                          
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>账号</th>
                        <th>已领游戏数</th>
                        <th>地区</th>
                        <th>最后领取时间</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                        <?php 
                          


                        $sql="select * from user";
                    
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo " <tr class='gradeX'>";
                            echo "<td>".func_substr_replace($row['id'])."</td>";
                            $sqlcount="select count(*) from history where userid='".$row['id']."'";
                            $resulta = $mysqli->query($sqlcount);
                            while($rowa = $resulta->fetch_assoc()){
                                echo "<td>".$rowa['count(*)']."</td>";
                               
                            }

                            echo "<td>".$row['country']."</td>";

                            $sqltime="select max(time) from history where userid='".$row['id']."'";
                            $resulta = $mysqli->query($sqltime);
                            while($rowa = $resulta->fetch_assoc()){
                                echo "<td>".$rowa['max(time)']."</td>";
                               
                            }



                            echo " </tr>";
                        }
                        ?>
                 
                
                    
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
                
              
      <?php include "footer.php" ?>
       
    </div>
    




    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>
    <script>
    function getDate(){
    var myDate = new Date(); //实例化Date函数，获取日期等时间
    console.log(myDate)      //Wed Oct 16 2019 10:30:02 GMT+0800 (中国标准时间)
    myDate.getYear();        //获取当前年份(2位)
    myDate.getFullYear();    //获取完整的年份(4位,1970-????)
    myDate.getMonth();       //获取当前月份(0-11,0代表1月)
    myDate.getDate();        //获取当前日(1-31)
    myDate.getDay();         //获取当前星期X(0-6,0代表星期天)
    myDate.getTime();        //获取当前时间(从1970.1.1开始的毫秒数)
    myDate.getHours();       //获取当前小时数(0-23)
    myDate.getMinutes();     //获取当前分钟数(0-59)
    myDate.getSeconds();     //获取当前秒数(0-59)
    myDate.getMilliseconds();    //获取当前毫秒数(0-999)
    myDate.toLocaleDateString();     //获取当前日期
    var mytime=myDate.toLocaleTimeString();//获取当前时间
    $('#nowtime').text(`${mytime}`) //输出当前时间到页面，使用了ES6的模板字符串
}
getDate() //立即执行，让时间无延迟的加载入页面
setInterval(function(){     //定时器每秒调用一次getDate()，实现实时更新时间
    getDate();
},1000);

    </script>



<script>
       $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 6,
                bLengthChange:false,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                  
                ]

            });
          
        });

function keyLogin(){
    if (event.keyCode==13) //回车键的键值为13
    {
        if ($("#email").val()!=undefined || $("#email").val()!="")
        {
            window.location.href="detail.php?id="+$('#email').val()
        }
    }
}







    </script>
















<script>

      setInterval("warn()",2000);
      function warn() {
         $.ajax({
             url: 'api/getinfo.php',
           async:true,
           type: 'get',
             success: function (data) {
               console.log(data)
                 if(data!="")
                 {  
                     
                    data = data.split("|");
                    $("#next").fadeOut(100)
                    $("#next").fadeIn(1000)
                    if (parseInt(data[3])<3)
                    {
                        $("#next").html("领取中")
                    }else
                    {
                        $("#next").html("下次领取："+data[3]+"秒")
                    }
                   
                    console.log(data[3])

                    
                    if(parseInt($("#all").html())!=parseInt(data[0]) || parseInt($("#ym").html())!=parseInt(data[1]) || parseInt($("#wm").html())!=parseInt(data[2]) )
                    {
                    console.log($("#all").html())
                    console.log(data[0])
                    $("#all").fadeOut(100)
                    $("#all").fadeIn(1000)
                    
                    $("#all").html(data[0])
                    $("#ym").fadeOut(100)
                    $("#ym").fadeIn(1000)
                    $("#ym").html(data[1])

                    $("#wm").fadeOut(100)
                    $("#wm").fadeIn(1000)
                    $("#wm").html(data[2])

            
	             

                    }
                    
                   
                 }
        
             }
         })
     }


</script>

</body>
</html>
