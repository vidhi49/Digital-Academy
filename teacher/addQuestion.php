<?php
include('../connect.php');
// include('../admin/admin-header.php'); 
?>

<head>
  <script type="text/javascript" src="teacher.js"></script>
</head>

<body>
  <div class="container">
    <!-- <div class="form-group d-flex justify-content-center m-5">
      <button type="button" class="btn bg-navy-blue text-white" data-toggle="tooltip" title="Add Question"
        data-bs-toggle="modal" data-bs-target="#addQuestion">
        <i class="fas fa-plus fs-6"></i>
      </button>
    </div> -->
    <!------------------------------------ popup Question Form---------- -->
    <div class="modal fade" id="addQuestion">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" class="form-floating">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title navy-blue">Add Question</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body p-3 m-2">

              <div class="form-floating m-2">
                <textarea class="form-control" placeholder="Question " id="floatingTextarea2" style="height: 100px"
                  name="Addquestion"></textarea>
                <label for="floatingTextarea2">Question</label>
              </div>

              <div class="form-floating m-2">
                <input class="form-check-input" type="checkbox" name="correctAnswer[]" value="1">
                <input type="text" class="form-control" id="floatingInputInvalid" placeholder="Option" name="option1">
                <label for="floatingInputInvalid">Option</label>
              </div>

              <div class="form-floating m-2">
                <input class="form-check-input" type="checkbox" name="correctAnswer[]" value="2">
                <input type="text" class="form-control " id="floatingInputInvalid" placeholder="Option" name="option2">
                <label for="floatingInputInvalid">Option</label>
              </div>

              <div id="newRow">
                <input type="hidden" id="dynamicOptions" value="2" name="dynamicOptions" />
              </div>

              <div class="d-flex justify-content-end m-2">
                <button type="button" class="btn bg-navy-blue text-white m-2" id="addOption">
                  <i class="fas fa-plus"></i> Add More Option
                </button>

              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-floating m-2">
                    <select required class="form-select" aria-label="Default select example"
                      onchange="sectionDropdown1(this.value);subjectDropdown1(this.value)" name="class1">
                      <?php
                      $qry = "SELECT DISTINCT Name FROM class_tbl ORDER BY Name ASC";
                      $result = $con->query($qry);
                      $num = $result->num_rows;
                      if ($num > 0) {
                        // echo ' <select required name="name"  class="form-select w-50">';
                        echo '<option value="">---- -Select Class -----</option>';
                        while ($rows = $result->fetch_assoc()) {
                          echo '<option  value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                        }
                        echo '</select>';
                      }
                      ?>
                      <label for="floatingSelect">Select Class</label>
                  </div>
                </div>
                <div class="col-sm-6">

                  <div class="form-floating m-2">
                    <select required name="section1" id='txtHint1' class="form-select">
                      <option value="">--Select Section--</option>
                    </select>
                    <label for="floatingSelect">Select Section</label>
                  </div>
                </div>
              </div>
              <div class="form-floating m-2">
                <select required class="form-select" name="subject1" id='subject1'
                  onchange='subcodeDropdown(this.value)'>
                  <option value="">----- Select Subject -----</option>
                </select>
                <label for="floatingSelect">Select Subject</label>
              </div>

            </div>
            <div class="modal-footer">

              <button type="submit" name="submitQue" class=" btn bg-navy-blue text-white"
                data-bs-dismiss="modal">Submit</button>
              <button type="button" class="btn bg-navy-blue text-white" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>

        </form>
      </div>
    </div>
  </div>

  </div>
  <?php
  // include("../guest/footer.php"); 
  ?>
</body>

<script type="text/javascript">
// add row
$("#addOption").click(function() {
  var count = $("#newRow").children().last().data('id') ?? 0;
  console.log('count', count);
  document.getElementById("dynamicOptions").setAttribute('value', count + 3);

  var html = '';

  html += ' <div class="input-group mb-3" id="newRowChild' + count + '" data-id=' + (count + 1) + '>';
  html += '<div class="form-floating flex-grow-1" >';
  html +=
    ' <input class="form-check-input" type="checkbox"  id="flexCheckDefault"  name="correctAnswer[]" value=' + (
      count + 3) + '>';
  html += '<input type="text" class="form-control"  name="option' + (count + 3) + '"  placeholder="Option" >';
  html +=
    '<label for="opt" > Option </label>';
  html += ' </div>';
  html +=
    '<button type="button" id="clr" name="clr" class="input-group-text btn btn-outline-secondary"" onClick="funRm(' +
    count +
    ')"><i class="fas fa-times text-dark"></i></button >';
  html += '</div>';

  $('#newRow').append(html);
  if (count == 2) {
    $('#addOption').prop('disabled', true);
  }

});

function funRm(index) {
  $("#newRowChild" + index).remove();
  $('#addOption').prop('disabled', false);
}
</script>

<?php
if (isset($_POST['submitQue'])) {
  $Addquestion = $_POST['Addquestion'];
  $classid = $_POST['class1'];
  $section1 = $_POST['section1'];
  $subjectcode = $_POST['subject1'];
  $correctAnswers = $_POST['correctAnswer'];
  $dynamicOptions = $_POST['dynamicOptions'];

  $p = "select * from class_tbl where Name='$classid' and Section='$section1'";
  $res = mysqli_query($con, $p);
  // echo $dynamicOptions;
  $result = mysqli_fetch_array($res);

  $q = "insert into question_tbl values(null,'$Addquestion','$result[0]','$section1','$subjectcode')";
  if (mysqli_query($con, $q)) {
    $qid = mysqli_insert_id($con);
    // echo $qid;
    // $que = "select * from question_tbl where Question='$Addquestion'";
    // $qres = mysqli_query($con, $que);
    // $qresult = mysqli_fetch_array($qres);

    for ($x = 1; $x <= $dynamicOptions; $x++) {
      $optname = "option" . $x;
      $isCorrect =  is_numeric(array_search($x, $correctAnswers)) ? 1 : 0;

      if (!empty($_POST[$optname])) {
        $qans = "insert into answer_tbl values(null,'$_POST[$optname]','$qid',$isCorrect)";
        if (mysqli_query($con, $qans)) {
        } else {
          die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
        }
      }
    }
    // header("location:addQuestion.php");
  } else {
    die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
  }
}
?>