<?php
// session_start();
include("../connect.php");
include("../institute-admin/change-header.php");
$a = "fees";
//------------------------------edit---------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
    $Id = $_GET['Id'];
  
  
    $query = mysqli_query($con, "select * from payments where Id ='$Id'");
    $row = mysqli_fetch_array($query);
  
    //------------UPDATE------------------------------------------------------------
  
    if (isset($_POST['update'])) {
  
      $Class_id = $_REQUEST['class'];
      $paid_amount = $_REQUEST['paid_amount'];
  
      $q = "select * from class_tbl where Id='$Class_id' AND Insti_id='$inst_id'";
      // echo $q;
      $res = mysqli_query($con, $q);
      $row = mysqli_fetch_array($res);
      // echo $row['Id'];
  
      $query1 = mysqli_query($con, "select * from payments where Class_id ='$Class_id'");
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
  
          $query = mysqli_query($con, "update payments set Paid_amount='$paid_amount' where Id='$Id'");
  
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
        $query = mysqli_query($con, "update payments set Name='$Class_id' ,Paid_amount='$paid_amount' where Id='$Id'");
  
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
  
?>

<head>

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

        function grnodropdown(str) {
            if (str == "") {
                document.getElementById("grno").innerHTML = "";
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
                        document.getElementById("grno").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxGrno.php?classid=" + str, true);
                xmlhttp.send();
            }
        }

        function snamedropdown(str) {
            if (str == "") {
                document.getElementById("sname").innerHTML = "";
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
                        document.getElementById("sname").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxStudent.php?studid=" + str, true);
                xmlhttp.send();
            }
        }

        function totamountdropdown(str) {
            if (str == "") {
                document.getElementById("totalfee").innerHTML = "";
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
                        document.getElementById("totalfee").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ajaxTotalamount.php?classid=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

</head>

<body>
    <div class="d-flex">
        <?php include("institute-sidebar.php"); ?>
        <div class=" institute-content p-5 text-muted h6">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h1 mb-0 text-muted">Enroll student</h1>

            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="card mb-4 " style='box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;'>
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                        <!--row-->
                        <div class="row mr-2">
                            <div class="col">
                                <label class="form-control-label ml-2 p-1">Select Class<span class="text-danger ml-2">*</span></label>
                                <?php
                                $qry = "SELECT DISTINCT Name FROM class_tbl ORDER BY Name ASC";
                                $result = $con->query($qry);
                                $num = $result->num_rows;
                                if ($num > 0) {
                                    echo ' <select   name="cclass" onchange="classDropdown(this.value)" class="form-control form-control m-1">';
                                    echo '<option value="">--Select Class--</option>';
                                    while ($rows = $result->fetch_assoc()) {
                                        echo '<option ' . (($row['Name'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                                    }
                                    echo '</select>';
                                }
                                ?>
                            </div>
                            <div class="col">
                                <label class="form-control-label ml-2 p-1">Class Section<span class="text-danger ml-2">*</span></label>
                                <?php
                                echo ' <select    name="ssection" id="section" onchange="grnodropdown(this.value);totamountdropdown(this.value)" class="form-control form-control m-1">';
                                echo "<option value=''>--Select Section--</option>";
                                echo "</select>";
                                ?>

                            </div>
                            <div class="col">
                                <label class="form-control-label ml-2 p-1">Grno <span class="text-danger ml-2">*</span></label>
                                <?php
                                echo ' <select name="ggrno" id="grno" onchange="snamedropdown(this.value)" class="form-control form-control m-1">';
                                echo "<option value=''>--Grno--</option>";
                                echo "</select>";
                                ?>
                            </div>
                            <div class="col">
                                <label class="form-control-label ml-2 p-1">Student-Name <span class="text-danger ml-2">*</span></label>
                                <?php
                                echo ' <select name="ssname" id="sname"  class="form-control form-control m-1"  >';
                                echo "<option value=''>--Name--</option>";
                                echo "</select>";

                                ?>
                            </div>
                            <div class="col">
                                <label class="form-control-label ml-2 p-1">Total Fees <span class="text-danger ml-2">*</span></label>
                                <?php
                                echo ' <select name="ttotalfee" id="totalfee"  class="form-control form-control m-1"  >';
                                echo "<option value=''>--Fees--</option>";
                                echo "</select>";

                                ?>
                            </div>
                            <div class="col">
                                <label class="form-control-label ml-2 p-2">Amount <span class="text-danger ml-2">*</span></label>
                                <input type="number" class="form-control" name="paid_amount" value="<?php if (isset($row['Id'])) echo $row['Paid_amount']; ?>" required placeholder="Amount">
                            </div>
                            <div class="row py-3">

                                <div class="col">
                                    <input type="submit" name="submit" id="submit" class="btn  btn-primary">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <?php
  require("../guest/footer.php");
  ?>
</body>

<?php
if (isset($_POST['submit'])) {
    $class = $_POST['cclass'];
    $classid = $_POST['ssection'];
    $studid = $_POST['ggrno'];
    $sname = $_POST['ssname'];
    $paid_amount = $_POST['paid_amount'];
    $totalfee = $_POST['ttotalfee'];
    $date = date("d-m-Y");
    $inst_id=$_SESSION['inst_id'];
    $query="select * from student_tbl where Id='$studid' AND Inst_id='$inst_id'";
    $res1=mysqli_query($con,$query);
    $r=mysqli_fetch_array($res1);
    
    $q = "insert into payments values(null,'$inst_id','".$r['Grno']."','$studid' ,'$classid','$sname','$class','".$r['Section']."','$totalfee','$paid_amount','$date')";
    $res = mysqli_query($con, $q);
    // echo $q;
    if ($res) {
        echo "  <script> Swal.fire('Enrolled successfully')
        </script>";
    } else {
        die("<center><h1>Query Failed" . mysqli_error($con) . "</h1></center>");
    }
}

?>