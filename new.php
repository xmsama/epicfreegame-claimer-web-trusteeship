<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>白嫖EPIC | 添加账号</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<!-- Toastr style -->
<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

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
            <form role="search" class="navbar-form-custom" action="search_results.html">
             
            </form>
        </div>
        <?php  include "header.php" ?>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>添加账号</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">主页</a>
                        </li>
                  
                        <li class="breadcrumb-item active">
                            <strong>添加账号</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
          
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>账号信息 <small><a href='EPIC白嫖教程.docx'>点我查看教程 <a href='DeviceAuthGenerator.exe'>点我下载工具</a></small></h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">选项 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">选项 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                           
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">账号邮箱(输错就领不到了)</label>
                                    <div class="col-sm-10"><input type="text" id='email' class="form-control"> <span class="form-text m-b-none"></span>
                                    </div>
                                </div>
                       
                        
                                <div class="form-group row"><label class="col-sm-2 col-form-label">device_id</label>
                                    <div class="col-sm-10"><input type="text" id='device' class="form-control"> <span class="form-text m-b-none"></span>
                                    </div>
                                </div>
                       
                                <div class="form-group row"><label class="col-sm-2 col-form-label">account_id</label>
                                    <div class="col-sm-10"><input type="text" id='account' class="form-control"> <span class="form-text m-b-none"></span>
                                    </div>
                                </div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">secret</label>
                                    <div class="col-sm-10"><input type="text" id='secret' class="form-control"> <span class="form-text m-b-none"></span>
                                    </div>
                                </div>

                                <div class="form-group row"><label class="col-sm-2 col-form-label">country(不写默认CN)</label>
                                    <div class="col-sm-10"><input type="text" id='country' class="form-control"> <span class="form-text m-b-none"></span>
                                    </div>
                                </div>
                             
                               
                       
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                       
                                        <button class="btn btn-primary btn-sm" id='up'>提交</button>
                                    </div>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php include "footer.php" ?>       

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
 <!-- Toastr -->
 <script src="js/plugins/toastr/toastr.min.js"></script>
  
<script>


$(document).ready(function(){
$("#up").on("click",function(){


email=$("#email").val()
device=$('#device').val()
account=$("#account").val()
secret=$("#secret").val()
country=$("#country").val()
if (country=="" || country==undefined){
    country="CN"
}


var formData = new FormData(); 
formData.append('email', email);  //添加图片信息的参数
formData.append('device',device);  //添加其他参数
formData.append('account',account);  //添加其他参数
formData.append('secret',secret);  //添加其他参数
formData.append('country',country);  //添加其他参数


$.ajax({
    url: 'api/new.php',
    type: 'POST',
    cache: false, //上传文件不需要缓存
    data: formData,
    processData: false, // 告诉jQuery不要去处理发送的数据
    contentType: false, // 告诉jQuery不要去设置Content-Type请求头
    success: function (data) {
        console.log(data)
        if(data=="添加成功")
        {
        console.log("成功")
        $("input").each(function(){
				$(this).val('');
			});
            setTimeout(function () {
                    toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut:2000
            };
            toastr.success("添加账号成功", '添加成功');
        }, 100);


            
    }else
    { 
         setTimeout(function () {
                    toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut:2000
            };
            toastr.error("错误原因："+data,'添加失败');
        }, 100);
    

    }
    },
    error: function (data) {
    alert("未知错误 请联系管理员");
    }

})  
});
})


</script>


</body>

</html>
