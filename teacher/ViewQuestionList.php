<?php

include '../connect.php';
session_start();

$inst_id = $_SESSION['Inst_id'];
$cid = $_GET['classId'];
$sec = $_GET['section'];
$sid = $_GET['subjectId'];
$examId = $_GET['examId'];

$qlist = "select * from examquestion_tbl where ExamId='$examId' and cid='$cid' and section='$sec' and subjectId='$sid' and Inst_id='$inst_id'";
// echo $qlist;
$res = mysqli_query($con, $qlist) or die("Query Failed");
$nor = mysqli_num_rows($res);
// echo $nor;
$ename = "select * from exam_tbl where Id='$examId' and Class_id='$cid' and Section='$sec' and Subject_Id='$sid'  and Inst_Id='$inst_id'";
$res1 = mysqli_query($con, $ename) or die("Query Failed");
// echo $ename;

$query3 = "select SUM(Marks) as TotalMark from examquestion_tbl where  ExamId='$examId' and cid='$cid' and section='$sec' and subjectId='$sid' and Inst_id='$inst_id'";
$res2 = mysqli_query($con, $query3) or die("Query Failed");
// print_r($res2);

echo "<div class='container'>
        <div class='row m-4 p-2 ' >
            <div class='col-sm-4 navy-blue fs-5 '>
              <h5>Exam Name :</h5> 
            </div>
            <div class='col-sm-8 font-weight-bold text-dark'>";
while ($r = mysqli_fetch_array($res1)) {
  echo $r[2];
}
echo "</div>
        </div>
        <div class='row m-4 p-2'>
          <div class='col-sm-4 navy-blue fs-5 '>
            <h5>Total Question : </h5>
          </div>
          <div class='col-sm-8 h6 font-weight-bold text-dark'>";
echo $nor;
echo "</div>
        </div>
        <div class='row m-4 p-2 '>
        <div class='col-sm-4 navy-blue fs-5 '>
        <h5>Total Marks : </h5>
        </div>
        <div class='col-sm-8 font-weight-bold text-dark'>";

while ($r1 = mysqli_fetch_array($res2)) {
  echo $r1[0];
}
echo "</div>
        </div>
</div>";
?>
</body>