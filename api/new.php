<?php

include "conn.php";



if ($_REQUEST['email']=="" || $_REQUEST['device']=="" || $_REQUEST['account']=="" || $_REQUEST['secret']=="" || $_REQUEST['country']=="" )
{
    echo "请填写所有信息!";
    die();
}




$filename = "../next.txt";
$handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'

//通过filesize获得文件大小，将整个文件一下子读到一个字符串中
$contents = fread($handle, filesize ($filename));
//echo $contents;
fclose($handle);
if($contents<5)
{
    echo "系统正在领取游戏或即将开始领取 请稍后添加";
    die();
}





$sql="select * from user where id='".$_REQUEST['email']."'";
$result = $mysqli->query($sql);
$ec=$result->num_rows;
if($ec>0)
{
echo "账号已存在";
}else
{
$sql="insert into user values('".$_REQUEST['email']."','".$_REQUEST['device']."','".$_REQUEST['account']."','".$_REQUEST['secret']."','".$_REQUEST['country']."','0')";
//echo $sql;
$result = $mysqli->query($sql);
include "updatejson.php";
echo "添加成功";

}
?>