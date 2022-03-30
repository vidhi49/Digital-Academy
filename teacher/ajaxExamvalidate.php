<?php
include '../connect.php';
session_start();
$inst_id = $_SESSION['Inst_id'];
$class = $_POST['class'];
$section = $_POST['section'];
$subject = $_POST['subject'];
$date = $_POST['date'];

$unixTimestamp = strtotime($date);
$day = date('l', $unixTimestamp);
if ($day == 'Sunday') {
    echo "sunday";
} else {
    $query = "select * from class_tbl where Name='$class' AND Section='$section' AND Insti_id='$inst_id'";
    $result = mysqli_query($con, $query);
    $r = mysqli_fetch_array($result);

    $q = "select * from exam_tbl where Exam_Date='$date' AND Class_id='$r[0]' AND Section='$section' AND Inst_id='$inst_id'";
    $res = mysqli_query($con, $q);
    $nor = mysqli_num_rows($res);
    $r1 = mysqli_fetch_array($res);

    if ($nor == 1) {
        if ($r1['Subject_Id'] == $subject) {
            echo "Exam is Already Sechdule on this date for same subject Please Change Date";
        } else {
            echo "Exam is Already Sechdule on this date for Different subject Please Chanhe Date";
        }
    } else {
        echo "";
    }
}