<?php
include('../connect.php');
include('../teacher/teacher-header.php');
session_start();
$Id = $_SESSION['id'];
$p = "select * from teacher_tbl where Id='$Id' and Inst_id='$inst_id'";
$r = mysqli_query($con, $p);
$row = mysqli_fetch_array($r);
$page = '';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="../js/jquery-3.1.1.min.js"></script>

<html>
<script>

</script>

<body>
    <div class="d-flex">
        <?php include("student-sidebar.php"); ?>
        <div class="teachert-content mt-2 p-3">
        <div class="row shadow mx-5" style="border-radius: 20px;background-color:#fffdd0">
          <div class="col-sm-8 d-flex align-items-center">
            <div class="m-5 " style="line-height: 50px;">
              <p class="" style="font-size: 50px;">Welcome Back!!!</p>
              <h3><?php echo $row['Name'] ?></h3>
              <p class="py-2" style="line-height: 25px;">Education is one of the most powerful aspects of life.
                Education and learning allow us to make sense of the world around us and where we fit within the world.</p>
            </div>

          </div>
          <div class="col-sm-4 ">
            <img class="card-img-bottom" src="../img/student-dashboard.png">
          </div>
        </div>
        </div>
    </div>

</body>


</html>