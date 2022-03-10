<?php
include('../connect.php');
include('../admin/admin-header.php');
require('../teacher/addQuestion.php');
?>

<?php

if (isset($_GET['QueId']) && isset($_GET['action']) && $_GET['action'] == "delete") {
  $queId = $_GET['QueId'];
  // echo $Id;
  $query = "delete from question_tbl where Id='$queId'";
  // echo $query;
  $res = mysqli_query($con, $query);
  if ($res) {
  } else {

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!" . mysqli_error($con) . "</div>";
  }
}
?>

<head>
  <script type="text/javascript" src="teacher.js"></script>
  <script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
  </script>
</head>

<body>
  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="content mt-5 ">
      <!-- <div class="d- justify-content-center"> -->
      <div class="row p-2">
        <form method="get">
          <div class="row ps-5">
            <div class="col-sm-3 col-xs-3">
              <div class="form-group d-flex justify-content-center">
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
            </div>
            <div class="col-md-3 col-xs-3">
              <div class="form-group d-flex justify-content-center">
                <select required name="section" id='txtHint' class="form-select  w-100" required>
                  <option value="">--Select Section--</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 col-xs-3">
              <div class="form-group">
                <select required class="form-select w-100 " name="subject" id='subject'
                  onchange='subcodeDropdown(this.value)' required>
                  <option value="">----- Select Subject -----</option>
                </select>
              </div>
            </div>
            <div class="col-md-3 col-xs-3">
              <div class="form-group">
                <input type="submit" value="Show Question" name="submit" class="btn bg-navy-blue text-white"></input>
                <button type="button" class="btn bg-navy-blue text-white ms-4" data-toggle="tooltip"
                  title="Add Question" data-bs-toggle="modal" data-bs-target="#addQuestion">
                  <i class="fas fa-plus fs-5 "></i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!------------------- display table ---------------------------------->
      <div class="row m-3 w-100" id="Quetable">
        <?php
        if (isset($_GET['submit'])) {
          $className = $_GET['class'];
          // echo $classId;
          $SubjectId = $_GET['subject'];
          // echo $SubjectId;
          $section = $_GET['section'];

          //----------------subject name----------
          $subName = "select * from subject_tbl where Id='$SubjectId'";
          $sname = mysqli_query($con, $subName);
          $ressub = mysqli_fetch_array($sname);
          // echo $ressub['Sub_name'];

          //------------class name----------

          $classId = "select * from class_tbl where  Name='$className' and Section='$section'";
          $cname = mysqli_query($con, $classId);
          $resCId = mysqli_fetch_array($cname);
          // echo $SubjectId;
          // echo $resCId[0];

          $q = "select * from question_tbl where Subject_id='$SubjectId'  and Class_id='$resCId[0]'";
          $res = mysqli_query($con, $q) or die("Query Failed");
          // print_r($res);
          $nor = mysqli_num_rows($res);
          // echo $nor;
          if ($nor > 0) {
        ?>
        <div class="table-responsive-md table-md w-100 p-5" id="tblQue">
          <br>
          <h2 class="navy-blue">Question Bank</h2>
          <hr><br>
          <table class="table table-hover">
            <thead>
              <tr class="navy-blue">
                <!-- <th scope="th-md" style="width: 1%;"></th> -->
                <th scope="th-md" style="width: 3%;">No.</th>
                <th scope="th-md" style="width: 25%">Question</th>
                <th scope="th-md" style="width: 1%;">Class_Name</th>
                <th scope="th-md" style="width: 2%;">Section</th>
                <th scope="th-md" style="width: 8%;">Subject</th>
                <th scope="th-md" style="width: 7%;">Option A</th>
                <th scope="th-md" style="width: 7%;">Option B</th>
                <th scope="th-md" style="width: 7%;">Option C</th>
                <th scope="th-md" style="width: 7%;">Option D</th>
                <th scope="th-md" style="width: 7%;">Option E</th>
                <th scope="th-md" style="width: 9%;">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  $cnt = 0;
                  while ($r = mysqli_fetch_array($res)) {
                    // print_r($r);
                    $cnt++;
                    echo "<tr>";
                    // echo "<th scope='row'><div class='form-check'><input class='form-check-input cntCheck' type='checkbox' name='selectedQue[]' value='0'></div></th> ";
                    echo "<th >$cnt</th>";
                    echo "<td>$r[1]</td>";
                    echo "<td>$className</td>";
                    echo "<td>$r[3]</td>";
                    echo "<td>$ressub[3]</td>";
                    $q1 = "select * from answer_tbl where Question_Id=$r[0] ";
                    $res1 = mysqli_query($con, $q1);
                    $nor1 = mysqli_num_rows($res1);
                    $options = array();
                    if ($nor1 > 0) {
                      while ($r1 = mysqli_fetch_array($res1)) {
                        // print_r($r1);
                        array_push($options, $r1[1]);
                        if ($r1['isCorrect'] == '1') {
                          // echo "yes";
                          echo "<td style='color:green'>$r1[1]</td>";
                          // $ans = $r1[1];
                        } else {
                          echo "<td>$r1[1]</td>";
                        }
                      }
                      for ($i = 0; $i < 5 - $nor1; $i++) {
                        echo "<td> - </td>";
                      }
                      // echo "<td>$ans</td>";
                    }
                    $encodedOpt = json_encode($options);
                    // echo json_encode($options);
                    echo "<td>
                    <a href='?action=delete&QueId=" . $r[0] . "&section=" . $r[3] . "&class=" . $className . "&subject=" . $SubjectId . "&submit=Show Question' >
                    <i class='fa fa-trash mr-2'></i></a>
                    <a  href='?QueId=" . $r[0] . "&section=" . $r[3] . "&class=" . $className . "&subject=" . $SubjectId . "&submit=Show Question' data-dismiss='modal' data-id='$r[0]' question='$r[1]' data-options='$encodedOpt'
              data-toggle='modal' data-target='#editQuestion' >
              <i class='fa fa-edit text-primary'></i></a>
              </td>";
                  }
                  echo "</tr>";
                  echo "</tbody>";
                  echo "</table>"; ?>
              <!-- <div class="row mt-5">
                <div class="form-group d-flex justify-content-center align-items-center text-center d-inline-block">
                  <div class="row d-flex justify-content-center">
                    <div class="col-sm-6">
                      <button type="button" class="btn bg-navy-blue text-white m-5" name="createExam">Create
                        Exam</button>
                    </div>
                    <div class="col-sm-6 ">
                      <label id="totQue" name="totalQue" class="navy-blue font-weight-bold float-right mr-4 "></label>
                    </div>
                  </div>
                </div>
              </div> -->
              <?php } else {
                echo "<center><h1 class='navy-blue'>No Data Found</h1></center>";
              }
                ?>
        </div>
        <?php
        }
          ?>
      </div>
      <!-- -----------------------Edit Question---------------------- -->
      <div class="modal fade bd-example-modal-lg" id="editQuestion" style="height: 100%;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title navy-blue" id="exampleModalLabel">
                Edit Question
              </h5>
              <hr>
            </div>
            <div class="modal-body">
              <div class="modal-body p-3">
                <form id="editQueForm" method="post">
                  <input type="hidden" id="qid" name="qid" />

                  <div class="form-floating m-2">
                    <textarea class="form-control" placeholder="Question " id="floatingTextarea2" style="height: 100px"
                      name="equestion"></textarea>
                    <label for="floatingTextarea2">Question</label>
                  </div>

                  <input type="hidden" id="editDynamicOptions" value="0" name="editDynamicOptions" />
                  <input type="hidden" id="newOneOpt" value="0" name="newOneOpt" />

                  <div id="optRow">
                  </div>

                  <div class="d-flex justify-content-end m-2">
                    <button type="button" class="btn bg-navy-blue text-white m-2" id="addOpt">
                      <i class="fas fa-plus"></i> Add More Option
                    </button>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn bg-navy-blue text-white" name="editQue">Save
                      Changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("../guest/footer.php"); ?>

