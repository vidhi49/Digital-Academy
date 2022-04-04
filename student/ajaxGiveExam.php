<?php

include '../connect.php';
session_start();

$Inst_id = $_SESSION['Inst_id'];
$cid = $_GET['classId'];
$sec = $_GET['section'];
$sid = $_GET['subjectId'];
$examId = $_GET['examId'];

$examQ = "select * from examquestion_tbl where cid='$cid' and section='$sec' and subjectId='$sid' and Inst_id='$Inst_id' and ExamId='$examId'";
// echo $examQ;

$res = mysqli_query($con, $examQ) or die("Query Failed1");

// print_r($eq);


// $a = "select * from answer_tbl where Inst_Id='$Inst_id' and Question_Id=$q1[0]";
// // echo $a;
// $res2 = mysqli_query($con, $a) or die("Query Failed3");
// $ans = mysqli_fetch_array($res2);
?>
<div class="row">
  <?php
  while ($eq = mysqli_fetch_array($res)) {
    $q = "select * from question_tbl where Inst_Id='$Inst_id' and Class_Id='$cid' and Section='$sec' and Subject_Id='$sid' and Id='$eq[5]'";
    // echo $q;
    $res1 = mysqli_query($con, $q) or die("Query Failed2");
    while ($q1 = mysqli_fetch_array($res1)) {
      echo $q1[1];
    }
  }
  ?>
</div>