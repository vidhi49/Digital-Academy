<?php
include('../connect.php');
include('../admin/admin-header.php');
?>
<html>

<head>
  <script type="text/javascript" src="teacher.js"></script>

</head>

<?php

if (isset($_GET['ExamId']) && isset($_GET['action']) && $_GET['action'] == "delete") {
  $ExamId = $_GET['ExamId'];
  // echo $Id;
  $query = "delete from exam_tbl where Id='$ExamId'";
  // echo $query;
  $res = mysqli_query($con, $query);
  if ($res) {
  } else {

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!" . mysqli_error($con) . "</div>";
  }
}
?>

<body>
  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="content mt-5 ">
      <div class="table-responsive-md table-md w-100 p-5">
        <div class="row">
          <div class="col-sm-6">
            <h2 class="navy-blue"> Manage Exam </h2>
          </div>
          <div class="col-sm-6 d-flex justify-content-end">
            <button type="button" class="btn bg-navy-blue text-white m-2" data-toggle="tooltip" title="Add Exam"
              data-bs-toggle="modal" data-bs-target="#addExam">
              <i class="fas fa-plus fs-6 "></i>
            </button>
          </div>
        </div>
        <hr>
        <table class="table table-hover">
          <thead>
            <tr class="navy-blue">
              <!-- <th scope="th-md" style="width: 1%;"></th> -->
              <th scope="th-md" style="width: 3%;">No.</th>
              <th scope="th-md" style="width: 20%">Exam Name</th>
              <th scope="th-md" style="width: 6%;">Class_Name</th>
              <th scope="th-md" style="width: 2%;">Section</th>
              <th scope="th-md" style="width: 8%;">Subject</th>
              <th scope="th-md" style="width: 7%;">Exam Date</th>
              <th scope="th-md" style="width: 7%;">Status</th>
              <th scope="th-md" style="width: 7%;">Exam time</th>
              <th scope="th-md" style="width: 3%;">Action</th>
              <th scope="th-md" style="width: 2%;">Question_List</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $q = "select * from exam_tbl";
            $res = mysqli_query($con, $q);
            $nor = mysqli_num_rows($res);
            $cnt = 0;
            while ($r = mysqli_fetch_array($res)) {
              $cnt++;
              echo "<tr>
              <td>$cnt</td>
              <td>$r[1]</td>
              <td>$r[2]</td>
              <td>$r[3]</td>
              <td>$r[4]</td>
              <td>$r[5]</td>
              <td><span class='badge badge-warning badge-pill'>$r[6]</span></td>
              <td>$r[7]</td>
              <td class='text-center'><a href='?action=delete&ExamId=" . $r[0] . "' ><i class='fa fa-trash fs-5 mr-2'></i></a>
              <a  href=''><i class='fa fa-edit fs-5 text-primary'></i></a></td>
              <td><a  href='' data-id='$r[0]'  data-classid='$r[2]' data-section='$r[3]' data-subjectid='$r[4]' role='button' class='btn bg-navy-blue text-white btn-sm fs-0'  data-toggle='modal' data-target='#QueListModal'>
              Select </a>
            <a role='button' class='btn p-2'><i class='fa fa-eye text-primary fs-5' aria-hidden='true'></i>
            </a></td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--------------Add Exam Modal --------------->
  <div class="modal fade" id="addExam" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title navy-blue" id="staticBackdropLabel"> Add Exam</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="row p-2">
              <label for="examName" class="col-sm-2 col-form-label">Exam Name : </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="examName" name="examName">
              </div>
            </div>
            <div class="row p-2 mt-2">
              <div class="col-sm-4">
                <select required class="form-select w-100" aria-label="Default select example"
                  onchange="sectionDropdown(this.value);subjectDropdown(this.value)" name="class" required>
                  <?php
                  $qry = "SELECT DISTINCT Name FROM class_tbl ORDER BY Name ASC";
                  $result = $con->query($qry);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    echo '<option value="">---- -Select Class -----</option>';
                    while ($rows = $result->fetch_assoc()) {
                      echo '<option  value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                    }
                    echo '</select>';
                  }
                  ?>
              </div>
              <div class="col-sm-4">
                <div class="form-group d-flex justify-content-center">
                  <select required name="section" id='txtHint' class="form-select  w-100" required>
                    <option value="">--Select Section--</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <select required class="form-select w-100 " name="subject" id='subject'
                    onchange='subcodeDropdown(this.value)' required>
                    <option value="">----- Select Subject -----</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row p-2">
              <div class="col-sm-6">
                <label for="startDate">Exam Date : </label>
                <input id="startDate" class="form-control" type="date" name="exDate" />
              </div>
              <div class="col-sm-6">
                <label for="appt">Select a time:</label>
                <input type="time" id="appt" class="form-control" name="exTime">
              </div>
            </div>
            <div class="row p-4">
              <label>Status</label>
              <select class="form-select" name="exStatus">
                <option>Pending</option>
                <option>Created</option>
                <option>Completed</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn bg-navy-blue text-white" name="addExam">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-------------- Select Question Modal ---------------->
  <div class="modal fade" id="QueListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
      <div class="modal-content" style="height: fit-content;">
        <div class="modal-header">
          <h2 class="modal-title navy-blue" id="exampleModalScrollableTitle">
            Question List
          </h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="selectQueForm">
          <div class="modal-body h-100">
            <input type='hidden' id='classId' name="classId">
            <input type='hidden' id='section' name="section">
            <input type='hidden' id='subjectId' name="subjectId">
            <input type='hidden' id='examId' name="examId">

            <div id="QueList">

            </div>
            <div>
              <label id="totQue" name="totalQue" class="navy-blue font-weight-bold float-right mr-4 "></label>
            </div>


          </div>
          <div class="modal-footer justify-content-end h-25">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submitQue">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  include("../guest/footer.php");
  ?>
  <!----------- Add exam ------------->
  <?php
  if (isset($_POST['addExam'])) {
    $examName = $_POST['examName'];
    $exclass = $_POST['class']; //1st
    $exsection = $_POST['section']; //A
    $exsubject = $_POST['subject']; //5
    $exDate = $_POST['exDate'];
    $exTime = $_POST['exTime'];
    $exStatus = $_POST['exStatus'];

    $classId = "select * from class_tbl where  Name='$exclass' and Section='$exsection'";
    $cname = mysqli_query($con, $classId);
    $resCId = mysqli_fetch_array($cname);
    // echo $resCId[0];
    // echo $exsubject;
    // echo $exsection;

    $q = "insert into exam_tbl values(null,'$examName','$resCId[0]','$exsection','$exsubject','$exDate','$exStatus','$exTime')";
    if (mysqli_query($con, $q)) {
      echo ("<script>location.href='$yourURL'</script>");
    } else {
      die("<center><h1 class='navy-blue'>Query Failed" . mysqli_error($con) . "</h1></center>");
    }
  }
  ?>
  <!-------------- Add Question  -------------->
  <?php
  if (isset($_POST['submitQue'])) {
    $selectedQue = $_POST['selectedQue'];
    $classId = $_POST['classId'];
    $section = $_POST['section'];
    $subjectId = $_POST['subjectId'];
    $examId = $_POST['examId'];
    // print_r($selectedQue);
    foreach ($selectedQue as $que) {
      // echo "<br>" . $que;
      $examQue = "insert into examQuestion_tbl values(null,'$que','$examId','1')";
      if (mysqli_query($con, $examQue)) {
        // echo "<script> alert('Thank You for Registration');</script>";
      } else {
        die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
      }
    }
    // $examQue = "insert into examQuestion_tbl values(null,'','$examId',null)";
    // echo $section, $subjectId;

  }
  ?>
  <script>
  $('#QueListModal').on('show.bs.modal', function(e) {
    var opener = e.relatedTarget;
    var id = $(opener).data('id');
    var classId = $(opener).data('classid');
    var section = $(opener).data('section');
    var subjectId = $(opener).data('subjectid');
    // console.log(subjectId);
    $('#selectQueForm').find('[name="classId"]').val(classId);
    $('#selectQueForm').find('[name="section"]').val(section);
    $('#selectQueForm').find('[name="subjectId"]').val(subjectId);
    $('#selectQueForm').find('[name="examId"]').val(id);

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("QueList").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ajaxQuestionList.php?classId=" + classId + "&section=" + section + "&subjectId=" +
      subjectId,
      true);
    xmlhttp.send();


  });
  </script>
  <script>
  $(function() {
    var count = 0;
    console.log('111');
    $('.cntCheck').on('change', function() {
      console.log('checked');
      if (this.checked) {
        count++;
        $('cntCheck').text(count);
        // console.log(count);
        // document.getElementById("totQue").ty = count;
        // document.getElementById("totQue").type = "text";
        document.getElementById("totQue").innerHTML = count + " Rows Selected";
      } else {
        count--;
        document.getElementById("totQue").innerHTML = count + " Rows Selected";
      }
    })
  })
  </script>
</body>

</html>