</body>

<script>
$('#editQuestion').on('show.bs.modal', function(e) {
  // console.log("hello");
  // get information to update quickly to modal view as loading begins
  var opener = e.relatedTarget; //this holds the element who called the modal
  //we get details from attributes
  var equestion = $(opener).attr('question');
  var id = $(opener).data('id');
  var options = $(opener).data('options');
  var len = options.length;

  // console.log(len);
  $('#editQueForm').find('[name="equestion"]').val(equestion);
  $('#editQueForm').find('[id="qid"]').val(id);
  $('#editDynamicOptions').val(len);
  document.getElementById("newOneOpt").setAttribute('value', 0);
  //------------rendering option element----
  var html1 = "",
    i;

  for (var i = 0; i < len; i++) {

    html1 += "<div class='form-floating m-2'>";
    html1 += "<input class='form-check-input' type='checkbox' name='editCorrectAnswer[]' value='" + i + "'>";
    html1 +=
      "<input type=text' class='form-control' id='floatingInputInvalid' placeholder='Option' name='opt" + i +
      "' value='" + options[i] +
      "'>";
    html1 += "<label for = 'floatingInputInvalid'> Option </label>";
    html1 += "</div >";

  }
  document.getElementById("optRow").innerHTML = html1;
  if (len == 5) {
    $('#addOpt').prop('disabled', true);
  } else {
    $('#addOpt').prop('disabled', false);
  }

});

