<?php
include '../connect.php';
session_start();
$inst_id = $_SESSION['inst_id'];
$classId = $_POST['classid'];

$q = "select * from class_tbl where Id='$classId'";
$res = mysqli_query($con, $q);
$result = mysqli_fetch_array($res);
$query = "select * from student_tbl where Inst_id='$inst_id' and Class_id='$classId'";
$r = mysqli_query($con, $query);
$num = mysqli_num_rows($r);

if ($num == $result['Stud_limit']) {
    echo "Number of Students is full in this Section";
} else {
    echo "";
}
