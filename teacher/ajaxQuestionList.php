<?php

include '../connect.php';

$cid = $_GET['classId'];
$sec = $_GET['section'];
$sid = $_GET['subjectId'];

$qlist = "select * from question_tbl where Class_id='$cid' and Section='$sec' and Subject_id='$sid'";
// echo $qlist;
$res = mysqli_query($con, $qlist) or die("Query Failed");
$nor = mysqli_num_rows($res);
// echo $nor;
if ($nor > 0) {

?>

<div class="table-responsive-md ">
  <br>
  <table class="table table-hover">
    <thead>
      <tr class="navy-blue">
        <th scope="th-sm" style="width: 2%;">Select</th>
        <th scope="th-sm" style="width: 3%;">No</th>
        <th scope="th-sm" style="width: 95%;">Question</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $examId = $_GET['examId'];

      $q = "select * from examQuestion_tbl where ExamId='$examId'";
      $res3 = mysqli_query($con, $q);
      $nor1 = mysqli_num_rows($res3);

      $selectedQueArray = array();
      while ($rec = mysqli_fetch_array($res3)) {
        array_push($selectedQueArray, $rec[5]);
        // print_r($selectedQueArray);
      }

      $cnt = 0;
      while ($r = mysqli_fetch_array($res)) {
        $checked = is_numeric(array_search($r[0], $selectedQueArray)) ? true : false;
        // $checked = false;
        // echo "Hello" . $checked;
        $cnt++;
        echo "<tr>";
        if ($checked) {
          echo "<th scope='row' class='text-center'><div class='form-check'><input class='form-check-input cntCheck' type='checkbox' name='selectedQue[]' checked value='$r[0]'></div></th> ";
        } else {
          echo "<th scope='row' class='text-center'><div class='form-check'><input class='form-check-input cntCheck' type='checkbox' name='selectedQue[]'  value='$r[0]'></div></th> ";
        }
        echo "<td>$cnt</td>";
        echo "<td>$r[1]</td>";
      }
    } else {
      echo "<center><h1>No Data Found...</h1></center>";
    }

      ?>
    </tbody>
</div>
</table>