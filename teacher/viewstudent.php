<?php
include('../connect.php');
// session_start();
include('teacher-header.php');
$teacher_id = $_SESSION['Id'];
$inst_id = $_SESSION['Inst_id'];
$page="";

?>
<html>

<body>
    <div class="d-flex">
        <?php include("teacher-sidebar.php"); ?>
        <!-- <div class="container-fluid ml-4 "> -->

        <div class="content mt-5 p-3 ">
            <div class="d-flex justify-content-center">
                <div class="institute-content  text-muted">
                    <div class="row mx-5">
                        <?php
                        $q = "select * from class_tbl where Teacher_id='$teacher_id'";
                        $result = mysqli_query($con, $q);
                        $num = mysqli_num_rows($result);
                        $r = mysqli_fetch_array($result);
                        if ($num > 0) {
                            echo ' <h2 class="text-black font-w700 ml-3 mb-5">
                                     Students Of ' . $r['Name'] . '-' . $r['Section'] . '
                                                            </h2>
                                                        
                                           ';
                            $q1 = "select * from student_tbl where Class_id='$r[0]'";
                            $result1 = mysqli_query($con, $q1);
                            $num1 = mysqli_num_rows($result1);
                            if ($num1 > 0) {
                                while ($r1 = mysqli_fetch_array($result1)) {
                                    echo '
                                            <div class="col-xl-4 col-sm-4">
                                            <div class="card shadow p-3 mb-5 bg-white " style="border-radius: 20px;">
                                                <div class="card-body">
                                                    <div class="media align-items-center">
                                                        <div class="media-body mr-3">
                                                            <h2 class="text-black font-w700">
                                                                    ' . $r1['Name'] . '
                                                            </h2>
                                                            <p class="mb-0 text-black font-w600">' . $r1['Class'] . '-' . $r1['Section'] . '</p>
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <img src="../institute-admin/student_profile/' . $r1['Profile'] . '" style="border-radius:50%" height=100 width=100>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            
                                           ';
                                }
                            } else {
                                echo '
                                        
                                        <div class="col-xl-12 col-sm-12">
                                        <div class="card shadow p-3 mb-5 bg-white " style="border-radius: 20px;">
                                            <div class="card-body">
                                                <div class="media align-items-center">
                                                    <div class="media-body mr-3">
                                                        <h2 class="text-black font-w700">
                                                            Your Are not a Class Teacher
                                                        </h2>
                                                        <!-- <p class="mb-0 text-black font-w600">Total Students</p> -->
                                                    </div>
                                                    <div class="d-inline-block">
                                                        <a class="text-dark">
                                                            <li class="fa fa-bookmark fs-1"></li>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        ';
                            }
                        } else {
                        ?>

                            <div class="col-xl-12 col-sm-12">
                                <div class="card shadow p-3 mb-5 bg-white " style="border-radius: 20px;">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body mr-3">
                                                <h2 class="text-black font-w700">
                                                    Your Are not a Class Teacher
                                                </h2>
                                                <!-- <p class="mb-0 text-black font-w600">Total Students</p> -->
                                            </div>
                                            <div class="d-inline-block">
                                                <a class="text-dark">
                                                    <li class='fa fa-bookmark fs-1'></li>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    <?php include("../guest/footer.php"); ?>
</body>

</html>