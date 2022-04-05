<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");


$inst_id = $_SESSION['inst_id'];
$statusMsg = "";
$a = 'fees';



//------------------------SAVE--------------------------------------------------

if (isset($_POST['save'])) {


  $Class_id = $_REQUEST['class'];
  $Amount = $_REQUEST['amount'];
  // $className=$_REQUEST['Name'];
  // $Description = $_REQUEST['Description'];
  // echo $Class_id;

  $q = "select * from class_tbl where Id='$Class_id' AND Insti_id='$inst_id'";
  // echo $q;
  $res = mysqli_query($con, $q);
  $r = mysqli_fetch_array($res);


  $query = mysqli_query($con, "select * from fees where Class_id ='$Class_id'");
  $ret = mysqli_fetch_array($query);

  if ($ret > 0) {

    $statusMsg = "<div class='alert alert-danger'>This Class Already Exists!</div>";
  } else {

    $query =  "insert into fees values(null,'$Class_id','$r[2]','$Amount')";
    // echo "$query";
    $result = mysqli_query($con, $query);

    // $q="insert into fee_receipt values(null,'$inst_id','$Class_id','$Description','$Amount')";
    // $r=mysqli_query($con,$q);

    if ($query) {
      $statusMsg = "<div class='alert alert-success'> Created Successfully!</div>";
    } else {
      $statusMsg = "<div class='alert alert-danger'>An error Occurred</div>";
    }
  }
}
//--------------------EDIT------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
  $Id = $_GET['Id'];


  $query = mysqli_query($con, "select * from fees where Id ='$Id'");
  $row = mysqli_fetch_array($query);

  //------------UPDATE-----------------------------

  if (isset($_POST['update'])) {

    $Class_id = $_REQUEST['class'];
    $Amount = $_REQUEST['amount'];

    $q = "select * from class_tbl where Id='$Class_id' AND Insti_id='$inst_id'";
    // echo $q;
    $res = mysqli_query($con, $q);
    $row = mysqli_fetch_array($res);
    // echo $row['Id'];

    $query1 = mysqli_query($con, "select * from fees where Class_id ='$Class_id'");
    $ret = mysqli_fetch_array($query1);


    // $inst_id=$_SESSION['inst_id'];
    //   $Class_id=$_REQUEST['class'];  
    //   $Amount=$_REQUEST['amount'];

    //   $className = $_POST['Name'];
    //   // $Stud_limit = $_POST['Stud_limit'];
    //   $q = mysqli_query($con, "select * from fees where  Name ='$className'");
    //   $res = mysqli_fetch_array($q);
    //   $query1 = mysqli_query($con, "select * from fees where  Id ='$res[Id]'");
    //   $ret = mysqli_fetch_array($query1);
    if ($ret > 0) {

      if ($Id == $ret['Id']) {

        $query = mysqli_query($con, "update fees set Amount='$Amount' where Id='$Id'");

        // $query =  "insert into fees values(null,'$Class_id','$r[2]','$Amount')";
        if ($query) {

          echo "<script type = \"text/javascript\">
                      window.location = (\"fees.php\")
                      </script>";
        } else {
          $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
        }
      } else {
        $statusMsg = "<div class='alert alert-danger'>This Class Already Exists!</div>";
      }
    } else {
      $query = mysqli_query($con, "update fees set Name='$Class_id' ,Amount='$Amount' where Id='$Id'");

      if ($query) {

        echo "<script type = \"text/javascript\">
                window.location = (\"fees.php\")
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

  $query = mysqli_query($con, "DELETE FROM fees WHERE Id='$Id'");

  if ($query == TRUE) {

    echo "<script type = \"text/javascript\">
                window.location = (\"fees.php\")
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
    function classDropdown(str) {
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
        xmlhttp.open("GET", "ajaxSection.php?name=" + str, true);
        xmlhttp.send();
      }
    }



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
    // include("SIDEBAR.php");
    ?>
    <div class="institute-content p-5  text-muted">
      <div class="row">
        <div class="d-flex align-items-center justify-content-between mb-4">
          <h4 class="text-muted">Fee details</h4>
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
                  <label class="form-control-label p-2 float-left">Class Name <span class="text-danger ml-2">*</span></label>
                  <?php
                  $qry = "SELECT DISTINCT Name,Id FROM class_tbl Group by Name ORDER BY Name ASC";
                  $result = $con->query($qry);
                  $num = $result->num_rows;
                  if ($num > 0) {
                    echo ' <select required name="class" onchange="classDropdown(this.value)" class="form-control form-control m-1">';
                    echo '<option value="">--Select Class--</option>';
                    while ($rows = $result->fetch_assoc()) {
                      echo '<option ' . (($row['Name'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Id'] . '" >' . $rows['Name'] . '</option>';
                    }
                    echo '</select>';
                  }
                  ?>
                </div>
                <!-- <div class="col">
                  <label class="form-control-label ml-2 p-2">Description <span class="text-danger ml-2">*</span></label>
                  <input type="text" class="form-control" name="Description" value="" required placeholder="Write description">
                </div> -->
                <div class="col">
                  <label class="form-control-label ml-2 p-2">Amount <span class="text-danger ml-2">*</span></label>
                  <input type="number" class="form-control" name="amount" value="<?php if (isset($row['Id'])) echo $row['Amount']; ?>" required placeholder="Amount">
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
          <h4 class="font-weight-bold text-primary p-3">Fee structure</h4>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead>
              <tr class="navy-blue fs-6 p-2 m-2">
                <th>#</th>
                <th>Class</th>
                <th>Total Amount</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM fees";
              $rs = $con->query($query);
              $num = $rs->num_rows;
              $sn = 0;
              // echo $num;
              if ($num > 0) {
                while ($rows = $rs->fetch_array()) {
                  $sn = $sn + 1;
                  // echo $rows[2];
                  echo "
				  <tr>
				  <td>" . $sn . "</td>
				  <td>" . $rows[2] . "</td>                               
				  <td>" . $rows[3] . "</td>
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
  <!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a> -->
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