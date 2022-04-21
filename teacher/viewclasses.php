<?php
include('../connect.php');
// session_start();
include('teacher-header.php');
$teacher_id = $_SESSION['Id'];
$inst_id = $_SESSION['Inst_id'];
$page = "";
?>
<html>

<body>
  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <!-- <div class="container-fluid ml-4 "> -->

    <div class="content  text-muted">
      <div class="d-flex justify-content-center align-items-center">
        <div class="row mt-5">
          <?php
                    $q = "select * from teacher_wise_subject_tbl where Teacher_id='$teacher_id'";
                    $result = mysqli_query($con, $q);
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        while ($r = mysqli_fetch_array($result)) {
                            echo '
                                        <div class="col-sm-6">
                                        
                                        <div class="card shadow bg-white m-5" style="border-radius: 20px;">
                                            <div class="card-body p-5">
                                                <div class="media align-items-center">
                                                    <div class="media-body m-3">
                                                        <h2 class="text-black font-w700  me-5">
                                                                ' . $r['Sub_name'] . '
                                                        </h2>
                                                        <p class="mb-0 text-black font-w600 me-5">' . $r['Class_name'] . '-' . $r['Section'] . '</p>
                                                    </div>
                                                    <div class="float-right">
                                                        <a class="text-dark">
                                                            <li class="fa fa-bookmark fs-1 ms-5"></li>
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

          <div class="col-sm-6">
            <div class="card shadow  bg-white " style="border-radius: 20px;">
              <div class="card-body">
                <div class="media align-items-center">
                  <div class="media-body mr-3">
                    <h2 class="text-black font-w700">
                      No Record Found
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


</body>

</html>