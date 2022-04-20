<?php
include('../connect.php');
include('student-header.php');
$Inst_id = $_SESSION['Inst_id'];
$page='instituteinfo';
?>
<html>

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="student-content mt-5 ">
      <div class="row mt-5 p-2">
        <?php $q = "select * from institute_tbl where Id='$Inst_id'";
        $res = mysqli_query($con, $q);
        while ($r = mysqli_fetch_array($res)) {
        ?>
        <div class="col-sm-6 d-flex justify-content-center">
          <img src="../img/1.jpg" class="img h-50 w-50" />
        </div>
        <div class="col-sm-6 ">
          <div>
            <h6 class="navy-blue fw-bold fs-5"> Institute Name : </h6>
            <p><?php echo $r[2]; ?></p>
          </div>
          <div>
            <h6 class="navy-blue  fw-bold fs-5"> Email : </h6>
            <p><?php echo $r[3]; ?></p>
          </div>
          <div>
            <h6 class="navy-blue fw-bold fs-5"> Addres : </h6>
            <p><?php echo $r[4]; ?></p>
            <p><?php echo $r[5]; ?></p>
            <p><?php echo $r[6]; ?></p>
          </div>
          <div>
            <h6 class="navy-blue fw-bold fs-5"> Contact : </h6>
            <p><?php echo $r[8]; ?></p>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</body>