<?php
include('../connect.php');
include('teacher-header.php');
$Inst_id = $_SESSION['Inst_id'];
$page = 'instituteinfo';
?>
<html>

<body>
  <div class="d-flex">
    <?php include("teacher-sidebar.php"); ?>
    <div class="content mt-5 ">
      <div class="d-flex justify-content-center align-items-center">
        <div class="card shadow p-5 w-50" style="border-radius:20px;">
          <div class="d-flex">
            <?php $q = "select * from institute_tbl where Id='$Inst_id'";
            $res = mysqli_query($con, $q);
            while ($r = mysqli_fetch_array($res)) {
            ?>
            <img src="../Institute-logo/<?php echo $r['Logo']?>" class="img m-4" style="height:300px;width:300px" />
            <div class="p-2 d-block">
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
</body