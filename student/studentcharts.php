<?php
include('../connect.php');

session_start();
$inst_id=$_SESSION['Inst_id'];
$Id = $_SESSION['Id'];
$p = "select * from student_tbl where Id='$Id' and Inst_id='$inst_id'";
$r = mysqli_query($con, $p);
$row = mysqli_fetch_array($r);

    $p = "select Gender , COUNT(1) FROM student_tbl Where Inst_id='$inst_id' and Class_id='$row[15]' GROUP BY Gender ";
    $res = mysqli_query($con, $p);
    $data = array();
    while ($row = mysqli_fetch_array($res)) {

        // $data[$row[0]-1]=$row[1];
        array_push($data, $row[1]);
    }
    echo json_encode($data);

