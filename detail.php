<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>白嫖EPIC | 详细查询</title>
 <!-- Toastr style -->
 <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/base.css" rel="stylesheet"/>
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        table td{
            text-align: center;  /*设置文字水平居中*/
            
            vertical-align: middle!important;  /*设置文字垂直居中*/
        }
        </style>
        

</head>

<body>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
    <?php include "link.php"?>
    </nav>
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
          
        </div>
        <?php  include "header.php" ?>
        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>领取记录</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">主页</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>领取记录</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <?php 
            if (!isset($_GET['id']))
            {
                
                die("<script>alert('请输入账号后查询');window.location.href='index.php'");
            }
            ?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>领取记录</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-bordered table-hover dataTables-example" style="text-align:center">
                    <thead>
                    <tr>
                       
                        <th>账号</th>
                        <th>游戏名</th>
                        <th>游戏id</th>
                        <th>领取时间</th>
                      
                  
                    </tr>
                    </thead>
                    <tbody>

                    <?php 



                       $sql="select * from history where userid='".$_GET['id']."'";
                       
                       $result = $mysqli->query($sql);
                       while($row = $result->fetch_assoc()){
                        echo " <tr class='gradeC'>";
                        echo "<td>".$row['userid']."</td>";  
                        echo "<td>".$row['title']."</td>";  
                         echo "<td>".$row['gameid']."</td>";
                        echo "<td>".$row['time']."</td>"; 
                     
                     
                           echo "</tr>";
                     
                       }
                           
                       
                    ?>
                   
                    
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php include "footer.php"?>
      

        </div>
        </div>


        <div id="modal-form" class="modal fade" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="ibox ">
                        <div class="ibox-title">
                            <h5>设备详情（双击编辑货架或误差）</h5>
                        </div>
                        <div>
                            <div class="ibox-content profile-content">
                                <h4><strong id='sensorid'></strong></h4>
                                <p><i class="fa fa-map-marker"> 绑定货架：</i><span id='shelf'></span> </p>
                                <p><i class="fa fa-bars"> 设备误差：%</i><span id='error'></span></p>
                                
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" id='switchbutton' class="btn btn-primary btn-sm btn-block" onclick='gb()'><i id='switchico' class="fa fa-toggle-off"></i><span id='switchstate'></span></button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" id='delete' nnn='' class="btn btn-danger btn-sm btn-block" onclick="de()"><i class="fa fa-warning"></i> 删除此设备</button>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <button type="button" id='reset' nnn='' class="btn btn-warning btn-sm btn-block" onclick="reset()"><i class="fa fa-wrench"></i> 以当前重量重新校准传感器</button>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>














    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
     <!-- Toastr -->
     <script src="js/plugins/toastr/toastr.min.js"></script>

    <!-- Page-Level Scripts -->
    

    <script>



            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });


    </script>






</body>

</html>
