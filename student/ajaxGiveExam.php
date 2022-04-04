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

$res = mysqli_query($con, $examQ) or die("Query Failed-1");

// print_r($eq);


// $a = "select * from answer_tbl where Inst_Id='$Inst_id' and Question_Id=$q1[0]";
// // echo $a;
// $res2 = mysqli_query($con, $a) or die("Query Failed3");
// $ans = mysqli_fetch_array($res2);
?>
<div class="table table-responsive-md">
  <table class="table table-borderless ">
    <?php
    $cnt = 0;
    while ($eq = mysqli_fetch_array($res)) {

      $q = "select * from question_tbl where Inst_Id='$Inst_id' and Class_Id='$cid' and Section='$sec' and Subject_Id='$sid' and Id='$eq[5]'";
      // echo $q;
      $res1 = mysqli_query($con, $q) or die("Query Failed-2");

      while ($q1 = mysqli_fetch_array($res1)) {

        $a = "select * from answer_tbl where Inst_Id='$Inst_id' and Question_Id='$q1[0]'";
        $res3 = mysqli_query($con, $a) or die("Query Failed-3");

        $nor = mysqli_num_rows($res3);
        // echo $nor;
        $cnt++;
        $num = $nor + 1;
        echo "<tr style='border-style: none;'>
      <td class='p-2' rowspan='$num' style='width: 4%;'>$cnt</td>
      <td class='p-2' style='width: 96%;'>$q1[1]</tr>
      <tr>";
        while ($ans = mysqli_fetch_array($res3)) {
          // $n = $nor + 1;
          // if ($n == 2) {

          //   echo "<td><input type='text'>$ans[1]</div>";
          // } else {
          //   echo "hi";
          //   echo "<td >$ans[1]";
          // }
          $anscnt = "select * from answer_tbl where Inst_Id='$Inst_id' and Question_Id='$q1[0]' and IsCorrect='1'";
          $res6 = mysqli_query($con, $anscnt) or die("Query Failed-3");
          $n = mysqli_num_rows($res6);

          // if ($n == 1) {
          //   echo "<td> <input class='form-check-input me-1 p-1' type='radio' name='exAns'> $ans[1]";
          // } else {
          echo "<td> <input class='form-check-input me-1' type='checkbox' name='examAns[]' value='$ans[0]'> $ans[1]";
          // }
          echo "</td></tr>";
        }
      }
    }
    ?>
  </table>
</div>