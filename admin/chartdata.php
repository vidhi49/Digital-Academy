<?php
include('../connect.php');

    $p = "select (MONTH(Date)) , COUNT(1) FROM inquiry_tbl GROUP BY MONTH(Date)";    
    $res = mysqli_query($con, $p);
    $data=array();
    while($row = mysqli_fetch_array($res))
    {
        
        $data[$row[0]-1]=$row[1];
    }
    echo json_encode($data);
?>