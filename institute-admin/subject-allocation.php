<?php include("../connect.php");
include("change-header.php");
$Ins_id = $_SESSION['inst_id'];
$statusMsg = "";
$disabled = "";
//------------------------SAVE--------------------------------------------------
if (isset($_POST['save'])) {
    $className = $_POST['name'];
    $section = $_POST['section'];
    $tname = $_POST['tname'];
    // $temail = $_POST['temail'];
    $tid = $_POST['tid'];
    $subCode = $_POST['subcode'];
    echo $className, $section, $tname, $tid, $subCode;
    $q = "select Sub_name from subject_tbl where Sub_code='$subCode'";
    $res = mysqli_query($con, $q);
    $result = mysqli_fetch_array($res);
    echo $result[0];
    $q1 = "select Section from class_tbl where Id='$section'";
    $res1 = mysqli_query($con, $q1);
    $result1 = mysqli_fetch_array($res1);
    echo $result1[0];
    $query = mysqli_query($con, "insert into teacher_wise_subject_tbl values(null,'$tid','$tname','$section','$className','$subCode','$result[0]','$result1[0]','$Ins_id')");
    if ($query) {

        $statusMsg = "<div class='alert alert-success'>Successfully Assigned!</div>";
    } else {
        $statusMsg = "<div class='alert alert-danger'>An error Occurred" . mysqli_error($con) . "</div>";
    }
}

//--------------------EDIT------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "edit") {
    $Id = $_GET['Id'];
    $disabled = "disabled";
    $query = mysqli_query($con, "select * from teacher_wise_subject_tbl where Id ='$Id'");
    $row = mysqli_fetch_array($query);
}


//--------------------------------DELETE------------------------------------------------------------------

