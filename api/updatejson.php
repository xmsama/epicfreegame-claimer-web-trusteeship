<?php
include "conn.php";
    $init = new stdClass;

    $sql="select * from user";
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()){
        $acc=$row['id'];
        $init->$acc = new stdClass;
        $init->$acc->device_id = $row['device_id'];
        $init->$acc->account_id = $row['account_id'];
        $init->$acc->secret = $row['secret'];
        }


    $txt=json_encode($init,JSON_FORCE_OBJECT);
    $myfile = fopen("../epicgames-freebies-claimer-1.5.2/device_auths.json", "w") or die("Unable to open file!");
    fwrite($myfile,$txt);
    fclose($myfile);
  
   // echo "更新json完毕";

?>