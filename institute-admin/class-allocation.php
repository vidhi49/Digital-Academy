<?php include("../connect.php");
include("change-header.php");
$Ins_id = $_SESSION['inst_id'];
$statusMsg = "";
$readonly = "";
$a = "class";
//------------------------SAVE--------------------------------------------------
if (isset($_POST['allocate'])) {

  $className = $_POST['name'];
  $section = $_POST['section'];
  $tname = $_POST['tname'];
  $temail = $_POST['temail'];
  $tid = $_POST['tid'];

  // echo "$className"; 
  // echo "$section"; 
  // echo "$tname"; 
  // echo "$temail"; 
  // echo "$tid";   
  $query = mysqli_query($con, "select * from class_tbl where Teacher_id='$tid' and Insti_id='$Ins_id'");
  $ret = mysqli_fetch_array($query);
  if ($ret) {
    if ($ret['Section'] == $section && $ret['Name'] == $className) {
      $statusMsg = "<div class='alert alert-danger'>Teacher Is Already Assigned To This Class!</div>";
    } else if ($ret['Section'] != $section || $ret['Name'] != $className) {
      $statusMsg = "<div class='alert alert-danger'>Teacher Is Already Assigned To Another Class!</div>";
    }
  } else {
    $query1 = mysqli_query($con, "select * from class_tbl where NOT Teacher_id ='$tid' and Insti_id='$Ins_id'");
    $res = mysqli_fetch_array($query1);
    if ($query1) {
      if ($res['Section'] == $section && $res['Name'] == $className) {
        $statusMsg = "<div class='alert alert-danger'>Another Teacher Is Assigned To This Class !</div>";
      } else {
        $query = mysqli_query($con, "update class_tbl set Teacher_id='$tid',Class_teacher='$tname' where Name='$className' and Section='$section' and Insti_id='$Ins_id' ");

        if ($query) {

          $statusMsg = "<div class='alert alert-success'>Successfully Assigned!</div>";
        } else {
          $statusMsg = "<div class='alert alert-danger'>An error Occurred" . mysqli_error($con) . "</div>";
        }
      }
    }
  }
}


//--------------------EDIT------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
  $Id = $_GET['Id'];
  $readonly = "disabled";
  $query = mysqli_query($con, "select * from class_tbl where Id ='$Id' and Insti_id='$Ins_id'");
  $row = mysqli_fetch_array($query);

  //------------UPDATE-----------------------------
  if (isset($_POST['update'])) {

    $tname = $_POST['tname'];
    $temail = $_POST['temail'];
    $tid = $_POST['tid'];
    $query = mysqli_query($con, "select * from class_tbl where Teacher_id='$tid' and Insti_id='$Ins_id'");
    $ret = mysqli_fetch_array($query);

    if ($ret) {
      if ($ret['Section'] == $row['Section']  && $ret['Name'] == $row['Name']) {
        $query = mysqli_query($con, "update class_tbl set Teacher_id='$tid',Class_teacher='$tname' where Name='$row[2]' and Section='$row[7]' and Insti_id='$Ins_id' ");
        if ($query) {
          echo "<script type = \"text/javascript\">
          window.location = (\"class-allocation.php\")
          </script>";
        } else {
          $statusMsg = "<div class='alert alert-danger'>An error Occurred" . mysqli_error($con) . "</div>";
        }
      } else if ($ret['Section'] != $row['Section'] || $ret['Name'] != $row['Name']) {
        $statusMsg = "<div class='alert alert-danger'>Teacher Is Already Assigned To Another Class!</div>";
      }
    } else {
      $query = mysqli_query($con, "update class_tbl set Teacher_id='$tid',Class_teacher='$tname' where Name='$row[2]' and Section='$row[7]' and Insti_id='$Ins_id' ");
      if ($query) {
        echo "<script type = \"text/javascript\">
        window.location = (\"class-allocation.php\")
        </script>";
      } else {
        $statusMsg = "<div class='alert alert-danger'>An error Occurred" . mysqli_error($con) . "</div>";
      }
    }
  }
}


//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
  $Id = $_GET['Id'];
  // echo $Id;
  $query = "update class_tbl set Teacher_id=null,Class_teacher='' where Id='$Id' and Insti_id='$Ins_id'";
  // echo $query;
  $res = mysqli_query($con, $query);
  if ($res) {


    echo "<script type = \"text/javascript\">
              window.location = (\"class-allocation.php\")
              </script>";
  } else {

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!" . mysqli_error($con) . "</div>";
  }
}


?>

<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="../css/css/ruang-admin.min.css" rel="stylesheet"> -->

  <script>
  function classDropdown(str) {
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
      xmlhttp.open("GET", "ajaxclass.php?name=" + str, true);
      xmlhttp.send();
    }
  }

  function teacheremail(str) {
    if (str == "") {
      //document.getElementById("tidHint").innerHTML = "";
      document.getElementById("emailHint").innerHTML = "";
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
          //document.getElementById("tidHint").innerHTML = this.responseText;
          document.getElementById("emailHint").innerHTML = this.responseText;
        }
      };
      // xmlhttp.open("GET","ajaxTeacher.php?Name="+str,true);
      // xmlhttp.send();
      xmlhttp.open("GET", "ajaxTeacheremail.php?Name=" + str, true);
      xmlhttp.send();
    }

  }

  function teacherDropdown(str) {
    if (str == "") {
      document.getElementById("tidHint").innerHTML = "";

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
          document.getElementById("tidHint").innerHTML = this.responseText;

        }
      };
      xmlhttp.open("GET", "ajaxTeacher.php?Email=" + str, true);
      xmlhttp.send();

    }

  }
  </script>
