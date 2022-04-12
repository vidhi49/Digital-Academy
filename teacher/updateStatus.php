<?php
$inst_id = $_SESSION['Inst_id'];
$examId = $_GET['examid'];
// echo $examId;

// <!-- Published Exam -->
if (isset($_POST['publishExam'])) {
  $examId = $_POST['examId'];
  // echo $examId;
  $q = "update exam_tbl set Status='Published' where Inst_id='$inst_id' and Id='$examId'";
  $res = mysqli_query($con, $q);
  echo ("<script>location.href='managExam.php'</script>");
  // echo $q;
}