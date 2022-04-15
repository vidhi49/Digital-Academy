<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("../institute-admin/change-header.php");
// include("../institute-admin/institute-header.php");
$a = "class";
$inst_id = $_SESSION['inst_id'];
?>

<head>
    <!-- <script src="../js/jquery-3.1.1.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#datetimepicker1').datetimepiker();
        });
    </script>

</head>
<html>

<body>
    <div class="d-flex">
        <?php
        include("institute-sidebar.php");
        ?>
        <div class="institute-content">
            <div class="row m-5">
                <div class="col">
                    <!-- <h1>List of All Classes</h1> -->
                </div>
            </div>
            <div class="row m-5">

                <div class="col">
                    <div class="card shadow p-3 bg-white " style="border-radius: 20px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h2> All Class</h2>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <form action="total_inst_rpt.php" target="_blank">
                                        <input type="submit" value="Print" class="btn btn-success fs-4" />
                                    </form>

                                </div>
                            </div>
                            <!-- <div class="d-flex justify-content-center" style="border-radius:10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;background-color: white;"> -->
                            <?php

                            // include("admin-sidebar.php");
                            $q = "select * from Class_tbl where Insti_id='$id' order by Name";
                            $res = mysqli_query($con, $q) or die("Query Failed");
                            $nor = mysqli_num_rows($res);
                            if ($nor > 0) {
                            ?>

                                <div class="table-responsive-md mt-4 table-sm w-100">

                                    <table class="table table-flush table-hover" id="dataTableHover">
                                        <thead class="thead-light">
                                            <tr>

                                                <th scope="th-sm">Class Name</th>
                                                <th scope="th-sm">Section</th>
                                                <th scope="th-sm">Class Teacher</th>
                                                <th scope="th-sm">Student Limit</th>
                                                <th scope="th-sm">Total Student</th>
                                                <th scope="th-sm">Total Subject</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        while ($r = mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<th scope='row'>$r[2]</th>";
                                            echo "<td>$r[7]</td>"; //name
                                            echo "<td>$r[4]</td>"; //email
                                            echo "<td>$r[8]</td>"; //cont
                                            $sq = mysqli_query($con, "select * from student_tbl where Inst_id='$id' and Class_id='$r[0]'");
                                            $nor = mysqli_num_rows($sq);
                                            echo "<td>$nor</td>"; //date
                                            $sq1 = mysqli_query($con, "select * from subject_tbl where Inst_id='$id' and Class_name='$r[2]'");
                                            $nor1 = mysqli_num_rows($sq1);
                                            echo "<td>$nor1</td>"; //date

                                        }
                                        echo "</tr>";
                                    } else {
                                        echo "<center><h1>No Institute is Found</h1></center>";
                                    }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
</body>

</html>