<?php
include('../connect.php');
include('student-header.php');
$email = $_SESSION['email'];
$Id = $_SESSION['Id'];
$Inst_id = $_SESSION['Inst_id'];
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

          $q = "select * from exam_tbl where Inst_id='$Inst_id' and Class_id='$result[15]' and Section='$result[14]'";
          $res1 = mysqli_query($con, $q);

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
                if ($result1[7] == 'created' || $result1[7] == 'published') {
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
                  if ($result1[7] == 'published') {
                    echo "<td><a role='button' class='btn btn-outline-primary p-1' data-bs-toggle='modal' data-bs-target='#giveExam' data-classid='$result[15]' data-section='$result[14]'' data-subjectid='$rset[0]' data-examid='$result1[0]'><i class='fas fa-edit fs-6 pr-2' aria-hidden='true'></i>Start Exam </a></td>";
                  }
                  echo "</tr>";
              ?>
              <?php
                } else {
                  echo "No Exam...";
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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
</body>


</html>