if (isset($_GET['Id']) && isset($_GET['action']) && $_GET['action'] == "delete") {
    $Id = $_GET['Id'];

    $query = mysqli_query($con, "DELETE FROM teacher_wise_subject_tbl WHERE Id='$Id'");

    if ($query == TRUE) {

        echo "<script type = \"text/javascript\">
                window.location = (\"subject-allocation.php\")
                </script>";
    } else {

        $statusMsg = "<div class='alert alert-danger' style='margin-right:700px;'>An error Occurred!</div>";
    }
}



?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Nova+Slim" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/css/ruang-admin.min.css" rel="stylesheet">
    <script>
        function sectionDropdown(str) {
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
                xmlhttp.open("GET", "ajaxSubject.php?classId=" + str, true);
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
    </script>
</head>
<html>

<body>
    <div class="container p-5 text-muted h6">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Subject Allocation</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subject Allocation</li>

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
                            $qry = "SELECT DISTINCT Name FROM class_tbl ORDER BY Name ASC";
                            $result = $con->query($qry);
                            $num = $result->num_rows;
                            if ($num > 0) {
                                echo ' <select required ' . $disabled . ' name="name" onchange="sectionDropdown(this.value)" class="form-control mb-3">';
                                echo '<option value="">--Select Class--</option>';
                                while ($rows = $result->fetch_assoc()) {
                                    echo '<option ' . (($row['Class_name'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                                }
                                echo '</select>';
                            }
                            ?>
                        </div>
                        <div class="col-xl-6">
                            <label class="form-control-label">Class Section<span class="text-danger ml-2">*</span></label>
                            <?php
                            if (isset($Id)) {
                                $q = "SELECT * FROM teacher_wise_subject_tbl where Id='$Id'";
                                $res = mysqli_query($con, $q);
                                $res1 = mysqli_fetch_array($res);

                                $qry = "SELECT  * FROM class_tbl where Name='$res1[4]' ORDER BY Section ASC";
                                $result = $con->query($qry);
                                $num = $result->num_rows;

                                if ($num > 0) {

                                    echo ' <select required ' . $disabled . ' name="section" id="section" onchange="subjectDropdown(this.value)" class="form-control mb-3">';

                                    while ($rows = $result->fetch_assoc()) {
                                        echo '<option ' . (($res1['Section'] == $rows['Section']) ? 'selected="selected"' : "") . '  value="' . $rows['Section'] . '" >' . $rows['Section'] . '</option>';
                                    }
                                    echo '</select>';
                                }
                            } else {
                                echo ' <select required   name="section" id="section" onchange="subjectDropdown(this.value)"  class="form-control mb-3">';
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
                <h6 class="h4 m-0 font-weight-bold text-primary">Assign Subject Teacher</h6>

            </div>
            <div class="card-body">

                <div class="form-group row mb-3">
                    <div class="col-xl-5">
                        <label class="form-control-label">Select Teacher<span class="text-danger ml-2">*</span></label>
                        <?php
                        $qry = "SELECT DISTINCT Name  FROM staff_tbl where stype='Teaching' ORDER BY Name ASC";
                        $result = $con->query($qry);
                        $num = $result->num_rows;
                        if ($num > 0) {
                            echo ' <select required name="tname" onchange="teacheremail(this.value)" class="form-control mb-3">';
                            echo '<option value="">--Select Teacher--</option>';
                            while ($rows = $result->fetch_assoc()) {
                                echo '<option ' . (($row['Teacher_name'] == $rows['Name']) ? 'selected="selected"' : "") . ' value="' . $rows['Name'] . '" >' . $rows['Name'] . '</option>';
                            }
                            echo '</select>';
                        }
                        ?>
                    </div>
                    <div class="col-xl-5">
                        <label class="form-control-label">Teacher_Email<span class="text-danger ml-2">*</span></label>

                        <?php
                        if (isset($Id)) {
                            $q = "SELECT * FROM teacher_wise_subject_tbl where Id='$Id'";
                            $res = mysqli_query($con, $q);
                            $res1 = mysqli_fetch_array($res);

                            $qry = "SELECT  * FROM staff_tbl where Name='$res1[2]' ORDER BY Email ASC";
                            $result = $con->query($qry);
                            $num = $result->num_rows;
                            if ($num > 0) {
                                echo " <select required name='temail' id='emailHint' onchange='teacherDropdown(this.value)' class='form-control mb-3'>";

                                while ($rows = $result->fetch_assoc()) {
                                    echo '<option ' . (($res1[2] == $rows['Id']) ? 'selected="selected"' : "") . '  value="' . $rows['Email'] . '" >' . $rows['Email'] . '</option>';
                                }
                                echo '</select>';
                            }
                        } else {
                            echo " <select required name='temail' id='emailHint' onchange='teacherDropdown(this.value)' class='form-control mb-3'>";

                            echo "</select>";
                        }
                        ?>
                    </div>
                    <div class="col-xl-2">
                        <label class="form-control-label">Teacher_ID<span class="text-danger ml-2">*</span></label>

                        <?php
                        if (isset($Id)) {
                            $q = "SELECT * FROM teacher_wise_subject_tbl where Id='$Id'";
                            $res = mysqli_query($con, $q);
                            $res1 = mysqli_fetch_array($res);

                            $qry = "SELECT  * FROM staff_tbl where Id='$res1[1]' ORDER BY Email ASC";
                            $result = $con->query($qry);
                            $num = $result->num_rows;
                            if ($num > 0) {
                                echo " <select required name='tid' id='tidHint' class='form-control mb-3' readonly>";

                                while ($rows = $result->fetch_assoc()) {
                                    echo '<option   value="' . $rows['Id'] . '" >' . $rows['Id'] . '</option>';
                                }
                                echo '</select>';
                            }
                        } else {
                            echo "<select required name='tid' id='tidHint' class='form-control mb-3' readonly>";
                            echo "</select>";
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row mb-3">

                    <div class="col-xl-6">
                        <label class="form-control-label">Select Subject<span class="text-danger ml-2">*</span></label>
                        <!-- <select required name="subject" id='subject' onchange='subcodeDropdown(this.value)' class="form-control mb-3">
                            <option value="">--Select Subject--</option>

                        </select> -->
                        <?php
                        if (isset($Id)) {
                            $q = "SELECT * FROM teacher_wise_subject_tbl where Id='$Id'";
                            $res = mysqli_query($con, $q);
                            $res1 = mysqli_fetch_array($res);

                            $qry = "SELECT  * FROM subject_tbl where Sub_code='$res1[5]' ";
                            $result = $con->query($qry);
                            $num = $result->num_rows;
                            if ($num > 0) {
                                echo " <select required name='subject' id='subject' onchange='subcodeDropdown(this.value)' class='form-control mb-3'>";

                                while ($rows = $result->fetch_assoc()) {
                                    echo '<option ' . (($res1[5] == $rows['Sub_code']) ? 'selected="selected"' : "") . '  value="' . $rows['Sub_code'] . '" >' . $rows['Sub_name'] . '</option>';
                                }
                                $que = "select Sub_code,Sub_name from Subject_tbl where Class_name='" . $res1[4] . "' and NOT Sub_code IN (Select Sub_code From teacher_wise_subject_tbl where Class_id='$res1[3]') ";
                                $result = mysqli_query($con, $que);
                                while ($r = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $r['Sub_code'] . '" >' . $r['Sub_name'] . '</option>';
                                }
                                echo '</select>';
                            }
                        } else {
                            echo " <select required name='subject' id='subject' onchange='subcodeDropdown(this.value)' class='form-control mb-3'>";

                            echo "</select>";
                        }
                        ?>
                    </div>
                    <div class="col-xl-6">
                        <label class="form-control-label">Subject Code<span class="text-danger ml-2">*</span></label>
                        <!-- <select required name="subcode" readonly id='sub_code' class="form-control mb-3">
                        </select> -->
                        <?php
                        if (isset($Id)) {
                            $q = "SELECT * FROM teacher_wise_subject_tbl where Id='$Id'";
                            $res = mysqli_query($con, $q);
                            $res1 = mysqli_fetch_array($res);
                                echo " <select required name='subcode' id='sub_code' class='form-control mb-3' readonly>";
                                       echo '<option   value="' . $res1['Sub_code'] . '" >' . $res1['Sub_code'] . '</option>';
                                echo '</select>';
                          
                        } else {
                            echo "<select required name='subcode' id='sub_code' class='form-control mb-3' readonly>";
                            echo "</select>";
                        }
                        ?>
                    </div>

                </div>
                <div class="form-group row mb-3">
                    <div class="col">
                        <button type="submit" name="save" class="btn btn-primary">Allocate</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="card mb-4" style='box-shadow: rgba(0, 0, 0, 0.30) 0px 3px 8px;'>
            <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                <h6 class="h4 m-0 font-weight-bold text-primary">Subject Teachers</h6>

            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Class Name</th>
                            <th>Section</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Subject Teacher</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM teacher_wise_subject_tbl";
                        $rs = $con->query($query);
                        $num = $rs->num_rows;
                        $sn = 0;
                        if ($num > 0) {
                            while ($rows = $rs->fetch_assoc()) {
                                $sn = $sn + 1;
                                echo "
                              <tr>
                                <td>" . $sn . "</td>
                                <td>" . $rows['Class_name'] . "</td>
                                <td>" . $rows['Section'] . "</td>
                                <td>" . $rows['Sub_code'] . "</td>
                                <td>" . $rows['Sub_name'] . "</td>
                                <td>" . $rows['Teacher_name'] . "</td>
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

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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