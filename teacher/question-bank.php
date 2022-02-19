<?php
include('../connect.php');
include('../admin/admin-header.php');
?>


<head>
  <script>
  function subcodeDropdown(str) {
    if (str == "") {
      document.getElementById("sub_code").innerHTML = "";

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
          document.getElementById("sub_code").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", "ajaxSubcode.php?subject=" + str, true);
      xmlhttp.send();

    }

  }

  function sectionDropdown(str) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
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
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "../institute-admin/ajaxclass.php?name=" + str, true);
      xmlhttp.send();
    }
  }

  function subjectDropdown(str) {
    if (str == "") {
      document.getElementById("subject").innerHTML = "";
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
          document.getElementById("subject").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "ajaxSubject.php?className=" + str, true);
      xmlhttp.send();
    }
  }
  </script>
</head>

<body>

  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="content mt-5 p-3">
      <form method="post">
        <div class="row ps-5">
          <div class="col-sm-3 col-xs-3">
            <div class="form-group d-flex justify-content-center">
              <select required class="form-select w-75" aria-label="Default select example"
                onchange="sectionDropdown(this.value);subjectDropdown(this.value)" name="class">
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
            </div>

          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group d-flex justify-content-center">

              <select required name="section" id='txtHint' class="form-select w-50">
                <option value="">--Select Section--</option>

              </select>
            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <select required class="form-select " name="subject" id='subject' onchange='subcodeDropdown(this.value)'>
                <option value="">----- Select Subject -----</option>
              </select>

            </div>
          </div>
          <div class="col-sm-3 col-xs-3">
            <div class="form-group">
              <input type="submit" value="Show Question" name="submit" class="btn btn-primary"></input>
            </div>
          </div>
          <!-- <div class=" col-sm-3 col-xs-3">
            <div class="form-group d-flex justify-content-center">
              <button type="button" class="btn bg-navy-blue text-white" data-toggle="tooltip" title="Add Question"
                data-bs-toggle="modal" data-bs-target="#addQuestion">
                <i class="fas fa-plus fs-6"></i>
              </button>
            </div>
          </div> -->
        </div>
      </form>
    </div>
  </div>

</body>

</html>
<?php include("../guest/footer.php"); ?>
<?php
if (isset($_POST['submit'])) {

  // include("admin-sidebar.php");
  $q = "select * from question_tbl";
  $res = mysqli_query($con, $q) or die("Query Failed");

  $nor = mysqli_num_rows($res);
  echo $nor;
  //       if ($nor > 0) {
}

//       
?>