$("#addOpt").click(function() {
  var ocount = $("#optRow").children().length ?? 0;
  console.log('count', ocount);
  // document.getElementById("editDynamicOptions").setAttribute('value', ocount + 1);
  document.getElementById("newOneOpt").setAttribute('value', ocount);

  var html1 = '';

  html1 += " <div class='input-group mb-3'  id='optRowChild" + ocount + "'>";
  html1 +=
    "<div class='form-floating flex-grow-1' >";
  html1 +=
    " <input class='form-check-input' type='checkbox'  id='flexCheckDefault'  name='editCorrectAnswer[]' value='" +
    ocount + "'>";
  html1 +=
    "<input type='text' class='form-control'  name='opt" + (ocount) + "' placeholder='Option' >";
  html1 +=
    '<label for="opt" > Option </label>';
  html1 += '</div>';
  html1 +=
    "<button type='button' id='clr' name='clr' class='input-group-text btn btn-outline-secondary' onClick='funRmOpt(" +
    (ocount) + ")'><i class='fas fa-times text-dark'></i></button >";
  html1 += '</div>';

  // console.log(ocount);
  $('#optRow').append(html1);
  if (ocount == 4) {
    $('#addOpt').prop('disabled', true);
  }

});

function funRmOpt(index) {
  console.log("#optRowChild" + index);
  $("#optRowChild" + index).remove();
  $('#addOpt').prop('disabled', false);
}
</script>
<!-- checkbox count -->
<!-- <script>
$(function() {
  var count = 0;
  $('.cntCheck').on('change', function() {
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
</script> -->
<!-- update Query -->
<?php
if (isset($_POST['editQue'])) {

  $qid = $_POST['qid'];
  $cid = "select * from question_tbl where Id='$qid'";
  $res1 = mysqli_query($con, $cid);
  $nor1 = mysqli_fetch_array($res1);
  $editDynamicOptions = $_POST['editDynamicOptions'];
  $newOneOpt = $_POST['newOneOpt'];
  $editCorrectAnswer = $_POST['editCorrectAnswer'];
  print_r($editCorrectAnswer);
  // echo $newOneOpt;
  $que = $_POST['equestion'];
  // echo $id;
  $q = "select * from answer_tbl where Question_Id='$qid'";
  $res = mysqli_query($con, $q);
  $nor = mysqli_num_rows($res);
  // $nor2 = ;
  // echo $nor[0];
  // echo "abc";
  $aid = array();
  while ($r = mysqli_fetch_array($res)) {
    // $aid=array()
    // echo "<br>$r[0]";
    array_push($aid, $r[0]);
  }
  // print_r($aid);
  // $a = json_encode($aid);
  for ($x = 0; $x < $editDynamicOptions; $x++) {
    $opt = "opt" . $x;
    // print_r($aid);
    // echo "abc";
    if (!empty($_POST[$opt])) {
      $isCorrect =  is_numeric(array_search($x, $editCorrectAnswer)) ? 1 : 0;

      $updateAns = "update answer_tbl set Answer='$_POST[$opt]',isCorrect='$isCorrect' where Question_Id='$qid' and Id='$aid[$x]'";
      // echo $updateAns;
      $result = mysqli_query($con, $updateAns);
      if ($result) {
      } else {

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!" . mysqli_error($con) . "</div>";
      }
    } else {
      $del = "delete from answer_tbl where Question_Id='$qid' and Id='$aid[$x]'";
      $result1 = mysqli_query($con, $del);
      if ($result1) {
      } else {

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!" . mysqli_error($con) . "</div>";
      }
    }
  }
  // --------------------Insert Query --------------------
  if ($newOneOpt > 0) {
    // echo $editDynamicOptions;
    // echo "<br>Inside $newOneOpt";
    for ($x = $editDynamicOptions; $x <= $newOneOpt; $x++) {
      $opt = "opt" . $x;
      // echo $opt;
      $isCorrect =  is_numeric(array_search($x, $editCorrectAnswer)) ? 1 : 0;
      // echo "<br> 2: $_POST[$opt]";
      if (!empty($_POST[$opt])) {
        // echo "1: $_POST[$opt]";
        $insertAns = "insert into answer_tbl values(null,'$_POST[$opt]','$qid','$isCorrect')";
        // echo $insertAns;
        $result2 = mysqli_query($con, $insertAns);
        // print_r($result2);
        if ($result2) {
        } else {
          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!" . mysqli_error($con) . "</div>";
        }
      }
    }
  }
  $yourURL = $_SERVER['REQUEST_URI'];
  // echo $yourURL;
  // $yourURL = "question-bank.php?class=1st&section=A&subject=5&submit=Show+Question";
  echo ("<script>location.href='$yourURL'</script>");
}

?>


</html>