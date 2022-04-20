<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "generateidcard";
$insti_id = $_SESSION['inst_id'];
?>
<script>
function sectionDropdown(str) {
  // console.log(str);
  if (str == "") {
    document.getElementById("sec").innerHTML = "";
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
        document.getElementById("sec").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ajaxclass.php?name=" + str, true);
    xmlhttp.send();
  }
}
</script>

<body>
  <div class="d-flex">
    <?php
    include("institute-sidebar.php");
    ?>
    <div class="institute-content text-muted">
      <h2 class="navy-blue mt-5 mb-5 fw-bold">Generate ID-Card</h2>
      <form method="post">
        <div class="row">
          <div class="col-sm-3 ">
            <div class="form-group d-flex justify-content-center">
              <select required class="form-select w-100 h-100 fs-5" name="class" onchange="sectionDropdown(this.value);"
                required>
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
          <div class="col-sm-3">
            <div class="form-group d-flex justify-content-center">
              <select required name="sec" id='sec' class="form-select h-100 fs-5  w-100" required>
                <option value="">--Select Section--</option>
              </select>
            </div>
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn bg-navy-blue text-white fs-5 " value="generatePdf"
              name="generatePdf">generatePdf</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php
  if (isset($_POST['generatePdf'])) {
    $cid = $_POST['class'];
    $sec = $_POST['sec'];
    // $q = "select * from student_tbl where Inst_id='$insti_id' and Class_id='$cid' and Section='$sec'";
    // $res = mysqli_query($con, $q);
    // $nor = mysqli_num_rows($res);
    // if ($nor > 0) {
    // }

    // echo $cid, $sec;
    echo "<script>window.location = (\"IDcardpdf.php?cid=$cid&sec=$sec\")</script>";
  }
  ?>
</body>