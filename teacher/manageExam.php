<?php
include('../connect.php');
include('../teacher/teacher-header.php');
$inst_id = $_SESSION['Inst_id'];
$page = "exam";
?>
<html>

<head>

  <script src="../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="teacher.js"></script>
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> -->
  <!-- <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
  <script reqlink rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs5/dt-1.11.5/af-2.3.7/datatables.min.css">
  </script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/af-2.3.7/datatables.min.js"></script>

  <script
    src="https://www.jqueryscript.net/demo/Creating-A-Live-Editable-Table-with-jQuery-Tabledit/jquery.tabledit.js">
  </script>
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
  </script>
  <script>
  function sectionDropdown(str) {
    if (str == "") {
      document.getElementById("section").innerHTML = "";
      return;
    } else {
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("section").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "ajaxClass.php?Id=" + str, true);
      xmlhttp.send();
    }
  }
  </script>
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
        <table class="table table-hover" id="ExamInfoTbl">
          <thead>
            <tr class="navy-blue">
              <!-- <th scope="th-md" style="width: 1%;"></th> -->
              <th scope="th-md" style="width: 3%;">No.</th>
              <th scope="th-md" style="width: 17%">Exam Name</th>
              <th scope="th-md" style="width: 6%;">Class Name</th>
              <th scope="th-md" style="width: 2%;">Section</th>
              <th scope="th-md" style="width: 8%;">Subject</th>
              <th scope="th-md" style="width: 7%;">Exam Date</th>
              <th scope="th-md" style="width: 7%;">Status</th>
              <th scope="th-md" style="width: 7%;">Exam time</th>
              <th scope="th-md" style="width: 3%;">Action</th>
              <th scope="th-md" style="width: 5%;">Question List</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $q = "select * from exam_tbl";
            $res = mysqli_query($con, $q);
            $nor = mysqli_num_rows($res);
            $cnt = 0;

            while ($r = mysqli_fetch_array($res)) {

              // ---Class name
              $cq = "select * from class_tbl where Id=$r[3]";
              $res1 = mysqli_query($con, $cq);
              $cname = mysqli_fetch_array($res1);

              // ---subject name
              $sq = "select * from subject_tbl where Id=$r[5]";
              $res2 = mysqli_query($con, $sq);
              $sname = mysqli_fetch_array($res2);

              $cnt++;
              echo "<tr>
              <td >$cnt</td>
              <input type='hidden' class='eid' value='" . $r[0] . "'/>
              
              <td class='examname'>$r[2]</td>
              <td>$cname[2]</td>
              <td>$r[4]</td>
              <td>$sname[3]</td>
              <td class='examdate'>$r[6]</td>
              <td><span class='badge badge-warning badge-pill'>$r[7]</span></td>
              <td class='examtime'>$r[8]</td>
              <td class='text-center'>
              <a href='?action=delete&ExamId=" . $r[0] . "'><i class='fa fa-trash text-primary fs-5 mr-2'></i></a>
              <a  href='?action=edit&ExamId=" . $r[0] . "' class='edit'><i class='fa fa-edit fs-5 text-primary'></i></a>
              </td><td>";
             
                echo "<a data-examid='$r[0]' data-inst_id='$inst_id' data-status='$r[7]' data-classid='$r[3]' data-section='$r[4]' data-subjectid='$r[5]' role='button' class='btn bg-navy-blue text-white btn-sm fs-0'  data-toggle='modal' data-target='#QueListModal'>
                Select </a>";
              
              echo "
            <a role='button' data-examid='$r[0]' data-classid='$r[3]' data-section='$r[4]' data-subjectid='$r[5]' class='btn p-1' data-toggle='modal' data-target='#ExamDetailModal'><i class='fa fa-eye text-primary fs-5' aria-hidden='true'></i>
            </a>";
            if($r[7]=='Created')
            {
              echo "<a class='btn btn-primary' href='publishexam.php?id=$r[0]' role='button' data-toggle='tooltip'
              title='Start Exam'> <i class='fas fa-play text-light fs-5' ></i> </a>";
            }
            if($r[7]=='Published')
            {
              echo "<a class='btn btn-danger' href='publishexam.php?id=$r[0]' role='button' data-toggle='tooltip'
              title='Start Exam'> <i class='fas fa-play text-light fs-5' ></i> </a>";
            }
            echo "
            
            </td>
              </tr>";
            }
            // <button data-examid='$r[0]' data-classid='$r[3]' data-section='$r[4]' data-subjectid='$r[5]' class='btn p-1' ><i class='fas fa-play text-primary fs-5' ></i>
            // </button>
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
          <form method="post" role="form" id="addexamform">
            <div class="row p-2">
              <label for="examName" class="col-sm-2 col-form-label">Exam Name : </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="examName" name="examName" required>
              </div>
            </div>
            <div class="row p-2 mt-2">
              <div class="col-sm-4">
                <select required id="class" class="form-select w-100" aria-label="Default select example"
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
                  <span id="classmsg"></span>
              </div>
              <div class="col-sm-4">
                <div class="form-group d-flex justify-content-center">
                  <select required name="section" id='section' class="form-select  w-100" required>
                    <option value="">--Select Section--</option>
                  </select>
                  <span id="sectionmsg"></span>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <select required class="form-select w-100 " name="subject" id='subject'
                    onchange='subcodeDropdown(this.value)' required>
                    <option value="">----- Select Subject -----</option>
                  </select>
                  <span id="subjectmsg"></span>
                </div>
              </div>
            </div>
            <div class="row p-2">
              <div class="col-sm-6">
                <label for="startDate">Exam Date : </label>
                <input id="startDate" class="form-control" type="date" name="exDate" required />
                <span id="examdate"></span>
              </div>
              <div class="col-sm-6">
                <label for="appt">Select a time:</label>
                <input type="time" id="appt" class="form-control" name="exTime" required>
              </div>
            </div>
            <div class="row p-4">
              <label>Status</label>
              <select class="form-select" name="exStatus">
                <option>Pending</option>
                <!-- <option>Created</option>
                <option>Published</option> -->
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn bg-navy-blue text-white" id="Exam" name="addExam">Add</button>
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
            <!-- <div>
              <label id='totQue' name='totQue' class='navy-blue font-weight-bold float-right mr-4 '></label>";
            </div> -->
          </div>
          <div class="modal-footer justify-content-end h-25">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id='submitQue' name="submitQue">Save </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!---------------- Exam Detail Modal------------ -->
  <div class="modal fade" id="ExamDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content" style="height: fit-content;">
        <div class="modal-header">
          <h2 class="modal-title text-dark" id="exampleModalScrollableTitle">
            Exam Details
          </h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" id="examDetailsForm">
          <div class="modal-body h-100" id="examDetails">
            <input type='hidden' id='classId' name="classId">
            <input type='hidden' id='section' name="section">
            <input type='hidden' id='subjectId' name="subjectId">
            <input type='hidden' id='examId' name="examId">
          </div>
          <div id="exDetail">

          </div>
          <div class="modal-footer justify-content-end h-25">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

    $classId = "select * from class_tbl where  Name='$exclass' and Id='$exsection'";
    echo $classId;
    $cname = mysqli_query($con, $classId);
    $resCId = mysqli_fetch_array($cname);
    // echo $resCId[0];
    // echo $exsubject;
    // echo $exsection;

    $q = "insert into exam_tbl values(null,'$inst_id','$examName','$exsection','$resCId[7]','$exsubject','$exDate','$exStatus','$exTime')";
    echo $q;
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

    $question = array();
    $q = "select * from examquestion_tbl where ExamId='$examId' and Inst_Id='$inst_id'";
    $res = mysqli_query($con, $q);
    $nor = mysqli_num_rows($res);
    if ($nor == 0) {
      foreach ($selectedQue as $que) {
        $marks = $_POST['marks_' . $que];

        $examQue = "insert into examquestion_tbl values(null,'$examId','$classId','$section','$subjectId','$que','$marks','$inst_id')";
        $res1 = mysqli_query($con, $examQue);
      }
    } else {
      foreach ($selectedQue as $que) {
        $marks = $_POST['marks_' . $que];
        array_push($question, $que);
        $q = "select * from examquestion_tbl where ExamId='$examId' AND Question_Id='$que' and Inst_Id='$inst_id'";
        $res = mysqli_query($con, $q);
        $nor = mysqli_num_rows($res);
        if ($nor == 0) {
          $examQue = "insert into examquestion_tbl values(null,'$examId','$classId','$section','$subjectId','$que','$marks','$inst_id')";
          $res1 = mysqli_query($con, $examQue);
        }
      }
      $sql = "DELETE FROM examquestion_tbl WHERE  ExamId='$examId' AND Inst_Id='$inst_id'and Question_Id NOT IN ( '" . implode("', '", $question) . "' )";
      $result = mysqli_query($con, $sql);
      // echo "<script>alert('Question is Selected Succesfully');</script>";
      foreach ($selectedQue as $que) {
        $emrk = $_POST['marks_' . $que];
        $emarks = "update examquestion_tbl set Marks='$emrk' where ExamId='$examId' and Inst_Id='$inst_id' and Question_Id='$que'";
        // echo $emarks;
        $resSet = mysqli_query($con, $emarks);
      }
    }
    $rec = "select * from examquestion_tbl where ExamId='$examId' and Inst_Id='$inst_id' and cid='$classId' and section='$section' and subjectId='$subjectId'";
    $resSet3 = mysqli_query($con, $rec);
    $nors = mysqli_num_rows($resSet3);
    if ($nors > 0) {
      $status = "update exam_tbl set Status='Created' where Id='$examId' and Inst_id='$inst_id'";
      $result = mysqli_query($con, $status);
      echo "<script>window.location.href='manageExam.php';</script>";
    }
  }
  ?>

  <script>
  function showMarks(e, qid, mrk) {
    var x = document.getElementById("r_" + qid);
    var cntQ = document.getElementById("totQue").textContent;
    var totMrk = document.getElementById("totMarks").textContent;
    // console.log(mrk);
    if (e.target.checked) {
      cntQ++;
      totMrk = +totMrk + mrk;
      var html =
        "<td><input type='number' data-oldValue='" + mrk +
        "'onchange='updateMarks(event," + qid + ")' class='form-control w-100 pr-1' min='1' max='5' name='marks_" +
        qid +
        "' id='marks_" +
        qid +
        "' value='" + mrk + "'></td>";
      x.insertAdjacentHTML('beforeend', html);
      // document.getElementById("totQue").type = "text";
      document.getElementById("totQue").innerHTML = cntQ;
      document.getElementById("totMarks").innerHTML = totMrk;
    } else {
      x.removeChild(x.lastElementChild);
      cntQ--;
      totMrk = +totMrk - mrk;
      // document.getElementById("totQue").type = "text";
      document.getElementById("totQue").innerHTML = cntQ;
      document.getElementById("totMarks").innerHTML = totMrk;
    }
    // x.append(html);
  }

  function updateMarks(e, qid) {

    var element = document.getElementById('marks_' + qid);
    var oldValue = element.getAttribute('data-oldValue');
    var totMrk = document.getElementById("totMarks").textContent;
    element.setAttribute('data-oldValue', e.target.value);
    totMrk = +totMrk - +oldValue + +e.target.value;
    document.getElementById("totMarks").innerHTML = totMrk;

  }
  </script>

  <script>
  $('#QueListModal').on('show.bs.modal', function(e) {
    var opener = e.relatedTarget;
    var examId = $(opener).data('examid');
    var classId = $(opener).data('classid');
    var section = $(opener).data('section');
    var subjectId = $(opener).data('subjectid');
    var status = $(opener).data('status');
    if(status=='Published'|| status=='Completed')
    {
      $(submitQue).hide();
    }
    // console.log(subjectId);
    $('#selectQueForm').find('[name="classId"]').val(classId);
    $('#selectQueForm').find('[name="section"]').val(section);
    $('#selectQueForm').find('[name="subjectId"]').val(subjectId);
    $('#selectQueForm').find('[name="examId"]').val(examId);

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
      subjectId + "&examId=" + examId,
      true);
    xmlhttp.send();


  });

  $('#ExamDetailModal').on('show.bs.modal', function(e) {
    var opener = e.relatedTarget;
    var examId = $(opener).data('examid');
    var classId = $(opener).data('classid');
    var section = $(opener).data('section');
    var subjectId = $(opener).data('subjectid');
    // console.log(examid);
    // console.log($('#examDetails'));
    $('#examDetails').find('[name="classId"]').val(classId);
    $('#examDetails').find('[name="section"]').val(section);
    $('#examDetails').find('[name="subjectId"]').val(subjectId);
    $('#examDetails').find('[name="examId"]').val(examId);
    $('#examDetails').find('[name="publishExam"]').val(examId);

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("exDetail").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ViewQuestionList.php?classId=" + classId + "&section=" + section + "&subjectId=" +
      subjectId + "&examId=" + examId,
      true);
    xmlhttp.send();
  });
  </script>
  <script>
  $("#Exam").click(function() {
    // console.log("hello")
    if ($("#startDate").val() != "") {

      if ($("#class").val() == "") {
        alert('Please Select Class');
        $("#class").focus();
        return false;
      } else if ($("#txtHint").val() == "") {
        alert('Please Select Section');
        $("#txtHint").focus();
        return false;
      } else if ($("#subject").val() == "") {
        alert('Please Select Subject');
        $("#subject").focus();
        return false;
      } else {
        // $.ajax({
        //   type: 'POST',
        //   url: 'ajaxExamvalidate.php',
        //   // data :"class=" + $('#class').val(),
        //   data: "class=" + $('#class').val() + "&section=" + $("#txtHint").val() + "&subject=" + $("#subject").val() + "&date=" + $("#startDate").val(),
        //   success: function(response) {
        //       alert(response); 
        //   }
        // });
        if ($("#examdate").text() != "") {
          alert($("#examdate").text());
          $("#startDate").focus;
          return false;
        }
      }
    }
  });

  $('#startDate,#subject,#txtHint,#class').on('change', function() {
    // console.log("ex")
    if ($("#class").val() != "" && $("#subject").val() != "" && $("#txtHint").val() != "") {
      $.ajax({
        type: 'POST',
        url: 'ajaxExamvalidate.php',
        // data :"class=" + $('#class').val(),
        data: "class=" + $('#class').val() + "&section=" + $("#section").val() + "&subject=" + $("#subject")
          .val() + "&date=" + $("#startDate").val(),
        success: function(response) {
          $('#examdate').html(response).css('color', 'red');
        }
      });
    }
  });

  $(function() {
    var count = 0;
    // console.log('111');
    $('.cntCheck').on('change', function() {
      // console.log('checked');
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
  });

  // $('#ExamInfoTbl').Tabledit({
  //   editButton: false,
  //   removeButton: false,
  //   columns: {
  //     identifier: [0, 'id'],
  //     editable: [
  //       [1, 'Exam Name'],
  //       [5, 'Exam Date'],
  //       [6, 'Status'],
  //       [7, 'Exam Time']
  //     ]
  //   },
  // });
  $('#ExamInfoTbl').on('click', '.edit', function() {
    examname = $(this).parent().parent().find(".examname").html();
    $(this).parent().parent().find(".examname").html("<input type='text' value='" + examname +
      "' class='form-control exNameupdate'>");
    examdate = $(this).parent().parent().find(".examdate").html();
    $(this).parent().parent().find(".examdate").html("<input type='date' value='" + examdate +
      "' class='form-control exDateupdate'>");
    examtime = $(this).parent().parent().find(".examtime").html();
    $(this).parent().parent().find(".examtime").html("<input type='time' value='" + examtime +
      "' class='form-control exTimeupdate'>");

    $(".edit").attr('class', 'update');
    $(".update").html("<i class='fa fa-check fs-5 text-primary'>");
    return false;
  });

  $('#ExamInfoTbl').on('click', '.update', function() {
    examname = $(this).parent().parent().find(".exNameupdate").val();
    examid = $(this).parent().parent().find(".eid").val();
    examdate = $(this).parent().parent().find(".exDateupdate").val();
    examtime = $(this).parent().parent().find(".exTimeupdate").val();
    // alert(examid);
    $.ajax({
      type: 'POST',
      url: 'ajaxUpdateexam.php',
      data: "update='update'&eid=" + examid + "&examname=" + examname + "&examdate=" + examdate + "&examtime=" +
        examtime,
      success: function(response) {
        alert(response);
        // return false;
      }
    });


  });
  </script>

</body>

</html>