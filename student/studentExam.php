<?php
include('../connect.php');
include('student-header.php');
?>
<html>

<head>

</head>

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="content mt-5 p-3">
      <div class="d-flex justify-content-center">
        <div class="table responsive p-3">
          <div class="row">
            <h3 class="navy-blue ">Exam Scheduled</h3>
          </div>
          <?php
          // for Student detail
          $q = "select * from student_tbl where Id='$Id' and Inst_id='$Inst_id' and Email='$email'";
          $res = mysqli_query($con, $q);
          $cname = mysqli_fetch_array($res);


          // For exam detail
          $ex = "select * from exam_tbl where Inst_id='$Inst_id' and Class_id='$cname[16]' and Section='$cname[15]'";
          $res2 = mysqli_query($con, $ex);
          // echo $ex;
          $cnt = 0;
          while ($r = mysqli_fetch_array($res2)) {
            if ($r[7] == 'Created') {
          ?>
          <table class="table table-hover table-sm w-75">
            <thead>
              <tr class="navy-blue">
                <th> No.</th>
                <th> Exam Name </th>
                <th> Subject </th>
                <th> Total Question </th>
                <th> Total Marks </th>
              </tr>
            </thead>
            <tbody>
              <?php
                  // For total Question
                  // echo $cname[16];
                  $totQ = "select * from examquestion_tbl where ExamId='$r[0]' and cid='$cname[16]' and section='$cname[15]' and subjectId='$r[5]' and Inst_id='$Inst_id'";
                  $res1 = mysqli_query($con, $totQ) or die("Query Failed");
                  $nor = mysqli_num_rows($res1);
                  echo $totQ;
                  // For total Marks
                  $query3 = "select SUM(Marks) as TotalMark from examquestion_tbl where  ExamId='$r[0]' and cid='$cname[16]' and section='$cname[15]' and subjectId='$r[5]' and Inst_id='$Inst_id'";
                  $res3 = mysqli_query($con, $query3) or die("Query Failed");

                  echo $r;
                  $cnt++;
                  echo "<tr>";
                  echo "<td>$cnt</td>
                <td>$r[2]</td>
                <td>$cname[14]</td>
                <td>$nor</td>
                <td>";
                  while ($r1 = mysqli_fetch_array($res3)) {
                    echo $r1[0];
                  }
                  echo "</td>";
                  echo "</tr>";
                  ?>
            </tbody>
          </table>
          <?php
            } //end of if
            else {
              echo "<h3 class='navy-blue'>No exam Scheduled...</h3>";
            }
          } //end of while
          ?>
        </div>
      </div>
    </div>
  </div>

</body>

</html>