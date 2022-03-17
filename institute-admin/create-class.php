<?php include("../connect.php");
session_start();
// include("../admin/admin-header.php");
// include("../institute-admin/change-header.php");
include("../institute-admin/institute-header.php");


$Ins_id = $_SESSION['inst_id'];
$statusMsg = "";
$a = 'class';
//------------------------SAVE--------------------------------------------------
if (isset($_POST['save'])) {

  $className = $_POST['Name'];
  $Stud_limit = $_POST['Stud_limit'];
  $sec = $_POST['Section'];
  $query = mysqli_query($con, "select * from class_tbl where Name ='$className'");
  $ret = mysqli_fetch_array($query);

  if ($ret > 0) {

    $statusMsg = "<div class='alert alert-danger'>This Class Already Exists!</div>";
  } else {

    $query = mysqli_query($con, "insert into class_tbl(Insti_id,Name,Section,Stud_limit) values('$Ins_id','$className','$sec','$Stud_limit')");

    if ($query) {

      $statusMsg = "<div class='alert alert-success'  >Created Successfully!</div>";
    } else {
      $statusMsg = "<div class='alert alert-danger'>An error Occurred</div>";
    }
  }
}

//--------------------EDIT------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
  $Id = $_GET['Id'];


  $query = mysqli_query($con, "select * from class_tbl where Id ='$Id'");
  $row = mysqli_fetch_array($query);

  //------------UPDATE-----------------------------

  if (isset($_POST['update'])) {

    $className = $_POST['Name'];
    $Stud_limit = $_POST['Stud_limit'];
    $q = mysqli_query($con, "select * from class_tbl where  Name ='$className'");
    $res = mysqli_fetch_array($q);
    $query1 = mysqli_query($con, "select * from class_tbl where  Id ='$res[Id]'");
    $ret = mysqli_fetch_array($query1);
    if ($ret > 0) {

      if ($Id == $res['Id']) {

        $query = mysqli_query($con, "update class_tbl set Stud_limit='$Stud_limit' where Id='$Id'");

        if ($query) {

          echo "<script type = \"text/javascript\">
                      window.location = (\"create-class.php\")
                      </script>";
        } else {
          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
      } else {
        $statusMsg = "<div class='alert alert-danger'>This Class Already Exists!</div>";
      }
    } else {
      $query = mysqli_query($con, "update class_tbl set Name='$className' ,Stud_limit='$Stud_limit' where Id='$Id'");

      if ($query) {

        echo "<script type = \"text/javascript\">
                window.location = (\"create-class.php\")
                </script>";
      } else {
        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
      }
    }
  }
}


//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
  $Id = $_GET['Id'];

  $query = mysqli_query($con, "DELETE FROM class_tbl WHERE Id='$Id'");

  if ($query == TRUE) {

    echo "<script type = \"text/javascript\">
                window.location = (\"create-class.php\")
                </script>";
  } else {

    $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
  }
}

?>

<head>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" href="../css/style.css" />

  <link href=" css/ruang-admin.min.css" rel="stylesheet"> -->
  <script>
  $(document).ready(function() {
    // $(".container").fadeIn("slow");
    $(".institute-content").fadeIn(1000);
    // alert("hello");
  });
  </script>
</head>
<html>

<body>
  <div class="d-flex">
    <?php
    include("institute-sidebar.php");
    ?>
    <div class="institute-content p-5  text-muted">
      <div class="row">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h4 class="text-muted">Create Class</h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active navy-blue m-0 pb-1" aria-current="page">Create Class</li>
          </ol>
        </div>
      </div>

      <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
        <!-- <div class="row"> -->
        <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
          <h4 class="m-0 font-weight-bold text-primary p-2">Add Class</h4>
          <?php echo $statusMsg; ?>
        </div>
        <!-- </div> -->
        <div class="card-body">
          <form method="post">
            <div class="row">
              <div class="form-group row">
                <div class="col-sm-4">
                  <label class="form-control-label p-2 float-left">Class Name <span
                      class="text-danger ml-2">*</span></label>
                  <input type="text" class="form-control" name="Name"
                    value="<?php if (isset($row['Name'])) echo $row['Name']; ?>" placeholder="Class Name" required>
                </div>
                <div class="col-sm-4">
                  <label class="form-control-label p-2">Class Section <span class="text-danger ml-2"> *</span></label>
                  <input type="text" class="form-control" name="Section"
                    value="<?php if (isset($row['Section'])) echo $row['Section']; ?>" placeholder="Class Section"
                    required>
                </div>
                <div class="col-sm-4">
                  <label class="form-control-label p-2">Student Limit <span class="text-danger ml-2"> *</span></label>
                  <input type="number" class="form-control" name="Stud_limit"
                    value="<?php if (isset($row['Stud_limit'])) echo $row['Stud_limit']; ?>" required
                    placeholder="Student Limit">
                </div>
              </div>
            </div>
            <?php
            if (isset($Id)) {

            ?>
            <button type="submit" name="update" class="btn btn-warning">Update</button>
            <?php
            } else {

            ?>
            <button type="submit" name="save" class="btn btn-primary MT-2">Save</button>
            <?php
            }
            ?>
          </form>
        </div>

      </div>
      <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
        <div class="card-header  d-flex flex-row align-items-center justify-content-between">
          <h4 class="font-weight-bold text-primary p-3">All Classes</h4>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead>
              <tr class="navy-blue fs-6 p-2 m-2">
                <th>#</th>
                <th>Class Name</th>
                <th>Section</th>
                <th>Student Limit</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM class_tbl";
              $rs = $con->query($query);
              $num = $rs->num_rows;
              $sn = 0;
              if ($num > 0) {
                while ($rows = $rs->fetch_assoc()) {
                  $sn = $sn + 1;
                  echo "
                              <tr>
                                <td>" . $sn . "</td>
                                <td>" . $rows['Name'] . "</td>
                                <td>" . $rows['Section'] . "</td>
                                <td>" . $rows['Stud_limit'] . "</td>
                                <td><a href='?action=edit&Id=" . $rows['Id'] . "'><i class='fas fa-fw fa-edit'></i>Edit</a></td>
                                <td><a href='?action=delete&Id=" . $rows['Id'] . "'><i class='fas fa-fw fa-trash'></i>Delete</a></td>
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
  <?php
  require("../guest/footer.php");
  ?>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script> -->
  <!-- <script src="js/ruang-admin.min.js"></script> -->
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