</head>
<html>

<body>
  <div class="d-flex">
    <?php
    include("institute-sidebar.php");
    ?>
    <div class="institute-content text-muted h6">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Class Allocation</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Class Allocation</li>

        </ol>
      </div>
      <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
        <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
          <h4 class="m-0 font-weight-bold text-primary">Select Class</h4>
          <?php echo $statusMsg; ?>
        </div>
        <div class="card-body">
          <form method="post">
            <div class="form-group row mb-3">
              <div class="col-xl-6">
                <label class="form-control-label">Select Class<span class="text-danger ml-2">*</span></label>
                <?php
                $qry = "SELECT DISTINCT Name FROM class_tbl Where Insti_id='$Ins_id' ORDER BY Name ASC";
                $result = $con->query($qry);
                $num = $result->num_rows;
                if ($num > 0) {
                  echo ' <select required name="name" ' . $readonly . '  onchange="classDropdown(this.value)" class="form-control form-control-lg mb-3">';
                  echo '<option value="">--Select Class--</option>';
                  while ($rows = $result->fetch_assoc()) {
                    echo '<option ' . (($row['Name'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                  }
                  echo '</select>';
                }
                ?>
              </div>
              <div class="col-xl-6" id="hello">
                <label class="form-control-label">Class Section<span class="text-danger ml-2">*</span></label>
                <?php
                if (isset($Id)) {
                  $q = "SELECT * FROM class_tbl where Id='$Id' AND Insti_id='$Ins_id'";
                  $res = mysqli_query($con, $q);
                  $res1 = mysqli_fetch_array($res);
                  $qry = "SELECT  * FROM class_tbl where Name='$res1[2]' AND Insti_id='$Ins_id' ORDER BY Section ASC";
                  $result = $con->query($qry);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    echo ' <select required ' . $readonly . '  name="section" id="txtHint"  class="form-control form-control-lg mb-3">';

                    while ($rows = $result->fetch_assoc()) {
                      echo '<option ' . (($res1['Section'] == $rows['Section']) ? 'selected="selected"' : "") . '  value="' . $rows['Section'] . '" >' . $rows['Section'] . '</option>';
                    }
                    echo '</select>';
                  }
                } else {
                  echo ' <select required  name="section" id="txtHint"  class="form-control form-control-lg mb-3">';
                  echo "<option value=''>--Select Section--</option>";
                  echo "</select>";
                }
                ?>

              </div>
            </div>


        </div>

      </div>
      <!--end of card -->
      <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
        <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
          <h6 class="h4 m-0 font-weight-bold text-primary">Assign Class Teacher</h6>

        </div>
        <div class="card-body">

          <div class="form-group row mb-3">
            <div class="col-xl-5">
              <label class="form-control-label">Select Teacher<span class="text-danger ml-2">*</span></label>
              <?php
              $qry = "SELECT DISTINCT Name  FROM staff_tbl where stype='Teaching' AND Inst_id='$Ins_id' ORDER BY Name ASC";
              $result = $con->query($qry);
              $num = $result->num_rows;
              if ($num > 0) {
                echo ' <select required name="tname" onchange="teacheremail(this.value)" class="form-control form-control-lg mb-3">';
                echo '<option value="">--Select Teacher--</option>';
                while ($rows = $result->fetch_assoc()) {
                  echo '<option ' . (($row['Class_teacher'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                }
                echo '</select>';
              }
              ?>
            </div>
            <div class="col-xl-5">
              <label class="form-control-label">Teacher_Email<span class="text-danger ml-2">*</span></label>

              <?php
              if (isset($Id)) {
                $q = "SELECT * FROM class_tbl where Id='$Id' AND Insti_id='$Ins_id'";
                $res = mysqli_query($con, $q);
                $res1 = mysqli_fetch_array($res);
                if ($res1[3] != "") {
                  $qry = "SELECT  * FROM staff_tbl where Name='$res1[4]' AND Inst_id='$Ins_id' ORDER BY Email ASC";
                  $result = $con->query($qry);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    echo " <select required name='temail' id='emailHint' onchange='teacherDropdown(this.value)' class='form-control form-control-lg mb-3'>";

                    while ($rows = $result->fetch_assoc()) {
                      echo '<option ' . (($res1[3] == $rows['Id']) ? 'selected="selected"' : "") . '  value="' . $rows['Email'] . '" >' . $rows['Email'] . '</option>';
                    }
                    echo '</select>';
                  }
                } else {
                  echo " <select required name='temail' id='emailHint' onchange='teacherDropdown(this.value)' class='form-control form-control-lg mb-3'>";
                  echo "</select>";
                }
              } else {
                echo " <select required name='temail' id='emailHint' onchange='teacherDropdown(this.value)' class='form-control form-control-lg mb-3'>";
                // echo "<option value=''>--Select Section--</option>";
                echo "</select>";
              }
              ?>
            </div>
            <div class="col-xl-2">
              <label class="form-control-label">Teacher_ID<span class="text-danger ml-2">*</span></label>
              <!-- <select required name='tid' id='tidHint' class="form-control mb-3" readonly>
                                </select> -->
              <?php
              if (isset($Id)) {
                $q = "SELECT * FROM class_tbl where Id='$Id' AND Insti_id='$Ins_id'";
                $res = mysqli_query($con, $q);
                $res1 = mysqli_fetch_array($res);
                if ($res1[3] != "") {
                  $qry = "SELECT  * FROM staff_tbl where Id='$res1[3]' AND Inst_id='$Ins_id' ORDER BY Email ASC";
                  $result = $con->query($qry);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    echo " <select required name='tid' id='tidHint' class='form-control mb-3 form-control-lg' readonly>";

                    while ($rows = $result->fetch_assoc()) {
                      echo '<option   value="' . $rows['Id'] . '" >' . $rows['Id'] . '</option>';
                    }
                    echo '</select>';
                  }
                } else {
                  echo "<select required name='tid' id='tidHint' class='form-control mb-3 form-control-lg' readonly>";
                  echo "</select>";
                }
              } else {
                echo "<select required name='tid' id='tidHint' class='form-control mb-3 form-control-lg' readonly>";
                echo "</select>";
              }
              ?>
            </div>
          </div>
          <?php
          if (isset($Id)) {
          ?>
          <div class="form-group row mb-3">

            <div class="col-lg-1">
              <button type="submit" name="update" class="btn btn-warning">Update</button>
            </div>

          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php
          } else {
          ?>
          <div class="form-group row mb-3">

            <div class="col">
              <button type="submit" name="allocate" class="btn btn-primary">Allocate</button>
            </div>
          </div>
          <?php
          }
          ?>

          </form>
        </div>
      </div>
      <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
        <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
          <h6 class="h4 m-0 font-weight-bold text-primary">Class Teachers</h6>

        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
              <tr>
                <th>Class Name</th>
                <th>Section</th>
                <th>Class Teacher</th>
                <th>Teacher_ID</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM class_tbl Where Insti_id='$Ins_id'";
              $rs = $con->query($query);
              $num = $rs->num_rows;
              $sn = 0;
              if ($num > 0) {
                while ($rows = $rs->fetch_assoc()) {

                  echo "
                              <tr>
                               
                                <td>" . $rows['Name'] . "</td>
                                <td>" . $rows['Section'] . "</td>
                                <td>" . $rows['Class_teacher'] . "</td>
                                <td>" . $rows['Teacher_id'] . "</td>
                                <td><a href='?action=edit&Id=" . $rows['Id'] . "' ><i class='fas fa-fw fa-edit'></i>Edit</a></td>
                                <td><a href='?action=delete&Id=" . $rows['Id'] . "' ><i class='fas fa-fw fa-trash'></i>Delete</a></td>
                              </tr>";
                }
              } else {
                echo
                "<div class='alert alert-danger' role='alert'>
                            No Record Found!
                            </div>";
              }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>




  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script>
  $(document).ready(function() {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
  </script>

</body>

</html>