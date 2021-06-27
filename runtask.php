<?php
ignore_user_abort(); // run script. in background
set_time_limit(0); // run script. forever
$interval=7200; // do every 2h

do{
include "task.php";
echo "运行一次\n";
exec("run.bat",$outputstr);
print_r($outputstr);
$handle = fopen("next.txt", "r");
$contents = fread($handle, filesize ("next.txt"));
fclose($handle);
if($contents!="" && $contents>5)
{ 
    $intervall=$contents;

}else
{
    
    $intervall=$interval;
    $myfile = fopen("next.txt", "w") or die("Unable to open file!");
    fwrite($myfile,$intervall);
    fclose($myfile);
}


while($intervall>1)
{
    sleep(1); // wait 15 minutes 
  //  echo $intervall;

    $handle = fopen("next.txt", "r");
    $contents = fread($handle, filesize ("next.txt"));
    if($contents!="" && $contents>5)
    { 
        $intervall=$contents;
    }
    fclose($handle);
    $intervall=$intervall-1;
    $myfile = fopen("next.txt", "w") or die("Unable to open file!");
  
    fwrite($myfile,$intervall);
    fclose($myfile);
    
}


}while($loop);
?>
