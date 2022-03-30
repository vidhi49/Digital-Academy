<?php
include '../connect.php';
session_start();
$inst_id = $_SESSION['Inst_id'];
if (isset($_REQUEST['update'])) {
    $eid = $_REQUEST['eid'];
    $ename = $_REQUEST['examname'];
    $edate = $_REQUEST['examdate'];
    $etime = $_REQUEST['examtime'];
    $q = "update exam_tbl set Exam_Name='$ename' , Exam_Date='$edate' , Exam_Time='$etime' where Id='$eid' AND Inst_id='$inst_id'";
    $res = mysqli_query($con, $q);
    if ($res) {
        echo "Updated";
    } else {
        echo "Error";
    }
}
if (isset($_REQUEST['check'])) {
    $eid = $_REQUEST['eid'];
    $edate = $_REQUEST['examdate'];
    
}
