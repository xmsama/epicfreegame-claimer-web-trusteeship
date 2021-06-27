<?php 
        include "conn.php";
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

        $filename = "../next.txt";
        $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
        
        //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
        $contents = fread($handle, filesize ($filename));
      //  echo $contents;
        fclose($handle);

echo $count."|".$gamecount."|".$gamelist."|".$contents;



?>