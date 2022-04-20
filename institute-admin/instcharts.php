<?php
include('../connect.php');
if ($_POST['teaching'] = 'teaching') {
    $p = "select Stype , COUNT(1) FROM staff_tbl GROUP BY Stype";
    $res = mysqli_query($con, $p);
    $data = array();
    while ($row = mysqli_fetch_array($res)) {

        // $data[$row[0]-1]=$row[1];
        array_push($data, $row[1]);
    }
    echo json_encode($data);
}



