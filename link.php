<?php

//这里到时候根据管理员输出不一样的
include "api/conn.php";


// session_start();
// if($_SESSION['username']=="")
// {
// die("<script>window.location.href='login.php'</script>");


// }



$level="用户";

echo  <<<EOF
<div class="sidebar-collapse">
<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element">   
         <a data-toggle="dropdown" class="dropdown-toggle" href="#">
EOF;
        
        
                echo "<span class='block m-t-xs font-bold'>用户</span>";
            

echo <<<EOF
            </a>
       
        </div>
        <div class="logo-element">
         芜湖~
        </div>
    </li>
EOF;


if (strpos($_SERVER['PHP_SELF'],'index')==true)
{  echo " <li class='active'>";
}else
{
    echo " <li>";
}


echo "<a href='index.php'> <i class='fa fa-th-large'></i>主页</a></li>";


if (strpos($_SERVER['PHP_SELF'],'new')==true){
    echo "<li class='active'>";

}else{
    echo "<li>";
}
echo "<a href='new.php'><i class='fa fa-beer'></i> <span class='nav-label'>添加账号</span></a></li>";



if (( strpos($_SERVER['PHP_SELF'],'random'))==true)
{
echo "<li class='active'>";
}else
{
    echo "<li>";
}


 









if (strpos($_SERVER['PHP_SELF'],'setting')==true){
    echo "<li class='active'>";

}else{
    echo "<li >";
}
echo "<a href='setting.php'><i class='fa fa-gear'></i> <span class='nav-label'>设置</span></a>";




?>