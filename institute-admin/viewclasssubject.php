<?php include("../connect.php");
// session_start();
// include("../admin/admin-header.php");
include("change-header.php");
// include("../institute-admin/institute-header.php");
$a = "subject";
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
      <div class="row">
        <?php
        $cid = $_GET['cid'];
        $q = "select * from subject_tbl where Inst_id='$inst_id' and Class_id='$cid'";
        // echo $q;
        $result = mysqli_query($con, $q);

        $num = mysqli_num_rows($result);

        if ($num > 0) {

          while ($r = mysqli_fetch_array($result)) {
            $q1 = "select * from teacher_wise_subject_tbl where Inst_id='$inst_id' and Class_id='$cid' and Sub_id='$r[0]'";
            $result1 = mysqli_query($con, $q1);
            $r1 = mysqli_fetch_array($result1);

            echo '
                <div class="col-sm-6">
                  <div class="shadow p-3 mb-5 bg-navy-blue " style="border-radius: 20px">
                    <div class="card-body">
                      <div class="media align-items-center">
                        <div class="media-body mr-3">
                          <h2 class=" font-w700 text-white">
                                  ' . $r[3] . ' -  <span class=fs-5>' . $r1[2] . '</span>
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

        <div class=" col-sm-12">
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