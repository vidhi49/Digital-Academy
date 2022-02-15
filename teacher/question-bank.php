<?php
include('../connect.php');
include('../admin/admin-header.php'); ?>

<head>

</head>

<body>

  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="content mt-5 p-3">
      <form method="post">
        <div class="row p-4">
          <div class="col-sm-4 col-xs-4">
            <div class="form-group">
              <select class="form-select w-50" aria-label="Default select example" name="cls">
                <option value='' selected disabled>---Select Class---</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4 col-xs-4 ">
            <div class="form-group">
              <select class="form-select w-75" aria-label="Default select example" name="sub">
                <option value="" selected disabled>-----Select Subject-----</option>
              </select>
            </div>
          </div>
          <div class=" col-sm-4 col-xs-4">
            <div class="form-group">
              <button type="button" class="btn bg-navy-blue text-white" data-toggle="tooltip" title="Add Question"
                data-bs-toggle="modal" data-bs-target="#addQuestion">
                <i class="fas fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php
  if (isset($_POST['sub']) && isset($_POST['cls'])) {
    $cls = $_POST['cls'];
    $sub = $_POST['sub'];
    $q = `select * from question_tbl where Class=$cls and Subject = $sub`;
    $res = mysqli_query($con, $q) or die("Query Failed");
    $nor = mysqli_num_rows($res);
    if ($nor > 0) {
  ?>
  <div class="table-responsive-md table-sm w-100 p-5">
    <h2>Question</h2>
    <hr><br>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Logo</th>
          <th>Instition Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Contact</th>
          <th>Approval Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($r = mysqli_fetch_array($res)) {
          echo "<tr>";
          echo "<th scope='row'>$r[0]</th>";
          echo "<td>$r[1]</td>";
          echo "<td>$r[2]</td>";
          echo "<td>$r[3]</td>";
          echo "</tr>";
        }
      } else {
        echo "<center><h1>No Data is Found</h1></center>";
      }
    }
        ?>
      </tbody>
    </table>
  </div>
  <div class="modal fade" id="addQuestion">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" class="form-floating">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title navy-blue">Add Question</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body p-3">

            <div class="form-floating m-2">
              <textarea class="form-control" placeholder="Question " id="floatingTextarea2" style="height: 100px"
                name="question"></textarea>
              <label for="floatingTextarea2">Question</label>
            </div>

            <div class="form-floating m-2">
              <input type="text" class="form-control" id="floatingInputInvalid" placeholder="Option" name="option1">
              <label for="floatingInputInvalid">Option</label>
            </div>

            <div class="form-floating m-2">
              <input type="text" class="form-control " id="floatingInputInvalid" placeholder="Option" name="option2">
              <label for="floatingInputInvalid">Option</label>
            </div>

            <div id="newRow"></div>

            <div class="d-flex justify-content-end m-2">
              <button type="button" class="btn bg-navy-blue text-white m-2" id="addOption">
                <i class="fas fa-plus"></i> Add More Option
              </button>

            </div>
            <div class="form-floating m-2">
              <select class="form-select" id="floatingSelect" aria-label="Select Class">
                <option value="" selected disabled>choose any one</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <label for="floatingSelect">Select Class</label>
            </div>

            <div class="form-floating m-2">
              <select class="form-select" id="floatingSelect" aria-label="Select Subject">
                <option selected disabled>choose any one</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
              <label for="floatingSelect">Select Subject</label>
            </div>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" name="submit" class=" btn bg-navy-blue text-white"
              data-bs-dismiss="modal">Submit</button>
            <button type="button" class="btn bg-navy-blue text-white" data-bs-dismiss="modal">Cancel</button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <?php include("../guest/footer.php"); ?>
</body>

</html>

<script type="text/javascript">
// add row
$("#addOption").click(function() {
  var count = $("#newRow div.input-group").length;

  var html = '';

  html += ' <div class="input-group mb-3" id="newRowChild' + count + '">';
  html += '<div class="form-floating flex-grow-1" >';
  html += '<input type="text" class="form-control"  name="option' + (count + 3) + '"  placeholder="Option" >';
  html += '<label for="opt" > Option </label>';
  html += ' </div>';
  html +=
    '<button type="button" class="input-group-text btn btn-outline-secondary"" onClick="funRm(' + count +
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
if (isset($_POST['submit'])) {
  $question = $_POST['question'];
  $option1 = $_POST['option1'];
  $option2 = $_POST['option2'];
  $option3 = $_POST['option3'];
  $option4 = $_POST['option4'];
  $option5 = $_POST['option5'];
}

?>