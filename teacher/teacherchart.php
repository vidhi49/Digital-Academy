<?php
include('../connect.php');

session_start();
$inst_id=$_SESSION['Inst_id'];
$Id = $_SESSION['Id'];
$p = "select * from student_tbl where Id='$Id' and Inst_id='$inst_id'";
$r = mysqli_query($con, $p);
$row = mysqli_fetch_array($r);

    $p = "select Class_id , COUNT(1) FROM student_tbl Where Inst_id='$inst_id' GROUP BY Class_id ";
    $res = mysqli_query($con, $p);
    $data = array();

    while ($row = mysqli_fetch_array($res)) {

        // $data[$row[0]]=$row[1];
        $data[]=array(
            'classname'=>$row[0],
            'count'=>$row[1],
            'color'=> '#'.rand(100000,999999). ''
        );
        
    }
    // print_r($data);
    echo json_encode($data);

