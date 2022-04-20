<?php
include('../connect.php');


if ($_POST['att'] = 'att') {
    $p = "select Status , COUNT(1) FROM attendance_tbl Where Date=curdate() GROUP BY Status ";
    $res = mysqli_query($con, $p);
    $data = array();
    while ($row = mysqli_fetch_array($res)) {

        // $data[$row[0]-1]=$row[1];
        array_push($data, $row[1]);
    }
    echo json_encode($data);
}
