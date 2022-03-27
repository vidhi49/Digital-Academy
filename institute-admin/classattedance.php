<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "viewclassattadence";
$inst_id = $_SESSION['inst_id'];


$class = $_REQUEST['class'];
$section = $_REQUEST['section'];
$q = "select * from class_tbl where Id='$section' AND Insti_id='$inst_id'";
$result = mysqli_query($con, $q);
$r = mysqli_fetch_array($result);
$classteacher = $r['Class_teacher'];


?>

<head>
    <script src="../js/jquery-3.1.1.min.js"></script>
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
            $("#colfrom").hide();
            $("#colto").hide();
            $("#coldate").hide();
            $("#type").on('change', function() {
                if ($("#type").val() == 'singledate') {
                    $("#coldate").show();
                    $("#colfrom").hide();
                    $("#colto").hide();
                }
                if ($("#type").val() == 'range') {
                    $("#colfrom").show();
                    $("#colto").show();
                    $("#coldate").hide();
                }
            });



        });
    </script>
</head>
<html>

<body>
    <div class="d-flex">
        <?php
        include("institute-sidebar.php");
        ?>
        <div class="institute-content  text-muted">
            <div class="row m-5 bg-white" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                <div class="col ">
                    <form method="post" id="form" class="p-4 m-2">
                        <!-- <div id="selectclass" style="display: none;"> -->

                        <div id="selectdate">
                            <div>
                                <h1 class="fs-2 text-dark ">Select Date</h1>
                                <hr>

                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col" id="coltype">
                                    <label class="form-label ml-2 p-1"> Type : <span class="text-danger">*</span></label>
                                    <select id='type' class="form-control form-control-lg m-1">
                                        <option value="">--Select Type--</option>
                                        <option value="singledate"> Single Date </option>
                                        <option value="range"> Range </option>

                                    </select>
                                </div>
                                <div class=" col " id="coldate">
                                    <label class="form-label ml-2 p-1">Select Date:<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg m-1" type="date" id="date" name="date">
                                </div>
                                <div class=" col " id="colfrom">
                                    <label class="form-label ml-2 p-1">Form:<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg m-1" type="date" id="from_date" name="from_date">
                                </div>
                                <div class=" col " id="colto">
                                    <label class="form-label ml-2 p-1">To:<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg m-1" type="date" id="to_date" name="to_date">
                                </div>
                            </div>
                            <div class="pt-1 mb-4">
                                <button class="btn bg-navy-blue text-white btn-lg " id="show" name="show" type="submit">Show Attedance</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="row m-5 bg-white" id="atttable" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                <div class="col ">
                    <form method="post" class="p-4 m-2">
                        <!-- <div id="selectclass" style="display: none;"> -->
                        <div>
                            <div>
                                <h1 class="fs-2 text-dark ">Todays Attedence(<?php echo date('d-F') ?>)</h1>
                                <hr>
                                Class Teacher: <?php echo ucwords($classteacher); ?>
                            </div>
                            <br>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th>Roll No.</th> -->

                                            <th>Name</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        include("../connect.php");
                                        $todaydate=date('l');
                                        if($todaydate!='Sunday')
                                        {
                                            $query = "SELECT * FROM class_wise_student where Inst_id='$inst_id' AND Class_id='$section'";
                                            $rs = $con->query($query);
                                            $num = $rs->num_rows;
                                            $sn = 0;
                                            if ($num > 0) {
                                                while ($rows = $rs->fetch_assoc()) {
                                                    echo "<tr>
                                                     <td>" . $rows['Stud_name'] . "</td>";
                                                    $q1 = "select * from attendance_tbl where Class_id='$section' AND Inst_id ='$inst_id' AND Grno='" . $rows['Grno'] . "' AND Date='".date('Y-m-d')."'";
                                                    $res = mysqli_query($con, $q1);
                                                    $nor1=mysqli_num_rows($res);
                                                    if($nor1==0)
                                                    {
                                                        echo
                                                        "<div class='alert alert-danger' role='alert'>
                                                        Attedance is Not Taken Yet!
                                                        </div>";
                                                    }
                                                    else
                                                    {
                                                    while ($r1 = mysqli_fetch_array($res)) {
                                                        if ($r1['Status'] == 1) {
                                                            echo "<td><i class='fa fa-check-square' style='color:green;font-size:30px;'></i></td>";
                                                        } else {
                                                            echo "<td><i class='fa fa-window-close' style='color:red;font-size:30px;'></i></td>";
                                                        }
                                                    }
                                                    echo "</tr>";
                                                     }
                                                }
                                            } else {
                                                echo
                                                "<div class='alert alert-danger' role='alert'>
                                                No Record Found!
                                                </div>";
                                            }
                                        }
                                        else
                                        {
                                            echo
                                            "<div class='alert alert-danger' role='alert'>
                                            Today is Sunday!!!
                                            </div>";
                                        }
                                        

                                        ?>
                                    </tbody>
                                </table>
                            </div>


                        </div>


                    </form>
                </div>
            </div>
            <div class="row m-5 bg-white" id="datewiseatt" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; display:none;">

                <div class="col ">
                    <form method="post" class="p-4 m-2">
                        <!-- <div id="selectclass" style="display: none;"> -->
                        <div>
                            <div>
                                <h1 class="fs-2 text-dark ">Attedence (<?php echo $_REQUEST['date']; ?>)</h1>
                                <hr>
                                Class Teacher: <?php echo ucwords($classteacher); ?>
                            </div>
                            <br>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th>Roll No.</th> -->

                                            <th>Name</th>

                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        include("../connect.php");
                                        $date = $_REQUEST['date'];
                                        $unixTimestamp = strtotime($date);
                                        $weekday = date('l',$unixTimestamp);
                                        if ($weekday == 'Sunday') {
                                            echo
                                                "<div class='alert alert-danger' role='alert'>
                                                $date is Sunday!
                                                </div>";
                                           
                                        } else 
                                        {
                                            
                                                $q2 = "select * from attendance_tbl where Inst_id='$inst_id' AND Class_id='$section' AND Date ='$date'";
                                                $res2 = mysqli_query($con, $q2);
                                                $nor = mysqli_num_rows($res2);
                                                if ($nor > 0) {
                                                    $query = "SELECT * FROM class_wise_student where Inst_id='$inst_id' AND Class_id='$section'";
                                                    $rs = $con->query($query);
                                                    $num = $rs->num_rows;
                                                    $sn = 0;
                                                    if ($num > 0) {
                                                        while ($rows = $rs->fetch_assoc()) {
                                                            echo "<tr>
                                                         <td>" . $rows['Stud_name'] . "</td>";
                                                            $q1 = "select * from attendance_tbl where Class_id='$section' AND Inst_id ='$inst_id' AND Grno='" . $rows['Grno'] . "'";
                                                            $res = mysqli_query($con, $q1);
                                                            while ($r1 = mysqli_fetch_array($res)) {
                                                                if ($r1['Status'] == 1) {
                                                                    echo "<td><i class='fa fa-check-square' style='color:green;font-size:30px;'></i></td>";
                                                                } else {
                                                                    echo "<td><i class='fa fa-window-close' style='color:red;font-size:30px;'></i></td>";
                                                                }
                                                            }
                                                            echo "</tr>";
                                                        }
                                                    }
                                                } else {
    
                                                    echo
                                                    "<div class='alert alert-danger' role='alert'>
                                                    No Attendace is taken on this day!
                                                    </div>";
                                                }
                                        }





                                        ?>
                                    </tbody>
                                </table>
                            </div>


                        </div>


                    </form>
                </div>
            </div>
            <div class="row m-5 bg-white" id="rangewiseatt" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; display:none;">

                <div class="col ">
                    <form method="post" class="p-4 m-2">
                        <!-- <div id="selectclass" style="display: none;"> -->
                        <div>
                            <div>
                                <h1 class="fs-2 text-dark ">Attedence From(<?php echo $_REQUEST['from_date'].")  To(".$_REQUEST['to_date'].")"; ?></h1>
                                <hr>
                                Class Teacher: <?php echo ucwords($classteacher); ?>
                            </div>
                            <br>
                            <div class="table-responsive p-3">
                                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th>Roll No.</th> -->

                                            <?php
                                                $fromdate=$_REQUEST['from_date'];
                                                $todate=$_REQUEST['to_date'];
                                                
                                            ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>


                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_REQUEST['show'])) {
    if($_REQUEST['date']!="")
    {
    echo "<script>$('#atttable').hide();$('#datewiseatt').show();$('#rangewiseatt').hide();</script>";
        
    }
    else if($_REQUEST['from_date']!="" && $_REQUEST['to_date']!="")
    {
        echo "<script>$('#atttable').hide();$('#datewiseatt').hide();$('#rangewiseatt').show();</script>";
    }
}

?>