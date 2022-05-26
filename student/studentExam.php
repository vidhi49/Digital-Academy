<?php

use LDAP\Result;

include('../connect.php');
include('student-header.php');
$email = $_SESSION['email'];
$Id = $_SESSION['Id'];
$Inst_id = $_SESSION['Inst_id'];
$page = 'exam';
?>
<html>

<head>
</head>

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="student-content mt-5 ">
      <div class="d-flex justify-content-center ">

        <div class="table table-responsive-md w-75">
          <h3 class="navy-blue pb-3">Scheduled Exams</h3>

          <?php
          $sq = "select * from student_tbl where Inst_id='$Inst_id'  and  Email='$email' and Id ='$Id'";
          $res = mysqli_query($con, $sq);
          // echo $sq;
          $result = mysqli_fetch_array($res);

          $q = "select * from exam_tbl as t1 left join studentExamResult_tbl as t2 on t1.Id=t2.Exam_Id and t2.Student_Id='$Id' where t1.Inst_id='$Inst_id' and t1.Class_id='$result[15]' and t1.Section='$result[14]' and t1.Status In('Created','Published','Completed')";
          // echo $q;
          $res1 = mysqli_query($con, $q);
          $nor = mysqli_num_rows($res1);

          if ($nor == 0) {
            echo "No Exam!!";
          } else {
          ?>

          <table class="table table-hover" id="ExamInfoTbl">
            <thead>
              <tr class="navy-blue">
                <!-- <th scope="th-md" style="width: 1%;"></th> -->
                <th scope="th-md" style="width: 10%;">No.</th>
                <th scope="th-md" style="width: 20%">Exam Name</th>
                <th scope="th-md" style="width: 20%;">Subject</th>
                <th scope="th-md" style="width: 20%;">Exam Date</th>
                <th scope="th-md" style="width: 15%;">Exam time</th>
                <th scope="th-md" style="width: 15%;">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $cnt = 0;

                while ($result1 = mysqli_fetch_array($res1)) {

                  if ($result1[7] == 'Created' || $result1[7] == 'Published' || $result1[7] == 'Completed') {

                    $s = "select * from subject_tbl where Id='$result1[5]' and Inst_id='$Inst_id'";
                    $res4 = mysqli_query($con, $s);
                    $rset = mysqli_fetch_array($res4);
                    // echo $s;
                    $cnt++;
                    echo "<tr class='m-2'>
                  <td>$cnt</td>
                  <td>$result1[2]</td>
                  <td>$rset[3]</td>
                  <td>$result1[6]</td>
                  <td>$result1[8]</td>";

                    if ($result1[7] == 'Completed') {
                      if (is_numeric($result1[13])) {
                        echo "<td class='navy-blue'>Result : $result1[13] Marks</td>";
                      }
                    }
                    if ($result1[7] == 'Published') {
                      echo "<td><a role='button' name='startExam' value='$result1[0]' class='btn btn-outline-primary p-1' data-bs-toggle='modal' data-bs-target='#giveExam' data-classid='$result[15]' data-section='$result[14]'' data-subjectid='$rset[0]' data-examid='$result1[0]'><i class='fas fa-edit fs-6 pr-2' aria-hidden='true'></i>Start Exam </a></td>";
                    }
                    echo "</tr>";
                ?>
              <?php
                  }
                }
              }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!---------------- Give Exam Modal------------ -->

  <!-- Modal -->
  <div class="modal fade" id="giveExam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" id='examForm'>
          <div class="modal-body">
            <input type='text' id='classId' name="classId">
            <input type='text' id='section' name="section">
            <input type='text' id='subjectId' name="subjectId">
            <input type='text' id='examId' name="examId">

            <div id="info">

            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name='submitExam'>Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
  $('#giveExam').on('show.bs.modal', function(e) {
    var opener = e.relatedTarget;
    var examId = $(opener).data('examid');
    var classId = $(opener).data('classid');
    var section = $(opener).data('section');
    var subjectId = $(opener).data('subjectid');
    // console.log(subjectId);
    $('#examForm').find('[name="classId"]').val(classId);
    $('#examForm').find('[name="section"]').val(section);
    $('#examForm').find('[name="subjectId"]').val(subjectId);
    $('#examForm').find('[name="examId"]').val(examId);

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("info").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ajaxGiveExam.php?classId=" + classId + "&section=" + section + "&subjectId=" +
      subjectId + "&examId=" + examId,
      true);
    xmlhttp.send();


  });
  </script>
  <?php
  if (isset($_POST['submitExam'])) {
    $classid = $_POST['classId'];
    $section = $_POST['section'];
    $subjectid = $_POST['subjectId'];
    $examid = $_POST['examId'];
    // echo $classid, $section, $subjectid, $examid;
    $chk = "select * from studentExamResult_tbl where Inst_id='$Inst_id' and Exam_Id='$examid' and Student_Id='$Id'";
    $res0 = mysqli_query($con, $chk) or die("Query Failed-1");
    $nor = mysqli_num_rows($res0);
    if ($nor > 0) {
    } else {

      $eq = "select * from examquestion_tbl where cid='$classid' and section='$section' and subjectId='$subjectid' and Inst_id='$Inst_id' and ExamId='$examid'";
      // echo $examQ;
      $res = mysqli_query($con, $eq) or die("Query Failed-1");
      // echo $eq;
      while ($q1 = mysqli_fetch_array($res)) {
        // print_r($que);
        $a = "select * from answer_tbl where Inst_Id='$Inst_id' and Question_Id='$q1[5]'";
        $res1 = mysqli_query($con, $a) or die("Query Failed-1");
        // echo $a;
        $nor = mysqli_num_rows($res1);
        // echo $nor;
        $anscnt = "select * from answer_tbl where Inst_Id='$Inst_id' and Question_Id='$q1[5]' and IsCorrect='1'";
        $res6 = mysqli_query($con, $anscnt) or die("Query Failed-3");
        $n = mysqli_num_rows($res6);

        $submittedAnsCheck = is_array($_POST['examAns_' . $q1[5]]) ?  implode(',', $_POST['examAns_' . $q1[5]]) : $_POST['examAns_' . $q1[5]];


        $correctAns = array();
        while ($ans = mysqli_fetch_array($res6)) {
          if ($ans[3] == '1') {
            array_push($correctAns, $ans[0]);
          }
        }

        $result = $correctAns == explode(',', $submittedAnsCheck) ? 1 : 0;

        $q3 = "insert into examanswer_tbl values(null,'$Inst_id','$q1[5]','$submittedAnsCheck','$examid','$Id','$subjectid','$result')";
        // echo $q3;
        $resset = mysqli_query($con, $q3) or die("Query Failed-4");
      }
      $s = "select * from examanswer_tbl where result='1' and Inst_id='$Inst_id' and examid='$examid' and studentId='$Id'";
      // echo  $s;
      $res7 = mysqli_query($con, $s) or die("Query Failed-5");
      $mrk = 0;

      while ($arr = mysqli_fetch_array($res7)) {
        $eq = "select * from examquestion_tbl where Inst_id='$Inst_id' and ExamId='$examid' and Question_Id='$arr[2]'";
        // echo $eq;
        $res = mysqli_query($con, $eq) or die("Query Failed-1");
        // print_r($arr);
        $arr1 = mysqli_fetch_array($res);
        $mrk = $mrk + $arr1[6];
      }
      // echo $mrk;
      $ex = "insert into studentExamResult_tbl values(null,'$Id','$examid','$Inst_id','$mrk')";
      $rest = mysqli_query($con, $ex) or die("Query Failed-4");
    }
    echo "<script>window.location.href='studentExam.php';</script>";
  }
  ?>
  <?php

  ?>
</body>

</html>