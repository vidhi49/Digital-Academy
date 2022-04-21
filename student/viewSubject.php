<?php
include('../connect.php');
include('student-header.php');
$inst_id = $_SESSION['Inst_id'];
$Id = $_SESSION['Id'];
$page = 'viewSubject';


?>


<html>

<body>
  <div class="d-flex">
    <?php
    include("student-sidebar.php");
    ?>
    <div class="student-content">
      <div class="row mt-5">
        <?php
        $q = "select * from student_tbl where Inst_id='$inst_id' and Id='$Id'";
        // echo $q;
        $result = mysqli_query($con, $q);
        $r = mysqli_fetch_array($result);

        $s = "select * from teacher_wise_subject_tbl where Inst_id='$inst_id' and Class_id='$r[15]'";
        $result1 = mysqli_query($con, $s);
        $num = mysqli_num_rows($result1);

        if ($num > 0) {
          while ($r1 = mysqli_fetch_array($result1)) {
            echo '
                                        <div class="col-sm-4">
                                        <div class="shadow p-3 mb-5 bg-navy-blue " style="border-radius: 20px">
                                            <div class="card-body">
                                                <div class="media align-items-center">
                                                    <div class="media-body mr-3">
                                                        <h2 class=" font-w700 text-white">
                                                                ' . $r1['7'] . ' - <span class="text-warning fs-4">' . $r1['2'] . '</span>
                                                        </h2>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                        ';
          }
        } else {
          //     <div class="d-inline-block">
          //     <a class="text-light">
          //         <li class="fa fa-bookmark fs-1"></li>
          //     </a>
          // </div>
        ?>

        <div class="col-sm-12">
          <div class="card shadow p-3 mb-5 bg-white " style="border-radius: 20px;">
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
</body>

</html>

<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
$(document).ready(function() {
  $('#dataTable').DataTable(); // ID From dataTable 
  $('#dataTableHover').DataTable(); // ID From dataTable with Hover
});
</script>