<?php

include '../connect.php';
session_start();

$inst_id = $_SESSION['inst_id'];
$cid = $_GET['classId'];
$sec = $_GET['section'];
$sid = $_GET['subjectId'];

$qlist = "select * from question_tbl where Class_id='$cid' and Section='$sec' and Subject_id='$sid' and Inst_Id='$inst_id'";
// echo $qlist;
$res = mysqli_query($con, $qlist) or die("Query Failed");
$nor = mysqli_num_rows($res);
// echo $nor;
if ($nor > 0) {

?>

<head>

</head>
<div class="table-responsive-md ">
  <br>
  <table class="table table-hover">
    <thead>
      <tr class="navy-blue">
        <th scope="th-sm" style="width: 2%;">Select</th>
        <th scope="th-sm" style="width: 1%;">No</th>
        <th scope="th-sm" style="width: 95%;">Question</th>
        <th scope="th-sm" style="width: 2%;">Select Marks</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $examId = $_GET['examId'];

      $q = "select * from examquestion_tbl where ExamId='$examId' and Inst_Id='$inst_id'";
      $res3 = mysqli_query($con, $q);
      $nor1 = mysqli_num_rows($res3);
      // echo $nor1;
      $selectedQueArray = array();

      $totMarks = 0;

      while ($rec = mysqli_fetch_array($res3)) {

        array_push($selectedQueArray, $rec[5]);
        $totMarks = $totMarks + $rec[6];
        // print_r($selectedQueArray);
      }
      // echo $totMarks;
      $cnt = 0;
      $cntQ = 0;
      while ($r = mysqli_fetch_array($res)) {
        $checked = is_numeric(array_search($r[0], $selectedQueArray)) ? true : false;
        $query = "select * from examquestion_tbl where ExamId='$examId' and Inst_Id='$inst_id' and Question_Id='$r[0]'";
        $result = mysqli_query($con, $query);
        $nor2 = mysqli_num_rows($result);
        $rs = mysqli_fetch_array($result);
        // $checked = false;
        // echo "Hello" . $checked;
        $mrk = $rs[6] ? $rs[6] : 1;
        $cnt++;
        echo "<tr id='r_$r[0]'>";
        if ($checked) {

          echo "<th scope='row' class='text-center'><div class='form-check'><input class='form-check-input cntCheck'  type='checkbox' onchange='showMarks(event,$r[0],$mrk)' name='selectedQue[]'  checked value='$r[0]'></div></th> ";
        } else {
          echo "<th scope='row' class='text-center'><div class='form-check'><input class='form-check-input cntCheck' type='checkbox' onchange='showMarks(event,$r[0],$mrk)' name='selectedQue[]'  value='$r[0]'></div></th> ";
        }
        echo "<td>$cnt</td>";
        echo "<td>$r[1]</td>";
        if ($checked) {

          echo "<td><input type='number' class='form-control w-100 pr-1' min='1' max='5' name='marks_$r[0]' id='marks_$r[0]' value='$mrk'></td>";
        }
      }
    } else {
      echo "<center><h1>No Data Found...</h1></center>";
    }
    echo " </tbody>
   </div>
   </table>
   <div>
   <p class='navy-blue font-weight-bold float-left ms-4 mb-0'>
   <label id='totQue' name='totQue' >$nor1 </label> Question Selected</p>
   <p class='navy-blue font-weight-bold float-right ms-4 mb-0'>
   <label id='totMarks' name='totMarks' >$totMarks </label> Marks</p>
            </div> ";
      ?>