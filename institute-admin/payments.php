<?php
include("../connect.php");
include("../institute-admin/change-header.php");
$statusMsg="";
$a = "payments";
//------------------------SAVE--------------------------------------------------

if (isset($_POST['save'])) {
    $class = $_POST['cclass'];
    $classid = $_POST['ssection'];
    $studid = $_POST['ggrno'];
    $sname = $_POST['ssname'];
    $paid_amount = $_POST['paid_amount'];
    $totalfee = $_POST['ttotalfee'];
    $date = date("Y-m-d");
    $inst_id = $_SESSION['inst_id'];
    $query = "select * from student_tbl where Id='$studid' AND Inst_id='$inst_id'";
    $res1 = mysqli_query($con, $query);
    $r = mysqli_fetch_array($res1);

    $query = mysqli_query($con, "select * from payments where studid ='$studid'");
    $ret = mysqli_fetch_array($query);

    if ($ret > 0) {
        $statusMsg = "<div class='alert alert-danger'>This Class Already Exists!</div>";
        } 
    else {
        
          
            $q = "insert into payments values(null,'$inst_id','" . $r['Grno'] . "','$studid' ,'$classid','$sname','$class','" . $r['Section'] . "','$totalfee','$paid_amount','$date')";
            // echo $q;
            $res = mysqli_query($con, $q);
          
          
              if ($q) {
                $statusMsg = "<div class='alert alert-success'> Created Successfully!</div>";
              } else {
                $statusMsg = "<div class='alert alert-danger'>An error Occurred</div>";
              }
            }
    
}

//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
    $Id = $_GET['Id'];

    $query = mysqli_query($con, "DELETE FROM payments WHERE Id='$Id'");

    if ($query == TRUE) {

        echo "<script type = \"text/javascript\">
				  window.location = (\"payments.php\")
				  </script>";
    } else {

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
    }
}
//------------Edit------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
    $Id = $_GET['Id'];


    $query = mysqli_query($con, "select * from payments where Id ='$Id'");
    $row = mysqli_fetch_array($query);
    echo $row[6];

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
                        window.location = (\"payments.php\")
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
                  window.location = (\"payments.php\")
                  </script>";
            } else {
                $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
            }
        }
    }
}

?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
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

    </script>
</head>

<body>
    <div class="d-flex">
        <?php include("institute-sidebar.php"); ?>
        <div class="">

            <div class="col-lg-12">
                <div class="row mb-4 mt-4">
                    <div class="institute-content p-5  text-muted">
                        <div class="row">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h4 class="text-muted">Enroll Student</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="./">Home</a></li>
                                    <li class="breadcrumb-item active navy-blue m-0 pb-1" aria-current="page">Create Class</li>
                                </ol>
                            </div>
                        </div>

                        <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
                            <!-- <div class="row"> -->
                            <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                                <h4 class="m-0 font-weight-bold text-primary p-2">New Payment</h4>
                                <?php echo $statusMsg; ?>
                            </div>
                            <!-- </div> -->
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="form-group row">
                                            <div class="row mr-2">
                                                <div class="col-sm-4">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <b>List of Payments </b>
                                        <!-- <span class="float:right"><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="new_entry.php" name="new_fees">
                                                <i class="fa fa-plus"></i> New
                                            </a></span> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive p-3">
                                            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>

                                                        <th class="">ID</th>
                                                        <th class="">Name</th>
                                                        <th class="">Class</th>
                                                        <th class="">Section</th>
                                                        <th class="">Fee Amount</th>
                                                        <th class="">Paid Amount</th>
                                                        <th class="">Date</th>
                                                        <th class="">Edit</th>
                                                        <th class="text-center">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $payments = "SELECT * from payments ";

                                                    //$rs = $con->query($payments);
                                                    $rs = mysqli_query($con, $payments);

                                                    $num = $rs->num_rows;
                                                    $sn = 0;
                                                    if ($num > 0) {
                                                        while ($payments = $rs->fetch_assoc()) {
                                                            $sn = $sn + 1;
                                                            echo "
                              <tr>
                                <td>" . $sn . "</td>
                                <td>" . $payments['Id'] . "</td>
                                <td>" . $payments['Name'] . "</td>
                                <td>" . $payments['Class'] . "</td>
                                <td>" . $payments['Section'] . "</td>
                                <td>" . $payments['Amount'] . "</td>
                                <td>" . $payments['Paid_amount'] . "</td>
                                <td>" . $payments['Date'] . "</td>
                                <td><a href='?action=edit&Id=" . $payments['Id'] . "'><i class='fas fa-fw fa-edit'></i>Edit</a></td>
                                <td><a href='?action=delete&Id=" . $payments['Id'] . "'><i class='fas fa-fw fa-trash'></i>Delete</a></td>
                               
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
                            <!-- Table Panel -->
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require("../guest/footer.php");
            ?>
            <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable(); // ID From dataTable 
                    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
                });
            </script>
</body>