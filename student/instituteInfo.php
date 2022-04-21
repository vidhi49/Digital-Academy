<?php
include('../connect.php');
include('student-header.php');
$Inst_id = $_SESSION['Inst_id'];
$page = 'instituteinfo';
?>
<html>
<style>
.inst-card {
  width: 800px;
}

@media only screen and (max-width: 500px) {
  .inst-card {
    width: auto;
  }
}
</style>

<body>
  <div class="d-flex">
    <?php include("student-sidebar.php"); ?>
    <div class="student-content mt-5 ">
      <h2 class="navy-blue text-center">Institute Info</h2>

      <div class="d-flex justify-content-center align-items-center">
        <div class="card inst-card shadow p-5 " style="border-radius:20px;">
          <div class="row">
            <?php $q = "select * from institute_tbl where Id='$Inst_id'";
            $res = mysqli_query($con, $q);
            while ($r = mysqli_fetch_array($res)) {
            ?>
            <div class="col-sm-6 d-flex justify-content-center">
              <img src="../img/1.jpg" class="img  w-75 " />
            </div>

            <div class=" col-sm-6 mt-5">
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
    </div>
  </div>
</body>