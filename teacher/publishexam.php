<?php
session_start();
include('../connect.php');
$id=$_REQUEST['id'];
$inst_id = $_SESSION['Inst_id'];
$q = "update exam_tbl set Status='Published' where Inst_id='$inst_id' and Id='$id'";
  $res = mysqli_query($con, $q);
  echo ("<script>location.href='manageExam.php'</script>");
?>